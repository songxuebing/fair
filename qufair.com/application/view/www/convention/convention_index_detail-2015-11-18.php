<?php
	$webtitle = $this->data['info']['name'].' - 去展网'
?>
<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/showPic.js"></script>
<!-- 详情 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="#">首页</a>&gt;
        <a href="#"><?php echo $this->data['info']['industry'];?></a>&gt;
        <a href="#"><?php echo $this->data['info']['name'];?></a>
    </div>
    <div class="mm_zh_detail clearfix">
        <div class="mm_zh_detail_left fl">
            <!-- 轮播 -->
            <div class="examples_body">
                <div class="examples_bg">
                    <div class="examples_image J-examples_image">
                        <img src="<?php echo Common::AttachUrl($this->data['info']['cover']);?>!a200" alt="" style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/loading.gif) no-repeat 50% 50%;" />
                    </div>
                    <div class="mune_thumb J-mune_thumb">
                        <ul>
                            <li class="active">
                                <a data-href="<?php echo Common::AttachUrl($this->data['info']['cover']);?>!a200" href="javascript:;"><img src="<?php echo Common::AttachUrl($this->data['info']['cover']);?>!a200" alt="Image Name" style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/loading.gif) no-repeat 50% 50%;" /></a>
                            </li>
                            <?php
                            	if(!empty($this->data['info']['imgarr'])) foreach($this->data['info']['imgarr'] as $k => $v){
									
									if(!empty($v)){
							?>
                            <li>
                                <a data-href="<?php echo Common::AttachUrl($v);?>!a200" href="javascript:;"><img src="<?php echo Common::AttachUrl($v);?>!a200" alt="Image Name" /></a>
                            </li>
                            <?php
									}
								
								}
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mm_zh_detail_right fr">
            <h2><?php echo $this->data['info']['name'];?> </h2>
            <ul class="mm_zhanhui001">
                <li>
                	<?php
						$rating_number = empty($this->data['info']['rating_number']) ? 1 : $this->data['info']['rating_number'];
						for($i=0; $i < $rating_number; $i++){
							echo('<img src="'.STYLE_URL.'/style/quzhan/images/mm_star01.png">');	
						}
						
						$ratingArr = array('一星','二星','三星','四星','五星');
					?>
                	<i><?php echo $ratingArr[$rating_number - 1]?></i>
                
                </li>
                
                
                <li>举办展馆：<?php echo $this->data['detail']['pavilion'];?></li>
 
                <li>所属行业：<?php echo $this->data['info']['industry'];?></li>

                <li>展会国家：<?php echo $this->data['info']['regional'];?>—<?php echo $this->data['info']['countries'];?>—<?php echo $this->data['info']['city'];?></li>
                <li style="display:none;">
                    <span>展会面积：<?php echo $this->data['info']['con_area'];?></span>

                    <span>展会规格：<?php echo $this->data['info']['con_standard'];?></span>

                </li>
                
                <li>
                    <span>展会面积：<?php echo $this->data['info']['area'];?></span>

                    <span>客商流量：<?php echo empty($this->data['info']['audience_size']) ? '' : $this->data['info']['audience_size'].'人';?></span>
     
                    <span>展商数量：<?php echo empty($this->data['info']['exhibitors_number']) ? '' : $this->data['info']['exhibitors_number'].'家';?></span>

                </li>
            </ul>
            <div class="clearfix">
                
				<style type="text/css">
					.mm_guanzhu em {
						background:url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_guanzhu01.png) no-repeat;
					}
					.mm_guanzhu em.on {
						background:url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_guanzhu02.png) no-repeat;
					}
					
				</style>
				<div class="mm_guanzhu J-mm-guanzhu">
					<em style="display:inline-block; width:23px; height:20px; vertical-align:middle; margin-left:5px;" class="<?php echo $this->fav['check'] == 1 ? 'on' : '';?>"></em>
                    <span>&nbsp;&nbsp;关注（<?php echo $this->fav['count'];?>）</span>
                </div>

                <div class="mm_fenxiang">
                    <span>分享&nbsp;</span>&nbsp;
                    <div class="bdsharebuttonbox" style="display:inline-block; float:right; padding-top:5px;"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["tsina","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(function(){
	jQuery('.J-mm-guanzhu').on('click',function(){
		var $this = jQuery(this),
			emObj = $this.find('em');
		var flag = null;
		if(emObj.hasClass('on')){//已经关注
			flag = 0; //取消关注
		}else{
			flag = 1; //关注
		}
		
		jQuery.post('/public/common/option/favorite/',{'sort':1,'related_id':<?php echo $this->data['info']['id'];?>},function(data){ //state状态 
			if(data.success){
				if(flag == 1){
					$this.find('em').addClass('on');
				}else{
					$this.find('em').removeClass('on');
				}
				$this.find('span').html('&nbsp;&nbsp;关注（'+data.count+'）');
			}else{
				alert(data.msg);
			}
		},'json');
		
	});
});
</script>


