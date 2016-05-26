<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h4>发布展会服务</h4>
        </div>
        <div class="ms_xc_seach">
            <span>展会搜索</span>
            <form action="/convention/add/" method="post">
            	<div class="ms_xc_text">
                	<select name="regional" style="height:40px; border:none; border-right:1px solid #d9d9d9; position:relative; top:-3px;">
                        <option value="">请选择区域</option>
                        <?php
							if(!empty($this->delta)) foreach($this->delta as $k=>$v){
						?>
                        <option <?php echo $v == $this->key['regional'] ? 'selected' : '' ;?> value="<?php echo $v;?>"><?php echo $v;?></option>
							
						<?php
							}
						?>
                    </select>
                	<select name="industry" style="height:40px; border:none; border-right:1px solid #d9d9d9; position:relative; top:-3px;">
                        <option value="">请选择行业</option>
                        <?php
							if(!empty($this->nav)) foreach($this->nav as $k=>$v){
						?>
                        <option value="<?php echo $v['name'];?>"><?php echo $v['name'];?></option>
							<?php
								if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
							?>
                            	<option <?php echo $val['name'] == $this->key['industry'] ? 'selected' : '' ;?> value="<?php echo $val['name'];?>">&nbsp;<?php echo $val['name'];?></option>
							<?php
								}
							?>
						<?php
							}
						?>
                    </select>
                    <input type="text" name="nametitle" id="nametitle" style="width:350px; height:40px; border:none; position:relative; top:-3px;">
                </div>
                <input type="submit" class="ms_xc_input" value="搜索">
            </form>
        </div>
        
        <form action="/convention/add/" method="post">
        <div class="ms_xc_list J-ms_xc_list">
            <ul>
            	<?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
                <li class="clearfix">
                    <span style="font-size:14px;"><?php echo $v['name'];?></span>
                    <input name="checkbox" value="<?php echo $v['id'];?>" type="radio">
                </li>
                <?php }?>
            </ul>
            
        </div>
        <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
			<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
        </div>
        <div class="ms_xiayibu">
        	<input type="submit" value="下一步" />
            <input type="hidden" name="con_id" value="0" >
            <input type="hidden" name="option" value="info" >
        </div>
        </form>
        
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(e) {
   jQuery(".J-ms_xc_list").on('click','input',function(){
		var v = jQuery(this).val();
		jQuery('input[name="con_id"]').val(v);  
	}); 
	
});
</script>
<?php include $this->Render('footer.php'); ?>
