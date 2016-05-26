<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<title>去展网·跨境展览服务平台。为全球展览业提供展会、行程、签证、物流、特装一站式的订展服务。</title>
<meta name="keywords" content="北京展会、上海展会、、德国展会、美国展会、广州展会、香港展会、深圳展会、服装展、等全球地域国际展会、" />
<meta name="description" content="是全球最大的展览业社交平台、信息全面、覆盖面广。可提供全球跨境展览一站式订购服务，其中包括预订展会、行程、签证、物流、特装。" />
<link type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/css/reset.css" rel="stylesheet" />
<link type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/css/bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/common/common.js"></script>
</head>

<body>
<!-- top -->
<div class="mm_top clearfix">
    <div class="mm_mid">
        <div class="mm_top_left fl">
            <a href="/index/index" style="color:#6c6c6c;"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/20160202/ico_home.png" style="vertical-align:sub; display:none;">&nbsp;去展首页</a>
        </div>
        <div class="mm_top_right fr">
            <div class="mm_zhu fl">
            	<?php
                	if(empty($this->UserConfig['Id'])){
				?>
                <a href="/login/index/">登录</a>
                <a href="/register/index">注册</a>
                <?php
					}else{
				?>
                <a href="<?php echo MEMBER_URL;?>/index/index/"><?php echo $this->UserConfig['Name'];?></a><a href="<?php echo WEB_URL;?>/login/Logout/option/refer">退出</a>
                <?php
					}
				?>
            </div>
            
            <div class="mm_yao fl">
                <a href="<?php echo MERCHANT_URL;?>/index/index/" target="_blank">服务商入驻</a>
            </div>
            <div class="mm_help fl">
                <span>咨询热线：40006-2345-1&nbsp;&nbsp;|</span>
                <span style="position:relative; top:5px;">
                	<!-- WPA Button Begin -->
					<script charset="utf-8" type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php?key=XzkzODAyNjYyN18zNzA5NDhfNDAwMDYyMzQ1MV8"></script>
                    <!-- WPA Button End -->
                </span>
                <a href="<?php echo WEB_URL;?>/about/index/id/4">帮助中心</a>
            </div>
        </div>
    </div>
</div>
<!-- 搜索 -->
<div class="mm_mid clearfix">
    <div class="mm_logo fl"><a href="<?php echo WEB_URL;?>"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_logo.png"></a></div>
    <div class="fl">
        <div class="search">
            <div class="nav" id="nav">
                <p class="set">全部展会</p>
                <ul class="new">
                    <li data-id="convention">全部展会</li>
                    <li data-id="route">全部行程</li>
                    <li data-id="visa">全部签证</li>
                    <li data-id="logistics">全部物流</li>
                    <li data-id="decoration">全部特装</li>
                </ul>
            </div> 
            <form class="J-search-box" action="<?php echo WEB_URL;?>/convention/index/" method="post">
                <input class="inp_srh" name="key"  placeholder="请输入您要搜索的关键词" >
                <input class="btn_srh" type="submit" name="submit" value="搜索">
                <input type="hidden" name="type" value="convention" />
            </form> 
        </div>
        <div class="mm_hot1">
            <?php
            	if(!empty($this->keyword)){
			?>
                <span>热门：</span>
                <?php
                    foreach($this->keyword as $key => $val){
                ?>
                	<a href="javascript:;" class="J-hot-key"><?php echo $val['keyword'];?></a>&nbsp;&nbsp;&nbsp;
            <?php
					}
				}
			?>
        </div>
    </div>
    <div class="mm_ad fr"><script src="/public/adv/option/image/id/2"></script></div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(e) {
	jQuery(".J-hot-key").on('click',function(){
		var $this = jQuery(this);
		jQuery("input[name='key']").val($this.html());
		jQuery(".btn_srh").click();
	});
	
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
		//获取搜索类型
		var searchType = jQuery(this).data('id');
		jQuery('input[name="type"]').val(searchType);
		
		//构建搜索地址
		jQuery(".J-search-box").attr({"action":"/"+searchType+"/index/"});
		
		
    });
});
</script>