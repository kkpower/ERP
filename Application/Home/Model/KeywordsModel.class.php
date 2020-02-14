<?php
namespace Home\Model;
use Think\Model;

class KeywordsModel extends Model
{
    //关键词列表
    public function keywordsList($data, $pagen = 10, $limit = true)
    {
        $result = array();
        $count = $this
            ->where($data)
            ->count();
        $Page = getPage($count, $pagen);
        if ($limit) {
            $firstRow = $Page->firstRow;
            $listRow = $Page->listRows;
        } else {
            $firstRow = 0;
            $listRow = $count;
        }
        $list = $this
            ->where($data)
            ->group('id')
            ->limit($firstRow . ',' . $listRow)
            ->select();
        $result['list'] = $list;
        $result['page'] = $Page->show();
        $result['count'] = $count;
        return $result;
    }
}