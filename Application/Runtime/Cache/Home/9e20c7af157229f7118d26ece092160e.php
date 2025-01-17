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
                            <a role="menuitem" tabindex="-1" href="<?php echo U('My/me');?>"><i class="fa fa-user"></i><?php echo (L("personal_information")); ?></a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="<?php echo U('System/proving');?>"><i class="fa fa-lock"></i><?php echo (L("Userpassword")); ?></a>
                        </li>
                        <!--<li>
                            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                        </li>-->
                        <li>
                            <a role="menuitem" tabindex="-1" href="<?php echo U('Login/loginOut','','');?>"><i class="fa fa-power-off"></i><?php echo (L("Sign_out")); ?></a>
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
            <script src="/InternalSystem/Public/js/zen.js"></script>
<script>
	$('#87').parents('li').addClass('nav-active')
	$('#87').parents('li').addClass('nav-expanded')
</script>
<style>
	button{
		white-space: nowrap !important;
	}
	table th{
		white-space: nowrap !important;
	}
</style>
<!-- ZUI 标准版压缩后的 CSS 文件 -->
<input type="hidden" id="url" value="<?php echo U('product/html','','');?>">

<!-- ZUI Javascript 依赖 jQuery -->
<!--<script src="//cdn.bootcss.com/zui/1.8.1/lib/jquery/jquery.js"></script>-->
<!-- ZUI 标准版压缩后的 JavaScript 文件 -->
<!--<script src="//cdn.bootcss.com/zui/1.8.1/js/zui.min.js"></script>-->
<!--ajax获取子目录的地址-->
<input type="hidden" id="classaddurl" value="<?php echo U('Product/getclassAjax','','');?>">

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>
				<h2 class="panel-title"><?php echo (L("Template")); ?></h2>
			</header>
			<input type="hidden" name='getid' value="<?php echo U('Product/separate','','');?>">
			<div class="panel-body">
					<form class="form-horizontal" action="<?php echo U('Product/template','','');?>" method="POST" style="display: inline-block;float: left;">
						<div class="input-group" style="width: 500px;">
							<span class="input-group-addon"><?php echo (L("Producttemplatelookup")); ?>：</span>
							<input type="text" name="name" class="form-control" placeholder="请输入<?php echo (L("Template")); ?>名称">
							<span class="input-group-btn">
						<button id="search" type="submit" class="btn btn-success" style="white-space: nowrap;"><?php echo (L("Search")); ?></button>
                </span>
						</div>
					</form>
						<button class="btn btn-primary" onclick="mymodal()" style="margin-left: 16px;">
							<?php echo (L("Newtemplate")); ?>
						</button>

			</div>
			<input type="hidden" name='gethtdata' value="<?php echo U('Product/getHtmldata','','');?>">
			<input type="hidden" name='delhtmllist' value="<?php echo U('Product/delHtml','','');?>">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover mb-none table-striped">
						<thead>
							<tr>
								<th><?php echo (L("Id")); ?></th>
								<th><?php echo (L("Templatename")); ?></th>
								<th><?php echo (L("Delete")); ?></th>
								<th><?php echo (L("Templatepreview")); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
									<td><?php echo ($key+1); ?></td>
									<td><?php echo ($vo["number"]); ?></td>
									<td>
										<button type="button" class="btn btn-danger btn-sm" onclick='delHtmodata("<?php echo ($vo["number"]); ?>")'><?php echo (L("Delete")); ?></button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='omodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>1</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='tmodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>2</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='thmodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>3</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='fmodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>4</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='fimodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>5</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='smodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>6</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='semodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>7</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='emodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>8</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='nmodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>9</button>
									</td>
									<td>
										<button class="btn btn-primary btn-sm" onclick='temodal("<?php echo ($vo["number"]); ?>")'><?php echo (L("Template")); ?>10</button>
									</td>

									<!--<td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"  onclick=""><?php echo (L("Modify")); ?></button>
                                </td>-->
								</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
					<div class="pager"><?php echo ($page); ?></div>
				</div>
			</div>
		</section>
	</div>
	<!--表单提交-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="width: 90%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">
						请输入内容
					</h4>
				</div>
				<div class="modal-body">
					<form id="form" class="form-horizontal" action="<?php echo U('product/addProduct');?>" method="POST">
						<table style="font-family: Arial, Verdana, sans-serif; font-size: 12px; font-color: #FFFFFF" align="center" border="0" width="100%">
							<tbody>
								<tr height="10">
									<td>请输入产品名称：<input type="text" name="number" /></td>
								</tr>
								<tr>
									<td>
										<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
									</td>
								</tr>
								<tr valign="top">
									<td>
										<table align="center" border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
											<tbody>
												<tr>
													<td width="35%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" board="0" align="middle" width="400">
														<input type="text" name="imgone" style="width: 300px;left: 50px;position: absolute;top: 45%;" placeholder="图片1" />
													</td>
													<td width="50%">
														<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
															<tbody>
																<tr height="200">
																	<td id="product_one">
																		标题1：<input type="text" name="otitle1" style="width: 80%;" />
																		<p></p>
																		副标题1：<input type="text" name="otitle2" style="width: 80%;" />
																		<p></p>
																		内容1：<input type="text" name="ocontent1" style="width: 80%;" />
																		<p></p>
																		内容2：<input type="text" name="ocontent1" style="width: 80%;" />
																	</td>
																</tr>
																<tr valign="top">
																	<td>
																		<table style="border-width:1px;border-color:#DCDCDC;border-style:solid;background: #F5F5F5;" align="center" cellpadding="20" cellspacing="0" width="400">
																			<tbody>
																				<tr>
																					<td id="product_two" style="padding: 10px 0 10px 10px;">
																						<span id="add_content2" style="margin-right: 10px;display: inline-block;font-size:18px;padding: 4px 10px;border: 1px solid #bbb;cursor: pointer;font-weight: normal;background: #e5e5e5;margin-bottom: 20px;">加内容</span>
																						<span id="recall2" style="margin-right: 10px;display: inline-block;font-size:18px;padding: 4px 10px;border: 1px solid #bbb;cursor: pointer;font-weight: normal;background: #e5e5e5;">撤回</span>
																						<br />
																						<div>内容1：<input type="text" name="tcontent1" style="width: 80%;margin-bottom: 4px;" /></div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
																<tr height="100">
																	<td id="product_three">
																		<font color="#708090"><i><b>Packing Included</b></i></font>
																		<p></p>
																		<span id="add_content3" style="margin-right: 10px;display: inline-block;font-size:18px;padding: 4px 10px;border: 1px solid #bbb;cursor: pointer;font-weight: normal;background: #e5e5e5;margin-bottom: 20px;">加内容</span>
																		<span id="recall3" style="margin-right: 10px;display: inline-block;font-size:18px;padding: 4px 10px;border: 1px solid #bbb;cursor: pointer;font-weight: normal;background: #e5e5e5;">撤回</span>
																		<br />
																		<div>内容1：<input type="text" name="thcontent1" style="width: 80%;margin-bottom: 4px;" /></div>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
													<td width="25%">
														<table style="height:300;border-color:#DCDCDC;border-left-style:solid;border-width:1px" align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
															<tbody>
																<tr height="100" valign="top">
																	<td>
																		<img src="https://www.yellow-price.com/ypadmin/i/1416550239.jpg" board="0" width="180">
																		<p></p>
																		<font color="#708090">
																			<b>World's Leading OnLine Seller</b>
																		</font>
																		<br>
																		<font color="#708090" size="2">
																			Powered by Yellow-Price Inc.
																		</font>
																	</td>
																</tr>
																<tr height="200" valign="top">
																	<td>
																		<table style="border-width:1px;border-color:#DCDCDC;border-style:solid;background: #F5F5F5;" align="center" cellpadding="20" cellspacing="0" width="180">
																			<tbody>
																				<tr>
																					<td>
																						<font color="#708090" size="2">
																							<ul>
																								<li>An eCommerce leader specializing in high quality cables, components and accessories for computer and consumer electronics. Established in 2010, we have built our reputation by the word of our customers.</li>
																							</ul>
																						</font>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
									</td>
								</tr>
								<tr valign="center">
									<td>
										<table align="center" border="0" cellpadding="15" cellspacing="0" height="400" width="100%">
											<tbody>
												<tr>

													<td width="65%" id="product_four">
														<span id="add_title4" style="margin-right: 10px;display: inline-block;font-size:18px;padding: 4px 10px;border: 1px solid #bbb;cursor: pointer;font-weight: normal;background: #e5e5e5;margin-bottom:20px;">加标题</span>
														<span id="add_content4" style="margin-right: 10px;display: inline-block;font-size:18px;padding: 4px 10px;border: 1px solid #bbb;cursor: pointer;font-weight: normal;background: #e5e5e5;">加内容</span>
														<span id="recall4" style="margin-right: 10px;display: inline-block;font-size:18px;padding: 4px 10px;border: 1px solid #bbb;cursor: pointer;font-weight: normal;background: #e5e5e5;">撤回</span>
													</td>
													<font color="red" size="3"><b>注意：<input type="text" name="caution" style="width: 30%;"/></b></font>
													<td align="center" width="35%" style="position: relative;">
														<font color="#708090">now better than ever</font>
														<p></p>
														<img src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" valign="center" board="0" width="90%">
														<input type="text" name="img2" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片2" />
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr height="10">
									<td><br></td>
								</tr>
								<tr>
									<td>
										<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
									</td>
								</tr>
								<tr valign="top">
									<td>
										<table border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
											<tbody>
												<tr valign="bottom">
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1481098036.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img3" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片3" />
													</td>
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1435116709.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img4" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片4" />
													</td>
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617054.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img5" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片5" />
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr height="10">
									<td><br></td>
								</tr>
								<tr>
									<td>
										<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
									</td>
								</tr>
								<tr valign="top">
									<td>
										<table border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
											<tbody>
												<tr valign="bottom">
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617142.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img6" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片6" />
													</td>
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617081.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img7" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片7" />
													</td>
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617000.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img8" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片8" />
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr height="10">
									<td><br></td>
								</tr>
								<tr>
									<td>
										<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
									</td>
								</tr>
								<tr valign="top">
									<td>
										<table border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
											<tbody>
												<tr valign="bottom">
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617006.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img9" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片9" />
													</td>
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617049.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img10" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片10" />
													</td>
													<td width="33%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1509617087.jpg" valign="bottom" board="0" width="100%">
														<input type="text" name="img11" style="width: 80%;left: 10%;position: absolute;top: 45%;" placeholder="图片11" />
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr height="10">
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>
										<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
									</td>
								</tr>
								<tr height="10">
									<td><br></td>
								</tr>
								<tr valign="top">
									<td>
										<table align="center" border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
											<tbody>
												<tr valign="center">
													<td width="65%">
														<font size="2">
															<b><font color="#708090">Yes, We Wanna Be Your Friend!</font></b>
															<p></p>
															Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.
															<p></p>
															<b><font color="#708090">We Ship Locally, From Same Country</font></b>
															<p></p>
															<ul>
																<li><b><font color="#708090">American Orders:</font></b> Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</li>
																<li><b><font color="#708090">Canadian Orders:</font></b> Ship from Toronto, Ontario by Canada Post Lettermail
																	<font color="red">(No tracking available)</font>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
																<li><b><font color="#708090">Australian Orders:</font></b> Ship from Sydney, NSW by Australia Post Lettermail
																	<font color="red">(No tracking available)</font>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
																&nbsp;
																<li>To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</li>
																<li>Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</li>
																<li>Please understand that occasional delays due to carriers and mails are beyond our control.</li>
															</ul>
															<p></p>
															<b><font color="#708090">We Provide Local Warranty</font></b>
															<p></p>
															Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.
															<p></p>
															<b><font color="#708090">30 Days No Reason Return, and We Pay</font></b><br>
															<ul>
																<li>You have 30 days to return the item, we pay return postage and no any questions</li>
																<li>Full refund is guaranteed</li>
																<li>Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</li>
															</ul>

														</font>
													</td>
													<td align="center" width="35%">
														<font color="#708090">
															<img src="https://www.yellow-price.com/ypadmin/i/1462335557.jpg" valign="center" board="0" width="100%">
														</font>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr height="10">
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>
										<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
									</td>
								</tr>
								<tr valign="top">
									<td>
										<table align="center" border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
											<tbody>
												<tr valign="top">
													<td width="35%" style="position: relative;">
														<img src="https://www.yellow-price.com/ypadmin/i/1452751566.jpg" valign="center" board="0" width="90%">
														<input type="text" name="img12" style="width: 70%;left: 10%;position: absolute;top: 45%;" placeholder="图片12" />
													</td>
													<td width="40%">
														<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
															<tbody>
																<tr height="200">
																	<td>
																		<b>Quality Guaranteed</b>
																		<p></p>
																		<font color="#708090" size="2">
																			Only Premium Materials
																		</font>
																		<p></p>
																		<font size="2">
																			Our premium materials and advanced technology prevent you from any quality issues.
																		</font>
																		<p></p>
																		<font color="#708090" size="2">
																			Peace of Mind Included
																		</font>
																		<p></p>
																		<font size="2">
																			Every purchase includes our worry-free 6-month warranty and lifetime technical support. If you have any questions, our friendly customer service team will be more than happy to help out.
																		</font>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
													<td width="25%">
														<table style="height:300;border-color:#DCDCDC;border-left-style:solid;border-width:1px" align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
															<tbody>
																<tr height="300" valign="top">
																	<td>

																		<b>Worry Free Buy</b>
																		<p></p>
																		<table style="border-width:1px;border-color:#DCDCDC;border-style:solid;" align="center" bgcolor="#F5F5F5" cellpadding="20" cellspacing="0" width="180">
																			<tbody>
																				<tr>
																					<td>
																						<font color="#708090" size="2">
																							<ul>
																								<li>Ship-Out within one business day, ZERO handling fee</li>
																								<li>Free Local Shipping, Expedited Shipping Available</li>
																								<li>Seller-provided Warranty, No need to contact manufacturer</li>
																								<li>30-days no reason return, ZERO restock fee</li>
																							</ul>
																						</font>
																					</td>
																				</tr>
																			</tbody>
																		</table>

																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>

								</tr>
								<tr>
									<td>
										<span id="submit" style="margin:30px auto 20px;display:block;width:120px;font-size:16px;padding: 4px;border: 1px solid #bbb;cursor: pointer;background:#0088cc;color: #fff;text-align: center;border-radius: 4px;" onclick="">提交</span>
									</td>

								</tr>
							</tbody>
						</table>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭
					</button>
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal -->
	</div>
