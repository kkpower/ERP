<?php
/**
 * Created by PhpStorm.
 * User: chy
 * Date: 2017/8/9
 * Time: 19:55
 */

namespace Home\Controller;

class SupplierController extends CommonController
{

    //供应商主页
    public function index(){
        $map=array();
        $search = trim(I('get.search'));//获取搜索条件
        if (!empty($search))
        {
            $map['supplier.name'] = array('like', "%" .$search. "%", 'or');
        }
        //查询供应商类型
        $trem['table'] = 'supplier';
        $trem['column'] = 'type';
        $suppliertype = M('status_ex')->where($trem)->field('val,namezh,name')->select();
        //查询供应商支付方式
        $trem['table'] = 'supplier';
        $trem['column'] = 'payment';
        $payment = M('status_ex')->where($trem)->field('val,namezh,name')->select();
        //查询供应商信息
        $x=new  \Home\Model\SupplierModel();
        $result=$x->listSupplier($map); //查询user_info表里的一些字段值为搜索传来的值
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->assign('payment',$payment); //支付方式
        $this->assign('suppliertype',$suppliertype);
        $this->assign('suppliername',$search);
        $this->display();
    }

    //添加供应商
    function supplierAdd(){
        if (IS_POST){
            $data['snumber'] = I('post.snumber');
            $data['name'] = I('post.name');
            $data['type'] = I('post.type');
            $data['address'] = I('post.address');
            $data['contactnumber'] = I('post.contactnumber');
            $data['contacts'] = I('post.contacts');
            $data['payment'] = I('post.payment');
            $data['weburl'] = I('post.weburl');
            $data['bank'] = I('post.bank');
            $data['account'] = I('post.account');
            $data['state'] = I('post.state');
            $data['email'] = I('post.email');
            $data['bankname'] = I('post.bankname');
            $data['remarks'] = I('post.remarks');
            $data['creationtime']=date("Y-m-d H:i:s",time());
            $data['status'] = 1;
            $data['currency'] = I('post.currencyn');
            $data['thumb'] = '/Public/default/supplier/default.png';
            //判断必填信息为空就返回no 否则返回ok
            if (empty($data['snumber']) || empty($data['name']) || empty($data['type']) || empty($data['payment'])){
                $this->ajaxReturn('NO');//添加成功
            }else{
                $info = M('supplier')->data($data)->add();
                $this->ajaxReturn('OK');//添加失败
            }
        }
    }
    //查看供应商信息
    public function detail(){
        $map['supplier.id']=I('get.id');
        $map['status_ex.table'] = 'supplier';
        $map['status_ex.column'] = 'type';
        $map['payment.table'] = 'supplier';
        $map['payment.column'] = 'payment';
        $list = M('supplier')
            ->where($map)
            ->field('
                supplier.id as id,
                supplier.snumber as snumber,
                supplier.name as name,
                supplier.type as type,
                supplier.payment as payment,
                supplier.address as address,
                supplier.contactnumber as contactnumber,
                supplier.contacts as contacts,
                supplier.weburl as weburl,
                supplier.bank as bank,
                supplier.account as account,
                supplier.state as state,
                supplier.creationtime as creationtime,
                supplier.email as email,
                supplier.bankname as bankname,
                supplier.remarks as remarks,
                supplier.thumb as thumb,
                status_ex.namezh as namezh,
                payment.namezh as namech
            ')
            ->join('LEFT JOIN status_ex ON supplier.type = status_ex.val')
            ->join('LEFT JOIN status_ex as payment ON supplier.payment = payment.val')
            ->find();
        //查询供应商类型
        $trem['table'] = 'supplier';
        $trem['column'] = 'type';
        $suppliertype = M('status_ex')->where($trem)->field('val,namezh,name')->select();
        //查询供应商支付方式
        $mod['table'] = 'supplier';
        $mod['column'] = 'payment';
        $payment = M('status_ex')->where($mod)->field('val,namezh,name')->select();
        //查询供应商执行中的订单
        $nod['supplier_id'] =   I('get.id');
        $nod['order_purchase_success.status'] = 1;

        $nod['order_purchase_case.type'] = 1;//未收货
//        $ordercount = M('order_purchase_success')
//            ->where($nod)
//            ->field('order_purchase_success.id as id')
//            ->join('LEFT JOIN order_purchase_case ON order_purchase_success.order_number = order_purchase_case.order_purchase_id')
//            ->count('distinct order_purchase_case.order_purchase_id');
//        $this->assign('ordercount',$ordercount);

        $this->assign('suppliertype',$suppliertype);
        $this->assign('payment',$payment);
        $this->assign('list',$list);
        $this->display();
    }
    //打开上传
    public function supplierAvatar(){

        $this->display();
    }
    //上传头像页面
    public function avatar(){
        $id = I('get.id');
        $this->assign('id',$id);
        $this->display();
    }
    //上传供应商头像
    public function upload(){
        $map['id']=$_POST['gid'];
        $upload=new\Think\Upload();// 实例化上传类
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath=''; // 设置附件上传目录
        $upload->autoSub=false;
        $upload->rootPath='./Public/default/supplier/';
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else
        {
            $dataimg['headimg']=$info['pic1']['name'];
            //根据具体的目录来配置此项值
            $dataimg['thumb']='/Public/default/supplier/'.$info['pic1']['savename'];
            M('supplier')->where($map)->save($dataimg);
            $this->success('上传成功！','detail/id/'.$map['id']);
            //echo $file['savepath'] .$file['savename'];

        }
    }
    //禁用启用供应商
    public function gysdelete(){
        if (IS_POST) {
            $map['id'] = I('post.id');
            $type = I('post.type');
            switch ($type){
                case 1:
                    $data['state'] = 2;
                    $info = M('supplier')->where($map)->setField($data); //禁用
                    break;
                case 2:
                    $data['state'] = 1;
                    $info = M('supplier')->where($map)->setField($data); //启用
            }

           if($info){
               if($type==1){
                   $return = 'prohibit';//禁用成功
               }
               if ($type==2){
                   $return = 'enable';//启用成功
               }
           }
            $this->ajaxReturn($return);
        }
    }
    //修改供应商
    public function updateSupplier(){
        if (IS_POST){
            $map['id'] = I('post.pld');
            $data['snumber'] = I('post.snumber');
            $data['name'] = I('post.name');
            $data['type'] = I('post.type');
            $data['address'] = I('post.address');
            $data['contactnumber'] = I('post.contactnumber');
            $data['contacts'] = I('post.contacts');
            $data['payment'] = I('post.payment');
            $data['weburl'] = I('post.weburl');
            $data['bank'] = I('post.bank');
            $data['account'] = I('post.account');
            $data['state'] = I('post.state');
            $data['email'] = I('post.email');
            $data['bankname'] = I('post.bankname');
            $data['remarks'] = I('post.remarks');
            $data['currency'] = I('post.paymentd');
            $data['creationtime']=date("Y-m-d H:i:s",time());
            if (empty($data['snumber']) AND empty($data['name']) AND empty($data['type'])){
                $this->ajaxReturn('NO');
            }else{
                $info = M('supplier')->where($map)->data($data)->save();
                if ($info>0){
                    $this->ajaxReturn('OK');
                }
            }
        }
    }


    //供应商产品主页
    public function proDuct(){
        $gid = I('get.id');
        $trem['supplier.id'] = I('get.id');
        $god['status'] = '1';
        $map=array();
        $map['supplier_id'] = $gid;
        $search = trim(I('get.search'));//获取搜索条件
        if (!empty($search))
        {
            $map['product.namezh|bclass.number|sclass.number|product.number'] = array('like', "%" .$search. "%", 'or');
        }
        $x=new  \Home\Model\Supplier_productModel();
        $result=$x->searchSupplier($map);
        $m=new  \Home\Model\ProductModel();
        $product = $m->getProductcode();
        //查询货币
        $tremd['table'] = 'supplier_product';
        $tremd['column'] = 'company';
        $company = M('status_ex')->where($tremd)->field('id,name')->select();
        $this->assign('companyd',$company);
        $supplier = M('supplier')
            ->where($trem)
            ->field('name
            ')
            ->find();
        $this->assign('supplier',$supplier);
        $this->assign('gid',$gid);
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->assign('product',$product);
        $this->assign('search',$search);
        $this->display();
    }
    //ajax获取产品料号
    public function getajaxproductCode(){
        $map['product.id'] = I('post.pid');
        $product = M('product')
            ->where($map)
            ->field('
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number
            ')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->find();
        $this->ajaxReturn($product);
    }
    //供应商产品添加
    public function gysproductAdd(){
        if (IS_POST) {
            $data['pid'] = I('post.pid');
            $data['status'] = '1';
            $data['supplier_id'] = I('post.supplier_id');
            $data['price'] = I('post.price');
            $data['code'] = I('post.code'); //供应商料号
            $data['minimum_purchase'] = I('post.minimum_purchase');//最小采购量
            $data['minimum_packing'] = I('post.minimum_packing');//最小包装数
            $data['production_cycle'] = I('post.production_cycle');
            $data['company'] = I('post.company');
            $map['pid'] = I('post.pid');
            $map['status'] = '1';
            $map['supplier_id'] = I('post.supplier_id');
            $list = M('supplier_product')->where($map)->field('id')->find();
            //判断必填信息为空返回no
            if (empty($data['pid']) || empty($data['price']) || empty($data['minimum_purchase']) || empty($data['minimum_packing']) || empty($data['company']) || empty($data['production_cycle'])){
                $return = 'NO';
                //判断最小包装数是不是最小采购量的倍数
            }elseif($data['minimum_purchase']%$data['minimum_packing']!==0){
                $return = 'KO';
                //判断产品重复
            }elseif(!empty($list['id'])){
                $return = 'PO';
            }else{
                $info = M('supplier_product')->data($data)->add();

            }
            if ($info){
                $return = 'OK';
            }
        $this->ajaxReturn($return);
        }
    }

    //供应商产品删除
    public function gysproductdelete(){
        if (IS_POST) {
            $map['id'] = I('post.id'); //平台id
            $data['status'] = '2';
            $data = M('supplier_product')->where($map)->setField($data); //修改对应表指定字段(状态)为2
            $this->ajaxReturn($data);
        }
    }


  //修改供应商产品信息
    public function editSuppliergood(){
        if (IS_POST) {
            $map['id'] = I('post.id'); //平台id
            $map['status'] = '1';
            $data['price'] = I('post.price');
            $data['code'] = I('post.code');
            $data['company'] = I('post.hid');
            $data['minimum_purchase'] = I('post.minimum_purchase');
            $data['minimum_packing'] = I('post.minimum_packing');
            $data['production_cycle'] = I('post.production');
            if (empty($data['price'])||empty($data['code'])||empty($data['company'])||empty($data['minimum_packing'])||empty($data['minimum_purchase'])||empty($data['production_cycle'])){
                $return = 'CF'; //不能为空
            }elseif ($data['minimum_purchase']%$data['minimum_packing']!==0){
                $return = 'KO'; //最小采购量不是最小包装数的倍数
            }else{
                $supplier_product = M('supplier_product')->where($map)->data($data)->save();
                if($supplier_product>0){
                    $return = 'OK'; //修改成功
                }else{
                    $return = 'NO';//修改失败
                }
            }
            $this->ajaxReturn($return);
        }
    }

    //获取供应商详细信息 执行中的订单
    public function getAjaxdata(){
        $type = (int)I('post.type');
        switch ($type){
            case 3://执行中的订单
                $map['order_purchase_success.supplier_id'] =   I('post.id');
                $map['order_purchase_success.status'] = 1;
                $map['order_purchase_case.type'] = 1;
                $list = M('order_purchase_success')
                    ->where($map)
                    ->field('order_purchase_success.id as id,order_purchase_success.id as order_number')
                    ->join('LEFT JOIN order_purchase_case ON order_purchase_success.order_number = order_purchase_case.order_purchase_id')
                    ->group('order_purchase_case.order_purchase_id')
                    ->select();
                foreach ($list as $k=>$v){
                    $list[$k]['order_number'] =str_pad($v['order_number'],11,"0",STR_PAD_LEFT); //生成采购订单号 补位0
                }
        }
        $this->ajaxReturn($list);
    }

}