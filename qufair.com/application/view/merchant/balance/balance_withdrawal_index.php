<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3>提现</h3>
        </div>
        <!-- 绑定银行卡 -->
        <div class="msm_tixing">
            <span>请输入提现金额</span>
        </div>
        <div class="msm_xinxi">
        	<form action="/balance/withdrawal/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" >
            <ul>
                <li>
                    <label>提现金额：</label>
                    <input name="money" placeholder="可提现金额：<?php echo $this->money;?>" type="text">
                    <span class="clearfix"></span>
                </li>
                <?php
                	if($this->bank['state'] == 1){
				?>
                <li>
                    <label>银行名称：</label>
                    <input value="<?php echo $this->bankSupp['bank_name'];?>" type="text" style="border:none; outline:none;" readonly>
                    <span class="clearfix"></span>
                </li>
                <li>
                    <label>收款单位：</label>
                    <input value="<?php echo $this->bankSupp['bank_comname'];?>" type="text" style="border:none; outline:none;" readonly>
                    <span class="clearfix"></span>
                </li>
                <li>
                    <label>银行卡号：</label>
                    <input value="<?php echo $this->bankSupp['bank_account'];?>" type="text" style="border:none; outline:none;" readonly>
                    <span class="clearfix"></span>
                </li>
                <li>
                    <label>真实姓名：</label>
                    <input value="<?php echo $this->bank['bank']['username'];?>" type="text" style="border:none; outline:none;" readonly>
                    <span class="clearfix"></span>
                </li>
                <li>
                    <label>身份证号：</label>
                    <input value="<?php echo $this->bank['bank']['id_card'];?>" type="text" style="border:none; outline:none;" readonly>
                    <span class="clearfix"></span>
                </li>
                <li style="text-align:right;"><a href="/balance/withdrawal/option/bank/">编辑银行信息</a></li>
                <?php
					}else{
				?>
                <li>
                    还没有绑定银行卡！<a href="/balance/withdrawal/option/bank/">现在绑定</a>
                    <span class="clearfix"></span>
                </li>
                <?php
					}
				?>
                
                <li>
                    <label>&nbsp;</label>
                    <input <?php echo $this->bank['state'] == 0 ? 'style="background:#666; border:none;" disabled' : '' ;?> type="submit" name="Submit" value="确定" class="msm_queren">
                </li>
            </ul>
            <input type="hidden" name="ajax" value="1">
            <input type="hidden" name="option" value="submit">
            <input type="hidden" name="yesfn" value="alert('申请成功');window.location.reload();">
            <input type="hidden" name="nofn" value="nofunction()">
            <input type="hidden" name="beforefn" value="beforefunction()">
            </form>
        </div>
    </div>
</div>
<!--底部-->
<script type="text/javascript">
jQuery(document).ready(function(){

});
function beforefunction(){
	jQuery("input[name='Submit']").val('保存中…');
}
function nofunction(){
	jQuery("input[name='Submit']").val('确定');
}
</script>
<?php include $this->Render('footer.php');die(); ?>