<?php
    $webtitle = $this->data['title'].' - 去展网';
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<!-- 内容 -->
<div class="mm_mid clearfix mm_mar20">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/forum/index/">新闻资讯</a>&gt;
        <a href="/forum/detail/id/<?php echo $this->data['id'];?>"><?php echo $this->data['title'];?></a>
    </div>
    
<!-- 左边 -->
    <div class="mm_sqzx_detail fl mm_mar20">
        <h2><?php echo $this->data['title'];?></h2>
        <i>发&nbsp;&nbsp;布&nbsp;者 : <?php echo empty($this->member['company']) ? $this->member['username'] : $this->member['company'];?></i>

        <div class="mm_sqzx_renmen_left_fenxiang bdsharebuttonbox">
            <span style="font-size:12px !important;">发布时间：<?php echo date('Y-m-d H:i:s',$this->data['dateline']);?></span>

            <span style="padding-left: 50px; font-size:12px !important;">阅读量：<?php echo (500 + $this->data['clicks'] * 21);?></span>

            <!--<ul>
                <li class="mm_shoucang001 J-mm-guanzhu <?php echo $this->fav['check'] == 1 ? 'on' : '';?>" style="cursor:pointer"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/<?php echo $this->fav['check'] == 1 ? 'mm_shoucang02.png' : 'mm_shoucang01.png';?>"><em><?php echo $this->data['favcount'];?></em></li>
                <li><a href="#" style="height:19px;"><?php echo $this->eva['One'];?></a></li>
                <li><a href="#" class="bds_more" data-cmd="more" style="height:18px;">分享</a></li>
            </ul>-->

        </div>
        <style type="text/css">
        	.mm_sqzx_detail_con p {
				color:#000;
			}
			.mm_sqzx_detail_con p span {
				color:#000;
			}
            .headTab {
                border-bottom: 1px solid #dcdcdc;
                display: inline-block;
                height: 45px;
                margin-bottom: 25px;
                padding-top: 10px;
                text-align: right;
                width: 100%;
            }
            .headTab li {
                border-bottom: 1px solid #ff9900;
                float: left;
                height: 35px;
                line-height: 35px;
                position: relative;
                text-align: left;
                width: 78px;
            }

            .headTab li a {
                color: #444;
                font-size: 18px;
                margin: 0;
                padding: 0;
                position: static;
                cursor: pointer;
                outline-style: none;
                text-decoration: none;
            }
            .read_end{
                border-bottom: 1px dashed #e5e5e5;
                display: inline-block;
                height: 45px;
                margin-bottom: 25px;
                padding-top: 10px;
                text-align: right;
                width: 100%;
            }
            .Read li {
                float: left;
                height: 103px;
                margin-bottom: 28px;
                margin-right: 40px;
                margin-top: 22px;
                width: 345px;
            }
            .Read li img {
                float: left;
                height: 103px;
                margin-right: 23px;
                width: 140px;
            }
            .Read li .righttxt h4 a {
                color: #333;
                display: inline-block;
                font-size: 15px;
                line-height: 26px;
                width: 165px;
            }

            .Read li .righttxt span {
                display: inline-block;
                margin-right: 13px;
                margin-top: 24px;
            }
            .Read li .righttxt {
                float: left;
                width: 120px;
            }
            .chapter {
                height: 52px;
                border-top: 1px solid #e0e0e0;
                border-bottom: 1px solid #e0e0e0;
                font-size: 14px;
                margin-bottom: 34px;
                margin-top: 10px;
            }
            .chapter .prepage{
                border-right:1px solid #dcdcdc;
                width:50%;
                margin-top:13px;
            }
            .chapter .prepage,.chapter .nextpage{
                float:left;
                height:30px;
            }
            .chapter .nextpage{float:right;margin-top:17px;margin-right:10px;}
            .chapter .prepage span{margin-top:4px;display:inline-block;}
            .chapter .prepage span,.chapter .nextpage span{
                color:#01a13d;
            }
            .chapter .prepage a,.chapter .nextpage a{
                font-size:14px;
                color:#666;
                width:264px;
                display: inline-block;
                vertical-align: top;
            }
            .chapter .prepage a:hover,.chapter .nextpage a:hover{
                color:#33b353;
            }
            .statement{
                padding-top:20px;
                padding-bottom:20px;
            }
            .statement p{
                font-size:16px;
                font-family:'Microsoft YaHei';
            }
        </style>
        <div class="mm_sqzx_detail_con">
            <p style="color:#000;"><?php echo $this->data['content'];?></p>
        </div>