</div>
<!-----------------------------------------删除按钮-------------------------------------------------------->
<div class="modal fade" id="myModaldel">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?php echo U('product/htmldel');?>" method="post">
				<input type="hidden" name="htmlid">
				<div class="modal-body">
					<span id="qurenshanchu">你确认要删除</span>吗?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="submit" class="btn btn-danger">删除!</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- ---------------------------------------<?php echo (L("Template")); ?>1 -------------------------------------------------------->
<div class="modal fade" id="oModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="omoban">
					<table style="font-family: Arial, Verdana, sans-serif; font-size: 12px; font-color: #FFFFFF" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr height="10">
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>
									<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
								</td>
							</tr>
							<tr valign="top">
								<td>
									<table align="center" border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
										<tbody>
											<tr>
												<td width="35%" style="position: relative;">
													<img id="oimgone" src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" alt="img1" valign="center" board="0" align="middle" width="400">
												</td>
												<td width="50%">
													<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
														<tbody>
															<tr height="200">
																<td id="op_o">
																</td>
															</tr>
															<tr valign="top">
																<td>
																	<table style="border-width:1px;border-color:#DCDCDC;border-style:solid;background: #F5F5F5;" align="center" cellpadding="20" cellspacing="0" width="400">
																		<tbody>
																			<tr>
																				<td id="op_t" style="padding: 10px;">
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
															<tr height="100">
																<td id="op_th">
																	<font color="#708090"><i><b>Packing Included</b></i></font>
																	<p></p>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
												<td width="25%">
													<table style="height:300;border-color:#DCDCDC;border-left-style:solid;border-width:1px" align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
														<tbody>
															<tr height="100" valign="top">
																<td>
																	<img src="https://www.yellow-price.com/ypadmin/i/1416550239.jpg" board="0" width="180">
																	<p></p>
																	<font color="#708090">
																		<b>World's Leading OnLine Seller</b>
																	</font>
																	<br>
																	<font color="#708090" size="2">
																		Powered by Yellow-Price Inc.
																	</font>
																</td>
															</tr>
															<tr height="200" valign="top">
																<td>
																	<table style="border-width:1px;border-color:#DCDCDC;border-style:solid;background: #F5F5F5;" align="center" cellpadding="20" cellspacing="0" width="180">
																		<tbody>
																			<tr>
																				<td>
																					<font color="#708090" size="2">
																						<ul>
																							<li>An eCommerce leader specializing in high quality cables, components and accessories for computer and consumer electronics. Established in 2010, we have built our reputation by the word of our customers.</li>
																						</ul>
																					</font>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
								</td>
							</tr>
							<tr valign="center">
								<td>
									<table align="center" border="0" cellpadding="15" cellspacing="0" height="400" width="100%">
										<tbody>
											<tr>

												<td width="65%" id="op_f">

												</td>
												<font color="red" size="3"><b id="caution"></b></font>
												<td align="center" width="35%" style="position: relative;">
													<font color="#708090">now better than ever</font>
													<p></p>
													<img id="oimg2" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="img2" valign="center" board="0" width="90%">
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr height="10">
								<td><br></td>
							</tr>
							<tr>
								<td>
									<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
								</td>
							</tr>
							<tr valign="top">
								<td>
									<table border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
										<tbody>
											<tr valign="bottom">
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1481098036.jpg" id="oimg3" alt="img3" valign="bottom" board="0" width="100%">
												</td>
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1435116709.jpg" id="oimg4" alt="img4" valign="bottom" board="0" width="100%">
												</td>
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1509617054.jpg" id="oimg5" alt="img5" valign="bottom" board="0" width="100%">
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr height="10">
								<td><br></td>
							</tr>
							<tr>
								<td>
									<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
								</td>
							</tr>
							<tr valign="top">
								<td>
									<table border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
										<tbody>
											<tr valign="bottom">
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1509617142.jpg" id="oimg6" alt="img6" valign="bottom" board="0" width="100%">
												</td>
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1509617081.jpg" id="oimg7" alt="img7" valign="bottom" board="0" width="100%">
												</td>
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1509617000.jpg" id="oimg8" alt="img8" valign="bottom" board="0" width="100%">
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr height="10">
								<td><br></td>
							</tr>
							<tr>
								<td>
									<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
								</td>
							</tr>
							<tr valign="top">
								<td>
									<table border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
										<tbody>
											<tr valign="bottom">
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1509617006.jpg" id="oimg9" alt="img9" valign="bottom" board="0" width="100%">
												</td>
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1509617049.jpg" id="oimg10" alt="img10" valign="bottom" board="0" width="100%">
												</td>
												<td width="33%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1509617087.jpg" id="oimg11" alt="img11" valign="bottom" board="0" width="100%">
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr height="10">
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>
									<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
								</td>
							</tr>
							<tr height="10">
								<td><br></td>
							</tr>
							<tr valign="top">
								<td>
									<table align="center" border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
										<tbody>
											<tr valign="center">
												<td width="65%">
													<font size="2">
														<b><font color="#708090">Yes, We Wanna Be Your Friend!</font></b>
														<p></p>
														Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.
														<p></p>
														<b><font color="#708090">We Ship Locally, From Same Country</font></b>
														<p></p>
														<ul>
															<li><b><font color="#708090">American Orders:</font></b> Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</li>
															<li><b><font color="#708090">Canadian Orders:</font></b> Ship from Toronto, Ontario by Canada Post Lettermail
																<font color="red">(No tracking available)</font>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
															<li><b><font color="#708090">Australian Orders:</font></b> Ship from Sydney, NSW by Australia Post Lettermail
																<font color="red">(No tracking available)</font>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
															&nbsp;
															<li>To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</li>
															<li>Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</li>
															<li>Please understand that occasional delays due to carriers and mails are beyond our control.</li>
														</ul>
														<p></p>
														<b><font color="#708090">We Provide Local Warranty</font></b>
														<p></p>
														Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.
														<p></p>
														<b><font color="#708090">30 Days No Reason Return, and We Pay</font></b><br>
														<ul>
															<li>You have 30 days to return the item, we pay return postage and no any questions</li>
															<li>Full refund is guaranteed</li>
															<li>Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</li>
														</ul>

													</font>
												</td>
												<td align="center" width="35%">
													<font color="#708090">
														<img src="https://www.yellow-price.com/ypadmin/i/1462335557.jpg" valign="center" board="0" width="100%">
													</font>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr height="10">
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>
									<hr style="height:1px;border:none;border-top:1px dashed #DCDCDC;">
								</td>
							</tr>
							<tr valign="top">
								<td>
									<table align="center" border="0" cellpadding="15" cellspacing="0" height="350" width="100%">
										<tbody>
											<tr valign="top">
												<td width="35%" style="position: relative;">
													<img src="https://www.yellow-price.com/ypadmin/i/1452751566.jpg" id="oimg12" alt="img12" valign="center" board="0" width="90%">
												</td>
												<td width="40%">
													<table align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
														<tbody>
															<tr height="200">
																<td>
																	<b>Quality Guaranteed</b>
																	<p></p>
																	<font color="#708090" size="2">
																		Only Premium Materials
																	</font>
																	<p></p>
																	<font size="2">
																		Our premium materials and advanced technology prevent you from any quality issues.
																	</font>
																	<p></p>
																	<font color="#708090" size="2">
																		Peace of Mind Included
																	</font>
																	<p></p>
																	<font size="2">
																		Every purchase includes our worry-free 6-month warranty and lifetime technical support. If you have any questions, our friendly customer service team will be more than happy to help out.
																	</font>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
												<td width="25%">
													<table style="height:300;border-color:#DCDCDC;border-left-style:solid;border-width:1px" align="center" border="0" cellpadding="20" cellspacing="0" width="100%">
														<tbody>
															<tr height="300" valign="top">
																<td>

																	<b>Worry Free Buy</b>
																	<p></p>
																	<table style="border-width:1px;border-color:#DCDCDC;border-style:solid;background:#F5F5F5;" align="center" cellpadding="20" cellspacing="0" width="180">
																		<tbody>
																			<tr>
																				<td>
																					<font color="#708090" size="2">
																						<ul>
																							<li>Ship-Out within one business day, ZERO handling fee</li>
																							<li>Free Local Shipping, Expedited Shipping Available</li>
																							<li>Seller-provided Warranty, No need to contact manufacturer</li>
																							<li>30-days no reason return, ZERO restock fee</li>
																						</ul>
																					</font>
																				</td>
																			</tr>
																		</tbody>
																	</table>

																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>

							</tr>
						</tbody>
					</table>
				</div>
				<textarea id="otextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="oimg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" id="code_copy" style="margin-right: 10px;" onclick="ocopyUrl()">复制</div>
				</div>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>
