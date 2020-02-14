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
                            <?php if((LANG_SET) == "en-us"): echo $_SESSION['user_info']['lastname'].$_SESSION['user_info']['name'];?>
                            <?php else: ?>
                                <?php echo $_SESSION['user_info']['namezh'].$_SESSION['user_info']['lastnamezh']; endif; ?>
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
	$('#74').parents('li').addClass('nav-active')
	$('#74').parents('li').addClass('nav-expanded')
</script>
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.css" />
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.css" />
<input id="searchAjax" type="hidden" value="<?php echo U('Employeelist/getAjaxOrganization','','');?>">
<input type="hidden" id="addUser" value="<?php echo U('System/addUser','','');?>">
<input type="hidden" id="editUser" value="<?php echo U('System/editUser','','');?>">
<!--获取角色-->
<input type="hidden" id="getuserRole" value="<?php echo U('System/getuserRole','','');?>">
<!--获取组织架构-->
<input type="hidden" id="getOrganizationt" value="<?php echo U('System/getOrganizationt','','');?>">
<input type="hidden" name='getUser' value="<?php echo U('System/getUser','','');?>">
<input type="hidden" id="delUser" value="<?php echo U('System/delUser','','');?>">
<style>
	select {
		padding: 5px;
		height: auto;
		border: 1px solid #ccc;
		margin-right: 10px;
	}
	
	.modal-dialog {
		margin: 60px auto !important;
	}
	
	html.fixed .content-body {
		margin-left: 265px;
		margin-right: 15px;
		margin-top: -5px;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>

				<h2 class="panel-title"><?php echo (L("Usermanagement")); ?></h2>
			</header>
			<div class="panel-body" style="padding-bottom: 0;">
				<form class="form-horizontal" action="<?php echo U('System/usermanagement','','');?>" method="POST" style="display: inline-block;float: left;">
					<div class="input-group" style="width: 500px;">
						<span class="input-group-addon"><?php echo (L("Useraccount")); ?></span>
						<input type="text" name="uname" class="form-control" placeholder="<?php echo (L("PleaseEnterTheAccountnumber")); ?>" value="<?php echo ($name); ?>">
						<span class="input-group-btn">
						<button type="submit" class="btn btn-success" style="white-space: nowrap;"><?php echo (L("Search")); ?></button>
							<!-- <button id="search" type="submit" class="btn btn-success"><?php echo (L("Search")); ?></button>-->
                </span>
					</div>

					<!--<div class="row">
						<label style="width: auto;" class="col-sm-1 control-label"><?php echo (L("Useraccount")); ?>：</label>
						<div class="col-sm-3">
							<input type="text" name="uname" class="form-control" placeholder="<?php echo (L("PleaseEnterTheAccountnumber")); ?>" required>
						</div>
						<div style="min-width: 98px;" class="col-sm-1 ">
							<button id="search" type="submit" class="center-block btn btn-primary"><?php echo (L("Search")); ?></button>
						</div>

					</div>-->
					<!--  <div class="form-group">
                        <label class="col-md-3 control-label">状态：</label>
                        <div class="col-md-6">
                            <select id="search_payType" name="status"  data-plugin-selecttwo="" class="form-control populate" >
                                <option value="0">&#45;&#45;请选择&#45;&#45;</option>
                                    <option value="1}">启用</option>
                                    <option value="2}">暂停</option>
                            </select>
                        </div>
                    </div>-->
				</form>
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="showUserModal(1)" style="margin-left: 16px;">
					<?php echo (L("Addusers")); ?>
				</button>
				<div>
					<table id="table1" class="table table-hover table-striped table-bordered" style="border-collapse: collapse;">
						<thead>
							<tr>
								<th style="text-align: center;"><?php echo (L("Id")); ?></th>
								<th style="text-align: center;"><?php echo (L("Useraccount")); ?></th>
								<th style="text-align: center;"><?php echo (L("Role")); ?></th>
								<th style="text-align: center;"><?php echo (L("Operation")); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($userinfo)): foreach($userinfo as $key=>$vo): ?><tr>
									<td><?php echo ($key+1); ?></td>
									<td><?php echo ($vo["uname"]); ?></td>
									<td>
										 <?php if((LANG_SET) == "en-us"): echo ($vo["role_nameus"]); else: echo ($vo["role_name"]); endif; ?>
									</td>
									<td>
										<button type="button" title="<?php echo (L("Modify")); ?>" class="btn btn-primary btn-xs" data-toggle="modal" onclick="showUserModal(2,'<?php echo ($vo["uid"]); ?>')"><span class="glyphicon glyphicon-pencil"></span></button>
										<button type="button" title="<?php echo (L("Delete")); ?>" class="btn btn-danger btn-xs" onclick="delUsers('<?php echo ($vo["uid"]); ?>')"><span class="glyphicon glyphicon-trash"></span></button>
									</td>
								</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>

		</section>
	</div>
