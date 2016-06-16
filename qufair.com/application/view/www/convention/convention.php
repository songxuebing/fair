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
    <!--热门start-->
    <div class="hot hot01" id="hot-position">
        <ul class="clearfix">
            <li>
                <span>热门</span>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
            </li>
            <li>
                <span>热门</span>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
            </li>
            <li>
                <span>热门</span>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
            </li>
            <li>
                <span>热门</span>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
            </li>
            <li>
                <span>热门</span>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
            </li>
            <li>
                <span>热门</span>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
                <a href="##" target="_blank">样品超市</a>
            </li>
        </ul>
    </div>
    <!--热门end-->

    <div class="line10"></div>
    <!--订展流程start-->
    <div class="order-step">
        <ul class="fl">
            <b>订展流程</b>
            <p>轻松搞定,跨境参展</p>
        </ul>
        <ul class="fr">
            <li class="fl ico01"><p>搜索需求</p></li>
            <li class="fl ico02"><p>客服联系</p></li>
            <li class="fl ico03"><p>预订完成</p></li>
        </ul>
    </div>
    <!--订展流程end-->
    <div class="line10"></div>
    <!--纺织服饰start-->
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

    <?php
    if(!empty($this->data))
    foreach($this->data as $k => $v){?>
    <div class="spin" style="<?php if($k>0){?>border:none;<?php }?>">
        <ul class="clearfix">

            <!--左栏目start-->
            <li class="spin-left fl">
                <div class="spin-list">
                    <ul class="spin-title">
                        <h2 class="fl"><i>F<?php echo $k+1;?></i><?php echo $v['name']?></h2>
                        <p class="fr">
                            <a href="##" target="_blank">韩国</a>
                            <a href="##" target="_blank">德国</a>
                            <a href="##" target="_blank">法国</a>
                            <a href="##" target="_blank">英国</a>
                            <a href="##" target="_blank">澳大利亚</a>
                        </p>
                    </ul>

                    <ul class="spin-list-info">
                        <?php
                        if(!empty($v['All'])) {
                            $i = count($v['All']) - 3;
                            $v['All'] = array_chunk($v['All'], $i, true);
                        }
                        foreach($v['All']['1'] as $key=> $val){?>
                        <li>
                            <div class="spin-img">
                                <img src="<?php echo Common::AttachUrl($val['cover']);?>" style="max-height: 290px; max-width: 290px;" alt="" />
                                <ul>
                                    <p>距离展会开幕时间</p>
<!--                                    <p><i><em style="padding-left: 0px;">126</em>天<em>8</em>小时<em>32</em>分</i></p>-->
                                    <div data-type="order_expire_time" class="top_countdown">
                                        <p class="time" left_time_int="<?php echo strtotime($val['start_time'])-time();?>"></p>
                                    </div>
                                    <span><?php echo $val['start_time']?> 至 <?php echo $val['end_time']?> </span>
                                    <b><?php echo StringCode::GetCsubStr($val['name'],0,10);?></b>
                                    <div><a href="/convention/<?php echo date('Y/m/d', $val['update_dateline']).'/'.$val['id'];?>.shtml" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                            <div class="spin-total">
                                <i>搭建价格</i>
                                <b><em><?php echo $val['price']?>元</em>起</b>
                            </div>
                            <h4><a href="/convention/<?php echo date('Y/m/d', $val['update_dateline']).'/'.$val['id'];?>.shtml" target="_blank"><?php echo $val['name']?></a></h4>
                            <p>时间:<?php echo $val['start_time']?>至<?php echo $val['end_time']?></p>
                        </li>
                        <?php }?>

                    </ul>

                </div>
            </li>

            <!--左栏目end-->
            <!--右栏目start-->
            <li class="spin-right fr">
                <div class="spin-list-news">
                    <ul class="spin-title">
                        <h2>最近展会</h2>
                    </ul>
                    <ul class="img-con">
                        <?php
                        foreach($v['All']['0'] as $key1=> $val1){?>
                        <li><p><i>[展览]</i><a href="/convention/<?php echo date('Y/m/d', $val['update_dateline']).'/'.$val['id'];?>.shtml" target="_blank"><?php echo $val1['name']?></a></p></li>
                        <?php }?>
                    </ul>
                </div>

                <div class="spin-news-img">
                    <ul>
                        <li><a href="#" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/58.jpg" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/59.jpg" alt="" /></a></li>
                    </ul>
                </div>
            </li>
            <!--右栏目end-->
        </ul>
    </div>
        <div class="line10"></div>
        <!--广告位start-->
        <div>
            <a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/56.jpg" alt="" /></a>
        </div>
        <!--广告位end-->

        <div class="line10"></div>
    <?php }?>
    <!--纺织服饰end-->

    <div class="line10"></div>
    <div class="line20"></div>
    <div class="line20"></div>

</div>
<!--main end-->
<link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/1.css" rel="stylesheet" />
<script>
    $(".spin-img ul p em:nth-child(3n+1)").css("padding-left","0");
    $(".spin-list-info li:nth-child(3n+3)").css("margin-right","0");
</script>

<script>
    $(window).scroll(function(){
        if($(this).scrollTop()>341)
        {
            $("#hot-position").addClass("on");
        }
        else{
            $("#hot-position").removeClass("on");
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
                    if($v['type'] == "1")
                        echo '<li><a href="'.$v['url'].'" target="_blank">'.$v['title'].'</a></li>';
                }
                ?>
            </ul>
        </div>
    </ul>
</div>
<!--友情链接end-->


<?php include $this->Render('footer2.php');die();?>