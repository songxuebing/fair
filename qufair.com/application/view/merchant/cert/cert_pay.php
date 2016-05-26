<?php include $this->Render('header.php'); ?>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
	<form action="/cert/step/option/paysubmit/" method="post" name="pay" id="pay">
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3><?php echo $this->type_row['type_name'];?>认证</h3>
        </div>
        <div class="ms_right_liucheng">
            <ul class="clearfix" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_liucheng03.png)">
                <li>1&nbsp;同意协议</li>
                <li>2&nbsp;填写资料</li>
                <li class="mm_right_liucheng_hover">3&nbsp;免费入驻</li>
                <li>4&nbsp;等待审核</li>
                <li>5&nbsp;核对金额</li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>订单信息</h6>
        </div>
        <div class="ms_renzheng">
            <ul>
                <li>
                    <dl>
                        <dt><img src="<?php echo STYLE_URL.'/style/quzhan'.$this->type_row['type_icon'];?>"></dt>
                        <dd>
                            <h5><?php echo $this->type_row['type_name'];?></h5>
                        </dd>
                        <dd>
                            <p><?php echo $this->type_row['type_msg'];?></p>
                        </dd>
                    </dl>
                    <span>￥<?php echo $this->type_row['cost'];?>元</span>
                </li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>选择支付方式</h6>
        </div>
        <div class="mm_zhifufangshi">
            <ul class="clearfix">
                <li style="display:none">
                    <input type="radio" name="pay_type" value="lianlian">
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/mm_zhifu03.jpg">
                </li>
                <li style="display:none">
                    <input type="radio" name="pay_type" value="alipay" checked="checked">
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/mm_zhifu01.jpg">
                </li>
				<!--针对支付宝银行代码设置-->
				<li>
					<input type="radio" name="bankcode" value="ICBCBTB" checked="checked"> 工商银行企业网银
				<li>
				<li>
					<input type="radio" name="bankcode" value="ABCBTB"> 农业银行企业网银
				<li>
				<li>
					<input type="radio" name="bankcode" value="CCBBTB"> 建设银行企业网银
				<li>
				<li>
					<input type="radio" name="bankcode" value="SPDBBTB"> 浦发银行企业网银
				<li>
				<li>
					<input type="radio" name="bankcode" value="BOCBTB"> 中国银行企业网银
				<li>
				<li>
					<input type="radio" name="bankcode" value="CMBBTB"> 招商银行企业网银
				<li>
            </ul>
        </div>
        <div class="ms_zhifu_queren clearfix" style=" bottom:inherit;">
            <p>认证服务:<span><?php echo $this->type_row['cost'];?></span><i>元</i></p>
            <a href="javascript:void(0);" onClick="do_submit();">立即支付</a>
        </div>
    </div>
	<input type="hidden" name="tpid" value="<?php echo $this->type_row['type_id'];?>">
	</form>
</div>
<div class="J-alert" style="display:<?php echo $this->supplier_cert['pay_status'] == 0 ? 'none' : 'block';?>">
	<div class="J-backwall" style="width:100%; height:100%; position:absolute; z-index:99; top:0; left:0; right:0; bottom:0; background:#999999; opacity: 0.5;  filter:alpha(opacity=50);  -moz-opacity:0.5; -khtml-opacity: 0.5;"></div>
	<!-- 付款成功弹出框，转到链接:dengdaishenhe.html-->
	<div class="mm_hdje_tanchu J-tanchu" style="display:block; left:40%; top:25%;">
		<dl>
			<dd>
				<h4>恭喜你！付款成功</h4>
				<p>请等待<i>2-3</i>个工作日的审核，请你耐心等待</p>
			</dd>
		</dl>
		<div class="ms_hdje_hedui" id="ms_fabu">
			<a href="/cert/step/option/audit/tpid/<?php echo $this->type_row['type_id'];?>">确定</a>
		</div>
	</div>
</div>
<!--底部-->
<script type="text/javascript">
	function do_submit(){
		jQuery("#pay").submit();
	}
	jQuery(document).ready(function(){
		var $wobj = jQuery(window),
			winHeight = $wobj.height(),
			bodyHeight = jQuery(document).height();
		
		if(bodyHeight > winHeight){
			jQuery(".J-backwall").height(bodyHeight);
		}else{
			jQuery(".J-backwall").height(winHeight);
		}
		
			
	});
</script>
<?php include $this->Render('footer.php'); ?>