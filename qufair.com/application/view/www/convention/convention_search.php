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
    <div class="line10"></div>

    <!--展会头部start-->
    <div class="project-top">

        <!--当前位置start-->
        <div class="location">
            <ul>
                <li><a href="##" title="">首页</a><span>&gt;</span><i>展会</i></li>
            </ul>
        </div>
        <!--当前位置end-->

        <!--筛选内容start-->
        <div class="all-select">
            <ul>
                <span>全部内容 ></span>
                <a href="javascript:void(0)">纺织机械设备<img src="<?php echo STYLE_URL;?>/style/no2/images/19.png" alt="" /></a>
                <a href="javascript:void(0)">美洲<img src="<?php echo STYLE_URL;?>/style/no2/images/19.png" alt="" /></a>
                <a href="javascript:void(0)">丹麦<img src="<?php echo STYLE_URL;?>/style/no2/images/19.png" alt="" /></a>
                <em>收起筛选</em>
            </ul>
        </div>
        <!--筛选内容end-->

        <!--筛选条件start-->
        <div class="case">
            <ul class="list_product_con_nav">
                <li class="clearfix">
                    <span>选择行业：</span>
                    <a href="javascript:void(0)" class="all fl current">不限</a>
                    <div class="detial-case" id="detial-case01">
                        <ul class="clearfix">
                            <?php foreach($this->industry as $key => $val_in){?>
                                <li><a value="-1" title="<?php echo $val_in['name'];?>" href="javascript:void(0);">
                                        <span><?php echo $val_in['name'];?></span>
                                        <em></em></a>
                                </li>
                            <?php }?>
<!--                            <li><a href="##" title="">安防劳保公共</a></li>-->
<!--                            <li><a href="##" title="">酒店及旅游</a></li>-->
<!--                            <li><a href="##" title="">品饮料烟洋洲酒</a></li>-->
<!--                            <li><a href="##" title="">食品机械及包装</a></li>-->
<!--                            <li><a href="##" title="">纺织纺织机</a></li>-->
<!--                            <li><a href="##" title="">大牌云集</a></li>-->
<!--                            <li><a href="##" title="">旅游用品</a></li>-->
<!--                            <li><a href="##" title="">饮料烟酒洋洲</a></li>-->
<!--                            <li><a href="##" title="">机械及包装</a></li>-->
<!--                            <li><a href="##" title="">食品机械及包装</a></li>-->
                        </ul>
                    </div>
                </li>
                <li class="list_product_tpar" id="list_product_tpar01"><a href="javascript:void(0)">+</a></li>
            </ul>

            <ul class="list_product_con_nav">
                <li class="clearfix">
                    <span>选择洲际：</span>
                    <a href="javascript:void(0)" class="all fl current">不限</a>
                    <div class="detial-case" id="detial-case02">
                        <ul class="clearfix">
