<?php
namespace Home\Model;
use Think\Model;

class Transport_modeModel extends Model
{
    //添加运输方式
    public function addMode($data){
        $data['create_time']=date("Y-m-d h:i:s");
        $data['status']=1;
        $this->add($data);
    }
}