<?php
$webtitle = $this->visa_row['visa_title'].'签证 - 去展网'
?>
<?php include $this->Render('header_no2.php'); ?>

<!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li><a href="##" title="">首页</a><span>&gt;</span><a href="##" title="">签证</a><span>&gt;</span><i><?php echo $this->visa_row['visa_title'];?></i></li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>

    <!--明细头部start-->
    <div class="detial-top">

        <ul class="clearfix detial-con">
            <!--左栏目start-->
            <li class="detial-left fl">
                <div class="detial-scroll" id="">
                    <ul class="">
                        <li><div><a href="##" target="_blank"><img src="<?php echo $this->visa_row['visa_cover'];?>" alt="" height="210" width="330" /></a></div></li>
                    </ul>
                </div>
            </li>
            <script>
                $('#demo04').flexslider({
                    animation: "slide",
                    direction:"horizontal",
                    easing:"swing"
                });
            </script>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="detial-right fr">
                <h1 style="color: #555"><?php echo $this->visa_row['visa_title'];?></h1>
                <p>洲域：<i><?php echo $this->visa_row['visa_state'];?></i><em></em>国家：<i><?php echo $this->visa_row['visa_countries'];?></i></p>
                <p>有效期：<i><?php echo $this->visa_row['visa_lasts'];?></i><em></em>提前预订天数：<i><?php echo $this->visa_row['visa_book'];?></i></p>
                <p>最长停留：<i><?php echo $this->visa_row['visa_stay'];?></i><em></em>办理时长：<i><?php echo $this->visa_row['visa_handle'];?></i> </p>
                <p>签证类型：<i><?php echo $this->visa_row['visa_type'];?></i></p>
                <p>可签地点：<i><?php echo $this->visa_row['visa_place'];?></i></p>
                <div class="clearfix">
                    <span><em><?php echo $this->visa_row['visa_price'];?>元</em>起</span>
                    <a href="##" title="" class="now01">立即订展</a>
                    <a href="##" title="" class="now02"><i>联系客服</i></a>
                </div>
            </li>
            <!--右栏目end-->
        </ul>

    </div>
    <!--明细头部end-->

    <div class="line10"></div>

    <!--明细内容start-->
    <div>
        <ul class="clearfix">

            <!--左栏目start-->
            <li class="detial-info-left fl">

                <div class="detial-tab" id="tab03">
                    <a href="#1" class="current">签证介绍</a>
                    <a href="#2">费用说明</a>
                    <a href="#3">签证说明</a>
                    <a href="#4">签证须知</a>
                    <a href="#5">相关阅读</a>
                </div>

                <!--签证介绍start-->
                <div class="detial-intro" id="1">
                    <ul>
                        <?php echo $this->visa_row['visa_introduce'];?>
                    </ul>
                </div>
                <!--签证介绍end-->

                <div class="line10"></div>
                <!--费用说明start-->
                <div class="detial-intro" id="2">
                    <h3>费用说明</h3>
                    <ul>
                        <?php echo $this->visa_row['price_introduce'];?>
                    </ul>
                </div>
                <!--费用说明end-->

                <div class="line10"></div>
                <!--签证说明start-->
                <div class="detial-intro" id="3">
                    <h3>签证说明</h3>
                    <ul>
                        <?php echo $this->visa_row['visa_explain'];?>
                    </ul>
                </div>
                <!--签证说明end-->

                <div class="line10"></div>
                <!--签证须知start-->
                <div class="detial-intro" id="4">
                    <h3>签证须知</h3>
                    <ul>
                        <?php echo $this->visa_row['visa_notice'];?>
                    </ul>
                </div>
                <!--签证须知end-->

            </li>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="detial-info-right-other fr">

                <!--常见问题start-->
<!--                <div class="question-all">-->
<!--                    <h4>常见问题</h4>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <div class="fl"><img src="images/79.jpg" alt="" /></div>-->
<!--                            <div class="fr">-->
<!--                                <h5><a href="##" target="_blank">签证之前需要准备什么？</a></h5>-->
<!--                                <p>给大家介绍一下，如何才.</p>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
                <!--常见问题end-->

                <div class="line10"></div>
                <!--相关行程start-->
