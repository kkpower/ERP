<?php 
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    //制作方法对用户名和密码进行校验
	function checkNamePwd($name,$pwd){
		//1.根据$name查询是否由此记录
		//select * from user where uname=$nam;
		//根据字段查询
		$info =$this->getByuname($name);

			if($info != null){
				//验证密码
				if($info['upwd'] != $pwd){
					return false;

				 }else{
				 		return $info;

				     }  
			 }else{
			 		return false;
			 	 }
	 }
	 function getUserlist($data){
	   return  $this->field("
	      uid as fid,
	      uname
	      
	     ")->where($data)
             ->select();
     }
	 //查询用户单一id信息
	 function getUser($data){
	     $userlist=$this->where($data)->find();
         $fusername['uid']=$userlist['fid'];
         $userlist['fname']=$this->where($fusername)->getField('uname');
         return $userlist;
     }
     //修改用户权限
     function updUser($data,$role_id){
         $info=M('User')->where($data)->save($role_id);
         return $info;
     }

    /**
     * 获取所有用户的用户名
     * @return mixed
     */
    function getUsernames(){
        return $this->field('uid,uname')->select();
    }
    //    查询单个员工的信息
    public function getinfo($map)
    {
        $cat['user_info.uid']=$map['id'];
        $data=M('user_info')
            ->field('
            user_info.*,
            user.role_id,
            position.namezh as position,
            department.namezh as department,
            company.namezh as comname  
            ')
            ->where($cat)
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN organizationt as company ON user_info.company_id = company.id')
            ->join('LEFT JOIN organizationt as department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN user ON user_info.uid=user.uid')
            ->select();
        return $data;
    }

    public function getinfoa($map)
    {
        $cat['user_info.uid']=$map['id'];
        $data=M('user_info')
            ->field('
            user_info.*,
            position.namezh as position,
            department.namezh as department,
            company.namezh as comname  
            ')
            ->where($cat)
            ->join('LEFT JOIN organization position ON user_info.position_id = position.id')
            ->join('LEFT JOIN organization company ON user_info.company_id = company.id')
            ->join('LEFT JOIN organization department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN user ON user_info.uid=user.uid')
            ->select();
        return $data;
    }

    public function userfind($datas){
//注入 session user_info
          $list=$this
               ->field('
                user.*,
                user_info.id,
                user_info.uid,
                user_info.lastnamezh,
                user_info.namezh,
                user_info.lastname,
                user_info.name,
                user_info.path
               ')
               ->where($datas)
               ->join('LEFT JOIN user_info ON user.uid=user_info.uid')
               ->find();
        return $list;
    }

    public function user()
	    {
	       		$info = M("user")->select();
	       		return $info;
	    }

        //用户与员工查询表

    public function userinfo(){

        $data=$this
            ->field('
            user.*,
            user_info.name,
            contact.phone,
            user_info.email
            ')
            ->join('LEFT JOIN contact ON user.uid=contact.uid')
            ->join('LEFT JOIN user_info ON user.uid=user_info.uid')
            ->select();
        return $data;
    }

    //创建用户
    public function useradd($uname,$pwd)
    {
        $data['uname']= $uname;
        $data['pwd'] = $pwd;
        $data['status'] = 1;
        $data['role_id'] = 2;
        return $this->data($data)->add();
    }
    //人员名录 中文模式
    public function searchlist($map,$pagen=10,$limit=true)
    {
        //创建返回数组
        $result=array();
        $map['user.status'] = 1;
        $map['user_info.status'] = 1;
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
            ->join('LEFT JOIN user_info ON user.uid = user_info.uid')
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
            ->join('LEFT JOIN user_info ON user.uid = user_info.uid')
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN organizationt as department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN organizationt ON user_info.company_id = organizationt.id')
            ->limit($firstRow.','.$listRow)
            ->order('user.uid desc')
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
    //人员名录 英文模式
    public function searchlistUs($map,$pagen=10,$limit=true)
    {
        //创建返回数组
        $result=array();
        $map['user.status'] = 1;
        $map['user_info.status'] = 1;
        $count=$this
            ->field('
             user_info.name as name,
            user_info.uid as id,
            user_info.namezh as namezh,
            user_info.email as email,
            position.nameus as position,
            user_info.lastnamezh as lastnamezh,
            department.nameus as department,
            organizationt.nameus as company,
            user_info.identity as identity')
            ->where($map)
            ->join('LEFT JOIN user_info ON user.uid = user_info.uid')
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
            position.nameus as position,
            user_info.lastnamezh as lastnamezh,
            department.nameus as department,
            organizationt.nameus as company,
            user_info.identity as identity')
            ->where($map)
            ->join('LEFT JOIN user_info ON user.uid = user_info.uid')
            ->join('LEFT JOIN position ON user_info.position_id = position.id')
            ->join('LEFT JOIN organizationt as department ON user_info.organization_id = department.id')
            ->join('LEFT JOIN organizationt ON user_info.company_id = organizationt.id')
            ->limit($firstRow.','.$listRow)
            ->order('user.uid desc')
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
 }








 ?>