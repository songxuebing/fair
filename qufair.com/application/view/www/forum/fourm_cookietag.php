<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name="robots" content="nofollow" />
<title>设置标签</title>
<link href="<?php echo STYLE_URL;?>/style/quzhan/css/common.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/common/common.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
</head>
<style type="text/css">
* {
	margin:0;
	padding:0;
}
</style>
<body class="font_14px">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">标签：</td>
    <td align="left"><input name="tag" type="text" id="tag" style="width:300px;" value="" class="input_01"></td>
  </tr>
  <tr>
  	<td></td>
    <td>(多个标签用空格隔开)</td>
  </tr>
  
  <tr>
    <td width="31%" height="45" align="right">&nbsp;</td>
    <td width="69%" align="left"><input type="button" name="Submit" value="保存" class="btn_03 J-btn-03"></td>
  </tr>
</table>
<input type="hidden" name="ajax" value="1">
<script type="text/javascript">
	jQuery(document).ready(function(e) {
        var tag = jQuery(window.parent.document).find("#mytag").val();
		jQuery("#tag").val(tag);
		
		
		jQuery(".J-btn-03").on('click',function(){
			var tag = jQuery("#tag").val();	
			var tagArr = tag.split(" ");
			if(tagArr !=""){
				var html="";
				for(var i in tagArr){
					
					html+='<li>';
					html+='	<em class="J-del-tag"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_close_02.png" /></em><a href="/forum/index/tagname/'+tagArr[i]+'">'+tagArr[i]+'</a>';
					html+='</li>';
					
				}
				jQuery(window.parent.document).find(".J-my-tag-box").html(html);	
			}

			jQuery(window.parent.document).find("#mytag").val(tag);
			
			setCookieMin('tag',tag,60);
			
			art.dialog.close();
		});

		jQuery("#tag").val(getCookie(tag));
		
    });
	
	/**
	 * cookie保存分钟
	 * @param name
	 * @param value
	 * @param min 分钟
	 */
	function setCookieMin(name,value,min){
		var exp= new Date();
		exp.setTime(exp.getTime() +min*60*1000);
		document.cookie = name +"="+ escape (value) + ";expires=" + exp.toGMTString();
		//location.href = "Read.htm";//接收页面.
	}
	function getCookie(name)
	{
		var arr =document.cookie.match(new RegExp("(^|)"+name+"=([^;]*)(;|$)"));
		if(arr !=null) return unescape(arr[2]); return "";
	}
	function deleteCookie(name){ 
		var date=new Date(); 
		date.setTime(date.getTime()-10000); 
		document.cookie=name+"=''; expires="+date.toGMTString(); 
	};

</script>
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
<?php die();?>