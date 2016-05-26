<?php
	$webtitle = $this->data['log_title'].' - 去展网'
?>
<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/showPic.js"></script>
<!-- 详情 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/logistics/index/">国际物流</a>&gt;
        <a href="/logistics/index/option/detai/id/<?php echo $this->data['log_id'];?>"><?php echo $this->data['log_title'];?></a>
    </div>
    <div class="mm_zh_detail clearfix">
        <div class="mm_zh_detail_left fl">
            <!-- 轮播 -->
            <div class="examples_body">
                <div class="examples_bg">
                    <div class="examples_image J-examples_image">
                        <img src="<?php echo Common::AttachUrl($this->data['log_cover']);?>!a200" alt=""  style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/loading.gif) no-repeat 50% 50%;" />
                    </div>
                    <div class="mune_thumb J-mune_thumb">
                        <ul>
                            <li class="active">
                                <a data-href="<?php echo Common::AttachUrl($this->data['log_cover']);?>!a200" href="javascipr:;"><img src="<?php echo Common::AttachUrl($this->data['log_cover']);?>!a200" alt="Image Name" style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/loading.gif) no-repeat 50% 50%;" /></a>
                            </li>
                            <?php
                            	if(!empty($this->data['image'])) foreach($this->data['image'] as $k => $v){
									
									if(!empty($v)){
							?>
                            <li>
                                <a  data-href="<?php echo Common::AttachUrl($v);?>" href="javascipr:;"><img src="<?php echo Common::AttachUrl($v);?>!a200" alt="Image Name" /></a>
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
        <form action="/logistics/order" method="post">
        <div class="mm_zh_detail_right fr">
            <h2><?php echo $this->data['log_title'];?></h2>
            <ul class="mm_gjwl">
                <?php for($i=1;$i<=$this->data['average'];$i++){?>
				<img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
				<?php }?>
				<i style="font-style:normal;"><?php echo StringCode::numberToChar($this->data['average']);?>星</i></li>
                <li>物流集散地：<?php echo $this->data['log_location'];?></li>
                <li>服务城市：<?php echo $this->data['log_city'];?></li>
                <li>物流方式：
                    <select name="log_freight" class="J-log-freight">
                    	<?php
                        	if(!empty($this->data['log_freight'])){
						?>
                        <option value="ky-<?php echo $this->data['log_freight']['ky']['ky_price'];?>"><?php echo $this->data['log_freight']['ky']['ky_txt'];?></option>
                        <option value="hy-<?php echo $this->data['log_freight']['hy']['hy_price'];?>"><?php echo $this->data['log_freight']['hy']['hy_txt'];?></option>
                        <option value="ly-<?php echo $this->data['log_freight']['ly']['ly_price'];?>"><?php echo $this->data['log_freight']['ly']['ly_txt'];?></option>
                        <?php
							}
						?>
                    </select>
                </li>
                <li>
                    <span>物件大小：<input value="" name="log_num" type="text">/<?php echo $this->data['log_unit'];?></span>
                    <span>物流价格：<i class="J-freight-price">￥<?php echo $this->data['log_freight']['ky']['ky_price'];?></i>/<?php echo $this->data['log_unit'];?></span>
                </li>
            </ul>
            
            <script type="text/javascript">
            	jQuery(document).ready(function(e) {
                    jQuery(".J-log-freight").on('change',function(){
						var txt = jQuery(this).val();
						var txtArr = txt.split('-');
						jQuery('input[name="freight-txt"]').val(txtArr[0]);
						jQuery(".J-freight-price").html("￥"+txtArr[1]);
					})
                });
            </script>

            <div class="clearfix">
                <div class="mm_xingcheng_bus">
                	<input type="hidden" value="ky" name="freight-txt" />
                	<input type="hidden" value="<?php echo $this->data['log_id'];?>" name="id" />
                	<input type="submit" value="立即购买" style="text-align:center; width:100%; height:100%; background:none; border:none; color:#FFF;" />
                    <!--<a href="/logistics/order/id/<?php echo $this->data['log_id'];?>">立即购买</a>-->
                </div>
                <div class="mm_xingcheng_xianxi">
                    <a href="tencent://message/?uin=<?php echo $this->data['log_qq'];?>&Site=http://www.qufair.com&Menu=yes" target="_blank">联系我</a>
                </div>
				<style type="text/css">
					.mm_guanzhu em {
						background:url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_guanzhu01.png) no-repeat;
					}
					.mm_guanzhu em.on {
						background:url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_guanzhu02.png) no-repeat;
					}
					
				</style>
                <div class="mm_guanzhu  J-mm-guanzhu">
                    <em style="display:inline-block; width:23px; height:20px; vertical-align:middle; margin-left:5px;" class="<?php echo $this->fav['check'] == 1 ? 'on' : '';?>"></em>
                    <span>&nbsp;&nbsp;关注（<?php echo $this->fav['count'];?>）</span>
                </div>
                <div class="mm_fenxiang">
                    <span>&nbsp;分享</span>&nbsp;
                    <div class="bdsharebuttonbox" style="display:inline-block; float:right; padding-top:5px;"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["tsina","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                </div>
                <div class="mm_xingcheng_pingjia">
                    评价:<span><?php echo $this->eva['One'];?>条</span>
                </div>
            </div>
        </div>
		</form>
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
		
		jQuery.post('/public/common/option/favorite/',{'sort':3,'related_id':<?php echo $this->data['log_id'];?>},function(data){ //state状态 
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
    	<div style="margin-bottom:20px;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/logistics.png" /></div>
        <!-- 展位供应商 -->
        <div class="mm_zhanhui_left_title">
            <h4>供应商资料</h4>
        </div>
        <div class="mm_zhanhui_shangjia clearfix">
            <div class="mm_zhanhui_sahngjia_left clearfix">
                <dl>
                    <dt><img src="<?php echo Common::AttachUrl($this->supplier['avatar']);?>" width="126" height="126"></dt>
                    <dd>
                        <h4><?php echo $this->supplier['company'];?></h4>
                        <p>公司地址：<em><?php echo $this->supplier['address'];?></em></p>
                        <p>联系电话：<em><?php echo $this->supplier['telephone'];?></em></p>
                        <p>服务范围：<em><?php echo $this->supplier['company_service'];?></em></p>
                    </dd>
                </dl>
                <!-- <div class="mm_zhanhui_jiage">
                    <span>价格</span>
                    <p>￥38445元</p>
                    <a href="#">立即订展</a>
                </div> -->
            </div>
        </div>
        <div>
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>公司资质</h6>
                <!-- <span>20条评论</span> -->
            </div>
            <div class="mm_xingcheng_zhengshu clearfix">
                <dl>
                    <dt><img src="<?php echo STYLE_URL.'/style/quzhan/images/zzjg.jpg';?>" width="244" height="178"></dt>
                    <dd>组织结构代码证</dd>
                </dl>
                <dl>
                    <dt><img src="<?php echo STYLE_URL.'/style/quzhan/images/swdj.jpg';?>" width="244" height="178"></dt>
                    <dd>税务登记证</dd>
                </dl>
                <dl>
                    <dt><img src="<?php echo STYLE_URL.'/style/quzhan/images/yyzz.jpg';?>" width="244" height="178"></dt>
                    <dd>营业执照</dd>
                </dl>
            </div>
        </div>  
        <div class="mm_xingcheng_jieshao">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>公司介绍</h6>
                <!-- <span>20条评论</span> -->
            </div>
            <div class="mm_xingcheng_jieshao_con">
                <?php echo $this->supplier['company_note'];?>
            </div>
        </div>
        <div class="mm_xingcheng_jieshao">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>物流详情</h6>
                <!-- <span>20条评论</span> -->
            </div>
            <div class="mm_xingcheng_jieshao_con">
                <?php echo $this->data['log_msg'];?>
            </div>
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
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="5" title="赞一个" />
                    <i>非常好</i>
                    <input type="hidden" name="eva_number" value="1">
                </p>
                <p class="starWrapper J-starWrapper">
                    <span>展会服务：</span> 
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="1" title="很差" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="2" title="一般" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="3" title="不错" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="4" title="好评" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="5" title="赞一个" />
                    <i>非常好</i> 
                    <input type="hidden" name="service_number" value="1">
                </p>
                <p class="starWrapper J-starWrapper">
                    <span>展会人气：</span> 
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="1" title="很差" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="2" title="一般" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="3" title="不错" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="4" title="好评" />
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png" data-number="5" title="赞一个" />
                    <i>非常好</i> 
                    <input type="hidden" name="sentiment_number" value="1">
                </p>
            </div>
            <div class="mm_zhanhui_pingfen">
                <textarea name="message"></textarea>
                <input type="submit" name="Submit" value="发表评论">
                <input type="hidden" name="is_type" value="5">
                <input type="hidden" name="ajax" value="1">
                <input type="hidden" name="con_id" value="<?php echo $this->data['log_id'];?>">
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
			<div style="width:100%; height:35px; margin-top:35px; text-align:right;">
				<?php echo empty($this->eva['Page']) ? '' : $this->eva['Page'];?>
			</div>
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
        	<script src="/public/adv/option/image/id/24"></script>
            <script src="/public/adv/option/image/id/25"></script>
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
			jQuery.get('/public/index/option/data',{'output':'json','type':'route','key':'<?php echo $this->data['log_countries'];?>'},function(data){
				var bt=baidu.template;
				var html=bt('new-xingcheng',data);
				document.getElementById('J-new-xingcheng').innerHTML=html;
			
			},'json');
			jQuery.get('/public/index/option/data',{'output':'json','type':'visa','key':'<?php echo $this->data['log_countries'];?>'},function(data){
				var bt=baidu.template;
				var html=bt('new-qz',data);
				document.getElementById('J-new-qz').innerHTML=html;
			
			},'json');
			jQuery.get('/public/index/option/data',{'output':'json','type':'logistics','key':'<?php echo $this->data['log_countries'];?>'},function(data){
				var bt=baidu.template;
				var html=bt('new-wl',data);
				document.getElementById('J-new-wl').innerHTML=html;
			
			},'json');
			jQuery.get('/public/index/option/data',{'output':'json','type':'decoration','key':'<?php echo $this->data['log_countries'];?>'},function(data){
				var bt=baidu.template;
				var html=bt('new-zz',data);
				document.getElementById('J-new-zz').innerHTML=html;
			
			},'json');
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
    </div>  
</div>
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
<?php //include $this->Render('links_logistics.php'); ?>
<?php include $this->Render('footer.php');die();?>
