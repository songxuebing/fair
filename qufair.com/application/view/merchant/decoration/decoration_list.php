<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 特装列表 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>已发布特装</h5>
        <a href="javascript:history.go(-1);">返回上一页</a>
        <?php
        	if($this->online == 1){
		?>
        <a href="/decoration/list/online/1">已下架&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <?php
			}else{
		?>
        <a href="/decoration/list/online/0">上架&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <?php
			}
		?>
    </div>
    <div class="ms_seach clearfix">
        <span>全部展会共有出售中特装<?php echo $this->data['One'];?>条记录</span>
    </div>
    <div>
        <div class="mm_zh_dingdan_title">
            <ul class="clearfix">
                <li>特装信息</li>
                <li>特装价格/立方</li>
                <li>特装方式</li>
                <li>发布时间</li>
                <li>操作</li>
            </ul>
        </div>
        <?php
        	if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
		?>
        <div class="mm_zh_dingdan_con J-mm_zh_dingdan_con">
            <ul class="clearfix">
            	<li>
                    <dl>
                        <dt><img src="<?php echo ATTACH_IMAGE.$v['cover'];?>!a200" width="90" height="90"></dt>
                        <dd>
                            <h6><?php echo $v['title'];?></h6>
                            <p>服务城市：<?php echo $v['de_city'];?></p>
                            <p>擅长行业：<?php echo $v['industry'];?></p>
                        </dd>
                    </dl>
                </li>
                <li><em><?php echo $v['de_price'];?></em></li>
                <li><div><?php echo $v['proportion'];?></div></li>
                <li><div><?php echo date('Y-m-d',$v['de_time']);?></div></li>
                <li>
                    <a href="/decoration/add/id/<?php echo $v['id'];?>" target="_blank">特装编辑</a>
                    <a href="javascript:void(0);" class="mm_tan_shan J-mm_tan_shan" data-detailid="<?php echo $v['id'];?>">特装删除</a>
                    <a href="javascript:void(0);" class="mm_tan_xia J-mm_tan_xia" data-detailid="<?php echo $v['id'];?>"><?php echo $v['is_online'] == 1 ? '特装上架' : '特装下架';?></a>
                </li>
            </ul>
        </div>
      	<?php
			}
		?>
        <!-- 页码 -->
        <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
			<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
        </div>
        <!-- 弹出删除 -->
        <div class="mm_tanchu_shanchu" id="mm_shanchu">
            <h4>提示！</h4>
            <p>谨慎操作，删除后不可恢复</p>
            <div>
                <a href="javascript:void(0);" class="J-quxiao">取消</a>
                <a href="javascript:void(0);" class="J-queding">确定</a>
            </div>
        </div>
        <!-- 弹出下架 -->
        <div class="mm_tanchu_shanchu" id="mm_xiajia">
            <h4>提示！</h4>
            <?php
				if($this->online == 0){
			?>
            <p>谨慎操作，确定要下架吗？</p>

			<?php
				}else{
			?>
            <p>谨慎操作，确定要上架吗？</p>
			<?php
				}
			?>
            
            <div>
                <a href="javascript:void(0);" class="J-quxiao">取消</a>
                <a href="javascript:void(0);" class="J-queding">确定</a>
            </div>
        </div>
        <input type="hidden" class="J-detailid" name="detailid" />
        
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(e) {
	//删除
	jQuery(".J-mm_tan_shan").on('click',function(){
		var detailid = jQuery(this).data('detailid');
		jQuery(".J-detailid").val(detailid);
		
		jQuery("#mm_shanchu").show();	
	});

	jQuery("#mm_shanchu").on('click','.J-quxiao',function(){
		jQuery("#mm_shanchu").hide();	
	});
	
	jQuery("#mm_shanchu").on('click','.J-queding',function(){
		var detailId = jQuery(".J-detailid").val();
		
		jQuery.post('/decoration/list/option/remove/',{'detailId':detailId},function(data){},'json');
		
		window.location.href = window.location.href;
	});
	
	//下架上架
	jQuery(".J-mm_tan_xia").on('click',function(){
		var detailid = jQuery(this).data('detailid');
		jQuery(".J-detailid").val(detailid);
		
		jQuery("#mm_xiajia").show();		
	});
	
	jQuery("#mm_xiajia").on('click','.J-quxiao',function(){
		jQuery("#mm_xiajia").hide();	
	});
	
	jQuery("#mm_xiajia").on('click','.J-queding',function(){
		var detailId = jQuery(".J-detailid").val();
		
		jQuery.post('/decoration/list/option/shelves/',{'detailId':detailId},function(data){},'json');
		
		window.location.href = window.location.href;	
	});
	
	
	
});
</script>
<?php include $this->Render('footer.php'); ?>
