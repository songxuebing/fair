<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<!-- 订单详情 -->
<div class="mm_dingdan_detail mm_mid">
    <div class="mm_zhanhui_ping_title clearfix">
        <h5>订单详情</h5>
        <a href="javascript:history.go(-1);">返回上一页</a>
    </div>
    <div class="mm_dingdan_xiangqing">
        <dl class="clearfix">
            <dt><img src="<?php echo Common::AttachUrl($this->data['con_cover']);?>" width="210" height="210"></dt>
            <dd>
                <h3><?php echo $this->data['con_name'];?> </h3>
                <ul>
                    <li>举办时间：<i><?php echo date('Y-m-d',$this->data['detail']['con_detail']['start_time']);?>至<?php echo date('Y-m-d',$this->data['detail']['con_detail']['end_titme']);?></i></li>
                    <li>举办展馆：<?php echo $this->data['detail']['con_detail']['con_detail']['pavilion'];?></li>
                    <li><?php echo $this->data['detail']['con_detail']['detail_area']['area_name'];?>：<span><?php echo $this->data['detail']['con_detail']['detail_area']['booth_no'];?></span></li>
                    <li>是否跟团：<span><?php echo $this->data['is_group'] == 1 ? '是' : '否' ;?></span></li>
                    <li>展位类型：<span><?php echo $this->data['detail']['con_detail']['detail_area']['booth_type'];?></span></li>
                    <li>开口概况：<span><?php echo $this->data['detail']['con_detail']['detail_area']['opening'];?></span></li>
                    <li>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：<em>￥<?php echo $this->order_row['price'];?></em></li>
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
        <dl class="fr">
            <dd><span>订单状态：</span><em><?php echo $this->order_row['status']['text'];?></em></dd>
            <dd><span>付款类型：</span><em>全付</em></dd>
            <dd><span>下单时间：</span><em><?php echo date('Y-m-d H:i:s',$this->data['datetime']);?></em></dd>
            <dd><span>付款时间：</span><em><?php echo date('Y-m-d H:i:s',$this->order_row['addtime']);?></em></dd>
            <dd><span>交易订单：</span><em><?php echo $this->order_row['order_sn'];?></em></dd>
        </dl>
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
        <span>总计费用：<em><?php echo $this->order_row['price'];?></em>元</span>
        <span>付款类型：全付</span>
        <div class="fr">
            <a href="<?php echo MEMBER_URL;?>/public/common/option/contract/sn/<?php echo $this->order_row['order_sn'];?>" class="mm_dingdan_qrsh" target="_blank">下载合同</a>
        </div>  
    </div>
    <!--
    <div class="mm_zhanhui_ping_title clearfix">
        <h6>商家备注信息</h6>
    </div>
    <div class="ms_zhanhui_queren">
        <textarea placeholder="请输入你要备份的信息"></textarea>
        <input type="button" value="确定保存">
    </div>
    -->
</div>
<?php include $this->Render('footer.php'); ?>
