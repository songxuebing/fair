<!-- 友情链接 -->
<div class="mm_lianjie">
    <div class="mm_mid clearfix">
        <div class="mm_lianjie_left fl">
            <div class="mm_lianjie_left_title">
                <h6>友情链接</h6>
            </div>
            <div class="m_lianjie_left_con">
				<?php
					if(!empty($this->link)) foreach($this->link as $k=>$v){
						if($v['type'] == "6")				
						echo '<a href="'.$v['url'].'" target="_blank">'.$v['title'].'</a>';
					}
				?>
            </div>
        </div>
        <div class="mm_lianjie_right fr">
            <div class="mm_lianjie_right_app">
                <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_lianjie_app.png">
            </div>
            <p>下载去展APP</p>
        </div>
    </div>
</div>
