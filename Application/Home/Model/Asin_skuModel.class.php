<?php

namespace Home\Model;
use Think\Model;

class Asin_skuModel extends Model
{
    //查询 sku 是否 存在关联 asin和 asin是否关联 pid
    public function getasinSku($sku)
    {
        $map['sku']=$sku;
        $map['status']=1;
        $result=M()->table('asin_sku')
            ->field('
            asin_sku.sku,
            asin_sku.asin
             ')
            ->where($map)
            //->join('lEFT JOIN order_customer_bom ON asin_sku.asin=order_customer_bom.asin')
            ->find();
        return $result;
    }
    //ASIN 报警
    public function asinCallthepolice($map){
        $map['status']=1;
        $list=$this
            ->field('
                id,asin,sku,time,price,account_id
            ')
            ->where($map)
            ->order('asin')
            ->select();
        return $list;
    }

}

