<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/quzhan/js/placeholder.js"></script>
<!-- 登录 -->
<div class="mm_denglu" style="background:url(<?php echo STYLE_URL;?>/style/quzhan/images/20160202/mm_img01_02.jpg) no-repeat; background-position: 50% 50%;">
    <div class="mm_mid">
        <div class="mm_denglu_con fr">
            <div class="mm_form">
                <div class="reg-box">
                	<a href="/login/index/" class="on">参展商登陆</a>
                    <a href="<?php echo MERCHANT_URL;?>/auth/login/" style="position:relative; top:10px;">展会服务商登陆</a>
                </div>
                <form action="/login/index/" class="AjaxForm" method="post" autocomplete="off">
                <ul>
                    <li>
                        <input type="text" name="email_mobile" id="email_mobile" placeholder="手机号" class="mm_input01 J-email_mobile">
                    </li>
                    <li>
                        <input type="password" name="password" id="password" placeholder="密码" class="mm_input01 J-password">
                    </li>
                    <li>
                        <a href="/login/reset/">忘记密码</a>
                    </li>
                    <li>
                        <input type="submit" name="Submit" value="立即登录" class="mm_input02 J-mm_input02">
                        <input type="hidden" name="ajax" value="1">
                        <input type="hidden" name="isemail" value="">
                        <input type="hidden" name="option" value="submit">
						<input type="hidden" name="reurl" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
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
	
	jQuery("input").placeholder();

});


function beforefunction(){
	jQuery("input[name='Submit']").val('登陆中…');
}
function nofunction(){
	jQuery('input[name="isemail"]').val('');
	jQuery("input[name='Submit']").val('立即登录');
}

function sucessCallback(){
	artDialog('登陆成功','succeed','close();');
	var reurl = jQuery('input[name="reurl"]').val();
	window.location.href = '<?php echo MEMBER_URL;?>/index/index/';
	/*
	if(reurl == ''){
		window.location.href = '<?php echo MEMBER_URL;?>/index/index/';
	}else{
		window.location.href = reurl;
	}*/
}

</script>	
<?php include $this->Render('footer.php'); ?>
