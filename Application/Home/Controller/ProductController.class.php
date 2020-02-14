<?php
namespace Home\Controller;
use Home\Model\ImglineModel;
use Home\Model\KeywordsModel;
use Home\Model\ProductModel;
use Think\Controller;
class ProductController extends CommonController
{
    //TWO 产品列表
    public function index()
    {
//        U('imgindex');
        //$search=urldecode(trim($_GET['search']));
        $search=trim($_GET['search']);
        $_GET['search']=$search=$search;
        $pagenum=$_GET['pagenum'];
        $order=$_GET['order'];
        if (empty($pagenum))
        {
            $pagenum=20;
        }
        if (empty($order))
        {
            $order='product.bclass,product.sclass,product.number';
        }
        if (!empty($search))
        {
            $map['product.namezh|bclassc.number|sclassc.number|product.number'] = array('like', "%" .$search. "%", 'or');
        }
        $list=D('product')->listProduct($map,$order,$pagenum);
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->display();
    }
    // TWO 添加产品
    public function addAjaxProduct()
    {
        $map['status']='1';
        $map['sclass']=$_POST['sclass'];
        //$max1=M('product')->fetchSql(true)->where($map)->max('number');
        $max=M('product')->where($map)->max('number');//查询最大的 number
        if ($max==null){$max=0;}//如果查询不到就设置为0;
        $max=(int)$max+1;//number 自增number
        $data['sclass']=$_POST['sclass'];
        $data['bclass']=$_POST['bclass'];
        $data['namezh']=trim($_POST['name']);
        $shortname=trim($_POST['shortname']);
        if (strlen($shortname)>16)
        {
            $this->ajaxReturn("no");
        }
        $data['shortname']=$shortname;
        $data['status']='1';
        $data['number']=$max;
        $data['create_time']=date("Y-m-d H:i:s",time());
        $data['weight']=(int)$_POST['weight'];
        //长宽高
        $data['long']=(int)$_POST['long'];
        $data['weight']=(int)$_POST['weight'];
        $data['height']=(int)$_POST['height'];
        //获取操作用户id
        $data['uid']=(int)$_SESSION['user_info']['uid'];
        $keywords_id=$_POST['keywords_id'];
        $keywords=implode($keywords_id,',');
        $data['keywords_id']=",".$keywords.",";
        $product=D('product')->addProduct($data);
        if($product){
            $result='1';
        }else{
            $result='0';
        }
        $this->ajaxReturn($result);
    }
    //查询重复的名字
    //  产品简称 重复检测
    public function productshortname()
    {
        $where['shortname']=$_POST['name'];
        $where['status']='1';
        $id=M('product')->where($where)->getField('id');
        if ($id){
            $result='no';
        }else{
            $result='can';
        }
        $this->ajaxReturn($result);
    }
    //  产品名 重复检测
    public function productname()
    {
        $where['namezh']=$_POST['name'];
        $where['status']='1';
        $id=M('product')->where($where)->getField('id');
        if ($id){
            //有重复
            $result='no';
        }else{
            //没有重复 可以录入
            $result='can';
        }
        $this->ajaxReturn($result);
    }
    //TWO 获取所有的一级编码
    public function getAjaxclassone()
    {
        $map['status']='1';
        $map['level']=0;
        $list=M('classify')->field('id,number,nameus')->where($map)->order('number')->select();
        $this->ajaxReturn($list);
    }
    //TWO 获取所有的二级编码
    public function getAjaxclasstwo($superior)
    {
        $map['status']='1';
        $map['level']=1;
        $map['superior']=$superior;
        $list=M('classify')->field('id,number,nameus')->where($map)->order('number desc')->select();
        $this->ajaxReturn($list);
    }
    //TWO 产品主页 产品信息和扩展信息
    public function homeProduct($turn=false)
    {
        $map['pid']=(int)$_GET['pid'];//产品id
        if ($turn!==false)
        {
            $map['pid']=(int)$turn;
        }
        $map['status']='1';
        //获取产品扩展信息
        $list=M()->table('productExtended')->where($map)->select();
        $mapx['product.id']=$map['pid'];
        $mapx['product.status']='1';
        //获取单个产品信息
        $info=M('product')
            ->field('
            product.id as pid,
            product.namezh as name,
            product.thumb as thumb,
            one.number as onenumber, 
            two.number as twonumber,
            product.number as number,
            product.keywords_id
            ')
            ->where($mapx)
            ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
            ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
            ->find();
        //获取用户查看库存权限
        $pow['uid'] = $_SESSION['user_info']['uid'];
        $pow['method'] = 'stock_get';
        $powerStr= M('warehouse_power')->where($pow)->field('range')->find();
        $powArr = explode(",",$powerStr['range']);
        $trem['id'] = array('in',$powArr);
        $trem['status'] = 1;
        $kulist= M('warehouse')->where($trem)->field('id,name')->select();
        $mop['supplier_product.pid']=$map['pid'];
        //查询供应商
        $supperlist = M('supplier_product')
                ->where($mop)
                ->field('supplier.id,supplier.name')
                ->join('LEFT JOIN supplier ON supplier_product.supplier_id=supplier.id')
                ->select();
        $this->assign('supperlist',$supperlist);
        $this->assign('kulist',$kulist);
        $this->assign('list',$list);
        $this->assign('info',$info);//缩略图 名字 等信息
        $this->display('homeProduct');
    }
    //TWO 产品主页 产品信息获取 ajax
    public function getInfoProduct()
    {
        $map['product.id']=$_POST['pid'];
        $map['product.status']='1';
        $list=M('product')
            ->field('product.namezh as name,
            product.shortname as shortname,
            product.weight as weight,
            product.bclass as bclassid,
            product.sclass as sclassid,
            one.number as onenumber, 
            one.namezh as onename, 
            two.number as twonumber,
            two.namezh as twoname,
            product.number as number,
            product.width as width,
            product.height as height,
            product.long as extent,
            product.keywords_id
            ')
            ->where($map)
            ->join('LEFT JOIN classify as one ON product.bclass=one.id')//一级编码
            ->join('LEFT JOIN classify as two ON product.sclass=two.id')//二级编码
            ->find();
        /*$kid['pid']=$map['product.id'];
        $keywords_id=M('product_keywords')->field('id,pid,keywords_id')->where($kid)->find();
        $k_id=explode(',',$keywords_id['keywords_id']);
        $keyword['id']=array('in',$k_id);
        $list['keywords']=M('keywords')->field('id,name')->where($keyword)->select();*/
        $this->ajaxReturn($list);
    }
    //TWO 保存产品信息 修改产品信息
    public function saveInfoProduct()
    {
        $data['uid']=$_SESSION['user_info']['uid'];
//        $data['sclass']=$_POST['sclass'];
//        $data['bclass']=$_POST['bclass'];
        $map['id']=$_POST['pid'];
        $data['namezh']=trim($_POST['name']);
        $data['weight']=$_POST['weight'];
        $data['long']=$_POST['long'];
        $data['width']=$_POST['width'];
        $data['height']=$_POST['height'];
        $data['shortname']=trim($_POST['shortname']);
//        $data['number']=(int)$_POST['xnumber'];
        $keywords_id=$_POST['keywords_id'];
        $keywords=implode($keywords_id,',');
        $data['keywords_id']=",".$keywords.",";
        $product=M('product')->where($map)->data($data)->save();
        if($product){  //如果$product修改 结果为1
            $result='1';
        }else{
            if($product===0){  //如果未修改提交  结果为1
                $result='1';
            }else{
                $result='0';
            }
        }
        $this->ajaxReturn($result);
    }
    //TWO 添加产品 扩展 信息
    public function addProductExpansion()
    {
        $pid=$_POST['pid'];
        $data=array();
        $list=$_POST['list'];
        foreach ($list as $key=>$value)
        {
            $data[$key]['name']=$value['name'];
            $data[$key]['value']=$value['value'];
            $data[$key]['pid']=$pid;
            $data[$key]['status']='1';
            $data[$key]['creationtime']=date("Y-m-d H:i:s",time());
        }
        $result=M()->table('productExtended')->addAll($data);
        $this->ajaxReturn($result);
    }
    //TWO 修改 一条 产品 扩展 信息
    public function saveProductExpansion()
    {
        $map['id']=$_POST['id'];
        $data['value']=$_POST['value'];
        $result=M()->table('productExtended')->where($map)->save($data);
        $this->ajaxReturn($result);
    }

    //TWO 获取产品 技术参数名
    public function getAjaxProductParameter()
    {
        $map['status']='1';
        $result=M()->table('productExtended')->field('id,name')->where($map)->groug('name')->select();
        $this->ajaxReturn($result);
    }
    //TWO 删除 产品 扩展 参数
    public function dellProductExpansion()
    {
        $map['id']=(int)$_POST['id'];
        $data['status']='2';
        $result=M()->table('productExtended')->where($map)->save($data);
        $this->ajaxReturn($result);
    }
    //TWO 图片页 产品下的图片页
    public function img()
    {
        $fid=$mapp['id']=$map['imgline.fid']=$_REQUEST['pid'];
        $map['imgline.status']='1';
        $map['img.status']='1';
        $map['imgline.type']="product";
        $productlist=D('imgline')->listimg($map);//查询 产品下的 所有图片
        $product=M('product')->where($mapp)->find();//查询产品的 二级目录和一级目录的id
        $map['imgline.fid']=$product['sclass'];
        $map['imgline.type']="sclass";
        $sclasslist=D('imgline')->listimg($map);//查询二级分类的图片
        $map['imgline.fid']=$product['bclass'];
        $map['imgline.type']="bclass";
        $bclasslist=D('imgline')->listimg($map);//查询二级分类的图片
        $this->assign('sclasslist',$sclasslist);
        $this->assign('bclasslist',$bclasslist);
        $this->assign('productlist',$productlist);
        //服务器地址
        $serverAddress=gethostbyname($_SERVER['SERVER_NAME']).":".$_SERVER['SERVER_PORT'];
        $this->assign('dizhi',$serverAddress);//服务器地址
        $this->assign('fid',$fid);//pid
        $this->display();
    }
    // TWO 上传图片显示页
    public function imgindex()
    {
        $fid=$mapp['id']=$map['imgline.fid']=$_REQUEST['pid'];
        $conditionProduct['product.id']=(int)$_REQUEST['pid'];
        $conditionProduct['product.status']='1';
        //$conditionProduct['classify.status']=1;
        //查询,本pid的信息
        $productInufo=M('product')->where($conditionProduct)
            ->field('
            product.id,
            product.number,
            bclassbiao.number as bclass,
            sclassbiao.number as sclass,
            product.namezh,
            product.nameus,
            product.shortname            
            ')
            ->join( 'LEFT JOIN classify as bclassbiao ON product.bclass = bclassbiao.id')
            ->join( 'LEFT JOIN classify as sclassbiao ON product.sclass = sclassbiao.id')
            ->find();
        $map['img.status']='1';
        $map['imgline.type']="product";
        $productlist=D('imgline')->listimg($map);//查询 产品下的 所有图片
        $product=M('product')->where($mapp)->find();//查询产品的 二级目录和一级目录的id

        $map['imgline.fid']=$product['sclass'];
        $map['imgline.type']="sclass";
        $sclasslist=D('imgline')->listimg($map);//查询二级分类的图片
        $map['imgline.fid']=$product['bclass'];
        $map['imgline.type']="bclass";
        $bclasslist=D('imgline')->listimg($map);//查询一级分类的图片
        $this->assign('sclasslist',$sclasslist);
        $this->assign('bclasslist',$bclasslist);
        $this->assign('productlist',$productlist);
        //服务器地址
        $serverAddress=gethostbyname($_SERVER['SERVER_NAME']).":".$_SERVER['SERVER_PORT'];
        $this->assign('productInufo',$productInufo);//产品信息
        $this->assign('dizhi',$serverAddress);//服务器地址
        $this->assign('fid',$fid);//pid
        $this->display();
    }
    // 上传图片 废弃 有 todo 修改
    public function imgup()
    {
        $upload=new\Think\Upload();// 实例化上传类
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath=''; // 设置附件上传目录
        $upload->autoSub=true;//子目录 设置
        $upload->subName  =array('date','Ymd'); //子目录为当前日期
        $upload->rootPath='./Public/imgup/';//上传的路径在 根目录下的public/imgup
        $info=$upload->upload();//上传
        if (!$info)
        {
            $this->error($upload->getError());// 上传错误提示错误信息
        }
        else{
            //地址
            $imgdata['type']=$_POST['type'];//上级类型
            $imgdata['status']='1';//
            $imgdata['filename']=$info['file']['savename'];//保存文件名
            $imgdata['path']=__ROOT__."/Public/imgup/".$info['file']['savepath'];
            $imgdata['creationtime']=date("Y-m-d H:i:s",time());//创建时间
            $imgdata['thumpath']=__ROOT__."/Public/imgup/".$info['file']['savepath'];//缩略路径
            $imgdata['thumfile']="thum".$info['file']['savename'];//缩略文件名
            $image = new \Think\Image();
            $fi='./Public/imgup/'.$info['file']['savepath'].$info['file']['savename'];
            $image->open($fi);//打开原图,进行缩略图
            $save="./Public/imgup/".$info['file']['savepath']."thum".$info['file']['savename'];
            $image->thumb(200, 200)->save($save);//保存缩略图
            $resultimg=M('img')->data($imgdata)->add();

            if ($resultimg!="")
            {
                $imglinedata['imgid']=(int)$resultimg;//图片id
                $fid=$_POST['getfid'];//父级id,可能是产品id 也可能是 二级编码的id 或者一级编码的id
                $pdata=M('product')->where('id='.$fid)->find();//根据产品id查询结果
                if ($_POST['type']=='bclass'){$imglinedata['fid']=$pdata['bclass'];}//如果添加的类型
                if ($_POST['type']=='sclass'){$imglinedata['fid']=$pdata['sclass'];}
                if ($_POST['type']=='product'){$imglinedata['fid']=$pdata['id'];}
                $imglinedata['status']='1';
                $imglinedata['type']=$_POST['type'];
                $imglinedata['creationtime']=date("Y-m-d H:i:s",time());
                $ru=M('imgline')->data($imglinedata)->add();
                $ru=0;
                $this->ajaxReturn($ru);
            }
            $resultimg=1;
            $this->ajaxReturn($resultimg);
        }

    }
    // 接收图片 1.2
    public function imgupp()
    {
//        $text['name']='getfi'; 测试
//        $text['val']=$_POST['getfid'];
//        M('text')->add($text);
        $type=$imgdata['type']="product";
        if (!empty($_POST['type']))
        {
            $type=$imgdata['type']=$_POST['type'];
        }
        if (empty($_POST['getfid']))
        {
            $this->ajaxReturn('NO');
        }
        $fid=$_POST['getfid'];//父级id,可能是产品id 也可能是 二级编码的id 或者一级编码的id
        $upload=new \Think\Upload();// 实例化上传类
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath=''; // 设置附件上传目录
        $upload->autoSub=true;//子目录 设置
        $upload->subName  =array('date','Ymd'); //子目录为当前日期
        $upload->rootPath='./Public/imgup/';//上传的路径在 根目录下的public/imgup
        $info=$upload->upload();//上传
        $imgdata['status']='1';//
        $imgdata['filename']=$info['file']['savename'];//保存文件名
        $imgdata['path']="/Public/imgup/".$info['file']['savepath'];
        $imgdata['creationtime']=date("Y-m-d H:i:s",time());//创建时间
        $imgdata['thumpath']="/Public/imgup/".$info['file']['savepath'];//缩略路径
        $imgdata['thumfile']="thum".$info['file']['savename'];//缩略文件名
        $image = new \Think\Image();
        $fi='./Public/imgup/'.$info['file']['savepath'].$info['file']['savename'];
        $image->open($fi);//打开原图,进行缩略图
        $save="./Public/imgup/".$info['file']['savepath']."thum".$info['file']['savename'];
        $image->thumb(200, 200)->save($save);//保存缩略图
        $resultimg=M('img')->data($imgdata)->add();
        //如果添加图片成功
        if ($resultimg!="")
        {

            $imglinedata['imgid']=(int)$resultimg;//图片id


            $pdata=M('product')->where('id='.$fid)->find();//根据产品id查询结果
            if ($type=='bclass'){$imglinedata['fid']=$pdata['bclass'];}//如果添加的类型
            if ($type=='sclass'){$imglinedata['fid']=$pdata['sclass'];}
            if ($type=='product'){$imglinedata['fid']=$pdata['id'];}
            $imglinedata['status']='1';
            $imglinedata['type']=$type;
            $imglinedata['creationtime']=date("Y-m-d H:i:s",time());
            $ru=M('imgline')->data($imglinedata)->add();
            $this->ajaxReturn($ru);
            exit();
        }
        $this->ajaxReturn($info);
    }

    //TWO 产品主图缩略图 页面
    public function productthm()
    {
        $pid=$_REQUEST['pid'];
        $this->assign('pid',$pid);
        $this->display();
    }
    //TWO 产品主图缩略图 接收 上传，保存
    public function productthmup()
    {
        $pid=$_REQUEST['pid'];
        $upload=new\Think\Upload();// 实例化上传类
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath=''; // 设置附件上传目录
        $upload->autoSub=false;//子目录 设置
        $upload->rootPath='./Public/img/productthum/';//上传的路径在 根目录下的publice/imgup
        $info   =   $upload->upload();//上传
        if (!$info)
        {
            $this->error($upload->getError());// 上传错误提示错误信息
        }
        else{
            $map['id']=$pid;
            $data['thumb']='/Public/img/productthum/'.$info['pic1']['savename'];
            $data['thumb'];
            $image = new \Think\Image();
            $xurl=".".$data['thumb'];//文件路径
            $image->open($xurl);
            $image->thumb(150, 150)->save($xurl);
            $result=M('product')->where($map)->data($data)->save();
            $this->homeProduct($pid);
        }
    }
    public function image($pid=0)
    {
        if ($pid<1)
        {
            $this->success('错误','index');
        }
        $this->assign('imgpid',$pid);
        $this->display('image');
    }
    public function getProductid(){
        $getProductid= $_POST;
        $id= M('product')->where($getProductid)->find();
        $this->ajaxReturn($id);
    }
    //单品的删除
    public function del()
    {
        $need['id']=$_POST['delid'];
        $success=D('product')->where($need)->data('state=0')->save();
        if ($success==1)
        {
            $this->success('删除成功','index');
        }
        else{
            $this->success('删除失败','index');
        }
    }
    //获取单品的下级分类
    public function getclassAjax()
    {
        $class=$_POST;
        $class['level']=1;
        $class['state']=1;
        $d=D('classify')->where($class)->select();
        return $this->ajaxReturn($d);
    }

    public function selecttemplate(){
        $a=$_GET['aid'];
        $this->display($a);
    }
    /**
     *模板管理
     *
     * */
    public function template()
    {
        $like=$_POST['name'];

        $number['uid']=$_SESSION['user_info']['uid'];
        if($like != null){
            $number['number']= array('like','%'. $like . "%");

        }
        $data = D('html')->getHtml($number);
        $this->assign('data', $data['list']);
        $this->assign('page', $data["page"]);
        $this->display();
    }

    /**获取模板信息
     *
     * 获取模板信息*/
    public function gethtml(){

        $htmldata=$_POST;
        $htmldata['uid']=$_SESSION['user_info']['uid'];
        M('html')->add($htmldata);
        $this->success('添加成功','template');
    }
    public function separate(){
        $separatedata['id']=$_POST['id'];
        $data=M('html')->where($separatedata)->find();
        $this->ajaxReturn($data);


    }
    //增加修改一级分类
    public function addclass(){

        if(empty($_REQUEST['id'])){
            $class['namezh']=trim($_POST['namezh']);
            $class['nameus']=trim($_POST['nameus']);
            $class['number']=$_POST['number'];
            $class['level']='0';
            $class['state']='1';
            $class['ctime']=date("Y-m-d H:i:s",time());
            $map['number'] = $_POST['number'];
            $map['level'] = 0;
            $info = M('classify')->where($map)->field('id')->find();
            $map_data['nameus'] = trim($_POST['nameus']);
            $map_data['level']='0';
            $map_data['state']='1';
            $nameus = M('classify')->where($map_data)->field('id')->find();
            if ($nameus['id']){
                $return['info'] = 'us'; //编码英文名称重复
            }elseif (empty($class['nameus']) or empty($class['number']) ){
                $return['info'] = 'ko'; //不能为空
            }elseif($info){
                $return['info'] = 'lo'; //该一级编码已存在
            }elseif(!(empty($class['number']) AND empty($class['nameus'])) AND !$info){
                $data=M('classify')->add($class);
                if ($data){
                    $return['info'] = 'ok';
                }else{
                    $return['info'] = 'no';
                }
            }

        }else{
            $class['id']=$_POST['id'];
            $class['nameus']=trim($_POST['nameus']);
            $class['number']=$_POST['number'];
            $class['level']='0';
            $class['state']='1';
            $class['ctime']=date("Y-m-d H:i:s",time());
            
            $cod['nameus'] = trim($_POST['nameus']);
            $cod['state'] = 1;
            $cod['level'] = 0;

            //sql查询 当前id的 一级编码 信息
            $nod['id']  = $_POST['id'];
            $nod['state'] = 1;
            $nameus = M('classify')->where($nod)->field('nameus,number')->find();
            //判断 jieguo 有 返回 有重复
                //判断 是否有子集 如果有，且更换该了 number ，返回无法更改
            //执行保存

            //sql 查询number 除去当前的id的  以及编码 有没有重复的 jieguo
            $map_repeat['number'] =  $_POST['number'];
            $map_repeat['id'] = array('neq',$class['id']);
            $map_repeat['level'] = 0;
            $map_repeat['state'] = 1;
            $classify_repeat = M('classify')->where($map_repeat)->field('id')->find();

            //sql 查询nameus 除去当前的id的  以及编码 有没有重复的 jieguo
            $map_repeat2['nameus'] = $_POST['nameus'];
            $map_repeat2['id'] = array('neq',$class['id']);
            $map_repeat2['level'] = 0;
            $map_repeat2['state'] = 1;
            $classify_repeat2 = M('classify')->where($map_repeat2)->field('id')->find();

            //查询一级编码子集
            $trem['superior'] = $_POST['id'];
            $trem['state'] = 1;
            $level = M('classify')->where($trem)->field('id')->find();

            if (empty($class['nameus']) or empty( $class['number'])){
                $return['info'] = 'ko';
            }elseif ($classify_repeat['id'] or $classify_repeat2['id']){
                $return['info'] = 'ao';//一级编码或英文名称重复
            }elseif ($level['id'] and $nameus['number']!==$class['number']){
                $return['info'] = 'bo';//该一级编码下有二级编码
            }else{
                $data= M('classify')->save($class);
                if ($data){
                    $return['info'] = 'ok';//保存成功
                }else{
                    $return['info'] = 'no';//保存失败
                }
            }

        }
        $getnumber=M('classify')->where('level=0')->max('number');
        $return['datalist']=$getnumber+1;
        $this->ajaxReturn($return);
    }
    //增加修改二级分类//todo 待删除
    public function addtwoclass(){
        if(empty($_REQUEST['cid'])){
            if(empty($_REQUEST['id'])){
                $number['number']=$_POST['fnumber'];
                $number['level']='0';
                $classid=M('classify')->where($number)->field('id')->find();
                $class['superior']=$classid['id'];
                $class['fnumber']=$_POST['fnumber'];
                $class['nameus']=trim($_POST['nameus']);
                $class['number']=$_POST['number'];
                $class['level']='1';
                $class['state']='1';
                $class['ctime']=date("Y-m-d H:i:s",time());
                $map['number'] = $_POST['number'];
                $map['superior'] = $classid['id'];
                $map['level'] = 1;
                $info = M('classify')->where($map)->field('id')->find();
                $map_data['nameus'] = trim($_POST['nameus']);
                $map_data['level']='1';
                $map_data['state']='1';
                $map_data['superior']=$classid['id'];
                $nameus = M('classify')->where($map_data)->field('id')->find();
                if ($nameus['id']){
                    $return['info'] = 'us'; //编码英文名称重复
                }elseif (empty($class['nameus']) or empty($class['number']) ){
                    $return['info'] = 'ko'; //不能为空
                }elseif($info){
                    $return['info'] = 'lo'; //该一级编码已存在
                }elseif(!(empty($class['number']) AND empty($class['nameus'])) AND !$info){
                    $data=M('classify')->add($class);
                    if ($data){
                        $return['info'] = 'ok';
                    }else{
                        $return['info'] = 'no';
                    }
                }
            }else{
                $class['id']=$_POST['id'];
                $number['number']=$_POST['fnumber'];
                $number['level']='0';
                $classid=M('classify')->where($number)->field('id')->find();
                $class['superior']=$classid['id'];
                //$class['namezh']=$_POST['namezh'];
                $class['nameus']=trim($_POST['nameus']);
                $class['number']=$_POST['number'];
                $class['level']='1';
                $class['state']='1';
                $class['ctime']=date("Y-m-d H:i:s",time());

                $map['superior'] = $classid['id'];
                $map['number'] = $_POST['number'];
                $map['level'] = 1;
                $info = M('classify')->where($map)->field('id')->find();

                $mod['id'] = $_POST['id'];
                $mod['state'] = 1;
                $number = M('classify')->where($mod)->field('number')->find();

                $cod['nameus'] = trim($_POST['nameus']);
                $cod['state'] = 1;
                $cod['level'] = 1;
                $cod['superior'] = $classid['id'];
                $classify_id = M('classify')->where($cod)->field('id')->find();

                $sod['id'] = $_POST['id'];
                $sod['state'] = 1;
                $nameus =  M('classify')->where($sod)->field('nameus')->find();

                if (!$info or  $number['number']== $map['number']){
                    $result = 1;
                }else{
                    $result = 0;
                }
                if ($classify_id['id'] AND $class['nameus']!==$nameus['nameus']){
                    $return['info'] = 'us';//编码英文名称重复
                }elseif (empty($class['number']) || empty($class['nameus'])){
                    $return['info'] = 'ko';//不能为空
                }elseif (!$result){
                    $return['info'] = 'lo';//编码已存在
                }elseif(!(empty($class['number']) AND empty($class['nameus'])) AND $result){
                    $data= M('classify')->save($class);
                    if ($data){
                        $return['info'] = 'ok'; //保存成功
                    }
                }else{
                    $return['info'] = 'no';//保存失败
                }
            }
        }
        $map['superior']=(int)$_POST['cid'];
        $map['level']='1';
        $getnumber=M('classify')->where($map)->max('number');
        $return['datalist']=$getnumber+1;
        $this->ajaxReturn($return);
    }
    //添加 二级编码
    public function addSecondaryCode()
    {
        $where['nameus']=$data['nameus']=$_POST['nameus'];
        $data['number']=$_POST['number'];
        $data['level']=1;
        $data['superior']=$_POST['id'];
        $data['state']=1;
        $data['ctime']=date("Y-m-d H:i:s",time());
        //检查不能 必要项的值不能为空
        if(empty($data['number']) and empty($data['nameus']))
        {
            $return['info'] = 'ko'; //不能为空
            $this->ajaxReturn($return);
            exit();
        }
        //验证名称是否重复;
        $where['state']=1;
        //检查是否有重复的名字
        $jieguo=M('classify')->where($where)->find();
        if ($jieguo['id']!=null)
        {
            $return['info'] = 'us';
            $this->ajaxReturn($return); //编码英文名称重复 todo 修改提示
            exit();
        }
        $return=M('classify')->data($data)->add();
        if ($return['id']>0)//判断添加结果,不为空则是成功过
        {
            $return['info']='ok';
            $this->ajaxReturn($return);
        }
    }
    //判断 无下属编码,删除一级编码或者二级编码 todo
    public function dellSecondaryCode()
    {
        $where['id']=$_POST['id'];
        $where['state']=1;
        $codeInfo=M('classify')->where($where)->select();//查询此id的级别;
        //查询此id下是否有下属编码;删除一级编码需要查询classify 表
        if ($codeInfo['level']==0){
            //组织查询条件
            $where_judge['state']=1;
            $where_judge['superior']=$_POST['id'];
            //一级编码查询 classify
            $query=M('classify')->where($where_judge)->select();
        }else{//删除二级编码需要查询  product 表
            $where_judge['sclass']=$_POST['id'];
            //二级编码 查询
            $query=M('product')->where($where_judge)->select();
        }

        //判断查询结果如果为空,则该二级编码没下级编码可以删除
        if ($query[0]['id']==null)
        {
            //执行删除
            $return=M('classify')->where($where)->delete();
        }else{
            $return='failure';
        }
        $this->ajaxReturn($return);
    }


    //添加商品页面 暂时不用
    public function sonadd(){
        if($_POST['superior']=="eat"){
            $this->error('请选择父类','add');
        }
        $class=$_POST;
        $class['level']='1';
        $class['ctime']=date("Y-m-d H:i:s",time());
        $class['state']='1';
        M('classify')->add($class);
        $this->success('添加成功','add');

    }
    //添加商品页面 暂时不用
    public function addProduct(){
        $addPr = $_POST;
        array_shift($addPr);
        $addPrdata= str_replace(array('http'),'https',$addPr);
        // $product['number']=$_POST['number'];
        $i = 0;
        foreach ($addPrdata as $k => $v) {
            $product[$i]['name'] = $k;
            $product[$i]['val'] = $v;
            $product[$i]['uid']=$_SESSION['user_info']['uid'];
            $product[$i]['number']=$_POST['number'];
            $i++;
        }
        $pname= M('html')->addall($product);
        $this->ajaxReturn($pname);
    }
    //模板查询
    public function getHtmldata(){
        $htmldata['number']=$_REQUEST['number'];
        $data=M('html')->where($htmldata)->select();
        $this->ajaxReturn($data);

    }
    //模板删除
    public function delHtml(){
        $htmldata['number']=$_REQUEST['number'];
        $data=M('html')->where($htmldata)->delete();
        $this->ajaxReturn($data);

    }
    //查询编码 搜索编码
    public function productCoding(){
        $moe=trim($_POST['numbera']);
        $sear = strtolower($moe);
        if($sear!==""){
            $sql = "SELECT id,number,level,superior,nameus FROM classify WHERE LOWER(CONCAT(number,nameus)) LIKE '%$sear%' AND level=0 ORDER BY number ASC";
            $info = M()->query($sql);
        }else{
            $info=M('classify')->where('level=0')->order('number')->select();
        }
        $this->assign('sear',$moe);
        $this->assign('info',$info);
        $this->display('productCoding');
    }
    //搜索二级编码
    public function twodata(){
        //上级 id
        //用 上级id 和  级别 组成查询条件
        //查询 所有的 符合要求的 记录 
        //返回
        $fnumber['twonumber']=trim($_POST['twonumber']);
        $classifyid = I('post.fnumber');
        $sear = strtolower($fnumber['twonumber']);
        $sql = "SELECT id,number,level,superior,nameus FROM classify WHERE LOWER(nameus) LIKE '%$sear%' AND level=1 AND superior=".$classifyid;
        $info = M()->query($sql);
        //做两段查询先查出1的结果然后在根据1的结果进行模糊查询。
        $this->ajaxReturn($info);
    }
    //查询一级编码信息返回二级栏目
    public function getclassify(){
        $classid['superior']=$_POST['id'];
        $map['id'] = $_POST['id'];
        $classid['state']="1";
        $class=M('classify')->where($map)->field('number')->find();
        $data=M('classify')->where($classid)->order('number')->select();
        // $data=$class['number'];
        array_push($data,$class);//添加元素
        $this->ajaxReturn($data);
    }
    //查询ID
    public function getclassifyid(){
        $classid['id']=$_POST['id'];
        $data=M('classify')->where($classid)->find();
        $this->ajaxReturn($data);
    }
    //已合并到一级增加修改方法内
//    public function getmaxnumber(){
//        $data=M('classify')->where('level=0')->max('number');
//        $datalist=$data+1;
//        $this->ajaxReturn($datalist);
//    }
//已合并到二级增加修改方法内
//    public function getmaxtwonumber(){
//        $map['superior']=$_POST['id'];
//        $map['level']='1';
//        $data=M('classify')->where($map)->max('number');
//        $datalist=$data+1;
//        $this->ajaxReturn($datalist);
//    }

    //查看某一类型逻辑删除图片
    public function productimg()
    {
        $type='product';
        $product=D('imgline')->getImglineType($type);
        $this->assign('product',$product);
        $type='bclass';
        $bclass=D('imgline')->getImglineType($type);
        $this->assign('bclass',$bclass);
        $type='sclass';
        $sclass=D('imgline')->getImglineType($type);
        $this->assign('sclass',$sclass);
        $this->display();
    }

    //MA 逻辑删除图片
    public function delimg()
    {
        $map['imgid']=$_POST['id'];
        $data['status']='3';
        $list=M('imgline')->where($map)->save($data);
        if(!$list){
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //MA 逻辑恢复图片
    public function resimg()
    {
        $map=$_POST['id'];
        $where['imgid']=array('in',$map);
        $data['status']='1';
        $list=M('imgline')->where($where)->save($data)->fetchSql(true);
        if(!$list){
            $list='0';
        }
        $this->ajaxReturn($list);

    }

    //MA 真实删除图片
    public function delimage()
    {
        $image=$_POST['id'];
        $img['img.id']=array('in',$image);
        $imageline=$_POST['id'];
        $imgline['imgline.imgid']=array('in',$imageline);
        $pic=M('img')
            ->where($img)
            ->field('img.id,
                     img.type,
                     img.path,
                     img.filename,
                     img.thumpath,
                     img.thumfile')
            ->select();
        $num=count($pic);
        for($i=0;$i<$num;$i++){
            $file=$_SERVER['DOCUMENT_ROOT'].$pic[$i]['path'].$pic[$i]['filename'];
            $thumfile=$_SERVER['DOCUMENT_ROOT'].$pic[$i]['thumpath'].$pic[$i]['thumfile'];
            unlink($file);
            unlink($thumfile);
        }
        $img=M('img')
            ->where($img)
            ->join('RIGHT JOIN imgline on imgline.imgid = img.id')
            ->delete();
        $imgline=M('imgline')
            ->where($imgline)
            ->join('LEFT JOIN img on imgline.imgid = img.id')
            ->delete();
        if($imgline && $img){
            $list='1';
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //关键词列表
    public function keywordsList(){
        $data['status']=1;
        $pagen=$_GET['pagen'];
        if(empty($pagen)){
            $pagen=100;
        }
        $search=trim($_GET['keywords']);
        if(!empty($search)){
            $data['name']=array('like', "%" .$search. "%");
        }
        $keywords=new KeywordsModel();
        $list=$keywords->keywordsList($data,$pagen);
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->assign('pagen',$pagen);   //每页显示多少
        $this->assign('search',$search);   //每页显示多少
        $this->display();
    }

    //修改关键词
    public function editKeywords(){
        $map['id']=$_POST['id'];
        $name=$_POST['keywords'];
        $data['name']=$name;
        $k_words=M('keywords')->select();
        $k=M('keywords')->where($map)->find();
        $word=array_column($k_words,'name');
        $words = array_map('strtolower',$word); //数组统一为小写
        $names=strtolower($name); //转化为小写
        $result=in_array($names,$words);  //对比是否存在
        if($result == false OR $names==$k['name']){   //返回false不存在时或值等于原来的值的时候，可以修改保存
            $keywords=M('keywords')->where($map)->save($data);
            if($keywords){  //修改成功时返回1  否则返回0
                $list='1';
            }else{
                $list='0';
            }
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //ajax获取关键词
    public function getAjaxKeywords(){
        $map['status']=1;
        $list=M('keywords')->field('id,name')->where($map)->select();
        $this->ajaxReturn($list);
    }

    //添加关键词
    public function ajaxAddKeywords(){
        $name=$_POST['keywords'];
        $data['name']=$name;
        $data['time']=date("Y-m-d H:i:s");
        $k_words=M('keywords')->select();
        $word=array_column($k_words,'name');
        $words = array_map('strtolower',$word); //数组统一为小写
        $names=strtolower($name);   //转化为小写
        $result=in_array($names,$words);   //对比是否存在
        if($result == false){    //返回false不存在时添加新的关键词
            $keywords=M('keywords')->add($data);
            if($keywords){   //添加成功时返回1  否则返回0
                $key=M('keywords')->field('id,name')->where('id='.$keywords)->find();
                $list=$key;
            }else{
                $list='0';
            }
        }else{
            $list='0';
        }
        $this->ajaxReturn($list);
    }

    //查询没有关联的关键词
    public function unusedKeywords(){
        $map['status']=1;
        $key=M('keywords')->where($map)->select();
        $keywords=array_column($key,'id');
        $product=M('product')->where($map)->select();
        foreach ($keywords as $k =>$v){

        }
        $this->ajaxReturn($product);
    }

}