<?php
namespace Home\Controller;
use Home\Model\MyModel;
use Home\Model\Model;
use Home\Model\UserModel;


class MyController extends CommonController
{
    public function index()
    {
        $this->display();
    }
    /**
     * 个人信息
     *
     *
     */
    public function me()
    {
        $data=new SystemController();

        if ($_POST['nosdid']!='')
        {
            $contact['uid']=$map['id']=$_POST['nosdid'];
        }elseif ($_GET['nosdid']!=''){
            $contact['uid']=$map['id']=$_GET['nosdid'];
        }else{
            $map['id']=$_SESSION['user_info']['uid'];
            $contact['uid']=$_SESSION['user_info']['uid'];
        }
        $x = new\Home\Model\UserModel();
        $Return=$x->getinfo($map);
        //   $pauthinfo=M('Auth')->where('auth_level=0')->select();
        //   $sauthinfo = D('Auth')->where('auth_level=1')->select();
        $phone=M('contact')->field('phone')->where($contact)->select();
        $pinfo=$data->getinfo();
        $authinfo=$data->getinfo(true);
        $this->assign('pinfo',$pinfo);
        $this->assign('authinfo',$authinfo);
        $this->assign('phone',$phone);
        //  $this->assign('pauth',$pauthinfo);
        // $this->assign('sauth',$sauthinfo);
        $this->assign('info',$Return);
        //通知消息
        $meMessage=$this->meNotice();
        $this->assign('meMessage',$meMessage);
//        $xxx=time();
//        $xxx=chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)).((string)$xxx);
//        $xxx=null;
//        $xxx=microtime();
        $wo['pid']='1234567891113';
        $wo['oid']='1101201301321';
        $o=json_encode((object)$wo);
        $savepath='Public/dom/phpqrcode/'.'123.png';
       // $xxxx= getqrcode($url,$savepath);
        $this->assign('xxxx',$savepath);
        $this->display();
    }
    //修改个人信息
    public function saveuserinfo()
    {
        $data['id']=$_POST['id'];
        $data['uid']=$_POST['uid'];
        $data['name']=$_POST['name'];//英文名
        $data['lastname']=$_POST['lastname'];//英文姓氏
        $data['namezh']=$_POST['namezh'];//中文名
        $data['lastnamezh']=$_POST['lastnamezh'];//中文姓氏
        $data['email']=$_POST['email'];//邮箱
        $data['bank']=$_POST['bank'];//开户行
        $data['account']=$_POST['account'];//银行账号
        $data['identity']=$_POST['identity'];//身份证号
        $data['sex']=$_POST['sex'];//性别
        $data['remarks']=$_POST['remarks'];//个人介绍
        $data['status']="1";
        M('user_info')->save($data);
        M('contact')->where('uid'.'='."$data[uid]")->delete();
        $contact=$_POST['contact'];//电话号码
        foreach ( $contact as $key => $value)
        {   if(!empty($value)){
            $Datacontact[]= array('uid'=>$data['uid'],'phone'=>$value);
             }
        }

         M('contact')->addAll($Datacontact);


        $this->success('修改成功','me');
    }
    //上传头像页面
    public function avatar(){
        $this->display();
    }
    //上传头像

