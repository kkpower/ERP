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
	
	select::-ms-expand {
		display: none;
	}
	
	.caret {
		color: #333 !important;
	}
	
	#binning .form-control {
		border: 0;
	}
	
	#binning_td td {
		padding: 0;
		line-height: 34px;
	}
</style>
<script>
	$('#190').parents('li').addClass('nav-active')
	$('#190').parents('li').addClass('nav-expanded')
</script>
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.css" />
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.css" />
<input type="hidden" id="getAjaxdata" value="<?php echo U('PurchaseOrder/getAjaxdata','','');?>">
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>

				<h2 class="panel-title"><?php echo (L("purchase_order_application")); ?></h2>
			</header>
			<div class="panel-body">
				<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
				<form class="" action="<?php echo U('PurchaseOrder/purchaseOrder');?>" method="get" style="display: inline-block;float: left;margin-right:15px ;">
					<div class="input-group" style="width: 500px;">
						<span class="input-group-addon">
                    		<?php echo (L("ordernumber")); ?>
                		</span>
						<input type="hidden" value="<?php echo ($purchsearch); ?>" id="purchsearch">
						<input id="ord" name="search" type="text" value="" class="form-control" placeholder="<?php echo (L("Pleaseordernumber")); ?>">
						<span class="input-group-addon">
                    		<?php echo (L("state")); ?>
                		</span>
						<input type="hidden" value="<?php echo ($status); ?>" id="status">
						<select class="form-control" name="status" id="orderall">
							<option value="">--<?php echo (L("All")); ?>--</option>
							<?php if(is_array($status_ex)): foreach($status_ex as $key=>$or): ?><option value="<?php echo ($or["val"]); ?>"><?php echo ($or["namezh"]); ?></option><?php endforeach; endif; ?>
						</select>
						<span class="input-group-btn">
								<button type="submit" class="btn btn-success" style="white-space: nowrap;"><?php echo (L("Search")); ?></button>
							</span>

					</div>
					<input type="hidden" id="" name='' value="">
					<input type="hidden" name='' value="">
				</form>
				<button class="btn btn-primary" onclick="onm()" style="float: left;margin-left: 20px;"><?php echo (L("Application")); ?></button>
				<br style="clear: both;" />
				<table id="table1" class="table table-hover mb-none table-striped table-bordered" style="border-collapse: collapse;">
					<thead>
						<tr>
							<th><?php echo (L("Id")); ?></th>
							<th><?php echo (L("ordernumber")); ?></th>
							<th><?php echo (L("TrackingNumber")); ?></th>
							<th><?php echo (L("supplier")); ?></th>
							<th><?php echo (L("Receivingwarehouse")); ?></th>
							<th><?php echo (L("Transporters")); ?></th>
							<th><?php echo (L("Modeoftransport")); ?></th>
							<!--<th>运费</th>-->
							<th><?php echo (L("state")); ?></th>
							<th><?php echo (L("Reviewer")); ?></th>
							<th><?php echo (L("Reviewtime")); ?></th>
							<th><?php echo (L("Operation")); ?></th>
						</tr>
					</thead>
					<tbody id="tbody-resdult">
						<?php if(is_array($purchaselist)): $k = 0; $__LIST__ = $purchaselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
								<td><?php echo ($k); ?></td>
								<td>
									<?php if($vo["order_number"] != '00000000000' ): ?>PO<?php echo ($vo["order_number"]); endif; ?>
								</td>
								<td><?php echo ($vo["tracking_number"]); ?></td>
								<td><a href="<?php echo U('Supplier/detail',array('id'=>$vo['supplier_id']));?>" target="_blank"><?php echo ($vo["suppliername"]); ?></a></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["transporters"]); ?></td>
								<td>
									<?php echo ($vo["mode"]); ?>
								</td>
								<!--<td><?php echo ($vo["freight"]); ?></td>-->
								<td>
									<?php echo ($vo["lcname"]); ?>
								</td>
								<td><?php echo ($vo["lastname"]); echo ($vo["namezhs"]); ?></td>
								<td><?php echo ($vo["examine_time"]); ?></td>
								<td>
									<!--<a href="<?php echo U('PurchaseOrder/boxPacking',array('id'=>$vo['id']));?>" target="_blank" style="border: 0px;color: #fff;" class="btn btn-primary btn-xs">箱子</a>-->
									<?php if($vo["status"] == 3 ): ?><button onclick='mpdf("<?php echo ($vo["id"]); ?>")' style="border: 0px;" type="button" class="btn btn-primary btn-xs">
										pdf
									</button><?php endif; ?>
									<!--<?php if($vo["status"] == 3 ): ?>-->
										<!--<button onclick='ylmpdf("<?php echo ($vo["id"]); ?>")' style="border: 0px;" type="button" class="btn btn-primary btn-xs">-->
											<!--预览-->
										<!--</button>-->
									<!--<?php endif; ?>-->
									<?php if($vo["status"] == 3 ): ?><button onclick='casempdf("<?php echo ($vo["id"]); ?>")' style="border: 0px;" type="button" class="btn btn-primary btn-xs">
											<?php echo (L("Packingbox")); ?>
										</button><?php endif; ?>
									<a href="<?php echo U('PurchaseOrder/productDetails',array('id'=>$vo['id']));?>" target="_blank" style="border: 0px;color: #fff;" class="btn btn-primary btn-xs"><?php echo (L("Details")); ?></a>
									<!--<?php if($vo["status"] == 4 ): ?>-->
									<!--<button onclick='orderPdf("<?php echo ($vo["id"]); ?>")' style="border: 0px;" type="button" data-toggle="modal" class="btn btn-primary btn-xs" >-->
									<!--pdf-->
									<!--</button>-->
									<!--<?php endif; ?>-->
									<?php if($vo["status"] == 4 ): ?><button onclick='orderDel(this,"<?php echo ($vo["id"]); ?>")' style="background: #EE0000; border: 0px;" type="button" data-toggle="modal" class="btn btn-primary btn-xs">
											<?php echo (L("Delete")); ?>
									</button><?php endif; ?>
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

