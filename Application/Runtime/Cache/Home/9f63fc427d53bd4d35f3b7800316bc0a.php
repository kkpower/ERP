<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="fixed">
<head>
    <!doctype html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">

        <title><?php echo (L("Shelltechnology")); ?></title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap/css/bootstrap.css" />

        <link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="/InternalSystem/Public/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
        <!--<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />-->

        <!-- Specific Page Vendor CSS -->
        <!--<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/jquery-ui/jquery-ui.theme.css" />-->
        <!--<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />-->
        <!--<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/morris.js/morris.css" />-->

        <!-- Theme CSS -->
        <link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <!--<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/stylesheets/theme-custom.css">-->

        <!-- Head Libs -->
        <script src="/InternalSystem/Public/FirstEdition/assets/vendor/modernizr/modernizr.js"></script>
        <script src="/InternalSystem/Public/login/assets/js/jquery-1.11.1.min.js"></script>


    </head>
   
</head>
<body>
<section class="body">
    <section >
	<input type="hidden" id="meNoticeAjax" value="<?php echo U('My/meNoticeAjax');?>"/>
    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="../" class="logo">
                <img src="/InternalSystem/Public/img/logo.png" height="35" alt="Porto Admin" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>

        </div>

        <!-- start: search & userox -->
        <div class="header-right">
            <!--<form action="pages-search-results.html" class="search nav-form">
                <div class="input-group input-search">
                    <input type="text" class="form-control divcss5_left" name="q" id="q" placeholder="Search...">
                    <span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
                </div>

            </form>-->
            <span class="separator"></span>
            <ul class="notifications">
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-tasks"></i>
                        <span class="badge">3</span>
                    </a>

                    <div class="dropdown-menu notification-menu large">
                        <div class="notification-title">
                            <span class="pull-right label label-default">3</span>
                            Tasks
                        </div>

                        <div class="content">
                            <ul>
                                <li>
                                    <p class="clearfix mb-xs">
                                        <span class="message pull-left">Generating Sales Report</span>
                                        <span class="message pull-right text-dark">60%</span>
                                    </p>
                                    <div class="progress progress-xs light">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </li>

                                <li>
                                    <p class="clearfix mb-xs">
                                        <span class="message pull-left">Importing Contacts</span>
                                        <span class="message pull-right text-dark">98%</span>
                                    </p>
                                    <div class="progress progress-xs light">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
                                    </div>
                                </li>

                                <li>
                                    <p class="clearfix mb-xs">
                                        <span class="message pull-left">Uploading something big</span>
                                        <span class="message pull-right text-dark">33%</span>
                                    </p>
                                    <div class="progress progress-xs light mb-xs">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <span class="badge">4</span>
                    </a>

                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                            <span class="pull-right label label-default">230</span>
                            Messages
                        </div>

                        <div class="content">
                            <ul>
                                <li>
                                    <a href="#" class="clearfix">
                                        <figure class="image">
                                            <img src="/InternalSystem/Public/img/user2.png" alt="Joseph Doe Junior" class="img-circle" />
                                        </figure>
                                        <span class="title">Joseph Doe</span>
                                        <span class="message">Lorem ipsum dolor sit.</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="clearfix">
                                        <figure class="image">
                                            <img src="/InternalSystem/Public/img/user3.png" alt="Joseph Junior" class="img-circle" />
                                        </figure>
                                        <span class="title">Joseph Junior</span>
                                        <span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="clearfix">
                                        <figure class="image">
                                            <img src="/InternalSystem/Public/img/user4.png" alt="Joe Junior" class="img-circle" />
                                        </figure>
                                        <span class="title">Joe Junior</span>
                                        <span class="message">Lorem ipsum dolor sit.</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="clearfix">
                                        <figure class="image">
                                            <img src="/InternalSystem/Public/img/user5.png" alt="Joseph Junior" class="img-circle" />
                                        </figure>
                                        <span class="title">Joseph Junior</span>
                                        <span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
                                    </a>
                                </li>
                            </ul>

                            <hr />

                            <div class="text-right">
                                <a href="#" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>
                <input id="getErrAlertsUrl" name="" type="hidden" value="<?php echo U('Public/getError','','');?>"/>
                <li>
                    <a id="errAlerts" href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="badge problem_message">0</span>
                    </a>

                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                            <span class="pull-right label label-default problem_message">0</span>
                            Alerts
                        </div>

                        <div class="content">
                            <ul name="errContet">
                                <li>
                                    <a href="<?php echo U('My/me');?>" class="clearfix">
                                        <div class="image">
                                            <i class="glyphicon glyphicon-thumbs-down bg-danger"></i>
                                        </div>
                                        <span class="title">veryurgent</span>
                                        <span class="message" id="veryurgent_message">10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo U('My/me');?>" class="clearfix">
                                        <div class="image">
                                            <!--<i class="glyphicon glyphicon-hand-down bg-warning"></i>-->
                                            <i class="fa fa-gg bg-warning"></i>
                                        </div>
                                        <span class="title">emergency</span>
                                        <span class="message" id="emergency_message">6</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo U('My/me');?>" class="clearfix">
                                        <div class="image">
                                            <i class="glyphicon glyphicon-hand-right bg-primary"></i>
                                        </div>
                                        <span class="title">general</span>
                                        <span class="message" id="general_message">5</span>
                                    </a>
                                </li>
                            </ul>

                            <hr />

                            <div class="text-right">
                                <a href="<?php echo U('Alarm/alarm','','');?>" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <span class="separator"></span>
            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="/InternalSystem<?php echo $_SESSION['user_info']['path']?>" alt="Joseph Doe" class="img-circle" data-lock-picture="/InternalSystem/Public/images/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="<?php echo $_SESSION['user_info']['email'];?>">
                        <span class="name">
                            <?php if((LANG_SET) == "en-us"): echo $_SESSION['user_info']['name'].' '.$_SESSION['user_info']['lastname'];?>
                            <?php else: ?>
                                <?php echo $_SESSION['user_info']['lastnamezh'].$_SESSION['user_info']['namezh']; endif; ?>
                        </span>
                        <span class="role"></span>
                    </div>
                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <!--<li>
                            <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                        </li>-->
                        <li>
                            <a role="menuitem" tabindex="-1" href="<?php echo U('My/me');?>"><i class="fa fa-user" style="width: 15px;"></i><?php echo (L("personal_information")); ?></a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="<?php echo U('System/proving');?>"><i class="fa fa-lock" style="width: 15px;"></i><?php echo (L("Userpassword")); ?></a>
                        </li>
                        <!--<li>
                            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                        </li>-->
                        <li>
                            <a role="menuitem" tabindex="-1" href="<?php echo U('Login/loginOut','','');?>"><i class="fa fa-power-off" style="width: 15px;"></i><?php echo (L("Sign_out")); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div type="button" class="btn btn-default btn-sm">
            <style>
                a,
                a:link,
                a:hover,
                a:visited {
                    color: black;
                }
            </style>

            <span class="glyphicon glyphicon-asterisk"><a href="?l=zh-cn">简体中文</a></span>
        </div>
        <div type="button" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-asterisk"><a href="?l=en-us">English</a></span>
        </div>
        <!--  <a href="?l=zh-cn">简体中文</a>|<a href="?l=en-us">English</a>-->
        <span class="separator"></span>
    </header>
    <!-- end: header -->
