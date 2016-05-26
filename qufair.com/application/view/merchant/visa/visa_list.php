<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 签证列表 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>已发布签证</h5>
        <a href="javascript:history.go(-1);">返回上一页</a>
        <?php
        	if($this->online == 0){
		?>
        <a href="/visa/list/online/1">已下架&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <?php
			}else{
		?>
        <a href="/visa/list/online/0">上架&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <?php
			}
		?>
    </div>
    <div class="ms_seach clearfix">
        <span>全部展会共有出售中签证<?php echo $this->data['One'];?>条记录</span>
    </div>
    <div>
        <div class="mm_zh_dingdan_title">
            <ul class="clearfix">
                <li>签证信息</li>
                <li>签证价格/人</li>
                <li>是否下架</li>
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
                        <dt><img src="<?php echo ATTACH_IMAGE.$v['visa_cover'];?>!a200" width="90" height="90"></dt>
                        <dd>
                        	<h6><?php echo $v['visa_title'];?></h6>
                            <p>签证领区：<?php echo $v['visa_area'];?></p>
                            <p>签证类型：<?php echo $v['pro_type'];?></p>
                        </dd>
                    </dl>
                </li>
                <li><em>￥<?php echo $v['visa_price'];?></em></li>
                <li><em><?php echo $v['is_online'] == 0 ? '已上架' : '下架';?></em></li>
                <li><div><?php echo date('Y-m-d',$v['visa_time']);?></div></li>
                <li>
                    <a href="/visa/add/id/<?php echo $v['visa_id'];?>" target="_blank">签证编辑</a>
                    <a href="javascript:void(0);" class="mm_tan_shan J-mm_tan_shan" data-detailid="<?php echo $v['visa_id'];?>">签证删除</a>
                    <a href="javascript:void(0);" class="mm_tan_xia J-mm_tan_xia" data-detailid="<?php echo $v['visa_id'];?>"><?php echo $v['is_online'] == 1 ? '签证上架' : '签证下架';?></a>
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
		
		jQuery.post('/visa/list/option/remove/',{'detailId':detailId},function(data){},'json');
		
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
		
		jQuery.post('/visa/list/option/shelves/',{'detailId':detailId},function(data){},'json');
		
		window.location.href = window.location.href;	
	});
	
	
	
});
</script>
<?php include $this->Render('footer.php'); ?>
