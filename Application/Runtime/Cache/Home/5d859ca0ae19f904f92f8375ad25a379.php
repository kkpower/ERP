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
            <script>
	$('#320').parents('li').addClass('nav-active')
	$('#320').parents('li').addClass('nav-expanded')
</script>
<style>
	.input-group{
		width: 70%;
		float: left;
	}
</style>
<!-- ZUI 标准版压缩后的 JavaScript 文件 -->
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.css" />
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.css" />
<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
<div id="edit_modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
                    	修改国家
                </h4>
			</div>
			<input id="hld" value="" type="hidden" name="id">
			<input type="hidden" value="<?php echo ($pid); ?>" name="pid">
			<div class="modal-body">
				<div class="input-group">
					<span class="input-group-addon">国家中文名称<span style="color: red;">*</span></span>
					<input type="text" name="countryzh" placeholder="" class="form-control" id="countryzh1" onblur="change_check(this)">
				</div>
				<div id="countryzh1_check" style="float: left;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">国家英文名称<span style="color: red;">*</span></span>
					<input type="text" name="countryus" placeholder="" class="form-control" id="countryus1" onblur="change_check(this)">
				</div>
				<div id="countryus1_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">国家简写<span style="color: red;">*</span></span>
					<input type="text" name="spelling" placeholder="" class="form-control" id="spelling1" onblur="change_check(this)">
				</div>
				<div id="spelling1_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">货币缩写<span style="color: red;">*</span></span>
					<input type="text" name="currency" placeholder="" class="form-control" id="currency1" onblur="change_check(this)">
				</div>
				<div id="currency1_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">货币符号<span style="color: red;">*</span></span>
					<input type="text" name="symbol" placeholder="" class="form-control" id="symbol1" onblur="change_check(this)">
				</div>
				<div id="symbol1_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">1人民币&nbsp;&nbsp;&nbsp;=</span>
					<input type="text" name="rate" class="form-control" style="width: 100%;" value="" id="exchange_rate1">
					<span class="input-group-addon" id="monj">美元</span>
				</div>
				<br style="clear: both;height: 0;"/>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="add_pr" type="submit" onclick="doupdate()"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Close")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>
				<h2 class="panel-title">国家管理</h2>
			</header>
			<div class="panel-body">
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="showarehouse(1)">
                    	添加国家
                </button>

				<div>
					<table id="table1" class="table table-hover mb-none table-striped table-bordered" style="border-collapse: collapse;">
						<thead>
							<tr>
								<th>国家中文名称</th>
								<th>国家英文名称</th>
								<th>国家简写</th>
								<th>货币缩写</th>
								<th>货币符号</th>
								<th>汇率</th>
								<th><?php echo (L("Operation")); ?></th>
							</tr>
						</thead>
						<tbody>
							<input type="hidden" name='getSupplier' value="<?php echo U('Systemconfiguration/getWarehouse','','');?>">
							<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
									<td>
										<?php echo ($vo["countryzh"]); ?>
									</td>
									<td>
										<?php echo ($vo["countryus"]); ?>
									</td>
									<td><?php echo ($vo["spelling"]); ?></td>
									<td><?php echo ($vo["currency"]); ?></td>
									<td><?php echo ($vo["symbol"]); ?></td>
									<td><?php echo ($vo["exchange_rate"]); ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-xs" title="<?php echo (L("Modify")); ?>" data-toggle="modal" onclick="ckedit('<?php echo ($vo["id"]); ?>','<?php echo ($vo["countryzh"]); ?>','<?php echo ($vo["countryus"]); ?>','<?php echo ($vo["spelling"]); ?>','<?php echo ($vo["currency"]); ?>','<?php echo ($vo["symbol"]); ?>','<?php echo ($vo["exchange_rate"]); ?>')">
                                     	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
										<!--<button onclick="option_del('<?php echo ($vo["id"]); ?>')" class="btn btn-xs btn-danger">删除</button>-->
									</td>
								</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>

		</section>
	</div>
