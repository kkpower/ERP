<?php
namespace Home\Model;
use Think\Model;

class Stock_enterModel extends Model{

    //入库
    public function warehousing($data){
        $return = $this->data($data)->add();
        return $return;
    }

    public function chastock($map){
        $list = $this
            ->where($map)
            ->field('
                stock_enter.pid,
                sum(stock_enter.number)-sum(stock_out.number) as number

            ')
            ->join('LEFT JOIN stock_out ON stock_enter.pid = stock_out.pid')
            ->group('stock_enter.pid')
            ->select();
        return $list;
    }

    //运输中
    public function transportStock($map){
        $map['stock_enter.state'] = 1;
        $map['stock_enter.mold'] = 2;//运输中
        $result=array();
        $list=$this
            ->field('
                stock_enter.id as id,
                stock_enter.pid as pid,
                stock_enter.warehouse_id as warehouse_id,
                product.namezh as namezh,
                product.price as price,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock_enter.number) as number,
                warehouse_physical.id as zk_id,
                warehouse_physical.name as zkname
            ')
            ->where($map)
            ->join('LEFT JOIN product ON stock_enter.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN warehouse ON stock_enter.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->group('stock_enter.pid,stock_enter.warehouse_id')
            ->select();
        $result['list']=$list;
        return $result;
    }
    //运输详情
    public function transportTo($map){
        $map['stock_enter.state'] = 1;
        $map['stock_enter.mold'] = 2;
        $result=array();
        $list=$this
            ->field('
                stock_enter.id as id,
                stock_enter.pid as pid,
                stock_enter.warehouse_id as warehouse_id,
                stock_enter.creationtime as creationtime,
                product.namezh as namezh,
                product.price as price,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock_enter.number) as number,
                warehouse.name as kqname,
                warehouse_physical.id as zk_id,
                warehouse_physical.name as zkname,
                stock_enter.mold as mold,
                stock_enter.o_id as o_id,
                stock_enter.sourceorder as sourceorder,
                stock_enter.o_id as order_number,
                status_ex.namezh as odnamezh
             
            ')
            ->where($map)
            ->join('LEFT JOIN product ON stock_enter.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN warehouse ON stock_enter.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->join('LEFT JOIN status_ex ON stock_enter.sourceorder = status_ex.id')
            ->join('LEFT JOIN order_purchase_success ON stock_enter.o_id = order_purchase_success.id')
            ->group('stock_enter.o_id')
            ->select();
        $result['list']=$list;
        return $result;
    }
    
    
}




?>