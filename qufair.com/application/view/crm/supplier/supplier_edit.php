<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/supplier/index/" method="post" name="supplier" class="AjaxForm supplier" autocomplete="off">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;类型名称：</td>
    <td><input name="type_name" type="text" style="width:300px;" value="<?php echo($this->data['type_name']);?>" class="input_01"></td>
  </tr>
  
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;是否开启：</td>
    <td>
      <input type="radio" name="is_open" value="1" id="RadioGroup1_0"<?php echo $this->data['is_open'] == 1 ? ' checked="checked"' : '';?>> 
      开启
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="is_open" value="0" id="RadioGroup1_1"<?php echo $this->data['is_open'] == 0 ? ' checked="checked"' : '';?>> 
      不开启      
      </td>
  </tr>
  
  <tr>
    <td width="160" height="45" align="right">&nbsp;&nbsp;描述：</td>
    <td width="440" style=" padding-top:5px; padding-bottom:5px;">
      <textarea name="type_msg" rows="5" class="input_02" id="type_msg" style="width:300px; height:50px;"><?php echo($this->data['type_msg']);?></textarea>
      </td>
  </tr>
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;认证费：</td>
    <td><input name="cost" type="text" style="width:100px;" value="<?php echo($this->data['cost']);?>" class="input_01"></td>
  </tr>
  
  <tr>
    <td width="160" height="45"></td>
    <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
  </tr>
</table>

<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo empty($this->id) ? 0 : $this->id;?>">
<input type="hidden" name="filebox" value="">
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