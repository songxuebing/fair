<?php include $this->Render('header.php'); ?>
<script language="javascript" src="<?php echo STYLE_URL;?>/style/js/lodop/LodopFuncs.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<!--startprint-->
<style type="text/css">
	td,span{
		font-size:13px;
		font-family:"宋体";
		color:#000000;
	}
	td{
		border:1px solid #999999;
	}
	.J-cert{
		width:40px;
		height:40px;
		border:1px solid #CCCCCC;
		padding:2px;
		margin:5px;
	}
</style>

<div id="div1">
<form action="/supplier/cert/" method="post" name="oprate" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
<table width="98%" border="0" cellspacing="0" cellpadding="5" style="margin: 0 auto; margin-top:10px;">
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#EFEFEF"><strong>企业基本资料</strong></td>
    </tr>
  <tr>
    <td width="15%" height="30" align="right" bgcolor="#FFFFFF">企业全称</td>
    <td width="35%" align="left" bgcolor="#FFFFFF"><input name="company_name" class="input_02" type="text" maxlength="50" value="<?php echo $this->data['company_name'];?>" <?php echo !empty($this->data['company_name']) ? 'readonly="readonly"' : '';?>></td>
    <td width="15%" align="right" bgcolor="#FFFFFF">企业法人代表</td>
    <td width="35%" align="left" bgcolor="#FFFFFF"><input type="text" class="input_02" name="company_owner" maxlength="10" value="<?php echo $this->data['company_owner'];?>"></td>
  </tr>
  <!--
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">法人身份证号</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="18" class="input_02" name="owner_cardno" value="<?php echo $this->data['owner_cardno'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">法人手机号码</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="11" class="input_02" name="owner_mobile" value="<?php echo $this->data['owner_mobile'];?>"></td>
  </tr>
  -->
  
  
  <tr>
  <!--
    <td height="30" align="right" bgcolor="#FFFFFF">企业服务</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="50" class="input_02" name="company_service" value="<?php echo $this->data['company_service'];?>"></td>
   --> 
    <td align="right" bgcolor="#FFFFFF">企业电话</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="20" class="input_02" name="company_tel" value="<?php echo $this->data['company_tel'];?>"></td>
    
    <td height="30" align="right" bgcolor="#FFFFFF">运营者手机号码</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="11" class="input_02" name="operate_mobile" value="<?php echo $this->data['operate_mobile'];?>"></td>
  </tr>
  
  
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">营业执照号</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="30" class="input_02" name="company_lice" value="<?php echo $this->data['company_license'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">组织机构代码</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="30" class="input_02" name="company_orgcode" value="<?php echo $this->data['company_orgcode'];?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">税务登记证号</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="30" class="input_02" name="company_regcert" value="<?php echo $this->data['company_regcert'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">企业详细地址</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="50" class="input_02" name="company_address" value="<?php echo $this->data['company_address'];?>"></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#EFEFEF"><strong>企业收款账户</strong></td>
    </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">企业开户名称</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="30" class="input_02" name="bank_comname" value="<?php echo $this->data['bank_comname'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">企业银行账号</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="30" class="input_02" name="bank_account" value="<?php echo $this->data['bank_account'];?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">企业开户银行</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="50" class="input_02" name="bank_name" value="<?php echo $this->data['bank_name'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">开户银行地址</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="50" class="input_02" name="bank_branch" value="<?php echo $this->data['bank_branch'];?>"></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#EFEFEF"><strong>运营者资料</strong></td>
    </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">运营者姓名</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="10" class="input_02" name="operate_name" value="<?php echo $this->data['operate_name'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">运营者部门职位</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="20" class="input_02" name="operate_position" value="<?php echo $this->data['operate_position'];?>"></td>
  </tr>
  <tr>
    <td height="50" align="right" bgcolor="#FFFFFF">企业营业执照</td>
    <td colspan="3" align="left" bgcolor="#FFFFFF">
	<?php
		if(!empty($this->data['operater_cert']['company_license'])){
			echo '<img src="'.Common::AttachUrl($this->data['operater_cert']['company_license']).'" class="J-cert" onclick="window.open(this.src)">';
		}
	?>
    	<input type="file" class="J-imgfile" name="imgFile1" style="position:relative; top:-20px;" >
    	<input type="hidden" value="<?php echo($this->data['operater_cert']['company_license']);?>" name="company_license" >
	</td>
    </tr>
  <tr>
    <td height="50" align="right" bgcolor="#FFFFFF">组织机构代码证</td>
    <td colspan="3" align="left" bgcolor="#FFFFFF">
	<?php
		if(!empty($this->data['operater_cert']['company_orgcert'])){
			echo '<img src="'.Common::AttachUrl($this->data['operater_cert']['company_orgcert']).'" class="J-cert" onclick="window.open(this.src)">';
		}
	?>
    	<input type="file" class="J-imgfile" name="imgFile1" style="position:relative; top:-20px;" >
    	<input type="hidden" value="<?php echo($this->data['operater_cert']['company_orgcert']);?>" name="company_orgcert" >
	</td>
    </tr>
  <tr>
    <td height="50" align="right" bgcolor="#FFFFFF">税务登记证</td>
    <td colspan="3" align="left" bgcolor="#FFFFFF">
	<?php
		if(!empty($this->data['operater_cert']['company_tax'])){
			echo '<img src="'.Common::AttachUrl($this->data['operater_cert']['company_tax']).'" class="J-cert" onclick="window.open(this.src)">';
		}
	?>
    	<input type="file" class="J-imgfile" name="imgFile1" style="position:relative; top:-20px;" >
    	<input type="hidden" value="<?php echo($this->data['operater_cert']['company_tax']);?>" name="company_tax" >
	</td>
    </tr>
  <!--
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">运营者手机号码</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="11" class="input_02" name="operate_mobile" value="<?php echo $this->data['operate_mobile'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">运营者电话</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="20" class="input_02" name="operate_tel" value="<?php echo $this->data['operate_tel'];?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">运营者电子邮箱</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="30" class="input_02" name="operate_email" value="<?php echo $this->data['operate_email'];?>"></td>
    <td align="right" bgcolor="#FFFFFF">运营者身份证号</td>
    <td align="left" bgcolor="#FFFFFF"><input type="text" maxlength="18" class="input_02" name="operate_cardno" value="<?php echo $this->data['operate_cardno'];?>"></td>
  </tr>
  -->
</table>

<!--endprint-->
<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo empty($this->id) ? 0 : $this->id;?>">
<input type="hidden" name="option" value="submit">
<input type="hidden" name="filebox" value="">
<input type="hidden" name="yesfn" value="alert('保存成功');parent.frames['iframe'].frames['mainFrame'].location.reload();">
<input type="hidden" name="nofn" value="nofunction()">
<input type="hidden" name="beforefn" value="beforefunction()">
<div align="center" style="padding:10px;">
<input type="submit" name="Submit" value="保存" class="btn_03 J-submit">
</div>
</form>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(e) {
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
			jQuery('input[name="option"]').val('uploadImg');
			jQuery('input[name="filebox"]').val($this.attr('name'));
			
			jQuery(".brand").ajaxSubmit({
				dataType: "json",
				beforeSubmit:function(){},
				success:function(data){
					jQuery("input[name=option]").val('submit');
					art.dialog({id:'upinfo'}).close();
					if(data.success==true){
						$this.siblings('input[type="hidden"]').val(data.msg);
						$this.siblings('img').attr("src",$attach_path + data.msg);
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
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('保存');
	}
</script>
<?php include $this->Render('footer.php'); ?>