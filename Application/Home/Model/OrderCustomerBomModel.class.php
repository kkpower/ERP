<?php
namespace Home\Model;
use Think\Model;

class OrderCustomerBomModel extends Model
{

//查询asin下的产品清单
    public function getAsinBomlist($asin)
    {
        $map['order_customer_bom.asin']=$asin;
        $map['order_customer_bom.status']=1;
        $map['product.status']=1;
        $list=$this
            ->field('
            order_customer_bom.asin,
            order_customer_bom.number,
            classone.number as blass,
            product.id as pid,
            product.namezh,
            product.nameus,
            product.thumb,
            product.shortname
            ')
            ->where($map)
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->join('LEFT JOIN classify as classone ON product.bclass = classone.id')
            ->join('LEFT JOIN classify as classtwo ON product.bclass = classtwo.id')
            ->select();
        return $list;
    }
 }








 ?>