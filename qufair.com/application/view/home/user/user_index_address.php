<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 导航 -->
<?php include $this->Render('nav.php'); ?>
<!-- 个人中心 -->
<style type="text/css">
.fn-hide {
	display:none;
}
</style>
<div class="mm_mid">
    <!-- 个人中心顶部 -->
    <?php include $this->Render('user_top.php'); ?>
    
    <div class="clearfix">
        <!-- 个人中心左侧 -->
        <?php include $this->Render('user_left.php'); ?>
        <!--管理地址-->
        <div class="mm_geren_right fr J-label-addres">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>地址管理</h6>
            </div>
            <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
            <div class="mm_geren_dizhi1">
                <label for="address_default_<?php echo $k;?>" style="font-weight:normal; display:block; cursor:pointer;">
                    <ul>
                    	<?php
                        	if(!empty($v['address_txt'])){
						?>
                        <li>单位地址: <?php echo $v['address_txt'];?></li>
                        <?php
							}
						?>
                        <?php
                        	if(!empty($v['address_user_name'])){
						?>
                        <li>联&nbsp;&nbsp;系&nbsp;人: <?php echo $v['address_user_name'];?></li>
                        <?php
							}
						?>
                        <?php
                        	if(!empty($v['address_mobile'])){
						?>
                        <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $v['address_mobile'];?></li>
                        <?php
							}
						?>
                        
                        <?php
                        	if(!empty($v['address_tel'])){
						?>
                        <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $v['address_tel'];?></li>
                        <?php
							}
						?>
                        
                        <?php
                        	if(!empty($v['address_email'])){
						?>
                        <li>电子邮件:<?php echo $v['address_email'];?></li>  
                        <?php
							}
						?>
                        
                        <?php
                        	if(!empty($v['address_zipcode'])){
						?>
                        <li>邮　　编:<?php echo $v['address_zipcode'];?></li>  
                        <?php
							}
						?>   
                    </ul>
                    <input data-id="<?php echo $v['address_id'];?>" <?php if($v['address_id'] == 1){ echo('checked');}?> class="J-checkbox" id="address_default_<?php echo $k;?>" style="top:40%;" type="checkbox">
                </label>
            </div>
            <?php }?>
            <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
            	<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
            </div>
        </div>
        <!--管理地址结束-->
    </div>
</div>
<!-- 友情链接 -->
<script type="text/javascript">
jQuery(document).ready(function(e) {
	//设置默认地址
	jQuery(".J-label-addres").on('click','.J-checkbox',function(){
		var addressId = jQuery(this).attr('data-id'),
			isDefault,
			that = jQuery(this);
			
		if(jQuery(this).prop('checked')){
			isDefault = 1;
		}else{
			isDefault = 0;
		}

		jQuery.post('/user/index/option/default_address',{"address_id":addressId,"is_default":isDefault},function(data){
			if(data.state == 'success'){
				artDialog("设置成功",'succeed','close();');
			}else{
				artDialog("设置失败",'error','close();');
			}
			
		},'json');	

	})
	
	
});
function beforefunction(){
	jQuery("input[name='Submit']").val('保存中…');
}
function nofunction(){
	jQuery("input[name='Submit']").val('保存');
	artDialog("修改失败",'error','close();');
}

function yesSuccess(){
	artDialog("修改成功",'success','close();');
	window.location.reload();
}

</script>
<?php include $this->Render('footer.php'); ?>
