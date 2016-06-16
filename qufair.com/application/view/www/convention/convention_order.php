﻿<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/style.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/main.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/slider.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/no2/js/jcarousellite_1.0.1.js"></script>
    <title>首页</title>
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
            <a href="javascript:void(0)" target="_self" style="color:#ff4b05;" class="zoomIn dialog" id="login">请登录!</a>
            <a href="javascript:void(0)" target="_self" class="zoomIn dialog" id="resiger">免费注册</a>
            <span>|</span>
            <a href="javascript:void(0)" target="_self" class="bg01">商户入驻</a>
            <span>|</span>
            <i>咨询热线：40006-2345-1</i>
            <span>|</span>
            <a href="##" target="_blank">帮助中心</a>
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
                <a href="##" target="_blank" class="current">全球展会</a>
                <a href="##" target="_blank">行程</a>
                <a href="##" target="_blank">签证</a>
                <a href="##" target="_blank">特装</a>
                <a href="##" target="_blank">新闻资讯</a>
            </div>

            <div class="con02">
                <input type="text" value=""  class="fl" placeholder="输入关键词内容" id="type" onClick="searchs(true)"/>
                <input type="button" value="搜  索" class="fr" />
                <div id="type-list">
                    <p pl="美国食品科技展IFT">美国食品科技展IFT</p>
                    <p pl="美国夏季特色食品展">美国夏季特色食品展</p>
                    <p pl="美国安全及劳保用品博览会">美国安全及劳保用品博览会</p>
                </div>
            </div>

            <div class="con03">
                <p>
                    <span>热门搜索：</span>
                    <a href="##" target="_blank">港展</a>
                    <a href="##" target="_blank" class="font01">礼品展</a>
                    <a href="##" target="_blank">广交会</a>
                    <a href="##" target="_blank">世博</a>
                    <a href="##" target="_blank">德国玩具展</a>
                    <a href="##" target="_blank" class="font01">日本性文化展</a>
                    <a href="##" target="_blank">韩国服装展</a>
                    <a href="##" target="_blank">家居展</a>
                </p>
            </div>

        </li>

    </ul>
