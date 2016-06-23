<?php
$webtitle = "2016最新国内外展览会行程|商务考察|商务旅游提供高效便捷服务".' - 去展网';
$webdescription = "2016年最新国内外展会行程，包含展会行程出发地点，展会出发时间和展会价格，提供全球展览会行程安排和展会信息查询";
?>
<?php include $this->Render('header_no2.php'); ?>
    <div class="line10"></div>

    <!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li><a href="##" title="">首页</a><span>&gt;</span><i>展会</i></li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->



    <div class="line10"></div>
    <!--地区start-->
    <div class="area">
        <ul class="clearfix">
            <!--左栏目start-->
            <li class="left fl">
                <div>
                    <b>欧洲</b>
                    <ul class="clearfix">
                        <?php foreach($this->delta_route['0'] as $k0 => $val_de){
                            if($k0 < 8){?>
                        <li>
                            <a href="##" target="_blank"><?php echo $val_de['name']?></a>
                        </li>
                        <?php }}?>
                    </ul>
                    <b>美洲</b>
                    <ul class="clearfix">
                        <?php
                        $i = 0;
                        foreach($this->delta_route['1'] as $k1 => $val_de){
                            if($i < 4){?>
                                <li>
                                    <a href="##" target="_blank"><?php echo $val_de['name']?></a>
                                </li>
                            <?php }
                        $i++;
                        }?>
                    </ul>
                    <b>亚洲</b>
                    <ul class="clearfix">
                        <?php
                        $i = 0;
                        foreach($this->delta_route['2'] as $k2 => $val_de){
                            if($i < 4){?>
                                <li>
                                    <a href="##" target="_blank"><?php echo $val_de['name']?></a>
                                </li>
                            <?php }
                        $i++;
                        }?>
                    </ul>
                    <b>非洲</b>
                    <ul class="clearfix">
                        <?php
                        $i = 0;
                        foreach($this->delta_route['3'] as $k3 => $val_de){
                            if($i < 4){?>
                                <li>
                                    <a href="##" target="_blank"><?php echo $val_de['name']?></a>
                                </li>
                            <?php }
                        $i++;
                        }?>
                        <li><a href="##" target="_blank">泰国</a></li>
                    </ul>
                    <b>大洋洲</b>
                    <ul class="clearfix">
                        <?php
                        $i = 0;
                        foreach($this->delta_route['4'] as $k4 => $val_de){
                            if($i < 4){?>
                                <li>
                                    <a href="##" target="_blank"><?php echo $val_de['name']?></a>
                                </li>
                            <?php }
                        $i++;
                        }?>
                    </ul>
                </div>
            </li>
            <!--左栏目end-->
            <!--右栏目start-->
            <li class="right fr">

                <div class="scroll-img">
                    <img src="<?php echo STYLE_URL;?>/style/no2/images/21.png" style="display:block; position:absolute; left:0; top:0; width:45px; height:45px; z-index:999;"/>
                    <a href="javascript:void(0)" class="btn btn-left"><img src="<?php echo STYLE_URL;?>/style/no2/images/7.png" alt="" /></a>
                    <a href="javascript:void(0)" class="btn btn-right"><img src="<?php echo STYLE_URL;?>/style/no2/images/8.png" alt="" /></a>
                    <div class="list-project list-project01" id="list-project01">
                        <ul class="clearfix">
                            <li class="m_l">
                                <div class="project01">
                                    <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                    <ul class="detial-total">
                                        <i>搭建价格</i>
                                        <b><em>9850.88元</em>起</b>
                                    </ul>
                                    <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                    <p>时间:2016-06-06至2016-06-08</p>
                                </div>
                            </li>
                            <li class="m_l">
                                <div class="project01">
                                    <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                    <ul class="detial-total">
                                        <i>搭建价格</i>
                                        <b><em>9850.88元</em>起</b>
                                    </ul>
                                    <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                    <p>时间:2016-06-06至2016-06-08</p>
                                </div>
                            </li>
                            <li class="m_l">
                                <div class="project01">
                                    <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                    <ul class="detial-total">
                                        <i>搭建价格</i>
                                        <b><em>9850.88元</em>起</b>
                                    </ul>
                                    <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                    <p>时间:2016-06-06至2016-06-08</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <script src="<?php echo STYLE_URL;?>/style/no2/js/scroll.js"></script>
                    <script>
                        var MyMar = null;
                        var SleepTime = 2000;
                        $(function () {
                            $("#list-project01").jCarouselLite02({
                                btnNext: ".btn-right",
                                btnPrev: ".btn-left",
                                visible:3,
                                speed: 1000,
                                scroll: 1
                            });
                            $("#list-project01").bind('mouseover', function (event) {
                                clearInterval(MyMar);
                            })
                                .bind('mouseout', function (event) {
                                    MyMar = setInterval(next02, SleepTime);

                                });
                        });
                        function next02() {
                            $(".btn-right").click();
                        }
                        MyMar = setInterval(next02, SleepTime);
                    </script>
                </div>

                <div class="line10"></div>
                <div><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/38.jpg" alt="" /></a></div>

            </li>
            <!--右栏目end-->
        </ul>
    </div>
    <!--地区end-->

    <div class="line10"></div>
    <!--热门start-->
    <div class="hot hot01">
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
    <!--国家start-->
    <div class="state">
        <h2>欧洲国家</h2>
        <ul class="clearfix">
            <!--左栏目start-->
            <li class="left fl">
                <div>
                    <ul class="clearfix">
                        <li><a href="##" target="_blank" class="current">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                    </ul>
                </div>
            </li>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="right fr">
                <div class="list-project list-project01" id="list-project02">
                    <ul class="clearfix">
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离启程时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>南非约翰内斯堡8天行程</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离展会开幕时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>韩国光大会展中心</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离展会开幕时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>韩国光大会展中心</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--国家end-->

    <div class="line10"></div>
    <!--国家start-->
    <div class="state">
        <h2>欧洲国家</h2>
        <ul class="clearfix">
            <!--左栏目start-->
            <li class="left fl">
                <div>
                    <ul class="clearfix">
                        <li><a href="##" target="_blank" class="current">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                    </ul>
                </div>
            </li>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="right fr">
                <div class="list-project list-project01" id="list-project02">
                    <ul class="clearfix">
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离启程时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>南非约翰内斯堡8天行程</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离展会开幕时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>韩国光大会展中心</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离展会开幕时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>韩国光大会展中心</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--国家end-->

    <div class="line10"></div>
    <!--国家start-->
    <div class="state">
        <h2>欧洲国家</h2>
        <ul class="clearfix">
            <!--左栏目start-->
            <li class="left fl">
                <div>
                    <ul class="clearfix">
                        <li><a href="##" target="_blank" class="current">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                        <li><a href="##" target="_blank">德国</a></li>
                        <li><a href="##" target="_blank">奥地利</a></li>
                    </ul>
                </div>
            </li>
            <!--左栏目end-->

            <!--右栏目start-->
            <li class="right fr">
                <div class="list-project list-project01" id="list-project02">
                    <ul class="clearfix">
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离启程时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>南非约翰内斯堡8天行程</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离展会开幕时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>韩国光大会展中心</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                        <li class="m_l">
                            <div class="project01">
                                <img src="<?php echo STYLE_URL;?>/style/no2/images/36.jpg" alt="" />
                                <ul class="detial-total">
                                    <i>搭建价格</i>
                                    <b><em>9850.88元</em>起</b>
                                </ul>
                                <h4><a href="##" target="_blank">泰国国际水处理化工及环保展</a></h4>
                                <p>时间:2016-06-06至2016-06-08</p>
                            </div>
                            <div class="project02">
                                <ul>
                                    <p>距离展会开幕时间</p>
                                    <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>
                                    <span>2016-06-06 至 2016-06-08 </span>
                                    <b>韩国光大会展中心</b>
                                    <span>服务包含：机票+酒店+餐饮</span>
                                    <div><a href="##" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <!--右栏目end-->

        </ul>
    </div>
    <!--国家end-->

    <div class="line10"></div>
    <div class="line10"></div>
    <div class="line10"></div>

    <!--加载更多start-->
<!--    <div class="more-project">-->
<!--        <a href="##" title="">正在加载...</a>-->
<!--    </div>-->
    <!--加载更多end-->

    <div class="line20"></div>
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
    $("#list-project02 ul li:last-child").css("margin-right","0");
    $(".project02 p em:nth-child(3n+1)").css("padding-left","0");
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
<?php include $this->Render('footer2.php'); ?>>