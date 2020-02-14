<?php
namespace Home\Model;
use Think\Model;

class LaborerModel extends Model
{
    //劳动列表页面
    public function workList($map,$data,$pagen=10,$limit=true){
        $result=array();
        $data['laborer.status']=1;
        $count=$this
            ->field('user_info.namezh,
                     user_info.lastnamezh,
                     country.countryus,
                     laborer.cid,
                     laborer.time,
                     laborer.date,
                     laborer.o_id,
                     laborer.id as time_id')
            ->join('LEFT JOIN user_info ON laborer.uid = user_info.uid')
            ->join('LEFT JOIN country ON laborer.cid = country.id')
            ->where($data)
            ->where($map)
            ->count();
        $Page = getPage($count,$pagen);
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
            ->field('user_info.namezh,
                     user_info.lastnamezh,
                     country.countryus,
                     status_ex.name as status_name,
                     status_ex.namezh as status_namezh,
                     laborer.cid,
                     laborer.time,
                     laborer.date,
                     laborer.o_id,
                     laborer.approval,
                     laborer.asin,
                     laborer.id as time_id')
            ->join('LEFT JOIN user_info ON laborer.uid = user_info.uid')
            ->join('LEFT JOIN country ON laborer.cid = country.id')
            ->join('LEFT JOIN status_ex ON laborer.approval = status_ex.id')
            ->where($data)
            ->where($map)
            ->limit($firstRow.','.$listRow)
            ->select();
        $time=$this
            ->field('user_info.namezh,
                     user_info.lastnamezh,
                     country.countryus,
                     laborer.cid,
                     laborer.time,
                     laborer.date,
                     laborer.o_id,
                     laborer.asin,
                     SEC_TO_TIME(SUM(TIME_TO_SEC(laborer.time))) as agg,
                     laborer.id as time_id')
            ->join('LEFT JOIN user_info ON laborer.uid = user_info.uid')
            ->join('LEFT JOIN country ON laborer.cid = country.id')
            ->where($data)
            ->where($map)
            ->select();
        $result['list']=$list;
        $result['time']=$time;
        $result['page']=$Page->show();
        return $result;
    }

    //劳动详情
    public function workDetails($data){
        $data['laborer.status']=1;
        $data['product.status']='1';
        $data['order_customer_bom.status']=1;
        $list=$this
            ->field('laborer.asin,
                     laborer.o_id,
                     order_customer_bom.pid,
                     order_customer_bom.number,
                     order_customer_bom.price,
                     one.number as bclass,
                     two.number as sclass,
                     product.number as num,
                     product.namezh,
                     product.thumb')
            ->where($data)
            ->join('LEFT JOIN ebay_order ON laborer.o_id = ebay_order.ordercust_id')
            ->join('LEFT JOIN order_customer_bom ON ebay_order.var = order_customer_bom.asin')
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
            ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
            ->select();
        return $list;
    }
}