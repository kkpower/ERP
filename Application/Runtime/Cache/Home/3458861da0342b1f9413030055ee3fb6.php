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
	/*.bootstrap-select {
		width: 80% !important;
	}*/
	
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
	
	.input-group {
		width: 70%;
	}
	
	select {
		appearance: none;
		-moz-appearance: none;
		-webkit-appearance: none;
	}
	
	select::-ms-expand {
		display: none;
	}
	
	.caret {
		color: #333 !important;
	}
	#table1 td{
		line-height: 40px;
	}
	#table1 p{
		margin: 0;
	}
</style>
<script>
	$('#23').parents('li').addClass('nav-active')
	$('#23').parents('li').addClass('nav-expanded')
</script>
<!--查询一级编码 url-->
<input type="hidden" id="getAjaxclassone" name='' value="<?php echo U('Product/getAjaxclassone');?>">
<!--查询二级编码 url-->
<input type="hidden" id="getAjaxclasstwo" name='' value="<?php echo U('Product/getAjaxclasstwo','','');?>">
<!--添加产品 url-->
<input type="hidden" id="addAjaxProduct" name='' value="<?php echo U('Product/addAjaxProduct','','');?>">
<!--产品名称 重复检测-->
<input type="hidden" id="productname" name='' value="<?php echo U('Product/productname','','');?>">
<!--产品简称 重复检测-->
<input type="hidden" id="productshortname" name='' value="<?php echo U('Product/productshortname','','');?>">
<!--隐藏域-->

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>

				<h2 class="panel-title"><?php echo (L("Productlist")); ?></h2>
			</header>
			<div class="panel-body">
				<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
				<form class="" action="<?php echo U('Product/index','','');?>" method="get" style="display: inline-block;float: left;margin-right:15px ;">
					<div class="input-group" style="width: 500px;">
						<input name="search" type="text" value="" class="form-control" placeholder="<?php echo (L("Queryproduct")); ?>">
						<span class="input-group-btn">
		                    <button type="submit" class="btn btn-success" style="white-space: nowrap;"><?php echo (L("Search")); ?></button>
		                </span>
					</div>
					<!--<select name="select">
						<option value="1">12</option>
						<option value="2">13</option>
					</select>-->
					<input type="hidden" id="" name='' value="">
					<input type="hidden" name='' value="">
				</form>
				<button class="btn btn-primary" onclick="onm()" style="float: left;"><?php echo (L("Addnewproduct")); ?></button>
				<br style="clear: both;" />
				<table id="table1" class="table table-hover table-bordered table-striped" style="border-collapse: collapse;text-align: center;line-height: 40px;">
					<thead>
						<tr>
							<th style="text-align: center;"><?php echo (L("Thumbnail")); ?></th>
							<th style="text-align: center;"><?php echo (L("Code")); ?></th>
							<th style="text-align: center;"><?php echo (L("Name")); ?></th>
							<th style="text-align: center;"><?php echo (L("Abbreviation")); ?></th>
							<th style="text-align: center;"><?php echo (L("Date")); ?></th>
							<th style="text-align: center;"><?php echo (L("Operation")); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><img style="width: 40px;height: 40px;" src="/InternalSystem<?php echo ($vo["thumb"]); ?>" alt="<?php echo (L("Productpicture")); ?>" /></td>
								<td>
									<a href="<?php echo U('Product/homeProduct',array('pid'=>$vo[pid]),'');?>" target="_Blank"><?php echo ($vo["bclassc_number"]); ?>.<?php echo ($vo["sclassc_number"]); ?>.<?php echo ($vo["snumber_number"]); ?></a>
								</td>
								<td>
									<a href="<?php echo U('Product/homeProduct',array('pid'=>$vo[pid]),'');?>" target="_Blank"><?php echo ($vo["name"]); ?></a>
								</td>
								<td>
									<p><?php echo ($vo["shortname"]); ?></p>
									<!--简称-->
								</td>
								<td>
									<p><?php echo ($vo["time"]); ?></p>
									<!--<p style="color: #666;"></p>-->
								</td>
								<td>
									<a title="<?php echo (L("Manageproductimages")); ?>" class="btn btn-primary btn-xs" style="color: white;" target="_blank" href="<?php echo U('Product/imgindex',array('pid'=>$vo[pid]));?>"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					</tbody>
				</table>
				<ul class="pager" style="width: 100%;">
					<!-- 分页显示 --><?php echo ($page); ?></ul>
			</div>
		</section>

	</div>
