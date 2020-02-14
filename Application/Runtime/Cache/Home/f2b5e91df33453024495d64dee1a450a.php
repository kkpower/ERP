<?php if (!defined('THINK_PATH')) exit();?>
<!-- ZUI 标准版压缩后的 CSS 文件 -->
<!doctype html>
<html class="fixed">

	<head>
		<title>订单详情</title>
		<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/stylesheets/skins/default.css" />
		<link rel="stylesheet" href="/InternalSystem/Public/FirstEdition/assets/vendor/font-awesome/css/font-awesome.css" />
		<style type="text/css">
			#details_body .col-md-6 {
				padding-left: 0;
			}
			
			#details_body .col-md-12 {
				padding-left: 0;
			}
			
			#details_img>div {
				display: inline-block;
				width: 30%;
				position: relative;
				margin: 0 1% 1%;
				border: 1px solid #ccc;
				box-sizing: border-box;
				padding:0 10px;
			}
			
			#details_img img {
				width: 60%;
				padding-top: 12px;
				padding-bottom: 5px;
			}
			
			#details_img p {
				color: #333;
				line-height: 18px;
			}
			
			#details_img span {
				position: absolute;
				top: 50%;
				left: 65%;
				line-height: 36px;
				margin-top: -18px;
				text-align: center;
				font-size: 36px;
				color: red;
				font-weight: bold;
			}
			
			a {
				color: #333 !important;
			}
			
			.details span {
				display: inline-block;
				width: 80px;
				float: left;
				font-size: 14px;
				margin-top: 6px;
				line-height: 1.2em;
			}
			
			.details div {
				float: left;
				font-weight: bold;
				font-size: 14px;
			}
		</style>
	</head>

	<body>

		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						<a style="display: inline-block;float: left;font-size: 18px;line-height: 20px;margin-right: 15px;" href="<?php echo U('Order/mySales');?>">
							<i class="fa fa-home"></i>
						</a>
						<h2 class="panel-title"><?php echo (L("order_details")); ?></h2>
					</header>
					<div class="panel-body">
						<p id="status_id" style="display: none;"><?php echo ($info["status_id"]); ?></p>
						<p id="orderid" style="display: none;"><?php echo ($info["id"]); ?></p>
						<div id="node_message" style="position: fixed;top: 50%;left: 50%;display: none;background: #888;min-width:300px;margin-left: -150px;margin-top:-15px;border-radius: 8px;text-align: center;font-size: 16px;padding: 12px 20px;color: #fff;z-index: 1200;"></div>
						<div class="input-group" style="width: 30%;padding-right: 15px;margin-bottom: 10px;float: left;">
							<input name="search" id="search_order" type="text" value="" class="form-control" placeholder="<?php echo (L("Pleaseordernumber")); ?>" />
							<span class="input-group-btn">
                    	<button type="button" class="btn btn-success" style="white-space: nowrap;" onclick="order_details()"><?php echo (L("Search")); ?></button>
                	</span>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <?php echo (L("Operation")); ?> <span class="caret"></span>
							 </button>
							<ul class="dropdown-menu">
								<li>
									<a onclick='cancelorder("<?php echo ($info["id"]); ?>")'>
										<?php echo (L("cancel_order")); ?>
									</a>
								</li>
								<?php if(($info["status_id"] < 3) OR ($info["status_id"] == 9)): ?><li>
										<a target="_blank" href="<?php echo U('Order/update',array('id'=>$info['id']));?>"><?php echo (L("Modify")); ?></a>
									</li><?php endif; ?>
								<?php if(($info["asin"] == null) AND ($info["var"] != null)): ?><li>
										<a target="_blank" href="<?php echo U('Order/link',array('id'=>$info['id']));?>">添加链接</a>
									</li><?php endif; ?>
								<?php if($info["var"] == null): ?><li>
										<a target="_blank" href="<?php echo U('Order/update',array('id'=>$info['id']));?>">添加BOM</a>
									</li><?php endif; ?>
							</ul>
						</div>
						<br style="clear: both;" />
						<div id="details_body" style="line-height: 28px;width: 30%;float: left;max-height: 80vh;overflow-y: auto;">
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("ordernumber")); ?></span>
									<div id="details_o_number"><?php echo ($info["id"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("external_order_number")); ?></span>
									<div id="details_o_number"><?php echo ($info["external_sn"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("order_status")); ?></span>
									<div id="details_status" style="color: red;"><?php echo ($info["processing_status"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("order_original")); ?></span>
									<div id="details_status"><?php echo ($info["name"]); ?> : <?php echo ($info["account_number"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("recipient")); ?></span>
									<div id="details_status"><?php echo ($info["recipient_first_name"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("Email")); ?></span>
									<div id="details_status"><?php echo ($info["buyer_email"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("recipient_phone")); ?></span>
									<div id="details_status"><?php echo ($info["buyer_phone"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("shipping_address")); ?></span>
									<!--<textarea readonly="readonly" style="background: #fff;" class="form-control" id="details_status"><?php echo ($info["country"]); ?> <?php echo ($info["state"]); ?> <?php echo ($info["city"]); ?> <?php echo ($info["street_1"]); ?> <?php echo ($info["street_2"]); ?> <?php echo ($info["street_3"]); ?></textarea>-->
									<div style="min-height: 34px;height: auto;line-height: 1.5em;padding-top: 6px;" id="details_status"><?php echo ($info["recipient_first_name"]); ?><br /><?php echo ($info["street_1"]); ?> <?php echo ($info["street_2"]); ?> <?php echo ($info["street_3"]); ?><br /><?php echo ($info["city"]); ?> <?php echo ($info["state"]); ?> <br /> <?php echo ($info["zip"]); ?> <?php echo ($info["country"]); ?></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("transportation_requirement")); ?></span>
									<div id="details_status" style="color: red;"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="details">
									<span><?php echo (L("packed_weight")); ?></span>
									<div id="details_status"><?php echo ($weight); ?></div>
								</div>
							</div>
							<br style="clear: both;" />
							<p style="font-size: 14px;font-weight: bold;margin: 0;"><?php echo (L("order_flow_record")); ?>：</p>
							<ul id="process_record" style="line-height: 24px;">
								<?php if(is_array($process)): $i = 0; $__LIST__ = $process;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["time"]); ?> <?php echo ($vo["lastnamezh"]); echo ($vo["namezh"]); ?> <?php echo ($vo["textzh"]); ?> <?php echo ($vo["variable"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<div style="width: 70%;float: left;max-height: 80vh;overflow-y: auto;" id="details_img">
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="div_<?php echo ($vo["pid"]); ?>">
									<img src="/InternalSystem<?php echo ($vo["thumb"]); ?>" /><span>x<?php echo ($vo["number"]); ?></span>
									<p>
										<a target="_blank" href="<?php echo U('Product/homeProduct','','');?>/pid/<?php echo ($vo["pid"]); ?>"><?php echo ($vo["namezh"]); ?></a>
									</p>
									<p>
										<a target="_blank" href="<?php echo U('Product/homeProduct','','');?>/pid/<?php echo ($vo["pid"]); ?>"><?php echo (L("product_number")); ?>:<?php echo ($vo["bclass"]); ?>.<?php echo ($vo["sclass"]); ?>.<?php echo ($vo["num"]); ?> </a><?php echo (L("goods_shelf")); ?>:</p>
									<p><?php echo (L("inventory")); ?>:</p>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<a id="order_mistake" target="_blank" href="<?php echo U('Order/replacement',array('id'=>$info[id]),'');?>" class="btn btn-primary" style="margin-top: 12px;float: right;margin-right: 30px;color: white !important;display: none;">补单</a>
					</div>
				</section>

			</div>
		</div>

		<div id="problem_modal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">
					报告问题
				</h4>
					</div>
					<div class="modal-body" style="line-height: 34px;">
						<div class="input-group">
							<span class="input-group-addon">问题类型</span>
							<select class="form-control" id="problem_type">
								<option value="">请选择问题类型</option>
								<option value="11">库存不足</option>
								<option value="12">地址不清</option>
								<option value="13">其他</option>
							</select>
						</div>

						<div class="input-group" style="padding-top: 20px;">
							<span class="input-group-addon">问题描述</span>
							<input class="form-control" id="problem_ds" />
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn no-print btn-primary" onclick="sickorder()">提交</button>
						<!--<button type="button" class="btn btn-primary" onclick="change_message(num)">修改</button>-->
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
	</body>

</html>
<script src="/InternalSystem/Public/login/assets/js/jquery-1.11.1.min.js"></script>
<script src="/InternalSystem/Public/FirstEdition/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script>
	var pid_arr = [],
		pid_length = $('#details_tbody').find('tr').length,
		pid_arr1 = [];
	for(var i = 0; i < $('#details_tbody').find('tr').length; i++) {
		var pid = $('#details_tbody').find('tr')[i].id.split('_')[1];
		pid_arr1.push(pid);
	}
	//判断是否有订单
	if(pid_arr1.length == 0 || $('#status_id').text() == 6 || $('#status_id').text() == 7 || $('#status_id').text() == 9) {
		$('#search_order').focus();
	} else {
		$('#order_list').focus();
	}
	if($('#status_id').text() == 7){
		$('#order_mistake').css('display','block');
	}
	function order_details() {
		/*$.ajax({
			url: "<?php echo U('Deliverycenter/getAjaxPermission');?>", //通过页面元素的ID来获取设备ID
			type: "get", //选择传值方式
			data: {
				id: $('#search_order').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(data == 0) {
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('没有这个订单');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';", 2000);
					return false;
				}*/
		location.href = "<?php echo U('Order/details');?>?id=" + $('#search_order').val();
		/*	}
		})*/
	}

	$('#search_order').on('keyup', function(event) {
		if(event.keyCode == '13') {
			order_details();
		}
	})

	//扫描产品
	$('#order_list').on('keyup', function(event) {
		if(event.keyCode == '13') {
			console.log(pid_arr1);
			var pid_input = $('#order_list').val();
			if(pid_arr1.indexOf(pid_input) == -1) {
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').text('没有这个产品');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none'", 2000);
				return false;
			}
			scan_product()
		}
	})

	//扫描产品码
	function scan_product() {
		$.ajax({
			url: "<?php echo U('Order/getAjaxPid','','');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				pid: $('#order_list').val()
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
				if(pid_arr.indexOf(data) != -1) {
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').html('该产品已扫描完毕');
					node_message.style.display = 'block';
					$('#order_list').val('');
					var t = setTimeout("node_message.style.display='none';", 2000);
					return false;
				}
				console.log('#tr_' + data)
				//				$('#tr_'+data).css('background','#47a447');
				var tr_text = $('#tr_' + data).find('td').eq(3).text() - 0 + 1;
				var tr_text1 = $('#tr_' + data).find('td').eq(2).text();
				$('#tr_' + data).css('background', '#ecc71f');
				$('#tr_' + data).find('td').eq(3).text(tr_text);
				console.log($('#tr_' + data).find('td').eq(2).text());
				$('#order_list').val('');
				if(tr_text == tr_text1) {
					pid_arr.push(data);
					$('#tr_' + data).css('background', '#47a447');
					$('#div_' + data).css('background', '#47a447');
					console.log(pid_arr);
					if(pid_arr.length == pid_length) {
						$('#Packaging').attr('disabled', false);
						$('#confirm_ship').attr('disabled', false);
					}
				}

			}
		})
	}
	//手动扫描
	function hand_scan(obj) {
		console.log($(obj).parents('tr').attr('id').split('_')[1]);
		var tr_text = $(obj).parent().siblings('td').eq(3).text() - 0 + 1;
		var tr_text1 = $(obj).parent().siblings('td').eq(2).text();
		if(tr_text - 1 == tr_text1) {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').html('该产品已扫描完毕');
			node_message.style.display = 'block';
			$('#order_list').val('');
			var t = setTimeout("node_message.style.display='none';", 2000);
			return false;
		}
		$(obj).parents('tr').css('background', '#ecc71f');
		$(obj).parent().siblings('td').eq(3).text(tr_text);
		if(tr_text == tr_text1) {
			var pr_pid = $(obj).parents('tr').attr('id').split('_')[1];
			pid_arr.push(pr_pid);
			$(obj).parents('tr').css('background', '#47a447');
			$('#div_' + pr_pid).css('background', '#47a447');
			console.log(pid_arr);
			if(pid_arr.length == pid_length) {
				$('#Packaging').attr('disabled', false);
				$('#confirm_ship').attr('disabled', false);
			}
		}
	}
	//报告问题
	function report_problem() {
		$('#problem_modal').modal('toggle');
	}

	//打包完成
	function Packaging() {
		var r = confirm("确定打包完成吗？");
		if(r == true) {
			$.ajax({
				url: "<?php echo U('Deliverycenter/waitship');?>", //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				data: {
					id: $('#orderid').text(),
					labor_time: $('#labor_time').val()
				},
				dataType: "JSON",
				success: function(data) {
					console.log(data)
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').text('打包完成');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				}
			})
		} else {
			return false;
		}
	}
	//确认发货
	function confirm_ship() {
		if($('#transport_costs').val() == "" || $('#transport_agent').val() == "" || $('#transport_form').val() == "") {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').text('请输入必填项');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none';", 2000);
			return false;
		}
		var r = confirm("确定发货吗？");
		if(r == true) {
			$.ajax({
				url: "<?php echo U('Deliverycenter/shipped');?>", //通过页面元素的ID来获取设备ID
				type: "post", //选择传值方式
				data: {
					id: $('#orderid').text(),
					labor_time: $('#labor_time').val(),
					logistics: $('#tracking_number').val(),
					transporters_id: $('#transport_agent').val(),
					transport_mode_id: $('#transport_form').val()
				},
				dataType: "JSON",
				success: function(data) {
					console.log(data)
					if(t) {
						clearTimeout(t)
					};
					$('#node_message').text('发货成功');
					node_message.style.display = 'block';
					var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
				}
			})
		} else {
			return false;
		}
	}
	//修改
	$('#change_order').on('click', function() {
		location.href = "<?php echo U('Deliverycenter/updateOrder');?>?id=" + $('#orderid').text();
	})
	//问题订单
	function sickorder() {
		if($('#problem_type').val() == "") {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').text('请选择问题类型');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none'", 2000);
			return false;
		}
		if($('#problem_type').val() == "13" && $('#problem_ds').val() == "") {
			if(t) {
				clearTimeout(t)
			};
			$('#node_message').text('请输入问题描述');
			node_message.style.display = 'block';
			var t = setTimeout("node_message.style.display='none'", 2000);
			return false;
		}
		$.ajax({
			url: "<?php echo U('Deliverycenter/sickorder');?>", //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			data: {
				id: $('#orderid').text(),
				ptype: $('#problem_type').val(),
				problem: $('#problem_ds').val(),
			},
			dataType: "JSON",
			success: function(data) {
				console.log(data)
				if(t) {
					clearTimeout(t)
				};
				$('#node_message').text('转为问题订单');
				node_message.style.display = 'block';
				var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
			}
		})
	}
	//取消订单
	function cancelorder(id) {
		var r = confirm("您确定取消该订单吗?");
		if(r) {
			$.ajax({
				url: "<?php echo U('Order/cancelOrder');?>",
				type: 'post',
				dataType: "json",
				data: {
					type: 1,
					id: id
				},
				success: function(data) {
					if(data.status == 0) {
						$('#node_message').html('<?php echo (L("Operationauthority")); ?>');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
					} else if(data > 0) {
						//						$(obj).parents("tr").remove();
						$('#node_message').html('取消成功');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
					} else if(data == 0) {
						$('#node_message').html('该订单无法取消');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
					}
				}
			});
		}
	}
</script>