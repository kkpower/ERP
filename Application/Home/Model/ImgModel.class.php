<?php
namespace Home\Model;
use Think\Model;

class ImgModel extends Model{
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

 }








 ?>