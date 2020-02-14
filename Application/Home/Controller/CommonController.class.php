<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller
{
    public $loginMarked;

    public $log;

    public $userInfo;

    public $rcache;


    /**
     * 总控制器初始化方法
     * 作用：用于一些全局行的控制器的控制，如权限，信息共享等
     */
    public function _initialize(){
        //判断,如果
        if (ismobile()) {
            //设置默认默认主题为 Mobile
            C('DEFAULT_V_LAYER','Mobile');
        }
        header("Content-Type:text/html; charset=utf-8");
        header('Content-Type:application/json; charset=utf-8');
        $token = C('TOKEN');
        $this->loginMarked = md5($token['admin_marked']);
        //menuId
        $menuId = I('get.menuId','');
        if($menuId != ''){
            $_SESSION['leftMenuPid'] = $menuId;
            //获取该菜单下的第一个子菜单id
            foreach($_SESSION['userNodeLists'] as $list) {
                if ($list['pid'] == $menuId) {
                    $_SESSION['nowId'] = $list['id'];
                    break;
                }
            }
        }
        $currId = I('request.nowId','');
        if($currId != ''){
            $_SESSION['nowId'] = $currId;
        }
        $this->checkLogin();
        $this->checkAccess();
    }


    public function checkLogin() {
        if (isset($_COOKIE[$this->loginMarked])) {
            $cookie = explode("_", $_COOKIE[$this->loginMarked]);
            $timeout = C("TOKEN");
            if (time() > (end($cookie) + $timeout['admin_timeout'])) {
                setcookie("$this->loginMarked", NULL, -3600, "/");
                unset($_SESSION[$this->loginMarked], $_COOKIE[$this->loginMarked]);
                $this->error("登录超时，请重新登录", U("Login/index"));
            } else {
                if ($cookie[0] == $_SESSION[$this->loginMarked]) {
                    setcookie("$this->loginMarked", $cookie[0] . "_" . time(), 0, "/");
                } else {
                    setcookie("$this->loginMarked", NULL, -3600, "/");
                    unset($_SESSION[$this->loginMarked], $_COOKIE[$this->loginMarked]);
                    $this->error("帐号异常，请重新登录", U("Login/index"));
                }
            }
        } else {
            $this->redirect("Login/index");
        }
        return TRUE;
    }

    /**
     * 用户权限校验
     */
    public function checkAccess(){
        $isSuperAdmin = $_SESSION['isAdministrator'];
        if(!$isSuperAdmin){
            //获取执行的Controller和function
            $curUrl = CONTROLLER_NAME.'/'.ACTION_NAME;
            $result = false;
            if($curUrl == 'Index/index') return;
            foreach($_SESSION['userNodeLists'] as $list){
                if($list['auth_c'].'/'.$list['auth_a'] == $curUrl){
                    $result = true;
                    $this->assign("ControllerName",$list['auth_name']);
                    $this->assign("ControllerNameus",$list['auth_nameus']);
                    break;
                }
            }
            if(!$result){
               $this->error("您没有该操作权限", U("Login/index"));
            }
        }
        $this->userInfo=(object)$_SESSION['user_info'];
    }

}