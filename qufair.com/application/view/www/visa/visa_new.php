<?php include $this->Render('header_no2.php'); ?>
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
    <div class="stroke-type" id="stroke-type">
        <ul>
            <a href="#1" title="" class="current"><?php echo $this->delta['0']?></a>
            <a href="#2" title=""><?php echo $this->delta['1']?></a>
            <a href="#3" title=""><?php echo $this->delta['2']?></a>
            <a href="#4" title=""><?php echo $this->delta['3']?></a>
            <a href="#5" title=""><?php echo $this->delta['4']?></a>
        </ul>
    </div>

    <div class="line9"></div>

        <?php foreach($this->data as $key => $val){?>

        <div class="stroke" id="<?php echo ($key+1);?>">
        <ul class="titles">
            <h2><i>F<?php echo ($key+1);?></i><?php echo $this->delta[$key]?>签证</h2>
        </ul>

        <ul class="stroke-list clearfix">
            <?php foreach($val as $k => $va){?>
            <li>
                <a href="/visa/<?php echo date('Y/m/d', $v['update_time']).'/'.$va['visa_id'];?>.shtml" target="_blank">
                    <div class="fl"><img src="<?php echo $va['visa_cover']?>" alt="<?php echo $va['visa_title']?>" width="110px" height="90px" /></div>
                    <div class="fr">
                        <b><?php echo $va['visa_countries']?></b>
                        <p><i>¥<?php echo $va['visa_price']?>起</i></p>
                    </div>
                </a>
            </li>
            <?php }?>
        </ul>
    </div>

    <div class="line10"></div>
    <div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/56.jpg" alt="" /></a></div>
    <div class="line10"></div>
    <?php }?>


    <div class="line20"></div>
    <div class="line20"></div>


</div>
<!--main end-->

<link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/7.css" rel="stylesheet" />
<script>
    $(".hot-product").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });
</script>
<script>
    $(".stroke-type ul a:last-child").css("border-right","none");
    $(".stroke-type ul a:last-child").css("width","242px");
    $(".stroke-list li:nth-child(4n+1)").css("margin-left","0");
</script>

<script>
    $(window).scroll(function(){
        if($(this).scrollTop()>345)
        {
            $("#stroke-type").addClass("on");
        }
        else{
            $("#stroke-type").removeClass("on");
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