<?php include $this->Render('header.php'); ?>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>签证详情</h5>
        <a href="javascript:;" target="_blank">返回上一页</a>
    </div>
    <div class="mm_gjwl_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->visa_order['visa_cover']);?>!a200" width="160" height="160"></dt>
            <dd class="mm_xingcheng_dingdan">
                <h3><?php echo $this->visa_order['visa_name'];?></h3>
                <ul>
                    <li>签证领区：<?php echo $this->visa_order['visa_area'];?></li>
                    <li>签证类型: <?php echo $this->visa_order['visa_type'];?></li>
                    <li>产品类型: <?php echo $this->visa_order['pro_type'];?></li>
                    <li><span><em>￥<?php echo $this->visa_order['visa_price'];?></em>/人</span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    <?php
    	if(!empty($this->visa_member)) foreach($this->visa_member as $key => $val){
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
            <span>收货人姓名 : <?php echo $this->visa_order['receiving']['add_username'];?></span>
            <span>所在地区 : <?php echo $this->visa_order['receiving']['ship_province'].$this->visa_order['receiving']['ship_city'].$this->visa_order['receiving']['ship_area'].$this->visa_order['receiving']['add_address'];?></span>        
            <span>手机号码 : <?php echo $this->visa_order['receiving']['add_tel'];?></span>
            <span>电话号码 : <?php echo $this->visa_order['receiving']['add_mobile'];?></span> 
        </p>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>备注信息: <?php echo $this->visa_order['remarks'];?></li>
        </ul>
    </div>
    <hr>
    <div class="ms_qianzheng_dingdan">
        <ul class="clearfix">
            <li>订单状态：<em><?php echo $this->order_row['status']['text'];?></em></li>
            <li>下单时间：<?php echo date('Y-m-d H:i:s',$this->visa_order['datetime']);?></li>
            <li>付款类型：全付</li>
            <li>付款时间：<?php echo date('Y-m-d H:i:s',$this->order_row['addtime']);?></li>
            <li>交易订单：<?php echo $this->order_row['order_sn'];?></li>
        </ul>
    </div>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->order_row['price'];?></em>元</span>
        <span>签证人数：<?php echo $this->visa_order['num'];?>人</span>
        <span>付款类型：全付</span>
        <div class="fr" style="display:none;">
            <a href="#" class="mm_dingdan_qrsh">交易超时</a>
            <a href="/visa/order/option/pdf/id/<?php echo $this->route_order['id'];?>" class="mm_dingdan_qrsh" target="_blank">下载合同</a>
        </div>  
    </div>
</div>
<?php include $this->Render('footer.php'); ?>