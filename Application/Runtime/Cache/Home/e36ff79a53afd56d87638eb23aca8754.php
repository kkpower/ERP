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
            ﻿<script>
	$('#93').parents('li').addClass('nav-active')
	$('#93').parents('li').addClass('nav-expanded')
</script>
<style>
html.fixed .content-body {
		margin-left: 265px;
		margin-right: 15px;
		margin-top: -5px;
	}
</style>
<div class="row" xmlns="http://www.w3.org/1999/html">
	<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
	<div class="col-md-6">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>
				<h2 class="panel-title"><?php echo (L("First")); ?></h2>

			</header>
			<input type="hidden" name='getid' value="<?php echo U('Product/separate','','');?>">
			<div class="panel-body">
				<div class="col-sm-1 " style="width: auto;padding-left: 0;">
					<input type="hidden" name='13' value="<?php echo U('Product/addclass','','');?>">
					<button class="center-block btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="adclass(1)">
                            <?php echo (L("Addfirst")); ?>
                        </button>
				</div>
				<form class="form-horizontal" action="<?php echo U('Product/productCoding','','');?>" method="post">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="<?php echo (L("Codeorname")); ?>" name="numbera" value="<?php echo ($sear); ?>">
						<span class="input-group-btn">
						<button style="white-space: nowrap;" class="btn btn-success" type="submit">
							<?php echo (L("Search")); ?>
						</button>
					</span>
					</div>
					<!-- /input-group -->
				</form>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover mb-none table-striped" style="text-align: center">
						<thead>
							<tr>
								<th style="text-align: center"><?php echo (L("Code")); ?></th>
								<th style="text-align: center"><?php echo (L("Namecode")); ?></th>
								<th style="text-align: center"><?php echo (L("Operation")); ?></th>
							</tr>
						</thead>
						<tbody>
							<input type="hidden" name='getcalss' value="<?php echo U('Product/getclassify','','');?>">
							<input type="hidden" name='getcalssid' value="<?php echo U('Product/getclassifyid','','');?>">
							<?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr>
									<td><?php echo ($vo["number"]); ?></td>
									<td><?php echo ($vo["nameus"]); ?></td>
									<td>
										<button type="button" title="<?php echo (L("Modify")); ?>" class="btn btn-primary btn-xs" onclick="adclass(2,'<?php echo ($vo["id"]); ?>')">
										  <span class="glyphicon glyphicon-pencil"></span>
										</button>
										<button type="button" title="<?php echo (L("Delete")); ?>" class="btn btn-danger btn-xs" onclick="deltwoclass(1,'<?php echo ($vo["id"]); ?>')">
										  <span class="glyphicon glyphicon-trash"></span>
										</button>
										<button type="button" title="<?php echo (L("Nextcode")); ?>" class="btn btn-info btn-xs" id="numberid" onclick="sonclass(this,'<?php echo ($vo["id"]); ?>')">
										  <span class="glyphicon glyphicon-arrow-right"></span>
										</button>
									
										<!--<button type="button" data-toggle="modal" class="btn btn-primary btn-xs" onclick="adclass(2,'<?php echo ($vo["id"]); ?>')">
                                        <?php echo (L("Modify")); ?>
                                    </button>
										<button type="button" style="margin-left:10px;" id="numberid" onclick="sonclass(this,'<?php echo ($vo["id"]); ?>')" class="btn btn-info btn-xs">
                                        <?php echo (L("Nextcode")); ?>
                                    </button>-->
									</td>
								</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
	<div class="col-md-6" id="cc" style="display: none;">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" onclick="$('#cc').css('display','none')"></a>
				</div>
				<h2 class="panel-title"><?php echo (L("Second")); ?></h2>
				<p style="font-size: 14px;margin: 0;line-height: 22px;"><?php echo (L("First")); ?>：<span id="father_id" style="color: red;"></span></p>
				<p style="font-size: 14px;margin: 0;line-height: 22px;"><?php echo (L("Namecode")); ?>：<span id="father_name" style="color: red;"></span></p>
			</header>
			<input type="hidden" name='getid' value="<?php echo U('Product/separate','','');?>">
			<div class="panel-body">
				<div class="col-sm-1 " style="width: auto;padding-left: 0;">
					<input type="hidden" id="ccsx" />
					<input type="hidden" name='twonumber' value="<?php echo U('Product/addtwoclass','','');?>">
					<button class="center-block btn btn-primary"  data-toggle="modal" data-target="#myModal" onclick="twoclass(1)">
                            <?php echo (L("Addsecond")); ?>
                        </button>
				</div>
				<div class="input-group">
					<input id="twodata" type="text" class="form-control" placeholder="<?php echo (L("Codeorname")); ?>" name="twonumbera">
					<input type="hidden" class="form-control" id='twonu' placeholder="请输入中文名称" name="fnumber">
					<span class="input-group-btn">
                        <input type="hidden" name='gettwoid' value="<?php echo U('Product/twodata','','');?>">
						<button style="white-space: nowrap;"  class="btn btn-success" type="button" onclick="twodata()">
							<?php echo (L("Search")); ?>
						</button>
					</span>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover mb-none table-striped">
						<thead>
							<tr>
								<th><?php echo (L("Code")); ?></th>
								<th><?php echo (L("Namecode")); ?></th>
								<th><?php echo (L("Operation")); ?></th>
							</tr>
						</thead>
						<tbody id="xx">
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
				<h4 class="modal-title" id="myModalLabel">
                </h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="<?php echo U('Product/addclass','','');?>" method="post" autocomplete="off">
					<div class="input-group" style="padding: 0 20px 0;">
						<span class="input-group-addon"><?php echo (L("Firstengname")); ?></span>
						<input type="text" class="form-control" name="nameus" required  placeholder="<?php echo (L("Englishname")); ?>">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Primarycode")); ?></span>
						<input type="text" class="form-control" id="maxnumber" placeholder="<?php echo (L("Pleaseentercode")); ?>" onkeyup="value=value.replace(/[^\d]/g,'')" name="number" maxlength="3" required unselectable="on">
					</div>
					<input type="hidden" id="id" name="id" value="">
					<input type="hidden" name='adclass' value="<?php echo U('Product/addclass','','');?>">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="addnumber()"><?php echo (L("Save")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="classtwoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
				<h4 class="modal-title" id="twoModal">
                </h4>
			</div>
			<div class="modal-body">
				<div class="input-group" style="padding: 0 20px 0;">
					<span class="input-group-addon"><?php echo (L("Primarycode")); ?></span>
					<input type="text" class="form-control" id='two'  name="fnumbert" unselectable="on" required readonly="readonly">
				</div>
				<div class="input-group" style="padding: 20px 20px 0;">
					<span class="input-group-addon"><?php echo (L("Secondcode")); ?></span>
					<input type="text" class="form-control" placeholder="<?php echo (L("Pleaseentercode")); ?>" onkeyup="value=value.replace(/[^\d]/g,'')" name="numbert" maxlength="3" required unselectable="on">
				</div>
				<div class="input-group" style="padding: 20px 20px 0;">
					<span class="input-group-addon"><?php echo (L("Secondengname")); ?></span>
					<input type="text" class="form-control" placeholder="<?php echo (L("Englishname")); ?>" name="nameust" placeholder="<?php echo (L("Englishname")); ?>" required>
				</div>

				<input type="hidden" id="tid" name="id" value="">
				<input type="hidden" name='adtwoclass' value="<?php echo U('Product/addtwoclass','','');?>">
			</div>
			<div class="modal-footer">

				<button type="button" add class="btn btn-primary" id="add_second" onclick="addtwonumber()"><?php echo (L("Save")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="classtwoModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
				<h4 class="modal-title" id="twoModal">
                </h4>
			</div>
			<div class="modal-body">
				<div class="input-group" style="padding: 0 20px 0;">
					<span class="input-group-addon"><?php echo (L("Primarycode")); ?></span>
					<input type="text" class="form-control" id="two1"  name="fnumbert1" unselectable="on" required readonly="readonly">
				</div>
				<div class="input-group" style="padding: 20px 20px 0;">
					<span class="input-group-addon"><?php echo (L("Secondcode")); ?></span>
					<input type="text" class="form-control" placeholder="<?php echo (L("Pleaseentercode")); ?>" onkeyup="value=value.replace(/[^\d]/g,'')" name="numbert1" maxlength="3" required unselectable="on">
				</div>
				<div class="input-group" style="padding: 20px 20px 0;">
					<span class="input-group-addon"><?php echo (L("Secondengname")); ?></span>
					<input type="text" class="form-control" placeholder="<?php echo (L("Englishname")); ?>" name="nameust1" placeholder="<?php echo (L("Englishname")); ?>" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" add class="btn btn-primary" id="add_second1" onclick="addSecondaryCode()"><?php echo (L("Save")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script>
	/* $('#aa').on('click',function(){
					     $('#cc').css('display','block')
					     })*/
	var btn1;
	function sonclass(obj,id) {
		var cid = $('input[name="getcalss"]').val();
		$("#ccsx").val(id);
		btn1 = obj;
		$('#xx').empty();
		$('#twodata').val('');
		$('#twonu').val(id);
		console.log($(obj).parents('tr').find('td').eq(1).text())
		$('#father_id').html($(obj).parents('tr').find('td').eq(0).text());
		$('#father_name').html($(obj).parents('tr').find('td').eq(1).text());
		$.ajax({
			url: cid, //通过JQ获取URL获得路径
			data: {
				id: id
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式(
			dataType: "JSON",
			success: function(data) {
				if(data) {
					console.log(data);
					$('#cc').css('display', 'block');
					$('#two').val(data[data.length - 1].number);
					$('#two1').val(data[data.length - 1].number);
//					$('#twonu').val(data[data.length - 1].number);
					for(var i = 0; i < data.length - 1; i++) {
						var list = '<tr><td>' + data[i].number + '</td><td>' + data[i].nameus + '</td>' +
							'<td><button type="button" title="<?php echo (L("Modify")); ?>" class="btn btn-primary btn-xs" onclick="twoclass(2,' + data[i].id + ')"><span class="glyphicon glyphicon-pencil"></span></button>'
							+' <button type="button" title="<?php echo (L("Delete")); ?>" class="btn btn-danger btn-xs" onclick="deltwoclass(2,' + data[i].id + ')"><span class="glyphicon glyphicon-trash"></span></button>'
							+'</td></tr>';
						$('#xx').append(list);
					}

				}
			}
		})
		$(window).scrollTop(0);
	}
	$('#twodata').on('keyup', function(event) {
		if(event.keyCode == '13') {
			twodata();
		}
	})
	function twodata() {
		var tid = $('input[name="gettwoid"]').val();
		var aaa = $("input[name='twonumbera']").val();
//		$('#twonumbera').val(aaa);
		console.log(aaa);
		//       console.log(tid);
		$('#xx').empty();
		$.ajax({
			url: tid, //通过JQ获取URL获得路径
			data: {
				twonumber: $("input[name='twonumbera']").val(),
				fnumber: $("input[name='fnumber']").val()
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式(
			dataType: "JSON",
			success: function(data) {
				if(data) {
					console.log(data);
					$('#cc').css('display', 'block');
					for(var i = 0; i < data.length; i++) {
						var list = '<tr><td>' + data[i].number + '</td><td>' + data[i].nameus + '</td>' +
							'<td>  <button type="button"data-toggle="modal" class="btn btn-primary btn-xs" onclick="twoclass(2,' + data[i].id + ')">修改</button></td></tr>';
						$('#xx').append(list);
					}

				}
			}
		})
	}

	function adclass(type, id) {
		if(type == 1) {
			$("#myModalLabel").text("<?php echo (L("Addcode")); ?>");
			var aa = $("[name='13']").val();
			console.log(aa);
			$.ajax({
				url: aa, //通过JQ获取URL获得路径
				type: "post", //选择传值方式
				dataType: "JSON",
				success: function(data) {
					if(data) {
						console.log(data);
						$("input[name='number']").val(data['datalist']);
						$("input[name='nameus']").val("");
						$('#classModal').modal('toggle');
					}
				}
			})
		}
		if(type == 2) {
			$("#myModalLabel").text("<?php echo (L("Modifycode")); ?>");
			var url = $("[name='getcalssid']").val();
			$.ajax({
				url: url, //通过JQ获取URL获得路径
				data: {
					id: id
				}, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				dataType: "JSON",
				success: function(data) {
					if(data) {
						console.log(data);
						$("input[name='id']").val(data.id);
						$("input[name='nameus']").val(data.nameus);
						$("input[name='number']").val(data.number);
						$('#classModal').modal('toggle'); //点开或者关闭模态窗
					}
				}
			})
		}
	}
	//删除
	function deltwoclass(type,id){
		var r =confirm('确定删除吗');
		if( r == true){
			$.ajax({
				url: "<?php echo U('Product/dellSecondaryCode');?>", //通过JQ获取URL获得路径
				type: "post", //选择传值方式
				data: {
					id:id
				},
				dataType: "JSON",
				success: function(data) {
					console.log(data);
					if(data > 0){
						if(type == 2){
							$('#node_message').html('删除成功');
							node_message.style.display = 'block';
							var t = setTimeout("node_message.style.display='none';", 2000);
							sonclass(btn1,$('#ccsx').val());
						}else{
							$('#node_message').html('删除成功');
							node_message.style.display = 'block';
							var t = setTimeout("node_message.style.display='none';location.reload();", 1500);
						}
						
					}else if(data == 'failure'){
						$('#node_message').html('已有下级编码，无法删除');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
					}
				}
			})
		}
	}
	function twoclass(type, id) {
		var zz = $('#ccsx').val();
		if(type == 1) {
			$("#twoModal").text("<?php echo (L("Addsecondcode")); ?>");
			var aa = $("[name='twonumber']").val();
//			$("input[name=namezht]").val("");
			$("input[name=nameust1]").val("");
			$("input[name=numbert1]").val("");
			//   $('#classtwoModal').modal('toggle');
			$.ajax({
				url: aa, //通过JQ获取URL获得路径
				type: "post", //选择传值方式
				data: {
					cid: zz
				},
				dataType: "JSON",
				success: function(data) {
					if(data) {
						$("input[name='numbert1']").val(data['datalist']);
						$('#classtwoModal1').modal('toggle'); //点开或者关闭模态窗
						/* $(function () { $('#classtwoModal').on('hide.bs.modal', function () {
						 location.reload();})
						 });*/
					}
				}
			}) //点开或者关闭模态窗
		}
		if(type == 2) {
			$("#twoModal").text("<?php echo (L("Modifysecondarycode")); ?>");
			var url2 = $("[name='getcalssid']").val();
			$.ajax({
				url: url2, //通过JQ获取URL获得路径
				data: {
					id: id
				}, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				dataType: "JSON",
				success: function(data) {
					if(data) {
						console.log(data);
						$("input[name='id']").val(data.id);
						$("input[name='namezht']").val(data.namezh);
						$("input[name='nameust']").val(data.nameus);
						$("input[name='numbert']").val(data.number);
						$('#classtwoModal').modal('toggle'); //点开或者关闭模态窗
					}
				}
			})
		}
	}
	//添加编码
	function addnumber() {

		var add = $("[name='adclass']").val();
		var nameus = $("input[name=nameus]").val();
		var number = $("input[name=number]").val();
		var id = $("#id").val();
		if(nameus == "" || number == "") {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').html('<?php echo (L("Requiredfield")); ?>');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 2000);
			return false;
		}
		$.ajax({
			url: add, //通过JQ获取URL获得路径
			data: {
				nameus: nameus,
				number: number,
				id: id
			},
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if (data.status==0){
					$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='ok') {
					$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				}else if(data['info']=='of'){
					$('#node_message').html('<?php echo (L("primary_code_repeat")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='ko'){
					$('#node_message').html('<?php echo (L("Cannotbeempty")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='no'){
					$('#node_message').html('<?php echo (L("Save_failed")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='lo'){
					$('#node_message').html('<?php echo (L("primary_code_repeat")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='us'){
					$('#node_message').html('<?php echo (L("first_level_duplication")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='ao'){
					$('#node_message').html('<?php echo (L("primary_code_or_english_duplication")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='bo'){
					$('#node_message').html('<?php echo (L("secondary_coding")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}
			}
		}) //点开或者关闭模态窗
	}

	function addtwonumber() {
		var add = $("[name='adtwoclass']").val();
		var fnumber = $("input[name=fnumbert]").val();
		var nameus = $("input[name=nameust]").val();
		var number = $("input[name=numbert]").val();
		var id = $("#tid").val();
		if(fnumber == "" || nameus == "" || number == "") {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').html('<?php echo (L("Requiredfield")); ?>');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 2000);
			return false;
		}
		$.ajax({
			url: add, //通过JQ获取URL获得路径
			data: {
				fnumber: fnumber,
				nameus: nameus,
				number: number,
				id: id
			},
			type: "post", //选择传值方式
			dataType: "JSON",
			beforeSend: function () {
			    // 禁用按钮防止重复提交
			    $("#add_second").attr({ disabled: "disabled" });
			},
			success: function(data) {
				if (data.status==0){
					$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='ok') {
					$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='ko'){
					$('#node_message').html('<?php echo (L("Cannotbeempty")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='no'){
					$('#node_message').html('<?php echo (L("Save_failed")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='lo'){
					$('#node_message').html('<?php echo (L("secondary_code_already_exists")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='us'){
					$('#node_message').html('<?php echo (L("secondary_code_duplication")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}
				sonclass(btn1,$('#ccsx').val());
				$('#classtwoModal').modal('toggle');
			},
			  complete: function(){
			      $("#add_second").removeAttr('disabled');
			    }
   
		}) //点开或者关闭模态窗
	}
	
	//保存二级编码
	function addSecondaryCode() {
		var add = "<?php echo U('Product/addSecondaryCode','','');?>";
		var fnumber = $("input[name=fnumbert1]").val();
		var nameus = $("input[name=nameust1]").val();
		var number = $("input[name=numbert1]").val();
		var id1 = $("#ccsx").val();
		if(fnumber == "" || nameus == "" || number == "") {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').html('<?php echo (L("Requiredfield")); ?>');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 2000);
			return false;
		}
		$.ajax({
			url: add, //通过JQ获取URL获得路径
			data: {
				//一级编码
				fnumber: fnumber,
				nameus: nameus,
				//二级编码
				number: number,
				//一级编码id
				id: id1
			},
			type: "post", //选择传值方式
			dataType: "JSON",
			beforeSend: function () {
			    // 禁用按钮防止重复提交
			    $("#add_second1").attr({ disabled: "disabled" });
			},
			success: function(data) {
				if (data.status==0){
					$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='ok') {
					$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
					node_message.style.display = 'block';
//					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='ko'){
					$('#node_message').html('<?php echo (L("Cannotbeempty")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='no'){
					$('#node_message').html('<?php echo (L("Save_failed")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='lo'){
					$('#node_message').html('<?php echo (L("secondary_code_already_exists")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data['info']=='us'){
					$('#node_message').html('<?php echo (L("secondary_code_duplication")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}
				sonclass(btn1,$('#ccsx').val());
				$('#classtwoModal1').modal('toggle');
			},
			  complete: function(){
			      $("#add_second1").removeAttr('disabled');
			    }
   
		}) //点开或者关闭模态窗
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