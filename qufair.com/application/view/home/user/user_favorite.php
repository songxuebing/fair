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
<style type="text/css">
.mm_geren_guanzhu ul li a {
	color:#333;
}
.mm_geren_guanzhu ul li.mm_geren_hover a {
	color:#ff4a00;
}
</style>
<div class="mm_mid">
    <?php include $this->Render('user_top.php'); ?>
    <div class="clearfix">
        <?php include $this->Render('user_left.php'); ?>
        <div class="mm_geren_right fr">
            <div class="mm_geren_guanzhu">
                <ul class="clearfix">
                    <li class="<?php echo $this->sort == 1 ? 'mm_geren_hover' : '' ; ?>"><a href="/user/favorite/sort/1">展会关注</a></li>
                    <li class="<?php echo $this->sort == 7 ? 'mm_geren_hover' : '' ; ?>"><a href="/user/favorite/sort/7">社区关注</a></li>
                </ul>
                <?php
                	if(empty($this->param['sort']) || $this->param['sort'] == 1){
				?>
                <div class="mm_geren_con1">
					<?php
						if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){
					?>
                    <div class="mm_geren_guanzhu_con">
                        <dl class="clearfix">
                            <dt><img src="<?php echo Common::AttachUrl($v['base']['image']);?>!a200" width="100" height="100"></dt>
                            <dd>
                                <h5><?php echo $v['base']['name'];?></h5>
                                <p>举办展馆：<span><?php echo $v['pavilion'];?></span></p>
                            </dd>
                        </dl>
                        <div class="mm_geren_quxiao clearfix">
                            <p>关注时间：<span><?php echo date('Y-m-d',$v['dateline']);?></span></p>
                            <a href="javascript:;" onClick="cannel_fav(<?php echo $v['related_id']?>);">取消关注</a>
                        </div>
                    </div>
					<?php
						}
					?> 
                </div>
                <?php
					}else{
				?>
                <div class="mm_geren_con1">
					<?php
						if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){
					?>
                    <div class="mm_geren_guanzhu_con">
                        <dl class="clearfix">
                            <dt><img src="<?php echo $v['base']['image'];?>" width="100" height="100"></dt>
                            <dd>
                                <h5><?php echo $v['base']['name'];?></h5>

                                <p>时间：<span><?php echo date('Y-m-d',$v['base']['dateline']);?></span></p>
                            </dd>
                        </dl>
                        <div class="mm_geren_quxiao clearfix">
                            <p>关注时间：<span><?php echo date('Y-m-d',$v['dateline']);?></span></p>
                            <a href="javascript:;" onClick="cannel_fav(<?php echo $v['related_id']?>);">取消关注</a>
                        </div>
                    </div>
					<?php
						}
					?> 
                </div>
                <?php
					}
				?>
            </div>
            <!-- 页码 -->
            <div class="mm_yema">
                <?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	function cannel_fav(_id){
		jQuery.post('/public/common/option/favorite/',{'sort':1,'related_id':_id},function(data){ //state状态 
			if(data.success){
				window.location.reload();
			}else{
				alert('取消失败');
			}
		},'json');
	}
</script>
<?php include $this->Render('footer.php'); ?>