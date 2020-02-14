<?php
namespace Home\Model;
use Think\Model;

class Labor_timeModel extends Model
{
    //添加订单劳动时间
    public function addtime($data){
        $data['create_time']=date("Y-m-d");
        $list=$this->add($data);
        return $list;
    }

    //查询asin
    public function asin($asin){
        $asin['status']=1;
        $list=$this->where($asin)->find();
        return $list;
    }

    //修改订单劳动时间
    public function edittime($where,$data){
        //$data['uid']=$_SESSION['user_info']['uid'];
        $data['create_time']=date("Y-m-d");
        $list=$this->where($where)->save($data);
        return $list;
    }

    //劳动列表页面
    public function workList($data,$pagen=10,$limit=true){
        $result=array();
        $data['labor_time.status']=1;
        $count=$this
            ->field('warehouse_power.method,
                     warehouse.name,
                     warehouse.englishname,
                     warehouse.company,
                     country_range.w_id,
                     country_range.range,
                     labor_time.cid,
                     labor_time.time,
                     labor_time.create_time,
                     labor_time.asin,
                     labor_time.id as time_id')
            ->join('LEFT JOIN warehouse ON labor_time.wid = warehouse.id')
            ->join('LEFT JOIN warehouse_power ON warehouse_power.range = warehouse.id')
            ->join('LEFT JOIN country_range ON warehouse.id = country_range.id')
            ->where($data)
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
            ->field('warehouse_power.method,
                     warehouse.name,
                     warehouse.englishname,
                     warehouse.company,
                     country_range.w_id,
                     country_range.range,
                     labor_time.cid,
                     labor_time.time,
                     labor_time.create_time,
                     labor_time.asin,
                     labor_time.id as time_id')
            ->join('LEFT JOIN warehouse ON labor_time.wid = warehouse.id')
            ->join('LEFT JOIN warehouse_power ON warehouse_power.range = warehouse.id')
            ->join('LEFT JOIN country_range ON warehouse.id = country_range.id')
            ->where($data)
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //劳动详情
    public function workDetails($data){
        $data['labor_time.status']=1;
        $data['product.status']='1';
        $data['order_customer_bom.status']=1;
        $list=$this
            ->field('labor_time.asin,
                     order_customer_bom.pid,
                     order_customer_bom.number,
                     order_customer_bom.price,
                     one.number as bclass,
                     two.number as sclass,
                     product.number as num,
                     product.namezh,
                     product.thumb')
            ->where($data)
            ->join('LEFT JOIN order_customer_bom ON labor_time.asin = order_customer_bom.asin')
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
            ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
            ->select();
        return $list;
    }
}