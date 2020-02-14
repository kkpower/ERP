<?php
namespace Home\Model;
use Think\Model;

class Order_customerModel extends Model
{
    //获取单个订单信息 oid 区域对应的仓库 country todo ing
    public function getOrder($oid)
    {
        $where['order_customer.id']=$oid;
        $info=$this
            ->where($where)
            ->join('LEFT JOIN country on order_customer.country = country.countryus')
            ->field('
            order_customer.id as id,                    
            country.id as cid,
            order_customer.platform_id,
            order_customer.external_sn,
            order_customer.type,
            order_customer.import_sequence,
            order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.order_price,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     product.number as num,
                     product.id as pid,
                     product.namezh,
                     product.shortname,
                     product.thumb,
                     order_customer_bom.price,
                     order_customer_bom.number,
                     order_customer_bom.asin,
                     ebay_order.id as ebay_id,
                     ebay_order.fullname,
                     ebay_order.ebayuserid,
                     ebay_order.fullname,
                     ebay_order.total_price,
                     ebay_order.price_unit,
                     ebay_order.phone,
                     ebay_order.email,
                     ebay_order.sku_id,
                     ebay_order.quantity as sku_number,
                     ebay_order.external_title,
                     sku_var.item_number,
                     sku_var.var,
                     platform_account.account_number,
                     platform.name,
                     platform.type,
                     status_ex.val,
                     status_ex.name as processing_status')
            ->find();
    }
    //获取订单信息 根据 $sequence获取 订单列表
    public function getOrderSq($sequence)
    {
        $where['import_sequence']=$sequence;
        $where['status_id']=1;//未打印
        $list=$this
            ->where($where)
            ->field('
            order_customer.id as id
            ')
            ->select();
        return $list;
    }

    //获取订单下的所有产品和数量
    public function orderProductLsit($id){
        $where['order_customer.id']=$id;//查询条件
        $list[2]=$data=$this
            ->where($where)
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN order_customer_bom ON ebay_order.sku_id = order_customer_bom.asin')
            ->join('LEFT JOIN country_range ON order_customer.country = country_range.range')//查询仓库信息
            ->field('order_customer_bom.pid,
                     sum(order_customer_bom.number) as sumnumber,
                     country_range.w_id as warehouse_id
                     ')
            ->group('order_customer_bom.pid')
            ->select();
        $list[1]=array();
        foreach ($data as $key =>$value){
            $list[1][$value['pid']]=(int)$value['sumnumber'];
        }
        return $list;
    }
    //保存订单
    public function orderadd()
    {

    }
    //订单详情平台、账号、国家、产品.....(结果为对象)
    public function orderdetails($map){
        $map['status_ex.table']="order_customer";
        $list=$this
            ->where($map)
            ->join('LEFT JOIN country on order_customer.country = country.countryus')
            ->join('LEFT JOIN transporters on country.default_transport_id = transporters.id')
            ->join('LEFT JOIN transport_mode on transporters.default_mode_id = transport_mode.id')
            ->join('RIGHT JOIN platform_account ON platform_account.id = order_customer.platform_id')
            ->join('RIGHT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')
            ->join('RIGHT JOIN platform ON platform_account.platform_id = platform.id')
            ->join('RIGHT JOIN status_ex ON order_customer.status_id = status_ex.val')
            ->join('LEFT JOIN order_problem ON order_customer.id = order_problem.o_id')
            ->join('LEFT JOIN status_ex as ex ON ex.id = order_problem.type')
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->field('order_customer.id as id,
                     country.id as cid,
                     transporters.id as tid,
                     transporters.transporters,
                     transport_mode.id as mode_id,
                     transport_mode.mode,
                     order_customer.platform_id,
                     order_customer.external_sn,
                     order_customer.type,
                     order_customer.import_sequence,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.order_price,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     ebay_order.id as ebay_id,
                     ebay_order.fullname,
                     ebay_order.ebayuserid,
                     ebay_order.fullname,
                     ebay_order.total_price,
                     ebay_order.price_unit,
                     ebay_order.phone,
                     ebay_order.email,
                     ebay_order.sku_id,
                     ebay_order.quantity as sku_number,
                     ebay_order.external_title,
                     platform_account.account_number,
                     platform.name,
                     platform.type,
                     status_ex.val,
                     status_ex.name as processing_status')
            ->find();
        if(!$list){
            $list="";
        }
        return $list;
    }

    //获取订单详情平台、账号、国家、产品.....(结果为数组)
    public function orderdetail($map){
        $map['status_ex.table']="order_customer";
        $list=$this
            ->where($map)
            ->join('LEFT JOIN country on order_customer.country = country.countryus')
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')
            ->join('LEFT JOIN order_problem ON order_customer.id = order_problem.o_id')
            ->join('LEFT JOIN status_ex as ex ON ex.id = order_problem.type')
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
            ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
            ->field('order_customer.id as id,
                     one.number as bclass,
                     two.number as sclass,
                     country.id as cid,
                     order_customer.platform_id,
                     order_customer.external_sn,
                     order_customer.type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     product.number as num,
                     product.id as pid,
                     product.namezh,
                     product.shortname,
                     product.thumb,
                     order_customer_bom.price,
                     order_customer_bom.number,
                     order_customer_bom.asin,
                     ebay_order.id as ebay_id,
                     ebay_order.sku_id,
                     ebay_order.quantity as sku_number,
                     ebay_order.external_title,
                     sku_var.item_number,
                     sku_var.var,
                     sku_var.status as sku_status,
                     status_ex.val,
                     status_ex.name as processing_status')
            ->select();
        if(!$list){
            $list="0";
        }
        if($list[0]['pid'] == null){
            $list=" ";
        }
        return $list;
    }

    //获取订单详情基本信息(地址、电话、收件人......)
    public function detailsOrder($map){
        $list=$this
            ->where($map)
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
            ->join('LEFT JOIN platform_account ON order_customer.platform_id = platform_account.id')
            ->join('LEFT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')  //用户对应账户
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')  //平台对应账户
            ->field('order_customer.id as id,
                     order_customer.platform_id,
                     order_customer.external_sn,
                     order_customer.type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     order_customer_bom.price,
                     order_customer_bom.number,
                     order_customer_bom.asin,
                     platform.url,
                     sku_var.item_number,
                     sku_var.var,
                     ebay_order.id as ebay_id,
                     ebay_order.sku_id,
                     ebay_order.quantity as sku_number,
                     ebay_order.external_title')
            ->find();
        if(!$list){
            $list="0";
        }
        return $list;
    }

    //获取订单详情产品、数量
    public function detailOrder($data){
        $list=$this
            ->where($data)
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
            ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
            ->field('order_customer.id as id,
                     one.number as bclass,
                     two.number as sclass,
                     order_customer.platform_id,
                     order_customer.external_sn,
                     order_customer.type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     product.number as num,
                     product.id as pid,
                     product.namezh,
                     product.shortname,
                     product.thumb,
                     order_customer_bom.price,
                     order_customer_bom.number,
                     order_customer_bom.asin,
                     sku_var.item_number,
                     sku_var.var,
                     ebay_order.id as ebay_id,
                     ebay_order.sku_id,
                     ebay_order.quantity as sku_number,
                     ebay_order.external_title')
            ->select();
        if(!$list){
            $list="0";
        }
        return $list;
    }

    //仓库订单搜索
    public function ordersearch(){
        $search=trim($_GET['search']);  //去除空格
        $map['status_ex.table']="order_customer";
        if (!empty($search))
        {
            //$map['order_customer.id|order_customer.recipient_first_name|order_customer.buyer_phone|order_customer.buyer_email'] = array('like', "%" .$search. "%", 'or');
            $map['order_customer.id'] = array('like', $search);
            $list=$this
                ->where($map)
                ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
                ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')
                ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
                ->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
                ->join('RIGHT JOIN product ON order_customer_bom.pid = product.id')
                ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
                ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
                ->field('order_customer.id as orderid,
                     one.number as bclass,
                     two.number as sclass,
                     order_customer.platform_id,
                     order_customer.external_sn,
                     order_customer.type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     product.number as num,
                     product.id as pid,
                     product.namezh,
                     product.shortname,
                     product.thumb,
                     order_customer_bom.price,
                     order_customer_bom.number,
                     order_customer_bom.asin,
                     ebay_order.id as ebay_id,
                     ebay_order.sku_id,
                     sku_var.item_number,
                     sku_var.var,
                     status_ex.val,
                     status_ex.name as processing_status')
                ->select();
        }
        if(empty($list))
        {
            $list="0";
        }
        return $list;
    }

    //各国家订单的不同状态
    public function orderstatus($data,$pagen=10,$limit=true){
        $data['order_customer.status']='1';
        $result=array();
        $count=$this
            ->where($data)
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')
            ->field('order_customer.id,
                     order_customer.external_sn,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.ship_level,
                     order_customer.status_id,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.creation_time,
                     order_customer.type,
                     order_customer.logistics_number,
                     status_ex.val,
                     status_ex.name as processing_status')
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
            ->where($data)
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')
            ->field('order_customer.id,
                     order_customer.external_sn,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.ship_level,
                     order_customer.status_id,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.creation_time,
                     order_customer.type,
                     order_customer.logistics_number,
                     status_ex.val,
                     status_ex.name as processing_status')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        $result['count']=$count;
        return $result;
    }

    //订单重量 todo ???
    public function packageweight($map){
        $info=$this
            ->where($map)
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->field('order_customer.id as id,
                     order_customer_bom.number,
                     product.id as pid,
                     product.weight')
            ->select();
        $list="";
        for($i=0;$i<count($info);$i++){
            $list+=$info[$i]['number'] * $info[$i]['weight'];
        }
        if(!$list){
            $list="";
        }
        return $list;
    }

    //打印清单 todo ???
    public function shipList($data){
        $list=$this
            ->field('one.number as bclass,
                     two.number as sclass,
                     product.number as num,
                     product.id as pid,
                     product.namezh,
                     order_customer_bom.number')
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
            ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
            ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
            ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
            ->where($data)
            ->select();
        if(!$list){
            $list="0";
        }
        return $list;
    }

    //查看订单运输商 todo ???
    public function transport($map){
        $map['transporters.status']='1';
        $list=$this
            ->field('transporters.id,
                     transporters.transporters')
            ->join('LEFT JOIN transporters ON order_customer.transporters_id = transporters.id')
            ->where($map)
            ->find();
        if(!$list){
            $list="0";
        }
        return $list;
    }

    //查看订单运输方式 todo ???
    public function transport_mode($map){
        $map['transport_mode.status']='1';
        $list=$this
            ->field('transport_mode.id,
                     transport_mode.mode')
            ->join('LEFT JOIN transport_mode ON order_customer.transport_mode_id = transport_mode.id')
            ->where($map)
            ->find();
        if(!$list){
            $list="0";
        }
        return $list;
    }

    //物流追踪号
    public function logistics($map){
        $list=$this
            ->field('id,logistics_number')
            ->where($map)
            ->find();
        if(!$list){
            $list="0";
        }
        return $list;
    }

    //销售订单搜索
    public function search(){
        $map['asin_sku.status']=1;
        $map['status_ex.table']="order_customer";
        $search=trim($_GET['search']);  //去除空格
        if (!empty($search))
        {
            $map['order_customer.id|order_customer.recipient_first_name|order_customer.buyer_phone|order_customer.buyer_email'] = array('like', "%" .$search. "%", 'or');
            // $map['order_customer.id'] = array('like', $search);
            $list=$this
                ->where($map)
                ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
                ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
                ->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
                ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')
                ->join('LEFT JOIN product ON order_customer_bom.pid = product.id')
                ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
                ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
                ->field('order_customer.id as orderid,
                     one.number as bclass,
                     two.number as sclass,
                     order_customer.platform_id,
                     order_customer.external_sn,
                     order_customer.type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     product.number as num,
                     product.id as pid,
                     product.namezh,
                     product.shortname,
                     product.thumb,
                     order_customer_bom.price,
                     order_customer_bom.number,
                     asin_sku.asin,
                     asin_sku.sku,
                     status_ex.val,
                     status_ex.name as processing_status')
                ->select();
        }
        if(empty($list))
        {
            $list="0";
        }
        return $list;
    }

    //销售订单列表
    public function salesOrder($data,$pagen=10,$limit=true){
        $result=array();
        $data['status_ex.table']="order_customer";
        $count=$this
            ->where($data)
            ->join('LEFT JOIN platform_account ON order_customer.platform_id = platform_account.id')  //账户对应订单
            ->join('LEFT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')  //用户对应账户
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')  //平台对应账户
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')  //订单状态对应状态表
            //->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id') //ebay表对应订单表
            //->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            //->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
            /*->field('pl_account_user.uid,
                 pl_account_user.pl_account_id,
                 platform_account.account_number,
                 platform.id as pl_id,
                 platform.name,
                 order_customer.id,
                 order_customer.platform_id,
                 order_customer.status_id,
                 order_customer.fullname,
                 order_customer.country,
                 order_customer.ship_level,
                 order_customer.buyer_phone,
                 order_customer.buyer_email,
                 order_customer.order_price,
                 order_customer.creation_time,
                 order_customer.logistics_number,
                 ebay_order.fullname as recipient_first_name,
                 ebay_order.id as ebay_id,
                 ebay_order.sku_id,
                 sku_var.item_number,
                 sku_var.var,
                 sku_var.status as sku_status,
                 status_ex.name as processing_status,
                 status_ex.namezh as processing_status_zh')*/
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
            ->where($data)
            ->join('LEFT JOIN platform_account ON order_customer.platform_id = platform_account.id')  //账户对应订单
            ->join('LEFT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')  //用户对应账户
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')  //平台对应账户
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')  //订单状态对应状态表
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id') //ebay表对应订单表
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            //->join('LEFT JOIN order_customer_bom ON sku_var.id = order_customer_bom.asin')
            ->field('pl_account_user.uid,
                     pl_account_user.pl_account_id,
                     platform_account.account_number,
                     platform.id as pl_id,
                     platform.name,
                     order_customer.id,
                     order_customer.external_sn,
                     order_customer.platform_id,
                     order_customer.status_id,
                     order_customer.fullname,
                     order_customer.country,
                     order_customer.ship_level,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.creation_time,
                     ebay_order.fullname as recipient_first_name,
                     ebay_order.id as ebay_id,
                     ebay_order.sku_id,
                     sku_var.item_number,
                     sku_var.var,
                     sku_var.status as sku_status,
                     status_ex.name as processing_status,
                     status_ex.namezh as processing_status_zh')
            ->group('order_customer.id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        $result['count']=$count;
        return $result;
    }

    //统计销售订单数量
    public function salesCount($data){
        $data['status_ex.table']="order_customer";
        $count=$this
            ->where($data)
            ->join('LEFT JOIN platform_account ON order_customer.platform_id = platform_account.id')  //账户对应订单
            ->join('LEFT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')  //用户对应账户
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')  //平台对应账户
            ->join('RIGHT JOIN status_ex ON order_customer.status_id = status_ex.val')  //订单状态对应状态表
            ->join('LEFT JOIN order_problem ON order_customer.id = order_problem.o_id')  //订单对应问题订单
            ->join('LEFT JOIN status_ex as ex ON ex.id = order_problem.type')  //状态对应问题订单
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id') //ebay表对应订单表
            ->field('pl_account_user.uid,
                     pl_account_user.pl_account_id,
                     platform_account.account_number,
                     platform.id as pl_id,
                     platform.name,
                     ex.name as type_name,
                     ex.namezh as type_namezh,
                     order_problem.type,
                     order_problem.describe,
                     order_problem.create_time as problem_time,
                     order_customer.id,
                     order_customer.platform_id,
                     order_customer.status_id,
                     order_customer.fullname as recipient_first_name,
                     order_customer.country,
                     order_customer.ship_level,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.creation_time,
                     status_ex.name as processing_status,
                     status_ex.namezh as processing_status_zh')
            ->count();
        return $count;
    }

    //统计发货订单数量
    public function shipCount($data){
        $data['status_ex.table']="order_customer";
        $count=$this
            ->where($data)
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')
            ->field('order_customer.id,
                     order_customer.external_sn,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.ship_level,
                     order_customer.status_id,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.creation_time,
                     order_customer.type,
                     order_customer.logistics_number,
                     status_ex.val,
                     status_ex.name as processing_status')
            ->count();
        return $count;
    }

    //外部订单详情
    public function ebay_order($map){
        $list=$this
            ->where($map)
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->field('order_customer.id as id,
                     order_customer.platform_id,
                     order_customer.external_sn,
                     order_customer.type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.ship_level,
                     order_customer.country,
                     order_customer.state,
                     order_customer.city,
                     order_customer.zip,
                     order_customer.creation_time,
                     order_customer.street_1,
                     order_customer.street_2,
                     order_customer.street_3,
                     order_customer.pricecurrency,
                     order_customer.status_id,
                     order_customer.logistics_number as logistics_id,
                     sku_var.item_number,
                     sku_var.var,
                     sku_var.status as sku_status,
                     ebay_order.id as ebay_id,
                     ebay_order.price_unit,
                     ebay_order.total_price,
                     ebay_order.quantity as sku_number,
                     ebay_order.external_title,
                     ebay_order.sku_id')
            ->select();
        if(!$list){
            $list="";
        }
        return $list;
    }
    //订单历史的查询模型.
    //查询
    public function importOrder($data,$pagen=10,$limit=true){
        $where['status']=$data['order_customer.status'] = 1;
        $where['import_sequence']=$data['order_customer.import_sequence'];
        $result=array();
        $data['status_ex.table']="order_customer";
        $count=$this
            ->where($where)
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
            ->where($data)
            ->join('LEFT JOIN platform_account ON order_customer.platform_id = platform_account.id')  //账户对应订单
            ->join('LEFT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')  //用户对应账户
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')  //平台对应账户
            ->join('LEFT JOIN status_ex ON order_customer.status_id = status_ex.val')  //订单状态对应状态表
            ->join('LEFT JOIN order_problem ON order_customer.id = order_problem.o_id')  //订单对应问题订单
            ->join('LEFT JOIN status_ex as ex ON order_problem.type = ex.id')  //状态对应问题订单
            ->field('pl_account_user.uid,
                     pl_account_user.pl_account_id,
                     platform_account.account_number,
                     platform.id as pl_id,
                     platform.name,
                     ex.name as type_name,
                     ex.namezh as type_namezh,
                     order_problem.type,
                     order_problem.describe,
                     order_problem.create_time as problem_time,
                     order_customer.id,
                     order_customer.external_sn,
                     order_customer.platform_id,
                     order_customer.status_id,
                     order_customer.fullname as recipient_first_name,
                     order_customer.country,
                     order_customer.ship_level,
                     order_customer.buyer_phone,
                     order_customer.buyer_email,
                     order_customer.order_price,
                     order_customer.logistics_number,
                     order_customer.creation_time,
                     status_ex.name as processing_status,
                     status_ex.namezh as processing_status_zh')
            ->limit($firstRow.','.$listRow)
            ->group('order_customer.id')
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        $result['count']=$count;
        return $result;
    }

  //补单申请
    public function approval($map,$pagen=10,$limit=true){
        $result=array();
        $map['order_customer.status']=1;
        $count=$this
            ->field('order_customer.id as oid,
                     order_customer.external_sn,
                     order_customer.type as order_type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.country,
                     order_customer.ship_level,
                     order_customer.creation_time,
                     ebay_order.fullname,
                     ebay_order.sku_id,
                     sku_var.item_number,
                     sku_var.var,
                     status_ex.val,
                     status_ex.name as status_name,
                     status_ex.namezh as status_namezh,
                     order_supplement.order_id,
                     order_supplement.f_order_id,
                     order_supplement.describe,
                     order_supplement.c_time,
                     user_info.uid,
                     user_info.lastname,
                     user_info.name,
                     user_info.lastnamezh,
                     user_info.namezh,
                     platform_account.account_number,
                     platform_account.account_number_name,
                     platform.name as platform_name')
            ->where($map)
            ->join('LEFT JOIN platform_account ON order_customer.platform_id = platform_account.id')  //账户对应订单
            ->join('LEFT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')  //用户对应账户
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')  //平台对应账户
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->join('LEFT JOIN order_supplement ON order_customer.id = order_supplement.order_id')
            ->join('LEFT JOIN status_ex ON order_supplement.type = status_ex.val')
            ->join('LEFT JOIN user_info ON order_supplement.uid = user_info.uid')
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
            ->field('order_customer.id as oid,
                     order_customer.external_sn,
                     order_customer.type as order_type,
                     order_customer.fullname as recipient_first_name,
                     order_customer.country,
                     order_customer.ship_level,
                     order_customer.creation_time,
                     ebay_order.fullname,
                     ebay_order.sku_id,
                     sku_var.item_number,
                     sku_var.var,
                     status_ex.val,
                     status_ex.name as status_name,
                     status_ex.namezh as status_namezh,
                     order_supplement.order_id,
                     order_supplement.f_order_id,
                     order_supplement.describe,
                     order_supplement.c_time,
                     user_info.uid,
                     user_info.lastname,
                     user_info.name,
                     user_info.lastnamezh,
                     user_info.namezh,
                     platform_account.account_number,
                     platform_account.account_number_name,
                     platform.name as platform_name')
            ->where($map)
            ->join('LEFT JOIN platform_account ON order_customer.platform_id = platform_account.id')  //账户对应订单
            ->join('LEFT JOIN pl_account_user ON platform_account.id = pl_account_user.pl_account_id')  //用户对应账户
            ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')  //平台对应账户
            ->join('LEFT JOIN ebay_order ON order_customer.id = ebay_order.ordercust_id')
            ->join('LEFT JOIN sku_var ON ebay_order.sku_id = sku_var.id')
            ->join('LEFT JOIN order_supplement ON order_customer.id = order_supplement.order_id')
            ->join('LEFT JOIN status_ex ON order_supplement.type = status_ex.val')
            ->join('LEFT JOIN user_info ON order_supplement.uid = user_info.uid')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
}

?>