<!-- ---------------------------------------<?php echo (L("Template")); ?>2 -------------------------------------------------------->
<div class="modal fade" id="tModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="tmoban">
					<div style="width: 100%;">
						<div style="width: 90%;margin: 0 auto;">
							<img id="timgone" src="img/11.JPG" alt="img1" style="width: 45%;margin: 12px 4% 12px 0;">
							<img id="timg2" src="img/12.JPG" alt="img2" style="width: 45%;margin: 12px 0 12px 4%;">
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img id="timg3" src="img/13.JPG" alt="img3" style="width: 45%;margin: 12px 4% 12px 0;">
							<img id="timg4" src="img/11.JPG" alt="img4" style="width: 45%;margin: 12px 0 12px 4%;">
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img id="timg5" src="img/13.JPG" alt="img5" style="width: 45%;margin: 12px 4% 12px 0;">
							<img id="timg6" src="img/11.JPG" alt="img6" style="width: 45%;margin: 12px 0 12px 4%;">
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img id="timg7" src="img/13.JPG" alt="img7" style="width: 45%;margin: 12px 4% 12px 0;">
							<img id="timg8" src="img/11.JPG" alt="img8" style="width: 45%;margin: 12px 0 12px 4%;">
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img id="timg9" src="img/13.JPG" alt="img9" style="width: 45%;margin: 12px 4% 12px 0;">
							<img id="timg10" src="img/11.JPG" alt="img10" style="width: 45%;margin: 12px 0 12px 4%;">
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img id="timg11" src="img/13.JPG" alt="img11" style="width: 45%;margin: 12px 4% 12px 0;">
							<img id="timg12" src="img/11.JPG" alt="img12" style="width: 45%;margin: 12px 0 12px 4%;">
						</div>
						<div id="tp_d">

						</div>
						<div id="tp_t">
							<h2 style="font-size: 22px;margin: 22px 0 44px;color:#222;">Packing Included</h2>
						</div>
						<div style="font-weight: bold;">
							<p style="font-size: 22px;padding-top: 16px;color: #708090;margin-top:1em;">Yes, We Wanna Be Your Friend!</p>
							<p style="font-size: 18px;line-height: 30px;margin-top:1em;">Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.</p>

							<p style="font-size: 22px;padding-top: 16px;color: #708090;margin-top:1em;">We Ship Locally, From Same Country</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(1) </span><span>American Orders: Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(2) </span><span>Canadian Orders: Ship from Toronto, Ontario by Canada Post Lettermail (No tracking available). Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(3) </span><span>Australian Orders: Ship from Sydney, NSW by Australia Post Lettermail (No tracking available). Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(4) </span><span>To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(5) </span><span>Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(6) </span><span>Please understand that occasional delays due to carriers and mails are beyond our control.</span></p>

							<p style="font-size: 22px;padding-top: 16px;color: #708090;margin-top:1em;">We Provide Local Warranty</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</p>

							<p style="font-size: 22px;padding-top: 16px;color: #708090;margin-top:1em;">30 Days No Reason Return, and We Pay</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(1) </span>You have 30 days to return the item, we pay return postage and no any questions<span></span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(2) </span><span>Full refund is guaranteed</span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span>(3) </span><span>Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</span></p>

							<p style="font-size: 22px;padding-top: 16px;color: #708090;margin-top:1em;">Quality Guaranteed</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span style="color:#708090;">Only Premium Materials: </span>Our premium materials and advanced technology prevent you from any quality issues.<span></span></p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;"><span style="color:#708090;">Peace of Mind Included: </span><span>Every purchase includes our worry-free 6-month warranty and lifetime technical support. If you have any questions, our friendly customer service team will be more than happy to help out.</span></p>

							<p style="font-size: 22px;padding-top: 16px;color: #708090;margin-top:1em;">Worry Free Buy</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;">Ship-Out within one business day, ZERO handling fee</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;">Free Local Shipping, Expedited Shipping Available</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;">Seller-provided Warranty, No need to contact manufacturer</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;">30-days no reason return, ZERO restock fee</p>

							<p style="font-size: 22px;padding-top: 16px;color: #708090;margin-top:1em;">World's Leading OnLine Seller</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;">Powered by Yellow-Price Inc.</p>
							<p style="font-size: 18px;line-height: 24px;margin-top:1em;">An eCommerce leader specializing in high quality cables, components and accessories for computer and consumer electronics. Established in 2010, we have built our reputation by the word of our customers.</p>

							<p style="text-align: right;margin-right: 40px;padding-top: 26px;"><img src="https://www.yellow-price.com/ypadmin/i/1416550239.jpg" alt="" style="width: 160px;" /></p>
						</div>
					</div>
				</div>
				<textarea id="ttextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="timg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" style="margin-right: 10px;" onclick="tcopyUrl()">复制</div>
				</div>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>
