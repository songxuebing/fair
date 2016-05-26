<?php include $this->Render('header.php'); ?>
<body class="font_14px">
<form action="/group/index/" method="post" name="brand" class="AjaxForm">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">用户组名称：</td>
    <td align="left"><input name="name" type="text" id="name" value="<?php echo(empty($this->data['name']) ? '' : $this->data['name']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">用户组简称：</td>
    <td align="left"><input name="abbreviation" type="text" id="abbreviation" value="<?php echo(empty($this->data['abbreviation']) ? '' : $this->data['abbreviation']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">用户组编码：</td>
    <td align="left"><input name="key" type="text" id="key" value="<?php echo(empty($this->data['key']) ? '' : $this->data['key']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td width="26%" height="45" align="right">&nbsp;</td>
    <td width="74%" align="left"><input type="submit" name="Submit" value="保存" class="btn_03"></td>
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