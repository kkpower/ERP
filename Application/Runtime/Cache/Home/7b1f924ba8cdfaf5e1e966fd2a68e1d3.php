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
<input type="hidden" id="getAjaxdata" value="<?php echo U('PurchaseOrder/getAjaxdata','','');?>">
<script>
	$('#190').parents('li').addClass('nav-active')
	$('#190').parents('li').addClass('nav-expanded')
</script>
<style>
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        padding-left: 5px;
        padding-top: 3px;
        color: #666;
    }

    .bootstrap-select {
        /*width: 50% !important;*/
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

    #binning .form-control{
        border:0;
    }
    #binning_td td{
        padding: 0;
        line-height: 34px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
                </div>

                <h2 class="panel-title"><?php echo (L("Purchaseordernumber")); ?>:<span style="color: #EE0000;font-weight: bold;">
                    <?php if($orderPurchase["order_number"] != '00000000000' ): ?>PO<?php echo ($orderPurchase["order_number"]); endif; ?>
                    <!--PO<?php echo ($orderPurchase["order_number"]); ?>-->
                </span></h2>
            </header>
            <div class="panel-body">
                <div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
                <form class="" action="<?php echo U('PurchaseOrder/productDetails',array('id'=>$gid));?>" method="get" style="display: inline-block;float: left;margin-right:15px ;">
                    <div class="input-group" style="width: 500px;">
                        <input name="search" type="text" value="<?php echo ($productname); ?>" class="form-control" placeholder="<?php echo (L("Pleaseinputtheproductname")); ?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-success">Search</button>
                        </span>
                    </div>
                    <input type="hidden" id="" name='' value="">
                    <input type="hidden" name='' value="">
                </form>
                <br style="clear: both;" />
                <table id="table" class="table table-hover mb-none table-striped table-bordered" style="border-collapse: collapse;margin-top: 15px;">
                    <thead>
                    <tr>
                        <th><?php echo (L("TrackingNumber")); ?></th>
                        <th><?php echo (L("supplier")); ?></th>
                        <th><?php echo (L("Receivingwarehouse")); ?></th>
                        <th><?php echo (L("Transporters")); ?></th>
                        <th><?php echo (L("Modeoftransport")); ?></th>
                        <th><?php echo (L("Freight")); ?></th>
                        <th><?php echo (L("Estimateddeliverydate")); ?></th>
                        <th><?php echo (L("Remarks")); ?></th>
                        <th><?php echo (L("Process")); ?></th>
                        <?php if($orderPurchase["status"] == 4 ): ?><th><?php echo (L("Reasonforfailure")); ?></th><?php endif; ?>
                        <th><?php echo (L("Applicationtime")); ?></th>
                        <th><?php echo (L("Reviewer")); ?></th>
                        <th><?php echo (L("Reviewtime")); ?></th>
                        <?php if($orderPurchase["status"] == 4 ): ?><th><?php echo (L("Operation")); ?></th><?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo ($orderPurchase["tracking_number"]); ?></td>
                            <td><a href="<?php echo U('Supplier/detail',array('id'=>$orderPurchase['supplier_id']));?>" target="_blank"><?php echo ($orderPurchase["suppliername"]); ?></a></td>
                            <td><?php echo ($orderPurchase["name"]); ?></td>
                            <td><?php echo ($orderPurchase["transporters"]); ?></td>
                            <td>
                               <?php echo ($orderPurchase["mode"]); ?>
                            </td>
                            <td><?php echo ($orderPurchase["freight"]); ?></td>
                            <input type="hidden" value="<?php echo ($orderPurchase["delivery_date"]); ?>" id="date">
                            <td id="datec"></td>
                            <td><?php echo ($orderPurchase["remarks"]); ?></td>
                            <td>
                                <?php echo ($orderPurchase["lcname"]); ?>
                            </td>
                            <?php if($orderPurchase["status"] == 4 ): ?><td><?php echo ($orderPurchase["reason"]); ?></td><?php endif; ?>
                            <td><?php echo ($orderPurchase["creationtime"]); ?></td>
                            <td><?php echo ($orderPurchase["lastname"]); echo ($orderPurchase["namezhs"]); ?></td>
                            <td><?php echo ($orderPurchase["examine_time"]); ?></td>
                            <?php if($orderPurchase["status"] == 4 ): ?><td>
                                    <button id="zq" onclick='onm("<?php echo ($orderPurchase["id"]); ?>","<?php echo ($orderPurchase["warehouse_id"]); ?>","<?php echo ($orderPurchase["freight"]); ?>","<?php echo ($orderPurchase["remarks"]); ?>")' style="border: 0px;" type="button" class="btn btn-primary btn-xs" >
                                        <?php echo (L("Modify")); ?>
                                    </button>
                                </td><?php endif; ?>
                        </tr>
                    </tbody>
                </table>
                <table id="table1" class="table table-hover mb-none table-striped table-bordered" style="border-collapse: collapse;">
                    <thead>
                    <tr>
                        <th><?php echo (L("product_number")); ?></th>
                        <th><?php echo (L("Productname")); ?></th>
                        <th><?php echo (L("UnitPrice")); ?>(<?php echo ($productlist[0]['currency']); ?>)</th>
                        <th><?php echo (L("Number")); ?></th>
                        <th><?php echo (L("Amount")); ?>(<?php echo ($productlist[0]['currency']); ?>)</th>
                        <?php if($orderPurchase["status"] == 4 ): ?><th><?php echo (L("Operation")); ?></th><?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($productlist)): $k = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                            <td><a href="<?php echo U('Product/homeProduct',array('pid'=>$vo['pid']));?>" target="_blank"><?php echo ($vo["bclassc_number"]); ?>.<?php echo ($vo["sclassc_number"]); ?>.<?php echo ($vo["snumber_number"]); ?></a></td>
                            <td><a href="<?php echo U('Product/homeProduct',array('pid'=>$vo['pid']));?>" target="_blank"><?php echo ($vo["namezh"]); ?></a></td>
                            <td><?php echo ($vo["price"]); ?></td>
                            <td><?php echo ($vo["num"]); ?></td>
                            <td><span name="xj"><?php echo ($vo["total"]); ?></span></td>
                            <?php if($orderPurchase["status"] == 4 ): ?><td>
                                <button id="" onclick='areaturn("<?php echo ($vo["id"]); ?>","<?php echo ($vo["supplier_id"]); ?>","<?php echo ($vo["supplier_pr_id"]); ?>","<?php echo ($vo["price"]); ?>","<?php echo ($vo["num"]); ?>","<?php echo ($vo["currency"]); ?>")' style="border: 0px;" type="button" class="btn btn-primary btn-xs" >
                                    <?php echo (L("Modify")); ?>
                                </button>
                                <button onclick='productDel(this,"<?php echo ($vo["id"]); ?>")' style="background: #EE0000; border: 0px;" type="button"data-toggle="modal" class="btn btn-primary btn-xs" onclick="adclass(2,'<?php echo ($vo["id"]); ?>')" >
                                    <?php echo (L("Delete")); ?>
                                </button>
                            </td><?php endif; ?>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <?php if($orderPurchase["status"] == 4 ): ?><button class="btn btn-primary" onclick="apply('<?php echo ($orderPurchase["id"]); ?>')" style="float: left;"><?php echo (L("Re-apply")); ?></button><?php endif; ?>
                <div style="float: right;">
                    <span><?php echo (L("Total")); ?>:</span>
                    <span id="total_price" style="color: #DC143C;font-size: 16px;font-weight: bold;"></span>
                    <span style="font-weight: bold;"><?php echo ($productlist[0]['currency']); ?></span>
                </div>
            </div>
        </section>

    </div>
