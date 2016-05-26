<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="nofollow" />
<meta  name="robots"  content="NOODP">
<title>后台管理系统</title>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/common/common.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<link href="<?php echo STYLE_URL;?>/style/quzhan/css/common.css" type="text/css" rel="stylesheet">
<style>
* { padding:0; margin:0; }
html, body { height:100%; border:none 0; }
#iframe { width:100%; height:100%; border:none 0; }
.aui_main{
	text-align:left;
}
</style>
</head>

<body>
<iframe id="iframe" name="iframe" src="/index/main/"></iframe>
<script type="text/javascript">
	//
	artDialog.notice = function (options) {
		var opt = options || {},
			api, aConfig, hide, wrap, top,
			duration = 800;
			
		var config = {
			id: 'Notice',
			left: '100%',
			top: '100%',
			fixed: true,
			drag: false,
			resize: false,
			follow: null,
			lock: false,
			init: function(here){
				api = this;
				aConfig = api.config;
				wrap = api.DOM.wrap;
				top = parseInt(wrap[0].style.top);
				hide = top + wrap[0].offsetHeight;
				
				wrap.css('top', hide + 'px')
					.animate({top: top + 'px'}, duration, function () {
						opt.init && opt.init.call(api, here);
					});
			},
			close: function(here){
				wrap.animate({top: hide + 'px'}, duration, function () {
					opt.close && opt.close.call(this, here);
					aConfig.close = $.noop;
					api.close();
				});
				
				return false;
			}
		};	
		
		for (var i in opt) {
			if (config[i] === undefined) config[i] = opt[i];
		};
		
		return artDialog(config);
	};
	
	jQuery(document).ready(function(){
		//get_message();
		//window.setInterval(get_message, 5000);
	});
	function get_message(){
		jQuery.get('/public/index/',{'option':'message'},function(data){
			if(data.flag==1){
				art.dialog.notice({
					title: '系统消息',
					width: 320,// 必须指定一个像素宽度值或者百分比，否则浏览器窗口改变可能导致artDialog收缩
					content: data.content,
					icon: 'warning',
					time: 0
				});
			}
		},'json');
	}
	jQuery(document).ready(function(){
		art.dialog.notice({
			title: '系统消息',
			width: 320,// 必须指定一个像素宽度值或者百分比，否则浏览器窗口改变可能导致artDialog收缩
			content: '所有打印都需要打印组件支持，如果无法打印请下载 <a href="http://dyhlcdn.duapp.com/style/js/lodop/install_lodop32.rar" target="_blank">打印组件</a>',
			icon: 'warning',
			time: 0
		});
	});
</script>
</body>
</html>
