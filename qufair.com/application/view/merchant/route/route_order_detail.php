<?php include $this->Render('header.php'); ?>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>订单详情</h5>
    </div>
    <div class="mm_gjwl_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->route_order['goods_detail']['cover']);?>!a200" width="160" height="160"></dt>
            <dd class="mm_xingcheng_dingdan">
                <h3><?php echo $this->route_order['goods_name'];?> </h3>
                <ul>
                    <li>出发时间：<p><?php echo date('Y-m-d',$this->route_order['goods_detail']['leave_time']);?>至<?php echo date('Y-m-d',$this->route_order['goods_detail']['end_time']);?></p></li>
                    <li>赶往展馆: <?php echo $this->route_order['goods_detail']['pavilion'];?></li>
                    <li>出发地点: <?php echo $this->route_order['goods_detail']['leave_area'];?></li>
                    <li><span><em>￥<?php echo $this->route_order['price'];?></em>/人</span></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    <div class="mm_zhanhui_zhifu clearfix">
        <ul class="fl">
            <li>单位名称: <?php echo $this->route_order['receiving']['company_name'];?></li>
            <li>单位地址: <?php echo $this->route_order['receiving']['company_address'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->route_order['receiving']['contacter'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->route_order['receiving']['tel'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->route_order['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->route_order['receiving']['mobile'];?></li>
            <li>电子邮件:<?php echo $this->route_order['receiving']['email'];?></li>
        </ul>
        <dl class="fr">
            <dd><span>订单状态：</span><em><?php echo $this->order_row['is_pay'] == 1 ? '已支付' : '未支付';?></em></dd>
            <dd><span>付款类型：</span><em>全付</em></dd>
            <dd><span>下单时间：</span><em><?php echo date('Y-m-d H:i:s',$this->route_order['dateline']);?></em></dd>
            <dd><span>付款时间：</span><em><?php echo empty($this->route_order['pay_dateline']) ? '' : date('Y-m-d H:i:s',$this->route_order['pay_dateline']);?></em></dd>
            <dd><span>交易订单：</span><em><?php echo $this->route_order['order_sn'];?></em></dd>
        </dl>
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li><?php echo $this->route_order['remarks'];?></li>
        </ul>
    </div>
    <hr>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->order_row['price'];?></em>元</span>
        <span>行程人数：<?php echo $this->route_order['nums'];?>人</span>
        <div class="fr">
			<?php
				if($this->order_row['order_state'] == 1){
			?>
            <a href="/route/order/option/pdf/id/<?php echo $this->route_order['id'];?>" class="mm_dingdan_qrsh" target="_blank">下载合同</a>
			<?php
				}
			?>
        </div>  
    </div>
</div>
<?php include $this->Render('footer.php'); ?>