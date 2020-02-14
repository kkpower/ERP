<?php

namespace Home\Model;
use Think\Model;

//权限模型
class HtmlModel extends Model{

    public function getHtml($data,$limit=true){
        $result=array();
        $number=$this->where($data)->group('number')->select();
        $count=count($number);
        $Page = getPage($count,C('pageNum'));
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        if($limit){
            $firstRow = $Page->firstRow;
            $listRow = $Page->listRows;
        }else{
            $firstRow = 0;
            $listRow = $count;
        }
        $list=$this
            ->field('
           html.*
           ')
            ->where($data)
            ->group('number')
            ->limit($firstRow.','.$listRow)
            ->order('html.id asc')
            ->select();
        $result['list']=$list;
        $result['page'] = $Page->show();
        return $result;
    }

}