</div>

<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title"><?php echo (L("Modify")); ?> <?php echo (L("User")); ?></h4>
			</div>
			<div class="modal-body">
				<div class="input-group" style="padding: 0 20px 0;">
					<span class="input-group-addon"><span style="color: red;">*</span><?php echo (L("Username")); ?></span>
					<input type="hidden" id="uid">
					<input type="text" class="form-control" name="uname" id="unamec" placeholder="<?php echo (L("PleaseEnterTheAccountnumber")); ?>">
				</div>
				<div class="input-group" style="padding: 20px 20px 0;">
					<span class="input-group-addon"><span style="color: red;">*</span><?php echo (L("Userpassword")); ?></span>
					<input type="text" class="form-control" name="pwd" id="pwdc" placeholder="<?php echo (L("PleaseInputPassword")); ?>">
				</div>
				<div class="input-group" style="padding: 20px 20px 0;">
					<span class="input-group-addon"><span style="color: red;">*</span><?php echo (L("Userrole")); ?></span>
					<select name="role_id" id="role_idc" class="form-control">
						<option value=""><?php echo (L("Pleasechoose")); ?></option>
						<?php if(is_array($roleinfo)): foreach($roleinfo as $key=>$r): ?><option value='<?php echo ($r["id"]); ?>'>
								<?php if(($_COOKIE['think_language']) == "en-us"): echo ($r["role_nameus"]); ?>
										<?php else: ?> <?php echo ($r["role_name"]); endif; ?>
								<!--<?php echo ($r["role_name"]); ?>-->
							</option><?php endforeach; endif; ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" onclick="editUser()"><?php echo (L("Sub")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Close")); ?></button>
				<!-- <button type="button" class="btn btn-primary">
                     提交更改
                 </button>-->
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 660px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="userModalLabel"><?php echo (L("Addusers")); ?></h4>
			</div>
			<form class="form-horizontal" onsubmit="return addUser(this)">
				<div class="modal-body">
					<div class="input-group" style="padding: 0 20px 0;margin-bottom: 20px;">
						<select id="leader" name="company_id" onchange="searchAjax()">
							<option value=""><?php echo (L("Pleaseselectacompany")); ?></option>
							<?php if(is_array($organization)): foreach($organization as $key=>$or): ?><option value="<?php echo ($or["id"]); ?>">
									<?php if(($_COOKIE['think_language']) == "en-us"): echo ($or["nameus"]); ?>
										<?php else: ?> <?php echo ($or["namezh"]); endif; ?>
								</option><?php endforeach; endif; ?>
						</select>
						<select id="bumen" name="organization_id" onchange="bumenAjax()">
						</select>
						<select id="position" name="position_id" onchange="positionAjax()">
						</select>
						<!--<select id="zhiwu" name="position">-->
						<!--</select>-->
					</div>
					<div class="input-group" style="padding: 0 20px 0;">
						<span class="input-group-addon"><span style="color: red;">*</span><?php echo (L("Username")); ?></span>
						<input type="text" class="form-control" name="uname" placeholder="<?php echo (L("PleaseEnterTheAccountnumber")); ?>" required="required">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><span style="color: red;">*</span><?php echo (L("Userpassword")); ?></span>
						<input type="text" class="form-control" name="pwd" placeholder="<?php echo (L("PleaseInputPassword")); ?>" required="required">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><span style="color: red;">*</span><?php echo (L("Usercode")); ?></span>
						<input type="text" class="form-control" name="numbering" placeholder="User coding" required="required">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><span style="color: red;">*</span><?php echo (L("Userrole")); ?></span>
						<select name="roleid" id="role_id" class="form-control" required="required">
							<option value=""><?php echo (L("Pleasechoose")); ?></option>
							<?php if(is_array($roleinfo)): foreach($roleinfo as $key=>$r): ?><option value='<?php echo ($r["id"]); ?>'><?php echo ($r["role_name"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Englishsurname")); ?></span>
						<input type="text" class="form-control" name="lastname" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Engname")); ?></span>
						<input type="text" class="form-control" name="name" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Chinesesurname")); ?></span>
						<input type="text" class="form-control" name="lastnamezh" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Chinesename")); ?></span>
						<input type="text" class="form-control" name="namezh" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Sex")); ?></span>
						<span class="form-control">
						<label for="man1"><input style="vertical-align: top;" type="radio" name="sex" value="1" checked="checked"/><?php echo (L("Man")); ?></label>
						<label for="woman1"><input style="vertical-align: top;margin-left: 15px;" id="woman1" type="radio" name="sex" value="2"/><?php echo (L("Woman")); ?></label>
						</span>
					</div>
					<div id="add_tel">
						<div class="input-group" style="padding: 20px 20px 0;">
							<span class="input-group-addon"><?php echo (L("Phonenumber")); ?></span>
							<input type="text" class="form-control" name="contact[]" placeholder="">
						</div>
					</div>
					<div onclick="add_tel()" class="btn btn-primary" style="margin-top: 10px;margin-left: 20px;"><?php echo (L("Addphone")); ?></div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Email")); ?></span>
						<input type="email" class="form-control" name="email" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Idcard")); ?></span>
						<input type="text" class="form-control" name="identity" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Introduction")); ?></span>
						<input type="text" class="form-control" name="remarks" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Bankaccount")); ?></span>
						<input type="text" class="form-control" name="account" placeholder="">
					</div>
					<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Bank")); ?></span>
						<input type="text" class="form-control" name="bank" placeholder="">
					</div>
					<!--<div class="input-group" style="padding: 20px 20px 0;">
                                            <span class="input-group-addon">用户姓名:</span>
                                            <select name="ualias" id="ualias" class="form-control">
                                                <option>请选择</option>
                                                <?php if(is_array($userinfoid)): foreach($userinfoid as $key=>$uinfoid): ?><option value='<?php echo ($uinfoid["id"]); ?>'><?php echo ($uinfoid["lastname"]); echo ($uinfoid["name"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>-->
					<!--<div class="input-group" style="padding: 20px 20px 0;">
						<span class="input-group-addon"><?php echo (L("Usersuperior")); ?>:</span>
						<select name="fname" id="fname" class="form-control">
							<option>请选择</option>
							<?php if(is_array($fidinfo)): foreach($fidinfo as $key=>$ufid): ?><option value='<?php echo ($ufid["fid"]); ?>'><?php echo ($ufid["uname"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>-->
					<!--<div class="form-group">
						<label class="col-sm-3 control-label">用户电话:</label>
						<div class="col-sm-9">

							<input type="text" class="form-control" name="call" id="call">
						</div>
					</div>-->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><?php echo (L("Sub")); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Close")); ?></button>
					<!-- <button type="button" class="btn btn-primary">
                         提交更改
                     </button>-->
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>

</div>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.js"></script>
<script>
	$(document).ready(function() {
		$('#table1').DataTable({
			"paging": false,
			"lengthChange": false,
			"info": false,
			"searching": false
		});
	});

	function searchAjax() //点击第一个搜索框
	{
		var leader = $("#leader").val(); //获取选择id
		var url = $("#searchAjax").val();
		$.ajax({
			url: url, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				type: 1,
				leader: leader
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var p = "<option id='Fulcrum' value=''><?php echo (L("Pleaseselectdepartment")); ?></option>"
				$("#bumen").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data[i]['id'] +
						"'" +
						">" +
						data[i]['namezh'] +
						"</option>";
					$("#Fulcrum").after(p);
				}

			}
		})

	}

	function bumenAjax() //点击第二个搜索框
	{
		var leader = $("#bumen").val(); //获取选择id
		var url = $("#searchAjax").val();
		$.ajax({
			url: url, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				type: 2,
				leader: leader
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var p = "<option id='element' value=''><?php echo (L("Pleaseselectposition")); ?></option>"
				$("#position").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data[i]['id'] +
						"'" +
						">" +
						data[i]['namezh'] +
						"</option>";
					$("#element").after(p);
				}

			}
		})
	}

	function positionAjax() //第三级的下拉
	{
		var leader = $("#position").val(); //获取选择id
		var url = $("#searchAjax").val();
		$.ajax({
			url: url, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				leader: leader
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var p = "<option id='ozhi' value=''>请选择职务</option>"
				$("#zhiwu").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data[i]['id'] +
						"'" +
						">" +
						data[i]['namezh'] +
						"</option>";
					$("#ozhi").after(p);
				}

			}
		})
	}

	function addUser(form) {
		var url = $('#addUser').val();
		$.ajax({
			url: url,
			type: 'post',
			data: $(form).serialize(),
			dataType: 'JSON',
			success: function(data) {
				console.log(data);
				if(data.status == 0) {
					$('#node_message').html('您没有该操作权限');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data == "OK") {
					$('#node_message').html('添加成功');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				} else if(data == "NO") {
					$('#node_message').html('不能为空');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}
			}
		});
		return false;
	}

	function editUser() {
		var url = $('#editUser').val();
		if($('#unamec').val() == "" || $('#pwdc').val() == "" || $('#role_idc').val() == "") {
			$('#node_message').html('内容不能为空');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 2000);
			return false;
		}
		$.ajax({
			url: url,
			type: 'post',
			data: {
				uid: $('#uid').val(),
				uname: $('#unamec').val(),
				pwd: $('#pwdc').val(),
				role_id: $('#role_idc').val()
			},
			dataType: 'JSON',
			success: function(data) {
				if(data.status == 0) {
					$('#node_message').html('您没有该操作权限');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data == "OK") {
					$('#node_message').html('修改成功');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				} else if(data == "NO") {
					$('#node_message').html('带星号*不能为空');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}
			}
		});
		return false;
	}

	function delUsers(uid) {
		var delUserUrl = $('#delUser').val();
		//console.log(delUserUrl);
		var r = confirm('<?php echo (L("Confirmdelete")); ?>');
		if(r == true) {
			$.ajax({
				url: delUserUrl, //通过JQ获取URL获得路径
				data: {
					uid: uid
				}, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				dataType: "JSON",
				success: function(data) {
					console.log(data);
					if(data.info) {
						$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
						return false;
					} else if(data == 'OK') {
						$('#node_message').html('<?php echo (L("Successfullydeleted")); ?>');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
					}
				}
			})
		} else {
			return false;
		}
	}
	//增加电话号码
	function add_tel() {
		var list = '<div class="input-group" style="padding:0 20px;"><span class="input-group-addon">电话号码</span><input type="text" name="contact[]" class="form-control" placeholder=""></div>'
		$('#add_tel').append(list)
	};
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