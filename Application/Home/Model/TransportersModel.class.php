<?php
namespace Home\Model;
use Think\Model;

class TransportersModel extends Model
{
    //添加运输商
    public function addTransporters($data){
        //$data['mode_id']=$mode_id;
        $data['create_time']=date("Y-m-d h:i:s");
        $data['status']='1';
        $this->add($data);
    }

}