</div>

<div id="node_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<?php echo (L("Addnewproduct")); ?>
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">

				<div class="row" style="margin-left: 0;margin-right: 0;">
					<!--<div style="position: absolute;top: 130px;right: 200px;">啊实打实</div>-->
					<div class="input-group">
						<span class="input-group-addon"><?php echo (L("Primarycode")); ?><span style="color: red;">*</span></span>
						<select id="queryDevice" type="text" name="queryDevice" class="selectpicker form-control" onchange="getAjaxclasstwo()" data-live-search="true">
						</select>
					</div>
					<div class="input-group" style="padding-top: 12px;position: relative;">
						<span class="caret" style="position: absolute;right: 2%;top: 64%;z-index: 20;"></span>
						<span class="input-group-addon"><?php echo (L("Secondcode")); ?><span style="color: red;">*</span></span>
						<select id="second" type="text" name="second" class="form-control">
						</select>
					</div>
					<div class="input-group" style="padding-top: 12px;float: left;">
						<span class="input-group-addon"><?php echo (L("Productname")); ?><span style="color: red;">*</span></span>
						<input type="text" name="name" class="form-control" value="" placeholder="" onblur="productname()">
						<!--<span class="input-group-addon" style="cursor: pointer;" onclick=""><?php echo (L("Detection")); ?></span>-->
					</div>
					<div id="name_check" style="float: left;padding-top: 12px;margin-left: 20px;"></div>
					<br style="clear: both;" />
					<div class="input-group" style="padding-top: 12px;float: left;">
						<span class="input-group-addon"><?php echo (L("Abbreviation")); ?><span style="color: red;">*</span></span>
						<input type="text" name="shortname" class="form-control" value="" placeholder="" onblur="productshortname()">
						<!--<span class="input-group-addon" style="cursor: pointer;" onclick=""><?php echo (L("Detection")); ?></span>-->
					</div>
					<div id="shortname_check" style="float: left;padding-top: 12px;margin-left: 20px;"></div>
					<br style="clear: both;" />
					<div class="input-group" style="padding-top: 12px;">
						<span class="input-group-addon"><?php echo (L("Productquality")); ?>（<?php echo (L("Gram")); ?>）</span>
						<input type="text" name="weight" class="form-control" value="" placeholder="">
					</div>
					<div class="input-group" style="padding-top: 12px;">
						<span class="input-group-addon"><?php echo (L("long")); ?>（<?php echo (L("Cm")); ?>）</span>
						<input type="text" name="long" class="form-control" value="" placeholder="">
					</div>
					<div class="input-group" style="padding-top: 12px;">
						<span class="input-group-addon"><?php echo (L("width")); ?>（<?php echo (L("Cm")); ?>）</span>
						<input type="text" name="width" class="form-control" value="" placeholder="">
					</div>
					<div class="input-group" style="padding-top: 12px;">
						<span class="input-group-addon"><?php echo (L("height")); ?>（<?php echo (L("Cm")); ?>）</span>
						<input type="text" name="height" class="form-control" value="" placeholder="">
					</div>
					<div id="key_words" class="input-group" style="padding-top: 12px;float: left;">
						<span class="input-group-addon"><?php echo (L("label")); ?></span>
						<select id="getAjaxKeywords" type="text" name="queryDevice" class="selectpicker form-control" data-live-search="true" multiple>
						</select>
					</div>
					<button class="btn btn-primary" style="float: left;margin-top: 12px;margin-left: 12px;" onclick="key_words()"><?php echo (L("Add_keywords")); ?></button>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="add_pr" type="submit"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<!-- /.modal-dialog -->
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.js"></script>
<script>
	var deviceStr = "<option id='first_op' value=''><?php echo (L("Selectfirstcode")); ?></option>";
	var getAjaxclassone = $("#getAjaxclassone").val();
	$.ajax({
		url: getAjaxclassone, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		data: {},
		dataType: "JSON",
		success: function(data) {
			for(var i = 0; i < data.length; i++) {
				deviceStr += "<option value='" +
					data[i]['id'] +
					"'" +
					">" +
					data[i].number + ': ' + data[i]['nameus'] +
					"</option>";
			}
			$("#queryDevice").html("");
			$('#queryDevice').append(deviceStr);
			$('#queryDevice').selectpicker('refresh');
		}
	})
	//关键词
	function key_refresh() {
		var deviceStr1 = "<option value=''><?php echo (L("Add_label")); ?></option>";
		$.ajax({
			url: "<?php echo U('Product/getAjaxKeywords');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				for(var i = 0; i < data.length; i++) {
					deviceStr1 += "<option value='" +
						data[i].id +
						"'" +
						">" +
						data[i].name +
						"</option>";
				}
				$("#getAjaxKeywords").html("");
				$('#getAjaxKeywords').append(deviceStr1);
				$('#getAjaxKeywords').selectpicker({
					noneSelectedText: '<?php echo (L("Add_label")); ?>'
				});
				$('#getAjaxKeywords').selectpicker('refresh');
			}
		})
	}
	key_refresh();
	$(document).ready(function() {
		$('#table1').dataTable({
			"paging": false,
			"lengthChange": false,
			"info": false,
			"searching": false
		});
	});
	//添加新产品弹框
	function onm() {
		$('#node_modal').modal('toggle');
		//		getAjaxclassone();
	}

	function getAjaxclassone() //一级编码
	{
		var getAjaxclassone = $("#getAjaxclassone").val();
		$.ajax({
			url: getAjaxclassone, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {},
			dataType: "JSON",
			success: function(data) {
				//				console.log(data);
				//				var p = "<option id='first_op' value=''>请选择第一级编码</option>"
				//				$("#first").html(p);
				//				//将获取到的数据赋值
				//				for(var i = 0; i < data.length; i++) {
				//					//拼接option标签的 name value 等属性
				//					var p = "<option value='" +
				//						data[i]['id'] +
				//						"'" +
				//						">" +
				//						data[i].number + ': ' + data[i]['nameus'] +
				//						"</option>";
				//					$("#first_op").after(p);
				//				}

			}
		})

	}

	function getAjaxclasstwo() //二级编码
	{
		var getAjaxclasstwo = $("#getAjaxclasstwo").val();
		$.ajax({
			url: getAjaxclasstwo, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				superior: $('#queryDevice').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var p = "<option id='second_op' value=''><?php echo (L("Selectsecondcode")); ?></option>"
				$("#second").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data[i]['id'] +
						"'" +
						">" +
						data[i].number + ': ' + data[i]['nameus'] +
						"</option>";
					$("#second_op").after(p);
				}

			}
		})
	}
	var pr_time = 0;
	//添加新产品
	$('#add_pr').on('click', function() {
		var now_time = new Date().getTime();
		if(now_time - pr_time < 2000) {
			console.log('点击太快')
			return false;
		} else {
			pr_time = now_time;
			console.log(pr_time)
			var addAjaxProduct = $("#addAjaxProduct").val();
			if($("#queryDevice").val() == "" || $("#second").val() == "" || $("input[name='name']").val() == "" || $("input[name='shortname']").val() == "") {
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').html('<?php echo (L("Requiredfield")); ?>');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none';", 2000);
				return false;
			} else if($.trim($("input[name='shortname']").val()).length > 16) {
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').html('简称最多16位字节');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none';", 2000);
				return false;
			}
			$.ajax({
				url: addAjaxProduct, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				data: {
					bclass: $("#queryDevice").val(),
					sclass: $("#second").val(),
					name: $("input[name='name']").val(),
					weight: $("input[name='weight']").val(),
					shortname: $("input[name='shortname']").val(),
					long: $("input[name='long']").val(),
					width: $("input[name='width']").val(),
					height: $("input[name='height']").val(),
					keywords_id: $('#getAjaxKeywords').val()
				},
				dataType: "JSON",
				success: function(data) {
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('<?php echo (L("Addsuccessfully")); ?>');
					$('#node_modal').modal('toggle');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				}
			})
		}
	})
	//产品简称检测
	function productshortname() {
		var productshortname = $("#productshortname").val();
		$.ajax({
			url: productshortname, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				name: $("input[name='shortname']").val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == 'can') {
					$('#shortname_check').html('<span style="color:#5cb85c;"><?php echo (L("Namecanused")); ?></span>');
				} else {
					$('#shortname_check').html('<span style="color:red;"><?php echo (L("Duplicateproduct")); ?></span>');
				}
			}
		})
	}
	//产品检测
	function productname() {
		var productname = $("#productname").val();
		$.ajax({
			url: productname, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				name: $("input[name='name']").val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == 'can') {
					$('#name_check').html('<span style="color:#5cb85c;"><?php echo (L("Namecanused")); ?></span>');
				} else {
					$('#name_check').html('<span style="color:red;"><?php echo (L("Duplicate_product_name")); ?></span>');
				}

			}
		})
	}

	function key_words() {
		console.log(1111)
		console.log($('#getAjaxKeywords').val());
		console.log($('#key_words input').val());
		var kkk = $('#key_words input').val();
		if($.trim(kkk)== ""){
			$('#node_message').text('<?php echo (L("label_cannot_empty")); ?>');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 1500);
			return false;
		};
		var aaa;
		if($('#getAjaxKeywords').val() == null){
			aaa = [];
		}else{
			aaa = $('#getAjaxKeywords').val();
		};
		 
		$.ajax({
			url: "<?php echo U('Product/ajaxAddKeywords');?>", //通过JQ获取URL获得路径
			data: {
				keywords: kkk
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式(
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == 0) {
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').text('<?php echo (L("Keyword_repetition")); ?>，<?php echo (L("add_failed")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else {
					if(t) {
						clearTimeout(t)
					};
					aaa.push(data.id);
					$('#node_message').text('<?php echo (L("Addsuccessfully")); ?>');
					node_message.style.display = 'block';
					var deviceStr1 = "<option value=''><?php echo (L("Add_label")); ?></option>";
					$.ajax({
						url: "<?php echo U('Product/getAjaxKeywords');?>", //通过页面元素的ID来获取设备ID
						type: "post", //选择传值方式
						data: {},
						dataType: "JSON",
						success: function(data) {
							console.log(data);
							for(var i = 0; i < data.length; i++) {
								deviceStr1 += "<option value='" +
									data[i].id +
									"'" +
									">" +
									data[i].name +
									"</option>";
							}
							$("#getAjaxKeywords").html("");
							$('#getAjaxKeywords').append(deviceStr1);
							$('#getAjaxKeywords').selectpicker({
								noneSelectedText: '<?php echo (L("Add_label")); ?>'
							});
							console.log(aaa);
							$('#getAjaxKeywords').val(aaa);
							$('#getAjaxKeywords').selectpicker('refresh');	
						}
					})
					var t = setTimeout("node_message.style.display='none';", 2000);
				}
			}
		})
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