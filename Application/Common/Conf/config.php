<?php
return array(
    //数据库地址
    'DB_TYPE' => 'MYSQL',
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'shell1',        //数据库名称
    'DB_USER' => 'root',             //用户名
    'DB_PWD'  => '',             //密码
    'DB_PORT' => '3306',            //端口号
    //'DB_PREFIX' => '',              //数据库表前缀
    'DB_CHARSET'=> 'utf8',          //数据库字符集
    //验证码配置
    'FONTSIZE' => '30',   //验证码字体大小
    'LENGTH' => '4',      //验证码位数
    'USENOISE' => false,   //关闭验证码杂点
    'codeSet'=> '0',
    'reset' => false, // 验证成功后是否重置

    //模版配置
    'LAYOUT_ON'=>true,
    'LAYOUT_NAME'=>'Layout/layout',
   //分页
    'pageNum' => 5,//每页显示条数
    //Redis缓存配置
    //'DATA_CACHE_TYPE' =>  'Redis',
    //'DATA_CACHE_DBNUM'=>2,

    //登陆超时配置
    'TOKEN' => array(
        'admin_marked' => 'gk',
        'admin_timeout' => 3600,
        'member_timeout' => 3600,
    ),
    'APP_DEBUG' => true,
    // 显示页面Trace信息
    'SHOW_PAGE_TRACE' =>true,

);