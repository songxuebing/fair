<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/other/link/" method="post" name="pos" class="AjaxForm pos" autocomplete="off">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">链接名称：</td>
    <td style=" padding-top:5px; padding-bottom:5px;"><input name="title" type="text" style="width:300px;" value="<?php echo($this->data['title']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td width="160" height="45" align="right">&nbsp;&nbsp;链接地址：</td>
    <td width="440"><input name="url" type="text" style="width:300px;" value="<?php echo empty($this->data['url']) ? 'http://' : $this->data['url'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">链接说明：</td>
    <td style="padding-top:5px; padding-bottom:5px;">
      <textarea name="remarks" rows="5" class="input_02" id="remarks" style="width:300px; height:50px;"><?php echo($this->data['remarks']);?></textarea>
    </td>
  </tr>
<tr>
    <td height="45" align="right">链接页面：</td>
    <td style=" padding-top:5px; padding-bottom:5px;">
        <?php $select = "selected = 'selected'";?>
            <select name="type">
                <option value="">请选择</option>
                <option value="0" <?php if($this->data['type'] == "0"){echo $select;}?>>首页</option>
                <option value="1" <?php if($this->data['type'] == "1"){echo $select;}?> >热门展会</option>
                <option value="2" <?php if($this->data['type'] == "2"){echo $select;}?>>行程预定</option>
                <option value="3" <?php if($this->data['type'] == "3"){echo $select;}?>>国际签证</option>
                <option value="4" <?php if($this->data['type'] == "4"){echo $select;}?>>国际物流</option>
                <option value="5" <?php if($this->data['type'] == "5"){echo $select;}?>>特装服务</option>
                <option value="6" <?php if($this->data['type'] == "6"){echo $select;}?>>新闻资讯</option>
            </select> 
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
