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
</body>
</html>