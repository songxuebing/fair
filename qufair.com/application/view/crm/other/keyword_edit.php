<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<body class="font_14px">
<form action="/other/keyword/" method="post" name="brand" class="AjaxForm">
<table width="582" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">关键词：</td>
    <td align="left"><input name="keyword" type="text" id="keyword" value="<?php echo $this->data['keyword'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">排序：</td>
    <td align="left"><input name="sort" type="text" id="sort" value="<?php echo empty($this->data['sort']) ? 0 : $this->data['sort'];?>" class="input_01">(<font color="red">数值越大越靠前</font>)</td>
  </tr>
  
  <tr>
    <td width="31%" height="45" align="right">&nbsp;</td>
    <td width="69%" align="left"><input type="submit" name="Submit" value="保存" class="btn_03"></td>
  </tr>
</table>
<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo $this->id;?>">
<input type="hidden" name="option" value="submit">
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