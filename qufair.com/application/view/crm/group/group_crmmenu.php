<?php include $this->Render('header.php'); ?>

<body class="font_14px">
<div class="clear_15px"></div>
<div class="table_div_05"><span class="float_left"><a href="#">用户组管理</a>&nbsp;&gt;&nbsp;<a href="#">CRM顶部菜单编辑</a></span><span class="float_right">
  </span></div>
<div class="clear_15px"></div>
<div class="table_div_05" style="height:auto; background:none; line-height:22px; padding-top:10px;">
<form action="/group/index/" method="post" name="role" class="AjaxForm" autocomplete="off">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
    <tr>
      <td width="45%" height="350" align="right" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="35" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="234"><select name="source_select" size="20" multiple="multiple" style="width:100%; height:300px;" class="input_box_05">
                <?php
				if(!empty($this->group_menu)) foreach($this->group_menu as $k=>$v){
					echo('<option value="'.$v['id'].'">'.$v['name'].'</option>');
				}
			?>
            </select></td>
          </tr>
      </table></td>
      <td width="40" align="center" style="padding-left:8px;"><p><a href="javascript:void(0);" onClick="javascript:append();" class="btn_05">&gt;</a></p>
          <p><a href="javascript:void(0)" onClick="javascript:removepend();" class="btn_05">&lt;</a></p></td>
      <td align="left" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="35">选中的才能保存，多选请按住ctrl</td>
          </tr>
          <tr>
            <td height="234">
			<select name="menu_select[]" id="menu_select" size="20" multiple="multiple" style="width:100%; height:300px;" class="input_box_05">
            	<?php
					foreach($this->menu_select as $k=>$v){
						echo('<option value="'.$v['id'].'" selected>'.$v['name'].'</option>');
					}
				?>
			</select>
			</td>
          </tr>
      </table></td>
    </tr>
  </table>
<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo $this->id;?>">
<input type="hidden" name="option" value="crmmenu_submit">
<input type="hidden" name="yesfn" value="alert('保存成功');window.location.reload();">
<input type="hidden" name="nofn" value="nofunction()">
<input type="hidden" name="beforefn" value="beforefunction()">
<div align="center" style="padding-top:20px; padding-bottom:10px;"><input type="submit" name="Submit" value="保存" class="btn_03"></div>
</form>
</div>
<script type="text/javascript">
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('保存');
	}
	function append(){
		jQuery('select[name=source_select] option:selected').appendTo('#menu_select');	
	}
	function removepend(){
		jQuery('#menu_select option:selected').appendTo('select[name=source_select]');
	}
	
</script>
<?php include $this->Render('footer.php'); ?>
