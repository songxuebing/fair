<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/quzhan/js/placeholder.js"></script>
<!-- 找回密码 -->
<div class="mm_denglu" style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/20160202/mm_img01_02.jpg) no-repeat; background-position: 50% 50%;">
    <div class="mm_mid">
        <div class="mm_denglu_con1 fr">
            <div class="mm_form">
                <h4>找回密码</h4>
                <form action="/auth/reset/" class="AjaxForm" method="post" autocomplete="off">
                <ul>
                    <li>
                        <input type="text" name="email_mobile" id="email_mobile" placeholder="手机号/邮箱" class="mm_input01 J-email_mobile">
                    </li>
                    <li>
                        <input type="text" name="code" id="code" placeholder="验证码" class="mm_input03">
                        <a href="javascript:;" class="mm_yanzheng J-mm-yanzheng J-yz-txt" style="outline:none;">发送验证码</a>
                    </li>
                    <li>
                        <input type="password" name="password01" id="password01" placeholder="密码" class="mm_input01">
                    </li>
                    <li>
                        <input type="password" name="password02" id="password02" placeholder="确认密码" class="mm_input01">
                    </li>
                    <li>
                        <input type="submit" name="Submit" value="立即找回" class="mm_input02 J-mm_input02">
                        
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
	
	jQuery('.J-mm_input02').on('click',function(){
		var txt = jQuery(".J-email_mobile").val();
		if(txt == ''){
			artDialog('手机号/邮箱不能为空','error','close();');
			return false;
		}
		var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(reg.test(txt)){
			jQuery('input[name="isemail"]').val(0);
		}else{
			jQuery('input[name="isemail"]').val(1);	
		}
		
		var password = jQuery(".J-password").val();
		if(password == ''){
			artDialog('密码不能为空','error','close();');
			return false;	
		}
		
	});
	
	//发送验证
	var timeNumber = 59,
		flag = true,
		t;
	jQuery(".J-mm-yanzheng").on('click',function(){
		var txt = jQuery(".J-email_mobile").val();
		var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(reg.test(txt)){
			jQuery('input[name="isemail"]').val(0);
		}else{
			var preg = /^1[0-9]{10}$/;
			if(!reg.test(txt)){
				jQuery('input[name="isemail"]').val(1);	
			}else{
				artDialog('手机号码不正确','error','close();');	
			}	
		}
		
		var isemail = jQuery('input[name="isemail"]').val();
		var emialmobile = jQuery(".J-email_mobile").val();
		if(isemail == ''){
			return false;	
		}
		if(flag){
			flag = false;
			jQuery(".J-yz-txt").html(timeNumber+'s');
		
			
			jQuery.post('/auth/reset/option/sendcode/',{'emialmobile':emialmobile,'isemail':isemail});

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
		}
			
	});
	
	
	
	jQuery("input").placeholder();
});


function beforefunction(){
	jQuery("input[name='Submit']").val('提交中…');
}
function nofunction(){
	jQuery('input[name="isemail"]').val('');
	jQuery("input[name='Submit']").val('立即找回');
}

function sucessCallback(){
	artDialog('找回成功','success','close();');
	window.location.href = '/auth/login/';
}

</script>	
<?php include $this->Render('footer.php'); ?>
