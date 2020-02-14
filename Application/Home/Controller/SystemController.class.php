<?php
/**
 * Created by PhpStorm.
 * User: chy
 * Date: 2017/8/9
 * Time: 19:55
 */

namespace Home\Controller;

class SystemController extends CommonController
{

    public function index(){
        $this->display();
    }
    /**
     * 系统管理模块
     *
     *
     */

    /**
     * 角色管理及分配权限
     */

    public function Role(){
            $info = D('Role')->showStatusRole();
            $pauthinfo=M('Auth')->where('auth_level=0')->select();
            $sauthinfo = D('Auth')->where('auth_level=1')->select();
            $pinfo=$this->getinfo();
            $authinfo=$this->getinfo(true);
            $this->assign('pinfo',$pinfo);
            $this->assign('authinfo',$authinfo);
            $this->assign('pauth',$pauthinfo);
            $this->assign('sauth',$sauthinfo);
            $this->assign('info',$info);
            $this->display();
    }

    /**
     * 根据条件查询ID信息
     */
    public function getRole(){
        $data['id']=$_POST['id'];
        $result=M('Role')->where($data)->select();
        return $this->ajaxReturn($result);
    }

    /**
     * 根据角色ID查询角色的权限
     */
    public function getRoleAuthority(){
        if($_REQUEST['type']==1){
            $roleId=$_REQUEST['role_id'];
            $allNodeList = D('Auth')->getAuth(array('status'=>1));
            $returnData['nodeList']=formatNodeList(array(),$allNodeList);
            }
        if($_REQUEST['type']==2){
            $roleId=$_REQUEST['role_id'];
            $roleName=D("role")->find($roleId);
            $roleNodeList= $roleName['role_auth_ids']; //角色权限ID
            $returnData['roleName']=$roleName['role_name']; //
            $returnData['nodeList']=$roleNodeList;
            $returnData['nodeList']=explode(',',$returnData['nodeList']);
        }
        $this->ajaxReturn($returnData);
    }
    //查看权限
    public function showpathlist(){
        $info=$this->getinfo();
        $authinfo=$this->getinfo(true);
        $this->assign('info',$info);
        $this->assign('authinfo',$authinfo);
    }

    /**
     * 保存角色权限
     */
    public function saverole()
    {
        $role['role_name'] = $_REQUEST['role_name'];
        $roleid['id'] = $_REQUEST['roleId'];
        $roleauth = $_REQUEST['role_auth_ids'];
        $rolename = M('role')->where($role)->field('id')->find();
        $rolenames = M('role')->where($roleid)->field('role_name')->find();
        $rolearr = json_decode($roleauth); //将接收过来的json转换成数组
        if (!empty($role['role_name'])) {
            if (!empty($roleid['id'])) {
                if (!$rolename['id'] || $rolenames['role_name']==$role['role_name']){
                    $map['id'] = $_REQUEST['roleId'];
                    $data['role_name'] = $_REQUEST['role_name'];
                    $data['role_auth_ids'] = implode(",", $rolearr);
                    $role = D('Role')->where($map)->save($data);
                }else{
                    $this->ajaxReturn('KO');
                }
            } elseif(empty($roleid['id']) AND !$rolename['id']) {
                $data['role_name'] = $_REQUEST['role_name'];
                $data['role_auth_ids'] = implode(",", $rolearr);
                $role = D('Role')->add($data);
            }else{
                $this->ajaxReturn('KO');
            }
            $this->ajaxReturn($role);
        }else{
            $this->ajaxReturn('NO');
        }
    }

    public function delRole(){
        if(!empty($_REQUEST['role_id'])){
            if(D('Role')->delete($_REQUEST['role_id'])){
                $this->ajaxReturn(true);
            }
        }
    }


    /**
     * 权限信息展示
     */

    public function pathshowlist()
    {
        //引用getinfo直接展示权限列表信息
        $info=$this->getinfo();
        $authinfo=$this->getinfo(true);
        //  var_dump($info);
        $this->assign('info',$info);
        $this->assign('authinfo',$authinfo);
        $this->display();
    }

    /**
     * 添加权限信息
     */
    public function pathadd()
    {
            //在AuthModel里边通过一个指定方法实现权限添加
            $auth = D('Auth');
            $_POST['status']=1;
            $auth->addAuth($_POST);
            $this->redirect('Pathshowlist');

    }

