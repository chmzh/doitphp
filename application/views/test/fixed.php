
<html>
<head>
<title>位置固定(</title>
<script src="/assets/jquery/jquery-3.1.1.min.js"></script>

<style type="text/css">
.fixed_div {
	position: fixed;
	left: 200px;
	bottom: 20px;
	width: 400px;
}
</style>
<script type="text/javascript">
$(function(){
//获取要定位元素距离浏览器顶部的距离
var navH = $(".nav").offset().top;

//滚动条事件
$(window).scroll(function(){
//获取滚动条的滑动距离
var scroH = $(this).scrollTop();
//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
if(scroH>=navH){
$(".nav").css({"position":"fixed","top":0});
}else if(scroH<navH){
$(".nav").css({"position":"static"});
}
})
})
</script>
</head>
<body>
	<div class="top">top</div>
	<p></p>
	<hr>
	<div class="nav">topnav</div>

	<div class="fixed_div" style="border: 1px solid #200888;">content, I'm
		content</div>
	<div style="height: 8888px;"></div>
</body>
</html>
