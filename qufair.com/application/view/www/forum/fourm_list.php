<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 列表 -->
<div class="mm_mid clearfix">
    <div class="mm_sqzx_list_left fl">
        <div class="mm_sqzx_list_left_title">
			<?php
				if(!empty($this->key)){
					echo '资讯搜索';
				}else{
			?>
            <a href="/forum/list/id/<?php echo $this->cat_row['id'];?>"><?php echo $this->cat_row['name'];?></a> &gt; 
            分类列表
			<?php }?>
        </div>
        <ul>
			<?php
				if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){
			?>
            <li>
                <a href="/forum/detail/id/<?php echo $v['id'];?>">
                    <h6><?php echo $v['title'];?></h6>
                    <div class="clearfix">
                        <span><?php echo date('Y-m-d H:i:s',$v['dateline']);?></span>
                        <i><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_pinglun01.png"><?php echo $v['comment'];?></i>
                    </div>
                </a>    
            </li>
			<?php
				}
			?>
        </ul>
        <!-- 页码 -->
		<div style="width:100%; height:35px;text-align:right;">
			<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
		</div>

    </div>
    <div class="mm_sqzx_list_right fr" style="margin-bottom:20px;">
        <div class="mm_sqzx_fatie">
            <a href="/forum/index/option/edit">我要发帖</a>
        </div>
        <div class="mm_sqzx_hot">
            <h5>大家都在看</h5>
			<?php
				if(!empty($this->clicks_list['All'])) foreach($this->clicks_list['All'] as $k=>$v){
			?>
            <dl>
                <a href="/forum/detail/id/<?php echo $v['id'];?>">
                    <dt><img src="<?php echo $v['cover'];?>!a200" width="300" height="222"></dt>
                    <dd><?php echo StringCode::GetCsubStr($v['title'],0,20);?></dd>
                </a>
            </dl>
			<?php
				}
			?>
        </div>
    </div>
</div>
<div style="height:30px;"></div>
<!-- ad -->
<div class="mm_mid">
	<script src="/public/adv/option/image/id/32"></script>
</div>
<!-- 智能推荐 -->
<div class="douban" style="margin-top:15px;">
    <div class="hd">
        <h2>智能推荐</h2>
        <ul>
			<?php
				for($i=1;$i<=$this->rand_num;$i++){
					echo '<li></li>';
				}
			?>
        </ul>
    </div>
    <div class="bd">
        <ul>
			<?php
				if(!empty($this->intelligent))  foreach($this->intelligent as $k=>$v){
			?>
            <li>
                <dl>
                    <a href="/convention/index/option/order/detailid/<?php echo $v['detail_id'];?>">
                        <dt><img src="<?php echo Common::AttachUrl($v['cover']);?>!a200"></dt>
                        <dd>
							<h5 style="overflow:hidden;"><?php echo $v['name'];?></h5>
							<p>
								<?php echo $v['pavilion'];?>
								<span><?php echo date('Y-m-d',$v['start_time']);?>&nbsp;&nbsp;<?php echo date('Y-m-d',$v['end_titme']);?></span>
							</p>
                        </dd>
                    </a>
                </dl>
            </li>
			<?php
				}
			?>
        </ul>
    </div>
</div>

<div style="height:30px;"></div>
<script type="text/javascript">jQuery(".douban").slide({ mainCell:".bd ul", effect:"left", delayTime:800,vis:5,scroll:5,pnLoop:false,trigger:"click",easing:"easeOutCubic" });</script>
<?php include $this->Render('links_forum.php'); ?>
<?php include $this->Render('footer.php'); ?>
