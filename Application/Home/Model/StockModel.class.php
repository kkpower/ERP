<?php
namespace Home\Model;
use Think\Model;

class StockModel extends Model{

    //修改 todo
    public function editStock($map,$data){
        $return = M('stock')
            ->where($map)
            ->data($data)
            ->save();
        return $return;
    }
    //添加 todo
    public function addStock($data){
        $return = $this
            ->data($data)
            ->add();
    }
    public function  getStockdata(){

        return $this->field('
            stock.*,
            product.name as pname,
            user.uname,
            warehouse.name as wname,
            classify.namezh
            
       ')
            ->join("LEFT JOIN user ON user.uid=stock.uid")
            ->join("LEFT JOIN product ON product.id=stock.pid")
            ->join('LEFT JOIN warehouse ON warehouse.id=stock.library')
            ->join("LEFT JOIN classify ON classify.id=stock.type")
            ->select();

    }
    // todo
    public  function  Stockdata($data){

        return $this->field('
            stock.*,
            product.name as pname,
            user.uname,
            warehouse.name as wname,
            classify.namezh
            
       ')
            ->join("LEFT JOIN user ON user.uid=stock.uid")
            ->join("LEFT JOIN product ON product.id=stock.pid")
            ->join('LEFT JOIN warehouse ON warehouse.id=stock.library')
            ->join("LEFT JOIN classify ON classify.id=stock.type")
            ->where($data)
            ->select();

    }

    //库存信息
    public function searchStock($mad,$pagen=20,$limit=true){
        $result=array();
        $mad['stock.state'] = 1;
        $count=$this
            
            ->field('
                stock.pid as pid,
                warehouse.name as name,
                stock.warehouse_id as warehouse_id,
                product.namezh as namezh,
                product.id as cid,
                product.price as price,
                sum(stock.number) as number,
                warehouse_physical.id as zk_id,
                warehouse_physical.name as zkname,
                 stock.mold as mold,
                  bclass.number as bclassc_number,
              sclass.number as sclassc_number,
              product.number as snumber_number
               
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON stock.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->distinct('stock.pid')
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
                stock.pid as pid,
                 product.id as cid,
                 product.price as price,
                warehouse.name as name,
                stock.warehouse_id as warehouse_id,
                product.namezh as namezh,
                sum(stock.number) as number,
                warehouse_physical.id as zk_id,
                warehouse_physical.name as zkname,
                stock.mold as mold,
                  bclass.number as bclassc_number,
                  sclass.number as sclassc_number,
                  product.number as snumber_number
            ')
            ->where($mad)
            ->join('LEFT JOIN warehouse ON stock.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_physical ON warehouse.ku_id = warehouse_physical.id')
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->group('product.price,stock.pid,stock.warehouse_id,stock.mold,warehouse_physical.id')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }



    //运输管理
    public function searchTransport($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['order_purchase_success.status'] = 1;
        $mad['warehouse_location.w_type'] = array('eq',5);
        $count=$this

            ->field('
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                product.price as price,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                 country.currency as spelling
               
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN order_purchase_success ON stock.o_id = order_purchase_success.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->having('sum(stock.number)>0')
            ->count('distinct stock.pid');

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
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                product.price as price,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                 country.currency as spelling
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN order_purchase_success ON stock.o_id = order_purchase_success.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->group('stock.pid')
            ->having('sum(stock.number)>0')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    

    //运输下的产品信息
    public function showGood($map){
        $map['warehouse_location.w_type'] = array('eq',5);
        $list=$this
            ->field('
                stock.id as id,
                stock.pid as pid,
                stock_form.warehouse_id as warehouse_id,
                stock_form.creation_time as creationtime,
                product.namezh as namezh,
                product.price as price,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                warehouse.englishname as englishname,
                stock_form.order_id as o_id,
                stock_form.order_id as order_number,
                stock_form.order_type as order_type
                 
            ')
            ->where($map)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->group('stock_form.order_id,stock_form.order_type,stock_form.type')
            ->select();
        $result['list']=$list;
        return $result;
    }
    

    //总库存
    public function allStock($mad,$pagen=10,$limit=true){
        $result=array();
        $count=$this
            ->field('
                 stock.id as id,
                stock.pid as pid,
               product.namezh as namezh,
               product.price as price,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
               sum(stock.number) as number
               
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->count('distinct stock.pid');

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
              stock.id as id,
                stock.pid as pid,
               product.namezh as namezh,
               product.price as price,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
               sum(stock.number) as number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')

            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->group('stock.pid')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }
    //总库存产品价格合计
    public function allTotal($mad){
        $result=array();
        $list=$this
            ->field('
              stock.id as id,
                stock.pid as pid,
               product.namezh as namezh,
               product.price as price,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
               sum(stock.number) as number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->group('stock.pid')
            ->select();
        $result['list']=$list;
        return $result;
    }



    //完整库存查询
    public function onStock($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['warehouse_location.w_type'] = array('neq',5);
        $mad['warehouse_location.status'] = 1;
        $count=$this

            ->field('
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                product.price as price,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                 country.currency as spelling，
                 sum( case when stock_form.type =30 then number  else 0 end ) as freeze_number
               
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->having('sum(stock.number)>0')
            ->count('distinct stock.pid');

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
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                product.price as price,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                country.currency as spelling,
                sum( case when stock_form.type =30 then stock.number  else 0 end ) as freeze_number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->group('stock.pid')
            ->having('sum(stock.number)>0')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    public function onStockprice($mad){
        $result=array();
        $list=$this
            ->field('
                 stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                product.price as price,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                country.currency as spelling,
                sum( case when stock_form.type =30 then stock.number  else 0 end ) as freeze_number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->group('stock.pid')
            ->select();
        $result['list']=$list;
        return $result;
    }
    //库区下的产品数量
    public function onStockarea($map){
        $result=array();
        $map['warehouse_location.w_type'] = array('neq',5);
        $map['warehouse_location.status'] = 1;
        $list=$this
            ->field('
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                product.price as price,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse_location.id as w_lid,
                warehouse_location.w_type as kqname,
                warehouse.id as zk_id,
                warehouse.name as zkname,
                warehouse.englishname as englishname,
                country.currency as spelling,
                country.exchange_rate as exchange_rate
            ')
            ->where($map)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN company_configuration ON warehouse.company = company_configuration.company')
            ->join('LEFT JOIN country ON company_configuration.country = country.id')
            ->group('stock_form.position_id')
            ->having('sum(stock.number)>0')
            ->select();
        $result['list']=$list;
        return $result;
    }

    //todo 库区下的产品数量详情
    public function onStockareade($kid,$pid){
//        $map['stock_enter.state'] = 1;
//        $list = M('stock_enter')
//            ->field('
//            pid,
//            oid,
//            warehouse_id,
//            sum(number) as number
//
//            ')
//            ->where($map)
//            ->group('pid,warehouse_id,o_id')
//            ->select();

        $sql ="SELECT
                a.pid pid,
                a.o_id order_number,
                a.o_id o_id,
                
                (
                    IFNULL(a.number, 0) - IFNULL(b.number, 0)
                )  enter_out_number
            FROM
                (
                    SELECT
                        pid,
                        o_id,
                        warehouse_id,
                        sum(IFNULL(number, 0)) number
                    FROM
                        stock_enter
                    WHERE 
                        state=1 AND warehouse_id=$kid AND pid=$pid
                  
                    GROUP BY
                        pid,warehouse_id,o_id
                ) a
            left JOIN (
                SELECT
                    pid,
                    o_id,
                    warehouse_id,
                    sum(IFNULL(number, 0)) number
                FROM
                    stock_out
                WHERE 
                    state=1 AND warehouse_id=$kid AND pid=$pid
                    
                GROUP BY
                    pid,warehouse_id,o_id
            ) b ON a.pid = b.pid AND a.warehouse_id = b.warehouse_id AND a.o_id = b.o_id";
        $result = M()->query($sql);
        return $result;
    }

    //简单库存查询
    public function onStocksimple($mad,$pagen=10,$limit=true){
        $result=array();
        $mad['warehouse_location.w_type'] = array('neq',5);
        $mad['warehouse_location.status'] = 1;
        $count=$this

            ->field('
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                 sum( case when stock_form.type =30 then number  else 0 end ) as freeze_number
               
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->having('sum(stock.number)>0')
            ->count('distinct stock.pid');

        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        if($limit)
        {
            $firstRow = $Page->firstRow;
            $listRow = $Page->listRows;
        }else{
            $firstRow = 0;
            $listRow = $count;
        }
        $list=$this
            ->field('
                stock.id as id,
                stock.pid as pid,
                product.namezh as namezh,
                warehouse.id as zk_id,
                bclass.number as bclassc_number,
                sclass.number as sclassc_number,
                product.number as snumber_number,
                sum(stock.number) as number,
                warehouse.name as zkname,
                sum( case when stock_form.type =30 then stock.number  else 0 end ) as freeze_number
            ')
            ->where($mad)
            ->join('LEFT JOIN product ON stock.pid = product.id')
            ->join('LEFT JOIN classify as bclass ON product.bclass = bclass.id')
            ->join('LEFT JOIN classify as sclass ON product.sclass = sclass.id')
            ->join('LEFT JOIN stock_form ON stock.stock_form_id = stock_form.id')
            ->join('LEFT JOIN warehouse_location ON stock_form.position_id = warehouse_location.id')
            ->join('LEFT JOIN warehouse ON stock_form.warehouse_id = warehouse.id')
            ->group('stock.pid')
            ->having('sum(stock.number)>0')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

    //todo 查询某个仓库某个产品数量
    public function productNum($k_id,$pid){
        $this->startTrans();//开启事务
        $map['warehouse_id'] = $k_id;
        $map['pid'] = $pid;
        $map['state'] = 1;
        $list = $this
            ->lock(true)
            ->where($map)
            ->field('
                sum(number) as number
            ')
            ->group('pid,warehouse_id')
            ->find();//加锁查询
        //如果查询结果为0返回0
        //如果执行错误返回false
        if ($list){
            $result = true;
            if (!$result){
                $this->rollback();//回滚
                return false;
            }
        }
            $this->commit();//事务提交
            return $list['number'];

    }
    //批量出库
    //@ $k_id(仓库id,主仓id)，$map(产品id，产品数量，采购订单id)，$oid(采购订单id)，$salesorder(销售订单id)
    public function outOfstock($k_id,$map,$salesorder){
//        $trem['w_id'] = $k_id;
//        $trem['w_type'] = 2;//主仓
//        $trem['status'] = 1;
//        //查询仓库主仓id
//        $warehouse_location = M('warehouse_location')->lock(true)->where($trem)->field('id')->find();
        $stock_form = M('stock_form');
        $stock_form->startTrans(); //开启事务
        $data_form['order_id'] = (int)$salesorder;
        $data_form['order_type'] = '销售订单';
        $data_form['type'] = 20;//出库
        $data_form['warehouse_id'] = $k_id['warehouse_id'];
        $data_form['position_id'] = $k_id['position_id'];
        $data_form['shelf_id'] = 'a';
        $data_form['creation_time'] = date("Y-m-d H:i:s", time());
        $data_form['status'] = 1;

        $pow['uid'] = $_SESSION['user_info']['uid'];
        $pow['method'] = 'bale';//打包出库
        $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
        $powArr = explode(",",$powerStr['range']);
        if (in_array($k_id['warehouse_id'],$powArr)){
            $sqla = $stock_form->lock(true)->data($data_form)->add();
            if ($sqla){
                $stock = M('stock');
                $stock->startTrans(); //开启事务
                foreach ($map as $k=>$v){
                    $record[] = array(
                        'pid'=>$map[$k]['pid'],//产品id
                        'o_id'=>$map[$k]['oid'],//采购订单id
                        'stock_form_id'=>(int)$sqla,//详细信息
                        'number'=>(int)-$map[$k]['number'],//数量
                        'status'=>1
                    );
                }
                $sqlb = $stock->lock(true)->addAll($record);
                if ($sqlb AND $sqla) {
                    $stock_form->commit();   //提交事务
                    $stock->commit();
                    $return = 'ok';
                } else {
                    $stock_form->rollback(); //事务回滚
                    $stock->rollback();
                    $return = 'no';
                }

            }
        }else{
            $return = 'so';
        }
        $this->ajaxReturn($return);
    }
    


}




?>