</div>
<form onsubmit="return doeditorder(this)">
    <div id="eode_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <?php echo (L("Modifypurchaseorder")); ?>
                    </h4>
                </div>
                <div class="modal-body" style="line-height: 34px;">
                    <div class="row" style="margin-left: 0;margin-right: 0;">
                        <input type="hidden" name="platform_id" value="<?php echo ($pid); ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><?php echo (L("supplier")); ?><span style="color: red;">*</span></span>
                            <input name="supplier_id" class="form-control" type="text" value="<?php echo ($orderPurchase["suppliername"]); ?>" id="supplier_sid" readonly="readonly">
                        </div>
                        <div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
                            <div class="input-group">
                                <input type="hidden" id="kid">
                                <span class="input-group-addon"><?php echo (L("warehouse")); ?><span style="color: red;">*</span></span>
                                <select name="warehouse_id" class="form-control" style="width: 44%;" id="ck">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo (L("Transporters")); ?><span style="color: red;">*</span></span>
                                <select class="form-control" style="width: 44%;" id="transj" name="transporter" onchange="getAjaxshipping()">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo (L("Modeoftransport")); ?><span style="color: red;">*</span></span>
                                <select name="transport" class="form-control" style="width: 44%;" id="transport">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo (L("Freight")); ?></span>
                                <input type="hidden" id="oid" name="id">
                                <input name="freight" class="form-control" type="text" value="" id="freight">
                            </div>
                        </div>
                        <div class="input-group" style="padding-top: 20px;">
                            <span class="input-group-addon"><?php echo (L("Remarks")); ?></span>
                            <input name="remarks" class="form-control" type="text" value="" id="remarks">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="add_pr" type="submit"><?php echo (L("confirm")); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    </div>
