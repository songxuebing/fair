<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>展会已发布</h5>
        <a href="javascript:history.go(-1);">&nbsp;&nbsp;返回上一页</a>
        <?php
			if(empty($this->param['show'])){
				echo '<a href="/convention/list/show/nosale/">已下架</a>';
			}else{
				echo '<a href="/convention/list/">已上架</a>';
			}
		?>
    </div>
    <div class="ms_seach clearfix">
        <span>全部展会共有出售中展会<?php echo $this->data['One'];?>条记录</span>
    </div>
    <div>
        <div class="mm_zh_dingdan_title">
            <ul class="clearfix">
                <li>展会信息</li>
                <li>展位价格</li>
                <li>数量剩余</li>
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
                        <dt><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200" width="90" height="90"></dt>
                        <dd>
                            <h6 style=" margin-bottom:0px;"><a style="color:#333;" href="<?php echo WEB_URL;?>/convention/index/option/order/detailid/<?php echo $v['detail_id'];?>" target="_blank"><?php echo $v['name'];?></a></h6>
                            <p>行业分类：<?php echo $v['industry'];?></p>
                            <p>展会时间：<?php echo date('Y-m-d',$v['start_time']);?>至<?php echo date('Y-m-d',$v['end_titme']);?></p>
                        </dd>
                    </dl>
                </li>
                <li><em>￥<?php echo $v['booth_price'];?></em></li>
                <li><div><?php echo $v['count'];?></div></li>
                <li><div><?php echo date('Y-m-d',$v['add_time']);?></div></li>
                <li>
                    <a href="/convention/list/option/edit/id/<?php echo $v['detail_id'];?>" target="_blank">展会编辑</a>
                    <a href="javascript:void(0);" class="mm_tan_shan J-mm_tan_shan" data-detailid="<?php echo $v['detail_id'];?>">展会删除</a>
                    <a href="javascript:void(0);" class="mm_tan_xia J-mm_tan_xia" data-detailid="<?php echo $v['detail_id'];?>"><?php echo $v['is_sale'] == 1 ? '展会上架' : '展会下架';?></a>
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
            <p>确定要执行上下架的操作吗</p>
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
		
		jQuery.post('/convention/list/option/remove/',{'detailId':detailId},function(data){},'json');
		
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
		
		jQuery.post('/convention/list/option/shelves/',{'detailId':detailId},function(data){},'json');
		
		window.location.href = window.location.href;	
	});
	
	
	
});
</script>
<?php include $this->Render('footer.php'); ?>