</div>
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
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">纺织服饰鞋革<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display: none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--纺织服饰鞋革end-->
               <!--安防劳保公共start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">安防劳保公共<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--安防劳保公共end-->
               <!--酒店及旅游用品start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">酒店及旅游用品<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>

                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--酒店及旅游用品end-->
               <!--首饰美容化妆品start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">首饰美容化妆品<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--首饰美容化妆品end-->
               <!--食品饮料烟酒start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">食品饮料烟酒<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display: none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--食品饮料烟酒end-->
               <!--机械五金工业start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">机械五金工业<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--机械五金工业end-->
               <!--印刷包装广告start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">印刷包装广告<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--印刷包装广告end-->
               <!--化工环保能源start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">化工环保能源<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display: none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--化工环保能源end-->
               <!--计算机软件网络start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">计算机软件网络<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--计算机软件网络end-->
               <!--生物医疗保健start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">生物医疗保健<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--生物医疗保健end-->
               <!--体育户外影视start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">体育户外影视<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--体育户外影视end-->
               <!--汽配摩配自行车start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">汽配摩配自行车<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--汽配摩配自行车end-->
               <!--建材石材暖通start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">建材石材暖通<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--建材石材暖通end-->
               <!--运输物流start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">运输物流<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--运输物流end-->
               <!--宠物用品钓具start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">宠物用品钓具<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--宠物用品钓具end-->
               <!--宠物用品钓具start-->
               <div class="nav-item">
                   <a href="javascript:void(0);" title="" class="nav-link">宠物用品钓具<i class="ico"></i></a>
                   <div class="nav-dropdown" style="display:none;">
                       <div class="jjjz">
                           <ul class="clearfix">
                               <!--左start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--左end-->
                               <!--右start-->
                               <li class="type-list fl">
                                   <div class="type">
                                       <ul class="title">
                                           <b><a href="##" target="_blank">纺织</a></b>
                                           <p><a href="##" target="_blank">女装</a></p>
                                       </ul>
                                       <ul class="list clearfix">
                                           <li><a href="##" target="_blank">连衣裙</a></li>
                                           <li><a href="##" target="_blank">衬衫</a></li>
                                           <li><a href="##" target="_blank">雪纺纱</a></li>
                                           <li><a href="##" target="_blank">T恤</a></li>
                                           <li><a href="##" target="_blank">针织衫</a></li>
                                           <li><a href="##" target="_blank">牛仔裤</a></li>
                                           <li><a href="##" target="_blank">打底裤</a></li>
                                           <li><a href="##" target="_blank">休闲裤</a></li>
                                       </ul>
                                   </div>

                                   <div class="img-list">
                                       <ul>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                           <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                       </ul>
                                   </div>
                               </li>
                               <!--右end-->
                           </ul>
                       </div>
                   </div>
               </div>
               <!--宠物用品钓具end-->
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
                       <div class="nav-item">
                           <a href="javascript:void(0);" title="" class="nav-link">电子电力通讯<i class="ico"></i></a>
                           <div class="nav-dropdown" style="display:none;">
                               <div class="jjjz">
                                   <ul class="clearfix">
                                       <!--左start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">电子电力通讯</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--左end-->
                                       <!--右start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>

                                           <div class="img-list">
                                               <ul>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--右end-->
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!--电子电力通讯end-->
                       <!--礼品及消费品start-->
                       <div class="nav-item">
                           <a href="javascript:void(0);" title="" class="nav-link">礼品及消费品<i class="ico"></i></a>
                           <div class="nav-dropdown" style="display:none;">
                               <div class="jjjz">
                                   <ul class="clearfix">
                                       <!--左start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">礼品及消费品</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--左end-->
                                       <!--右start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>

                                           <div class="img-list">
                                               <ul>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--右end-->
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!--礼品及消费品end-->
                       <!--海洋航空航天start-->
                       <div class="nav-item">
                           <a href="javascript:void(0);" title="" class="nav-link">海洋航空航天<i class="ico"></i></a>
                           <div class="nav-dropdown" style="display:none;">
                               <div class="jjjz">
                                   <ul class="clearfix">
                                       <!--左start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">海洋航空航天</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--左end-->
                                       <!--右start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>

                                           <div class="img-list">
                                               <ul>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--右end-->
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!--海洋航空航天end-->
                       <!--照明及综合start-->
                       <div class="nav-item">
                           <a href="javascript:void(0);" title="" class="nav-link">照明及综合<i class="ico"></i></a>
                           <div class="nav-dropdown" style="display:none;">
                               <div class="jjjz">
                                   <ul class="clearfix">
                                       <!--左start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">照明及综合</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--左end-->
                                       <!--右start-->
                                       <li class="type-list fl">
                                           <div class="type">
                                               <ul class="title">
                                                   <b><a href="##" target="_blank">纺织</a></b>
                                                   <p><a href="##" target="_blank">女装</a></p>
                                               </ul>
                                               <ul class="list clearfix">
                                                   <li><a href="##" target="_blank">连衣裙</a></li>
                                                   <li><a href="##" target="_blank">衬衫</a></li>
                                                   <li><a href="##" target="_blank">雪纺纱</a></li>
                                                   <li><a href="##" target="_blank">T恤</a></li>
                                                   <li><a href="##" target="_blank">针织衫</a></li>
                                                   <li><a href="##" target="_blank">牛仔裤</a></li>
                                                   <li><a href="##" target="_blank">打底裤</a></li>
                                                   <li><a href="##" target="_blank">休闲裤</a></li>
                                               </ul>
                                           </div>

                                           <div class="img-list">
                                               <ul>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/2.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/3.jpg" alt=""></a></li>
                                                   <li><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/4.jpg" alt=""></a></li>
                                               </ul>
                                           </div>
                                       </li>
                                       <!--右end-->
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!--照明及综合end-->
                   </ul>
               </div>
               <!--弹窗end-->
           </ul>
       </div>
     </span>

        <ul class="fr">
            <li><a href="##" target="_self" class="current">首页</a></li>
            <li><a href="##" target="_blank">展会</a></li>
            <li><a href="##" target="_blank">行程</a></li>
            <li><a href="##" target="_blank">签证</a></li>
            <li><a href="##" target="_blank">物流</a></li>
            <li><a href="##" target="_blank">特装</a></li>
            <li><a href="##" target="_blank">社区资讯</a></li>
        </ul>
    </div>
    <!--导航end-->
    <div class="line10"></div>

    <!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li><a href="##" title="">首页</a><span>&gt;</span><a href="##" title="">展会</a><span>&gt;</span><i>展会</i></li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>

    <form action="/convention/order/" method="post" name="order" class="AjaxForm order" id="postAddform" autocomplete="off">

    <!--步骤start-->
    <div class="step">
        <ul>
            <li class="current">
                <em></em>
                <div>
                    <i>1</i>
                    <p>提交需求</p>
                </div>
            </li>
            <li>
                <em></em>
                <div>
                    <i>2</i>
                    <p>客服联系</p>
                </div>
            </li>
            <li>
                <em></em>
                <div>
                    <i>3</i>
                    <p>完成预订</p>
                </div>
            </li>
        </ul>
    </div>
    <!--步骤end-->

    <!--筛选start-->
    <div class="case-list">
        <ul class="title-case">
            <li class="fl select01">
                <div>
                    <select>
                        <option>选择展位类型</option>
                        <option>标摊</option>
                        <option>特装</option>
                    </select>
                </div>
            </li>
            <li class="fl select01 select02">
                <div>
                    <select>
                        <option>开口类型</option>
                        <option>两口</option>
                        <option>三口</option>
                    </select>
                </div>
            </li>
            <li class="fl select01 select02">
                <div>
                    <select>
                        <option>面积大小</option>
                        <option>3*3</option>
                        <option>2*2</option>
                    </select>
                </div>
            </li>
            <li class="fl select01 select02">
                <div>
                    <select>
                        <option>是否跟团</option>
                        <option>是</option>
                        <option>否</option>
                    </select>
                </div>
            </li>
            <li class="fl">
                <div>
                    <input type="text" value="" placeholder="输入展品内容" />
                </div>
            </li>
            <li class="fl"><input id="tj" type="button" value="添加" /></li>
            <li class="fr"><a href="##"><img src="<?php echo STYLE_URL;?>/style/no2/images/25.png" alt="" /></a></li>
        </ul>

        <ul class="case-list-title">
            <p>已选展位类型</p>
            <p>开口类型</p>
            <p>面积(㎡)</p>
            <p>是否跟团</p>
            <p>展品</p>
        </ul>

        <ul class="case-list-info">
