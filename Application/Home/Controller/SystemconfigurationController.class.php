<?php
namespace Home\Controller;
use Think\Controller;

class SystemconfigurationController extends CommonController {
    //系统配置
    public function index(){
        $map['company_configuration.status'] = 1;
        $map['organizationt.status'] = 1;
        $map['country.status'] = 1;
        if (LANG_SET=='zh-cn'){
            $list = M('company_configuration')
                ->where($map)
                ->field('
                company_configuration.company as company,
                company_configuration.country as country,
                company_configuration.warehouse_physical as warehouse_physical,
                organizationt.namezh as namezh,
                warehouse.name as name,
                country.countryzh as countryzh
            ')
                ->join('LEFT JOIN organizationt ON company_configuration.company = organizationt.id') //公司名称
                ->join('LEFT JOIN warehouse ON company_configuration.warehouse_physical = warehouse.id')  //仓库名称
                ->join('LEFT JOIN country ON company_configuration.country = country.id')   //国家名称
                ->select();
        }elseif (LANG_SET=='en-us'){
            $list = M('company_configuration')
                ->where($map)
                ->field('
                company_configuration.company as company,
                company_configuration.country as country,
                company_configuration.warehouse_physical as warehouse_physical,
                organizationt.nameus as namezh,
                warehouse.englishname as name,
                country.countryus as countryzh
            ')
                ->join('LEFT JOIN organizationt ON company_configuration.company = organizationt.id') //公司名称
                ->join('LEFT JOIN warehouse ON company_configuration.warehouse_physical = warehouse.id')  //仓库名称
                ->join('LEFT JOIN country ON company_configuration.country = country.id')   //国家名称
                ->select();
        }
        $this->assign('list',$list);
        $this->display();
    }
     //国家管理
    public function exchangeRate(){
        $map['status'] = '1';
        $list = M('country')
            ->where($map)
            ->order('id desc')
            ->select();
        $this->assign('list',$list);
        $this->display();
    }
    //新增 国家信息
    public function addCountry()
    {
        $data['countryzh']=$_POST['namezh'];
        $data['countryus']=$_POST['nameus'];
        $data['spelling']=$_POST['country_logogram'];//国家 简写
        $data['exchange_rate']=$_POST['exchange_rate'];//汇率
        $data['currency']=$_POST['currency'];//货币缩写
        $data['symbol']=$_POST['currency_symbol'];//货币符号
        //添加 一条国家记录进入数据库
        $re_info=M('country')->data($data)->add();
        $this->ajaxReturn('ok');//返回 1 为成功
    }
    //检测 国家 名称是否重复 todo
    public function checkCountryAjax()
    {
        if (!empty($_POST['c_id']))
        {
            $where['id']=array('NEQ',$_POST['c_id']);
        }
        //查询字段名
        $key=$_POST['key'];
        //查询信息
        $value=$_POST['value'];
        $where["$key"]=$value;
        $check=M('country')->where($where)->find();
        if (empty($check))
        {
            $re='ok';//不重复
        }else{
            $re='check';//重复
        }
        $this->ajaxReturn($re);
    }
    // ajax 获取单个国家信息
    public function getCountryAjax()
    {
        $where['id']=$_POST['c_id'];//国家id
        $re=M('country')->where($where)->select();
        $this->ajaxReturn($re);
    }
    //修改 单个国家的信息
    public function saveCountryAjax()
    {
        $where['id']=$_POST['c_id'];//国家id
        $data['countryzh']=$_POST['namezh'];
        $data['countryus']=$_POST['nameus'];
        $data['spelling']=$_POST['country_logogram'];//国家 简写
        $data['exchange_rate']=$_POST['exchange_rate'];//汇率
        if ($where['id']==1)//汇率是与人民币的换算数,所以人民币 : 人民币永远应该是 1:1
        {
            $data['exchange_rate']=1;
        }
        $data['currency']=$_POST['currency'];//货币缩写
        $data['symbol']=$_POST['currency_symbol'];//货币符号
        $re=M('country')->where($where)->save($data);
        $re['info']='ok';//成功的提示语
        $re['status']=1;//成功返回1
        $this->ajaxReturn($re);//返
    }

    //国家扩展名称 todo
    public function countryExtend(){
        $map['country_id'] = I('get.id');
        $map['status'] = 1;
        $trem['id'] = I('get.id');
        $trem['status'] = 1;
        //查询国家信息
        $countryname = M('country')->where($trem)->field('countryzh,countryus')->find();
        //查询国家扩展名
        $list = M('country_extend')->where($map)->field('id,name')->select();
        $this->assign('list',$list);
        $this->assign('countryname',$countryname['countryzh']);
        $this->display();
    }

    //修改国家扩展名称 todo
    public function countryNameEdit(){
        $map['id'] = I('post.id');
        $map['status'] = 1;
        $data['name'] = I('post.rate');
        $info = M('country_extend')->where($map)->data($data)->save();
        if (empty($data['name'])){
            $return = 'KO';//不能为空
        }elseif ($info){
            $return = 'OK';//修改成功
        }else{
            $return = 'NO';//修改失败
        }
        $this->ajaxReturn($return);
    }
     //账号 paypal
    




}