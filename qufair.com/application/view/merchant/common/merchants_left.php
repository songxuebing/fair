<!-- 商户中心左侧 -->
<div class="ms_left fl">
	<?php
		if($this->supplier_purview['S001']['cert']['cert_state'] == 2){
	?>
    <dl>
        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_icon01.png">展会管理</dt>
        <dd class="<?php if($this->Controller == 'convention' && $this->Action == 'add'){ echo 'ms_curr'; };?>"><a href="/convention/add/">发布展会</a></dd>
        <dd class="<?php if($this->Controller == 'convention' && $this->Action == 'list'){ echo 'ms_curr'; };?>"><a href="/convention/list/">展会已发布</a></dd>
        <dd class="<?php if($this->Controller == 'convention' && $this->Action == 'order'){ echo 'ms_curr'; };?>"><a href="/convention/order/">展会订单</a><em class="J-convention-number">0</em></dd>
    </dl>
	<?php
		}
		if($this->supplier_purview['S002']['cert']['cert_state'] == 2){
	?>
    <dl>
        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_icon02.png">行程管理</dt>
        <dd class="<?php if($this->Controller == 'route' && $this->Action == 'index'){ echo 'ms_curr'; };?>"><a href="/route/index/">发布行程</a></dd>
        <dd class="<?php if($this->Controller == 'route' && $this->Action == 'list'){ echo 'ms_curr'; };?>"><a href="/route/list/">行程已发布</a></dd>
        <dd class="<?php if($this->Controller == 'route' && $this->Action == 'order'){ echo 'ms_curr'; };?>"><a href="/route/order/">行程订单</a></dd>
    </dl>
	<?php
		}
		if($this->supplier_purview['S003']['cert']['cert_state'] == 2){
	?>
    <dl>
        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_icon03.png">签证管理</dt>
        <dd class="<?php if($this->Controller == 'visa' && $this->Action == 'add'){ echo 'ms_curr'; };?>"><a href="/visa/add/">发布签证</a></dd>
        <dd class="<?php if($this->Controller == 'visa' && $this->Action == 'list'){ echo 'ms_curr'; };?>"><a href="/visa/list/">签证已发布</a></dd>
        <dd class="<?php if($this->Controller == 'visa' && $this->Action == 'order'){ echo 'ms_curr'; };?>"><a href="/visa/order/">签证订单</a></dd>
    </dl>
	<?php
		}
		if($this->supplier_purview['S004']['cert']['cert_state'] == 2){
	?>
    <dl>
        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_icon04.png">物流管理</dt>
        <dd class="<?php if($this->Controller == 'logistics' && $this->Action == 'add'){ echo 'ms_curr'; };?>"><a href="/logistics/add/">发布物流</a></dd>
        <dd class="<?php if($this->Controller == 'logistics' && $this->Action == 'list'){ echo 'ms_curr'; };?>"><a href="/logistics/list/">物流已发布</a></dd>
        <dd class="<?php if($this->Controller == 'logistics' && $this->Action == 'order'){ echo 'ms_curr'; };?>"><a href="/logistics/order/">物流订单</a></dd>
    </dl>
	<?php
		}
		if($this->supplier_purview['S005']['cert']['cert_state'] == 2){
	?>
    <dl>
        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_icon05.png">特装管理</dt>
        <dd class="<?php if($this->Controller == 'decoration' && $this->Action == 'add'){ echo 'ms_curr'; };?>"><a href="/decoration/add/">发布特装</a></dd>
        <dd class="<?php if($this->Controller == 'decoration' && $this->Action == 'list'){ echo 'ms_curr'; };?>"><a href="/decoration/list/">特装已发布</a></dd>
        <dd class="<?php if($this->Controller == 'decoration' && $this->Action == 'order'){ echo 'ms_curr'; };?>"><a href="/decoration/order/">特装订单</a></dd>
    </dl>
	<?php
		}
	?>
    <dl>
        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_icon06.png">账户信息</dt>
        <dd class="<?php if($this->Controller == 'cert' && $this->Action == 'index'){ echo 'ms_curr'; };?>"><a href="/cert/index/">账户认证</a><?php if($this->money_check == 1){?>&nbsp;<font style="font-size:16px; font-weight:bold;color:#FF0000; position:relative; top:3px;">*</font><?php }?></dd>
        <dd class="<?php if($this->Controller == 'balance' && $this->Action == 'index'){ echo 'ms_curr'; };?>"><a href="/balance/index/">账户余额</a></dd>
    </dl>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(e) {
		jQuery.get('/convention/add/option/totalnumber',function(data){
			jQuery('.J-convention-number').html(data.convention);
		},'json');
		
        setInterval(function(){
			jQuery.get('/convention/add/option/totalnumber',function(data){
				jQuery('.J-convention-number').html(data.convention);
			},'json');
		},10000);
    });
</script>