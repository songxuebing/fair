<?php include $this->Render('header.php'); ?>
<body class="font_14px">
<form action="/convention/index/" method="post" enctype="multipart/form-data" class="AjaxForm" autocomplete="off">
    <table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td height="45" align="right">展会信息文件：</td>
        <td align="left"><input type="file" name="file" id="file"></td>
      </tr>
      <tr>
        <td width="26%" height="45" align="right">&nbsp;</td>
        <td width="74%" align="left"><input type="submit" name="Submit" value="保存" class="btn_03"></td>
      </tr>
    </table>
	
    <input type="hidden" name="ajax" value="1">
    <input type="hidden" name="option" value="exceldetail">
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