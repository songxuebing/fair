<?php
        $webtitle = "2016最新国外展会|提供汽配展|礼品展|五金展|服装展等展会信息".' - 去展网';
        $webdescription = "提供最新2016德国展会、香港展会、上海展会等全球展会及行业信息。包含最全汽配展|礼品展|服装展|五金展等展览资讯";
?>
<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<?php include $this->Render('nav.php'); ?>
<!-- banner -->
<?php include $this->Render('slide.php'); ?>
<!-- 详情 -->
<div class="mm_zhanhui_list mm_mid">
    <div class="demo">
        <div class="mm_zhanhui_list_title">
            <span>已选条件&gt;</span>
            <div class="plus-tag tagbtn1 clearfix fl J-tags" id="myTags">
            	<?php
                	if(!empty($this->data['attr'])) foreach($this->data['attr'] as $aKey => $aVal){
						if(!empty($aVal)){
				?>
                <a value="-1" title="<?php echo urldecode($aVal);?>" data-type="<?php echo $aKey;?>" href="javascript:void(0);"><span><?php echo urldecode($aVal);?></span><em></em></a>
                <?php
						}
					}
				?>
            </div>
            <em>共<?php echo $this->data['One'];?>结果</em> 
        </div> 
        <div id="mycard-plus">
            <div class="default-tag tagbtn clearfix">
                <div class="mm_zhanhui_list_fenlei fl">选择洲</div>
                <div class="clearfix fr mm_zhanhui_list_fenlei1 J-mm_zhanhui_list_fenlei1">
                	<?php
                    	if(!empty($this->delta)){
					?>
                    <div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr" data-type="delta">
                    	<?php
                        	foreach($this->delta as $k => $v){
						?>
                        <a value="-1" title="<?php echo $v['name'];?>" href="javascript:void(0);"><span><?php echo $v['name'];?></span><em></em></a>
						<?php
							}
						?>
                        <div class="mm_dianji"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dianji.png"></div>
                    </div>
             		<?php
						}
					?>
                </div>
            </div>
            <div class="default-tag tagbtn clearfix">
                <div class="mm_zhanhui_list_fenlei fl">选择国家</div>
                <div class="clearfix fr mm_zhanhui_list_fenlei1 J-mm_zhanhui_list_fenlei1">
                    <?php
                    	if(!empty($this->country_all)) foreach($this->country_all as $k => $v){
					?>
                    <div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr <?php if($k > 0){ echo('mm_show');};?>" data-type="countries">
                    	<?php
                        	foreach($v as $key => $val){
						?>
                        <a value="-1" title="<?php echo $val['name'];?>" href="javascript:void(0);"><span><?php echo $val['name'];?></span><em></em></a>
						<?php
							}
						?>
                        <?php
                        	if($k == 0){	
						?>
                        <div class="mm_dianji"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dianji.png"></div>
                        <?php
							}
						?>
                    </div>
             		<?php
						}else{
							echo '<div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr" data-type="countries"></div>';
						}
					?>              
                </div>
            </div>
            <div class="default-tag tagbtn clearfix">
                <div class="mm_zhanhui_list_fenlei fl">选择城市</div>
                <div class="clearfix fr mm_zhanhui_list_fenlei1 J-mm_zhanhui_list_fenlei1">
					<?php
						if(!empty($this->city_all)) foreach($this->city_all as $k => $v){
					?>
                    <div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr <?php if($k > 0){ echo('mm_show');}?>" data-type="city">
                    	<?php
                        	foreach($v as $key => $val){
						?>
                        <a value="-1" title="<?php echo $val['name'];?>" href="javascript:void(0);"><span><?php echo $val['name'];?></span><em></em></a>
						<?php
							}
						?>
						<?php
                        	if($k == 0){	
						?>
                        <div class="mm_dianji"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dianji.png"></div>
						<?php
							}
						?>
                    </div>   
          			<?php
						}else{
							echo '<div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr" data-type="city"></div>';
						}
					?>
                </div>
            </div>
			
        </div><!--mycard-plus end-->       
    </div>
</div>
<?php 
	if(!empty($this->data['attr'])) foreach($this->data['attr'] as $aKey => $aVal){
?>
<input type="hidden" name="<?php echo $aKey?>" value="<?php echo urldecode($aVal);?>" >
<?php
	}else{
?>
<input type="hidden" name="industry" value="<?php echo $this->Param['industry'];?>" >
<input type="hidden" name="delta" value="" >
<input type="hidden" name="countries" value="" >
<input type="hidden" name="city" value="" >
<?php } ?>
<script type="text/javascript">
	jQuery(document).ready(function(e) {
        //选择属性
		jQuery(".J-attr").on('click','a',function(){
			var $this = jQuery(this),
				title = $this.attr('title'),
				divObj = $this.parent('.J-attr'),
				type = divObj.data('type');	
			
			jQuery('input[name="'+type+'"]').val(title);
			
			var industry = jQuery('input[name="industry"]').val();
			var delta = jQuery('input[name="delta"]').val();
			var countries = jQuery('input[name="countries"]').val();
			var city = jQuery('input[name="city"]').val();
			
			window.location.href= '/convention/index/?industry='+industry+'&delta='+delta+'&countries='+countries+'&city='+city+'';
			
		});
		
		//取消属性
		jQuery(".J-tags").on('click','a',function(){
			var $this = jQuery(this),
				title = $this.attr('title'),
				type = $this.data('type');

			jQuery('input[name="'+type+'"]').val('');
			
			var industry = jQuery('input[name="industry"]').val();
			var delta = jQuery('input[name="delta"]').val();
			var countries = jQuery('input[name="countries"]').val();
			var city = jQuery('input[name="city"]').val();
			
			window.location.href= '/convention/index/?industry='+industry+'&delta='+delta+'&countries='+countries+'&city='+city+'';	
		});
    });
