<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class LoginController extends Controller {

    public $loginMarked;

    /**
    +----------------------------------------------------------
     * 初始化
    +----------------------------------------------------------
     */
    public function _initialize() {
        header("Content-Type:text/html; charset=utf-8");
        header('Content-Type:application/json; charset=utf-8');
        $loginMarked = C("TOKEN");
        $this->loginMarked = md5($loginMarked['admin_marked']);

    }

    /**
     * 登录
     */
    public function index(){
        //验证码校验

        if(IS_POST){
            $returnLoginInfo = D("Login")->auth(); //用户密码确认
            if ($returnLoginInfo['status'] == 1) {
                //$map = array();
                //$map['email'] = $_REQUEST['email'];
                //    $this->success("登录成功",U('Index/index','','')); 更改登录提示
                $this->redirect("Index/index");
            }
            if ($returnLoginInfo['status'] == 0) {
                //$this->error($returnLoginInfo['info'],U('Login/index','',''));//登录失败提示
                $this->assign('returnAc',$returnLoginInfo['returnAc']);
                $this->assign('returnPa',$returnLoginInfo['returnPa']);
                $this->assign('login_info',$returnLoginInfo['info']);
                $this->display("Login/index");
                exit;
            }
        }else{
            if(isset($_COOKIE[$this->loginMarked])) {
                $this->redirect("Index/index");
            }
            $this->assign('login_info','0');
            $this->display("index");
        }
    }

    /**
     * 创建验证码
     */
    public function verify_code() {


        ob_end_clean();
        $config =    array(
            'fontSize' => C('fontSize'),   // 验证码字体大小
            'length'   => C('length'),     // 验证码位数
            'useNoise' => C('useNoise'),   // 验证码杂点
            'codeSet' => C('codeSet'),    // 验证码字符集合
            'useCurve' =>C('useCurve'),
        );
        $verify = new Verify($config);
        $verify->entry();

    }
    /**
     * 登出
     */
    public function loginOut() {

        setcookie("$this->loginMarked", NULL, -3600, "/");
        unset($_SESSION["$this->loginMarked"], $_COOKIE["$this->loginMarked"]);
        if (isset($_SESSION[C('USER_AUTH_KEY')])) {
            unset($_SESSION[C('USER_AUTH_KEY')]);
        }
        unset($_SESSION);
        session_destroy();
        $this->redirect("Login/index");
    }

    /**
     * 忘记密码  todo 待删除
     */

    public function forgetpwd($name){
        //验证,电话号码和用户名,将会给email 发邮件 todo
                $data['uname']=$name;
                $ce=M('user')->where($data)->find();
                $shi['uid']=$ce['fid'];
                $op=M('User')->where($shi)->field('ualias,call')->find();
                return $this->ajaxReturn($op);
    }

    /**
     * 版本说明 Description
     **/
    public function description()
    {
        $this->display();
    }
}