<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<!-- 展会资讯 -->
<div class="mm_mid clearfix">
    <div class="mm_hot_left fl">
        <div class="mm_shequ" style="margin-top:0;">
            <div class="mm_sqzx_left fl">
                <div id="ifocus">
                    <div id="ifocus_pic">
                        <div id="ifocus_piclist">
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
                        <div id="ifocus_opdiv"></div>
                        <div id="ifocus_tx">
                            <ul>
								<?php
									if(!empty($this->loop_adv)) foreach($this->loop_adv as $k=>$v){
								?>
                                <li><a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a></li>
								<?php
									}
								?>
                            </ul>
                        </div>
                    </div>
                    <div id="ifocus_btn">
                        <ul>
							<?php
								if(!empty($this->loop_adv)) foreach($this->loop_adv as $k=>$v){
							?>
                            <li><img src="<?php echo $v['file'];?>"></li>
							<?php
								}
							?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mm_shequ_right fr mm_sqzx_right">
                <div class="mm_sqzx_title">展会资讯</div>
                <ul>
					<?php
						if(!empty($this->new['All'])) foreach($this->new['All'] as $k=>$v){
					?>
                    <li>
                        <h5><a href="/forum/detail/id/<?php echo $v['id'];?>" style="color:#333"><?php echo $v['title'];?></a></h5>
                        <p><?php echo StringCode::GetCsubStr($v['content'],0,30);?></p>
                    </li>
					<?php
						}
					?>
                </ul>
            </div>
        </div>
    </div>
    <div class="mm_sqzx fr">
        <div class="mm_sqzx_fatie">
            <a href="/forum/index/option/edit">我要发帖</a>
        </div>
        <div class="mm_hot_right" style="margin-top:20px; height:357px;">
            <div class="tab">
                <ul class="menu">
                    <li class="active">热门资讯</li>
                    <li>活跃排名</li>
                </ul>
                <div class="con1" id="J-new-news">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
                <div class="con2" id="J-new-newsuser">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
            </div>
        </div>
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
		
			jQuery.get('/public/index/option/news',{'output':'json','limit':4},function(data){
				var bt=baidu.template;
				var html=bt('new-news',data);
				document.getElementById('J-new-news').innerHTML=html;
			
			},'json');
			
			jQuery.get('/public/index/option/newsuser',{'output':'json','limit':4},function(data){
				var bt=baidu.template;
				var html=bt('new-newsuser',data);
				document.getElementById('J-new-newsuser').innerHTML=html;
			
			},'json');
			
		</script>
    </div>
</div>
<!-- ad -->
<div class="mm_mid mm_ad02">
    <script src="/public/adv/option/image/id/28"></script>
</div>
<!-- 热门板块 -->
<div class="mm_mid clearfix">
    <div class="mm_sqzx_renmen_left fl">
		<?php
			if(!empty($this->pic['All'])) foreach($this->pic['All'] as $k=>$v){
		?>
        <div class="mm_sqzx_renmen_left_detail">
            <h2><a style="color:#000;" href="/forum/detail/id/<?php echo $v['id'];?>" target="_blank"><?php echo $v['title'];?></a></h2>
            <div class="mm_sqzx_renmen_left_fenxiang">
                <span><?php echo date('Y-m-d H:i:s',$v['dateline']);?></span>
                <ul>
                    <li class="mm_shoucang001"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_shoucang01.png"><?php echo $v['favcount'];?></li>
                    <li><a href="javascript:;" style="cursor:default"><?php echo $v['comment'];?></a></li>
                    <li><a href="#">分享</a></li>
                </ul>
            </div>
            <div class="mm_sqzx_renmen_left_detail_con">
                <img src="<?php echo $v['cover'];?>" width="780">
                <p><?php echo StringCode::GetCsubStr($v['content'],0,150);?></p>
                <a href="/forum/detail/id/<?php echo $v['id'];?>" target="_blank">查看全文&gt;</a>
            </div>
        </div>
		<?php
			}
		?>
    </div>
    <div class="mm_sqzx_renmen_right fr">
        <div class="mm_sqzx_seach clearfix">
			<form action="/forum/list/" method="post" name="search">
            <input type="text" name="key" class="mm_sqzx_seach_input01">
            <input type="submit" value="搜索" class="mm_sqzx_seach_input02">
			</form>
        </div>
        <div class="mm_sqzx_rmbk">
            <div class="mm_sqzx_rmbk_title">
                <h6>热门板块</h6>
            </div>
            <ul class="clearfix">
				<?php
					if(!empty($this->hot_cat)) foreach($this->hot_cat as $k=>$v){
				?>
                <li>
                    <a href="/forum/list/id/<?php echo $v['id'];?>">
                        <img src="<?php echo $v['icon'];?>" width="28" height="28">
                        <span><?php echo $v['name'];?></span>
                    </a>
                </li>
				<?php
					}
				?>
            </ul>
        </div>
        <div class="mm_sqzx_shouyi">
            <ul class="clearfix">
                <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_sqzx_lvse.png"><span>今日：<em><?php echo $this->count['today'];?></em></span></li>
                <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_sqzx_lanse.png"><span>昨日：<em><?php echo $this->count['yestoday'];?></em></span></li>
            </ul>
        </div>
        <div class="mm_sqzx_shouyi">
            <ul class="clearfix">
                <li><span>帖子：<em><?php echo $this->count['fourm_total'];?></em></span></li>
                <li><span>会员：<em><?php echo $this->count['member_total'];?></em></span></li>
            </ul>
        </div>
        <div>
            <script src="/public/adv/option/image/id/29"></script>
        </div>
    </div>
</div>
<!-- 纺织/服饰/鞋革 -->
<?php
	if(!empty($this->forum_cat)) foreach($this->forum_cat as $k=>$v){
		if($v['name'] == '知识'){
			continue;
		}
?>
<div class="mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h6><?php echo $v['name'];?></h6>
    </div>
    <div class="mm_xiefu clearfix">
		<?php
			if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
		?>
        <dl>
            <dt><img src="<?php echo $val['icon'];?>" width="39" height="39"></dt>
            <dd>
                <h6><a href="/forum/list/id/<?php echo $val['id'];?>" style="color:#333"><?php echo $val['name'];?></a></h6>
                <p>
                    <span>主题：<?php echo $val['forum_count'];?></span>
                    <span>贴数：<?php echo $val['comment_count'];?></span>
                </p>
            </dd>
        </dl>
		<?php
			}
		?>
    </div>
</div>
<?php
	}
?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript">
        //大图滚动
        jQuery("#ifocus").slide({ titCell:"#ifocus_btn li", mainCell:"#ifocus_piclist ul",effect:"left", delayTime:200, autoPlay:true,triggerTime:0});
        //文字切换
        jQuery("#ifocus").slide({ titCell:"#ifocus_btn li", mainCell:"#ifocus_tx ul",delayTime:0, autoPlay:true});
</script>
<?php include $this->Render('links.php'); ?>
<?php include $this->Render('footer.php'); ?>
<?php die();?>