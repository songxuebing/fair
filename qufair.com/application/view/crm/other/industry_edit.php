<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/other/industry/" method="post" name="pos" class="AjaxForm pos" autocomplete="off">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">行业名称：</td>
    <td style=" padding-top:5px; padding-bottom:5px;"><input name="name" type="text" style="width:300px;" value="<?php echo($this->data['name']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td width="160" height="45" align="right">所属行业：</td>
    <td width="440">
		<select name="parent_id">
			<option value="0">所属行业</option>
			<?php
				if(!empty($this->parent)) foreach($this->parent as $k=>$v){
					$select = $v['id'] == $this->data['parent_id'] ? ' selected="selected"' : '';
					echo '<option value="'.$v['id'].'"'.$select.'>'.$v['name'].'</option>';
                    if(!empty($v['next'])) foreach($v['next'] as $k=>$val){
                        $select = $val['id'] == $this->data['parent_id'] ? ' selected="selected"' : '';
                        echo '<option value="'.$val['id'].'"'.$select.'>&nbsp;&nbsp;'.$val['name'].'</option>';
                    }
				}
			?>
		</select>
	</td>
  </tr>
    <tr>
        <td height="45" align="right">英文名称：</td>
        <td style=" padding-top:5px; padding-bottom:5px;"><input name="name_en" type="text" style="width:300px;" value="<?php echo($this->data['name_en']);?>" class="input_01"></td>
    </tr>
    <tr>
        <td height="45" align="right">网站title：</td>
        <td style=" padding-top:5px; padding-bottom:5px;"><input name="title" type="text" style="width:300px;" value="<?php echo($this->data['title']);?>" class="input_01"></td>
    </tr>
    <tr>
        <td height="45" align="right">网站keywords：</td>
        <td style=" padding-top:5px; padding-bottom:5px;"><input name="keywords" type="text" style="width:300px;" value="<?php echo($this->data['keywords']);?>" class="input_01"></td>
    </tr>
    <tr>
        <td height="45" align="right">网站description：</td>
        <td style=" padding-top:5px; padding-bottom:5px;"><input name="description" type="text" style="width:300px;" value="<?php echo($this->data['description']);?>" class="input_01"></td>
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