<?php include $this->Render('header.php'); ?>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h4>账户认证</h4>
        </div>
        <div class="ms_renzheng">
            <ul>
				<?php
					if(!empty($this->data)) foreach($this->data as $v){
				?>
                <li>
                    <dl>
                        <dt><img src="<?php echo STYLE_URL.'/style/quzhan'.$v['type_icon'];?>"></dt>
                        <dd>
                            <h5><?php echo $v['type_name'];?>认证</h5>
							<?php
								if($this->member_cert[$v['code']]['cert']['cert_state'] == 0){
									$class = 'ms_renzheng_wei';
								}elseif($this->member_cert[$v['code']]['cert']['cert_state'] == 1){
									$class = 'ms_renzheng_shenhe';
								}else{
									$class = 'ms_renzheng_renzheng';
								}
							?>
                            <i class="<?php echo $class;?>"><?php echo $this->member_cert[$v['code']]['status']['cert_text'];?></i>
                        </dd>
                        <dd>
                            <p><?php echo $v['type_msg'];?></p>
                        </dd>
                    </dl>
					<?php
						if($this->member_cert[$v['code']]['cert']['cert_state'] == 0){
							
					?>
					<a href="/cert/index/option/agreement/id/<?php echo $v['type_id'];?>" class="ms_renzheng_liji">立即认证</a>
					<?php
						}elseif($this->member_cert[$v['code']]['cert']['cert_state'] == 1){
							if($this->member_cert[$v['code']]['cert']['audit_state'] == 1 && $this->member_cert[$v['code']]['cert']['money_check'] == 1){
					?>
					<a href="/cert/step/option/checkmoney/tpid/<?php echo $v['type_id'];?>" class="ms_renzheng_hedui">核对金额</a>
					<?php
							}else{
					?>
					<a href="/cert/step/option/audit/tpid/<?php echo $v['type_id'];?>" class="ms_renzheng_jindu">查看进度</a>
					<?php
							}
						}
					?>
                    
                </li>
				<?php
					}
				?>
            </ul>
        </div>
    </div>
</div>
<!--底部-->
<?php include $this->Render('footer.php'); ?>