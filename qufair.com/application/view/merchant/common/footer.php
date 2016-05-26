<!--底部-->
<div class="mm_footer">
    <p>&copy; <?php echo date('Y');?> qufair.com 去展互联网展会领导者 保留所有权利</p>
    <p>去展互联网展会领导者 浙ICP备15027784号</p>
    <div><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/mm_footer_img.jpg"></div>
</div>
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
<div style="display:none"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256286292'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1256286292' type='text/javascript'%3E%3C/script%3E"));</script></div>

<script>var _hmt = _hmt || [];(function() {  var hm = document.createElement("script");  hm.src = "//hm.baidu.com/hm.js?388a4cedffa7c7c6cf67bd1a0d642471";  var s = document.getElementsByTagName("script")[0];   s.parentNode.insertBefore(hm, s);})();</script>
</body>
</html>