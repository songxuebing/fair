<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<!-- 国际物流提交订单 -->
<div class="mm_mid">
    <div class="mm_zhanhui_fnav">
        <a href="/">首页</a>&gt;
        <a href="/convention/index/">展会</a>&gt;
        <a href="/convention/index/option/detai/id/<?php echo $this->data['id'];?>"><?php echo $this->data['con_name'];?></a>
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
            <dt><img src="<?php echo Common::AttachUrl($this->data['con_cover']);?>!a200" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->data['con_name'];?> </h3>
                <ul>
                    <li>举办时间：<i><?php echo date('Y-m-d',$this->data['detail']['con_detail']['start_time']);?>至<?php echo date('Y-m-d',$this->data['detail']['con_detail']['end_titme']);?></i></li>
                    <li>举办展馆：<?php echo $this->data['detail']['con_detail']['con_detail']['pavilion'];?></li>
                    <li><?php echo $this->data['detail']['con_detail']['detail_area']['area_name'];?>：<span><?php echo $this->data['detail']['con_detail']['detail_area']['booth_no'];?></span></li>
                    <li>是否跟团：<span><?php echo $this->data['is_group'] == 1 ? '是' : '否';?></span></li>
                    <li>展位类型：<span><?php echo $this->data['detail']['con_detail']['detail_area']['booth_type'];?></span></li>
                    <li>开口概况：<span><?php echo $this->data['detail']['con_detail']['detail_area']['opening'];?></span></li>
                    <li>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->data['money'];?></em></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>定展信息确认</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>单位名称: <?php echo $this->data['receiving']['company_name'];?></li>
            <li>单位地址: <?php echo $this->data['receiving']['company_address'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->data['receiving']['address_user_name'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->data['receiving']['address_mobile'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->data['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->data['receiving']['address_tel'];?></li>
            <li>电子邮件: <?php echo $this->data['receiving']['address_email'];?></li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>备注信息: <?php echo $this->data['remarks'];?></li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>选择支付方式</h6>
    </div>
	<form action="/pay/index/" method="post" name="pay" id="pay">
    <div class="mm_zhifufangshi">
    	<div class="tab" style="width:1100px;">
            <ul class="menu" style="margin-bottom:0;">
                <li class="active">企业网银</li>
                <li>官方担保交易</li>
            </ul>
            <div class="xm_con1">
                <ul class="clearfix">
                    <li>
                        <input type="radio" name="bankcode" id="CCBBTB" value="CCBBTB">
                        <label for="CCBBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/jianhang.jpg" alt="建设银行企业网银" width="132" height="40"></label>
                    </li>
                    <li>
                        <input type="radio" name="bankcode" id="ICBCBTB" value="ICBCBTB">
                        <label for="ICBCBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/gongshang.jpg" alt="工商银行企业网银" width="132" height="40"></label>
                    </li>
                    <li>
                        <input type="radio" name="bankcode" id="ABCBTB" value="ABCBTB">
                        <label for="ABCBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/nongye.jpg" alt="农业银行企业网银" width="132" height="40"></label>
                    </li>
                    <li>
                        <input type="radio" name="bankcode" id="SPDBBTB" value="SPDBBTB">
                        <label for="SPDBBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/pufa.jpg" alt="浦发银行企业网银" width="132" height="40"></label>
                    </li>
                    <li>
                        <input type="radio" name="bankcode" id="BOCBTB" value="BOCBTB">
                        <label for="BOCBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/zhongguo.jpg" alt="中国银行企业网银" width="132" height="40"></label>
                    </li>
                    <li>
                        <input type="radio" name="bankcode" id="CMBBTB" value="CMBBTB">
                        <label for="CMBBTB"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/zhaoshang.jpg" alt="招商银行企业网银" width="132" height="40"></label>
                    </li>
                </ul>
                <p>提示：需开通B2B电子交易支付功能</p>
            </div>
            <div class="xm_con2">
                <div class="J-quzhan-bank" style=" width:1100px; height:109px; overflow:hidden;">
                    <div style=" width:1100px; height:auto; overflow:hidden; float:left;">
                       
                        <dl class="dl">
                            <dd>收款企业：杭州去展网络科技有限公司</dd>
                            <dd>开户银行：中国银行杭州紫金港支行</dd>
                            <dd>收款帐号：401369494587</dd>
                        </dl>
                        <ul class="ul">
                            <li>
                                <input type="radio" name="bankcode" id="quzhan" value="quzhan">
                                <label for="quzhan"><img src="<?php echo STYLE_URL;?>/style/quzhan/images/quzhan.jpg" alt="去展担保" width="150" height="40"></label>
                            </li>
                            <li>
                                <p>如果没有开通B2B电子交易功能，可使用官方担保收款，即网银转账到左边提供的去展公司账户，然后到订单详情提交汇款凭证，公司将第一时间为您处理交易。</p>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <style type="text/css">
            .dl {
                float: left;
                padding-top:5px;
                border-right: 1px solid #d9d9d9;
                padding-right: 30px;
                margin-right: 40px;
            }
            .dl dd {
                font-size:16px; 
                color:#666; 
                font-family:'宋体'; 
                line-height:28px;
            }
            .ul input{
                width: 16px !important;
                height: 16px !important;
                margin-right: 4px !important;
            }
            .ul li{
                height: 40px;
                width: 600px !important;
            }
            .ul li label{
                display: inline-block;
                border: 1px solid #d9d9d9;
            }
            .menu li{
                border-top: 1px solid #d9d9d9;
                border-right: 1px solid #d9d9d9;
                margin-right: 0px !important;
            }
            .menu li:first-child{
                border-left: 1px solid #d9d9d9;
            }
            .tab ul.menu li.active{
                border-bottom: 1px solid #fff !important;
            }
            .xm_con2{
                display: none;
                border: 1px solid #d9d9d9;
                border-top: none;
                padding: 20px 20px 10px;
            }
            .xm_con1{
                border: 1px solid #d9d9d9;
                border-top: none;
                padding: 20px 20px 10px;
            }
            .xm_con1 ul li{
                width: 160px;
                margin-right: 15px;
            }
            .xm_con1 ul li label{
                display: inline-block;
                border: 1px solid #d9d9d9;
            }
            .xm_con1 ul li:last-child{
                margin-right: 0;
            }
            .xm_con1 ul li input{
                width: 16px;
                height: 16px;
                margin-right: 4px;
            }
            .xm_con1 p,.ul p{
                font-size: 12px;
                color: #999;
                font-family: "宋体";
                margin-top: 16px;
            }
        </style>
		<!--
        <ul class="clearfix">
            <li style=" display:none;">
                <input type="radio" name="pay_type" value="alipay" checked="checked">
                <img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_zhifu01.jpg">
            </li>

            <li>
				<input type="radio" name="bankcode" value="quzhan" checked="checked"> 去展网 - 担保收款
			<li>
            <li>
				<input type="radio" name="bankcode" value="CCBBTB"> 建设银行企业网银
			<li>
			<li>
				<input type="radio" name="bankcode" value="ICBCBTB"> 工商银行企业网银
			<li>
			<li>
				<input type="radio" name="bankcode" value="ABCBTB"> 农业银行企业网银
			<li>
			
			<li>
				<input type="radio" name="bankcode" value="SPDBBTB"> 浦发银行企业网银
			<li>
			<li>
				<input type="radio" name="bankcode" value="BOCBTB"> 中国银行企业网银
			<li>
			<li>
				<input type="radio" name="bankcode" value="CMBBTB"> 招商银行企业网银
			<li>
        </ul>
        <script type="text/javascript">
        	jQuery(document).ready(function(e) {
                jQuery('input[name="bankcode"]').on('change',function(){
					var $this = jQuery(this),
						v = $this.val();	
						
					if(v == 'quzhan'){
						jQuery(".J-quzhan-bank").show();	
					}else{
						jQuery(".J-quzhan-bank").hide();	
					}
				});
            });
        </script>
        <style type="text/css">
			.dl {
				padding-top:5px;
			}
        	.dl dd {
				font-size:17px; color:#000000; font-family:'新宋体'; line-height:32px;
			}
        </style>
        <div class="J-quzhan-bank" style=" width:1100px; height:109px; overflow:hidden; border:1px solid #d9d9d9; background-color:#f7f7f7;">
        	<div style=" width:600px; height:auto; overflow:hidden; float:left;">
            	<img style="float:left;" src="<?php echo STYLE_URL;?>/style/quzhan/images/ico_china_bank.jpg" />
                <dl class="dl">
                	<dd>收款企业：杭州去展网络科技有限公司</dd>
                    <dd>开户银行：中国银行杭州紫金港支行</dd>
                    <dd>收款帐号：401369494587</dd>
                </dl>
            </div>
            <img style="float:right;" src="<?php echo STYLE_URL;?>/style/quzhan/images/ico_goods.jpg" />
        </div>
        -->
    </div>
    <div class="mm_gjwl_tijiao">
    	<?php
        	if($this->orderState != 4){
		?>
        <span>总计费用：<em class="J-total-price"><?php echo $this->order_row['price'];?></em>元</span>
        <ul class="clearfix J-is-group-price">
            <li>
                <label data-price="<?php echo $this->order_row['price'];?>"><input value="quan" name="advance" type="radio" checked="checked">全付</label>
            </li>
            <?php if($this->data['detail']['con_detail']['detail_area']['advance_payment'] > 0){?>
            <li>
                <label data-price="<?php echo $this->data['detail']['con_detail']['detail_area']['advance_payment'];?>"><input value="yu" name="advance" type="radio">预付金</label>
            </li>
            <?php
			}
			?>
        </ul>
        <?php
			}else{
		?>
        <span>尾款费用：<em class="J-total-price"><?php echo $this->order_row['advance'];?></em>元</span>
        <?php
			}
		?>
        <a href="javascript:void(0);" onClick="do_submit();">确认支付</a>
    </div>
	<input type="hidden" name="sn" value="<?php echo $this->data['order_sn'];?>" />
    <input type="hidden" name="area_id" value="<?php echo $this->data['detail']['con_detail']['detail_area']['area_id'];?>" >
	</form>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(e) {
        jQuery(".J-is-group-price").on('click','label',function(){
			var $this = jQuery(this);
			
			var price = $this.data('price');	
			
			jQuery(".J-total-price").html(price);
		});
    });
	
	function do_submit(){
		jQuery("#pay").submit();
	}
</script>
<?php include $this->Render('links_convention.php'); ?>
<?php include $this->Render('footer.php'); ?>
