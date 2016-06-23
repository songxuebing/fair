<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/style.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/fltb.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/main.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/slider.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/jcarousellite_1.0.1.js"></script>
    <?php
    if(empty($webtitle)){
        ?>
        <title>2016年国际展会_国外展览会平台-去展网</title>
    <?php
    }else{
        ?>
        <title><?php echo $webtitle?></title>
    <?php
    }
    ?>
    <?php
    if(empty($webkeywords)){
        ?>
        <meta name="keywords" content="国际展览会|国外展览会|外贸展览会|国内展览会|行业展览会" />
    <?php
    }else{
        ?>
        <meta name="keywords" content="<?php echo $webkeywords?>"/>
    <?php
    }
    ?>
    <?php
    if(empty($webdescription)){
        ?>
        <meta name="description" content="去展网_提供国际国外展会|行程|签证|物流|展览装修设计|展览订展一站式服务,提供2016最新最全的国际汽配展，电子展，五金展，服装展，礼品展等行业展览会资讯" />
    <?php
    }else{
        ?>
        <meta name="description" content="<?php echo $webdescription?>"/>
    <?php
    }
    ?>
</head>

<body>

<!--头部start-->
<div class="header">
    <ul class="wrap">
        <li class="fl">
            <a href="##" title="">去展首页</a>
        </li>
        <li class="fr">
            <i>嗨，欢迎您！</i>
            <?php
            if(empty($this->UserConfig['Id'])){
                ?>
                <a href="/login/index/" target="_blank" class="font01">请登录!</a>&nbsp;
                <a href="/register/index" target="_blank">免费注册</a>
            <?php
            }else{
                ?>
                <a href="<?php echo MEMBER_URL;?>/user/index/" class="font01">
                    <?php echo $this->UserConfig['Name'];?></a>&nbsp;
                <a href="/login/Logout/option/refer">退出</a>
            <?php
            }
            ?>
            <span>|</span>

            <i>咨询热线：40006-2345-1</i>
            <span>|</span>
            <a href="/about/index/id/4" target="_blank">帮助中心</a>
        </li>
    </ul>
</div>
<!--头部end-->


<!--搜索satrt-->
<div class="header-search">
    <ul class="wrap">
        <li class="logo fl"><a href="##" title=""><img src="<?php echo STYLE_URL;?>/style/no2/images/LOGO.jpg" alt="" /></a></li>

        <li class="search-type fr">
            <div class="con01">
                <a href="/convention" target="_blank" class="current">全球展会</a>
            </div>

            <div class="con02">
                <form class="J-search-box" action="/convention/index/" method="post">
                    <input type="text" value=""  class="fl" name="key" placeholder="输入关键词内容" id="type" onClick="searchs(true)"/>
                    <input type="submit" value="搜  索" class="fr" />
                    <input type="hidden" name="type" value="convention" />
                <div id="type-list">
                    <p pl="美国食品科技展IFT">美国食品科技展IFT</p>
                    <p pl="美国夏季特色食品展">美国夏季特色食品展</p>
                    <p pl="美国安全及劳保用品博览会">美国安全及劳保用品博览会</p>
                </div>
                </form>
            </div>

            <div class="con03">
                <p>
                    <span>热门搜索：</span>
                    <?php
                    if(!empty($this->keyword)){
                        ?>
                        <?php
                        foreach($this->keyword as $key => $val){
                            ?>
                            <a href="javascript:;" class="J-hot-key"><?php echo $val['keyword'];?></a>
                        <?php
                        }
                    }
                    ?>
                </p>
            </div>

        </li>

    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function(e) {

        $(".J-hot-key").on('click',function(){
            var $this = $(this);
            $("input[name='key']").val($this.html());
            $(".fr").click();
        });

        $(".nav p").click(function(){
            var ul=$(".new");
            if(ul.css("display")=="none"){
                ul.slideDown();
            }else{
                ul.slideUp();
            }
        });

        $(".set").click(function(){
            var _name = $(this).attr("name");
            if( $("[name="+_name+"]").length > 1 ){
                $("[name="+_name+"]").removeClass("select");
                $(this).addClass("select");
            } else {
                if( $(this).hasClass("select") ){
                    $(this).removeClass("select");
                } else {
                    $(this).addClass("select");
                }
            }
        });

        $(".nav li").click(function(){
            var li=$(this).text();
            $(".nav p").html(li);
            $(".new").hide();
            /*$(".set").css({background:'none'});*/
            $("p").removeClass("select") ;
            //获取搜索类型
            var searchType = $(this).data('id');
            $('input[name="type"]').val(searchType);

            //构建搜索地址
            $(".J-search-box").attr({"action":"/"+searchType+"/index/"});


        });

        $(".mm_dianji img").click(function(){
            if($(this).hasClass('on')){
                $(this).closest('.J-mm_zhanhui_list_fenlei1').find('.J-mm_zhanhui_list_xuanze:not(:eq(0))').addClass('mm_show');
                $(this).removeClass('on');
            }else{
                $(this).closest('.J-mm_zhanhui_list_fenlei1').find('.J-mm_zhanhui_list_xuanze').removeClass('mm_show');
                $(this).addClass('on');
            }
        });
    });

