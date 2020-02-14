/**
 * Created by Dong.J.W on 2017/8/8 0008.
 *
 *
 */

//-----------------------RABC区域开始--------------------------------------//
/**
 * 修改角色权限
 * @param roleId
 */

function showAuthorityModal(type, roleId) {
	var getRoleAuthorityUrl = $("[name='getRoleAuthority']").val();
	if(type == 1) {
		$("#roleModalLabel").text("添加角色");
		$('#roleModal').modal('toggle'); //点开或者关闭模态窗
	};
	if(type == 2) {
		$("#roleModalLabel").text("修改角色");
		$.ajax({
			url: getRoleAuthorityUrl, //通过JQ获取URL获得路径
			data: {
				type: type,
				role_id: roleId
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				if(data) {
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
					$("#roleName").val(data.roleName);
					$("[name='roleId']").val(roleId);
					$('#roleModal').modal('toggle');
					$(function() {
						$('#roleModal').on('hide.bs.modal', function() {
							location.reload();
						})
					});
				}
			}
		})
	}
}

/**
 * 保存用户角色权限信息
 */
function saveRole() {
	var nodes = $("#authorityTree").jstree().get_checked();
	var role_ids = '';
	var checked_ids = [];
	$("#authorityTree").find(".jstree-undetermined").each(function(i, element) {
		checked_ids.push($(element).closest('.jstree-node').attr("id"));
	});
	role_ids = checked_ids.join(",") + ",";
	role_ids += nodes.join(",");
	$("[name='role_auth_ids']").val(role_ids);
	$("#saveRole").submit();

}

/**
 * 添加与修改用户的模态框显示
 * @param type
 * @param uid
 */
function showUserModal(type, uid) {
	if(type == 1) {
		$("#uname").val('');
		$('#numbering').val('');
		$('#lastname').val('');
		$('#name').val('');
		$("#pwd").val('');
		$('#lastnamezh').val('');
		$('#namezh').val('');
		$('#email').val('');
		$('#identity').val('');
		$('#remarks').val('');
		$('#account').val('');
		$('#bank').val('');
		$("#call").val('');
		$('#uid').val('');
		$("#role_id").val('请选择');
		// $("#fname").val('请选择');
		$('#userModal').modal('toggle'); //点开或者关闭模态窗
	}
	if(type == 2) {
		var url = $("[name='getUser']").val();
		$.ajax({
			url: url, //通过JQ获取URL获得路径
			type: "post", //选择传值方式
			data: {
				uid: uid
			}, //通过页面元素的ID来获取设备ID
			dataType: "JSON",
			success: function(data) {
				if(data) {
					console.log(data);
					if(data.info) {
						$('#node_message').html('{$Think.lang.Operationauthority}');
						node_message.style.display = 'block';
						var t = setTimeout("node_message.style.display='none';", 2000);
					}
					$("#unamec").val(data.uname);
					$("#pwdc").val(data.pwd);
					$('#uid').val(uid);
					$("#role_idc").val(data.role_id);
					$('#usersModal').modal('toggle'); //点开或者关闭模态窗
					// $(function () { $('#userModal').on('hide.bs.modal', function () {
					//     location.reload();})
					// });
				}
			}
		})
	}

}

function forget() {
	var getusert = $("[name='getcall']").val();
	var username = $("#name").val();

	$.ajax({
		url: getusert, //通过JQ获取URL获得路径
		data: {
			name: username
		},
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				$("[name='ualias']").val(data.ualias);
				$("[name='call']").val(data.call);
				//点开或者关闭模态窗
			}

		}
	})

}

//-----------------------RABC结束--------------------------------------//
//-----------------------供应商开始--------------------------------------//
/**
 * 添加与修改的模态框显示
 * @param type
 * @param uid
 */