</div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
				<h4 class="modal-title">添加国家</h4>
			</div>
			<div class="modal-body">
				<div class="input-group">
					<span class="input-group-addon">国家中文名称<span style="color: red;">*</span></span>
					<input type="text" name="countryzh" placeholder="" class="form-control" id="countryzh" onblur="add_check(this)">
				</div>
				<div id="countryzh_check" style="float: left;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">国家英文名称<span style="color: red;">*</span></span>
					<input type="text" name="countryus" placeholder="" class="form-control" id="countryus" onblur="add_check(this)">
				</div>
				<div id="countryus_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">国家简写<span style="color: red;">*</span></span>
					<input type="text" name="spelling" placeholder="" class="form-control" id="spelling" onblur="add_check(this)">
				</div>
				<div id="spelling_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">货币缩写<span style="color: red;">*</span></span>
					<input type="text" name="currency" placeholder="" class="form-control" id="currency" onblur="add_check(this)">
				</div>
				<div id="currency_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">货币符号<span style="color: red;">*</span></span>
					<input type="text" name="symbol" placeholder="" class="form-control" id="symbol" onblur="add_check(this)">
				</div>
				<div id="symbol_check" style="float: left;padding-top: 12px;margin-left: 20px;line-height: 34px;"></div>
				<div class="input-group" style="padding-top: 12px;">
					<span class="input-group-addon">汇率<span style="color: red;">*</span></span>
					<input type="text" name="exchange_rate" placeholder="" class="form-control" id="exchange_rate">
				</div>
				<br style="clear: both;height: 0;"/>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" onclick="doadd()">确认</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Close")); ?></button>
			</div>
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

	function option_del(id) {
		var r = confirm("确认删除吗？")
		if(r) {
			$.ajax({
				url: "<?php echo U('Systemconfiguration/exchangerateDel');?>",
				type: "post", //选择传值方式
				data: {
					id: id
				},
				dataType: "JSON",
				success: function(data) {
					if(t) {
						clearTimeout(t)
					};
					if(data == 'OK') {
						$('#node_message').html('删除成功');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none'", 2000);
						location.reload();
					} else if(data == 'NO') {
						$('#node_message').html('删除失败');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none'", 2000);
					}

					//				console.log(data)
				}
			})
		} else {
			return false;
		}
	}
	//修改汇率弹框(赋值)
	function ckedit(id, namezh, nameus, country_logogram,currency,currency_symbol,exchange_rate) {
		$('#hld').val(id);
		$('#monj').text(currency);
		$('#countryzh1').val(namezh),
		$('#countryus1').val(nameus),
		$('#spelling1').val(country_logogram),
		$('#exchange_rate1').val(exchange_rate),
		$('#currency1').val(currency),
		$('#symbol1').val(currency_symbol)
		$('#edit_modal').modal('toggle');
	}

	//修改
	function doupdate() {
		$.ajax({
			url: "<?php echo U('Systemconfiguration/saveCountryAjax');?>",
			type: "post",
			data: {
				c_id: $('#hld').val(),
				namezh: $('#countryzh1').val(),
				nameus: $('#countryus1').val(),
				country_logogram: $('#spelling1').val(),
				exchange_rate: $('#exchange_rate1').val(),
				currency: $('#currency1').val(),
				currency_symbol: $('#symbol1').val()
			},
			dataType: "json",
			async: true,
			success: function(data) {
				console.log(data);
				if(data==1) {
					$('#node_message').html('修改成功');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 1500);
				} else{
					$('#node_message').html('修改失败');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 1500);
				}
			}
		});
		return false;
	}
	//添加仓库
	function doadd() {
		if($('#countryzh').val() == "" || $('#countryus').val() == "" || $('#spelling').val() == "" || $('#exchange_rate').val() == "" || $('#currency').val() == "" || $('#symbol').val() == "") {
			$('#node_message').html('请输入必填项');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 1500);
			return false;
		}
		$.ajax({
			url: "<?php echo U('Systemconfiguration/addCountry');?>",
			type: "post",
			data: {
				namezh: $('#countryzh').val(),
				nameus: $('#countryus').val(),
				country_logogram: $('#spelling').val(),
				exchange_rate: $('#exchange_rate').val(),
				currency: $('#currency').val(),
				currency_symbol: $('#symbol').val()
			},
			dataType: "json",
			async: true,
			success: function(data) {
				console.log(data);
				if(data == 'ok') {
					$('#node_message').html('添加成功');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 1500);
				} else {

				}
			}
		});
		return false;
	}
	
	//添加名称检测
	function add_check(obj) {
		console.log($(obj).attr('id'));
		console.log($(obj).val());
		$.ajax({
			url: "<?php echo U('Systemconfiguration/checkCountryAjax');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				key:$(obj).attr('id'),
				value:$(obj).val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == 'ok') {
					$('#'+$(obj).attr('id')+'_check').html('<span style="color:#5cb85c;">可以使用</span>');
				} else {
					$('#'+$(obj).attr('id')+'_check').html('<span style="color:red;">重复</span>');
				}
			}
		})
	}
	
	//修改名称检测
	function change_check(obj) {
		console.log($(obj).attr('id'));
		console.log($(obj).val());
		$.ajax({
			url: "<?php echo U('Systemconfiguration/checkCountryAjax');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				key:$(obj).attr('id').split('1')[0],
				value:$(obj).val(),
				c_id: $('#hld').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == 'ok') {
					$('#'+$(obj).attr('id')+'_check').html('<span style="color:#5cb85c;">可以使用</span>');
				} else {
					$('#'+$(obj).attr('id')+'_check').html('<span style="color:red;">重复</span>');
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