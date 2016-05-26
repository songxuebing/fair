<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">

<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td colspan="2">&nbsp;&nbsp;
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
        <tr>
          <td width="29%" rowspan="5" align="center" valign="middle">
          	<img src="<?php echo Common::AttachUrl($this->data['con_cover']);?>" width="80" height="80" />
          </td>
          <td width="71%" height="39"><?php echo $this->data['con_name'];?></td>
        </tr>
        <tr>
          <td height="33">举办展馆:<?php echo $this->data['detail']['con_detail']['con_detail']['pavilion'];?></td>
          </tr>
        <tr>
          <td height="43">展位号：<?php echo $this->data['detail']['con_detail']['detail_area']['booth_no'];?>&nbsp;&nbsp;是否跟团:<?php echo $this->data['is_group'] == 1 ? '是' : '否' ;?></td>
          </tr>
        <tr>
          <td height="35">展位类型：<?php echo $this->data['detail']['con_detail']['detail_area']['booth_type'];?>&nbsp;&nbsp; 开口概况：<?php echo $this->data['detail']['con_detail']['detail_area']['opening'];?></td>
          </tr>
        <tr>
          <td height="56">价格：<?php echo $this->order_row['price'];?></td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td height="45" colspan="2">&nbsp;&nbsp;
      <table width="100%" height="324" border="0" cellpadding="0" cellspacing="0" class="table_list">
        <tr>
          <td width="50%">单位名称: <?php echo $this->data['receiving']['company_name'];?></td>
          <td width="50%">订单状态：<?php echo $this->order_row['status']['text'];?></td>
        </tr>
        <tr>
          <td>单位地址: <?php echo $this->data['receiving']['company_address'];?></td>
          <td>付款类型：<?php echo $this->order_row['advance'] > 0 ? '预付定金' : '全款' ;?></td>
        </tr>
        <tr>
          <td>联 系  人: <?php echo $this->data['receiving']['address_user_name'];?></td>
          <td>下单时间：<?php echo date('Y-m-d H:i:s',$this->data['datetime']);?></td>
        </tr>
        <tr>
          <td>电      话: <?php echo $this->data['receiving']['address_mobile'];?></td>
          <td>交易订单：<?php echo $this->order_row['order_sn'];?></td>
        </tr>
        <tr>
          <td>传      真: <?php echo $this->data['receiving']['fax'];?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>手      机: <?php echo $this->data['receiving']['address_tel'];?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>电子邮件: <?php echo $this->data['receiving']['address_email'];?></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td width="100" height="45">&nbsp;&nbsp;备注:</td>
    <td width="500"><?php echo $this->data['remarks'];?></td>
  </tr>
  <tr>
    <td height="45" colspan="2">
    	<?php
        	if($this->order_row['advance'] > 0){
		?>
        预付定金：<?php echo $this->order_row['advance'];?> &nbsp;&nbsp; 尾款金额：<?php echo $this->order_row['price'] - $this->order_row['advance'];?>
        <?php
			}else{
		?>
        全款金额：<?php echo $this->order_row['price'];?>
        <?php
			}
		?>
    </td>
  </tr>
</table>

<?php include $this->Render('footer.php'); ?>