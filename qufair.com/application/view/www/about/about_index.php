<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 关于去展 -->
<div class="mm_about mm_mid clearfix">
    <div class="mm_about_left fl">
        <dl>
            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_title.png"></dt>
			<?php
				if(!empty($this->cat_all)) foreach($this->cat_all as $k=>$v){
			?>
            <dd>
                <a href="/about/index/id/<?php echo $v['cat_id'];?>" class="<?php echo $this->id == $v['cat_id'] ? 'mm_hover' : '';?>"><?php echo $v['cat_name'];?></a>
            </dd>
			<?php
				}
			?>
        </dl>
        <div class="mm_ad01">
            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_ad01.jpg">
        </div>
        <div class="mm_ad01">
            <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_ad01.jpg">
        </div>
    </div>
    <div class="mm_about_right fr">
        <div class="mm_about_title">
            <h6><?php echo $this->cat_row['cat_name'];?></h6>
        </div>
        <div class="mm_about_con">
           <?php echo $this->data['content'];?>
        </div>
    </div>
</div>
<?php include $this->Render('footer.php'); ?>