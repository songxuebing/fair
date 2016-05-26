<!-- 8.31 -->
<!-- 导航 -->

<div class="head-v3">
    <div class="navigation-up">
        <div class="navigation-inner">
            <div class="navigation-v3">
                <ul>
                    <li class="nav-up-selected-inpage" _t_nav="home">
                        <h2>
                            <a href="<?php echo WEB_URL;?>/index/index">首页</a>
                        </h2>
                    </li>
                    <li class="" _t_nav="product">
                        <h2>
                            <a href="<?php echo WEB_URL;?>/convention/index">热门展会</a>
                        </h2>
                    </li>
                    <li class="" _t_nav="wechat">
                        <h2>
                            <a href="<?php echo WEB_URL;?>/route/index">行程预定</a>
                        </h2>
                    </li>
                    <li class="" _t_nav="solution">
                        <h2>
                            <a href="<?php echo WEB_URL;?>/visa/index">国际签证</a>
                        </h2>
                    </li>
                    <li class="" _t_nav="cooperate">
                        <h2>
                            <a href="<?php echo WEB_URL;?>/logistics/index">国际物流</a>
                        </h2>
                    </li>
                    <li class="" _t_nav="support">
                        <h2>
                            <a href="<?php echo WEB_URL;?>/decoration/index">特装服务</a>
                        </h2>
                    </li>
                    <li class="">
                        <h2>
                            <a href="<?php echo WEB_URL;?>/forum/index">新闻资讯</a>
                        </h2>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="navigation-down">
        <div id="product" class="nav-down-menu menu-1" style="display: none;" _t_nav="product">
            <div class="mm_nav_xiala">
                <div>
                    <?php
						if(!empty($this->nav)) foreach($this->nav as $k=>$v){
					?>
					<dl>
						<dt><?php echo $v['name'];?></dt>
						<?php
							if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
						?>
						<dd><a href="<?php echo WEB_URL;?>/convention/index/industry/<?php echo $val['name'];?>"><?php echo $val['name'];?></a></dd>
						<?php
							}
						?>
					</dl>
					<?php
						}
					?>
                </div>
            </div>
        </div>
        <div id="wechat" class="nav-down-menu menu-1" style="display: none;" _t_nav="wechat">
            <div class="notice">
                <div class="tab-hd">
                    <ul class="tab-nav">
						<?php
							if(!empty($this->delta)) foreach($this->delta as $k=>$v){
								echo '<li>'.$v['name'].'</li>';
							}
						?>
                    </ul>
                </div>
                <div class="tab-bd">
					<?php
						if(!empty($this->delta)) foreach($this->delta as $k=>$v){
					?>
                    <div class="tab-pal">
                        <ul>
							<?php
								if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
							?>
                            <li><a href="<?php echo WEB_URL;?>/route/index/country/<?php echo $val['name'];?>"><?php echo $val['name'];?></a></li>
							<?php
								}
							?>
                        </ul>
                    </div>
					<?php
						}
					?>
                </div>
            </div>
        </div>
        <div id="solution" class="nav-down-menu menu-3 menu-1" style="display: none;" _t_nav="solution">
            <div class="notice">
                <div class="tab-hd">
                    <ul class="tab-nav">
						<?php
							if(!empty($this->delta)) foreach($this->delta as $k=>$v){
								echo '<li>'.$v['name'].'</li>';
							}
						?>
                    </ul>
                </div>
                <div class="tab-bd">
					<?php
						if(!empty($this->delta)) foreach($this->delta as $k=>$v){
					?>
                    <div class="tab-pal">
                        <ul>
							<?php
								if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
							?>
                            <li><a href="<?php echo WEB_URL;?>/visa/index/country/<?php echo $val['name'];?>"><?php echo $val['name'];?></a></li>
							<?php
								}
							?>
                        </ul>
                    </div>
					<?php
						}
					?>
                </div>
            </div>
        </div>
        <div id="support" class="nav-down-menu menu-3 menu-1" style="display: none;" _t_nav="support">
            <div class="notice">
                <div class="tab-hd">
                    <ul class="tab-nav">
						<?php
							if(!empty($this->delta)) foreach($this->delta as $k=>$v){
								echo '<li>'.$v['name'].'</li>';
							}
						?>
                    </ul>
                </div>
                <div class="tab-bd">
					<?php
						if(!empty($this->delta)) foreach($this->delta as $k=>$v){
					?>
                    <div class="tab-pal">
                        <ul>
							<?php
								if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
							?>
                            <li><a href="<?php echo WEB_URL;?>/decoration/index/country/<?php echo $val['name'];?>"><?php echo $val['name'];?></a></li>
							<?php
								}
							?>
                        </ul>
                    </div>
					<?php
						}
					?>
                </div>
            </div>
        </div>
        <div id="cooperate" class="nav-down-menu menu-3 menu-1" style="display: none;" _t_nav="cooperate">
            <div class="notice">
                <div class="tab-hd">
                    <ul class="tab-nav">
						<?php
							if(!empty($this->delta)) foreach($this->delta as $k=>$v){
								echo '<li>'.$v['name'].'</li>';
							}
						?>
                    </ul>
                </div>
                <div class="tab-bd">
					<?php
						if(!empty($this->delta)) foreach($this->delta as $k=>$v){
					?>
                    <div class="tab-pal">
                        <ul>
							<?php
								if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
							?>
                            <li><a href="<?php echo WEB_URL;?>/logistics/index/country/<?php echo $val['name'];?>"><?php echo $val['name'];?></a></li>
							<?php
								}
							?>
                        </ul>
                    </div>
					<?php
						}
					?>
                </div>
            </div>
        </div>
        <div id="shequ" class="nav-down-menu menu-3 menu-1" style="display: none;" _t_nav="shequ">
            <div class="notice">
                <div class="tab-hd">
                    <ul class="tab-nav">
                    </ul>
                </div>
                <div class="tab-bd">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript">jQuery(".notice").slide({ titCell:".tab-hd li", mainCell:".tab-bd",delayTime:0 });</script>
<script type="text/javascript">jQuery(".TB-focus").slide({ mainCell:".bd ul",effect:"fold",autoPlay:true,delayTime:200 });</script>
<script type="text/javascript">
jQuery(document).ready(function(){
    var qcloud={};
    jQuery('[_t_nav]').hover(function(){
        var _nav = jQuery(this).attr('_t_nav');
        clearTimeout( qcloud[ _nav + '_timer' ] );
        qcloud[ _nav + '_timer' ] = setTimeout(function(){
        jQuery('[_t_nav]').each(function(){
        jQuery(this)[ _nav == jQuery(this).attr('_t_nav') ? 'addClass':'removeClass' ]('nav-up-selected');
        });
        jQuery('#'+_nav).stop(true,true).slideDown(200);
        }, 150);
    },function(){
        var _nav = jQuery(this).attr('_t_nav');
        clearTimeout( qcloud[ _nav + '_timer' ] );
        qcloud[ _nav + '_timer' ] = setTimeout(function(){
        jQuery('[_t_nav]').removeClass('nav-up-selected');
        jQuery('#'+_nav).stop(true,true).slideUp(200);
        }, 150);
    });
	jQuery('.tab ul.menu li').click(function(){
        //获得当前被点击的元素索引值
        var Index = jQuery(this).index();
        //给菜单添加选择样式
        jQuery(this).addClass('active').siblings().removeClass('active');
        //显示对应的div
        jQuery('.tab').children('div').eq(Index).show().siblings('div').hide();
   
   });
});
</script>
