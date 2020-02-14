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
            <link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/chartist-custom.css" />
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.css" />
<style>
	.six:before {
		content: "";
		position: absolute;
		top: -20px;
		left: 0;
		width: 0;
		height: 0;
		border-left: 40px solid transparent;
		border-right: 40px solid transparent;
		border-bottom: 20px solid #ececec;
	}
	
	.six:after {
		content: "";
		position: absolute;
		bottom: -20px;
		left: 0;
		width: 0;
		height: 0;
		border-left: 40px solid transparent;
		border-right: 40px solid transparent;
		border-top: 20px solid #ececec;
	}
	
	.modal-dialog {
		margin: 60px auto !important;
	}
	.bootstrap-select.btn-group .dropdown-toggle .filter-option {
    padding-left: 5px;
    padding-top: 3px;
    color: #666;
}
	/*.bootstrap-select{
	width: 50% !important;
}*/
#info1 .input-group{
	width: 70%;
}
.bootstrap-select>button{
	height: 100%;
	line-height: 100%;
}
.bootstrap-select>button:active{
	background: #fff !important;
}
.bootstrap-select>button:hover{
	background: #fff !important;
}
.bootstrap-select>button:focus{
	background: #fff !important;
}
select{
	appearance:none;
-moz-appearance:none;
-webkit-appearance:none;
}
select::-ms-expand { display: none; }
.caret{
	color: #333 !important;
}
#parameter .input-group:first-child{
	padding-top: 0 !important;
}
/*.input-group-addon:first-child{
	min-width: 7em;
}*/
</style>
<script>
	$('#23').parents('li').addClass('nav-active')
	$('#23').parents('li').addClass('nav-expanded')