<!-- ---------------------------------------<?php echo (L("Template")); ?>3-------------------------------------------------------->
<div class="modal fade" id="thModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="thmoban">
					<div style="width: 100%">
						<div style="width: 90%;margin: 0 auto;">

							<table border="0" cellspacing="" cellpadding="" style="width: 100%;">
								<tr>
									<td colspan='3'>
										<h3 id="thp_o"></h3></td>
								</tr>
								<tr>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;"><img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimgone" board="0" align="middle" width="100%"></td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;"><img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg2" board="0" align="middle" width="100%"></td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;font-size: 13px;line-height: 19px;">
										<div id="thp_t">

										</div>
										<p style="margin: 0 0 14px 0;font-weight: bold;">Packing Included</p>
										<div id="thp_th">

										</div>
									</td>
								</tr>
								<tr>
									<td colspan='3'>
										<h3>product description</h3></td>
								</tr>
								<tr>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;">
										<img src="" valign="center" id="thimg3" board="0" align="middle" width="100%">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg4" board="0" align="middle" width="100%" style="padding-top: 30px;">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg5" board="0" align="middle" width="100%" style="padding-top: 30px;">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg6" board="0" align="middle" width="100%" style="padding-top: 30px;">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg7" board="0" align="middle" width="100%" style="padding-top: 30px;">
									</td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg8" board="0" align="middle" width="100%">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg9" board="0" align="middle" width="100%" style="padding-top: 30px;">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg10" board="0" align="middle" width="100%" style="padding-top: 30px;">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg11" board="0" align="middle" width="100%" style="padding-top: 30px;">
										<img src="https://www.yellow-price.com/ypadmin/i/1509617132.jpg" valign="center" id="thimg12" board="0" align="middle" width="100%" style="padding-top: 30px;">
									</td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;font-size: 13px;">
										<div id="thp_f">

										</div>
									</td>
								</tr>
								<tr>
									<td colspan='3'>
										<h3>Yes, We Wanna Be Your Friend!</h3></td>
								</tr>
								<tr>
									<td colspan="2" style="width: 33%;padding:5px 20px;vertical-align: top;"><img src="http://www.yellow-price.com/ypadmin/i/1532348146.jpg" valign="center" board="0" align="middle" width="100%"></td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;font-size: 13px;">
										<p style="margin: 0 0 14px 0;">Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.</p>
										<p style="margin: 0 0 14px 0;font-weight: bold;">We Ship Locally, From Same Country</p>
										<ul>
											<li style="margin: 0 0 14px 0;">QI Wireless Charge Supported: You dont need take it off when you have the wireless charge for your smart phone, which keeps your phone safe always.</li>
											<li style="margin: 0 0 14px 0;">3D flower is touchable,exterior oily coating is durable</li>
											<li style="margin: 0 0 14px 0;">Precise cutouts for complete access to all buttons, cameras, speakers, and ports</li>
											<li style="margin: 0 0 14px 0;">Ultimate 0.9mm/11g, match with lightweight design iPhone, which kept the design of your phone.</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td colspan='3'>
										<h3>We Provide Local Warranty</h3></td>
								</tr>
								<tr>
									<td colspan="2" style="width: 33%;padding:5px 20px;vertical-align: top;"><img src="http://www.yellow-price.com/ypadmin/i/1532348879.jpg" valign="center" board="0" align="middle" width="100%"></td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;font-size: 13px;">
										<p style="margin: 0 0 14px 0;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</p>
										<p style="margin: 0 0 14px 0;font-weight: bold;">30 Days No Reason Return, and We Pay</p>
										<ul>
											<li style="margin: 0 0 14px 0;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</li>
											<li style="margin: 0 0 14px 0;">Precise cutouts for complete access to all buttons, cameras, speakers, and ports</li>
											<li style="margin: 0 0 14px 0;">Ultimate 0.9mm/11g, match with lightweight design iPhone, which kept the design of your phone.</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td colspan='3'>
										<h3>Qualty Guaranteed</h3></td>
								</tr>
								<tr>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;"><img src="http://www.yellow-price.com/ypadmin/i/1449556522.jpg" valign="center" id="thimg11" board="0" align="middle" width="100%"></td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;"><img src="http://www.yellow-price.com/ypadmin/i/1532347972.jpg" valign="center" id="thimg12" board="0" align="middle" width="100%"></td>
									<td style="width: 33%;padding:5px 20px;vertical-align: top;font-size: 13px;">
										<p style="margin: 0 0 14px 0;font-weight: bold;">Only Premium Materials</p>
										<p style="margin: 0 0 14px 0;">Our premium materials and advanced technology prevent you from any quality issues.</p>
										<p style="margin: 0 0 14px 0;font-weight: bold;">Peace of Mind Included</p>
										<p style="margin: 0 0 14px 0;">Every purchase includes our worry-free 6-month warranty and lifetime technical support. If you have any questions, our friendly customer service team will be more than happy to help out.</p>
										<p style="margin: 0 0 14px 0;font-weight: bold;">Worry Free Buy</p>
										<ul>
											<li style="margin: 0 0 14px 0;">Ship-Out within one business day, ZERO handling fee</li>
											<li style="margin: 0 0 14px 0;">Free Local Shipping, Expedited Shipping Available</li>
											<li style="margin: 0 0 14px 0;">Seller-provided Warranty, No need to contact manufacturer</li>
											<li style="margin: 0 0 14px 0;">30-days no reason return, ZERO restock fee</li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<textarea id="thtextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="thimg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" style="margin-right: 10px;" onclick="thcopyUrl()">复制</div>
				</div>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>

