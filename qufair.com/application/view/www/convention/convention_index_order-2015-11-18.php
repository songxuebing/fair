<?php
$webtitle = $this->data['info']['name'].' - 去展网'
?>
<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo STYLE_URL;?>/style/quzhan/css/lightbox.css" />
<script src="<?php echo STYLE_URL;?>/style/quzhan/js/lightbox-plus-jquery.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/showPic.js"></script>
<style type="text/css">
.yListr ul li em.em_drop {
	cursor:no-drop;
	border:1px dashed #CCC;
}

.fn-hide {
	display:none;
}
</style>
<!-- 详情 -->
<form action="/convention/order/" id="postorder" method="post">
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="javascript:;"><?php echo $this->data['info']['industry'];?></a>&gt;
        <a href="javascript:;"><?php echo $this->data['info']['name'];?></a>
    </div>
    <div class="mm_zh_detail clearfix">
        <div class="clearfix">
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
                                    <a data-href="<?php echo Common::AttachUrl($this->data['info']['cover']);?>!a200" href="javascript:;"><img src="<?php echo Common::AttachUrl($this->data['info']['cover']);?>!a200" alt="Image Name" /></a>
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
                <div class="mm_zhfw_ziliao">
                    <ul class="clearfix">
                        <li>举办时间：<span><?php echo date('Y-m-d',$this->data['start_time']);?>至<?php echo date('Y-m-d',$this->data['end_titme']);?></span></li>
                        <li>举办展馆：<?php echo $this->data['info']['pavilion'];?></li>
                        <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png"><i>五星</i></li>
                    </ul>
                </div>
                <div class="yListr">
                    <h6>选择展位号：</h6>
                    <ul class="clearfix J-booth">
                    	<?php
                        	if(!empty($this->data['group'])) foreach($this->data['group'] as $key => $val){
						?>
                        <li class="J-attr" style="float:none; overflow:hidden;">
                            <span><?php echo $val['area_name'];?>：</span>
                            <?php
                            	if(!empty($val['booth_no_list'])) foreach($val['booth_no_list'] as $kk => $vv){
							?>
                            <em class="<?php echo $vv['is_rent'] == 1 ? 'em_drop' : '' ;?>" data-detailid="<?php echo $vv['detail_id'];?>" data-id="<?php echo $vv['area_id'];?>" data-booth-type="<?php echo $vv['booth_type'];?>" data-opening="<?php echo $vv['opening'];?>" data-group-price="<?php echo $vv['group_price'];?>" data-booth-price="<?php echo $vv['booth_price'];?>" data-area="<?php echo $vv['con_area'];?>" data-standard="<?php echo $vv['con_standard'];?>"><?php echo $vv['booth_no'];?></em>
                            <?php
								}
							?>
                        </li>
                        <?php
							}
						?>
                    </ul>
                    <ul class="J-area-box fn-hide" style="width:100%; height:auto; overflow:hidden;">
                    	<li>
                        	<span>展会面积:</span>
                            <em class="J-area"></em>
                        </li>
                        <li>
                        	<span>展会规格:</span>
                            <em class="J-con-standard"></em>
                        </li>
                    </ul>
                    <ul class="J-type">
                    	<li class="J-booth-type J-booth-attr" data-type="booth-type">
                            <span>展位类型：</span>
                            <em data-title="标摊">标摊</em>
                            <em data-title="净地">净地</em>
                        </li>
                        <li class="J-opening J-booth-attr" data-type="opening">
                            <span>开口概括：</span>
                            <em data-title="单开">单开</em>
                            <em data-title="双开">双开</em>
                            <em data-title="三开">三开</em>
                        </li>
                        <li class="J-group" data-type="booth-price">
                            <span>是否跟团：</span>
                            <em data-title="1">是</em>
                            <em data-title="0">否</em>
                        </li>
                    </ul>
                </div>   
            </div>
        </div>
        <div class="clearfix mm_zhfw_con">
            <div class="fl">
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
                <div class="mm_xingcheng_pingjia">
                    评价:&nbsp;<span><?php echo $this->eva['One'];?>条</span>
                </div>
            </div>  
            <div class="fr">
                <div class="mm_zhfw_jiage">价格：<em class="J-total-price">￥<?php echo $this->data['group'][0]['booth_no_list'][0]['booth_price'];?></em></div>
                <div class="mm_xingcheng_bus">
                    <a href="javascript:;" class="J-buy">立即购买</a>
                    <input type="hidden" name="detailid" value="0" >
                    <input type="hidden" name="areaid" value="0" >
                    <input type="hidden" name="is_group" value="0" >
					<input type="hidden" name="is_advance_payment" value="0" >
                </div>
                <div class="mm_xingcheng_xianxi">
                    <a target="_blank" href="tencent://message/?uin=<?php echo $this->data['qq'];?>&Site=http://www.qufair.com&Menu=yes">联系我</a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
