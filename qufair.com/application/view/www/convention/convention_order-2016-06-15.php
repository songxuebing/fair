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
        <a href="#"><?php echo $this->data['con']['industry'];?></a>&gt;
        <a href="#"><?php echo $this->data['con']['name'];?></a>
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
            <dt><img src="<?php echo Common::AttachUrl($this->data['con']['cover']);?>!a200" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->data['con']['name'];?> </h3>
                <ul>
                    <li>举办时间：<i><?php echo date('Y-m-d',$this->data['detail']['start_time']);?>至<?php echo date('Y-m-d',$this->data['detail']['end_titme']);?></i></li>
                    <li>举办展馆：<?php echo $this->data['con']['pavilion'];?></li>
                    <li><?php echo $this->data['area']['area_name'];?>：<span><?php echo $this->data['area']['booth_no'];?></span></li>
                    <li>是否跟团：<span><?php echo $this->isGroup == 1 ? '是' : '否';?></span></li>
                    <li>展位类型：<span><?php echo $this->data['area']['booth_type'];?></span></li>
                    <li>开口概况：<span><?php echo $this->data['area']['opening'];?></span></li>
                    
                    <li>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->isGroup == '1' ? $this->data['area']['group_price'] : $this->data['area']['booth_price'];?></em></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>信息填写</h6>
        <em class="fr">请准确填写以下信息</em>
    </div>
	<!--<form action="/convention/order/" class="brand" method="post" id="postAddform" autocomplete="off">-->
    <form action="/convention/order/" method="post" name="order" class="AjaxForm order" id="postAddform" autocomplete="off">
    <div class="mm_gjwl_dingdan_ziliao">
        <ul class="clearfix">
            <li>
                <label>单位名称：</label>
                <input name="company_name" value="<?php echo $this->receiving['company_name'];?>" type="text">
                <em>*</em>
            </li>
            <li>
                <label>单位地址：</label>
                <input name="company_address" value="<?php echo $this->menberInfo['company_address'];?>" type="text">
                <em>*</em>
            </li>
            <li>
                <div>
                    <label>联&nbsp;系&nbsp;&nbsp;人：</label>
                    <input name="address_user_name" value="<?php echo $this->receiving['address_user_name'];?>" type="text">
                    <em>*</em>
                </div>
                <div>
                    <label>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</label>
                    <input name="address_mobile" value="<?php echo $this->receiving['address_mobile'];?>" type="text">
                    <em>*</em>
                </div>
            </li>
            <li>
                <div>
                    <label>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
                    <input name="address_tel" value="<?php echo $this->receiving['address_tel'];?>"  type="text">
                    <em>*</em>
                </div>
                <div>
                    <label>电子邮件：</label>
                    <input name="address_email" value="<?php echo $this->receiving['address_email'];?>" type="text">
                    <em>*</em>
                </div>
            </li>
            <li>
                <div>
                    <label>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真：</label>
                    <input name="fax" value="<?php echo $this->receiving['fax'];?>"  type="text">
                    <em>*</em>
                </div>
                <div>
                    <label>公司网址：</label>
                    <input name="website" type="text" value="<?php echo $this->receiving['website'];?>">
                </div>
            </li>
        </ul>
        <div class="mm_dizhi" style="display:none;">
            <a href="javascript:;" class="J-add">保存地址</a>
            <a href="#" style="display:none;">已有地址</a>
        </div>
    </div>

    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    
    <div class="mm_gjwl_dingdan_ziliao">
        <textarea name="remarks"></textarea>
    </div>
    <div class="mm_gjwl_tijiao">
        <span>总计费用：<em><?php echo $this->isGroup == '1' ? $this->data['area']['group_price'] : $this->data['area']['booth_price'];?></em>元</span>

        <input type="submit" name="Submit" class="J-botton" value="提交订单" >
        <input type="hidden" name="option" value="submit">
        <input type="hidden" name="id" value="<?php echo $this->data['detail']['detail_id'];?>">
        <input type="hidden" name="area_id" value="<?php echo $this->data['area']['area_id'];?>" >
        <input type="hidden" name="is_group" value="<?php echo $this->isGroup;?>" >
    </div>
    </form>
</div>



<?php include $this->Render('links_convention.php'); ?>
<script type="text/javascript">
jQuery(document).ready(function(e) {
  
	jQuery(".J-botton").on('click',function(){
		jQuery(".order").ajaxSubmit({
			dataType: "json",
			beforeSubmit:function(){
				jQuery("input[name='Submit']").attr({"disabled":true}).val('提交中…');
			},
			success:function(data){	
				console.log(data);	
				if(data.success){
					window.location.href='/convention/order/option/pay/sn/'+data.msg;
				}else{
					jQuery("input[name='Submit']").attr({"disabled":false}).val('提交订单');
				}
				
			}
		});
		return false;	
	});
});
</script>
<?php include $this->Render('footer.php'); ?>

