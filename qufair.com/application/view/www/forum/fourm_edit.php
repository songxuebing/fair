<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]',{
			uploadJson : '/public/ueditor/',
			allowFileManager : false,
			afterBlur: function () { this.sync(); },
			items : [
				'undo', 'redo', '|', 'preview', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist','clearhtml', 'quickformat', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', 'image', 'table', 'hr','fullscreen'
			],
		});
});
</script>

<!-- 内容 -->
<div class="mm_mid clearfix mm_mar20">
    <!-- 左边 -->
    <div class="mm_zhanhui_right fl" style="margin-bottom:20px;">
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
        <!-- 展位推荐 -->
        <div class="mm_hot_right mm_margin">
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
        <div class="mm_zhanhui_ad">
            <script src="/public/adv/option/image/id/30"></script>
            <script src="/public/adv/option/image/id/31"></script>
        </div>
    </div>  
    <!-- 右边 -->
    <div class="mm_fbtz fr">
		<form action="/forum/index/" method="post" name="rote" enctype="multipart/form-data" class="AjaxForm rote" autocomplete="off">
        <ul style="width:100%; height:auto; overflow:hidden;">
            <li>
                <label>标题名称：</label>
                <input type="text" name="title" value="<?php echo $this->data['title'];?>" class="mm_fbtz_input01">
            </li>
            <li>
                <label>所属版块：</label>
                <select name="cat_id" style="height:30px; margin-top:6px;">					
					<?php
						if(!empty($this->cat)) foreach($this->cat as $k=>$v){
							echo '<optgroup label="'.$v['name'].'">';
								if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
									
									if($val['id'] == $this->data['cat_id']){
										echo '<option selected="selected" value="'.$val['id'].'">'.$val['name'].'</option>';
									}else{
										echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';
									}
								}
							echo '</optgroup>';
						}
					?>
				</select>
            </li>
            <li style="margin-bottom:20px;">
                <label>关键词：</label>
                <input type="text" name="tag" value="<?php echo $this->data['tag'];?>" class="mm_fbtz_input01">
                <p>(多个关键词用空格隔开)</p>
            </li>
        </ul>
        
        <div class="mm_zhanhui_ping_title clearfix" >
            <h6>资讯详情</h6>
        </div>
        <div class="mm_fbtz_bianji">
            <textarea name="content" style="width:780px; height:350px;display:none"><?php echo $this->data['content'];?></textarea>
			<input type="hidden" name="ajax" value="1">
            <input type="hidden" name="id" value="<?php echo $this->id;?>">
			<input type="hidden" name="option" value="submit">
			<input type="hidden" name="yesfn" value="yesfn();">
			<input type="hidden" name="nofn" value="nofunction()">
			<input type="hidden" name="beforefn" value="beforefunction()">
            <input type="submit" name="Submit" value="确认发布">
        </div>
		</form>
    </div>
</div>
<script type="text/javascript">
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('确认发布');
	}
	function yesfn(){
		artDialog('发布成功','succeed','window.location.href="/forum/index/"');
	}
</script>
<?php include $this->Render('links_forum.php'); ?>
<?php include $this->Render('footer.php'); ?>
<?php die();?>
