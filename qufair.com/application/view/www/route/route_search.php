<?php include $this->Render('header_no2.php'); ?>
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
    <!--展会头部start-->
    <div class="project-top">

        <!--筛选内容start-->
        <div class="all-select all-select01 J-tags">
            <ul>
                <span>全部内容 ></span>
                <?php
                if(!empty($this->data['attr'])) foreach($this->data['attr'] as $aKey => $aVal){
                    if(!empty($aVal)){
                        ?>
                        <a value="-1" title="<?php echo urldecode($aVal);?>" data-type="<?php echo $aKey;?>" href="javascript:void(0);">
                            <?php echo urldecode($aVal);?>
                            <img src="<?php echo STYLE_URL;?>/style/no2/images/19.png" alt="" />
                        </a>
                    <?php
                    }
                }
                ?>

                <em>收起筛选</em>
            </ul>
        </div>
        <!--筛选内容end-->

        <!--筛选条件start-->
        <div class="case">
            <ul class="list_product_con_nav">
                <li class="clearfix">
                    <span>选择洲际：</span>
                    <a href="javascript:void(0)" class="all fl current">不限</a>
                    <div class="detial-case" id="detial-case01">
                        <ul class="clearfix">
                            <?php
                            foreach($this->delta as $k => $v){
                                ?>
                                <li class="J-attr" data-type="delta">
                                    <a value="-1" title="<?php echo $v;?>" href="javascript:void(0);">
                                        <?php echo $v;?>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>


            <ul class="list_product_con_nav">
                <li class="clearfix">
                    <span>选择国家：</span>
                    <a href="javascript:void(0)" class="all fl current">不限</a>
                    <div class="detial-case bt" id="detial-case02">
                        <ul class="clearfix">
                            <?php
                            if(!empty($this->country_all)) foreach($this->country_all as $k => $v){
                                ?>
                                <?php
                                foreach($v as $key => $val){
                                    ?>
                                    <li class="J-attr" data-type="countries">
                                        <a value="-1" title="<?php echo $val['name'];?>" href="javascript:void(0);">
                                            <?php echo $val['name'];?>
                                        </a>
                                    </li>
                                <?php
                                }}
                            ?>

                        </ul>
                    </div>
                </li>
                <li class="list_product_tpar" id="list_product_tpar02"><a href="javascript:void(0)">+</a></li>
            </ul>


        </div>
        <input type="hidden" name="delta" value="" >
        <input type="hidden" name="countries" value="" >
        <input type="hidden" name="city" value="" >
        <!--筛选条件end-->
        <script type="text/javascript">
            jQuery(document).ready(function(e) {
                //选择属性
                jQuery(".J-attr").on('click','a',function(){
                    var $this = jQuery(this),
                        title = $this.attr('title'),
                        divObj = $this.parent('.J-attr'),
                        type = divObj.data('type');
                    //alert(type);
                    jQuery('input[name="'+type+'"]').val(title);

                    var delta = jQuery('input[name="delta"]').val();
                    var countries = jQuery('input[name="countries"]').val();
                    var city = jQuery('input[name="city"]').val();

                    window.location.href= '/route/search/?delta='+delta+'&countries='+countries+'';

                });

                //取消属性
                jQuery(".J-tags").on('click','a',function(){
                    var $this = jQuery(this),
                        title = $this.attr('title'),
                        type = $this.data('type');

                    jQuery('input[name="'+type+'"]').val('');

                    var delta = jQuery('input[name="delta"]').val();
                    var countries = jQuery('input[name="countries"]').val();
                    var city = jQuery('input[name="city"]').val();

                    window.location.href= '/route/search/?delta='+delta+'&countries='+countries+'';
                });
            });
        </script>

    </div>
    <!--展会头部end-->
    <div class="line10"></div>

    <!--排行start-->
<!--    <div class="charts">-->
<!--        <ul class="fl charts-tar fl">-->
<!--            <a href="javascript:void(0)" class="current">综合排序</a>-->
<!--            <a href="javascript:void(0)">热门</a>-->
<!--            <a href="javascript:void(0)">价格</a>-->
<!--        </ul>-->
<!--        <ul class="charts-money fl">-->
<!--            <input type="text" value="" placeholder="￥" />-->
<!--            <span>-</span>-->
<!--            <input type="text" value="" placeholder="￥"  />-->
<!--        </ul>-->
<!---->
<!--        <ul class="charts-page fr">-->
<!--            <a href="javascript:void(0)"><img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/17.png" alt="" /></a>-->
<!--            <span><i>2</i>/100</span>-->
<!--            <a href="javascript:void(0)"><img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/18.png" alt="" /></a>-->
<!--        </ul>-->
<!--    </div>-->
    <!--排行end-->
    <div class="line10"></div>

    <!--行程start-->
    <div class="stroke">
        <ul>
            <?php foreach($this->data['All'] as $key => $val_route){?>
            <li>
                <div class="fl"><a href="##" target="_blank"><img src="<?php echo STYLE_URL;?>/style/no2/images/85.jpg" alt="" height="200" width="350" /></a></div>
                <div class="fl con">
                    <h4>
                        <a href="/route/<?php echo date('Y/m/d', $val_route['update_time']).'/'.$val_route['id'];?>.shtml">
                            <?php echo $val_route['title'];?>
                        </a>
                    </h4>
                    <p>目的.地域：<i><?php echo $val_route['regional']?> <?php echo $val_route['countries']?></i></p>
                    <p>出发地点：<i><?php echo $val_route['departure']?></i></p>
                    <p>行程描述：<i style="font-size: 14px;"><?php echo $val_route['title_describe']?></i></p>
                </div>
                <div class="fr stroke-right">
                    <ul class="clearfix share">
                        <div class="fr">
                            <span>+分享</span>
                            <div class="bdsharebuttonbox" style="display:inline-block; float:right; padding-left: 5px; width:80px;">
                                <a href="#" class="bds_more" data-cmd="more"></a>
                                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["tsina","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                            </div>
                        </div>
                    </ul>
                    <ul><p><em><?php echo $val_route['price'];?>元/人</em>起</p></ul>
                    <ul class="clearfix">
                        <a href="##" title="" class="fr order-stroke">立即预订</a>
                    </ul>
                </div>
            </li>
            <?php }?>

        </ul>

        <!--加载更多start-->
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

    </div>
    <!--行程end-->



    <div class="line20"></div>
</div>
<!--main end-->


<link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/9.css" rel="stylesheet" />
<script>

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
            $("#detial-case01 ul").animate({height:"80"},500);
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
            $("#detial-case02 ul").animate({height:"200"},500);
            b=0;
        }else{
            $(this).find("a").text("+");
            $("#detial-case02 ul").animate({height:"40"},500);
            b=1;
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
                        if($v['type'] == "2")
                            echo '<li><a href="'.$v['url'].'" target="_blank">'.$v['title'].'</a></li>';
                        }
                ?>
            </ul>
        </div>
    </ul>
</div>
<!--友情链接end-->


<?php include $this->Render('footer2.php');die();?>