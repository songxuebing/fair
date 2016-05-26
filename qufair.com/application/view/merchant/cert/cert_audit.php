<?php include $this->Render('header.php'); ?>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3><?php echo $this->type_row['type_name'];?>认证</h3>
        </div>
        <div class="ms_right_liucheng">
            <ul class="clearfix" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_liucheng04.png)">
                <li>1&nbsp;同意协议</li>
                <li>2&nbsp;填写资料</li>
                <li><span style="color:#F00;">3&nbsp;免费入驻</span></li>
                <li class="mm_right_liucheng_hover">4&nbsp;等待审核</li>
                <li>5&nbsp;核对金额</li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>认证概况</h6>
        </div>
        <div class="ms_shenhe">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>服务类型</th>
                        <th>服务费</th>
                        <th>提交时间</th>
                        <th>审核状态</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						if(!empty($this->member_cert)){
							foreach($this->member_cert as $k=>$v){
					?>
                    <tr>
                        <td><?php echo $v['typerow']['type_name'];?></td>
                        <td><span><?php echo $v['typerow']['cost'];?>元</span></td>
                        <td><?php echo date('Y-m-d',$v['dateline']);?></td>
                        <td>
						<?php
							if($v['audit_state'] == 0){
								echo '<span>审核中</span>';
							}elseif($v['audit_state'] == 1){
								echo '<em>已通过</em>';
							}elseif($v['audit_state'] == 2){
								echo '<span>未通过</span>';
								echo empty($v['log']['remarks']) ? '' : '('.$v['log']['remarks'].')';
								echo '&nbsp;&nbsp;<a href="/cert/step/option/reauth/tpid/'.$v['type_id'].'">重新认证</a>';
							}
						?>
						</td>
                    </tr>
					<?php
							}
						}
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--底部-->
<?php include $this->Render('footer.php'); ?>