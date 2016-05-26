<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<body class="font_14px">
<form action="/balance/index/" method="post" name="brand" class="AjaxForm">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45" align="right">用户名称：</td>
    <td align="left"><input name="username" type="text" id="username" value="<?php echo $this->data['member']['username'];?>" class="input_01" readonly ></td>
  </tr>
  <tr>
    <td height="45" align="right">真实姓名：</td>
    <td align="left"><input name="truename" type="text" id="truename" value="<?php echo $this->data['bank']['username'];?>" class="input_01" readonly ></td>
  </tr>
  <tr>
    <td height="45" align="right">身份证号：</td>
    <td align="left"><input name="id_card" type="text" id="id_card" value="<?php echo $this->data['bank']['id_card'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">银行名称：</td>
    <td align="left"><input name="bank_name" type="text" id="bank_name" value="<?php echo $this->data['bankSupp']['bank_name'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">开户行地址：</td>
    <td align="left"><input name="bank_address" type="text" id="bank_address" value="<?php echo $this->data['bankSupp']['bank_branch'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">银行卡号：</td>
    <td align="left"><input name="bank_no" type="text" id="bank_no" value="<?php echo $this->data['bankSupp']['bank_account'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">提款金额：</td>
    <td align="left"><input name="money" type="text" id="money" value="<?php echo $this->data['money'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">实际金额：</td>
    <td align="left"><input name="actual_amount" type="text" id="actual_amount" value="<?php echo $this->data['actual_amount'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">平台佣金：</td>
    <td align="left"><input name="commission" type="text" id="commission" value="<?php echo $this->data['commission'];?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45" align="right">当前状态：</td>
    <td align="left"><span style="color:<?php echo $this->data['state']['class'];?>;"><?php echo $this->data['state']['text'];?></span></td>
  </tr>
  <tr>
    <td height="45" align="right">审核状态：</td>
    <td align="left">
	<select name="win_state" id="win_state">
    
        <option value="2">已审核</option>
        <option value="3">待打款</option>
        <option value="4">已打款</option>
        
    </select>
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