<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<?php include $this->Render('nav.php'); ?>
<style type="text/css">
	.clearfix .mm_yema li{
		display:inline;
	}
	.pagination-right{
		float:right;
	}
	.user-order-box { border-bottom:1px solid #e5e5e5; margin:10px 0; height:auto; overflow:hidden; }
	.user-order-box a{ float: left; width: 90px; height: 36px; border: 1px solid #e5e5e5; font-size: 14px; color: #333; line-height: 36px; text-align: center; border-radius: 3px; margin-right:10px;}
	.user-order-box a.on{ float: left; width: 90px; height: 36px; font-size: 14px; color: #fff; border:none; line-height: 36px; text-align: center; border-radius: 3px; background: #ff4660;}


</style>

<!-- 个人中心 -->
<div class="mm_mid">
    <?php include $this->Render('user_top.php'); ?>
    <div class="clearfix">
        <?php include $this->Render('user_left.php'); ?>
        
        <div class="mm_geren_right fr">
            <div class="mm_zhanhui_ping_title clearfix">
                <h6>去展担保收款，请填写付款证明，方便工作人员的审核处理。</h6>
            </div>
            <form action="/user/receipts/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
            <div class="mm_geren_ziliao">
                <ul class="clearfix">
                    <li>
                        <span>
						<font size="3" color=fc3c3c><b>
						    <p>收款单位：杭州去展网络科技有限公司
					        &nbsp;&nbsp;&nbsp;&nbsp;</p>
							<p>收款帐号：401369494587 </p>
							<p>开户银行：中国银行 / 杭州紫金港支行</p></b></font>
						</span>
                    </li><br><br><br><hr>
					<hr>
                    <li>
                        <span>付款明细：</span>
                        <div style="position:relative;">
                            <img src="<?php echo empty($this->data['cover']) ? STYLE_URL.'/style/quzhan/images/fkmx.png' : Common::AttachUrl($this->data['con_cover']);?>" width="300" height="90">
                            <input type="button" value="上传截图" class="mm_geren_input01">
                            <input type="file" class="J-imgfile" name="imgFile1" style="position:absolute; z-index:9; font-size:100px; top:0; right:0;  width:120px; height:63px; filter:alpha(opacity=0);-moz-opacity:0;opacity:0; " >
                            <input type="hidden" value="<?php echo $this->data['cover'];?>" name="cover" >
                        </div>
                    </li><br><br>
                    <li>
                        <span>付款单位：</span>
                        <div><input name="user_com" value="<?php echo $this->data['user_com'];?>" type="text"></div>
                    </li>
					<li>
                        <span>付款帐号：</span>
                        <div><input name="user_bank" value="<?php echo $this->data['user_bank'];?>" type="text"></div>
                    </li>
					<li>
                        <span >付款银行：</span>
                        <div>
                            <select name="bank_name" style="width:420px;">
                                <option <?php if($this->data['bank_name'] == '中国银行'){ echo 'selected="selected"';}?> value="中国银行"> 中国银行</option>
                                <option <?php if($this->data['bank_name'] == '工商银行'){ echo 'selected="selected"';}?> value="工商银行"> 工商银行</option>
								<option <?php if($this->data['bank_name'] == '农业银行'){ echo 'selected="selected"';}?> value="农业银行"> 农业银行</option>
								<option <?php if($this->data['bank_name'] == '建设银行'){ echo 'selected="selected"';}?> value="建设银行"> 建设银行</option>
								<option <?php if($this->data['bank_name'] == '交通银行'){ echo 'selected="selected"';}?> value="交通银行"> 交通银行</option>
								<option <?php if($this->data['bank_name'] == '招商银行'){ echo 'selected="selected"';}?> value="招商银行"> 招商银行</option>
								<option <?php if($this->data['bank_name'] == '平安银行'){ echo 'selected="selected"';}?> value="平安银行"> 平安银行</option>
								<option <?php if($this->data['bank_name'] == '民生银行'){ echo 'selected="selected"';}?> value="民生银行"> 民生银行</option>
								<option <?php if($this->data['bank_name'] == '邮政银行'){ echo 'selected="selected"';}?> value="邮政银行"> 邮政银行</option>
                                <option <?php if($this->data['bank_name'] == '泰隆银行'){ echo 'selected="selected"';}?> value="泰隆银行"> 泰隆银行</option>
                                <option <?php if($this->data['bank_name'] == '其它银行'){ echo 'selected="selected"';}?> value="其它银行"> 其它银行</option>
                            </select>
                        </div>
                    </li>
					 <li>
                        <span>付款金额：</span>
                        <div><input name="money" value="<?php echo $this->data['money'];?>" type="text" style="width:120px;" >元</div>
                    </li>
					<li>
                        <span>备注说明：</span>
                        <div><input name="remarks" value="<?php echo $this->data['remarks'];?>" type="text" placeholder=" 输入订单号 或 说明内容"></div>
                    </li>
                    <li>
                        <span></span>
                        
                        <div><input type="submit" name="Submit" value="立即提交" class="mm_geren_input02 J-submit"></div>
                        
                        <input type="hidden" name="ajax" value="1">
                        <input type="hidden" name="id" value="<?php echo $this->id;?>">
                        <input type="hidden" name="re_id" value="<?php echo $this->data['id'];?>">
                        <input type="hidden" name="filebox" value="">
                        <input type="hidden" name="option" value="submit">
                        <input type="hidden" name="yesfn" value="alert('添加成功'); window.location.href='/user/order/';">
                        <input type="hidden" name="nofn" value="nofunction()">
                        <input type="hidden" name="beforefn" value="beforefunction()">
                    </li>
                </ul>
            </div>
            </form>
        </div>
        
        
        
        
    </div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".J-imgfile").on('change',function(){
			var $this = jQuery(this);
			var $attach_path = '<?php echo ATTACH_IMAGE;?>';
			var dialog = art.dialog({
				title: '提示',
				content: '上传中，请稍候',
				fixed:true,
				lock:true,
				cancel:false,
				id:'upinfo'
			});
			//
			jQuery('input[name="option"]').val('uploadImg');
			jQuery('input[name="filebox"]').val($this.attr('name'));
			
			jQuery(".brand").ajaxSubmit({
				dataType: "json",
				beforeSubmit:function(){},
				success:function(data){
					jQuery("input[name=option]").val('submit');
					art.dialog({id:'upinfo'}).close();
					if(data.success==true){
						$this.siblings('input[type="hidden"]').val(data.msg);
						$this.siblings('img').attr("src",$attach_path + data.msg);
					}else{
						artDialog(data.msg,'error','');
					}
				}
			});
			
			
		});
		
		jQuery(".J-submit").on('click',function(){
			jQuery('input[name="option"]').val('submit');	
		});
		
	});
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('保存');
	}
</script>
<?php include $this->Render('footer.php'); ?>