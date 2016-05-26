<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<style type="text/css">
	.clearfix .mm_yema li{
		display:inline;
	}
	.pagination-right{
		float:right;
	}
	.user-order-box { border-bottom:1px solid #e5e5e5; margin:10px 0; height:auto; overflow:hidden; }
	.user-order-box a{ float: left; width: 90px; height: 36px; border: 1px solid #e5e5e5; font-size: 14px; color: #333; line-height: 36px; text-align: center; border-radius: 3px; margin-right:10px;}
	.user-order-box a.on{ float: left; width: 90px; height: 36px; font-size: 14px; color: #fff; border:none; line-height: 36px; text-align: center; border-radius: 3px; background: #ff4660;}


</style>

<!-- 个人中心 -->
<div class="mm_mid">
    <?php include $this->Render('user_top.php'); ?>
    <div class="clearfix">
        <?php include $this->Render('user_left.php'); ?>
        <div class="mm_geren_right fr">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>全部订单</h6>
            </div>
            <div class="user-order-box">
            	<a href="/user/order/is_sale/all" class="<?php echo $this->is_sale == 'all' ? 'on' : '';?>">全部订单</a>
            	<a href="/user/order/is_sale/1" class="<?php echo $this->is_sale == '1' ? 'on' : '';?>">进行订单</a>
                <a href="/user/order/is_sale/2" class="<?php echo $this->is_sale == '2' ? 'on' : '';?>">取消订单</a>
            </div>
            <?php
				
				if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
			?>
            <div class="mm_geren_dingdan">
				<?php
					//展会详情
					if($v['is_type'] == 'convention'){
				?>
                <dl class="clearfix">
                    <dt><img src="<?php echo Common::AttachUrl($v['detail']['con_cover']);?>!a200" width="136" height="136"></dt>
                    <dd>
                        <h3><a href="/user/order/option/detail/sn/<?php echo $v['order_sn'];?>" style=" color:#333;" target="_blank"><?php echo $v['detail']['con_name'];?> <span style="color:#428bca;">(订单详情)</span></a><a target="blank" href="tencent://message/?uin=<?php echo $v['detail']['detail']['con_detail']['qq']?>&Site=http://www.qufair.com&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $v['detail']['detail']['con_detail']['qq']?>:8" alt="点击这里给我发消息"></a></h3>
                        <ul>
                            <li style="margin-bottom:2px;">举办时间：<i><?php echo date('Y-m-d',$v['detail']['detail']['con_detail']['start_time']);?> 至 <?php echo date('Y-m-d',$v['detail']['detail']['con_detail']['end_titme']);?></i></li>
                            <li  style="margin-bottom:2px;">举办展馆：<span style="display:inline-block; width:188px; height:14px; overflow:hidden;"><?php echo $v['detail']['detail']['con_detail']['con_detail']['pavilion'];?></span></li>
                            <li  style="margin-bottom:2px;"><?php echo $v['detail']['detail']['con_detail']['detail_area']['area_name'];?>：<span><?php echo $v['detail']['detail']['con_detail']['detail_area']['booth_no'];?></span></li>
                            <li  style="margin-bottom:2px;">是否跟团：<span><?php echo $v['detail']['is_group'] == 1 ? '是' : '否';?></span></li>
                            <li  style="margin-bottom:2px;">展位类型：<span><?php echo $v['detail']['detail']['con_detail']['detail_area']['booth_type'];?></span></li>
                            <li  style="margin-bottom:2px;">开口概况：<span><?php echo $v['detail']['detail']['con_detail']['detail_area']['opening'];?></span></li>
                            <li  style="margin-bottom:2px;">展会面积：<span><?php echo $v['detail']['detail']['con_detail']['detail_area']['con_area'];?></span></li>
                            <li  style="margin-bottom:2px;">展会规格：<span><?php echo $v['detail']['detail']['con_detail']['detail_area']['con_standard'];?></span></li>
                            <li  style="margin-bottom:2px;">价　　格：<em>￥<?php echo $v['price'];?></em></li>
                            <?php
                            	if($v['advance'] > 0){
							?>
                            <li  style="margin-bottom:2px;">预付金额：<em>￥<?php echo $v['advance'];?></em>&nbsp;/&nbsp;待付尾款：<em>￥<?php echo $v['price'] - $v['advance'];?></em></li>
                            
                            <?php
								}
							?>        
                            
                        </ul>
                    </dd>
                </dl>
				<?php
					}elseif($v['is_type'] == 'route'){
				?>
                <dl class="clearfix">
                    <dt><img src="<?php echo Common::AttachUrl($v['route_order']['goods_detail']['cover']);?>!a200" width="136" height="136"></dt>
                    <dd>
                        <h3><a href="/user/order/option/detail/sn/<?php echo $v['order_sn'];?>" style=" color:#333;" target="_blank"><?php echo $v['route_order']['goods_name'];?> <span style="color:#428bca;">(订单详情)</span></a><a target="blank" href="tencent://message/?uin=<?php echo $v['route_order']['goods_detail']['qq']?>&Site=http://www.qufair.com&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $v['route_order']['goods_detail']['qq']?>:8" alt="点击这里给我发消息"></a></h3>
                        <ul>
                            <li>出发时间：<i><?php echo date('Y-m-d',$v['route_order']['goods_detail']['leave_time']);?>至<?php echo date('Y-m-d',$v['route_order']['goods_detail']['end_time']);?></i></li>
                            <li>赶往展馆：<span><?php echo $v['route_order']['goods_detail']['pavilion'];?></span></li>
                            <li>出发地点：<span><?php echo $v['route_order']['goods_detail']['leave_area'];?></span></li>
                            <li>赶往展馆：<span><?php echo $v['route_order']['goods_detail']['route_city'];?></span></li>
                            <li>价　　格：<em>￥<?php echo $v['route_order']['price'];?></em></li>
							<li>人　　数：<em><?php echo $v['route_order']['nums'];?></em></li>
							<li>总　　价：<em>￥<?php echo $v['price'];?></em></li>
                        </ul>
                    </dd>
                </dl>
				<?php
					}elseif($v['is_type'] == 'visa'){
				?>
                <dl class="clearfix">
                    <dt><img src="<?php echo Common::AttachUrl($v['visa_order']['visa_cover']);?>!a200" width="136" height="136"></dt>
                    <dd>
                        <h3><a href="/user/order/option/detail/sn/<?php echo $v['order_sn'];?>" style="color:#333;" target="_blank"><?php echo $v['visa_order']['visa_name'];?> <span style="color:#428bca;">(订单详情)</span></a><a target="blank" href="tencent://message/?uin=<?php echo $v['visa_order']['visa_qq']?>&Site=http://www.qufair.com&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $v['visa_order']['visa_qq']?>:8" alt="点击这里给我发消息"></a></h3>
                        <ul>
                            <li>签证区域：<i><?php echo $v['visa_order']['visa_area'];?></i></li>
                            <li>服务城市：<i><?php echo $v['visa_order']['visa_city'];?></i></li>
                            <li>签证类型：<span><?php echo $v['visa_order']['visa_type'];?></span></li>
                            <li>产品类型：<span><?php echo $v['visa_order']['pro_type'];?></span></li>
                            <li>价　　格：<em>￥<?php echo $v['visa_order']['visa_price'];?></em></li>
							<li>人　　数：<em><?php echo $v['visa_order']['num'];?></em></li>
							<li>总　　价：<em>￥<?php echo $v['price'];?></em></li>
                        </ul>
                    </dd>
                </dl>
                <?php
					}elseif($v['is_type'] == 'logistics'){
				?>
                <dl class="clearfix">
                    <dt><img src="<?php echo Common::AttachUrl($v['log_order']['log_detail']['log_cover']);?>!a200" width="136" height="136"></dt>
                    <dd>
                        <h3><a href="/user/order/option/detail/sn/<?php echo $v['order_sn'];?>" style="color:#333;" target="_blank"><?php echo $v['log_order']['log_detail']['log_title'];?> <span style="color:#428bca;">(订单详情)</span></a><a target="blank" href="tencent://message/?uin=<?php echo $v['log_order']['log_detail']['log_qq'];?>&Site=http://www.qufair.com&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $v['log_order']['log_detail']['log_qq'];?>:8" alt="点击这里给我发消息"></a></h3>
                        <ul>
                            <li>物流集散地：<i><?php echo $v['log_order']['log_detail']['log_location'];?></i></li>
                            <li>服务城市：<i><?php echo $v['log_order']['log_detail']['log_city'];?></i></li>
                            <li>物流方式：<span><?php echo $v['log_order']['log_detail']['log_freight'][$v['log_order']['mode']][$v['log_order']['mode'].'_txt'];?></span></li>
                            <li>运　　费：<em>￥<?php echo $v['log_order']['freight'] * $v['log_order']['num'];?></em></li>
							<li>物件大小：<em><?php echo $v['log_order']['num'];?>/<?php echo $v['log_order']['log_detail']['log_unit'];?></em></li>
							<li>总　　价：<em>￥<?php echo $v['price'];?></em></li>
                        </ul>
                    </dd>
                </dl>
                
                <?php
					}elseif($v['is_type'] == 'decoration'){
				?>
                <dl class="clearfix">
                    <dt><img src="<?php echo Common::AttachUrl($v['decoration_order']['detail']['cover']);?>!a200" width="136" height="136"></dt>
                    <dd>
                        <h3><a href="/user/order/option/detail/sn/<?php echo $v['order_sn'];?>" style="color:#333;" target="_blank"><?php echo $v['decoration_order']['de_title'];?> <span style="color:#428bca;">(订单详情)</span></a><a target="blank" href="tencent://message/?uin=<?php echo $v['decoration_order']['detail']['qq']?>&Site=http://www.qufair.com&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $v['decoration_order']['detail']['qq']?>:8" alt="点击这里给我发消息"></a></h3>
                        <ul>
                            <li style="float:none;">面积大小：<i><?php echo $v['decoration_order']['detail']['proportion'];?></i></li>
                            <li  style="float:none;">装修风格：<span><img src="<?php echo Common::AttachUrl($v['decoration_order']['de_style']['style_img']);?>" width="44" height="44"></span></li>
                            <li  style="float:none;">有 效 期：<i><?php echo $v['start_time'] == 0 ? '' : $v['start_time'];?> 至 <?php echo $v['end_titme'] == 0 ? '' : $v['end_titme'];?></i></li>
							<li  style="float:none;">总　　价：<em>￥<?php echo $v['price'];?></em></li>
                        </ul>
                    </dd>
                </dl>
                <?php
					}
				?>
                <div class="mm_geren_dingdan_que">
                    <span>下单时间：<em><?php echo date('Y-m-d',$v['addtime']);?></em></span>
                    <div class="fr">
                    	
                    	<?php
                        	if($v['order_state'] == 0){
						?>
                        <a href="javascript:;" data-order-id="<?php echo $v['order_id'];?>" data-convention-area="<?php echo $v['detail']['detail']['con_detail']['detail_area']['area_id'];?>" class="mm_geren_dingdan_quxiao J-quxiao">取消订单</a>
                        <a href="<?php echo $v['pay_url'];?>" class="mm_geren_dingdan_daizhifu" target="_blank">待支付</a>
                        <?php
							}elseif($v['order_state'] == 1){
						?>
                        <a href="/public/common/option/contract/sn/<?php echo $v['order_sn'];?>" class="mm_geren_dingdan_xiazai" target="_blank">下载合同</a>
                        <a href="javascript:;" data-order-id="<?php echo $v['order_id'];?>" class="mm_geren_dingdan_queren J-queren">确认收货</a>
                        <?php
							}elseif($v['order_state'] == 2){
						?> 
                        <a href="javascript:;" data-order-id="<?php echo $v['order_id'];?>" class="mm_geren_dingdan_quxiao J-remove">删除订单</a>
                        <a href="javascript:;" class="mm_geren_dingdan_queren">订单已取消</a>
                        <?php
							}elseif($v['order_state'] == 3){
						?>
                        <a href="javascript:;" class="mm_geren_dingdan_queren">已收货</a>
                        <?php
							}elseif($v['order_state'] == 4){
						?>
                        <a href="javascript:;" data-order-id="<?php echo $v['order_id'];?>" class="mm_geren_dingdan_quxiao J-quxiao">取消订单</a>
                        <a href="<?php echo $v['pay_url'];?>" class="mm_geren_dingdan_daizhifu" target="_blank">支付尾款</a>
                        <?php
							}
						?>
                        <?php
                        	if($v['is_quzhan'] == 1 && $v['is_pay'] == 0){
						?>
                        <a href="/user/receipts/option/edit/id/<?php echo $v['order_id'];?>" class="mm_geren_dingdan_daizhifu" target="_blank">上传回执单</a>
                        <?php
							}elseif($v['is_quzhan'] == 1 && $v['is_pay'] == 1){
						?>
                        <a href="javascript:;" class="mm_geren_dingdan_daizhifu" target="_blank">已上传回执单</a>
						<?php
							}
						?>
                    </div>
                </div>
            </div>
			<?php
				}
			?>
            
            <!-- 页码 -->
            <div class="mm_yema">
                <?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(e) {
        jQuery(".J-quxiao").on('click',function(){
			if(confirm('您确定要取消订单吗？')){
				var orderId = jQuery(this).data('order-id');
				var areaId = jQuery(this).data('convention-area');
				jQuery.post('/user/order/option/cancel/',{'order_id':orderId,'area_id':areaId},function(data){
					if(data.success){
						window.location.reload();
					}else{
						alert('取消失败');
					}
				},'json');		
			}
			
		});
		
		jQuery(".J-remove").on('click',function(){
			if(confirm('您确定要删除订单吗？')){
				var orderId = jQuery(this).data('order-id');
				jQuery.post('/user/order/option/remove/',{'order_id':orderId},function(data){
					if(data.success){
						window.location.reload();
					}else{
						alert('删除失败');
					}
				},'json');		
			}
			
		});
		
		jQuery(".J-queren").on('click',function(){
			if(confirm('点击确认收货后，款项将汇到商家，您确定吗？')){
				var orderId = jQuery(this).data('order-id');
				jQuery.post('/user/order/option/gathering/',{'order_id':orderId},function(data){
					if(data.success){
						window.location.reload();
					}else{
						alert('取消失败');
					}
				},'json');		
			}
			
		});
    });
</script>
<?php include $this->Render('footer.php'); ?>