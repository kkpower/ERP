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
	$('#21').parents('li').addClass('nav-active')
	$('#21').parents('li').addClass('nav-expanded')
</script>
<script src="/InternalSystem/Public/FirstEdition/assets/shu/boot/bootstrap-treeview.js"></script>
<link rel="stylesheet" type="text/css" href="/InternalSystem/Public/FirstEdition/assets/shu/boot/table.css" />
<input type="hidden" id="getplatformurl" value="<?php echo U('System/getInfomj','','');?>">
<div class="row">
	<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
				</div>

				<h2 class="panel-title"><?php echo (L("Role")); ?></h2>
			</header>
			<div class="panel-body">
				<button class="btn btn-primary" onclick="platformurl(1)"><?php echo (L("Addroles")); ?></button>
				<input type="hidden" name='getRoleAuthority' value="<?php echo U('System/getRoleAuthority','','');?>">
				<input type="hidden" name='delRole' value="<?php echo U('System/delRole','','');?>">
				<div>
					<table id="table1" class="table table-hover mb-none table-striped table-bordered" style="border-collapse: collapse;">
						<thead>
							<tr>
								<th><?php echo (L("Id")); ?></th>
								<th><?php echo (L("Role")); ?></th>
								<th><?php echo (L("Operation")); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($info)): foreach($info as $key=>$rolelist): ?><tr>
									<!-- 遍历用户信息-->
									<td><?php echo ($key+1); ?></td>
									<td>
										<?php if((LANG_SET) == "en-us"): echo ($rolelist["role_nameus"]); ?>
											<?php else: ?> <?php echo ($rolelist["role_name"]); endif; ?>
									</td>
									<td>
										<button type="button" title="<?php echo (L("Allocation")); ?>" class="btn btn-primary btn-xs" onclick="platformurl(2,'<?php echo ($rolelist["id"]); ?>')" /><span class="glyphicon glyphicon-th-list"></span></button>
										<button type="button" title="<?php echo (L("Delete")); ?>" class="btn btn-danger btn-xs" onclick="delRole('<?php echo ($rolelist["id"]); ?>')"><span class="glyphicon glyphicon-trash"></span></button>
									</td>
								</tr><?php endforeach; endif; ?>
						</tbody>

					</table>
				</div>
			</div>

		</section>
	</div>