<form onsubmit="return doadd(this)">
	<div id="node_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">
						<?php echo (L("Applyforapurchaseorder")); ?>
					</h4>
				</div>
				<div class="modal-body" style="line-height: 34px;">
					<div class="row" style="margin-left: 0;margin-right: 0;">
						<input type="hidden" name="platform_id" value="<?php echo ($pid); ?>">
						<div class="col-md-6" style="padding-left: 0;">
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("supplier")); ?><span style="color: red;">*</span></span>
								<select id="first" type="text" name="supplier_id" class="form-control" onchange="getAjaxproduct()">
								</select>
								<!--<input type="text" name="type" class="form-control" placeholder="" style="width: 30%;">-->
							</div>
						</div>
						<div class="col-md-12" style="padding-left: 0;padding-top: 15px;">
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("Productname")); ?><span style="color: red;">*</span></span>
								<select id="pid0" name="supplier_pr_id[]" class="selectpicker pid form-control" onchange="getAjaxprice()" data-live-search="true">
								</select>
							</div>
						</div>
						<input type="hidden" id="productioncycle0" value="" name="delivery_date[]">
						<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("Minimumpurchasevolume")); ?></span>
								<input id="purchase0" readonly="readonly" class="form-control" type="text" value="" name="minimum[]">
							</div>
						</div>
						<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("Minimumnumberofpackages")); ?></span>
								<input id="packing0" readonly="readonly" class="form-control" type="text" value="" name="packing[]">
							</div>
						</div>

						<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("UnitPrice")); ?></span>
								<input name="price[]" class="form-control" type="text" value="" id="pice0" readonly="readonly" style="width: 80%">
								<input name="currency[]" class="form-control" type="text" value="" id="currency0" readonly="readonly" style="width: 20%">
							</div>
						</div>
						<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">
							<div class="input-group">
								<span class="input-group-addon"><?php echo (L("Number")); ?><span style="color: red;">*</span></span>
								<input name="num[]" class="form-control" type="text" value="" id="num0">
							</div>
						</div>
						<div id="add_tel">

						</div>
					</div>
					<div onclick="add_tel()" class="addxm" style="margin-top: 10px;color: #fff;background-color: #0088cc;border-color: #0088cc;width: 80px;height: 30px;border-radius: 4px;text-align: center;line-height: 30px;cursor: pointer;float: left;"><?php echo (L("Newproduct")); ?></div>
					<div onclick="binning()" class="addxm" style="margin-top: 10px;color: #fff;background-color: #0088cc;border-color: #0088cc;width: 80px;height: 30px;border-radius: 4px;text-align: center;line-height: 30px;cursor: pointer;float: left;margin-left: 20px;"><?php echo (L("Productbin")); ?></div>
					<br style="clear: both;" />
					<div id="binning" style="display: none;padding-top: 20px;">
						<table class="table table-bordered" style="text-align: center;">
							<tr id="binning_th">

							</tr>
							<tbody id="binning_td" style="border: 0;">
							</tbody>
						</table>
						<div class="btn btn-primary" id="add_box"><?php echo (L("Addbox")); ?></div>
					</div>
					<div class="col-md-4" style="padding-left: 0;padding-top: 15px;">
						<div class='input-group date' id='datetimepicker1'>
							<span class="input-group-addon"><?php echo (L("Deliverydate")); ?></span>
							<input type='text' name="date" class="form-control" />
							<span class="input-group-addon">  
				                    <span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div style="float: left;margin-top: 15px;" class="btn btn-primary" onclick="delivery_date()"><?php echo (L("Calculatethedeliverydate")); ?></div>
					<br style="clear: both;" />
					<div class="input-group" style="padding-top: 20px;">
						<span class="input-group-addon"><?php echo (L("Receivingwarehouse")); ?><span style="color: red;">*</span></span>
						<select name="warehouse_id" class="form-control" style="width: 44%;" id="warehouse_id">
						</select>
					</div>
					<div class="input-group" style="padding-top: 20px;">
						<span class="input-group-addon"><?php echo (L("Transporters")); ?><span style="color: red;">*</span></span>
						<select class="form-control" style="width: 44%;" id="transj" name="transporter" onchange="getAjaxshipping()">
						</select>
					</div>
					<div class="input-group" style="padding-top: 20px;">
						<span class="input-group-addon"><?php echo (L("Modeoftransport")); ?><span style="color: red;">*</span></span>
						<select name="transport" class="form-control" style="width: 44%;" id="transport">
						</select>
					</div>
					<div class="input-group" style="padding-top: 20px;">
						<span class="input-group-addon"><?php echo (L("TrackingNumber")); ?></span>
						<input name="trackingnumber" class="form-control" type="text" value="" >
					</div>
					<div class="input-group" style="padding-top: 20px;">
						<span class="input-group-addon"><?php echo (L("Freight")); ?></span>
						<input name="freight" class="form-control" type="text" value="">
					</div>
					<div class="input-group" style="padding-top: 20px;">
						<span class="input-group-addon"><?php echo (L("Remarks")); ?></span>
						<input name="remarks" class="form-control" type="text" value="">
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

