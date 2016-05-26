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
<form action="/article/index/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;文章标题：</td>
    <td><input name="title" type="text" id="" style="width:440px;" value="<?php echo($this->data['title']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;文章分类：</td>
    <td>
    	<select name="cat_id">
        	<?php 
				foreach($this->dataCat as $v){
			?>
        	<option value="<?php echo $v['cat_id'];?>" <?php if($v['cat_id'] == $this->data['cat_id']){ echo('selected');} ?>><?php echo $v['cat_name'];?></option>
            <?php
				}
			?>
        </select>
    </td>
  </tr>
  <tr>
    <td height="45" align="right">文章作者：</td>
    <td><input name="author" type="text" id="author" style="width:150px;" value="<?php echo($this->data['author']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;E-mail：</td>
    <td><input name="author_email" type="text" id="author_email" style="width:200px;" value="<?php echo($this->data['author_email']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">&nbsp;&nbsp;阅读数：</td>
    <td><input name="clicks" type="text" id="clicks" style="width:50px;" value="<?php echo empty($this->data['clicks']) ? 0 : $this->data['clicks'];?>" class="input_01"></td>
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
    <td width="150" height="45" align="right">&nbsp;&nbsp;文章内容：</td>
    <td>
      	<textarea name="content" style="width:99%; height:300px;display:none"><?php echo($this->data['content']);?></textarea>
      </td>
  </tr>
  <tr>
    <td height="45" align="right">&nbsp;关键词：</td>
    <td><input name="keywords" type="text" id="keywords" style="width:440px;" value="<?php echo($this->data['keywords']);?>" class="input_01"></td>
  </tr>
  
  <tr>
    <td width="91" height="45"></td>
    <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
  </tr>
</table>

<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo $this->id;?>">
<input type="hidden" name="option" value="submit">
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
	
</script>
<?php include $this->Render('footer.php'); ?>