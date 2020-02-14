<?php

namespace Home\Model;
use Think\Model;

 class Sku_varModel extends Model
 {
     //新增 ebay-item 和 number,
    public function skuAdd($data)
    {
        $re=$this->data($data)->add();
        $reinfo=$this->where('id='.$re)->find();
        return $reinfo;
    }
 }