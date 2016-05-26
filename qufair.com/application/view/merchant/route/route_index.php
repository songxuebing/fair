<?php include $this->Render('header.php'); ?>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h4>行程服务发布</h4>
        </div>
        <div class="ms_xc_seach">
            <span>行程搜索</span>
			<form action="/route/index/" method="post" name="search">
            	<div class="ms_xc_text">
                
                
                <select name="regional" id="regional" onChange="get_country();" style="height:40px; border:none; border-right:1px solid #d9d9d9; position:relative; top:-3px;">
                    <option value="">请选择</option>
                    <?php
                        if(!empty($this->delta)) foreach($this->delta as $k=>$v){
                            $select = $v == $this->regional ? ' selected="selected"' : '';
                    ?>
                    <option value="<?php echo $v;?>"<?php echo $select;?>><?php echo $v;?></option>
                    <?php
                        }
                    ?>
                </select>
                <select name="countries" id="countries" style="height:40px; border:none; border-right:1px solid #d9d9d9; position:relative; top:-3px;">
                    <option value="">请选择国家</option>
                </select>
                <input type="text" name="key" id="key" style="width:350px; height:40px; border:none; position:relative; top:-3px;">
                </div>
				<input type="submit" class="ms_xc_input" value="搜索">
			</form>
        </div>
		<form action="/route/index/" method="post" name="rote" autocomplete="off">
        <div class="ms_xc_list J-ms_xc_list">
            <ul>
            	<?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
                <li class="clearfix">
                    <span style="font-size:14px;"><?php echo $v['name'];?></span>
                    <input name="con_id" value="<?php echo $v['id'];?>" type="radio">
                </li>
                <?php }?>
            </ul>
        </div>
        <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
			<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
        </div>
        <div class="ms_xiayibu">
        	<input type="submit" value="下一步" />
            <input type="hidden" name="option" value="edit" >
        </div>
		</form>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(e) {
    get_country('<?php echo($this->countries);?>');		
});
function get_country(_v,callback){
	var regional = jQuery("#regional").val();
	jQuery.post('/public/index/',{'option':'get_region','name':regional,'level':0},function(data){
		var html = '<option value="">请选择国家</option>';
		jQuery.each(data,function(i,v){
			var $select = v.name == _v ? ' selected="selected"' : '';
			html += '<option value="'+v.name+'"'+$select+'>'+v.name+'</option>';
		});
		jQuery("#countries").html(html);
		jQuery("#city").html('<option value="">请选择城市</option>');
		
		callback && callback();
	},'json');
}
function get_city(_v){
	var regional = jQuery("#countries").val();
	jQuery.post('/public/index/',{'option':'get_region','name':regional,'level':1},function(data){
		var html = '<option value="">请选择城市</option>';
		jQuery.each(data,function(i,v){
			var $select = v.name == _v ? ' selected="selected"' : '';
			html += '<option value="'+v.name+'"'+$select+'>'+v.name+'</option>';
		});
		jQuery("#city").html(html);
	},'json');
}
</script>
<?php include $this->Render('footer.php'); ?>