<!--                <div class="related-stroke">-->
<!--                    <h3>相关行程</h3>-->
<!--                    <ul>-->
<!--                        --><?php
//                        foreach($this->route_row as $k_ro => $val_ro){?>
<!--                        <li>-->
<!--                            <a href="##" target="_blank">-->
<!--                                <img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/80.jpg" width="232" height="145" alt="" />-->
<!--                                <i>-->
<!--                                    --><?php //echo StringCode::GetCsubStr($val_ro['title'],0,15);?>
<!--                                </i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        --><?php //}?>
<!--                    </ul>-->
<!--                </div>-->
                <!--相关行程end-->


            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--明细内容end-->

    <div class="line20"></div>
    <div class="line20"></div>


</div>
<!--main end-->

<link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/6.css" rel="stylesheet" />
<script>
    $(".hot-product").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });
</script>

<script>
    $("body").css("background","#fff");
    $(".detial-right p span:last-child").css("padding-right","0");
    $(".detial-right div a:nth-child(2)").css("background-color","#fe9905");
    $(".detial-right div a:nth-child(3)").css("background-color","#0093ff");
    $(".detial-intro:first").css("border-top","none");
    $(".detial-intro:first ul").css("border-top","none");
    $(".read-list li:last-child").css("padding-right","0");
    $(".question-all ul li:last-child").css("border-bottom","0");
    $(".related-stroke ul li:first-child").css("margin-top","0");
</script>

<script>
    $(window).scroll(function(){
        if($(this).scrollTop()>833)
        {
            $("#tab03").addClass("on");
        }
        else{
            $("#tab03").removeClass("on");
        }
    });
</script>

<!--友情链接start-->
<div class="friendly-link">
    <ul class="wrap">
        <h2><i>友情链接</i></h2>
        <div>
            <ul class="clearfix">
                <li><a href="##" target="_blank">杭州写字楼网 </a></li>
                <li><a href="##" target="_blank">杭州本地宝</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州租房网</a></li>
                <li><a href="##" target="_blank">杭州分类信息</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州装修公司</a></li>
                <li><a href="##" target="_blank">杭州租房</a></li>
                <li><a href="##" target="_blank">杭州厂房网</a></li>
                <li><a href="##" target="_blank">杭州信息网</a></li>
                <li><a href="##" target="_blank">杭州装修网</a></li>
                <li><a href="##" target="_blank">杭州拓展公司</a></li>
                <li><a href="##" target="_blank">杭州邮编网</a></li>
                <li><a href="##" target="_blank">杭州写字楼网 </a></li>
                <li><a href="##" target="_blank">杭州本地宝</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州租房网</a></li>
                <li><a href="##" target="_blank">杭州分类信息</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州装修公司</a></li>
                <li><a href="##" target="_blank">杭州租房</a></li>
                <li><a href="##" target="_blank">杭州厂房网</a></li>
                <li><a href="##" target="_blank">杭州信息网</a></li>
                <li><a href="##" target="_blank">杭州装修网</a></li>
                <li><a href="##" target="_blank">杭州拓展公司</a></li>
                <li><a href="##" target="_blank">杭州邮编网</a></li>
            </ul>
        </div>
    </ul>
</div>
<!--友情链接end-->


<!--底部start-->
<div class="footer">
    <ul class="wrap">
        <p>
            <a href="##" target="_blank">关于我们</a><span>|</span>
            <a href="##" target="_blank">联系我们</a><span>|</span>
            <a href="##" target="_blank">友情链接</a><span>|</span>
            <a href="##" target="_blank">帮助中心</a><span>|</span>
            <a href="##" target="_blank">意见反馈</a><span>|</span>
            <a href="##" target="_blank">高薪聘请</a><span>|</span>
            <a href="##" target="_blank">法律声明</a><span>|</span>
        </p>
        <p>© 2015 quzhan.com 去展互联网展会领导者 保留所有权利</p>
        <p>去展互联网展会领导者 浙ICP备08125558号</p>
        <p><img src="images/27.jpg" alt="" /></p>
        <div>
            <img src="images/code.jpg" alt="" />
            <p>下载去展APP</p>
        </div>
    </ul>
</div>
<!--底部start-->
</body>
</html>