<?php include $this->Render('header.php'); ?>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>已发布行程</h5>
        <a href="javascript:history.go(-1);" style="margin-left:20px;">返回上一页</a>
		<?php
			if(empty($this->param['show'])){
				echo '<a href="/route/list/show/nosale/">已下架</a>';
			}else{
				echo '<a href="/route/list/">已上架</a>';
			}
		?>
    </div>
    <div class="ms_seach clearfix">
        <span>全部行程共有出售中行程<?php echo $this->data['One'];?>条记录</span>
        <!-- <div class="ms_seach1 fr">
            <input type="text" class="ms_seach1_text" placeholder="输入订单编号或下单时间搜索">
            <input type="button" value="订单搜索" class="ms_seach1_button">
        </div> -->
    </div>
    <div>
        <div class="mm_zh_dingdan_title">
            <ul class="clearfix">
                <li>订单信息</li>
                <li>行程价格/人</li>
                <li>是否上架</li>
                <li>发布时间</li>
                <li>操作</li>
            </ul>
        </div>
		<?php
			if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){
		?>
        <div class="mm_zh_dingdan_con">
            <ul class="clearfix">
                <li>
                    <dl>
                        <dt><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200" width="90" height="90"></dt>
                        <dd>
                            <h6><?php echo $v['name'];?></h6>
                            <p>出发地点：<?php echo $v['leave_area'];?></p>
                            <p>行程时间：<?php echo date('Y-m-d',$v['leave_time']);?>至<?php echo date('Y-m-d',$v['end_time']);?></p>
                        </dd>
                    </dl>
                </li>
                <li><em>￥<?php echo $v['price'];?></em></li>
                <li><div><?php echo $v['is_sale'] == 1 ? '上架' : '下架';?></div></li>
                <li><div><?php echo date('Y-m-d',$v['dateline']);?></div></li>
                <li>
                    <a href="/route/index/option/edit/id/<?php echo $v['id'];?>/con_id/<?php echo $v['con_id'];?>" target="_blank">行程编辑</a>
                    <a href="javascript:void(0);" class="mm_tan_shan J-mm_tan_shan" data-detailid="<?php echo $v['id'];?>">行程删除</a>
                    <a href="javascript:void(0);" class="mm_tan_xia J-mm_tan_xia" data-detailid="<?php echo $v['id'];?>"><?php echo $v['is_sale'] == 1 ? '行程下架' : '行程上架';?></a>
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
            <p>确定要执行上下架的操作吗？</p>
            <div>
                <a href="javascript:void(0);" class="J-quxiao">取消</a>
                <a href="javascript:void(0);" class="J-queding">确定</a>
            </div>
        </div>
		<input type="hidden" class="J-detailid" name="detailid" />
    </div>
</div>
</form>
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
		
		jQuery.post('/route/list/option/remove/',{'id':detailId},function(data){
			if(data.success){
				window.location.href = window.location.href;
			}else{
				alert(data.msg);
			}
		
		},'json');
		
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
		jQuery.post('/route/list/option/saleopt/',{'id':detailId},function(data){
			if(data.success){
				window.location.href = window.location.href;
			}else{
				alert(data.msg);
			}
		
		},'json');
		
			
	});
	
	
	
});
</script>
<?php include $this->Render('footer.php'); ?>