<div class="statement">
<p>注明，文章为去展网原创，欢迎转载！转载请注明本文地址，谢谢。</p>
<p>本文地址：<a href="<?php echo $url?>"><?php echo $url;?></a></p>
</div>


        <!--<p style="text-align:right;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ewm.jpg"/></p>-->
        <div class="mm_sqzx_renmen_left_fenxiang bdsharebuttonbox">
        	
            <span style="font-size:12px !important;">发布时间：<?php echo date('Y-m-d H:i:s',$this->data['dateline']);?></span>
            <ul>
                <li class="mm_shoucang001 J-mm-guanzhu <?php echo $this->fav['check'] == 1 ? 'on' : '';?>" style="cursor:pointer"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/<?php echo $this->fav['check'] == 1 ? 'mm_shoucang02.png' : 'mm_shoucang01.png';?>"><em><?php echo $this->data['favcount'];?></em></li>
                <li><a href="#" style="height:19px;"><?php echo $this->eva['One'];?></a></li>
                <li><a href="#" class="bds_more" data-cmd="more" style="height:18px;">分享</a></li>
				<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["tsina","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            </ul>
        </div>
        <!--上下篇-->
        <?php
        if(!empty($this->up_down)){?>
        <div class="chapter">

            <div class="prepage">
                                <span>
                                    上一篇：
                                    <?php if(!empty($this->up_down['last'])) {
                                        echo '<a class="oew" href="/news/'.date('Y/m/d', $this->up_down['last'][0]['dateline']).'/'.$this->up_down['last'][0]['id'].'.shtml">'.StringCode::GetCsubStr($this->up_down['last'][0]['title'],0,15).'</a>';
                                    }
                                    else{
                                       echo '<a class="oew">无</a>';
                                     }?>
                                </span>
            </div>
            <div class="nextpage">
                                <span>
                                    下一篇：
                                    <?php if(!empty($this->up_down['down'])) {
                                        echo '<a class="oew" href="/news/'.date('Y/m/d', $this->up_down['down'][0]['dateline']).'/'.$this->up_down['down'][0]['id'].'.shtml">'.StringCode::GetCsubStr($this->up_down['down'][0]['title'],0,15).'</a>';
                                    }
                                    else{
                                        echo '<a class="oew">无</a>';
                                    }?>
                                </span>
            </div>

        </div>
        <?php }?>

        <!--相关阅读-->
        <?php if(!empty($this->relevant_eva)){?>
        <div class="headTab headEq2">
            <ul><li><a>相关阅读</a></li></ul>
        </div>
        <div class="Read">
            <ul>
                <?php
                foreach($this->relevant_eva as $key=>$value_re){?>
                <li>
                    <a href="/news/<?php echo date('Y/m/d', $value_re['dateline']).'/'.$value_re['id'];?>.shtml" target="_blank">
                        <img src="<?php echo $value_re['cover']?>">
                    </a>
                    <div class="righttxt">
                        <h4 style="height:42px"><a href="/news/<?php echo date('Y/m/d', $value_re['dateline']).'/'.$value_re['id'];?>.shtml" target="_blank">
                                <?php echo StringCode::GetCsubStr($value_re['title'],0,22);?></a>
                        </h4>
                        <span><?php echo date('Y-m-d', $value_re['dateline'])?></span>
                    </div>
                </li>
                <?php }?>

            </ul>
        </div>
    <?php }?>
        <div class="read_end"></div>

        <div class="mm_sqzx_fabu clearfix">
			<form action="/public/common/" class="AjaxForm brand" method="post" autocomplete="off">
            <div>
                <img src="<?php echo Common::AttachUrl($this->menberInfo['avatar']);?>!a200" width="60" height="60" style="float:left;">
                <textarea name="message"></textarea>
            </div>
			<input type="submit" name="Submit" value="发表评论">
			<input type="hidden" name="is_type" value="7">
			<input type="hidden" name="ajax" value="1">
			<input type="hidden" name="con_id" value="<?php echo $this->data['id'];?>">
			<input type="hidden" name="option" value="commentsave">
			<input type="hidden" name="yesfn" value="sucessCallback();">
			<input type="hidden" name="nofn" value="nofunction()">
			<input type="hidden" name="beforefn" value="beforefunction()">
			</form>
        </div>
        <div class="mm_zhanhui_ping">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>全部评论</h6>
                <span><?php echo $this->eva['One'];?>条评论</span>
            </div>
            <?php
            	if(!empty($this->eva['All'])) foreach($this->eva['All'] as $kk => $value){
			?>
            <dl class="clearfix">
            
                <dt><img src="<?php echo Common::AttachUrl($value['memberInfo']['avatar']);?>!a200" width="60" height="60"></dt>
                <dd>
                    <h6><?php echo $value['memberInfo']['username'];?><span><?php echo date('Y-m-d',$value['add_time']);?></span></h6>
                    <p><?php echo $value['message'];?></p>
                </dd>
				<style type="text/css">
					.mm_zan span {
						background:url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_zan01.png) no-repeat;
					}
					.mm_zan span.on {
						background:url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_zan02.png) no-repeat;
					}
					.mm_zan a {
						color:#999;
					}
					.mm_zan a.on {
						color:#ff4a00;
					}
				</style>
                <div class="mm_zan J-mm-zan" data-comment-id="<?php echo $value['eva_id'];?>">
					<span style="display:inline-block; width:20px; height:20px; vertical-align:bottom;" class="<?php echo $value['is_praise'] == 1 ? 'on' : '';?>"></span>
					<a href="javascript:;" class="<?php echo $value['is_praise'] == 1 ? 'on' : '';?>">(<?php echo $value['praise'];?>)</a>
				</div>
            </dl>
            <?php
				}
			?>
			<div style="width:100%; height:35px; margin-top:35px; text-align:right;">
				<?php echo empty($this->eva['Page']) ? '' : $this->eva['Page'];?>
			</div>
        </div>
    </div>
    <!-- 右边 -->
    <div class="mm_zhanhui_right fr" style="margin-bottom:20px;">
		<!--广告位-->
		<div style="display:block; text-align:center; margin-top:15px;"><script src="/public/adv/option/image/id/39"></script></div>
        <div style="display:block; text-align:center; margin-top:15px;"><script src="/public/adv/option/image/id/40"></script></div>
        <!--   
		<a href="#" style="display:block; text-align:center; margin-top:15px;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/test_03.png" /></a>
		<a href="#" style="display:block; text-align:center; margin-top:15px;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/test_04.png" /></a>
		-->
				
        <!-- 物流推荐   展装推荐 -->
        <div class="mm_hot_right mm_margin" style="border:none;">
            <div class="tab">
                <ul class="menu">
                    <li class="active">热门资讯</li>
                    <li style="display:none;">活跃排名</li>
                </ul>
                <div class="con1" id="J-new-news">
					<div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
				<!--
                <div class="con2" id="J-new-newsuser">
					<div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
				-->
            </div>
        </div>
        <!-- 展位推荐 -->
        <div class="mm_hot_right mm_margin" style="display:none;">
            <div class="tab1">
                <ul class="menu1">
                    <li class="active1">展位推荐</li>
                </ul>
                <div class="con3" id="J-new-zhanghui">
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
		<script id="new-zhanghui" type="text/html">
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
			
			jQuery.get('/public/index/option/data',{'output':'json','type':'convention'},function(data){
				var bt=baidu.template;
				var html=bt('new-zhanghui',data);
				document.getElementById('J-new-zhanghui').innerHTML=html;
			
			},'json');
		</script>
        <!-- ad -->
        <divc class="mm_zhanhui_ad">
            <script src="/public/adv/option/image/id/30"></script>
            <script src="/public/adv/option/image/id/31"></script>
        </div>
    </div>  
