<?php include $this->Render('header_no2.php'); ?>
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
                    <p>时间:<?php echo $v['start_time']?>至<?php echo $v['end_time']?></p>
                </div>
                <div class="project02">
                    <ul>
                        <p>距离展会开幕时间</p>
<!--                        <p><em>126</em>天<em>8</em>小时<em>32</em>分</p>-->
                        <div data-type="order_expire_time" class="top_countdown" style="padding-top: 0px;">
                            <p class="time" left_time_int="<?php echo strtotime($v['start_time'])-time();?>"></p>
                        </div>

                        <span><?php echo $v['start_time']?> 至 <?php echo $v['end_time']?> </span>
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