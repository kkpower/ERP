<?php if (!defined('THINK_PATH')) exit();?>
<!-- ZUI 标准版压缩后的 CSS 文件 -->
<!doctype html>
<html class="fixed">

	<head>
		<title><?php echo (L("Productgallery")); ?></title>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/zui/1.8.1/css/zui.min.css">
		<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/stylesheets/skins/default.css" />
		<!-- ZUI Javascript 依赖 jQuery -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/zui/1.8.1/lib/jquery/jquery.js"></script>
		<!-- ZUI 标准版压缩后的 JavaScript 文件 -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/zui/1.8.1/js/zui.min.js"></script>
		<script src="/InternalSystem/Public/embryonicForm/lib/uploader/zui.uploader.min.js"></script>
		<link rel="stylesheet" href="/InternalSystem/Public/embryonicForm/lib/uploader/zui.uploader.css" type="text/css">
		<style>
			.input-group-addon,
			.input-group-btn {
				width: 50%;
			}
			
			.row1:after {
				display: block;
				content: " ";
				clear: both;
			}
		</style>
	</head>

	<body>
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<div id="img_message" style="position: fixed;z-index: 10;top: 50%;left: 50%;display: none;background: #aaa;min-width:300px;-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;"></div>
					<header class="panel-heading">
						<div class="panel-actions">
						</div>

						<h2 class="panel-title"><?php echo (L("Productgallery")); ?></h2>
						<p style="font-size: 14px;margin-bottom: 0;color: #666;"><?php echo (L("coding")); ?>：<?php echo ($productInufo["bclass"]); ?>.<?php echo ($productInufo["sclass"]); ?>.<?php echo ($productInufo["number"]); ?></p>
						<p style="font-size: 14px;margin-bottom: 0;color: #666;font-weight: bold;"><?php echo (L("productshortname")); ?>：<?php echo ($productInufo["shortname"]); ?></p>
						<p style="font-size: 14px;margin-bottom: 0;color: #666;"><?php echo (L("productname")); ?>：<?php echo ($productInufo["namezh"]); ?></p>
					</header>
					<!--<div class="panel-body">
                <button class="btn btn-primary" onclick=""> </button>
            </div>-->
					<input type="hidden" name='getRoleAuthority' value="<?php echo U('System/getRoleAuthority','','');?>">
					<input type="hidden" name='delRole' value="<?php echo U('System/delRole','','');?>">
					<?php if(($_COOKIE['think_language']) == "en-us"): ?><input type="hidden" id="lang" value="en"/><?php else: ?><input type="hidden" id="lang" value="zh_cn"/><?php endif; ?>
					<div class="panel-body">
						<div class="table-responsive" style="position: relative;">
						</div>
						<ul id="myTab" class="nav nav-tabs">
							<li class="active">
								<a href="#home" data-toggle="tab">
									<?php echo (L("manage_existing_images")); ?>
									<span class="badge" style="margin-left: 4px;float: right;" id="badge1"></span>
								</a>
							</li>
							<li>
								<a href="#small_img" data-toggle="tab">
									<?php echo (L("picturesinthesamesubclass")); ?>
									<span class="badge" style="margin-left: 4px;float: right;" id="badge2"></span>
								</a>
							</li>
							<li>
								<a href="#big_img" data-toggle="tab">
									<?php echo (L("picturesinthesamebigcategory")); ?>
									<span class="badge" style="margin-left: 4px;float: right;" id="badge3"></span>
								</a>
							</li>
							<li>
								<a href="#sub_img" data-toggle="tab">
									<?php echo (L("uploadimage")); ?>
								</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade in active" id="home">
								<div class="row1">
									<?php if(is_array($productlist)): $k = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$plist): $mod = ($k % 2 );++$k;?><div class="col-sm-2" style="border: 1px solid #eee;margin-bottom: 10px;">
											<input type="hidden" value="<?php echo ($k); ?>" name="imgnum">
											<div style="width: 100%;height: 0;padding-bottom: 100%;position: relative;margin-bottom: 10px;margin-top: 10px;">
												<img style="width: 100%;position: absolute;top: 0;left: 0;" src="/InternalSystem<?php echo ($plist["thumpath"]); echo ($plist["thumfile"]); ?>" onclick="onm('/InternalSystem<?php echo ($plist["path"]); echo ($plist["filename"]); ?>')" />
											</div>
											<input readonly="readonly" type="text" id="url<?php echo ($plist["id"]); ?>" class="form-control" value="https://<?php echo ($dizhi); ?>/InternalSystem<?php echo ($plist["path"]); echo ($plist["filename"]); ?>" />
											<div style="text-align: center;">
												<button style="padding: 1px 5px; font-size: 12px;margin: 10px auto;" class="btn btn-mini btn-info" onClick="img_url_copy(<?php echo ($plist["id"]); ?>)"><?php echo (L("copyLink")); ?></button>
												<button style="padding: 1px 5px; font-size: 12px;margin: 10px 0 10px 10px;" class="btn btn-mini btn-danger" onClick="delete_img(<?php echo ($plist["id"]); ?>)"><?php echo (L("Delete")); ?></button>
											</div>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
							<div class="tab-pane fade" id="small_img">
								<div class="row1">
									<?php if(is_array($bclasslist)): $k = 0; $__LIST__ = $bclasslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$blist): $mod = ($k % 2 );++$k;?><div class="col-sm-2" style="border: 1px solid #eee;margin-bottom: 10px;">
											<input type="hidden" value="<?php echo ($k); ?>" name="imgnum1">
											<div style="width: 100%;height: 0;padding-bottom: 100%;position: relative;margin-bottom: 10px;margin-top: 10px;">
												<img style="width: 100%;position: absolute;top: 0;left: 0;" src="/InternalSystem<?php echo ($blist["thumpath"]); echo ($blist["thumfile"]); ?>" onclick="onm('/InternalSystem<?php echo ($blist["path"]); echo ($blist["filename"]); ?>')" />
											</div>
											<input readonly="readonly" type="text" id="url<?php echo ($blist["id"]); ?>" class="form-control" value="https:/<?php echo ($dizhi); ?>_/InternalSystem<?php echo ($blist["path"]); echo ($blist["filename"]); ?>" />
											<div style="text-align: center;">
												<button style="padding: 1px 5px; font-size: 12px;margin: 10px auto;" class="btn btn-mini btn-info" onClick="img_url_copy(<?php echo ($blist["id"]); ?>)"><?php echo (L("copyLink")); ?></button>
												<button style="padding: 1px 5px; font-size: 12px;margin: 10px 0 10px 10px;" class="btn btn-mini btn-danger" onClick="delete_img(<?php echo ($blist["id"]); ?>)"><?php echo (L("Delete")); ?></button>
											</div>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>

							<div class="tab-pane fade" id="big_img">
								<div class="row1">
									<?php if(is_array($sclasslist)): $k = 0; $__LIST__ = $sclasslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slist): $mod = ($k % 2 );++$k;?><div class="col-sm-2" style="border: 1px solid #eee;margin-bottom: 10px;">
											<input type="hidden" value="<?php echo ($k); ?>" name="imgnum2">
											<div style="width: 100%;height: 0;padding-bottom: 100%;position: relative;margin-bottom: 10px;margin-top: 10px;">
												<img style="width: 100%;position: absolute;top: 0;left: 0;" src="/InternalSystem<?php echo ($slist["thumpath"]); echo ($slist["thumfile"]); ?>" onclick="onm('/InternalSystem<?php echo ($slist["path"]); echo ($slist["filename"]); ?>')" />
											</div>
											<input readonly="readonly" type="text" id="url<?php echo ($slist["id"]); ?>" class="form-control" value="https:/<?php echo ($dizhi); ?>_/InternalSystem<?php echo ($slist["path"]); echo ($slist["filename"]); ?>" />
											<div style="text-align: center;">
												<button style="padding: 1px 5px; font-size: 12px;margin: 10px auto;" class="btn btn-mini btn-info" onClick="img_url_copy(<?php echo ($slist["id"]); ?>)"><?php echo (L("copyLink")); ?></button>
												<button style="padding: 1px 5px; font-size: 12px;margin: 10px 0 10px 10px;" class="btn btn-mini btn-danger" onClick="delete_img(<?php echo ($slist["id"]); ?>)"><?php echo (L("Delete")); ?></button>
											</div>
										</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
							<div class="tab-pane fade" id="sub_img">
								<div class="row">
									<div class="col-md-12">
										<section class="panel">
											<header class="panel-heading">
												<div class="panel-actions">
												</div>
												<h2 class="panel-title"><?php echo (L("uploadimage")); ?></h2>
											</header>
											<div class="panel-body">
												<form id="form" name="form" method="post" enctype="multipart/form-data">
													<div class="input-group" style="margin-bottom: 20px;">
														<span class="input-group-addon"><?php echo (L("choose_a_type")); ?></span>
														<input id="getfid" type="hidden" name='getfid' value="<?php echo ($fid); ?>">
														<select id="select_type" type="text" name="type" class="form-control" style="width: 300%;">
															<option value="product" selected="selected">product</option>
															<option value="bclass">bclass</option>
															<option value="sclass">sclass</option>
														</select>
													</div>
													<div id='uploaderExample3' class="uploader" data-ride="uploader" data-url="<?php echo U('Product/imgup');?>">
														<div class="uploader-message text-center">
															<div class="content"></div>
															<button type="button" class="close">×</button>
														</div>
														<div class="uploader-files file-list file-list-grid"></div>
														<div>
															<hr class="divider">
															<div class="uploader-status pull-right text-muted"></div>
															<button type="button" class="btn btn-link uploader-btn-browse"><i class="icon icon-plus"></i><?php echo (L("selectthefile")); ?></button>
															<button type="button" id="cc" class="btn btn-link uploader-btn-start"><i class="icon icon-cloud-upload"></i> <?php echo (L("start_upload")); ?></button>
														</div>
													</div>
												</form>
											</div>
										</section>
									</div>
								</div>
							</div>
						</div>

						<div style="text-align: center;padding-top: 20px;">
							<button class="btn btn-primary" onclick="window.close()"><?php echo (L("Close")); ?></button>
						</div>
					</div>
				</section>
			</div>
		</div>

		<div id="img_modal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">
							<?php echo (L("image")); ?>
				</h4>
					</div>
					<div class="modal-body" style="line-height: 34px;">
						<img id="big_img1" src="" style="width: 100%;" />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("Close")); ?></button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
		<!--<div class="row">
	<form action="<?php echo U('Product/imgup');?>" name="" method="post" enctype="multipart/form-data">
		<select type="text" name="type">
			<option value="product">product</option>
			<option value="bclass">bclass</option>
			<option value="sclass">sclass</option>
		</select>
		<input id="file1" type="file" onchange="console.log($(this))" name="imgfile[]" multiple="multiple">
		<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
		<button type="submit">提交</button>
	</form>
