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
    <td align="left">
    	
        <input name="tag" type="text" id="tag" style="width:300px;" value="<?php echo(empty($this->data['tag_name']) ? '' : $this->data['tag_name']);?>" class="input_01">
    </td>
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
					html+='<dd>';
					html+='	<a style="float:none; position:absolute; top:-21px; right:-4px;" href="javascript:;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_close_02.png" /></a>';
					html+='	<em>'+tagArr[i]+'</em>';
					html+='</dd>';	
				}
				jQuery(window.parent.document).find(".J-my-tag-box").html(html);	
			}

			jQuery(window.parent.document).find("#mytag").val(tag);
			art.dialog.close();
		});
    });
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