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
            <!--<script src="../../../../Public/FirstEdition/assets/shu/boot/bootstrap-treeview.js"></script>-->
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-treeview.js">
</script>
<!--高亮显示当前标签目录-->
<script>
	$('#262').parents('li').addClass('nav-active')
	$('#262').parents('li').addClass('nav-expanded')
</script>
<style>
	#staff span {
		display: inline-block;
		width: 74px;
		padding-left: 5px;
	}
	
	#staff div {
		margin-bottom: 10px;
	}
</style>
<input type="hidden" id="getplatformurl" value="<?php echo U('Organizationt/getOrganizationAjax','','');?>">
<input type="hidden" id="getCompany" value="<?php echo U('Organizationt/getUser','','');?>">
<!--新建节点-->
<input type="hidden" id="addCompany" value="<?php echo U('Organizationt/addCompany','','');?>">
<!--新建职位-->
<input type="hidden" id="addPosition" value="<?php echo U('Organizationt/addPosition','','');?>">
<!--删除节点-->
<input type="hidden" id="dellCompany" value="<?php echo U('Organizationt/dellCompany','','');?>">
<!--获取节点所有父级-->
<input type="hidden" id="getCompanyPath" value="<?php echo U('Organizationt/getCompanyPath','','');?>">
<!--修改信息-->
<input type="hidden" id="saveEmployee" value="<?php echo U('Organizationt/saveEmployee','','');?>">
<!--父节点ID-->
<input type="hidden" id="nodeid" value="3" />
<!--调动员工-->
<input type="hidden" id="gettransfer" value="<?php echo U('Organizationt/gettransfer','','');?>">
<input type="hidden" id="getOrganized" value="<?php echo U('Organizationt/getOrganized','','');?>">
<input type="hidden" id="transferDo" value="<?php echo U('Organizationt/transferDo','','');?>">
<!--修改部门-->
<input type="hidden" id="getDepartment" value="<?php echo U('Organizationt/getDepartment','','');?>">
<!--移除员工-->
<input type="hidden" id="getremoveUser" value="<?php echo U('Organizationt/removeUser','','');?>">
<!--获取公司下员工姓名-->
<input type="hidden" id="getUname" value="<?php echo U('Organizationt/getUname','','');?>">
<!--获取所有员工-->
<input type="hidden" id="getStaffs" value="<?php echo U('Organizationt/getStaffs','','');?>">
<!--添加公司-->
<input type="hidden" id="addCompanys" value="<?php echo U('Organizationt/addCompanys','','');?>">
<!--获取职位-->
<input type="hidden" id="getPosition" value="<?php echo U('Organizationt/getPosition','','');?>">
<!--修改职位-->
<input type="hidden" id="updatePosition" value="<?php echo U('Organizationt/updatePosition','','');?>">
<!--删除职位-->
<input type="hidden" id="delPosition" value="<?php echo U('Organizationt/delPosition','','');?>">
<div class="row">
	<div class="col-md-12">
		<header class="">
			<h3 class="">
				<?php echo (L("Organization")); ?>
			</h3>
		</header>
		<section class="panel">
			<div class="panel-body" style="float: left;width: 38%;">
				<input type="hidden" id="subdivisions" value="<?php echo (L("Subdivisions")); ?>">
				<input type="hidden" id="subordinateposition" value="<?php echo (L("Subordinateposition")); ?>">
				<input type="text" id="search" style="display: inline-block;width: 40%;margin-bottom: 20px;float: left;" class="form-control" placeholder="<?php echo (L("Pleaseenterthequerycontent")); ?>">
				<button class="btn btn-success" onclick="search()" style="float: left;margin-left: 10px;"><?php echo (L("Search")); ?></button>
				<button class="btn btn-primary" onclick="addcompanyo()" style="float: left;margin-left: 10px;"><?php echo (L("Newcompany")); ?></button>
				<br style="clear: both;" />
				<div id="treeview1" class="" style="width:100%;"></div>
				<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
			</div>
			<div id="org_modal" class="panel-body" style="width: 60%;float: right;display: none;">
				<h4 style="margin-top: 0;margin-bottom: 20px;">
					<ol id="parent_level1" class="breadcrumb" style="background: #fff;margin-bottom: 0;">
					</ol>
				</h4>
				<input type="hidden" id="positiondid" value="">
				<input type="hidden" value="" id="lavel2">
				<input type="hidden" value="" id="companyc">
				<div class="row" style="line-height: 34px;">
					<div class="col-md-2 text-right" style="padding: 0;"><?php echo (L("chinese_name")); ?>：</div>
					<div class="col-md-4">
						<div id="ch_name" style="margin-bottom: 10px;height: 34px;color: #222;"></div>
					</div>
					<div class="col-md-2 text-right" style="padding: 0;"><?php echo (L("english_name")); ?>：</div>
					<div class="col-md-4">
						<div id="en_name" style="margin-bottom: 10px;height: 34px;color: #222;"></div>
					</div>
					<div id="form_choose">
						<div class="col-md-2 text-right" style="padding: 0;"><?php echo (L("Principal")); ?>：</div>
						<div class="col-md-4">
							<a href="" id="linkman"></a>
							<!--<div id="linkman" style="margin-bottom: 10px;height: 34px;color: #222;"></div>-->
						</div>
						<div class="col-md-2 text-right" style="padding: 0;"><?php echo (L("Phone")); ?>：</div>
						<div class="col-md-4">
							<div id="tel" style="margin-bottom: 10px;height: 34px;color: #222;"></div>
						</div>
						<div class="col-md-2 text-right" style="padding: 0;" id="country1"><?php echo (L("Country")); ?>：</div>
						<div class="col-md-10">
							<div id="country2" style="margin-bottom: 10px;height: 34px;color: #222;"></div>
						</div>
						<div class="col-md-2 text-right" style="padding: 0;" id="addess"><?php echo (L("Address")); ?>：</div>
						<div class="col-md-10">
							<div id="address" style="margin-bottom: 10px;height: 34px;color: #222;"></div>
						</div>
					</div>
				</div>
				<table id="table_s1" class="table" style="text-align: center;">
					<thead>
						<tr>
							<th style="text-align: center;width: 20%;"><?php echo (L("n_ame")); ?></th>
							<th style="text-align: center;width: 25%;"><?php echo (L("Position")); ?></th>
							<th style="text-align: center;width: 25%;"><?php echo (L("Phone")); ?></th>
							<th style="text-align: center;width: 30%;"><?php echo (L("Operation")); ?></th>
						</tr>
					</thead>
					<tbody id="staff">

					</tbody>
				</table>
				<div id="underling" style="border-bottom: 1px solid #e5e5e5;margin-bottom: 16px;margin-left: 15px;font-size: 16px;line-height: 30px;"><?php echo (L("Subordinateposition")); ?>：</div>
				<div id="puisne" style="margin: 0 0 20px 0;">
				</div>
				<div style="text-align: right;">
					<button id="create_child1" class="btn btn-success" onclick="getCompanyPath(1)"><?php echo (L("Newdepartment")); ?></button>
					<button id="create_child2" class="btn btn-success" onclick="getCompanyPath(2)"><?php echo (L("Newposition")); ?></button>
					<button id="table_s" class="btn btn-info"><?php echo (L("JobResponsibilities")); ?></button>
					<button class="btn btn-primary" onclick="getCompanyPath2()"><?php echo (L("Modify")); ?></button>
					<button class="btn btn-danger" onclick="dellCompany()"><?php echo (L("Delete")); ?></button>
					<button type="button" class="btn btn-default" onclick="$('#org_modal').css('display','none');"><?php echo (L("Cancel")); ?></button>
				</div>
			</div>
		</section>
	</div>
