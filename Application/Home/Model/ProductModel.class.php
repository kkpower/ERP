<?php

namespace Home\Model;
use Think\Model;

 class ProductModel extends Model
{
    //
    public function lookup($condition,$limit=true)
    {

        //创建返回数组
        $result=array();
        //组织查询条件
        $count=$this
            ->field('product.id,
                    product.bclass,
                    product.sclass,
                    product.number,
                    product.nameus,
                    product.namezh,
                    product.weight,
                    product.long,
                    product.width,
                    product.height,
                    product.price,
                    product.company,
                    product.thumb,
                    SUM (stock.number)')
            ->where($condition)
            ->join('LEFT JOIN stock ON stock.pid=product.id')
            ->count();
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
                    product.id,
                    product.bclass,
                    product.sclass,
                    product.number,
                    product.nameus,
                    product.namezh,
                    product.weight,
                    product.price,
                    product.company,
                    product.thumb,
                    SUM(stock.number) as number
            ')
            ->where($condition)
            ->join('LEFT JOIN stock ON stock.pid=product.id')
           // ->join('RIGHT JOIN stock ON stock.pid=product.id')
           // 查询出现有库存↑
            ->group('product.id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
    //

    public function cruxLookup($condition,$limit=true)
     {
         //创建返回数组
         $result=array();
         //组织查询条件
         $count=$this
             ->field('product.id,
                    product.bclass,
                    product.sclass,
                    product.number,
                    product.nameus,
                    product.namezh,
                    product.weight,
                    product.price,
                    product.company,
                    product.thumb,
                    SUM (stock.number)')
             ->where($condition)
             ->join('LEFT JOIN stock ON stock.pid=product.id')
             ->count();
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
                    product.id,
                    product.bclass,
                    product.sclass,
                    product.number,
                    product.nameus,
                    product.namezh,
                    product.weight,
                    product.price,
                    product.company,
                    product.thumb,
                    SUM(stock.number) as number
            ')
             ->where($condition)
             ->join('LEFT JOIN stock ON stock.pid=product.id')
             // ->join('RIGHT JOIN stock ON stock.pid=product.id')
             // 查询出现有库存↑
             ->group('product.id')
             ->limit($firstRow.','.$listRow)
             ->select();
         $result['list']=$list;
         $result['page']=$Page->show();
         return $result;
     }
     //查询产品表
     // $condition 查询条件
     // $pagenum 一页数据数量
    public function listProduct($condition,$order,$pagenum=20,$limit=true)
    {
        //创建返回数组
        $result=array();
        $condition['status']="1";
        $count=$this
            ->where($condition)
            ->join('LEFT JOIN classify as bclassc ON  product.bclass=bclassc.id ')
            ->join('LEFT JOIN classify as sclassc ON  product.sclass=sclassc.id ')
            ->order($order)
            ->count();
        $Page = getPage($count,$pagenum);
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
            product.id as pid,
            product.namezh as name,
            bclassc.number as bclassc_number,
            sclassc.number as sclassc_number,
            product.number as snumber_number,
            product.shortname as shortname,
            product.thumb as thumb,
            product.create_time as time
            ')
            ->where($condition)
            ->limit($firstRow.','.$listRow)
            ->order($order)
            ->join('LEFT JOIN classify as bclassc ON  product.bclass=bclassc.id ')
            ->join('LEFT JOIN classify as sclassc ON  product.sclass=sclassc.id ')
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
    //添加产品
    public function addProduct($data)
    {
        return $this->data($data)->add();
    }
    //获取产品名称和产品料号
     public function getProductcode(){
        $map['status'] = 1;
        $list = $this
            ->field('
                product.id as id,
                product.namezh as namezh,
                 bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number
            ')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->where($map)
            ->select();
        return $list;
     }

     //查询产品表
     public function productList($where)
     {
         $list=$this
             ->field('
                product.id as pid,
                product.namezh as name,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                product.namezh as namezh,
                product.nameus as nameus,
                product.thumb as thumb,
                product.create_time as time')
             ->where($where)
             ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
             ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
             ->select();
         return $list;
     }


     //指定数量查询产品表
     public function productPageList($where,$limit=15)
     {
         if($limit=="all"){
             $list=$this
                 ->field('
                product.id as pid,
                product.namezh as name,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                product.namezh as namezh,
                product.nameus as nameus,
                product.thumb as thumb,
                product.status,
                product.create_time as time')
                 ->where($where)
                 ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
                 ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
                 ->select();
         }else{
             $list=$this
                 ->field('
                product.id as pid,
                product.namezh as name,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                product.namezh as namezh,
                product.nameus as nameus,
                product.thumb as thumb,
                product.status,
                product.create_time as time')
                 ->where($where)
                 ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
                 ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
                 ->limit($limit)
                 ->select();
         }
         return $list;
     }

     //根据产品获取所有订单
     public function productOrder($map,$pagen=10,$limit=true){
         $result=array();
         $count=$this
             ->field('order_customer.id as o_id,
                      order_customer.external_sn,
                      order_customer.country,
                      order_customer.ship_level,
                      order_customer.create_time,
                      order_customer.logistics_number,
                      ebay_order.fullname,
                      product.id as pid,
                      product.namezh as namezh,
                      product.nameus as nameus,
                      bclass.number as bclass,
                      sclass.number as sclass,
                      product.number as num,
                      product.thumb as thumb,
                      status_ex.name')
             ->join('LEFT JOIN order_customer_bom ON product.id = order_customer_bom.pid')
             ->join('LEFT JOIN ebay_order ON order_customer_bom.asin = ebay_order.var')
             ->join('LEFT JOIN order_customer ON ebay_order.ordercust_id = order_customer.id')
             ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.id')
             ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
             ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
             ->where($map)
             ->count();
         $Page = getPage($count,$pagen);
         //进行分页数据查询 注意limit方法的参数要使用Page类的属性
         if($limit){
             $firstRow = $Page->firstRow;
             $listRow = $Page->listRows;
         }else{
             $firstRow = 0;
             $listRow = $count;
         }
         $list=$this
             ->field('order_customer.id as o_id,
                      order_customer.external_sn,
                      order_customer.country,
                      order_customer.ship_level,
                      order_customer.create_time,
                      order_customer.logistics_number,
                      ebay_order.fullname,
                      product.id as pid,
                      product.namezh as namezh,
                      product.nameus as nameus,
                      bclass.number as bclass,
                      sclass.number as sclass,
                      product.number as num,
                      product.thumb as thumb,
                      status_ex.name as status_name')
             ->join('LEFT JOIN order_customer_bom ON product.id = order_customer_bom.pid')
             ->join('LEFT JOIN ebay_order ON order_customer_bom.asin = ebay_order.var')
             ->join('LEFT JOIN order_customer ON ebay_order.ordercust_id = order_customer.id')
             ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.id')
             ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
             ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
             ->where($map)
             ->limit($firstRow.','.$listRow)
             ->select();
         $result['list']=$list;
         $result['page']=$Page->show();
         return $result;
     }

     //查询单个产品信息
     public function productInfo($where)
     {
         $list=$this
             ->field('
                product.id as pid,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                product.namezh as namezh,
                product.nameus as nameus,
                product.thumb as thumb,
                product.create_time as time')
             ->where($where)
             ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
             ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
             ->find();
         return $list;
     }
}