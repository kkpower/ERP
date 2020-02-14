<?php
namespace Home\Model;
use Think\Model;

class Order_insideModel extends Model{

    //核算仓库产品的单价
    public function meanweighted($map){
        $map['order_inside.state'] = 1;
        $map['order_inside_product.status'] = 1;
        $list=$this
            ->field('
                order_inside_product.pid as pid,
                order_inside_product.price as price,
                order_inside_product.num as num
            ')
            ->where($map)
            ->join('LEFT JOIN warehouse ON order_inside.warehouse_id = warehouse.id')
            ->join('LEFT JOIN order_inside_product ON order_inside.id = order_inside_product.oid')
            ->limit(3)
            ->order('order_inside_product.id desc')
            ->select();
        return $list;
    }




}




?>