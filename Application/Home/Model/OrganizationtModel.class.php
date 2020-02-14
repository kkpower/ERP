<?php

namespace Home\Model;
use Think\Model;

//组织架构模型
class OrganizationtModel extends Model
{
    //获取level
     public   function getlevel($id)
    {
        $map['id']=$id;
        return M('organizationt')->where($map)->getField('level');
    }
    //获取 leader
    public  function getorganizationInfo ($id)
    {
        $map['id']=$id;
        return M('organizationt')->where($map)->getField('leader');
    }
    //新建
    public function addorganization($data)
    {
//        $data['state']="1";
        $return=$this->data($data)->add();
        return $return;
    }
    //修改
    public function saveorganization($map,$data)
    {
        $return=M('organizationt')
            ->where($map)
            ->data($data)
            ->save();
        return $return;
    }


}

