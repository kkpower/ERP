<?php
//判断浏览器
function ismobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;

    //此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
        //找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
        //从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    //协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}



/**
 * Created by PhpStorm.
 * User: Dong.J.W
 * Date: 2017/8/9 0009
 * Time: 22:48
 */


/**
 * 根据PID查询子city数据
 * @param $nodeList
 * @param $pId
 * @return array
 */
function getChilderCityByPid($nodeList,$pId){
    //根据PID查询数据
    $childerNodes = array();
    foreach($nodeList as $list){
        if($list['pid'] == $pId){
            array_push($childerNodes, $list);
        }
    }
    return $childerNodes;
}
//分页
function getPage($count,$pagesize=10) {
    $p = new \Think\Page($count, $pagesize);
    if (LANG_SET=='zh-cn'){
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
    }elseif (LANG_SET=='en-us'){
        $p->setConfig('prev', 'Prev');
        $p->setConfig('next', 'Next');
        $p->setConfig('last', 'Last');
        $p->setConfig('first', 'First');
    }

    /*注释掉的是原先的样式*/
    /*$p->setConfig('theme',
        '<div class="col-md-2 pageLeft">共<b>%TOTAL_ROW%</b>条记录</div><div class="col-md-8 pageCenter">%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%</div>
<div class="col-md-2 pageRight">第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</div>');*/
    if (LANG_SET=='zh-cn'){
        $p->setConfig('theme',
            '<div class="col-md-2 pageLeft">共<b>%TOTAL_ROW%</b>条记录</div><div class="col-md-8 pageCenter">%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%</div>
<div class="col-md-2 pageRight">第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</div>');
    }elseif (LANG_SET=='en-us'){
        $p->setConfig('theme',
            '<div class="col-md-2 pageLeft">A total of <b>%TOTAL_ROW%</b> records</div><div class="col-md-8 pageCenter">%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%</div>
<div class="col-md-2 pageRight">Page:<b>%NOW_PAGE%</b>/<b>%TOTAL_PAGE%</b></div>');
    }

    $p->lastSuffix = false;//最后一页不显示为总页数
    //页面参数
    /*foreach($condition as $key=>$val) {
        $p->parameter[$key]   =   urlencode($val);
    }*/
    if(empty($_POST['q'])){
        unset($_POST['q']);
    }
    if(empty($_POST)){
        $p->parameter = $_GET;
    }else{
        $p->parameter = $_POST;
    }
    return $p;
}
//分页
function getAjaxPage($count, $pagesize = 10, $jsFunction, $id) {
    $p = new \Think\AjaxPage($count, $pagesize, $jsFunction, $id);
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '<div class="col-md-2 pageLeft">共<b>%totalRow%</b>条记录</div><div class="col-md-8 pageCenter">%first%%upPage%%linkPage%%downPage%%end%</div><div class="col-md-2 pageRight">第<b>%nowPage%</b>页/共<b>%totalPage%</b>页</div>');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}



/**
 * 格式化nodeList
 * @param $nodeList  节点列表
 * @param int $pid   父节点Id
 * @return array
 */
function formatNodeList($roleNodeList,$nodeList,$pid=0){
    $resultArray = array();
    //根据PID查询数据
    $childerNodes = array();
    foreach($nodeList as $list){

        if($list['auth_level']==2){
            $list['type']='file';
        }
        if($list['auth_pid'] == $pid){
            array_push($childerNodes, $list);
        }

    }
    if(!empty($childerNodes)){
        foreach($childerNodes as $key=>$v){
            if(formatNodeList($roleNodeList,$nodeList,$childerNodes[$key]['id'])){
                $v['children']=formatNodeList($roleNodeList,$nodeList,$childerNodes[$key]['id']);
            }else{
                if(!empty($roleNodeList)){
                    foreach ($roleNodeList as $item){
                        if($item['id']==$v['id']){
                            $v['state']=array("selected"=>true);
                        }
                    }
                }
            }
            array_push($resultArray, $v);
        }
    }
    return $resultArray;
}

function compareNodeList($nodeList,$allNodeList)
{
    foreach ($nodeList as $list) {

    }
}

/**
 * 根据key查询配置
 * * @param $nodeList
 * @param $pId
 * @return array
 */
function getConfigChy($key)
{
    $where['configkey']=$key;
    //根据key查询数
    $data=M('config')->where($where)-> find();
    return $data['configvalue'];
}

/**
 * 根据父级id查询子级
 * * @param $nodeList
 * @param $pId
 * @return array
 */
function getAjaxOrganization($leader)
{
    $where['state']="1";
    $where['leader']=$leader;
    //根据key查询数
    $data=M('organization')->field('id,name')->where($where)-> find();
    return $this->ajaxReturn($data);
}
/**
 *
 * 产品二维码生成函数
 *
 */
function getqrcode($number)
{
    // $number 传入字符串参数  第一位是地址，第二位是订单id ，第三位是包装码
    //$path  二维码真实路径
    $value=$number;
    Vendor('Phpqrcode.phpqrcode');
    $errorCorrectionLevel = 'L';//容错级别
    $matrixPointSize = 6;//生成图片大小
    //判断目录,没有则创建
//    if(!is_readable($path))
//    {
////        is_file($path) or mkdir($path,0700);
//        is_file($path) or fopen($path,'W');
//    }
    //生成二维码图片
    $object = new \QRcode();
    //打开缓冲区
    ob_start();
    $object->png($value,false, $errorCorrectionLevel, $matrixPointSize, 2);
    $imageString = base64_encode(ob_get_contents());
    //关闭缓冲区
    ob_end_clean();
    //把生成的base64字符串返回给前端
    $data = array(
        'code'=>200,
        'data'=>$imageString,
        'number'=>$number
    );
    return $data;
}




/*发送邮件方法

 *@param $to：接收者 $title：标题 $content：邮件内容

 *@return bool true:发送成功 false:发送失败

 */

function sendMail($to,$title,$content,$path,$sender) {


    Vendor('PHPMailer.PHPMailerAutoload');


    $mail = new PHPMailer;

    //使用smtp鉴权方式发送邮件

    $mail->isSMTP();

    //smtp需要鉴权 这个必须是true

    $mail->SMTPAuth = true;

    // qq 邮箱的 smtp服务器地址，这里当然也可以写其他的 smtp服务器地址

    $mail->Host = 'smtp.qq.com';

    //smtp登录的账号 这里填入字符串格式的qq号即可

    $mail->Username = '1822637304@qq.com';

    // 这个就是之前得到的授权码，一共16位

    $mail->Password = $sender['code'];

    $mail->setFrom($sender['mailbox'], 'send_user_name');

    // $to 为收件人的邮箱地址，如果想一次性发送向多个邮箱地址，则只需要将下面这个方法多次调用即可

    $mail->addAddress($to);
    if ($path){
        $mail->AddAttachment($path); // 添加附件,并指定名称  .//$path 附件路径 $filename 附件名称
    }
    $mail->isHTML(true);
    // 该邮件的主题

    $mail->Subject = $title;

    // 该邮件的正文内容

    $mail->Body = $content;


    // 使用 send() 方法发送邮件

    if(!$mail->send()) {

        return '发送失败: ' . $mail->ErrorInfo;

    } else {

        return "发送成功";

    }

}

