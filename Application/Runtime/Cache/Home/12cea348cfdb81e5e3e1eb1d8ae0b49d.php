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
            <!--<script src="/InternalSystem/Public/login/assets/js/jquery-1.11.1.min.js">
</script>-->
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.css" />
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />-->
<script>
	$('#11').parents('li').addClass('nav-active')
	$('#11').parents('li').addClass('nav-expanded')
</script>
<style>
	.six:before {
		content: "";
		position: absolute;
		top: -25px;
		left: 0;
		width: 0;
		height: 0;
		border-left: 50px solid transparent;
		border-right: 50px solid transparent;
		border-bottom: 25px solid #ececec;
	}
	
	.six:after {
		content: "";
		position: absolute;
		bottom: -25px;
		left: 0;
		width: 0;
		height: 0;
		border-left: 50px solid transparent;
		border-right: 50px solid transparent;
		border-top: 25px solid #ececec;
	}
	
	.dropdown-toggle {
		height: 34px;
	}
	
	label {
		margin-bottom: 0;
	}
</style>
<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>
				<input type="hidden" name='getRoleAuthority' value="<?php echo U('System/getRoleAuthority','','');?>">
				<h2 class="panel-title"><?php echo (L("personal_information")); ?></h2>
			</header>
			<!--<div class="panel-body">
                <button class="btn btn-primary" onclick=""> </button>
            </div>-->
			<input type="hidden" name='getRoleAuthority' value="<?php echo U('System/getRoleAuthority','','');?>">
			<input type="hidden" name='delRole' value="<?php echo U('System/delRole','','');?>">
			<div class="panel-body">
				<div style="width: 37%;float: left;">
					<div style="width: 100%;height: 120px;background: url('/InternalSystem/Public/img/bg.jpg');background-size: cover;">
						<div style="width: 80px;margin: 0 auto;">
							<?php if(is_array($info)): foreach($info as $key=>$vo): ?><img style="width: 80px;display: block;height: 80px;margin: 0 auto;padding-top: 20px;cursor: pointer;box-sizing: content-box;" src="/InternalSystem<?php echo ($vo["path"]); ?>" onclick="location.href='/InternalSystem/index.php/Home/my/avatar'" /><?php endforeach; endif; ?>
						</div>

					</div>
					<?php if(is_array($info)): foreach($info as $key=>$vo): ?><div style="height: 70px;background: deepskyblue;color: #fff;text-align: center;line-height: 24px;">
							<div style="width: 33%;border-right: 1px solid #fff;height: 100%;float: left;">
								<p style="padding-top: 12px;margin-bottom: 0;">白金</p>
								<p>雇员</p>
							</div>
							<div style="width: 34%;border-right: 1px solid #fff;height: 100%;float: left;;">
								<p style="padding-top: 12px;margin-bottom: 0;">Active</p>
								<?php if(($vo["status"]) == "1"): ?>正常
									<?php else: ?> 离职<?php endif; ?>
							</div>
							<div style="width: 33%;height: 100%;float: left;;">
								<p style="padding-top: 12px;margin-bottom: 0;">2174</p>
								<p>积分</p>
							</div>
						</div>
						<div style="background: #f6f6f6;padding:0 10px;line-height: 28px;">
							<h4 style="padding-top: 20px;margin-top: 0;"><?php echo (L("basicInformation")); ?></h4>
							<div style="width: 30%;float: left;"><?php echo (L("n_ame")); ?></div>
							<div style="width: 70%;float: right;text-align: right;"><?php echo ($vo["lastnamezh"]); echo ($vo["namezh"]); ?></div><br style="clear: both;">
							<div style="width: 30%;float: left;"><?php echo (L("Company")); ?></div>
							<div style="width: 70%;float: right;text-align: right;"><?php echo ($vo["comname"]); ?></div><br style="clear: both;">
							<div style="width: 30%;float: left;"><?php echo (L("Department")); ?></div>
							<div style="width: 70%;float: right;text-align: right;"><?php echo ($vo["department"]); ?></div><br style="clear: both;">
							<div style="width: 30%;float: left;"><?php echo (L("Position")); ?></div>
							<div style="width: 70%;float: right;text-align: right;"><?php echo ($vo["position"]); ?></div><br style="clear: both;">
							<?php if(is_array($phone)): foreach($phone as $key=>$pvo): ?><div style="width: 30%;float: left;"><?php echo (L("Phonenumber")); ?></div>
								<div style="width: 70%;float: right;text-align: right;"><?php echo ($pvo["phone"]); ?></div><br style="clear: both;"><?php endforeach; endif; ?>
							<div style="float: left;width: 100%;">
								<div style="width: 30%;float: left;"><?php echo (L("Email")); ?></div>
								<div style="width: 70%;float: right;text-align: right;height: auto;line-height: 1.5em;margin-top: 4px;word-wrap:break-word;"><?php echo ($vo["email"]); ?></div><br style="clear: both;">
							</div>
							<div style="width: 30%;float: left;"><?php echo (L("IDcard")); ?></div>
							<div style="width: 70%;float: right;text-align: right;"><?php echo ($vo["identity"]); ?></div><br style="clear: both;">

							<div style="width: 30%;float: left;"><?php echo (L("Bankname")); ?></div>
							<div style="width: 70%;float: right;text-align: right;"><?php echo ($vo["bank"]); ?></div><br style="clear: both;">
							<div style="width: 30%;float: left;"><?php echo (L("BankAccount")); ?></div>
							<div style="width: 70%;float: right;text-align: right;"><?php echo ($vo["account"]); ?></div>
							<br style="clear: both;" />

							<h4 style="padding-top: 20px;margin-bottom: 0;"><?php echo (L("aboutme")); ?></h4>
							<div><?php echo ($vo["remarks"]); ?></div>
							<div style="padding-top: 20px;text-align: center;padding-bottom: 15px;">
								<button class="btn btn-primary btn-sm" onclick="window.open('<?php echo U('My/plAcc');?>')"><?php echo (L("myaccount")); ?></button>
								<button class="btn btn-primary btn-sm" onclick="onm()"><?php echo (L("edit_information")); ?></button>
								<button class="btn btn-danger btn-sm" onclick="window.open('<?php echo U('System/proving');?>')"><?php echo (L("reset_Password")); ?></button>
							</div>
						</div><?php endforeach; endif; ?>
				</div>
				<div style="width: 60%;float: right;">
					<div style="line-height: 30px;border-bottom:1px solid #e5e5e5;"><?php echo (L("focus_point")); ?></div>
					<div style="height: 200px;">
						<div style="float: left;width: 25%;height: 100%;">
							<div class="six" style="width: 100px;height: 50px;background: #ececec;margin: 50px auto 0;position: relative;">
								<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 10px;font-size: 30px;" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</div>
							<!--<p style="text-align: center;padding-top:30px;">未解决事件</p>-->
						</div>
						<div style="float: left;width: 25%;height: 100%;">
							<div class="six" style="width: 100px;height: 50px;background: #ececec;margin: 50px auto 0;position: relative;">
								<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 10px;font-size: 30px;" class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
							</div>
							<!--<p style="text-align: center;padding-top:30px;">考勤记录</p>-->
						</div>
						<div style="float: left;width: 25%;height: 100%;">
							<div class="six" style="width: 100px;height: 50px;background: #ececec;margin: 50px auto 0;position: relative;">
								<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 10px;font-size: 30px;" class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</div>
							<!--<p style="text-align: center;padding-top:30px;">出错记录</p>-->
						</div>
						<div style="float: left;width: 25%;height: 100%;">
							<div class="six" style="width: 100px;height: 50px;background: #ececec;margin: 50px auto 0;position: relative;">
								<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 10px;font-size: 30px;" class="glyphicon glyphicon-heart" aria-hidden="true"></span>
							</div>
							<!--<p style="text-align: center;padding-top:30px;">工资单</p>-->
						</div>
					</div>
					<ul id="myTab" class="nav nav-tabs">
						<li class="active">
							<a href="#home" data-toggle="tab">
								<!--系统通知(待处理)-->
								<?php echo (L("system_notification")); ?>
								<span class="badge" style="margin-left: 4px;float: right;"></span>
							</a>
						</li>
						<li>
							<a href="#ios" data-toggle="tab" onclick="aaa(2,'<?php echo ($vo["role_id"]); ?>')">
								<?php echo (L("system_authorization_status")); ?>
							</a>
						</li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="home" style="max-height: 400px;overflow-y: auto;">
							<table id="table1" style="width: 100%;border-collapse: collapse;" class="table table-hover table-bordered table-striped">
								<thead>
									<tr>
										<th><?php echo (L("ID")); ?></th>
										<th><?php echo (L("notification_type")); ?></th>
										<th><?php echo (L("content")); ?></th>
										<th><?php echo (L("time")); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($meMessage)): $i = 0; $__LIST__ = $meMessage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tongzhi): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($i); ?></td>
											<td><?php echo ($tongzhi["type"]); ?></td>
											<td><a href="/index.php/Home/<?php echo ($tongzhi["direction"]); ?>"><?php echo ($tongzhi["textzh"]); ?></a></td>
											<td><?php echo ($tongzhi["time"]); ?></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="ios" style="height: 400px;overflow-y: scroll;">
							<table class="table table-hover mb-none">
								<thead>
									<tr>
										<th><?php echo (L("privilege_name")); ?></th>
										<th><?php echo (L("permission")); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($pinfo)): foreach($pinfo as $key=>$showlist): ?><tr>
											<!-- 从零开始所以加一来做序列号-->
											<td><?php echo ($showlist["auth_name"]); ?></td>
											<td>　<input type="checkbox" style="width: 20px;height: 20px;" name="role_auth_ids[]" value="<?php echo ($showlist["id"]); ?>" disabled="disabled" /></td>
										</tr><?php endforeach; endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
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
					<?php echo (L("edit_my_profile")); ?>
				</h4>
			</div>
			<form class="form-horizontal" action="<?php echo U('My/saveuserinfo');?>" method="POST">
				<div class="modal-body" style="line-height: 34px;">
					<?php if(is_array($info)): foreach($info as $key=>$vo): ?><input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
						<input type="hidden" name="uid" value="<?php echo ($vo["uid"]); ?>">
						<div class="row" style="margin-left: 0;margin-right: 0;">
							<div class="input-group">
								<span class="input-group-addon">Last Name in English</span>
								<input type="text" name="name" class="form-control" value="<?php echo ($vo["lastname"]); ?>" placeholder="Last Name" style="width: 30%;">
							</div>
							<div class="input-group">

								<span class="input-group-addon">First Name in English</span>
								<input type="text" name="lastname" class="form-control" value="<?php echo ($vo["name"]); ?>" placeholder="First Name" style="width: 30%;">
							</div>
							<div class="input-group" style="padding-top: 20px;">
								<span class="input-group-addon"><?php echo (L("Chinesesurname")); ?></span>
								<input type="text" name="lastnamezh" class="form-control" value="<?php echo ($vo["lastnamezh"]); ?>" placeholder="" style="width: 20%;">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("Chinesename")); ?></span>
								<input type="text" name="namezh" class="form-control" value="<?php echo ($vo["namezh"]); ?>" placeholder="" style="width: 20%;">
							</div>

							<div class="input-group" style="padding-top: 20px;padding-bottom: 20px;">
								<span class="input-group-addon"><?php echo (L("Email")); ?></span>
								<input type="text" name="email" class="form-control" value="<?php echo ($vo["email"]); ?>" placeholder="" style="width: 50%;">
							</div>

							<div id="add_tel">
								<?php if(is_array($phone)): foreach($phone as $key=>$pvo): ?><div class="input-group">

										<span class="input-group-addon"><?php echo (L("Phonenumber")); ?></span>
										<input type="text" name="contact[]" value="<?php echo ($pvo["phone"]); ?>" class="form-control" placeholder="" style="width: 30%;">

									</div><?php endforeach; endif; ?>
							</div>
							<div onclick="add_tel()" class="btn btn-primary" style="margin-top: 10px;"><?php echo (L("Addphone")); ?></div>

							<div class="input-group" style="padding-top: 20px;">
								<span class="input-group-addon"><?php echo (L("bankname")); ?></span>
								<input type="text" name="bank" value="<?php echo ($vo["bank"]); ?>" class="form-control" placeholder="" style="width: 50%;">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("Bankaccount")); ?></span>
								<input type="text" name="account" value="<?php echo ($vo["account"]); ?>" class="form-control" placeholder="" style="width: 50%;">
							</div>
							<div class="input-group" style="padding-top: 20px;">
								<span class="input-group-addon"><?php echo (L("IDcard")); ?></span>
								<input type="text" name="identity" value="<?php echo ($vo["identity"]); ?>" class="form-control" placeholder="" style="width: 40%;">
							</div>
							<div class="input-group" style="padding-top: 20px;">
								<span class="input-group-addon"><?php echo (L("Aboutme")); ?></span>
								<textarea type="text" name="remarks" class="form-control" placeholder="" style="width: 40%;"><?php echo ($vo["remarks"]); ?></textarea>
							</div>

							<!--性别-->
							<div class="input-group" style="padding-top: 20px;">
								<span class="input-group-addon"><?php echo (L("Sex")); ?></span>
								<div style="border: 1px solid #ccc;width: 30%;border-bottom-right-radius: 4px;border-top-right-radius: 4px;">
									<?php if(($vo["sex"]) == "1"): ?><label for="man2">
											<input id="man2" type="radio" name="sex" value="1" checked="checked" style="margin-left: 20px;vertical-align: top;margin-top: 10px;"><?php echo (L("Man")); ?>
										</label>
										<label for="woman2" style="margin-left: 12px;">
											<input id="woman2" type="radio" name="sex" style="vertical-align: top;margin-top: 10px;"><?php echo (L("Woman")); ?>
										</label><?php endif; ?>
									<?php if(($vo["sex"]) == "2"): ?><label for="man1">
											<input id="man1" type="radio" name="sex" value="1"  style="margin-left: 20px;vertical-align: top;margin-top: 10px;"><?php echo (L("Man")); ?>
										</label>
										<label for="woman1">
											<input id="woman1" type="radio" name="sex" checked="checked" value="2" style="vertical-align: top;margin-top: 10px;"><?php echo (L("Woman")); ?>
										</label><?php endif; ?>
								</div>
							</div>
						</div><?php endforeach; endif; ?>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit"><?php echo (L("Save")); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.js"></script>
<script>
	$(document).ready(function() {
		$('#table1').DataTable({
			"paging": false,
			"lengthChange": false,
			"info": false,
			"searching": false
		});
	});

	function onm() {
		$('#node_modal').modal('toggle');
	}

	function aaa(type, roleId) {
		var getRoleAuthorityUrl = $("[name='getRoleAuthority']").val();
		$.ajax({
			url: getRoleAuthorityUrl, //通过JQ获取URL获得路径
			data: {
				type: type,
				role_id: roleId
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if (data.info){
					$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data) {
					//点开或者关闭模态
					var list = data.nodeList;
					console.log(data);
					var boxes = document.getElementsByName("role_auth_ids[]");
					$("input[type='checkbox']").attr("checked", false);
					for(i = 0; i < boxes.length; i++) {
						for(j = 0; j < list.length; j++) {
							if(boxes[i].value == list[j]) {
								boxes[i].checked = true;
								console.log(boxes[i].value);
								break
							}
						}
					}
				}
			}
		})
	}

	function add_tel() {
		var list = '<div class="input-group"><span class="input-group-addon"><?php echo (L("Phonenumber")); ?></span><input type="text" name="contact[]" class="form-control" placeholder="" style="width: 30%;"></div>'
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