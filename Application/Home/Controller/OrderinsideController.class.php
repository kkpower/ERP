<?php
namespace Home\Controller;
use Think\Controller;

class OrderinsideController extends CommonController {
    //todo 内部订单主页
    public function index()
    {
        $this->display();
    }
    //todo 获取公司
    public function getajaxCompany(){
        $trem['uid'] = $_SESSION['user_info']['uid'];
        $trem['status'] = 1;
        $info = M('user_info')->where($trem)->field('company_id')->find();
        $map['organizationt.fatherid'] = 1;
        $map['organizationt.level'] = 1;
        $map['organizationt.status'] = 1;
        $map['organizationt.id'] = array('neq',$info['company_id']);
        $map['warehouse_location.w_type'] = 2;//主仓
        $map['warehouse_location.status'] = 1;
        $map['warehouse.status'] = 1;
        $return = M('organizationt')
            ->where($map)
            ->field('warehouse_location.id,organizationt.namezh')
            ->join('LEFT JOIN company_configuration ON organizationt.id = company_configuration.company')
            ->join('LEFT JOIN warehouse ON company_configuration.warehouse_physical = warehouse.id')
            ->join('LEFT JOIN warehouse_location ON warehouse.id = warehouse_location.w_id')
            ->select();
        $this->ajaxReturn($return);
    }
    //todo 获取产品
    public function getAjaxproduct(){
        M()->startTrans();//开启事务
        $map['stock_form.position_id'] = I('post.company');//仓位id
        $map['stock_form.type'] = array('neq',30);//冻结库存
        $map['stock_form.status'] = 1;
        $return = M('stock')
            ->where($map)
            ->lock(true)
            ->field('
                company_configuration.warehouse_physical,
                product.namezh as namezh,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                stock.pid as pid,
                sum(stock.number) as number
            ')
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')

            ->group('stock.pid')
            ->select();
        if ($return){
            $result = true;
            if (!$result){
                $this->rollback();//回滚
                return false;
            }
        }
        M()->commit();//事务提交
        $this->ajaxReturn($return);
    }
    //todo 申请内部订单
    public function orderAdd(){
        M()->startTrans();//开启事务
        $data['company_id'] = I('post.company_id');//公司
        $data['warehouse_id'] = I('post.warehouse_physical');//仓库
        $data['transporter'] = I('post.transporter'); //运输商
        $data['freight'] = I('post.freight');   //运费
        $data['typeofshipping'] = I('post.transport'); //运输方式
        $data['uid'] = $_SESSION['user_info']['uid'];   //创建人
        $data['creation_time'] = date("Y-m-d H:i:s", time()); //创建时间
        $data['state'] = 1;
        $order_insid = M('order_inside')->data($data)->add();
        if ($order_insid){
            $pid = I('post.pid');
            $num = I('post.num');
            foreach ($pid as $k=>$v){
                $arr[] = array('pid'=>$pid[$k],'num'=>$num[$k]);
            }
            foreach ($arr as $n=>$m){
                $dataList[] = array(
                    'pid'=>$arr[$n]['pid'],
                    'price'=>199,
                    'num'=>$arr[$n]['num'],
                    'oid'=>(int)$order_insid,
                    'status'=>1
                );
            }
            $product = M('order_inside_product')->addAll($dataList);
            if ($product){
                M()->commit();//事务提交
                $return='OK';
            }else{
                $this->rollback();//回滚
                $return = 'NO';
            }
        }
        $this->ajaxReturn($return);
    }
}