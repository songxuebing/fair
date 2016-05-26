<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/visa/index/">国际签证</a>&gt;
        <a href="/visa/index/option/detai/id/<?php echo $this->data['visa_id'];?>"><?php echo $this->data['visa_name'];?></a>
    </div>
    <div class="mm_gjwl_dingdan_title" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu.png);">
        <ul>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_tijiao01.png">提交订单</li>
            <li class="mm_gjwl_dingdan_color"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_zhifu02.png">支付金额</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_wancheng01.png">支付成功</li>
        </ul>
    </div>
    <div class="mm_gjwl_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->data['visa_cover']);?>!a200" width="160" height="160"></dt>
            <dd class="mm_xingcheng_dingdan">
                <h3><?php echo $this->data['visa_name'];?> </h3>
                <ul>
                    <li>签证领区：<?php echo $this->data['visa_area'];?></li>
                    <li>签证类型: <?php echo $this->data['pro_type'];?></li>
                    <li>产品类型: <?php echo $this->data['visa_type'];?></li>
                    <li><span><em>￥<?php echo $this->data['visa_price'];?></em>/人 </span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>签证信息确认</h6>
    </div>
    <?php
    	if(!empty($this->visa_member)) foreach($this->visa_member as $key => $val){
	?>
    <div class="mm_gjqz_zhifu">
        <p>
            <em><?php echo($key + 1);?>,</em>
            <span>真实姓名 : <?php echo $val['username'];?></span>
            <span>证件类型 : (<?php echo $val['cert_type'];?>)<?php echo $val['cert_msg'];?></span>        
            <span>手机号码 : <?php echo $val['tel'];?></span> 
        </p>
    </div>
    <?php
		}
	?>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>收货地址确认</h6>
    </div>
    
    <div class="mm_gjqz_zhifu">
        <p>
            <span>收货人姓名 : <?php echo $this->data['receiving']['add_username'];?></span>
            <span>所在地区 :<?php echo $this->data['receiving']['ship_province'];?><?php echo $this->data['receiving']['ship_city'];?><?php echo $this->data['receiving']['ship_area'];?><?php echo $this->data['receiving']['add_address'];?></span>        
            <span>手机号码 : <?php echo $this->data['receiving']['add_tel'];?></span> 
            <span>电话号码 : <?php echo $this->data['receiving']['add_mobile'];?></span> 
        </p>
    </div>
    
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>备注信息: <?php echo $this->data['remarks'];?></li>
        </ul>
    </div>
    
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>选择支付方式</h6>
    </div>
	<form action="/pay/index/" method="post" name="pay" id="pay">
    <div class="mm_zhifufangshi">
        <ul class="clearfix">
            <li style=" display:none;">
                <input type="radio" name="pay_type" value="alipay" checked="checked">
                <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu01.jpg">
            </li>

			<!--针对支付宝银行代码设置-->
            <!--
            <li>
				<input type="radio" name="bankcode" checked="checked" value="CCBBTB"> 建设银行企业网银
			<li>
			<li>
				<input type="radio" name="bankcode" value="ICBCBTB"> 工商银行企业网银
			<li>
			<li>
				<input type="radio" name="bankcode" value="ABCBTB"> 农业银行企业网银
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
            -->
            <li>
                <input type="radio" name="bankcode" id="CCBBTB" value="CCBBTB" checked>
                <label for="CCBBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/jianhang.jpg" alt="建设银行企业网银" width="132" height="40"></label>
            </li>
            <li>
                <input type="radio" name="bankcode" id="ICBCBTB" value="ICBCBTB">
                <label for="ICBCBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/gongshang.jpg" alt="工商银行企业网银" width="132" height="40"></label>
            </li>
            <li>
                <input type="radio" name="bankcode" id="ABCBTB" value="ABCBTB">
                <label for="ABCBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/nongye.jpg" alt="农业银行企业网银" width="132" height="40"></label>
            </li>
            <li>
                <input type="radio" name="bankcode" id="SPDBBTB" value="SPDBBTB">
                <label for="SPDBBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/pufa.jpg" alt="浦发银行企业网银" width="132" height="40"></label>
            </li>
            <li>
                <input type="radio" name="bankcode" id="BOCBTB" value="BOCBTB">
                <label for="BOCBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/zhongguo.jpg" alt="中国银行企业网银" width="132" height="40"></label>
            </li>
            <li>
                <input type="radio" name="bankcode" id="CMBBTB" value="CMBBTB">
                <label for="CMBBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/zhaoshang.jpg" alt="招商银行企业网银" width="132" height="40"></label>
            </li>
        </ul>
        
    </div>
    <div class="mm_gjwl_tijiao">
        <span>总计费用：<em><?php echo $this->order_row['price'];?></em>元</span>
        <span>共计人数：<i><?php echo $this->data['nums'];?></i>人</span>
        <a href="javascript:void(0);" onClick="do_submit();">确认支付</a>
    </div>
	<input type="hidden" name="sn" value="<?php echo $this->data['order_sn'];?>" />
	</form>
</div>
<script type="text/javascript">
	function do_submit(){
		jQuery("#pay").submit();
	}
</script>
<?php include $this->Render('links_visa.php'); ?>
<?php include $this->Render('footer.php'); ?>
