<div class="fullSlide">
	
    <div class="bd">
        <ul class="J-banner">
        	<?php echo $this->script;?>
        </ul>
    </div>
    
    <div class="hd"><ul></ul></div>
    <?php 
		if($this->Controller =='index'){
	?>
    <!-- 登录框 -->
    <div class="mm_deng J-mm-deng" >
        <div class="mm_mid" style=" position:relative;">
        	<a class="J-banner-link" target="_blank" style=" display:block; width:100%; height:360px; position:absolute; z-index:auto; top:0; left:0; bottom:0; right:0;" href=""></a>
            <div class="mm_denglu1 fr" style="filter:alpha(opacity=90); -moz-opacity:0.9; opacity:0.9;">
                <!-- 登录前 -->
				<?php
					if(empty($this->UserConfig['Id'])){
				?>
                <div class="mm_user">
                    <dl>
                        <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_touxiang.jpg"></dt>
                        <dd>Hi!请登录</dd>
                    </dl>
                    <div>
                        <a href="/login/index/">登录</a>
                        <a href="/register/index/">注册</a>
                    </div>
                </div>
				<?php
					}else{
				?>
                <!-- 登陆后 -->
                <div class="mm_user">
                    <dl>
                        <dt><img src="<?php echo Common::AttachUrl($this->menberInfo['avatar']);?>!a200" width="66" onclick="window.location.href='<?php echo MEMBER_URL;?>/user/index/';" style="cursor:pointer"></dt>
                        <dd>Hi!<?php echo $this->UserConfig['Name'];?></dd>
                    </dl>
                    <div>
                        <a href="/login/Logout/option/refer" class="mm_tui">退出</a>
                    </div>
                </div>
				<?php
					}
				?>
                
                
                <!-- 分类 -->
                <div class="mm_fenlei1">
                    <dl>
                        <a href="<?php echo MEMBER_URL;?>/user/favorite/" target="_blank">
                            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_banner_icon01.png"></dt>
                            <dd>关注行业</dd>
                        </a>
                    </dl>
                    <dl>
                        <a href="<?php echo MEMBER_URL;?>/user/order/" target="_blank">
                            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_banner_icon02.png"></dt>
                            <dd>订单管理</dd>
                        </a>
                    </dl>
                    <dl>
                        <a href="<?php echo MEMBER_URL;?>/user/index/" target="_blank">
                            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_banner_icon03.png"></dt>
                            <dd>个人资料</dd>
                        </a>
                    </dl>
                    <dl>
                        <a href="<?php echo MEMBER_URL;?>/user/message/" target="_blank">
                            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_banner_icon04.png"></dt>
                            <dd>站内资讯</dd>
                        </a>
                    </dl>
                    <dl>
                        <a href="<?php echo MEMBER_URL;?>/user/index/" target="_blank">
                            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_banner_icon05.png"></dt>
                            <dd>账户余额</dd>
                        </a>
                    </dl>
                    <dl>
                        <a href="/about/index/id/4" target="_blank">
                            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_banner_icon06.png"></dt>
                            <dd>帮助中心</dd>
                        </a>
                    </dl>
                </div>

            </div>
            
        </div>
    </div>
    <?php
		}
	?>
</div>

<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(e) {
    var href = jQuery(".J-banner").find('a:eq(0)').attr('href');
	
	jQuery(".J-banner-link").attr("href",href);
});
jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click", endFun:function(i,c){
	var href = jQuery(".J-banner").find('a:eq('+i+')').attr('href');
	
	jQuery(".J-banner-link").attr("href",href);
	
} });

jQuery(".J-mm-deng").on('click',function(){
	
	jQuery(".J-banner-link").click();
});
</script>