</script>
<!--搜索end-->

<script>
    function searchs(f) {
        document.getElementById('type-list').style.visibility= f ? 'visible' : 'hidden';
        document.getElementById('type').onclick = function () {searchs(!f)};
    }
    function c_cleanLiA1(idx) {
        var lis = document.getElementById('type-list').getElementsByTagName('p');
        for (var i = 0;i < lis.length;i++) {
            lis[i].style.background = i == idx ? '#ececec' : '#fff'
        }
    }
    window.onload = function() {
        var lis =  document.getElementById('type-list').getElementsByTagName('p');
        for (var i = 0;i < lis.length;i++) {
            lis[i].liIdx = i;
            lis[i].onclick = function () {
                document.getElementById('type').value = this.getAttribute('pl');
                document.getElementById('type-list').style.visibility='hidden';
                document.getElementById('type').onclick = function () {searchs(true)};
            };
            lis[i].onmouseover = function () {
                c_cleanLiA1(this.liIdx);
            }
        }
    }
</script>


<!--main start-->
<div class="wrap">

    <!--导航start-->
    <div class="nav">
     <span class="hot-product">热门行业
       <div class="hot-list">
           <ul id="nav">

               <!--纺织服饰鞋革start-->
               <?php

               if(!empty($this->nav))
                   $new_nav = array_chunk($this->nav, 16, true);
               //var_dump($new_nav);exit();
               foreach($new_nav['0'] as $k=>$v){
                   ?>
                   <div class="nav-item">
                       <a href="/convention" title="" class="nav-link <?php echo $v['name_en'];?>"><?php echo $v['name'];?><i class="ico"></i></a>
                       <div class="nav-dropdown" style="display:none;">
                           <div class="jjjz">
                               <ul class="clearfix">
                                   <!--左start-->
                                   <li class="type-list fl">
                                       <?php
                                       if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
                                           ?>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="/<?php echo $val['name_en']?>" target="_blank"><?php echo $val['name'];?></a></b>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <?php
                                                   if(!empty($val['next2'])) foreach($val['next2'] as $key=>$val_next2){
                                                       ?>
                                                       <li><a href="<?php echo $val['name_en']?>" target="_blank"><?php echo $val_next2['name']?></a></li>
                                                   <?php }?>
                                               </ul>
                                           </div>
                                       <?php }?>

                                   </li>
                                   <!--左end-->
                                   <!--右start-->
                                   <li class="type-list fl">

                                       <div class="img-list">
                                           <ul>
                                               <?php
                                               $adv_i = 0;
                                               if(!empty($this->industry_adv)) foreach($this->industry_adv as $k => $val_in_adv){?>
                                                   <?php if(($v['id'] == $val_in_adv['industry_id']) && $adv_i < 4){?>
                                                       <li>
                                                           <a href="<?php echo $val_in_adv['url'];?>" target="_blank">
                                                               <img src="<?php echo $val_in_adv['file'];?>" alt="<?php echo $val_in_adv['title'];?>" width="330" height="140" />
                                                           </a>
                                                       </li>
                                                       <?php
                                                       $adv_i++;}}
                                               ?>
                                           </ul>
                                       </div>
                                   </li>
                                   <!--右end-->
                               </ul>
                           </div>
                       </div>
                   </div>
                   <!--纺织服饰鞋革end-->
               <?php
               }

               ?>

               <!--更多start-->
               <div class="more">
                   <p class="more-up"><a href="javascript:void(0)">More +</a></p>
                   <p class="more-down disable"><a href="javascript:void(0)">More -</a></p>
               </div>
               <!--更多end-->

               <!--弹窗start-->
               <div id="box" class="disable">
                   <ul>
                       <!--电子电力通讯start-->
                       <?php
                       foreach($new_nav['1'] as $k=>$v){
                           ?>
                           <div class="nav-item">
                               <a href="/convention" title="" class="nav-link <?php echo $v['name_en'];?>"><?php echo $v['name'];?><i class="ico"></i></a>
                               <div class="nav-dropdown" style="display:none;">
                                   <div class="jjjz">
                                       <ul class="clearfix">
                                           <!--左start-->
                                           <li class="type-list fl">
                                               <?php
                                               if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
                                                   ?>
                                                   <div class="type">
                                                       <ul class="title">
                                                           <b><a href="/<?php echo $val['name_en'];?>" target="_blank"><?php echo $val['name'];?></a></b>
                                                       </ul>
                                                       <ul class="list clearfix">
                                                           <?php
                                                           if(!empty($val['next2'])) foreach($val['next2'] as $key=>$val_next2){
                                                               ?>
                                                               <li><a href="<?php echo $val['name_en'];?>" target="_blank"><?php echo $val_next2['name']?></a></li>
                                                           <?php }?>
                                                       </ul>
                                                   </div>
                                               <?php }?>

                                           </li>
                                           <!--左end-->
                                           <!--右start-->
                                           <li class="type-list fl">
                                               <div class="img-list">
                                                   <ul>
                                                       <?php
                                                       $adv_i = 0;
                                                       if(!empty($this->industry_adv)) foreach($this->industry_adv as $k => $val_in_adv){?>
                                                           <?php if(($v['id'] == $val_in_adv['industry_id']) && $adv_i < 4){?>
                                                               <li>
                                                                   <a href="<?php echo $val_in_adv['url'];?>" target="_blank">
                                                                       <img src="<?php echo $val_in_adv['file'];?>" alt="<?php echo $val_in_adv['title'];?>" width="330" height="140" />
                                                                   </a>
                                                               </li>
                                                               <?php
                                                               $adv_i++;}}
                                                       ?>
                                                   </ul>
                                               </div>
                                           </li>
                                           <!--右end-->
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       <?php }?>
                       <!--电子电力通讯end-->

                   </ul>
               </div>
               <!--弹窗end-->
           </ul>
       </div>
     </span>

        <ul class="fr">
            <li><a href="/" target="_self" class="current">首页</a></li>
            <li><a href="/convention" target="_blank">展会</a></li>
            <li><a href="/route" target="_blank">行程</a></li>
            <li><a href="/visa" target="_blank">签证</a></li>
            <!--            <li><a href="/logistics" target="_blank">物流</a></li>-->
            <li><a href="/decoration" target="_blank">特装</a></li>
            <li><a href="/news" target="_blank">社区资讯</a></li>
        </ul>
    </div>
    <!--导航end-->