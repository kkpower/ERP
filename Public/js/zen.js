// 选择性加载js文件
// 使用基于jq
//------------------新的窗口连接 开始 -----------------
function viewpicture(pid) {
    //console.log(a);
    //jQuery.children(expr);
    url=$("#imgurl").val()+"?pid="+pid;
    //console.log(url);
    window.open(url);

}
function xxx(a) {
    //console.log(a);
    //jQuery.children(expr);
    url=$("#url").val()+"?a="+a;
    //console.log(url);
    window.open(url);

}
//添加新的图片,打开新窗口
function product(pid) {
    url=$("#producturl").val()+"?pid="+pid;
    window.open(url);
    
}




//------------------新的窗口连接 结束 ----------------


//将获取的数据,添加到下拉列表框中
function  classification()
{
    var url =$("#classaddurl").val();//提交的地址
    var Parentclassid={superior:$("#father").val()};//提交的父类id
    //console.log(url);
    $.ajax({
        type: 'POST',
        url: url,
        data: Parentclassid,
        dataType: 'JSON',
        success: function(data)
             {
                 //初始化
                 var p ="<option id='Fulcrum' value='eat'>请选择子分类</option>"
                 $("#son").html(p);
                 //将获取到的数据赋值
                 for(var i=0;i<data.length;i++)
                 {
                     //拼接option标签的 name value 等属性
                     var p="<option value='"
                         +data[i]['id']
                         +"'"
                         +">"
                         +data[i]['namezh']
                         +"</option>";
                     $("#Fulcrum").after(p);
                 }

            }

    });
}
//-------根据分类的id获取所有子分---结束---------------

/*
function sb() {

    $("#son").change(function () {
        var opt = $("#son").val();
        var f = $("#father").val();
        var url =$("[name=aaa]").val();
        $.ajax({
            type: 'POST',
            url: url,
            data:{fatherdata:f, son:opt},
            dataType: 'JSON',

        });
        });




}*/

//todo 获取asin 下的 pid 相关信息
//获得asin 下的产品 信息
function getorderCustomerBom(asin) {
    $.ajax()
}