<!--            <li>-->
<!--                <p class="booth_type p1">特装</p>-->
<!--                <p class="p2">三口</p>-->
<!--                <p class="p3">3×3</p>-->
<!--                <p class="p4">是</p>-->
<!--                <p class="p5">太阳能</p>-->
<!--                <span class="fr"><a href="##" target="_blank">删除</a></span>-->
<!--            </li>-->
        </ul>
    </div>
    <!--筛选end-->
        <script>
            function delet(obj){
                $(obj).parent().parent().remove()
            };
            $(function(){
                $("#tj").click(function(){
                    var num=$(".case-list-info").children().length;
                    var a=$(this).parent().prev().prev().children().children().val();
                    var b=$(this).parent().prev().prev().prev().children().children().val();
                    var c=$(this).parent().prev().prev().prev().prev().children().children().val();
                    var d=$(this).parent().prev().prev().prev().prev().prev().children().children().val();
                    var e=$(this).parent().prev().children().children().val();
                    if(num==1){
                        $(".p1").html(d);
                        $(".p2").html(c);
                        $(".p3").html(b);
                        $(".p4").html(a);
                        $(".p5").html(e);
                    }
                    else {
                        var html="<li>"
                            +"<p class='p1'>"+d+"</p>"
                            +"<p class='p2'>"+c+"</p>"
                            +"<p class='p3'>"+b+"</p>"
                            +"<p class='p4'>"+a+"</p>"
                            +"<p class='p5'>"+e+"</p>"
                            +"<span class='fr'>"
                            +"<a href='##' onclick='delet(this)'>"
                            +"删除"
                            +"</a>"
                            +"</span>"
                            +"</li>";
                        $(".case-list-info").append(html);
                    }
                })
            })
                </script>
    <div class="line10"></div>

    <!--参展企业信息start-->
    <div class="add-company-info">
        <ul class="add-info">