</section>

    <div class="inner-wrapper">
        <!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            <?php echo (L("Menu")); ?>
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active"></li>
                    <?php if(is_array($_SESSION['userNodeLists'])): foreach($_SESSION['userNodeLists'] as $key=>$v): if(($v["auth_pid"]) == "0"): ?><li class="nav-parent">
                                <a>
                                    <i class="fa fa-columns" aria-hidden="true"></i>
                                    <!--中英文切换-->
                                    <?php if(($_COOKIE['think_language']) == "en-us"): ?><span><?php echo ($v["auth_nameus"]); ?></span>
                                        <?php else: ?>
                                    <span><?php echo ($v["auth_name"]); ?></span><?php endif; ?>
                                </a>
                                <ul class="nav nav-children">
                                    <?php if(is_array($_SESSION['userNodeLists'])): foreach($_SESSION['userNodeLists'] as $key=>$vv): if(($vv["auth_pid"]) != "0"): ?><li>
                                                <?php if(($vv["auth_pid"]) == $v["id"]): if(($vv["auth_level"]) == "1"): $url=$vv['auth_c']."/".$vv['auth_a'];?>
                                                        <!--<?php echo "<a id="."'".$vv['id']."'"." href='".U($url,'','','')."'>".$vv['auth_name']."</a>";?>   单语言-->
                                                        <!--读取think_language cookie 来判断中英文,显示 中英文-->
                                                        <?php if(($_COOKIE['think_language']) == "en-us"): echo "<a id="."'".$vv['id']."'"." href='".U($url,'','','')."'>".$vv['auth_nameus']."</a>";?>
                                                            <?php else: ?>
                                                            <?php echo "<a id="."'".$vv['id']."'"." href='".U($url,'','','')."'>".$vv['auth_name']."</a>"; endif; endif; endif; ?>
                                            </li><?php endif; endforeach; endif; ?>

                                </ul>
                            </li><?php endif; endforeach; endif; ?>
                </ul>
            </nav>
        </div>
        <script>
            // Preserve Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                            sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>
    </div>

