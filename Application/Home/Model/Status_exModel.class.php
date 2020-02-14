<?php
namespace Home\Model;
use Think\Model;
class Status_exModel extends Model
{
    //查询补单原因
    public function cause($map){
        $list=$this
            ->field('id,
                     table,
                     val,
                     column,
                     name,
                     namezh')
            ->where($map)
            ->select();
        return $list;
    }
}