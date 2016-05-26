<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<style type="text/css">
.mm_gjwl_tijiao input{ float: right; border:none; background:none; width: 160px; height: 52px; line-height: 52px; text-align: center; background: #fd4747; font-size: 18px; color: #fff;}
</style>

<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/route/index/">行程预定</a>&gt;
        <a href="/route/index/option/detai/id/<?php echo $this->data['id'];?>"><?php echo $this->data['name'];?></a>
    </div>
    <div class="mm_gjwl_dingdan_title" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan.png);">
        <ul>
            <li class="mm_gjwl_dingdan_color"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_tijiao02.png">提交订单</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_zhifu01.png">支付金额</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_wancheng01.png">支付成功</li>
        </ul>
    </div>
    <div class="mm_gjwl_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->data['cover']);?>!a200" width="160" height="160"></dt>
            <dd class="mm_xingcheng_dingdan">
                <h3><?php echo $this->data['name'];?> </h3>
                <ul>
                    <li>出发时间：<p><?php echo date('Y-m-d',$this->data['leave_time']);?> 至 <?php echo date('Y-m-d',$this->data['end_time']);?></p></li>
                    <li>赶往展馆: <?php echo $this->data['pavilion'];?></li>
                    <li>出发地点: <?php echo $this->data['leave_area'];?><div>酒店类型：<i><?php echo $this->data['hotel_star'];?>星级</i></div></li>
                    <li><span><em>￥<?php echo $this->data['price'];?></em>/人</span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>定展信息填写</h6>
        <em class="fr">请准确填写以下信息</em>
    </div>
	<form action="/route/order/" method="post" name="order" class="order" autocomplete="off">
    <div class="mm_gjwl_dingdan_ziliao">
        <ul class="clearfix">
            <li>
                <label>单位名称：</label>
                <input name="company_name" value="<?php echo $this->menberInfo['company'];?>" type="text" id="company_name">
                <em>*</em>
            </li>
            <li>
                <label>单位地址：</label>
                <input name="company_address" value="<?php echo $this->menberInfo['address'];?>" type="text" id="company_address">
                <em>*</em>
            </li>
            <li>
                <div>
                    <label>联&nbsp;系&nbsp;&nbsp;人：</label>
                    <input name="contacter" value="<?php echo $this->menberInfo['truename'];?>" type="text" id="contacter">
                    <em>*</em>
                </div>
                <div>
                    <label>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</label>
                    <input name="tel" type="text" value="<?php echo $this->menberInfo['telephone'];?>" id="tel">
                    <em>*</em>
                </div>
            </li>
            <li>
                <div>
                    <label>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
                    <input name="mobile" type="text" value="<?php echo $this->menberInfo['mobile'];?>" id="mobile">
                    <em>*</em>
                </div>
                <div>
                    <label>电子邮件：</label>
                    <input name="email" value="<?php echo $this->menberInfo['list']['email'];?>" type="text" id="email">
                    <em>*</em>
                </div>
            </li>
            <li>
                <div>
                    <label>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真：</label>
                    <input name="fax" value="<?php echo $this->menberInfo['fax'];?>" type="text" id="fax">
                    <em>*</em>
                </div>
                <div>
                    <label>公司网址：</label>
                    <input name="url" value="" type="text" id="url">
                </div>
            </li>
            <li>
                <div>
                    <label>行程人数：</label>
                    <input data-price="<?php echo $this->data['price'];?>" name="num" type="text" id="num">
                    <em>*</em>
                </div>
            </li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_gjwl_dingdan_ziliao">
        <textarea name="remarks" id="remarks"></textarea>
    </div>
    <div class="mm_gjwl_tijiao">
        <span>总计费用：<em class="J-total-price">0</em>元</span>
        <span>共计人数：<i class="J-count-number">0</i>人</span>
		<input type="submit" name="Submit" value="提交订单" class="J-botton">
    </div>
	<input type="hidden" name="id" value="<?php echo $this->data['id'];?>">
	<input type="hidden" name="option" value="submit">
	</form>
</div>
<script type="text/javascript">

jQuery(function(){
	jQuery("#num").on('blur',function(){
		var $this = jQuery(this),
			price = $this.data('price'),
			price = price * 1;
			
		var num = $this.val();
		var reg = /^[0-9]*$/;
		if(!reg.test(num)){
			num = 1;
		};

		num = num * 1;
		var total = price * num;
		jQuery(".J-total-price").html(total);
		jQuery(".J-count-number").html(num);
			
	});
	
	jQuery(".J-botton").on('click',function(){
		jQuery(".order").ajaxSubmit({
			dataType: "json",
			beforeSubmit:function(){
				jQuery("input[name='Submit']").val('提交中…');
			},
			success:function(data){				
				if(data.success==true){
					window.location.href='/route/order/option/pay/sn/'+data.msg;
				}else{
					artDialog(data.msg,'error','');
				}
				jQuery("input[name='Submit']").val('提交订单');
			}
		});	
		return false;
	});
});

</script>
<?php include $this->Render('links_route.php'); ?>
<?php include $this->Render('footer.php'); ?>
