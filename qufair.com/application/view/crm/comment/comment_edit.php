<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/comment/index/" method="post" name="supplier" class="AjaxForm supplier" autocomplete="off">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td width="160" height="45" align="right">&nbsp;&nbsp;内容：</td>
    <td width="440" style=" padding-top:5px; padding-bottom:5px;">
      <textarea name="message" rows="5" class="input_02" id="message" style="width:300px; height:50px;"><?php echo($this->data['message']);?></textarea>
      </td>
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