<?php //var_dump(($this->hot_con['All']))?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">

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
    <link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/style.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/fltb.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/main.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/slider.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/jcarousellite_1.0.1.js"></script>
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
        <li class="logo fl">
            <a href="/" title="">
                <img src="<?php echo STYLE_URL;?>/style/no2/images/LOGO.jpg" alt="" />
            </a>
        </li>

        <li class="search-type fr">
            <div class="con01">
                <a href="/convention" target="_blank" class="current">全球展会</a>
                <a href="/route" target="_blank">行程</a>
                <a href="/visa" target="_blank">签证</a>
                <a href="/decoration" target="_blank">特装</a>
                <a href="/news" target="_blank">新闻资讯</a>
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
            },
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
        <span>热门行业</span>
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

    <div class="line10"></div>
    <!--幻灯片start-->
    <div class="content">
        <ul>

            <!--左栏目start-->
            <li class="left fl">
                <div>
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
            </li>
            <!--左栏目end-->

            <!--中栏目start-->
            <li class="center fl">

                <!--幻灯片start-->
                <div id="demo01" class="flexslider">
                    <ul class="slides">
                        <?php echo $this->script;?>
                        </ul>
                </div>
                <!--幻灯片end-->

                <div class="line9"></div>

                <!---图片滚动start-->
                <div class="scroll">
                    <img src="<?php echo STYLE_URL;?>/style/no2/images/7.png" alt="" class="prev" />
                    <img src="<?php echo STYLE_URL;?>/style/no2/images/8.png" alt="" class="next" />
                    <div class="sroll-img">
                        <ul>
                            <?php if(!empty($this->hot_conven['All'])) foreach($this->hot_conven['All'] as $key=>$val_hot){?>
                                <li>
                                    <div class="img"><img src="<?php echo Common::AttachUrl($val_hot['cover']);?>" alt="" height="235" width="235" /></div>
                                    <h4><a href="convention/<?php echo date('Y/m/d', $val_hot['update_dateline']).'/'.$val_hot['id'];?>.shtml" target="_blank"><?php echo $val_hot['name']?></a></h4>
                                    <p>时间:<?php echo $val_hot['start_time']?> - <?php echo $val_hot['end_time']?></p>
                                    <div class="order clearfix">
                                        <b>￥:<?php echo $val_hot['price']?><i>起</i></b>
                                        <a href="convention/<?php echo date('Y/m/d', $val_hot['update_dateline']).'/'.$val_hot['id'];?>.shtml" target="_blank">展会价格</a>
                                    </div>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <!---图片滚动end-->
            </li>
            <!--中栏目start-->

            <!--右栏目start-->
            <li class="right fr">

                <!--登录start-->
                <?php
                if(empty($this->UserConfig['Id'])){
                ?>
                <div class="login">
                    <ul class="img01">
                        <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/5.jpg" alt="" /></li>
                        <li class="fr">
                            <p>Hi，下午好，</p>
                            <p>欢迎来到去展网</p>
                        </li>
                    </ul>
                    <ul class="login-resiger">
                        <a href="/register" target="_blank">免费注册</a>
                        <a href="/login" target="_blank">登录</a>
                    </ul>
                </div>
                <?php
                }else{
                    ?>
                    <!-- 登陆后 -->

                    <div class="mm_user">
                        <ul class="img01">
                            <li class="fl"><img src="<?php echo Common::AttachUrl($this->enberInfo['avatar']);?>!a200" width="66" onclick="window.location.href='<?php echo MEMBER_URL;?>/user/index/';" style="cursor:pointer"></li>
                            <li class="fr">Hi!<?php echo $this->UserConfig['Name'];?></li>
                        </ul>
                        <ul class="login-resiger">
                            <a href="<?php echo MEMBER_URL;?>/user/index/" target="_blank">个人中心</a>
                            <a href="/login/Logout/option/refer">退出</a>
                        </ul>

                    </div>
                <?php
                }
                ?>
                <!--登录end-->

                <!--最新资讯start-->
                <div class="news-new">
<!--                    <h2>最新展会</h2>-->
                    <ul>
                        <ul class="list">
                            <?php if(!empty($this->new_con)) foreach($this->new_con as $key=>$v_new_con){?>
                                <li>
                                    <a href="convention/<?php echo date('Y/m/d', $v_new_con['update_dateline']).'/'.$v_new_con['id'];?>.shtml" target="_blank"><?php echo $v_new_con['name']?></a>
                                </li>
                            <?php }?>
<!--                            --><?php
//                            $a = 0;
//                            if(!empty($this->entrust['All'])) foreach($this->entrust['All'] as $kk => $vv){
//                                ?>
<!--                                <li>-->
<!--                                        <a href="/news/--><?php //echo date('Y/m/d', $vv['dateline']).'/'.$vv['id'].'.shtml';?><!--" target="_blank">-->
<!--                                            --><?php //echo StringCode::GetCsubStr($vv['title'],0,14);?>
<!--                                        </a>-->
<!--                                </li>-->
<!--                            --><?php
//                                if($a >= 3 )
//                                {
//                                    break;
//                                }
//                                $a++;
//                            }
//                            ?>
                    </ul>
                </div>
                <!--最新资讯end-->

                <div class="line9"></div>
                <div class="help">
                    <ul class="img">
                        <a href="/" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/banner/no1.png" alt="去展" /></a>
                    </ul>
                    <ul class="img02">
                        <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/7.jpg" alt="" /></a></li>
                        <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/8.jpg" alt="" /></a></li>
                        <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/9.jpg" alt="" /></a></li>
                    </ul>
                    <p>今日有<i>4865</i>个求购，卖家速来查看</p>
                    <ul class="img03"><a href="##" target="_blank"><Img src="<?php echo STYLE_URL;?>/style/no2/images/14.jpg" alt="" /></a></ul>
                    <ul><a href="##" target="_blank"><Img src="<?php echo STYLE_URL;?>/style/no2/images/15.jpg" alt="" /></a></ul>
                </div>

            </li>
            <!--右栏目end-->


        </ul>
    </div>
    <!--幻灯片end-->



    <div class="line10"></div>
    <!--热门start-->
    <div class="hot">
        <ul class="clearfix">
            <li>
                <span>热门</span>
                <a href="http://www.qufair.com/convention/index/industry/%E4%BA%94%E9%87%91" target="_blank">五金展览会</a>
                <a href="http://www.qufair.com/convention/index/industry/%E7%A4%BC%E5%93%81" target="_blank">礼品展览会</a>
                <a href="http://www.qufair.com/convention/index/industry/%E6%9C%8D%E8%A3%85" target="_blank">服装展览会</a>
                <a href="http://www.qufair.com/convention/index/industry/%E5%BB%BA%E6%9D%90" target="_blank">建材展览会</a>
            </li>

            <li>
                <span>热门</span>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E7%BE%8E%E5%9B%BD&city=" target="_blank">美国展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E5%BE%B7%E5%9B%BD&city=" target="_blank">德国展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E6%97%A5%E6%9C%AC&city=" target="_blank">日本展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E5%8D%97%E9%9D%9E&city=" target="_blank">南非展览会</a>
            </li>
            <li>
                <span>热门</span>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=&city=%E4%B8%8A%E6%B5%B7" target="_blank">上海展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=&city=%E5%8C%97%E4%BA%AC" target="_blank">北京展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=&city=%E5%B9%BF%E5%B7%9E" target="_blank">广州展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=&city=%E6%B7%B1%E5%9C%B3" target="_blank">深圳展览会</a>
            </li>
            <li>
                <span>行业</span>
                <a href="http://www.qufair.com/convention/index/industry/%E6%B1%BD%E6%91%A9%E9%85%8D" target="_blank">汽配展览会</a>
                <a href="http://www.qufair.com/convention/index/industry/%E7%94%B5%E5%AD%90" target="_blank">电子展览会</a>
                <a href="http://www.qufair.com/convention/index/industry/%E7%8E%A9%E5%85%B7" target="_blank">玩具展览会</a>
                <a href="http://www.qufair.com/convention/index/industry/%E6%B1%BD%E8%BD%A6" target="_blank">汽车展览会</a>
            </li>

            <li>
                <span>国家</span>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E8%8B%B1%E5%9B%BD&city=" target="_blank">英国展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E5%8D%B0%E5%BA%A6&city=" target="_blank">印度展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E5%B7%B4%E8%A5%BF&city=" target="_blank">巴西展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E4%B8%AD%E4%B8%9C&city=" target="_blank">中东展览会</a>
            </li>
            <li>
                <span>地区</span>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=&city=%E9%A6%99%E6%B8%AF" target="_blank">香港展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=&city=%E7%A7%91%E9%9A%86" target="_blank">科隆展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E8%BF%AA%E6%8B%9C&city=" target="_blank">迪拜展览会</a>
                <a href="http://www.qufair.com/convention/index/?industry=&delta=&countries=%E5%9C%9F%E8%80%B3%E5%85%B6&city=" target="_blank">土耳其展览会</a>
            </li>
        </ul>
    </div>
    <!--热门end-->


    <div class="line10"></div>
    <!--新闻资讯start-->
    <div class="news-list">
        <ul class="clearfix">

            <!--左栏目start-->
            <li class="news-list-left fl">
                <div class="news">
                    <ul class="title">
                        <h2 class="fl">新闻资讯</h2>
                        <p class="new_title">
                            <a href="/agriculture" target="_blank">农林牧渔</a>
                            <a href="/transport" target="_blank">物流交通</a>
                            <a href="/news" target="_blank" class="mores">更多</a>
                        </p>
                    </ul>
                </div>

                <!--幻灯片start-->
                <div id="demo02" class="flexslider flexslider01">
                    <ul class="slides">
                        <?php
                        if(!empty($this->loop_adv)) foreach($this->loop_adv as $k=>$v){
                            ?>
                            <li><div class="img"><a href="<?php echo $v['url'];?>" target="_blank"><img src="<?php echo $v['file'];?>" alt="" width="470" height="260" /></a></div></li>
                        <?php
                        }
                        ?>
                      </ul>
                </div>
                <!--幻灯片end-->

                <!--实力商友start-->
                <div class="honor">
                    <h2>相关推荐</h2>
                    <ul class="clearfix">
                        <?php
                        if(!empty($this->new_re)) foreach($this->new_re as $kk => $vv_re){
                            ?>
                        <li>
                            <a href="/news/<?php echo date('Y/m/d', $vv_re['dateline']).'/'.$vv_re['id'].'.shtml';?>" target="">
                                <img src="<?php echo empty($vv_re['cover']) ? STYLE_URL.'/style/quzhan/images/20160202/test_01.png' :$vv_re['cover'];?>" alt="<?php echo $vv_re['title']?>" height="100" width="150" />
                                <p><?php echo $vv_re['title']?></p>
                            </a>
                        </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
                <!--实力商友end-->
            </li>
            <!--左栏目end-->

            <!--中栏目start-->
            <li class="news-list-center fl">

                <!--最新资讯start-->
                <div class="new-news">
                    <ul class="title">
                        <h2 class="fl">热门资讯</h2>
                        <p class="fr"><a href="/news" target="_blank">更多 ></a></p>
                    </ul>
                    <ul class="list">
                        <?php
                        if(!empty($this->new_hot)) foreach($this->new_hot as $kk => $vv){

                            ?>
                            <li>
                                <p>
                                    <a href="/news/<?php echo date('Y/m/d', $vv['dateline']).'/'.$vv['id'].'.shtml';?>" target="_blank">
                                        <?php echo StringCode::GetCsubStr($vv['title'],0,17);?>
                                    </a>
                                </p>
                            </li>
                        <?php
                        }
                        ?>
<!--                        <li><p><a href="##" target="_blank">慧聪商铺排名百度首页的秘密？</a></p></li>-->
<!--                        <li><p><a href="##" target="_blank">会员中心能为大家带来什么？</a></p></li>-->
<!--                        <li><p><a href="##" target="_blank">慧聪商铺排名百度首页的秘密？</a></p></li>-->
<!--                        <li><p><a href="##" target="_blank">慧聪商铺排名百度首页的秘密？</a></p></li>-->
                    </ul>
                </div>
                <!--最新资讯end-->
                <!--最新政策start-->
                <div class="new-news">
                    <ul class="title">
                        <h2 class="fl">知识百科</h2>
                        <p class="fr"><a href="/knowledge" target="_blank">更多 ></a></p>
                    </ul>
                    <ul class="list">
                        <?php
                        if(!empty($this->new_ke)) foreach($this->new_ke as $kk => $vv_ke){
                            ?>
                            <li>
                                <p>
                                    <a href="/news/<?php echo date('Y/m/d', $vv_ke['dateline']).'/'.$vv_ke['id'].'.shtml';?>" target="_blank">
                                        <?php echo StringCode::GetCsubStr($vv_ke['title'],0,17);?>
                                    </a>
                                </p>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!--最新政策end-->
                <!--最新评论start-->
<!--                <div class="new-news">-->
<!--                    <ul class="title">-->
<!--                        <h2 class="fl">最新评论</h2>-->
<!--                        <p class="fr"><a href="##" target="_blank">更多 ></a></p>-->
<!--                    </ul>-->
<!--                    <ul class="list">-->
<!--                        <li><p><a href="##" target="_blank">慧聪商铺排名百度首页的秘密？</a></p></li>-->
<!--                        <li><p><a href="##" target="_blank">会员中心能为大家带来什么？</a></p></li>-->
<!--                        <li><p><a href="##" target="_blank">慧聪商铺排名百度首页的秘密？</a></p></li>-->
<!--                        <li><p><a href="##" target="_blank">慧聪商铺排名百度首页的秘密？</a></p></li>-->
<!--                    </ul>-->
<!--                </div>-->
                <!--最新评论end-->

            </li>
            <!--中栏目start-->

            <!--右栏目start-->
            <li class="news-list-right fr">
                <div class="video">
                    <ul class="title">
                        <h2>最新资讯</h2>
                    </ul>
                    <ul class="list">
                    <?php
                    if(!empty($this->new['All'])) foreach($this->new['All'] as $kk => $vv_hot){                    ?>
                        <li>
                            <a href="/news/<?php echo date('Y/m/d', $vv_hot['dateline']).'/'.$vv_hot['id'].'.shtml';?>" target="_blank" class="img">
                                <img src="<?php echo empty($vv_hot['cover']) ? STYLE_URL.'/style/quzhan/images/20160202/test_01.png' :$vv_hot['cover'];?>" alt="<?php echo $vv_hot['title']?>" height="80" width="150" />
                            </a>
                            <h4>
                                <a href="/news/<?php echo date('Y/m/d', $vv_hot['dateline']).'/'.$vv_hot['id'].'.shtml';?>" target="_blank">
                                    <?php echo StringCode::GetCsubStr($vv_hot['title'],0,17);?>
                                </a>
                            </h4>
<!--                            <p>创建者:张山峰</p>-->
                            <p><?php  echo date('Y-m-d H:i:s', $vv_hot['dateline'])?></p>
                        </li>
                        <?php }?>

                    </ul>
                </div>
            </li>
            <!--右栏目end-->


        </ul>
    </div>
    <!--新闻资讯end-->


    <div class="line10"></div>

    <!--热门start-->
    <div class="hot">
        <ul class="clearfix">
            <li>
                <span>行业</span>
                <a href="/knowledge" target="_blank">外贸百科</a>
                <a href="/textile" target="_blank">纺织面料</a>
                <a href="/jewelry" target="_blank">饰品珠宝</a>
                <a href="/food" target="_blank">食品饮料</a>
            </li>

            <li>
                <span>行业</span>
                <a href="/gift" target="_blank">礼品玩具</a>
                <a href="/cloth" target="_blank">成衣配饰</a>
                <a href="/cosmetology" target="_blank">美容美发</a>
                <a href="/mechanics" target="_blank">机械工业</a>
            </li>
            <li>
                <span>行业</span>
                <a href="/home" target="_blank">家居消费</a>
                <a href="/hotel" target="_blank">酒店旅游</a>
                <a href="/safe" target="_blank">安防劳保</a>
                <a href="/hardware" target="_blank">五金工具</a>
            </li>
            <li>
                <span>资讯</span>
                <a href="/print" target="_blank">印刷包装</a>
                <a href="/medical" target="_blank">医疗保健</a>
                <a href="/building" target="_blank">建材暖通</a>
                <a href="/vessel" target="_blank">海洋船舶</a>
            </li>

            <li>
                <span>资讯</span>
                <a href="/chemical" target="_blank">化工环保</a>
                <a href="/sport" target="_blank">体育户外</a>
                <a href="/electron" target="_blank">电子通讯</a>
                <a href="/aerospace" target="_blank">航天航空</a>
            </li>
            <li>
                <span>资讯</span>
                <a href="/computer" target="_blank">电脑软件</a>
                <a href="/accessories" target="_blank">汽摩配件</a>
                <a href="/power" target="_blank">电力能源</a>
                <a href="/lighting" target="_blank">灯光照明</a>
            </li>
        </ul>
    </div>
    <!--热门end-->

    <div class="line10"></div>
    <!--旅行start-->
    <div class="travel">
        <ul class="clearfix">

            <!--左栏目start-->
            <li class="left fl">
                <div class="tab">
                    <p class="fl">
                        <a href="javascript:void(0)" class="current">国际行程</a>
                        <span>|</span>
                        <a href="javascript:void(0)">商务签证</a>
                    </p>
                    <i class="fr"><a href="/route" target="">更多>></a></i>
                </div>

                <div class="reviews">

                    <!--国际行程start-->
                    <div>
                        <ul class="clearfix">
                            <li class="tab-detial fl" id="tab01">
                                <a href="jvascript:void(0)" class="current"><i>欧<br/>洲</i></a>
                                <a href="jvascript:void(0)"><i>美<br/>洲</i></a>
                                <a href="jvascript:void(0)"><i>亚<br/>洲</i></a>
                                <a href="jvascript:void(0)"><i>非<br/>洲</i></a>
                                <a href="jvascript:void(0)"><em>大<br/>洋<br/>洲</em></a>
                            </li>
                            <li class="detial-review fr" id="detial-review01">
                                <!--欧洲start-->
                                <div>
                                <ul class="clearfix">
                                <?php //var_dump($this->delta);exit();?>

                                <?php foreach($this->delta_route['0'] as $k => $val_de){?>
                                <li><a href="/route-<?php echo $val_de['name_en']?>" target="_blank"><?php echo $val_de['name']?></a></li>
                                <?php }?>
                                </ul>
<!--广告图                                   --><?php
//                                    if(!empty($this->route_adv)) foreach($this->route_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--欧洲end-->

                                <!--美洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_route['1'] as $k => $val_de){?>
                                            <li><a href="/route-<?php echo $val_de['name_en']?>" target="_blank"><?php echo $val_de['name']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->route_adv)) foreach($this->route_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--美洲end-->

                                <!--亚洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_route['2'] as $k => $val_de){?>
                                            <li><a href="/route-<?php echo $val_de['name_en']?>" target="_blank"><?php echo $val_de['name']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->route_adv)) foreach($this->route_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--亚洲end-->

                                <!--非洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_route['3'] as $k => $val_de){?>
                                            <li><a href="/route-<?php echo $val_de['name_en']?>" target="_blank"><?php echo $val_de['name']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->route_adv)) foreach($this->route_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--非洲end-->
                                <!--大洋洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_route['4'] as $k => $val_de){?>
                                            <li><a href="/route-<?php echo $val_de['name_en']?>" target="_blank"><?php echo $val_de['name']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->route_adv)) foreach($this->route_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--大洋洲end-->
                            </li>
                        </ul>
                    </div>
                    <!--国际行程end-->


                    <!--商务签证start-->
                    <div class="disable">
                        <ul class="clearfix">
                            <li class="tab-detial fl" id="tab02">
                                <a href="jvascript:void(0)" class="current"><i>欧<br/>洲</i></a>
                                <a href="jvascript:void(0)"><i>美<br/>洲</i></a>
                                <a href="jvascript:void(0)"><i>亚<br/>洲</i></a>
                                <a href="jvascript:void(0)"><i>非<br/>洲</i></a>
                                <a href="jvascript:void(0)"><em>大<br/>洋<br/>洲</em></a>
                            </li>
                            <li class="detial-review fr" id="detial-review02">
                                <!--欧洲start-->
                                <div>
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_visa['0'] as $k => $val_de){?>
                                            <li><a href="/visa/<?php echo date('Y/m/d', $val_de['update_time']).'/'.$val_de['visa_id'];?>.shtml" target="_blank"><?php echo $val_de['visa_countries']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->visa_adv)) foreach($this->visa_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--欧洲end-->
                                <!--美洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_visa['1'] as $k => $val_de){?>
                                            <li><a href="/visa/<?php echo date('Y/m/d', $val_de['update_time']).'/'.$val_de['visa_id'];?>.shtml" target="_blank"><?php echo $val_de['visa_countries']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->visa_adv)) foreach($this->visa_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--美洲end-->
                                <!--亚洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_visa['2'] as $k => $val_de){?>
                                            <li><a href="/visa/<?php echo date('Y/m/d', $val_de['update_time']).'/'.$val_de['visa_id'];?>.shtml" target="_blank"><?php echo $val_de['visa_countries']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->visa_adv)) foreach($this->visa_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--亚洲end-->
                                <!--非洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_visa['3'] as $k => $val_de){?>
                                            <li><a href="/visa/<?php echo date('Y/m/d', $val_de['update_time']).'/'.$val_de['visa_id'];?>.shtml" target="_blank"><?php echo $val_de['visa_countries']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->visa_adv)) foreach($this->visa_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--非洲end-->
                                <!--大洋洲start-->
                                <div class="disable">
                                    <ul class="clearfix">
                                        <?php foreach($this->delta_visa['4'] as $k => $val_de){?>
                                            <li><a href="/visa/<?php echo date('Y/m/d', $val_de['update_time']).'/'.$val_de['visa_id'];?>.shtml" target="_blank"><?php echo $val_de['visa_countries']?></a></li>
                                        <?php }?>
                                    </ul>
<!--                                   --><?php
//                                    if(!empty($this->visa_adv)) foreach($this->visa_adv as $k=>$v){
//                                        ?>
<!--                                        <ul>-->
<!--                                            <a href="--><?php //echo $v['url'];?><!--" target="_blank"  class="img">-->
<!--                                                <img src="--><?php //echo $v['file'];?><!--" width="310" height="90" />-->
<!--                                            </a>-->
<!--                                        </ul>-->
<!--                                    --><?php
//                                    }
//                                    ?>
                                </div>
                                <!--大洋洲end-->
                            </li>
                        </ul>
                    </div>
                    <!--商务签证end-->

                </div>

            </li>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="right fr">
                <div class="travel-img">
                    <ul class="title">
                        <p class="fl">
                            <a href="/route" target="_blank">国际跟团展</a>
                            <span>|</span>
                            <a href="/route" target="_blank">法国五金展</a>
                            <span>|</span>
                            <a href="/route" target="_blank">韩国美发展</a>
                        </p>
                        <p class="fr"><a href="/route" target="_blank">更多>></a></p>
                    </ul>
                    <ul class="list clearfix">

                        <li>
<!--                            <div>-->
<!--                                <a target="_blank" href="##">-->
<!--                                    <img alt="" src="http://cdn.qufair.com/style/no2/images/route/8.jpg" height="322px" width="490px">-->
<!--                                </a>-->
<!--                            </div>-->

                            <div class="scroll">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/7.png" alt="" class="prev1" />
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/8.png" alt="" class="next1" />
                                <div class="sroll-img1">
                                    <ul>
                                        <?php if(!empty($this->hot_conven['All'])) foreach($this->hot_conven['All'] as $key=>$val_hot){?>
                                            <li>
                                                <img alt="" src="http://cdn.qufair.com/style/no2/images/route/8.jpg" height="322px" width="490px">
                                            </li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php if(!empty($this->hot_route)) foreach($this->hot_route as $kk => $val_route){?>

                        <li>
                            <div><a href="/route/<?php echo date('Y/m/d',$val_route['dateline']).'/'.$val_route['id'].'.shtml';?>" target="_blank"><img src="<?php echo Common::AttachUrl($val_route['cover']);?>" alt="<?php echo $val_route['name']?>" height="240px;" /></a></div>
                            <p><a href="/route/<?php echo date('Y/m/d',$val_route['dateline']).'/'.$val_route['id'].'.shtml';?>" target="_blank">行程价格</a><i><?php echo $val_route['price']?>元</i>起</p>
                            <h4><a href="/route/<?php echo date('Y/m/d',$val_route['dateline']).'/'.$val_route['id'].'.shtml';?>" target="_blank"><?php echo $val_route['name']?></a></h4>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--旅行end-->

    <div class="line10"></div>
    <!--热门start-->
    <div class="hot">
        <ul class="clearfix">
            <li>
                <span>热门</span>
                <a href="##" target="_blank">商务旅游</a>
                <a href="##" target="_blank">商务考察</a>
                <a href="##" target="_blank">商务旅行</a>
                <a href="##" target="_blank">商务差旅</a>
            </li>

            <li>
                <span>热门</span>
                <a href="##" target="_blank">德国展团</a>
                <a href="##" target="_blank">美国展团</a>
                <a href="##" target="_blank">香港展团</a>
                <a href="##" target="_blank">日本展团</a>
            </li>
            <li>
                <span>热门</span>
                <a href="##" target="_blank">美国签证</a>
                <a href="##" target="_blank">德国签证</a>
                <a href="##" target="_blank">日本签证</a>
                <a href="##" target="_blank">韩国签证</a>
            </li>
            <li>
                <span>查询</span>
                <a href="##" target="_blank">出国考察</a>
                <a href="##" target="_blank">旅游签证</a>
                <a href="##" target="_blank">商务签证</a>
                <a href="##" target="_blank">签证查询</a>
            </li>

            <li>
                <span>展团</span>
                <a href="##" target="_blank">印度展团</a>
                <a href="##" target="_blank">迪拜展团</a>
                <a href="##" target="_blank">法国展团</a>
                <a href="##" target="_blank">英国展团</a>
            </li>
            <li>
                <span>签证</span>
                <a href="##" target="_blank">申请签证</a>
                <a href="##" target="_blank">英国签证</a>
                <a href="##" target="_blank">法国签证</a>
                <a href="##" target="_blank">巴西签证</a>
            </li>
        </ul>
    </div>
    <!--热门end-->

    <div class="line10"></div>
    <!--展装商城start-->
<!--    <div class="supper">-->
<!--        <ul class="title">-->
<!--            <h2 class="fl">-->
<!--                <a href="/decoration" target="_blank" class="current">展装商城</a><span>|</span><a href="/decoration" target="_blank">已有装修图，需找展装公司?</a>-->
<!--            </h2>-->
<!--            <p class="fr">热门展装：<a href="/decoration" target="_blank">电子展</a><span>|</span><a href="/decoration" target="_blank">法国五金展</a><span>|</span><a href="/decoration" target="_blank">韩国美发展</a></p>-->
<!--        </ul>-->
<!--        <ul class="list clearfix">-->
<!--            --><?php
//            if(!empty($this->recommend)) foreach($this->recommend as $k=>$v){
//            ?>
<!--            <li>-->
<!--                <div><a href="/decoration/--><?php //echo date('Y/m/d',$v['de_time']).'/'.$v['id'].'.shtml';?><!--" target="_blank">-->
<!--                    <img src="--><?php //echo Common::AttachUrl($v['cover']);?><!--" alt="" height="280px" width="280px;"/>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="info">-->
<!--                    <p><a href="/decoration/--><?php //echo date('Y/m/d',$v['de_time']).'/'.$v['id'].'.shtml';?><!--" target="_blank">搭建价格</a><i>--><?php //echo $v['de_price']?><!--元</i>起</p>-->
<!--                    <h4><a href="/decoration/--><?php //echo date('Y/m/d',$v['de_time']).'/'.$v['id'].'.shtml';?><!--" target="_blank">--><?php //echo $v['title']?><!--</a></h4>-->
<!--                </div>-->
<!--            </li>-->
<!--            --><?php //}?>
<!--        </ul>-->
<!--    </div>-->
    <!--展装商城end-->

    <div class="line10"></div>

    <!--热门start-->
<!--    <div class="hot">-->
<!--        <ul class="clearfix">-->
<!--            <li>-->
<!--                <span>热门</span>-->
<!--                <a href="/decoration" target="_blank">展览设计</a>-->
<!--                <a href="/decoration" target="_blank">展会设计</a>-->
<!--                <a href="/decoration" target="_blank">会展设计</a>-->
<!--                <a href="/decoration" target="_blank">展会展示</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <span>热门</span>-->
<!--                <a href="/decoration" target="_blank">上海设计</a>-->
<!--                <a href="/decoration" target="_blank">北京设计</a>-->
<!--                <a href="/decoration" target="_blank">深圳设计</a>-->
<!--                <a href="/decoration" target="_blank">广州设计</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <span>热门</span>-->
<!--                <a href="/decoration" target="_blank">上海搭建</a>-->
<!--                <a href="/decoration" target="_blank">北京搭建</a>-->
<!--                <a href="/decoration" target="_blank">深圳搭建</a>-->
<!--                <a href="/decoration" target="_blank">广州搭建</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <span>热门</span>-->
<!--                <a href="/decoration" target="_blank">展会搭建</a>-->
<!--                <a href="/decoration" target="_blank">展览搭建</a>-->
<!--                <a href="/decoration" target="_blank">会展搭建</a>-->
<!--                <a href="/decoration" target="_blank">展览展示</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <span>热门</span>-->
<!--                <a href="/decoration" target="_blank">美国设计</a>-->
<!--                <a href="/decoration" target="_blank">德国设计</a>-->
<!--                <a href="/decoration" target="_blank">香港设计</a>-->
<!--                <a href="/decoration" target="_blank">迪拜设计</a>-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <span>热门</span>-->
<!--                <a href="/decoration" target="_blank">美国搭建</a>-->
<!--                <a href="/decoration" target="_blank">德国搭建</a>-->
<!--                <a href="/decoration" target="_blank">香港搭建</a>-->
<!--                <a href="/decoration" target="_blank">迪拜搭建</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
    <!--热门end-->


    <div class="line20"></div>

</div>
<!--main end-->
<?php include $this->Render('links2.php'); ?>
<?php include $this->Render('footer2.php'); ?>