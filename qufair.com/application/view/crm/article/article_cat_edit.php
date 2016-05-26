<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/article/cat/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">分类名称：</td>
    <td align="left"><input name="cat_name" type="text" id="cat_name" value="<?php echo(empty($this->data['cat_name']) ? '' : $this->data['cat_name']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">上级分类：</td>
    <td align="left"><select name="parent_id" id="parent_id">
		<option value="0">顶级分类</option>
		<?php
			foreach($this->category as $key=>$value){
				$select=$value['cat_id']==$this->data['parent_id'] ? ' selected' : '';
				echo('<option value="'.$value['cat_id'].'"'.$select.'>'.$value['html'].$value['cat_name'].'</option>');
			}
		?>
    </select>
    </td>
  </tr>
  <tr>
    <td height="45" align="right">分类排序：</td>
    <td align="left"><input name="sort_order" type="text" id="sort_order" value="<?php echo(empty($this->data['sort_order']) ? 0 : $this->data['sort_order']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">是否显示：</td>
    <td align="left">
    	<?php
        	if(empty($this->data['is_open'])){
		?>
        	<input name="is_open" type="radio" value="1" checked="checked">
            显示&nbsp;&nbsp;
              <input type="radio" name="is_open" value="0" >
              关闭
        
        <?php
			}else{
		?>
            <input name="is_open" type="radio" value="1" <?php echo(empty($this->data['is_open']) || $this->data['is_open']==1 ? 'checked="checked"' : '');?>>
        显示&nbsp;&nbsp;
          <input type="radio" name="is_open" value="0" <?php echo($this->data['is_open']==0 ? 'checked="checked"' : '');?>>
          关闭
      <?php
			}
	  ?>
        
      
      </td>
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