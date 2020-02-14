<?php
 //加锁
//判断是否有程序在执行  $GLOBALS['loca'] 锁存的值
//if (!empty($GLOBALS['loca'])){
//    $GLOBALS['lock']=true;//加锁
//    //读取队列表,有没有可执行的
//
//    while(1)
//    {
//        $res=M('queue')->find();
//        if (!$res){
//            //如果队列中没有记录,结束
//            break;
//        }
//        //如果有,写入冻结库存
//        $newmodel = new \Home\Model\Order_customerModel();
//        $return=$newmodel->orderProductLsit();
//
//    }
//}

