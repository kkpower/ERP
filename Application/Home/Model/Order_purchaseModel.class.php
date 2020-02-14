<?php

namespace Home\Model;
use Think\Model;


class Order_purchaseModel extends Model
{
    //搜索采购信息searchPurchase
    public function searchPurchase($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['order_purchase.state'] = 1;
        $mad['status.table'] = 'order_purchase';
        $mad['status.column'] = 'status';
        $count=$this
            ->field('            
            order_purchase.id as id,
            order_purchase_success.id as order_number,
       
            order_purchase.freight as freight,
            order_purchase.status as status,
            order_purchase.transport as transport,
            order_purchase.transporter as transporter,
            order_purchase.warehouse_id as warehouse_id,
            order_purchase.supplier_id as supplier_id,
            order_purchase.creationtime as creationtime,
            order_purchase.supplier_id as supplier_id,
            order_purchase.remarks as remarks,
            order_purchase.reason as reason,
            uinfo.lastnamezh as lastname,
            order_purchase.examine_time as examine_time,
            uinfo.namezh as namezhs,
            warehouse.name as name,
            supplier.name as suppliername,
            supplier.contacts as contacts,
            supplier.contactnumber as contactnumber,
            supplier.email as email,
            transport_mode.mode as mode,
            status.namezh as lcname,
            order_purchase.delivery_date as delivery_date,
             transporters.transporters as transporters,
             order_purchase.tracking_number as tracking_number
            ')
            ->where($mad)
            ->join('LEFT JOIN supplier ON order_purchase.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info as uinfo ON order_purchase.examine_id = uinfo.uid')
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON order_purchase.transport = transport_mode.id')
            ->join('LEFT JOIN status_ex as status ON order_purchase.status = status.val')
            ->join('LEFT JOIN transporters ON order_purchase.transporter = transporters.id')
            ->join('LEFT JOIN order_purchase_success ON order_purchase.id = order_purchase_success.order_number')
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
            order_purchase.id as id,
             order_purchase_success.id as order_number,
            order_purchase.freight as freight,
            order_purchase.status as status,
            order_purchase.transport as transport,
            order_purchase.warehouse_id as warehouse_id,
            order_purchase.supplier_id as supplier_id,
             order_purchase.transporter as transporter,
            order_purchase.creationtime as creationtime,
            order_purchase.remarks as remarks,
            order_purchase.reason as reason,
            uinfo.lastnamezh as lastname,
            order_purchase.examine_time as examine_time,
            uinfo.namezh as namezhs,
            warehouse.name as name,
            supplier.name as suppliername,
            supplier.contacts as contacts,
            supplier.contactnumber as contactnumber,
            supplier.email as email,
            transport_mode.mode as mode,
            status.namezh as lcname,
            order_purchase.delivery_date as delivery_date,
             transporters.transporters as transporters,
             order_purchase.tracking_number as tracking_number
            ')
            ->where($mad)
            ->join('LEFT JOIN supplier ON order_purchase.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info as uinfo ON order_purchase.examine_id = uinfo.uid')
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON order_purchase.transport = transport_mode.id')
            ->join('LEFT JOIN status_ex as status ON order_purchase.status = status.val')
            ->join('LEFT JOIN transporters ON order_purchase.transporter = transporters.id')
            ->join('LEFT JOIN order_purchase_success ON order_purchase.id = order_purchase_success.order_number')
            ->limit($firstRow.','.$listRow)
            ->order("order_purchase.id desc")
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }


    //审核采购订单
    public function searchpayment($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['order_purchase.state'] = 1;
        $mad['status.table'] = 'order_purchase';
        $mad['status.column'] = 'status';
        $count=$this
            ->field('
            order_purchase.id as id,
            order_purchase_success.id as order_number,
            order_purchase.freight as freight,
            order_purchase.status as status,
            order_purchase.transport as transport,
            uinfos.lastnamezh as lastnamea,
            uinfos.namezh as namezha,
            order_purchase.warehouse_id as warehouse_id,
            order_purchase.supplier_id as supplier_id,
            order_purchase.remarks as remarks,
            order_purchase.reason as reason,
            order_purchase.delivery_date as delivery_date,
            order_purchase.creationtime as creationtime,
            warehouse.name as name,
            order_purchase.examine_time as examine_time,
            supplier.name as suppliername,
            user.lastnamezh as lastname,
            user.namezh as namezhs,
            transport_mode.mode as mode,
            status.namezh as lcname,
            ransporters.transporters as transporters,
             order_purchase.tracking_number as tracking_number
            ')
            ->where($mad)
            ->join('LEFT JOIN supplier ON order_purchase.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info as uinfos ON order_purchase.uid = uinfos.uid')
            ->join('LEFT JOIN user_info as user ON order_purchase.examine_id = user.uid')
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON order_purchase.transport = transport_mode.id')
            ->join('LEFT JOIN status_ex as status ON order_purchase.status = status.val')
            ->join('LEFT JOIN transporters ON order_purchase.transporter = transporters.id')
            ->join('LEFT JOIN order_purchase_success ON order_purchase.id = order_purchase_success.order_number')
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
            order_purchase.id as id,
            order_purchase_success.id as order_number,
            order_purchase.freight as freight,
            order_purchase.status as status,
            order_purchase.transport as transport,
            order_purchase.reason as reason,
            user_info.lastnamezh as lastnamea,
            user_info.namezh as namezha,
            order_purchase.delivery_date as delivery_date,
            order_purchase.warehouse_id as warehouse_id,
            order_purchase.supplier_id as supplier_id,
            order_purchase.remarks as remarks,
            order_purchase.creationtime as creationtime,
            warehouse.name as name,
            order_purchase.examine_time as examine_time,
            supplier.name as suppliername,
            user.lastnamezh as lastname,
            user.namezh as namezhs,
            transport_mode.mode as mode,
            status.namezh as lcname,
              transporters.transporters as transporters,
             order_purchase.tracking_number as tracking_number
            ')
            ->where($mad)
            ->join('LEFT JOIN supplier ON order_purchase.supplier_id = supplier.id')
            ->join('LEFT JOIN user_info ON order_purchase.uid = user_info.uid')
            ->join('LEFT JOIN user_info as user ON order_purchase.examine_id = user.uid')
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN transport_mode ON order_purchase.transport = transport_mode.id')
            ->join('LEFT JOIN status_ex as status ON order_purchase.status = status.val')
            ->join('LEFT JOIN transporters ON order_purchase.transporter = transporters.id')
            ->join('LEFT JOIN order_purchase_success ON order_purchase.id = order_purchase_success.order_number')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //搜索仓库下的产品
    public function searchWarehouseproducts($mad,$pagen=10,$limit=true){
        $result=array();
        $count=$this
            ->field('
            order_purchase.warehouse_id as warehouse_id,
            product.namezh as namezh,
            order_product.num as num
            ')
            ->where($mad)
//            ->join('LEFT JOIN supplier ON order_purchase.supplier_id = supplier.id')
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN supplier_product ON order_purchase.supplier_id = supplier_product.supplier_id')
            ->join('LEFT JOIN order_product ON supplier_product.pid = order_product.supplier_pr_id')
            ->join('LEFT JOIN product ON order_product.supplier_pr_id = product.id')
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
            order_purchase.warehouse_id as warehouse_id,
            product.namezh as namezh,
            order_product.num as num
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN supplier_product ON order_purchase.supplier_id = supplier_product.supplier_id')
            ->join('LEFT JOIN order_product ON supplier_product.pid = order_product.supplier_pr_id')
            ->join('LEFT JOIN product ON order_product.supplier_pr_id = product.id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }


}

