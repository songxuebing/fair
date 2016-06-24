<?php
$webtitle = $this->data['info']['name'].' - 去展网'
?>

<?php include $this->Render('header_no2.php'); ?>
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
                              if(!empty($this->data['info']['cover'])){
                            ?>
                                <li><div><a href="##">
                                <img src="<?php echo Common::AttachUrl($this->data['info']['cover']);?>" alt="<?php echo $this->data['info']['name'];?>" title="<?php echo $this->data['info']['name'];?>" /></a></div></li>
                            <?php }?>
                    <?php
                        if(!empty($this->data['info']['imgarr'])) foreach($this->data['info']['imgarr'] as $k => $v){

                        if(!empty($v)){
                        ?>
                        <li><div><a href="##" ><img src="<?php echo Common::AttachUrl($v);?>" alt="<?php echo $this->data['info']['name'];?>"  title="<?php echo $this->data['info']['name'];?>"/></a></div></li>
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
                    <span>展馆面积：<i><?php echo $this->data['info']['area'];?>平方</i></span>
                    <span>客商流量：<i><?php echo $this->data['info']['exhibitors_number'];?>人</i></span>
                    <span>展商数量：<i><?php echo $this->data['info']['audience_size'];?>家</i></span>
                </p>
                <div class="clearfix">
                    <span><em><?php echo $this->data['info']['price'];?>元</em>起</span>
                    <a href="/convention/order/id/<?php echo $this->data['info']['id'];?>" title="">立即订展</a>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=3238396027&site=qq&menu=yes" target="_blank" title=""><i>联系客服</i></a>
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
                        <p>
                            <?php
                            echo $this->data['info']['describe'];
                            ?>
                        </p>
                    </ul>
                </div>
                <!--展会介绍end-->

                <div class="line10"></div>
                <!--主办单位start-->
                <div class="detial-intro" id="2">
                    <h3>主办单位</h3>
                    <ul>
                        <p><?php echo $this->data['info']['organizer'];?></p>

                    </ul>
                </div>
                <!--主办单位end-->

                <div class="line10"></div>
                <!--展品范围start-->
                <div class="detial-intro" id="3">
                    <h3>展品范围</h3>
                    <ul>
                        <p>
                        <?php
                        echo $this->data['info']['scope'];
                        ?>
                        </p>
                    </ul>
                </div>
                <!--展品范围end-->

                <div class="line10"></div>
                <!--上届回顾start-->
                <div class="detial-intro" id="4">
                    <h3>上届回顾</h3>
                    <ul>
                        <p>
                            <?php
                            echo $this->data['info']['review'];
                            ?>
                        </p>
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
                        <?php if(!empty($this->new_all)) foreach($this->new_all as $k_new => $v_new){
                            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
                            preg_match_all($pattern,$v_new['content'],$match);
                            $v_new['cover'] = empty($match[1][0]) ? '' : $match[1][0];
                            ?>
                        <li>
                            <a href="/news/<?php echo date('Y/m/d', $v_new['dateline']).'/'.$v_new['id'].'.shtml';?>" target="_blank">
                                <img src="<?php echo empty($v_new['cover']) ? STYLE_URL.'/style/quzhan/images/20160202/test_01.png' :$v_new['cover'].'!a200';?>" alt="<?php echo $v_new['title']?>" title="<?php echo $v_new['title']?>" />
                                <h4><?php echo StringCode::GetCsubStr($v_new['title'],0,20);?></h4>
                            </a>
                        </li>
                        <?php }?>
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
                        <?php if(!empty($this->data_con['All'])) foreach($this->data_con['All'] as $key => $val_con){?>

                        <li>
                            <div><a href="/convention/<?php echo date('Y/m/d', $val_con['update_dateline']).'/'.$val_con['id'].'.shtml';?>">
                                    <img src="<?php echo Common::AttachUrl($val_con['imgarr_1']);?>" alt="<?php echo $val_con['name']?>" title="<?php echo $val_con['name']?>" style="max-height: 300px; max-width: 232px;" /></a></div>
                            <div class="list-total">
                                <i>摊位特价</i>
                                <p><em><?php echo $val_con['price']?>元</em>起</p>
                            </div>
                            <h4><a href="/convention/<?php echo date('Y/m/d', $val_con['update_dateline']).'/'.$val_con['id'].'.shtml';?>"><?php echo StringCode::GetCsubStr($val_con['name'],0,13);?></a></h4>
                        </li>
                        <?php }?>
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
                <?php
                if(!empty($this->link)) foreach($this->link as $k=>$v_link){
                    if($v['type'] == "1")
                    echo '<li><a href="'.$v_link['url'].'" target="_blank">'.$v['title'].'</a></li>';
                }
                ?>
            </ul>
        </div>
    </ul>
</div>
<!--友情链接end-->

<?php include $this->Render('footer2.php'); ?>
