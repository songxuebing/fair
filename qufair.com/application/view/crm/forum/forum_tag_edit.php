<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/forum/tag/" method="post" name="pos" class="AjaxForm pos" autocomplete="off" enctype="multipart/form-data">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">标签名称：</td>
    <td style=" padding-top:5px; padding-bottom:5px;"><input name="name" type="text" style="width:300px;" value="<?php echo($this->data['ctag_name']);?>" class="input_01"></td>
  </tr>

  <tr>
    <td height="45" align="right">&nbsp;&nbsp;是否显示：</td>
    <td>
    	<?php
        	if(empty($this->data['is_open'])){
		?>
        <input type="radio" name="RadioGroup" checked value="1" id="RadioGroup1_0"> <label for="RadioGroup1_0">显示</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="RadioGroup" value="0" id="RadioGroup1_1"> <label for="RadioGroup1_1">不显示</label>
        <?php 
			}else{ 
		?>
        <input type="radio" name="RadioGroup" <?php if($this->data['is_open'] == 1){ echo('checked');}?> value="1" id="RadioGroup1_0"> <label for="RadioGroup1_0">显示</label>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="RadioGroup" <?php if($this->data['is_open'] == 0){ echo('checked');}?> value="0" id="RadioGroup1_1"> <label for="RadioGroup1_1">不显示</label>
        <?php
			}
		?>
        
    </td>
  </tr>
  
  <tr>
  	<td height="45" align="right">&nbsp;&nbsp;排序：</td>
    <td>
    	<input name="sort" type="text" id="" value="<?php echo empty($this->data['sort']) ? 10 : $this->data['sort'];?>" class="input_01">(<font color="#FF0000">数字越大越靠后</font>)
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