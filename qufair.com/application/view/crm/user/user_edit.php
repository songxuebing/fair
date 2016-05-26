<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<body class="font_14px">
<form action="/user/index/" method="post" name="brand" class="AjaxForm">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">用户名称：</td>
    <td align="left"><input name="username" type="text" id="username" value="<?php echo(empty($this->data['username']) ? '' : $this->data['username']);?>" class="input_01" <?php echo $this->id>0 ? 'readonly="readonly"' : '';?>></td>
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
    <td height="45" align="right">用户组：</td>
    <td align="left">
	<select name="group" id="group">
		<option value="0">不设用户组</option>
		<?php
			$select='';
			foreach($this->group as $k=>$v){
				$select=$v['id']==$this->data['group'] ? ' selected' : '';
				echo '<option value="'.$v['id'].'"'.$select.'>'.$v['name'].'</option>';
			}
		?>
    </select>
    </td>
  </tr>
  <tr>
    <td height="45" align="right">星级：</td>
    <td align="left">
	<select name="rating_number" id="rating_number">
		<option <?php echo $this->data['rating_number'] == 1 ? 'selected' : '';?> value="1">一星级</option>
        <option <?php echo $this->data['rating_number'] == 2 ? 'selected' : '';?> value="2">二星级</option>
        <option <?php echo $this->data['rating_number'] == 3 ? 'selected' : '';?> value="3">三星级</option>
        <option <?php echo $this->data['rating_number'] == 4 ? 'selected' : '';?> value="4">四星级</option>
        <option <?php echo $this->data['rating_number'] == 5 ? 'selected' : '';?> value="5">五星级</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="45" align="right">标签：</td>
    <td align="left">
	<?php
        	if(!empty($this->tag_all)) foreach($this->tag_all as $key => $val){
		?>
    	<label><input type="checkbox" <?php echo $val['chk'] == true ? 'checked' : '';?> name="tag[]" value="<?php echo $val['ctag_id'];?>" style="vertical-align:sub;" />&nbsp;<?php echo $val['ctag_name'];?></label>&nbsp;&nbsp;
       <?php
			}
	   ?>
    </td>
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