<!-- 内容 -->
<div class="mm_mid clearfix">
    <!-- 左边 -->
    <div class="mm_zhanhui_left fl">
    	<div style="margin-bottom:20px;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/convention.png" /></div>
        <!-- 展位供应商 -->
        <div class="mm_zhanhui_left_title">
            <h4>展位供应商</h4>
            <a href="#">更多展位供应商&gt;</a>
        </div>
        <div class="mm_zhanhui_shangjia clearfix">
            <?php
            	if(!empty($this->data['All'])) foreach($this->data['All'] as $key => $val){
			?>
            <div class="mm_zhanhui_sahngjia_left clearfix">
                <dl>
                    <dt><img src="<?php echo Common::AttachUrl($val['memberInfo']['avatar']);?>!a200" width="126" height="126"></dt>
                    <dd>
                        <h4><?php echo $val['memberInfo']['company'];?></h4>
                        <p>提供展区：
                        	<?php if(!empty($val['area_name'])) foreach($val['area_name'] as $vv){
									echo $vv['area_name'];
								}
							?>
                        </p>
                        <p>服务范围：<?php echo $val['memberInfo']['company_service'];?></p>
                        <div>
                        	<?php
                            	$rating_number = empty($val['rating_number']) ? 1 : $val['rating_number'];
								for($i=0; $i < $rating_number; $i++){
									echo('<img src="'.STYLE_URL.'/style/quzhan/images/mm_star01.png">');	
								}
								
								$ratingArr = array('一星','二星','三星','四星','五星');
							?>
                            
                            <i>&nbsp;&nbsp;<?php echo $ratingArr[$rating_number - 1]?></i>
                        </div>
                    </dd>
                </dl>
                <div class="mm_zhanhui_jiage">
                    <span>价格</span>
                    <p>￥<?php echo $val['area']['booth_price'];?>元</p>
                    <a href="/convention/index/option/order/detailid/<?php echo $val['detail_id'];?>">立即订展</a>
                </div>
            </div>
            <?php
				}
			?>
            
        </div>
        <div class="mm_zhanhui_left_title">
            <a href="#" class="mm_zhanhui_gengduo">更多展位供应商</a>
        </div>
        <div class="mm_zhanhui_left_title">
            <h4>展会描述</h4>
        </div>
        <div class="mm_zhanhui_con">
            <?php
            	echo $this->data['info']['describe'];
			?>
        </div>
        <div class="mm_zhanhui_left_title">
            <h4>上届回顾</h4>
        </div>
        <div class="mm_zhanhui_con">
            <?php
            	echo $this->data['info']['review'];
			?>
        </div>
        <div class="mm_zhanhui_left_title">
            <h4>展会范围</h4>
        </div>
        <div class="mm_zhanhui_con">
            <?php
            	echo $this->data['info']['scope'];
			?>
        </div>
        <div class="mm_zhanhui_left_title">
            <h4>客户点评</h4>
        </div>
        <div class="mm_zhanhui_con1 clearfix">
            <form action="/public/common/" class="AjaxForm brand" method="post" autocomplete="off">
            <div class="clearfix">
                <p class="starWrapper J-starWrapper">
                    <span>综合评价：</span> 
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="1" title="很差" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="2" title="一般" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="3" title="不错" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="4" title="好评" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="5" title="非常好" />
                    <i>非常好</i>
                    <input type="hidden" name="eva_number" value="1">
                </p>
                <p class="starWrapper J-starWrapper">
                    <span>展会服务：</span> 
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="1" title="很差" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="2" title="一般" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="3" title="不错" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="4" title="好评" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="5" title="非常好" />
                    <i>非常好</i> 
                    <input type="hidden" name="service_number" value="1">
                </p>
                <p class="starWrapper J-starWrapper">
                    <span>展会人气：</span> 
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="1" title="很差" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="2" title="一般" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="3" title="不错" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="4" title="好评" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="5" title="非常好" />
                    <i>非常好</i> 
                    <input type="hidden" name="sentiment_number" value="1">
                </p>
            </div>
            <div class="mm_zhanhui_pingfen">
                <textarea name="message"></textarea>
                <input type="submit" name="Submit" value="发表评论">
                <input type="hidden" name="is_type" value="1">
                <input type="hidden" name="ajax" value="1">
                <input type="hidden" name="con_id" value="<?php echo $this->data['info']['id'];?>">
                <input type="hidden" name="option" value="commentsave">
                <input type="hidden" name="yesfn" value="sucessCallback();">
                <input type="hidden" name="nofn" value="nofunction()">
                <input type="hidden" name="beforefn" value="beforefunction()">
            </div>
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
                    <div>综合评价：
                    <?php
						$eva_number = empty($value['eva_number']) ? 1 : $value['eva_number'];
						for($i=0; $i < $eva_number; $i++){
							echo('<img src="'.STYLE_URL.'/style/quzhan/images/mm_star01.png">');	
						}
					?>

                    </div>
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
        </div>
    </div>
    <!-- 右边 -->
    <div class="mm_zhanhui_right fr">
        <!-- 行程推荐 -->
        <div class="mm_hot_right mm_margin">
            <div class="tab1">
                <ul class="menu1">
                    <li class="active1">行程推荐</li>
                </ul>
                <div class="con3" id="J-new-xingcheng">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
            </div>
        </div>
        <!-- 签证服务 -->
        <div class="mm_hot_right mm_margin">
            <div class="tab1">
                <ul class="menu1">
                    <li class="active1">签证服务</li>
                </ul>
                <div class="con3" id="J-new-qz">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
            </div>
        </div>
        <!-- 物流推荐   展装推荐 -->
        <div class="mm_hot_right mm_margin">
            <div class="tab">
                <ul class="menu">
                    <li class="active">物流推荐</li>
                    <li>展装推荐</li>
                </ul>
                <div class="con1" id="J-new-wl">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
                <div class="con2" id="J-new-zz">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
            </div>
        </div>
        <!-- ad -->
        <divc class="mm_zhanhui_ad">
        	<script src="/public/adv/option/image/id/8"></script>
            <script src="/public/adv/option/image/id/19"></script>
        </div>
		
		<script id="new-xingcheng" type="text/html">
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
		<script id="new-qz" type="text/html">
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
		
		<script id="new-wl" type="text/html">
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
		
		<script id="new-zz" type="text/html">
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
		jQuery.get('/public/index/option/data',{'output':'json','type':'route','key':'<?php echo $this->data['info']['id'];?>'},function(data){
			var bt=baidu.template;
			var html=bt('new-xingcheng',data);
			document.getElementById('J-new-xingcheng').innerHTML=html;
		
		},'json');
		jQuery.get('/public/index/option/data',{'output':'json','type':'visa','key':'<?php echo $this->data['info']['countries'];?>'},function(data){
			var bt=baidu.template;
			var html=bt('new-qz',data);
			document.getElementById('J-new-qz').innerHTML=html;
		
		},'json');
		jQuery.get('/public/index/option/data',{'output':'json','type':'logistics','key':'<?php echo $this->data['info']['countries'];?>'},function(data){
			var bt=baidu.template;
			var html=bt('new-wl',data);
			document.getElementById('J-new-wl').innerHTML=html;
		
		},'json');
		jQuery.get('/public/index/option/data',{'output':'json','type':'decoration','key':'<?php echo $this->data['info']['countries'];?>'},function(data){
			var bt=baidu.template;
			var html=bt('new-zz',data);
			document.getElementById('J-new-zz').innerHTML=html;
		
		},'json');
		</script>
    </div>  
	