<!--                            <li><a href="##" title="">美洲</a></li>-->
<!--                            <li><a href="##" title="">亚洲</a></li>-->
<!--                            <li><a href="##" title="">非洲</a></li>-->
<!--                            <li><a href="##" title="">大洋洲</a></li>-->
<!--                            <li><a href="##" title="">北美洲</a></li>-->
<!--                            <li><a href="##" title="">南美洲</a></li>-->
                            <?php
                            foreach($this->delta as $k => $v){
                                ?>
                                <li><a value="-1" title="<?php echo $v['name'];?>" href="javascript:void(0);">
                                        <span><?php echo $v['name'];?></span>
                                        <em></em></a>
                                    </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <li class="list_product_tpar"  id="list_product_tpar02"><a href="javascript:void(0)">+</a></li>
            </ul>


            <ul class="list_product_con_nav">
                <li class="clearfix">
                    <span>选择国家：</span>
                    <a href="javascript:void(0)" class="all fl current">不限</a>
                    <div class="detial-case bt" id="detial-case03">
                        <ul class="clearfix">
<!--                            <li><a href="##" title="">丹麦</a></li>-->
<!--                            <li><a href="##" title="">韩国</a></li>-->
<!--                            <li><a href="##" title="">日本</a></li>-->
<!--                            <li><a href="##" title="">法国</a></li>-->
<!--                            <li><a href="##" title="">法国</a></li>-->
<!--                            <li><a href="##" title="">意大利</a></li>-->
<!--                            <li><a href="##" title="">丹麦</a></li>-->
<!--                            <li><a href="##" title="">韩国</a></li>-->
<!--                            <li><a href="##" title="">日本</a></li>-->
<!--                            <li><a href="##" title="">法国</a></li>-->
<!--                            <li><a href="##" title="">法国</a></li>-->
<!--                            <li><a href="##" title="">意大利</a></li>-->
                            <?php
                            if(!empty($this->country_all)) foreach($this->country_all as $k => $v){
                                ?>
                                    <?php
                                    foreach($v as $key => $val){
                                        ?>
                                        <li>
                                            <a value="-1" title="<?php echo $val['name'];?>" href="javascript:void(0);">
                                                <span><?php echo $val['name'];?></span>
                                                <em></em>
                                            </a>
                                        </li>
                                    <?php
                                    }}
                                    ?>

                        </ul>
                    </div>
                </li>
                <li class="list_product_tpar" id="list_product_tpar03"><a href="javascript:void(0)">+</a></li>
            </ul>


        </div>
        <!--筛选条件end-->

    </div>
    <!--展会头部end-->

    <div class="line9"></div>
    <!--排行start-->
    <div class="charts">
        <ul class="fl charts-tar fl">
            <a href="javascript:void(0)" class="current">综合排序</a>
            <a href="javascript:void(0)">热门</a>
            <a href="javascript:void(0)">价格</a>
        </ul>
        <ul class="charts-money fl">
            <input type="text" value="" placeholder="￥" />
            <span>-</span>
            <input type="text" value="" placeholder="￥"  />
        </ul>

<!--        <ul class="charts-page fr">-->
<!--            <a href="javascript:void(0)"><img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/17.png" alt="" /></a>-->
<!--            <span><i>2</i>/100</span>-->
<!--            <a href="javascript:void(0)"><img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/18.png" alt="" /></a>-->
<!--        </ul>-->
    </div>
    <!--排行end-->
    <script language="javascript" type="text/javascript">

        $(function() {
            //启用过期时钟
            order_expire_time();
        });

        //倒计时
        function counterClock(left_time) {
            var left_time = parseInt(left_time);
            var days_second = 86400; //每天时间
            var hours_second = days_second / 24;
            var minute_second = hours_second / 60;
            var str = '';
            if(left_time > 0 ) {
                var days = parseInt(left_time / days_second);
                str += (days > 0) ? '<em>'+ days + '</em>天' : '';
                var hours = parseInt((left_time - days * days_second) / hours_second);
                str += hours > 0 ? '<em>'+ hours + '</em>时' : '';
                var minutes = parseInt((left_time - days * days_second - hours_second * hours) / minute_second);
                str += minutes > 0 ? '<em>'+ minutes + '</em>分' : '';
                //second = left_time - days * days_second - hours_second * hours - minutes * minute_second;
                //str += second + '秒';
            }
            return str;
        }

        //订单过期时间
        function order_expire_time() {
            $('.spin div[data-type="order_expire_time"]').each(function() {
                var time_obj = $(this).find('.time');
                var left_time_int = time_obj.attr('left_time_int');
                if(left_time_int) {
                    var time_string = counterClock(left_time_int);
                    if(time_string == '') time_obj.html('&nbsp;已开展');
                    else {
                        time_obj.html(time_string);
                        time_obj.attr('left_time_int', left_time_int - 1);
                    }
                }
            });
            window.setTimeout(function() {
                order_expire_time();
            }, 1000);
        }
    </script>

    <!--展会列表start-->
    <div class="list-project spin">
        <ul class="clearfix">
            <?php
            if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
                if(strtotime($v['start_time'])-time() < 0)
                {
                    //break;
                }
                else{
            ?>
            <li>
                <div class="project01">
                    <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                    <ul class="detial-total">
                        <i>展会价格</i>
                        <b><em><?php echo $v['price']?>元</em>起</b>
                    </ul>
                    <h4><a href="/convention/<?php echo date('Y/m/d', $v['update_dateline']).'/'.$v['id'];?>.shtml" target="_blank"><?php echo $v['name'];?></a></h4>
                    <p>时间:<?php echo $v['start_time']?>至<?php echo $v['end_tome']?></p>
                </div>
                <div class="project02">
                    <ul>
                        <p>距离展会开幕时间</p>
<!--                        <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>-->
                        <div data-type="order_expire_time" class="top_countdown" style="padding-top: 0px;">
                            <p class="time" left_time_int="<?php echo strtotime($v['start_time'])-time();?>"></p>
                        </div>

                        <span>2016-06-06 至 2016-06-08 </span>
                        <b><?php echo StringCode::GetCsubStr($v['name'],0,10);?></b>
                        <div><a href="/convention/<?php echo date('Y/m/d', $v['update_dateline']).'/'.$v['id'];?>.shtml" target="_blank">立即订购</a></div>
                    </ul>
                </div>
            </li>
            <?php
            }}
            ?>

        </ul>

        <ul class="img-banner"><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/37.jpg" alt="" /></a></ul>


