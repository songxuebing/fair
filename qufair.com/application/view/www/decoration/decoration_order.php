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
        <a href="/decoration/index/">特装服务</a>&gt;
        <a href="/logistics/index/option/detai/id/<?php echo $this->data['id'];?>"><?php echo $this->data['title'];?></a>
    </div>
    <div class="mm_gjwl_dingdan_title" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan.png);">
        <ul>
            <li class="mm_gjwl_dingdan_color"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_tijiao02.png">提交订单</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_zhifu01.png">支付金额</li>
            <li><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_dingdan_wancheng01.png">支付成功</li>
        </ul>
    </div>

    <div class="mm_tezhuang_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->data['cover']);?>" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->data['title'];?> </h3>
                <p>面积大小：<span><?php echo $this->data['proportion'];?>平方</span></p>
                <?php
                	if(!empty($this->data['style_img'])) foreach($this->data['style_img'] as $k => $v){
						if($k == $this->data['style_number']){
				?>
                <p>装修风格：<img src="<?php echo Common::AttachUrl($v);?>" width="44" height="44"></p>
                <?php
						}
					}
				?>
                <p>价&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->data['de_price'];?></em><i>/套</i></p>
            </dd>
        </dl>
    </div>
    
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>信息填写</h6>
        <em class="fr">请准确填写以下信息</em>
    </div>
    <form action="/decoration/order/" method="post" name="order" class="AjaxForm order" autocomplete="off">
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
                <label>展会名称：</label>
                <input name="convention_name" value="" type="text">
                <em>*</em>
            </li>
            <li>
                <label>展馆名称：</label>
                <input name="pavilion_name" value="" type="text">
                <em>*</em>
            </li>
            <li>
                <label>展会时间：</label>
                <input name="convention_time" value="" type="text">
                <em>*</em>
            </li>
            <li>
                <label>展&nbsp;位&nbsp;&nbsp;号：</label>
                <input name="area_name" value="" type="text">
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
        <span>总计费用：<em><?php echo $this->data['de_price'];?></em>元</span>
        <input type="submit" name="Submit" class="J-botton" value="提交订单" >
        <input type="hidden" name="option" value="submit">
    </div>
    <input type="hidden" name="id" value="<?php echo $this->data['id'];?>">
    <input type="hidden" name="style_number" value="<?php echo $this->data['style_number'];?>">
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
					window.location.href='/decoration/order/option/pay/sn/'+data.msg;
				}else{
					jQuery("input[name='Submit']").attr({"disabled":false}).val('提交订单');
				}
				
			}
		});
		return false;	
	});
	
});

</script>
<?php include $this->Render('links_decoration.php'); ?>
<?php include $this->Render('footer.php'); ?>
