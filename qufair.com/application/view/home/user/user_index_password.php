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
        <!--修改密码-->
        <div class="mm_geren_right fr">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>修改密码</h6>
            </div>
            <div class="mm_geren_mima">
            	<form action="/user/index" method="post" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
                <ul>
                    <li>
                        <label>原始密码：</label>
                        <input name="passwordold" id="passwordold" type="password">
                    </li>
                    <li>
                        <label>新&nbsp;&nbsp;密&nbsp;码：</label>
                        <input name="password" id="password" type="password">
                    </li>
                    <li>
                        <label>确认密码：</label>
                        <input name="password01" id="password01" type="password">
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input type="submit" name="Submit" value="保存" class="mm_geren_baocun">
                    </li>
                </ul>
                <input type="hidden" name="ajax" value="1">
                <input type="hidden" name="id" value="<?php echo $this->id;?>">
                <input type="hidden" name="option" value="updataPassword">
                <input type="hidden" name="yesfn" value="yesSuccess()">
                <input type="hidden" name="nofn" value="nofunction()">
                <input type="hidden" name="beforefn" value="beforefunction()">
                </form>
            </div>
        </div>
        <!--修改密码结束-->
    </div>
</div>
<!-- 友情链接 -->
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
	
	
});
function beforefunction(){
	jQuery("input[name='Submit']").val('保存中…');
}
function nofunction(){
	jQuery("input[name='Submit']").val('保存');
	artDialog("修改失败",'error','close();');
}

function yesSuccess(){
	artDialog("修改成功",'succeed','close();');
	window.location.reload();
}

</script>
<?php include $this->Render('footer.php'); ?>
