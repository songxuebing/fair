<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>订单详情</h5>
        <a href="javascript:history.go(-1);">返回上一页</a>
    </div>
    <div class="ms_seach clearfix">
        <span>共有订单<?php echo $this->data['One'];?>条记录</span>
		<form action="/convention/order/" method="post">
        <div class="ms_seach1 fr">
            <input type="text" name="order_sn"  class="ms_seach1_text" placeholder="输入订单编号搜索">
            <input type="submit" value="订单搜索" class="ms_seach1_button">
        </div>
		</form>
    </div>
    <div>
        <div class="mm_zh_dingdan_title">
            <ul class="clearfix">
                <li>订单信息</li>
                <li>实付金额</li>
                <li>交易明细</li>
                <li>下单时间</li>
                <li>交易状态</li>
            </ul>
        </div>
        <?php
        	if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
		?>
        <div class="mm_zh_dingdan_con">
            <ul class="clearfix">
                <li>
                    <dl>
                        <dt><img src="<?php echo Common::AttachUrl($v['con_cover']);?>!a200" width="90" height="90"></dt>
                        <dd>
                            <h6 style=" display:inline-block; width:260px; height:18px; overflow:hidden;margin-bottom:6px;"><a target="_blank" href="<?php echo WEB_URL;?>/convention/index/option/order/detailid/<?php echo $v['detail']['con_detail']['detail_id'];?>" style="color:#666;"><?php echo $v['con_name'];?></a></h6>
                            <p>行业分类：<?php echo $v['detail']['con_detail']['con_detail']['industry'];?></p>
                            <p>展会时间：<?php echo date('Y-m-d',$v['detail']['con_detail']['start_time']);?> 至 <?php echo date('Y-m-d',$v['detail']['con_detail']['end_titme']);?></p>
                        </dd>
                    </dl>
                </li>
                 <?php
					if($v['order_row']['advance'] > 0 && $v['order_row']['order_state'] == 4 && $v['order_row']['is_pay'] == 1){
				?>
				<li><em>￥<?php echo $v['order_row']['price'];?></em><font color="#c41230">尾款金额：￥<?php echo $v['order_row']['price'] - $v['order_row']['advance'];?></font></li>
				<?php
					}else{
				?>
                <li><em>￥<?php echo $v['order_row']['price'];?></em></li>
                <?php
					}
				?>
                <li>
                	<?php
                    	if($v['order_row']['advance'] > 0){
					?>
                	<i>已付订金：<?php echo $v['order_row']['advance'];?></i>
                    <i>待付尾款：<?php echo $v['order_row']['price'] - $v['order_row']['advance'];?></i>
					<?php
						}else{
					?>
                    <i>全款：<?php echo $v['order_row']['price'];?></i>
                    <?php 
						}
					?>
					
                
                </li>
                <li><div><?php echo date('Y-m-d H:i:s',$v['datetime']);?></div></li>
                <li><span class="<?php echo $v['status']['class'];?>"><?php echo $v['status']['text'];?></span></li>
                
            </ul>
            <div class="mm_zh_dingdancon">
                <p>订单编号 : <?php echo $v['order_row']['order_sn'];?></p>
                
                <div>
                    <?php if($v['order_row']['order_state'] == 0){?>
                    <a href="#" class="mm_zh_dingdan_xiugai J-mm_tan_xia" data-detailid="<?php echo $v['id'];?>">修改金额</a>
					<?php }elseif($v['order_row']['order_state'] == 1){?>
					<a href="<?php echo MEMBER_URL;?>/public/common/option/contract/sn/<?php echo $v['order_row']['order_sn'];?>" class="mm_zh_dingdan_xiugai" target="_blank">下载合同</a>
					<?php }?>
                    <a href="/convention/order/option/detail/id/<?php echo $v['id'];?>" class="mm_zh_dingdan_detail" target="_blank">订单详情</a>
                </div>
            </div>
        </div>
     	<?php
			}
		?>
        
        <!-- 页码 -->
        <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
			<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
        </div>
        
        <!-- 弹出删除 -->
        <div class="mm_tanchu_shanchu" id="mm_xiajia">
            <h4>请输入修改后金额！</h4>
            <p><input type="text" name="editmoney" class="J-editmoney"></p>
            <div>
                <a href="javascript:void(0);" class="J-quxiao">取消</a>
                <a href="javascript:void(0);" class="J-queding">确定</a>
            </div>
        </div>
        
    </div>
</div>
<input type="hidden" class="J-detailid" name="detailid" />
<!--底部-->
<script type="text/javascript">
	jQuery(".J-mm_tan_xia").on('click',function(){
		var detailid = jQuery(this).data('detailid');
		jQuery(".J-detailid").val(detailid);
		jQuery("#mm_xiajia").show();		
	});
	
	jQuery("#mm_xiajia").on('click','.J-quxiao',function(){
		jQuery("#mm_xiajia").hide();	
	});
	
	jQuery("#mm_xiajia").on('click','.J-queding',function(){
		var id = jQuery(".J-detailid").val();
		var money = jQuery(".J-editmoney").val();
		jQuery.post('/convention/order/option/changeprice/',{'id':id,'money':money},function(data){
			if(data.success){
				window.location.reload();
			}else{
				alert(data.msg);
			}
		
		},'json');
		
			
	});
</script>
<?php include $this->Render('footer.php'); ?>
