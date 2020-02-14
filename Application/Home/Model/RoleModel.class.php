<?php
/**
 * Created by PhpStorm.
 * User: Dong.J.W
 * Date: 2017/8/22 0022
 * Time: 23:15
 */
namespace Home\Model;
use Think\Model;


class RoleModel extends Model
 {	 
 	Protected $autoCheckFields = false;

    public function getNodeByUid($data,$filedstr=""){
        $condition['id']=$data;
        $role_id=$this->field("role_auth_ids")->where($condition)->find();
        $auth_condition['id']=array('in',$role_id['role_auth_ids']);
        $auth_condition['status']=1;
        if(empty($filedstr)){
            $result=M("Auth")->where($auth_condition)->order('array')->select();

        }else{
            //暂时用不到 多语言版本的前瞻开发
                $result=M("Auth")->field("*,auth_nameus as label")->where($auth_condition)->order('array')->select();

        }

        return $result;
    }

        //查询ROLE表全部信息
    //旧的方法,不看状态
    function showrole(){
        $info=M('Role')->select();
        return $info;
    }
    //chy 新方法
    function showStatusRole(){
        $info=M('Role')->where('status=1')->select();
        return $info;
    }

    public function showuser($need){

        $list=M('user')
            ->field('
            user.*,
            role.id,
            role.role_name,
            role.role_nameus
           ')
            ->join('left join role on user.role_id=role.id')
            ->where($need)
            ->select();

       return $list;
    }

    public function roledata($data){

        $list=M('role')
            ->where($data)
            ->select();
        return $list;
    }

    public function roleids($data){

       $list =$this->field
            ->where($data)
            ->find();
        return $list;
    }

 }





 ?>