<!--            <a href="javascript:void(0)" id="add" class="zoomIn dialog">+ 新增资料</a>-->
<!--            <h3>参展企业信息</h3>-->
<!--            <b>杭州去展网络科技有限公司<img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/50.jpg" alt="" /><a href="#" title="">编辑</a></b>-->
<!--            <p>联系人：张山峰</p>-->
<!--            <p>电<em></em>话：18600587700</p>-->
<!--            <p>地<em></em>址：1564564564@qq.com</p>-->
            <div class="add-con"><ul class="titles">
                    <li class="fl">
                        <img alt="" src="http://cdn.qufair.com/style/no2/images/11.png">
                    </li>
                    <li class="fl">
                        <b>参展企业资料</b></li>
                </ul>
                <ul class="add-pinfo">
                    <li class="clearfix">
                        <label class="fl">企业名称：</label>
                        <input type="text" class="wd01" placeholder="杭州去展网络科技有限公司" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系人：</label>
                        <input type="text" class="wd02" placeholder="张山峰" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系手机：</label>
                        <input type="text" class="wd03" placeholder="1366647400560" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系电话：</label>
                        <input type="text" class="wd04" placeholder="0567-5225006" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">电子邮箱：</label>
                        <input type="text" class="wd05" placeholder="454564@qq.com" value="">
                    </li>
                </ul>
            </div>
        </ul>
        <ul class="notice">
            <textarea placeholder="输入备注内容" class="wd06"></textarea>
        </ul>
    </div>
    <!--参展企业信息end-->

    <div class="line10"></div>
    <div class="line20"></div>

    <!--提交start-->
    <div class="submit">

        <input type="hidden" name="option" value="submit">
        <input type="hidden" name="yesfn" value="alert('添加成功'); window.location.href='/user/order/';">
        <input type="button" value="提交" class="zoomIn dialog" id="submit" />

    </div>
    <!--提交end-->

    <div class="line10"></div>
    <div class="line20"></div>
        </form>

</div>
<!--main end-->


<!--登录注册弹窗start-->
<div id="HBox">

    <!--登录start-->
    <div class="boxbg" style="display:none;" id="box01">
        <div class="login-box">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>密码登录</b></li>
            </ul>
            <ul class="text-input">
                <li class="if01"><input type="text" value="" placeholder="手机 或 邮箱号" class="tp" /></li>
                <li class="if01"><input type="text" value="" placeholder="密码" class="tp" /></li>
                <li class="if02"><p><a href="javascript:void(0)" title="" class="select01">短信登录？</a></p></li>
                <li><input type="submit" value="确定"/></li>
            </ul>
        </div>
    </div>
    <!--登录end-->

    <!--快捷登录start-->
    <div class="boxbg" style="display:none;" id="box02">
        <div class="login-box">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>快捷安全登录</b></li>
            </ul>
            <ul class="text-input">
                <li class="if01"><input type="text" value="" placeholder="手机 或 邮箱号" class="tp" /></li>
                <li class="if01 if03"><input type="text" value="" placeholder="验证码" class="tp" /><a href="javascript:void(0)">获取</a></li>
                <li class="if02"><p><a href="javascript:void(0)" title="" class="select02">密码登录？</a></p></li>
                <li><input type="button" value="确定"/></li>
            </ul>
        </div>
    </div>
    <!--快捷登录end-->

    <!--注册start-->
    <div class="boxbg" style="display:none;" id="box03">
        <div class="resiger">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>企业基本信息</b></li>
            </ul>
            <ul class="text-input">
                <li class="if01"><input type="text" value="" placeholder="输入企业名称" class="tp" /></li>
                <li class="if01 if04"><input type="text" value="" placeholder="选择行业" class="tp" id="project-type" readonly /></li>
                <li class="if05"><input type="button" value="完成"/></li>
            </ul>
            <ul class="project" style="display:none;">
                <div class="search-box"><input type="text" value="" placeholder="行业关键词"/></div>
                <div class="search-list">
                    <ul class="clearfix">
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)" class="current">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                    </ul>
                    <ul class="clearfix">
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                    </ul>
                    <ul class="clearfix">
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
    <!--注册end-->

    <!--提交成功start-->
    <div class="boxbg" style="display:none;" id="box04">
        <div class="success">
            <b>恭喜！提交成功</b>
            <p>请等待客服联系 或 主动联系客服</p>
            <ul><input type="button" value="确定" onclick="javascript:window.location.href='/'" /></ul>
        </div>
    </div>
    <!--提交成功end-->

    <!--添加信息start-->
    <div class="boxbg01" style="display:none;" id="box05">
        <div class="add-con">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>参展企业资料</b></li>
            </ul>

