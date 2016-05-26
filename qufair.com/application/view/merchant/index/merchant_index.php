<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3>企业资料</h3>
        </div>
        <div class="mm_zhanhui_ping_title mm_mar20 clearfix">
            <h6>基本资料</h6>
        </div>
        <div class="ms_jiben mm_mar20">
            <div class="ms_jiben_touxiang">
                <span>企业LOGO</span>
                <img src="<?php echo empty($this->menberInfo['avatar']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_touxiang.jpg' : Common::AttachUrl($this->menberInfo['avatar']).'!a200';?>" width="88" height="88">
                <a href="javascript:void(0);">修改头像</a>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>企业名称</span>
                <p><?php echo $this->menberInfo['company'];?></p>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>服务内容</span>
                <p><?php echo $this->menberInfo['company_service'];?></p>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>公司电话</span>
                <p><?php echo $this->menberInfo['telephone'];?></p>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>企业介绍</span>
                <p style="height:auto; overflow:hidden; line-height:22px; padding:10px;"><?php echo $this->menberInfo['company_note'];?></p>
                <textarea id="editcon"></textarea>
                <a href="javascript:void(0);" data-col="company_note">修改</a>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>认证信息</span>
                <p>
					<?php
						if(!empty($this->supplier_purview)) foreach($this->supplier_purview as $k=>$v){
							if($v['cert']['cert_state'] == 2){
								echo "<i>".$v['type_name']."已认证</i>";
							}
						}
					?>
                </p>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>所在地址</span>
                <p><?php echo $this->menberInfo['address'];?></p>
            </div>
        </div>
        <div class="mm_zhanhui_ping_title mm_mar20 clearfix">
            <h6>账户信息</h6>
        </div>
        <div class="ms_jiben mm_mar20">
            <div class="ms_jiben_ziliao clearfix">
                <span>登陆邮箱</span>
                <p><?php echo $this->menberInfo['email'];?></p>
                <textarea id="editcon"></textarea>
                <a href="javascript:void(0);" data-col="email">修改</a>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>手机号码</span>
                <p><?php echo $this->menberInfo['mobile'];?></p>
                <textarea id="editcon"></textarea>
                <a href="javascript:void(0);" data-col="mobile">修改</a>
            </div>
            <div class="ms_jiben_ziliao clearfix">
                <span>密码修改</span>
                <p>********</p>
                <textarea id="editcon"></textarea>
                <a href="javascript:void(0);" data-col="password">修改</a>
            </div>
        </div>
        <!-- 弹出头像修改 -->
        <div class="ms_jiben_xiugai" style="z-index:299">
            <div class="ms_jiben_xiugai_title">
                <h6>头像修改</h6>
            </div>
			<form action="/index/index/" method="post" name="avatar" class="avatarform" enctype="multipart/form-data">
            <div class="ms_jiben_xiugai_con">
                <p>新头像不允许涉及政治敏感与色情;</p>
                <p>图片格式必须为：png, jpeg, jpg, gif;不可大于2M</p>  
                <div style="position:relative; width:120px; height:50px; overflow:hidden;"><input type="file" class="J-imgfile" name="imgFile1" style=" font-size:25px; position:absolute; z-index:9; top:0px; left:-280px; bottom:0px; right:0px;  filter:alpha(opacity=0); -moz-opacity:0; -khtml-opacity: 0; opacity: 0;" ><a href="javascript:void(0);" onClick="jQuery('.J-imgfile').click();">选择图片</a></div>
				
				<input type="hidden" name="avatar" value="<?php echo $this->menberInfo['avatar'];?>">
                <div class="ms_jiben_xiugai_xuanze clearfix">
                    <img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_shenfen_moren01.jpg" class="J-avatar fl" width="200" height="200">
                    <div class="ms_jiben_xiugai_yulan fl">
                        <span>
                            <h6>头像预览</h6>    
                        </span>
                        <span>
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_shenfen_moren01.jpg" class="J-avatar" width="140" height="140">
                            <img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_shenfen_moren01.jpg" class="J-avatar" width="138" height="138">
                        </span>
                    </div>
                </div>
            </div>
            <div class="ms_jiben_queren">
                <a href="javascript:void(0);" onClick="do_submit();">确认</a>
            </div>
			<input type="hidden" name="ajax" value="1">
			<input type="hidden" name="filebox" value="">
			<input type="hidden" name="option" value="submit">
			<input type="hidden" name="yesfn" value="yesSuccess()">
			<input type="hidden" name="nofn" value="nofunction()">
			<input type="hidden" name="beforefn" value="beforefunction()">
			</form>
        </div>
    </div>
</div>
<!--底部-->
<script>
jQuery(function(){
    jQuery(".ms_jiben_ziliao a").bind("click",function(){
        var _txt=jQuery(this).text();
        if(_txt=="修改"){
            jQuery(this).prev(".ms_jiben_ziliao textarea").show();
            jQuery(this).text("完成");

        }else{
			var $col = jQuery(this).data("col");
			var $value = jQuery(this).siblings("#editcon").val();
			var that = jQuery(this);
			jQuery.post('/index/index/',{'option':'ajaxedit','col':$col,'val':$value},function(data){
				if(data.success){
					if($col != 'password'){
						that.siblings("p").html($value);
					}
	            	that.prev(".ms_jiben_ziliao textarea").hide();
            		that.text("修改");
				}else{
					artDialog(data.msg,'error','');
				}
			},'json');
  
        }
    });
});
</script>
<script type="text/javascript">
	function do_submit(){
		jQuery("input[name=option]").val('submit');
		jQuery(".avatarform").ajaxSubmit({
			dataType: "json",
			beforeSubmit:function(){},
			success:function(data){
				if(data.success==true){
					artDialog(data.msg,'succeed','window.location.reload();');
				}else{
					artDialog(data.msg,'error','');
				}
			}
		});
		
	}
	//上传头像
	jQuery(".J-imgfile").on('change',function(){
		var $this = jQuery(this);
		var $attach_path = '<?php echo ATTACH_IMAGE;?>';
		
		var dialog = art.dialog({
			title: '提示',
			content: '上传中，请稍候',
			fixed:true,
			lock:true,
			cancel:false,
			id:'upinfo'
		});
		
		jQuery('input[name="filebox"]').val($this.attr('name'));
		jQuery('input[name="option"]').val('upavatar');
		
		jQuery(".avatarform").ajaxSubmit({
			dataType: "json",
			beforeSubmit:function(){},
			success:function(data){
				jQuery("input[name=option]").val('submit');
				if(data.success==true){
					art.dialog({id:'upinfo'}).close();					
					jQuery('input[name="avatar"]').val(data.msg);
					jQuery(".J-avatar").attr("src",$attach_path + data.msg + '!a200');
				}else{
					artDialog(data.msg,'error','');
					art.dialog({id:'upinfo'}).close();
				}
			}
		});
		
		
	});
	//登陆弹出遮罩层（弹出框）
    jQuery(".ms_jiben_touxiang a").click(function(){
            var h=jQuery(document).height();
            var w=jQuery(document).width();
        jQuery(".mm_mid").after("<div id='mask'></div>");
        jQuery("#mask").css({
            "width":w,
            "height":h,
            "background":"rgba(0,0,0,0.2)",
            "position":"absolute",
            "left":0,
            "top":0,
            "z-index":200,
        });
        jQuery(".ms_jiben_xiugai").show();
    });
    
      //点击关闭
    jQuery(".ms_jiben_queren a").click(function(){
        jQuery(".ms_jiben_xiugai").hide();
        jQuery("#mask").remove();
    });
</script>
<?php include $this->Render('footer.php'); ?>