<!-- ---------------------------------------<?php echo (L("Template")); ?>4-------------------------------------------------------->
<div class="modal fade" id="fModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="fmoban">
					<div style="width: 100%;background: #F9E3A7;">
						<div style="width: 90%;margin: 0 auto;">
							<img src="img/11.JPG" id="fimgone" alt="" style="width: 45%;margin: 12px 4% 12px 0;" />
							<img src="img/12.JPG" id="fimg2" alt="" style="width: 45%;margin: 12px 0 12px 4%;" />
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img src="img/13.JPG" id="fimg3" alt="" style="width: 45%;margin: 12px 4% 12px 0;" />
							<img src="img/11.JPG" id="fimg4" alt="" style="width: 45%;margin: 12px 0 12px 4%;" />
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img src="img/11.JPG" id="fimg5" alt="" style="width: 45%;margin: 12px 4% 12px 0;" />
							<img src="img/12.JPG" id="fimg6" alt="" style="width: 45%;margin: 12px 0 12px 4%;" />
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img src="img/11.JPG" id="fimg7" alt="" style="width: 45%;margin: 12px 4% 12px 0;" />
							<img src="img/12.JPG" id="fimg8" alt="" style="width: 45%;margin: 12px 0 12px 4%;" />
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img src="img/11.JPG" id="fimg9" alt="" style="width: 45%;margin: 12px 4% 12px 0;" />
							<img src="img/12.JPG" id="fimg10" alt="" style="width: 45%;margin: 12px 0 12px 4%;" />
						</div>
						<div style="width: 90%;margin: 0 auto;">
							<img src="img/11.JPG" id="fimg11" alt="" style="width: 45%;margin: 12px 4% 12px 0;" />
							<img src="img/12.JPG" id="fimg12" alt="" style="width: 45%;margin: 12px 0 12px 4%;" />
						</div>
						<div style="width: 90%;margin: 0 auto;background: #fff;">
							<h2 id="fp_o" style="font-size: 18px;margin: 1.2em 0 0 0;background: #ffcd05;height: 2.6em;line-height: 2.6em;text-indent: 2%;"></h2>
							<div style="width: 96%;margin: 0 auto;" id="fp_t">

							</div>
						</div>
						<div style="width: 90%;margin: 0 auto;background: #fff;">
							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #ffcd05;height: 2.6em;line-height: 2.6em;text-indent: 2%;">Package includes:</h2>
							<div style="width: 96%;margin: 0 auto;" id="fp_th">

							</div>
						</div>
						<div style="width: 90%;margin: 0 auto;background: #fff;">
							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #ffcd05;height: 2.6em;line-height: 2.6em;text-indent: 2%;">Product Description</h2>
							<div id="fp_f">

							</div>
						</div>
						<div style="width: 90%;margin: 0 auto;background: #fff;">
							<h2 style="font-size: 18px;margin: 1.2em 0 0;background: #ffcd05;height: 2.6em;line-height: 2.6em;text-indent: 2%;">Yes, We Wanna Be Your Friend!</h2>
							<div style="width: 96%;margin: 0 auto;">
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.</p>
							</div>
						</div>
						<div style="width: 90%;margin: 0 auto;background: #fff;">
							<h2 style="font-size: 18px;margin: 1.2em 0 0;background: #ffcd05;height: 2.6em;line-height: 2.6em;text-indent: 2%;">We Ship Locally, From Same Country</h2>
							<div style="width: 96%;margin: 0 auto;">
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(1) </span><span>American Orders: Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</span></p>
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(2) </span><span>Canadian Orders: Ship from Toronto, Ontario by Canada Post Lettermail (No tracking available). Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</span></p>
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(3) </span><span>Australian Orders: Ship from Sydney, NSW by Australia Post Lettermail (No tracking available). Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</span></p>
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(4) </span><span>To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</span></p>
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(5) </span><span>Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</span></p>
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(6) </span><span>Please understand that occasional delays due to carriers and mails are beyond our control.</span></p>
							</div>
						</div>
						<div style="width: 90%;margin: 0 auto;background: #fff;">
							<h2 style="font-size: 18px;margin: 1.2em 0 0;background: #ffcd05;height: 2.6em;line-height: 2.6em;text-indent: 2%;">We Provide Local Warranty</h2>
							<div style="width: 96%;margin: 0 auto;">
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</p>
							</div>
						</div>
						<div style="width: 90%;margin: 0 auto;background: #fff;">
							<h2 style="font-size: 18px;margin: 1.2em 0 0;background: #ffcd05;height: 2.6em;line-height: 2.6em;text-indent: 2%;">30 Days No Reason Return, and We Pay</h2>
							<div style="width: 96%;margin: 0 auto;">
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(1) </span>You have 30 days to return the item, we pay return postage and no any questions<span></span></p>
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(2) </span><span>Full refund is guaranteed</span></p>
								<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><span>(3) </span><span>Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</span></p>
							</div>
						</div>
						<p style="text-align: right;padding-top: 26px;padding-bottom: 26px;width: 90%;margin: 0 auto;"><img src="https://www.yellow-price.com/ypadmin/i/1416550239.jpg" alt="" style="width: 160px;" /></p>
					</div>
				</div>
				<textarea id="ftextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="fimg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" style="margin-right: 10px;" onclick="fcopyUrl()">复制</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>