</div>

<?php include $this->Render('links.php'); ?>
<script type="text/javascript">
// tab
jQuery(function () {
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

<!-- 轮播 -->
<script type="text/javascript">
jQuery(function(){
	//评分
	var imgSrc = '<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png'; 
    var imgSrc_2 = '<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png'; 
	jQuery(".J-starWrapper").on('mouseover','img',function(){
		var $this = jQuery(this),
			index = $this.index(),
			$parent = jQuery(this).closest(".J-starWrapper");
		
		$parent.find("img").attr({"src":imgSrc});
		for(var i=0; i < index; ){
			$parent.find("img").eq(i).attr({"src":imgSrc_2});
			i++;
		}
	}).on('mouseleave',function(){
		var $this = jQuery(this);
		
		if(!$this.hasClass('on')){
			$this.find("img").attr({"src":imgSrc});	
		}	
	}).on('click','img',function(){
		var $this = jQuery(this),
			num = $this.data('number'),
			title = $this.attr('title'),
			$parent = jQuery(this).closest(".J-starWrapper");
			$parent.find('i').html(title);
			$parent.addClass('on').find('input[type="hidden"]').val(num);
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
				alert(data.msg);
			}
		},'json');
		
	});
	
})
</script>
<script type="text/javascript">
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
<?php include $this->Render('footer.php');die();?>