<?php
namespace Home\Controller;
use Home\Model\Asin_skuModel;
use Home\Model\Country_regionsModel;
use Home\Model\Ebay_orderModel;
use Home\Model\Order_customer_bomModel;
use Home\Model\Order_customer_logModel;
use Home\Model\Order_customerModel;
use Home\Model\ProductModel;
use Home\Model\SkuModel;
use Home\Model\Status_exModel;
use Home\Model\StockModel;
use Think\Model;
use Home\Model\Pl_account_userModel;
class OrderController extends CommonController{
    //导入订单,主页
    public function index()
    {
        $this->display();
    }
    //ajax 获取平台
    public function getarea()
    {
        $map['status']='1';
        $return=M('platform')->where($map)->select();
        return $this->ajaxReturn($return);
    }
    //ajax 返回指定平台下的账户
    public function getplatformAjax()
    {
        $condition['platform_account.platform_id']=$_POST["platform"];//平台的id
        //$condition['platform_id'] = M('platform')->where($map)->getField('id');
        $condition['pl_account_user.status']='1';
        $condition['platform_account.status']='1';
        $condition['pl_account_user.uid']=$_SESSION['user_info']['uid'];//当前用户id
        $return=M('platform_account')
            ->where($condition)
            ->field('
            platform_account.id as id,
            platform_account.account_number_name as name        
            ')
            ->join('LEFT JOIN platform ON platform_account.platform_id=platform.id')
            ->join('LEFT JOIN pl_account_user ON pl_account_user.pl_account_id=platform_account.id')
            ->where($condition)
            ->select();
        return $this->ajaxReturn($return);
    }
    //导入订单
    public function salesOrders()
    {
        $file=$_FILES['file']['tmp_name'];//获取临时文件名
        $sequenceData['file_name']=$_FILES['file']['name'];//上传使用的文件名
        $platformmap['id']=$platformid=$_POST['platform'];
        //根据平台id查询 平台的类型
        $pingtai=M('platform')->where($platformmap)->getField('type');
        $id=$_POST['platform_id'];//外部账号 $id
        //生成当前导入序列
        $sequenceData['ac_id']=$id;//外部账号id
        $sequenceData['ctime']=date("Y-m-d H:i:s", time());//创建时间
        $sequence=M('order_sequence')->data($sequenceData)->add();//上传序列号
        //$AnumberInfo 账号相关信息
        $AnumberInfo=M('platform_account')
            ->where("platform_account.id=".$id)
            ->join('LEFT JOIN platform  ON platform_account.platform_id=platform.id')
            ->find();
        if ($pingtai=="amazon")
        {
            $str = file_get_contents($file);//将整个文件内容读入到一个字符串中
            $str_encoding = mb_convert_encoding($str, 'UTF-8', 'ASCII');//转换字符集（编码）
            $arr = explode("\r\n", $str_encoding);//转换成数组
            $Amazon=array();
            //切割数组
            foreach ($arr as &$row)
            {
                if (!empty($row))
                {
                    $Amazon[]=explode("\t",$row);//每一行都分割成数组的元素
                }
            }
            unset($row);
            //找到每一项的key;
            $sign=array();//key的数组,索引导入的订单各项信息的key
            $sign['sku']=array_search('sku',$Amazon[0]);
            $sign['order-id']=array_search('order-id',$Amazon[0]);// 亚马逊 订单号
            $sign['buyer-email']=array_search('buyer-email',$Amazon[0]);//买家邮件
            $sign['buyer-name']=array_search('buyer-name',$Amazon[0]);//买家姓名
            $sign['recipient-name']=array_search('recipient-name',$Amazon[0]);//收件人姓名
            $sign['buyer-phone-number']=array_search('buyer-phone-number',$Amazon[0]);//买家联系电话
            $sign['quantity-purchased']=array_search('quantity-purchased',$Amazon[0]);//数量
            $sign['ship-service-level']=array_search('ship-service-level',$Amazon[0]);//邮寄方式
            $sign['ship-address-1']=array_search('ship-address-1',$Amazon[0]);//收件地址1
            $sign['ship-address-2']=array_search('ship-address-1',$Amazon[0]);//收件地址1
            $sign['ship-city']=array_search('ship-city',$Amazon[0]);//ship-收件 城市
            $sign['ship-state']=array_search('ship-state',$Amazon[0]);//收件 州/省
            $sign['ship-country']=array_search('ship-country',$Amazon[0]);//收件国家
            $sign['ship-postal-code']=array_search('ship-postal-code',$Amazon[0]);//
            //$sign['']=array_search('',$Amazon[0]);
            //将亚马逊数组的内容转换为下一步流程数组
            $arryama=$Amazon;
            foreach ($arryama as $key=>$value )
            {
                if ($key==0)
                {
                    $value_previous=0;
                    continue;//删除第一次
                }
                $order[]
                    =$value_previous
                    =array
                (
                    "source_accountid"=>$id, // 外部账号id
                    "source_orderid"=>$value{$sign['order-id']},//外部 订单号
                    "import_sequence"=>$sequence,//导入次序
                    "sku"=>$value{$sign['sku']},//订单内的sku
                    "asin"=>$this->getasin($value{$sign['sku']}),//订单内的sku对应的asin 如果没做关联这一项是空
                    "buyer_last_name"=>$value{$sign['buyer-name']},//买家姓名
                    "recipient_last_name"=>$value{$sign['recipient-name']},//收件人姓名
                    "buyer_phone"=>$value{$sign['buyer-phone-number']},//收件人电话
                    "buyer_email"=>$value[$sign['buyer-email']],//收件人联系方式email
                    "street_1"=>$value{$sign['ship-address-1']},//收件地址街道1
                    "street_2"=>$value{$sign['ship-address-2']},//收件地址街道2
                    "street_3"=>$value{$sign['ship-address-3']},//收件地址街道3
                    "country"=>$value{$sign['ship-country']},//国家
                    "ship_level"=>$value{$sign['ship-service-level']},//邮寄方式
                    "state"=>$value{$sign['ship-state']},//州或省
                    "city"=>$value{$sign['ship-city']},//市
                    "zip"=>$value{$sign['ship-postal-code']},//邮编
                    "order_price"=>'0',//订单价格
                    //"ebay_title"=>$value{$sign['sku']},///外部平台的产品变量,substr字符串截取函数
                );
            }
            fclose($file);//关闭资源
            //查找为空的值,标注出来.
            $warning=$this->verificationOrder($order);//todo an
            $warningson=json_encode((object)$warning);//筛选不正确的值;
            $this->assign('warningjson',$warningson);
            $this->assign('order',$order);
            $this->display('amznOrders');
        }
        if ($pingtai=="ebay"){
            $str = file_get_contents($file);//将整个文件内容读入到一个字符串中
            $str_encoding = mb_convert_encoding($str, 'UTF-8', 'ASCII');//转换字符集（编码）
            $arr = explode("\r\n", $str_encoding);//转换成数组
            $goods_list=array();
            $Disposable=true;//控制,第一行是逗号分隔,以后的数据,是引号 逗号 引号分隔
            $Separator=",";//$Separator 分割符号
            foreach ($arr as $k=>$row)
            {
                if (strlen($row)<1)//如果这一行不为空 继续程序 避免错误文件
                {
                    continue;
                }
                $rowfen=trim($row);//去除多余的 制表位和空格符号
                if (!empty($rowfen))
                {
                    $hang=explode($Separator,$rowfen);//每一行都分割成数组的元素
                    foreach ($hang as $var){
                        $datax[]=trim($var,'"');
                    }
                    //一次执行,只有数据的第一行需要逗号分隔 ; 剩余数据需要用引号逗号引号分割
                     if ($Disposable){
                        $Separator="\",\"";//变更,分割数组的标志
                        $Disposable=false;
                    }
                    $goods_list[]=$datax;
                    unset($datax);
                }

            }
            unset($row);
            array_pop($goods_list);//删除csv最后一行
            array_pop($goods_list);//删除csv最后一行
            //标记字段
            $mark['postage']=array_search("Postage Service",$goods_list[0]);//邮寄方式 todo 根据 调整
            if ($mark['postage']==false)
            {
                $mark['postage']=array_search("Shipping Service",$goods_list[0]);
            }
            $mark['variation']=array_search("Variation Details",$goods_list[0]);//变量 $mark['variation']
            $mark['number']=array_search("Item Number",$goods_list[0]);//产品号 $mark['number']
            $mark['UserId']=array_search("User Id",$goods_list[0]);//User Id 买家名
            $mark['Fullname']=array_search("Buyer Fullname",$goods_list[0]);//Buyer Fullname 收件人姓名
            $mark['totalprice']=array_search("Total Price",$goods_list[0]);//订单价格
            $mark['phone']=array_search("Buyer Phone Number",$goods_list[0]);//Buyer Phone Number 买家电话
            $mark['title']=array_search("Item Title",$goods_list[0]);//标题Item Title
            $mark['quantity']=array_search('Quantity',$goods_list[0]);//数量
            $mark['buyer_email']=array_search('Buyer Email',$goods_list[0]);//buyer_email 买家email
            foreach ( $goods_list as $key=>$value )
            {
                //不符合条件的上传文件,排除
                if (count($value)<38)
                {
                    break;
                }
                if($key==0) //剔除第一行
                { continue;}
                $previous=$goods_list[$key-1][0];//上一条的订单号
                $next=$goods_list[$key+1][0];//下一条的订单号
                // 检测重复订单
                $stausid=$this->repeatOrder($id,$sequence,$value[0]);//repeatOrder 判定重复订单
                //判断var和sku TODO 空=错误订单
                $skuvar=$this->getSkuBom($value[$mark['number']],$value[$mark['variation']]);

                //如果当前记录和下一条记录 外部订单号不相同:创建主表记录
                if($previous!=$value[0]){
                    //order 销售订单 主表
                    $saorder=array(
                        //外部订单号
                        "external_sn"=>$value[0],//ebay订单号,
                        "platform_id"=>$id,//账号id
                        "import_sequence"=>$sequence,//导入次序
                        "type"=>'ebay',//订单类型
                        "fullname"=>$value[$mark['Fullname']],//收件人姓名
                        "buyer_phone"=>$value[$mark['phone']],//买家电话
                        "street_1"=>$value[5],//收件地址第一行
                        "street_2"=>$value[6],//收件地址第二行
                        "country"=>$value[10],//国家
                        "state"=>$value[7],//州或省
                        "city"=>$value[8],//市
                        "zip"=>$value[9],//邮编
                        "status_id"=>$stausid,//导入状态 ,如果重复状态8
                        "status"=>1,// 生效
                        "creation_time"=>date("Y-m-d H:i:s", time()),//创建时间
                        "fare"=>"0",//运费 todo 运费
                        "ship_level"=>$value[$mark['postage']],//邮寄方式
                        "totalprice"=>$value[$mark['totalprice']],//Total Price 订单价格
                        "account_number"=>$AnumberInfo['account_number'],//平台账号名 显示用不存入数据库
                    );
                    $ordercust_id=M('order_customer')->data($saorder)->add();//添加订单
                    $saorder['id']=$ordercust_id;
                    $order[]=$saorder;//order 页面输出数组.展示的订单星系
                    $saorder=null;
                    if($next===$value[0])//如果,当前记录-ebay订单号与前一个不同,下一个相同,这记录是一个合并订单,它只计入主表
                    {
                        continue; // 跳出本次循环,
                    }
                }
                //销售订单分表
                $ebayorder=array(
                    "ordercust_id"=>$ordercust_id,
                    "status"=>1,// 导入 ,订单状态
                    "external_sn"=>$value[0],//ebay订单号,
                    "external_title"=>$value[$mark['title']],//产品标题
                    'buyer_email'=>$value[$mark['buyer_email']],//email 买家邮箱  buyer_email
                    "create_time"=>date("Y-m-d H:i:s", time()),//创建时间
                    "ebayuserid"=>$value[$mark['UserId']],//ebay买家名
                    'sku_id'=>$skuvar['id'],
                    'quantity'=>$value[$mark['quantity']],//数量
                    "ship_level"=>$value[$mark['postage']],//邮寄方式
                );
                $ebay_order=M('ebay_order')->data($ebayorder)->add();//添加信息数据库
            }
            fclose($file);//关闭资源
            //冻结产品
            $this->getSequenceFreeze($sequence);
            //跳转输出
            $this->redirect('Order/importlist',array('acid'=>$id,'id'=>$sequence));
        }
    }


    //导入订单关联 sku id  ebay专用
    public function getSkuBom($itemnumber,$var)
    {
        if(empty($itemnumber))
        {
            //如果item 是空,则无法对应相对应的sku
            return null;
        };
        $where['item_number']=$itemnumber;
        $where['var']=$var;
        //查询,是否存在
        $sku=M('sku_var')->where($where)->order('version desc')->find();
        if ($sku['id']===null){
            $where['status']=1;//status'1未加bom,0已有bom',
            $where['type']='ebay';//sku类型
            $where['version']=0;
            //添加一条sku记录
            $sku_re=new \Home\Model\Sku_varModel();
            $sku=$sku_re->skuAdd($where);
        }
        return $sku;
    }
    //根据上传订单冻结 todo ing ebay正在调试
    public function getSequenceFreeze($sequence)
    {
        $model=new \Home\Model\Order_customerModel();
        $order_id_list=$model->getOrderSq($sequence);//获取本次上传的全部订单
        foreach ( $order_id_list as $key => $value)
        {
            $order_freeze_result=$this->freeze($value);//冻结订单结果
        }
        return 1;

    }



    // 根据订单,冻结库存产品, 返回成功 ,失败
    //订单->冻结库存 todo  仓库信息
    //$w_id仓库id,$order_id 内部订单号
    public function freeze($order_id)
    {
        // 根据订单号 查询订单下所有产品
        $model=new \Home\Model\Order_customerModel();
        $list=$model->orderProductLsit($order_id);
        $order_product=$list[1];
        //组合 库存的查询条件
        $stock_having=null;
        foreach ($list[2] as $key=>$value){
            if($key>0){$stock_having=$stock_having." OR ";}
            $stock_having=$stock_having."(stock.pid=".$value['pid']." AND number >  ".$value['sumnumber'].")";
        }
        //冻结所需数据  $freeze_data
        $freeze_data['status']=1;
        //查询库存,条件
        $stock_where['stock_form.status']=1;//库单状态
        $stock_where['warehouse_location.w_type']=2;//库区 //todo


        $stock_where['stock_form.warehouse_id']=1;//仓库 todo country 来自配送费为对应的仓库
        $stock_where['stock.status']=1;//库存状态
        //$stock_where['stock.pid']=implode(array_column($list[2],'pid')); ↓
        $stock_where['stock.pid']=array('in',implode(",",array_column($list[2],'pid')));
        //开启事务
        $trans=M();
        $trans->startTrans();
        //查询库存
        $stock=M('stock_form')
            ->lock(true)
            ->field('
            sum(stock.number)-  sum( case when stock_form.type =30 then number  else 0 end ) as number,
            stock.pid')
            ->join('stock ON stock_form.id = stock.stock_form_id ')
            ->join('warehouse_location ON stock_form.position_id = warehouse_location.id ')
            ->where($stock_where)
            ->group('stock.pid')
            ->having($stock_having)
            ->select();
        if (count($stock,0)==(count($order_product,0)))//$stock 库存符合的产品,$order_product 订单所需的产品数量
        {
            //添加冻结数据
            foreach ($list[2] as $key=>$value)
            {
                $data_stock_form=array(
                    'order_type'=>'冻结类型',//todo 冻结类型
                    'order_id'=>$order_id,//订单号
                    'warehouse_id'=>123123123,// 仓库id ing todo
                    'position_id'=>2,//区位 2=主仓
                    'status'=>1,
                    'type'=>30,//冻结类型
                   // 'shelf_id'=>999,
                    'creation_time'=>date("Y-m-d H:i:s", time())//创建时间
                );
                $stock_form_id=M('stock_form')->data($data_stock_form)->add();
                $data_stock=array(
                    'stock_form_id'=>$stock_form_id,
                    'pid'=>$value['pid'],
                    'number'=>$value['number'],
                    'status'=>1
                );
                M('stock')->data($data_stock)->add();
                unset($stock_form_id);
            }
            M()->commit();//提交事务
            //已冻结 todo 状态修改
            $return=3;// 已经完成后冻结 返回 未打印状态
            //bom齐全订单 3
        }else{
            M()->rollback();//回滚
            // 库存不足订单 todo 状态修改
            $return=10;//10为库存不足;

        }
        return $return;
    }

    //检查订单重复  todo 待检验1
    //检测重复订单 返回订单状态 $import_sequence 当前导入次序,$ac_id外部账号id,$orederid外部订单号
    public function repeatOrder($ac_id,$import_sequence,$orederid)
    {
        $where['platform_id']=$ac_id;//外部账号
        $where['import_sequence']=array('NEQ',$import_sequence);//不等于本次导入
        $where['status']=1;//状态
        $where['external_sn']=$orederid;//$orederid外部订单号
        $panding=M('order_customer')->where($where)->find();
        if($panding!=null){
            //如果有重复的,返回8 重复状态
            return 8;
        }else{
            //1正常订单
            return 1;
        }

    }
    //todo 检查,订单   ↓ 待删除
    public function inspectOrder($number,$var)
    {
        $where["ebaysn"]=(string)$number.(string)$var;
        $pd=M('ebay_variable')->where($where)->find();
        if (!empty($pd['bom_id']))
        {
            $re= true;
        }else{
            $re=  false;
        }
        return $re;
    }
//  对关键字段进行验证,如果值不正确,则设置为问题订单 (amazon) todo 待检测
//  返回问题订单的值
    public function verificationOrder($orders)
    {
        foreach ($orders as $k=>$v)
        {
            foreach ($v as $key=>$value)
            {
                //如果有值为空,则标注为问题订单
                if (empty($value))
                {
                    //第二行地址和第三行地址以及联系人电话可以为空
                    if ($key!='street_3' and  $key!='street_2' and $key!='buyer_phone')
                    {
                    $result[$k][]=$key;
                    continue;
                    }
                }
                if($key=='buyer_email')
                {
                    if(!filter_var($value, FILTER_VALIDATE_EMAIL))
                    $result[$k][]=$key;
                    continue;
                }
            }
        }
        return $result;
    }

    //todo 订单进行合并
    //同一姓名 同样的收货地址 设置为一样的内部订单号,统一发货
    public function mergeOrder()
    {

    }
    // 订单.产品链接内外pid
    // 外部订单,通过sku 查询到产品ip返回
    // 内部调用 查询sku对应的 asin pid todo 待修改
    public function getasin($sku=0)
    {
        if ($sku==0){ return null; }
        $ASINsku=new  \Home\Model\Asin_skuModel();
        $re=$ASINsku->getasinSku($sku);
        if (empty($re)){ return null; }
        $asin=$re['asin'];
        return $asin;
    }
    /**
     * 显示某一账号下所有的产品链接
     *
     */
    //todo 显示所有asin
    public function indexToProduct()
    {

        if ($_GET['account'])
        {
            $where['account_id']=$_GET['account'];
            $where['status']=1;
            $list=M('asin_sku')->where($where)->select();
            $this->assign('list',$list);
        }
        $this->display();
    }
//    //todo 显示所有ebay 关联 产品
//    public function indexEbayProduct()
//    {
//        //查询,外部账号//当前账号
//        $account='linux@163.com';
//        if ($_GET['account'])
//        {
//            //
//            $where['ebay_spu.account_id']=$_GET['account'];
//            $where['ebay_spu.status']=1;
//            $ebay=new \Home\Model\Ebay_spuModel();
//            $requst=$ebay->getspu($where);
//            //$list=M('ebay_spu')->where($where)->select();
//            $this->assign('list',$requst['list']);
//            $this->assign('page',$requst['page']);
//        }
//        $this->assign('account',$account);
//        $this->display();
//    }




    //导入 外部sku的页面
    public function asinlinkSkuOrder()
    {
        $this->display();
    }
    // 批量导入外部sku 对应 asin
    public function alladdProductAsinSku()
    {
        $file=$_FILES['file']['tmp_name'];//获取临时文件名
        //平台类型
        $platformmap['id']=$_POST['platform'];
        //根据id查询 平台
        $pingtai=M('platform')->where($platformmap)->getField('type');
        if ($pingtai=="amazon")
        {
            $str = file_get_contents($file);//将整个文件内容读入到一个字符串中
            $str_encoding = mb_convert_encoding($str, 'UTF-8', 'ASCII');//转换字符集（编码）
            $arr = explode("\r\n", $str_encoding);//转换成数组
            $Amazon=array();
            //切割数组
            foreach ($arr as &$row)
            {
                if (!empty($row))
                {
                    $Amazon[]=explode("\t",$row);//每一行都分割成数组的元素
                }
            }
            unset($row);
            //删除第一行,第一行是 字段标识
            array_splice($Amazon,0,1);
            //写入操作日志,导入操作.
            $platform_account_id=(int)$_POST['platform_id'];//当前外部账号 id
            $operating='asinImport';//'操作说明,asinImport,导入',
            $log=new \Home\Model\Account_logModel();
            $loggingid=$log->addlog($platform_account_id,$operating);//操作记录
            $loggingid=(int)$loggingid;//添加的操作id
            foreach ($Amazon as $key=>$value )
            {
                //data 为存入 asin_sku 表的表关系
                $date[]=array(
                            'sku'=>$value[0],
                            'asin'=>$value[1],
                            'price'=>$value[2],
                            'status'=>1,
                            'account_id'=>$platform_account_id ,
                            'logging_id'=>$loggingid
                    );
            }
            fclose($file);//关闭资源
            //账号下的asku 标记
            //标记为逻辑删除的所有
            $where['account_id']=$platform_account_id;
            $delnumber=M('asin_sku')->where($where)->setField('status','2');
            if($delnumber>0){
                $operating='asin\\tdell\\t'.(string)$delnumber;   //操作说明,dell,导入'
                //todo 需要消息注入,需要一个可逆操作的标识
                //todo 需要删除.2019年1月7日18:30:41
                //$xxx=new \Home\Model\Account_logModel();
                $delllogid=$log->addlog($platform_account_id,$operating);//操作记录 删除了多少
            }
            $return=M('asin_sku')->addAll($date);
            $ppt='成功添加asin'.(string)$return.'条记录';
            $ppt=$ppt.'<br />成功删除asin'.(string)$delnumber.'条记录';
            $this->success($ppt, U("Order/asinlinkSkuOrder"));
        }
        return null;

    }
    //平台主页
    public function plindex()
    {
        $map['country.status'] = '1';
        $trem['status'] = 1;
        if (LANG_SET=='zh-cn'){
            $list = M('platform')
                ->field('
                platform.id as id,
                platform.name as name,
                platform.url as url,
                platform.type as type,
                platform.status as status,
                platform.country as country,
                country.countryzh as countryzh
            ')
                ->join('LEFT JOIN country ON platform.country = country.id')
                ->select(); //查询条件状态为1
            $country = M('country')->where($trem)->field('id,countryzh')->select();
        }elseif(LANG_SET=='en-us'){
            $list = M('platform')
                ->field('
                platform.id as id,
                platform.name as name,
                platform.url as url,
                platform.type as type,
                platform.status as status,
                platform.country as country,
                country.countryus as countryzh
            ')
                ->join('LEFT JOIN country ON platform.country = country.id')
                ->select(); //查询条件状态为1
            $country = M('country')->where($trem)->field('id,countryus as countryzh')->select();
        }

        $this->assign('list',$list);
        $this->assign('country',$country);
        $this->display();
    }
    //添加平台
    public function plAdd()
    {
        if (IS_POST){
            $lis['name'] = trim(I('post.name'));//trim 去掉传过来值两边的空格
            $lis['type'] = I('post.type');
            $lis['status'] = '1';
            $lis['country'] = I('post.country');
            $lis['url'] = I('post.url');
            $where['name'] = $lis['name'];
            $where['status'] = '1';
            $where['type'] = $lis['type'];
//            $where['url'] = $lis['url'];
//            $where['country'] = $lis['country'];
            $userInfo = M('platform')->where($where)->find();
            if (empty($lis['name']) AND empty($lis['type']) AND empty($lis['country'])){
                $this->ajaxReturn('KO','JSON');
            }elseif (!empty($userInfo['id'])){  //判断平台名称，状态，类型都符合（不为空）情况下则为真
                $this->ajaxReturn('NO','JSON');
            }else{
                $info = M('platform')->data($lis)->add();
                $this->ajaxReturn('OK','JSON');
            }
        }
    }
    //修改平台
    public function plupdate()
    {
        if (IS_POST){
            $id = I('post.id');
            $lis['name'] = trim(I('post.name'));//trim 去掉传过来值两边的空格
            $lis['type'] = I('post.type');
            $lis['url'] = I('post.url');
            $lis['country'] = I('post.country');
            $where['name'] = $lis['name'];
            $where['type'] = $lis['type'];
            $where['country'] =  $lis['country'];
            $where['url'] = $lis['url'];
            $where['status'] = '1';
            $userInfo = M('platform')->where($where)->find();
            if (empty($lis['name']) || empty($lis['url']) || empty($lis['country'])) {
                $this->ajaxReturn('KO', 'JSON');
            }elseif (!empty($userInfo['id'])){
                $this->ajaxReturn('NO','JSON');
            }else{
                $map['id']=$id;
                $info = M('platform')->where($map)->save($lis);
                $this->ajaxReturn('OK','JSON');
            }
        }
    }
    //修改平台状态
    public function pldelete(){
        if (IS_POST) {
            $id = I('post.id');
            $map['id'] = $id; //平台id
            $data['status'] = I('post.status');//状态
            $info = M('platform')->where($map)->setField($data);
            if ($info>0 AND $data['status']==1){
                $return='ok1';  //启用
            }elseif ($info>0 AND $data['status']==2){
                $return='ok2';  //禁用
            }else{
                $return='no';
            }
            $this->ajaxReturn($return);
        }
    }
    //外部帐号信息
    public function plShow(){
        $id = I('get.id');
        $map=array();
        $map['platform_id'] = $id;
        $search = trim($_GET['search']);//获取搜索条件
        if (!empty($search))
        {
            $map['platform_account.account_number'] = array('like', "%" .$search. "%", 'or');
            //将get传过来的值赋值给platform_account表里的字段account_number
        }
        $x=new  \Home\Model\Platform_accountModel();
        $result=$x->accountShow($map); //查询platform_account表里的字段account_number值为搜索传来的值
        $this->assign('pid',$map['platform_id']);
        $this->assign('list',$result['list']);
        $this->assign('page',$result['page']);
        $this->assign('search',$search);
        $this->display();
    }
    //添加外部账号
    public function zhAdd(){
        if (IS_POST){
            $data['account_number'] = trim(I('post.account_number'));//trim 去掉传过来值两边的空格
            $data['account_number_name'] = trim(I('post.account_number_name'));
            $data['platform_id'] = I('post.platform_id');
            $data['status'] = '1';
            $where['account_number'] = $data['account_number'];
            $where['platform_id'] = $data['platform_id'];
            $where['status'] = '1';
            $userInfo = M('platform_account')->where($where)->find();
            if (empty($data['account_number']) AND empty($data['account_number_name'])){
                $this->ajaxReturn('KO','JSON');
            }elseif (!empty($userInfo['id'])){
                $this->ajaxReturn('NO','JSON');
            }else{
                $info = M('platform_account')->data($data)->add();
                $this->ajaxReturn('OK','JSON');
            }
        }
    }
    //修改外部账号
    public function upAccount(){
        if (IS_POST){
            $map['id'] = I('post.id');
            $lis['account_number'] = trim(I('post.account_number'));//trim 去掉传过来值两边的空格
            $where['account_number'] = $lis['account_number'];
            $where['platform_id'] = I('post.pid');
            $where['status'] = '1';
            $userInfo = M('platform_account')->where($where)->find();
            if (empty($lis['account_number'])) {
                $this->ajaxReturn('KO', 'JSON');
            }elseif (!empty($userInfo['id'])){
                $this->ajaxReturn('SO','JSON');
            }else{
                $info = M('platform_account')->where($map)->save($lis);
                $this->ajaxReturn('OK','JSON');
            }
        }
    }
    //删除外部账号
    public function zhDel(){
        if (IS_POST){
            $id = I('post.id');
            $map['id'] = $id;
            $data['status'] = '2';
            $data = M('platform_account')->where($map)->setField($data);
            $this->ajaxReturn($data);
        }
    }
    //用户本机的关联外部账号
    public function externalMe()
    {
        $id = I('get.id');
        $map['pl_account_user.pl_account_id']=$id; //关联外部账号id
        $map['pl_account_user.status'] = '1';
        $user = M('pl_account_user')->where($map)
            ->field('
                    user_info.lastnamezh as lastnamezh,
                    user_info.namezh as namezh,
                    user_info.name as uname,
                    user_info.id as id,
                    user_info.uid as uid
            ')
            ->join('LEFT JOIN user_info ON pl_account_user.uid=user_info.uid')
            ->select();
        $np['id']=$id;//关联外部账号id
        $np['status'] = '1';
        $pid = M('platform_account')->where($np)->field('id,account_number,platform_id')->find();
        $mab['id'] = $pid['platform_id'];   //将关联外部账号表的platform_id赋值给平台表的id
        $pt = M('platform')->where($mab)->field('name')->find();    //查询平台id
        $this->assign('ptname',$pt['name']);
        $this->assign('pid',$pid['account_number']);
        $this->assign('sid',$pid['id']);
        $this->assign('list',$user);
        $this->display();
    }
    //添加内部用户   externalAdd
    public function externalAdd(){
        if (IS_POST) {
            $map['status'] = "1";
            $list = M('user_info')
                ->where($map)
                ->field('id,numbering,lastnamezh,namezh,uid,status')
                ->select();
            $this->ajaxReturn($list);
        }
    }
    //执行内部用户添加
    public  function externalInster(){
        if (IS_POST) {
            $map['pl_account_id'] = I('post.pl_account_id');
            $map['status'] = '1';
            $uid = I('post.uid');
            foreach ($uid as $k => $v) {
                $map['uid'] = $uid[$k]; //遍历$uid下标赋值给$map['uid']
                $Result = M('pl_account_user')->data($map)->add();
            }
            $this->ajaxReturn($Result);
        }
    }
    //删除内部用户
    public function externalDel(){
        if (IS_POST) {
            $uid = I('post.uid');
            $map['uid'] = $uid; //内部用户uid
            $data['status'] = '2';
            $data = M('pl_account_user')->where($map)->setField($data);
            $this->ajaxReturn($data);
        }
    }

    //销售订单列表
    public function mySales(){
        $data['pl_account_user.uid']=$_SESSION['user_info']['uid'];
        $map['status'] = '1';
        $data['status_ex.table']="order_customer";
        $data['order_customer.status']=1;  //订单状态为1
        $platformid = $_GET['platform'];//平台
        $status_id = $_GET['status_id'];//状态
        $screen = $_GET['screen'];//筛选条件
        $rout = trim($_GET['rout']);//搜索内容
        $status['table']='order_customer';
        $status['column']='status_id';
        $status_ex=M('status_ex')->where($status)->group('val')->select();
        if (!empty($status_id)AND $status_id!==9){ //如果状态不为空并且是状态不是问题订单就查询各自状态
            $data['order_customer.status_id']=array('eq',$status_id);
        }
        if (!empty($status_id)AND $status_id==9){ //如果状态不为空并且是状态为问题订单就查询状态为8，9
            $status_arr = array(8,9);
            $data['order_customer.status_id']=array('in',$status_arr);
        }
        if($screen){
            $data["order_customer.$screen"]=array('eq',$rout);
        }
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=10;
        }
        $order=new Pl_account_userModel();
        $orders=new Order_customerModel();
        $number=$order->platform_acc();//查询用户下的账号
        if ($platformid=='whole'){//如果账户为全部
            foreach ($number as $k=>$v){
                $accountid[] = $v['id'];
            }
            $data['order_customer.platform_id'] = array('in',$accountid);
        }
        if (!empty($platformid)AND $platformid!=='whole'){ //如果账户不为空就执行
            $data['order_customer.platform_id']=array('eq',$platformid);
        }
        //判断有一个不为空 才显示
        if (!empty($platformid)){
            $list=$orders->salesOrder($data,$pagen);
        }
        $this->assign('screenvalue',$rout);
        $this->assign('screen',$screen);
        $this->assign('list',$list['list']); //订单产品
        $this->assign('page',$list['page']);//分页
        $this->assign('status',$status_id);//订单状态
        $this->assign('number',$number);//平台下的账号
        $this->assign('status_ex',$status_ex);//订单状态
        $this->assign('platform',$platformid);//平台下的账号选项
        $this->assign('pagen',$pagen);//分页选项
        $this->assign('count',$list['count']);//数量
//        $this->display('mySales');
        $this->display();
    }

    //销售订单列表
    public function orderSales(){
        $data['pl_account_user.uid']=$_SESSION['user_info']['uid'];
        $map['status'] = '1';
        $data['order_customer.status']=1;  //订单状态为1
        $platformid = $_GET['platform'];//平台账户
        $status_id = $_GET['status_id'];//状态
        $screen = $_GET['screen'];//筛选条件
        $rout = trim($_GET['rout']);//搜索内容
        if (!empty($status_id)AND $status_id!==6 || $status_id!==9){ //如果状态不为空并且不是未发货或者不是问题订单就查询各自的状态
            $data['order_customer.status_id']=array('eq',$status_id);
        }
        if (!empty($status_id)AND $status_id==6){ //如果状态不为空并且是未发货就查询状态为2，3，5
            $status_arr = array(2,3,5);
            $data['order_customer.status_id']=array('in',$status_arr);
        }
        if (!empty($status_id)AND $status_id==9){ //如果状态不为空并且状态为问题订单就查询状态为8，9
            $status_arr = array(8,9);
            $data['order_customer.status_id']=array('in',$status_arr);
        }
        if($screen){//查询表字段  如果有就执行
            $data["order_customer.$screen"]=array('eq',$rout);
        }
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=10;
        }
        $order=new Pl_account_userModel();
        $orders=new Order_customerModel();
        $number=$order->platform_acc();//查询用户下的账号
        if ($platformid=='whole'){//如果账户为全部就执行查询所有的账号
            foreach ($number as $k=>$v){
                $accountid[] = $v['id'];
            }
            $data['order_customer.platform_id'] = array('in',$accountid);
        }
        if (!empty($platformid)AND $platformid!=='whole'){ //如果账号不为空并且不是查询全部就执行
            $data['order_customer.platform_id']=array('eq',$platformid);
        }
        //判断有一个不为空 才显示
        if (!empty($platformid)){
            $list=$orders->salesOrder($data,$pagen);
        }
        $this->assign('screenvalue',$rout);
        $this->assign('screen',$screen);
        $this->assign('list',$list['list']); //订单产品
        $this->assign('page',$list['page']);//分页
        $this->assign('status',$status_id);//订单状态
        $this->assign('number',$number);//平台下的账号
        $this->assign('platform',$platformid);//平台下的账号选项
        $this->assign('pagen',$pagen);//分页选项
        $this->assign('count',$list['count']);//数量
        $this->display();
    }

    //问题订单
    public function afterSales(){
        $data['pl_account_user.uid']=$_SESSION['user_info']['uid'];
        $data['order_customer.status']='1';
        $data['platform.id']=$_GET['platform'];
        $statusarr = array(8,9);
        $data['order_customer.status_id']=array('in',$statusarr);
        $type=$_GET['type'];
        if(!empty($type)){
            $data['order_problem.type']=$type;
        }
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=10;
        }
        $order=new Pl_account_userModel();
        $list=$order->salesOrder($data,$pagen);
        $number=$order->platform_acc();
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->assign('number',$number);//账户
        $this->assign('platform',$data['platform.id']);
        $this->assign('type',$data['order_problem.type']);
        $this->assign('pagen',$pagen);
        $this->display();
    }

    //销售 订单 详情
    public function details(){
        $id=$_GET['id'];
        $map['order_customer.id']=$id;
        $user = new \Home\Model\Order_customerModel();
        $log=new Order_customer_logModel();
        $list=$user->orderdetail($map);
        $info=$user->orderdetails($map);
        $weight=$user->packageweight($map);
        $process=$log->logs($map);
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('weight',$weight);
        $this->assign('process',$process);
        $this->display();
    }

    //销售 订单 修改订单页面
    public function update(){
        $id=$_GET['id'];
        $map['order_customer.id']=$id;
        $user = new \Home\Model\Order_customerModel();
        $log=new Order_customer_logModel();
        $list=$user->ebay_order($map);//查询订单产品（数组）
        $info=$user->orderdetails($map);//查询订单信息（对象）
        $weight=$user->packageweight($map);//查询订单重量
        $process=$log->logs($map); //查询订单流程日志
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('weight',$weight);
        $this->assign('process',$process);
        $this->display();
    }

//    //下拉查询
//    public function seachproduct()
//    {
//        $search = trim($_POST['search']);  //去除空格
//        if (!empty($search)) {
//            $map['product.namezh'] = array('like', $search);
//            $list = M('product')->where($map)->field('id', 'namezh')->select();
//            $this->ajaxReturn($list);
//        }
//    }

    //搜索订单
    public function search(){
        $map['order_customer.id']=$_GET['id'];
        $user = new \Home\Model\Order_customerModel();
        $list=$user->search($map);
        $this->ajaxReturn($list);
    }

    //添加链接
    public function link(){
        $id=$_GET['ebay_id'];
        $limit=$_GET['limit'];
        if(empty($limit)){
            $limit=15;
        }
        $data['ebay_order.id']=$id;
        $map['ebay_order.id']=$id;
        $map['order_customer_bom.status']='1';
        $status['status']=1;
        $user = new \Home\Model\Order_customerModel();
        $list=$user->detailOrder($map);  //获取订单产品和数量
        $info=$user->detailsOrder($data);  //获取订单基本信息
        $bom=new Order_customer_bomModel();
        $asin=$bom->asin();
        //$sku=substr($info['var'],0,12);  //获取ebay的sku值
        //$href=$info['url'].$sku;      //生成链接
        $href=$info['url'].$info['item_number'];
        $title=$info['external_title']; //获取标题
        $keywords=M('keywords')->where($status)->field('id,name')->select();  //查询关键词库
        $pid=array_column($list,'pid');   //返回数组中指定的一列
        $pid=implode(',',$pid);
        if(!empty($pid)){
            for ($i=0;$i<count($pid);$i++) {
                $out = 'product.id NOT IN '. "(".$pid.")" . " AND ";  //筛除已选定的产品
            }
        }
        $condition=$out;
        $title_keywords="";
        $keywords_id=",";
        $p_keywords="";
        foreach ($keywords as $key =>$value){
            $iff=stristr($title,$value['name']);  //搜索关键词是否能在标题中找到(不区分大小写)
            if ($iff){
                $title_keywords=$title_keywords." ".$value['name'];  //获取标题中的关键词
                $keywords_id=$keywords_id.$value['id'].",";
                $condition=$condition.'product.keywords_id like "%,'.$value['id'].',%" and ';
            }
        }
        $condition=substr($condition, 0, -4);  //去除字符串最后的and
        /*if($k_word==false){
            $key_words="";
        }else{
            $key_words=M('product')->where($k_word)->select();  //获取产品关键词
        }
        $p_id="";
        foreach ($key_words as $key =>$value){
                $p_id=$p_id."'".$value['id']."',";
        }
        $p_id=substr($p_id, 0, -1);   //去除字符串最后的逗号
        if(!empty($p_id)){
            $condition=$condition."product.id IN (".$p_id.")";
        }*/
        if(empty($condition)){
            $condition=$condition.'product.status = "1"';
        }else{
            $condition=$condition.' AND product.status = "1"';
        }
        $productList=new ProductModel();
        $product = $productList->productPageList($condition,$limit);
        $this->assign('list',$list); //关联的产品信息
        $this->assign('info',$info); //标题、平台
        $this->assign('asin',$asin); //sku
        $this->assign('product',$product);  //产品
        $this->assign('keywords',trim($title_keywords)); //关键词
        $this->assign('href',$href); //外链接
        $this->display('linkProduct');
    }

    //添加关联产品
    public function addLinkProduct(){
        $asin=$_POST['sku_id'];
        $map=$_POST['supplier_pr_id'];
        $number=$_POST['num'];
        $count=count($map);
        $sku['asin']=$asin;
        M('order_customer_bom')->where($sku)->delete();
        $bom=new Order_customer_bomModel();
        for($i=0;$i<$count;$i++){
            $data['asin']=$asin;
            $data['pid']=$map[$i];
            $data['type']=1;
            $data['number']=$number[$i];
            $result[]=$bom->addProduct($data);
        }
        if(count($result)==$count){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //添加关联产品
    public function addProduct(){
        $asin=$_POST['sku_id'];  //接收sku的id
        $ebay_id=$_POST['ebay_id'];   //接收ebay的id
        $pid=$_POST['supplier_pr_id'];   //接收产品id
        $number=$_POST['num'];   //产品数量
        if($asin == ""){   //判断sku_id为空时
            $sku=new SkuModel();
            $asin=$sku->addSku();
            $ysku['item_number']="yellow_price".$asin;    //生成新的sku
            $ysku['version']=0;
            $ysku['status']=0;
            $sku_var['sku_id']=M('sku_var')->add($ysku);
            $ebay['id']=$ebay_id;
            $data['pid']=$pid;
            $data['number']=$number;
            $data['asin']=$sku_var['sku_id'];
            $data['type']=1;
            $res=M('ebay_order')->where($ebay)->save($sku_var);
            $bom=new Order_customer_bomModel();
            $result=$bom->addProduct($data);
        }else{
            $data['pid']=$pid;
            $data['number']=$number;
            $data['type']=1;
            $data['asin']=$asin;
            $bom=new Order_customer_bomModel();
            $result=$bom->addProduct($data);
            $condition['id']=$asin;
            $status['status']=0;
            $res=M('sku_var')->where($condition)->save($status);
        }
        if($result && $res){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //多选添加关联产品
    public function addAllProduct(){
        $asin=$_POST['sku_id'];  //接收sku
        $ebay_id=$_POST['ebay_id'];
        $map=$_POST['supplier_pr_id'];
        $number=$_POST['num'];
        $count=count($map);
        if($asin == ""){   //判断sku_id为空时
            $sku=new SkuModel();
            $asin=$sku->addSku();
            $ysku['item_number']="yellow_price".$asin;    //生成新的sku
            $ysku['version']=0;
            $ysku['status']=0;
            $sku_var['sku_id']=M('sku_var')->add($ysku);
            $ebay_id['id']=$ebay_id;
            $res=M('ebay_order')->where($ebay_id)->save($sku_var);
            $bom=new Order_customer_bomModel();
            for($i=0;$i<$count;$i++){
                $data['asin']=$sku_var['sku_id'];
                $data['pid']=$map[$i];
                $data['type']='1';
                $data['number']=$number[$i];
                $result[]=$bom->addProduct($data);
            }
        }else{
            $bom=new Order_customer_bomModel();
            for($i=0;$i<$count;$i++){
                $data['asin']=$asin;
                $data['pid']=$map[$i];
                $data['type']='1';
                $data['number']=$number[$i];
                $result[]=$bom->addProduct($data);

            }
            $condition['id']=$asin;
            $status['status']=0;
            $res=M('sku_var')->where($condition)->save($status);
        }
        if(count($result)==$count && $res){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //添加关联sku
    public function addSku(){
        $sku=new SkuModel();
        $asin=$sku->addSku();
        $ysku['var']="yellow_price".$asin;
        $ebay_id['id']=$_POST['id'];
        $data['pid']=$_POST['supplier_pr_id'];
        $data['number']=$_POST['num'];
        $data['asin']=$ysku['var'];
        $data['type']='1';
        M('ebay_order')->where($ebay_id)->save($ysku);
        $bom=new Order_customer_bomModel();
        $result=$bom->addProduct($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //todo 确认订单 old
    public function affirmorder(){
        $map = $_POST['arr'];//修改条件
        $where['id']=array('in',$map);
        $data['status_id']=3;//赋值需要改变的状态
        $result=M()->table('order_customer')->where($where)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $logs=new Order_customer_logModel();
        $count=count($map);
        for($i=0;$i<$count;$i++){
            $log['o_id']=$map[$i];
            $log['textzh']='确认订单信息';
            $log['textus']='Confirm order information';
            $log['variable']='';
            $logs->addlogs($log);
        }
        $this->ajaxReturn($list);
    }

    //产品表
    public function productList(){
        $where['product.status']='1';
        $productList=new ProductModel();
        $product = $productList->productList($where);
        $this->ajaxReturn($product);
    }

    //删除关联
    public function delLink(){
        $map['id']=$_POST['ebay_id'];
        $result=M('ebay_order')->where($map)->delete();
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //删除关联产品
    public function delLinkProduct(){
        $map['pid']=$_POST['pid'];
        $map['asin']=$_POST['sku_id'];
        $result=M('order_customer_bom')->where($map)->delete();
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //返回产品
    public function getAjaxProduct(){
        $pid=$_POST['pid'];
        $where['product.id']=array('in',$pid);
        $productList=new ProductModel();
        $product = $productList->productList($where);
        $this->ajaxReturn($product);
    }

    //保存  修改订单
    public function saveOrder(){
        $id=$_POST['id'];
        $map['id']=$id;
        //组织条件  状态符合规则
        $map['status']=array('in','1,2,3');
        $data['fullname']=$_POST['recipient_first_name'];
        $data['buyer_phone']=$_POST['buyer_phone'];
        $data['buyer_email']=$_POST['buyer_email'];
        $data['country']=$_POST['country'];
        $data['state']=$_POST['state'];
        $data['city']=$_POST['city'];
        $data['zip']=$_POST['zip'];
        $data['street_1']=$_POST['street_1'];
        $data['street_2']=$_POST['street_2'];
        $data['street_3']=$_POST['street_3'];
        $ebay_id=$_POST['ebay_id'];
        $quantity=$_POST['number'];
        $result=M('order_customer')->where($map)->save($data);
        for($i=0;$i<count($ebay_id);$i++){
            $res=M('ebay_order')->where('id='.$ebay_id[$i])->data('quantity='.$quantity[$i])->save();
        }
        if($result && $res){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //查询sku对应的产品
    public function skuInfo(){
        $map['asin']=$_POST['sku'];
        $asin=new Order_customer_bomModel();
        $info=$asin->skuInfo($map);
        $this->ajaxReturn($info);
    }

    //todo 关键词查询产品
    public function titleInfo(){
        $search=trim($_POST['search']); //接收搜索关键词
        $searchstr=strtolower($search); //转换为小写
        $pid=$_POST['pid'];
        $title=explode(" ",$searchstr);  //转换为一维数组
        $limit=$_POST['limit'];
        $status['status']=1;
        $status['name']=array('in',$title);
        $keywords=M('keywords')->where($status)->field('id,name')->select();  //查询关键词库
        if(empty($limit)){
            $limit=15;     //初始值为15
        }
        $pid=implode(',',$pid);
        if(!empty($pid)){
            for ($i=0;$i<count($pid);$i++) {
                $out = 'product.id NOT IN '. "(".$pid.")" . " AND ";  //筛除已选定的产品
            }
        }
        $condition='product.status = "1" AND '.$out;
        /*$lind=1;
        for ($i=0;$i<count($title);$i++){
                if ( (count($title,0)!=null) AND  ($lind!=1) ){
                    $condition=$condition." AND ";
                }
                $lind=2;
            $condition=$condition.'product.namezh like "%'.$title[$i].'%"';

        }*/
        foreach ($keywords as $key =>$value){
            $condition=$condition.'product.keywords_id like "%,'.$value['id'].',%" and ';
        }
        $condition=substr($condition, 0, -4);  //去除字符串最后的and
        /*if($k_word==false){
            $key_words="";
        }else{
            $key_words=M('product')->where($k_word)->select();  //获取产品关键词
        }
        $p_id="";
        foreach ($key_words as $key =>$value){
            $p_id=$p_id."'".$value['id']."',";
        }
        $p_id=substr($p_id, 0, -1);   //去除字符串最后的逗号
        if(!empty($p_id)){
            $condition=$condition."product.id IN (".$p_id.")";
        }*/
        $productList=new ProductModel();
        $product = $productList->productPageList($condition,$limit);
        $this->ajaxReturn($product);
    }

    //生成随机数
    public function getAjaxYsku($length = 8){
        $str = substr(md5(time()), 0, $length);//md5加密，time()当前时间戳
        $str = strtoupper($str);
        $ysku='YSKU'.$str;
        $this->ajaxReturn($ysku);
    }

    //ajax获取pid
    public function getAjaxPid(){
        $pid=$_POST['pid'];
        $this->ajaxReturn($pid);
    }

    //导入订单历史 sequence
    public function importHistory()
    {
        $platform_id_val=$_GET['platform'];
        $account_id=$order_map['ac_id']=$_GET['platform_id'];//外部账号 id
        if ($account_id!=null){
        $list=M('order_sequence')->where($order_map)->order('id desc')->select();
        }else{
            $list=null;
        }
        $this->assign('list',$list);
        $this->assign('platform_id_val',$account_id);
        $this->assign('platform_val',$platform_id_val);
        $this->display();
    }
    //按照导入次序查看订单
    public function importlist(){
        $data["order_customer.import_sequence"]=$_GET['id'];//导入的序列号
        $data['order_customer.platform_id'] = $_GET['acid'];//外部平台->账号 -id
        $status_id = $_GET['status_id'];//状态
        $screen = $_GET['screen'];//筛选条件
        $rout = trim($_GET['rout']);//搜索内容
        if (!empty($status_id)AND $status_id==9){ //如果状态不为空并且是状态为问题订单就查询状态为8，9
            $status_arr = array(8,9);
            $data['order_customer.status_id']=array('in',$status_arr);
        }
        if($screen){
            $data["order_customer.$screen"]=array('eq',$rout);
        }
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=100;
        }
        //查询平台账户
        $map['platform_account.id'] = $_GET['acid'];
        $map['platform_account.status'] = 1;
        $map['platform.status'] = 1;
        $account = M('platform_account')
                ->where($map)
                ->field('platform_account.account_number,platform.name')
                ->join('LEFT JOIN platform ON platform_account.platform_id = platform.id')
                ->find();
        $orders=new Order_customerModel();
        //判断有一个不为空 才显示
        $order=new Pl_account_userModel();
        $number=$order->platform_acc();//查询用户下的账号 todo
        $list=$orders->importOrder($data,$pagen);

        //统计订单,各种状态统计 todo 状态
        $problem=array_column($list['list'],'processing_status');
        $problem=array_count_values($problem);
        //统计收货区域
        $country=array_column($list['list'],'country');
        $countryGP=array_count_values($country);

        $this->assign('acid',$data['order_customer.platform_id']);//外部平台->账号 -id
        $this->assign('id', $data["order_customer.import_sequence"]);//导入的序列号
        $this->assign('number',$number);//平台下的账号 todo
        $this->assign('platformaccount',$account['name']);//平台名称
        $this->assign('platform',$account['account_number']);//平台下的账号
        $this->assign('list',$list['list']); //订单产品
        $this->assign('page',$list['page']);//分页
        //$this->assign('status',$status_id);//订单状态
        $this->assign('pagen',$pagen);//分页选项
        $this->assign('count',$list['count']);//数量
        $this->assign('status',$status_id);
        $this->assign('screen',$screen);
        $this->assign('screenvalue',$rout);
        $this->assign('problem',$problem);
        $this->assign('countryGP',$countryGP);
        $this->display();


    }
    //取消订单
    public function cancelOrder(){
        $type = I('post.type');
        switch ($type){
            case 1:
                $status_arr = array(1,2,3,8,9);
                $map['id'] = I('post.id');
                $map['status'] = 1;
                $map['status_id'] = array('in',$status_arr);
                $data['status'] = 2;
                $info = M('order_customer')->where($map)->data($data)->save();
                break;
            case 2:
                $status_arr = array(1,2,3,8,9);
                $map['id'] = array('in',I('post.id'));
                $map['status'] = 1;
                $map['status_id'] = array('in',$status_arr);
                $data['status'] = 2;
                $info = M('order_customer')->where($map)->save($data);
        }
        $this->ajaxReturn($info);
    }
    //按照导入次序删除订单
    public function delImportorder(){
        $map['order_sequence.id'] = I('post.id');
        $map['order_customer.import_sequence'] = I('post.id');
//        $map['order_customer.status'] = 1;
        //查询次序表下的订单
        $list = M('order_sequence')
            ->where($map)
            ->field('order_customer.id as id')
            ->join('LEFT JOIN order_customer ON order_sequence.ac_id = order_customer.platform_id')
            ->select();
        //如果查询次序表下的订单不为空就执行删除销售订单
        if (!empty($list)){
            foreach ($list as $k=>$v){
                $order_customerid[] = $v['id'];
            }
                $status_arr = array(1,2,3,8,9);
                $mat['id'] = array('in',$order_customerid);
//                $mat['status'] = 1;
                $mat['status_id'] = array('in',$status_arr);
                $info = M('order_customer')->where($mat)->delete();
            //如果成功删除销售订单等于全部订单就执行删除该历史订单
            if ($info==count($order_customerid)){
                $maw['id'] = I('post.id');
                $out = M('order_sequence')->where($maw)->delete();
            }
            $count['branch'] = $info;//统计成功删除订单的条数
            $count['surplus'] = count($list)-(int)$info;//统计剩余订单
        }
        $this->ajaxReturn($count);
    }



    //asin报警
    public function callthePolice(){
        $platform_id_val=$_GET['platform']; //平台
        $account_id=$map['account_id']=$_GET['platform_id'];//外部账号 id
        //sql聚合分组查询asin重复次数大于2或等于2
        $sql = "SELECT asin FROM asin_sku WHERE status=1 GROUP BY  asin HAVING count(1) >= 2 ";
        $result = M()->query($sql);
        if ($result){
            foreach ($result as $k=>$v){
                $asin[] = $v['asin'];
            }
            $map['asin'] = array('in',$asin);
            $asin = new Asin_skuModel();
            $list = $asin->asinCallthepolice($map);
            $this->assign('list',$list);
        }

        $this->assign('platform_id_val',$account_id);
        $this->assign('platform_val',$platform_id_val);
        $this->display();
    }



    //产品在各个国家的总销量和订单量
    public function saleStatistics(){
        $map['order_customer.status']=1;
        $map['order_customer_bom.status']=1;
        $id=$_GET['pid'];   //获取产品id
        $map['order_customer_bom.pid']=$id;
        $cid['status']=1;   //国家状态为1
        $area=M('country_regions')->where($cid)->select();   //查询出所有的国际和地区
        $reg=array_column($area,'area');    //获取地区信息转换为一维数组
        $map['country']=array('in',$reg);  //拼接所有需要查询的地区条件带入sql
        $order=new ProductModel();
        $where['product.id']=$id;
        $info=$order->productInfo($where);   //获取查询的产品信息
        $order_bom=new Order_customer_bomModel();
        $result=$order_bom->saleStatistics($map);   //获取产品在各国家的信息
        $list=array();
        $i=0;
        foreach($result as $k=>$v){
            if(!isset($list[$v['c_id']])){
                $list[$v['c_id']] = $v;     //第一次循环到的国家存入新的数组
            }else{
                $list[$v['c_id']]['number'] += $v['number'];   //相同的国家产品数量相加
            }
            if(!isset($list[$v['o_id']])){     //根据订单号不同
                $list[$v['c_id']]['count'] = ++$i;     //相同的国家订单数量加1
            }
        }
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->display();
    }

    //产品订单管理
    public function manageOrder(){
        $map['product.status']=1;
        $map['order_customer.status']=1;
        $map['order_customer_bom.status']=1;
        $id=$_GET['pid'];
        $map['product.id']=$id;
        $area['countryus']=trim($_GET['country']);  //获取国家
        if(!empty($area['countryus'])){
            $regions=new Country_regionsModel();
            $region=$regions->country_area($area);  //根据国家查询出所有包含的地区
            $reg=array_column($region,'area');
            $map['country']=array('in',$reg);  //拼接所有需要查询的地区条件带入sql
        }else{
            $map['country']="";
        }
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=500;
        }
        $order=new ProductModel();
        $where['product.id']=$id;
        $info=$order->productInfo($where);
        $list=$order->productOrder($map,$pagen);
        $orderjson=json_encode($list['list']);
        $this->assign('orderjson',$orderjson);
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->assign('pagen',$pagen);
        $this->assign('info',$info);
        $this->assign('country',$area['countryus']);
        $this->display();
    }
    //销售数据显示
    public function salesdata()
    {
        $this->display();
    }
    //销售数据添加
    public function salesadd()
    {
        $this->display();
    }
    //拍照
    public function photograph()
    {
        $this->display('photograph');
    }

    //补单页面
    public function replacementOrder(){
        $id=$_GET['id'];
        $map['order_customer.id']=$id;
        $user = new \Home\Model\Order_customerModel();
        $log=new Order_customer_logModel();
        $status_ex=new Status_exModel();
        $type['table']="order_supplement";
        $cause=$status_ex->cause($type);
        $list=$user->orderdetail($map);
        $info=$user->orderdetails($map);
        $process=$log->logs($map);
        $status['status']=1;
        $limit=$_GET['limit'];
        if(empty($limit)){
            $limit=15;
        }
        $title=$info['external_title']; //获取标题
        $keywords=M('keywords')->where($status)->field('name')->select();  //查询关键词库
        $pid=array_column($list,'pid');   //返回数组中指定的一列
        $pid=implode(',',$pid);
        if(!empty($pid)){
            for ($i=0;$i<count($pid);$i++) {
                $out = 'product.id NOT IN '. "(".$pid.")" . " AND ";  //筛除已选定的产品
            }
        }
        $condition=$out;
        $title_keywords="";
        $lind=1;
        foreach ($keywords as $key =>$value){
            $iff=stristr($title,$value['name']);  //搜索关键词是否能再标题中找到(不区分大小写)
            if ($iff){
                if ( (count($keywords,0)!=null) AND  ($lind!=1) ){
                    $condition=$condition." AND ";
                }
                $lind=2;
                $condition=$condition.'product.namezh like "%'.$value['name'].'%"';
                $title_keywords=$title_keywords." ".$value['name'];
            }
        }
        if(empty($title_keywords)){
            $condition=$condition.'product.status = "1"';
        }else{
            $condition=$condition.' AND product.status = "1"';
        }
        $productList=new ProductModel();
        $product = $productList->productPageList($condition,$limit);
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('keywords',$title_keywords); //关键词
        $this->assign('product',$product);  //产品
        $this->assign('cause',$cause);  //补单原因
        $this->assign('process',$process);
        $this->display();
    }

    //补单跳转
    public function replacement(){
        $id=$_GET['id'];
        $map['order_customer.id']=$id;
        $user = new \Home\Model\Order_customerModel();
        $info=$user->orderdetails($map);
        $list=$user->orderdetail($map);
        $data['type']="supp"; //类型为补单
        $data['import_sequence']=$info['import_sequence'];
        $data['platform_id']=$info['platform_id'];  //外部平台账号id
        $data['external_sn']=$info['external_sn'];  //外部订单号
        $data['status_id']=22;  //订单状态：补单未提交
        $data['fullname']=$info['recipient_first_name'];  //收件人姓名
        $data['buyer_phone']=$info['buyer_phone'];  //收件人电话
        $data['buyer_email']=$info['buyer_email'];  //收件人邮箱
        $data['country']=$info['country'];  //国家
        $data['state']=$info['state'];  //省或州
        $data['city']=$info['city'];  //市
        $data['zip']=$info['zip'];  //邮编
        $data['street_1']=$info['street_1'];  //地址1
        $data['street_2']=$info['street_2'];  //地址2
        $data['street_3']=$info['street_3'];  //地址3
        $data['ship_level']=$info['ship_level'];  //发货要求
        $data['creation_time']=date("Y-m-d H:i:s");  //生成订单时间
        $order_customer=M('order_customer')->add($data);  //添加
        $ebay['ordercust_id']=$order_customer;  //内部订单号
        $ebay['account_id']=$info['account_id'];  //外部账号
        $ebay['external_sn']=$data['external_sn'];  //外部订单号
        $ebay['external_title']=$info['external_title'];  //外部平台的标题
        $ebay['ebayuserid']=$info['ebayuserid'];  //ebay买家账号
        $ebay['type']=$info['type'];  //ebay买家账号
        $ebay['fullname']=$info['fullname'];  //买家姓名
        $ebay['total_price']=$info['total_price'];  //订单价格
        $ebay['price_unit']=$info['price_unit'];  //订单价格
        $ebay['phone']=$info['phone'];  //电话
        $ebay['email']=$info['email'];  //邮件
        $ebay['create_time']=date("Y-m-d H:i:s");  //时间
        $sku=new SkuModel();
        $asin=$sku->addSku();
        $ebay['var']="replacement_order".$asin;    //生成新的sku
        $ebay['number']=$info['sku_number'];  //sku数量
        $ebay_order=M('ebay_order')->add($ebay);
        $supplement['order_id']=$order_customer;  //新订单号
        $supplement['f_order_id']=$id;  //原订单号
        $supplement['type']=1;   //补单类型
        $supplement['describe']="";  //说明原因
        $supplement['uid']=$_SESSION['user_info']['uid'];
        $supplement['c_time']=date("Y-m-d H:i:s");
        $order_supplement=M('order_supplement')->add($supplement);  //补单信息
        for($i=0;$i<count($list);$i++){
            $bom['asin']=$ebay['var'];
            $bom['type']=1;
            $bom['pid']=$list[$i]['pid'];
            $bom['number']=$list[$i]['number'];
            $bom['price']=$list[$i]['price'];
            $bom['time']=date('Y-m-d H:i:s');
            $bom['uid']=$_SESSION['user_info']['uid'];
            M('order_customer_bom')->add($bom);
        }
        $log['o_id']=$id;
        $log['textzh']="由订单".$id."生成补单".$order_customer;
        $log['textus']="By the orders".$id."Generated to fill a single".$order_customer;
        $log['variable']="$order_customer";
        $addlog=new Order_customer_logModel();
        $addlog->addlogs($log);
        $logs['o_id']=$order_customer;
        $log['textzh']="由订单".$id."生成补单".$order_customer;
        $log['textus']="By the orders".$id."Generated to fill a single".$order_customer;
        $log['variable']="$id";
        $addlog->addlogs($logs);
        $this->redirect('Order/replacementOrder', array('id' => $order_customer));
    }

    //补单添加关联产品
    public function addLink(){
        $data['asin']=$_POST['sku'];  //接收sku
        $data['type']=1;  //接收sku
        //$id=$_POST['id'];
        $data['pid']=$_POST['supplier_pr_id'];
        $data['number']=$_POST['num'];
        $bom=new Order_customer_bomModel();
        $result=$bom->addProduct($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //补单多选添加关联产品
    public function addAllLink(){
        $asin=$_POST['sku'];  //接收sku
        //$id=$_POST['id'];
        $map=$_POST['supplier_pr_id'];
        $number=$_POST['num'];
        $count=count($map);
        $bom=new Order_customer_bomModel();
        for($i=0;$i<$count;$i++){
            $data['asin']=$asin;
            $data['pid']=$map[$i];
            $data['type']='1';
            $data['number']=$number[$i];
            $result[]=$bom->addProduct($data);
        }
        if(count($result)==$count){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //提交补单
    public function applyNow(){
        $oid=$_POST['id'];
        $map['id']=$oid;
        $data['status_id']=20;  //订单状态：补单未审批
        $data['fullname']=$_POST['recipient_first_name'];  //收件人姓名
        $data['buyer_phone']=$_POST['buyer_phone'];  //收件人电话
        $data['buyer_email']=$_POST['buyer_eamil'];  //收件人邮箱
        $data['country']=$_POST['country'];  //国家
        $data['state']=$_POST['state'];  //省或州
        $data['city']=$_POST['city'];  //市
        $data['zip']=$_POST['zip'];  //邮编
        $data['street_1']=$_POST['street_1'];  //地址1
        $data['street_2']=$_POST['street_2'];  //地址2
        $data['street_3']=$_POST['street_3'];  //地址3
        $data['ship_level']=$_POST['ship_level'];  //发货要求
        $data['creation_time']=date("Y-m-d H:i:s");  //生成订单时间
        $order_customer=M('order_customer')->where($map)->save($data);  //修改保存
        $supplement['type']=$_POST['type'];   //补单原因
        $supplement['describe']=$_POST['describe'];  //其他原因
        $supplement['uid']=$_SESSION['user_info']['uid'];
        $supplement['c_time']=date("Y-m-d H:i:s");
        $order_supplement=M('order_supplement')->add($supplement);  //补单信息
        $status['table']="order_supplement";
        $status['val']=$supplement['type'];
        $cause=M('status_ex')->where($status)->find();
        $log['o_id']=$oid;
        $log['textzh']="补单原因:".$cause['name']."描述:".$supplement['describe'];
        $log['textus']="For single reason:".$cause['name']."describe:".$supplement['describe'];
        $log['variable']="";
        $addlog=new Order_customer_logModel();
        $logs=$addlog->addlogs($log);  //添加日志
        if($order_customer && $order_supplement && $logs){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //审批补单页面
    public function approvalPatch(){
        $map['order_customer.status']=1;
        $map['status_ex.table']="order_supplement";
        $reason=$_GET['value'];
        if($reason != ""){
            $map['val']=$reason;
        }
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=10;
        }
        $status_ex=new Status_exModel();
        $type['table']="order_supplement";
        $cause=$status_ex->cause($type);
        $orders=new Order_customerModel();
        $list=$orders->approval($map,$pagen);
        $this->assign('list',$list['list']); //订单产品
        $this->assign('page',$list['page']);//分页
        $this->assign('pagen',$pagen);//分页选项
        $this->assign('cause',$cause);//补单原因列表
        $this->assign('reason',$reason);//补单原因
        $this->display();
    }

    //同意补单
    public function consentOrder(){
        $oid=$_POST['oid'];
        $map['id']=$oid;
        $data['status_id']=3;
        $result=M('order_customer')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //拒绝补单
    public function rejectOrder(){
        $oid=$_POST['oid'];
        $map['id']=$oid;
        $data['status_id']=21;
        $result=M('order_customer')->where($map)->save($data);
        if($result){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //补单详情
    public function replacementDetail(){
        $data['ebay_order.ordercust_id']=$_POST['oid'];
        $detail=new Ebay_orderModel();
        $result=$detail->details($data);
        $this->ajaxReturn($result);
    }
}