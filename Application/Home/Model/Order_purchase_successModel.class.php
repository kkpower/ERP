<?php
namespace Home\Model;
use Think\Model;

class Order_purchase_successModel extends Model{
    //运输管理
    public function searchTransport($mad){
        $mad['order_purchase_success.status'] = 1;
        $mad['order_product_success.collect'] = 2;
        $mad['order_purchase_success.receiving_status'] = array('neq',1);
        $list=$this
            ->field('
             order_purchase_success.id as oid,
              order_purchase_success.supplier_id as supplier_id,
             order_purchase_success.id as order_number,
              order_purchase_success.ku_id as ku_id,
                 warehouse.id as zku_id,
             order_purchase_success.tracking_number as tracking_number,
             transport_mode.mode as namezh,
             order_purchase_success.examine_time as examine_time,
             warehouse.name as name,
             count(order_product_success.id) as number,
              order_purchase_success.logistics_status as logistics_status,
             supplier.name as supname,
             transporters.transporters as yssname,
             order_purchase_success.delivery_date as delivery_date
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON  order_purchase_success.logistics_status = transport_mode.id')
            ->join('LEFT JOIN transporters ON  order_purchase_success.transporter = transporters.id')
            ->join('LEFT JOIN order_product_success ON  order_purchase_success.id = order_product_success.order_purchase_success_id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->group('order_product_success.order_purchase_success_id')
            ->select();
        $result['list']=$list;
        return $result;
    }

    //采购运输中
    public function ransportationIn($map,$pagen=30,$limit=true){
        $result=array();
        $map['order_purchase_success.status'] = 1;
        $map['order_purchase_success.take'] = 1;
        $count=$this
            ->field('
              order_purchase_success.id as oid,
             status_ex.namezh as namezh,
             order_purchase_success.examine_time as examine_time,
             warehouse_physical.name as name,
             supplier.name as supname,
             product.namezh as goodname,
             order_product_success.num as number
            ')
            ->where($map)
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->join('LEFT JOIN status_ex ON  order_purchase_success.logistics_status = status_ex.id')
            ->join('LEFT JOIN order_product_success ON  order_purchase_success.id = order_product_success.order_purchase_success_id')
            ->join('LEFT JOIN product ON  order_product_success.supplier_pr_id = product.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
//            ->group('order_product_success.supplier_pr_id,order_purchase_success.supplier_id,order_purchase_success.ku_id,logistics_status')
            ->count();
        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
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
            ->field('
             order_purchase_success.id as oid,
             status_ex.namezh as namezh,
             order_purchase_success.examine_time as examine_time,
             warehouse_physical.name as name,
             supplier.name as supname,
             product.namezh as goodname,
             order_product_success.num as number
            ')
            ->where($map)
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->join('LEFT JOIN status_ex ON  order_purchase_success.logistics_status = status_ex.id')
            ->join('LEFT JOIN order_product_success ON  order_purchase_success.id = order_product_success.order_purchase_success_id')
            ->join('LEFT JOIN product ON  order_product_success.supplier_pr_id = product.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
//            ->group('order_product_success.supplier_pr_id,order_purchase_success.supplier_id,order_purchase_success.ku_id,logistics_status')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
//已完成采购订单
    public function searchCompleted($mad,$pagen=10,$limit=true){
        $result=array();
//        $mad['order_purchase_success.status'] = 1;
        $count=$this
            ->field('
                order_purchase_success.id as id,
                order_purchase_success.order_number as temporary_oid,
                order_purchase_success.supplier_id as supplier_id,
                order_purchase_success.id as order_number,
                 order_purchase_success.delivery_date as delivery_date,
                order_purchase_success.tracking_number as tracking_number,
                order_purchase_success.status as status,
                supplier.name as suppliername,
                warehouse.name as zkname,
                transporters.transporters as yssname,
                transport_mode.mode as  ysfxname,
                order_purchase_success.freight as freight,
                user_info.lastnamezh as lastnamezh,
                user_info.namezh as namezh,
                order_purchase_success.examine_time as examine_time,
                order_purchase_success.creationtime as creationtime,
                examine_id.lastnamezh as lastnamezhs,
                 order_purchase_success.supplier_id as supplier_id,
                examine_id.namezh as namezhs,
                supplier.contacts as contacts,
                supplier.contactnumber as contactnumber,
                supplier.email as email,
                order_purchase_success.delivery_date as delivery_date
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON  order_purchase_success.logistics_status = transport_mode.id')
            ->join('LEFT JOIN transporters ON  order_purchase_success.transporter = transporters.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info ON order_purchase_success.uid = user_info.uid')
            ->join('LEFT JOIN user_info as examine_id ON order_purchase_success.examine_id = examine_id.uid')
            ->count();
        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
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
            ->field('
                order_purchase_success.id as id,
                 order_purchase_success.order_number as temporary_oid,
                   order_purchase_success.id as order_number,
                order_purchase_success.status as status,
                 order_purchase_success.delivery_date as delivery_date,
                order_purchase_success.tracking_number as tracking_number,
                supplier.name as suppliername,
                warehouse.name as zkname,
                transporters.transporters as yssname,
                 order_purchase_success.supplier_id as supplier_id,
                transport_mode.mode as  ysfxname,
                order_purchase_success.freight as freight,
                user_info.lastnamezh as lastnamezh,
                user_info.namezh as namezh,
                order_purchase_success.examine_time as examine_time,
                order_purchase_success.creationtime as creationtime,
                examine_id.lastnamezh as lastnamezhs,
                examine_id.namezh as namezhs,
                order_purchase_success.supplier_id as supplier_id,
                supplier.contacts as contacts,
                supplier.contactnumber as contactnumber,
                supplier.email as email,
                order_purchase_success.delivery_date as delivery_date
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON  order_purchase_success.logistics_status = transport_mode.id')
            ->join('LEFT JOIN transporters ON  order_purchase_success.transporter = transporters.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info ON order_purchase_success.uid = user_info.uid')
            ->join('LEFT JOIN user_info as examine_id ON order_purchase_success.examine_id = examine_id.uid')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //历史订单
    public function orderHistorical($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['order_purchase_success.status'] = 2;
        $count=$this
            ->field('
                order_purchase_success.id as id,
                order_purchase_success.supplier_id as supplier_id,
                order_purchase_success.id as order_number,
                 order_purchase_success.delivery_date as delivery_date,
                order_purchase_success.tracking_number as tracking_number,
                supplier.name as suppliername,
                warehouse.name as zkname,
                transporters.transporters as yssname,
                transport_mode.mode as  ysfxname,
                order_purchase_success.freight as freight,
                user_info.lastnamezh as lastnamezh,
                user_info.namezh as namezh,
                order_purchase_success.examine_time as examine_time,
                order_purchase_success.creationtime as creationtime,
                examine_id.lastnamezh as lastnamezhs,
                 order_purchase_success.supplier_id as supplier_id,
                examine_id.namezh as namezhs,
                supplier.contacts as contacts,
                supplier.contactnumber as contactnumber,
                supplier.email as email,
                order_purchase_success.delivery_date as delivery_date
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON  order_purchase_success.logistics_status = transport_mode.id')
            ->join('LEFT JOIN transporters ON  order_purchase_success.transporter = transporters.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info ON order_purchase_success.uid = user_info.uid')
            ->join('LEFT JOIN user_info as examine_id ON order_purchase_success.examine_id = examine_id.uid')
            ->count();
        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
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
            ->field('
                order_purchase_success.id as id,
                   order_purchase_success.id as order_number,
                 order_purchase_success.delivery_date as delivery_date,
                order_purchase_success.tracking_number as tracking_number,
                supplier.name as suppliername,
                warehouse.name as zkname,
                transporters.transporters as yssname,
                 order_purchase_success.supplier_id as supplier_id,
                transport_mode.mode as  ysfxname,
                order_purchase_success.freight as freight,
                user_info.lastnamezh as lastnamezh,
                user_info.namezh as namezh,
                order_purchase_success.examine_time as examine_time,
                order_purchase_success.creationtime as creationtime,
                examine_id.lastnamezh as lastnamezhs,
                examine_id.namezh as namezhs,
                order_purchase_success.supplier_id as supplier_id,
                supplier.contacts as contacts,
                supplier.contactnumber as contactnumber,
                supplier.email as email,
                order_purchase_success.delivery_date as delivery_date
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON order_purchase_success.ku_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON  order_purchase_success.logistics_status = transport_mode.id')
            ->join('LEFT JOIN transporters ON  order_purchase_success.transporter = transporters.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info ON order_purchase_success.uid = user_info.uid')
            ->join('LEFT JOIN user_info as examine_id ON order_purchase_success.examine_id = examine_id.uid')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
    //订单进度查询
    public function orderList($mad,$pagen=10,$limit=true){
        $result=array();
        $count=$this
            ->field('
                order_purchase_success.id as id,
                order_purchase_success.receiving_status as receiving_status,
                order_purchase_success.id as order_number,
                supplier.id as sup_id,
                supplier.name as name
            ')
            ->where($mad)
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->count();
        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
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
            ->field('
                order_purchase_success.id as id,
                order_purchase_success.receiving_status as receiving_status,
                order_purchase_success.id as order_number,
                supplier.id as sup_id,
                supplier.name as name
      
            ')
            ->where($mad)
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')

            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
   //订单进度详情
    public function orderTracking($map,$mad){
        $map['order_purchase_process.status'] = 1;
        $map['order_purchase_success.status'] = 1;
        $mad['order_purchase_success_process.status'] = 1;
        $mad['order_purchase_success.status'] = 1;
        $mad['order_purchase_success_process.action'] = 1;
        $list['one'] = $this
            ->where($map)
            ->field('
                order_purchase_process.creationtime as creationtime,
                order_purchase_process.action as action,
                user_info.lastnamezh as lastnamezh,
                user_info.namezh as namezh
            ')
            ->join('LEFT JOIN order_purchase_process ON order_purchase_success.order_number = order_purchase_process.o_id')
            ->join('LEFT JOIN user_info ON order_purchase_process.uid = user_info.uid')
            ->order('order_purchase_process.creationtime')
            ->select();
        $list['two'] = $this
            ->where($mad)
            ->field('
                order_purchase_success_process.action as action_success,
                order_purchase_success_process.creationtime as creationtime,
                user_info.lastnamezh as lastnamezh,
                user_info.namezh as namezh
            ')
            ->join('LEFT JOIN order_purchase_success_process ON order_purchase_success.id = order_purchase_success_process.o_id')
            ->join('LEFT JOIN user_info ON order_purchase_success_process.uid = user_info.uid')
            ->find();
        return $list;
    }
}