<?php
        $webtitle = "2016最新国内外展览会行程|商务考察|商务旅游提供高效便捷服务".' - 去展网';
        $webdescription = "2016年最新国内外展会行程，包含展会行程出发地点，展会出发时间和展会价格，提供全球展览会行程安排和展会信息查询";
?>
<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<!-- banner -->
<?php include $this->Render('slide.php'); ?>
<!-- 详情 -->
<div class="mm_zhanhui_list mm_mid">
    <div class="mm_tezhuang_seach">
		<form action="/route/index/" method="post" name="search">
			<input type="text" name="key" class="mm_input001" placeholder="请输入关键词或展馆名称">
			<input type="submit" value="搜索" class="mm_input002">
		</form>
    </div>
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
                <div class="mm_zhanhui_list_fenlei fl">选择城市</div>
                <div class="clearfix fr mm_zhanhui_list_fenlei1 J-mm_zhanhui_list_fenlei1">
                	
                    <?php
						if(!empty($this->city_all)) foreach($this->city_all as $key=>$val){
					?>
					<div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr<?php echo $key > 0 ? ' mm_show' : '';?>" data-type="city">
						
						<?php
							foreach($val as $k=>$v){
						?>
                        <a value="-1" title="<?php echo $v['name'];?>" href="javascript:void(0);"><span><?php echo $v['name'];?></span><em></em></a>
						<?php
							}
						?>
						<?php
							if($key == 0){
						?>
                        <div class="mm_dianji"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dianji.png"></div>
						<?php
							}
						?>
                    </div>
					<?php
						}else{
					?>
					<div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr" data-type="city"></div>
                    <?php
						}
					?>
              
                	   
                </div>
            </div>
            
            <div class="default-tag tagbtn clearfix">
                <div class="mm_zhanhui_list_fenlei fl">选择年份</div>
                <div class="clearfix fr mm_zhanhui_list_fenlei1 J-mm_zhanhui_list_fenlei1">
                    <?php
                    	if(!empty($this->year_all)) foreach($this->year_all as $k => $v){
					?>
                    <div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr <?php if($k > 0){ echo('mm_show');};?>" data-type="year">
                    	<?php
                        	foreach($v as $key => $val){
						?>
                        <a value="-1" title="<?php echo $val['txt_year'];?>" href="javascript:void(0);"><span><?php echo $val['txt_year'];?>年</span><em></em></a>
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
					?>
					<div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr" data-type="year"></div>
                    <?php
						}
					?>                   
                </div>
            </div>
            
            <div class="default-tag tagbtn clearfix">
                <div class="mm_zhanhui_list_fenlei fl">选择月份</div>
                <div class="clearfix fr mm_zhanhui_list_fenlei1 J-mm_zhanhui_list_fenlei1">
                    <?php
                    	if(!empty($this->month_all)) foreach($this->month_all as $k => $v){
					?>
                    <div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr <?php if($k > 0){ echo('mm_show');};?>" data-type="month">
                    	<?php
                        	foreach($v as $key => $val){
						?>
                        <a value="-1" title="<?php echo $val['txt_month'];?>" href="javascript:void(0);"><span><?php echo $val['txt_month'];?>月</span><em></em></a>
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
					?>
					<div class="mm_zhanhui_list_xuanze J-mm_zhanhui_list_xuanze J-attr" data-type="month"></div>
                    <?php
						}
					?>                   
                </div>
            </div>
            
            
        </div><!--mycard-plus end-->       
    </div>
</div>

<input type="hidden" name="country" value="<?php echo empty($this->country) ? '' : $this->country;?>" >
<input type="hidden" name="city" value="<?php echo empty($this->city) ? '' : $this->city;?>" >
<input type="hidden" name="year" value="<?php echo empty($this->year) ? '' : $this->year;?>" >
<input type="hidden" name="month" value="<?php echo empty($this->month) ? '' : $this->month;?>" >

<script type="text/javascript">
	jQuery(document).ready(function(e) {
        //选择属性
		jQuery(".J-attr").on('click','a',function(){
			var $this = jQuery(this),
				title = $this.attr('title'),
				divObj = $this.parent('.J-attr'),
				type = divObj.data('type');	
			
			jQuery('input[name="'+type+'"]').val(title)
			
			var country = jQuery('input[name="country"]').val();
			var city = jQuery('input[name="city"]').val();
			var year = jQuery('input[name="year"]').val();
			var month = jQuery('input[name="month"]').val();
			
			window.location.href= '/route/index/country/'+country+'/city/'+city+'/year/'+year+'/month/'+month+'';
			
		});
		
		//取消属性
		jQuery(".J-tags").on('click','a',function(){
			var $this = jQuery(this),
				title = $this.attr('title'),
				type = $this.data('type');

			jQuery('input[name="'+type+'"]').val('');
			
			var country = jQuery('input[name="country"]').val();
			var year = jQuery('input[name="year"]').val();
			var city = jQuery('input[name="city"]').val();
			var month = jQuery('input[name="month"]').val();
			
			window.location.href= '/route/index/country/'+country+'/city/'+city+'/year/'+year+'/month/'+month+'';
		});
    });
</script>




<!-- 内容 -->
<div class="mm_mid clearfix">
    <!-- 左边 -->
    <div class="mm_zhanhui_left fl">
        <div class="mm_zhanhui_shangjia clearfix">
			<?php
				if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){
			?>
            <div class="mm_zhanhui_list_left clearfix">
                <dl>
                    <dt><a href="/route/index/option/detail/id/<?php echo $v['id'];?>"><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200" width="160" height="160"></a></dt>
                    <dd class="mm_guojiwuliu1">
                        <h4><a href="/route/index/option/detail/id/<?php echo $v['id'];?>" style="color:#333;"><?php echo $v['name'];?></a></h4>
                        <p>行程时间：<i><?php echo date('Y-m-d',$v['leave_time']);?>至<?php echo date('Y-m-d',$v['end_time']);?></i></p>
                        <p>出发地点：<?php echo $v['leave_area'];?></p>
                        <p>服务包含：<span><?php echo $v['hotel_star'];?></span></p>
                        <div class="mm_tezhuangfuwu1">
							<?php for($i=1;$i<=$v['average'];$i++){?>
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png">
							<?php }?>
                            <i>&nbsp;<?php echo StringCode::numberToChar($v['average']);?>星</i>
                            <span><em><?php echo $v['favcount'];?></em>人关注</span>
                        </div>
                    </dd>
                </dl>
                <div class="mm_zhanhui_jiage1">
                    <span><em>￥<?php echo $v['price'];?></em>/人</span>
                    <a href="/route/index/option/detail/id/<?php echo $v['id'];?>" class="mm_tezhuangfuwu_a1">立即购买</a>
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
            <script src="/public/adv/option/image/id/20"></script>
            <script src="/public/adv/option/image/id/21"></script>
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
			jQuery.get('/public/index/option/trading',{'output':'json','type':'route'},function(data){
				var bt=baidu.template;
				var html=bt('new-trading',data);
				document.getElementById('J-new-trading').innerHTML=html;
			
			},'json');
			
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
<?php include $this->Render('links_route.php'); ?>
<?php include $this->Render('footer.php'); ?>
<?php die();?>
