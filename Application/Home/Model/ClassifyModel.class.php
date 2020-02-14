<?php

namespace Home\Model;
use Think\Model;

 class ClassifyModel extends Model
 {
     //添加新的目录级别
     public function addClassify($data)
     {
         $result=$this->data($data)->add();
         return $result;
     }
 }