<!-- ---------------------------------------<?php echo (L("Template")); ?>5-------------------------------------------------------->
<div class="modal fade" id="fiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="fimoban">
					<div style="width: 96%;margin: 0 auto;">
						<table border="0" cellspacing="0" cellpadding="" style="width: 100%;font-size: 13px;line-height: 19px;">
							<tr>
								<td colspan="3">
									<h2 style="font-size: 18px;text-indent: 15px;" id="fip_o">The Premium Retro Floral Series Case</h2>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="vertical-align: top;padding: 15px;" id="fip_t">
									<p style="margin: 0 0 14px 0;">Often copied but never equaled, the Yellow-Price The Premium Retro Floral Series 3D Vintage Flower Pattern Non-slip Rubber Feel Semi-soft Back Case is now better than ever.</p>
									<p style="margin: 0 0 14px 0;">Yellow-Price The Premium Retro Floral Series Case is our flagship series of phone cases, built using only premium materials and the most advanced technology.</p>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<h2 style="font-size: 18px;text-indent: 15px;">Packing Included</h2></td>
							</tr>
							<tr>
								<td colspan="3" style="vertical-align: top;padding: 15px;" id="fip_th">

								</td>
							</tr>
							<tr>
								<td colspan="3">
									<h2 style="font-size: 18px;text-indent: 15px;">product Description</h2></td>
							</tr>
							<tr>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimgone" src="" />
									<div id="fip_f">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg2" src="" />
									<div id="fip_fi">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg3" src="" />
									<div id="fip_s">

									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg4" src="" />
									<div id="fip_se">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg5" src="" />
									<div id="fip_e">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg6" src="" />
									<div id="fip_n">

									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg7" src="" />
									<div id="fip_te">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg8" src="" />
									<div id="fip_el">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg9" src="" />
									<div id="fip_tw">

									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg10" src="" />
									<div id="fip_thi">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg11" src="" />
									<div id="fip_for">

									</div>
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" id="fiimg12" src="" />
									<div id="fip_fif">

									</div>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<h2 style="font-size: 18px;text-indent: 15px;">Yes, We Wanna Be Your Friend!</h2></td>
							</tr>
							<tr>
								<td colspan="2" style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" src="http://www.yellow-price.com/ypadmin/i/1532348146.jpg" />
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<p>Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.</p>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<h2 style="font-size: 18px;text-indent: 15px;">We Ship Locally, From Same Country</h2></td>
							</tr>
							<tr>
								<td colspan="2" style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" src="http://www.yellow-price.com/ypadmin/i/1532348879.jpg" />
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<ul>
										<li style="margin: 0 0 14px 0;">American Orders: Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</li>
										<li style="margin: 0 0 14px 0;">Canadian Orders: Ship from Toronto, Ontario by Canada Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
										<li style="margin: 0 0 14px 0;">Australian Orders: Ship from Sydney, NSW by Australia Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
										<li style="margin: 0 0 14px 0;">To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</li>
										<li style="margin: 0 0 14px 0;">Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</li>
										<li style="margin: 0 0 14px 0;">Please understand that occasional delays due to carriers and mails are beyond our control.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<h2 style="font-size: 18px;text-indent: 15px;">We Provide Local Warranty</h2></td>
							</tr>
							<tr>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" src="http://www.yellow-price.com/ypadmin/i/1449556522.jpg" />
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<img style="width: 100%;margin-bottom: 5px;" src="http://www.yellow-price.com/ypadmin/i/1532347972.jpg" />
								</td>
								<td style="width: 33%;vertical-align: top;padding: 15px;">
									<p style="margin: 0 0 14px 0;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</p>
									<h3 style="font-size: 16px;">30 Days No Reason Return, and We Pay</h3>
									<ul>
										<li style="margin: 0 0 14px 0;">You have 30 days to return the item, we pay return postage and no any questions</li>
										<li style="margin: 0 0 14px 0;">Full refund is guaranteed</li>
										<li style="margin: 0 0 14px 0;">Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</li>
									</ul>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<textarea id="fitextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="fiimg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" style="margin-right: 10px;" onclick="ficopyUrl()">复制</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>