jQuery(document).ready(function(e) {
	jQuery(".J-booth").on('click','em',function(){//选择展区
		var $this = jQuery(this),
			detailid = $this.data('detailid'),
			id = $this.data('id'),
			boothType = $this.data('booth-type'),
			opening = $this.data('opening'),
			groupPrice = $this.data('group-price'),
			area = $this.data('area'),
			standard = $this.data('standard'),
			boothPrice = $this.data('booth-price');
			
		if($this.hasClass('em_drop')){
			return false;	
		}
		
		if($this.hasClass('yListrclickem')){
			$this.removeClass('yListrclickem');
			jQuery('input[name="detailid"]').val(0);
			jQuery('input[name="areaid"]').val(0);
			getType('.J-booth-type',boothType,'title',true);
			getType('.J-opening',opening,'title',true);	
			jQuery(".J-total-price").html('￥0');
			
			jQuery(".J-area-box").addClass('fn-hide');
			
		}else{
			$this.addClass('yListrclickem');
			jQuery('input[name="detailid"]').val(detailid);
			jQuery('input[name="areaid"]').val(id);
			$this.siblings('em').removeClass('yListrclickem');
			$this.closest('li').siblings().find('em').removeClass('yListrclickem');
			getType('.J-booth-type',boothType,'title',false);
			getType('.J-opening',opening,'title',false);
			
			jQuery(".J-area-box").removeClass('fn-hide');
			jQuery(".J-area").html(area);
			jQuery(".J-con-standard").html(standard);
			
			
			jQuery(".J-group").find('em').each(function(index, element) {
                if(jQuery(element).hasClass('yListrclickem')){
					if(jQuery(element).data('title') == '1'){
						jQuery(".J-total-price").html('￥'+groupPrice);	
					}else{
						jQuery(".J-total-price").html('￥'+boothPrice);	
					}
				}else{
					jQuery(".J-total-price").html('￥'+boothPrice);	
				}
            });
			
		}
			
	});
	
	jQuery(".J-booth-attr").on('click','em',function(){
		var $this = jQuery(this),
			title = $this.data('title'),
			type = $this.closest('li').data('type');
		
		if($this.hasClass('em_drop')){
			return false;	
		}
		
		if($this.hasClass('yListrclickem')){
			$this.removeClass('yListrclickem');
			getType('.J-booth',title,type,true);	
		}else{
			$this.addClass('yListrclickem');
			$this.siblings('em').removeClass('yListrclickem');
			getType('.J-booth',title,type,false);
			
		}
			
	});
	//是否预付款
	jQuery(".J-buy-type").on('click','em',function(){
		var $this = jQuery(this),
			data = $this.data('p');
		if($this.hasClass('yListrclickem')){
			$this.removeClass('yListrclickem');
			jQuery('input[name="is_advance_payment"]').val('0');
		}else{
			$this.addClass('yListrclickem');
			jQuery('input[name="is_advance_payment"]').val(data);
			$this.siblings('em').removeClass('yListrclickem');
		}	
	});
	
	function getType(obj,attr,type,flag){
		jQuery(obj).find('em').each(function(index, element) {
			if(flag){
				jQuery(element).removeClass('em_drop');	
			}else{
				if(jQuery(element).data(type) != attr){
					jQuery(element).addClass('em_drop');
				}else{
					jQuery(element).removeClass('em_drop');		
				}
			}
			
		});	
	}
	
	//否团购
	jQuery(".J-group").on('click','em',function(){
		var $this = jQuery(this),
			title = $this.data('title');
		
		$this.addClass('yListrclickem').siblings().removeClass('yListrclickem');
		jQuery('input[name="is_group"]').val(title);
		
		var obj = jQuery(".J-booth").find('.yListrclickem');
		if(obj){
			var groupPrice = obj.data('group-price'),
				boothPrice = obj.data('booth-price');
				
			if(title == '1'){
				jQuery(".J-total-price").html('￥'+groupPrice);	
			}else{
				jQuery(".J-total-price").html('￥'+boothPrice);	
			}
		}
		
		
	});
	
	
});
</script>
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
		
		jQuery.post('/public/common/option/favorite/',{'sort':2,'related_id':<?php echo $this->data['detail_id'];?>},function(data){ //state状态 
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
        <!-- 展位供应商 -->
        <div class="mm_zhanhui_left_title">
            <h4>供应商资料</h4>
        </div>
        <div class="mm_zhanhui_shangjia clearfix">
            <div class="mm_zhanhui_sahngjia_left clearfix">
                <dl>
                    <dt><img src="<?php echo Common::AttachUrl($this->data['memberInfo']['avatar']);?>" width="126" height="126"></dt>
                    <dd>
                        <h4><?php echo $this->data['cert']['company_name'];?></h4>
                        <p>公司地址：<em><?php echo $this->data['cert']['company_address'];?></em></p>
                        <p>联系电话：<em><?php echo $this->data['cert']['company_tel'];?></em></p>
                        <div>
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
                            <i>五星</i>
                        </div>
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
                <p><?php echo $this->data['memberInfo']['company_note'];?></p>
            </div>
        </div>
        <div class="mm_xingcheng_jieshao">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>展会介绍</h6>
                <!-- <span>20条评论</span> -->
            </div>
            <div class="mm_xingcheng_jieshao_con">
                <p><?php echo $this->data['info']['describe'];?></p>
            </div>
        </div>
        <div class="mm_xingcheng_jieshao">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>商家描述</h6>
                <!-- <span>20条评论</span> -->
            </div>
            <div class="mm_xingcheng_jieshao_con">
                <p><?php echo $this->data['description'];?></p>
            </div>
        </div>
        <div class="mm_zhanhui_left_title">
            <h4>客户点评</h4>
        </div>
        <div class="mm_zhanhui_con1 clearfix">
            <form action="/public/common/" class="AjaxForm brand" method="post">
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
                
                <input type="hidden" name="is_type" value="2">
                <input type="hidden" name="ajax" value="1">
                <input type="hidden" name="con_id" value="<?php echo $this->data['detail_id'];?>">
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
            
                <dt><img src="<?php echo Common::AttachUrl($value['memberInfo']['avatar']);?>" width="60" height="60"></dt>
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
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/slide.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript">jQuery(".TB-focus").slide({ mainCell:".bd ul",effect:"fold",autoPlay:true,delayTime:200 });</script>
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
// 热销商户排行榜
jQuery(function () {
   jQuery('.mm_rexiao_title li').click(function(){
        //获得当前被点击的元素索引值
        var Index = jQuery(this).index();
        //给菜单添加选择样式
        jQuery(this).addClass('mm_active').siblings().removeClass('mm_active');
        //显示对应的div
        jQuery('.mm_rexiao').children('div').eq(Index).show().siblings('div').hide();
   
   });
});
//评分
function rate(obj,oEvent){ 

    var imgSrc = '<?php echo STYLE_URL;?>/style/quzhan/images/mm_star02.png'; 
    var imgSrc_2 = '<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png'; 

    if(obj.rateFlag) return; 
    var e = oEvent || window.event; 
    var target = e.target || e.srcElement;  
    var imgArray = obj.getElementsByTagName("img"); 
    for(var i=0;i<imgArray.length;i++){ 
        imgArray[i]._num = i; 
        imgArray[i].onclick=function(){ 
            if(obj.rateFlag)
            return; 
            obj.rateFlag=true; 
             //alert(this._num+1); //弹出
			jQuery(obj).find('input[type="hidden"]').val(this._num+1);
        }; 
    } 
    
    if(target.tagName=="IMG"){ 
        for(var j=0;j<imgArray.length;j++){ 
            if(j<=target._num){ 
                imgArray[j].src=imgSrc_2; 
            }else{ 
                imgArray[j].src=imgSrc; 
            } 
        } 
    }else{ 
        for(var k=0;k<imgArray.length;k++){ 
            imgArray[k].src=imgSrc; 
        } 
    }     
} 
</script>

<!-- 轮播 -->
<script type="text/javascript">
jQuery(function(){
	
	//Show Banner
	jQuery(".examples_image .desc").show(); //Show Banner
	jQuery(".examples_image .block").animate({ opacity: 0.85 }, 1 ); //Set Opacity
	
	//Click and Hover events for thumbnail list
	jQuery(".mune_thumb ul li:first").addClass('active'); 
	jQuery(".mune_thumb ul li").hover(function(){ 
		//Set Variables
		var imgAlt = jQuery(this).find('img').attr("alt"); //Get Alt Tag of Image
		var imgTitle = jQuery(this).find('a').attr("href"); //Get Main Image URL
		var imgDesc = jQuery(this).find('.block').html(); 	//Get HTML of block
		var imgDescHeight = jQuery(".examples_image").find('.block').height();	//Calculate height of block	
		
		if (jQuery(this).is(".active")) {  //If it's already active, then...
			return false; // Don't click through
		} else {
			//Animate			
			jQuery(".examples_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 250 , function() {
				jQuery(".examples_image .block").html(imgDesc).animate({ opacity: 0.85,	marginBottom: "0" }, 250 );
				jQuery(".examples_image img").attr({ src: imgTitle , alt: imgAlt});
			});
		}
		
		jQuery(".mune_thumb ul li").removeClass('active'); //Remove class of 'active' on all lists
		jQuery(this).addClass('active');  //add class of 'active' on this list only
		return false;
		
	}) .hover(function(){
		jQuery(this).addClass('hover');
	}, function() {
		jQuery(this).removeClass('hover');
	});
			
	//Toggle
	jQuery("a.collapse").click(function(){
		jQuery(".examples_image .block").slideToggle();
		jQuery("a.collapse").toggleClass("show");
	});
	

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
});
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
<script type="text/javascript">
jQuery(document).ready(function(e) {
	//提交表单
	jQuery(".J-buy").on('click',function(){
		jQuery("#postorder").submit();	
	});

});
</script>

<?php include $this->Render('footer.php');die(); ?>
