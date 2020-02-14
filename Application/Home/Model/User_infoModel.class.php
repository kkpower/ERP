<?php
namespace Home\Model;
use Think\Model;


class user_infoModel extends Model{
    public function searchlist($map,$pagen=10,$limit=true)
    {
        //创建返回数组
        $result=array();
        $map['user_info.status']='1';
        $map['organizationt.status'] = 1;
        $count=$this
            ->field('
             user_info.name as name,
            user_info.uid as id,
            user_info.namezh as namezh,
            user_info.email as email,
            position.namezh as position,
            user_info.lastnamezh as lastnamezh,
            department.namezh as department,
            organizationt.namezh as company,
            user_info.identity as identity')
            ->where($map)
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN organizationt as department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN organizationt ON user_info.company_id = organizationt.id')
            ->count();
        //$Page = getPage($count,C('pageNum')); 用c config下的 pagenum 变量来作为分页数量
        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        if($limit)
        {
            $firstRow = $Page->firstRow;
            $listRow = $Page->listRows;
        }else
            {
            $firstRow = 0;
            $listRow = $count;
        }
        $list=$this
            ->field('
            user_info.name as name,
            user_info.uid as id,
            user_info.namezh as namezh,
            user_info.email as email,
            position.namezh as position,
            user_info.lastnamezh as lastnamezh,
            department.namezh as department,
            organizationt.namezh as company,
            user_info.identity as identity')
            ->where($map)
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN organizationt as department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN organizationt ON user_info.company_id = organizationt.id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //搜索用户信息
    public function searchTele($map,$pagen=20,$limit=true){
        $result=array();
        $map['user_info.status']='1';
        $count=$this
            ->field('
           user_info.lastnamezh as lastnamezh,
            user_info.namezh as namezh,
            user_info.name as name,
            user_info.sex as sex,
            user_info.uid as uid,
            max(contact.phone) as phone
            ')
            ->where($map)
            ->join('LEFT JOIN contact ON user_info.uid = contact.uid')
            ->count('distinct user_info.uid');
        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        if($limit)
        {
            $firstRow = $Page->firstRow;
            $listRow = $Page->listRows;
        }else
        {
            $firstRow = 0;
            $listRow = $count;
        }
        $list=$this
            ->field('
            user_info.lastnamezh as lastnamezh,
            user_info.namezh as namezh,
            user_info.name as name,
            user_info.sex as sex,
            user_info.uid as uid,
            max(contact.phone) as phone
            ')
            ->where($map)
            ->join('LEFT JOIN contact ON user_info.uid = contact.uid')
            ->group('user_info.uid')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //查找组织架构下的员工信息  中文名称
    public function staffLookup($map){
        $map['organizationt.status'] = $map['user_info.status'] = 1;
        $userlist = M('user_info')
            ->where($map)
            ->field('
                user_info.uid as uid,
                user_info.lastnamezh as lastnamezh,
                user_info.namezh as namezh,
                position.namezh as namezw,
                max(contact.phone) as phone
            ')
            ->join('LEFT JOIN organizationt ON user_info.company_id = organizationt.id')
            ->join('LEFT JOIN organizationt as department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN contact ON user_info.uid = contact.uid')
            ->group('user_info.uid,user_info.lastnamezh,user_info.namezh')
            ->select();
        return $userlist;
    }
    //查找组织架构下的员工信息  英文名称
    public function staffLookupus($map){
        $map['position.status'] = $map['organizationt.status'] = $map['user_info.status'] = 1;
        $userlist = M('user_info')
            ->where($map)
            ->field('
                user_info.uid as uid,
                user_info.lastname as lastnamezh,
                user_info.name as namezh,
                position.nameus as namezw,
                max(contact.phone) as phone
            ')
            ->join('LEFT JOIN organizationt ON user_info.company_id = organizationt.id')
            ->join('LEFT JOIN organizationt as department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN contact ON user_info.uid = contact.uid')
            ->group('user_info.uid,user_info.lastnamezh,user_info.namezh')
            ->select();
        return $userlist;
    }
    //查看员工信息.
    public function getUser_infoBasic($where)
    {
        $langset=LANG_SET;//检查当前请求语言
        if ($langset=='zh-cn')
        {
            $lastname='lastnamezh';
            $name='namezh';
        }else{
            $lastname='lastname';
            $name='name';
        }
        $where['user_info.status']=1;
        $re=$this->where($where)
                ->field('
                user_info.uid as uid,
                user_info.'.$lastname.' as lastnamezh,
                user_info.numbering as numbering,
                user_info.company_id,
                user_info.organization_id,
                user_info.position_id,
                user_info.'.$name.' as namezh')
                ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->find();
        return $re;
    }
    //查看员工个人信息 //中文模式
    public function showStaff($map){
        $userlist = M('user_info')
            ->where($map)
            ->field('
                contact.uid as uid,
                user_info.lastnamezh as lastnamezh,
                user_info.numbering as numbering,
                user_info.namezh as namezh,
                max(contact.phone )as phone,
                position.namezh as nameuh
            ')
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN contact ON user_info.uid = contact.uid')
            ->group('contact.uid')
            ->select();
        return $userlist;
    }
    //查看员工个人信息 //英文模式
    public function showStaffus($map){
        $userlist = M('user_info')
            ->where($map)
            ->field('
                contact.uid as uid,
                user_info.lastname as lastnamezh,
                user_info.numbering as numbering,
                user_info.name as namezh,
                max(contact.phone )as phone,
                position.nameus as nameuh
            ')
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN contact ON user_info.uid = contact.uid')
            ->group('contact.uid')
            ->select();
        return $userlist;
    }

    //获取用户的权限区域
    public function getCid($filedstr=""){
        $map['user_info.uid']=$_SESSION['user_info']['uid'];
        $cid=$this->field('cid')->where($map)->select();
        $data['user_info.cid']=array('in',$cid['cid']);
        $data['user_info.status']='1';
        if(empty($filedstr)){
            $result=M("Country")->where($data)->select();
        }else{
            $result=M("Country")->field($filedstr)->where($data)->select();
        }
        return $result;
    }
 }



 ?>