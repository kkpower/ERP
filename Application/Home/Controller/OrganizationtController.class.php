<?php
namespace Home\Controller;
use Think\Controller;

class OrganizationtController extends CommonController {

    //显示结构主页
    public function index()
    {
        //获取国家信息
        $map['status'] = 1;
        if (LANG_SET=='zh-cn'){
            $list = M('country')->where($map)->field('id,countryzh')->select();
        }elseif (LANG_SET=='en-us'){
            $list = M('country')->where($map)->field('id,countryus as countryzh')->select();
        }

        $this->assign('countrylist',$list);
        $this->display();
    }
    //调动  获取公司下的部门  职位
    public function getOrganized(){
        $type = I('post.type');
        if (LANG_SET=='zh-cn'){
            switch ($type){
                //通过公司id获取公司下的部门信息
                case 1:
                    $map['fatherid'] = I('post.id'); //父级id
                    $map['status'] = 1;
                    $return = M('organizationt')->where($map)->select();//组织表
                    break;
                //通过部门id获取该部门的职位信息
                case 2:
                    $map['oid'] = I('post.id'); //组织id
                    $map['status'] = 1;
                    $return = M('position')->where($map)->select();//职位表
                    break;
                //查询该员工的信息和组织架构下所有的公司
                case 3:
                    $map['user_info.uid'] = I('post.id');
                    $userifo = new \Home\Model\User_infoModel();
                    $return['one'] = $userifo->getUser_infoBasic($map);
                    $company_where['level'] = 1;
                    $company_where['status'] = 1;
                    $return['company'] = M('organizationt')->where($company_where)->select();//查询组织表下的公司
            }
        }elseif (LANG_SET=='en-us'){
            switch ($type){
                //通过公司id获取公司下的部门信息
                case 1:
                    $map['fatherid'] = I('post.id'); //父级id
                    $map['status'] = 1;
                    $return = M('organizationt')->where($map)->field('id,nameus as namezh')->select();//组织表
                    break;
                //通过部门id获取该部门的职位信息
                case 2:
                    $map['oid'] = I('post.id'); //组织id
                    $map['status'] = 1;
                    $return = M('position')->where($map)->field('id,nameus as namezh')->select();//职位表
                    break;
                //查询该员工的信息和组织架构下所有的公司
                case 3:
                    $map['user_info.uid'] = I('post.id');
                    $User_info= new \Home\Model\User_infoModel();
                    $return['one'] = $User_info->getUser_infoBasic($map);
                    $maq['level'] = 1;
                    $maq['status'] = 1;
                    $return['company'] = M('organizationt')->where($maq)->field('id,nameus as namezh')->select();//查询组织表下的公司

            }
        }
        $this->ajaxReturn($return);

    }
    //获取整个组织架构的所有节点
    public function getOrganizationAjax()
    {
        $map['status']=1;
        if (LANG_SET=='zh-cn'){
            $organizationt=M('organizationt')
                ->field('id,fatherid as nodes,namezh as text')
                ->where($map)
                ->select();
        }elseif (LANG_SET=='en-us'){
            $organizationt=M('organizationt')
                ->field('id,fatherid as nodes,nameus as text')
                ->where($map)
                ->select();
        }
        $tree =$this->getTree($organizationt, 1);//递归公司
        $tree=json_encode($tree); //将接收的数组解码
        $this->ajaxReturn($tree);
    }
    //通过节点获取组织信息
    public function  getUser(){
        $type = I('post.type');
        if (LANG_SET=='zh-cn'){
            switch ($type){
                case 1: //获取公司下的信息
                    $map['organization_id'] = I('post.nodesid');
                    $map['state'] = '1';
                    $mam['fatherid'] = I('post.nodesid');
                    $mam['status'] = 1;
                    $mau['id'] = I('post.nodesid');
                    $mau['status'] = 1;
                    $muj['user_info.company_id'] = I('post.nodesid');
                    $muj['user_info.organization_id'] = 0;
                    $muj['user_info.status'] = 1;
                    $muj['organization_info.state'] = 1;
                    $mag['company_configuration.company'] =  I('post.nodesid');
                    $mag['company_configuration.status'] = 1;
                    $mag['country.status'] = 1;
                    $userlist['user'] = M('user_info')
                        ->where($muj)
                        ->field('lastnamezh,namezh')
                        ->join('LEFT JOIN organization_info ON user_info.uid =  organization_info.uid')
                        ->join('LEFT JOIN organization_info as jk ON user_info.company_id = jk.organization_id')
                        ->find();
                    $userlist['company']=M('organization_info')
                        ->where($map)
                        ->select();
                    $userlist['branch']=M('organizationt')
                        ->field('id,namezh,nameus')
                        ->where($mam)
                        ->select();
                    $userlist['firm']=M('organizationt')
                        ->where($mau)
                        ->select();
                    $userlist['country']=M('company_configuration')
                        ->where($mag)
                        ->field('country.countryzh as countryzh')
                        ->join('LEFT JOIN country ON company_configuration.country =  country.id')
                        ->find();
                    break;
                case 2: //获取部门下的信息
                    $x=new  \Home\Model\User_infoModel();
                    $mak['organization_id'] = I('post.nodesid');
                    $mak['state'] = '1';
                    $map['user_info.organization_id'] = I('post.nodesid');
                    $userlist['staff']= $x->staffLookup($map);
                    $mau['position.oid'] = I('post.nodesid');
                    $mau['position.status'] = 1;
                    $mam['id'] = I('post.nodesid');
                    $mam['status'] = 1;
                    $muj['user_info.status'] = 1;
                    $muj['organization_info.state'] = 1;
                    $muj['organization_info.organization_id'] = I('post.nodesid');
                    $userlist['user'] = M('user_info')
                        ->where($muj)
                        ->field('lastnamezh,namezh')
                        ->join('LEFT JOIN organization_info ON user_info.uid =  organization_info.uid')
                        ->join('LEFT JOIN organization_info as jk ON user_info.organization_id = jk.organization_id')
                        ->find();
                    $userlist['firm']=M('organizationt')
                        ->where($mam)
                        ->select();
                    $userlist['company']=M('organization_info')
                        ->where($mak)
                        ->select();
                    $userlist['position']=M('position')
                        ->where($mau)
                        ->field('position.namezh as namezh,
                position.oid as oid,
                organizationt.fatherid as fid,
                position.id as id')
                        ->join('LEFT JOIN organizationt ON position.oid = organizationt.id')
                        ->select();
                    break;
                case 3: //获取职位信息
                    $map['user_info.position_id'] = I('post.id'); //职务id
                    $trem['id'] = I('post.id');
                    $trem['status'] = 1;
                    $userlist['firm'][0] = M('position')->where($trem)->field('id,namezh,nameus')->find();
                    $x=new  \Home\Model\User_infoModel();
                    $userlist['staff'] =$x->staffLookup($map);
                    break;
            }
        }elseif (LANG_SET=='en-us'){
            switch ($type){
                case 1: //获取公司下的信息
                    $map['organization_id'] = I('post.nodesid');
                    $map['state'] = '1';
                    $mam['fatherid'] = I('post.nodesid');
                    $mam['status'] = 1;
                    $mau['id'] = I('post.nodesid');
                    $mau['status'] = 1;
                    $muj['user_info.company_id'] = I('post.nodesid');
                    $muj['user_info.organization_id'] = 0;
                    $muj['user_info.status'] = 1;
                    $muj['organization_info.state'] = 1;
                    $mag['company_configuration.company'] =  I('post.nodesid');
                    $mag['company_configuration.status'] = 1;
                    $mag['country.status'] = 1;
                    $userlist['user'] = M('user_info')
                        ->where($muj)
                        ->field('user_info.lastname as lastnamezh,user_info.name as namezh')
                        ->join('LEFT JOIN organization_info ON user_info.uid =  organization_info.uid')
                        ->join('LEFT JOIN organization_info as jk ON user_info.company_id = jk.organization_id')
                        ->find();
                    $userlist['company']=M('organization_info')
                        ->where($map)
                        ->select();
                    $userlist['branch']=M('organizationt')
                        ->field('id,nameus as namezh')
                        ->where($mam)
                        ->select();
                    $userlist['firm']=M('organizationt')
                        ->where($mau)
                        ->select();
                    $userlist['country']=M('company_configuration')
                        ->where($mag)
                        ->field('country.countryus as countryzh')
                        ->join('LEFT JOIN country ON company_configuration.country =  country.id')
                        ->find();
                    break;
                case 2: //获取部门下的信息
                    $x=new  \Home\Model\User_infoModel();
                    $mak['organization_id'] = I('post.nodesid');
                    $mak['state'] = '1';
                    $map['user_info.organization_id'] = I('post.nodesid');
                    $userlist['staff']= $x->staffLookupus($map);
                    $mau['position.oid'] = I('post.nodesid');
                    $mau['position.status'] = 1;
                    $mam['id'] = I('post.nodesid');
                    $mam['status'] = 1;
                    $muj['user_info.status'] = 1;
                    $muj['organization_info.state'] = 1;
                    $muj['organization_info.organization_id'] = I('post.nodesid');
                    $userlist['user'] = M('user_info')
                        ->where($muj)
                        ->field('user_info.lastname as lastnamezh,user_info.name as namezh')
                        ->join('LEFT JOIN organization_info ON user_info.uid =  organization_info.uid')
                        ->join('LEFT JOIN organization_info as jk ON user_info.organization_id = jk.organization_id')
                        ->find();
                    $userlist['firm']=M('organizationt')
                        ->where($mam)
                        ->select();
                    $userlist['company']=M('organization_info')
                        ->where($mak)
                        ->select();
                    $userlist['position']=M('position')
                        ->where($mau)
                        ->field('position.nameus as namezh,
                position.oid as oid,
                organizationt.fatherid as fid,
                position.id as id')
                        ->join('LEFT JOIN organizationt ON position.oid = organizationt.id')
                        ->select();
                    break;
                case 3: //获取职位信息
                    $map['user_info.position_id'] = I('post.id'); //职务id
                    $trem['id'] = I('post.id');
                    $trem['status'] = 1;
                    $userlist['firm'][0] = M('position')->where($trem)->field('id,namezh,nameus')->find();
                    $x=new  \Home\Model\User_infoModel();
                    $userlist['staff'] =$x->staffLookupus($map);
                    break;
            }
        }

        $this->ajaxReturn($userlist);
    }
    //递归 将数组转化为树
    public function getTree($data, $pId)
    {
        unset($tree);
        foreach($data as $k => $v)
        {
            if($v['nodes'] == $pId)
            {
                $v['nodes'] =$this->getTree($data, $v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }

    //修改 保存节点信息
    public function saveEmployee()
    {
        $mad['uid'] = I('post.uid');
        $map['id']=$_POST['nodesid'];
        $lavel = I('post.level');
        $data['nameus']=$_POST['nameus'];
        $data['namezh']=$_POST['namezh'];
        $return[]=M('organizationt')->where($map)->data($data)->save();
        $mau['oid'] = $_POST['nodesid'];
        $mau['status'] = 1;
        $zwzh = M('position')->where($mau)->field('id')->find();
        $dete['position_id'] = $zwzh['id'];
        $dete['organization_id'] = 0;
        $mun['uid'] = 0;
        $mun['value'] = '';
        if (!empty($mad)AND $lavel==1){
            $organization_info = M('organization_info')->where($mad)->data($mun)->save();
            $user = M('user_info')->where($mad)->data($dete)->save();
        }
        if ($_POST['address']!="")
        {
            $map_info['organization_id']=$_POST['nodesid'];
            $map_info['name']='address';
            $data_info['value']=$_POST['address'];
            $data_info['uid'] = I('post.uid');
            $return[]=M('organization_info')->where($map_info)->data($data_info)->save();
            $trem['company'] = I('post.nodesid');
            $trem['status'] = 1;
            $address['address']=$_POST['address'];
            $company_configuration = M('company_configuration')->where($trem)->data($address)->save();
        }
            $map_info['organization_id']=$_POST['nodesid'];
            $map_info['name'] = 'phone';
            $data_info['uid'] = I('post.uid');
            $data_info['value']=$_POST['phone'];
            $return[]=M('organization_info')
                ->where($map_info)
                ->data($data_info)
                ->save();
         $this->ajaxReturn($return);
    }
    //新节点添加
    public function addCompany()
    {
        $type = I('post.type');
        $personnel = I('post.personnel');
        switch ($type){
            case 1:     //添加公司或部门
                $data['fatherid']=$_POST['nodesid'];//父级组织的id
                $data['level']=strval(intval(D('organizationt')->getlevel($_POST['nodesid']))+1);
                //获取节点的级别 +1 为当前节点的级别
                $data['status']=1;
                $data['namezh']=$_POST['namezh'];//中文名
                $data['nameus']=$_POST['nameus'];//英文名
                    $m= new \Home\Model\OrganizationtModel();
                    $return[0]=$m->addorganization($data);
                if ($return[0])//如果有负责人,则填充部门信息进入扩展表
                {
                    $muj['organization_info.uid'] = I('post.uid');
                    $muj['organizationt.level'] = 1;
                    $organization_info = M('organization_info')
                        ->field('organization_info.uid')
                        ->where($muj)
                        ->join('LEFT JOIN organizationt ON organization_info.organization_id = organizationt.id')
                        ->select();
                    if (!empty($organization_info)){
                        $cod['uid'] = I('post.uid');
                        $mun['value'] = '';
                        $mun['uid'] = 0;
                        $neice = M('organization_info')->where($cod)->data($mun)->save();
                    }
                    $data_info[]=array('organization_id'=>$return[0],'name'=>'phone','value'=>$_POST['phone'],'state'=>'1','uid'=>I('post.uid'));//电话
                    $x=M('organization_info');
                    $return[]=$x
                        ->addAll($data_info);
                        $mod['namezh'] = '经理';
                        $mod['nameus'] = 'manager';
                        $mod['status'] = 1;
                        $mod['oid'] = $return[0];//组织id
                        $mod['order'] = 1; //排序
                        $position[0] = M('position')->data($mod)->add();
                        $trem['uid'] = I('post.uid');
                        $value['company_id'] = I('post.nodesid');
                        $value['organization_id'] = $return[0]; //组织id
                        $value['position_id'] = $position[0]; //职位id
                        $info = M('user_info')->where($trem)->save($value);
                        unset($mod);//销毁变量
                        unset($value);
                }
                break;
            case 2:     //添加职位
                $data['oid'] = I('post.nodesid');
                $data['status'] = 1;
                $data['order'] = 0;
                $data['namezh'] = I('post.chname');
                $data['nameus'] = I('post.egname');
                $return = M('position')->data($data)->add();
                unset($data); //销毁变量
                break;
        }
        $this->ajaxReturn($return);
    }
    //删除节点信息
    public function dellCompany()
    {
        $map['id']=$_POST['nodesid'];//当前节点的id
        $mau['organization_id'] = I('post.nodesid');
        $mau['status'] = 1;
        $user = M('user_info')->where($mau)->field('id')->select(); //用户
        $rout['fatherid'] = I('post.nodesid');
        $rout['status'] = 1;
        $list = M('organizationt')->where($rout)->field('id')->select(); //组织
        if (!$user AND !$list){  //公司下没有部门和用户再执行删除
            $data['status'] = 2;
            $state['state'] = '2';
            $term['organization_id'] = I('post.nodesid');
            $data_info['oid'] = I('post.nodesid');
            $data_info['status'] = 1;
            $re['oront']=M('organizationt')
                ->field('status')
                ->where($map)
                ->data($data)
                ->save();
            $re['orinfo'] = M('organization_info')
                ->where($term)
                ->data($state)
                ->save();
            $re['position'] = M('position')
                ->where($data_info)
                ->data($data)
                ->save();
            $this->ajaxReturn('OK');
        }else{
            $this->ajaxReturn('NO');
        }
    }
    //获取导航条
    public function getCompanyPath()
    {
        $type = I('post.type');
        if ($type==3){  //获取职位导航条
            $value['fatherid']=$map['id']=$_POST['oid'];//父级组织的id
            if (LANG_SET=='zh-cn'){
                do {
                    $id['id'] = $_POST['nodesid'];
                    $map['id'] = $value['fatherid'];//fatherid父级id作为查询条件来查找
                    $map['status'] = 1;
                    $put[] = $value = M('organizationt')
                        ->field('id,fatherid as nodes,level,namezh as text,fatherid')
                        ->where($map)
                        ->find();
                }while ($value['fatherid']>1);//父级别应大于1,等于1,则到达树底部
                $arr = M('position')->where($id)->field('namezh as text')->find();
                array_unshift($put,$arr);
            }elseif(LANG_SET=='en-us'){
                do {
                    $id['id'] = $_POST['nodesid'];
                    $map['id'] = $value['fatherid'];//fatherid父级id作为查询条件来查找
                    $map['status'] = 1;
                    $put[] = $value = M('organizationt')
                        ->field('id,fatherid as nodes,level,nameus as text,fatherid')
                        ->where($map)
                        ->find();
                }while ($value['fatherid']>1);//父级别应大于1,等于1,则到达树底部
                $arr = M('position')->where($id)->field('nameus as text')->find();
                array_unshift($put,$arr);
            }

        }else{
            $value['fatherid']=$map['id']=$_POST['nodesid'];//父级组织的id
            if (LANG_SET=='zh-cn'){
                do {
                    $map['id'] = $value['fatherid'];//fatherid父级id作为查询条件来查找
                    $map['status'] = 1;
                    $put[] = $value = M('organizationt')
                        ->field('id,fatherid as nodes,level,namezh as text,fatherid')
                        ->where($map)
                        ->find();
                }while ($value['fatherid']>1);//父级别应大于1,等于1,则到达树底部
            }else if (LANG_SET=='en-us'){
                do {
                    $map['id'] = $value['fatherid'];//fatherid父级id作为查询条件来查找
                    $map['status'] = 1;
                    $put[] = $value = M('organizationt')
                        ->field('id,fatherid as nodes,level,nameus as text,fatherid')
                        ->where($map)
                        ->find();
                }while ($value['fatherid']>1);//父级别应大于1,等于1,则到达树底部
            }


        }
        $this->ajaxReturn($put);
    }
    //获取 员工的信息 员工编码 公司-部门-职位
    public function getUser_infoAjax()
    {
        $_POST;//todo
    }
    //调动员工ajax获取
    public function gettransfer(){
        $map['user_info.uid'] = I('post.id');
        $x = new \Home\Model\User_infoModel();
        $list = $x->showStaff($map);
        $this->ajaxReturn($list);
    }
    //执行调动
    public function transferDo(){

        $map['uid'] = I('post.uid');
        $data['company_id'] = I('post.company'); //公司id
        $data['organization_id'] = I('post.bumen'); //部门id
        $data['position_id'] = I('post.position'); //职位id
        $mau['user_info.uid'] = I('post.uid'); //用户id
        if (!empty( $data['company_id']) AND !empty( $data['organization_id']) AND !empty( $data['position_id'])){
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
            $return = M('user_info')->where($map)->save($data);
            $this->ajaxReturn($return);
        }else{
            $this->ajaxReturn('NO');
        }
        unset($data);
    }
    //修改公司和新建部门ajax获取
    public function getDepartment(){
        $type = I('post.type');
        if ($type==1){
            $map['company_id'] = I('post.id'); //公司id
            $map['status'] = 1;
                if (LANG_SET=='zh-cn'){
                    $return = M('user_info')->where($map)->field('uid,lastnamezh,namezh')->select();
                }elseif (LANG_SET=='en-us'){
                    $return = M('user_info')->where($map)->field('uid,lastname as lastnamezh,name as namezh')->select();
                }

        }else{
            $map['organization_id'] = I('post.id'); //部门id
            $map['company_id'] = I('post.company'); //公司id
            $map['status'] = 1;
            if (LANG_SET=='zh-cn'){
                $return = M('user_info')->where($map)->field('uid,lastnamezh,namezh')->select();
            }elseif (LANG_SET=='en-us'){
                $return = M('user_info')->where($map)->field('uid,lastname as lastnamezh,name as namezh')->select();
            }

        }
        $this->ajaxReturn($return);
    }
//    //移除员工
//    public function removeUser(){
//        $map['uid'] = I('post.id');
//        $mau['user_info.uid'] = I('post.id');
//        $map['status'] = 1;
//        $user_info = M('user_info')
//            ->field('organization_info.organization_id as organization_id')
//            ->where($mau)
//            ->join('LEFT JOIN organization_info ON user_info.organization_id = organization_info.organization_id')
//            ->select();
//        $user_infoa = M('user_info')
//            ->field('organization_info.organization_id as organization_id')
//            ->where($mau)
//            ->join('LEFT JOIN organization_info ON user_info.company_id = organization_info.organization_id')
//            ->select();
//        if ($user_infoa){
//            $mamo['organization_id'] = $user_infoa[0]['organization_id'];
//            $value['value'] = '';
//            $info = M('organization_info')->where($mamo)->data($value)->save();
//        }
//        if ($user_info){
//            $mam['organization_id'] = $user_info[0]['organization_id'];
//            $value['value'] = '';
//            $info = M('organization_info')->where($mam)->data($value)->save();
//        }
//        $data['organization_id'] = 0;
//        $data['position_id'] = 0;
//        $return = M('user_info')->where($map)->save($data);
//        $this->ajaxReturn($return);
//    }
    //添加部门,获取员工姓名
    public function getUname(){
        $map['uid'] = I('post.id');
        $map['status'] = 1;
        $trem['uid'] = I('post.id');
        $return['info'] = M('user_info')->where($map)->field('lastnamezh,namezh,numbering')->find();
        $return['contact'] = M('contact')->where($trem)->field('id,phone')->select();//电话
        $this->ajaxReturn($return);
    }
    //新增公司弹框  获取所有员工
    public function  getStaffs(){
        $map['status'] = I('post.status');
        if (LANG_SET=='zh-cn'){
            $return = M('user_info')->where($map)->field('uid,lastnamezh,namezh')->select();
        }elseif(LANG_SET=='en-us'){
            $return = M('user_info')->where($map)->field('uid,lastname as lastnamezh,name as namezh')->select();
        }

        $this->ajaxReturn($return);
    }
    //执行添加公司
    public function addCompanys(){
            $data['namezh'] = I('post.namezh');
            $data['nameus'] = I('post.nameus');
            $data['fatherid'] = 1;
            $data['level'] = 1;
            $data['status'] = 1;
            $phone = I('post.phone');
            $address = I('post.address');
            if (!empty( $data['namezh']) AND !empty($data['nameus'])){
                $return[0] = M('organizationt')->data($data)->add();
            }
            if ($return[0]){
                $guration['company'] =  (int)$return[0];
                $guration['warehouse_physical'] = 0;
                $guration['country']  = I('post.country');
                $guration['address']  = I('post.address');
                $guration['status']  = 1;
                $company_conf = M('company_configuration')->data($guration)->add();
                $company['company_id'] = (int)$return[0];
                $map['uid'] = I('post.uid');

                $position['oid'] = (int)$return[0];
                $position['namezh'] = '经理';
                $position['nameus'] = 'manager';
                $position['status'] = 1;
                $position['order'] = 1;
                $bbv = M('position')->data($position)->add();

                $value['company_id'] = (int)$return[0];
                $value['organization_id'] = 0;
                $value['position_id'] = (int)$bbv;
                $user = M('user_info')->where($map)->data($value)->save();
                $data_info[]=array('organization_id'=>$return[0],'name'=>'phone','value'=>$_POST['phone'],'state'=>'1','uid'=>I('post.uid'));//电话
                $data_info[]=array('organization_id'=>$return[0],'name'=>'address','value'=>$_POST['address'],'state'=>'1','uid'=>I('post.uid'));//地址
                $x=M('organization_info');
                $return[]=$x
                    ->addAll($data_info);
                $this->ajaxReturn('OK');
                unset($data);
                unset($data_info);
            }else{
                $this->ajaxReturn('NO');
            }
    }
    //修改职位弹框
    public function getPosition(){
        $map['status'] = 1;
        $map['id'] = I('post.id'); //职位id
        $return = M('position')->where($map)->field('namezh,nameus')->find();
        $this->ajaxReturn($return);
    }
    //执行修改职位
    public function updatePosition(){
        $map['id'] = I('post.position_id');
        $data['namezh'] = I('post.namezh'); //职位中文名
        $data['nameus'] = I('post.nameus'); //职位英文名
        $return = M('position')->where($map)->save($data);
        $this->ajaxReturn($return);
    }
    //删除职位
    public function delPosition(){
        $map['id'] = I('post.positionid'); //职位id
        $data['status'] = 2;
        $trem['position_id'] = I('post.positionid'); //职位id
        $user_info = M('user_info')->where($trem)->field('id')->select();
        if (empty($user_info)){
            $return = M('position')->where($map)->setField($data);
            $this->ajaxReturn('OK');
        }else{
            $this->ajaxReturn('SO');
        }
    }
    
    //获取国家信息
    public function getajaxCountry(){
        $map['id'] = I('post.id');
        $map['status'] = 1;
        $return = M('country')->where($map)->field('spelling,countryzh,countryus,symbol,currency,exchange_rate,money')->find();
        $this->ajaxReturn($return);
    }
    //更改国家信息
    public function saveCountry()
    {
        $map['id'] = I('post.id');
        $map['status'] = 1;
        $data['spelling'] = I('post.spelling');
        $data['countryzh'] = I('post.countryzh');
        $data['countryus'] = I('post.countryus');
        $data['symbol'] = I('post.symbol');
        $data['currency'] = I('post.currency');
        $data['exchange_rate'] = I('post.exchange_rate');
        $data['money'] = I('post.money');
        $arr = in_array('',$data);
        if ($arr){
            $this->ajaxReturn('NO');
        }else{
            $return = M('country')->where($map)->data($data)->save();
            $this->ajaxReturn($return);
        }
       
    }
    //获取公司信息
    public function getajaxCompany(){
        $map['id'] = I('post.id');
        $map['status'] = 1;
        $map['fatherid'] = 1;
        $map['level'] = 1;
        $return = M('organizationt')->where($map)->field('namezh,nameus')->find();
        $this->ajaxReturn($return);
    }
    //更改公司信息
    public function saveCompany()
    {
        $map['id'] = I('post.id');
        $map['status'] = 1;
        $data['namezh'] = I('post.namezh');
        $data['nameus'] = I('post.nameus');

        //查询重复的中文名
        $namezh['namezh'] = I('post.namezh');
        $namezh['fatherid'] = 1;
        $namezh['level'] = 1;
        $namezh['status'] = 1;
        $company_namezh = M('organizationt')->where($namezh)->field('id')->find();
        //查询重复的英文名
        $nameus['nameus'] = I('post.nameus');
        $nameus['fatherid'] = 1;
        $nameus['level'] = 1;
        $nameus['status'] = 1;
        $company_nameus = M('organizationt')->where($nameus)->field('id')->find();
        //判断中文名或英文名为空
        if (empty($data['namezh'] || empty($data['nameus']))){
           $this->ajaxReturn('of');
            //判断中文名重复
        }elseif($company_namezh['id'] AND $company_namezh['id']!==$map['id']){
            $this->ajaxReturn('zh');
            //判断英文名重复
        }elseif ($company_nameus['id'] AND $company_nameus['id']!==$map['id']){
            $this->ajaxReturn('us');
        }else{
            $return = M('organizationt')->where($map)->data($data)->save();
            $this->ajaxReturn($return);
        }
    }
    //检测重复信息
    public function getajaxRepeat(){
        $type = (int)I('post.type');
        $id = I('post.id');
        switch ($type){
            case 1:
                $map['spelling'] = trim(I('post.name'));//国家简拼
                $map['status'] = 1;
                $map['id'] = array('neq',$id);
                $return = M('country')->where($map)->field('id')->find();
                break;
            case 2:
                $map['countryzh'] = trim(I('post.name')); //国家中文名称
                $map['status'] = 1;
                $map['id'] = array('neq',$id);
                $return = M('country')->where($map)->field('id')->find();
                break;
            case 3:
                $map['countryus'] = trim(I('post.name')); //国家英文名称
                $map['status'] = 1;
                $map['id'] = array('neq',$id);
                $return = M('country')->where($map)->field('id')->find();
                break;
            case 4:
                $map['money'] = trim(I('post.name')); //货币名称
                $map['status'] = 1;
                $map['id'] = array('neq',$id);
                $return = M('country')->where($map)->field('id')->find();
                break;
            case 5:
                $map['symbol'] = trim(I('post.name')); //货币符号
                $map['status'] = 1;
                $map['id'] = array('neq',$id);
                $return = M('country')->where($map)->field('id')->find();
                break;
            case 6:
                $map['currency'] = trim(I('post.name')); //货币缩写
                $map['status'] = 1;
                $map['id'] = array('neq',$id);
                $return = M('country')->where($map)->field('id')->find();
                break;
        }
        $this->ajaxReturn($return['id']);
    }
    //获取所有国家的配送范围
    public function listAjaxRange()
    {
        $_POST['country'];//国家id
        $_POST['country'];//仓库id
        $_POST['country'];//公司id
        //严格区分大小写
        $return=M('country_range')->where('status=1')->select();
        $this->ajaxReturn($return);
    }
    public function saveAjaxRange()
    {
        $_POST['country'];//国家id
        $_POST['country'];//仓库id
        $_POST['country'];//公司id
        //严格区分大小写
        $return=M('country_range')->where('status=1')->select();
        $this->ajaxReturn($return);
    }

    //查看,用户收货,发货权限
    public function listt(){}
}