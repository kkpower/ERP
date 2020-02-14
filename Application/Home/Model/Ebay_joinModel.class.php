<?php

namespace Home\Model;
use Think\Model;

//权限模型
class Ebay_joinModel extends Model{
    Protected $autoCheckFields = false;

   public function getEbayPid($map)
   {
       $Model = M('ebay_join');
       $return=$Model
           ->field('product.id as productid,
           product.bclass as bclass,
           product.sclass as sclass,
           product.number as number,
           product.namezh as namezh,
           product.nameus as nameus')
           ->where($map)
           ->join('LEFT JOIN product ON ebay_join.pid=product.id')
           ->find()
       ;
       return $return;
   }
   //添加 产品与外部平台变量的
    public function addebay_join()
    {
        $Model = M('ebay_join');
        $return=$Model
            ->where()
            ->join('LEFT JOIN product ON ebay_join.pid=product.id')
            ->data()
            ->add()
        ;
        return $return;
    }

}

