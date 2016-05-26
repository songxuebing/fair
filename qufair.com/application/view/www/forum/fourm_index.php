<?php
        $webtitle = "提供2016国内外最新展览会资讯,2016最全展会报道,外贸行业资讯".' - 去展网';
        $webdescription = "提供2016最新的国际国内外展览报道，涉及五金，礼品，汽配，建材，工业，服装等展会行业资讯。同时提供2016最新国际外贸出口的最新政策及新闻报道";
?>

<?php include $this->Render('header_fourm.php'); ?>
<link type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/css/tag.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<!--------------新-------------------->
<div class="tag-box">
	<div class="tag-list">
    	<ul class="J-tag-list">
            <li><a href="/news" class="<?php echo $this->fid == 'hot' ? 'on' :'';?>">会展资讯</a></li>
            <li><a href="/knowledge" class="">知识百科</a></li>

            <?php
				if(!empty($this->tag)) {
					$tagArr = explode(' ',$this->tag);
					$tagidArr = explode(' ',$this->tagid);
                    $tagenArr = explode(' ',$this->tag_en);
                    //var_dump($tagenArr);exit();
					
					foreach($tagArr as $key => $val){
						if(!empty($val)){
			?>
			<li><em class="fn-hide J-del-tag" data-tagid="<?php echo $tagidArr[$key];?>" data-tagen="<?php echo $tagenArr[$key];?>" data-tagname="<?php echo $val;?>"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_close_02.png" /></em><a href="/<?php echo $tagenArr[$key];?>" class="<?php echo $this->tag_id == $tagidArr[$key] ? 'on' : '';?>"><?php echo $val;?></a></li>
			<?php
						}
					}
				}
			?>

            <img class="J-down" src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_down.png" style="position:absolute; right:20px; top:22px; cursor:pointer;" />
            
        </ul>
    </div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(e) {
		//显示与隐藏
		jQuery(".J-down").on('click',function(){
			if(jQuery(this).hasClass('on')){
				jQuery(".J-my-tag-box").addClass('fn-hide');
				jQuery(".J-tag-list").find('.J-del-tag').addClass('fn-hide');
				jQuery(this).removeClass('on');	
			}else{
				jQuery(".J-my-tag-box").removeClass('fn-hide');
				jQuery(".J-tag-list").find('.J-del-tag').removeClass('fn-hide');
				jQuery(this).addClass('on');
			}
		});
		
		//移除cookie
		jQuery(".J-tag-list").on('click','.J-del-tag',function(){
			var $this = jQuery(this),
				tagname = $this.data('tagname'),
                tagen = $this.data('tagen'),
				tagid = $this.data('tagid');
				
			$this.closest('li').fadeOut('fast',function(){
				$this.closest('li').remove();
				
				var html='<li data-tagid="'+tagid+'" data-tagen="'+tagen+'" ><a href="javascript:;">'+tagname+'</a></li>';
				jQuery(".J-my-tag-txt").append(html);
				
				//删除数据库中标签
				jQuery.post('/forum/index/option/removeTag',{"tagname":tagname,"tagid":tagid,"tagen":tagen});
				
			});	
		});

		//添加cookie
		jQuery(".J-my-tag-txt").on('click','li',function(){
			var len = jQuery(".J-tag-list").find('li').length;
			if(len >= 8){
				alert("标签最多为8个，请先删除标签");
				return false;	
			}
			
			var txt = jQuery(this).text();
			var tagid = jQuery(this).data('tagid');
            var tagen = jQuery(this).data('tagen');
			var $this = jQuery(this);
			
			$this.fadeOut('fast',function(){
				$this.remove();	
				
				//把该标签添加到cookie中
				jQuery.post('/forum/index/option/addTag',{'tagTxt':txt,'tagid':tagid,'tagen':tagen});
				var html='<li><em class="J-del-tag" data-tagid="'+tagid+'" data-tagname="'+txt+'" data-tagen="'+tagen+'"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_close_02.png" /></em><a href="/'+tagen+'">'+txt+'</a></li>';
			
				jQuery(".J-tag-list").append(html);
			});
				
		});
	});