</form>

<form onsubmit="return doeditgoods(this)">
    <div id="node_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <?php echo (L("Modifypurchaseorder")); ?>
                    </h4>
                </div>
                <div class="modal-body" style="line-height: 34px;">

                    <div class="row" style="margin-left: 0;margin-right: 0;">
                        <input type="hidden" name="platform_id" value="<?php echo ($pid); ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><?php echo (L("supplier")); ?><span style="color: red;">*</span></span>
                            <input type="hidden" id="gid">
                            <input type="hidden" id="odid" name="odid">
                            <input name="supplier_id" class="form-control" type="text" value="<?php echo ($orderPurchase["suppliername"]); ?>" id="supplier_id" readonly="readonly">
                        </div>
                        <div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
                        <div class="input-group">
                            <span class="input-group-addon"><?php echo (L("Billingcurrency")); ?><span style="color: red;">*</span></span>
                            <input name="curry" class="form-control" type="text" value="" id="curry" readonly="readonly" style="width:30%;">
                        </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
                            <div class="input-group">
                                <input type="hidden" id="productid">
                                <span class="input-group-addon"><?php echo (L("Productname")); ?><span style="color: red;">*</span></span>
                                <select id="pid" data-live-search="true" name="supplier_pr_id" class="pid form-control" onchange="getAjaxprice()">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo (L("UnitPrice")); ?><span style="color: red;">*</span></span>
                                <input name="pricek" class="form-control" type="text" value="" id="pice" readonly="readonly">
                                <span class="input-group-addon"><?php echo (L("Number")); ?><span style="color: red;">*</span></span>
                                <input name="num" class="form-control" type="text" value="" id="num">
                            </div>
                        </div>

                    </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="add_prd" type="submit"><?php echo (L("confirm")); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    </div>
</form>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.js"></script>
<script>
    var date=$('#date').val();
    var sub = date.substring(0,10);
