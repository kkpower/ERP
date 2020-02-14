<?php

namespace Home\Model;
use Think\Model;

//日志模型
class Account_logModel extends Model{
    //添加提交账号操作日志
    public function addlog($platform_account_id,$operating)
    {
        $data['uid']= (int)$_SESSION['user_info']['uid'];//操作用户id
        $data['time']=date("Y-m-d H:i:s", time());//操作时间
        $data['platform_account_id']=$platform_account_id; //操作账号id
        $data['operating']=$operating;//'操作说明,asinImport,导入;asin\tdell,数量',
//        if ($operating==null)//判断,如果操作是空的话,则返回空
//        {
//            return null;
//        }
        $return=
            $this->data($data)->add();//操作记录
        return $return;
    }

}

