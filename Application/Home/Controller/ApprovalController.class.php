<?php
namespace Home\Controller;

use Home\Model\Order_problemModel;

class ApprovalController extends CommonController
{
    //审批页面
    public function index(){
        $this->display();
    }

    //劳动时间
    public function laborTime(){
        $this->display();
    }

    //问题订单
    public function problem(){
        $problem=new Order_problemModel();
        $list=$problem->pOrder();
        $this->assign('list',$list);
        $this->display();
    }
}