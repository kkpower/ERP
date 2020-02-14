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
    $('#343').parents('li').addClass('nav-active')
    $('#343').parents('li').addClass('nav-expanded')
</script>
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.css" />
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.css" />
<div id="node_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" style="width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <?php echo (L("Nationalinformation")); ?>
                </h4>
            </div>
            <div class="modal-body" style="line-height: 34px;">
                <input type="hidden" id="countryid">
                <div class="row" style="margin-left: 0;margin-right: 0;">
                    <div class="input-group">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("Janespell")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="simplicity" onblur="getajaxRepeat(1)">
                    </div>
                    <div id="name_check1" style="float: left;margin-left: 20px;"></div>
                    <br style="clear: both;" />
                    <div class="input-group">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("Chinesename")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="namezh" onblur="getajaxRepeat(2)">
                    </div>
                    <div id="name_check2" style="float: left;margin-left: 20px;"></div>
                    <br style="clear: both;" />
                    <div class="input-group">
                        <span class="input-group-addon"><?php echo (L("Engname")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="nameus" onblur="getajaxRepeat(3)">
                    </div>
                    <div id="name_check3" style="float: left;margin-left: 20px;"></div>
                    <br style="clear: both;" />
                    <div class="input-group">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("Currencyname")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="money" onblur="getajaxRepeat(4)">
                    </div>
                    <div id="name_check4" style="float: left;margin-left: 20px;"></div>
                    <br style="clear: both;" />
                    <div class="input-group">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("Currencysymbol")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="symbol" onblur="getajaxRepeat(5)">
                    </div>
                    <div id="name_check5" style="float: left;margin-left: 20px;"></div>
                    <br style="clear: both;" />
                    <div class="input-group">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("Currencyshortname")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="currency"  onblur="getajaxRepeat(6)">
                    </div>
                    <div id="name_check6" style="float: left;margin-left: 20px;"></div>
                    <br style="clear: both;" />
                    <div class="input-group">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("RMBexchangerate")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="exchange_rate">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="add_pr" type="submit" onclick="saveCountry()"><?php echo (L("Save")); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div id="sode_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" style="width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <?php echo (L("companyinformation")); ?>
                </h4>
            </div>
            <div class="modal-body" style="line-height: 34px;">
                <input type="hidden" id="companyid">
                <div class="row" style="margin-left: 0;margin-right: 0;">
                    <div class="input-group">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("Chinesename")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="gsnamezh">
                    </div>
                    <div class="input-group" style="margin-top: 20px;">
                        <span class="input-group-addon" style="margin-top: 20px;"><?php echo (L("Engname")); ?><span style="color: red;">*</span></span>
                        <input type="text" class="form-control" placeholder="" id="gsnameus">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" onclick="saveCompany()"><?php echo (L("Save")); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
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

                <h2 class="panel-title"><?php echo (L("systemconfiguration")); ?></h2>
            </header>
            <div class="panel-body">
                <div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
                <!--<form class="" action="<?php echo U('My/teleList');?>" method="get" style="display: inline-block;float: left;margin-right:15px ;">-->
                    <!--<input type="hidden" value="<?php echo ($pid); ?>" name="id">-->
                    <!--<div class="input-group" style="width: 500px;">-->
                        <!--<input name="search" type="text" value="" class="form-control" placeholder="请输入你想查询的姓名">-->
                    	<!--<span class="input-group-btn">-->
		                    <!--<button type="submit" class="btn btn-success" style="white-space: nowrap;">搜索</button>-->
		                <!--</span>-->
                    <!--</div>-->
                    <!--<input type="hidden" id="" name='' value="">-->
                    <!--<input type="hidden" name='' value="">-->
                <!--</form>-->
                <!--<br style="clear: both;" />-->
                <table id="table1" class="table table-hover mb-none table-striped table-bordered" style="border-collapse: collapse;">
                    <thead>
                    <tr>
                        <th><?php echo (L("Corporatename")); ?></th>
                        <th><?php echo (L("warehousename")); ?></th>
                        <th><?php echo (L("CountryName")); ?></th>
                        <th>操作</th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                            <td><a href="#" onclick="company('<?php echo ($vo["company"]); ?>')"><?php echo ($vo["namezh"]); ?></a></td>
                            <td><a href="<?php echo U('Warehouse/inLibrary',array('k_id'=>$vo['warehouse_physical']));?>" target="_blank"><?php echo ($vo["name"]); ?></a></td>
                            <td><a href="#" onclick="country('<?php echo ($vo["country"]); ?>')"><?php echo ($vo["countryzh"]); ?></a></td>
                        	<td></td>
                        	<td style="display: none;"><?php echo ($vo["company"]); ?></td>
                        	<td style="display: none;"><?php echo ($vo["warehouse_physical"]); ?></td>
                        	<td style="display: none;"><?php echo ($vo["country"]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <ul class="pager" style="width: 100%;">
                    <!-- 分页显示 --><?php echo ($page); ?></ul>
            </div>
        </section>
    </div>
</div>

<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.js"></script>
<script>
	var oTable;
    $(document).ready(function() {
        oTable = $('#table1').dataTable({
			"paging": false,
			"lengthChange": false,
			"info": false,
			"searching": false,
			"fnCreatedRow": function(nRow, aData, iDataIndex) {
				$('td:eq(3)', nRow).prepend("<button class='row-details row-details-close btn btn-info btn-xs' data_id='"+ aData[4] +"' data_cid='" + aData[5] + "' data_oid='"+ aData[6] +"'>详情</button>");
			},
		});
		$('.table').on('click', ' tbody td .row-details', function() {
			var nTr = $(this).parents('tr')[0];
			console.log(oTable);
			if(oTable.fnIsOpen(nTr)) //判断是否已打开
			{
				/* This row is already open - close it */
				$(this).addClass("row-details-close").removeClass("row-details-open");
				oTable.fnClose(nTr);
			} else {
				/* Open this row */
				$(this).addClass("row-details-open").removeClass("row-details-close");
				//  alert($(this).attr("data_id"));
				//oTable.fnOpen( nTr,
				// 调用方法显示详细信息 data_id为自定义属性 存放配置ID
				fnFormatDetails(nTr, $(this).attr("data_id"),$(this).attr("data_cid"),$(this).attr("data_oid"));
			}
		});
    });
    //详情
	function fnFormatDetails(nTr, pdataId, pcid, poid) {
		console.log(pdataId)
		console.log(poid)
		$.ajax({
			url: "<?php echo U('Deliverycenter/1111');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				company: pdataId,
				warehouse:pcid,
				country: poid	
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var sOut = '';
				for(var i = 0; i < data.length; i++) {
					sOut += '<div>' +
						'<img src="/InternalSystem' + data[i].thumb + '" /><span>x' + data[i].number + '</span>' +
						'<p><a target="_blank" href="' + "<?php echo U('Product/homeProduct','','');?>/pid/" + data[i].pid + '">' + data[i].namezh + '</a></p>' +
						'<p><a target="_blank" href="' + "<?php echo U('Product/homeProduct','','');?>/pid/" + data[i].pid + '">料号:' + data[i].bclass + '.' + data[i].sclass + '.' + data[i].num + '</p>' +
						'</div>';
				}
				oTable.fnOpen(nTr, sOut, 'details');
			}
		})

	}
    //查看公司信息
    function company(company_id){
        $('#gsnamezh').val();
        $('#gsnameus').val();
        $('#companyid').val(company_id);
        $.ajax({
            url: "<?php echo U('Organizationt/getajaxCompany','','');?>",
            type: 'post',
            dataType: 'JSON',
            data:{
                id:company_id
            },
            success: function(data) {
                console.log(data);
                $('#gsnamezh').val(data.namezh);
                $('#gsnameus').val(data.nameus);
            }
        });
        $('#sode_modal').modal('toggle');
    }
    //查看国家信息
    function country(country_id) {
        $('#countryid').val(country_id);
        $.ajax({
            url: "<?php echo U('Organizationt/getajaxCountry','','');?>",
            type: 'post',
            dataType: 'JSON',
            data:{
                id:country_id
            },
            success: function(data) {
                console.log(data);
                $('#simplicity').val(data.spelling);
                $('#namezh').val(data.countryzh);
                $('#nameus').val(data.countryus);
                $('#symbol').val(data.symbol);
                $('#currency').val(data.currency);
                $('#exchange_rate').val(data.exchange_rate);
                $('#money').val(data.money);
            }
        });
        $('#node_modal').modal('toggle');
    }
    //更改国家信息
    function saveCountry() {
        var id = $('#countryid').val();
        var simplicity = $('#simplicity').val();
        var namezh = $('#namezh').val();
        var nameus = $('#nameus').val();
        var symbol = $('#symbol').val();
        var currency = $('#currency').val();
        var exchange_rate = $('#exchange_rate').val();
        var money = $('#money').val();
        $.ajax({
            url: "<?php echo U('Organizationt/saveCountry');?>",
            type: 'post',
            dataType: 'JSON',
            data:{
                id:id,
                spelling:simplicity,
                countryzh:namezh,
                countryus:nameus,
                symbol:symbol,
                currency:currency,
                exchange_rate:exchange_rate,
                money:money
            },
            success: function(data) {
                console.log(data);
                if (data=='NO'){
                    $('#node_message').html('<?php echo (L("Cannotbeempty")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }else if(data > 0) {
                    $('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';location.reload()", 2000);

                } else{
                    $('#node_message').html('<?php echo (L("Noinformationhasbeenmodified")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }
            }
        });
    }

    //更改公司信息
    function saveCompany() {
        var id = $('#companyid').val();
        var namezh = $('#gsnamezh').val();
        var nameus = $('#gsnameus').val();

        $.ajax({
            url: "<?php echo U('Organizationt/saveCompany');?>",
            type: 'post',
            dataType: 'JSON',
            data:{
                id:id,
                namezh:namezh,
                nameus:nameus

            },
            success: function(data) {
                console.log(data);
                if(data=='of'){
                    $('#node_message').html('<?php echo (L("Cannotbeempty")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }else if (data=='zh'){
                    $('#node_message').html('<?php echo (L("TheChinesenamealreadyexists")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }else if (data=='us'){
                    $('#node_message').html('<?php echo (L("TheEnglishnamealreadyexists")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }else if(data > 0) {
                    $('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';location.reload()", 2000);

                } else{
                    $('#node_message').html('<?php echo (L("Noinformationhasbeenmodified")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }
            }
        });
    }
    //检测国家重复信息
    function getajaxRepeat(type) {
        var id = $('#countryid').val();
        switch (type){
            case 1:
                var name = $("#simplicity").val();
                break;
            case 2:
                var name = $('#namezh').val();
                break;
            case 3:
                var name = $('#nameus').val();
                break;
            case 4:
                var name = $('#money').val();
                break;
            case 5:
                var name = $('#symbol').val();
                break;
            case 6:
                var name = $('#currency').val();
                break;
        }

        $.ajax({
            url: "<?php echo U('Organizationt/getajaxRepeat');?>",
            type: "post", //选择传值方式
            data: {
                type:type,
                id:id,
                name: name
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                if(type == 1) {
                    if (data>0){
                        $('#name_check1').html('<span style="color:red;"><?php echo (L("Simplyrepeat")); ?></span>');
                    }else{
                        $('#name_check1').html('<span style="color:#5cb85c;"><?php echo (L("Thissimplespellcanbeused")); ?></span>');
                    }
                }else if (type==2){
                    if (data>0){
                        $('#name_check2').html('<span style="color:red;"><?php echo (L("Chinesenamerepeat")); ?></span>');
                    }else{
                        $('#name_check2').html('<span style="color:#5cb85c;"><?php echo (L("Namecanused")); ?></span>');
                    }
                }else if (type==3){
                    if (data>0){
                        $('#name_check3').html('<span style="color:red;"><?php echo (L("DuplicateEnglishname")); ?></span>');
                    }else{
                        $('#name_check3').html('<span style="color:#5cb85c;"><?php echo (L("Namecanused")); ?></span>');
                    }
                }else if (type==4){
                    if (data>0){
                        $('#name_check4').html('<span style="color:red;"><?php echo (L("Duplicatecurrencyname")); ?></span>');
                    }else{
                        $('#name_check4').html('<span style="color:#5cb85c;"><?php echo (L("Thecurrencynamecanbeused")); ?></span>');
                    }
                }else if (type==5){
                    if (data>0){
                        $('#name_check5').html('<span style="color:red;"><?php echo (L("Currencysymbolrepetition")); ?></span>');
                    }else{
                        $('#name_check5').html('<span style="color:#5cb85c;"><?php echo (L("currencysymbolcanbeused")); ?></span>');
                    }
                }else if (type==6){
                    if (data>0){
                        $('#name_check6').html('<span style="color:red;"><?php echo (L("currencyabbreviations")); ?></span>');
                    }else{
                        $('#name_check6').html('<span style="color:#5cb85c;"><?php echo (L("Thiscurrencyabbreviationcanbeused")); ?></span>');
                    }
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