<div id="show_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document" style="width: 50%;">
		<div class="modal-content">
			<div class="modal-body" style="line-height: 34px;">
				<div class="row" style="margin-left: 0;margin-right: 0;">
					<table class="table table-hover table-striped" style="margin-top: 20px;">
						<thead>
							<tr>
								<th>序号</th>
								<th>用户</th>
							</tr>
						</thead>
						<tbody id="tbody-result">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-select.js"></script>
<script type="text/javascript">
	//日期控件
	$(document).ready(function() {
		$('#datetimepicker1').datetimepicker({
			format: "yyyy-mm-dd",
			minView: 'month',
			language: 'zh-CN',
			autoclose: true,
			todayBtn: true,
			pickerPosition: "bottom-left"
		});
	})
</script>
<script>

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
				var p = "<option id='transport_mode' value=''><?php echo (L("Pleasechoosethemodeoftransportation")); ?></option>"
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
	var purchsearch = $('#purchsearch').val();
	$('#ord').val(purchsearch);
	var status = $('#status').val();
	$('#orderall').val(status);
	function ylmpdf(id) {
		// window.open("/InternalSystem/index.php/Home/PurchaseOrder/mPdf?id="+id ,"_blank");
		var form = $("<form method='post'  target='_blank'></form>");
		var url = "<?php echo U('PurchaseOrder/previewPdf');?>";
		form.attr({
			"action": url
		});
		var input = $("<input type='hidden' name='id'>");
		input.val(id);
		form.append(input);
		$("html").append(form);
		form.submit();
	}
	function mpdf(id) {
		// window.open("/InternalSystem/index.php/Home/PurchaseOrder/mPdf?id="+id ,"_blank");
		var form = $("<form method='post'  target='_blank'></form>");
		var url = "<?php echo U('PurchaseOrder/purchaseOrderPdf');?>";
		form.attr({
			"action": url
		});
		var input = $("<input type='hidden' name='id'>");
		input.val(id);
		form.append(input);
		$("html").append(form);
		form.submit();
	}
	function casempdf(id) {
		// window.open("/InternalSystem/index.php/Home/PurchaseOrder/mPdf?id="+id ,"_blank");
		var form = $("<form method='post'  target='_blank'></form>");
		var url = "<?php echo U('PurchaseOrder/boxPacking');?>";
		form.attr({
			"action": url
		});
		var input = $("<input type='hidden' name='id'>");
		input.val(id);
		form.append(input);
		$("html").append(form);
		form.submit();
	}
	$("#pid0").selectpicker({
		noneSelectedText: '--<?php echo (L("Pleaseselectaproduct")); ?>--'
	});
	$(document).ready(function() {
		$('#table1').DataTable({
			"paging": false,
			"lengthChange": false,
			"info": false,
			"searching": false
		});
	});
	//申请采购订单弹框
	function onm() {
		var url = $('#getAjaxdata').val();
		$.ajax({
			url: url,
			type: 'post',
			dataType: 'JSON',
			success: function(data) {
				console.log(data);
				var g = "<option id='fulck' value=''>--<?php echo (L("Pleaseselectawarehouse")); ?>--</option>";
				$('#warehouse_id').html(g);
				for(i = 0; i < data['warehouse'].length; i++) {
					var g = "<option value='" + data['warehouse'][i]['id'] + "'>" + data['warehouse'][i]['name'] + "</option>";
					$('#fulck').after(g);
				}
				var y = "<option id='fulyss' value=''>--<?php echo (L("Pleaseselectthecarrier")); ?>--</option>";
				$('#transj').html(y);
				for(i = 0; i < data['transporter'].length; i++) {
					var y = "<option value='" + data['transporter'][i]['id'] + "'>" + data['transporter'][i]['transporters'] + "</option>";
					$('#fulyss').after(y);
				}

			}
		});
		$('#node_modal').modal('toggle');
		getAjaxsupplier();
	}
	var nn = 0;
	var kk = 1;

	function getAjaxsupplier() //供应商
	{
		$.ajax({
			url: "<?php echo U('PurchaseOrder/getAjaxsupplier');?>", //通过页面元素的ID来获取供应商ID
			type: "post", //选择传值方式
			data: {},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var p = "<option id='first_op' value=''>--<?php echo (L("Pleasechoose")); ?>--</option>"
				$("#first").html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					var p = "<option value='" +
						data[i]['id'] +
						"'" +
						">" +
						data[i]['name'] +
						"</option>";
					$("#first_op").after(p);
				}

			}
		})

	}

	function add_tel() {
		nn++;
		var list = '<div class="col-md-12" style="padding-left: 0;padding-top: 15px;">' +
			'<div class="input-group"><span class="input-group-addon"><?php echo (L("Productname")); ?></span>' +
			'<select id="pid' + nn + '" name="supplier_pr_id[]" class="selectpicker pid form-control" onchange="getAjaxprice1(' + nn + ')" data-live-search="true">' +
			'</select>' +
			'</div>' +
			'</div>' +
				'<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">' +
				'<div class="input-group">' +
				'<span class="input-group-addon"><?php echo (L("Minimumpurchasevolume")); ?></span>' +
				'<input name="minimum[]" id="purchase' + nn + '" class="form-control" type="text" value="" readonly="readonly">' +
				'</div>' +
				'</div>'+
			'<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">' +
			'<div class="input-group">' +
			'<span class="input-group-addon"><?php echo (L("Minimumnumberofpackages")); ?></span>' +
			'<input id="packing' + nn + '" class="form-control" type="text" value="" readonly="readonly" name="packing[]">' +
			'</div>' +
			'</div>' +

			'<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">' +
			'<div class="input-group">' +
			'<span class="input-group-addon"><?php echo (L("UnitPrice")); ?></span>' +
			'<input name="price[]" class="form-control" style="width: 80%" type="text" value="" id="pice' + nn + '" readonly="readonly">' +
			'<input name="currency[]" class="form-control" type="text" value="" id="currency' + nn + '" readonly="readonly" style="width: 20%">' +
			'</div>' +
			'<input name="delivery_date[]" class="form-control" style="width: 80%" type="hidden" value="" id="productioncycle' + nn + '" readonly="readonly">' +
			'</div>' +
			'<div class="col-md-6" style="padding-left: 0;padding-top: 15px;">' +
			'<div class="input-group">' +
			'<span class="input-group-addon"><?php echo (L("Number")); ?><span style="color: red;">*</span></span>' +
			'<input name="num[]" class="form-control" type="text" value="" id="num' + nn + '">' +
			'</div>' +
			'</div>';
		$('#add_tel').append(list);
		getAjaxproduct1(nn);
		getAjaxprice1(nn);
	};

	//产品分箱
	function binning() {
		kk = 1;
		$('#binning_th').empty();
		$('#binning_td').empty();
		$('#add_box').off('click');
		$('#binning').css('display', 'block');
		console.log($('#pid0').val())
		console.log($('[data-id="pid0"]').find('span').eq(0).text());
		console.log(nn);
		var str = '<th style="text-align:center;"><?php echo (L("Boxnumber")); ?></th>';
		var str1 = '<tr><td>1<input name="case[]" type="hidden"></td>'
		for(var i = 0; i <= nn; i++) {
			str += '<th style="text-align:center;">' + $('[data-id="pid' + i + '"]').find('span').eq(0).text() + '</th>';
			str1 += '<td><input class="form-control" type="text" name="cnum[1][]" /><input class="form-control" type="hidden" name="xid[1][]"  value="' + $('#pid' + i).val() + '"/></td>';
		}
		str1 += '</tr>'
		console.log(str1);
		$('#binning_th').append(str);
		$('#binning_td').append(str1);
		$('#add_box').on('click', function() {
			kk++;
			var str2 = '<tr><td>' + kk + '<input value="" type="hidden" name="case[]"></td>';
			for(var i = 0; i <= nn; i++) {
				str2 += '<td><input class="form-control" type="text" name="cnum['+kk+'][]" /><input class="form-control" type="hidden" name="xid['+kk+'][]"  value="' + $('#pid' + i).val() + '"/></td>';
			}
			$('#binning_td').append(str2);
		})
	};

	function getAjaxproduct() //供应商下的产品
	{
		kk = 1;
		$('#binning_th').empty();
		$('#binning_td').empty();
		$('#add_box').off('click');
		$('#binning').css('display', 'none');
		for(var i = 0; i <= nn; i++) {
			$('#pice' + i).val("")
			$('#currency' + i).val("")
			$('#packing' + i).val("")
			$('#purchase' + i).val("")
			$('#num' + i).val("")
			$('#productioncycle' + i).val("")
		}
		$.ajax({
			url: "<?php echo U('PurchaseOrder/getAjaxproduct');?>", //通过页面元素的ID来获取产品ID
			type: "post", //选择传值方式
			data: {
				superior: $('#first').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var p = "<option class='second_op' value=''>--<?php echo (L("Pleaseselectaproduct")); ?>--</option>"
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					p += "<option value='" +
						data[i]['pid'] +
						"'" +
						">" +
						data[i]['bclassc_number'] + '.' + data[i]['sclassc_number'] + '.' + data[i]['snumber_number'] + ': ' + data[i]['namezh'] +
						"</option>";
				}
				for(var i = 0; i <= nn; i++) {
					$("#pid" + i).empty();
					$('#pid' + i).append(p);
					$('#pid' + i).selectpicker('refresh');
				}

			}
		})
	}

	function getAjaxproduct1(n) //供应商下的产品
	{
		kk = 1;
		$('#binning_th').empty();
		$('#binning_td').empty();
		$('#add_box').off('click');
		$('#binning').css('display', 'none');
		$.ajax({
			url: "<?php echo U('PurchaseOrder/getAjaxproduct');?>", //通过页面元素的ID来获取产品ID
			type: "post", //选择传值方式
			data: {
				superior: $('#first').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				var p = "<option id='second_op" + n + "' class='second_op' value=''>--<?php echo (L("Pleaseselectaproduct")); ?>--</option>"
				//              $("#pid"+n).html(p);
				//将获取到的数据赋值
				for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					p += "<option value='" +
						data[i]['pid'] +
						"'" +
						">" +
						data[i]['bclassc_number'] + '.' + data[i]['sclassc_number'] + '.' + data[i]['snumber_number'] + ':  ' + data[i]['namezh'] +
						"</option>";
					//                  $("#second_op"+n).after(p);
				}
				console.log(p)
				$("#pid" + n).empty();
				$('#pid' + n).append(p);
				$('#pid' + n).selectpicker('refresh');
			}
		})

	}

	function getAjaxprice() //供应商下的产品单价
	{
		kk = 1;
		$('#binning_th').empty();
		$('#binning_td').empty();
		$('#add_box').off('click');
		$('#binning').css('display', 'none');
		$.ajax({
			url: "<?php echo U('PurchaseOrder/getAjaxprice');?>", //通过页面元素的ID来获取产品ID
			type: "post", //选择传值方式
			data: {
				suprice: $('#pid0').val(),
				superior: $('#first').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == '') {
					$("#pice0").val('');
					$('#currency0').val('');
					$('#packing0').val('');
					$('#purchase0').val('');
					$('#num0').val('');
					$('#productioncycle').val('');
				} else {
					//将获取到的数据赋值
					for(var i = 0; i < data.length; i++) {
						//拼接option标签的 name value 等属性
						var p = data[i].price;
						$("#pice0").val(p);
						var n = data[i].bname;
//						var box = data[i].minimum_purchase / data[i].minimum_packing;
						$('#currency0').val(n);
						$('#packing0').val(data[i].minimum_packing);
						$('#purchase0').val(data[i].minimum_purchase);
						$('#num0').val(data[i].minimum_purchase);
						$('#productioncycle0').val(data[i].production_cycle);
					}
				}

			}
		})
	}

	function getAjaxprice1(n) //供应商下的产品单价
	{
		kk = 1;
		$('#binning_th').empty();
		$('#binning_td').empty();
		$('#add_box').off('click');
		$('#binning').css('display', 'none');
		$.ajax({
			url: "<?php echo U('PurchaseOrder/getAjaxprice');?>", //通过页面元素的ID来获取产品ID
			type: "post", //选择传值方式
			data: {
				suprice: $('#pid' + n).val(),
				superior: $('#first').val()
			},
			dataType: "JSON",
			success: function(data) {
				//将获取到的数据赋值
				if(data == '') {
					$("#pice" + n).val('');
					$('#currency' + n).val('');
					$('#packing' + n).val('');
					$('#purchase' + n).val('');
					$('#num' + n).val('');
					$('#productioncycle' + n).val('');
				} else {
					//for(var i = 0; i < data.length; i++) {
					//拼接option标签的 name value 等属性
					var p = data[0].price;
					var c = data[0].bname;
//					var box = data[0].minimum_purchase / data[0].minimum_packing;
					$("#pice" + n).val(p);
					$('#currency' + n).val(c);
					$('#packing' + n).val(data[0].minimum_packing);
					$('#purchase' + n).val(data[0].minimum_purchase);
					$('#num' + n).val(data[0].minimum_purchase);
					$('#productioncycle' + n).val(data[0].production_cycle);

					//}
				}
			}
		})
	}
	//日期格式化
	Date.prototype.Format = function (fmt) {  
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
	}
	//计算交货日期
	function delivery_date() {
		//交货日期
			var cycle_arr = [];
			for(var i = 0; i < $('[name="delivery_date[]"]').length; i++) {
				cycle_arr.push($('[name="delivery_date[]"]')[i].value - 0);
			}
			console.log(cycle_arr);
			var max = Math.max.apply(null,cycle_arr);
			max = max*24*60*60*1000;
			var today = new Date().getTime();
			today = max+today;
			console.log(today);
			today = new Date(today).Format('yyyy-MM-dd');
			$('[name="date"]').val(today);
	}
	//申请采购单
	function doadd(form) {
		var chk_value = [];
		$('.pid form-control option:selected').each(function() {
			chk_value.push($(this).val());
		});
		var num_value = [];
		$('input[name="num[]"]').each(function() {
			num_value.push($(this).val());
		});
		console.log(num_value);
		for(var i = 0; i <= nn; i++) {
			var str3 = $('#pid' + i).val();
			var num_val = 0;
			$('[name="' + str3 + '[]"]').each(function() {
				num_val += Number($(this).val());
				console.log(Number($(this).val()))
			});
			console.log(num_val);
			// if(num_val != num_value[i]){
			// 	$('#node_message').html('分箱数量不对或产品重复');
			//     node_message.style.display = 'block';
			//     var t = setTimeout("node_message.style.display='none';", 2000);
			//     return false;
			// }
		}
		$.ajax({
			url: "<?php echo U('PurchaseOrder/orderAdd');?>",
			type: "post",
			data: $(form).serialize(),
			dataType: "json",
			async: true,
			success: function(data) {
				if(data.status == 0) {
					$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data == "NO") {
					$('#node_message').html('<?php echo (L("Applicationfailedcannotbeempty")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data == "KO") {
					$('#node_message').html('<?php echo (L("Theselectedproductrequirements")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data == "OK") {
					$('#node_message').html('<?php echo (L("Successfulapplication")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				} else if(data == "FO") {
					$('#node_message').html('<?php echo (L("Productcurrencymustconsistent")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}else if(data == "FK") {
					$('#node_message').html('<?php echo (L("Theminimumpackagequantity")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				}
			}
		});
		return false;
	}
	//删除订单
	function orderDel(obj, id) {
		var r = confirm("<?php echo (L("Confirmdelete")); ?>");
		if(r) {
			$.ajax({
				url: "<?php echo U('PurchaseOrder/orderDel');?>",
				type: 'post',
				dataType: "json",
				data: {
					id: id
				},
				success: function(data) {
					if(data.status == 0) {
						$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
					} else if(data == 'NO') {
						$('#node_message').html('<?php echo (L("Failedtodelete")); ?>');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
					} else if(data > 0) {
						$(obj).parents("tr").remove();
						$('#node_message').html('<?php echo (L("Successfullydeleted")); ?>');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
					} else {
						$('#node_message').html('<?php echo (L("Failedtodelete")); ?>');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
					}
				}
			});
		}
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