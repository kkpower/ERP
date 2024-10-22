function ImgShow(evt){
   // alert($(window).height());
   var window_h=$(window).height();
   var window_w=$(window).width();
   var d_scrollTop=$(document).scrollTop();
   document.documentElement.style.overflow='hidden';
   var imgTag=(window.event)?event.srcElement:evt.target;
   var imgPath=imgTag.src.replace(/\_\d\./,"_4.");
   var tagTop=Math.max(document.documentElement.scrollTop,document.body.scrollTop);
   var tag=document.createElement("div");
   tag.style.cssText="width:100%;height:"+Math.max(document.body.clientHeight,document.body.offsetHeight,document.documentElement.clientHeight)+"px;position:absolute;background:black;top:0;filter: Alpha(Opacity=50);Opacity:0.5;z-index:3000";
   tag.onclick=closes;

   var tagImg=document.createElement("div");
   tagImg.style.cssText="font:12px /18px verdana;overflow:auto;text-align:center;position:fixed;width:200px;border:5px solid white;background:white;color:white;left:"+(parseInt(document.body.offsetWidth)/2-100)+"px;top:650px;z-index:3001"
   tagImg.innerHTML="<div style='padding:10px;background:#cccccc;border:1px solid white'><img src='' /><br /><br /><b style='color:#999999;font-weight:normal'>Image loading...</b><br /></div>";

   var closeTag=document.createElement("div");
   closeTag.style.cssText="display:block;position:absolute;right:-20px;top:-15px;color:black;cursor:pointer";
   var closesHtml="<img src='../../../../../Public/img/btn_start_help.png' />";
   // closeTag.innerHTML=closesHtml+" 提示:双击图片缩放";
   closeTag.onclick=closes;
   document.body.appendChild(tag);
   document.body.appendChild(tagImg);
   tagImg.onclick=closes;
   var img=new Image();
   img.src=imgPath;
   img.style.cssText="border:1px solid #cccccc;filter: Alpha(Opacity=0);Opacity:0;cursor:pointer";
   var barShow,imgTime;
   img.complete?ImgOK():img.onload=ImgOK;
   function ImgOK(){
       var Stop1=false,Stop2=false,temp=0;
       var tx=tagImg.offsetWidth,ty=tagImg.offsetHeight;
       // var ix=img.width,iy=img.height;
       // if (img.width > 1900) {
    	  //  ix=img.width * 3 / 4;
    	  //  iy=img.height * 3 / 4;
       // }
       // if (img.height > 700) {
    	  //  ix=img.width * 3 / 4;
    	  //  iy=img.height * 3 / 4;
       // }
       var iX=img.width,iY=img.height;
       var iy;
       var ix;
       if(iX/iY > 2) {
          // iy = window_h * 1/5;
          ix = window_w * 3/5;
          iy = (ix * iY)/iX;
       }else {
          iy = window_h * 4/5;
          ix = (iy * iX)/iY; 
       }  
       var sx=document.documentElement.clientWidth,sy=window.innerHeight||document.documentElement.clientHeight;
       if(iy>sy||ix>sx){
           var yy=sy-100;
           var xx=(ix/iy)*yy;
       }else{
           var xx=ix+4;
           var yy=iy+3;
       }
       img.style.width=xx-4+'px';
       img.style.height=yy-3+'px';
       if(ix<sx&&iy<sy) {
    	   tagImg.alt="";closeTag.innerHTML=closesHtml;
       }
       var maxTime=setInterval(function(){
     temp+=35;
     if((tx+temp)<xx){
      tagImg.style.width=(tx+temp)+"px";
      tagImg.style.left=(sx-(tx+temp))/2+"px";
     }else{
      Stop1=true;
      tagImg.style.width=xx+"px";
      tagImg.style.left=(sx-xx)/2+"px";
     }
     if((ty+temp)<yy){
      tagImg.style.height=(ty+temp)+"px";
      // tagImg.style.top=100+"px";
      tagImg.style.top=(window_h-iy)/2+"px";
     }else{
      Stop2=true;
      tagImg.style.height=yy+"px";
      tagImg.style.top=(window_h-iy)/2+"px";
     }
     if(Stop1&&Stop2){
      clearInterval(maxTime);
      tagImg.appendChild(img);
      temp=0;
      imgOPacity();
     }
    },1);
    function imgOPacity(){
     temp+=10;
     img.style.filter="alpha(opacity="+temp+")";
     img.style.opacity=temp/100;
     imgTime=setTimeout(imgOPacity,1)
     if(temp>100) clearTimeout(imgTime);
    }
    tagImg.innerHTML="";
    tagImg.appendChild(closeTag);
     
    if(ix>xx||iy>yy){
     // img.alt="左键拖动,双击放大缩小";
     img.ondblclick=function (){
      if(tagImg.offsetWidth<img.offsetWidth||tagImg.offsetHeight<img.offsetHeight){
       img.style.width="auto";
       img.style.height="100%";
       // img.alt="双击可以放大";
       img.onmousedown=null;
       closeTag.style.top="10px";
       closeTag.style.left="10px";
       tagImg.style.overflow="visible";
       tagImg.style.width=img.offsetWidth+"px";
       tagImg.style.left=((sx-img.offsetWidth)/2)+"px";
      }else{
       img.style.width=ix+"px";
       img.style.height=iy+"px";
       // img.alt="双击可以缩小";
       img.onmousedown=dragDown;
       tagImg.style.overflow="auto";
       tagImg.style.width=(ix<sx-100?ix+20:sx-100)+"px";
       tagImg.style.left=((sx-(ix<sx-100?ix+20:sx-100))/2)+"px";
      }
     }
     img.onmousedown=dragDown;
     tagImg.onmousemove=barHidden;
     tagImg.onmouseout=moveStop;
     document.onmouseup=moveStop;
    }else{
     tagImg.style.overflow="visible";
     tagImg.onmousemove=barHidden;
    }
   }
   function dragDown(a){
    img.style.cursor="move";
    var evts=a||window.event;
    var onx=evts.clientX,ony=evts.clientY;
    var sox=tagImg.scrollLeft,soy=tagImg.scrollTop;
    var sow=img.width+2-tagImg.clientWidth,soh=img.height+2-tagImg.clientHeight;
    var xxleft,yytop;
    document.onmousemove=function(e){
     var evt=e||window.event;
     xxleft=sox-(evt.clientX-onx)<0?"0":sox-(evt.clientX-onx)>sow?sow:sox-(evt.clientX-onx);
     yytop=soy-(evt.clientY-ony)<0?"0":soy-(evt.clientY-ony)>soh?soh:soy-(evt.clientY-ony);
     tagImg.scrollTop=yytop;
     tagImg.scrollLeft=xxleft;
     closeTag.style.top=(yytop+10)+"px";
     closeTag.style.left=(xxleft+10)+"px";
     return false;
    }
    return false;
   }
   function barHidden(){
    clearTimeout(barShow);
    // 修改closeTag的top值；
    closeTag.style.top=-10;
    closeTag.style.right=(tagImg.scrollRight+10)+"px";
    if(closeTag.style.display=="none")closeTag.style.display="block";
    barShow=setTimeout(function(){closeTag.style.display="block";},1000);
   }
   function closes(e){
    document.body.removeChild(tag);
    document.body.removeChild(tagImg);
     document.documentElement.style.overflow='auto';
    clearTimeout(barShow);
    clearTimeout(imgTime);
    document.onmouseup=null;
    tag=img=tagImg=closeTag=null;
    e.stopPropagation();

   }
   function moveStop(){
    document.onmousemove=null;
    tagImg.onmousemove=barHidden;
    img.style.cursor="pointer";
   }
}