<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<style type="text/css">
	.mm_tezhuang a img{
		margin-right:5px;
	}
</style>
<?php include $this->Render('nav.php'); ?>
<!-- banner -->
<?php include $this->Render('slide.php'); ?>
<!-- 热门展位 -->
<div class="mm_mid clearfix">
    <div class="mm_hot_left fl">
        <div class="mm_title clearfix">
            <h2>热门展位</h2>
            <span>已有5000家企订到理想的展位</span>
            <a href="/convention/index/">更多&gt;</a>
        </div>
        <div class="mm_hot clearfix">
            <?php
				if(!empty($this->hot_con['All'])) foreach($this->hot_con['All'] as $k=>$v){
			?>
			<dl>
                <dt><a href="/convention/index/option/order/detailid/<?php echo $v['detail_id'];?>"><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200" border="0"></a></dt>
                <dd>
                    <a href="/convention/index/option/order/detailid/<?php echo $v['detail_id'];?>"><?php echo $v['name'];?></a>
                </dd>
                <dd>
                    <span><i><?php echo $v['focus_number'];?></i>人关注</span>
                    <em>
					<?php
						for($i=1;$i<=$v['rating_number'];$i++){
					?>
					<img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
					<?php
						}
					?>
					<?php echo StringCode::numberToChar($v['rating_number']);?>星</em>
                </dd>
            </dl>
			<?php
				}
			?>
        </div>
    </div>
    <!--
    <div class="mm_hot_right fr">
        <div class="mm_zuixin_title">
            <h2>最新交易</h2>
        </div>
        <div class="mm_zuixin" id="J-new-trading">
            <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
        </div>
    </div>
    -->
    <!-- 改动 -->
    <style type="text/css">
		
    	/*滚动*/
		.txtScroll-top{ width:260px;  overflow:hidden; position:relative; }
		.txtScroll-top .infoList li{ height:56px; border-bottom:1px solid #d9d9d9; margin-top:15px;}
		.txtScroll-top .infoList li:last-child{ border:none;}
		.txtScroll-top .infoList li a{ font-size:14px; color:#333; display:block; margin-bottom:4px; width:260px; text-overflow:ellipsis; overflow:hidden; white-space:nowrap;}
		.txtScroll-top .infoList li span{ display:block; font-size:12px; color:#999; width:260px; text-overflow:ellipsis; overflow:hidden; white-space:nowrap;}
    </style>
    <div class="mm_hot_right fr">
        <div class="mm_zuixin_title">
            <h2>最新动态</h2>
        </div>    
        <div class="mm_zuixin" style="overflow:hidden;height:340px;">
            <div class="txtScroll-top">
                <div class="m_bd">
                    <ul class="infoList">
                    	<?php
                        	if(!empty($this->entrust['All'])) foreach($this->entrust['All'] as $kk => $vv){
						?>
                        <li><a href="/forum/detail/id/<?php echo $vv['id'];?>" target="_blank"><?php echo StringCode::GetCsubStr($vv['title'],0,17);?></a><span><?php echo StringCode::GetCsubStr($vv['content'],0,25);?></span></li>
                        <?php
							}
						?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   
</div>

<!-- 2015-12-28 -->
<style type="text/css">
.index_xuqiu{
	font-size: 0;
	margin-top: 20px;
}
.index_xuqiu_left{
	float: left;
	width: 780px;
	margin-right: 20px;
	border: 1px solid #d9d9d9;
}
.index_xuqiu_left>img{
	float: left;
}
.index_input{
	float: left;
	width: 643px;
	padding: 10px;
	background: #f5f5f5;
	height: 98px;
}
.index_input textarea{
	width: 486px;
	background: #fff;
	height: 80px;
	border: none;
	font-size: 14px;
	line-height: 20px;
	padding: 5px;
	margin-left: 10px;
	color: #666;
	outline: none;
}
.index_input .chazhao-buttom{
	display:block;
	width: 100px;
	height: 80px;
	text-align: center;
	line-height: 80px;
	color: #fff;
	background: #ff4a00;
	font-size: 16px;
	margin-left: 20px;
	border: none;
	border-radius: 5px;
	outline: none;
	float:right;
}
.index_xuqiu_ad{
	float: right;
	width: 300px;
	height: 100px;
}
.index_xuqiu_ad img{
	width: 300px;
	height: 100px;
}

</style>
<div class="index_xuqiu mm_mid clearfix">
    <div class="index_xuqiu_left">
        <img src="<?php echo STYLE_URL;?>/style/quzhan/images/2.png" width="135" height="100">
        <div class="index_input">
            <textarea class="J-zhanwei-txt" placeholder="你有什么需求"></textarea>
            <a class="chazhao-buttom" target="_blank" href="/entrust/index/">发布需求</a>
        </div>
    </div>
    <div class="index_xuqiu_ad">
        <script src="/public/adv/option/image/id/38"></script>
    </div>
</div>

<!-- 社区资讯 -->
<div class="mm_mid clearfix">
    <div class="mm_hot_left fl">
        <div class="mm_title clearfix">
            <h2>新闻资讯</h2>
            <span>已为50002658家企业提供装修服务</span>
            <a href="/forum/index/">更多&gt;</a>
        </div>
        <div class="mm_shequ">
            <div class="mm_shequ_left fl">
                <div class="TB-focus">
                    <div class="hd">
                        <ul>
							<?php
								if(!empty($this->loop_adv)) foreach($this->loop_adv as $k=>$v){
							?>
                            <li></li>
							<?php
								}
							?>
                        </ul>
                    </div>
                    <div class="bd">
                        <ul>
							<?php
								if(!empty($this->loop_adv)) foreach($this->loop_adv as $k=>$v){
							?>
                            <li><a href="<?php echo $v['url'];?>" target="_blank"><img src="<?php echo $v['file'];?>" width="342" height="342" /></a></li>
							<?php
								}
							?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mm_shequ_right fr">
                <ul>
					<?php
						if(!empty($this->new['All'])) foreach($this->new['All'] as $k=>$v){
					?>
                    <li>
                        <h5><a href="/forum/detail/id/<?php echo $v['id'];?>" style="color:#333" target="_blank"><?php echo $v['title'];?></a></h5>
                        <p><?php echo StringCode::GetCsubStr($v['content'],0,30);?></p>
                    </li>
					<?php
						}
					?>
                </ul>
            </div>
        </div>
    </div>
    <div class="mm_hot_right fr">
        <div class="tab">
            <ul class="menu">
                <li class="active">热门资讯</li>
                <li style="display:none;">活跃排名</li>
            </ul>
            <div class="con1" id="J-new-news">
                <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
            </div>
            <div class="con2" id="J-new-newsuser" style="display:none;">
                <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
            </div>
        </div>
    </div>
</div>
<!-- ad -->
<div class="mm_mid mm_ad02">
    <script src="/public/adv/option/image/id/3"></script>
    <span style="float:right"><script src="/public/adv/option/image/id/4"></script></span>
</div>
<!-- 特装推荐 -->
<div class="mm_mid clearfix">
    <div class="mm_title clearfix">
        <h2>特装推荐</h2>
        <span>已为5000家企业提供装修服务</span>
        <a href="/decoration/index/">更多&gt;</a>
    </div>
    <div class="clearfix">
		<?php
			if(!empty($this->recommend)) foreach($this->recommend as $k=>$v){
		?>
        <div class="mm_tezhuang">
            <dl>
                <a href="/decoration/index/option/detail/id/<?php echo $v['id'];?>">
                    <dt><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200" width="76" height="76"></dt>
                    <dd>
                        <h6><?php echo $v['member']['company'];?></h6>
                        <p>服务：<em><?php echo $v['de_industry'];?></em></p>
                        <div>
                            <span>面积：<i><?php echo $v['proportion'];?></i>平方</span>
                            <span>评论：<i><?php echo $v['comment'];?></i>个</span>
                        </div>
                    </dd>
                </a>
            </dl>
            <div>
            <h5>装修风格</h5>
			<?php
				if(!empty($v['style_type'])) foreach($v['style_type'] as $key=>$val){
					if(empty($val) || $key > 3){
						break;
					}
			?>
            <img src="<?php echo Common::AttachUrl($val);?>!a200" width="73" height="73">
			<?php

				}
			?>
            </div>
        </div>
		<?php }?>
    </div>
</div>
<!-- 热销商户排行榜 -->
<!--
<div class="mm_mid">
    <div class="mm_title clearfix">
        <h2>热销商户排行榜</h2>

    </div>
    <div class="mm_rexiao clearfix">
        <ul class="mm_rexiao_title">
            <li class="mm_active">展位服务商</li>
            <li>行程服务商</li>
            <li>签证服务商</li>
            <li>物流服务商</li>
            <li>特装服务商</li>
        </ul>
        <div class="mm_rexiao_con1 mm_rexiao_con">
			<?php
				if(!empty($this->hot_con_men)) foreach($this->hot_con_men as $k=>$v){
			?>
            <dl>
                <a href="<?php echo $v['link'];?>">
                    <dt><img src="<?php echo Common::AttachUrl($v['seller']['avatar']);?>!a200" width="260" height="212"></dt>
                    <dd><?php echo $v['seller']['company'];?></dd>
                </a>
            </dl>
			<?php
				}
			?>
        </div>
        <div class="mm_rexiao_con2 mm_rexiao_con">
			<?php
				if(!empty($this->hot_con_route)) foreach($this->hot_con_route as $k=>$v){
			?>
            <dl>
                <a href="<?php echo $v['link'];?>">
                    <dt><img src="<?php echo Common::AttachUrl($v['seller']['avatar']);?>!a200" width="260" height="212"></dt>
                    <dd><?php echo $v['seller']['company'];?></dd>
                </a>
            </dl>
			<?php
				}
			?>
        </div>
        <div class="mm_rexiao_con3 mm_rexiao_con">
			<?php
				if(!empty($this->hot_con_visa)) foreach($this->hot_con_visa as $k=>$v){
			?>
            <dl>
                <a href="<?php echo $v['link'];?>">
                    <dt><img src="<?php echo Common::AttachUrl($v['seller']['avatar']);?>!a200" width="260" height="212"></dt>
                    <dd><?php echo $v['seller']['company'];?></dd>
                </a>
            </dl>
			<?php
				}
			?>
        </div>
        <div class="mm_rexiao_con4 mm_rexiao_con">
			<?php
				if(!empty($this->hot_con_logistics)) foreach($this->hot_con_logistics as $k=>$v){
			?>
            <dl>
                <a href="<?php echo $v['link'];?>">
                    <dt><img src="<?php echo Common::AttachUrl($v['seller']['avatar']);?>!a200" width="260" height="212"></dt>
                    <dd><?php echo $v['seller']['company'];?></dd>
                </a>
            </dl>
			<?php
				}
			?>
        </div>
        <div class="mm_rexiao_con5 mm_rexiao_con">
			<?php
				if(!empty($this->hot_con_decoration)) foreach($this->hot_con_decoration as $k=>$v){
			?>
            <dl>
                <a href="<?php echo $v['link'];?>">
                    <dt><img src="<?php echo Common::AttachUrl($v['seller']['avatar']);?>!a200" width="260" height="212"></dt>
                    <dd><?php echo $v['seller']['company'];?></dd>
                </a>
            </dl>
			<?php
				}
			?>
        </div>
    </div>
</div>
-->
<!-- 智能推荐 -->
<div class="mm_mid">
    <div class="mm_title clearfix">
        <h2>智能推荐</h2>
        <!-- <span>已为50002658家企业提供装修服务</span>
        <a href="#">更多&gt;</a> -->
    </div>
    <div class="mm_zhineng clearfix">
		<?php
			if(!empty($this->intelligent))  foreach($this->intelligent as $k=>$v){
		?>
        <dl>
            <a href="/convention/index/option/order/detailid/<?php echo $v['detail_id'];?>">
                <dt><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200"></dt>
                <dd>
                    <h5 style="overflow:hidden;"><?php echo $v['name'];?></h5>
                    <p>
                        <?php echo $v['pavilion'];?>
                        <span><?php echo date('Y-m-d',$v['start_time']);?>&nbsp;&nbsp;<?php echo date('Y-m-d',$v['end_titme']);?></span>
                    </p>
                </dd>
            </a>
        </dl>
		<?php
			}
		?>
    </div>
</div>
<script id="new-trading" type="text/html">
	<!--循环数据-->
	<%if(All.length>0) { %>
		<%for( var i=0; i<All.length; i++){%>
		<dl>
			<a href="<%=All[i]['url']%>">
				<dt><img src="<%=All[i]['avatar']%>" width="42" height="42"></dt>
				<dd style="width:249px;">
					<h6><%=All[i]['username']%></h6>
					<p style="height:20px; overflow:hidden"><%=All[i]['goods_name']%></p>
				</dd>
			</a>
		</dl>
		<%}%>
	<%}%>
</script>

<script id="new-news" type="text/html">
	<!--循环数据-->
	<%if(All.length>0) { %>
		<%for( var i=0; i<All.length; i++){%>
			<dl>
				<a href="<%=All[i]['link']%>">
					<dt><img src="<%=All[i]['image']%>" width="42" height="42"></dt>
					<dd>
						<h6><%=All[i]['name']%></h6>
						<p><%=All[i]['desc']%></p>
					</dd>
				</a>
			</dl>  
		<%}%>
	<%}%>
</script>

<script id="new-newsuser" type="text/html">
	<!--循环数据-->
	<%if(All.length>0) { %>
		<%for( var i=0; i<All.length; i++){%>
			<dl>
				<a href="<%=All[i]['link']%>">
					<dt><img src="<%=All[i]['image']%>" width="42" height="42"></dt>
					<dd>
						<h6><%=All[i]['name']%></h6>
						<p><%=All[i]['desc']%></p>
					</dd>
				</a>
			</dl>
		<%}%>
	<%}%>
</script>

<script type="text/javascript">
jQuery.get('/public/index/option/trading',{'output':'json'},function(data){
	var bt=baidu.template;
	var html=bt('new-trading',data);
	document.getElementById('J-new-trading').innerHTML=html;
},'json');
jQuery.get('/public/index/option/news',{'output':'json'},function(data){
	var bt=baidu.template;
	var html=bt('new-news',data);
	document.getElementById('J-new-news').innerHTML=html;

},'json');

jQuery.get('/public/index/option/newsuser',{'output':'json'},function(data){
	var bt=baidu.template;
	var html=bt('new-newsuser',data);
	document.getElementById('J-new-newsuser').innerHTML=html;

},'json');
</script>
<?php include $this->Render('links.php'); ?>
<script type="text/javascript">
jQuery(document).ready(function(e) {
	// 热销商户排行榜
	jQuery('.mm_rexiao_title li').click(function(){
        //获得当前被点击的元素索引值
        var Index = jQuery(this).index();
        //给菜单添加选择样式
        jQuery(this).addClass('mm_active').siblings().removeClass('mm_active');
        //显示对应的div
        jQuery('.mm_rexiao').children('div').eq(Index).show().siblings('div').hide();
   
   });
   // tab
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
<script type="text/javascript">jQuery(".TB-focus").slide({ mainCell:".bd ul",effect:"fold",autoPlay:true,delayTime:200 });</script>

<script type="text/javascript">
jQuery(".txtScroll-top").slide({titCell:".m_hd ul",mainCell:".m_bd ul",autoPage:true,effect:"top",autoPlay:true,vis:5});
</script>
<!--
<script type="text/javascript">
    function browserRedirect() {
        var sUserAgent = navigator.userAgent.toLowerCase();
        var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
        var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
        var bIsMidp = sUserAgent.match(/midp/i) == "midp";
        var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
        var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
        var bIsAndroid = sUserAgent.match(/android/i) == "android";
        var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
        var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";

        if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
            window.location.href = 'http://m.qufair.com';
        } else {
            
        }

    }
    browserRedirect();  
</script> 
-->
<?php include $this->Render('footer.php');die();?>