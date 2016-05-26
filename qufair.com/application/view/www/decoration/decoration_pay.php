<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/decoration/index/">特装服务</a>&gt;
        <a href="/decoration/index/option/detai/id/<?php echo $this->data['de_id'];?>"><?php echo $this->data['de_title'];?></a>
    </div>
    <div class="mm_gjwl_dingdan_title" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu.png);">
        <ul>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_tijiao01.png">提交订单</li>
            <li class="mm_gjwl_dingdan_color"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_zhifu02.png">支付金额</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_wancheng01.png">支付成功</li>
        </ul>
    </div>
    
    <div class="mm_tezhuang_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->data['detail']['cover']);?>!a200" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->data['de_title'];?> </h3>
                <p>面积大小：<span><?php echo $this->data['detail']['proportion'];?>平方</span></p>
                <p>装修风格：<img src="<?php echo Common::AttachUrl($this->data['de_style']['style_img']);?>" width="44" height="44"></p>
                <p>价&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->data['price'];?></em><i>/套</i></p>
            </dd>
        </dl>
    </div>
    
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>信息确认</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>单位名称: <?php echo $this->data['receiving']['company'];?></li>
            <li>单位地址: <?php echo $this->data['receiving']['address'];?></li>    
            <li>展会名称: <?php echo $this->data['receiving']['convention_name'];?></li>
            <li>展馆名称: <?php echo $this->data['receiving']['pavilion_name'];?></li>
            <li>展会时间: <?php echo $this->data['receiving']['convention_time'];?></li>
            <li>展&nbsp;位&nbsp;&nbsp;号: <?php echo $this->data['receiving']['area_name'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->data['receiving']['username'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->data['receiving']['mobile'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->data['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->data['receiving']['tel'];?></li>
            <li>电子邮件: <?php echo $this->data['receiving']['email'];?></li>
        </ul>
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
				<input type="radio" name="bankcode" value="CCBBTB" checked="checked"> 建设银行企业网银
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
<?php include $this->Render('links_decoration.php'); ?>
<?php include $this->Render('footer.php'); ?>
