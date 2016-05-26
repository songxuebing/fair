<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">展会管理</a>&nbsp;&gt;&nbsp;<a href="#">展会订单</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/convention/conorder/" method="post" name="search" autocomplete="off">
      展位订单号：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="展位订单号" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;	
	  下单时间：
	  <input name="st" type="text" id="st" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['st']) ? '' :$this->param['st'];?>">
	  -&nbsp;
	  <input name="et" type="text" id="et" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['et']) ? '' :$this->param['et'];?>">
	  <input type="submit" class="btn_05"  value="查询" onClick="change_opt('');" />
	  &nbsp;&nbsp;
	  <input type="hidden" name="list" value="<?php echo $this->param['list'];?>">
	</form> 
	</div>
	<div class="clear_15px"></div>
	<div class="tab_title">
		<a href="/convention/conorder/" class="<?php echo $this->param['list']=='' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/convention/conorder/?list=waitpay" class="<?php echo $this->param['list']=='waitpay' ? 'tab_01_ac' : '';?>">待支付</a>
		<a href="/convention/conorder/?list=waitreceive" class="<?php echo $this->param['list']=='waitreceive' ? 'tab_01_ac' : '';?>">待收货</a>
		<a href="/convention/conorder/?list=finish" class="<?php echo $this->param['list']=='finish' ? 'tab_01_ac' : '';?>">已完成</a>
		<a href="/convention/conorder/?list=cancel" class="<?php echo $this->param['list']=='cancel' ? 'tab_01_ac' : '';?>">已取消</a>
	</div>
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_8">订单编号</li>
		<li class="li_5">展会订单</li>
		<li class="li_10">单位名称</li>
        <li class="li_5">联系人</li>
		<li class="li_8">手机</li>
        <li class="li_5">预付款</li>
		<li class="li_5">销售金额</li>
		<li class="li_5">待付金额</li>
		<li class="li_10">所属商户</li>
        <li class="li_8">付款状态</li>
        <li class="li_8">下单时间</li>
		<li class="li_15">订单操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_8" style="font-size:12px;"><a href="/convention/conorder/option/detail/sn/<?php echo $v['order_sn'];?>" class="AjaxWindow" href-id="<?php echo $v['order_sn'];?>" data-title="查看订单详情"><?php echo $v['order_sn'];?></a></li>
          <li class="li_5"><a href="<?php echo WEB_URL.'/convention/index/option/detail/id/'.$v['detail']['con_detail']['con_id'];?>" target="_blank"><?php echo $v['order_row']['con_name'];?></a></li>
          <li class="li_10"><?php echo $v['receiving']['company_name'];?></li>
		  <li class="li_5"><?php echo $v['receiving']['address_user_name'];?></li>
		  <li class="li_8"><?php echo $v['receiving']['address_tel'];?></li>
          <li class="li_5"><?php echo $v['advance'];?></li>
          <li class="li_5"><?php echo $v['show_price'];?></li>
		  <li class="li_5"><?php echo $v['price'] - $v['advance'];?></li>
		  <li class="li_10"><?php echo $v['saler']['username'];?></li>
          <li class="li_8">
          	<?php
            	if($v['is_pay'] == 0){
					echo('<font color="#FF0000">未付款</font>');	
					if($v['is_quzhan'] == 1){
						echo('&nbsp;|&nbsp;<font color="#FF0000">官方付款</font>');
					}
				}elseif($v['is_pay'] == 1){
					echo('<font color="#09FF46">已付款</font>');	
					if($v['is_quzhan'] == 1){
						echo('&nbsp;|&nbsp;<font color="#09FF46">官方付款</font>');
					}
				}
				
			?>
          </li>
          <li class="li_8"><?php echo date('Y-m-d H:i',$v['addtime']);?></li>
		  <li class="li_15">
		  <?php if($v['order_state'] == 0){?>
		  <a href="javascript:;" class="btn_05 J-quxiao" data-id="<?php echo $v['order_id'];?>">取消订单</a>
          <?php
          	if($v['is_quzhan'] == 1 && $v['is_pay'] == 0){
		  ?>
          <a href="javascript:;" class="btn_05 J-daifu" data-id="<?php echo $v['order_id'];?>">官方代付</a>
          <a href="/convention/conorder/option/receipts/id/<?php echo $v['order_id'];?>" class="btn_05 AjaxWindow" href-id="<?php echo $v['order_id'];?>" data-title="回执单">回执单</a>
          <?php
			}
		  ?>
		  <?php }?>
          
		  </li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
    <div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    </div>
	<div class="table_div_03" style="background:none">&nbsp;&nbsp;&nbsp;&nbsp;<span class="font_18px">所有成交金额：<span class="font_f60 b" id="money_total"><?php echo $this->data['Summoney'];?></span>元</span></span></div>
	<script type="text/javascript">
	jQuery(document).ready(function(e) {
        jQuery(".J-quxiao").on('click',function(){
			if(confirm('您确定要取消订单吗？')){
				var orderId = jQuery(this).data('id');
				jQuery.post('/convention/conorder/option/cancel/',{'order_id':orderId},function(data){
					if(data.success){
						window.location.reload();
					}else{
						alert('取消失败');
					}
				},'json');		
			}
			
		});
		
		jQuery(".J-daifu").on('click',function(){
			if(confirm('您确定要给此订单代付款吗？')){
				var orderId = jQuery(this).data('id');
				jQuery.post('/convention/conorder/option/paid/',{'order_id':orderId},function(data){
					if(data.success){
						window.location.reload();
					}else{
						alert('代付失败');
					}
				},'json');		
			}
			
		});
		
		
		
	});
	</script>
<?php include $this->Render('footer.php'); ?>