    public function upload(){
        $map['id']=$_SESSION['user_info']['uid'];
        $Return=D('user')->getinfoa($map);
        //$path=$_SESSION['user_info']['path'];
        //M('user_info')->where($path)->delete();
        $upload=new\Think\Upload();// 实例化上传类
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath=''; // 设置附件上传目录
        $upload->autoSub=false;
        $upload->rootPath='./Public/uploads/';

        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            //上传成功
            //$this->success('上传成功！');
            //$dataimg['name']=$info['file']['name'];
            $dataimg['headimg']=$info['pic1']['name'];
            $dataimg['id']=$Return['0']['id'];
            //根据具体的目录来配置此项值
            $dataimg['path']='/Public/uploads/'.$info['pic1']['savename'];
            $pic=new UserModel();//实例化UserModel
            $path=$pic->userfind($map);
            $x='.'.$path['path'];//获取原头像位置
            if($x !='./Public/uploads/5b7a58dcd4f0d.jpg'){
                unlink($x); //删除原头像
            }
            M('user_info')->save($dataimg);
            session("user_info.path",$dataimg['path']);//更新session里面path字段位置信息
            $this->success('上传成功！','me');
            //echo $file['savepath'] .$file['savename'];
         }

    }

    //根据用户查询账户和平台
    public function plAcc()
    {
        //根据session获取当前用户uid
        //session_start();
        $map=array();
        //根据uid获取pl_account_user.uid
        $map['pl_account_user.uid']=$_SESSION['user_info']['uid'];
        $map['pl_account_user.status']='1';
        $list=M('platform_account')->where($map)
            ->join('RIGHT JOIN pl_account_user ON pl_account_user.pl_account_id = platform_account.id')
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
            ->select();
        $this->assign('list',$list);
        $this->display('plAcc');
    }
    //通讯录
    public function teleList(){
        $map=array();
        $search = trim($_GET['search']);//获取搜索条件
        if (!empty($search))
        {
            $map['concat(user_info.lastnamezh,user_info.namezh)|user_info.name'] = array('like', "%" .$search. "%", 'or');
        }
        $x=new  \Home\Model\User_infoModel();
        $result=$x->searchTele($map); //查询user_info表里的一些字段值为搜索传来的值
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->display();
    }
    //查看手机号
    public function teleShow(){
        $id = I('post.id');
        $map['uid'] = $id;
        $info = M('contact')->field('phone')->where($map)->select();
        $this->ajaxReturn($info);
    }
    //考勤记录
    public function clockPunch(){
        $map['user_info.status'] = 1;
        $list = M('user_info')
            ->field('user_info.lastnamezh as lastnamezh,
            user_info.namezh as namezh,
            user_info.name as name,
            min(user_attendance.punch_time) as mintime,
            max(user_attendance.punch_time) as maxtime
            ')
            ->where($map)
            ->join('LEFT JOIN user_attendance ON user_info.uid = user_attendance.uid')
            ->group('user_info.uid,user_info.lastnamezh,user_info.namezh, user_info.name')
            ->select();
        $this->assign('list',$list);
        $this->display();
    }
//    //获取提醒消息
//    public function meMessage(){
//        //当前用户的id
//        $where['message.ruid']=$_SESSION['user_info']['uid'];
//        $where['message.status']=1;
//        $mesdata=M('message')
//            ->field('
//            message.imid as id,
//            message.text as text,
//            message.create_time as time,
//            suser.lastname as lastname,
//            suser.name as name,
//            suser.lastnamezh,
//            suser.namezh
//            ')
//            ->where($where)
//            ->join('LEFT JOIN user_info as suser ON message.ruid = suser.uid')//发件人
//
//            ->order('message.create_time')
//            ->select();
//        return $mesdata;
//    }
    public function meNotice(){
        //当前用户的id
        $where['notice.ruid']=$_SESSION['user_info']['uid'];
        $where['notice.status']=1;
        $mesdata=M('notice')
            ->field('
            notice.imid as imid,
            notice.create_time as time,
            notice.direction,
            status_ex.name,
            status_ex.namezh as type,
            notice_text.textzh,
            notice_text.textus
            ')
            ->where($where)
            ->join('LEFT JOIN status_ex ON notice.type = status_ex.id')//发件人
            ->join('LEFT JOIN notice_text ON notice.text_id = notice_text.id')//发件人
            ->order('notice.create_time')
            ->select();
        return $mesdata;
    }
    //获取 系统通知 提醒消息 ajax方法
    public function meNoticeAjax(){
        //todo  返回
        $data['status']=1;
        $data['ruid']=$_SESSION['user_info']['uid'];
        $data['type']=50;
        $one=M('notice')->where($data)->count();
        $data['type']=51;
        $two=M('notice')->where($data)->count();
        $data['type']=52;
        $three=M('notice')->where($data)->count();
        $count=array('emergency'=>$one,'veryurgent'=>$two,'general'=>$three);
        $this->ajaxReturn($count);
    }


}