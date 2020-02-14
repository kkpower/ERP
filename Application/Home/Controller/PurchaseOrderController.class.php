<?php
namespace Home\Controller;

class PurchaseOrderController extends CommonController{

    //申请采购订单页
    //$auditstatus搜索查询状态
    public function purchaseOrder($auditstatus=false){
        $god['status'] = '1';
        $product = M('product')->where($god)->field('id,namezh')->select();//查询产品
        $mad=array();
        $mad['order_purchase.uid'] = $_SESSION['user_info']['uid'];
        $purchsearch = trim(I('get.search'));//获取搜索条件
        $purchsearchod = ltrim($purchsearch,'PO');//去除左边的PO来查询订单号
        $status = I('get.status');
        if (!empty($purchsearch)){
            $mad['order_purchase_success.id'] = array('eq',$purchsearchod);
        }
        if (!empty($status)){
            $mad['order_purchase.status'] = array('eq',$status);
        }
        if ($auditstatus){
            $trem['table'] = 'order_purchase';//采购订单表
            $trem['column'] = 'status';
            if (LANG_SET=='zh-cn'){
                $status_ex = M('status_ex')->where($trem)->field('val,namezh')->select();
            }elseif (LANG_SET=='en-us'){
                $status_ex = M('status_ex')->where($trem)->field('val,name as namezh')->select();
            }
            $mad['order_purchase.status'] = array('eq',$auditstatus);
            $this->assign('status',$auditstatus);//保持搜索审核状态
        }else{
            $trem['table'] = 'order_purchase';
            $trem['column'] = 'status';
            if (LANG_SET=='zh-cn'){
                $status_ex = M('status_ex')->where($trem)->field('val,namezh')->select();
            }elseif (LANG_SET=='en-us'){
                $status_ex = M('status_ex')->where($trem)->field('val,name as namezh')->select();
            }
            $this->assign('status',$status);
        }
        $x=new  \Home\Model\Order_purchaseModel();
        $purchaselist=$x->searchPurchase($mad);
        foreach ($purchaselist['list'] as $k=>$v){
            $purchaselist['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT); //生成采购订单号 补位0
        }
        $this->assign('status_ex',$status_ex);
        $this->assign('product',$product);//产品
        $this->assign('page',$purchaselist['page']);
        $this->assign('purchaselist',$purchaselist['list']);
        $this->assign('purchsearch',$purchsearch);
        $this->display('purchaseOrder');
    }
    public function passAudit(){
        //审核成功
        $status=3;
        $this->purchaseOrder($status);
    }
    //ajax获取运输商,仓库
    public function getAjaxdata(){
        $maa['country.status'] = 1; //国家
        $maa['organizationt.status'] = 1;   //公司
        $maa['warehouse.status']=1; //仓库
        //获取仓库
        if(LANG_SET=='zh-cn'){
            $return['warehouse'] = M('warehouse')
            ->where($maa)
                ->field('
                warehouse.id as id,
                warehouse.name as name,
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
        }elseif (LANG_SET=='en-us'){
            $return['warehouse'] = M('warehouse')
            ->where($maa)
                ->field('
                warehouse.id as id,
                warehouse.englishname as name,
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
        }
        //获取运输商
        $value['status'] = '1';
        $return['transporter'] = M('transporters')->where($value)->field('id,transporters,mode_id')->select();
        $this->ajaxReturn($return);
    }
    //ajax获取运输商的运输方式
    public function getAjaxshipping(){
        $cap['id'] = I('post.tranid');
        $cap['status'] = '1';
        $list = M('transporters')->where($cap)->field('mode_id')->find();
        $modeid = explode(",",$list['mode_id']);
        $map['status'] = '1';
        $map['id'] = array('in',$modeid);
        $return = M('transport_mode')->where($map)->field('id,mode')->select();
        $this->ajaxReturn($return);
    }
    //生成采购订单pdf
    public function purchaseOrderPdf(){
        $map['order_purchase.id'] = I('post.id');
        $mad['order_purchase_id'] = I('post.id');//采购订单id
        $m=new  \Home\Model\Order_purchaseModel();
        //查询采购订单信息
        $orderPurchase = $m->searchPurchase($map);
        $number_order = str_pad($orderPurchase['list'][0]['order_number'],11,"0",STR_PAD_LEFT);//生成采购订单号 补位0
        $x=new  \Home\Model\Order_productModel();
        //查询订单产品
        $product=$x->searchCommodity($mad);
        $tr=" ";
        $num = 0;
        foreach ($product['list'] as $k=>$v){
            $a = (int)($v['num']*$v['price']);
            $num+=$a;
        $tr=$tr."<tr><td style='border: 1px solid #ccc;'>".(string)($k+1)."</td>
        	<td style='border: 1px solid #ccc;'>".$v['bclassc_number'].'.'.$v['sclassc_number'].'.'.$v['snumber_number']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['namezh']."</td>
        	<td style='border: 1px solid #ccc;color: red;'>透明PE袋包装，贴标签</td>
        	<td style='border: 1px solid #ccc;'>".$v['price']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['num']."</td>
        	<td style='border: 1px solid #ccc;'>".(int)($v['num']*$v['price'])."</td>
        	</tr>
";
        }
        $root = __ROOT__; //项目根目录
        ob_end_clean();
        //引入类库
        Vendor('mpdf.mpdf');
        //设置中文编码
        $mpdf=new \mPDF('utf-8','A4','','宋体',0,0,20,10);
        //设置PDF页眉内容
                $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
        serif; font-size: 9pt; color: #000088;"><tr>
        <td width="80%" align="center" style="font-size:16px;">果壳技术有限公司</td>
        </tr></table>';

        //设置PDF页脚内容
                $footer='<table width="100%" style=" vertical-align: bottom; font-family:
        serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
        <td width="10%"></td>
        <td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
        <td width="10%" style="text-align: left;">页码:{PAGENO}/{nb}</td>
        </tr></table>';
        //内容部分
                $htmldata = "<div id='wrap' class='wrap' style='margin: 0 auto;padding: 20px;width: 210mm;height: 297mm;'>
			<div align='center'>
				<img src='$root/Public/pdfimg/logo.png'/>
			</div>
			<p style='line-height: 40px;font-size: 30px;margin: 0;text-align: center;'>Purchasing Order</p>
			<p style='line-height: 40px;font-size: 30px;margin: 0;text-align: center;'>采购订单</p>
			<div style='line-height: 34px;font-size: 16px;width: 80%;margin: 0 auto;'>
				<div style='width: 50%;float: left;'>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>订单号:</span>
						<span>PO$number_order</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>采购商:</span>
						<span>Yellow-price.com</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>联系人:</span>
						<span>macl joden</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>电话:</span>
						<span>18912321412</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>e-mail:</span>
						<span>34964618@qq.com</span>
					</p>
				</div>
				<div style='width: 50%;float: left;'>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>日期:</span>
						<span>{$product['list'][0]['examine_time']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>供应商:</span>
						<span>{$orderPurchase['list'][0]['suppliername']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>联系人:</span>
						<span>{$orderPurchase['list'][0]['contacts']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>电话:</span>
						<span>{$orderPurchase['list'][0]['contactnumber']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>e-mail:</span>
						<span>{$orderPurchase['list'][0]['email']}</span>
					</p>
				</div>
				<br style='clear: both;' />
			</div>
			<table style='font-size: 14px;width: 100%;border-collapse:collapse;line-height: 28px;text-align: center;'>
				<tr>
					<th style='border: 1px solid #ccc;'>序号</th>
					<th style='border: 1px solid #ccc;'>产品型号</th>
					<th style='border: 1px solid #ccc;'>产品描述</th>
					<th style='border: 1px solid #ccc;'>包装要求</th>
					<th style=\"border: 1px solid #ccc;\">单价RMB</th>
					<th style=\"border: 1px solid #ccc;\">订单数量</th>
					<th style=\"border: 1px solid #ccc;\">金额(RMB)</th>
				</tr>
				$tr
				<tr style=\"min-height: 50px;\">
					<td colspan=\"7\" style=\"text-align: left;border: 1px solid #ccc;position: relative;\">
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
					</td>
				</tr>
				<tr>
                    <td style=\"border: 1px solid #ccc;border-right: 0;\" colspan='5'></td>
                    <td style=\"border: 1px solid #ccc;border-left: 0;text-align:right;padding-right:6px;\" colspan='2'>合计：$num.00</td>
                </tr>
			</table>
			<div style=\"line-height: 30px;\">
				<p style=\"margin: 0;padding-top: 5px;\">备注：{$orderPurchase['list'][0]['remarks']}</p>
				<p style=\"margin: 0;\">1.交货期：{$orderPurchase['list'][0]['delivery_date']}日前交货，交货时附上贵司的送货单</p>
				<p style=\"margin: 0;\">2.交货地址：广州市</p>
				<p style=\"margin: 0;\">3.发货方式：<span style=\"color: red;\">寄付快递费至我司</span></p>
				<p style=\"margin: 0;\">4.付款方式：月结30天</p>
				<p style=\"margin: 0;\">5.其他：请发货前照片发至我司业务予以确认后发货，任何与采购单不符导致拒收货物造成的一切损失，供应商需无条件配合</p>
				<p style=\"margin: 0;padding-top: 12px;margin-left: 8%;width: 42%;float: left;\">采购方:Yellow-price.com Belle.Zeng </p><p style=\"margin: 0;float: left;width: 50%;text-align: right;padding-top: 12px;\">供应商:<span>{$orderPurchase['list'][0]['suppliername']}</p>
			</div>
		</div>
";
        $mpdf->showWatermarkText = true;
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($htmldata);
        $type='I'; //在线预览模式
        //$type='D'; //下载模式
        //$type='f'；生成后保存到服务器
        //$type='s'；返回字符串，此模式下$filename会被忽视
        //设置pdf显示方式
        $mpdf->SetDisplayMode('fullpage');
        $pdfname = 'PO'.$number_order.'.'.'pdf';
        $mpdf->Output($pdfname,$type);
        //直接浏览器输出pdf
    }
    //下载pdf
    public function purchaseOrderdownPdf(){
        $map['order_purchase.id'] = I('post.pid');
        $mad['order_purchase_id'] = I('post.pid');//采购订单id
        $m=new  \Home\Model\Order_purchaseModel();
        //查询采购订单
        $orderPurchase = $m->searchPurchase($map);
        $x=new  \Home\Model\Order_productModel();
        //查询订单产品
        $product=$x->searchCommodity($mad);
        $tr=" ";
        $num = 0;
        foreach ($product['list'] as $k=>$v){
            $a = (int)($v['num']*$v['price']);
            $num+=$a;
            $tr=$tr."<tr><td style='border: 1px solid #ccc;'>".(string)($k+1)."</td>
        	<td style='border: 1px solid #ccc;'>".$v['bclassc_number'].'.'.$v['sclassc_number'].'.'.$v['snumber_number']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['namezh']."</td>
        	<td style='border: 1px solid #ccc;color: red;'>透明PE袋包装，贴标签</td>
        	<td style='border: 1px solid #ccc;'>".$v['price']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['num']."</td>
        	<td style='border: 1px solid #ccc;'>".(int)($v['num']*$v['price'])."</td>
        	</tr>
";
        }
        $root = __ROOT__; //项目根目录
        //引入类库
        Vendor('mpdf.mpdf');
        //设置中文编码
        $mpdf=new \mPDF('utf-8','A4','','宋体',0,0,20,10);

        //设置PDF页眉内容
                $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
        serif; font-size: 9pt; color: #000088;"><tr>
        <td width="80%" align="center" style="font-size:16px;">果壳技术有限公司</td>
        </tr></table>';

        //设置PDF页脚内容
                $footer='<table width="100%" style=" vertical-align: bottom; font-family:
        serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
        <td width="10%"></td>
        <td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
        <td width="10%" style="text-align: left;">页码:{PAGENO}/{nb}</td>
        </tr></table>';
        //内容部分
        $htmldata = "<div id='wrap' class='wrap' style='margin: 0 auto;padding: 20px;width: 210mm;height: 297mm;'>
			<div align='center'>
				<img src='$root/Public/pdfimg/logo.png'/>
			</div>
			<p style='line-height: 40px;font-size: 30px;margin: 0;text-align: center;'>Purchasing Order</p>
			<p style='line-height: 40px;font-size: 30px;margin: 0;text-align: center;'>采购订单</p>
			<div style='line-height: 34px;font-size: 16px;width: 80%;margin: 0 auto;'>
				<div style='width: 50%;float: left;'>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>订单号:</span>
						<span>{$orderPurchase['list'][0]['order_number']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>采购商:</span>
						<span>Yellow-price.com</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>联系人:</span>
						<span>macl joden</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>电话:</span>
						<span>18912321412</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>e-mail:</span>
						<span>34964618@qq.com</span>
					</p>
				</div>
				<div style='width: 50%;float: left;'>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>日期:</span>
						<span>{$product['list'][0]['examine_time']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>供应商:</span>
						<span>{$orderPurchase['list'][0]['suppliername']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>联系人:</span>
						<span>{$orderPurchase['list'][0]['contacts']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>电话:</span>
						<span>{$orderPurchase['list'][0]['contactnumber']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>e-mail:</span>
						<span>{$orderPurchase['list'][0]['email']}</span>
					</p>
				</div>
				<br style='clear: both;' />
			</div>
			<table style='font-size: 14px;width: 100%;border-collapse:collapse;line-height: 28px;text-align: center;'>
				<tr>
					<th style='border: 1px solid #ccc;'>序号</th>
					<th style='border: 1px solid #ccc;'>产品型号</th>
					<th style='border: 1px solid #ccc;'>产品描述</th>
					<th style='border: 1px solid #ccc;'>包装要求</th>
					<th style=\"border: 1px solid #ccc;\">单价{$product['list'][0]['currency']}</th>
					<th style=\"border: 1px solid #ccc;\">订单数量</th>
					<th style=\"border: 1px solid #ccc;width: 90px;\">金额({$product['list'][0]['currency']})</th>
				</tr>
				$tr
				<tr style=\"min-height: 50px;\">
					<td colspan=\"7\" style=\"text-align: left;border: 1px solid #ccc;position: relative;\">
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
					</td>
				</tr>
				<tr>
                    <td style=\"border: 1px solid #ccc;border-right: 0;\" colspan='5'></td>
                    <td style=\"border: 1px solid #ccc;border-left: 0;\">合计:</td>
                    <td style=\"border: 1px solid #ccc;border-left: 0;\">$num.00</td>
                </tr>
			</table>
			<div style=\"line-height: 30px;\">
				<p style=\"margin: 0;padding-top: 5px;\">备注：{$orderPurchase['list'][0]['remarks']}</p>
				<p style=\"margin: 0;\">1.交货期：2018-09-28日前交货，交货时附上贵司的送货单</p>
				<p style=\"margin: 0;\">2.交货地址：广州市</p>
				<p style=\"margin: 0;\">3.发货方式：<span style=\"color: red;\">寄付快递费至我司</span></p>
				<p style=\"margin: 0;\">4.付款方式：月结30天</p>
				<p style=\"margin: 0;\">5.其他：请发货前照片发至我司业务予以确认后发货，任何与采购单不符导致拒收货物造成的一切损失，供应商需无条件配合</p>
				<p style=\"margin: 0;padding-top: 12px;margin-left: 8%;width: 42%;float: left;\">采购方:Yellow-price.com Belle.Zeng </p><p style=\"margin: 0;float: left;width: 50%;text-align: right;padding-top: 12px;\">供应商:<span>{$orderPurchase['list'][0]['suppliername']}</p>
			</div>
		</div>
";
        $mpdf->showWatermarkText = true;
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($htmldata);
//        $type='I'; //在线预览模式
//        $type='D'; //下载模式
        $type='f'; //生成后保存到服务器
        //$type='s'；返回字符串，此模式下$filename会被忽视

        //设置pdf显示方式
        $mpdf->SetDisplayMode('fullpage');
        $pdfname = $orderPurchase['list'][0]['order_number'].'.'.'pdf';
        $mpdf->Output("./Public/dom/purchase_order/".$pdfname,$type);
        exit;
    }
    //获取供应商信息
    public function getAjaxsupplier(){
        $map['state'] = 1;
        $map['status'] = 1;
        $supplier = M('supplier')->where($map)->field('id,name')->select();
        $this->ajaxReturn($supplier);
    }
    //获取供应商下的产品
    public function getAjaxproduct($superior)
    {
        $map['supplier_id']=$superior; //供应商id
        $x=new  \Home\Model\Supplier_productModel();
        $result=$x->searchSupplier($map);
        $this->ajaxReturn($result['list']);
    }
    //获取供应商下的产品
    public function getAjaxproductcurry($superior)
    {
        $map['supplier_product.supplier_id']=$superior; //供应商id
        $map['status_ex.name'] = I('post.curry');
        $x=new  \Home\Model\Supplier_productModel();
        $result=$x->searchSupplier($map);
        $this->ajaxReturn($result['list']);
    }
    //获取供应商产品单价
    public function getAjaxprice($suprice,$superior)
    {
        $map['supplier_id']=$superior; //供应商id
        $map['pid'] = $suprice; //产品id
        $x=new  \Home\Model\Supplier_productModel();
        $result=$x->searchSupplier($map);
        $this->ajaxReturn($result['list']);
    }
    //申请采购订单
    public function orderAdd(){
        if (IS_POST) {
            $supplier_pr_ido = I('post.supplier_pr_id');//供应商产品id
            $numa = I('post.num');//产品数量
            $data['status'] = 1;//待审核
            $data['supplier_id'] = I('post.supplier_id');//供应商id
            $data['warehouse_id'] = I('post.warehouse_id');//库位id
            $data['transporter'] = I('post.transporter');//运输商
            $data['tracking_number'] = I('post.trackingnumber');//物流追踪号
            $data['creationtime'] = date("Y-m-d H:i:s", time());//申请时间
            $data['uid'] = $_SESSION['user_info']['uid'];//申请人
            $data['examine_id'] = 0;//审核人id 默认0
            $data['transport'] = I('post.transport');//运输方式
            $data['state'] = 1;//状态
            $data['freight'] = I('post.freight');//运费
            $data['remarks'] = I('post.remarks');//采购备注
            $oldtime = strtotime(I('post.date'));
            $data['delivery_date'] = date("Y-m-d",$oldtime);
            foreach ($numa as $k => $v) {
                $sup = $supplier_pr_ido[$k];
                $number = $numa[$k];
                //判断只要有一个条件不为空就返回no
                if (empty($data['transporter'])||empty($data['supplier_id']) || empty($data['warehouse_id']) || empty($sup) || empty($number) || empty($data['transport'])||empty($data['delivery_date'])) {
                    $this->ajaxReturn('NO');
                    die();
                }
            }
            $numd = I('post.num');
            $minimum = I('post.minimum'); //最小采购量
            $packing = I('post.packing');//最小包装数
            $result = true;
            for($i=0;$i<sizeof($numd);$i++){
                if(!isset($minimum[$i])) break;
                //判断采购量小于最小采购量就返回false
                if((int)$numd[$i] < (int)$minimum[$i]){
                    $result =false;
                }
            }
            //判断供应商产品不重复并且采购量大于或等于最小采购量程序就往下执行
            if (count($supplier_pr_ido) == count(array_unique($supplier_pr_ido)) AND $result) {
                $rtes = false;
                for($i=0;$i<sizeof($numd);$i++){
                    if(!isset($numd[$i])) break;
                    //判断最小包装数能否被最小采购量整除
                    if($numd[$i]%$packing[$i]==0){
                        $arr[] =2;
                    }
                }
                if (count($numd)==count($arr)){
                    $rtes=true;
                }
                if ($rtes){
                    $currency = I('post.currency');
                    if(count(array_unique($currency))==1||count($currency)==1){ //判断币种是否一致
                        //申请采购订单添加
                        $infod = M('order_purchase')->data($data)->add();
                        $value['o_id'] = (int)$infod; //订单号id
                        $value['creationtime'] = date("Y-m-d H:i:s", time()); //创建时间
                        $value['uid'] = $_SESSION['user_info']['uid'];  //操作用户id
                        $value['remarks'] = I('post.remarks');  //备注
                        $value['status'] = 1;
                        $value['action'] = 1;//已申请类型
                        //添加采购订单操作日志
                        $infom = M('order_purchase_process')->data($value)->add();
                        $price = I('post.price');//产品单价
                        $supplier_pr_id = I('post.supplier_pr_id');//产品id
                        $num = I('post.num');
                        $cnum = I('post.cnum');//箱子数量
                        $xid = I('post.xid');//产品数量
                        //添加箱子
                        foreach($cnum as $k=>$v){
                            $cadate['state'] = 1;
                            $cadate['order_purchase_id'] = (int)$infod; //采购订单id
                            $cadate['type'] = 1;//未收货
                            $cadate['creation_time'] =  date("Y-m-d H:i:s", time()); //发货时间
                            $caseid = M('order_purchase_case')->data($cadate)->add();
                            //在箱子内添加产品数量
                            foreach ($cnum[$k] as $kc=>$vc){
                                $bato['pid'] = $xid[$k][$kc];
                                $bato['num'] = $vc;
                                $bato['status'] = 1;
                                $bato['order_purchase_case'] = (int)$caseid;    //箱子id
                                $inrt = M('order_purchase_case_product')->data($bato)->add();
                            }
                        }
                        foreach ($num as $k => $v) {
                            $map['supplier_pr_id'] = $supplier_pr_id[$k];//供应商产品id
                            $map['order_purchase_id'] = (int)$infod;//新增订单号id
                            $map['num'] = $num[$k]; //数量
                            $map['price'] = $price[$k]; //单价
                            $map['total'] =   intval(strval($num[$k]*$price[$k]));//总价
                            $map['currency'] = $currency[$k];   //币种
                            $map['status'] = '1';//状态
                            $result = M('order_product')->data($map)->add();//订单产品
                        }
                        $type = 50; //通知类型:紧急通知
                        $direction = 'PurchaseOrder/trialOrder';
                        $text_id = 2;
                        $d = new \Home\Model\NoticeModel();
                        $return = $d->addnotice($type,$text_id,$direction);
                        $goback = 'OK'; //申请成功
                    }else{
                        $goback = 'FO'; //产品币种必须一致
                    }
                }else{
                    $goback = 'FK'; //最小采购量不是最小包装数的倍数
                }
            }else{
                $goback = 'KO'; //最小采购量不是最小包装数的倍数
            }
            $this->ajaxReturn($goback);
        }
    }
    //添加通知
    public function noticeNew(){
        $type = I('post.type');
        switch ($type){
            case 1:     // 初审订单
                $data['type'] = 50; //通知类型:紧急通知
                $data['ruid'] = 1; //收件人
                $data['direction'] = 'PurchaseOrder/trialOrder';
                $data['text_id'] = 2;
                $data['create_time'] = date("Y-m-d H:i:s", time());
                $data['status'] = 1;
                $return = M('notice')->data($data)->add();
                $this->ajaxReturn($return);
                break;
            case 2:     //复审订单
                $status = I('post.status');
                switch ($status){
                    case 29: //初审通过
                        $data['type'] = 50; //通知类型:紧急通知
                        $data['ruid'] = 1; //收件人
                        $data['direction'] = 'PurchaseOrder/paymentOrder';
                        $data['text_id'] = 3;
                        $data['create_time'] = date("Y-m-d H:i:s", time());
                        $data['status'] = 1;
                        $return = M('notice')->data($data)->add();
                        $this->ajaxReturn($return);
                        break;
                    case 27:    //审核未通过
                        $data['type'] = 52; //通知类型:一般通知
                        $data['ruid'] = 1; //收件人
                        $data['direction'] = 'PurchaseOrder/purchaseOrder';
                        $data['text_id'] = 4;
                        $data['create_time'] = date("Y-m-d H:i:s", time());
                        $data['status'] = 1;
                        $return = M('notice')->data($data)->add();
                        $this->ajaxReturn($return);
                        break;
                }
                break;
            case 3:     //申请订单
                $data['type'] = 52; //通知类型:一般通知
                $data['ruid'] = 1; //收件人
                $data['direction'] = 'PurchaseOrder/purchaseOrder';
                $data['text_id'] = 4;
                $data['create_time'] = date("Y-m-d H:i:s", time());
                $data['status'] = 1;
                $return = M('notice')->data($data)->add();
                if ($return){
                    $this->ajaxReturn('bk');
                }
                break;
        }
    }
    //初审采购订单页
    public function trialOrder(){
        $map['state']=1;
        $map['type'] = '1';
        $mad=array();
        $mad['order_purchase.status'] = 1;
        $x=new  \Home\Model\Order_purchaseModel();
        $purchaselist=$x->searchpayment($mad);
        //将采购订单的id补位0 生成采购号
        foreach ($purchaselist['list'] as $k=>$v){
            $purchaselist['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $this->assign('page',$purchaselist['page']);
        $this->assign('purchaselist',$purchaselist['list']);
        $this->display();
    }

    //采购订单复审页
    public function paymentOrder(){
        $map['state']=1;
        $map['type'] = '1';
        $mad=array();
        $mad['order_purchase.status'] = 2;  //初审通过
        $x=new  \Home\Model\Order_purchaseModel();
        $purchaselist=$x->searchPurchase($mad);
        //将采购订单的id补位0 生成采购号
        foreach ($purchaselist['list'] as $k=>$v){
            $purchaselist['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $this->assign('page',$purchaselist['page']);
        $this->assign('purchaselist',$purchaselist['list']);
        $this->display();
    }
    //采购订单的产品信息
    public function productDetails(){
        $map['order_purchase.id'] = I('get.id');
        $mad=array();
        $mad['order_purchase_id'] = I('get.id');//采购订单id
        $purchsearch = trim(I('get.search'));//获取搜索条件 产品名称
        if (!empty($purchsearch))
        {
            $mad['product.namezh'] = array('like', "%" .$purchsearch. "%", 'or');
        }
        $x=new  \Home\Model\Order_productModel();
        $poductlist=$x->searchCommodity($mad);//订单产品
        $m=new  \Home\Model\Order_purchaseModel();
        $orderPurchase = $m->searchPurchase($map);//采购订单
        //将采购订单的id补位0 生成采购号
        $orderPurchase['list'][0]['order_number'] = str_pad($orderPurchase['list'][0]['order_number'],11,"0",STR_PAD_LEFT);
        $this->assign('orderPurchase',$orderPurchase['list'][0]);
        $this->assign('gid', $mad['order_purchase_id']);
        $this->assign('productlist',$poductlist['list']);
        $this->assign('productname',$purchsearch);
        $this->display();
    }
    //初审采购订单的产品详情页
    public function productDetailsone(){
        $mab['state']=1;
        $mab['type'] = '1';//待检仓
        $map['order_purchase.id'] = I('get.id');
        $map['order_purchase.status'] = 1;//待审核
        $mad=array();
        $mad['order_purchase_id'] = I('get.id');//采购订单id
        $purchsearch = trim(I('get.search'));//获取搜索条件
        if (!empty($purchsearch))
        {
            $mad['product.namezh'] = array('like', "%" .$purchsearch. "%", 'or');
        }
        $x=new  \Home\Model\Order_productModel();
        $poductlist=$x->searchCommodity($mad);//订单产品
        $m=new  \Home\Model\Order_purchaseModel();
        $orderPurchase = $m->searchpayment($map);//采购订单
        //将采购订单的id补位0 生成采购号
        $orderPurchase['list'][0]['order_number'] = str_pad($orderPurchase['list'][0]['order_number'],11,"0",STR_PAD_LEFT);
        $this->assign('orderPurchase',$orderPurchase['list'][0]);
        $this->assign('gid', $mad['order_purchase_id']);
        $this->assign('productlist',$poductlist['list']);
        $this->assign('productname',$purchsearch);
        $this->display();
    }
    //复审采购订单的产品详情页
    public function productDetailstwo(){
        $mab['state']=1;
        $mab['type'] = '1';//待检仓
        $map['order_purchase.id'] = I('get.id');
        $map['order_purchase.status'] = 2;//初审通过
        $mad=array();
        $mad['order_purchase_id'] = I('get.id');
        $purchsearch = trim(I('get.search'));//获取搜索条件
        if (!empty($purchsearch))
        {
            $mad['product.namezh'] = array('like', "%" .$purchsearch. "%", 'or');
        }
        $x=new  \Home\Model\Order_productModel();
        $poductlist = $x->searchCommodity($mad);//订单产品
        $m=new  \Home\Model\Order_purchaseModel();
        $orderPurchase = $m->searchpayment($map);//采购订单
        //将采购订单的id补位0 生成采购号
        $orderPurchase['list'][0]['order_number'] = str_pad($orderPurchase['list'][0]['order_number'],11,"0",STR_PAD_LEFT);
        $this->assign('orderPurchase',$orderPurchase['list'][0]);
        $this->assign('gid',$mad['order_purchase_id']);
        $this->assign('productlist',$poductlist['list']);
        $this->assign('productname',$purchsearch);
        $this->display();
    }
    //修改采购订单信息
    public function editOrderinfo(){
        if (IS_POST) {
            $map['id'] = I('post.id');
            $data['warehouse_id'] = I('post.warehouse_id');//仓库库区id
            $data['transporter'] = I('post.transporter');//运输商
            $data['transport'] = I('post.transport');//运输方式
            $data['freight'] = I('post.freight');//运费
            $data['remarks'] = I('post.remarks');//采购备注

            if (!empty($data['warehouse_id']) AND !empty($data['transport'])) {
                $repair = M('order_purchase')->where($map)->save($data);
                $this->ajaxReturn($repair);
            }
        }
    }
    //修改采购订单产品
    public function editOrdergoods(){
        if (IS_POST){
            $map['id'] = I('post.odid');//采购订单id
            $data['supplier_pr_id'] = I('post.supplier_pr_id');//产品id
            $data['num'] = I('post.num');//数量
            $data['price'] = I('post.pricek');
            $data['currency'] = I('post.curry');
            if (!empty($data['supplier_pr_id']) AND !empty($data['num'])){
                $repair = M('order_product')->where($map)->save($data);
                $this->ajaxReturn($repair);
            }
        }

    }
    //重新申请 todo
    public function applyAgain(){
        if (IS_POST){
            $map['id'] = I('post.id');
            $data['status'] = 28;
            $data['state'] = 1;
            $data['creationtime'] = date("Y-m-d H:i:s", time());
            $data['examine_id'] = 0; //审核人
            $data['examine_time'] = null;//审核时间
            $info = M('order_purchase')->where($map)->save($data);
            $list = M('order_purchase')->where($map)->field('remarks')->find();
            $value['o_id'] = I('post.id');
            $value['creationtime'] = date("Y-m-d H:i:s", time());
            $value['uid'] = $_SESSION['user_info']['uid'];
            $value['remarks'] = $list['remarks'];
            $value['status'] = 1;
            $value['action'] = 4;
            $process = M('order_purchase_process')->data($value)->add();
            //生成系统通知
            $type = 50; //通知类型:紧急通知
            $direction = 'PurchaseOrder/trialOrder'; //模块和方法,指向查询页面
            $text_id = 2;
            $d = new \Home\Model\NoticeModel();
            $return = $d->addnotice($type,$text_id,$direction);
            $this->ajaxReturn($info);
        }else{
            $this->ajaxReturn('NO');
        }
    }
    //初审采购订单信息
    public function examineOrders(){
        $mad['order_purchase_id'] = I('post.id');//采购订单id
        $x=new  \Home\Model\Order_productModel();
        $m=new  \Home\Model\Order_purchaseModel();
        $map['order_purchase.id'] = I('post.id');
        $map['order_purchase.status'] = 1;//待审核
        $poductlist['info'] = $m->searchpayment($map);//采购订单信息
        $poductlist['list']=$x->searchProduct($mad); //采购订单产品信息
        $this->ajaxReturn($poductlist);
    }
    //复审采购订单信息
    public function reviewOrders(){
        $mad['order_purchase_id'] = I('post.id');//采购订单id
        $x=new  \Home\Model\Order_productModel();
        $m=new  \Home\Model\Order_purchaseModel();
        $map['order_purchase.id'] = I('post.id');
        $map['order_purchase.status'] = 2;//复审
        $poductlist['info'] = $m->searchpayment($map);//采购订单
        $poductlist['list']=$x->searchProduct($mad); //采购订单产品信息
        $this->ajaxReturn($poductlist);
    }

    //删除采购订单下的产品
    public function productDel(){
        if (IS_POST){
            $map['id'] = I('post.id');//采购订单产品id
            $data['status'] = '2';
            $info = M('order_product')->where($map)->setField($data);
            $this->ajaxReturn($info);
        }
    }
    //删除采购订单 todo
    public function orderDel(){
        if (IS_POST){
            $map['id'] = I('post.id');//采购订单id
            $oid['order_purchase_id'] = I('post.id');//采购订单id
            $product = M('order_product')->where($oid)->delete();
            if ($product==0){
                $this->ajaxReturn('NO');
            }
            if ($product>0){
                $info = M('order_purchase')->where($map)->delete();
                //执行操作日志
                $data['o_id'] = I('post.id');
                $data['creationtime'] = date("Y-m-d H:i:s", time());
                $data['uid'] = $_SESSION['user_info']['uid'];
                $data['remarks'] = '';
                $data['status'] = 1;
                $data['action'] = 5;
                $process = M('order_purchase_process')->data($data)->add();
                $this->ajaxReturn($info);
            }

        }
    }
    //初审采购订单
    public function examineOrder(){
        if (IS_POST){
                $map['id'] = I('post.id');
                $data['status'] = I('post.status');
                $data['examine_id'] = $_SESSION['user_info']['uid'];//审核人id
                $data['examine_time'] = date("Y-m-d H:i:s", time());//审核时间
                $data['reason'] = I('post.reason');//审核失败原因
                $info = M('order_purchase')->where($map)->save($data);
                $value['o_id'] = I('post.id');//订单id
                $value['creationtime'] = date('Y-m-d H:i:s',time());//创建时间
                $value['uid'] = $_SESSION['user_info']['uid'];//创建人id
                $value['remarks'] = I('post.reason');//备注
                $value['status'] = 1;
                $value['action'] = 2;//已初审
                $process = M('order_purchase_process')->data($value)->add();
                switch ($data['status']){
                    case 2: //初审通过
                        $type = 50; //通知类型:紧急通知
                        $direction = 'PurchaseOrder/paymentOrder';//模块和方法,指向查询页面
                        $text_id = 3;
                        $d = new \Home\Model\NoticeModel();
                        $return = $d->addnotice($type,$text_id,$direction);
                        break;
                    case 4:    //审核未通过
                        $type = 52; //通知类型:紧急通知
                        $direction = 'PurchaseOrder/purchaseOrder';//模块和方法,指向查询页面
                        $text_id = 4;
                        $d = new \Home\Model\NoticeModel();
                        $return = $d->addnotice($type,$text_id,$direction);
                        $trem['order_purchase_id'] = I('post.id');
                        $caselist = M('order_purchase_case')->where($trem)->field('id')->select();
                        if ($caselist){
                            $solo['state'] = 2;
                            $caseinfo = M('order_purchase_case')->where($trem)->setField($solo);
                            $dol['status'] = 2;
                            foreach ($caselist as $k=>$v){
                                $caseid[] = $v['id'];
                            }
                            $max['order_purchase_case'] = array('in',$caseid);
                            $case_product = M('order_purchase_case_product')->where($max)->save($dol);
                        }

                        break;
                }
                $this->ajaxReturn('OK');    //初审通过
        }

    }
    //复审采购订单
    public function examineTo(){
        if (IS_POST){
                $map['id'] = I('post.id');
                $data['status'] = I('post.status');//审核流程
                $ud['uid'] = $_SESSION['user_info']['uid'];
                $data['examine_id'] = $_SESSION['user_info']['uid'];//审核人
                $data['examine_time'] = date("Y-m-d H:i:s", time());//审核时间
                $data['reason'] = I('post.reason'); //备注
                $info = M('order_purchase')->where($map)->save($data);
                $lis = M('order_purchase')->where($map)->field('status')->find();
                $value['o_id'] = I('post.id'); //订单id
                $value['creationtime'] = date("Y-m-d H:i:s", time());
                $value['uid'] = $_SESSION['user_info']['uid'];
                $value['remarks'] = I('post.reason');//备注
                $value['status'] = 1;
                $value['action'] = 3;   //已复审
                $process = M('order_purchase_process')->data($value)->add(); //插入操作日志
                //生成系统通知
                $type = 52; //通知类型:紧急通知
                $direction = 'PurchaseOrder/purchaseOrder'; //模块和方法,指向查询页面
                $text_id = 4;
                $d = new \Home\Model\NoticeModel();
                $return = $d->addnotice($type,$text_id,$direction);
                if ($lis['status']==3){
                    //转移表（复审同意之后进行）
                    $porder = M('order_purchase')->where($map)->field('id,freight,supplier_id,examine_time,creationtime,uid,transport,remarks,tracking_number,transporter,delivery_date,examine_id')->find();
                    $news['ku_id'] = I('post.warehouse_id');    //仓库id
                    $news['supplier_id'] = $porder['supplier_id'];  //供应商id
                    $news['status'] = 1;
                    $news['creationtime'] = $porder['creationtime'];    //创建时间
                    $news['uid'] =  $porder['uid']; //申请人id
                    $news['examine_time'] =  $porder['examine_time'];   //审核时间
                    $news['remarks'] = $porder['remarks'];  //备注
                    $news['freight'] = $porder['freight'];  //运费
                    $news['order_number'] = $porder['id'];  //临时采购订单
                    $news['tracking_number'] = $porder['tracking_number'];  //物流追踪号
                    $news['transporter'] = $porder['transporter'];  //运输商
                    $news['examine_id'] = $porder['examine_id'];    //审核人id
                    $news['delivery_date'] = $porder['delivery_date'];  //预计交货时间
                    $news['logistics_status'] = $porder['transport'];   //物流状态
                    $mao['o_id'] = I('post.id');
                    $processb = M('order_purchase_process')
                        ->where($mao)
                        ->field('max(process_id) as process_id')
                        ->group('o_id')
                        ->select();
                    $news['process_id'] = $processb[0]['process_id'];   //当前进度
                    $purchase_success = M('order_purchase_success')->data($news)->add();

                    //仓库
                    $w_map['w_id'] =  I('post.warehouse_id');
                    $w_map['w_type'] = 5; //运输仓
                    $w_map['status'] = 1;
                    $warehouse_location = M('warehouse_location')->where($w_map)->field('id')->find();
                    //仓库下的仓位 todo
                    $cod['warehouse_id'] = I('post.warehouse_id');
                    $cod['status'] = 1;
                    $cod['type'] = 2;   //2代表默认收货仓
                    $shelf = M('shelf')->where($cod)->field('id')->order('id')->find();



                    $currency = I('post.currency');//货币
                    $supplier_pr_id = I('post.pid');//产品id
                    $num = I('post.number');//产品数量
                    $price = I('post.price');//产品单价
                    $total = I('post.total');//产品合计
                    foreach ($supplier_pr_id as $k=>$v){
                        //添加到库存详细表（入库操作进入运输仓）
                        $wf_data['order_id'] = (int)$purchase_success;//订单号
                        $wf_data['order_type'] = '采购订单';//订单类型
                        $wf_data['type'] = 10;//入库
                        $wf_data['warehouse_id'] = I('post.warehouse_id');//实体仓库id
                        $wf_data['position_id'] = (int)$warehouse_location['id'];//仓库io
                        $wf_data['shelf_id'] = $shelf['id'];    //仓位id(货架)
                        $wf_data['creation_time'] = date("Y-m-d H:i:s", time()); //创建时间
                        $wf_data['status'] = 1;
                        $stock_form = M('stock_form')->data($wf_data)->add();

                        //添加到采购订单产品表（转移表）
                        $max['order_purchase_success_id'] = (int)$purchase_success; //临时采购订单id
                        $max['supplier_pr_id'] = $supplier_pr_id[$k]; //供应商产品id
                        $max['num'] = $num[$k]; //产品数量
                        $max['price'] = $price[$k]; //单价
                        $max['total'] = $total[$k]; //合计
                        $max['currency'] = $currency[$k]; //货币
                        $max['status'] = 1;
//                        $max['collect'] = 2;//未收货
                        $product = M('order_product_success')->data($max)->add();
                        //添加到库存表
                        $data['pid'] =   $supplier_pr_id[$k];
                        $data['o_id'] = (int)$purchase_success;
                        $data['stock_form_id'] = (int)$stock_form;
                        $data['number'] = $num[$k];
                        $data['status'] = 1;//库存类型
                        $sqlb = M('stock')->data($data)->add(); //库存表
                    }
                    //  如果采购订单产品表和库存表都添加成功再进行提交 否则回滚
                    M()->startTrans();//开启事务
                    if ($product AND $sqlb){
                        M()->commit();//提交
                        $returns = 'OK';
                    }else{
                        M()->rollback();//回滚
                        $returns = 'NO';
                    }
                    //如果提交成功之后生成包装码pdf
                    if ($returns=='OK'){
                        $mal['order_purchase_case.order_purchase_id'] = I('post.id');
                        $mal['order_purchase_case.state'] = '1';
                        $list = M('order_purchase_case')
                            ->where($mal)
                            ->field('
                order_purchase_success.id as order_number,
                order_purchase_case.id as id,
                order_purchase_case.order_purchase_id as order_purchase_id
            ')
                            ->join('LEFT JOIN order_purchase ON order_purchase_case.order_purchase_id = order_purchase.id')
                            ->join('LEFT JOIN order_purchase_success ON order_purchase.id = order_purchase_success.order_number')
                            ->select();
                        foreach ($list as $k=>$v){
                            $id = $v['id'];
                            $oid = $v['order_number'];
                            $urlo = 'PN-'.$id.'-PO-'.$oid;
                            $tofal['order_number'][] = $v['order_number'];
                            $tofal['code'][]= getqrcode($urlo);
                            $may['order_purchase_case.order_purchase_id'] = $v['order_purchase_id'];
                            $may['order_purchase_case_product.order_purchase_case'] = $v['id'];
                            $may['order_purchase_case.state'] = 1;
                            $may['order_purchase_case_product.status'] = 1;
                            $tofal['product'][] = M('order_purchase_case_product')
                                ->where($may)
                                ->field('
                                product.namezh as namezh,
                                order_purchase_case_product.num as num,
                                bclass.number as bclassc_number,
                                sclass.number as sclassc_number,
                                product.number as snumber_number,
                                order_purchase_case_product.pid as pid,
                                order_purchase_success.id as order_number
                            ')
                                ->join('LEFT JOIN order_purchase_case ON order_purchase_case_product.order_purchase_case = order_purchase_case.id')
                                ->join('LEFT JOIN order_purchase ON order_purchase_case.order_purchase_id = order_purchase.id')
                                ->join('LEFT JOIN product ON order_purchase_case_product.pid = product.id')
                                ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
                                ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
                                ->join('LEFT JOIN order_purchase_success ON order_purchase.id = order_purchase_success.order_number')
                                ->select();
                        }

                        //pdf包装箱二维码
                        $orderinfo = str_pad($list[$k]['order_number'],11,"0",STR_PAD_LEFT);
                        //设置PDF页眉内容
                        $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
                        serif; font-size: 9pt; color: #000088;"><tr>
                        <td width="80%" align="center" style="font-size:16px;">果壳技术有限公司</td>
                        </tr></table>';

                        //设置PDF页脚内容
                                                $footer='<table width="100%" style=" vertical-align: bottom; font-family:
                        serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
                        <td width="10%"></td>
                        <td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
                        <td width="10%" style="text-align: left;">页码:{PAGENO}/{nb}</td>
                        </tr></table>';
                        $htmldata= '';
                        foreach ($tofal['code'] as $k=>$v){
                            $ke = $k+1;
                            $tr = "";
                            foreach ($tofal['product'][$k] as $ko=>$vo){
                                $tr=$tr."<tr>
        	<td style='border: 1px solid #ccc;'>".$vo['bclassc_number'].'.'.$vo['sclassc_number'].'.'.$vo['snumber_number']."</td>
        	<td style='border: 1px solid #ccc;'>".$vo['namezh']."</td>
        	<td style='border: 1px solid #ccc;color: red;'>".$vo['num']."</td>
        	</tr>
";
                            }
                            $htmldata =  $htmldata."
					<div style='width: 100%;height:100%;float: left;padding: 20px;box-sizing: border-box;'>
						<div style='width: 100%;'>
						<div  style='width: 70%;font-size: 16px;float: left;'>
							<p style='margin: 0;padding: 0;line-height: 36px;'>订单号：<span style='color: red;'>PO{$orderinfo}</span></p>
							<p style='margin: 0;padding: 0;line-height: 38px;'>箱号：$ke</p>
						</div>
						<div style='display: block;width: 20%;float: right;'><img style='width:100%;' src='data:image/png;base64,".$tofal['code'][$k]['data']."'>
							<p style='width: 100%;text-align: center;line-height: 14px;margin: 0;margin-left: -5px;color: #777;font-size: 14px;'>PO-{$orderinfo}CN-{$list[$k]['id']}</p>
						</div>
						<br style='clear: both;'>
						</div>
						<table style='text-align: center;border-collapse: collapse;width: 100%;line-height: 20px;float: left;'>
						    <thead>
							<tr>
								<th style='border: 1px solid #ddd;white-space: nowrap;padding:5px;'>产品料号</th>
								<th style='border: 1px solid #ddd;padding:5px;'>产品名称</th>
								<th style='border: 1px solid #ddd;white-space: nowrap;padding:5px;'>数量</th>
							</tr>
							</thead>
							<tbody>
							.$tr.
							</tbody>
						</table>
					</div>
		";
                        }
                        ob_end_clean();
                        Vendor('mpdf.mpdf');
                        //设置中文编码
                        $mpdf=new \mPDF('utf-8','A4','','宋体',0,0,20,10);
                        $mpdf->showWatermarkText = true;
                        $mpdf->SetHTMLHeader($header); //头部
                        $mpdf->SetHTMLFooter($footer);  //脚部
                        $mpdf->WriteHTML($htmldata); //身体
                        $type = 'f';
                        //设置pdf显示方式
                        $mpdf->SetDisplayMode('fullpage');
                        $pdfname = 'PO'.$orderinfo.'.'.'pdf';
                        $mpdf->Output("./Public/dom/packingcode/".$pdfname,$type);

                        //生成采购订单产品二维码
                        $mad['order_purchase_success.id'] = (int)$purchase_success;//采购订单id
                        $orderinfos = str_pad($mad['order_purchase_success.id'],11,"0",STR_PAD_LEFT);
                        $x=new  \Home\Model\Order_product_successModel();
                        $productlist=$x->searchCommodity($mad);//订单产品
                        foreach ($productlist['list'] as $k=>$v){
                            $oid = (int)$purchase_success;
                            $url = 'PN-'.$v['supplier_pr_id'].'-PO-'.$oid;
                            $code[]= getqrcode($url);
                        }
                        foreach($code as $k=>$v){
                            //  设置文件路径和文件前缀名称
                            $dir = "./Public/dom/productcode/PO$orderinfos";
                            //判断目录,没有则创建
                            is_dir($dir) OR mkdir($dir, 0777, true);
                            $svghtml = "<svg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <image x='0' y='0'
                            width='150' height='150'
                            xlink:href='data:image/png;base64,".$code[$k]['data']."'/>
                        </svg>";
                            //保存在"./Public/dom/productcode/PO$orderinfos/"文件夹中
                            $imageName ="./Public/dom/productcode/PO$orderinfos/".$code[$k]['number'].'.svg';
                            $fp=fopen($imageName,"w+");
                            fputs($fp,$svghtml);
                            fclose($fp);
                        }
                    }
                }else{
                    //审核拒绝后将包装箱状态改为2
                    $trem['order_purchase_id'] = I('post.id');
                    $caselist = M('order_purchase_case')->where($trem)->field('id')->select();
                    $solo['state'] = 2;
                    $caseinfo = M('order_purchase_case')->where($trem)->setField($solo);
                    $dol['status'] = 2;
                    foreach ($caselist as $k=>$v){
                        $caseid[] = $v['id'];
                    }
                    $max['order_purchase_case'] = array('in',$caseid);
                    $case_product = M('order_purchase_case_product')->where($max)->save($dol);
                    if($case_product){
                        $returns = 'SO';//审核成功
                    }else{
                        $returns = 'NO';//审核失败
                    }
                }
        }
        $this->ajaxReturn($returns);
    }

    //收货异常处理页 todo
    public function bnormaGoods(){
//        $odnumber = trim(I('get.search'));
//        $x = new \Home\Model\Order_product_successModel();
//        $map = array();
//        $purchsearchod = ltrim($odnumber,'PO');
//        if (!empty($odnumber)){
//            $map['order_purchase_success.id'] = array('eq',$purchsearchod);
//        }
//        $map['order_product_success.abnormal'] = array('neq','1');
//        $map['order_product_success.collect'] = '1';
//        $purchase_success = $x->receiptAbnormal($map);
//        foreach ($purchase_success['list'] as $k=>$v){
//            $purchase_success['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
//        }
//        $this->assign('odnumber',$odnumber);
//        $this->assign('list',$purchase_success['list']);
//        $this->assign('page',$purchase_success['page']);
        $this->display();
    }

    //收货异常处理详情页 todo
    public function bnormaGoodsdetails(){
        $map['order_purchase_success.id'] = I('get.id');
        $mad['order_product_success.order_purchase_success_id'] = I('get.id');
        $x=new  \Home\Model\Order_purchase_successModel();
        $purchaselist = $x->searchCompleted($map);
        $m=new  \Home\Model\Order_product_successModel();
        $purchsearch = trim(I('get.search'));//获取搜索条件 产品名称
        if (!empty($purchsearch))
        {
            $mad['product.namezh'] = array('like', "%" .$purchsearch. "%", 'or');
        }
        $mad['order_product_success.abnormal'] = array('neq','1');
        $mad['order_product_success.collect'] = 1;
        $poductlist=$m->searchCommodity($mad);//订单产品
        $purchase_successid =str_pad( $map['order_purchase_success.id'],11,"0",STR_PAD_LEFT);
        $this->assign('purchase_successid',$purchase_successid);
        $this->assign('purchaselist',$purchaselist['list'][0]);
        $this->assign('gid',$mad['order_product_success.order_purchase_success_id']);
        $this->assign('productlist',$poductlist['list']);
        $this->display();
    }
    //已发货订单 todo
    public function completeOrder(){
        $x=new  \Home\Model\Order_purchase_successModel();
        $map=array();
        $oid = trim(I('get.search'));
        $purchsearchod = ltrim($oid,'PO');
        if (!empty($oid)){
            $map['order_purchase_success.id'] = array('eq',$purchsearchod);
        }
        $purchaselist = $x->searchCompleted($map);
        foreach ($purchaselist['list'] as $k=>$v){
            $purchaselist['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $this->assign('oid',$oid);
        $this->assign('purchaselist',$purchaselist['list']);
        $this->assign('page',$purchaselist['page']);
        $this->display();
    }
    //已完成采购订单详情
    public function completedDetails(){
        $map['order_purchase_success.id'] = I('get.id');
        $purchsearchid = str_pad( $map['order_purchase_success.id'],11,"0",STR_PAD_LEFT);
        $x=new  \Home\Model\Order_purchase_successModel();
        $purchaselist = $x->searchCompleted($map);
        if ($purchaselist['list'][0]){
            $trem['order_purchase_id'] = $purchaselist['list'][0]['temporary_oid'];
            $list = M('order_purchase_case')->where($trem)->field('id,type,creation_time,order_purchase_id')->select();
            $this->assign('list',$list);
        }

        $this->assign('purchsearchid',$purchsearchid);
        $this->assign('purchaselist',$purchaselist['list'][0]);
        $this->display();
    }

    //在线生成采购订单pdf （预览）
    public function purchase_successOrderPdf(){
        $map['order_purchase_success.id'] = I('post.id');
        $mad['order_purchase_success_id'] = I('post.id');//采购订单id
        $m=new  \Home\Model\Order_purchase_successModel();
        $orderPurchase = $m->searchCompleted($map);//采购订单
        $number_order = str_pad($orderPurchase['list'][0]['order_number'],11,"0",STR_PAD_LEFT);
        $x=new  \Home\Model\Order_product_successModel();
        $product=$x->searchCommodity($mad);//订单产品
        $tr=" ";
        $num = 0;
        foreach ($product['list'] as $k=>$v){
            $a = (int)($v['num']*$v['price']);
            $num+=$a;
            $tr=$tr."<tr><td style='border: 1px solid #ccc;'>".(string)($k+1)."</td>
        	<td style='border: 1px solid #ccc;'>".$v['bclassc_number'].'.'.$v['sclassc_number'].'.'.$v['snumber_number']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['namezh']."</td>
        	<td style='border: 1px solid #ccc;color: red;'>透明PE袋包装，贴标签</td>
        	<td style='border: 1px solid #ccc;'>".$v['price']."</td>
        	<td style='border: 1px solid #ccc;'>".$v['num']."</td>
        	<td style='border: 1px solid #ccc;'>".(int)($v['num']*$v['price'])."</td>
        	</tr>
";
        }
        $root = __ROOT__; //项目根目录
        ob_end_clean();
        //引入类库
        Vendor('mpdf.mpdf');
        //设置中文编码
        $mpdf=new \mPDF('utf-8','A4','','宋体',0,0,20,10);
//        $mpdf->SetWatermarkText('果壳技术',0.1);//水印

    //设置PDF页眉内容
            $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
    serif; font-size: 9pt; color: #000088;"><tr>
    <td width="80%" align="center" style="font-size:16px;">果壳技术有限公司</td>
    </tr></table>';

    //设置PDF页脚内容
            $footer='<table width="100%" style=" vertical-align: bottom; font-family:
    serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
    <td width="10%"></td>
    <td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
    <td width="10%" style="text-align: left;">页码:{PAGENO}/{nb}</td>
    </tr></table>';
        //内容部分
        $htmldata = "<div id='wrap' class='wrap' style='margin: 0 auto;padding: 20px;width: 210mm;height: 297mm;'>
			<div align='center'>
				<img src='$root/Public/pdfimg/logo.png'/>
			</div>
			<p style='line-height: 40px;font-size: 30px;margin: 0;text-align: center;'>Purchasing Order</p>
			<p style='line-height: 40px;font-size: 30px;margin: 0;text-align: center;'>采购订单</p>
			<div style='line-height: 34px;font-size: 16px;width: 80%;margin: 0 auto;'>
				<div style='width: 50%;float: left;'>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>订单号:</span>
						<span>PO{$number_order}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>采购商:</span>
						<span>Yellow-price.com</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>联系人:</span>
						<span>macl joden</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>电话:</span>
						<span>18912321412</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>e-mail:</span>
						<span>34964618@qq.com</span>
					</p>
				</div>
				<div style='width: 50%;float: left;'>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>日期:</span>
						<span>{$orderPurchase['list'][0]['examine_time']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>供应商:</span>
						<span>{$orderPurchase['list'][0]['suppliername']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>联系人:</span>
						<span>{$orderPurchase['list'][0]['contacts']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>电话:</span>
						<span>{$orderPurchase['list'][0]['contactnumber']}</span>
					</p>
					<p style='margin: 0;'>
						<span style='font-weight: bold;width: 80px;display: inline-block;'>e-mail:</span>
						<span>{$orderPurchase['list'][0]['email']}</span>
					</p>
				</div>
				<br style='clear: both;' />
			</div>
			<table style='font-size: 14px;width: 100%;border-collapse:collapse;line-height: 28px;text-align: center;'>
				<tr>
					<th style='border: 1px solid #ccc;'>序号</th>
					<th style='border: 1px solid #ccc;'>产品型号</th>
					<th style='border: 1px solid #ccc;'>产品描述</th>
					<th style='border: 1px solid #ccc;'>包装要求</th>
					<th style=\"border: 1px solid #ccc;\">单价{$product['list'][0]['currency']}</th>
					<th style=\"border: 1px solid #ccc;\">订单数量</th>
					<th style=\"border: 1px solid #ccc;width: 90px;\">金额({$product['list'][0]['currency']})</th>
				</tr>
				$tr
				<tr style=\"min-height: 50px;\">
					<td colspan=\"7\" style=\"text-align: left;border: 1px solid #ccc;position: relative;\">
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
						<img src=\"$root/Public/img/HBuilder.png\" style=\"width: 18%;float: left;margin:1%;\" />
					</td>
				</tr>
				<tr>
				<td style=\"border: 1px solid #ccc;border-right: 0;\" colspan='6'></td>
				<td style=\"border: 1px solid #ccc;border-left: 0;\">合计:$num.00{$product['list'][0]['currency']}</td>
</tr>
			</table>
			<div style=\"line-height: 30px;\">
				<p style=\"margin: 0;padding-top: 5px;\">备注：{$orderPurchase['list'][0]['remarks']}</p>
				<p style=\"margin: 0;\">1.交货期：2018-09-28日前交货，交货时附上贵司的送货单</p>
				<p style=\"margin: 0;\">2.交货地址：广州市</p>
				<p style=\"margin: 0;\">3.发货方式：<span style=\"color: red;\">寄付快递费至我司</span></p>
				<p style=\"margin: 0;\">4.付款方式：月结30天</p>
				<p style=\"margin: 0;\">5.其他：请发货前照片发至我司业务予以确认后发货，任何与采购单不符导致拒收货物造成的一切损失，供应商需无条件配合</p>
				<p style=\"margin: 0;padding-top: 12px;margin-left: 8%;width: 42%;float: left;\">采购方:Yellow-price.com Belle.Zeng </p><p style=\"margin: 0;float: left;width: 50%;text-align: right;padding-top: 12px;\">供应商:<span>{$orderPurchase['list'][0]['suppliername']}</p>
			</div>
		</div>
";
        $mpdf->showWatefrmarkText = true;
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($htmldata);
        //保存guoke.pdf文件
        $type='I'; //在线预览模式
        //$type='D'; //下载模式
        //$type='f'；生成后保存到服务器
        //$type='s'；返回字符串，此模式下$filename会被忽视
        //设置pdf显示方式
        $mpdf->SetDisplayMode('fullpage');
        $pdfname ='PO'.$number_order.'.'.'pdf';
        $mpdf->Output($pdfname,$type);
        //直接浏览器输出pdf
    }

    //查看包装箱内产品数量
    public function codePacking(){
        $map['order_purchase_case.order_purchase_id'] = I('get.oid');
        $map['order_purchase_case_product.order_purchase_case'] = I('get.id');
        $map['order_purchase_case.state'] = 1;
        $map['order_purchase_case_product.status'] = 1;
        $list  = M('order_purchase_case_product')
            ->where($map)
            ->field('
                product.namezh as namezh,
                order_purchase_case_product.num as num,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                order_purchase_case_product.pid as pid,
                order_purchase.id as order_number
            ')
            ->join('LEFT JOIN order_purchase_case ON order_purchase_case_product.order_purchase_case = order_purchase_case.id')
            ->join('LEFT JOIN order_purchase ON order_purchase_case.order_purchase_id = order_purchase.id')
            ->join('LEFT JOIN product ON order_purchase_case_product.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->select();
        foreach ($list as $k=>$v){
            $list[$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $this->assign('list',$list);
        $this->display();
    }
    //查询采购订单箱子 预览pdf
    public function boxPacking(){
        $mal['order_purchase_case.order_purchase_id'] = I('post.id');
        $mal['order_purchase_case.state'] = '1';
        $list = M('order_purchase_case')
            ->where($mal)
            ->field('
                order_purchase_success.id as order_number,
                order_purchase_case.id as id,
                order_purchase_case.order_purchase_id as order_purchase_id
            ')
            ->join('LEFT JOIN order_purchase ON order_purchase_case.order_purchase_id = order_purchase.id')
            ->join('LEFT JOIN order_purchase_success ON order_purchase.id = order_purchase_success.order_number')
            ->select();
        foreach ($list as $k=>$v){
            $id = $v['id'];
            $oid = $v['order_number'];
            $url = 'PN-'.$id.'-PO-'.$oid;
            $tofal['order_number'][] = $v['order_number'];
            $tofal['code'][]= getqrcode($url);

            $may['order_purchase_case.order_purchase_id'] = $v['order_purchase_id'];
            $may['order_purchase_case_product.order_purchase_case'] = $v['id'];
            $may['order_purchase_case.state'] = 1;
            $may['order_purchase_case_product.status'] = 1;
            $tofal['product'][] = M('order_purchase_case_product')
                ->where($may)
                ->field('
                product.namezh as namezh,
                order_purchase_case_product.num as num,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                order_purchase_case_product.pid as pid,
                order_purchase.id as order_number
            ')
                ->join('LEFT JOIN order_purchase_case ON order_purchase_case_product.order_purchase_case = order_purchase_case.id')
                ->join('LEFT JOIN order_purchase ON order_purchase_case.order_purchase_id = order_purchase.id')
                ->join('LEFT JOIN product ON order_purchase_case_product.pid = product.id')
                ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
                ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
                ->select();
        }
        $orderinfo = str_pad($list[$k]['order_number'],11,"0",STR_PAD_LEFT);
        //设置PDF页眉内容
        $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
serif; font-size: 9pt; color: #000088;"><tr>
<td width="80%" align="center" style="font-size:16px;">果壳技术有限公司</td>
</tr></table>';

//设置PDF页脚内容
        $footer='<table width="100%" style=" vertical-align: bottom; font-family:
serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
<td width="10%"></td>
<td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
<td width="10%" style="text-align: left;">页码:{PAGENO}/{nb}</td>
</tr></table>';
        $htmldata= '';
        foreach ($tofal['code'] as $k=>$v){
            $ke = $k+1;
            $tr = "";
            foreach ($tofal['product'][$k] as $ko=>$vo){
                $tr=$tr."<tr>
        	<td style='border: 1px solid #ccc;'>".$vo['bclassc_number'].'.'.$vo['sclassc_number'].'.'.$vo['snumber_number']."</td>
        	<td style='border: 1px solid #ccc;'>".$vo['namezh']."</td>
        	<td style='border: 1px solid #ccc;color: red;'>".$vo['num']."</td>
        	</tr>
";
            }
            $htmldata =  $htmldata."
					<div style='width: 100%;height:100%;float: left;padding: 20px;box-sizing: border-box;'>
						<div style='width: 100%;'>
						<div  style='width: 70%;font-size: 16px;float: left;'>
							<p style='margin: 0;padding: 0;line-height: 36px;'>订单号：<span style='color: red;'>PO{$orderinfo}</span></p>
							<p style='margin: 0;padding: 0;line-height: 38px;'>箱号：$ke</p>
						</div>
						<div style='display: block;width: 20%;float: right;'><img style='width:100%;' src='data:image/png;base64,".$tofal['code'][$k]['data']."'>
							<p style='width: 100%;text-align: center;line-height: 14px;margin: 0;margin-left: -5px;color: #777;font-size: 14px;'>PO{$orderinfo}CN{$list[$k]['id']}</p>
						</div>
						<br style='clear: both;'>
						</div>
						<table style='text-align: center;border-collapse: collapse;width: 100%;line-height: 20px;float: left;'>
						    <thead>
							<tr>
								<th style='border: 1px solid #ddd;white-space: nowrap;padding:5px;'>产品料号</th>
								<th style='border: 1px solid #ddd;padding:5px;'>产品名称</th>
								<th style='border: 1px solid #ddd;white-space: nowrap;padding:5px;'>数量</th>
							</tr>
							</thead>
							<tbody>
							.$tr.
							</tbody>
						</table>
					</div>
		";
        }
        ob_end_clean();
        Vendor('mpdf.mpdf');
        //设置中文编码
        $mpdf=new \mPDF('utf-8','A4','','宋体',0,0,20,10);
        $mpdf->showWatermarkText = true;
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($htmldata);
        $type = 'I';
        //设置pdf显示方式
        $mpdf->SetDisplayMode('fullpage');
        $pdfname = 'PO'.$orderinfo.'.'.'pdf';
        $mpdf->Output($pdfname,$type);
    }
    //发送邮件 todo
    public function sendMail(){
        $path ='./Public/dom/packingcode/PO00000000276.pdf';
//        $code='rszqmomqzrdhiahg';
        $sender['mailbox'] = '1822637304@qq.com'; //发件人邮箱号
        $sender['code'] = 'rszqmomqzrdhiahg'; //邮箱授权码
        $fopen = fopen($path,'r');
//        $file = fopen($path, "r");
//        $filename = 'PO00000000332.pdf';
        sendMail('396352434@qq.com','果壳技术有限公司','采购订单包装码',$path,$sender);
    }
    //管理采购订单产品图 todo
    public function previewPdf(){
        $orderid = I('post.id');//采购订单id
        $map['order_purchase.id'] =  I('post.id');//采购订单id
        $mat['oid'] = I('post.id');
        $mat['state'] = 1;
        $productimgs = M('order_purchase_product_map')
            ->where($mat)
            ->field('
                order_purchase_product_map.id as id,
                order_purchase_product_map.product_map as product_map
            ')
            ->select();
        $ordernumber = str_pad($orderid,11,"0",STR_PAD_LEFT);
        $this->assign('ordernumber',$ordernumber);
        $this->assign('orderid',$orderid);
        $this->assign('productlist',$productimgs);
        $this->display();
    }
    //上传采购订单产品图片 todo
    public function picture(){
        $upload=new\Think\Upload();// 实例化上传类
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath=''; // 设置附件上传目录
        $upload->autoSub=false;
        $upload->rootPath='./Public/purchaseorderimg/';
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else
        {
//            $dataimg['headimg']=$info['pic1']['name'];
            //根据具体的目录来配置此项值
            $data['state'] = 1;
            $data['oid'] = I('post.getfid');
            $data['uid'] = $_SESSION['user_info']['uid'];
            $data['creation_time']=date("Y-m-d H:i:s",time());//创建时间
            $data['product_map']='/Public/purchaseorderimg/'.$info['file']['savename'];
            M('order_purchase_product_map')->data($data)->add();
        }
        $this->ajaxReturn($info);
    }
    //采购订单产品二维码
    public function productCode(){
        $mad['order_purchase_id'] = 355;//采购订单id
        $orderinfo = str_pad(355,11,"0",STR_PAD_LEFT);
        $x=new  \Home\Model\Order_productModel();
        $productlist=$x->searchCommodity($mad);//订单产品
        foreach ($productlist['list'] as $k=>$v){
            $oid = 355;
            $url = $oid.$v['supplier_pr_id'];
            $code[]= getqrcode($url);
        }
        //设置PDF页眉内容
        $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:
serif; font-size: 9pt; color: #000088;"><tr>
<td width="80%" align="center" style="font-size:16px;">果壳技术有限公司</td>
</tr></table>';

//设置PDF页脚内容
        $footer='<table width="100%" style=" vertical-align: bottom; font-family:
serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
<td width="10%"></td>
<td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
<td width="10%" style="text-align: left;">页码:{PAGENO}/{nb}</td>
</tr></table>';
        $htmldata= '';
        foreach ($code as $k=>$v){
            $ke = $k+1;
            $tr = "";

            $htmldata =  $htmldata."
					<div style=\"width: 40%;float: left;position:relative;padding: 20px;box-sizing: border-box;\">
						<div style=\"display: block;width: 50%;height:50%;position: absolute;top:20px;right:20px;\"><img style='width:100%;' src='data:image/png;base64,".$code[$k]['data']."'>
							<p style=\"width: 100%;text-align: center;line-height: 12px;margin: 0;margin-left: -5px;color: #777;font-size: 14px;\">PN-{$productlist['list'][$k]['supplier_pr_id']}-PO{$orderinfo}</p>
						</div>
					</div>
		";
        }
        ob_end_clean();
        Vendor('mpdf.mpdf');
        //设置中文编码
        $mpdf=new \mPDF('utf-8','A4','','宋体',0,0,20,10);
        $mpdf->showWatermarkText = true;
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($htmldata);
        $type = 'I';
        //设置pdf显示方式
        $mpdf->SetDisplayMode('fullpage');
        $pdfname = 'PO'.$orderinfo.'.'.'pdf';
        $mpdf->Output($pdfname,$type);
    }
    //历史订单
    public function historicalOrder(){
        $x=new  \Home\Model\Order_purchase_successModel();
        $map=array();
        $oid = trim(I('get.search'));
        //判断是不是成功订单号
        if (strpos($oid,'PO')===false){
            $return = 0;
        }else{
            $return = 1;

        }
        //如果订单号不为空且是采购订单类型就执行查询采购订单号
        if (!empty($oid)AND $return==1){
            $purchsearchod = ltrim($oid,'PO');
            $map['order_purchase_success.id'] = array('eq',$purchsearchod);
        }
        //如果订单号不为空且是不是采购订单类型就执行
        if(!empty($oid) AND $return==0){
            $map['order_purchase_success.id'] = array('eq','');
        }
        $purchaselist = $x->orderHistorical($map);
        //将采购订单id生成订单号
        foreach ($purchaselist['list'] as $k=>$v){
            $purchaselist['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $mad['status'] = 1;
        $supplier = M('supplier')->where($mad)->field('id,name')->select();
        $this->assign('supplier',$supplier);
        $this->assign('oid',$oid);
        $this->assign('purchaselist',$purchaselist['list']);
        $this->assign('page',$purchaselist['page']);
        $this->display();
    }

    //订单进度查询 todo
    public function orderAll(){
        $m = new  \Home\Model\Order_purchase_successModel();
        $oid = trim(I('get.search'));
        $sup = I('get.supplier');
        $purchsearchod = ltrim($oid,'PO');
        if (!empty($oid)){
            $map['order_purchase_success.id'] = array('eq',$purchsearchod);
        }
        if (!empty($sup)){
            $map[' supplier.id'] = array('eq',$sup);
        }
        $map['order_purchase_success.status'] = 1;
        $map['supplier.status'] = 1;
        $list = $m->orderList($map);
        foreach ($list['list'] as $k=>$v){
            $list['list'][$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT);
        }
        $trem['status'] = 1;
        $supplier = M('supplier')->where($trem)->field('id,name')->select();
        $this->assign('supplier',$supplier);
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->assign('ordernumber',$oid);
        $this->assign('supp',$sup);
        $this->display();
    }

    //订单进度详情 todo
    public function orderTracking(){
        $m = new  \Home\Model\Order_purchase_successModel();
        $map['order_purchase_success.id'] = I('get.id');
        $mad['order_purchase_success.id'] = I('get.id');
        $ordernumber = str_pad($mad['order_purchase_success.id'],11,"0",STR_PAD_LEFT);
        $list = $m->orderTracking($map,$mad);
        $this->assign('ordernumber',$ordernumber);
        $this->assign('list',$list['one']);
        $this->assign('info',$list['two']);
        $this->display();
    }
    //待收货订单 主页 todo 除了显示无作用
    public function receiptPending(){
        //获取用户仓库权限 以下全部未生效 todo
        $pow['uid'] = $_SESSION['user_info']['uid'];
        $pow['method'] = 'receipt';
        //用户收货权限$powerStr
        $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
        $powArr = explode(",",$powerStr['range']);
        $mas['id'] = array('in',$powArr);
        $mas['status'] = '1';
        $warehouse = M('warehouse')->where($mas)->field('id,name')->select();
        $this->assign('warehouse',$warehouse);
        $this->display();
    }
    //ajax获取收货信息 todo
    public function ajaxReceipt(){
        //查询包装箱产品信息
        $model = new \Home\Model\Order_purchase_caseModel();
        $cod['id'] = I('post.po');   //订单id  采购订单id
        $order_ls = M('order_purchase_success')->field('order_number')->where($cod)->find();

        $map['order_purchase_case.order_purchase_id'] = $order_ls['order_number'];   //临时订单id
        $map['order_purchase_case_product.order_purchase_case'] = I('post.pn');   //箱子id
        $list['one'] = $model->packingBox($map);
        //获取用户收货权限
        $pow['uid'] = $_SESSION['user_info']['uid'];
        $pow['method'] = 'receipt';
        $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
        $powArr = explode(",",$powerStr['range']);
        //查询订单信息
        $trem['order_purchase_success.ku_id'] = array('in',$powArr);
        $trem['order_purchase_success.id'] = I('post.po');   //订单id
        $trem['warehouse_location.w_type'] = 5;//运输仓
        $trem['warehouse_location.status'] = 1;
        $list['two'] = M('order_purchase_success')
            ->where($trem)
            ->field('
                order_purchase_success.id as id,
                order_purchase_success.id as order_number,
                order_purchase_success.examine_time as examine_time,
                order_purchase_success.tracking_number as tracking_number,
                transport_mode.mode as transport_mode_namezh,
                supplier.name as supplier_name,
                supplier.id as supplier_id,
                warehouse_location.id as warehouse_location_id,
                warehouse.id as ku_id,
                warehouse.name as ck_name,
                warehouse.englishname as ck_englishname,
                transporters.transporters as transporters
            ')
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN warehouse_location ON warehouse.id = warehouse_location.w_id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->join('LEFT JOIN transporters ON order_purchase_success.transporter = transporters.id')
            ->join('LEFT JOIN transport_mode ON  order_purchase_success.logistics_status = transport_mode.id')
            ->find();
        //查询实体仓库的待检仓
        $nod['status'] = 1;
        $nod['w_type'] = 1;//待检仓
        $nod['w_id'] = $list['two']['ku_id'];
        $list['three'] = M('warehouse_location')
            ->where($nod)
            ->field('id')
            ->find();
        //查询默认收货仓位（货架）
        $map_shelf['warehouse_id'] = $list['two']['ku_id'];
        $map_shelf['type'] = 2;//默认收货仓id
        $map_shelf['status'] = 1;
        $list['shelf'] = M('shelf')
            ->where($map_shelf)
            ->field('id')
            ->find();
        if($list['two'] and $list['one'] and $list['three']){
            $list['two']['order_number'] =str_pad( $list['two']['order_number'],11,"0",STR_PAD_LEFT);

            $this->ajaxReturn($list);
        }else{
            $this->ajaxReturn('NO');//该订单已失效
        }

    }
    //确认收货
    public function collectDo(){

        $pid = I('post.pid'); //pid
        $num = I('post.num');//数量
        $stock_form_data['order_id'] = I('post.oid');
            $stock_form_data['order_type'] = '采购订单';
        $stock_form_data['type'] = 10;
        $stock_form_data['warehouse_id'] = I('post.k_id');
        $stock_form_data['position_id'] = I('post.transport_id');//运输仓
        $stock_form_data['shelf_id'] = I('post.shelf_id');//默认收 仓位 todo del
        $stock_form_data['creation_time'] = date("Y-m-d H:i:s", time()); //创建时间
        $stock_form_data['status'] = 1;
        $stock_form_data_two['order_id'] = I('post.oid');// 采购订单号
        $stock_form_data_two['order_type'] = '采购订单';
        $stock_form_data_two['type'] = 10;
        $stock_form_data_two['warehouse_id'] = I('post.k_id');
        $stock_form_data_two['position_id'] = I('post.stay_id');//待检仓
        $stock_form_data_two['shelf_id'] = I('post.shelf_id');//默认收货货架
        $stock_form_data_two['creation_time'] = date("Y-m-d H:i:s", time()); //创建时间
        $stock_form_data_two['status'] = 1;
        //分两次添加到库存表
        // 第一次添加到运输仓 数量为负数（订单复审完进入到运输仓 数量是正数），
        // 第二次添加到待检仓 数量为正数（收货进入待检仓）
        foreach ($pid as $k=>$v){
            //第一次
            $stock_form = M('stock_form')->data($stock_form_data)->add();
            $stock_data['pid'] = $v;
            $stock_data['o_id'] = I('post.oid');
            $stock_data['stock_form_id'] = (int)$stock_form;
            $stock_data['number'] = -$num[$k];
            $stock_data['status'] = 1;
            $stock = M('stock')->data($stock_data)->add();
            //第二次
            $stock_form_two = M('stock_form')->data($stock_form_data_two)->add();
            $stock_data_two['pid'] = $v;
            $stock_data_two['o_id'] = I('post.oid');
            $stock_data_two['stock_form_id'] = (int)$stock_form_two;
            $stock_data_two['number'] = $num[$k];
            $stock_data_two['status'] = 1;
            $stock_two = M('stock')->data($stock_data_two)->add();
            //记录新增id
            $arr_stock_form[] = $stock_form;
            $arr_stock[] = $stock;
            $arr_stock_form_two[] = $stock_form_two;
            $arr_stock_two[] = $stock_two;
        }
        $cadata['type'] = 2;
        $cadata['creation_time'] =  date("Y-m-d H:i:s", time()); //收货时间
        $map['id'] = I('post.pn_id');
        // $save_case 更改分箱的收货状态
        $save_case = M('order_purchase_case')->where($map)->data($cadata)->save();
        $map_order['order_purchase_success.id'] = I('post.oid');
        $map_order['order_purchase_case.type'] = 1;//未收货
        //查询该订单 未收货的箱子
        $order = M('order_purchase_success')
            ->where($map_order)
            ->field('order_purchase_case.id')
            ->join('LEFT JOIN order_purchase_case ON order_purchase_success.order_number = order_purchase_case.order_purchase_id')
            ->select();
        //判断该订单箱子全部收货则更改订单为已收货
        if (!$order){
            $order_map['id'] = I('post.oid');
            //'status',2 为已收货
            $saveorder = M('order_purchase_success')->where($order_map)->setField('status',2);
        }
        //开启事务
        M()->startTrans();
        //判断新增id的数量相等 在进行提交
        if(count($arr_stock)==count($arr_stock_form) and count($arr_stock_two)==count($arr_stock_form_two) and $save_case>0){
            M()->commit();//提交
            $return = 'ok';
        }else{
            M()->rollback();//回滚
            $return = 'no';
        }
        $this->ajaxReturn($return);
 
    }
    //箱子内的产品信息
    public function caseproductDetails(){
        $map['order_purchase_success.order_number'] = I('get.oid');
        $purchsearchid = str_pad($map['order_purchase_success.order_number'],11,"0",STR_PAD_LEFT);
        $x=new  \Home\Model\Order_purchase_successModel();
        $purchaselist = $x->searchCompleted($map);
        if ($purchaselist['list'][0]){
            $trem['order_purchase_case_product.order_purchase_case'] = I('get.id');
            $trem['order_purchase_case_product.status']= 1;
            $list = M('order_purchase_case_product')
                ->where($trem)
                ->field('
                  bclass.number as bclassc_number,
                  sclass.number as sclassc_number,
                  product.number as snumber_number,
                  product.namezh as namezh,
                  order_purchase_case_product.pid as pid,
                  order_purchase_case_product.num as num,
                  order_purchase_case_product.pid as pid
                ')
                ->join('LEFT JOIN product ON order_purchase_case_product.pid = product.id')
                ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
                ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
                ->select();
            $pn = I('get.id');//箱号
            $this->assign('pn',$pn);
            $this->assign('list',$list);
        }

        $this->assign('purchsearchid',$purchsearchid);
        $this->assign('purchaselist',$purchaselist['list'][0]);
        $this->display();
    }
}