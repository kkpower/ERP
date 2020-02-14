<?php
/**
 * Created by PhpStorm.
 * User: chy
 * Date: 2017/8/9
 * Time: 19:55
 */

namespace Home\Controller;
use Think\Controller;
use Home\Model\user_infoModel;

class EmployeelistController extends CommonController
{

    public function index()
    {
        $map=array();
        $search_term=trim($_GET['search_term']);//获取搜索条件
        $company = I('get.company_id');
        if (!empty($search_term))
        {
            $map['user_info.name|concat(user_info.lastnamezh,user_info.namezh)|user_info.email'] = array('like', "%" .$search_term. "%", 'or');
        }
        //$result=D('Product')->lookup($map);
        $mas['level'] = 1;
        $mas['status'] = 1;
        $x=new  \Home\Model\UserModel();
        if (LANG_SET=='zh-cn'){
            $result=$x->searchlist($map);
            $organization = M('organizationt')->where($mas)->field('id,namezh')->select();
        }elseif (LANG_SET=='en-us'){
            $result=$x->searchlistUs($map);
            $organization = M('organizationt')->where($mas)->field('id,nameus as namezh')->select();
        }



        $this->assign('organization',$organization);
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->display();
    }
    //添加新员工
    public function add()
    {
        $data['sex']=$_POST['sex'];//性别
        $data['name']=trim($_POST['name']);
        $data['lastname']=trim($_POST['lastname']);
        $data['namezh']=trim($_POST['namezh']);
        $data['lastnamezh']=trim($_POST['lastnamezh']);
        $data['email']=$_POST['email'];
        $data['bank']=$_POST['bank'];
        $data['headimg']='5b7a58dcd4f0d.jpg';
        $data['path']='/Public/uploads/5b7a58dcd4f0d.jpg';
        $data['account']=$_POST['account'];//银行账号
        $data['identity']=$_POST['identity'];
        $data['remarks']=$_POST['remarks'];
        $data['status']="1";
        $data['company_id']=$_POST['company_id'];//公司id
        $data['organization_id']=$_POST['organization_id'];//部门
        $data['position_id']=$_POST['position_id'];//职务
        $data['numbering'] = I('post.numbering');
        $uname = I('post.uname');
        $pwd = I('post.pwd');
        //创建用户账号,得到创建用户的id
        $data['uid']=(int)D('user')->useradd($uname,$pwd);
        $result[] = M('user_info')->data($data)->add();//写入用户数据
        $contact=$_POST['contact'];//电话号码
        if (!empty($contact[0])){
            foreach ( $contact as $key => $value)
            {
                $Datacontact[]= array('uid'=>$data['uid'],'phone'=>$value);
            }
        }
        $result[] = M('contact')->addAll($Datacontact);
        $this->success('新增成功', 'index');
    }
    //调动员工 ajax获取员工信息
    public function transferuser(){
        $map['uid'] = I('post.uid');
        $map['status'] = 1;
        $return = M('user_info')->where($map)->field('lastnamezh,namezh,numbering')->find();
        $this->ajaxReturn($return);
    }
    //执行调动
    public function transferDou(){
        $map['uid'] = I('post.uid');
        $map['status'] = 1;
        $data['company_id'] = I('post.company');
        $data['organization_id'] = I('post.bumen');
        $data['position_id'] = I('post.position');
        $mau['user_info.uid'] = I('post.uid'); //用户id
        $user_info = M('user_info')
            ->field('organization_info.organization_id as organization_id')
            ->where($mau)
            ->join('LEFT JOIN organization_info ON user_info.organization_id = organization_info.organization_id')
            ->select();
        if ($user_info){
            //部门下面的组织扩展信息有用户执行
            $mam['organization_id'] = $user_info[0]['organization_id'];
            $value['value'] = ''; //默认修改为空字串
            $info = M('organization_info')->where($mam)->data($value)->save();
        }
        $user_infoa = M('user_info')
            ->field('organization_info.organization_id as organization_id')
            ->where($mau)
            ->join('LEFT JOIN organization_info ON user_info.company_id = organization_info.organization_id')
            ->select();
        if ($user_infoa){
            //公司下面的组织扩展信息有用户执行
            $mamo['organization_id'] = $user_infoa[0]['organization_id'];
            $value['value'] = '';
            $info = M('organization_info')->where($mamo)->data($value)->save();
        }
        $return = M('user_info')->where($map)->data($data)->save();
        $this->ajaxReturn($return);
    }
    //删除员工
    public function dell()
    {
        $condition['uid']=(int)$_POST['nodesid'];
        $c['status']=0;
        $info = M('user')->where($condition)->save($c);
        if ($info){
            $result= M('user_info')->where($condition)->save($c);
            $data['value'] = '';
            $data['uid'] = 0;
            $return = M('organization_info')->where($condition)->data($data)->save();
            $this->ajaxReturn($result);
        }
    }
    function getAjaxOrganization($leader)
    {
        $type = I('post.type');
        if ($type == 1){
            $where['status']=1;
            $where['fatherid']=$leader;
            if (LANG_SET=='zh-cn'){
                $data=M('organizationt')->field('id,namezh,level')->where($where)->select();
            }elseif (LANG_SET=='en-us'){
                $data=M('organizationt')->field('id,nameus as namezh,level')->where($where)->select();
            }
            return $this->ajaxReturn($data);
        }
        if ($type == 2){
            $where['status']=1;
            $where['oid']=$leader;
            if (LANG_SET=='zh-cn'){
                $data = M('position')->field('id,namezh')->where($where)->select();
            }elseif(LANG_SET=='en-us'){
                $data = M('position')->field('id,nameus as namezh')->where($where)->select();
            }

            return $this->ajaxReturn($data);
        }
    }
 }