</script>
<input type="hidden" id="pid" value="<?php echo ($info["pid"]); ?>">
<!--获取产品信息 需要产品 id-->
<input type="hidden" id="getInfoProduct" value="<?php echo U('Product/getInfoProduct');?>">
<!--保存产品信息 需要产品 id-->
<input type="hidden" id="saveInfoProduct" value="<?php echo U('Product/saveInfoProduct');?>">
<!--获取所有的技术参数的名-->
<input type="hidden" id="getAjaxProductParameter" value="<?php echo U('Product/getAjaxProductParameter');?>">
<!--删除产品技术参数-->
<input type="hidden" id="dellProductExpansion" value="<?php echo U('Product/dellProductExpansion');?>">
<!--添加产品技术参数-->
<input type="hidden" id="addProductExpansion" value="<?php echo U('Product/addProductExpansion');?>">
<!--保存产品技术参数-->
<input type="hidden" id="saveProductExpansion" value="<?php echo U('Product/saveProductExpansion');?>">
<!--产品名称 重复检测-->
<input type="hidden" id="productname" name='' value="<?php echo U('Product/productname','','');?>">
<!--产品简称 重复检测-->
<input type="hidden" id="productshortname" name='' value="<?php echo U('Product/productshortname','','');?>">
<!--查询一级编码 url-->
<input type="hidden" id="getAjaxclassone" name='' value="<?php echo U('Product/getAjaxclassone');?>">
<!--查询二级编码 url-->
<input type="hidden" id="getAjaxclasstwo" name='' value="<?php echo U('Product/getAjaxclasstwo','','');?>">
<form action="<?php echo U('Supplier/proDuct','','');?>" method="get" style="display: inline-block;float: left;margin-right:15px ;" target="_blank">
	<div id="lode_modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document" style="width: 500px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">
						<?php echo (L("supplier")); ?>
					</h4>
				</div>
				<div class="modal-body" style="line-height: 34px;">
					<div class="row" style="margin-left: 0;margin-right: 0;">
						<div class="input-group">							
							<span class="input-group-addon"><?php echo (L("supplier")); ?><span style="color: red;">*</span></span>
							<input type="hidden" id="search" name="search">
							<select class="form-control" name="id">
								<option value="">--<?php echo (L("Pleasechoose")); ?>--</option>
								<?php if(is_array($supperlist)): foreach($supperlist as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit"><?php echo (L("determine")); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
</form>
<form action="<?php echo U('Warehouse/inLibrary','','');?>" method="get" style="display: inline-block;float: left;margin-right:15px ;" target="_blank">
<div id="nodes_modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document" style="width: 500px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					库存查询
				</h4>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<div class="row" style="margin-left: 0;margin-right: 0;">
					<div class="input-group">
						<span class="input-group-addon"><?php echo (L("warehouse")); ?><span style="color: red;">*</span></span>
						<input type="hidden" id="p_id" name="p_id">
						<select class="form-control" name="k_id">
							<option value="">--<?php echo (L("Pleasechoose")); ?>--</option>
							<?php if(is_array($kulist)): foreach($kulist as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="add_pr" type="submit"><?php echo (L("determine")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
</form>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>
				<input type="hidden" name='getRoleAuthority' value="<?php echo U('System/getRoleAuthority','','');?>">
				<h2 class="panel-title"><?php echo (L("Producthomepage")); ?></h2>
			</header>
			<div class="panel-body">
				<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
				<div style="width: 36%;float: left;">
					<div style="width: 100%;height: 180px;">
						<div style="margin: 0 auto;">
							<img style="width: 120px;display: block;height: 120px;margin: 0 auto;cursor: pointer;box-sizing: content-box;border-radius: 12px;" src="/InternalSystem<?php echo ($info["thumb"]); ?>" onclick="onthm()" />
						</div>
						<p style="margin: 0;text-align: center;font-weight: bold;"><?php echo ($info["onenumber"]); ?>.<?php echo ($info["twonumber"]); ?>.<?php echo ($info["number"]); ?></p>
						<p style="margin: 0;text-align: center;line-height: 1.3em;"><?php echo ($info["name"]); ?></p>
					</div>

					<div style="height: 70px;background: deepskyblue;color: #fff;text-align: center;line-height: 24px;">
						<div style="width: 33%;border-right: 1px solid #fff;height: 100%;float: left;">
							<p style="padding-top: 12px;margin-bottom: 0;"><?php echo (L("state")); ?></p>
							<p></p>
						</div>
						<div style="width: 34%;border-right: 1px solid #fff;height: 100%;float: left;;">
							<p style="padding-top: 12px;margin-bottom: 0;"><?php echo (L("Date")); ?></p>
							<p></p>
						</div>
						<div style="width: 33%;height: 100%;float: left;;">
							<p style="padding-top: 12px;margin-bottom: 0;"><?php echo (L("Sales_Amount")); ?></p>
							<p></p>
						</div>
					</div>

					<div style="height: 56px;line-height: 50px;text-align: center;background: #F8F7F7;border-bottom: 1px solid #e5e5e5;">
						<button class="btn btn-danger" id="look_pr"><?php echo (L("info")); ?></button>
						<button class="btn btn-danger" onclick="onthm()"><?php echo (L("Thumbnail")); ?></button>
						<button class="btn btn-danger"><?php echo (L("Drawing")); ?></button>
					</div>
					<div style="background: #F8F7F7;">
						<div style="height: 150px;">

							<div style="float: left;width: 33%;height: 100%;">
								<a target="_blank" href="<?php echo U('Product/imgindex',array('pid'=>$info[pid]));?>">
									<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
										<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;" class="glyphicon glyphicon-picture" aria-hidden="true"></span>
									</div>
								</a>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("Productpicture")); ?></p>
							</div>

							<div style="float: left;width: 34%;height: 100%;">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;" class="glyphicon glyphicon-yen" aria-hidden="true"></span>
								</div>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("Cost_accounting")); ?></p>
							</div>
							<div style="float: left;width: 33%;height: 100%;">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;" class="glyphicon glyphicon-plane" aria-hidden="true"></span>
								</div>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("Set_shipping_cost")); ?></p>
							</div>
						</div>
						<div style="height: 150px;">
							<div style="float: left;width: 33%;height: 100%;cursor:pointer;" onclick="stock('<?php echo ($info["pid"]); ?>')">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;color: black;" class="glyphicon glyphicon-book" aria-hidden="true"></span>
								</div>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("Inventory_management")); ?></p>
							</div>
							<div style="float: left;width: 34%;height: 100%;cursor:pointer;"  onclick="supplier('<?php echo ($info["name"]); ?>')">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;color: black;" class="glyphicon glyphicon-oil" aria-hidden="true"></span>
								</div>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("supplier")); ?></p>
							</div>
							<div style="float: left;width: 33%;height: 100%;">
								<a target="_blank" href="<?php echo U('Order/saleStatistics',array('pid'=>$info[pid]));?>">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;" class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
								</div>
								</a>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("Order")); ?></p>
							</div>
						</div>
						<div style="height: 150px;">
							<div style="float: left;width: 33%;height: 100%;">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;" class="glyphicon glyphicon-signal" aria-hidden="true"></span>
								</div>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("analyze_data")); ?></p>
							</div>
							<div style="float: left;width: 34%;height: 100%;">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;" class="glyphicon glyphicon-user" aria-hidden="true"></span>
								</div>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("client")); ?></p>
							</div>
							<div style="float: left;width: 33%;height: 100%;">
								<div class="six" style="width: 80px;height: 40px;background: #ececec;margin: 50px auto 0;position: relative;">
									<span style="display: block;width: 30px;height: 30px;margin:0 auto;padding-top: 5px;font-size: 30px;" class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</div>
								<p style="text-align: center;padding-top:30px;"><?php echo (L("Quality_report")); ?></p>
							</div>
						</div>
					</div>
				</div>

				<div style="width: 60%;float: right;">
					<div style="width: 90%;">
						<div id="headline-chart" class="ct-chart" style="margin-bottom: 30px;"></div>
					</div>
					<ul id="myTab" class="nav nav-tabs">
						<li class="active">
							<a href="#home" data-toggle="tab">
								<!--技术参数-->
								<?php echo (L("parameter")); ?>
							</a>
						</li>
						<li>
							<a href="#payment" data-toggle="tab">
								<!--订单-->
								<?php echo (L("Order")); ?>
								<span class="badge" style="margin-left: 4px;float: right;">0</span>
							</a>
						</li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="home">
							<table class="table">
								<thead>
									<tr>
										<td colspan="3" style="text-align: center;">
											<div style="height: 34px;width: 65px;display: inline-block;">
												<span class="glyphicon glyphicon-plus-sign" style="font-size: 30px;float: left;cursor: pointer;" onclick="onm(3)"></span>
												<span style="font-size: 30px;line-height: 34px;float: left;">3</span>
											</div>
											<div style="height: 34px;width: 65px;display: inline-block;">
												<span class="glyphicon glyphicon-plus-sign" style="font-size: 30px;float: left;cursor: pointer;" onclick="onm(5)"></span>
												<span style="font-size: 30px;line-height: 34px;float: left;">5</span>
											</div>
											<div style="height: 34px;width: 70px;display: inline-block;">
												<span class="glyphicon glyphicon-plus-sign" style="font-size: 30px;float: left;cursor: pointer;" onclick="onm(10)"></span>
												<span style="font-size: 30px;line-height: 34px;float: left;">10</span>
											</div>
											<div style="height: 34px;width: 160px;display: inline-block;margin-left: 20px;">
												<span class="glyphicon glyphicon-file" style="font-size: 30px;float: left;cursor: pointer;"></span>
												<span style="font-size: 24px;line-height: 34px;float: left;"><?php echo (L("Drawing")); ?></span>
											</div>
										</td>
									</tr>
								</thead>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
										<td style="width: 33%;"><?php echo ($vo["name"]); ?></td>
										<td style="width: 33%;"><?php echo ($vo["value"]); ?></td>
										<td style="width: 34%;">
											<!--修改-->
											<button class="btn btn-primary btn-xs" onclick="change_parameter(this,'<?php echo ($vo["id"]); ?>')"><?php echo (L("Modify")); ?></button>
											<!--删除-->
											<button class="btn btn-danger btn-xs" onclick="remove_parameter('<?php echo ($vo["id"]); ?>')"><?php echo (L("Delete")); ?></button>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
						</div>
						<div class="tab-pane fade" id="payment" style="height: 400px;overflow-y: scroll;">
							<!--应收货款-->
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
					<!--添加新的技术参数-->
                    <?php echo (L("new_parameter")); ?>
				</h4>
				<p style="margin-bottom: 0;font-size: 14px;"><?php echo ($info["onenumber"]); ?>.<?php echo ($info["twonumber"]); ?>.<?php echo ($info["number"]); ?> <?php echo ($info["name"]); ?></p>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<form action="" id="form_parameter">
					<div class="row" style="margin-left: 0;margin-right: 0;" id="parameter">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="save_parameter" type="submit"><?php echo (L("Save")); ?></button>
				<div type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></div>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div id="message_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<?php echo (L("edit")); ?>
				</h4>
				<p id="num_pr" style="font-size: 14px;margin-bottom: 0;"></p>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<div id="info1" class="row" style="margin-left: 0;margin-right: 0;">
					<div class="input-group" style="position: relative;">
						<span class="input-group-addon"><?php echo (L("Primarycode")); ?><span style="color: red;">*</span></span>
						<span class="caret" style="position: absolute;right: 2%;top: 46%;z-index: 20;"></span>
						<select id="queryDevice" disabled="disabled" type="text" name="queryDevice" class="form-control" onchange="getAjaxclasstwo()" data-live-search="true">
						</select>
					</div>
					<div class="input-group" style="padding-top: 12px;position: relative;">						
						<span class="input-group-addon"><?php echo (L("Secondcode")); ?><span style="color: red;">*</span></span>
						<span class="caret" style="position: absolute;right: 2%;top: 64%;z-index: 20;"></span>
						<select id="second" disabled="disabled" type="text" name="second" class="form-control">
						</select>
					</div>
					<div class="input-group" style="padding-top: 12px;">
						<span class="input-group-addon"><?php echo (L("Third_level_coding")); ?></span>
						<input type="text" name="number" readonly="readonly" class="form-control" value="" placeholder="">
					</div>
					<div class="input-group" style="padding-top: 12px;float: left;">
						<span class="input-group-addon"><?php echo (L("Productname")); ?><span style="color: red;">*</span></span>
						<input type="text" name="name" class="form-control" value="" placeholder="" onblur="productname()">
						<!--<span class="input-group-addon" style="cursor: pointer;" onclick="">检测</span>-->
					</div>
					<div id="name_check" style="float: left;padding-top: 10px;margin-left: 20px;"></div>
					<br style="clear: both;"/>
					<div class="input-group" style="padding-top: 12px;float: left;">
						<span class="input-group-addon"><?php echo (L("Abbreviation")); ?><span style="color: red;">*</span></span>
						<input type="text" name="shortname" class="form-control" value="" placeholder="" onblur="productshortname()">
						<!--<span class="input-group-addon" style="cursor: pointer;" onclick="">检测</span>-->
					</div>
					<div id="shortname_check" style="float: left;padding-top: 10px;margin-left: 20px;"></div>
					<br style="clear: both;"/>
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
						<span class="input-group-addon"><?php echo (L("key_words")); ?></span>
						<select id="getAjaxKeywords" type="text" name="queryDevice" value="" class="selectpicker form-control" data-live-search="true" multiple>
						</select>
					</div>
					<button class="btn btn-primary" style="float: left;margin-top: 12px;margin-left: 12px;" onclick="key_words()"><?php echo (L("Add_keywords")); ?></button>
				</div>
			</div>
			<div class="modal-footer">
				<button id="save_pr" type="button" class="btn btn-primary"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<!-- /.modal-dialog -->

