<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<?php include $this->Render('nav.php'); ?>
<style type="text/css">
.mm_dizhi input{ display: inline-block; background:none; border:none; width: 110px; height: 44px; color: #fff; line-height: 44px; text-align: center; font-size: 16px; margin-left: 25px;}
.mm_dizhi input:first-child{ background: #ff900c;}

.mm_gjwl_tijiao input{ float: right; border:none; background:none; width: 160px; height: 52px; line-height: 52px; text-align: center; background: #fd4747; font-size: 18px; color: #fff;}
</style>
<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="#">首页</a>&gt;
        <a href="#"><?php echo $this->dataList['con']['industry'];?></a>&gt;
        <a href="#"><?php echo $this->dataList['con']['name'];?></a>
    </div>
    <div class="mm_gjwl_dingdan_title" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_wancheng.png);">
        <ul>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_tijiao01.png">提交订单</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_zhifu01.png">支付金额</li>
            <li class="mm_gjwl_dingdan_color"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_wancheng02.png">支付成功</li>
        </ul>
    </div>
    <div class="mm_wancheng">
        <span><img src="<?php echo STYLE_URL;?>/style/quzhan/images/images/mm_dui.png">恭喜你！交易已成功</span>
        <a href="<?php echo MEMBER_URL;?>/convention/order/">去订单中心查看</a>
    </div>
</div>


<?php include $this->Render('links_convention.php'); ?>
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
	
	jQuery(".mm_dianji img").click(function(){
		jQuery(this).parents(".mm_zhanhui_list_xuanze").next().slideToggle();
	
	});
		
});

</script>
<?php include $this->Render('footer.php'); ?>

