<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3>展会供应商认证</h3>
        </div>
        <div class="mm_geren_jine clearfix">
            <dl class="mm_geren_mingcheng fl">
                <dt><img src="<?php echo Common::AttachUrl($this->menberInfo['avatar']);?>!a200" width="88" height="88"></dt>
                <dd>
                    <h6 style="font-size:16px; font-weight:bold;"><?php echo $this->menberInfo['username'];?></h6>
                    <p>认证信息：<span style="color:<?php echo $this->cert_count>0 ? '#ff4a00' : '#666';?>"><?php echo $this->cert_count>0 ? '已认证' : '未认证';?></span></p>
                </dd>
            </dl>
            <dl class="mm_geren_jin fr">
                <dt><img src="<?php echo STYLE_URL;?>/style/quzhan/images/mm_jine.png"></dt>
                <dd>
                    <h6>金额：<span>￥<?php echo $this->merchant['money'];?>元</span></h6>
                    <?php
                    	if($this->merchant['group'] == 4){
					?>
                    <a href="/balance/withdrawal/">我要提现</a>
                    <?php
						}
					?>
                </dd>
            </dl>
        </div>
        <!-- 物流推荐   展装推荐 -->
        <div>
            <div class="tab">
                <ul class="menu">
                    <li class="<?php echo $this->type == 'ye' ? 'active' : '';?>"><a href="/balance/index/?type=ye">余额明细</a></li>
                    <li class="<?php echo $this->type == 'tx' ? 'active' : '';?>"><a href="/balance/index/?type=tx">提现记录</a></li>
                </ul>
                <div class="con1">
                    <table class="table table-bordered">
                        <tbody>
                        	<?php
                            	if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
							?>
                            <tr>
                                <td><?php echo $v['title'];?></td>
                                <td><?php echo date('Y-m-d H:i',$v['addtime']);?></td>
                                <td></td>
                                <td><span>+<?php echo $v['price'];?></span></td>
                            </tr>
							<?php
								}
							?>
                        </tbody>
                    </table>
                </div>
                <div class="con2">
                    <table class="table table-bordered">
                        <tbody>
                            <?php
                            	if(!empty($this->data['All'])) foreach($this->data['All'] as $k => $v){
							?>
                            <tr>
                                <td><?php echo $v['withdrawal_name'];?></td>
                                <td><?php echo date('Y-m-d H:i',$v['add_time']);?></td>
                                <td><span><?php echo $v['actual_amount'];?></span></td>
                                <td><span><?php echo $v['win_state']['text'];?></span></td>
                            </tr>
                            <?php
								}
							?>          
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- 页码 -->
        <div style="width:100%; height:35px; margin-top:35px; text-align:right;">
			<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
        </div>
    </div>
</div>
<!--底部-->
<script type="text/javascript">
jQuery(document).ready(function(){

});
</script>
<?php include $this->Render('footer.php');die(); ?>