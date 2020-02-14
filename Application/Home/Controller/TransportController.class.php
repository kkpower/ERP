<?php
namespace Home\Controller;
use Home\Model\Transport_modeModel;
use Home\Model\TransportersModel;

class TransportController extends CommonController
{
    //运输中心 主页
    public function index(){
        $this->display();
    }

    //添加运输商
    public function addTransporters(){
        $transporters=$_POST['transporters'];
        //$mode_id=$_POST['mode_id'];
        $info=new TransportersModel();
        $result=$info->addTransporters($transporters);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //添加运输方式
    public function addMode(){
        $mode=$_POST['mode'];
        $info=new Transport_modeModel();
        $result=$info->addMode($mode);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //运输列表
    public function transportList(){
        $map['status']='1';
        $transporters=M('Transporters')->where($map)->select();
        $transort_mode=M('Transport_mode')->where($map)->select();
        $this->assign('transporters',$transporters);
        $this->assign('transort_mode',$transort_mode);
        $this->display();
    }

    //ajax获取运输方式
    public function getAjaxMode(){
        $map['status']='1';
        $map['id']=$_POST['id'];
        $mode=M('Transporters')->field('mode_id')->where($map)->find();//获取运输方式
        $array=explode(",",$mode['mode_id']);
        $trans['status']='1';
        $trans['id']=array('in',$array);
        $list=M('Transport_mode')
            ->field('id,
                     mode')
            ->where($trans)
            ->select();
        //$mode=M('Transport_mode')->where($map)->select();
        //$this->ajaxReturn($mode);
        $this->ajaxReturn($list);
    }

    //修改运输商的运输方式
    public function updateMode(){
        $map['id']=$_POST['id'];
        $mode_id=$_POST['mode_id'];
        $data['mode_id']=implode(",",$mode_id);
        $result=M('Transporters')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //禁用运输商
    public function delTransporters(){
        $map['id']=$_POST['id'];
        $data['status']='2';
        $result=M('Transporters')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //禁用运输方式
    public function delMode(){
        $map['id']=$_POST['id'];
        $data['status']='2';
        $result=M('Transport_mode')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //修改运输商
    public function editTransporters(){
        $map['id']=$_POST['id'];
        $data['transporters']=$_POST['transporters'];
        $result=M('Transporters')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //修改运输方式
    public function editMode(){
        $map['id']=$_POST['id'];
        $data['mode']=$_POST['mode'];
        $result=M('Transport_mode')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }


}