</aside>
<!-- end: sidebar -->

        <section role="main" class="content-body">
            <header class="page-header">
    <h2>
        <!--<?php echo ($ControllerName); ?>-->
    </h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>
                 <?php if(($_COOKIE['think_language']) == "en-us"): echo ($ControllerNameus); ?>
                 <?php else: ?>
                    <?php echo ($ControllerName); endif; ?>
            </span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>

    </div>

</header>

            <!-- start: page -->
            <link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.css" />
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.css" />
<style>
	.modal-dialog {
		margin: 60px auto !important;
	}
	
	.bootstrap-select.btn-group .dropdown-toggle .filter-option {
		padding-left: 5px;
		padding-top: 3px;
		color: #666;
	}
	
	.bootstrap-select {
		width: 50% !important;
	}
	
	.bootstrap-select>button {
		height: 100%;
		line-height: 100%;
	}
	
	.bootstrap-select>button:active {
		background: #fff !important;
	}
	
	.bootstrap-select>button:hover {
		background: #fff !important;
	}
	
	.bootstrap-select>button:focus {
		background: #fff !important;
	}
	
	.caret {
		color: #333 !important;
	}
	
	.wrap {
		margin: 0 auto;
		/*padding: 20px;*/
		width: 210mm;
		height: 297mm;
		/*border:1px solid #ccc;*/
	}
	
	#wrap ul,
	#wrap p {
		padding: 0;
		margin: 0;
	}
	
	#wrap li {
		padding: 20px;
		list-style: none;
		box-sizing: border-box;
		/*border: 1px solid #ccc;*/
	}
	
	.left p {
		font-size: 12px;
		line-height: 18px;
		white-space: nowrap;
	}
	
	.left {
		margin-top: -4px;
		margin-left: -26px;
		-webkit-transform: scale(0.7, 0.7);
		-moz-transform: scale(0.7, 0.7);
		-o-transform: scale(0.7, 0.7);
		transform: scale(0.7, 0.7);
	}
	
	.middle {
		padding-top: 20px;
		position: relative;
		width: 76%;
	}
	
	.middle p {
		font-size: 12px;
		font-weight: bold;
		line-height: 20px;
	}
	
	.name1 {
		-webkit-transform: scale(0.8, 0.8);
		-moz-transform: scale(0.8, 0.8);
		-o-transform: scale(0.8, 0.8);
		transform: scale(0.8, 0.8);
	}
	
	#details_img {
		text-align: center;
	}
	
	#details_img>div {
		display: inline-block;
		width: 20%;
		position: relative;
		margin: 0 2% 2%;
	}
	
	#details_img img {
		width: 100%;
	}
	
	#details_img p {
		position: absolute;
		top: 0;
		right: 0;
		line-height: 16px;
		text-align: center;
		font-size: 16px;
		color: red;
		font-weight: bold;
	}