function showsupplier(type, id) {
	if(type == 1) {

		$("#userModalLabel").text("添加供应商");
		$('#userModal').modal('toggle'); //点开或者关闭模态窗

	}
	if(type == 2) {
		var url = $("[name='getSupplier']").val();
		$("#userModalLabel").text("修改供应商信息");

		$.ajax({
			url: url, //通过JQ获取URL获得路径
			data: {
				id: id
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				if(data) {
					console.log(data);
					for(var name in data) { //遍历对象属性名
						$("#" + name).val(data[name]);
					}
					$('#userModal').modal('toggle');
					$(function() {
						$('#userModal').on('hide.bs.modal', function() {
							location.reload();
						})
					});

				}

			}
		})

	}

}

function del(id) {
	var delSu = $("[name='deSupplier']").val();
	//  alert('aaa');
	$.ajax({
		url: delSu, //通过JQ获取URL获得路径
		data: {
			id: id
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				alert('删除成功');
				setTimeout(function() {
					location.reload();
				}, 3);

			}

		}
	})

}

//-----------------------供应商结束--------------------------------------//
//-----------------------仓库开始--------------------------------------//
/**
 * 添加与修改的模态框显示
 * @param type
 * @param uid
 */
function showarehouse(type, id) {
	if(type == 1) {

		$("#userModalLabel").text("添加仓库");
		$('#userModal').modal('toggle'); //点开或者关闭模态窗

	}
	if(type == 2) {
		var url = $("[name='getSupplier']").val();
		$("#userModalLabel").text("修改仓库信息");

		$.ajax({
			url: url, //通过JQ获取URL获得路径
			data: {
				id: id
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				if(data) {
					console.log(data);
					for(var name in data) { //遍历对象属性名
						$("#" + name).val(data[name]);
					}
					$("#state").val(data.state);
					$('#userModal').modal('toggle');
					$(function() {
						$('#userModal').on('hide.bs.modal', function() {
							location.reload();
						})
					});

				}

			}
		})

	}

}
//-----------------------仓库结束--------------------------------------//
//-----------------------模板预览开始--------------------------------------//
function fathemotai() {

	$('#fModal').modal('toggle');
}

function sonmotai() {

	$('#myModal').modal('toggle');
}

function addimgs(id) {
	var getid = $("[name='getProduct']").val();

	$.ajax({
		url: getid, //通过JQ获取URL获得路径
		data: {
			id: id
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);

				$('#fModal').modal('toggle');
			}

		}
	})

}

function showtemplate(id) {
	var getid = $("[name='getid']").val();

	$.ajax({
		url: getid, //通过JQ获取URL获得路径
		data: {
			id: id
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data.val);
				$('#roleModal').modal('toggle');
				$('#moban_yulan').html(data.val);
				$('#textarea1').val(data.val);
			}

		}
	})

}

function copyUrl1() {
	var Url1 = document.getElementById("textarea1");
	Url1.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#img_message1').html('您已复制代码');
	img_message1.style.display = 'block';
	var t = setTimeout("img_message1.style.display='none'", 2000);
}

function delHtmodata(number) {
	var delSu = $("[name='delhtmllist']").val();
	// alert('aaa');
	var rr = confirm("是否确认删除？");
	if(rr == true) {
		$.ajax({
			url: delSu, //通过JQ获取URL获得路径
			data: {
				number: number
			}, //通过页面元素的ID来获取设备ID
			type: "post", //选择传值方式
			dataType: "JSON",
			success: function(data) {
				if(data) {
					console.log(data);
					setTimeout(function() {
						location.reload();
					}, 3);

				}

			}
		})
	} else {
		return false;
	}

}

