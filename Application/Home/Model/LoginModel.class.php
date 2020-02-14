<?php
/**
 * Created by PhpStorm.
 * User: Dong.J.W
 * Date: 2017/8/22 0022
 * Time: 22:55
 */

namespace Home\Model;
use Think\Model;
use Think\Verify;
class LoginModel extends Model
{
    Protected $autoCheckFields = false;

    public function auth(){
        $datas = $_POST;
        $verify = new Verify();
        if (!$verify->check($_POST['code'])) {
//            return array('status' => 0, 'info' => "验证码错误");
            return array('status' => 0, 'info' => "3",'returnAc'=>$_POST['uname'],'returnPa'=>$_POST['pwd']);
        }
        $user = D("User");
        //注入 session user_info
        $info = $user->userfind("`uname`='" . $datas["uname"] . "' and user.status=1");
        if (count($info) >= 1) {
            $tmpPwd=$datas['pwd'];
            if($info['pwd'] != $tmpPwd) {
//                return array('status' => 0, 'info' => "你的账号密码不正确，请重试");
                return array('status' => 0, 'info' => "1");
            }
            if ($info['status'] == 0) {
//                return array('status' => 0, 'info' => "你的账号被禁用，有疑问联系管理员");
                return array('status' => 0, 'info' => "2");
            }
            $isSuperAdmin = false;
            //超级用户判断
            if($info['role_id'] == 1){
                $isSuperAdmin = true;
            }
            //用户 角色权限整理
            if(!$isSuperAdmin){
                //如果不是超级用户,从此查询角色的权限
                 $nodeList = D('Role')->getNodeByUid($info['role_id']);
             }else{
                 $nodeList = M('auth')->where('status = 1')->order('array')->select();
             }
            //用户区域信息
            //组织cookie
            $loginFlag = C("TOKEN");
            $loginFlag = md5($loginFlag['admin_marked']);
            $shell = $info['uid'] . $info['pwd'];
            $_SESSION[$loginFlag] = "$shell";
            $shell.= "_" . time();
            setcookie($loginFlag, "$shell", 0, "/");
            //组织cookie  end
            $_SESSION['user_info'] = $info;                   //myinfo 保存用户信息
            $_SESSION['isAdministrator'] = $isSuperAdmin;      //isSuperAdmin 是否为超级用户
            $_SESSION['userNodeLists'] = $nodeList;          //nodeList 保存用户信息
            return array('status' => 1, 'info' => "登录成功", 'url' => U("Index/index"));
        } else {
//            return array('status' => 0, 'info' => "不存在账号为：" . $datas["uname"] . '的用户！');
            return array('status' => 0, 'info' => "1");
        }
    }
}