<?php
namespace Home\Model;
use Think\Model;

class ImglineModel extends Model{
    public function listimg($condition)
    {
        $map['imgline.status']='1';
        $condition;
        $result=$this
            ->field('
            imgline.id as id,
            img.path as path,
            img.filename as filename,
            img.thumpath as thumpath,
            img.thumfile as thumfile,
            img.creationtime as creationtime
            ')
            ->where($condition)
            ->where($map)
            ->join('LEFT JOIN img ON imgline.imgid=img.id')
            ->select();
        return $result;
    }

    //写入图库
    public function writeimg($dataimg)
    {
        //state状态 1为启用
        $dataimg['state']=1;
        //creationtime创建时间
        $dataimg['creationtime']=date("Y-m-d H:i:s",time());
        $dataimgline['imgid']=($this->data($dataimg)->add());
        $dataimgline['state']=1;
        $dataimgline['pid']=1;
        $dataimgline['creationtime']=date("Y-m-d H:i:s",time());
        D('imgline')->data($dataimgline)->add();
    }

    //查询某一类型作废图片
    public function getImglineType($type)
    {
        //接收数组：类型、状态
        $map['imgline.type']=$type;
        $map['imgline.status']='3';
        $list=$this->where($map)
            ->field('img.id,
                     img.type,
                     img.path,
                     img.filename,
                     img.thumpath,
                     img.thumfile,
                     img.status,
                     imgline.id,
                     imgline.type,
                     imgline.imgid,
                     imgline.fid,
                     imgline.status')
            ->join('LEFT JOIN img ON imgline.imgid = img.id')
            ->select();
        return $list;
    }

 }








 ?>