//-----------------------模板预览结束--------------------------------------//
//-----------------------模板1--------------------------------------//
var arr = [];
//复制
function ocopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("otextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#oimg_message').html('您已复制代码');
	oimg_message.style.display = 'block';
	var t = setTimeout("oimg_message.style.display='none'", 2000);
}
//打开模板	
function omodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				oshow();
				$('#otextarea').val($('#omoban').html())
				$('#oModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function oshow() {
	var lis1, lis;
	$('#op_o').html('');
	$('#op_t').html('');
	$('#op_th').html('<font color="#708090"><i><b>Packing Included</b></i></font><p></p>');
	$('#op_f').html('');
	$('#caution').html('');
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle1') != -1) {
			lis1 = '<b>' + arr[i].val + '</b><p></p>'
			$('#op_o').append(lis1)
		} else if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = '<i><font color="#708090">' + arr[i].val + '</i><p></p>'
			$('#op_o').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<font size="2">' + arr[i].val + '<p></p></font>'
			$('#op_o').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul><li><font color="#708090" size="2">' + arr[i].val + '</font></li></ul>'
			$('#op_t').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<ul><li style="font-size:12px;line-height:18px;"><b>Optional</b> ' + arr[i].val + '</li></ul>'
			$('#op_th').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			lis1 = '<ul><li style="margin: 0.5em 0em;"><font style="font-weight: normal;" face="Arial" size="2"> ' + arr[i].val + '</font></li></ul>'
			$('#op_f').append(lis1)
		} else if(arr[i].name.indexOf('ftitle') != -1) {
			lis1 = '<font size="2" color="#708090"><i><b> ' + arr[i].val + '</b><br/></i></font>'
			$('#op_f').append(lis1)
		} else if(arr[i].name.indexOf('caution') != -1) {
			lis1 = arr[i].val
			$('#caution').append(lis1)
		}
	}
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('imgone') != -1) {
			$('#oimgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#oimg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#oimg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#oimg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#oimg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#oimg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#oimg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#oimg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#oimg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#oimg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#oimg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#oimg12').attr('src', arr[i].val)
		}
	}
}
//-----------------------模板2--------------------------------------//
function tcopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("ttextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#timg_message').html('您已复制代码');
	timg_message.style.display = 'block';
	var t = setTimeout("timg_message.style.display='none'", 2000);
}
//打开模板	
function tmodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				tshow();
				$('#ttextarea').val($('#tmoban').html())
				$('#tModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function tshow() {
	var lis1, lis;
	$('#tp_d').html('');
	$('#tp_t').html('<h2 style="font-size: 22px;margin: 22px 0 44px;color:#222;">Packing Included</h2>');
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = '<h2 style="font-size: 22px;margin: 22px 0 44px;color:#222;">' + arr[i].val + '</h2>'
			$('#tp_d').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<p style="line-height: 30px;font-size: 18px;margin:0 0 14px 0;">' + arr[i].val + '</p>'
			$('#tp_d').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul><li style="line-height: 30px;font-size: 18px;margin:0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#tp_d').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<ul><li style="line-height: 30px;font-size: 18px;margin:0 0 14px 0;"><b>Optional</b> ' + arr[i].val + '</li></ul>'
			$('#tp_t').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			lis1 = '<ul><li style="line-height: 30px;font-size: 18px;margin:0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#tp_t').append(lis1)
		} else if(arr[i].name.indexOf('ftitle') != -1) {
			lis1 = '<h2 style="font-size: 22px;margin: 22px 0 44px;color:#222;">' + arr[i].val + '</h2>'
			$('#tp_t').append(lis1)
		} else if(arr[i].name.indexOf('imgone') != -1) {
			$('#timgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#timg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#timg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#timg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#timg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#timg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#timg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#timg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#timg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#timg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#timg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#timg12').attr('src', arr[i].val)
		}
	}
}
//-----------------------模板3--------------------------------------//
function thcopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("thtextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#thimg_message').html('您已复制代码');
	thimg_message.style.display = 'block';
	var t = setTimeout("thimg_message.style.display='none'", 2000);
}
//打开模板	
function thmodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				thshow();
				$('#thtextarea').val($('#thmoban').html())
				$('#thModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function thshow() {
	console.log(arr);
	var lis1, lis;
	$('#thp_o').html('');
	$('#thp_t').html('');
	$('#thp_th').html('');
	$('#thp_f').html('');
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = arr[i].val
			$('#thp_o').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<p style="margin:0 0 14px 0;">' + arr[i].val + '</p>'
			$('#thp_t').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul><li style="margin:0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#thp_t').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<ul><li style="margin:0 0 14px 0;"><b>Optional</b> ' + arr[i].val + '</li></ul>'
			$('#thp_th').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			lis1 = '<ul><li style="margin:0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#thp_f').append(lis1)
		} else if(arr[i].name.indexOf('ftitle') != -1) {
			lis1 = '<p style="margin:0 0 14px 0;font-weight: bold;">' + arr[i].val + '</p>'
			$('#thp_f').append(lis1)
		} else if(arr[i].name.indexOf('imgone') != -1) {
			$('#thimgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#thimg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#thimg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#thimg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#thimg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#thimg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#thimg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#thimg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#thimg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#thimg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#thimg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#thimg12').attr('src', arr[i].val)
		}
	}
}
//-----------------------模板4--------------------------------------//
function fcopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("ftextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#fimg_message').html('您已复制代码');
	fimg_message.style.display = 'block';
	var t = setTimeout("fimg_message.style.display='none'", 2000);
}
//打开模板	
function fmodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				fshow();
				$('#ftextarea').val($('#fmoban').html())
				$('#fModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function fshow() {
	console.log(arr);
	var lis1, lis;
	$('#fp_o').html('');
	$('#fp_t').html('');
	$('#fp_th').html('');
	$('#fp_f').html('');
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = arr[i].val
			$('#fp_o').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<p style="line-height: 22px;font-size: 13px;margin: 0;">' + arr[i].val + '</p>'
			$('#fp_t').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul><li style="line-height: 22px;font-size: 13px;margin: 0;">' + arr[i].val + '</li></ul>'
			$('#fp_t').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<ul><li style="line-height: 22px;font-size: 13px;margin: 0;"><b>Optional</b> ' + arr[i].val + '</li></ul>'
			$('#fp_th').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			lis1 = '<ul><li style="line-height: 22px;font-size: 13px;margin: 0 2%;">' + arr[i].val + '</li></ul>'
			$('#fp_f').append(lis1)
		} else if(arr[i].name.indexOf('ftitle') != -1) {
			lis1 = '<h2 style="font-size: 16px;margin: 1.2em 0 0;height: 2.6em;line-height: 2.6em;text-indent: 2%;">' + arr[i].val + '</h2>'
			$('#fp_f').append(lis1)
		} else if(arr[i].name.indexOf('imgone') != -1) {
			$('#fimgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#fimg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#fimg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#fimg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#fimg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#fimg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#fimg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#fimg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#fimg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#fimg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#fimg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#fimg12').attr('src', arr[i].val)
		}
	}
}
//-----------------------模板5--------------------------------------//
function ficopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("fitextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#fiimg_message').html('您已复制代码');
	fiimg_message.style.display = 'block';
	var t = setTimeout("fiimg_message.style.display='none'", 2000);
}
//打开模板	
function fimodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				fishow();
				$('#fitextarea').val($('#fimoban').html())
				$('#fiModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function fishow() {
	console.log(arr);
	var lis1;
	var fiarr = [];
	$('#fip_o').empty();
	$('#fip_t').empty();
	$('#fip_th').empty();
	$('#fip_f').empty();
	$('#fip_fi').empty();
	$('#fip_s').empty();
	$('#fip_se').empty();
	$('#fip_e').empty();
	$('#fip_n').empty();
	$('#fip_te').empty();
	$('#fip_el').empty();
	$('#fip_tw').empty();
	$('#fip_thi').empty();
	$('#fip_for').empty();
	$('#fip_fif').empty();
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = arr[i].val
			$('#fip_o').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + arr[i].val + '</p>'
			$('#fip_t').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul><li style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#fip_t').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<ul><li style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><b>Optional</b> ' + arr[i].val + '</li></ul>'
			$('#fip_th').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			fiarr.push(arr[i]);
		} else if(arr[i].name.indexOf('imgone') != -1) {
			$('#fiimgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#fiimg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#fiimg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#fiimg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#fiimg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#fiimg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#fiimg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#fiimg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#fiimg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#fiimg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#fiimg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#fiimg12').attr('src', arr[i].val)
		}
	}
	console.log(fiarr)
	for(var j = 0; j < fiarr.length; j++) {
		if(j == '0' || j == '13') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_f').append(lis1)
		} else if(j == '1' || j == '14') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_fi').append(lis1)
		} else if(j == '2' || j == '15') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_s').append(lis1)
		} else if(j == '3' || j == '16') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_se').append(lis1)
		} else if(j == '4' || j == '17') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_e').append(lis1)
		} else if(j == '5') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_n').append(lis1)
		} else if(j == '6') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_te').append(lis1)
		} else if(j == '7') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_el').append(lis1)
		} else if(j == '8') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_tw').append(lis1)
		} else if(j == '9') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_thi').append(lis1)
		} else if(j == '10') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_for').append(lis1)
		} else if(j == '11') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_fif').append(lis1)
		} else if(j == '12') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + fiarr[j].val + '</p>';
			$('#fip_n').append(lis1)
		}

	}

}
//-----------------------模板6--------------------------------------//
function scopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("stextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#simg_message').html('您已复制代码');
	simg_message.style.display = 'block';
	var t = setTimeout("simg_message.style.display='none'", 2000);
}
//打开模板	
function smodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				sshow();
				$('#stextarea').val($('#smoban').html())
				$('#sModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function sshow() {
	console.log(arr);
	var lis1;
	var sarr = [];
	$('#sp_o').html('');
	$('#sp_t').html('');
	$('#sp_th').html('');
	$('#sp_f').html('');
	$('#sp_fi').html('');
	$('#sp_s').html('');
	$('#sp_se').html('');
	$('#sp_e').html('');
	$('#sp_n').html('');
	$('#sp_te').html('');
	$('#sp_el').html('');
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = arr[i].val
			$('#sp_o').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + arr[i].val + '</p>'
			$('#sp_t').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul><li style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#sp_t').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<li style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><b>Optional</b> ' + arr[i].val + '</li>'
			$('#sp_th').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			sarr.push(arr[i]);
		} else if(arr[i].name.indexOf('imgone') != -1) {
			$('#simgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#simg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#simg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#simg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#simg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#simg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#simg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#simg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#simg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#simg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#simg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#simg12').attr('src', arr[i].val)
		}
	}
	console.log(sarr)
	for(var j = 0; j < sarr.length; j++) {
		if(j == '0' || j == '8' || j == '16') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_f').append(lis1)
		} else if(j == '1' || j == '9' || j == '17') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_fi').append(lis1)
		} else if(j == '2' || j == '10') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_s').append(lis1)
		} else if(j == '3' || j == '11') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_se').append(lis1)
		} else if(j == '4' || j == '12') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_e').append(lis1)
		} else if(j == '5' || j == '13') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_n').append(lis1)
		} else if(j == '6' || j == '14') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_te').append(lis1)
		} else if(j == '7' || j == '15') {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + sarr[j].val + '</p>';
			$('#sp_el').append(lis1)
		}

	}

}

