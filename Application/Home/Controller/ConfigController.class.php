<?php
namespace Home\Controller;
use Home\Model\Transport_modeModel;
use Home\Model\TransportersModel;
use Home\Model\WarehouseModel;

class ConfigController extends CommonController
{
    public function index(){
        $this->display();
    }

    //运输中心
    public function transport(){
        $this->display();
    }

    //添加运输商
    public function addTransporters(){
        $data['transporters']=$_POST['transporters'];
        $data['cid']=$_POST['cid'];
        $info=new TransportersModel();
        $result=$info->addTransporters($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //添加运输方式
    public function addMode(){
        $data['mode']=$_POST['mode'];//运输方式名称
        $data['tid']=$_POST['tid'];//接收运输商id
        $info=new Transport_modeModel();
        $result=$info->addMode($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //运输国家列表
    public function transportList(){
        $map['status']='1';
        $map['user_info.uid']=$_SESSION['user_info']['uid'];
        $cid=M('user_info')->field('cid')->where($map)->find();//获取国家的权限
        $array=explode(",",$cid['cid']);
        $condition['country.status']='1';
        $condition['country.id']=array('in',$array);
        $country=M('country')
            ->field('country.id as cid,
                     spelling,
                     countryzh,
                     countryus,
                     transporters.id as tid,
                     transporters.transporters,
                     country.default_transport_id')
            ->join('LEFT JOIN transporters ON country.default_transport_id = transporters.id')
            ->where($condition)
            ->select();
        $data['country.id']=$_GET['country'];
        $transporters=M('Transporters')
            ->field('transporters.id as tid,
                     transporters.transporters,
                     transport_mode.id as mode_id,
                     transport_mode.mode,
                     transporters.default_mode_id')
            ->join('LEFT JOIN country ON transporters.cid = country.id')
            ->join('LEFT JOIN transport_mode ON transporters.default_mode_id = transport_mode.id')
            ->where($data)
            ->select();
        $this->assign('country',$country);   //国家
        $this->assign('transporters',$transporters);   //运输方式
        $this->assign('area',$data['country.id']);   //国家id
        $this->display();
    }

    //运输列表
    public function getAjaxTransport(){
        $data['transporters.status']='1';
        $data['country.id']=$_POST['cid'];
        $list=M('Transporters')
            ->field('transporters.id as tid,
                     transporters.transporters,
                     transport_mode.mode')
            ->join('LEFT JOIN country ON transporters.cid = country.id')
            ->join('LEFT JOIN transport_mode ON transporters.default_mode_id = transport_mode.id')
            ->where($data)
            ->select();
        $this->ajaxReturn($list);
    }

    //ajax获取运输方式
    public function getAjaxMode(){
        //$map['transport_mode.status']='1';
        $map['transporters.id']=$_POST['tid'];
        $list=M('transport_mode')
            ->field('transport_mode.id as mode_id,
                     transport_mode.mode,
                     transporters.transporters')
            ->join('LEFT JOIN transporters ON transport_mode.tid = transporters.id')
            ->where($map)
            ->select();
        $this->ajaxReturn($list);
    }

    //ajax获取状态
    public function getAjaxStatus(){
        //$map['status']='1';
        $map['id']=$_POST['id'];
        $mode=M('Transporters')->field('mode_id')->where($map)->find();//获取运输方式
        $array=explode(",",$mode['mode_id']);
        $trans['status']='1';
        $trans['id']=array('in',$array);
        $list=M('transport_mode')
            ->field('id,
                     mode')
            ->where($trans)
            ->select();
        $this->ajaxReturn($list);
    }

    //修改国家的运输商状态和默认运输商
    public function updateTransporters(){
        $cid['id']=$_POST['cid'];   //国家id
        $data['default_transport_id']=$_POST['transport_id'];    //默认运输商id
        $tid=$_POST['tid'];    //运输商id
        $count=count($tid);
        $array=$_POST['status'];    //状态
        $result=M('Country')->where($cid)->save($data);
        for($i=0;$i<$count;$i++){
            $arr=M('Transporters')->where('id='.$tid[$i])->data('status='.$array[$i])->save();
        }
        if($result && $arr){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //修改运输商的运输方式
    public function updateMode(){
        $map['id']=$_POST['id'];   //获取运输商id
        $map['cid']=$_POST['cid'];   //获取国家id
        $mode_id=$_POST['mode_id'];   //获取运输方式
        $data['mode_id']=implode(",",$mode_id);
        $data['default_mode_id']=$_POST['default_mode_id'];  //获取默认运输方式
        $result=M('Transporters')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //删除运输商
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

    //删除运输方式
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
        $map['cid']=$_POST['cid'];
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

    //仓库-国家=> 配送范围
    //查询$w_id 仓库的配送范围.
    public function getAjaxRange()
    {$_POST['w_id']=1;
        $map['id']=$_POST['w_id'];//仓库id
        $ziplist=M('Transport_mode')->where($map)->select();
        $this->ajaxReturn($ziplist);

    }

    //仓库页面
    public function deliveryArea(){
        $status['status']=1;
        $map['w_id']=$_GET['w_id'];
        $warehouse=M('warehouse')->field('id as w_id,name,englishname')->where($status)->select();
        $range=M('country_range')->field('id as r_id,w_id,range,status')->where($map)->select();
        $this->assign('warehouse',$warehouse);
        $this->assign('range',$range);
        $this->assign('w_id',$map['w_id']);
        $this->display();
    }

    //仓库配送范围
    public function w_range(){
        $map['status']=1;
        $map['w_id']=$_GET['w_id'];
        $list=M('country_range')->where($map)->select();
        $this->ajaxReturn($list);
    }

    //添加仓库配送地区
    public function add_range(){
        $data['w_id']=$_POST['w_id'];
        $data['range']=$_POST['range'];
        $result=M('country_range')->add($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //修改配送地区名
    public function edit_range(){
        $map['id']=$_POST['r_id'];
        $data['range']=$_POST['range'];
        $result=M('country_range')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //修改配送区域状态
    public function edit_rangStatus(){
        $map=$_POST['id'];
        $data=$_POST['status'];
        for($i=0;$i<count($map);$i++){
            $result=M('country_range')->where('id='.$map[$i])->data('status='.$data[$i])->save();
        }
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //仓库权限配置



    //todo 自动以修改中英文

    //显示当前中英文;
    public function langList()
    {
        $enstr=$zhstr='空';
        $enfile_path= '../InternalSystem/Application/Home/Lang/'.'en-us.php';//路径
        if(file_exists($enfile_path))//判断是否存在目录
        {
            $enfp = fopen($enfile_path,"r");
            $enstr = fread($enfp,filesize($enfile_path));//指定读取大小，这里把整个文件内容读取出来
            fclose($enfp);
        }

        $zhfile_path= '../InternalSystem/Application/Home/Lang/'.'zh-cn.php';//路径
        if(file_exists($zhfile_path))//判断是否存在目录
        {
            $zhfp = fopen($zhfile_path,"r");
            $zhstr = fread($zhfp,filesize($zhfile_path));//指定读取大小，这里把整个文件内容读取出来
            fclose($zhfp);
        }

        $this->assign('listen',$enstr);//en英文
        $this->assign('listzh',$zhstr);//中文
        $this->display();
    }
    //保存
    public function langSave()
    {
        $lang['en']=$_POST['en'];
        $lang['zh']=$_POST['zh'];
        if ($lang['en']==''or $lang['zh']=='')
        {
            $this->ajaxReturn(false);
            exit();
        }
        $enfile_path = '../InternalSystem/Application/Home/Lang/'.'en-us.php';//路径
        $zhfile_path = '../InternalSystem/Application/Home/Lang/'.'zh-cn.php';//路径
        $enfp = fopen($enfile_path,"w+");//w+打开清空
        $zhfp = fopen($zhfile_path,"w+");//w+打开清空
        fwrite($enfp,$lang['en']);
        fclose($enfp);
        fwrite($zhfp,$lang['zh']);
        fclose($zhfp);
        $this->ajaxReturn(true);
    }
}
