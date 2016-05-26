<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 个人中心 -->
<div class="mm_mid">
    <?php include $this->Render('user_top.php'); ?>
    <div class="clearfix">
        <?php include $this->Render('user_left.php'); ?>
        <div class="mm_geren_right fr">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>帖子管理</h6>
            </div>
            <div class="mm_geren_xiaoxi">
                <ul>
					<?php
						if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
					?>
                    <li>
                        <h5><a href="<?php echo WEB_URL;?>/forum/detail/id/<?php echo $v['id'];?>" target="_blank"><?php echo $v['title'];?></a></h5>
                        <p><?php echo StringCode::GetCsubStr($v['content'],0,100);?></p>
                        <div class="clearfix">
                            <span>时间：<?php echo date('Y-m-d',$v['dateline']);?></span>
                            
                            <a href="javascript:;" class="RemoveLink" data-id="<?php echo $v['id'];?>" data-url="/user/forum/">删除</a>
                            <a href="<?php echo WEB_URL;?>/forum/index/option/edit/id/<?php echo $v['id'];?>" target="_blank">编辑&nbsp;&nbsp;</a>
                        </div>
                    </li>
					<?php
						}
					?>
                </ul>
            </div>
			<!-- 页码 -->
			<div class="mm_yema" style="float:right">
				<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
			</div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
	function removelink(_obj){
		_obj.parents('li').fadeOut('fast',function(){jQuery(this).remove();});
	}
</script>
<?php include $this->Render('footer.php'); ?>