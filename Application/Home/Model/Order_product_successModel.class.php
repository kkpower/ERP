<?php

namespace Home\Model;
use Think\Model;


class Order_product_successModel extends Model
{

    //搜索采购产品信息
    public function searchCommodity($mad){
        $result=array();
        $mad['order_product_success.status'] = '1';
        $list=$this
            ->field('
            order_product_success.id as id,
            order_product_success.num as num,
            order_product_success.price as price,
            order_product_success.total as total,
            order_product_success.currency as currency,
            order_product_success.supplier_pr_id as supplier_pr_id,
            order_product_success.order_purchase_success_id as order_purchase_id,
            product.namezh as namezh,
            product.id as pid,
             bclass.number as bclassc_number,
             sclass.number as sclassc_number,
             product.number as snumber_number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON order_product_success.supplier_pr_id = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN order_purchase_success ON order_product_success.order_purchase_success_id = order_purchase_success.id')
//            ->group('order_product.order_purchase_id,order_product.price, order_product.total, order_product.supplier_pr_id')
            ->select();
        $result['list']=$list;
        return $result;
    }
    //收货异常
    public function receiptAbnormal($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['order_purchase_success.status'] = 1;
        $mad['order_product_success.status'] = '1';
        $count=$this
            ->field('
                  order_purchase_success.id as order_number,
                  order_purchase_success.supplier_id as supplier_id,
                  supplier.name as namezh,
                  sum(order_product_success.num) as nums,
                  sum(order_product_success.actual_num) as actual_nums,
                  order_purchase_success.creationtime as creationtime,
                  order_product_success.order_purchase_success_id
            ')
            ->where($mad)
            ->join('LEFT JOIN order_purchase_success ON order_product_success.order_purchase_success_id = order_purchase_success.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->count('distinct order_product_success.order_purchase_success_id');
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
              order_purchase_success.id as order_number,
               order_purchase_success.supplier_id as supplier_id,
              supplier.name as namezh,
              sum(order_product_success.num) as nums,
              sum(order_product_success.actual_num) as actual_nums,
              order_purchase_success.creationtime as creationtime,
              order_product_success.order_purchase_success_id
            ')
            ->where($mad)
            ->join('LEFT JOIN order_purchase_success ON order_product_success.order_purchase_success_id = order_purchase_success.id')
            ->join('LEFT JOIN supplier ON order_purchase_success.supplier_id = supplier.id')
            ->group('order_product_success.order_purchase_success_id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
}