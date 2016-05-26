<?php include $this->Render('header.php'); ?>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>订单详情</h5>
        <a href="javascript:;" target="_blank">返回上一页</a>
    </div>
    
    <div class="mm_tezhuang_dingdan">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->decoration_order['cover']);?>!a200" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->decoration_order['detail']['title'];?> </h3>
                <p>面积大小：<span><?php echo $this->decoration_order['detail']['proportion'];?>平方</span></p>
                <p>装修风格：<img src="<?php echo Common::AttachUrl($this->decoration_order['de_style']['style_img']);?>!a200" width="44" height="44"></p>
                <p>价&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->decoration_order['price'];?></em><i>/平方</i></p>
            </dd>
        </dl>
    </div>

    <div class="mm_zhanhui_ping_title clearfix">
        <h6>订单详情</h6>
    </div>
    
    <div class="mm_zhanhui_zhifu clearfix">
        <ul class="fl">
            
            <li>单位名称: <?php echo $this->decoration_order['receiving']['company'];?></li>
            <li>单位地址: <?php echo $this->decoration_order['receiving']['address'];?></li>    
            <li>展会名称: <?php echo $this->decoration_order['receiving']['convention_name'];?></li>
            <li>展馆名称: <?php echo $this->decoration_order['receiving']['pavilion_name'];?></li>
            <li>展会时间: <?php echo $this->decoration_order['receiving']['convention_time'];?></li>
            <li>展&nbsp;位&nbsp;&nbsp;号: <?php echo $this->decoration_order['receiving']['area_name'];?></li>
            <li>联&nbsp;系&nbsp;&nbsp;人: <?php echo $this->decoration_order['receiving']['username'];?></li>
            <li>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话: <?php echo $this->decoration_order['receiving']['mobile'];?></li>
            <li>传&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真: <?php echo $this->decoration_order['receiving']['fax'];?></li>
            <li>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机: <?php echo $this->decoration_order['receiving']['tel'];?></li>
            <li>电子邮件: <?php echo $this->decoration_order['receiving']['email'];?></li>

        </ul>
        <dl class="fr">
            <dd><span>订单状态：</span><em><?php echo $this->order_row['status']['text'];?></em></dd>
            <dd><span>付款类型：</span><em>全付</em></dd>
            <dd><span>下单时间：</span><em><?php echo date('Y-m-d H:i:s',$this->decoration_order['datetime']);?></em></dd>
            <dd><span>付款时间：</span><em><?php echo date('Y-m-d H:i:s',$this->order_row['addtime']);?></em></dd>
            <dd><span>交易订单：</span><em><?php echo $this->order_row['order_sn'];?></em></dd>
        </dl>
        
    </div>
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>备注信息</h6>
    </div>
    <div class="mm_zhanhui_zhifu">
        <ul>
            <li>备注信息: <?php echo $this->decoration_order['remarks'];?></li>
        </ul>
    </div>
    <hr>
    <div class="mm_dingdan_tijiao">
        <span>总计费用：<em><?php echo $this->order_row['price'];?></em>元</span>
        <div class="fr" style="display:none;">
            <a href="#" class="mm_dingdan_qrsh">交易超时</a>
            <a href="/visa/order/option/pdf/id/<?php echo $this->route_order['id'];?>" class="mm_dingdan_qrsh" target="_blank">下载合同</a>
        </div>  
    </div>
    
</div>
<?php include $this->Render('footer.php'); ?>