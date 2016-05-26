<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]',{
			uploadJson : '/public/ueditor/',
			allowFileManager : false,
			afterBlur: function () { this.sync(); },
			items : [
				'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
				'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
				'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
				'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
				'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
				'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
				'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
				'anchor', 'link', 'unlink', '|', 'about'
			],
		});
});
</script>

<body class="font_14px">
<form action="/forum/index/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;资讯标题：</td>
    <td><input name="title" type="text" id="" style="width:440px;" value="<?php echo($this->data['title']);?>" class="input_01"></td>
  </tr>
  <!--
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;所属版块：</td>
    <td>
    	<select name="cat_id">
			<?php
				if(!empty($this->cat_all)) foreach($this->cat_all as $k=>$v){
					echo '<optgroup label="'.$v['name'].'">';
						if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
							$select = $val['id'] == $this->data['cat_id'] ? ' selected="selected"' : '';
							echo '<option value="'.$val['id'].'"'.$select.'>'.$val['name'].'</option>';
						}
					echo '</optgroup>';
				}
			?>
        </select>    </td>
  </tr>
  -->
  <tr>
    <td width="150" height="45" align="right">&nbsp;&nbsp;资讯内容：</td>
    <td>
      	<textarea name="content" style="width:99%; height:300px;display:none"><?php echo($this->data['content']);?></textarea>      </td>
  </tr>
  <tr>
    <td height="45" align="right">封面上传：</td>
    <td>
      <input type="file" class="J-imgfile" name="image_file" />    </td>
  </tr>
  <tr>
    <td height="45" align="right">封面地址：</td>
    <td>
      <input name="file" type="text" style="width:300px;" value="<?php echo($this->data['cover']);?>" class="input_01">    </td>
  </tr>
  <tr>
    <td height="45" align="right">热门资讯：</td>
    <td><label><input name="recommend" type="checkbox" id="recommend" value="1" <?php echo($this->data['recommend'] == 1) ? 'checked="checked"' : '';?>>
      &nbsp;勾选则为热门</label></td>
  </tr>
  <tr>
  	<td height="45" align="right">标签：</td>
    <td>
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
    <td width="91" height="45"></td>
    <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
  </tr>
</table>

<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo $this->id;?>">
<input type="hidden" name="option" value="submit">
<input type="hidden" name="filebox" value="">
<input type="hidden" name="yesfn" value="alert('保存成功');window.location.reload();">
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
	jQuery(document).ready(function(){
		jQuery(".J-imgfile").on('change',function(){
			var $this = jQuery(this);
			var $attach_path = '<?php echo ATTACH_IMAGE;?>';
			var dialog = art.dialog({
				title: '提示',
				content: '上传中，请稍候',
				fixed:true,
				lock:true,
				cancel:false,
				id:'upinfo'
			});
			//
			jQuery('input[name="option"]').val('uploadimg');
			jQuery('input[name="filebox"]').val($this.attr('name'));
			jQuery(".brand").ajaxSubmit({
				dataType: "json",
				beforeSubmit:function(){},
				success:function(data){
					jQuery("input[name=option]").val('submit');
					art.dialog({id:'upinfo'}).close();
					if(data.success==true){
						jQuery("input[name='file']").val($attach_path + data.msg);
					}else{
						artDialog(data.msg,'error','');
					}
				}
			});
			
			
		});
		
		jQuery(".J-submit").on('click',function(){
			jQuery('input[name="option"]').val('submit');	
		});
	});
</script>
<?php include $this->Render('footer.php'); ?>