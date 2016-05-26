<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/supplier/cert/" method="post" name="brand" class="AjaxForm brand" autocomplete="off">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;打款金额：</td>
    <td width="359"><input name="money" type="text" style="width:140px;" value="0" class="input_01"></td>
  </tr>
  
  <tr>
    <td width="241" height="45"></td>
    <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
  </tr>
</table>

<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo empty($this->id) ? 0 : $this->id;?>">
<input type="hidden" name="option" value="moneysubmit">
<input type="hidden" name="yesfn" value="alert('保存成功');parent.frames['iframe'].frames['mainFrame'].location.reload();">
<input type="hidden" name="nofn" value="nofunction()">
<input type="hidden" name="beforefn" value="beforefunction()">
</form>
<script type="text/javascript">
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('保存');
	}
	
</script>
<?php include $this->Render('footer.php'); ?>