</div>-->

	</body>

</html>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script>
	var type = $('#select_type').val(),
		getfid = $('#getfid').val();
	console.log(type);
	$('#select_type').change(function() {
		type = $('#select_type').val()
		console.log(type)
	});
	var options = {
		lang:$('#lang').val(),
		// 初始化选项
		url: "<?php echo U('Product/imgupp');?>",
		multipart_params: function() {
			console.log(type)
			return {
				type: type,
				getfid: getfid
			}
		}
	};

	$('#uploaderExample3').uploader(options);
</script>
<script>
	window.onload = function() {
		var arr1 = [];
		for(var i = 0; i < $('[name="imgnum"]').length; i++) {
			arr1.push($('[name="imgnum"]')[i].defaultValue)
		}
		var arr2 = parseInt(arr1.pop());
		console.log(arr2);
		if(isNaN(arr2)) {
			var imgnum = $("#badge1").text();
			console.log(imgnum);
		} else {
			var imgnum = $("#badge1").text(arr2);
			console.log(imgnum);
		}

		var arr3 = [];
		for(var i = 0; i < $('[name="imgnum1"]').length; i++) {
			arr3.push($('[name="imgnum1"]')[i].defaultValue)
		}
		var arr4 = parseInt(arr3.pop());
		console.log(arr4);
		if(isNaN(arr4)) {
			var imgnum1 = $("#badge2").text();
			console.log(imgnum1);
		} else {
			var imgnum1 = $("#badge2").text(arr4);
			console.log(imgnum1);
		}

		var arr5 = [];
		for(var i = 0; i < $('[name="imgnum2"]').length; i++) {
			arr5.push($('[name="imgnum2"]')[i].defaultValue)
		}
		var arr6 = parseInt(arr5.pop());
		console.log(arr6);
		if(isNaN(arr6)) {
			var imgnum2 = $("#badge3").text();
			console.log(imgnum2);
		} else {
			var imgnum2 = $("#badge3").text(arr6);
			console.log(imgnum2);
		}
	}

	function onm(url) {
		$('#img_modal').modal('toggle');
		$('#big_img1').attr('src', url);
	}

	function img_url_copy(num) {
		if(t) {
			clearTimeout(t)
		};
		console.log('url' + num);
		$("#url" + num).select();
		document.execCommand('Copy');
		$('#img_message').html('<?php echo (L("youhavecopiedlink")); ?>' + $("#url" + num).val());
		img_message.style.display = 'block';
		var t = setTimeout("img_message.style.display='none'", 2000);
	};

	function delete_img(num) {
		$.ajax({
			url: "<?php echo U('Product/delimg');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				id: num
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				//				if(t) {
				//						clearTimeout(t)
				//					};
				//					$('#node_message').html('删除成功');
				//					img_message.style.display = 'block';
				//					var t = setTimeout("img_message.style.display='none';location.reload()", 2000);
			}
		})
	}
</script>