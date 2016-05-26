<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/quzhan/js/placeholder.js"></script>
<!-- 找回密码 -->
<div class="mm_denglu" style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_img01.jpg) no-repeat; background-position: 50% 50%;">
    <div class="mm_mid">
        <div class="mm_denglu_con1 fr" style="height:auto;">
            <div class="mm_form">
                <div class="reg-box">
                	<a href="<?php echo WEB_URL;?>/register/index/"  style="position:relative; top:6px;">参展商注册</a>
                    <a class="on" href="<?php echo MERCHANT_URL;?>/auth/register/">展会服务商注册</a>
                </div>
                <form action="/auth/register/" class="AjaxForm brand" method="post" autocomplete="off">
                <ul>
                    <li>
                        <input type="text" name="email_mobile" placeholder="手机号" class="mm_input01 J-email_mobile">
                    </li>
                    <li>
                        <input type="text" name="username" placeholder="公司名称" class="mm_input01 J-username">
                    </li>
                    <li>
                        <input type="password" name="password" placeholder="密码" class="mm_input01 J-password">
                    </li>
					<li>
						<input type="text" name="code" id="code" placeholder="图形验证码" class="mm_input03 J-yzm">
						<img src="/public/captcha/?name=register&width=130&height=38&" name="/public/captcha/?name=register&width=130&height=38&" style="cursor:pointer; margin-top:20px; float:right;" id="captchaimg" onclick="this.src=this.name+Math.random()" border="0" alt="看不清请点击重新获取" />
					</li>
                    <li>
                        <input type="text" name="yzm" placeholder="验证码" class="mm_input03 J-yzm">
                        <a href="javascript:;" class="mm_yanzheng J-mm-yanzheng J-yz-txt" style="outline:none;">发送验证码</a>
                    </li>
                    
                    <style type="text/css">
                    	.my-tag-box {
							width: 520px;
							height: auto;
							position: absolute;
							background: #FFF;
							border: 1px solid #d9d9d9;
							top: -10px;
							padding: 15px 10px;
							z-index:5;
						}
						
						.my-tag-box dd,.tag-box dd {
							border: 1px solid #d9d9d9; display: inline-block; padding: 5px 10px; border-radius: 5px; position:relative; margin-bottom:15px; margin-right:15px; cursor:pointer;
						}
						
						.tag-box dd {
							margin-top:15px; margin-bottom:0;
						}
						
						.my-tag-box dd.on {
							background:#eeeeee;
						}
						
						.tag-box {
							width: 100%;
							height: auto;
						}
						
						.fn-hide {
							display:none;
						}
                    </style>
                    <script type="text/javascript">
                    	jQuery(document).ready(function(e) {
                            jQuery(".J-tag-box-close").on('click',function(){
								jQuery(".J-my-tag-box").addClass('fn-hide');
							});
							
							jQuery(".J-my-tag-box").on('click','dd',function(){
								if(jQuery(this).hasClass('on')){
									jQuery(this).removeClass('on');	
								}else{
									jQuery(this).addClass('on');
								}
							});
							
							jQuery(".J-button-tag").on('click',function(){
								var html="";
								var txt = "";
								var txtid = "";
								jQuery(".J-my-tag-box").find('dd').each(function(index, element) {
                                    if(jQuery(element).hasClass('on')){
										txt+=jQuery(element).text()+' ';
										txtid+=jQuery(element).data('tagid')+' ';
										
										html+='<dd data-tagid="'+txtid+'">'+jQuery(element).text()+'</dd>';
									}
                                });
								
								jQuery("#mytag").val(txt);	
								jQuery("#mytagid").val(txtid);	
								jQuery(".J-tag-box").html(html);
								
								jQuery(".J-my-tag-box").addClass('fn-hide');
							});
							
							jQuery(".J-show-tag").on('click',function(){
								jQuery(".J-my-tag-box").removeClass('fn-hide');	
							});
                        });
                    </script>
                    <li style="width:100%; height:auto; margin-top:20px; position:relative;">
                    	<div>我的标签&nbsp;&nbsp;<a style="float:none; border: 1px solid #d9d9d9; display: inline-block; padding: 5px 10px; border-radius: 5px;" class="J-show-tag" href="javascript:;">+添加我的标签</a></div>
                        <dl class="my-tag-box fn-hide J-my-tag-box">
                        	<dt class="J-tag-box-close" style="text-align:right; position:relative; top:-5px;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_close_02.png" /></dt>
                        	<?php
                            	if(!empty($this->cTagRow)) foreach($this->cTagRow as $key => $val){
							?>
                            <dd data-tagid="<?php echo $val['ctag_id'];?>"><?php echo $val['ctag_name'];?></dd>
                            <?php
								}
							?>
                            <div><input style="padding:5px 10px; border:none; background:##01af63" class="J-button-tag" type="button" value="确定" /></div>
                        </dl>
                        
                        <dl class="tag-box J-tag-box">
                        	
                        </dl>
						<input type="hidden" name="mytag" id="mytag" value="" />
                        <input type="hidden" name="mytagid" id="mytagid" value="" />
                    </li>
                    
                    
                    <li>
                        <input type="checkbox" name="tiaokuan" checked class="mm_input04">
                        <span>我已阅读并接受<a href="<?php echo STYLE_URL;?>/style/quzhan/doc/wlfwxy.docx" target="_blank">《去展用户服务协议》</a></span>
                    </li>
                    <li>
                        <input type="submit" name="Submit" value="立即注册" class="mm_input02 J-mm_input02" style="margin-bottom:20px;">                        
                        <input type="hidden" name="ajax" value="1">
                        <input type="hidden" name="isemail" value="">
                        <input type="hidden" name="option" value="submit">
                        <input type="hidden" name="yesfn" value="sucessCallback();">
                        <input type="hidden" name="nofn" value="nofunction()">
                        <input type="hidden" name="beforefn" value="beforefunction()">
                    </li>
                </ul> 
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(e) {
     jQuery(".nav p").click(function(){
        var ul=jQuery(".new");
        if(ul.css("display")=="none"){
            ul.slideDown();
        }else{
            ul.slideUp();
        }
    });
    
    jQuery(".set").click(function(){
        var _name = jQuery(this).attr("name");
        if( jQuery("[name="+_name+"]").length > 1 ){
            jQuery("[name="+_name+"]").removeClass("select");
            jQuery(this).addClass("select");
        } else {
            if( jQuery(this).hasClass("select") ){
                jQuery(this).removeClass("select");
            } else {
                jQuery(this).addClass("select");
            }
        }
    });
    
    jQuery(".nav li").click(function(){
        var li=jQuery(this).text();
        jQuery(".nav p").html(li);
        jQuery(".new").hide();
        /*$(".set").css({background:'none'});*/
        jQuery("p").removeClass("select") ;   
    });
	
	//发送验证
	var timeNumber = 59,
		flag = true,
		t;
	jQuery(".J-mm-yanzheng").on('click',function(){
		var code = jQuery("#code").val();
		if(code == ''){
			artDialog('请输入图形验证码','error','');
			return false;
		}
		var txt = jQuery(".J-email_mobile").val();
		var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(reg.test(txt)){
			jQuery('input[name="isemail"]').val(0);
		}else{
			var preg = /^1[0-9]{10}$/;
			if(!reg.test(txt)){
				jQuery('input[name="isemail"]').val(1);	
			}else{
				artDialog('手机号码不正确','error','');
				return false;
			}	
		}
		
		var isemail = jQuery('input[name="isemail"]').val();
		var emialmobile = jQuery(".J-email_mobile").val();
		var username = jQuery(".J-username").val();
		if(isemail == ''){
			return false;	
		}
		if(flag){
			jQuery.post('/auth/register/option/sendcode/',{'emialmobile':emialmobile,'username':'username','isemail':isemail,'code':code},function(data){
				if(data.success){
					flag = false;
					jQuery(".J-yz-txt").html(timeNumber+'s');
					artDialog('验证码已发送','succeed','');
					t = setInterval(function(){
						timeNumber--;
						jQuery(".J-yz-txt").html(timeNumber+'s');
						
						if(timeNumber == 0){
							clearInterval(t);
							timeNumber = 59;
							jQuery(".J-yz-txt").html('重新发送');
							flag = true;
						}	
					},1000);					
				}else{
					artDialog(data.msg,'error','');
				}
				
			},'json');

		}
			
	});
	
	
	jQuery('.J-mm_input02').on('click',function(){
		var txt = jQuery(".J-email_mobile").val();
		if(txt == ''){
			artDialog('手机号/邮箱不能为空','error','');
			return false;
		}
		var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(reg.test(txt)){
			jQuery('input[name="isemail"]').val(0);
		}else{
			jQuery('input[name="isemail"]').val(1);	
		}
		
		var username = jQuery(".J-username").val();
		if(username == ''){
			artDialog('用户名不能为空','error','');
			return false;	
		}
		
		var password = jQuery(".J-password").val();
		if(password == ''){
			artDialog('密码不能为空','error','');
			return false;	
		}
		
		var yzm = jQuery(".J-yzm").val();
		if(yzm == ''){
			artDialog('验证码不能为空','error','');
			return false;	
		}	
		
		var mytagid = jQuery("#mytagid").val();
		if(mytagid == ''){
			artDialog('请添加标签','error','');
			return false;		
		}
		
	});

	jQuery("input").placeholder();
});


function beforefunction(){
	jQuery("input[name='Submit']").val('注册中…');
}
function nofunction(){
	jQuery('input[name="isemail"]').val('');
	jQuery("input[name='Submit']").val('立即注册');
}

function sucessCallback(){
	artDialog('注册成功，请登陆','succeed','window.location.href = "/auth/login/";');

}

</script>	
<?php include $this->Render('footer.php'); ?>
