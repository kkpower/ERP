<?php
namespace Home\Model;
use Think\Model;
class Order_customer_logModel extends Model
{
    //添加操作日志流程
    public function addlogs($log){
        /*$data['o_id']=$id;//订单id
        $data['operating']=$operating;//动作：提交/删除/发货/扫描/...
        $data['field']=$field;//操作字段
        $data['modify']=$modify;//操作内容*/
        $log['uid']=$_SESSION['user_info']['uid'];//用户
        $log['time']=date("Y-m-d h:i:s");//操作订单时间
        $list=$this->add($log);
        return $list;
    }

    //查看日志流程
    public function logs($map){
        $map['order_customer_log.status']=1;
        $list=$this
               ->where($map)
               ->join('LEFT JOIN user_info as u ON order_customer_log.uid = u.uid')
               ->join('LEFT JOIN order_customer ON order_customer_log.o_id = order_customer.id')
               ->field('u.lastnamezh,
                        u.namezh,
                        u.lastname,
                        u.name,
                        order_customer.id,
                        order_customer_log.textzh,
                        order_customer_log.textus,
                        order_customer_log.variable,
                        order_customer_log.time')
               ->order('time desc')
               ->select();
        return $list;
    }
}