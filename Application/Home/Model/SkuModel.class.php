<?php
namespace Home\Model;
use Think\Model;

class SkuModel extends Model
{
    //自增sku
    public function addSku(){
        $time['time']=date("Y-m-d H:i:s");
        $list=$this->add($time);
        return $list;
    }
}