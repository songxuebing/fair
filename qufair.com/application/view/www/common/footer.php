<!--底部-->

<div class="mm_footer">
    <span>
        <a href="/about/index/id/1">关于我们</a>
        <a href="/about/index/id/2">联系我们</a>
        <a href="/about/index/id/3">友情链接</a>
        <a href="/about/index/id/4">帮助中心</a>
        <a href="/about/index/id/5">意见反馈</a>
        <a href="/about/index/id/6">高薪聘请</a>
        <a href="/about/index/id/7">法律声明</a>
    </span>
        <p>&copy; <?php echo date('Y');?> 
去展网-国际展会信息平台，提供国际展会展览一站式服务。提供最全面的2016展会报道和国外展会资讯，为您参展选展提供一站式便捷服务
</p>
	<p>去展互联网展会领导者 浙ICP备15027784号</p>
    <div><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_footer_img.jpg"></div>
</div>

<!--<link href="<?php echo STYLE_URL;?>/style/quzhan/css/kefu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/service.js"></script>-->

<script type="text/javascript">
	jQuery(document).ready(function(){
		CommonJs.AjaxLive();
	});
	function artDialog(msg,ico,fun){
		var dialog = art.dialog({
			title: '提示',
			content: msg,
			fixed:true,
			lock:true,
			opacity:0.3,
			icon: ico,
			cancel:false,
			ok:function(){
				eval(fun);
			}
		});
	}	
</script>
<!--
<script>var _hmt = _hmt || [];(function() {  var hm = document.createElement("script");  hm.src = "//hm.baidu.com/hm.js?388a4cedffa7c7c6cf67bd1a0d642471";  var s = document.getElementsByTagName("script")[0];   s.parentNode.insertBefore(hm, s);})();</script>
-->
</body>
</html>
