<link href="http://www.zhankoo.com/StaticResource/Home/style/newpublic2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    jQuery(function () {
        try
        {
            jQuery(".asideFixed li").hover(function () {
                jQuery(this).children("a").hide()
                jQuery(this).children('.nosee').stop().fadeTo(300,1);
            }, function () {
                jQuery(this).children("a").show()
                jQuery(this).children('.nosee').stop().fadeOut(300)
            });

            //$(".nav_left ul li").hover(function (e) {
            //    // make sure we cannot click the slider
            //    if ($(this).hasClass('slider')) {
            //        return;
            //    }
            //    var whatTab = $(this).index();
            //    //var howFar = 104 * whatTab;
            //    $(".slider").css({
            //        left: $(this).position().left + "px",width:$(this).width()
            //    });
            //}, function () {
            //    //var howFar = 104 * whatIndex;
            //    $(".slider").css({
            //        left: $(".nav_left ul li.active").position().left + "px", width: $(".nav_left ul li.active").width()
            //    });
            //});

        }
        catch(e){
        }
        //返回顶部隐藏
        jQuery(window).scroll(function (event) {
            var winSt = $(window).scrollTop()
            var winH = $(window).height()
            if (winSt > winH / 3) {
                jQuery(".asideFixed #totop").fadeIn()
            } else {
                jQuery(".asideFixed #totop").fadeOut()
            }
        });
        //点击返回顶部
        jQuery('#totop').click(function (event) {
            jQuery('html,body').stop().animate({ scrollTop: 0 }, 300)
        });

        //首页右侧悬浮框搜索点击--置顶磁吸搜索选择框
        jQuery(".searchFrame .search .search_lt li").hover(function() {
            jQuery(this).children(".oh").show()
        }, function() {
            jQuery(this).children(".oh").hide()
        });

        jQuery('.asideFixed li.search_ico a').click(function (event) {
            jQuery('.searchFrame').stop().animate({top: 0 }, 500)
        });
    });
</script>
<!--右侧-->
<div class="asideFixed">
    <div class="w1200">
        <ul class="fixedul">

            <li>
                <a class="onlineCustomer" href="##"><i class="iconfont"></i></a>
                <div class="nosee">
                    <h3><a title="在线客服" href="tencent://message/?Menu=yes&amp;amp;uin=938047934&amp;amp;Service=58&amp;amp;SigT=A7F6FEA02730C9884019403FA1A2C43B804D916683BB1AB76BDB4EEB81EAA21BA1742DA7E7BA4DA705F71EB1A024B99C158DD4093EB5E1714E7CB96C36E952C0C34F5827D514F199A2B2D316A119DFDE854869BEAC6A77BECFC6FF491324DCB728B8EC4BC281CB3F776356FAA2048CEC1C29D2FAAB5F8F36&amp;amp;SigU=30E5D5233A443AB2CE34DF2822EF56FDD52FAB77588EFB3C1AC10F9188F79F88249936A1BC384B3D289D548569A9C8343793CBC14DFC1EC88825C330800FB34459E8F63174C7E49D">在线<br>客服</a></h3>
                </div>
            </li>
            <li>
                <a class="hotline" href="##"></a>
                <div class="nosee">
                    <h3><a title="热线电话" href="##">热线<br>电话</a></h3>
                    <div class="commenMask">
                        <i class="jiao"></i>
                        <p>客服热线：<em>400-879-8289</em></p>
                        <p>投诉专线：<em>400-879-8289</em></p>
                    </div>
                </div>
            </li>
            <li>
                <a class="infoFeedback" href="##"></a>
                <div style="display:none;" class="nosee">
                    <h3><a title="意见反馈" onclick="submitSuggestion()" href="##">意见<br>反馈</a></h3>
                </div>
            </li>
            <li>
                <a class="applycheckin" href="##" style="display: inline-block;">申请入驻</a>
                <div class="nosee" style="opacity: 0.542122; display: none;">
                    <h3><a title="申请入驻" href="##">申请<br>入驻</a></h3>
                    <div class="commenMask1">
                        <i class="jiao"></i>
                        <a title="我是主办方" target="_blank" href="http://www.zhankoo.com/business/zhzs.html">我是主办方 </a> |
                        <a title="我是展装" target="_blank" href="/business/invitebusiness.html">我是展装  </a>|
                        <a title="我是展馆" target="_blank" href="/o/linkus.html">我是展馆</a>

                    </div>
                </div>
            </li>
            <li>
                <a class="officialWechat" href="##" style="display: inline-block;"></a>
                <div style="opacity: 0; display: none;" class="nosee">
                    <h3><a title="官方微信" href="##">官方<br>微信</a></h3>
                    <div class="wechatMask">
                        <i class="jiao"></i>
                        <div class="erweima_pic">
                            <img alt="" src="/StaticResource/Home/images/IcoImg/wechat.png">
                        </div>
                        <span>扫一扫关注官方微信</span>
                    </div>
                </div>
            </li>
        </ul>
        <a style="" id="totop" class="totop" href="javascript:;"></a>
    </div>
</div>
<!--底部-->

<div class="mm_footer">
    <span>
        <a href="/about/index/id/1">关于我们</a>
        <a href="/about/index/id/2">联系我们</a>
        <a href="/about/index/id/3">友情链接</a>
        <a href="/about/index/id/4">帮助中心</a>
        <a href="/about/index/id/5">意见反馈</a>
        <a href="/about/index/id/6">高薪聘请</a>
        <a href="/about/index/id/7">法律声明</a>
    </span>
        <p>&copy; <?php echo date('Y');?> 
去展网-国际展会信息平台，提供国际展会展览一站式服务。提供最全面的2016展会报道和国外展会资讯，为您参展选展提供一站式便捷服务
</p>
	<p>去展互联网展会领导者 浙ICP备15027784号</p>
    <div><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_footer_img.jpg"></div>
</div>

<!--<link href="<?php echo STYLE_URL;?>/style/quzhan/css/kefu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/service.js"></script>-->

<script type="text/javascript">
	jQuery(document).ready(function(){
		CommonJs.AjaxLive();
	});
	function artDialog(msg,ico,fun){
		var dialog = art.dialog({
			title: '提示',
			content: msg,
			fixed:true,
			lock:true,
			opacity:0.3,
			icon: ico,
			cancel:false,
			ok:function(){
				eval(fun);
			}
		});
	}	
</script>
<!--
<script>var _hmt = _hmt || [];(function() {  var hm = document.createElement("script");  hm.src = "//hm.baidu.com/hm.js?388a4cedffa7c7c6cf67bd1a0d642471";  var s = document.getElementsByTagName("script")[0];   s.parentNode.insertBefore(hm, s);})();</script>
-->
</body>
</html>