</div>
<div id="code_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<?php echo (L("Newcompany")); ?>
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<div class="row">
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Chinesename")); ?></span>
						<input id="china_n" class="form-control" />
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Engname")); ?></span>
						<input id="eng_n" class="form-control" />
					</div>
					<div id="form_choose5">
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
							<span class="input-group-addon"><?php echo (L("Principal")); ?></span>
							<select id="contact_uu" class="form-control" onchange="personAjax()">
							</select>
						</div>
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
							<span class="input-group-addon"><?php echo (L("Employeecode")); ?></span>
							<input class="form-control" id="numbering" readonly="readonly" />
						</div>
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
							<span class="input-group-addon"><?php echo (L("Phone")); ?></span>
							<select id="tel_uu" class="form-control">
							</select>
						</div>
						<input id="persname" type="hidden" />
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Country")); ?></span>
						<select id="country" class="form-control">
							<?php if(is_array($countrylist)): foreach($countrylist as $key=>$or): ?><option value="<?php echo ($or["id"]); ?>"><?php echo ($or["countryzh"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
						<span class="input-group-addon"><?php echo (L("Address")); ?></span>
						<input id="address_uu" class="form-control" />
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="addCompanyuu()"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!--修改弹框-->
<div id="change_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<ol id="parent_level2" class="breadcrumb" style="background: #fff;margin-bottom: 0;">
					</ol>
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<div class="row">
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Chinesename")); ?></span>
						<input id="change_ch_name" class="form-control" />
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Engname")); ?></span>
						<input id="change_en_name" class="form-control" />
					</div>
					<div id="form_choose2">
						<input type="hidden" id="contactsd" value="">
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
							<span class="input-group-addon"><?php echo (L("Principal")); ?></span>
							<select id="contacts" class="form-control" onchange="utelAjax()">
							</select>
						</div>
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
							<span class="input-group-addon"><?php echo (L("Employeecode")); ?></span>
							<input class="form-control" id="numberin" readonly="readonly" />
						</div>
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
							<span class="input-group-addon"><?php echo (L("Phone")); ?></span>
							<select id="change_tel" class="form-control">
							</select>
						</div>

						<div id="address3">
							<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
								<span class="input-group-addon"><?php echo (L("Address")); ?></span>
								<input id="change_address" class="form-control" />
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="saveEmployee()"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div id="lode_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<ol id="parent_level3" class="breadcrumb" style="background: #fff;margin-bottom: 0;">
					</ol>
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<input type="hidden" id="" name="nodesid" value="">
				<div class="row">
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
						<span class="input-group-addon"><?php echo (L("Chinesename")); ?></span>
						<input class="form-control" id="chname" />
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
						<span class="input-group-addon"><?php echo (L("Engname")); ?></span>
						<input class="form-control" id="egname" />
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="addCompany(2)"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<div id="sode_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<ol id="parent_level5" class="breadcrumb" style="background: #fff;margin-bottom: 0;">
					</ol>
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<input type="hidden" id="userid" value="">
				<div class="row">
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("n_ame")); ?></span>
						<input class="form-control" id="username" readonly="readonly" />
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Employeecode")); ?></span>
						<input class="form-control" id="codenumber" readonly="readonly" />
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Company")); ?></span>
						<select id="company" type="text" class="form-control" onchange="searchAjax()">
						</select>
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Department")); ?></span>
						<select id="bumen" type="text" onchange="bumenAjax()" class="form-control">
						</select>
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
						<span class="input-group-addon"><?php echo (L("position")); ?></span>
						<select id="position" type="text" class="form-control">
						</select>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="dotransFer()"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
</div>
<div id="node_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<ol id="parent_level" class="breadcrumb" style="background: #fff;margin-bottom: 0;">
					</ol>
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<div class="row">
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Chinesename")); ?></span>
						<input id="child_ch_name" class="form-control" />
					</div>
					<div class="input-group col-md-6" style="float: left;padding: 0 15px;margin-bottom: 12px;">
						<span class="input-group-addon"><?php echo (L("Engname")); ?></span>
						<input id="child_en_name" class="form-control" />
					</div>
					<div id="form_choose1">
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
							<span class="input-group-addon"><?php echo (L("Principal")); ?></span>
							<select id="child_linkman" class="form-control" onchange="unameAjax()">
							</select>
						</div>
						<div class="input-group col-md-6" style="float: left;padding: 0 15px;">
							<span class="input-group-addon"><?php echo (L("Phone")); ?></span>
							<select id="child_tel" class="form-control">
							</select>
						</div>
						<input id="child_nameuu" type="hidden" />
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" onclick="addCompany(1)"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	var type_change = "";
	var id_change = "";
	var that = "";
	//添加分公司弹框
	function addcompanyo() {
		$('#numbering').val('');
		$('#china_n').val('');
		$('#tel_uu').val('');
		$('#eng_n').val('');
		$('#address_uu').val('');
		var url = $('#getStaffs').val();
		$.ajax({
			url: url,
			type: 'post',
			data: {
				status: 1
			},
			async: true,
			dataType: 'JSON',
			success: function(data) {
				var p = "<option id='fulcontact' value=''><?php echo (L("Pleasechoose")); ?></option>"
				$("#contact_uu").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data[i]['uid'] +
						"'" +
						">" +
						data[i]['lastnamezh'] +
						data[i]['namezh'] +
						"</option>";
					$("#fulcontact").after(p);
				}

				$('#code_modal').modal('toggle');
			}
		})
	}
	//搜索
	$('#search').on('keyup', function(event) {
		if(event.keyCode == '13') {
			search()
		}
	})
	//获取联系电话
	function personAjax() {
		var url = $('#getUname').val();
		var uid = $('#contact_uu').val();
		$.ajax({
			url: url,
			type: 'post',
			data: {
				id: uid
			},
			dataType: 'JSON',
			async: true,
			success: function(data) {
				$('#numbering').val(data['info'].numbering);
				$('#persname').val(data['info'].lastnamezh + data['info'].namezh);
				var p = "<option id='Fuldphone' value=''><?php echo (L("Pleasechoose")); ?></option>"
				$("#tel_uu").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data['contact'].length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data['contact'][i]['phone'] +
						"'" +
						">" +
						data['contact'][i]['phone'] +
						"</option>";
					$("#Fuldphone").after(p);
				}
			}
		})
	}
	//添加分公司
	function addCompanyuu() {
		var url = $('#addCompanys').val();
		$.ajax({
			url: url, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				uid: $('#contact_uu').val(),
				namezh: $('#china_n').val(),
				country: $('#country').val(),
				nameus: $('#eng_n').val(),
				address: $('#address_uu').val(),
				phone: $('#tel_uu').val()
			},
			dataType: "JSON",
			async: true,
			success: function(data) {
				if(t) {
					clearTimeout(t)
				};
				if(data == 'OK') {
					$('#node_message').html('<?php echo (L("Createdsuccessfully")); ?>');
					$('#code_modal').modal('toggle');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none'", 2000);
					platformurl();
				} else if(data == 'NO') {
					$('#node_message').html('<?php echo (L("Cannotbeempty")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none'", 2000);
				}
			}
		})
	}
	//获取员工姓名
	function unameAjax() {
		var url = $('#getUname').val();
		var uid = $('#child_linkman').val();
		$.ajax({
			url: url,
			type: 'post',
			data: {
				id: uid
			},
			async: true,
			dataType: 'JSON',
			success: function(data) {
				$('#child_nameuu').val(data['info'].lastnamezh + data['info'].namezh);
				var p = "<option id='Fulphone' value=''><?php echo (L("Pleasechoose")); ?></option>"
				$("#child_tel").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data['contact'].length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data['contact'][i]['phone'] +
						"'" +
						">" +
						data['contact'][i]['phone'] +
						"</option>";
					$("#Fulphone").after(p);
				}
			}
		})
	}

	function utelAjax() {
		var url = $('#getUname').val();
		var uid = $('#contacts').val();
		$.ajax({
			url: url,
			type: 'post',
			data: {
				id: uid
			},
			async: true,
			dataType: 'JSON',
			success: function(data) {
				$('#numberin').val(data['info'].numbering);
				$('#contactsd').val(data['info'].lastnamezh + data['info'].namezh);
				var p = "<option id='Fulphonea' value=''><?php echo (L("Pleasechoose")); ?></option>"
				$("#change_tel").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data['contact'].length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data['contact'][i]['phone'] +
						"'" +
						">" +
						data['contact'][i]['phone'] +
						"</option>";
					$("#Fulphonea").after(p);
				}
			}
		})
	}
	//调动员工
	function dotransFer() {
		var url = $("#transferDo").val();
		var company = $('#company').val();
		var bumen = $('#bumen').val();
		var position = $('#position').val();
		var uid = $('#userid').val();
		$.ajax({
			url: url, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				uid: uid,
				company: company,
				bumen: bumen,
				position: position
			},
			async: true,
			dataType: "JSON",
			success: function(data) {
				if(t) {
					clearTimeout(t)
				};
				if(data > 0) {
					$('#node_message').html('<?php echo (L("Successfultransfer")); ?>');
					$('#sode_modal').modal('toggle');
					$('#org_modal').css('display', 'none');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none'", 2000);
					platformurl();

				} else if(data == 'NO') {
					$('#node_message').html('<?php echo (L("Transferfailure")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none'", 2000);
				}

			}
		})
	}

	function searchAjax() //点击第一个搜索框
	{
		var company = $("#company").val(); //获取选择id
		var url = $("#getOrganized").val();
		$.ajax({
			url: url, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				type: 1,
				id: company
			},
			dataType: "JSON",
			async: false,
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

	// function staffAjax() //修改部门
	// {
	//     var company_id = $("#company_id").val(); //获取选择id
	//     var url = $("#getDepartment").val();
	//     $.ajax({
	//         url: url, //通过页面元素的ID来获取设备ID
	//         type: "post", //选择传值方式
	//         data: {
	//             id: company_id
	//         },
	//         dataType: "JSON",
	//         success: function(data) {
	//             console.log(data);
	//             var p = "<option id='staffbm' value=''>请选择</option>"
	//             $("#bumen").html(p);
	//             //将获取到的数据赋值
	//             for(var i = 0; i < data.length; i++) {
	//                 //拼接option标签的 name value 等属性
	//                 var p = "<option value='" +
	//                     data[i]['namezh'] +
	//                     "'" +
	//                     ">" +
	//                     data[i]['namezh'] +
	//                     "</option>";
	//                 $("#staffbm").after(p);
	//             }
	//
	//         }
	//     })
	//
	// }

	function bumenAjax() //点击第二个搜索框
	{
		var bumen = $("#bumen").val(); //获取选择id
		var url = $("#getOrganized").val();
		$.ajax({
			url: url, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				type: 2,
				id: bumen
			},
			dataType: "JSON",
			async: false,
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
	var all_child = [];
	//查询子节点
	function search() {
		var arr = [];
		var search = $('#search').val()
		if(search == "") {
			return false;
		}
		for(var i = 0; i < all_child.length; i++) {
			if(all_child[i].text.indexOf(search) > -1) {
				$('#treeview1').treeview('revealNode', [all_child[i].nodeId, {
					silent: true
				}]);
				console.log($("[data-nodeid=" + all_child[i].nodeId + "]"))
				arr.push(all_child[i].nodeId);
				//				$('#treeview1').treeview('selectNode', [ all_child[i].nodeId, { silent:true } ]);
				//				$("[data-nodeid="+all_child[i].nodeId+"]").css('fontSize','20px');
			}
		}
		console.log(arr)
		if(arr.length == 0) {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').text('<?php echo (L("Didnotfindthisinformation")); ?>');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none'", 2000);
		}
		for(var i = 0; i < arr.length; i++) {
			$("[data-nodeid=" + arr[i] + "]").css('color', 'red');
		}

	}
	//树状图数据
	function platformurl() {
		var platformurl = $("#getplatformurl").val();
		$.ajax({
			url: platformurl, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			async: true,
			success: function(data) {
				console.log(data);
				$('#treeview1').treeview({
					data: data,
					enableLinks: true
				});
				all_child = $('#treeview1').treeview('getCollapsed', 0);
				console.log(all_child)
			},
			error: function(data) {
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').html('<?php echo (L("Creationfailed")); ?>');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none'", 2000);
			}
		})
	}
	platformurl();
	//增加节点
	function addCompany(type) {
		var addCompany = $("#addCompany").val();
		console.log(addCompany);
		if($('#child_ch_name').val() == '' && type == 1) {
			if(tt) {
				clearTimeout(tt)
			};
			$('#node_message').html('<?php echo (L("Chinesenamecannotbeempty")); ?>');
			node_message.style.display = 'block';
			var tt = setTimeout("node_message.style.display='none'", 2000);
			return false;
		}
		if($('#child_en_name').val() == '' && type == 1) {
			if(tt) {
				clearTimeout(tt)
			};
			$('#node_message').html('<?php echo (L("Englishnamecannotbeempty")); ?>');
			node_message.style.display = 'block';
			var tt = setTimeout("node_message.style.display='none'", 2000);
			return false;
		}
		if($('#chname').val() == '' && type == 2) {
			if(tt) {
				clearTimeout(tt)
			};
			$('#node_message').html('<?php echo (L("Chinesenamecannotbeempty")); ?>');
			node_message.style.display = 'block';
			var tt = setTimeout("node_message.style.display='none'", 2000);
			return false;
		}
		$.ajax({
			url: addCompany, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				type: type,
				nodesid: $('#nodeid').val(),
				chname: $('#chname').val(),
				egname: $('#egname').val(),
				namezh: $('#child_ch_name').val(),
				nameus: $('#child_en_name').val(),
				// address: $('#child_address').val(),
				phone: $('#child_tel').val(),
				uid: $('#child_linkman').val()
			},
			dataType: "JSON",
			success: function(data) {
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').html('<?php echo (L("Createdsuccessfully")); ?>');
				if(type == 1) {
					$('#node_modal').modal('toggle');
					itemOnclick(that);
				} else {
					$('#lode_modal').modal('toggle');
					itemOnclick(that);
				}
				// $('#org_modal').css('display', 'none');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none'", 2000);
				platformurl();
			}
		})
	}
	//删除节点
	function dellCompany() {
		if($('#positiondid').val() == '') {
			var dellCompany = $("#dellCompany").val();
		} else {
			var dellCompany = $("#delPosition").val();
		}
		console.log(dellCompany);
		var r = confirm("<?php echo (L("Confirmdelete")); ?>")
		if(r == true) {
			$.ajax({
				url: dellCompany, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				data: {
					nodesid: $('#nodeid').val(),
					positionid: $('#positiondid').val()
				},
				async: true,
				dataType: "JSON",
				success: function(data) {
					if(t) {
						clearTimeout(t)
					};
					if(data == 'OK') {
						$('#node_message').html('<?php echo (L("Successfullydeleted")); ?>');
						$('#org_modal').css('display', 'none');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none'", 2000);
						platformurl();
					} else if(data == 'NO') {
						$('#node_message').html('<?php echo (L("cannotdeleteit")); ?>');
						$('#org_modal').css('display', 'none');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none'", 2000);
						platformurl();
					} else if(data == 'SO') {
						$('#node_message').html('<?php echo (L("cannotbedeleted")); ?>');
						$('#org_modal').css('display', 'none');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none'", 2000);
						platformurl();
					}
					//				console.log(data)
				}
			})
		} else {
			return false;
		}
	}
	//修改信息
	function saveEmployee() {
		if($('#positiondid').val() == '') {
			var saveEmployee = $("#saveEmployee").val();
		} else {
			var saveEmployee = $("#updatePosition").val();
		}
		if($('#change_ch_name').val() == '') {
			if(tt) {
				clearTimeout(tt)
			};
			$('#node_message').html('<?php echo (L("Chinesenamecannotbeempty")); ?>');
			node_message.style.display = 'block';
			var tt = setTimeout("node_message.style.display='none'", 2000);
			return false;
		}
		$.ajax({
			url: saveEmployee, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				level: $('#lavel2').val(),
				uid: $('#contacts').val(),
				nodesid: $('#nodeid').val(),
				position_id: $('#positiondid').val(),
				namezh: $('#change_ch_name').val(),
				nameus: $('#change_en_name').val(),
				address: $('#change_address').val(),
				phone: $('#change_tel').val()
			},
			dataType: "JSON",
			success: function(data) {
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').html('<?php echo (L("Successfullymodified")); ?>');
				$('#org_modal').css('display', 'none');
				$('#change_modal').modal('toggle');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none'", 2000);
				platformurl();
				//				$('#node_modal').modal('toggle');
			}
		})
	}
	//导航条
	function getCompanyPath(type) {
		var getCompanyPath = $("#getCompanyPath").val();
		console.log(getCompanyPath);
		$('#chname').val('');
		$('#egname').val('');
		$('#parent_level').empty();
		$('#parent_level3').empty();
		$('#child_ch_name').val('');
		$('#child_en_name').val('');
		$('#child_address').val('');
		$('#child_tel').val('');
		$('#child_linkman').val('');
		$.ajax({
			url: getCompanyPath, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				nodesid: $('#nodeid').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				if(type == 1) {
					$('#form_choose1').css('display', 'block');
					for(var i = data.length - 1; i > -1; i--) {
						var list = '<li>' + data[i].text + '</li>';
						$('#parent_level').append(list)
					}
					var departmenta = $("#nodeid").val(); //获取选择id
					var urla = $("#getDepartment").val();
					var companyca = $('#companyc').val();
					var type1 = $('#lavel2').val();
					$.ajax({
						url: urla, //通过页面元素的ID来获取设备ID
						type: "post", //选择传值方式
						data: {
							type: type1,
							id: departmenta,
							company: companyca
						},
						dataType: "JSON",
						success: function(data) {
							console.log(data);
							var p = "<option id='staffbmc' value=''><?php echo (L("Pleasechoose")); ?></option>"
							$("#child_linkman").html(p);
							//将获取到的数据赋值
							for(var i = 0; i < data.length; i++) {
								//拼接option标签的 name value 等属性
								var p = "<option value='" +
									data[i]['uid'] +
									"'" +
									">" +
									data[i]['lastnamezh'] +
									data[i]['namezh'] +
									"</option>";
								$("#staffbmc").after(p);
							}
							$('#node_modal').modal('toggle');
						}
					})

				} else if(type == 2) {
					for(var i = data.length - 1; i > -1; i--) {
						var list = '<li>' + data[i].text + '</li>'
						$('#parent_level3').append(list)
					}
					$('#lode_modal').modal('toggle');
				}
			}
		})
	}
	//导航条
	function getCompanyPath2() {
		$('#numberin').val('');
		var data_change = {};
		if(type_change == 3) {
			data_change = {
				type: type_change,
				oid: $('#nodeid').val(),
				nodesid: id_change
			}
		} else {
			data_change = {
				nodesid: $('#nodeid').val()
			}
		}
		var getCompanyPath = $("#getCompanyPath").val();
		console.log(getCompanyPath);
		$('#parent_level2').empty();
		$('#change_ch_name').val($('#ch_name').text());
		$('#change_en_name').val($('#en_name').text());
		$('#change_address').val($('#address').text());
		$('#change_tel').val($('#tel').text());
		$('#change_linkman').val($('#linkman').text());
		$.ajax({
			url: getCompanyPath, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: data_change,
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				// $('#company_id').val(data[0].id);
				for(var i = data.length - 1; i > -1; i--) {
					var list = '<li>' + data[i].text + '</li>'
					$('#parent_level2').append(list)
				}
				var department = $("#nodeid").val(); //获取选择id
				var url = $("#getDepartment").val();
				var companyc = $('#companyc').val();
				var type = $('#lavel2').val();
				$.ajax({
					url: url, //通过页面元素的ID来获取设备ID
					type: "post", //选择传值方式
					data: {
						type: type,
						id: department,
						company: companyc
					},
					dataType: "JSON",
					success: function(data) {
						console.log(data);
						var p = "<option id='staffbm' value=''><?php echo (L("Pleasechoose")); ?></option>"
						$("#contacts").html(p);
						//将获取到的数据赋值
						for(var i = 0; i < data.length; i++) {
							//拼接option标签的 name value 等属性
							var p = "<option value='" +
								data[i]['uid'] +
								"'" +
								">" +
								data[i]['lastnamezh'] +
								data[i]['namezh'] +
								"</option>";
							$("#staffbm").after(p);
						}
						$('#change_modal').modal('toggle');
					}
				})
			}
		})
	}
	//展开折叠事件
	function itemli(target) {
		$('#positiondid').val('');
		//找到当前节点id
		var nodeid = $(target).attr('data-nodeid');
		console.log(nodeid)
		$("[data-nodeid=" + nodeid + "]").addClass('expand-icon');
		//		$('#treeview1').treeview('toggleNodeExpanded', [ nodeid, { silent:true } ]);
	}
	//树节点弹出框
	function itemOnclick(target) {
		var subdivisions = $('#subdivisions').val();
		var subordinateposition = $('#subordinateposition').val();
		that = target;
		$('#positiondid').val('');
		document.documentElement.scrollTop = 0;
		var getCompany = $("#getCompany").val();
		var getCompanyPath = $("#getCompanyPath").val();
		//找到当前节点id
		var nodeid = $(target).parent().attr('data-nodeid');
		console.log(nodeid)
		var tree = $('#treeview1');
		//获取当前节点对象
		var node = tree.treeview('getNode', nodeid);
		$('#nodeid').val(node.id)
		console.log(node.id)
		$('#staff').empty();
		$('#puisne').empty();
		console.log(node);
		var type = "";
		$.ajax({
			url: getCompanyPath, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				nodesid: $('#nodeid').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				if(data[0].level == 1) {
					$('#underling').text(subdivisions + ':')
					type = 1;
					type_change = 1;
				} else if(data[0].level > 1) {
					$('#underling').text(subordinateposition + ':')
					type = 2;
					type_change = 2;
				}
				$('#parent_level1').empty();
				for(var i = data.length - 1; i > -1; i--) {
					var list = '<li>' + data[i].text + '</li>'
					$('#parent_level1').append(list)
				}
				$.ajax({
					url: getCompany, //通过页面元素的ID来获取设备ID
					type: "post", //选择传值方式
					data: {
						type: type,
						nodesid: node.id
					},
					async: false,
					dataType: "JSON",
					success: function(data) {
						console.log(data);
						if(data.firm[0].level == 1) {
							$('#create_child1').css('display', 'inline-block');
							$('#create_child2').css('display', 'none');
							$('#table_s').css('display', 'none');
						} else {
							$('#create_child1').css('display', 'none');
							$('#create_child2').css('display', 'inline-block');
							$('#table_s').css('display', 'inline-block');
						}
						if(type == 1) {
							$('#puisne').empty();
							$('#table_s1').css('display', 'none')
							$('#address').css('display', 'block');
							$('#addess').css('display', 'block');
							$('#form_choose').css('display', 'block');
							$('#form_choose2').css('display', 'block');
							$('#address3').css('display', 'block');
							$('#country1').css('display', 'block');
							$('#country2').css('display', 'block');
							if(data.branch.length == 0) {
								var list = '<p style="text-align: center;"><?php echo (L("NO")); ?></p>'
								$('#puisne').append(list)
							} else {
								for(var i = 0; i < data.branch.length; i++) {
									var list = '<button onclick="underling(2' + ',' + data.branch[i].id + ')" class="btn btn-default" style="margin-left:15px;">' + data.branch[i].namezh + '</button>'
									$('#puisne').append(list)
								}
							}
							if(data.country == null) {
								$('#country2').text('');
							} else {
								$('#country2').text(data.country.countryzh);
							}
							if(data.company.length == 0) {
//								$('#linkman').text('');
//								$('#tel').text('');
								$('#address').text('');
							}else {
								$('#address').text(data.company[1].value);
							}
							if(data.user == null) {
								$('#linkman').text('');
								$("#linkman").attr("target", "_blank");
								$('#tel').text('');
							}else{
								$('#tel').text(data.company[0].value);
								$('#linkman').text(data.user.lastnamezh + data.user.namezh);
								$('#linkman').attr('href', "<?php echo U('My/me');?>?nosdid=" + data.company[0].uid);
								$("#linkman").attr("target", "_blank");
							}

							$('#create_child').css('display', 'inline-block');
							$('#underling').css('display', 'block');
							$('#puisne').css('display', 'block');
						} else {
							$('#table_s1').css('display', 'table');
							$('#form_choose').css('display', 'block');
							$('#address').css('display', 'none');
							$('#addess').css('display', 'none');
							$('#form_choose2').css('display', 'block');
							$('#address3').css('display', 'none');
							$('#puisne').empty();
							$('#country1').css('display', 'none');
							$('#country2').css('display', 'none');
							if(data.position.length == 0) {
								var list = '<p style="text-align: center;"><?php echo (L("NO")); ?></p>'
								$('#puisne').append(list)
							} else {
								for(var i = 0; i < data.position.length; i++) {
									var list = '<button onclick="underling(3' + ',' + data.position[i].id + ',' + data.position[i].oid + ')" class="btn btn-default" style="margin-left:15px;">' + data.position[i].namezh + '</button>'
									$('#puisne').append(list)
								}
							}
							if(data.staff.length == 0) {
								var list = '<tr style="text-align: center;"><td colspan="4"><?php echo (L("NO")); ?><td></tr>'
								$('#staff').append(list)
							} else {
								for(var i = 0; i < data.staff.length; i++) {
									var list = '<tr style="text-align: center;"><td>' + data.staff[i].lastnamezh + data.staff[i].namezh + '</td>' +
										'<td>' + data.staff[i].namezw + '</td>' +
										'<td>' + data.staff[i].phone + '</td>' +
										'<td><button class="btn btn-primary btn-xs"  onclick="option(' + data.staff[i].uid + ')"><?php echo (L("Details")); ?></button> <button class="btn btn-primary btn-xs" onclick="transfer(' + data.staff[i].uid + ')"><?php echo (L("Transfer")); ?></button></td></tr>'
									$('#staff').append(list)
								}
							}
							if(data.company.length == 0) {
								$('#linkman').text('');
								$('#tel').text('');
								$('#address').text('');
							} else if(data.user == null) {

								$('#linkman').text('');
								$("#linkman").attr("target", "_blank");
								$('#tel').text('');
							} else {
								$('#linkman').text(data.user.lastnamezh + data.user.namezh);
								$('#linkman').attr('href', "<?php echo U('My/me');?>?nosdid=" + data.company[0].uid);
								$("#linkman").attr("target", "_blank");
								$('#tel').text(data.company[0].value);
							}
							$('#create_child').css('display', 'inline-block');
							$('#underling').css('display', 'block');
							$('#puisne').css('display', 'block');
						}
						$('#ch_name').text(data.firm[0].namezh);
						$('#en_name').text(data.firm[0].nameus);
						$('#lavel2').val(data.firm[0].level);
						$('#companyc').val(data.firm[0].fatherid);
						$('#org_modal').css('display', 'block');
					}
				})
			}
		})

	}

	function option(a) {
		// window.location.href = "/InternalSystem/index.php/Home/my/me?nosdid=" + a
		// window.open("/InternalSystem/index.php/Home/my/me?nosdid=" + a, "_blank");
		var form = $("<form method='post' target='_blank'></form>");
		var url = "<?php echo U('My/me');?>";
		form.attr({
			"action": url
		});

		var input = $("<input type='hidden' name='nosdid'>");
		input.val(a);
		form.append(input);
		console.log(input.val());
		$("html").append(form);
		form.submit();
	}
	//移除员工
	function removeUser(id) {
		var r = confirm("确定移除吗？");
		var url = $('#getremoveUser').val();
		if(r == true) {
			$.ajax({
				url: url,
				type: 'post',
				data: {
					id: id
				},
				async: true,
				dataType: 'JSON',
				success: function(data) {
					if(t) {
						clearTimeout(t)
					};
					console.log(data)
					if(data > 0) {
						$('#node_message').html('移除成功');
						$('#org_modal').css('display', 'none');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none'", 2000);
						platformurl();
					}
				}
			})
		}
	}
	//调动员工
	function transfer(id) {
		$('#company').val('');
		$('#bumen').val('');
		$('#position').val('');
		var getCompanyPath3 = $('#getCompanyPath').val();
		var getOrganized = $('#getOrganized').val();
		$('#userid').val(id);
		$.ajax({
			url: getCompanyPath3, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				nodesid: $('#nodeid').val(),
			},
			async: true,
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				$('#parent_level5').empty();
				for(var i = data.length - 1; i > -1; i--) {
					var list = '<li>' + data[i].text + '</li>'
					$('#parent_level5').append(list)
				}
				$.ajax({
					url: getOrganized, //通过页面元素的ID来获取设备ID
					type: "post", //选择传值方式
					data: {
						id: id,
						type: 3
					},
					async: true,
					dataType: "JSON",
					success: function(data) {
						console.log(data)
						$('#username').val(data['one'].lastnamezh + data['one'].namezh);
						$('#positionu').val(data['one'].nameuh);
						$('#codenumber').val(data['one'].numbering);
						var p = "<option id='fulcompany' value=''><?php echo (L("Pleaseselectacompany")); ?></option>"
						$("#company").html(p);
						//将获取到的数据赋值
						for(var i = 0; i < data['company'].length; i++) {
							//拼接option标签的 name value 等属性
							var p = "<option value='" +
								data['company'][i]['id'] +
								"'" +
								">" +
								data['company'][i]['namezh'] +
								"</option>";
							$("#fulcompany").after(p);
						}
						$('#sode_modal').modal('toggle');	
						$('#company').val(data['one'].company_id);
						searchAjax();
						$('#bumen').val(data['one'].organization_id);
						bumenAjax();
						$('#position').val(data['one'].position_id);	
					}

				})
			}

		})
	}

	function underling(type1, id, oid) {
		var subdivisions = $('#subdivisions').val();
		var subordinateposition = $('#subordinateposition').val();
		if(type1 == 2) {
			$('#nodeid').val(id);
		} else if(type1 == 3) {
			$('#positiondid').val(id);
		}
		var data1 = "";
		if(oid == undefined) {
			data1 = {
				type: type1,
				nodesid: id
			}
		} else {
			data1 = {
				type: type1,
				id: id,
				oid: oid
			}
		}
		console.log(oid);
		$('#staff').empty();
		$('#puisne').empty();
		var getCompanyPath = $("#getCompanyPath").val();
		var getCompany = $("#getCompany").val();
		$.ajax({
			url: getCompanyPath, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				nodesid: id,
				type: type1,
				oid: oid
			},
			async: true,
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				if(data[0].level == 1) {
					$('#underling').text(subdivisions + ':');
					type = 1;
					type_change = 1;
				} else if(data[0].level > 1) {
					$('#underling').text(subordinateposition + ':');
					type = 2;
					type_change = 2;
				}
				$('#parent_level1').empty();
				for(var i = data.length - 1; i > -1; i--) {
					var list = '<li>' + data[i].text + '</li>'
					$('#parent_level1').append(list)
				}
				$.ajax({
					url: getCompany, //通过页面元素的ID来获取设备ID
					type: "post", //选择传值方式
					data: data1,
					dataType: "JSON",
					async: true,
					success: function(data) {
						console.log(data);
						if(data.firm[0].level == 1) {
							$('#create_child1').css('display', 'inline-block');
							$('#create_child2').css('display', 'none');
							$('#table_s').css('display', 'none');
						} else {
							$('#create_child1').css('display', 'none');
							$('#create_child2').css('display', 'inline-block');
							$('#table_s').css('display', 'inline-block');
						}
						if(type1 == 2) {
							$('#table_s1').css('display', 'table')
							$('#form_choose').css('display', 'block');
							$('#form_choose2').css('display', 'block');
							$('#address3').css('display', 'none');
							$('#puisne').empty();
							if(data.position.length == 0) {
								var list = '<p style="text-align: center;"><?php echo (L("NO")); ?></p>'
								$('#puisne').append(list)
							} else {
								for(var i = 0; i < data.position.length; i++) {
									var list = '<button onclick="underling(3' + ',' + data.position[i].id + ',' + data.position[i].oid + ')" class="btn btn-default" style="margin-left:15px;">' + data.position[i].namezh + '</button>'
									$('#puisne').append(list)
								}
							}
							if(data.staff.length == 0) {
								var list = '<tr style="text-align: center;"><td colspan="4"><?php echo (L("NO")); ?><td></tr>'
								$('#staff').append(list)
							} else {
								for(var i = 0; i < data.staff.length; i++) {
									var list = '<tr style="text-align: center;"><td>' + data.staff[i].lastnamezh + data.staff[i].namezh + '</td>' +
										'<td>' + data.staff[i].namezw + '</td>' +
										'<td>' + data.staff[i].phone + '</td>' +
										'<td><button class="btn btn-primary btn-xs"  onclick="option(' + data.staff[i].uid + ')"><?php echo (L("Details")); ?></button> <button class="btn btn-primary btn-xs" onclick="transfer(' + data.staff[i].uid + ')"><?php echo (L("Transfer")); ?></button></td></tr>'
									$('#staff').append(list)
								}
							}
							$('#linkman').text(data.company[1].value);
							$('#tel').text(data.company[0].value);
							// $('#address').text(data.company[1].value);
							$('#create_child').css('display', 'inline-block');
							$('#underling').css('display', 'block');
							$('#puisne').css('display', 'block');
						} else {
							type_change = 3;
							id_change = id;
							$('#create_child').css('display', 'none');
							$('#create_child2').css('display', 'none');
							$('#underling').css('display', 'none');
							$('#puisne').css('display', 'none');
							$('#form_choose').css('display', 'none');
							$('#form_choose2').css('display', 'none');
							if(data.staff.length == 0) {
								var list = '<tr style="text-align: center;"><td colspan="4"><?php echo (L("NO")); ?><td></tr>'
								$('#staff').append(list)
							} else {
								for(var i = 0; i < data.staff.length; i++) {
									var list = '<tr style="text-align: center;"><td>' + data.staff[i].lastnamezh + data.staff[i].namezh + '</td>' +
										'<td>' + data.staff[i].namezw + '</td>' +
										'<td>' + data.staff[i].phone + '</td>' +
										'<td><button class="btn btn-primary btn-xs"  onclick="option(' + data.staff[i].uid + ')"><?php echo (L("Details")); ?></button> <button class="btn btn-primary btn-xs" onclick="transfer(' + data.staff[i].uid + ')"><?php echo (L("Transfer")); ?></button></td></tr>'
									$('#staff').append(list)
								}
							}
						}
						$('#ch_name').text(data.firm[0].namezh);
						$('#en_name').text(data.firm[0].nameus);
						$('#lavel2').val(data.firm[0].level);
						$('#companyc').val(data.firm[0].fatherid);
						$('#org_modal').css('display', 'block');
					}
				})
			}
		})
	}

	//  function underling1(id, oid){
	//  	var getCompanyPath = $("#getCompanyPath").val();
	//      var getCompany = $("#getCompany").val();
	//  	var data1 = {
	//              type: '3',
	//              id: id,
	//              oid: oid
	//         };
	//         $.ajax({
	//          url: getCompanyPath, //通过页面元素的ID来获取设备ID
	//          type: "post", //选择传值方式
	//          data: {
	//              nodesid: id,
	//              type: '3',
	//              oid: oid
	//          },
	//          dataType: "JSON",
	//          success: function(data) {
	//              console.log(data)
	//              $.ajax({
	//                  url: getCompany, //通过页面元素的ID来获取设备ID
	//                  type: "post", //选择传值方式
	//                  data: data1,
	//                  dataType: "JSON",
	//                  success: function(data) {
	//                      console.log(data);
	//                     }
	//               })
	//              }
	//          })
	//  	
	//  }
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