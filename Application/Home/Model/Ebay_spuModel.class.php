<?php

namespace Home\Model;
use Think\Model;


class Ebay_spuModel extends Model
{
    // 所有的符合条件的spu
    public function getspu($map,$pagen=10,$limit=true)
    {
        $result=array();//返回值
        $count=$this
            ->field('
            ebay_spu.id as id,
            ebay_bom.pid as pid,
            ebay_spu.itemnumber as item,
            ebay_spu.var as var
            ')
            ->where($map)
            ->join('LEFT JOIN ebay_bom ON ebay_spu.id = ebay_bom.spu_id')
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
            ebay_spu.id as id,
            ebay_spu.itemnumber as item,
            ebay_spu.var as var
            ')
            ->where($map)
            ->join('LEFT JOIN ebay_bom ON ebay_spu.id = ebay_bom.spu_id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //搜索采购信息
    public function searchProduct($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['order_product.status'] = '1';
        $count=$this
            ->field('
            order_product.id as id,
            order_product.num as num,
            order_product.price as price,
            order_product.total as total,
            order_product.order_purchase_id as order_purchase_id,
            order_product.supplier_pr_id as supplier_pr_id,
            product.namezh as namezh,
            supplier.name as gname,
            order_purchase.supplier_id as supplier_id,
            warehouse_physical.name as kname,
            order_purchase.transport as transport,
            order_purchase.freight as freight,
            order_purchase.status as status,
            order_purchase.examine_id as examine_id,
            order_purchase.examine_time as examine_time,
            bclass.number as bclassc_number,
            sclass.number as sclassc_number,
            product.number as snumber_number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON order_product.supplier_pr_id = product.id')
            ->join('LEFT JOIN order_purchase ON order_product.order_purchase_id = order_purchase.id')
            ->join('LEFT JOIN supplier ON order_purchase.supplier_id = supplier.id')
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
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
            order_product.id as id,
            order_product.num as num,
            order_product.price as price,
            order_product.total as total,
            order_product.supplier_pr_id as supplier_pr_id,
            order_product.order_purchase_id as order_purchase_id,
            product.namezh as namezh,
            supplier.name as gname,
            warehouse_physical.name as kname,
            order_purchase.transport as transport,
            order_purchase.freight as freight,
            order_purchase.supplier_id as supplier_id,
            order_purchase.status as status,
            order_purchase.examine_id as examine_id,
            order_purchase.examine_time as examine_time,
            bclass.number as bclassc_number,
            sclass.number as sclassc_number,
            product.number as snumber_number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON order_product.supplier_pr_id = product.id')
            ->join('LEFT JOIN order_purchase ON order_product.order_purchase_id = order_purchase.id')
            ->join('LEFT JOIN supplier ON order_purchase.supplier_id = supplier.id')
            ->join('LEFT JOIN warehouse ON order_purchase.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

}