<!--            <ul class="add-pinfo">-->
<!--                <li class="clearfix">-->
<!--                    <label class="fl">企业名称：</label>-->
<!--                    <input type="text" value="" placeholder="杭州去展网络科技有限公司" class="wd01" />-->
<!--                </li>-->
<!--                <li class="clearfix">-->
<!--                    <label class="fl">联系人：</label>-->
<!--                    <input type="text" value="" placeholder="张山峰"  class="wd02"/>-->
<!--                </li>-->
<!--                <li class="clearfix">-->
<!--                    <label class="fl">联系手机：</label>-->
<!--                    <input type="text" value="" placeholder="1366647400560" class="wd01" />-->
<!--                </li>-->
<!--                <li class="clearfix">-->
<!--                    <label class="fl">联系电话：</label>-->
<!--                    <input type="text" value="" placeholder="0567-5225006" class="wd01" />-->
<!--                </li>-->
<!--                <li class="clearfix">-->
<!--                    <label class="fl">电子邮箱：</label>-->
<!--                    <input type="text" value="" placeholder="454564@qq.com" class="wd01" />-->
<!--                </li>-->
<!--                <li>-->
<!--                    <input type="button" value="保存" />-->
<!--                </li>-->
<!--            </ul>-->

        </div>
    </div>
    <!--添加信息end-->

</div>
<script src="<?php echo STYLE_URL;?>/style/no2/js/jquery.hDialog.min.js"></script>
<script>
    $(function(){
        var $el = $('.dialog');
        $el.hDialog();
    });

    $(function(){
        //alert("111");
        $(document).on('click','#submit',function(){

            var p1 = $(".p1").text();
            var p2 = $(".p2").text();
            var p3 = $(".p3").text();
            var p4 = $(".p4").text();
            var p5 = $(".p5").text();
            var wd01 = $(".wd01").val();
            var wd02 = $(".wd02").val();
            var wd03 = $(".wd03").val();
            var wd04 = $(".wd04").val();
            var wd05 = $(".wd05").val();
            var wd06 = $(".wd06").val();

            $("#box01").hide();
            if(p1 = null || p1 == '')
            {
                alert("不能为空");
                $("#HOverlay").hide();
                return false;
            }
            $.ajax({
                type:"POST",
                dataType:"json",
                url:"/convention/order/option/submit",
                data:"p1="+p1+"&p2="+p2+"&p3="+p3+"&p4="+p4+"&p5="+p5+"&wd01="+wd01+"&wd02="+wd02+"&wd03="+wd03+"&wd04="+wd04+"&wd05="+wd05+"&wd06="+wd06,
                success:function(data){
                    if(data.status=='y'){
                        $("#box04").show();
                        $("#box01").hide();
                    }else{
                        alert(data.info);
                    }
                }

            });

        });
    });

</script>
<script>

    $("#login").click(function(){
        $("#box01").show();
        $("#box02").hide();
        $("#box03").hide();
        $("#box04").hide();
        $("#box05").hide();
    });
    $("#resiger").click(function(){
        $("#box03").show();
        $("#box02").hide();
        $("#box01").hide();
        $("#box04").hide();
        $("#box05").hide();
    });
//    $("#submit").click(function(){
//        $("#box04").show();
//        $("#box02").hide();
//        $("#box03").hide();
//        $("#box01").hide();
//        $("#box05").hide();
//    });

    $("#add").click(function(){
        $("#box05").show();
        $("#box02").hide();
        $("#box03").hide();
        $("#box01").hide();
        $("#box04").hide();
        $("#HBox").css("background","none");
        $("#HBox").css("padding","0");
    });


    $("#project-type").click(function(){
        $(".project").show();
        $(".if05").hide();
    });
    $(".select01").click(function(){
        $("#box02").show();
        $("#box01").hide();
    });
    $(".select02").click(function(){
        $("#box01").show();
        $("#box02").hide();
    });
</script>
<!--登录注册弹窗start-->





<script>
    $(".hot-product").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });
</script>

<script>
    $("body").css("background","#fff");
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
        <p><img src="<?php echo STYLE_URL;?>/style/no2/images/27.jpg" alt="" /></p>
        <div>
            <img src="<?php echo STYLE_URL;?>/style/no2/images/code.jpg" alt="" />
            <p>下载去展APP</p>
        </div>
    </ul>
</div>
<!--底部start-->