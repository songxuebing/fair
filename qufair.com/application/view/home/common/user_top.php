<!-- 个人中心顶部 -->
<div class="mm_geren_jine clearfix">
    <dl class="mm_geren_mingcheng fl">
        <dt>
        	<?php
            	if(empty($this->menberInfo['avatar'])){
			?>
        	<img src="/user/avatar/" width="88" height="88">
        	<?php
				}else{
			?>
            <img src="<?php echo Common::AttachUrl($this->menberInfo['avatar']);?>!a200" width="88" height="88">
            <?php
				}
			?>
        </dt>
        <dd>
            <h6><?php echo $this->menberInfo['username'];?></h6>
            <?php
            	if(!empty($this->menberInfo['mobile'])){
			?>
            <p>手机号：<span><?php echo $this->menberInfo['mobile'];?></span></p>
            <?php
				}
			?>
        </dd>
    </dl>
    <dl class="mm_geren_jin fr">
        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_jine.png"></dt>
        <dd>
            <h6 style="padding-top:12px;">余额：<span>￥<?php echo $this->menberInfo['money'];?>元</span></h6>
            <!--<a href="#">我要充值</a>-->
        </dd>
    </dl>
</div>