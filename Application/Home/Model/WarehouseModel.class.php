<?php
namespace Home\Model;
use Think\Model;

class WarehouseModel extends Model{

    //查询用户单一id信息
    function getwareid($data){

        return  $this->where($data)->find();


    }

    //根据仓库查询范围
    public function w_range($map){
        $map['warehouse.status']=1;
        $map['country_range.status']=1;
        $list=$this
            ->field('warehouse.id as wid,
                     warehouse.name,
                     warehouse.englishname,
                     warehouse.company,
                     country_range.range')
            ->join('LEFT JOIN country_range ON warehouse.id = country_range.w_id')
            ->where($map)
            ->select();
        return $list;
    }



}




?>