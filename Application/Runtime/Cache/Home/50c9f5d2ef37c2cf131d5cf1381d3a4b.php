<?php if (!defined('THINK_PATH')) exit();?>﻿
<!doctype html>
<html lang="en" class="fullscreen-bg">

	<head>
		<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- VENDOR CSS -->
		<link rel="stylesheet" href="/InternalSystem/Public/2.0/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/InternalSystem/Public/2.0/assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/InternalSystem/Public/2.0/assets/vendor/linearicons/style.css">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="/InternalSystem/Public/2.0/assets/css/main.css">
		<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
		<link rel="stylesheet" href="/InternalSystem/Public/2.0/assets/css/demo.css">
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<!-- ICONS -->
		<link rel="apple-touch-icon" sizes="76x76" href="/InternalSystem/Public/2.0/assets/img/apple-icon.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/InternalSystem/Public/2.0/assets/img/favicon.png">
	</head>

	<body>
		<!-- WRAPPER -->
		<div id="wrapper">
			<div class="vertical-align-wrap">
				<div class="vertical-align-middle">
					<div class="auth-box ">
						<div class="left">
							<div class="content">
								<div class="header">
									<div class="logo text-center"><img src="/InternalSystem/Public/img/logomini.png" alt="Klorofil Logo"></div>
									<p class="lead">Login to your account</p>
								</div>
								<form class="form-auth-small" action="<?php echo U('Login/index','','');?>" method="post">
									<div class="form-group">
										<label for="exampleInputAccount9" class="control-label sr-only">User name</label>
										<input type="text" name="uname" class="form-control" id="exampleInputAccount9" placeholder="<?php echo (L("PleaseEnterTheAccountnumber")); ?>">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword4" class="control-label sr-only">Password</label>
										<input type="password" name="pwd" class="form-control" id="exampleInputPassword4" placeholder="<?php echo (L("PleaseInputPassword")); ?>">
									</div>
									<!--<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>-->
									<div class="form-group" style="text-align: left;">
										<input type="text" style="width: 65%;display: inline-block;float: left;" class="form-control" id="exampleInputPassword5" name="code" placeholder="<?php echo (L("VerificationCode")); ?>" method="POST">
										<img src="<?php echo U('Login/verify_code','','');?>" title="看不清？单击此处刷新" onclick="this.src+='?rand='+Math.random();" style="cursor: pointer; vertical-align: middle; width: 30%; height: 34px;margin-left: 5%;float: left;" />
										<br style="clear: both;"/>
									</div>
									<button type="submit" class="btn btn-primary btn-lg btn-block"><?php echo (L("Signin")); ?></button>
									<div class="bottom" style="text-align: left;font-size: 1.4rem;">
										<span class="helper-text"><i class="fa fa-lock"></i> <a href="#" data-toggle="modal" data-target="#myModal"><?php echo (L("Forget")); ?></a></span>
										<span style="float: right;"><a href="?l=zh-cn">简体中文</a>  |  <a href="?l=en-us">English</a></span>
										<br />
										<span style="float: right;padding-top: 10px;font-size: 1.2rem;"><a href="description.html">版本号1.1.2</a></span>
									</div>
								</form>
							</div>
						</div>
						<div class="right">
							<div class="overlay"></div>
							<div class="content text">
								<h1 class="heading">Test system</h1>
								<p><?php echo (L("welcome")); ?></p>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- END WRAPPER -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
						<h4 class="modal-title" id="myModalLabel">
      <?php echo (L("Forget")); ?></h4>
					</div>
					&nbsp
					<div class="form-group">
						<label class="col-sm-3 control-label" style="text-align: right;line-height: 34px;"><?php echo (L("Account")); ?>:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="name">
						</div>
						<div class="col-sm-1" style="height: 34px;"></div>
					</div>
					&nbsp
					<div class="form-group">
						<label class="col-sm-3 control-label" style="text-align: right;line-height: 34px;"><?php echo (L("Contact")); ?>:</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" name="ualias">
						</div>
						<div class="col-sm-1" style="height: 34px;"></div>
					</div>
					&nbsp
					<div class="form-group">
						<label class="col-sm-3 control-label" style="text-align: right;line-height: 34px;"><?php echo (L("Phone")); ?>:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="call">
						</div>
						<div class="col-sm-1" style="height: 34px;"></div>
					</div>
					&nbsp
					<div>

						<input type="hidden" name='getcall' value="<?php echo U('Login/forgetpwd','','');?>">
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?php echo (L("Close")); ?></button>
							<button type="button" class="btn btn-default btn-sm" ata-dismiss="modal" onclick="forget()"><?php echo (L("sub")); ?></button>
						</div>
						<!-- <button type="button" class="btn btn-primary">
               提交更改
           </button>-->
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal -->
		</div>
	</body>

</html>
<script src="/InternalSystem/Public/login/assets/js/jquery-1.11.1.min.js"></script>
<script src="/InternalSystem/Public/2.0/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="/InternalSystem/Public/login/assets/js/jquery.backstretch.min.js"></script>-->
<!--<script src="/InternalSystem/Public/login/assets/js/retina-1.1.0.min.js"></script>
<script src="/InternalSystem/Public/login/assets/js/scripts.js"></script>-->