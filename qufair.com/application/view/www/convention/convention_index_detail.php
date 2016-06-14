<?php
$webtitle = $this->data['info']['name'].' - 去展网'
?>
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
    <meta name="keywords" content="国际展览会|国外展览会|外贸展览会|国内展览会|行业展览会" />
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
            }
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
                <li>
                    <a href="/" title="">首页</a><span>&gt;</span>
                    <a href="/convention" title="">展会</a><span>&gt;</span>
                    <a href="##" title=""><?php echo $this->data['info']['industry'];?></a><span>&gt;</span>
                    <i><?php echo $this->data['info']['name'];?></i>
                </li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>

    <!--明细头部start-->
    <div class="detial-top">
        <ul class="detial-title">
            <h1 class="fl"><?php echo $this->data['info']['name'];?></h1>
            <div class="fr">
                <span>+分享</span>
                <a href="#" class="bds_more" data-cmd="more"></a>
                <div class="bdsharebuttonbox" style="display:inline-block; float:right; padding-top: 30px; padding-left: 5px;">
                    <a href="#" class="bds_more" data-cmd="more"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["tsina","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                </div>
            </div>
        </ul>

        <ul class="clearfix detial-con">
            <!--左栏目start-->
            <li class="detial-left fl">
                <div class="detial-scroll" id="demo04">
                    <ul class="slides">
                        <?php
                        if(!empty($this->data['info']['imgarr'])) foreach($this->data['info']['imgarr'] as $k => $v){

                        if(!empty($v)){
                        ?>
                        <li><div><a href="##" target="_blank"><img src="<?php echo Common::AttachUrl($v);?>" alt="" /></a></div></li>
                        <?php
                        }

                        }
                        ?>
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
                <p class="bt01">举办时间：<b><?php echo $this->data['info']['start_time'];?> 至 <?php echo $this->data['info']['end_time'];?></b></p>
                <p>行<em></em>业：<i><?php echo $this->data['info']['industry'];?></i></p>
                <p>国<em></em>家：<i><?php echo $this->data['info']['regional'];?>—<?php echo $this->data['info']['countries'];?>—<?php echo $this->data['info']['city'];?></i></p>
                <p>展馆名称：<i><?php echo $this->data['info']['pavilion'];?></i></p>
                <p>展会标签：<i><?php echo $this->data['info']['label'];?></i></p>
                <p>
                    <span>展馆面积：<i><?php echo $this->data['info']['area'];?></i></span>
                    <span>客商流量：<i><?php echo $this->data['info']['exhibitors_number'];?></i></span>
                    <span>展商数量：<i><?php echo $this->data['info']['audience_size'];?></i></span>
                </p>
                <div class="clearfix">
                    <span><em><?php echo $this->data['info']['price'];?>元</em>起</span>
                    <a href="##" title="">立即订展</a>
                    <a href="##" title=""><i>联系客服</i></a>
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
                    <a href="#1" class="current">展会介绍</a>
                    <a href="#2">主办单位</a>
                    <a href="#3">展品范围</a>
                    <a href="#4">上届回顾</a>
                    <a href="#5">相关资讯</a>
                </div>

                <!--展会介绍start-->
                <div class="detial-intro" id="1">
                    <ul>
                        <p>拉丁美洲电子消费品展（Latin American Consumer Electronics Expo）由Latin Auto Parts ExpoLLC主办，巴拿马是一个航空和海上交通枢纽的地区和无结的贸易区，是在西半球最大的自由贸易区。巴拿马为国际消费电子行业提供了一个独特的地理位置，你可以在这个展会上直接接触那些来自拉丁美洲和加勒比地区电子产品制造商，分销商和零售商，在这些地区你可以不断扩大你的市场。拉丁美洲消费电子博览会是一个B2B的展会，不向公众开放。拉丁美洲电子消费品展（Latin American Consumer Electronics Expo）由Latin Auto Parts ExpoLLC主办，巴拿马是一个航空和海上交通枢纽的地区和无结的贸易区，是在西半球最大的自由贸易区。</p>
                    </ul>
                </div>
                <!--展会介绍end-->

                <div class="line10"></div>
                <!--主办单位start-->
                <div class="detial-intro" id="2">
                    <h3>主办单位</h3>
                    <ul>
                        <p>中国对外贸易经济合作企业协会</p>
                        <p>中国健康产业发展联盟</p>
                        <p>亚洲有机产业发展促进会</p>
                    </ul>
                </div>
                <!--主办单位end-->

                <div class="line10"></div>
                <!--展品范围start-->
                <div class="detial-intro" id="3">
                    <h3>展品范围</h3>
                    <ul>
                        <p>1、消费类电子产品：液晶、卫星及数码电视、蓝牙产品、扬声器、耳机、音响、电子礼品、电子书、各种灯具、电子娱乐产品等；</p>
                        <p>2、 广播电视及配套设备；</p>
                        <p>3、 通讯产品及配件：移动电话、软件、硬件、智能通讯产品、卫星通讯技术等；</p>
                        <p>4、 电脑及周边产品；</p>
                        <p>5、汽车电子产品：导航产品、影音产品等相关产品；</p>
                        <p>6、相关电子元器件及电子材料：电源、电池、插座、元器件、组件、电线、电缆等；</p>
                        <p>7、PMA@CES(摄影器材)：数码相机、摄像机、专业非专业照相机、摄像机、摄录一体机、照相手机；软件洗印器材、激光照排，照片冲印设备、彩扩机、数码片夹、打印机、打印耗材、扫描仪等。件洗印器材、激光照排，照片冲印设备、彩扩机、数码片夹、打印机、打印耗材、扫描仪等。</p>
                    </ul>
                </div>
                <!--展品范围end-->

                <div class="line10"></div>
                <!--上届回顾start-->
                <div class="detial-intro" id="4">
                    <h3>上届回顾</h3>
                    <ul>
                        <p>1、消费类电子产品：液晶、卫星及数码电视、蓝牙产品、扬声器、耳机、音响、电子礼品、电子书、各种灯具、电子娱乐产品等；</p>
                        <p>2、 广播电视及配套设备；</p>
                        <p>3、 通讯产品及配件：移动电话、软件、硬件、智能通讯产品、卫星通讯技术等；</p>
                        <p>4、 电脑及周边产品；</p>
                        <p>5、汽车电子产品：导航产品、影音产品等相关产品；</p>
                        <p>6、相关电子元器件及电子材料：电源、电池、插座、元器件、组件、电线、电缆等；</p>
                        <p>7、PMA@CES(摄影器材)：数码相机、摄像机、专业非专业照相机、摄像机、摄录一体机、照相手机；软件洗印器材、激光照排，照片冲印设备、彩扩机、数码片夹、打印机、打印耗材、扫描仪等。件洗印器材、激光照排，照片冲印设备、彩扩机、数码片夹、打印机、打印耗材、扫描仪等。</p>
                    </ul>
                </div>
                <!--上届回顾end-->

                <div class="line10"></div>
                <!--相关阅读start-->
                <div class="read-link" id="5">
                    <ul class="read-title">
                        <h3>相关阅读</h3>
                    </ul>

                    <ul class="clearfix read-list">
                        <li>
                            <a href="##" target="_blank">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/46.jpg" alt="" />
                                <h4>2016虚拟现实大会巨头频发力，VR迎来爆发年</h4>
                            </a>
                        </li>
                        <li>
                            <a href="##" target="_blank">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/46.jpg" alt="" />
                                <h4>2016虚拟现实大会巨头频发力，VR迎来爆发年</h4>
                            </a>
                        </li>
                        <li>
                            <a href="##" target="_blank">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/46.jpg" alt="" />
                                <h4>2016虚拟现实大会巨头频发力，VR迎来爆发年</h4>
                            </a>
                        </li>
                        <li>
                            <a href="##" target="_blank">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/46.jpg" alt="" />
                                <h4>2016虚拟现实大会巨头频发力，VR迎来爆发年</h4>
                            </a>
                        </li>
                    </ul>

                </div>
                <!--相关阅读end-->

            </li>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="detial-info-right fr">
                <h3>相关展览会</h3>

                <div class="list-picture">
                    <ul>
                        <li>
                            <div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/48.jpg" alt="" /></a></div>
                            <div class="list-total">
                                <i>摊位特价</i>
                                <p><em>9850.88元</em>起</p>
                            </div>
                            <h4><a href="##" target="_blank">易展宝国内国外布展便携式特装</a></h4>
                        </li>
                        <li>
                            <div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/48.jpg" alt="" /></a></div>
                            <div class="list-total">
                                <i>摊位特价</i>
                                <p><em>9850.88元</em>起</p>
                            </div>
                            <h4><a href="##" target="_blank">易展宝国内国外布展便携式特装</a></h4>
                        </li>
                        <li>
                            <div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/48.jpg" alt="" /></a></div>
                            <div class="list-total">
                                <i>摊位特价</i>
                                <p><em>9850.88元</em>起</p>
                            </div>
                            <h4><a href="##" target="_blank">易展宝国内国外布展便携式特装</a></h4>
                        </li>
                    </ul>
                </div>

            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--明细内容end-->

    <div class="line20"></div>
    <div class="line20"></div>


</div>
<!--main end-->


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
