<?php include $this->Render('header.php'); ?>
<script language="javascript" src="<?php echo STYLE_URL;?>/style/js/lodop/LodopFuncs.js"></script>
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
<table width="98%" border="0" cellspacing="0" cellpadding="5" style="margin: 0 auto; margin-top:10px;">
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#EFEFEF"><strong>企业基本资料</strong></td>
    </tr>
  <tr>
    <td width="15%" height="30" align="right" bgcolor="#FFFFFF">企业全称</td>
    <td width="35%" align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_name'];?></td>
    <td width="15%" align="right" bgcolor="#FFFFFF">企业法人代表</td>
    <td width="35%" align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_owner'];?></td>
  </tr>
  <!--
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">法人身份证号</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['owner_cardno'];?></td>
    <td align="right" bgcolor="#FFFFFF">法人手机号码</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['owner_mobile'];?></td>
  </tr>
  -->
  <tr>
  <!--
    <td height="30" align="right" bgcolor="#FFFFFF">企业服务</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_service'];?></td>
    -->
    <td align="right" bgcolor="#FFFFFF">企业电话</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_tel'];?></td>
    <td height="30" align="right" bgcolor="#FFFFFF">运营者手机号码</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['operate_mobile'];?></td>
  </tr>
  
  
  
  
  
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">营业执照号</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_license'];?></td>
    <td align="right" bgcolor="#FFFFFF">组织机构代码</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_orgcode'];?></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">税务登记证号</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_regcert'];?></td>
    <td align="right" bgcolor="#FFFFFF">企业详细地址</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['company_address'];?></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#EFEFEF"><strong>企业收款账户</strong></td>
    </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">企业开户名称</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['bank_comname'];?></td>
    <td align="right" bgcolor="#FFFFFF">企业银行账号</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['bank_account'];?></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">企业开户银行</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['bank_name'];?></td>
    <td align="right" bgcolor="#FFFFFF">开户银行地址</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['bank_branch'];?></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#EFEFEF"><strong>运营者资料</strong></td>
    </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">运营者姓名</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['operate_name'];?></td>
    <td align="right" bgcolor="#FFFFFF">运营者部门职位</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['operate_position'];?></td>
  </tr>
  <!--
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">运营者手机号码</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['operate_mobile'];?></td>
    <td align="right" bgcolor="#FFFFFF">运营者电话</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['operate_tel'];?></td>
  </tr>
  -->
  <!--
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">运营者电子邮箱</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['operate_email'];?></td>
    <td align="right" bgcolor="#FFFFFF">运营者身份证号</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $this->data['operate_cardno'];?></td>
  </tr>
  
  <tr>
    <td height="50" align="right" bgcolor="#FFFFFF">运营者身份证</td>
    <td colspan="3" align="left" bgcolor="#FFFFFF">
	<?php
		if(!empty($this->data['operater_cert']['operater_cert'])) foreach($this->data['operater_cert']['operater_cert'] as $k=>$v){
			if(!empty($v)){
				echo '<img src="'.Common::AttachUrl($v).'" class="J-cert" onclick="window.open(this.src)">';
			}
		}
	?>
	</td>
    </tr>
    
  <tr>
    <td height="50" align="right" bgcolor="#FFFFFF">法人授权书</td>
    <td colspan="3" align="left" bgcolor="#FFFFFF">
	<?php
		if(!empty($this->data['operater_cert']['owner_auth'])){
			echo '<img src="'.Common::AttachUrl($this->data['operater_cert']['owner_auth']).'" class="J-cert" onclick="window.open(this.src)">';
		}
	?>
	</td>
    </tr>
    -->
  <tr>
    <td height="50" align="right" bgcolor="#FFFFFF">企业营业执照</td>
    <td colspan="3" align="left" bgcolor="#FFFFFF">
	<?php
		if(!empty($this->data['operater_cert']['company_license'])){
			echo '<img src="'.Common::AttachUrl($this->data['operater_cert']['company_license']).'" class="J-cert" onclick="window.open(this.src)">';
		}
	?>
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
	</td>
    </tr>
    <!--
  <tr>
    <td height="50" align="right" bgcolor="#FFFFFF">法人身份证</td>
    <td colspan="3" align="left" bgcolor="#FFFFFF">
	<?php
		if(!empty($this->data['operater_cert']['owner_cert'])) foreach($this->data['operater_cert']['owner_cert'] as $k=>$v){
			if(!empty($v)){
				echo '<img src="'.Common::AttachUrl($v).'" class="J-cert" onclick="window.open(this.src)">';
			}
		}
	?>
	</td>
    </tr>
    -->
</table>
</div>

<!--endprint-->
<?php
	if(!empty($this->audit)){
?>
<form action="/supplier/cert/" method="post" name="oprate" class="AjaxForm">
  <table width="98%" border="0" cellpadding="2" cellspacing="0" bgcolor="#999999" style="margin:0 auto; margin-top:10px; margin-bottom:10px;">
    <tr>
      <td width="33%" height="35" align="right" bgcolor="#FFFFFF">审核操作：</td>
      <td width="67%" bgcolor="#FFFFFF"><input name="state" type="radio" value="1" checked>
        通过审核
        &nbsp;&nbsp;
        <input type="radio" name="state" value="2">
      驳回请求</td>
    </tr>
    <tr>
      <td height="55" align="right" bgcolor="#FFFFFF">备注信息：</td>
      <td bgcolor="#FFFFFF"><textarea class="input_02" name="remarks" id="remarks" style="width:440px;"></textarea></td>
    </tr>
    <tr>
      <td height="45" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
    </tr>
  </table>
<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo empty($this->id) ? 0 : $this->id;?>">
<input type="hidden" name="option" value="auditsubmit">
<input type="hidden" name="yesfn" value="alert('保存成功');parent.frames['iframe'].frames['mainFrame'].location.reload();">
<input type="hidden" name="nofn" value="nofunction()">
<input type="hidden" name="beforefn" value="beforefunction()">
</form>
<?php
	}else{
?>
<div align="center" style="height:50px; line-height:50px;"><input type="button" name="button" value=" 打 印 " onClick="doPrint()"></div>
<script language=javascript>
	function doPrint() {
		bdhtml=window.document.body.innerHTML; 
		sprnstr="<!--startprint-->"; 
		eprnstr="<!--endprint-->"; 
		prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
		prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
		window.document.body.innerHTML=prnhtml; 
		window.print(); 
		
		/*
		var strStyle="<style> table,td,th {border-width: 1px;border-style: solid;border-collapse: collapse;font-size:14px;}</style>";
		var normalStyle="<style>td,body{font-size:14px;}</style>";
		LODOP=getLodop(); 
		LODOP.PRINT_INIT("打印");
		LODOP.SET_PRINT_PAGESIZE(1,2200,1380,"A4");
		LODOP.ADD_PRINT_HTM(0,10,"99%",300,normalStyle+document.getElementById("div1").innerHTML);
		LODOP.SET_PRINT_STYLEA(0,"ItemType",1);
		LODOP.SET_PRINT_STYLEA(0,"LinkedItem",1);
		LODOP.SET_PRINT_STYLEA(0,"ItemType",1);
		LODOP.SET_PRINT_STYLEA(0,"LinkedItem",1);
	  	LODOP.PREVIEW();*/
	}
</script>
<?php
	}
?>
<script type="text/javascript">
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('保存');
	}
</script>
<?php include $this->Render('footer.php'); ?>
