<?php include $this->Render('header_no2.php'); ?>
    <div class="line10"></div>

    <!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li><a href="/" title="">首页</a><span>&gt;</span><a href="##" title="">展会</a></li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>
    <!--热门start-->
    <div class="hot hot01" id="hot-position">
        <?php $industry = array_chunk($this->industry, 4, true);
        //echo count($industry);exit();
        ?>
            <ul class="clearfix">
                <?php foreach($industry as $k_ii => $v_i){?>
                <li>
                    <?php if($k_ii == 0 || $k_ii == 1 || $k_ii == 2){?>
                    <span>热门</span>
                    <?php }
                    else{
                    ?>
                    <span>行业</span>
                    <?php }?>
                    <?php foreach($v_i as $k_i_1 => $v_i_1){?>
                    <a href="##" target="_blank"><?php echo $v_i_1['name']?></a>
                    <?php }?>
                </li>
                <?php }?>
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
    foreach($this->data as $k => $v){
        //var_dump($v);exit();
        ?>
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
                            $i = count($v['All']) - 7;
                            $v['All'] = array_chunk($v['All'], $i, true);
                        }
                        foreach($v['All']['0'] as $key=> $vall){
                            if(strtotime($vall['start_time'])-time() < 0)
                                unset($v['All']['0'][$key]);
                        }
                        foreach($v['All']['0'] as $key=> $val){
                            $val['cover'] = unserialize($val['imgurl'])['0'];
                            ?>
                        <li>
                            <div class="spin-img">
                                <img src="<?php echo Common::AttachUrl($val['cover']);?>" style="max-height: 290px; max-width: 290px;" alt="<?php echo $val['name']?>" />
                                <ul>
                                    <p>距离展会开幕时间</p>
<!--                                    <p><i><em style="padding-left: 0px;">126</em>天<em>8</em>小时<em>32</em>分</i></p>-->
                                    <div data-type="order_expire_time" class="top_countdown">
                                        <p class="time" left_time_int="<?php echo strtotime($val['start_time'])-time();?>"></p>
                                    </div>
                                    <span><?php echo $val['start_time']?> 至 <?php echo $val['end_time']?> </span>
                                    <b><?php echo StringCode::GetCsubStr($val['name'],0,10);?></b>
                                    <div><a href="/convention/order/id/<?php echo $val['id'];?>" target="_blank">立即订购</a></div>
                                </ul>
                            </div>
                            <div class="spin-total">
                                <i>展会价格</i>
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
                        foreach($v['All']['1'] as $key1=> $val1){?>
                        <li><p><i>[展览]</i><a href="/convention/<?php echo date('Y/m/d', $val['update_dateline']).'/'.$val['id'];?>.shtml" target="_blank"><?php echo $val1['name']?></a></p></li>
                        <?php }?>
                    </ul>
                </div>

                <div class="spin-news-img">
                    <ul>
                        <?php
                        if(!empty($v['in_adv']['All']))
                        {
                            $i_adv_0 = 0;
                            foreach($v['in_adv']['All'] as $k_adv_0 => $v_adv_0){
                                if($v_adv_0['position'] == '0' && $i_adv_0 < 2){
                                    $i_adv_0++;
                                    ?>
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="<?php echo STYLE_URL;?>/style/no2/images/58.jpg" alt="" />
                                        </a>
                                    </li>
                                    <?php

                                }
                            }
                        }?>
                    </ul>
                </div>
            </li>
            <!--右栏目end-->
        </ul>
    </div>
        <div class="line10"></div>
        <!--广告位start-->
        <div>
            <?php

            if(!empty($v['in_adv']['All']))
            {
            $i_adv = 0;
            foreach($v['in_adv']['All'] as $k_adv => $v_adv){
                if($v_adv['position'] == '1' && $i_adv < 1){
                    $i_adv++;
                ?>
                <a href="<?php echo $v_adv['url'];?>" target="_blank"><img src="<?php echo $v_adv['file'];?>" alt="<?php echo $v_adv['title'];?>" title="<?php echo $v_adv['title'];?>" /></a>
            <?php
                }
            }
            }?>
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
    $(".hot-product").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });
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