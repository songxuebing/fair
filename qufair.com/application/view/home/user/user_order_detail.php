<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>订单详情</h5>
    </div>
    <?php
    	switch($this->type){
			case 'convention':
	?>
    <div class="mm_dingdan_xiangqing">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->data['con_cover']);?>!a200" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->data['con_name'];?> </h3>
                <ul>
                    <li>举办时间：<i><?php echo date('Y-m-d',$this->data['detail']['con_detail']['start_time']);?>至<?php echo date('Y-m-d',$this->data['detail']['con_detail']['end_titme']);?></i></li>
                    <li>举办展馆：<?php echo $this->data['detail']['con_detail']['con_detail']['pavilion'];?></li>
                    <li><?php echo $this->data['detail']['con_detail']['detail_area']['area_name'];?>：<span><?php echo $this->data['detail']['con_detail']['detail_area']['booth_no'];?></span></li>
                    <li>是否跟团：<span><?php echo $this->data['is_group'] == 1 ? '是' : '否' ;?></span></li>
                    <li>展位类型：<span><?php echo $this->data['detail']['con_detail']['detail_area']['booth_type'];?></span></li>
                    <li>开口概况：<span><?php echo $this->data['detail']['con_detail']['detail_area']['opening'];?></span></li>
                    <li>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->data['price'];?></em></li>
                    <?php
                    	if($this->data['advance'] > 0){
					?>
                    <li>预付金额：<em>￥<?php echo $this->data['advance'];?></em></li>
                    <?php
						}
					?>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    <div class="mm_zhanhui_zhifu clearfix">
        <ul class="fl">
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
            <li>单位名称: <?php echo $this->data['remarks'];?></li>
        </ul>
    </div>
    <hr>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->data['price'];?></em>元</span>
        <?php
        	if($this->data['advance'] > 0){
		?>
        <span>预付金额：<em><?php echo $this->data['advance'];?></em>元</span>
        <?php
			}
		?>
        <span>付款类型：<?php echo $this->data['order_state'] == 4 && $this->data['is_pay'] == 0 ? '预付款' : '全付' ;?></span>
    </div>
    <?php
    	break;
		case 'route':
	?>
    <div class="mm_gjwl_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->data['goods_detail']['cover']);?>!a200" width="160" height="160"></dt>
            <dd class="mm_xingcheng_dingdan" style="width:850px;">
                <h3><?php echo $this->data['goods_name'];?> </h3>
                <ul>
                    <li>出发时间：<p><?php echo date('Y-m-d',$this->data['goods_detail']['leave_time']);?>至<?php echo date('Y-m-d',$this->data['goods_detail']['end_time']);?></p></li>
                    <li>赶往展馆: <?php echo $this->data['goods_detail']['pavilion'];?></li>
                    <li>出发地点: <?php echo $this->data['goods_detail']['leave_area'];?></li>
                    <li><span><em>￥<?php echo $this->data['price'];?></em>/人</span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    <div class="mm_zhanhui_zhifu clearfix">
        <ul class="fl">
            <li>单位名称: <?php echo $this->data['receiving']['company_name'];?></li>
            <li>单位地址: <?php echo $this->data['receiving']['company_address'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->data['receiving']['contacter'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->data['receiving']['tel'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->data['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->data['receiving']['mobile'];?></li>
            <li>电子邮件:<?php echo $this->data['receiving']['email'];?></li>
        </ul>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li><?php echo $this->data['remarks'];?></li>
        </ul>
    </div>
    <hr>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->data['price'];?></em>元</span>
        <span>行程人数：<?php echo $this->data['nums'];?>人</span>
         
    </div>
    <?php
    	break;
		case 'visa':
	?>
    <div class="mm_gjwl_dingdan">
        <dl class="clearfix">
            <dt style="width:160px; float:left;"><img src="<?php echo Common::AttachUrl($this->data['visa_cover']);?>!a200" width="160" height="160"></dt>
            <dd style="width:820px;" class="mm_xingcheng_dingdan">
                <h3><?php echo $this->data['visa_name'];?></h3>
                <ul>
                    <li>签证领区：<?php echo $this->data['visa_area'];?></li>
                    <li>签证类型: <?php echo $this->data['visa_type'];?></li>
                    <li>产品类型: <?php echo $this->data['pro_type'];?></li>
                    <li><span><em>￥<?php echo $this->data['visa_price'];?></em>/人</span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    <?php
    	if(!empty($this->data['visa_member'])) foreach($this->data['visa_member'] as $key => $val){
	?>
    <div class="mm_gjqz_zhifu">
        <p>
            <em><?php echo($key + 1);?>,</em>
            <span>真实姓名 : <?php echo $val['username'];?></span>
            <span>证件类型 : (<?php echo $val['cert_type'];?>)<?php echo $val['cert_msg'];?></span>        
            <span>手机号码 : <?php echo $val['tel'];?></span> 
        </p>
    </div>
    <?php
		}
	?>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>收货地址确认</h6>
    </div>
    <div class="mm_gjqz_zhifu">
        <p>
            <span>收货人姓名 : <?php echo $this->data['receiving']['add_username'];?></span>
            <span>所在地区 : <?php echo $this->data['receiving']['ship_province'].$this->data['receiving']['ship_city'].$this->data['receiving']['ship_area'].$this->data['receiving']['add_address'];?></span>        
            <span>手机号码 : <?php echo $this->data['receiving']['add_tel'];?></span>
            <span>电话号码 : <?php echo $this->data['receiving']['add_mobile'];?></span> 
        </p>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>备注信息: <?php echo $this->data['remarks'];?></li>
        </ul>
    </div>
    <hr>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->data['visa_price'];?></em>元</span>
        <span>签证人数：<?php echo $this->data['num'];?>人</span>
        <span>付款类型：全付</span>

    </div>
    <?php
    	break;
		case 'logistics':
	?>
    <div class="mm_wuliu_dingdan" style="margin-top:20px;">
        <dl class="clearfix">
            <dt style="width:160px; float:left; margin-right:20px;"><img src="<?php echo Common::AttachUrl($this->data['log_detail']['log_cover']);?>!a200" width="160" height="160"></dt>
            <dd>
                <h3><?php echo $this->data['log_detail']['log_title'];?></h3>
                <p>发货地址：<?php echo $this->data['log_detail']['log_location'];?></p>
                <p>物流方式：<?php echo $this->data['log_detail']['log_freight'][$this->data['mode']][$this->data['mode'].'_txt'];?></p>
                <p><span><em style="color:#F00;">￥<?php echo $this->data['price'];?></em>/<?php echo $this->data['log_detail']['log_unit'];?></span>&nbsp;&nbsp;<span>共<i style="font-style:normal;"><?php echo $this->data['num'];?></i><?php echo $this->data['log_detail']['log_unit'];?></span></p>
            </dd>
        </dl>
    </div>

    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    
    <div class="mm_zhanhui_zhifu clearfix">
        <ul class="fl">
            <li>单位名称: <?php echo $this->data['receiving']['company'];?></li>
            <li>单位地址: <?php echo $this->data['receiving']['address'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->data['receiving']['username'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->data['receiving']['mobile'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->data['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->data['receiving']['tel'];?></li>
            <li>电子邮件: <?php echo $this->data['receiving']['email'];?></li>
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
    <hr>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->data['money'];?></em>元</span>
        <span>运费：<?php echo $this->data['price'] - $this->logistics_order['price'];?>/<?php echo $this->data['log_detail']['log_unit'];?></span>
        <span>物件大小：<?php echo $this->data['num'];?><?php echo $this->data['log_detail']['log_unit'];?></span> 
       
    </div>
    <?php
    	break;
		case 'decoration':
	?>
    <div class="mm_tezhuang_dingdan">
        <dl class="clearfix">
            <dt style="width:210px; float:left;"><img src="<?php echo Common::AttachUrl($this->data['cover']);?>!a200" width="210" height="210"></dt>
            <dd style="width:800px;">
                <h3><?php echo $this->data['detail']['title'];?> </h3>
                <p>面积大小：<span><?php echo $this->data['detail']['proportion'];?>平方</span></p>
                <p>装修风格：<img src="<?php echo Common::AttachUrl($this->data['de_style']['style_img']);?>!a200" width="44" height="44"></p>
                <p>价&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->data['price'];?></em><i>/平方</i></p>
            </dd>
        </dl>
    </div>

    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    
    <div class="mm_zhanhui_zhifu clearfix">
        <ul class="fl">
            
            <li>单位名称: <?php echo $this->data['receiving']['company'];?></li>
            <li>单位地址: <?php echo $this->data['receiving']['address'];?></li>    
            <li>展会名称: <?php echo $this->data['receiving']['convention_name'];?></li>
            <li>展馆名称: <?php echo $this->data['receiving']['pavilion_name'];?></li>
            <li>展会时间: <?php echo $this->data['receiving']['convention_time'];?></li>
            <li>展&nbsp;位&nbsp;&nbsp;号: <?php echo $this->data['receiving']['area_name'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->data['receiving']['username'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->data['receiving']['mobile'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->data['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->data['receiving']['tel'];?></li>
            <li>电子邮件: <?php echo $this->data['receiving']['email'];?></li>

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
    <hr>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->data['price'];?></em>元</span>
        
    </div>
    <?php
		}
	?>
    
    
</div>
<?php include $this->Render('footer.php'); ?>
