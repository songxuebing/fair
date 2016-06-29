<?php include $this->Render('header_no2.php'); ?>

    <!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li><a href="/" title="">首页</a><span>&gt;</span>
                    <a href="/route" title="">行程</a><span>&gt;</span>
                    <i><?php echo $this->route_row['title'];?></i></li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>

    <!--明细头部start-->
    <div class="detial-top01">

        <ul class="clearfix detial-con">
            <!--左栏目start-->
            <li class="detial-left detial-left01 fl">
                <div class="detial-scroll" id="demo04">
                    <ul class="slides">
                        <li><div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/19.jpg" alt="" /></a></div></li>
                        <li><div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/19.jpg" alt="" /></a></div></li>
                        <li><div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/19.jpg" alt="" /></a></div></li>
                        <li><div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/19.jpg" alt="" /></a></div></li>
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
            <li class="detial-right01 fr">
                <div class="detial-title">
                    <h1 class="fl"><?php echo $this->route_row['title']?></h1>
                    <div class="fr" style="width: 127px;">
                        <span>+分享</span>
                        <div class="bdsharebuttonbox" style="display:inline-block; float:right; padding-left: 5px; width:80px;">
                            <a href="#" class="bds_more" data-cmd="more"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["tsina","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                        </div>
                    </div>
                </div>

                <span class="detial-intros">
                    <?php echo $this->route_row['title_describe'];?>
                </span>


                <p>目的城市：<i><?php echo $this->route_row['city'];?></i></p>
                <p>出发城市：<i><?php echo $this->route_row['departure'];?></i></p>

                <div class="meal">
                    <ul>
                        <li><label>行程套餐：</label></li>
                        <?php foreach($this->route_package as $k => $v_p){?>
                        <li>
                            <a href="javascript:void(0)" class="current"><?php echo $v_p['package']?></a>
                            <div>
                                <ul>
                                    <?php echo $v_p['introduce']?>
                                </ul>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>

                <div class="clearfix">
                    <span><em><?php echo $this->route_row['price'];?>元</em>起</span>
                    <a href="##" title="" class="now01">立即订展</a>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=3238396027&site=qq&menu=yes" target="_blank">
                        <i>联系客服</i></a>
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
                    <a href="#1" class="current">方案介绍</a>
                    <a href="#2">费用说明</a>
                    <a href="#3">签证说明</a>
                    <a href="#4">预订须知</a>
                    <a href="#5">相关阅读</a>
                </div>

                <!--展会介绍start-->
                <div class="detial-intro" id="1">
                    <ul>
                        <?php foreach($this->route_package as $k => $v_p){?>

                            <strong><?php echo $v_p['package']?>：</strong>
                            <?php echo $v_p['introduce'].'<br />';?>

                        <?php }?>
                    </ul>
                </div>
                <!--展会介绍end-->

                <div class="line10"></div>
                <!--费用说明start-->
                <div class="detial-intro" id="2">
                    <h3>费用说明</h3>
                    <ul>
                        <?php echo $this->route_row['price_explain'];?>
                    </ul>
                </div>
                <!--费用说明end-->

                <div class="line10"></div>
                <!--签证说明start-->
                <div class="detial-intro" id="3">
                    <h3>签证说明</h3>
                    <ul>
                        <?php echo $this->route_row['visa_explain'];?>
                    </ul>
                </div>
                <!--签证说明end-->

                <div class="line10"></div>
                <!--预订须知start-->
                <div class="detial-intro" id="4">
                    <h3>预订须知</h3>
                    <ul>
                        <?php echo $this->route_row['reserve_notice'];?>
                    </ul>
                </div>
                <!--预订须知end-->

                <div class="line10"></div>
                <!--相关阅读start-->
                <div class="read-link" id="5">
                    <ul class="read-title">
                        <h3>相关阅读</h3>
                    </ul>

                    <ul class="clearfix read-list">
                       <?php foreach ($this->new_all as $key => $va_new) {?>
                        <li>
                            <a href="/news/<?php echo date('Y/m/d', $va_new['dateline']).'/'.$va_new['id'].'.shtml';?>" target="_blank">
                                <img src="<?php echo empty($va_new['cover']) ? STYLE_URL.'/style/quzhan/images/20160202/test_01.png' :$va_new['cover'].'!a200';?>" alt="<?php echo $v_new['title']?>" title="<?php echo $v_new['title']?>" />
                                <h4><?php echo StringCode::GetCsubStr($va_new['title'],0,20);?></h4>
                            </a>
                        </li>
                        <?php }?>
                    </ul>

                </div>
                <!--相关阅读end-->

            </li>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="detial-info-right-other fr">

<!--                <div class="question-all">-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <div class="fl"><img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/9.jpg" alt="" /></div>-->
<!--                            <div class="fr">-->
<!--                                <h5><a href="##" target="_blank">新加坡行程攻略</a></h5>-->
<!--                                <p>玩转参展攻略<a href="##" title="">查看</a></p>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <ul class="question-img">-->
<!--                        <a href="#" target="_blank"><img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/8.jpg" alt="" /></a>-->
<!--                    </ul>-->
<!--                </div>-->

<!--                <div class="line10"></div>-->
                <!--相关签证start-->
                <div class="question-all">
                    <h4>相关签证</h4>
                    <ul>
                        <?php foreach($this->visa_row['All'] as $k => $va_visa){?>
                        <li>
                            <div class="fl"><img src="<?php echo $va_visa['visa_cover']?>" alt="<?php echo $va_visa['visa_title']?>" width="40px" height="40px" title="<?php echo $va_visa['visa_title']?>"/></div>
                            <div class="fr">
                                <h5><a href="/convention/<?php echo date('Y/m/d', $va_visa['update_time']).'/'.$va_visa['visa_id'].'.shtml';?>" target="_blank">
                                        <?php echo $va_visa['visa_title']?>签证
                                    </a>
                                </h5>
                                <p>签证费用：<em>￥<?php echo $va_visa['visa_price']?>元/人 </em></p>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <!--相关签证end-->

            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--明细内容end-->

    <div class="line20"></div>
    <div class="line20"></div>


</div>
<!--main end-->

<link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/11.css" rel="stylesheet" />
<script>
    $(".hot-product").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });
</script>

<script>
    $("body").css("background","#fff");
    $(".detial-right01 p span:last-child").css("padding-right","0");
    $(".detial-right01 div a:nth-child(2)").css("background-color","#fe9905");
    $(".detial-right01 div a:nth-child(3)").css("background-color","#0093ff");
    $(".detial-intro:first").css("border-top","none");
    $(".detial-intro:first ul").css("border-top","none");
    $(".read-list li:last-child").css("padding-right","0");
    $(".question-all ul li:last-child").css("border-bottom","0");
    $(".related-stroke ul li:first-child").css("margin-top","0");
</script>

<script>
    $(window).scroll(function(){
        if($(this).scrollTop()>715)
        {
            $("#tab03").addClass("on");
        }
        else{
            $("#tab03").removeClass("on");
        }
    });
</script>

<script>
    $(".meal li").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });
</script>
<!--友情链接start-->
<div class="friendly-link">
    <ul class="wrap">
        <h2><i>友情链接</i></h2>
        <div>
            <ul class="clearfix">
                <?php
                if(!empty($this->link)) foreach($this->link as $k=>$v){
                    if($v['type'] == "2")
                        echo '<li><a href="'.$v['url'].'" target="_blank">'.$v['title'].'</a></li>';
                }
                ?>
            </ul>
        </div>
    </ul>
</div>

<!--友情链接end-->


<!--底部start-->
<?php include $this->Render('footer2.php'); ?>
