<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 国际签证提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/logistics/index/">国际物流</a>
    </div>
    <div class="mm_gjwl_dingdan_title" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_wancheng.png);">
        <ul>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_tijiao01.png">提交订单</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_zhifu01.png">支付金额</li>
            <li class="mm_gjwl_dingdan_color"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_wancheng02.png">支付成功</li>
        </ul>
    </div>
    <div class="mm_wancheng">
        <span><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dui.png">恭喜你！支付成功</span>
        <a href="<?php echo MEMBER_URL;?>'/user/order/'">去订单中心查看</a>
    </div>
</div>
<?php include $this->Render('links_logistics.php'); ?>
<?php include $this->Render('footer.php'); ?>