<style>
    /**分页样式**/
    .input_box_05{
        color:#4c6581;
        border:1px solid #b0b9ca;
        font-size:14px;
        height:22px;
        line-height:22px;
        background-repeat: repeat-x;
        background-position: left top; font-size:12px; padding:0 8px; margin-right:10px;
    }
    .display_box{
        display:none;
    }
    .pagination li{
        float:left;
        width:auto;
        margin-right:8px;
    }
    .pagination li a{
        border:1px solid #ccc;
        padding-top:2px;
        padding-bottom:2px;
        padding-left:8px;
        padding-right:8px;
        text-decoration:none;
    }
    .display_none{
        display:none;
    }
    .disabled a{
        cursor:default;
        color:#CC0000;
    }
    </style>
        <!--加载更多start-->
<!--        <ul class="more-project">-->
<!--            <a href="##" title="">正在加载...</a>-->
<!--        </ul>-->


    </div>
    <!--展会列表end-->
    <!-- 页码 -->
    <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
        <?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    </div>
    <!--加载更多end-->
    <div class="line20"></div>
</div>
<!--main end-->

<script>
    $(".list-project ul li:nth-child(4n+4)").css("margin-right","0");
    $(".project02 p em:nth-child(3n+1)").css("padding-left","0");

    $(".hot-product").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });

    $(".list-project ul li").hover(function(){
        $(this).addClass("on")
    },function(){
        $(this).removeClass("on");
    });


    var i=1;
    $(".all-select em").click(function(){
        $(".case").toggle();
        if(i==1){
            $(this).text("展开筛选");
            i=0;
        }else{
            $(this).text("收起筛选");
            i=1;
        }
    });


    var a=1;
    $("#list_product_tpar01").click(function(){
        if(a==1){
            $(this).find("a").text("-");
            $("#detial-case01 ul").animate({height:"160"},500);
            a=0;
        }else{
            $(this).find("a").text("+");
            $("#detial-case01 ul").animate({height:"40"},500);
            a=1;
        }
    });


    var b=1;
    $("#list_product_tpar02").click(function(){
        if(b==1){
            $(this).find("a").text("-");
            $("#detial-case02 ul").animate({height:"80"},500);
            b=0;
        }else{
            $(this).find("a").text("+");
            $("#detial-case02 ul").animate({height:"40"},500);
            b=1;
        }
    });

    var c=1;
    $("#list_product_tpar03").click(function(){
        if(c==1){
            $(this).find("a").text("-");
            $("#detial-case03 ul").animate({height:"1120"},500);
            c=0;
        }else{
            $(this).find("a").text("+");
            $("#detial-case03 ul").animate({height:"40"},500);
            c=1;
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
        <p><img src="<?php echo STYLE_URL;?>/style/no2/images/27.jpg" alt="" /></p>
        <div>
            <img src="<?php echo STYLE_URL;?>/style/no2/images/code.jpg" alt="" />
            <p>下载去展APP</p>
        </div>
    </ul>
</div>
<!--底部start-->
</body>
</html>