</style>
<script>
	$('#40').parents('li').addClass('nav-active')
	$('#40').parents('li').addClass('nav-expanded')
</script>
<input type="hidden" id="orderdetails" name="orderdetails" value="<?php echo U('Deliverycenter/orderdetails');?>">
<input type="hidden" id="problem" />
<input id="areaing" type="hidden" value="<?php echo ($areaing); ?>" />
<p id="send_message" style="display: none;"></p>
<p id="all_message" style="display: none;"><?php echo ($orderjson); ?></p>
<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>

				<h2 class="panel-title">订单列表</h2>
			</header>

			<div class="panel-body">
				<form id="country_form" action="<?php echo U('Deliverycenter/deliveryList','','');?>" method="get" style="float: left;min-width: 240px;">
					<div class="input-group" style="float: left;width: 240px;margin-right: 10px;">
						<span class="input-group-addon">
							发货仓库
              			</span>
						<input type="hidden" id="country" value="<?php echo ($area); ?>">
						<select name="country" class="form-control" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200}' id="selector">
							<option name="" value="">--请选择仓库--</option>
							<?php if(is_array($country)): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option name="country" value="<?php echo ($vo["id"]); ?>" id="<?php echo ($vo["id"]); ?>"><?php echo ($vo["englishname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div id="status_div" class="input-group" style="float: left;width: 180px;margin-right: 10px;display: none;">
						<span class="input-group-addon">
							状态
              			</span>
						<input type="hidden" id="status_id" value="<?php echo ($status_id); ?>">
						<select name="status_id" class="form-control" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200}' id="selectord">
							<!--<option name="" value="">全部</option>-->
							<option name="country" value="3" id="3">未打印</option>
							<option name="country" value="4" id="4">打印中</option>
							<option name="country" value="5" id="5">打印完成</option>
							<option name="country" value="6" id="6">待发货</option>
							<option name="country" value="7" id="7">已发货</option>
							<option name="country" value="9" id="9">问题订单</option>
						</select>
					</div>
					<div class="input-group" style="float: left;width: 160px;margin-right: 10px;">
						<span class="input-group-addon">
							显示数量
              			</span>
						<input type="hidden" id="pag" value="<?php echo ($pagen); ?>">
						<select id="pagen" name="pagen" class="form-control" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200}'>
							<option value="10">10</option>
							<option value="50">50</option>
							<option value="100">100</option>
							<option value="500">500</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">确定</button>
				</form>
				<div class="input-group" style="width: 30%;float: right;">
					<input type="text" class="form-control" placeholder="请输入订单号或扫描订单二维码" id="search_order" />
					<span class="input-group-addon btn-success" style="cursor: pointer;" onclick="search_order()">
							搜索
              			</span>
				</div>
				<table id="table1" class="table table-hover table-bordered table-striped" style="border-collapse: collapse;">
					<thead>
						<tr>
							<td><input type="checkbox" class="check-all" onclick="historyImg(this,event)">全选</td>
							<td>订单号</td>
							<td>操作</td>
							<td>收件人</td>
							<td>发货地</td>
							<td>运输要求</td>
							<td>订单状态</td>
							<td>订单日期</td>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><input id="<?php echo ($key); ?>_ck" type="checkbox" name="checkboxed" class="row_check" value="<?php echo ($vo["id"]); ?>"> <?php echo ($key+1); ?></td>
								<!--<td id="<?php echo ($key); ?>_1"><?php echo ($key+1); ?></td>-->
								<td id="<?php echo ($key); ?>_2"><?php echo ($vo["id"]); ?></td>
								<td id="<?php echo ($key); ?>_3">
									<a style="color: #fff;" type="button" target="_blank" href="<?php echo U('Deliverycenter/ordertrack',array('id'=>$vo['id']));?>" class="btn btn-info btn-xs">订单详情</a>
									<?php if($vo["status_id"] == 3): ?><a style="color: #fff;" type="button" target="_blank" href="<?php echo U('Deliverycenter/updateOrder',array('id'=>$vo['id']));?>" class="btn btn-primary btn-xs">修改</a><?php endif; ?>
								</td>
								<td id="<?php echo ($key); ?>_5"><?php echo ($vo["recipient_first_name"]); ?></td>
								<td id="<?php echo ($key); ?>_6"><?php echo ($vo["country"]); ?></td>
								<td id="<?php echo ($key); ?>_8"><?php echo ($vo["ship_level"]); ?></td>
								<td id="<?php echo ($key); ?>_9"><?php echo ($vo["processing_status"]); ?></td>
								<td id="<?php echo ($key); ?>_10"><?php echo ($vo["creation_time"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<button type="button" id="product_list" class="btn btn-primary" onclick="mpdf()" style="display: none;">产品清单</button>
				<button type="button" id="bulk_print" class="btn btn-warning" onclick="print_order()" style="display: none;">批量打印</button>
				<button type="button" id="print_complete" class="btn btn-info" onclick="notship()" style="display: none;">打印完成</button>
				<!--<button type="button" id="product_list" class="btn btn-warning" onclick="product_list()" style="">产品清单</button>-->
				<ul class="pager" style="width: 100%;">
					<!-- 分页显示 --><?php echo ($page); ?></ul>
			</div>
		</section>
	</div>
</div>

<div id="print_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					批量打印
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<div id="wrap" class="wrap">
					<div class="con" style="height: 100%;">
						<ul style="height: 100%;" id="ul_content">

						</ul>
					</div>
				</div>
				<br style="clear: both;" />
			</div>
			<div class="modal-footer">
				<button class="btn no-print btn-primary" id="print_btn">点击开始打印</button>
				<!--<button type="button" class="btn btn-primary" onclick="change_message(num)">修改</button>-->
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>

<div id="details_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					产品清单 
				</h4>
			</div>
			<div class="modal-body" id="details_body" style="line-height: 34px;">
				<div class="wrap" id="product_modal">
					<table class="table table-hover table-bordered table-striped" style="border-collapse: collapse;text-align: center;">
						<thead>
							<tr>
								<th style="text-align: center;">序号</th>
								<th style="text-align: center;">料号</th>
								<th style="text-align: center;">产品名称</th>
								<th style="text-align: center;">产品数量</th>
							</tr>
						</thead>
						<tbody id="details_tbody">
						</tbody>
					</table>
				</div>
				<div class="col-md-12" id="details_img">

				</div>
				<br style="clear: both;" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick='$("#product_modal").print()'>打印</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<script>
	function historyImg(dom,e) {
        stopBubble(e);
    }
 //阻止事件冒泡函数
    function stopBubble(e) {
        if (e && e.stopPropagation)
            e.stopPropagation()
        else
            window.event.cancelBubble = true
    }
	var country = $('#country').val();
	$('#selector').val(country);
	var pagen = $('#pag').val();
	$('#pagen').val(pagen);
	if($('#selector').val() != "") {
		$('#status_div').css('display', 'table');
	} else {
		$('#status_div').css('display', 'none');
	}
	var status_id = $('#status_id').val();
	if(status_id != "") {
		$('#selectord').val(status_id);
	} else {
		$('#selectord').val("3");
	}

	if(status_id == 3 || status_id == 4) {
		$('#bulk_print').css('display', 'inline-block');
	} else {
		$('#bulk_print').css('display', 'none');
	}
	if(status_id == 3 || status_id == 4 || status_id == 5) {
		$('#product_list').css('display', 'inline-block');
	} else {
		$('#product_list').css('display', 'none');
	}
	if(status_id == 4) {
		$('#print_complete').css('display', 'inline-block');
	} else {
		$('#print_complete').css('display', 'none');
	}
</script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/print.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.js"></script>
<!--<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/jsbarcode.js"></script>-->
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/jquery.qrcode.min.js"></script>
<script>
	//打印
	var num = 0;
	var arr1 = "";
	var pid_arr = [],
		pid_length = "",
		pid_arr1 = [];
	if($('#all_message').text() != "") {
		arr1 = JSON.parse($('#all_message').html());
	}

	//输入框自动聚焦
	$('#search_order').focus();

	//下拉框选择国家
	$('#selector').on('change', function() {
		if($('#selector').val() != "") {
			$('#status_div').css('display', 'table');
		} else {
			$('#status_div').css('display', 'none');
		}
	})
	//下拉状态改变
	$('#selectord').on('change', function() {
		$('#country_form').submit();
	})

	console.log(arr1);
	$('#print_btn').on('click', function() {
		print_order1();
		$("#wrap").print();
	})

	function onm(n) {
		num = n;
		var r = confirm("确定完成吗？")
		if(r == true) {
			location.href = "<?php echo U('Deliverycenter/notship');?>" + n;
		} else {
			return
		}
	}
	//打印
	function print_order() {
		$('#ul_content').empty();
		console.log(arr1);
		var arr2 = [];
		for(var i = 0; i < arr1.length; i++) {
			if($('#' + i + '_ck').is(':checked')) {
				arr2.push(arr1[i].id);
			}
		}
		if(arr2.length == 0) {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').text('请选择订单');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none'", 2000);
			return false;
		}
		console.log(arr1.length)
		for(var i = 0; i < arr1.length; i++) {
			console.log($('#' + i + '_ck'))
			if($('#' + i + '_ck').is(':checked')) {
				var str = '<li style="height: 20%;width: 50%;float: left;position:relative;">' +
					'<div class="left" style="width: 50%;float: left;height: 20%;">' +
					'<p>yellow price</p>' +
					'<p>UNIT 16 4 bacn Ave</p>' +
					'<p>Lidaonvb NSW2141,Austrlia</p>' +
					'</div>' +
					'<div id="img' + i + '" style="display: block;width: 20%;height:20%;position: absolute;top:20px;right:20px;"></div>' +
					'<br style="clear: both;" />' +
					'<div class="middle">' +
					'<p>' + arr1[i].recipient_last_name + ' ' + arr1[i].recipient_first_name + '</p>' +
					'<p>' + arr1[i].street_1 + ' ' + arr1[i].street_2 + ' ' + (arr1[i].street_3 == null ? "" : arr1[i].street_3) + '</p>' +
					'<p>' + arr1[i].state + ' ' + arr1[i].city + '</p>' +
					'<p>' + arr1[i].zip + ' ' + arr1[i].country + '</p>' +
					'</div>' +
					'<p class="name1" style="float: left;font-size: 12px;line-height: 24px;margin-left: -16px;">changhaoyuan11233456789</p>' +
					'</li>'
				$('#ul_content').append(str)
				$("#img" + i).qrcode({
					render: "canvas", //也可以替换为table
					width: 70,
					height: 70,
					text: arr1[i].id
				});
				var canvas = $("#img" + i).children("canvas");
				//将canvas转换成png图片，才能被打印机识别打印
				var img = canvas[0].toDataURL("image/png")
				$("#img" + i).html("<img src='" + img + "'>")
				$("#img" + i).append('<p class="name1" style="width: 100%;text-align: center;line-height: 14px;margin-left: -5px;">' + arr1[i].id + '</p>')
			}
		}
		$('#print_modal').modal('toggle');
	}

	//转入打印中
	function print_order1() {
		console.log(arr1);
		var arr2 = [];
		for(var i = 0; i < arr1.length; i++) {
			if($('#' + i + '_ck').is(':checked')) {
				arr2.push(arr1[i].id);
			}
		}
		console.log(arr2);
		$.ajax({
			url: "<?php echo U('Deliverycenter/printorder');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				arr: arr2
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').text('订单进入打印中');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
			}
		})
	}

	//表格插件
	$(document).ready(function() {
		$('#table1').DataTable({
			"paging": false,
			"lengthChange": false,
			"info": false,
			"searching": false
		});
	});

	//全选、反选
	$(function() {
		var changetotal = function() {
			//获取所选中的行
			var checked_checkbox = $('.row_check:checked');
		};
		$('.check-all').prop('checked', 'checked');
		$('.row_check').prop('checked', 'checked');
		$('.check-all').change(function() {
			var status = $(this).prop('checked');
			$('.row_check').prop('checked', status);
			changetotal();
		});

		$('.row_check').change(function() {
			changetotal();
			var checkbox_all = $('.row_check');
			var checkbox_checked = $('.row_check:checked');
			var status = checkbox_all.length == checkbox_checked.length;
			$('.check-all').prop('checked', status);
		});
	});

	function productlist(n, arr) {
		$.ajax({
			url: "<?php echo U('Deliverycenter/productlist');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				console.log(arr)
				var p = "<option value=''>请选择</option>"
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					p += "<option value='" +
						data[i]['id'] +
						"'" +
						">" +
						data[i]['namezh'] +
						"</option>";
				}
				for(var i = 0; i < n; i++) {

					$('#pid' + i).append(p);
					$('#pid' + i).selectpicker('refresh');
					$('#pid' + i).selectpicker('val', arr[i]);
					//					$('#pid' + i).val(arr[i])
				}
			}
		})
	}
	//全选
	$('.check-all').change(function() {
		var status = $(this).prop('checked');
		$('.row_check').prop('checked', status);
	});

	function notship() {
		$('#ul_content').empty();
		console.log(arr1);
		var arr2 = [];
		for(var i = 0; i < arr1.length; i++) {
			if($('#' + i + '_ck').is(':checked')) {
				arr2.push(arr1[i].id);
			}
		}
		if(arr2.length == 0) {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').text('请选择订单');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none'", 2000);
			return false;
		} else {
			var r = confirm("确定打印吗？");
			if(r == true) {
				$.ajax({
					url: "<?php echo U('Deliverycenter/notship');?>", //通过页面元素的ID来获取设备ID
					type: "post", //选择传值方式
					data: {
						arr: arr2,
					},
					dataType: "JSON",
					success: function(data) {
						console.log(data);
						if(t) {
							clearTimeout(t)
						};
						$('#node_message').html('打印成功');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
					}
				})
			} else {
				return false;
			}

		}
		//		$('#print_modal').modal('toggle');
	}

	//搜索订单
	$('#search_order').on('keyup', function(event) {
		if(event.keyCode == '13') {
			search_order()
		}
	})

	//搜索订单
	function search_order() {
		$.ajax({
			url: "<?php echo U('Deliverycenter/getAjaxPermission');?>", //通过页面元素的ID来获取设备ID
			type: "get", //选择传值方式
			data: {
				id: $('#search_order').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == 0) {
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('没有这个订单');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
					return false;
				}
				window.open("<?php echo U('Deliverycenter/ordertrack');?>?id=" + $('#search_order').val())
			}
		})
	}
	//产品清单
	function product_list() {
		var arr2 = [];
		for(var i = 0; i < arr1.length; i++) {
			if($('#' + i + '_ck').is(':checked')) {
				arr2.push(arr1[i].id);
			}
		}
		if(arr2.length == 0) {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').html('请选择订单');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 2000);
			return false;
		}
		$.ajax({
			url: "<?php echo U('Deliverycenter/shipList');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				arr: arr2
			},
			dataType: "JSON",
			success: function(data) {
				var data1 = {};
				var nn = 1;
				console.log(data);
				for(var i = 0; i < data.length; i++) {
					console.log(data1);
					if(data1[data[i].pid]) {
						data1[data[i].pid].num = Number(data1[data[i].pid].num) + Number(data[i].number);
					} else {
						data1[data[i].pid] = {};
						data1[data[i].pid].num = data[i].number;
						data1[data[i].pid].aclass = data[i].bclass + '.' + data[i].sclass + '.' + data[i].num;
						data1[data[i].pid].name = data[i].namezh;
					}
				}
				console.log(data1);
				var str;
				for(var x in data1) {
					str += '<tr><td>' + nn + '</td><td>' + data1[x].aclass + '</td><td>' + data1[x].name + '</td><td>' + data1[x].num + '</td></tr>';
					nn++;
				}
				$('#details_tbody').empty();
				$('#details_tbody').append(str);
				$('#details_modal').modal('toggle');
			}
		})
	}

	function mpdf() {
		var country1 = $('#selector').val();
		window.open("<?php echo U('Deliverycenter/shipListPdf');?>?w_id="+ country1);
	}
