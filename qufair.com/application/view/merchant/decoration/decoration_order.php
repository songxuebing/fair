<?php include $this->Render('header.php'); ?>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>订单详情</h5>
        <a href="javascript:history.go(-1);">返回上一页</a>
    </div>
    <div class="ms_seach clearfix">
        <span>共有订单<?php echo $this->data['One'];?>条记录</span>
		<form action="/decoration/order/" method="post" name="search">
        <div class="ms_seach1 fr">
            <input type="text" name="key" class="ms_seach1_text" placeholder="输入订单编号搜索">
            <input type="submit" value="订单搜索" class="ms_seach1_button">
        </div>
		</form>
    </div>
    <div>
        <div class="mm_zh_dingdan_title">
            <ul class="clearfix">
                <li>订单信息</li>
                <li>特装面积/立方</li>
                <li>实付金额</li>
                <li>下单时间</li>
                <li>交易状态</li>
            </ul>
        </div>
		<?php
			if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){
		?>
        
        <div class="mm_zh_dingdan_con">
            <ul class="clearfix">
                <li>
                    <dl>
                        <dt><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200" width="90" height="90"></dt>
                        <dd>
                            <h6><?php echo $v['detail']['title'];?></h6>
                            <p>服务城市：<?php echo $v['detail']['de_city'];?></p>
                            <p>擅长行业：<?php echo $v['detail']['de_industry'];?></p>
                        </dd>
                    </dl>
                </li>
                <li><div><?php echo $v['detail']['proportion'];?></div></li>
                <li><em>￥<?php echo $v['order_row']['price'];?></em></li>
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
                    <a href="/decoration/order/option/detail/id/<?php echo $v['id'];?>" class="mm_zh_dingdan_detail" target="_blank">订单详情</a>
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
		jQuery.post('/decoration/order/option/changeprice/',{'id':id,'money':money},function(data){
			if(data.success){
				window.location.reload();
			}else{
				alert(data.msg);
			}
		
		},'json');
		
			
	});
</script>
<?php include $this->Render('footer.php'); ?>