<?php if (!defined('THINK_PATH')) exit();?>﻿
<!doctype html>
<html lang="en" class="fullscreen-bg">

	<head>
		<title>YELLOW-PRICE</title>
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
									<div class="logo text-center"><img style="width: 60%;" src="/InternalSystem/Public/img/logomini.png" alt="Klorofil Logo"></div>
									<!--<p class="lead" style="font-size: 1.6rem;margin-top: 0;">We Never Sleep, But We Have A Dream</p>-->
								</div>
								<input type="hidden" id="false_reason" value="<?php echo ($login_info); ?>" />
								<input type="hidden" id="user_back" value="<?php echo ($returnAc); ?>" />
								<input type="hidden" id="password_back" value="<?php echo ($returnPa); ?>" />
								<form class="form-auth-small" action="<?php echo U('Login/index','','');?>" method="post">
									<div class="form-group">
										<label for="exampleInputAccount9" class="control-label sr-only">User name</label>
										<input type="text" name="uname" required="required" class="form-control" id="exampleInputAccount9" placeholder="<?php echo (L("PleaseEnterTheAccountnumber")); ?>">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword4" class="control-label sr-only">Password</label>
										<input type="password" name="pwd" required="required" class="form-control" id="exampleInputPassword4" placeholder="<?php echo (L("PleaseInputPassword")); ?>">
									</div>
									<div id="name_check" style="line-height: 26px;text-align: left;color: red;font-size: 1.4rem;margin-top: -15px;display: none;"></div>
									<!--<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>-->
									<div class="form-group" style="text-align: left;margin-bottom: 20px;">
										<input type="text" style="width: 65%;display: inline-block;float: left;" onfocus="focus_a()" class="form-control" id="exampleInputPassword5" name="code" placeholder="<?php echo (L("VerificationCode")); ?>" required="required" method="POST">
										<img src="<?php echo U('Login/verify_code','','');?>" title="<?php echo (L("refresh")); ?>" onclick="this.src+='?rand='+Math.random();" style="cursor: pointer; vertical-align: middle; width: 30%; height: 34px;margin-left: 5%;float: left;" />
										<br style="clear: both;" />
									</div>
									<div id="code_check" style="line-height: 24px;text-align: left;color: red;font-size: 1.4rem;margin-top: -20px;display: none;"></div>
									<button type="submit" style="margin-top: 0;" class="btn btn-primary btn-lg btn-block"><?php echo (L("Signin")); ?></button>
									<div class="bottom" style="text-align: left;font-size: 1.4rem;">
										<span class="helper-text"><i class="fa fa-lock"></i> <a href="#" data-toggle="modal" data-target="#myModal"><?php echo (L("Forget")); ?></a></span>
										<span style="float: right;"><a href="?l=zh-cn">简体中文</a>  |  <a href="?l=en-us">English</a></span>
										<br />
									</div>
								</form>
							</div>
						</div>
						<div class="right" style="position: relative;">
							<div class="overlay"></div>
							<div class="content text">
								<p style="padding-bottom: 6px;font-size: 20px;">Yellow-Price</p>
								<p style="padding-bottom: 6px;font-size: 20px;">We Never Sleep, But We Have A Dream</p>
							</div>
							<span style="padding-top: 4px;font-size: 1.4rem;position: absolute;right: 10px;bottom: 10px;"><a href="description.html" style="color: #fff;">v1.1.2</a></span>
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
      						<?php echo (L("Forget")); ?>
						</h4>
					</div>
					<div style="width: 100%;padding:15px;">
						<p style="text-align: center;"><?php echo (L("contact_administrator")); ?>：<span style="font-size: 18px;">haoyuan.chang@yellow-price.cn</span></p>
						<img src="/InternalSystem/Public/img/erweima.jpg" style="width: 50%;margin: 0 auto;display: block;"/>
						<!--<p style="text-align: center;font-size: 18px;line-height: 30px;">haoyuan.chang@yellow-price.cn</p>-->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?php echo (L("Close")); ?></button>
					</div>
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
<script>
	if($('#false_reason').val() == 1) {
		$('#name_check').text('你的账号密码不正确，请重试');
		$('#name_check').css('display', 'block');
		//		$('#false_reason').val('');
	} else if($('#false_reason').val() == 2) {
		$('#name_check').text('你的账号被禁用，有疑问联系管理员');
		$('#name_check').css('display', 'block');
		//		$('#false_reason').val('');
	} else if($('#false_reason').val() == 3) {
		$('#code_check').text('验证码错误');
		$('#code_check').css('display', 'block');
		$('#exampleInputAccount9').val($('#user_back').val());
		$('#exampleInputPassword4').val($('#password_back').val());
		//		$('#false_reason').val('');
	}

	function focus_a() {
		$('#code_check').css('display', 'none');
		$('#name_check').css('display', 'none');
	}
</script>