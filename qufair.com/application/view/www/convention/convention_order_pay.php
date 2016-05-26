<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<?php include $this->Render('nav.php'); ?>
<style type="text/css">
.mm_dizhi input{ display: inline-block; background:none; border:none; width: 110px; height: 44px; color: #fff; line-height: 44px; text-align: center; font-size: 16px; margin-left: 25px;}
.mm_dizhi input:first-child{ background: #ff900c;}

.mm_gjwl_tijiao input{ float: right; border:none; background:none; width: 160px; height: 52px; line-height: 52px; text-align: center; background: #fd4747; font-size: 18px; color: #fff;}
</style>
<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="#">首页</a>&gt;
        <a href="#"><?php echo $this->dataList['con']['industry'];?></a>&gt;
        <a href="#"><?php echo $this->dataList['con']['name'];?></a>
    </div>
    <div class="mm_gjwl_dingdan_title" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu.png);">
        <ul>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_tijiao01.png">提交订单</li>
            <li class="mm_gjwl_dingdan_color"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_zhifu02.png">支付金额</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_wancheng01.png">支付成功</li>
        </ul>
    </div>
    <div class="mm_tezhuang_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_img05.jpg" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->dataList['con']['name'];?> </h3>
                <ul>
                    <li>举办时间：<i><?php echo date('Y-m-d',$this->dataList['start_time']);?>至<?php echo date('Y-m-d',$this->dataList['end_titme']);?></i></li>
                    <li>举办展馆：<?php echo $this->dataList['con']['pavilion'];?></li>
                    <li><?php echo $this->dataList['area_name'];?>：<span><?php echo $this->dataList['booth_no'];?></span></li>
                    <li>是否跟团：<span><?php echo $this->dataList['is_group'] == 1 ? '是' : '否';?></span></li>
                    <li>展位类型：<span><?php echo $this->dataList['booth_type'];?></span></li>
                    <li>开口概况：<span><?php echo $this->dataList['opening'];?></span></li>
                    <li>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->dataList['order_price'];?></em></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>定展信息确认</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>单位名称: <?php echo $this->dataList['address']['company_name'];?></li>
            <li>单位地址: <?php echo $this->dataList['address']['company_address'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->dataList['address']['address_user_name'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->dataList['address']['address_mobile'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->dataList['address']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->dataList['address']['address_tel'];?></li>
            <li>电子邮件: <?php echo $this->dataList['address']['address_email'];?></li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>备注信息: <?php echo $this->dataList['note'];?></li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>选择支付方式</h6>
    </div>
    <form action="/convention/order/" method="post" autocomplete="off">
    <div class="mm_zhifufangshi">
        <ul class="clearfix">
            <li>
                <input name="pay_type" id="RadioGroup_3" checked="checked" value="lianlian"  type="radio">
                <label for="RadioGroup_3"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu03.jpg"></label>
            </li>
        </ul>
    </div>
    <div class="mm_gjwl_tijiao">
        <span>总计费用：<em><?php echo $this->dataList['order_price'];?></em>元</span>
        <ul class="clearfix">
            <li>
                <input name="pay" checked="checked" id="pay_1" type="radio"><label for="pay_1">全付</label>
            </li>
            <li style="display:none;">
                <input name="pay" id="pay_2" type="radio"><label for="pay_2">预付金</label>
            </li>
        </ul>
        <input type="hidden" name="option" value="step3" >
        <input type="hidden" name="orderid" value="<?php echo $this->dataList['order_id'];?>" >
        <input type="hidden" name="ordersn" value="<?php echo $this->dataList['order_sn'];?>" >
        <input type="submit" name="submit" value="确认支付" >
    </div>
    </form>
</div>

<style type="text/css">
.mm_gjwl_tijiao input{ float: right; border:none; background:none; width: 160px; height: 52px; line-height: 52px; text-align: center; background: #fd4747; font-size: 18px; color: #fff;}
</style>



<?php include $this->Render('links_convention.php'); ?>
<script type="text/javascript">
jQuery(document).ready(function(e) {
   jQuery(".nav p").click(function(){
        var ul=jQuery(".new");
        if(ul.css("display")=="none"){
            ul.slideDown();
        }else{
            ul.slideUp();
        }
    });
    
    jQuery(".set").click(function(){
        var _name = jQuery(this).attr("name");
        if( jQuery("[name="+_name+"]").length > 1 ){
            jQuery("[name="+_name+"]").removeClass("select");
            jQuery(this).addClass("select");
        } else {
            if( jQuery(this).hasClass("select") ){
                jQuery(this).removeClass("select");
            } else {
                jQuery(this).addClass("select");
            }
        }
    });
    
    jQuery(".nav li").click(function(){
        var li=jQuery(this).text();
        jQuery(".nav p").html(li);
        jQuery(".new").hide();
        /*$(".set").css({background:'none'});*/
        jQuery("p").removeClass("select") ;   
    });
	
	jQuery(".mm_dianji img").click(function(){
		jQuery(this).parents(".mm_zhanhui_list_xuanze").next().slideToggle();
	
	});
		
});

</script>
<?php include $this->Render('footer.php'); ?>