<!-- ---------------------------------------<?php echo (L("Template")); ?>6-------------------------------------------------------->
<div class="modal fade" id="sModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="smoban">
					<div style="width: 96%;margin: 0 auto;">
						<table border="0" cellspacing="0" cellpadding="" style="width: 100%;font-size: 13px;line-height: 19px;">
							<tr>
								<td colspan="4">

								</td>
							</tr>
							<tr>
								<td colspan="2" style="padding: 15px;">
									<h2 id="sp_o" style="font-size: 16px;color: #c60;">The Premium Retro Floral Series Case</h2>
									<div id="sp_t">
										<p style="margin: 0 0 14px 0;">Often copied but never equaled, the Yellow-Price The Premium Retro Floral Series 3D Vintage Flower Pattern Non-slip Rubber Feel Semi-soft Back Case is now better than ever.</p>
										<p style="margin: 0 0 14px 0;">Yellow-Price The Premium Retro Floral Series Case is our flagship series of phone cases, built using only premium materials and the most advanced technology.</p>
									</div>
								</td>
								<td style="padding: 15px;vertical-align: top;">
									<img src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" id="simgone" style="width: 100%;" />
								</td>
								<td style="padding: 15px;vertical-align: top;">
									<img src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" id="simg2" style="width: 100%;" />
								</td>
							</tr>
							<tr>
								<td style="padding: 15px;vertical-align: top;width: 25%;">
									<img src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" id="simg3" style="width: 100%;" />
								</td>
								<td style="padding: 15px;vertical-align: top;width: 25%;">
									<img src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" id="simg4" style="width: 100%;" />
								</td>
								<td colspan="2" style="padding: 15px;">
									<h2 style="font-size: 16px;color: #c60;">Packing Included</h2>
									<ul id="sp_th">
										<li style="line-height: 19px;"><b>Optional </b>Retro Floral Series 3D Vintage Flower Pattern Non-slip Rubber Feel Semi-soft Back Case for iPhone</li>
										<li style="line-height: 19px;"><b>Optional </b>Fully Cover 9H Curved Premium iPhone 3D Tempered Glass Screen Protector Edge to Edge Glass Screen Film [3D Touch Compatible]</li>
										<li style="line-height: 19px;"><b>Optional </b>REAL Clear HD Tempered Glass Screen Protector (Not Full Coverage)</li>
									</ul>
								</td>

							</tr>
							<tr>
								<td colspan="4">
									<h2 style="font-size: 18px;text-indent: 15px;color: #c60;">Product Description</h2>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;padding: 15px;width: 25%;">
									<img src="" id="simg5" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_f">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
								<td style="vertical-align: top;padding: 15px;width: 25%;">
									<img src="" id="simg6" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_fi">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
								<td style="vertical-align: top;padding: 15px;width: 25%;">
									<img src="" id="simg7" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_s">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
								<td style="vertical-align: top;padding: 15px;width: 25%;">
									<img src="" id="simg8" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_se">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;padding: 15px;">
									<img src="" id="simg9" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_e">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
								<td style="vertical-align: top;padding: 15px;">
									<img src="" id="simg10" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_n">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
								<td style="vertical-align: top;padding: 15px;">
									<img src="" id="simg11" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_te">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
								<td style="vertical-align: top;padding: 15px;">
									<img src="" id="simg12" alt="" style="width: 100%;margin-bottom: 5px;" />
									<div id="sp_el">
										<p style="margin: 0 0 14px 0;">This case could be glowing in the ddsvark that's pretty cool (Case need to absorb sunshine first and then have Night light Feather)</p>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="padding: 15px;">
									<h2 style="font-size: 16px;color: #c60;">Yes, We Wanna Be Your Friend!</h2>
									<p style="margin: 0 0 14px 0;">Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.</p>
									<h2 style="font-size: 16px;color: #c60;">We Ship Locally, From Same Country</h2>
									<ul>
										<li style="margin: 0 0 14px 0;">American Orders: Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</li>
										<li style="margin: 0 0 14px 0;">Canadian Orders: Ship from Toronto, Ontario by Canada Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
										<li style="margin: 0 0 14px 0;">Australian Orders: Ship from Sydney, NSW by Australia Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
										<li style="margin: 0 0 14px 0;">To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</li>
										<li style="margin: 0 0 14px 0;">Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</li>
										<li style="margin: 0 0 14px 0;">Please understand that occasional delays due to carriers and mails are beyond our control.</li>
									</ul>
								</td>
								<td colspan="2" style="padding: 15px;">
									<img src="http://www.yellow-price.com/ypadmin/i/1532348146.jpg" alt="" style="width: 100%;" />
								</td>
							</tr>
							<tr>
								<td colspan="2" style="padding: 15px;vertical-align: top;">
									<img src="http://www.yellow-price.com/ypadmin/i/1532348879.jpg" alt="" style="width: 100%;" />
								</td>
								<td colspan="2" style="padding: 15px;">
									<h2 style="font-size: 16px;color: #c60;">We Provide Local Warranty</h2>
									<p style="margin: 0 0 14px 0;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</p>
									<h2 style="font-size: 16px;color: #c60;">30 Days No Reason Return, and We Pay</h2>
									<ul>
										<li style="margin: 0 0 14px 0;">You have 30 days to return the item, we pay return postage and no any questions</li>
										<li style="margin: 0 0 14px 0;">Full refund is guaranteed</li>
										<li style="margin: 0 0 14px 0;">Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</li>
									</ul>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<textarea id="stextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="simg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" style="margin-right: 10px;" onclick="scopyUrl()">复制</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>

<!-- ---------------------------------------<?php echo (L("Template")); ?>7-------------------------------------------------------->
<div class="modal fade" id="seModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="semoban">
					<div style="width: 96%;margin: 0 auto;color: #555;font-size: 13px;">
						<div style="width:70%;display: inline-block;padding: 0 16px;box-sizing: border-box;vertical-align: top;">
							<h2 style="font-size: 18px;color: #222;" id="sep_o">Yellow-Price Case</h2>
							<img src="" id="seimgone" style="width: 80%;" alt="" />
							<h2 style="font-size: 18px;color: #222;" id="sep_t">The Premium Retro Floral Series Case</h2>
							<div id="sep_th">
							</div>
							<h2 style="font-size: 18px;color: #222;">Packing Included</h2>
							<div>
								<ul id="sep_f"></ul>
							</div>
							<h2 style="font-size: 18px;color: #222;">product description</h2>
							<div id="sep_fi">
							</div>
							<div>
								<img src="http://www.yellow-price.com/ypadmin/i/1532348146.jpg" style="width: 80%;" alt="" />
								<h2 style="font-size: 18px;color: #222;">Yes, We Wanna Be Your Friend!</h2>
								<p style="margin: 0 0 14px 0;">Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.</p>
								<h2 style="font-size: 18px;color: #222;">We Ship Locally, From Same Country</h2>
								<ul>
									<li style="margin: 0 0 14px 0;">American Orders: Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</li>
									<li style="margin: 0 0 14px 0;">Canadian Orders: Ship from Toronto, Ontario by Canada Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
									<li style="margin: 0 0 14px 0;">Australian Orders: Ship from Sydney, NSW by Australia Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
									<li style="margin: 0 0 14px 0;">To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</li>
									<li style="margin: 0 0 14px 0;">Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</li>
									<li style="margin: 0 0 14px 0;">Please understand that occasional delays due to carriers and mails are beyond our control.</li>
								</ul>
								<img src="http://www.yellow-price.com/ypadmin/i/1532348879.jpg" style="width: 80%;" alt="" />
								<h2 style="font-size: 18px;color: #222;">We Provide Local Warranty</h2>
								<p style="margin: 0 0 14px 0;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</p>
								<h2 style="font-size: 18px;color: #222;">30 Days No Reason Return, and We Pay</h2>
								<ul>
									<li style="margin: 0 0 14px 0;">You have 30 days to return the item, we pay return postage and no any questions</li>
									<li style="margin: 0 0 14px 0;">Full refund is guaranteed</li>
									<li style="margin: 0 0 14px 0;">Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</li>
								</ul>
								<h2 style="font-size: 18px;color: #222;">Quality Guaranteed</h2>
								<p style="margin: 0 0 14px 0;">Our premium materials and advanced technology prevent you from any quality issues.</p>
								<p style="margin: 0 0 14px 0;">Every purchase includes our worry-free 6-month warranty and lifetime technical support. If you have any questions, our friendly customer service team will be more than happy to help out.</p>
								<h2 style="font-size: 18px;color: #222;">Worry Free Buy</h2>
								<ul>
									<li style="margin: 0 0 14px 0;">Ship-Out within one business day, ZERO handling fee</li>
									<li style="margin: 0 0 14px 0;">Free Local Shipping, Expedited Shipping Available</li>
									<li style="margin: 0 0 14px 0;">Seller-provided Warranty, No need to contact manufacturer</li>
									<li style="margin: 0 0 14px 0;">30-days no reason return, ZERO restock fee</li>
								</ul>
							</div>
						</div>
						<div style="width: 28%;display: inline-block;background: #F2F2F2;">
							<img src="" id="seimg2" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg3" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg4" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg5" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg6" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg7" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg8" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg9" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg10" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg11" style="width: 94%;margin: 3% auto;display: block;" alt="" />
							<img src="" id="seimg12" style="width: 94%;margin: 3% auto;display: block;" alt="" />
						</div>
					</div>
				</div>
				<textarea id="setextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="seimg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" style="margin-right: 10px;" onclick="secopyUrl()">复制</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>