</script>

<!-- 内容 -->
<div class="mm_mid clearfix">
    <!-- 左边 -->
    <div class="mm_zhanhui_left fl">
        <div class="mm_zhanhui_shangjia clearfix">
			<?php
            	if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
			?>
            <div class="mm_zhanhui_list_left clearfix">
                <dl>
                    <dt><a href="/convention/<?php echo date('Y/m/d', $v['update_dateline']).'/'.$v['id'];?>.shtml"><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200" width="160" height="160"></a></dt>
                    <dd>
                        <h4>
<!--                            <a href="/convention/index/option/detail/id/--><?php //echo $v['id'];?><!--" style="color:#333;">-->
                                <a href="/convention/<?php echo date('Y/m/d', $v['update_dateline']).'/'.$v['id'];?>.shtml" style="color:#333;">
                                <?php echo $v['name'];?></a></h4>
                        <p>展会场馆：<?php echo $v['pavilion'];?></p>
                        <p>展会标签：<?php echo $v['label'];?></p>
                        <p>行业分类：<?php echo $v['industry'];?></p>
                        <div>
                            <?php
                            	$rating_number = empty($v['rating_number']) ? 1 : $v['rating_number'];
								for($i=0; $i < $rating_number; $i++){
									echo('<img src="'.STYLE_URL.'/style/quzhan/images/mm_star01.png">');	
								}
								
								$ratingArr = array('一星','二星','三星','四星','五星');
							?>
                            
                            <i>&nbsp;&nbsp;<?php echo $ratingArr[$rating_number - 1]?></i>
                        </div>
                    </dd>
                </dl>
                <div class="mm_zhanhui_jiage1">
                    <a href="/convention/index/option/detail/id/<?php echo $v['id'];?>">立即订展</a>
                </div>
            </div>
			<?php
				}
			?>
        </div>
        <!-- 页码 -->
        <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
			<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
        </div>
    </div>
    <!-- 右边 -->
    <div class="mm_zhanhui_right fr">
        <!-- 最新交易 -->
        <div class="mm_hot_right mm_margin">
            <div class="tab1">
                <ul class="menu1">
                    <li class="active1">最新交易</li>
                </ul>
                <div class="con3 mm_zhanhui_img" id="J-new-trading">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
            </div>
        </div>
        <!-- 签证服务 -->
        <div class="mm_hot_right mm_margin">
            <div class="tab1">
                <ul class="menu1">
                    <li class="active1">特装服务</li>
                </ul>
                <div class="con3" id="J-new-tezhuang">
                    <div align="center" style="padding:20px 0px;"><img src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" /></div>
                </div>
            </div>
        </div>
        <!-- 物流推荐   展装推荐 -->
        <div class="mm_hot_right mm_margin">
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
        <!-- ad -->
        <divc class="mm_zhanhui_ad">
        	<script src="/public/adv/option/image/id/8"></script>
            <script src="/public/adv/option/image/id/19"></script>
        </div>
    </div>  
</div>
<script id="new-trading" type="text/html">
	<!--循环数据-->
	<%if(All.length>0) { %>
		<%for( var i=0; i<All.length; i++){%>
		<dl>
			<a href="<%=All[i]['url']%>">
				<dt><img src="<%=All[i]['avatar']%>" width="42" height="42"></dt>
				<dd>
					<h6><%=All[i]['username']%></h6>
					<p><%=All[i]['goods_name']%></p>
				</dd>
			</a>
		</dl>
		<%}%>
	<%}%>
</script>

<script id="new-tezhuang" type="text/html">
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
jQuery.get('/public/index/option/trading',{'output':'json','type':'convention'},function(data){
	var bt=baidu.template;
	var html=bt('new-trading',data);
	document.getElementById('J-new-trading').innerHTML=html;

},'json');
//特装数据
jQuery.get('/public/index/option/data',{'output':'json','type':'decoration'},function(data){
	var bt=baidu.template;
	var html=bt('new-tezhuang',data);
	document.getElementById('J-new-tezhuang').innerHTML=html;

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
<?php include $this->Render('links_convention.php'); ?>
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
<!--点击收藏-->
<script>
(function(jQuery){
    var result = 0;
    jQuery(document).on("click",".mm_zan img",function(){
        if(result){
            jQuery(this).attr("src","<?php echo STYLE_URL;?>/style/quzhan/images/mm_zan01.png");
            jQuery(this).next().css("color","#999");
            result = 0;
        }
        else{
            jQuery(this).attr("src","<?php echo STYLE_URL;?>/style/quzhan/images/mm_zan02.png");
            jQuery(this).next().css("color","#ff4a00");
            result = 1;
        }       
    })

})(window.jQuery)
</script>
<!--点击关注-->
<script>
(function (jQuery){
    jQuery('.mm_guanzhu img').click(function(event) {
        /* Act on the event */
        if(this.getAttribute("src",2)=="<?php echo STYLE_URL;?>/style/quzhan/images/mm_guanzhu01.png"){
        this.src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_guanzhu02.png";
        }else{
        this.src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_guanzhu01.png";
        }
    });
    
}(window.jQuery));
</script>
<?php include $this->Render('footer.php');die();?>

