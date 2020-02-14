<?php

namespace Home\Model;
use Think\Model;

class Supplier_productModel extends Model
{
    //
    public function searchSupplier($map,$pagen=10,$limit=true){
        $result=array();
        $map['supplier_product.status']='1';
        $count=$this
            ->field('
            supplier_product.id as id,
            supplier_product.pid as pid,
            supplier_product.price as price,
            supplier_product.minimum_packing as minimum_packing,
            supplier_product.minimum_purchase as minimum_purchase,
            supplier_product.production_cycle as production_cycle,
            supplier.name as name,
            supplier_product.supplier_id as supplier_id,
            product.namezh as namezh,
            product.id as cid,
            supplier_product.code as code,
             bclass.number as bclassc_number,
             sclass.number as sclassc_number,
             product.number as snumber_number,
             status_ex.namezh as hname,
             status_ex.name as bname,
             status_ex.id as hid
             
            ')
            ->where($map)
            ->join('LEFT JOIN product ON supplier_product.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN supplier ON supplier_product.supplier_id = supplier.id')
            ->join('LEFT JOIN status_ex ON supplier_product.company = status_ex.id')
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
            supplier_product.id as id,
            supplier_product.pid as pid,
            supplier_product.price as price,
            supplier.name as name,
            supplier_product.supplier_id as supplier_id,
            product.namezh as namezh,
            product.id as cid,
            supplier_product.code as code,
             bclass.number as bclassc_number,
             sclass.number as sclassc_number,
             product.number as snumber_number,
             status_ex.namezh as hname,
             status_ex.name as bname,
             status_ex.id as hid,
             supplier_product.minimum_purchase as minimum_purchase,
             supplier_product.minimum_packing as minimum_packing,
             supplier_product.production_cycle as production_cycle
            ')
            ->where($map)
            ->join('LEFT JOIN product ON supplier_product.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN supplier ON supplier_product.supplier_id = supplier.id')
            ->join('LEFT JOIN status_ex ON supplier_product.company = status_ex.id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }


}