<!-- ---------------------------------------<?php echo (L("Template")); ?>8-------------------------------------------------------->
<div class="modal fade" id="eModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div id="emoban">
					<div style="width: 96%;margin: 0 auto;font-size: 13px;line-height: 19px;">
						<div style="width: 100%;background: #000;">
							<img id="eimgone" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg2" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg3" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg4" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg5" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg6" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg7" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg8" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg9" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg10" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg11" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
							<img id="eimg12" style="width: 40%;margin:2% 4%;border: 4px solid #F8E78E;" src="https://www.yellow-price.com/ypadmin/i/1474182574.jpg" alt="" />
						</div>
						<div>
							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #6AC0CD;height: 2.6em;line-height: 2.6em;text-indent: 2%;color: #fff;" id="ep_o">The Premium Retro Floral Series Case</h2>
							<div style="width: 100%;padding:0 2%;border:1px solid #dbdbdb;box-sizing: border-box;border-top: 0;box-shadow: 0px 0px 8px #dddddd;" id="ep_t">
							</div>
							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #6AC0CD;height: 2.6em;line-height: 2.6em;text-indent: 2%;color: #fff;">Package includes</h2>
							<div style="width: 100%;padding:0 2%;border:1px solid #dbdbdb;box-sizing: border-box;border-top: 0;box-shadow: 0px 0px 8px #dddddd;" id="ep_th">
							</div>
							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #6AC0CD;height: 2.6em;line-height: 2.6em;text-indent: 2%;color: #fff;">Product Description</h2>
							<div style="width: 100%;padding:0 2%;border:1px solid #dbdbdb;box-sizing: border-box;border-top: 0;box-shadow: 0px 0px 8px #dddddd;" id="ep_f">

							</div>

							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #6AC0CD;height: 2.6em;line-height: 2.6em;text-indent: 2%;color: #fff;">Yes, We Wanna Be Your Friend!</h2>
							<div style="width: 100%;padding:0 2%;border:1px solid #dbdbdb;box-sizing: border-box;border-top: 0;box-shadow: 0px 0px 8px #dddddd;">
								<p style="margin: 0 0 14px 0;">Buying from a local onLine seller, you can avoid any worries and troubles, compare buying from oversea. Yellow-Price has built its own branches and warehouses in USA, Canada and Australia. The sales and follow-up services are processed locally.</p>
							</div>

							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #6AC0CD;height: 2.6em;line-height: 2.6em;text-indent: 2%;color: #fff;">We Ship Locally, From Same Country</h2>
							<div style="width: 100%;padding:0 2%;border:1px solid #dbdbdb;box-sizing: border-box;border-top: 0;box-shadow: 0px 0px 8px #dddddd;">
								<ul style="margin: 0;">
									<li style="margin: 0 0 14px 0;">American Orders: Ship from Los Angeles, California by USPS First Class with tracking number. Takes 2-7 business days. Expedite Parcel Shipping available but cost extra.</li>
									<li style="margin: 0 0 14px 0;">Canadian Orders: Ship from Toronto, Ontario by Canada Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
									<li style="margin: 0 0 14px 0;">Australian Orders: Ship from Sydney, NSW by Australia Post Lettermail <span style="color: red;">(No tracking available)</span>. Takes 2-10 business days. Expedite Parcel Shipping available but cost extra.</li>
									<li style="margin: 0 0 14px 0;">To ensure the on-time delivery, we do not ship anywhere outside USA, Canada and Australia</li>
									<li style="margin: 0 0 14px 0;">Please note shipping speed mentioned above are estimated only. Non-major Urban Centres, Northern Regions and Remote Centres may expect longer delivery time.</li>
									<li style="margin: 0 0 14px 0;">Please understand that occasional delays due to carriers and mails are beyond our control.</li>
								</ul>
							</div>

							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #6AC0CD;height: 2.6em;line-height: 2.6em;text-indent: 2%;color: #fff;">We Provide Local Warranty</h2>
							<div style="width: 100%;padding:0 2%;border:1px solid #dbdbdb;box-sizing: border-box;border-top: 0;box-shadow: 0px 0px 8px #dddddd;">
								<p style="margin: 0 0 14px 0;">Every item which purchased from us, has the local warranty and lifetime technical support from our local company. The warranty term is cary per different item, please check within the warranty section.</p>
							</div>

							<h2 style="font-size: 18px;margin: 1.2em 0 0 0;background: #6AC0CD;height: 2.6em;line-height: 2.6em;text-indent: 2%;color: #fff;">30 Days No Reason Return, and We Pay</h2>
							<div style="width: 100%;padding:0 2%;border:1px solid #dbdbdb;box-sizing: border-box;border-top: 0;box-shadow: 0px 0px 8px #dddddd;">
								<ul style="margin: 0;">
									<li style="margin: 0 0 14px 0;">You have 30 days to return the item, we pay return postage and no any questions</li>
									<li style="margin: 0 0 14px 0;">Full refund is guaranteed</li>
									<li style="margin: 0 0 14px 0;">Return to same country, fast and safe. Unless those oversea seller, you don't have to return it to another half of the earth</li>
								</ul>
							</div>

							<p style="text-align: right;padding-top: 26px;padding-bottom: 26px;"><img src="https://www.yellow-price.com/ypadmin/i/1416550239.jpg" alt="" style="width: 160px;"></p>
						</div>
					</div>
				</div>
				<textarea id="etextarea" name="val" rows="" cols="" style="width: 100%;height: 600px;margin-top: 20px;margin-bottom: 16px;"></textarea>
				<div style="margin: 0 auto;width:200px;text-align: center;position: relative;">
					<div id="eimg_message" style="position: absolute;top: -300px;left: 50%;display: none;background: #aaa;min-width:300px;margin-left: -150px;margin-top: -50px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<div class="btn btn-primary" style="margin-right: 10px;" onclick="ecopyUrl()">复制</div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
</div>
<script>
	function mymodaldel() {
		$('#myModaldel').modal('toggle');
	}

	function mymodal() {
		$('#myModal').modal('toggle');
	}
	$('#submit').on('click', function() {
		console.log("<?php echo U('product/addProduct');?>");

		var arr1 = $("#form").serializeArray();
		for(var i = 0; i < arr1.length; i++) {
			if(arr1[i].value == "") {
				alert('内容不能为空');
				return false;
			}
		}
		$.ajax({
			url: "<?php echo U('product/addProduct');?>", //通过JQ获取URL获得路径
			data: arr1, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				if(data) {
					console.log(data);
					location.reload();
				}

			}
		})
	})

	var ii = 0,
		jj = 1,
		kk = 1,
		ll = 0;
	$('#add_content2').on('click', function() {
		jj++;
		var list = "<div>内容" + jj + "：<input type='text' style='width: 80%;margin-bottom: 4px;' name='tcontent" + jj + "'></div>"
		$('#product_two').append(list)
	})
	$('#add_content3').on('click', function() {
		kk++;
		var list = "<div>内容" + kk + "：<input type='text' style='width: 80%;margin-bottom: 4px;' name='thcontent" + kk + "'></div>"
		$('#product_three').append(list)
	})
	$('#add_title4').on('click', function() {
		ii++;
		var list = "<div>标题" + ii + "：<input type='text' style='width: 80%;margin-bottom: 4px;' name='ftitle" + ii + "'></div>"
		$('#product_four').append(list)
	})
	$('#add_content4').on('click', function() {
		ll++;
		var list = "<div>内容" + ll + "：<input type='text' style='width: 80%;margin-bottom: 4px;' name='fcontent" + ll + "'></div>"
		$('#product_four').append(list)
	})

	$('#recall2').on('click', function() {
		if($('#product_two div').length != 0) {
			jj--;
			$('#product_two div').eq(-1).remove('div')
		} else {
			return false;
		};
	})
	$('#recall3').on('click', function() {
		if($('#product_three div').length != 0) {
			kk--;
			$('#product_three div').eq(-1).remove('div')
		} else {
			return false;
		};
	})
	$('#recall4').on('click', function() {
		if($('#product_four div').length != 0) {
			if($('#product_four div').eq(-1).children('input').attr('name').indexOf('content') > -1) {
				ll--;
			} else if($('#product_four div').eq(-1).children('input').attr('name').indexOf('title') > -1) {
				ii--
			}
			$('#product_four div').eq(-1).remove('div')
		} else {
			return false;
		};

	})
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