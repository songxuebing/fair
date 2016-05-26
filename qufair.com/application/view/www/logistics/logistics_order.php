<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<style type="text/css">
.mm_gjwl_tijiao input{ float: right; border:none; background:none; width: 160px; height: 52px; line-height: 52px; text-align: center; background: #fd4747; font-size: 18px; color: #fff;}
</style>

<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/logistics/index/">国际物流</a>&gt;
        <a href="/logistics/index/option/detai/id/<?php echo $this->data['log_id'];?>"><?php echo $this->data['log_title'];?></a>
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
            <dt><img src="<?php echo Common::AttachUrl($this->data['log_cover']);?>" width="160" height="160"></dt>
            <dd>
                <h3><?php echo $this->data['log_title'];?> </h3>
                <ul>
                    <li>&nbsp;</li>
                    <li>发货地址: <?php echo $this->data['log_location'];?></li>
                    <li>物流方式: <?php echo $this->data['log_freight'][$this->data['freight_txt']][$this->data['freight_txt'].'_txt'];?></li>
                    <li><span><em>￥<?php echo $this->data['log_price']?></em>/<?php echo $this->data['log_unit']?></span><span>共<i><?php echo $this->data['num']?></i><?php echo $this->data['log_unit']?></span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>信息填写</h6>
        <em class="fr">请准确填写以下信息</em>
    </div>
    <form action="/logistics/order/" method="post" name="order" class="AjaxForm order" autocomplete="off">
    <div class="mm_gjwl_dingdan_ziliao">
        <ul class="clearfix">
            <li>
                <label>单位名称：</label>
                <input name="company" value="<?php echo $this->menberInfo['company'];?>" type="text">
                <em>*</em>
            </li>
            <li>
                <label>单位地址：</label>
                <input name="address" value="<?php echo $this->menberInfo['address'];?>" type="text">
                <em>*</em>
            </li>
            <li>
                <label>物流商品：</label>
                <input name="goods" value="" type="text">
                <em>*</em>
            </li>
            <li>
                <div>
                    <label>联&nbsp;系&nbsp;&nbsp;人：</label>
                    <input name="username" value="<?php echo $this->menberInfo['truename'];?>" type="text">
                    <em>*</em>
                </div>
                <div>
                    <label>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</label>
                    <input name="mobile" value="<?php echo $this->menberInfo['telephone'];?>" type="text">
                    <em>*</em>
                </div>
            </li>
            <li>
                <div>
                    <label>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
                    <input name="tel" value="<?php echo $this->menberInfo['mobile'];?>" type="text">
                    <em>*</em>
                </div>
                <div>
                    <label>电子邮件：</label>
                    <input name="email" value="<?php echo $this->menberInfo['list']['email'];?>" type="text">
                    <em>*</em>
                </div>
            </li>
            <li>
                <div>
                    <label>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真：</label>
                    <input name="fax" value="<?php echo $this->menberInfo['fax'];?>" type="text">
                    <em>*</em>
                </div>
                <div>
                    <label>公司网址：</label>
                    <input name="company_website" value="" type="text">
                </div>
            </li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_gjwl_dingdan_ziliao">
        <textarea name="remarks"></textarea>
    </div>

    <div class="mm_gjwl_tijiao">
        <span>总计费用：<em data-price="<?php echo $this->data['total_price'];?>" class="J-total-price"><?php echo $this->data['total_price'];?></em>元</span>
        <span>含运费：<i><?php echo $this->data['yf_total_price'];?></i>元</span>
        <input type="submit" name="Submit" class="J-botton" value="提交订单" >
        <input type="hidden" name="option" value="submit">
    </div>
    <input type="hidden" name="id" value="<?php echo $this->data['log_id'];?>">
    <input type="hidden" name="freight_txt" value="<?php echo $this->data['freight_txt'];?>">
    <input type="hidden" name="num" value="<?php echo $this->data['num'];?>">
	</form>
</div>
<script type="text/javascript">
jQuery(function(){

	jQuery(".J-botton").on('click',function(){
		jQuery(".order").ajaxSubmit({
			dataType: "json",
			beforeSubmit:function(){
				jQuery("input[name='Submit']").attr({"disabled":true}).val('提交中…');
			},
			success:function(data){		
				if(data.success){
					window.location.href='/logistics/order/option/pay/sn/'+data.msg;
				}else{
					jQuery("input[name='Submit']").attr({"disabled":false}).val('提交订单');
				}
				
			}
		});
		return false;	
	});
	
});

</script>
<?php include $this->Render('links_logistics.php'); ?>
<?php include $this->Render('footer.php'); ?>
