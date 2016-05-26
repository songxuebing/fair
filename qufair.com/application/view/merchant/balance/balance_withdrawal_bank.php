<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3>绑定银行卡</h3>
        </div>
        <!-- 绑定银行卡 -->
        <div class="msm_tixing">
            <span>请填写以下信息，用于提现</span>
        </div>
        <div class="msm_xinxi">
        	<form action="/balance/withdrawal/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" >
            <ul>
                
                <li>
                    <label>选择银行：</label>
                    <input value="<?php echo $this->bank['bank_name'];?>" readonly name="bank_name" type="text">
                    <span class="clearfix">请输入开户行银行名称</span>
                </li>
                <li>
                    <label>开户行地址：</label>
                    <input value="<?php echo $this->bank['bank_branch'];?>" readonly name="bank_address" type="text">
                    <span class="clearfix">请输入开户行地址</span>
                </li>
                <li>
                    <label>银行卡号：</label>
                    <input value="<?php echo $this->bank['bank_account'];?>" readonly name="bank_no" type="text">
                    <span class="clearfix">请输入正确的银行卡号</span>
                </li>
                <li>
                    <label>申请人姓名：</label>
                    <input value="" name="username" type="text">
                    <span class="clearfix">请输入申请人姓名</span>
                </li>
                <li>
                    <label>身份证号：</label>
                    <input value="" name="id_card" type="text">
                    <span class="clearfix">请输入申请人身份证号</span>
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input type="submit" name="Submit" value="确定" class="msm_queren">
                </li>
            </ul>
            <input type="hidden" name="ajax" value="1">
            <input type="hidden" name="option" value="edit">
            <input type="hidden" name="id" value="<?php echo $this->id;?>">
            <input type="hidden" name="yesfn" value="alert('保存成功');window.location.href = '/balance/withdrawal/';">
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