</script>
            <!-- end: page -->
        </section>
    </div>
    <aside id="sidebar-right" class="sidebar-right">
    <div class="nano">
        <div class="nano-content">
            <a href="#" class="mobile-close visible-xs">
                Collapse <i class="fa fa-chevron-right"></i>
            </a>

            <div class="sidebar-right-wrapper">

            </div>
        </div>
    </div>
</aside>

</section>
<!-- Vendor -->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/jquery/jquery.js"></script>-->
<!--<script type="text/javascript" src="/InternalSystem/Public/FirstEdition/assets/shu/jquery-1.11.1.min.js"></script>-->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>-->
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/nanoscroller/nanoscroller.js"></script>
<!--<script src="/InternalSystem/Public/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>-->
<script src="/InternalSystem/Public/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
<script src="/InternalSystem/Public/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.zh-CN.js"></script>
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>-->

<!-- Specific forms-advanced Page Vendor -->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/jquery-ui/jquery-ui.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>-->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/select2/js/select2.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>-->
<!--<script src="/InternalSystem/Public/vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>-->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/fuelux/js/spinner.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/dropzone/dropzone.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>-->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/codemirror/lib/codemirror.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/codemirror/addon/selection/active-line.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/codemirror/mode/javascript/javascript.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/codemirror/mode/xml/xml.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/codemirror/mode/css/css.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/summernote/summernote.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/ios7-switch/ios7-switch.js"></script>-->
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js"></script>

<!-- Specific pnotify Page Vendor -->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/pnotify/pnotify.custom.js"></script>-->

<!-- Specific Tree Page Vendor -->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/vendor/jstree/jstree.js"></script>-->

<!-- Theme Base, Components and Settings -->
<script src="/InternalSystem/Public/FirstEdition/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/InternalSystem/Public/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<!--<script src="/InternalSystem/Public/FirstEdition/assets/javascripts/theme.init.js"></script>-->

<!-- forms-advanced Examples -->
<script src="/InternalSystem/Public/FirstEdition/assets/javascripts/forms/examples.advanced.form.js"></script>

<!--ECharts Plug -->
<script src="/InternalSystem/Public/vendor/echarts/echarts.js"></script>


<!-- Custom defined JS  -->
<script src="/InternalSystem/Public/js/public.js"></script>

</body>
</html>