//    alert(sub);
    $('#datec').text(sub);
    //删除订单下的产品
    function productDel(obj,id){
        var r = confirm(" <?php echo (L("Confirmdelete")); ?>?");
        if (r){
            $.ajax({
                url:"<?php echo U('PurchaseOrder/productDel');?>",
                type:'post',
                dataType:"json",
                data:{
                    id:id
                },
                success:function(data){
                    if (data.status==0){
                        $('#node_message').html('<?php echo (L("Operationauthority")); ?>');
                        node_message.style.display = 'block';
                        var t = setTimeout("node_message.style.display='none';", 2000);
                    }else if (data>0) {
                        $(obj).parents("tr").remove();
                        $('#node_message').html('<?php echo (L("Successfullydeleted")); ?>');
                        node_message.style.display = 'block';
                        var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
                    }else{
                        $('#node_message').html('<?php echo (L("Failedtodelete")); ?>');
                        node_message.style.display = 'block';
                    }
                }
            });
        }
    }
    //修改采购订单信息弹框
    function onm(oid,kid,freight,remarks){
        $('#freight').val(freight);
        $('#remarks').val(remarks);
        $('#oid').val(oid);
        var url = $('#getAjaxdata').val();
        $.ajax({
            url:url,
            type:'post',
            dataType:'JSON',
            success:function (data) {
                console.log(data);
//                var p = "<option id='fulys' value=''>请选择运输方式</option>";
//                $('#transports').html(p);
//                for (i=0;i<data['transport'].length;i++){
//                    var p = "<option value='"+data['transport'][i]['id']+"'>"+data['transport'][i]['namezh']+"</option>";
//                    $('#fulys').after(p);
//                }
//                $('#transports').val(transport);
                var g = "<option id='fulck' value=''>请选择仓库</option>";
                $('#ck').html(g);
                for (i=0;i<data['warehouse'].length;i++){
                    var g = "<option value='"+data['warehouse'][i]['id']+"'>"+data['warehouse'][i]['name']+"</option>";
                    $('#fulck').after(g);
                }
                var y = "<option id='fulyss' value=''>--请选择运输商--</option>";
                $('#transj').html(y);
                for(i = 0; i < data['transporter'].length; i++) {
                    var y = "<option value='" + data['transporter'][i]['id'] + "'>" + data['transporter'][i]['transporters'] + "</option>";
                    $('#fulyss').after(y);
                }
                $('#ck').val(kid);
//                $('#transj').val(transporter);
            }
        });
        $('#eode_modal').modal('toggle');
    }
    //获取运输商的运输方式
    function getAjaxshipping(){
        transj = $('#transj').val();
        $.ajax({
            url: "<?php echo U('PurchaseOrder/getAjaxshipping');?>", //通过页面元素的ID来获取设备ID
            type: "post", //选择传值方式
            data: {
                tranid: transj
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var p = "<option id='transport_mode' value=''>请选择运输方式</option>"
                $("#transport").html(p);
                //将获取到的数据赋值
                for(var i = 0; i < data.length; i++) {
                    //拼接option标签的 name value 等属性
                    var p = "<option value='" +
                            data[i]['id'] +
                            "'" +
                            ">" +
                            data[i]['mode'] +
                            "</option>";
                    $("#transport_mode").after(p);
                }

            }
        })
    }
    //修改采购订单产品弹框
    function areaturn(id,supplier_id,supplier_pr_id,price,num,currency) {
        $.ajax({
            url: "<?php echo U('PurchaseOrder/getAjaxproductcurry');?>", //通过页面元素的ID来获取产品ID
            type: "post", //选择传值方式
            data: {
                id:id,
                superior: supplier_id,
                curry:currency
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var p = "<option class='second_op' value=''>请选择产品</option>"
                $(".pid").html(p);
                //将获取到的数据赋值
                for(var i = 0; i < data.length; i++) {
                    //拼接option标签的 name value 等属性
                    var p = "<option value='" +
                        data[i]['pid'] +
                        "'" +
                        ">" +
                        data[i]['namezh'] +
                        "</option>";
                    $(".second_op").after(p);
                }
                $('#gid').val(supplier_id);
                $('#odid').val(id);
                $('#productid').val(supplier_pr_id);
                var productid = $('#productid').val();
                $('#pid').val(productid);
                console.log(pid);
                $('#pice').val(price);
                $('#curry').val(currency);
                $('#num').val(num);
                $('#node_modal').modal('toggle');

            }
        })

    }
    function getAjaxprice() //供应商下的产品单价
    {
        $.ajax({
            url: "<?php echo U('PurchaseOrder/getAjaxprice');?>", //通过页面元素的ID来获取产品ID
            type: "post", //选择传值方式
            data: {
                suprice: $('#pid').val(),
                superior: $('#gid').val()
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                //将获取到的数据赋值
                if (data==''){
                    $("#pice").val('');
                } else{
                    //for(var i = 0; i < data.length; i++) {
                    //拼接option标签的 name value 等属性
                    var p = data[0].price;
                    $("#pice").val(p);
                    $("#curry").val(data[0].bname);
                    //}
                }

            }
        })
    }

    //修改采购订单信息
    function doeditorder(form){
        $.ajax({
            url:"<?php echo U('PurchaseOrder/editOrderinfo');?>",
            type:"post",
            data:$(form).serialize(),
            dataType:"json",
            async:true,
            success:function(data){
                if (data.status==0){
                    $('#node_message').html('<?php echo (L("Operationauthority")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }else if(data>0){
                    $('#node_message').html('<?php echo (L("Successfullymodified")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
                }
            }
        });
        return false;
    }
    //修改采购订单产品
    function doeditgoods(form){
        $.ajax({
            url:"<?php echo U('PurchaseOrder/editOrdergoods');?>",
            type:"post",
            data:$(form).serialize(),
            dataType:"json",
            async:true,
            success:function(data){
                if (data.status==0){
                    $('#node_message').html('<?php echo (L("Operationauthority")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';", 2000);
                }else if(data>0){
                    $('#node_message').html('<?php echo (L("Successfullymodified")); ?>');
                    node_message.style.display = 'block';
                    var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
                }
            }
        });
        return false;
    }
    //采购订单重新申请
    function apply(id){
        var r = confirm("<?php echo (L("Makesuretoreapply")); ?>");
        if (r){
            $.ajax({
                url:"<?php echo U('PurchaseOrder/applyAgain');?>",
                type:'post',
                dataType:"json",
                data:{
                    id:id
                },
                success:function(data){
                    if (data.status==0){
                        $('#node_message').html('<?php echo (L("Operationauthority")); ?>');
                        node_message.style.display = 'block';
                        var t = setTimeout("node_message.style.display='none';", 2000);
                    }else if (data=='NO') {
                        $('#node_message').html('<?php echo (L("Accesserror")); ?>');
                        node_message.style.display = 'block';
                    }else if (data>0) {
                        $('#node_message').html('<?php echo (L("Successfulapplication")); ?>');
                        node_message.style.display = 'block';
                        var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
                    }else{
                        $('#node_message').html('<?php echo (L("Applicationfailed")); ?>');
                        node_message.style.display = 'block';
                    }
                }
            });
        }
    }
    $(document).ready(function() {
        $('#table1').DataTable({
            "paging": false,
            "lengthChange": false,
            "info": false,
            "searching": false
        });
    });
    var sum=0;
    $("span[name='xj']").each(function(){
        sum+=+$(this).text();
    });
    $("#total_price").text(sum.toFixed(1));
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