//-----------------------模板7--------------------------------------//
function secopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("setextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#seimg_message').html('您已复制代码');
	seimg_message.style.display = 'block';
	var t = setTimeout("seimg_message.style.display='none'", 2000);
}
//打开模板	
function semodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				seshow();
				$('#setextarea').val($('#semoban').html())
				$('#seModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function seshow() {
	console.log(arr);
	var lis1;
	$('#sep_o').html('');
	$('#sep_t').html('');
	$('#sep_th').html('');
	$('#sep_f').html('');
	$('#sep_fi').html('');
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle1') != -1) {
			lis1 = arr[i].val
			$('#sep_o').append(lis1)
		} else if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = arr[i].val
			$('#sep_t').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<p style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + arr[i].val + '</p>'
			$('#sep_th').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul><li style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#sep_th').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<li style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;"><b>Optional</b> ' + arr[i].val + '</li>'
			$('#sep_f').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			lis1 = '<ul><li style="line-height: 19px;font-size: 13px;margin: 0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#sep_fi').append(lis1)
		} else if(arr[i].name.indexOf('ftitle') != -1) {
			lis1 = '<h2 style="font-size: 18px;color: #222;">' + arr[i].val + '</h2>'
			$('#sep_fi').append(lis1)
		} else if(arr[i].name.indexOf('imgone') != -1) {
			$('#seimgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#seimg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#seimg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#seimg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#seimg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#seimg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#seimg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#seimg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#seimg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#seimg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#seimg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#seimg12').attr('src', arr[i].val)
		}
	}
}
//-----------------------模板3--------------------------------------//
function ecopyUrl() {
	if(t) {
		clearTimeout(t)
	};
	var Url2 = document.getElementById("etextarea");
	Url2.select(); // 选择对象
	document.execCommand("Copy"); // 执行浏览器复制命令
	$('#eimg_message').html('您已复制代码');
	eimg_message.style.display = 'block';
	var t = setTimeout("eimg_message.style.display='none'", 2000);
}
//打开模板	
function emodal(number) {
	var a = $('input[name="gethtdata"]').val()
	console.log(a);
	$.ajax({
		url: a, //通过JQ获取URL获得路径
		data: {
			number: number
		}, //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			if(data) {
				console.log(data);
				arr = data;
				eshow();
				$('#etextarea').val($('#emoban').html())
				$('#eModal').modal('toggle');
			}
		}
	})
}
//模板加数据
function eshow() {
	console.log(arr);
	var lis1, lis;
	$('#ep_o').html('');
	$('#ep_t').html('');
	$('#ep_th').html('');
	$('#ep_f').html('');
	for(var i = 0; i < arr.length; i++) {
		if(arr[i].name.indexOf('otitle2') != -1) {
			lis1 = arr[i].val
			$('#ep_o').append(lis1)
		} else if(arr[i].name.indexOf('ocontent') != -1) {
			lis1 = '<p style="margin:0 0 14px 0;">' + arr[i].val + '</p>'
			$('#ep_t').append(lis1)
		} else if(arr[i].name.indexOf('tcontent') != -1) {
			lis1 = '<ul style="margin:0;"><li style="margin:0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#ep_t').append(lis1)
		} else if(arr[i].name.indexOf('thcontent') != -1) {
			lis1 = '<ul style="margin:0;"><li style="margin:0 0 14px 0;"><b>Optional</b> ' + arr[i].val + '</li></ul>'
			$('#ep_th').append(lis1)
		} else if(arr[i].name.indexOf('fcontent') != -1) {
			lis1 = '<ul style="margin:0;"><li style="margin:0 0 14px 0;">' + arr[i].val + '</li></ul>'
			$('#ep_f').append(lis1)
		} else if(arr[i].name.indexOf('ftitle') != -1) {
			lis1 = '<p style="font-size:16px;margin:0 0 14px 0;font-weight: bold;">' + arr[i].val + '</p>'
			$('#ep_f').append(lis1)
		} else if(arr[i].name.indexOf('imgone') != -1) {
			$('#eimgone').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img2') != -1) {
			$('#eimg2').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img3') != -1) {
			$('#eimg3').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img4') != -1) {
			$('#eimg4').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img5') != -1) {
			$('#eimg5').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img6') != -1) {
			$('#eimg6').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img7') != -1) {
			$('#eimg7').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img8') != -1) {
			$('#eimg8').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img9') != -1) {
			$('#eimg9').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img10') != -1) {
			$('#eimg10').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img11') != -1) {
			$('#eimg11').attr('src', arr[i].val)
		} else if(arr[i].name.indexOf('img12') != -1) {
			$('#eimg12').attr('src', arr[i].val)
		}
	}
}
//消息通知
function problem_message() {
	$.ajax({
		url: $('#meNoticeAjax').val(), //通过页面元素的ID来获取设备ID
		type: "post", //选择传值方式
		dataType: "JSON",
		success: function(data) {
			console.log(data);
			$('#veryurgent_message').text(data.veryurgent);
			$('#emergency_message').text(data.emergency);
			$('#general_message').text(data.general);
			$('.problem_message').text(Number(data.veryurgent) + Number(data.emergency) + Number(data.general));
			//			if(t) {
			//				clearTimeout(t)
			//			};
			//			$('#node_message').text('订单转入打印中');
			//			node_message.style.display = 'block';
			//			var t = setTimeout("node_message.style.display='none';location.reload()", 2000);
		}
	})
}

//$(document).ready(function() {
//	if(t11) {
//		clearInterval(t11);
//	}
//	problem_message();
//	var t11 = setInterval(problem_message, 360000);
//	//去掉定时器的方法      
//});