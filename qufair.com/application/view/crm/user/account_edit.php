<?php include $this->Render('header.php'); ?>
<body class="font_14px">
<form action="/user/account/" method="post" name="brand" class="AjaxForm" autocomplete="off">
<div class="clear_15px"></div>
<div class="table_div_05"><span class="float_left"><a href="#">用户管理</a>&nbsp;&gt;&nbsp;<a href="#">个人资料管理</a></span></div>
<div class="table_div_02">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">员工姓名：</td>
    <td align="left"><?php echo($this->data['username']);?></td>
  </tr>
  <tr>
    <td height="45" align="right">登陆密码：</td>
    <td align="left"><input name="password" type="password" id="password" value="" class="input_01">
    <?php if($this->id>0){echo('&nbsp;不修改请留空');}?></td>
  </tr>
  <tr>
    <td height="45" align="right">手机号码：</td>
    <td align="left"><input name="mobile" type="text" id="mobile" value="<?php echo(empty($this->data['mobile']) ? '' : $this->data['mobile']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">邮箱地址：</td>
    <td align="left"><input name="email" type="text" id="email" value="<?php echo(empty($this->data['email']) ? '' : $this->data['email']);?>" class="input_01"></td>
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