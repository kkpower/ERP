<?php
namespace Home\Model;
use Think\Model;

class Order_customer_bomModel extends Model
{
    //asin添加新产品
    public function addProduct($data){
        $data['time']=date("Y-m-d H:i:s");
        $data['status']=1;
        $data['uid']=$_SESSION['user_info']['uid'];
        return $this->add($data);
    }

    //查询asin
    public function skuInfo($map)
    {
        $map['order_customer_bom.status']='1';
        $list=$this
            ->field('order_customer_bom.asin,
                     order_customer_bom.number,
                     order_customer_bom.price,
                     product.id as pid,
                     product.namezh as name,
                     bclass.number as bclassc_number,
                     sclass.number as sclassc_number,
                     product.number as snumber_number,
                     product.namezh as namezh,
                     product.nameus as nameus,
                     product.thumb as thumb')
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->where($map)
            ->select();
        return $list;
    }

    //查看asin
    public function asin(){
        $data['status']='1';
        $list=$this
            ->where($data)
            ->field('id as ebay_id,
                     asin')
            ->select();
        return $list;
    }

    //查询产品在各国家的总销量和订单量
    public function saleStatistics($map){
        $list=$this
             ->field('order_customer.id as o_id,
                      order_customer.external_sn,
                      order_customer.country,
                      order_customer.ship_level,
                      order_customer.create_time,
                      order_customer.logistics_number,
                      order_customer_bom.id as bom_id,
                      order_customer_bom.number,
                      order_customer_bom.pid,
                      order_customer_bom.price,
                      ebay_order.fullname,
                      ebay_order.var,
                      country_regions.c_id,
                      country.countryus,
                      country.countryzh,
                      status_ex.name as status_name')
            ->join('LEFT JOIN ebay_order ON order_customer_bom.asin = ebay_order.var')
            ->join('LEFT JOIN order_customer ON ebay_order.ordercust_id = order_customer.id')
            ->join('LEFT JOIN country_regions ON order_customer.country = country_regions.area')
            ->join('LEFT JOIN country ON country_regions.c_id = country.id')
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.id')
            ->where($map)
            ->select();
        return $list;
    }

}