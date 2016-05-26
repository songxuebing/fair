<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<style type="text/css">
	.clearfix .mm_yema li{
		display:inline;
	}
	.pagination-right{
		float:right;
	}
</style>
<!-- 个人中心 -->
<div class="mm_mid">
    <?php include $this->Render('user_top.php'); ?>
    <div class="clearfix">
        <?php include $this->Render('user_left.php'); ?>
        <div class="mm_geren_right fr">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>全部评价</h6>
            </div>
			<?php
				if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){
			?>
            <div class="mm_geren_dianping">
                <dl class="clearfix">
                    <dt><img src="<?php echo Common::AttachUrl($v['base']['image']);?>!a200" width="136" height="136"></dt>
                    <dd>
                        <h6><?php echo $v['base']['name'];?></h6>
                        <div>综合评论：<?php for($i=1;$i<=$v['score'];$i++){?><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_star01.png"><?php }?></div>
                        <div>评论：<?php echo date('Y-m-d');?></div>
                        <p><?php echo $v['message'];?></p>
                    </dd>
                </dl> 
            </div>   
			<?php
				}
			?>            
            <!-- 页码 -->
            <div class="mm_yema">
                <?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
            </div>
        </div>
    </div>
</div>
<?php include $this->Render('footer.php'); ?>