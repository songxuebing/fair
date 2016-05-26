<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<style type="text/css">
.mm_gjwl_tijiao input{ float: right; border:none; background:none; width: 160px; height: 52px; line-height: 52px; text-align: center; background: #fd4747; font-size: 18px; color: #fff;}
</style>

<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/visa/index/">国际签证</a>&gt;
        <a href="/visa/index/option/detai/id/<?php echo $this->data['visa_id'];?>"><?php echo $this->data['visa_title'];?></a>
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
            <dt><img src="<?php echo Common::AttachUrl($this->data['visa_cover']);?>" width="160" height="160"></dt>
            <dd class="mm_xingcheng_dingdan">
                <h3><?php echo $this->data['visa_title'];?> </h3>
                <ul>
                    <li>签证领区：<?php echo $this->data['visa_area'];?></li>
                    <li>签证类型: <?php echo $this->data['visa_name'];?></li>
                    <li>产品类型: <?php echo $this->data['type_name'];?></li>
                    <li><span><em>￥<?php echo $this->data['visa_price'];?></em>/人 </span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>签证信息填写</h6>
        <em class="fr">请准确填写以下信息</em>
    </div>
    <form action="/visa/order/" method="post" name="order" class="order" autocomplete="off">
    <div class="mm_gjqz_dingdan">
        <div class="J-user-box">
        	<ul class="clearfix">
                <li>
                    <label>真实姓名：</label>
                    <input name="username[]" type="text">
                    <em>*</em>
                </li>
                <li>
                    <label>证件类型：</label>
                    <select name="cert_type[]">
                        <option value="护照">护照</option>
                        <option value="身份证">身份证</option>
                        <option value="户口簿">户口簿</option>
                    </select>
                    <input name="cert_msg[]" type="text">
                    <em>*</em>
                </li>
                <li>
                    <label>手机号码：</label>
                    <input name="tel[]" type="text">
                    <em>*</em>
                </li>
                <div class="mm_shanchu J-mm-shanchu"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_shanchu.png"></div>
            </ul>
        </div>
        
        <div class="mm_tianjia">
            <span class="J-mm-tianjia">新增出行人</span>
        </div>
        <input type="hidden" name="num" value="1">
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>收货地址填写</h6>
    </div>
    <div class="mm_gjqz_dingdan_dizhi">
        <div class="mm_gjqz_dingdan_dizhi1">
            <div class="mm_gjqz_dingdan_dizhi1_shouhuo fl">
                <label>收货人姓名：</label>
                <input name="add_username" type="text">
                <em>*</em>
            </div>
            <div class="mm_gjqz_dingdan_dizhi1_dizhi fl">
                <label>所在地区：</label>
                <select style="width:205px;" id="ship_province" name="ship_province"></select>&nbsp;
                <select style="width:205px;" id="ship_city" name="ship_city"></select>&nbsp;
                <select style="width:205px;" id="ship_area" name="ship_area"></select>&nbsp;
                <em>*</em>
            </div>
        </div>
        <div class="mm_gjqz_dingdan_dizhi2">
            <div class="mm_gjqz_dingdan_dizhi1_xxdz fl">
                <label>详&nbsp;细&nbsp;地&nbsp;址：</label>
                <input name="add_address" type="text">
                <em>*</em>
            </div>
            <div class="mm_gjqz_dingdan_dizhi1_youbian fl">
                <label>所在地区：</label>
                <input name="add_area" type="text">
                <em>*</em>
            </div>
        </div>
        <div class="mm_gjqz_dingdan_dizhi3">
            <div class="mm_gjqz_dingdan_dizhi1_shouhuo fl">
                <label>手&nbsp;机&nbsp;号&nbsp;码：</label>
                <input name="add_tel" type="text">
                <em>*</em>
            </div>
            <div class="mm_gjqz_dingdan_dizhi1_dianhua fl">
                <label>电话号码：</label>
                <input name="add_mobile_01" type="text">
                <i>—</i>
                <input name="add_mobile_02" type="text">
                <i>—</i>
                <input name="add_mobile_03" type="text">
            </div>
        </div>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_gjwl_dingdan_ziliao">
        <textarea name="add_remarks"></textarea>
    </div>
    <div class="mm_gjwl_tijiao">
        <span>总计费用：<em data-price="<?php echo $this->data['visa_price'];?>" class="J-total-price"><?php echo $this->data['visa_price'];?></em>元</span>
        <span>共计人数：<i class="J-totao-number">1</i>人</span>
        <input type="submit" name="Submit" class="J-botton" value="提交订单" >
        <input type="hidden" name="option" value="submit">
    </div>
    <input type="hidden" name="id" value="<?php echo $this->data['visa_id'];?>">
	</form>
</div>
<script type="text/javascript">
jQuery(function(){
	//增加签证信息
	jQuery(".J-mm-tianjia").on('click',function(){
		var html="";
			html+='<ul class="clearfix">';
			html+='	<li>';
			html+='		<label>真实姓名：</label>';
			html+='		<input name="username[]" type="text">';
			html+='		<em>*</em>';
			html+='	</li>';
			html+='	<li>';
			html+='		<label>证件类型：</label>';
			html+='		<select name="cert_type[]">';
			html+='			<option value="护照">护照</option>';
			html+='			<option value="身份证">身份证</option>';
			html+='			<option value="户口簿">户口簿</option>';
			html+='		</select>';
			html+='		<input name="cert_msg[]" type="text">';
			html+='		<em>*</em>';
			html+='	</li>';
			html+='	<li>';
			html+='		<label>手机号码：</label>';
			html+='		<input name="tel[]" type="text">';
			html+='		<em>*</em>';
			html+='	</li>';
			html+='	<div class="mm_shanchu J-mm-shanchu"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_shanchu.png"></div>';
			html+='</ul>';
			
		jQuery(".J-user-box").append(html);
		//计算人数
		var num = jQuery('input[name="num"]').val();
		num = num * 1;
		var reg = /^[0-9]*$/;
		if(!reg.test(num)){
			num = 1;
		};

		num += 1;
		jQuery('input[name="num"]').val(num);
		
		var price = jQuery('.J-total-price').data('price'),
			price = price * 1,
			total = price * num;
			
		jQuery('.J-total-price').html(total);
		jQuery('.J-totao-number').html(num);
		
	});
	//删除签证信息
	jQuery(".J-user-box").on('click','.J-mm-shanchu',function(){
		if(confirm('确定要删除吗？')){
			
			var len = jQuery(".J-user-box").find('.J-mm-shanchu').length;
			if(len > 1){
				jQuery(this).closest('ul').remove();
				//计算人数
				var num = jQuery('input[name="num"]').val();
				num = num * 1;
				var reg = /^[0-9]*$/;
				if(!reg.test(num)){
					num = 1;
				};
		
				num -= 1;
				jQuery('input[name="num"]').val(num);
				
				var price = jQuery('.J-total-price').data('price'),
					price = price * 1,
					total = price * num;
					
				jQuery('.J-total-price').html(total);
				jQuery('.J-totao-number').html(num);
			
			}else{
				alert('至少保留一个签证信息！');	
			}
		}
	});
	
	jQuery(".J-botton").on('click',function(){
		jQuery(".order").ajaxSubmit({
			dataType: "json",
			beforeSubmit:function(){
				jQuery("input[name='Submit']").val('提交中…');
			},
			success:function(data){		
				if(data.success){
					window.location.href='/visa/order/option/pay/sn/'+data.msg;
				}else{
					artDialog(data.msg,'error','');
					
				}
				jQuery("input[name='Submit']").val('提交订单');
				
			}
		});
		return false;	
	});
	
	
	addressInit('ship_province', 'ship_city', 'ship_area', '<?php echo empty($this->menberInfo['provinces']) ? '浙江省' : $this->menberInfo['provinces'];?>', '<?php echo empty($this->menberInfo['city']) ? '杭州市' : $this->menberInfo['city'];?>', '<?php echo empty($this->menberInfo['area']) ? '拱墅区' : $this->menberInfo['sarea'];?>'); 
});

</script>
<?php include $this->Render('links_visa.php'); ?>
<?php include $this->Render('footer.php'); ?>