<div id="parameter_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<!--查看和编辑技术参数-->
                    <?php echo (L("edit")); ?>
				</h4>
				<p style="font-size: 14px;margin-bottom: 0;"><?php echo ($info["onenumber"]); ?>.<?php echo ($info["twonumber"]); ?>.<?php echo ($info["number"]); ?> <?php echo ($info["name"]); ?></p>
				<p style="font-size: 14px;margin-bottom: 0;" id="parameter_name"></p>
			</div>
			<div class="modal-body" style="line-height: 34px;">
				<div class="row" style="margin-left: 0;margin-right: 0;">
					<div class="input-group">
						<span class="input-group-addon">
                            value
                        </span>
						<input type="text" name="name" id="parameter_value" class="form-control" placeholder="" style="width: 30%;">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="save_parameter1" type="button" class="btn btn-primary"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<!-- /.modal-dialog -->
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/chartist.min.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.js"></script>
<script>
	var deviceStr = "<option id='first_op' value=''><?php echo (L("Selectfirstcode")); ?></option>";
	var deviceStr1 = "<option value=''><?php echo (L("Add_keywords")); ?></option>";
//	console.log(JSON.parse('<?php echo ($keywords); ?>'));
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
			}
		})
		//关键词
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
				noneSelectedText:'<?php echo (L("Add_keywords")); ?>'
			});
			$('#getAjaxKeywords').selectpicker('refresh');
		}
	})
