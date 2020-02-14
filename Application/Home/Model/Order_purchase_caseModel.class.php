<?php

namespace Home\Model;
use Think\Model;

class Order_purchase_caseModel extends Model
{
    //查询包装箱码的产品信息
    public function packingBox($map){
        $map['order_purchase_case.state'] = 1;
        $map['order_purchase_case.type'] = 1;
        $map['order_purchase_case_product.status'] = 1;
        $list = $this
            ->where($map)
            ->field('
                product.id as pid,
                order_purchase_case_product.order_purchase_case as pn_id,
                order_purchase_case_product.num,
                product.namezh as namezh,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number
            ')
            ->join('LEFT JOIN order_purchase_case_product ON order_purchase_case.id = order_purchase_case_product.order_purchase_case')
            ->join('LEFT JOIN product ON order_purchase_case_product.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->select();
        return $list;
    }
}