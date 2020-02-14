<?php

namespace Home\Model;
use Think\Model;

class Pl_account_userModel extends Model
{
    //销售订单列表
    public function salesOrder($data,$pagen=10,$limit=true){
        $result=array();
        $count=$this
            ->where($data)
            ->join('LEFT JOIN platform_account ON pl_account_user.pl_account_id = platform_account.id')
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
            ->join('LEFT JOIN order_customer ON platform_account.id = order_customer.platform_id')
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.id')
            ->join('LEFT JOIN order_problem ON order_customer.id = order_problem.o_id')
            ->join('LEFT JOIN status_ex as ex ON ex.id = order_problem.type')
            ->field('pl_account_user.uid,
                     pl_account_user.pl_account_id,
                     platform_account.account_number,
                     platform.id as pl_id,
                     platform.name,
                     ex.name as type_name,
                     ex.namezh as type_namezh,
                     order_problem.type,
                     order_problem.describe,
                     order_problem.create_time as problem_time,
                     order_customer.id,
                     order_customer.platform_id,
                     order_customer.status_id,
                     order_customer.fullname as recipient_first_name,
                     order_customer.country,
                     order_customer.ship_level,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.create_time,
                     status_ex.name as processing_status,
                     status_ex.namezh as processing_status_zh')
            ->count();
        $Page = getPage($count,$pagen);
        if($limit)
        {
            $firstRow = $Page->firstRow;
            $listRow = $Page->listRows;
        }else
        {
            $firstRow = 0;
            $listRow = $count;
        }
        $list=$this
            ->where($data)
            ->join('LEFT JOIN platform_account ON pl_account_user.pl_account_id = platform_account.id')
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
            ->join('LEFT JOIN order_customer ON platform_account.id = order_customer.platform_id')
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.id')
            ->join('LEFT JOIN order_problem ON order_customer.id = order_problem.o_id')
            ->join('LEFT JOIN status_ex as ex ON ex.id = order_problem.type')
            ->field('pl_account_user.uid,
                     pl_account_user.pl_account_id,
                     platform_account.account_number,
                     platform.id as pl_id,
                     platform.name,
                     ex.name as type_name,
                     ex.namezh as type_namezh,
                     order_problem.type,
                     order_problem.describe,
                     order_problem.create_time as problem_time,
                     order_customer.id,
                     order_customer.external_sn,
                     order_customer.platform_id,
                     order_customer.status_id,
                     order_customer.fullname as recipient_first_name,
                     order_customer.country,
                     order_customer.ship_level,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.create_time,
                     status_ex.name as processing_status,
                     status_ex.namezh as processing_status_zh')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //账号下的平台
    public function platform(){
        $data['pl_account_user.uid']=$_SESSION['user_info']['uid'];
        $list=$this
            ->where($data)
            ->join('LEFT JOIN platform_account ON pl_account_user.pl_account_id = platform_account.id')
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
            ->field('platform.id,
                     platform.name')
            ->select();
        return $list;
    }

    //账号下的账户
    public function platform_acc(){
        $data['pl_account_user.uid']=$_SESSION['user_info']['uid'];
        $list=$this
            ->where($data)
            ->join('LEFT JOIN platform_account ON pl_account_user.pl_account_id = platform_account.id')
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
            ->field('platform_account.id,
                     platform_account.account_number,
                     platform.name,
                     platform.type')
            ->select();
        return $list;
    }
}