</script>
<style type="text/css">
	.tag-list li {
		position:relative;
	}
	
	.tag-list li em {
		position:absolute;
		top:-13px;
		z-index:5;
		cursor:pointer;
		right:0;
	}
	
	.fn-hide {
		display:none;
	}
</style>
<div class="page-box">
	<div class="pageview">
        <!--我的标签-->
        
        <div class="my-tag-box fn-hide J-my-tag-box">
            <h4 style="display:none;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_tag.png" />我的标签</h4>
            <ul class="my-tag-txt J-my-tag-txt">
				
                <?php
                if(!empty($this->cTagRow)) foreach($this->cTagRow as $key => $val){
                if($val['ctag_id'] != "22"){
				?>
				<li data-tagid="<?php echo $val['ctag_id'];?>" data-tagen="<?php echo $val['name_en'];?>" ><a href="javascript:;"><?php echo $val['ctag_name'];?></a></li>
				<?php
                }	}
				?>

            </ul>
            <img class="ico-shezhi AjaxWindow" href="/forum/index/option/tag/" href-id="0" data-title="设置标签" src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_shezhi.png" style="display:none;" />
            
        </div>
        
        
        <!--我的标签结束-->
        
        <!--内容-->
        <script>
        	jQuery(document).ready(function(e) {
                var rHeight = jQuery(".J-new-tag-main-right").height();
				var lHeight = jQuery(".J-new-tag-main-left").height();
				
				if(lHeight < rHeight){
					var h = rHeight + 50;
					jQuery(".J-new-tag-main-left").height(h);
				}

            });
        </script>
        <div class="new-tag-main">
        	<!--右侧-->
            <div class="new-tag-main-right J-new-tag-main-right">
            	<!--我也发帖-->
                <div class="mm_sqzx_fatie" style="display:none;">
                    <a href="/forum/index/option/edit">我要发帖</a>
                </div>
                
            	<!--服务推荐-->
            	<div class="new-r-box" style="display:none;">
                	<h2 class="new-r-box-title mt15">服务推荐</h2>
                    <div class="new-tuijian">
                    	<ul>
                        	<li>
                            	<a href="/route/index"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_test_01.png" /><br/>行程预定</a>
                            </li>
                            <li>
                            	<a href="/visa/index"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_test_02.png" /><br/>国际签证</a>
                            </li>
                            <li>
                            	<a href="/logistics/index"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_test_03.png" /><br/>国际物流</a>
                            </li>
                            <li>
                            	<a href="/decoration/index"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_test_04.png" /><br/>特装服务</a>
                            </li>
                            <li>
                            	<a href="/entrust/index/"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_test_05.png" /><br/>预定展位</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!--实时热点-->
                <div class="new-r-box" style="display:none;">
                	<h2 class="new-r-box-title mt15"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_shishi.png" />&nbsp;实时热点</h2>
                    <dl class="new-redian">
                    	<dt class="new-redian-tag">
                        	<?php
                            	if(!empty($this->forum_cat)) foreach($this->forum_cat as $k => $v){
									if($v['name'] == '知识'){
										continue;
									}
							?>
                            <?php
								if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
									if($key > 5){
										continue;
									}
							?>
                            <a href="/forum/list/id/<?php echo $val['id'];?>"><?php echo $val['name'];?></a>
                            <?php
								}
								}
							?>
                        </dt>
                        <?php
							if(!empty($this->new['All'])) foreach($this->new['All'] as $k=>$v){
						?>
                        <dd class="new-redian-list"><em><?php echo $k+1;?></em><a href="/forum/detail/id/<?php echo $v['id'];?>" target="_blank"><?php echo StringCode::GetCsubStr($v['title'],0,18);?></a></dd>
                        <?php
							}
						?>
                    </dl>
                </div>
                <a href="/forum/list/id/14" style="display:none;" class="new-redian-more">查看更多 ></a>
                <!--广告位-->
                <!--
                <a href="#" style="display:block; text-align:center; margin-top:15px;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/test_03.png" /></a>
                <a href="#" style="display:block; text-align:center; margin-top:15px;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/test_04.png" /></a>
                -->
                
                <div style="display:block; text-align:center; margin-top:15px;"><script src="/public/adv/option/image/id/39"></script></div>
        		<div style="display:block; text-align:center; margin-top:15px;"><script src="/public/adv/option/image/id/40"></script></div>
                
                <!--热门资讯-->
                <div class="new-r-box">
                	<h2 class="new-r-box-title mt25">
                    	<img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_write.png" />&nbsp;热门资讯
                    	<a href="javascript:;" class="new-huan J-new-huan">换一批</a>
                    </h2>
                    <!--
                    <ul class="new-hot">
                    	<li style="border-bottom:1px solid #cdcdcd; padding-bottom:14px;">
                        	<div style="width:100%; height:auto; overflow:hidden; margin-bottom:17px;">
                            	<div style="color:#ff4a00; font-size:14px; font-family:'微软雅黑'; float:left;">用户名称</div>
                                <div style="float:right; color:#111111; font-size:12px; font-family:'新宋体';"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_zhan.png" style="vertical-align:sub;" />&nbsp;159</div>
                            </div>
                        	<p style="font-size:12px; font-family:'新宋体'; color:#383838;"><a href="#">这里是内容</a></p>                       
                        </li>
                        <li style="border-bottom:1px solid #cdcdcd; padding-bottom:14px;">
                        	<div style="width:100%; height:auto; overflow:hidden; margin-bottom:17px;">
                            	<div style="color:#ff4a00; font-size:14px; font-family:'微软雅黑'; float:left;">用户名称</div>
                                <div style="float:right; color:#111111; font-size:12px; font-family:'新宋体';"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_zhan.png" style="vertical-align:sub;" />&nbsp;159</div>
                            </div>
                        	<p style="font-size:12px; font-family:'新宋体'; color:#383838;">这里是内容</p>                       
                        </li>
                        <li style="border-bottom:1px solid #cdcdcd; padding-bottom:14px;">
                        	<div style="width:100%; height:auto; overflow:hidden; margin-bottom:17px;">
                            	<div style="color:#ff4a00; font-size:14px; font-family:'微软雅黑'; float:left;">用户名称</div>
                                <div style="float:right; color:#111111; font-size:12px; font-family:'新宋体';"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_zhan.png" style="vertical-align:sub;" />&nbsp;159</div>
                            </div>
                        	<p style="font-size:12px; font-family:'新宋体'; color:#383838;">这里是内容</p>                       
                        </li>
                    </ul>
                    -->
                    <ul class="new-hot" id="J-new-news">
                    	
                        <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                        
                    </ul>
                </div>
                
                
            </div>
            <!--右侧结束-->
            <!--左侧-->
            <script id="new-news" type="text/html">
				<!--循环数据-->
				<%if(All.length>0) { %>
					<%for( var i=0; i<All.length; i++){%>
						
						<li style="border-bottom:1px solid #cdcdcd; padding-bottom:14px;">
                        	<div style="width:100%; height:auto; overflow:hidden; margin-bottom:17px;">
                            	<div style="float:left;"><a style="color:#ff4a00; font-size:14px; font-family:'微软雅黑';" href="<%=All[i]['link']%>"><%=All[i]['username']%></a></div>
                                <div style="float:right; color:#111111; font-size:12px; font-family:'新宋体';">
									<img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_zhan.png" style="vertical-align:sub;">&nbsp;<%=All[i]['comment']%>
								</div>
                            </div>
                        	<p><a style="font-size:12px; font-family:'新宋体'; color:#383838;" href="<%=All[i]['link']%>"><%=All[i]['name']%></a></p>                       
                        </li>
						
						 
					<%}%>
				<%}%>
			</script>
            <script type="text/javascript">
            	jQuery(document).ready(function(e) {
					//热门资讯
					jQuery.get('/public/index/option/hotnews',{'output':'json','limit':5},function(data){
						var bt=baidu.template;
						var html=bt('new-news',data);
						document.getElementById('J-new-news').innerHTML=html;
					
					},'json');
					
					//换一换
					jQuery('.J-new-huan').on('click',function(){

						jQuery('#J-new-news').html('<div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>');
						
						jQuery.get('/public/index/option/hotnews',{'output':'json','limit':5},function(data){
							var bt=baidu.template;
							var html=bt('new-news',data);
							document.getElementById('J-new-news').innerHTML=html;
						
						},'json');	
					});
					
					
					//关注
                    jQuery('.J-mm-guanzhu').on('click',function(){
						var $this = jQuery(this),
							id = $this.data('comment-id');
						var flag = null;
						if($this.hasClass('on')){//已经关注
							flag = 0; //取消关注
						}else{
							flag = 1; //关注
						}
						
						jQuery.post('/public/common/option/favorite/',{'sort':7,'related_id':id},function(data){ //state状态 
							if(data.success){
								if(flag == 1){
									alert('点赞成功!');
								}else{
									alert('取消点赞!');
								}
								$this.find('.J-n').html(data.count);
							}else{
								alert(data.msg);
							}
						},'json');
						
					});	
					
					//关闭不感兴趣的
					jQuery(".J-close").on('click',function(){
						jQuery(this).closest('.J-new-tag-left-list').fadeOut('fast',function(){
							jQuery(this).closest('.J-new-tag-left-list').remove();	
						});	
					});
					
                });
            </script>
            <div class="new-tag-main-left J-new-tag-main-left">
            	<?php
                	if(!empty($this->forum_row['All'])) foreach($this->forum_row['All'] as $key => $val){
				?>
            	<div class="new-tag-left-list J-new-tag-left-list">
                	<p class="new-list-bgxq"><span class="new-list-bgxq-txt">不感兴趣</span>&nbsp;&nbsp;<img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_close.png" class="J-close" /></p>
                    <div class="new-list-c">

                    	<div class="new-list-c-right" style="width:236px; height:155px; overflow:hidden; float:left;">
                            <a href="/news/<?php echo date('Y/m/d', $val['dateline']).'/'.$val['id'];?>" target="_blank" title="<?php echo $val['title'];?>"><img src="<?php echo empty($val['cover']) ? STYLE_URL.'/style/quzhan/images/20160202/test_01.png' :$val['cover'].'!a200';?>" width="236" height="155" alt="<?php echo $val['title'];?>" /></a>
                        </div>
                    	<div class="new-list-c-left" style="float:right;">
                            <h3><a href="/news/<?php echo date('Y/m/d', $val['dateline']).'/'.$val['id'].'.shtml';?>" target="_blank" title="<?php echo $val['title'];?>"><?php echo StringCode::GetCsubStr($val['title'],0,24);?></a></h3>
                            <p class="new-list-cl-txt"><a target="_blank" href="/news/<?php echo date('Y/m/d', $val['dateline']).'/'.$val['id'].'.shtml';?>"><?php echo StringCode::GetCsubStr($val['content'],0,80);?></a></p>
                            <p class="new-list-cl-fenxiang">
                            	<span class="new-fengxiang-l" style="width:80px;">
                                	<a class="ico-zhan J-mm-guanzhu" style="border-right:0;" href="javascript:;" data-comment-id="<?php echo $val['id'];?>"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_zhan.png" />&nbsp;<span class="J-n">0</span></a>
                                    <a class="ico-zhan" href="#" style="display:none;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_zhan_02.png" />&nbsp;159</a>
                                </span>
                                <div class="bdsharebuttonbox" style="width:36px; float:right; position:relative; top:-28px;"><a href="#" class="new-fengxiang-r" data-cmd="more" style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_fenxiang.png) no-repeat; height:18px;"></a></div>
                            </p>
                           <!-- <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>-->
                        </div>
                        
                    </div>
                </div>
       			<?php
					}
				?>	
                
                <!-- 页码 -->
                <div style="width:100%; height:35px;text-align:right;">
                    <?php echo empty($this->forum_row['Page']) ? '' : $this->forum_row['Page'];?>
                </div>
            </div>
            <!--左侧结束-->
        </div>
        <!--内容结束-->
        
        <!--友情链接-->
        <div class="new-link-box" style="display:none;">
        	<h3>友情链接</h3>
            <div class="new-link-txt">
            	<a href="#">中国商务部</a>
                <a href="#">中国商务部</a>
                <a href="#">中国商务部</a>
                <a href="#">中国商务部</a>
                <a href="#">中国商务部</a>
                <a href="#">中国商务部</a>
                <a href="#">中国商务部</a>
            </div>
        </div>
        <!--友情链接结束-->
    </div>
</div>
<!------------新结束------------------>


<?php include $this->Render('links_forum.php'); ?>
<?php include $this->Render('footer.php'); ?>
<?php die();?>
