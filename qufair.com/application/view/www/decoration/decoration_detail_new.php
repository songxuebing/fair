<?php include $this->Render('header_no2.php'); ?>
    <!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li><a href="/" title="">首页</a><span>&gt;</span>
                    <a href="/decoration" title="">特装</a><span>&gt;</span>
                    <i><?php echo $this->decoration_row['title'];?></i></li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>

    <!--明细头部start-->
    <div class="demand-detial">
        <ul>
            <!--左栏目start-->
            <li class="demand-detial-left fl">
                <a href="javascript:void(0)" class="demand-left"><img src="<?php echo STYLE_URL;?>/style/no2/images/7.png" alt="" /></a>
                <a href="javascript:void(0)" class="demand-right"><img src="<?php echo STYLE_URL;?>/style/no2/images/8.png" alt="" /></a>
                <div class="demand-img">
                    <ul>

                            <?php
                            $images = unserialize($this->decoration_row['images']);
                            if(!empty($images)) foreach($images as $k => $v){

                                if(!empty($v)){
                                    ?>
                                    <li>
                                        <img src="<?php echo Common::AttachUrl($v,"cdn");?>" alt="<?php echo $this->decoration_row['title'];?>" style="max-width: 850px;max-height: 463px;"/>
                                    </li>
                                <?php
                                }

                            }
                            ?>
                    </ul>
                </div>
            </li>
            <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/scroll01.js"></script>
            <script>
                var MyMar = null;
                var SleepTime = 2000;
                $(function () {
                    $(".demand-img").jCarouselLite01({
                        btnNext: ".demand-right",
                        btnPrev: ".demand-left",
                        visible:1,
                        speed: 1000,
                        scroll: 1
                    });
                    $(".demand-img").bind('mouseover', function (event) {
                        clearInterval(MyMar);
                    })
                        .bind('mouseout', function (event) {
                            MyMar = setInterval(next02, SleepTime);

                        });
                });
                function next02() {
                    $(".demand-right").click();
                }
                MyMar = setInterval(next02, SleepTime);
            </script>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="demand-detial-right fr">
                <div class="demand-detial01">
                    <h1>卫浴展特装设计搭建</h1>
                    <p>面积大小：<em>3*3</em></p>
                    <p>适合开口：三开、四开、单开</p>
                    <p><i><em>29850.88元</em>起</i></p>
                    <ul>
                        <a href="##" title="">购买方案</a>
                    </ul>
                </div>

                <div class="demand-detial02">
                    <p>推荐理由：<br/>设计师给我们带来最美丽的设计灵感，让我们在参展的时候，独具一格，在同行类领域更能出类拔萃，吸引各商界眼球，完成企业年度指标。</p>
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
                    <a href="#1" class="current">搭建介绍</a>
                </div>

                <!--展会介绍start-->
                <div class="detial-intro" id="1">
                    <ul>
                        <p>拉丁美洲电子消费品展（Latin American Consumer Electronics Expo）由Latin Auto Parts ExpoLLC主办，巴拿马是一个航空和海上交通枢纽的地区和无结的贸易区，是在西半球最大的自由贸易区。巴拿马为国际消费电子行业提供了一个独特的地理位置，你可以在这个展会上直接接触那些来自拉丁美洲和加勒比地区电子产品制造商，分销商和零售商，在这些地区你可以不断扩大你的市场。拉丁美洲消费电子博览会是一个B2B的展会，不向公众开放。拉丁美洲电子消费品展（Latin American Consumer Electronics Expo）由Latin Auto Parts ExpoLLC主办，巴拿马是一个航空和海上交通枢纽的地区和无结的贸易区，是在西半球最大的自由贸易区。</p>
                    </ul>
                </div>
                <!--展会介绍end-->

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

                <!--其它搭建方案start-->
                <div class="related-stroke related-stroke01">
                    <h3>其它搭建方案</h3>
                    <ul>
                        <?php foreach ($this->data['All'] as $key => $val) {?>
                        <li>
                            <a href="/decoration/<?php echo date('Y/m/d', $val['de_time']).'/'.$val['id'];?>.shtml" target="_blank">
                                <img src="<?php echo Common::AttachUrl($val['cover']);?>" style="max-width: 232px;" alt="<?php echo $val['title']?>" />
                                <i><?php echo StringCode::GetCsubStr($val['title'],0,12);?></i>
                            </a>
                        </li>
                        <?php }?>

                    </ul>
                </div>
                <!--其它搭建方案end-->

            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--明细内容end-->

    <div class="line20"></div>
    <div class="line20"></div>


</div>
<!--main end-->

<link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/14.css" rel="stylesheet" />
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
    $(".list-picture ul li:last-child").css("border-bottom","0");
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
                <?php
if(!empty($this->link)) foreach($this->link as $k=>$v){
    if($v['type'] == "4")
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