<?php
namespace Home\Controller;
use Home\Model\Country_regionsModel;
use Home\Model\Labor_timeModel;
use Home\Model\LaborerModel;
use Home\Model\NoticeModel;
use Home\Model\Order_customer_logModel;
use Home\Model\Order_customerModel;
use Home\Model\Order_problemModel;
use Home\Model\StockModel;
use Home\Model\WarehouseModel;

class DeliverycenterController extends CommonController {

    //发货中心
    public function index(){
        $this->display();
    }

    //各国家发货订单列表
    public function deliveryList(){
        $map['uid']=$_SESSION['user_info']['uid'];
        $map['method']='shipped';
        //$cid=M('user_info')->field('cid')->where($map)->find();//获取国家的权限
        $cid=M('warehouse_power')->where($map)->find();
        $array=explode(",",$cid['range']);
        $condition['status']='1';
        $condition['id']=array('in',$array);
        $warehouse=M('warehouse')
            ->field('id,
                     name,
                     englishname,
                     company')
            ->where($condition)
            ->select();
        $status_id=trim($_GET['status_id']);
        $area['w_id']=trim($_GET['country']);  //获取仓库
        if(!empty($area['w_id'])){
            /*$regions=new Country_regionsModel();
            $region=$regions->country_area($area);  //根据仓库查询出所有包含的地区*/
            /*$range=new WarehouseModel();
            $region=$range->w_range($area);  //根据仓库查询出所有包含的地区*/
            $region=M('country_range')->where($area)->select();
            $reg=array_column($region,'range');  //返回数组中指定的一列
            $data['country']=array('in',$reg);  //拼接所有需要查询的地区条件带入sql
        }else{
            $data['country']="";
        }
        if(!empty($status_id)){
            $data['status_id'] = array('like', "%" .$status_id. "%", 'or');
        }
        $pagen=$_GET['pagen'];
        $order=new Order_customerModel();
        //$count=$order->shipCount($data);
        if(empty($pagen)){
            $pagen=500;
        }
        $data['status_ex.table']='order_customer';
        $data['status_ex.column']='status_id';
        $list=$order->orderstatus($data,$pagen);
        $orderjson=json_encode($list['list']);
        $this->assign('country',$warehouse);  //选择区域
        $this->assign('orderjson',$orderjson);
        $this->assign('list',$list['list']);
        $this->assign('status_id',$status_id);  //状态
        $this->assign('page',$list['page']);   //翻页
        $this->assign('area',$area['w_id']);   //国家
        $this->assign('pagen',$pagen);   //数量
        $this->display();
    }

    //ajax获取订单处理权限
    public function getAjaxPermission(){
        $map['order_customer.id']=$_GET['id'];
        $user = new \Home\Model\Order_customerModel();
        $list=$user->orderdetail($map);
        $uid['uid']=$_SESSION['user_info']['uid'];
        $cid=M('user_info')->field('uid,cid')->where($uid)->find();
        $country=$list[0]['cid'];
        $array=explode(",",$cid['cid']);
        $permission=in_array($country,$array);
        if($permission == false){
            $result='0';
        }else{
            $result='1';
        }
        $this->ajaxReturn($result);
    }

    //订单详情
    public function ordertrack(){
        $map['order_customer.id']=$_GET['id'];
        $user = new \Home\Model\Order_customerModel();
        $log=new Order_customer_logModel();
        $list=$user->orderdetail($map);
        $info=$user->orderdetails($map);
        $weight=$user->packageweight($map);
        $status['status']='1';  //查询运输商状态为1
        $transporters=M('Transporters')->where($status)->select();
        $transport=$user->transport($map);
        $transport_mode=$user->transport_mode($map);
        $logistics=$user->logistics($map);
        $process=$log->logs($map);
        $country=$info['cid'];
        $asin['asin']=$info['asin'];
        $asin['country']=$country;
        $labor=new Labor_timeModel();
        $time=$labor->asin($asin); //查询劳动工时
        $this->assign('time',$time);
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('weight',$weight);//订单重量
        $this->assign('transporters',$transporters);
        $this->assign('transport',$transport);//运输商
        $this->assign('transport_mode',$transport_mode);//运输方式
        $this->assign('logistics',$logistics);//物流追踪号
        $this->assign('process',$process);//查看日志
        $this->display();
    }

    //订单搜索
    public function ordersearch(){
        $user=new \Home\Model\Order_customerModel();
        $list=$user->ordersearch();
        $this->ajaxReturn($list);
    }

    //修改详情
    public function updateOrder(){
        $map['order_customer.id']=$_GET['id'];
        $user = new \Home\Model\Order_customerModel();
        $list=$user->orderdetail($map);
        $info = new \Home\Model\Order_customerModel();
        $info=$info->orderdetails($map);
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->display();
    }

    //修改提交订单
    public function update(){
        $id=$_POST['id'];
        $map['id']=$id;
        $data['fullname']=$_POST['recipient_first_name'];
        $data['country']=$_POST['country'];
        $data['state']=$_POST['state'];
        $data['city']=$_POST['city'];
        $data['buyer_phone']=$_POST['buyer_phone'];
        $data['buyer_email']=$_POST['buyer_email'];
        $data['street_1']=$_POST['street_1'];
        $data['street_2']=$_POST['street_2'];
        $data['street_3']=$_POST['street_3'];
        $data['zip']=$_POST['zip'];
        $result=M()->table('order_customer')->where($map)->save($data);//更新订单信息
        $logs=new Order_customer_logModel();
        $log['o_id']=$id;
        $log['textzh']='修改订单';
        $log['textus']='modify order';
        $log['variable']='';
        $addlogs=$logs->addlogs($log);
        if($result && $addlogs){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //删除订单
    public function delorder(){
        $id=$_POST['id'];
        $map['id']=$id;
        $data['status']='0';
        $result=M()->table('order_customer')->where($map)->save($data);//更新订单信息
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $logs=new Order_customer_logModel();
        $log['o_id']=$id;
        $log['textzh']='删除订单';
        $log['textus']='Delete the order';
        $log['variable']='';
        $logs->addlogs($log);
        $this->ajaxReturn($list);
    }

    //批量打印
    public function printorder(){
        $map = $_POST['arr'];//修改条件
        $where['id']=array('in',$map);
        $data['status_id']=4;//赋值需要改变的状态
        $result=M()->table('order_customer')->where($where)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $logs=new Order_customer_logModel();
        $count=count($map);
        for($i=0;$i<$count;$i++){
            $log['o_id']=$map[$i];
            $log['textzh']='打印订单标签';
            $log['textus']='Print order label';
            $log['variable']='';
            $logs->addlogs($log);
        }
        $this->ajaxReturn($list);
    }

    //打印完成
    public function notship(){
        $map = $_POST['arr'];//修改条件
        $where['id']=array('in',$map);
        $data['status_id']=5;//赋值需要改变的状态
        $result=M()->table('order_customer')->where($where)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $logs=new Order_customer_logModel();
        $count=count($map);
        for($i=0;$i<$count;$i++){
            $log['o_id']=$map[$i];
            $log['textzh']='确认标签打印完成';
            $log['textus']='Make sure the label is printed';
            $log['variable']='';
            $logs->addlogs($log);
        }
        $this->ajaxReturn($list);
    }

    //待发货(打包完成)
    public function waitship(){
        $id=$_POST['id'];
        $map['id'] = $id;//修改条件
        $time=$_POST['labor_time'];
        $country=$_POST['cid'];
        $asin['asin']=$_POST['asin'];
        $asin['country']=$country;
        $labor=new Labor_timeModel();
        $info_asin=$labor->asin($asin); //查询劳动工时表是否有这个asin
        if(empty($info_asin)){    //如果为空
            $data['asin']=$asin['asin'];
            $data['country']=$country;
            $data['time']=$time;
            $data['uid']=$_SESSION['user_info']['uid'];
            $data['approval']=2;
            $labor->addtime($data);    //添加新的纪录
        }
        if(!empty($info_asin)){   //如果不为空
            $where['asin']=$asin['asin'];
            $where['country']=$country;
            $data['country']=$country;
            $data['time']=$time;
            $data['approval']=2;
            $labor->edittime($where,$data);   //修改劳动时间
        }
        $asin['time']=$time;
        $asin['uid']=$_SESSION['user_info']['uid'];
        $asin['o_id']=$id;
        $asin['date']=date("Y-m-d");  //打包日期
        $asin['approval']=2;
        M('laborer')->add($asin);   //在劳动时间统计表添加记录
        $ku_id=$_POST['w_id'];   //获取仓库id
        $k_id['warehouse_id']=$ku_id;
        $ku['w_id']=$ku_id;  //仓库id
        $ku['w_type']=2;   //主仓
        $ku['status']=1;   //主仓
        $ku=M('warehouse_location')->where($ku)->find();
        $k_id['position_id']=$ku['id'];   //主区id
        $map['pid']=$_POST['pid'];    //产品id
        $map['number']=$_POST['number'];  //产品数量
        $map['oid']=$_POST['oid'];  //销售订单id
        $salesorder=$id;  //销售订单id
        $inventory=new StockModel();
        $inventorys=$inventory->outOfstock($k_id,$map,$salesorder);  //减库存
        $status['status_id']=6;//赋值需要改变的状态
        $result=M()->table('order_customer')->where($map)->save($status);
        $logs=new Order_customer_logModel();
        $log['o_id']=$id;
        $log['textzh']='订单打包完成';
        $log['textus']='Order packing completed';
        $log['variable']='';
        $logss=$logs->addlogs($log);
        if($result && $inventorys && $logss){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //待发货(打包完成,确认发货调用)
    public function waitshipped($id)
    {
        $map['id'] = $id;//修改条件
        $time = $_POST['labor_time'];
        $country = $_POST['cid'];
        $asin['asin'] = $_POST['asin'];
        $asin['country'] = $country;
        $labor = new Labor_timeModel();
        $info_asin = $labor->asin($asin); //查询劳动工时表是否有这个asin
        if (empty($info_asin)) {    //如果为空
            $data['asin'] = $asin['asin'];
            $data['country'] = $country;
            $data['time'] = $time;
            $data['uid'] = $_SESSION['user_info']['uid'];
            $data['approval'] = 2;
            $labor->addtime($data);    //添加新的纪录
        }
        if (!empty($info_asin)) {   //如果不为空
            $where['asin'] = $asin['asin'];
            $where['country'] = $country;
            $data['country'] = $country;
            $data['time'] = $time;
            $data['approval'] = 2;
            $labor->edittime($where, $data);   //修改劳动时间
        }
        $asin['time'] = $time;
        $asin['uid'] = $_SESSION['user_info']['uid'];
        $asin['o_id'] = $id;
        $asin['date'] = date("Y-m-d");  //打包日期
        $asin['approval'] = 2;
        M('laborer')->add($asin);   //在劳动时间统计表添加记录
        $ku_id = $_POST['w_id'];   //获取仓库id
        $k_id['warehouse_id'] = $ku_id;
        $ku['w_id'] = $ku_id;  //仓库id
        $ku['w_type'] = 2;   //主仓
        $ku['status'] = 1;   //主仓
        $ku = M('warehouse_location')->where($ku)->find();
        $k_id['position_id'] = $ku['id'];   //主区id
        $map['pid'] = $_POST['pid'];    //产品id
        $map['number'] = $_POST['number'];  //产品数量
        $map['oid'] = $_POST['oid'];  //销售订单id
        $salesorder = $id;  //销售订单id
        $inventory = new StockModel();
        $inventorys = $inventory->outOfstock($k_id, $map, $salesorder);  //减库存
        $status['status_id'] = 6;//赋值需要改变的状态
        $result = M()->table('order_customer')->where($map)->save($status);
        $logs = new Order_customer_logModel();
        $log['o_id'] = $id;
        $log['textzh'] = '订单打包完成';
        $log['textus'] = 'Order packing completed';
        $log['variable'] = '';
        $logss = $logs->addlogs($log);
    }

    //已发货(确认发货)
    public function shipped(){
        $id=$_POST['id'];
        $d=new DeliverycenterController();
        $waitship=$d->waitshipped($id);  //打包完成
        $condition['id'] =$id;//修改条件
        $data['transporters_id']=$_POST['transporters_id'];//运输商
        $data['transport_mode_id']=$_POST['transport_mode_id'];//运输方式
        $data['logistics_number']=$_POST['logistics'];//获取物流追踪号
        $data['order_price']=$_POST['price'];//运输费用
        $data['status_id']=7;//赋值需要改变的状态
        $result=M()->table('order_customer')->where($condition)->save($data);  //保存运输信息
        $logs=new Order_customer_logModel();
        $log['o_id']=$id;
        $log['textzh']='添加物流追踪号,并发货';
        $log['textus']='Add logistics tracking number and deliver';
        $log['variable']='';
        $addlog=$logs->addlogs($log);
        if($result && $addlog && $waitship){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }


    //问题订单
    public function sickorder(){
        $id=$_POST['id'];
        $map['id'] = $id;//修改条件
        $data['status_id']=9;//赋值需要改变的状态
        $problem['o_id']=$id;
        $problem['type']=$_POST['ptype']; //问题类型
        $problem['describe']=$_POST['problem']; //问题描述
        $problems=new Order_problemModel();
        $p_order=$problems->addOrder($problem);
        $result=M()->table('order_customer')->where($map)->save($data);
        if($p_order && $result){
            $list='1';
        }else{
            $list='0';
        }
        $logs=new Order_customer_logModel();
        $log['o_id']=$id;
        $log['textzh']='提交订单为问题订单,问题类型:'.$problem['type'].'问题描述:'.$problem['describe'];
        $log['textus']='Submit the order as a problem order, problem type:'.$problem['type'].'problem description:'.$problem['describe'];
        $log['variable']='';
        $logs->addlogs($log);
        $this->ajaxReturn($list);
    }

    //取消问题订单
    public function cancelsickorder(){
        $id=$_POST['id'];
        $map['id'] = $id;//修改条件
        $data['status_id']=2;//赋值需要改变的状态
        $problem['o_id']=$id;
        $problem['status']=1;
        $problems=new Order_problemModel();
        $p_order=$problems->addOrder($problem);
        $result=M()->table('order_customer')->where($map)->save($data);
        if($p_order && $result){
            $list='1';
        }else{
            $list='0';
        }
        $logs=new Order_customer_logModel();
        $log['o_id']=$id;
        $log['textzh']='提交订单为新订单';
        $log['textus']='Submit the order as a new order';
        $log['variable']='';
        $logs->addlogs($log);
        $this->ajaxReturn($list);
    }

    //ajax获取pid
    public function getAjaxPid(){
        $pid=$_POST['pid'];
        $this->ajaxReturn($pid);
    }

    //产品表
    public function productList(){
        $map['product.status']='1';
        $product = M('product')->where($map)
            ->join('LEFT JOIN order_customer_bom on product.id = order_customer_bom.pid')
            ->join('LEFT JOIN stock ON product.id = stock.pid')
            ->field('product.id,
                     product.bclass,
                     product.sclass,
                     product.number,
                     product.namezh,
                     product.status,
                     product.thumb,
                     product.shortname,
                     order_customer_bom.pid,
                     order_customer_bom.number as num,
                     stock.g_id,
                     stock.number,
                     stock.price,
                     stock.monetary_unit')
            ->select();//查询产品表
        $this->ajaxReturn($product);
    }

    //下拉查询
    public function seachproduct(){
        $search=trim($_POST['search']);  //去除空格
        if (!empty($search)) {
            $map['product.namezh'] = array('like', $search);
            $list=M('product')->where($map)->field('id','namezh')->select();
            $this->ajaxReturn($list);
        }
    }

    //生成采购订单pdf
    public function shipListPdf(){
        $data['order_customer.status_id']=3;   //订单状态为待打印的订单
        $country['w_id']=$_GET['w_id'];   //接收仓库id
        $country_range=M('country_range')->where($country)->select();
        $range=array_column($country_range,'range');
        $data['order_customer.country']=array('in',$range);
        $shiplist=new Order_customerModel();
        $result=$shiplist->shipList($data);
        $list=array();
        foreach ($result as $key=>$vo){
            if(isset($list[$vo['pid']])){
                $list[$vo['pid']]['number'] += $vo['number'];
            }else{
                $list[$vo['pid']] =
                    array('pid'=>$vo['pid'],
                          'bclass'=>$vo['bclass'],
                          'sclass'=>$vo['sclass'],
                          'num'=>$vo['num'],
                          'namezh'=>$vo['namezh'],
                          'number'=>$vo['number']);
            }
        }
        $tr=" ";
        $i=1;
        foreach ($list as $k=>$v){
            $tr=$tr."<tr><td style='border: 1px solid #ccc;'>".(string)($i++)."</td>
        	<td style='border: 1px solid #ccc;'>".$v['bclass'].'.'.$v['sclass'].'.'.$v['num']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['namezh']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['number']."</td>
        	</tr>";
        }
        $time=date("Y-m-d");
        $root = __ROOT__; //项目根目录
        ob_end_clean();
        //引入类库
        Vendor('mpdf.mpdf');
        //设置中文编码
        $mpdf=new \mPDF('utf-8','A4','','宋体',0,0,20,10);
        //$mpdf->SetWatermarkText('果壳技术',0.1);//水印

        //设置PDF页眉内容
                $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
        serif; font-size: 9pt; color: #000088;"><tr>
        <td width="80%" align="center" style="font-size:16px;">果壳技术有限公司</td>
        </tr></table>';

        //设置PDF页脚内容0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
                $footer='<table width="100%" style=" vertical-align: bottom; font-family:
        serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
        <td width="10%"></td>
        <td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
        <td width="10%" style="text-align: left;">页码:{PAGENO}/{nb}</td>
        </tr></table>';
        //内容部分
        $htmldata = "<div id='wrap' class='wrap' style='margin: 0 auto;padding: 0px 30px 0px 30px;width: 210mm;height: 297mm;'>
			<p style='line-height: 40px;font-size: 30px;margin: 0;text-align: center;'>Shipping List</p>
			<p style='line-height: 40px;font-size: 30px;margin: 5px;text-align: center;'>发货清单</p>
					<p style='margin: 0; float: left;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>日期:</span>
						<span>{$time}</span>
					</p>			
					<table style='font-size: 14px;width: 100%;border-collapse:collapse;line-height: 28px;text-align: center;'>
				<tr>
					<th width=\"10%\" style='border: 1px solid #ccc;'>序号</th>
					<th width=\"15%\" style='border: 1px solid #ccc;'>产品料号</th>
					<th style='border: 1px solid #ccc;'>产品名称</th>
					<th width=\"10%\" style=\"border: 1px solid #ccc;\">产品数量</th>
				</tr>
				$tr
			</table>
		</div>";
        $mpdf->showWatermarkText = true;
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($htmldata);
//        $mpdf->WriteHTML($tr);
        //保存guoke.pdf文件
        $type='I'; //在线预览模式
        //$type='D'; //下载模式
        //$type='f'；生成后保存到服务器
        //$type='s'；返回字符串，此模式下$filename会被忽视

        //设置pdf显示方式
        $mpdf->SetDisplayMode('fullpage');
        $pdfname = $time.'发货清单'.'.'.'pdf';
        $mpdf->Output($pdfname,$type);
        //直接浏览器输出pdf
    }

    //ajax获取运输方式
    public function getAjaxMode(){
        $map['status']='1';
        $map['id']=$_POST['id'];
        $mode=M('Transporters')->field('mode_id')->where($map)->find();//获取运输方式
        $array=explode(",",$mode['mode_id']);
        $trans['status']='1';
        $trans['id']=array('in',$array);
        $list=M('Transport_mode')
            ->field('id,
                     mode')
            ->where($trans)
            ->select();
        $this->ajaxReturn($list);
    }

    //劳动时间审批
    public function approval(){
        $map['uid']=$_SESSION['user_info']['uid'];
        $map['method']='shipped';  //方法为发货
        $cid=M('warehouse_power')->field('range')->where($map)->find();  //获取发货范围ID
        $array=explode(",",$cid['range']);
        $condition['status']='1';
        $condition['id']=array('in',$array);
        $warehouse=M('warehouse')
            ->field('id,
                     name,
                     englishname,
                     company')
            ->where($condition)
            ->select();
        $data['labor_time.approval']=2;
        $data['labor_time.wid']=$_GET['country'];
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=10;
        }
        $labor_time=new Labor_timeModel();
        $list=$labor_time->workList($data,$pagen);
        $orderjson=json_encode($list['list']);
        $this->assign('list',$list['list']);
        $this->assign('country',$warehouse);  //仓库
        $this->assign('pagen',$pagen);  //显示数量
        $this->assign('orderjson',$orderjson);
        $this->assign('page',$list['page']);
        $this->assign('area',$data['labor_time.wid']);  //定位仓库
        $this->display();
    }

    //审批详情
    public function workDetails(){
        $data['labor_time.asin']=$_POST['sku'];
        $detail=new Labor_timeModel();
        $result=$detail->workDetails($data);
        $this->ajaxReturn($result);
    }

    //确认时间
    public function audit(){
        $map['asin']=$_POST['sku'];
        $map['cid']=$_POST['cid'];
        $data['time']=$_POST['time'];
        $data['approval']=1;
        $date=$_POST['date'];
        $result=M('labor_time')->where($map)->save($data);   //审批表改变状态和时间
        $month="DATE_FORMAT(date,'%Y%m')= DATE_FORMAT('$date', '%Y%m')";   //只获取本月符合条件的数据
        $laborer=M('laborer')->where($map)->where($month)->save($data);  //个人统计时间表改变状态和时间
        if($result && $laborer){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    public function audits($cid,$sku,$data){
        $map['asin']=$sku;
        $map['cid']=$cid;
        $date=$data;
        $labor_time=M('labor_time');
        $result=$labor_time->where($map)->save($date);   //审批表改变状态和时间
        $month="DATE_FORMAT(date,'%Y%m')= DATE_FORMAT('$date', '%Y%m')";   //只获取本月符合条件的数据
        if($result){
            $laborer = M('laborer');
            $laborer->startTrans(); //开启事务
            $list=$laborer->where($map)->where($month)->save($date);  //个人统计时间表改变状态和时间
            if($result && $list){
                $labor_time->commit();   //提交事务
                $laborer->commit();
                return true;
            } else {
                $labor_time->rollback(); //事务回滚
                $laborer->rollback();
                return false;
            }
        }
    }

    //todo 批量确认
    public function batch_audit(){
        $sku=$_POST['sku_arr'];  //获取sku
        $cid=$_POST['cid_arr'];  //获取国家id
        $time=$_POST['time_arr'];   //获取时间
        $jieguo=array();
        foreach($time as $k=>$v){
            $jieguo[$k]=array('approval'=>1,'time'=>$v);
            $result=$this->audits($cid[$k],$sku[$k],$jieguo);
        }
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //个人劳动时间统计
    public function timeStatistics(){
        $start=$_GET['start'];
        $data['laborer.uid']=$_SESSION['user_info']['uid'];
        $pagen=$_GET['pagen'];
        //$data['date'] = array(array('egt',$start),array('elt',$end));
        $map="date_format(date,'%Y-%m')='$start'";
        if(empty($pagen)){
            $pagen=10;
        }
        $laborer=new LaborerModel();
        $list=$laborer->workList($map,$data,$pagen);
        $orderjson=json_encode($list['list']);
        $this->assign('orderjson',$orderjson);
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->assign('pagen',$pagen);   //每页显示多少
        $this->assign('times',$list['time'][0]['agg']);   //总时长
        $this->assign('start',$start);   //日期
        $this->display();
    }

    //发货时间详情
    public function worksDetails(){
        $data['laborer.asin']=$_POST['sku'];
        $data['laborer.o_id']=$_POST['o_id'];
        $detail=new LaborerModel();
        $result=$detail->workDetails($data);
        $this->ajaxReturn($result);
    }

    //重新申请
    public function reiterate(){
        $map['asin']=$_POST['sku'];
        $map['cid']=$_POST['cid'];
        $data['time']=$_POST['time'];
        $data['approval']=81;
        $data['uid']=$_SESSION['user_info']['uid'];
        $labor_time=M('labor_time')->where($map)->save($data);
        $laborer=M('laborer')->where($map)->save($data);
        if($labor_time && $laborer){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }
}