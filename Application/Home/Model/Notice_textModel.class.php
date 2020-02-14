<?php
namespace Home\Model;
use Think\Model;
class Notice_textModel extends Model
{
    //查询补单原因
    public function cause($map){
        $map['stsatus']=1;
        $list=$this
            ->field('id,
                     type,
                     value,
                     textzh,
                     textus,
                     status')
            ->where($map)
            ->select();
        return $list;
    }
}