</div>
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="roleModalLabel">
					分配权限：
				</h4>
			</div>
			<!--<form id="saveRole" action="<?php echo U('System/saverole','','');?>" method="post" class="form-horizontal">-->
			<input type="hidden" id="roleId" name="roleId" value="">
			<input type="hidden" name="role_auth_ids" value="">
			<div class="form-group" style="padding-top: 15px;">
				<span class="col-sm-2 control-label" style="padding-right: 0;line-height: 34px;"><?php echo (L("rolename")); ?>:</span>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="role_name" id="roleName">

				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" style="margin-bottom: 12px;"><?php echo (L("role_permissions")); ?>:</label>
				<br style="clear: both;" />
				<!--<div class="col-sm-8">
						<div id="authorityTree"></div>
						<table class="table table-hover mb-none table-striped">
							<thead>
							<tr>
								<th>权限名称</th>
								<th>添加</th>
							</tr>
							</thead>
							<tbody>
							<?php if(is_array($pinfo)): foreach($pinfo as $key=>$showlist): ?><tr>-->
				<!-- 从零开始所以加一来做序列号-->
				<!--<td><?php echo ($showlist["auth_name"]); ?></td>
									<td><input type="checkbox" name="role_auth_ids[]" value="<?php echo ($showlist["id"]); ?>" /></td>
								</tr><?php endforeach; endif; ?>
							</tbody>

						</table>

					</div>-->
				<div id="treeview1" class="" style="width:80%;margin: 0 auto;"></div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="sub_save()"><?php echo (L("Save")); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Cancel")); ?></button>
			</div>
			<!--</form>-->
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal -->
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
	//树状图数据
	function platformurl(type, roleId) {
		var getRoleAuthorityUrl = $("[name='getRoleAuthority']").val();
		$('#roleId').val(roleId);
		$('#roleName').val('');
		if(type == 1) {
			$("#roleModalLabel").text("<?php echo (L("addrole")); ?>");
		};
		var platformurl = $("#getplatformurl").val();
		$.ajax({
			url: platformurl, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				var arr_first = JSON.parse(data.first);
				console.log(arr_first);
				console.log(data);
				$('#treeview1').treeview({
					data: data.tree,
					enableLinks: true,
					showCheckbox: true,
					onNodeChecked: function(event, node) { //选中节点
						var selectNodes = getChildNodeIdArr(node); //获取所有子节点
						console.log(node)
						if(selectNodes) { //子节点不为空，则选中所有子节点
							$('#treeview1').treeview('checkNode', [selectNodes, {
								silent: true
							}]);
						}
						//						var parentNode = $("#treeview1").treeview("getNode", node.parentId);
						var selectNodes1 = setParentNodeCheck(node);
						if(selectNodes1) { //子节点不为空，则选中所有子节点
							$('#treeview1').treeview('checkNode', [selectNodes1, {
								silent: true
							}]);
						}
					},
					onNodeUnchecked: function(event, node) { //取消选中节点
						var selectNodes = getChildNodeIdArr(node); //获取所有子节点
						if(selectNodes) { //子节点不为空，则取消选中所有子节点
							$('#treeview1').treeview('uncheckNode', [selectNodes, {
								silent: true
							}]);
						}
					}
				});
				//				$('#treeview1').treeview('getCollapsed', 0);
				//				$('#treeview1').treeview('checkNode', [1, {
				//					silent: true
				//				}]);
				if(type == 2) {
					$("#roleModalLabel").text("<?php echo (L("modify_role")); ?>");
					for(var i = 0; i < arr_first.length; i++) {
						arr_first[i].nodeId = $('#' + arr_first[i].id + '_id').attr('data-nodeid') - 0
					}
					$.ajax({
						url: getRoleAuthorityUrl, //通过JQ获取URL获得路径
						data: {
							type: type,
							role_id: roleId
						}, //通过页面元素的ID来获取设备ID
						type: "post", //选择传值方式
						dataType: "JSON",
						success: function(data) {
							console.log(data)
							$('#roleName').val(data.roleName);
							var all_child = $('#treeview1').treeview('getCollapsed');
							var all_child1 = all_child.concat(arr_first);
							console.log(all_child1)
							var arr_checked = [];
							for(var i = 0; i < data.nodeList.length; i++) {
								console.log(data.nodeList[i])
								for(var j = 0; j < all_child1.length; j++) {
									if(data.nodeList[i] == all_child1[j].id) {

										arr_checked.push(all_child1[j].nodeId)
									}
								}

							}
							$('#treeview1').treeview('checkNode', [arr_checked, {
								silent: true
							}]);
							console.log(arr_checked);

						}
					})
				}
				//          console.log(all_child);
				$('#roleModal').modal('toggle');
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
	//选中子节点
	function getChildNodeIdArr(node) {
		var ts = [];
		if(node.nodes) {
			for(x in node.nodes) {
				ts.push(node.nodes[x].nodeId);
				if(node.nodes[x].nodes) {
					var getNodeDieDai = getChildNodeIdArr(node.nodes[x]);
					for(j in getNodeDieDai) {
						ts.push(getNodeDieDai[j]);
					}
				}
			}
		} else {
			ts.push(node.nodeId);
		}
		return ts;
	}
	//选中父节点
	function setParentNodeCheck(node) {
		var ts = [];
		var parentNode = $("#treeview1").treeview("getNode", node.parentId);
		console.log(parentNode)
		if(parentNode.nodeId != undefined) {
			ts.push(parentNode.nodeId);
			var getNodeDieDai = setParentNodeCheck(parentNode);
			for(j in getNodeDieDai) {
				ts.push(getNodeDieDai[j]);
			}
		}
		return ts;
	}

	function itemli(target) {
		//找到当前节点id
		var nodeid = $(target).attr('data-nodeid');
		console.log(nodeid)
		$("[data-nodeid=" + nodeid + "]").addClass('expand-icon');
		//				console.log($("[data-nodeid=" + nodeid + "]").children('span').eq(3))
		//		$('#treeview1').treeview('checkNode', [ Number(nodeid), { silent:true } ]);
		//		$('#treeview1').treeview('toggleNodeExpanded', [ nodeid, { silent:true } ]);
	}

	function itemOnclick(target) {
		console.log(1111);
	}

	function sub_save() {
		console.log($('#treeview1').treeview('getChecked'))
		var arr_ck = $('#treeview1').treeview('getChecked');
		var arr_sub = [];
		for(var i = 0; i < arr_ck.length; i++) {
			arr_sub.push(arr_ck[i].id);
		}
		$.ajax({
			url: "<?php echo U('System/saverole','','');?>", //通过JQ获取URL获得路径
			data: {
				roleId: $('#roleId').val(),
				role_auth_ids: JSON.stringify(arr_sub),
				role_name: $('#roleName').val()
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				if(data.status == 0) {
					$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data > 0) {
					$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				} else if(data == 'NO') {
					$('#node_message').html('<?php echo (L("rolenamecannotbeempty")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data == 'KO') {
					$('#node_message').html('<?php echo (L("rolenameduplication")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
				} else if(data == 0) {
					$('#node_message').html('<?php echo (L("Savesuccessfully")); ?>');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				}

			}
		})
	}
	//删除
	function delRole(rid) {
		var delRoleUrl = $("[name='delRole']").val();
		//console.log(delRoleUrl);
		var r = confirm("<?php echo (L("Confirmdelete")); ?>");
		if(r) {
			$.ajax({
				url: delRoleUrl, //通过JQ获取URL获得路径
				data: {
					role_id: rid
				}, //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				dataType: "JSON",
				success: function(data) {
					if(data) {
						console.log(data);
						if(data.info) {
							alert('<?php echo (L("Operationauthority")); ?>')
							return false;
						}
						setTimeout(function() {
							$('#node_message').html('<?php echo (L("Successfullydeleted")); ?>');
							node_message.style.display = 'block';
							location.reload();
						}, 3);

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