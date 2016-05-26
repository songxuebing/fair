<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">签证管理</a>&nbsp;&gt;&nbsp;<a href="#">签证订单</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/visa/order/" method="post" name="search" autocomplete="off">
    	订单号：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="订单号" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;	
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
		<a href="/visa/order/" class="<?php echo $this->param['list']=='' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/visa/order/?list=waitpay" class="<?php echo $this->param['list']=='waitpay' ? 'tab_01_ac' : '';?>">待支付</a>
		<a href="/visa/order/?list=waitreceive" class="<?php echo $this->param['list']=='waitreceive' ? 'tab_01_ac' : '';?>">待收货</a>
		<a href="/visa/order/?list=finish" class="<?php echo $this->param['list']=='finish' ? 'tab_01_ac' : '';?>">已完成</a>
		<a href="/visa/order/?list=cancel" class="<?php echo $this->param['list']=='cancel' ? 'tab_01_ac' : '';?>">已取消</a>
	</div>
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_10">订单编号</li>
		<li class="li_8">签证订单</li>
		<li class="li_10">地址</li>
        <li class="li_5">联系人</li>
		<li class="li_10">手机</li>
		<li class="li_5">销售金额</li>
		<li class="li_5">成交金额</li>
		<li class="li_8">所属用户</li>
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
		  <li class="li_10" style="font-size:12px;"><?php echo $v['order_sn'];?></li>
          <li class="li_8"><a href="<?php echo WEB_URL.'/visa/index/option/detail/id/'.$v['order_row']['visa_id'];?>" target="_blank"><?php echo $v['order_row']['visa_name'];?></a></li>
          <li class="li_10"><?php echo $v['receiving']['add_address'];?></li>
		  <li class="li_5"><?php echo $v['receiving']['add_username'];?></li>
		  <li class="li_10"><?php echo $v['receiving']['add_tel'];?></li>
          <li class="li_5"><?php echo $v['show_price'];?></li>
		  <li class="li_5"><?php echo $v['price'];?></li>
		  <li class="li_8"><?php echo $v['saler']['username'];?></li>

          <li class="li_8"><?php echo date('Y-m-d H:i',$v['addtime']);?></li>
		  <li class="li_15">
		  
          <?php if($v['order_state'] == 0){?>
		  <a href="javascript:;" class="btn_05 J-quxiao" data-id="<?php echo $v['order_id'];?>">取消订单</a>
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
				jQuery.post('/visa/order/option/cancel/',{'order_id':orderId},function(data){
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
				jQuery.post('/visa/order/option/paid/',{'order_id':orderId},function(data){
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