//	$("#queryDevice").on('shown.bs.select', function(e) {
//		$("#queryDevice").html("");
//		$('#queryDevice').append(deviceStr);
//		$('#queryDevice').selectpicker('refresh');
//	});
	
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
				//											↓ 请选择第二级编码
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
	
	function getAjaxclasstwo1(val) //二级编码
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
				//请选择第二级编码
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
				$("#second option[value='"+val+"']").attr("selected","selected");
			}
		})
	}
	
	function onm(num) {
		$('#parameter').empty();
		for(var i = 0; i < num; i++) {
			var list = '<div class="input-group" style="padding-top: 20px;"><span class="input-group-addon">规范名称</span><input type="text" name="parameter' +
				'" class="form-control"  style="width: 39%;"></div>' +
				'<div class="input-group"><span class="input-group-addon">参数值</span><input type="text" name="values' +
				'" class="form-control" placeholder="" style="width: 40%;"></div>'
			$('#parameter').append(list)
		}
		$('#node_modal').modal('toggle')
	}

	//折线图
	var data, options;

	// headline charts
	data = {
		labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
		series: [
			[23, 29, 24, 40, 25, 24, 35],
			[14, 25, 18, 34, 29, 38, 44],
		]
	};

	options = {
		height: 300,
		showArea: true,
		showLine: false,
		showPoint: false,
		fullWidth: true,
		axisX: {
			showGrid: false
		},
		lineSmooth: false,
	};

	new Chartist.Line('#headline-chart', data, options);
	//点击打开缩略图上传页面
	function onthm() {
		window.location.href = "<?php echo U('Product/productthm',array('pid'=>$info[pid]));?>";
	}
	//查看产品信息
	$('#look_pr').on('click', function() {
		$('#message_modal').modal('toggle');
		var getInfoProduct = $("#getInfoProduct").val();
		$.ajax({
			url: getInfoProduct, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				pid: $('#pid').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				var arr1 = [];
				if(data.keywords_id != null){
					arr1 = data.keywords_id.split(',');
					arr1.pop();
					arr1.shift();
					if(arr1[0] ==""){
						arr1 = [];
					}
				}
				console.log(arr1);
				$('#num_pr').text(data.onenumber + '.' + data.twonumber + '.' + data.number + " " + data.name)
//				$("#queryDevice").html("");
				$('#queryDevice').append(deviceStr);
//				$('#queryDevice').selectpicker('refresh');
				$('#queryDevice').val(data.bclassid);
				getAjaxclasstwo1(data.sclassid);
				$("input[name='name']").val(data.name)
				$("input[name='weight']").val(data.weight)
				$("input[name='long']").val(data.extent)
				$("input[name='width']").val(data.width)
				$("input[name='height']").val(data.height)
				$("input[name='number']").val(data.number)
				$("input[name='shortname']").val(data.shortname)
				$("#getAjaxKeywords").val(arr1)
				$('#getAjaxKeywords').selectpicker('refresh');
			}
		})
	})

	//修改保存产品信息
	$('#save_pr').on('click', function() {
		var saveInfoProduct = $("#saveInfoProduct").val();
		if($("input[name='name']").val() == "" || $("input[name='shortname']").val() == "") {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').html('请输入必填项');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 1500);
			return false;
		}else if($.trim($("input[name='shortname']").val()).length > 16){
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').html('简称最多16位字节');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 1500);
			return false;
		}
		$.ajax({
			url: saveInfoProduct, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				pid: $('#pid').val(),
				bclass: $("#queryDevice").val(),
				sclass: $("#second").val(),
				name: $("input[name='name']").val(),
				weight: $("input[name='weight']").val(),
				long: $("input[name='long']").val(),
				width: $("input[name='width']").val(),
				height: $("input[name='height']").val(),
				xnumber: $("input[name='number']").val(),
				shortname:$("input[name='shortname']").val(),
				keywords_id:$('#getAjaxKeywords').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				if(data == 1) {
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
					$('#message_modal').modal('toggle');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 1500);
				}else{
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('<?php echo (L("Save_failed")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 1500);
				}
			}
		})
	})

	//添加新的技术参数
	$('#save_parameter').on('click', function() {
		var arr = $('#form_parameter').serializeArray();
		var obj = [];
		var addProductExpansion = $("#addProductExpansion").val();
		for(var i = arr.length - 1; i > -1; i--) {
			if(i % 2 == 0) {
				if(arr[i].value == "" || arr[i + 1].value == "") {
					arr.splice(i, 2)
				}
			}
		}
		console.log(arr)
		for(var i = 0; i < arr.length; i++) {
			if(i % 2 == 0) {
				var list = {}
				list.name = arr[i].value
				list.value = arr[i + 1].value
				obj.push(list)
			}
		}
		console.log(obj)
		$.ajax({
			url: addProductExpansion, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				pid: $('#pid').val(),
				list: obj
			},
			dataType: "JSON",
			success: function(data) {
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
				$('#node_modal').modal('toggle');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none';location.reload()", 1500);
			}
		})
	})

	//修改单条参数
	function change_parameter(tag, id) {
		var saveProductExpansion = $("#saveProductExpansion").val();
		var a = $(tag).parents('tr').children('td').eq(0).text(),
			b = $(tag).parents('tr').children('td').eq(1).text();
		$('#parameter_name').text(a)
		$('#parameter_value').val(b)
		$('#parameter_modal').modal('toggle')
		$('#save_parameter1').on('click', function() {
			$.ajax({
				url: saveProductExpansion, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				data: {
					id: id,
					value: $('#parameter_value').val()
				},
				dataType: "JSON",
				success: function(data) {
					console.log(data)
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
					$('#parameter_modal').modal('toggle');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 1500);
				}
			})
		})
	}

	//删除一条参数
	function remove_parameter(id) {
		var dellProductExpansion = $("#dellProductExpansion").val();
		var r = confirm('<?php echo (L("Confirmdelete")); ?>?');
		if(r) {
			$.ajax({
				url: dellProductExpansion, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				data: {
					id: id
				},
				dataType: "JSON",
				success: function(data) {
					console.log(data)
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('<?php echo (L("Successfullydeleted")); ?>');//删除成功
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 1500);
				}
			})
		}
	}
	
	//产品简称检测
	function productshortname(){
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
				if(data=='can'){
					$('#shortname_check').html('<span style="color:#5cb85c;"><?php echo (L("this_have_access_to")); ?></span>');
				}else{
				    //产品简称重复
					$('#shortname_check').html('<span style="color:red;"><?php echo (L("Duplicateproduct")); ?></span>');
				}
			}
		})
	}
	//产品检测
	function productname(){
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
				if(data=='can'){
					$('#name_check').html('<span style="color:#5cb85c;"><?php echo (L("Namecanused")); ?></span>');
				}else{
					$('#name_check').html('<span style="color:red;"><?php echo (L("Duplicate_product_name")); ?></span>');
				}
				
			}
		})
	}
	//库存弹框
	function stock(pid){
		$('#p_id').val(pid);
		$('#nodes_modal').modal('toggle');
	}
	function supplier(name){
		$('#search').val(name);
		$('#lode_modal').modal('toggle');
	}
	
	function key_words() {
		console.log(1111)
		console.log($('#getAjaxKeywords').val())
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
		}
		 
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
					var t = setTimeout("node_message.style.display='none';", 1500);
				} else {
					if(t) {
						clearTimeout(t)
					};
					aaa.push(data.id);
					$('#node_message').text('<?php echo (L("Addsuccessfully")); ?>');
					node_message.style.display = 'block';
					var deviceStr1 = "<option value=''><?php echo (L("Add_keywords")); ?></option>";
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
								noneSelectedText: '<?php echo (L("Add_keywords")); ?>'
							});
							console.log(aaa);
							$('#getAjaxKeywords').val(aaa);
							$('#getAjaxKeywords').selectpicker('refresh');	
						}
					})
					var t = setTimeout("node_message.style.display='none';", 1500);
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