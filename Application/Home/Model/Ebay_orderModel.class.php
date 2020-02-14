<?php

namespace Home\Model;
use Think\Model;

 class Ebay_orderModel extends Model
 {
   //修改订单
     public function editOrder($map,$data){
         $list=$this->where($map)->save($data);
         return $list;
     }

     //劳动详情
     public function details($data){
         $data['product.status']='1';
         $data['order_customer_bom.status']=1;
         $list=$this
             ->field('ebay_order.ordercust_id,
                      ebay_order.var,
                      order_customer_bom.pid,
                      order_customer_bom.number,
                      order_customer_bom.price,
                      one.number as bclass,
                      two.number as sclass,
                      product.number as num,
                      product.namezh,
                      product.thumb')
             ->where($data)
             ->join('LEFT JOIN order_customer_bom ON ebay_order.var = order_customer_bom.asin')
             ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
             ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
             ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
             ->select();
         return $list;
     }
 }