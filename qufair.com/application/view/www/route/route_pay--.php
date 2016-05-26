<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/route/index/">行程预定</a>&gt;
        <a href="/route/index/option/detai/id/<?php echo $this->route['id'];?>"><?php echo $this->route['name'];?></a>
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
            <dt><img src="<?php echo Common::AttachUrl($this->route['cover']);?>!a200" width="160" height="160"></dt>
            <dd class="mm_xingcheng_dingdan">
                <h3><?php echo $this->route['name'];?> </h3>
                <ul>
                    <li>出发时间：<p><?php echo date('Y-m-d',$this->route['leave_time']);?> 至 <?php echo date('Y-m-d',$this->route['end_time']);?></p></li>
                    <li>赶往展馆: <?php echo $this->route['pavilion'];?></li>
                    <li>出发地点: <?php echo $this->route['leave_area'];?><div>酒店类型：<i><?php echo $this->route['hotel_star'];?>星级</i></div></li>
                    <li><span><em>￥<?php echo $this->route['price'];?></em>/人</span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>定展信息确认</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>单位名称: <?php echo $this->data['receiving']['company_name'];?></li>
            <li>单位地址: <?php echo $this->data['receiving']['company_address'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->data['receiving']['contacter'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->data['receiving']['tel'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->data['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->data['receiving']['mobile'];?></li>
            <li>电子邮件: <?php echo $this->data['receiving']['email'];?></li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li><?php echo $this->data['remarks'];?></li>
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
			<!--
            <li>
                <input type="radio">
                <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu02.jpg">
            </li>
            <li>
                <input type="radio" name="pay_type" value="lianlian" checked="checked">
                <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu03.jpg">
            </li>
			-->
			<!--针对支付宝银行代码设置-->
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
<?php include $this->Render('links.php'); ?>
<?php include $this->Render('footer.php'); ?>