<!doctype html>
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