</div>
<script type="text/javascript">
	jQuery(function(){
		jQuery('.J-mm-guanzhu').on('click',function(){
			var $this = jQuery(this);
			var flag = null;
			if($this.hasClass('on')){//已经关注
				flag = 0; //取消关注
			}else{
				flag = 1; //关注
			}
			
			jQuery.post('/public/common/option/favorite/',{'sort':7,'related_id':<?php echo $this->data['id'];?>},function(data){ //state状态 
				if(data.success){
					if(flag == 1){
						$this.addClass('on');
						$this.find('img').attr('src','<?php echo STYLE_URL;?>/style/quzhan/images/mm_shoucang02.png');
					}else{
						$this.removeClass('on');
						$this.find('img').attr('src','<?php echo STYLE_URL;?>/style/quzhan/images/mm_shoucang01.png');
					}
					$this.find('em').html(data.count);
				}else{
					alert(data.msg);
				}
			},'json');
			
		});	
		//点赞
		jQuery('.J-mm-zan').on('click',function(){
			var $this = jQuery(this),
				spanObj = $this.find('span'),
				comment_id = $this.data('comment-id');
			var flag = null;
			if(spanObj.hasClass('on')){//已经点赞
				flag = 0; //取消点赞
			}else{
				flag = 1; //点赞
			}
			
			jQuery.get('/public/common/option/praise',{'comment_id':comment_id},function(data){//state 状态 
				if(data.success){
					if(flag == 1){
						$this.find('span').addClass('on');
						$this.find('a').addClass('on');
					}else{
						$this.find('span').removeClass('on');
						$this.find('a').removeClass('on');
					}
					$this.find('a').html('('+data.count+')');
				}else{
					alert('点赞失败');
				}
			},'json');
			
		});
	});
	function beforefunction(){
		jQuery("input[name='Submit']").val('提交中…');	
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('发布评论');
	}
	
	function sucessCallback(){
		window.location.href = window.location.href;
	}
</script>
<?php //include $this->Render('links_forum.php'); ?>
<?php include $this->Render('footer.php'); ?>
<?php die();?>