    /**
     * 1.用order方法查出auth表里的auth_pach并进行排序赋值给$info
      2.遍历出$info表里的auth_name并且在子级前加符号
      3.@return 返回获取的信息
                    */
    public function getInfo($flag=false)
    {
                    //展示AUTH表信息
                    //如果$flag标志为false，查询全部的权限信息
                    //如果$flag标志为turn，只查询level=0/1的权限信息
        D('Auth');
        if($flag==true) {
            $info = D('Auth')->where('auth_level<2')->order('auth_path asc')->select();
        }else {
            $info = D('Auth')->order('auth_path asc')->select();  //数据库查找权限信息并排序
        }
        foreach($info as $key=>$value) {
            $info[$key]['auth_name'] = str_repeat('—＞',$value['auth_level']).$info[$key]['auth_name'];
        }
        return $info;
    }
//获取权限的所有节点
    public function getInfomj()
    {
        $map['auth_pid'] = 0;//一级权限
        //展示AUTH表信息
        if (LANG_SET=='zh-cn'){
            $info = D('Auth')->field('id,auth_name as text,auth_pid as nodes')->order('auth_path asc')->select();
        }
        if (LANG_SET=='en-us'){
            $info = D('Auth')->field('id,auth_nameus as text,auth_pid as nodes')->order('auth_path asc')->select();
        }
        $first = D('Auth')->where($map)->field('id,auth_name as text,auth_pid as nodes')->order('auth_path asc')->select();
        //数据库查找权限信息并排序
        $first=json_encode($first);
        $tree =$this->getPower($info, 0);
        $tree=json_encode($tree);
        $list['first'] = $first;//一级权限节点
        $list['tree'] = $tree; //所有权限节点
        return $this->ajaxReturn($list);

    }
    //递归 将数组转化为树
    public function getPower($data, $pId)
    {
        unset($tree);
        foreach($data as $k => $v)
        {
            if($v['nodes'] == $pId)
            {
                $v['nodes'] =$this->getPower($data, $v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }

        //用户信息显示
    public function roleshowlist()
    {
        $info = D('User')->select();
        //查询全部角色的信息
        $rinfo = D('Role')->select();
        $this->assign('info',$info);
        $this->assign('rinfo',$rinfo);
        $this->display();
    }

    public function usermanagement()
    {
        $status['status']="1";
        $name=trim($_REQUEST['uname']);
        $need=array();
        $need['user.status']="1";
        if(!empty($name))//如果有输入查询的用户名
        {
            $map='%'.$name.'%';
            $need['uname']=array('like',$map);
        }
        $info = D('Role')->showuser($need);
        $rinfo = D('Role')->showrole();
        $finfo =D("User")->getUserlist($status);
        $userinfo=M('user_info')->select();
        $mas['level'] = 1;
        $mas['status'] = 1;
        $organization = M('organizationt')->where($mas)->field('id,namezh,nameus')->select();
        $this->assign('organization',$organization);
        $this->assign('userinfoid',$userinfo);
        $this->assign('fidinfo',$finfo);
        $this->assign('userinfo',$info);
        $this->assign('roleinfo',$rinfo);
        $this->assign('name',$name);
        $this->display();
    }
    //获取组织架构
    public function getOrganizationt(){
        $mas['level'] = 1;
        $mas['status'] = 1;
        $organization = M('organizationt')->where($mas)->field('id,namezh')->select();
        $this->ajaxReturn($organization);
    }
    //获取角色
    public function getuserRole(){
        $rinfo = D('Role')->showrole();
        $this->ajaxReturn($rinfo);
    }
    public function searchusers()
    {
        $info = D('Role')->showuser();
        $rinfo = D('Role')->showrole();
        $this->assign('userinfo',$info);
        $this->assign('roleinfo',$rinfo);
        $this->display();
    }

    //获取指定UID的用户信息
    public function getUser(){
        $data['uid']=$_POST['uid'];
        $result=D('User')->getUser($data);
        return $this->ajaxReturn($result);
    }

    //创建用户
    public function addUser(){
        $ajaxru='NO';

        if (!empty($_POST['uname']) AND !empty($_POST['pwd']) AND !empty($_POST['roleid'])){
            $date['uname']=trim($_POST['uname']);
            $date['pwd']=trim($_POST['pwd']);
            $date['role_id']=$_POST['roleid'];
            $date['status']=1;
            $result = (int)M('user')->data($date)->add();
            $data['status'] = 1;
            $data['uid']=$result;//获取新用户的uid
            $data['company_id']=$_POST['company_id'];//公司id
            $data['organization_id']=$_POST['organization_id'];//部门
            $data['position_id']=$_POST['position_id'];//职务
            $data['numbering']=trim($_POST['numbering']);
            $data['lastname']=trim($_POST['lastname']);
            $data['name']=trim($_POST['name']);//获取uname字段，存入user_info表的name字段
            $data['lastnamezh']=trim($_POST['lastnamezh']);
            $data['namezh']=trim($_POST['namezh']);
            $data['sex']=$_POST['sex'];
            $data['email']=trim($_POST['email']);
            $data['path']='/Public/uploads/5b7a58dcd4f0d.jpg';
            $data['headimg']='5b7a58dcd4f0d.jpg';
            $data['identity']=trim($_POST['identity']);
            $data['remarks']=trim($_POST['remarks']);
            $data['account']=trim($_POST['account']);
            $data['bank']=trim($_POST['bank']);
            $res = M('user_info')->data($data)->add();
            $contact = I('post.contact');
            if (!empty($contact[0])){
                foreach ($contact as $key=>$value){
                    $Datacontact[] = array('uid'=>$data['uid'],'phone'=>$value);
                }
            }
            $result = M('contact')->addAll($Datacontact);
            $ajaxru='OK';
        }
        $this->ajaxReturn($ajaxru);
    }
    //修改用户 todo del 验证后删除
    public function editUser(){
        if (!empty($_POST['uname']) AND !empty($_POST['pwd']) AND !empty($_POST['role_id'])){
            $map['uid'] = $_POST['uid'];
            $date['uname']=$_POST['uname'];
            $date['pwd']=$_POST['pwd'];
            $date['role_id']=$_POST['role_id'];
            $date['status']=1;
            $result = M('user')->where($map)->data($date)->save();
            $this->ajaxReturn('OK');
        }else{
            $this->ajaxReturn('NO');
        }

    }
//删除用户
    public function delUser(){
        if(!empty($_POST['uid'])){
            $map['uid']=$_POST['uid'];
            $data['status']=0;
            $info = M('user')->where($map)->data($data)->save();
            if ($info){
                $infod = M('user_info')->where($map)->data($data)->save();
                $date['value'] = '';
                $date['uid'] = 0;
                $return = M('organization_info')->where($map)->data($date)->save();
                $this->ajaxReturn('OK');
            }
        }
    }
    //用户修改
    // 显示
    public function proving(){

        // 加载页面
        $this->display();
    }
    //用户修改下的 获取页面值 ajxa
    public function ajax(){
        // 判断type有没有值
       // echo json_encode($_POST['pwd']);
       // exit;
       // 给变量赋值
       $uid=$_POST['uid'];
       $pwd=$_POST['pwd'];
       $type=$_POST['type'];
       $mod = M('user');
       $res = $mod->where("uid={$uid}")->find();
        // 通过查询获取用户密码验证密码是否正确
        if($res['pwd'] == $pwd){
            // $this->assign('type',$type);
            // 密码正确 返回type值
             echo  json_encode($type);
        }else{
            // 密码错误 返回信息
             echo json_encode('密码错误');
        }

    }
    //用户修改下的 分配 ajax
    public function edit(){
        // 获取ajax的type值
         $type=$_GET['type'];
         // 分配数据
         $this->assign('type',$type);
         // 加载页面
         $this->display();

    }
    //lyf 用户修改 执行修改 用户名和密码
//     public function update(){
//        if(!empty($_POST['uname']) or !empty($_POST['pwd'])){
//        // 通过查询获取用户UID
//        $mod = M("user");
//        $res = $mod->where("uid={$_SESSION['user_info']['uid']}")->find();
//        // 判断用户UID是否是当前登陆的UID
//         if($_POST['uid']==$res['uid']){
//            // 判断用户修改的是密码还是账号
//             if(!$_POST['uname']){
//                // 修改的是密码
//                $result = $mod->where("uid={$_POST['uid']}")->save($_POST);
//                 $this->success("修改成功",U("System/proving"));
//                 // 执行清空session 退出操作  让用户重新登录
//                setcookie("$this->loginMarked", NULL, -3600, "/");
//                unset($_SESSION["$this->loginMarked"], $_COOKIE["$this->loginMarked"]);
//                if (isset($_SESSION[C('USER_AUTH_KEY')])) {
//                    unset($_SESSION[C('USER_AUTH_KEY')]);
//                }
//                unset($_SESSION);
//                session_destroy();
//
//            }else{
//                // 修改的是账号
//                // 通过查询判断账号是否存在
//                $uname = $_POST['uname'];
//               $result = $mod->where("uname='%s'",$uname)->select();
//                if($result){
//                    $this->error("账号重复",U("System/proving"));
//                }else{
//                     $result = $mod->where("uid={$_POST['uid']}")->save($_POST);
//                     $this->success("修改成功",U("System/proving"));
//                      // 执行清空session 退出操作  让用户重新登录
//                    setcookie("$this->loginMarked", NULL, -3600, "/");
//                    unset($_SESSION["$this->loginMarked"], $_COOKIE["$this->loginMarked"]);
//                    if (isset($_SESSION[C('USER_AUTH_KEY')])) {
//                        unset($_SESSION[C('USER_AUTH_KEY')]);
//                    }
//                    unset($_SESSION);
//                    session_destroy();
//                  }
//            }
//
//            }else{
//             $this->error("请勿修改他人账号",U("System/proving"));
//            }
//          }else{
//            $this->error("账号或密码不能为空",U("System/proving"));
//          }
//
//    }

    //提示语列表
    public function noticelist(){
        $info=M('notice_text')->select();
        $this->assign('info',$info);
        $this->display();
    }

    //提示语详情
    public function noticedetails(){
        $map['id']=$_POST['id'];
        $list=M('notice_text')->where($map)->select();
        return $this->ajaxReturn($list);
    }

    //修改提示语
    public function noticeedit(){
        $map['id']=$_POST['id'];
        $data['textzh']=$_POST['textzh'];
        $data['textus']=$_POST['textus'];
        $result=M('notice_text')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        return $this->ajaxReturn($list);
    }
    //修改密码
    public function updatePassword(){
        if (IS_POST){
            $uid = I('post.uid');
            $oldpassword = I('post.oldpassword');//旧密码
            $res =  M("user")->where("uid={$_SESSION['user_info']['uid']}")->field('uid')->find();
              //判断旧密码是否相同和用户UID是否是当前登陆的UID
              if ($oldpassword==$_SESSION['user_info']['pwd'] AND $res['uid']==$uid){
                  $newpassword = I('post.newpassword');//新密码
                  $confirmnewpwd = I('post.confirmnewpwd');//确认新密码
                    //判断两次输入密码是否一致
                  if ($newpassword==$confirmnewpwd){
                      $map['uid']=$_SESSION['user_info']['uid'];
                      $data['pwd'] = I('post.newpassword');
                      $user = M('user')->where($map)->data($data)->save();
                      if ($user){
                          // 执行清空session 退出操作  让用户重新登录
                          setcookie("$this->loginMarked", NULL, -3600, "/");
                          unset($_SESSION["$this->loginMarked"], $_COOKIE["$this->loginMarked"]);
                          if (isset($_SESSION[C('USER_AUTH_KEY')])) {
                              unset($_SESSION[C('USER_AUTH_KEY')]);
                          }
                          unset($_SESSION);
                          session_destroy();
                          $return = 'ok';
                      }else{
                          $return = 'fo';
                      }
                  }else{
                      $return = 'so';
                  }
       
              }else{
                  $return = 'no';
              }
        }else{
            $return = 'ko';
        }
        
        $this->ajaxReturn($return);

    }
    //修改登录名
    public function upAc()
    {
        //验证身份
        $pwd=$_POST['pwd'];
        $newAc=$_POST['newuname'];
        if (IS_POST){
            $uid = $_SESSION['user_info']['uid'];
            $ac=M('user')->where('id='.$uid.' AND status = 1 ');//查询 当前登录的id
            //判断密码是否正确
            if ($ac['pwd']===$pwd)
            {
                //判断新登录名和原先的登录名是否相同
                if ($ac['uname']===$newAc)
                {
                    //相同 返回 Not changed name
                    $return['info']='Not changed name';
                    $return ['status']=2;
                }else{
                    //查询新登录名 是否重复
                    $repeat=M('user')->where('uname='.$newAc)->find();
                    if(empty($repeat))
                    {
                        //不重复,则执行 修改
                        $re=M('user')->where('id= '.$uid)->data('uname=')->save();
                        //需要发邮件提醒 新的账号名
                        $return ['info']= 'ok';
                        $return ['status']=1;
                    }else{
                        //重复
                        $return ['info']='repeat name';
                        $return ['status']=2;
                    }
                }
            }else{
                //密码不正确
                $return['info']= 'not password';
                $return ['status']=2;
            }
//            $verifuser=M('user')->where('id=')->select();
        }else{
            //没有post信息 即 未提交信息
            $return['info']= 'no submit';
            $return ['status']=2;
        }

        $this->ajaxReturn($return);
    }

 }