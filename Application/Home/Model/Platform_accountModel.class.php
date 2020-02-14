<?php

namespace Home\Model;
use Think\Model;

 class Platform_accountModel extends Model
{
    //查询uid下的账户
     public function getaccount($condition)
     {
         //创建返回数组
         $result=array();
         return $this->where($condition)->select();

     }
     //搜索平台下账号
     public function accountShow($map,$pagen=10,$limit=true){
         $result=array();
         $map['platform_account.status']='1';
         $count=$this
             ->field('
            platform_account.id as id,
            platform.name as name,
            platform_account.account_number as account_number,
            platform_account.account_number_name as account_number_name,
            platform_account.platform_id as platform_id')
             ->where($map)
             ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
             ->count();
         //$Page = getPage($count,C('pageNum')); 用c config下的 pagenum 变量来作为分页数量
         $Page = getPage($count,$pagen);
         //进行分页数据查询 注意limit方法的参数要使用Page类的属性
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
             ->field('
            platform_account.id as id,
            platform.name as name,
            platform_account.account_number as account_number,
            platform_account.account_number_name as account_number_name,
            platform_account.platform_id as platform_id')
             ->where($map)
             ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
             ->limit($firstRow.','.$listRow)
             ->select();
         $result['list']=$list;
         $result['page']=$Page->show();
         return $result;
     }

}