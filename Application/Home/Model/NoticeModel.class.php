<?php
namespace Home\Model;
use Think\Model;

class NoticeModel extends Model{

    //通知
    public function addnotice($type,$text_id,$direction){
        $data['ruid']=(int)$_SESSION['user_info']['uid'];//收件人id
        $data['type']=(int)$type;//提示类型
        $data['text_id']=trim($text_id);//收到提示
        $data['direction']=trim($direction);//模块和方法
        $data['create_time']=date("Y-m-d H:i:s",time());//时间
        $data['status']=1;//状态
        $result=$this->data($data)->add();
        return $result;
    }
}