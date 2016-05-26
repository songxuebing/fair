<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
<div class="clear_15px"></div>
<div class="table_div_05"><span class="float_left"><a href="#">用户组管理</a>&nbsp;&gt;&nbsp;<a href="#">权限编辑</a></span><span class="float_right">
  </span></div>
<div class="clear_15px"></div>
<div class="table_div_05" style="height:auto; background:none; line-height:22px; padding-top:10px;">
<form action="/group/index/" method="post" name="role" class="AjaxForm" autocomplete="off">
<?php
	foreach($this->data as $k=>$v){
?>
  <?php echo $v['sort']<=1 ? '<p>' :'';?>&nbsp;&nbsp;<?php echo $v['html'];?><input name="role[]" type="checkbox" id="role" value="<?php echo $v['id'];?>" <?php if(!empty($this->role)) echo in_array($v['id'],$this->role) ? ' checked="checked"' : '';?>>
  &nbsp;<span style="<?php echo $v['sort']==0 ? 'font-weight:bold;font-size:14px;color:#CC0000' :'';?><?php echo $v['sort']==1 ? 'font-weight:bold;' :'';?>"><?php echo $v['name'];?></span><?php echo $v['sort']<=1 ? '</p>' :'';?>
<?php	
	}
?>
<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo $this->id;?>">
<input type="hidden" name="option" value="role_submit">
<input type="hidden" name="yesfn" value="alert('保存成功');window.location.reload();">
<input type="hidden" name="nofn" value="nofunction()">
<input type="hidden" name="beforefn" value="beforefunction()">
<div align="center" style="padding-top:20px; padding-bottom:10px;"><input type="submit" name="Submit" value="保存" class="btn_03"></div>
</form>
</div>
<script type="text/javascript">
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('保存');
	}
</script>
<?php include $this->Render('footer.php'); ?>
