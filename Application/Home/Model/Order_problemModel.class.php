<?php
namespace Home\Model;
use Think\Model;
class Order_problemModel extends Model
{
    //添加问题订单
    public function addOrder($problem){
        $problem['uid']=$_SESSION['user_info']['uid'];
        $problem['create_time']=date("Y-m-d H:i:s");
        $list=$this->add($problem);
        return $list;
    }

    //查询问题订单
    public function pOrder(){
        $map['order_problem.status']=2;
        $list=$this
            ->field('order_customer.id,
                     order_customer.country,
                     order_customer.type,
                     status_ex.namezh')
            ->join('LEFT JOIN order_customer ON order_problem.o_id = order_customer.id')
            ->join('LEFT JOIN status_ex ON order_problem.type = status_ex.id')
            ->where($map)
            ->select();
        return $list;
    }
}