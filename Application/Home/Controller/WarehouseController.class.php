<?php
/**
 * Created by PhpStorm.
 * User: chy
 * Date: 2017/8/9
 * Time: 19:55
 */

namespace Home\Controller;

class WarehouseController extends CommonController
{

    //实体仓库
    public function warehousePhysical(){
        $trem['country.status'] = 1;
        $trem['organizationt.status'] = 1;
        $list = M('warehouse')
            ->where($trem)
            ->field('
            warehouse.id as id,
            warehouse.name as name,
            warehouse.englishname as englishname,
            warehouse.status as status,
            country.countryzh as countryzh,
            country.countryus as countryus,
            organizationt.namezh as namezh,
            organizationt.nameus as nameus,
            warehouse.company as companyid
            ')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->join('LEFT JOIN organizationt ON company_configuration.company = organizationt.id')
            ->select();
        //查询公司信息
        $map['status'] = 1;
        $map['fatherid'] = 1;
        $map['level'] = 1;
        $company = M('organizationt')->where($map)->field('id,namezh,nameus')->select();
        $this->assign('company',$company);
        $this->assign('list',$list);
        $this->display();
    }
    //仓库名称检测  添加
    public function warehousename(){
        $where['name']=I('post.name');

        $id=M('warehouse')->where($where)->getField('id');
        if ($id){
            //有重复
            $result='no';
        }else{
            //没有重复 可以录入
            $result='can';
        }
        $this->ajaxReturn($result);
    }
    //仓库名称检测  修改
    public function warehousename1(){
        $where['name']=I('post.name');
//        $where['state']='1';
        $id['id']=M('warehouse_physical')->where($where)->getField('id');

        $name = M('warehouse_physical')->where($id)->field('name')->find();
        if ($id || $name['name']==$where['name']){
            //有重复
            $result='no';
        }else{
            //没有重复 可以录入
            $result='can';
        }
        $this->ajaxReturn($result);
    }
    //添加实体仓库
    public function savewarehouse()
    {

        $trem['company'] = I('post.company');   //公司
        $stock = M('warehouse')->where($trem)->field('id')->find();
        if ($stock['id']){
            $Result = 'so';//该公司已有仓库
        }else{
            $where['name']=I('post.ckname');
            $where['company'] = I('post.company');
            $data['name'] = $_REQUEST['ckname'];
            $data['englishname'] = I('post.englishname');
            $data['company'] = I('post.company');
            $data['status'] = $_REQUEST['state'];
            $id=M('warehouse')->where($where)->getField('id');
            //判断必填信息都不为空再执行添加
            if (!empty($data['name']) AND !empty($data['company']) AND !empty($data['englishname'])  AND !empty($data['status']) AND !$id) {
                $warehouse = M('warehouse')->data($data)->add();
            }else{
                $Result = 'NO'; //不能为空
            }
            //修改系统配置
            $pol['company'] = I('post.company');
            $pol['status'] = 1;
            $data_w['warehouse_physical'] = (int)$warehouse;
            $company_configuration = M('company_configuration')->where($pol)->data($data_w)->save();
            if ($company_configuration){
                //添加仓库
                $type = $_REQUEST['type'];
                foreach ($type as $k => $v) {
                    $map['w_type'] = $type[$k];
                    $map['w_id'] = (int)$warehouse;
                    $map['status'] = 1;
                    $return = M('warehouse_location')->data($map)->add();
                }
                //添加仓位
                if ($return){
                    $shelf_data['warehouse_id'] = (int)$warehouse;
                    $shelf_data['name'] = 'A'; //默认仓位
                    $shelf_data['creation_time'] = date("Y-m-d H:i:s", time());
                    $shelf_data['status'] = 1;
                    $shelf_data['type'] = 2; //默认收货仓
                    $Result = M('shelf')->data($shelf_data)->add();
                }else{
                    $Result = false;
                }

            }

        }

        $this->ajaxReturn($Result);

    }
    //修改实体仓库
    public function ckupdate(){
        $map['id'] = I('post.id');
        $lis['name'] = I('post.name');
        $lis['company'] = I('post.companys');
        $lis['status'] = I('post.state');
        $lis['englishname'] = I('post.englishname');
        $name['name'] = I('post.name');
        $name['company'] = I('post.companys');
        //查询仓库信息
        $physicaname = M('warehouse')->where($name)->field('id')->find();
        $physicaid = M('warehouse')->where($map)->field('name,company')->find();
        //通过仓库id和国家名称查仓库信息
        $trem['company'] = I('post.companys');
        $trem['id'] = $map['id'];
        $company = M('warehouse')->where($trem)->field('id')->find();
        //通过国家名称查仓库信息
        $cod['company'] = I('post.companys');
        $cod['status'] = 1;
        $companya = M('warehouse')->where($cod)->field('id')->find();
        //判断公司仓库唯一性
        if ($company['id'] or !$companya['id']){
            //判断仓库名称重复
            if (!$physicaname['id'] || $physicaid['name']==$name['name'] || $physicaid['company']==$name['company'] ){
                //判断为空
                if (!empty($lis['name']) AND !empty($lis['company']) AND !empty($lis['englishname'])){
                    $info = M('warehouse')->where($map)->save($lis);
                    $cod['warehouse_physical'] = I('post.id');
                    $cod['status'] = 1;
                    $config_data['company'] = I('post.companys');
                    $config = M('company_configuration')->where($cod)->data($config_data)->save();
                    $this->ajaxReturn('OK');//修改成功
                }else{
                    $this->ajaxReturn('CF');//不能为空
                }
            }else{
                $this->ajaxReturn('NO');//仓库名称重复
            }
        }else{
            $this->ajaxReturn('SO');//该公司已有仓库
        }

    }
    //实体仓库下的库位
    public function WarehouseManagement()
    {
        $map['w_id'] = I('get.id');
        $map['w_type'] = array('neq',5);//运输仓
        $kid = I('get.id');
        $zkid['id'] = I('get.id');
        //查询实体仓库信息
        $physical = M('warehouse')->where($zkid)->field('name,englishname')->find();
        //查询仓位信息
        $warelist = M('warehouse_location')->where($map)->select();
        $this->assign('warehouse', $warelist);
        $this->assign('kid', $kid);
        $this->assign('physical', $physical['name']);
        $this->assign('physicalus', $physical['englishname']);
        $this->assign('address',$physical['address']);
        $this->display();
    }
    //添加库位 todo 待删除
    public function warehouseplaceAdd(){
        $data['status'] = 1;
        $data['ku_id'] = I('post.ku_id');
        $data['name'] = I('post.name');
        $data['type'] = I('post.type');
        $info = M('warehouse')->data($data)->add();
        if ($info>0){
            $this->ajaxReturn('OK');
        }
    }
    //修改库位 todo 待删除
    public function warehouseUpdate(){

        $map['id'] = I('post.id');
        $lis['status'] = I('post.status');
        $info = M('warehouse_location')->where($map)->save($lis);
        if($info AND $lis['status']==2){
           $return = 'ok2';
        }elseif($info AND $lis['status']==1){
            $return = 'ok1';
        }else{
            $return = 'no';
        }
        $this->ajaxReturn($return);
    }


    /**
     * 运输管理 todo 待删除
     *
     */
    public function warehouSing()
    {
        $mas['status'] = '1';
        $warehouse = M('warehouse')->where($mas)->field('id,name')->select();
        $sup['state'] = 1;
        $sup['status'] = 1;
        $supplier = M('supplier')->where($sup)->field('id,name')->select();
        $map=array();
        $supp = $_GET['supplier'];//供应商
        $orderon = trim($_GET['orderon']);//订单号
        $purchsearchod = ltrim($orderon,'PO');
        $zkid = $_GET['zk_id']; //仓库id
        if (!empty($supp)){
            $map['order_purchase_success.supplier_id'] = array('eq',$supp);
        }
        if (!empty($zkid)){
            $map['order_purchase_success.ku_id'] = array('eq',$zkid);
        }
        if (!empty($purchsearchod)){
            $map['order_purchase_success.id'] = array('eq',$purchsearchod);
        }
        $where['status'] = '1';
        $status_ex = M('transport_mode')->where($where)->field('id,mode')->select();
        $c=new  \Home\Model\Order_purchase_successModel();
        $result=$c->searchTransport($map);
        foreach ($result['list'] as $k=>$v){
            $result['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $this->assign('orderon',$orderon);
        $this->assign('supp',$supp);
        $this->assign('zkid',$zkid);
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->assign('supplier',$supplier); //供应商
        $this->assign('transport',$status_ex);//运输方式
        $this->assign('warehouse',$warehouse);//仓库
        $this->display();



    }

    //仓库下的产品
    public function warehouseProduct(){
            $map['stock.warehouse_id'] = I('post.id');
            $map['stock.state'] = 1;
            $return = M('stock')
                ->field('product.namezh as namezh,
                    stock.pid as pid
                ')
                ->where($map)
                ->join('LEFT JOIN warehouse ON stock.warehouse_id = warehouse.id')
                ->join('LEFT JOIN product ON stock.pid = product.id')
                ->select();
            $this->ajaxReturn($return);
    }
    public  function warehouseDetails(){
        $this->display();
    }

    //获取仓库下的库位
    public function getAjaxarea($area){
        $map['ku_id']=$area; //库id
        $map['status'] = 1;
        $arealist = M('warehouse')->where($map)->field('id,name')->select();
        $this->ajaxReturn($arealist);
    }

    //查看库存产品详情
    public function stockShow(){
        $oid = trim(I('get.o_id'));
        $pid = I('get.pid');
        $kid = I('get.kid');
        if (!empty($oid)){
            $map['order_purchase_success.order_number'] = array('like', "%" .$oid. "%", 'or');
            $map['pid'] = array('like', "%" .$pid. "%", 'or');
            $map['warehouse_id'] = array('like', "%" .$kid. "%", 'or');
        }else{
            $map['pid'] = I('get.pid');
            $map['warehouse_id'] = I('get.kid');
        }
        $m=new  \Home\Model\StockModel();
        $result=$m->showStock($map);
        $codes = $result['list'][0];//产品编码
        $nameall = $result['list'][0];
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->assign('codes',$codes);
        $this->assign('nameall',$nameall);
        $this->assign('pid',$pid);
        $this->assign('kid',$kid);
        $this->display();
    }
    //收货操作 todo 待删除
    public function collectGoods(){
       $map['order_purchase_success.id'] = I('post.oid');
       $map['order_purchase_success.status'] = 1;
       $map['order_product_success.collect'] = 2;
       $return = M('order_purchase_success')
           ->where($map)
           ->field('product.namezh as namezh,
            order_product_success.num as number,
            order_purchase_success.ku_id as warehouse_id,
            order_purchase_success.supplier_id as supplier_id,
            order_purchase_success.logistics_status as logistics_status,
            order_product_success.supplier_pr_id as pid,
            order_purchase_success.id as oid,
            order_product_success.price as price,
            order_product_success.currency as currency,
            order_product_success.total as total,
            bclass.number as bclassc_number,
            sclass.number as sclassc_number,
            product.number as snumber_number
           ')
           ->join('LEFT JOIN order_product_success ON order_purchase_success.id = order_product_success.order_purchase_success_id')
           ->join('LEFT JOIN product ON order_product_success.supplier_pr_id = product.id')
           ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
           ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
           ->select();
       $this->ajaxReturn($return);
    }



    //执行收货 todo 待删除
    public function collectDo(){
        if (IS_POST) {
            $m = new \Home\Model\StockModel();
            $pid = I('post.pid');
            $num = I('post.number'); //实际收到数量
            $yqnum = I('post.yqnum');   //预期收到数量
            $warehouse_id = I('post.ku_id'); //仓库
            $oid['id'] = I('post.o_id');

            $pow['uid'] = $_SESSION['user_info']['uid'];
            $pow['method'] = 'receipt';
            $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
            $powArr = explode(",",$powerStr['range']);
            if (in_array($warehouse_id,$powArr)){
                foreach ($pid as $k=>$v){
                    $mcd['supplier_pr_id'] = $pid[$k];
                    if ($num[$k]<$yqnum[$k]){
                        $byte['abnormal'] = '2'; //收少
                    }elseif ($num[$k]>$yqnum[$k]){
                        $byte['abnormal'] = '3';    //收多
                    }else{
                        $byte['abnormal'] = '1';    //无异常
                    }
                    $mcd['order_purchase_success_id'] = I('post.o_id');
                    $byte['collect'] = 1;
                    $byte['receiving_time'] =  date("Y-m-d H:i:s", time());
                    $byte['actual_num'] = $num[$k];
                    $return = M('order_product_success')->where($mcd)->setField($byte);
                }
                $cod['order_purchase_success_id'] = I('post.o_id');
                $cod['collect'] = 2;
                $order_productone = M('order_product_success')->where($cod)->field('id')->select();
                $odid['id'] =  I('post.o_id');
                if (count($order_productone)==0){
                    $receiving_status['receiving_status'] = '1';
                    $returns = M('order_purchase_success')->where($odid)->setField($receiving_status);
                }else{
                    $receiving_status['receiving_status'] = '2';
                    $returns = M('order_purchase_success')->where($odid)->setField($receiving_status);
                }
                if ((int)$return>0){
                    $w_map['w_id'] = $warehouse_id;
                    $w_map['w_type'] = 1;
                    $w_map['status'] = 1;
                    $warehouse_location = M('warehouse_location')->where($w_map)->field('id')->find();
                    $w_fmap['order_id'] = I('post.o_id');
                    $w_fmap['order_type'] = '采购订单';
                    $w_fmap['type'] = 10;
                    $w_fmap['warehouse_id'] = $warehouse_id;
                    $w_fdata['position_id'] = (int)$warehouse_location['id'];
                    $w_fdata['creation_time'] =  date("Y-m-d H:i:s", time());
                    $stock_form = M('stock_form')->where($w_fmap)->data($w_fdata)->save();

                    foreach ($pid as $kh=>$vh){
                        $w_f_map['order_id'] = I('post.o_id');
                        $w_f_map['order_type'] = '采购订单';
                        $w_f_map['type'] = 10;
                        $w_f_map['warehouse_id'] = $warehouse_id;
                        $stock_f = M('stock_form')->where($w_fmap)->field('id')->find();
                        $w_m_map['stock_form_id'] = (int)$stock_f['id'];
                        $w_m_map['status'] = 1;
                        $w_m_map['o_id'] = I('post.o_id');
                        $w_m_map['pid'] =  $pid[$kh];
                        $st_data['number'] =  $num[$kh];;
                        $stock_m = M('stock')->where($w_m_map)->data($st_data)->save();
                    }

                }
                //操作日志
                if ($stock_form){
                    $value['o_id'] = I('post.o_id');
                    $value['creationtime'] = date("Y-m-d H:i:s", time());
                    $value['uid'] = $_SESSION['user_info']['uid'];
                    $value['status'] = 1;
                    $value['action'] = 1;
                    $process = M('order_purchase_success_process')->data($value)->add();
                    if ($process){
                        $return = 'ok';
                    }

                }
            }else{
                $return='no';
            }
           
            $this->ajaxReturn($return);
        }
    }

    //获取转库库区
    function getAjaxreservoir(){
        $map['warehouse_location.id'] = array('neq',I('post.warehouse_id'));
        $map['warehouse_location.w_type'] = array('neq',5);
        $map['warehouse_location.status'] = 1;
        $map['warehouse.id'] = I('post.zkid');
        $list = M('warehouse')
            ->where($map)
            ->field('warehouse_location.w_type as name ,warehouse_location.id as id')
            ->join('LEFT JOIN warehouse_location ON warehouse.id = warehouse_location.w_id')
            ->select();
        $this->ajaxReturn($list);
    }

    //执行转区
    function executionZone(){

        $existing = I('post.xnum');//现有数量
        $tonumber = I('post.number');//转入数量
        $towid = I('post.warehouse_idb');//转入库区
        if ($tonumber>$existing || empty($towid)){
            $result='so';
        }else{
            $m = M('stock_form');
            $m->startTrans(); //开启事务
            $map['id'] = I('post.sfid');
            $map['status'] = 1;
            $stock_form = M('stock_form')->where($map)->find();
            $s_fdata['order_id'] = $stock_form['order_id'];
            $s_fdata['order_type'] = $stock_form['order_type'];
            $s_fdata['type'] = 20;//出库
            $s_fdata['warehouse_id'] = $stock_form['warehouse_id'];
            $s_fdata['position_id'] = $stock_form['position_id'];
            $s_fdata['shelf_id'] = $stock_form['shelf_id'];
            $s_fdata['creation_time'] = date("Y-m-d H:i:s", time());
            $s_fdata['status'] = 1;
            $stock_formOut = $m->data($s_fdata)->add();
            if ($stock_formOut){
                $n = M('stock');
                $n->startTrans(); //开启事务
                $smap['stock_form_id'] = I('post.sfid');
                $smap['status'] = 1;
                $stock= M('stock')->where($smap)->field('o_id')->find();
                $s_data['pid'] = I('post.pid');
                $s_data['o_id'] = $stock['o_id'];
                $s_data['stock_form_id'] = (int)$stock_formOut;
                $s_data['number'] = -I('post.number');
                $s_data['status'] = 1;
                $stock_Out = $n->data($s_data)->add();
            }
            if ($stock_Out){
                $m->commit();   //提交事务
                $n->commit();
                $return=1;
            }else{
                $m->rollback();
                $n->rollback(); //事务回滚
            }
            if ($return==1){
                $affairStockform = M('stock_form');
                $affairStockform->startTrans(); //开启事务
                $s_fdataout['order_id'] = $stock_form['order_id'];
                $s_fdataout['order_type'] = $stock_form['order_type'];
                $s_fdataout['type'] = 10;
                $s_fdataout['warehouse_id'] = $stock_form['warehouse_id'];
                $s_fdataout['position_id'] = I('post.warehouse_idb');
                $s_fdataout['shelf_id'] = $stock_form['shelf_id'];
                $s_fdataout['creation_time'] = date("Y-m-d H:i:s", time());
                $s_fdataout['status'] = 1;
                $stock_formenter = $affairStockform->data($s_fdataout)->add();
                if ($stock_formenter){
                    $affairStock = M('stock');
                    $affairStock->startTrans(); //开启事务
                    $smap['stock_form_id'] = I('post.sfid');
                    $smap['status'] = 1;
                    $s_dataenter['pid'] = I('post.pid');
                    $s_dataenter['o_id'] = $stock['o_id'];
                    $s_dataenter['stock_form_id'] = (int)$stock_formenter;
                    $s_dataenter['number'] = I('post.number');
                    $s_dataenter['status'] = 1;
                    $stock_enter = $affairStock->data($s_dataenter)->add();
                }
                if ($stock_enter){
                    $affairStockform->commit();   //提交事务
                    $affairStock->commit();
                    $result = 'ok';//转区成功
                }else{
                    $affairStockform->rollback(); //事务回滚
                    $affairStock->rollback(); //事务回滚
                    $result = 'no';//转区失败
                }

            }
        }

        $this->ajaxReturn($result);
    }

    //执行待检仓收货 todo 待删除
    function executionZonec(){
        $wid['id'] = I('post.kidb');
        $ku_id = M('warehouse')->where($wid)->field('ku_id')->find();
        $k_id['ku_id'] = $ku_id['ku_id'];
        $k_id['status'] = 1;
        $warehouse = M('warehouse')->where($k_id)->field('id')->find();
        $numbera = I('post.numberb');
        $numberb = I('post.number'); //实收数量
        $map['id'] = I('post.id');
        $mub['number'] = I('post.number');
        $mub['check'] = '1';
        $mub['warehouse_id'] = $warehouse['id'];
        $kid['warehouse_id'] = I('post.kidb');
        $id['id'] = I('post.k_id');
        $data['pid'] = I('post.pidb');
        $data['warehouse_id'] = I('post.kidb');
        $data['o_id'] = I('post.oidb');
        $data['mold'] = 1;
        $data['number'] = (int)I('post.numberb')-(int)I('post.number');
        $data['state'] = 1;
        $data['uid'] = $_SESSION['user_info']['uid'];
        $data['creationtime'] = date("Y-m-d H:i:s", time());
        $data['sourceortarget'] = 0;
        $data['sourceorder'] = 1;
        $data['state'] = 3;
        $sl = I('post.sl');
        $m = M('stock');
        //判断实收数量不为0程序往下执行返回true，否则为 0 返回 NO
        if ($mub['number']!=0){
            $netreceipts = $m->where($map)->data($mub)->save();
            if ($sl=='1'){
                $this->ajaxReturn('KO');
            }else{
                $this->ajaxReturn('OK');
            }
        }else{
            $this->ajaxReturn('NO');
        }
        if ($numbera>$numberb){
            $loss = $m->data($data)->add();
            $this->ajaxReturn('OK');
        }else{
            $this->ajaxReturn('NO');
        }
    }
    //库存总量
    function inventoryTotal(){
        $map = array();
        $m = new \Home\Model\StockModel();
        $x = new \Home\Model\ProductModel();
        $p_id = $_GET['p_id'];
        $product = $x->getProductcode();
        if (!empty($p_id)){
            $map['stock.pid'] = array('eq',$p_id);
        }
        $result = $m->allStock($map);//库存产品信息
        $totallist = $m->allTotal($map);//总库存产品价格合计
        foreach($totallist['list'] as $k=>$v){
            $price = $totallist['list'][$k]['price']*$totallist['list'][$k]['number'];
            $arr_a[] = round($price,2);
            //将产品单价乘以数量算金额，放入到新数组中
        }
        $total = array_sum($arr_a);//返回数组中所有值的和。核算产品金额合计
        $this->assign('total',$total);
        $this->assign('p_id',$p_id);
        $this->assign('product',$product);
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->display();
    }
    //运输中
    function transportationIn(){
        $map = array();
        $m = new \Home\Model\StockModel();
        $x = new \Home\Model\ProductModel();
        //获取用户查看库存权限
        $pow['uid'] = $_SESSION['user_info']['uid'];
        $pow['method'] = 'stock_get';
        $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
        $powArr = explode(",",$powerStr['range']);
        //查询该用户的仓库信息
        $mas['id'] = array('in',$powArr);
        $mas['status'] = '1';
        $warehouse = M('warehouse')->where($mas)->field('id,name')->select();
        $p_id = $_GET['p_id'];
        $k_id = $_GET['k_id'];
        $product = $x->getProductcode();
        if (!empty($p_id)){
            $map['stock.pid'] = array('eq',$p_id);
        }
        if (!empty($k_id)){
            $map['stock_form.warehouse_id'] = array('eq',$k_id);
        }else{
            $map['stock_form.warehouse_id'] = array('in',$powArr);
        }

        $result = $m->searchTransport($map);
        $this->assign('k_id',$k_id);
        $this->assign('p_id',$p_id);
        $this->assign('warehouse',$warehouse);
        $this->assign('product',$product);
        $this->assign('list',$result['list']);
        $this->display();
    }

    //完整库存查询
    public function inLibrary(){
        //获取用户查看库存权限
        $pow['uid'] = $_SESSION['user_info']['uid'];
        $pow['method'] = 'stock_get';
        $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
        $powArr = explode(",",$powerStr['range']);
        $map['warehouse.id'] = I('get.k_id');
        $map['warehouse.status'] = '1';
        $return = M('warehouse')
            ->where($map)
            ->field('
                country.currency as currency,
                country.exchange_rate as exchange_rate
            ')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->find();
        $map = array();
        $m = new \Home\Model\StockModel();
        $x = new \Home\Model\ProductModel();
        $p = new \Home\Model\Order_insideModel();
        $mas['status'] = '1';
        $mas['id'] = array('in',$powArr);
        $warehouse = M('warehouse')->where($mas)->field('id,name,englishname')->select();
        $p_id = $_GET['p_id'];
        $k_id = $_GET['k_id'];
        $product = $x->getProductcode();
        //判断搜索仓库id不为空就只执行查询条件为仓库id
        if(!empty($k_id)){
            $map['warehouse.id'] = array('eq',$k_id);
            $result = $m->onStock($map);
            foreach ($result['list'] as $k=>$v){
                $trem['order_inside.warehouse_id'] = $v['zk_id'];
                $trem['order_inside_product.pid'] = $v['pid'];
                $inside[] = $p->meanweighted($trem);
                $out_pid[] = $v['pid'];
                $out_kid[] = $v['zk_id'];
            }

            foreach ($inside as $ko=>$vo){
                //判断有最新三批相同产品就计算加权平均值,并将加权平均值赋值在库存对应的产品单价
                if (count($inside[$ko])==3||count($inside[$ko])==2){
                    foreach ($inside[$ko] as $kb=>$vb){
                        $arrtal[] = $vb['price']*$vb['num'];
                        $arrnum[] = $vb['num'];
                    }
                    //加权平均值
                    $average = array_sum($arrtal)/array_sum($arrnum);
                    //产品单价
                    $result['list'][$ko]['price'] =round($average,2);
                    unset($arrtal);
                    unset($arrnum);
                }elseif(count($inside[$ko])==1){
                    foreach ($inside[$ko] as $kc=>$vc){
                        $arrtaz[] = $vc['price'];
                    }
                    $result['list'][$ko]['price'] =$arrtaz[0];
                    unset($arrtaz);
                }
            }
            foreach($result['list'] as $k=>$v){
                //汇率
                $price=$result['list'][$k]['price']*$return['exchange_rate'];
                $arr_a[] = round($price,2)*$result['list'][$k]['number'];
                //将产品单价乘以数量算金额，放入到新数组中
            }
            $total = array_sum($arr_a);//返回数组中所有值的和。核算产品金额合计

            foreach($result['list'] as $k=>$v){
                $rmbprice = $result['list'][$k]['price']*$result['list'][$k]['number'];
                $arr_rmb[] = round($rmbprice,2);
                //将产品单价乘以数量算金额，放入到新数组中
            }
            $rmbtotal = array_sum($arr_rmb);//返回数组中所有值的和。核算产品金额合计
            $this->assign('rmbtotal',$rmbtotal);
            $this->assign('total',$total);
            $this->assign('list',$result['list']);
            $this->assign('page',$result['page']);
        }
        //判断搜索产品id和仓库id都不为空就执行查询条件为产品id和仓库id
        if(!empty($p_id)AND !empty($k_id)){
            $map['warehouse.id'] = array('eq',$k_id);
            $map['stock.pid'] = array('eq',$p_id);
            $result = $m->onStock($map);
            $allprice = $m->onStockprice($map);
            foreach($result['list'] as $k=>$v){
                $price=$result['list'][$k]['price']*$return['exchange_rate'];
                $arr_ab[] = round($price,2)*$result['list'][$k]['number'];
                //将产品单价乘以数量算金额，放入到新数组中
            }
            $total = array_sum($arr_ab);//返回数组中所有值的和。核算产品金额合计

            foreach($result['list'] as $k=>$v){
                $rmbprice = $result['list'][$k]['price']*$result['list'][$k]['number'];
                $arr_rmb[] = round($rmbprice,2);
                //将产品单价乘以数量算金额，放入到新数组中
            }
            $rmbtotal = array_sum($arr_rmb);//返回数组中所有值的和。核算产品金额合计
            $this->assign('rmbtotal',$rmbtotal);
            $this->assign('total',$total);
            $this->assign('list',$result['list']);
            $this->assign('page',$result['page']);
        }
        $this->assign('country',$return['exchange_rate']);
        $this->assign('k_id',$k_id);
        $this->assign('p_id',$p_id);
        $this->assign('warehouse',$warehouse);
        $this->assign('product',$product);
        $this->assign('currency',$return['currency']);
        $this->display();
    }

  //仓库库区的产品信息
    public function areaReservoir(){
        $m = new \Home\Model\StockModel();
        $map['stock.pid'] = I('get.pid');
        $map['stock_form.warehouse_id'] = I('get.kid');
        $result = $m->onStockarea($map);
        $this->assign('list',$result['list']);
        $this->display();
    }

    //运输中详情信息
    public function detailsTransportation(){
        $m = new \Home\Model\StockModel();
        $map['stock.pid'] = I('get.pid');
        $map['stock_form.warehouse_id'] = I('get.kid');
        $oid = trim(I('get.o_id'));
        $purchsearchod = ltrim($oid,'PO');
        if (!empty($oid)){
            $map['stock_form.order_id'] = array('eq',$purchsearchod);
        }
        $result = $m->showGood($map);
        foreach ($result['list'] as $k=>$v){
            $result['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        //判断搜索订单号查询结果为空就执行查询产品和仓库并将查询结果渲染到前端页面
        if (empty($result['list'])){
            $mam['stock.pid'] = I('get.pid');
            $mam['stock_form.warehouse_id'] = I('get.kid');
            $list = $m->showGood($mam);
            foreach ($list['list'] as $k=>$v){
                $list['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
            }
            $this->assign('list',$list['list']);
        }else{
            $this->assign('list',$result['list']);
        }
        $this->assign('oid',$oid);
        $this->assign('pid',$map['stock.pid']);
        $this->assign('kid',$map['stock_form.warehouse_id']);
        $this->display();
    }


    //新增 国家信息
    public function addCountry()
    {
        $data['countryzh']=$_POST['namezh'];
        $data['countryus']=$_POST['nameus'];
        $data['spelling']=$_POST['country_logogram'];//国家 简写
        $data['exchange_rate']=$_POST['exchange_rate'];//汇率
        $data['currency']=$_POST['currency'];//货币缩写
        $data['symbol']=$_POST['currency_symbol'];//货币符号
        //添加 一条国家记录进入数据库
        $re_info=M('country')->data($data)->add();
        $this->ajaxReturn('ok');//返回 1 为成功
    }
    //检测 国家 名称是否重复
    public function checkCountryAjax()
    {
        $key=$_POST['key'];
        $value=$_POST['value'];
        $where["$key"]=$value;
    }
    //库存产品的库区详情
    public function areaReservoirdetails(){

        $map['stock_form.position_id'] = I('get.id');//仓位id
        $map['stock.pid'] = I('get.pid');//产品id
        $list=M('stock')
            ->field('
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                product.price as price,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse_location.id as w_lid,
                warehouse_location.w_type as kqname,
                warehouse.id as zk_id,
                warehouse.name as zkname,
                warehouse.englishname as englishname,
                country.currency as spelling,
                country.exchange_rate as exchange_rate,
                stock_form.order_id as o_id,
                stock_form.id as sfid,
                stock_form.order_id as order_number
            ')
            ->where($map)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->group('stock.o_id')
            ->select();
        foreach ($list as $k=>$v){
            $list[$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $this->assign('list',$list);
        $this->display();
    }
    //todo 测试销售订单出库
    public function seareStock(){
        $m = new \Home\Model\StockModel();
        $kid['warehouse_id'] = 1;
        $kid['position_id'] = 2;
        $map[]=array('pid'=>2,'number'=>10,'oid'=>2);
//        $map[]=array('pid'=>39,'number'=>30,'oid'=>266);
        $xid = 330;
        $list = $m->outOfstock($kid,$map,$xid);
        return $list;
    }
    //todo 待删除
    public function stockQuery(){
        $sql ='SELECT
                a.pid pid,
                IFNULL(a.number, 0) enter_number,
                IFNULL(b.number, 0) out_number,
                (
                    IFNULL(a.number, 0) - IFNULL(b.number, 0)
                )  enter_out_number
            FROM
                (
                    SELECT
                        pid,
                        sum(IFNULL(number, 0)) number
                    FROM
                        stock_enter
                    WHERE 
                        state=1
                    GROUP BY
                        pid
                ) a
            left JOIN (
                SELECT
                    pid,
                    sum(IFNULL(number, 0)) number
                FROM
                    stock_out
                WHERE 
                    state=1
                GROUP BY
                    pid
            ) b ON a.pid = b.pid';
        $result = M()->query($sql);
        return $result;
    }
    //简单库存查询
    public function inventorySimple(){
        //获取用户仓库权限
        $pow['uid'] = $_SESSION['user_info']['uid'];
        $pow['method'] = 'stock_get';
        $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
        $powArr = explode(",",$powerStr['range']);
        $map['warehouse.id'] = I('get.k_id');
        $map['warehouse.status'] = '1';
        $map = array();
        $m = new \Home\Model\StockModel();
        $x = new \Home\Model\ProductModel();
        //查询该用户的仓库信息
        $mas['status'] = '1';
        $mas['id'] = array('in',$powArr);
        $warehouse = M('warehouse')->where($mas)->field('id,name,englishname')->select();
        $p_id = $_GET['p_id'];
        $k_id = $_GET['k_id'];
        $product = $x->getProductcode();
        //判断搜索仓库id不为空就只执行查询条件为仓库id
        if(!empty($k_id)){
            $map['warehouse.id'] = array('eq',$k_id);
            $result = $m->onStocksimple($map);
            $this->assign('list',$result['list']);
            $this->assign('page',$result['page']);
        }
        //判断搜索产品id和仓库id都不为空就执行查询条件为产品id和仓库id
        if(!empty($p_id)AND !empty($k_id)){
            $map['warehouse.id'] = array('eq',$k_id);
            $map['stock.pid'] = array('eq',$p_id);
            $result = $m->onStocksimple($map);
            $this->assign('list',$result['list']);
            $this->assign('page',$result['page']);
        }
        $this->assign('k_id',$k_id);
        $this->assign('p_id',$p_id);
        $this->assign('warehouse',$warehouse);
        $this->assign('product',$product);
        $this->display();
    }
    //仓库信息
    public function detail(){
        $map['warehouse.id'] = I('get.id');
        $map['warehouse.status'] = 1;
        $info = M('warehouse')
            ->where($map)
            ->field('
                warehouse.name as name,
                warehouse.englishname as englishname,
                organizationt.namezh as namezh,
                organizationt.nameus as nameus,
                country.countryzh as countryzh,
                company_configuration.address as address
            ')
            ->join('LEFT JOIN organizationt ON warehouse.company = organizationt.id')
            ->join('LEFT JOIN company_configuration ON organizationt.id = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->find();
        $this->assign('id',$map['warehouse.id']);
        $this->assign('info',$info);
        $this->display();
    }
    //获取仓库运输中订单
    public function getAjaxtransport(){
        $trem['stock_form.warehouse_id'] = I('post.id');
        $trem['stock_form.status'] = 1;
        $trem['stock_form.position_id'] = 5;//运输仓
        $trem['order_purchase_success.status'] = 1;//未收货订单
        $transportlist['list'] = M('stock_form')
            ->where($trem)
            ->field('stock_form.order_id as order_id,
            stock_form.order_type as type,
            stock_form.order_id as id,
            creation_time as creation_time')
            ->join('LEFT JOIN order_purchase_success ON stock_form.order_id = order_purchase_success.id')
            ->group('stock_form.order_id')
            ->select();
        foreach ($transportlist['list'] as $k=>$v){
            $transportlist['list'][$k]['order_id'] =str_pad($v['order_id'],11,"0",STR_PAD_LEFT);
        }
        $transportlist['count'] = count($transportlist['list']);
        $this->ajaxReturn($transportlist);
}
    //仓库历史订单 todo
    public function historicalOrder(){

        $trem['id'] = I('get.id');
        $trem['status'] = 1;
        $whouse = M('warehouse')->where($trem)->field('name,englishname')->find();
        $map['stock_form.warehouse_id'] = I('get.id');
        $map['stock_form.position_id'] = array('neq',5);//运输仓
        $map['order_purchase_success.status'] = 2;//已收货
        $list = M('stock_form')
            ->where($map)
            ->field('
                stock_form.order_type as type,
                stock_form.order_id as order_id,
                stock_form.order_id as id
                
            ')
            ->join('LEFT JOIN order_purchase_success ON stock_form.order_id = order_purchase_success.id')
           ->group('stock_form.order_type,stock_form.order_id')
            ->select();
        foreach ($list as $k=>$v){
            if ($list[$k]['type']=='采购订单'){
                $list[$k]['order_id'] =str_pad($v['order_id'],11,"0",STR_PAD_LEFT);
            }

        }
        $this->assign('name',$whouse['name']);
        $this->assign('uname',$whouse['englishname']);
        $this->assign('list',$list);
        $this->display();
    }
    //仓位信息 todo
    public function shelf(){
        $map['status'] = 1;
        $map['id'] = I('get.id');
        $warehouse = M('warehouse')->where($map)->field('name,englishname,id')->find();
        $trem['warehouse_id'] = I('get.id');
        $list = M('shelf')->where($trem)->select();
        $this->assign('list',$list);
        $this->assign('w_id',$warehouse['id']);
        $this->assign('w_name',$warehouse['name']);
        $this->assign('w_nameus',$warehouse['englishname']);
        $this->display();
    }
    //添加仓位 todo del
    public function addShelf(){
        $map['warehouse_id'] = I('post.w_id');
        if ($map['warehouse_id']){
            $data['warehouse_id'] = I('post.w_id');
            $data['name'] = I('post.name');
            $cod['name'] = I('post.name');
            $cod['warehouse_id'] = I('post.w_id');
            //查询名称重复
            $name = M('shelf')->where($cod)->field('id')->find();
            if (empty($data['name'])){
                $return = 'lo';//名称不能为空
            }elseif($name['id']){
                $return = 'ao';//名称重复
            }else{
                $data['creation_time'] = date("Y-m-d H:i:s", time());
                $data['status'] = 1;
                $data['type'] = 1;
                $result = M('shelf')->data($data)->add();
                if ($result){
                    $return = 'ok';//添加成功
                }else{
                    $return = 'no';//添加失败
                }
            }

        }else{
            $return = 'no';//添加失败
        }
        $this->ajaxReturn($return);
    }
    //仓位 启用禁用 todo
    public function editShelf(){
        $status = I('post.status');//获取禁用启用状态
        $map['id'] = I('post.id');
        switch ((int)$status){
            case 1: //不是默认仓位
                $result1 = M('shelf')->where($map)->data('status=1')->save();
                break;
            case 2://默认仓位
                $result2 = M('shelf')->where($map)->data('status=2')->save();
                break;
        }
        if($result1){
            $return = 'ok1';//启用成功
        }elseif($result2){
            $return = 'ok2';//禁用成功
        }else{
            $return = 'no';//操作失败
        }
        $this->ajaxReturn($return);
    }
    //设置默认仓位 todo ing

    public function setup(){
        //查询现在的收货仓位id
        $trem['type'] = 2;//默认收货
        $trem['status'] = 1;
        $info = M('shelf')->where($trem)->field('id')->find();
        //判断如果之前有默认收货仓位 先将之前的仓位收货状态改为1 再将现在的仓位状态改为2（默认收货）。否则如果之前没有默认仓位直接将现在的仓位设为默认仓位
        if ($info['id']){
            //设置现在仓位为默认仓位
            $map['id'] = I('post.id');
            $map['status'] = 1;
            $sql1 = M('shelf');
            $sql1->where($map)->data('type=2')->save();
            M()->startTrans(); //开启事务
            //取消之前的默认仓位
            $cop['id'] = $info['id'];
            $sql2 = M('shelf');
            $sql2->where($cop)->data('type=1')->save();

            if ($sql1>0 and $sql2>0){
                M()->commit();//提交事务
                $return = 1;
            }else{
                M()->rollback();//回滚
                $return = 0;
            }
        }else{
            $map['id'] = I('post.id');
            $map['status'] = 1;
            $sql = M('shelf');
            $sql->where($map)->data('type=2')->save();
            if ($sql){
                $return = 1;
            }else{
                $return = 0;
            }
        }
        $this->ajaxReturn($return);

    }
}