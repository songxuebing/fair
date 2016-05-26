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
        <div class="mm_geren_right fr">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>企业资料</h6>
            </div>
            <div class="mm_geren_ziliao">
            	<form action="/user/index" method="post" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
                <ul class="clearfix">
                    <li>
                        <span>企业资料完成度：</span>
                        <div style="width:640px; height:24px; overflow:hidden; position:relative; line-height:none; margin-top:6px;">
                            <div style="width:<?php echo $this->menberInfo['number']?>%; height:24px; overflow:hidden; background:#4da9ff; position:absolute; z-index:6; left:0; top:0; bottom:0; text-align:center; line-height:24px; color:#FFF;"><?php echo $this->menberInfo['number']?>%</div>
                            <div style="width:100%; height:24px; overflow:hidden; background:#f1f1f1; position:absolute; z-index:5; left:0; top:0; right:0; bottom:0;"></div>
                        </div>
                    </li>
                    <li>
                        <span>企业头像：</span>
                        <div>
                        	<p style="width:90px; height:90px; overflow:hidden; position:relative; float:left;">
                            	<img class="J-loade fn-hide" src="<?php echo STYLE_URL;?>/style/image/common/loaderc.gif" style="position:absolute; z-index:5; left:29px; top:29px;" />
                                <?php
									if(empty($this->menberInfo['avatar'])){
								?>
								<img class="J-avatar" src="/user/avatar/" width="90" height="90">
								<?php
									}else{
								?>
								<img class="J-avatar" src="<?php echo Common::AttachUrl($this->menberInfo['avatar']);?>!a200" width="90" height="90">
								<?php
									}
								?>
                            	
                            </p>

                            <p style="width:120px; height:40px; overflow:hidden; position:relative; margin-left:204px; float:right; top:20px;">
                            	<input type="file" class="J-imgfile" name="imgFile1" style="position:absolute; z-index:9; font-size:35px; opacity:0;" >
                                <input type="button" value="本地上传" class="mm_geren_input01" style="margin-left:0;">
                                <input type="hidden" value="<?php echo $this->menberInfo['avatar'];?>" name="cover" >
                            </p>
                            
                        </div>
                    </li>
                    <li>
                        <span>企业名称：</span>
                        <div><input name="company" id="company" value="<?php echo $this->menberInfo['company'];?>" type="text"></div>
                    </li>
                    <li>
                        <span>用户性别：</span>
                        <div>
                            <span>
                                <input type="radio" name="sex" value="1" <?php if($this->menberInfo['sex'] == 1){ echo('checked');}?> class="mm_geren_input03">男
                            </span>
                            <span>
                                <input type="radio" name="sex" value="0" <?php if($this->menberInfo['sex'] == 0){ echo('checked');}?> class="mm_geren_input03">女
                            </span>
                        </div>
                    </li>
                    <li>
                        <span>手机号码：</span>
                        <div><input name="mobile" id="mobile" readonly value="<?php echo $this->menberInfo['mobile'];?>" type="text"></div>
                    </li>
                    <li>
                        <span>所在城市：</span>
                        <div>
                            <select id="ship_province" name="ship_province"></select>&nbsp;
                            <select id="ship_city" name="ship_city"></select>&nbsp;
                            <select id="ship_area" name="ship_area"></select>&nbsp;
                        </div>
                    </li>
                    <li>
                        <span>详细地址：</span>
                        <div><input name="address" value="<?php echo $this->menberInfo['address'];?>" id="address" type="text"></div>
                    </li>
                    <li>
                        <span></span>
                        <div><input type="submit" name="Submit" value="保存" class="mm_geren_input02 J-submit"></div>
                    </li>
                </ul>
                <input type="hidden" name="ajax" value="1">
                <input type="hidden" name="id" value="<?php echo $this->id;?>">
                <input type="hidden" name="filebox" value="">
                <input type="hidden" name="option" value="submit">
                <input type="hidden" name="yesfn" value="yesSuccess()">
                <input type="hidden" name="nofn" value="nofunction()">
                <input type="hidden" name="beforefn" value="beforefunction()">
                
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 友情链接 -->
<script type="text/javascript">
jQuery(document).ready(function(e) {
	
	//上传头像
	jQuery(".J-imgfile").on('change',function(){
		var $this = jQuery(this);
		var $attach_path = '<?php echo ATTACH_IMAGE;?>';
		jQuery('input[name="filebox"]').val($this.attr('name'));
		jQuery('input[name="option"]').val('uploadImg');
		
		jQuery(".brand").ajaxSubmit({
			dataType: "json",
			beforeSubmit:function(){
				jQuery(".J-loade").removeClass('fn-hide');	
			},
			success:function(data){
				jQuery("input[name=option]").val('submit');
				if(data.success==true){
					jQuery(".J-loade").addClass('fn-hide');
					
					jQuery('input[name="cover"]').val(data.msg);
					jQuery(".J-avatar").attr("src",$attach_path + data.msg + '!a200');
				}else{
					artDialog(data.msg,'error','');
				}
			}
		});
		
		
	});
	
	jQuery(".J-submit").on('click',function(){
		jQuery('input[name="option"]').val('submit');	
	});
	
	addressInit('ship_province', 'ship_city', 'ship_area', '<?php echo empty($this->menberInfo['province']) ? '浙江省' : $this->menberInfo['province'];?>', '<?php echo empty($this->menberInfo['city']) ? '杭州市' : $this->menberInfo['city'];?>', '<?php echo empty($this->menberInfo['area']) ? '拱墅区' : $this->menberInfo['area'];?>'); 
	
});
function beforefunction(){
	jQuery("input[name='Submit']").val('保存中…');
}
function nofunction(){
	jQuery("input[name='Submit']").val('保存');
}

function yesSuccess(){
	artDialog("保存成功",'succeed','window.location.reload();');
}

</script>
<?php include $this->Render('footer.php'); ?>
