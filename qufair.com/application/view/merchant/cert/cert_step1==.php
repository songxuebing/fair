<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
	<form action="/cert/step/" method="post" name="company" enctype="multipart/form-data" class="AjaxForm company" autocomplete="off">
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3><?php echo $this->type_row['type_name'];?>认证</h3>
        </div>
        <div class="ms_right_liucheng">
            <ul class="clearfix" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_liucheng02.png)">
                <li>1&nbsp;同意协议</li>
                <li class="mm_right_liucheng_hover">2&nbsp;填写资料</li>
                <li>3&nbsp;支付费用</li>
                <li>4&nbsp;等待审核</li>
                <li>5&nbsp;核对金额</li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>企业基本资料</h6>
        </div>
        <div class="ms_rz_ziliao">
            <ul>
                <li>
                    <div class="clearfix">
                        <label>企业全称</label>
                        <input name="company_name" type="text" maxlength="50" placeholder="杭州米凡国际科技信息技术有限公司" value="<?php echo $this->data['company_name'];?>" <?php echo !empty($this->data['company_name']) ? 'readonly="readonly"' : '';?>>
                    </div> 
                    <p>企业名称为注册时填写的主体信息且无法修改。</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>企业法人代表</label>
                        <input type="text" name="company_owner" maxlength="10" placeholder="大文" value="<?php echo $this->data['company_owner'];?>">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>法人身份证号</label>
                        <input type="text" placeholder="3412551987552233535235" maxlength="18" name="owner_cardno" value="<?php echo $this->data['owner_cardno'];?>">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>法人手机号码</label>
                        <input type="text" placeholder="13061129788" maxlength="11" name="owner_mobile" value="<?php echo $this->data['owner_mobile'];?>">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>企业服务</label>
                        <input type="text" placeholder="展会搭建、物流运输" maxlength="50" name="company_service" value="<?php echo $this->data['company_service'];?>">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>企业电话</label>
                        <input type="text" placeholder="0571-6668888" maxlength="20" name="company_tel" value="<?php echo $this->data['company_tel'];?>">
                    </div> 
                    <p>包括区号、电话、分机号，以“-”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>营业执照号</label>
                        <input type="text" placeholder="325586984557988" maxlength="30" name="company_lice" value="<?php echo $this->data['company_license'];?>">
                    </div> 
                    <p>请填写工商营业执照上的注册号</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>组织机构代码</label>
                        <input type="text" placeholder="32558698 - C" maxlength="30" name="company_orgcode" value="<?php echo $this->data['company_orgcode'];?>">
                    </div> 
                    <p>请填写组织机构代码证上的代码</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>税务登记证号</label>
                        <input type="text" placeholder="32558698 - C" maxlength="30" name="company_regcert" value="<?php echo $this->data['company_regcert'];?>">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>企业详细地址</label>
                        <input type="text" placeholder="32558698 - C" maxlength="50" name="company_address" value="<?php echo $this->data['company_address'];?>">
                    </div> 
                </li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>企业收款账户</h6>
        </div>
		<div class="ms_rz_ziliao">
			<ul>
                <li>
                    <div class="clearfix">
                        <label>企业开户名称</label>
                        <input type="text" placeholder="杭州米凡国际科技信息技术有限公司" maxlength="30" name="bank_comname" value="<?php echo $this->data['bank_comname'];?>">
                    </div> 
                    <p>需跟组织机构代码证上的机构名称保持一致(基本户、一般户均可)。</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>企业银行账号</label>
                        <input type="text" placeholder="62220212020030256587" maxlength="30" name="bank_account" value="<?php echo $this->data['bank_account'];?>">
                    </div>
					<p>我们会给该对公账号汇入一笔非常小的金额和备注信息，需要你后续跟审核人员确认。</p> 
                </li>
				<li>
                    <div class="clearfix">
                        <label>企业开户银行</label>
                        <input type="text" placeholder="杭州银行" maxlength="50" name="bank_name" value="<?php echo $this->data['bank_name'];?>">
                    </div> 
                </li>
				<li>
                    <div class="clearfix">
                        <label>开户银行地址</label>
                        <input type="text" placeholder="杭州银行钱江支行" maxlength="50" name="bank_branch" value="<?php echo $this->data['bank_branch'];?>">
                    </div> 
                </li>
			</ul>
		</div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>运营者资料</h6>
        </div>
        <div class="ms_rz_ziliao">
            <ul>
                <li>
                    <div class="clearfix">
                        <label>运营者姓名</label>
                        <input type="text" placeholder="大文" maxlength="10" name="operate_name" value="<?php echo $this->data['operate_name'];?>">
                    </div> 
                    <p>与申请公函上的运营者一致，认证审核过程将与该运营者联系。</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>运营者部门职位</label>
                        <input type="text" placeholder="总经理" maxlength="20" name="operate_position" value="<?php echo $this->data['operate_position'];?>">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>运营者手机号码</label>
                        <input type="text" placeholder="13061129788" maxlength="11" name="operate_mobile" value="<?php echo $this->data['operate_mobile'];?>">
                    </div> 
                    <p>请填写运营者的手机号码，认证审核过程将与该运营者联系。</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>运营者短信验证</label>
                        <input type="text" placeholder="829788" style="width:380px;" maxlength="6" name="operate_code">
                        <i><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_dui1.png"></i>
						<input type="button" onclick="sendMessage();" id="getcode" value="获取验证码" style="width:120px; margin-left:20px; background:#f8f8f8; color:#666; padding:0;">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>运营者电话</label>
                        <input type="text" placeholder="0571-6668888" maxlength="20" name="operate_tel" value="<?php echo $this->data['operate_tel'];?>">
                    </div> 
                    <p>包括区号、电话、分机号，以“-”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>运营者电子邮箱</label>
                        <input type="text" placeholder="66532324521@163.com" maxlength="30" name="operate_email" value="<?php echo $this->data['operate_email'];?>">
                    </div> 
                    <p>请填写工商营业执照上的注册号</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>运营者身份证号</label>
                        <input type="text" placeholder="325412123133132322132213" maxlength="18" name="operate_cardno" value="<?php echo $this->data['operate_cardno'];?>">
                    </div> 
                    <p>请填写工商营业执照上的注册号</p>
                </li>
            </ul>
            <dl class="clearfix">
                <dt>运营者身份证</dt>
                <dd>
                    <p>提交中华人民共和国居民身份证，无居民身份证的内地居民可提交《临时居民身份
                    证》。格式要求：支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                    <div class="ms_sfz fl">
                        <div class="ms_rz_sct J-upimage">
                            <h6>正面</h6>
                            <div id="preview11" class="ms_rz_sct1">
                                <img id="imghead11" border=0 src="<?php echo empty($this->data['operater_cert']['operater_cert'][0]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['operater_cert'][0]);?>" width="120" height="80" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="operater_cert_file1" />选择文件<input type="hidden" name="operater_cert[]" value="<?php echo $this->data['operater_cert']['operater_cert'][0];?>"></div>
                        </div>
                        <div class="ms_rz_sct J-upimage">
                            <h6>反面</h6>
                            <div id="preview22" class="ms_rz_sct1">
                                <img id="imghead22" border=0 src="<?php echo empty($this->data['operater_cert']['operater_cert'][1]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['operater_cert'][1]);?>" width="120" height="80" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="operater_cert_file2" />选择文件<input type="hidden" name="operater_cert[]" value="<?php echo $this->data['operater_cert']['operater_cert'][1];?>"></div>
                        </div>
                    </div>
                    <div class="ms_sfz fr">
                        <h6>示例图片</h6>
                        <img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_shenfen.png">
                    </div>
                </dd>
            </dl>
            <dl class="clearfix">
                <dt>法人授权书</dt>
                <dd>
                    <p>请下载<a href="#" target="_blank">授权文件</a></p>
                    <p>提交中华人民共和国居民身份证，无居民身份证的内地居民可提交《临时居民身份
                    证》。格式要求：支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                    <div class="ms_sfz fl">
                        <div class="ms_rz_sct01 J-upimage">
                            <div id="preview33" class="ms_rz_sct1">
                                <img id="imghead33" border=0 src="<?php echo empty($this->data['operater_cert']['owner_auth']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['owner_auth']);?>" width="120" height="100" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="owner_auth_file" />立即上传<input type="hidden" name="owner_auth" value="<?php echo $this->data['operater_cert']['owner_auth'];?>"></div>
                        </div>
                    </div>
                </dd>
            </dl>
        </div>
         <div class="mm_zhanhui_ping_title clearfix">
            <h6>上传认证资料</h6>
        </div>
        <div class="ms_rz_ziliao">
            <dl class="clearfix mm_mar20">
                <dt>企业营业执照</dt>
                <dd>
                    <p>支持中国大陆工商局或市场监督管理局颁发的工商营业执照，且必须在有效期内。
                    格式要求：原件照片、扫描件或者加盖公章的复印件，支持.jpg .jpeg .bmp .gif .pn
                    g格式照片，大小不超过5M。</p>
                    <div class="ms_sfz fl">
                        <div class="ms_rz_sct01 J-upimage">
                            <div id="preview44" class="ms_rz_sct1">
                                <img id="imghead44" border=0 src="<?php echo empty($this->data['operater_cert']['company_license']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['company_license']);?>" width="120" height="100" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="company_license_file" />立即上传<input type="hidden" name="company_license" value="<?php echo $this->data['operater_cert']['company_license'];?>"></div>
                        </div>
                    </div>
                </dd>
            </dl>
            <dl class="clearfix">
                <dt>组织机构代码证</dt>
                <dd>
                    <p>织机构代码证必须在有效期范围内。格式要求：原件照片、扫描件或加盖公章的复
                    印件，支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                    <div class="ms_sfz fl">
                        <div class="ms_rz_sct01 J-upimage">
                            <div id="preview55" class="ms_rz_sct1">
                                <img id="imghead55" border=0 src="<?php echo empty($this->data['operater_cert']['company_orgcert']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['company_orgcert']);?>" width="120" height="100" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="company_orgcert_file" />立即上传<input type="hidden" name="company_orgcert" value="<?php echo $this->data['operater_cert']['company_orgcert'];?>"></div>
                        </div>
                    </div>
                </dd>
            </dl>
            <dl class="clearfix">
                <dt>税务登记证</dt>
                <dd>
                    <p>织机构代码证必须在有效期范围内。格式要求：原件照片、扫描件或加盖公章的复
                    印件，支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                    <div class="ms_sfz fl">
                        <div class="ms_rz_sct01 J-upimage">
                            <div id="preview66" class="ms_rz_sct1">
                                <img id="imghead66" border=0 src="<?php echo empty($this->data['operater_cert']['company_tax']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['company_tax']);?>" width="120" height="100" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="company_tax_file" />立即上传<input type="hidden" name="company_tax" value="<?php echo $this->data['operater_cert']['company_tax'];?>"></div>
                        </div>
                    </div>
                </dd>
            </dl>
            <dl class="clearfix">
                <dt>法人身份证</dt>
                <dd>
                    <p>提交中华人民共和国居民身份证，无居民身份证的内地居民可提交《临时居民身份
                    证》。格式要求：支持.jpg .jpeg .bmp .gif .png格式照片，大小不超过5M。</p>
                    <div class="ms_sfz fl">
                        <div class="ms_rz_sct J-upimage">
                            <h6>正面</h6>
                            <div id="preview77" class="ms_rz_sct1">
                                <img id="imghead77" border=0 src="<?php echo empty($this->data['operater_cert']['owner_cert'][0]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['owner_cert'][0]);?>" width="120" height="80" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="owner_cert_file1" />选择文件<input type="hidden" name="owner_cert[]" value="<?php echo $this->data['operater_cert']['owner_cert'][0];?>"></div>
                        </div>
                        <div class="ms_rz_sct J-upimage">
                            <h6>反面</h6>
                            <div id="preview88" class="ms_rz_sct1">
                                <img id="imghead88" border=0 src="<?php echo empty($this->data['operater_cert']['owner_cert'][1]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_shenfen_moren.jpg' : Common::AttachUrl($this->data['operater_cert']['owner_cert'][1]);?>" width="120" height="80" />
                            </div>
                            <div class="mm_rz_dianji"><input type="file" class="J-imgfile" name="owner_cert_file2" />选择文件<input type="hidden" name="owner_cert[]" value="<?php echo $this->data['operater_cert']['owner_cert'][1];?>"></div>
                        </div>
                    </div>
                    <div class="ms_sfz fr">
                        <h6>示例图片</h6>
                        <img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_shenfen.png">
                    </div>
                </dd>
            </dl>
        </div>
        <div class="ms_xiayibu">
			<input type="hidden" name="ajax" value="1">
			<input type="hidden" name="tpid" value="<?php echo $this->tpid;?>">
			<input type="hidden" name="filebox" value="">
			<input type="hidden" name="option" value="step1submit">
			<input type="hidden" name="yesfn" value="window.location.href='/cert/step/option/pay/tpid/<?php echo $this->tpid;?>';">
			<input type="hidden" name="nofn" value="nofunction()">
			<input type="hidden" name="beforefn" value="beforefunction()">
            <input type="submit" name="Submit" value="下一步" class="J-next">
        </div>
    </div>
	</form>
</div>
<!--底部-->
<script type="text/javascript">
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('下一步');
	}
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
			jQuery('input[name="option"]').val('uploadimg');
			jQuery('input[name="filebox"]').val($this.attr('name'));
			jQuery(".company").ajaxSubmit({
				dataType: "json",
				beforeSubmit:function(){},
				success:function(data){
					jQuery("input[name=option]").val('step1submit');
					art.dialog({id:'upinfo'}).close();
					if(data.success==true){
						$this.siblings('input[type="hidden"]').val(data.msg);
						$this.closest('.J-upimage').find('img').attr("src",$attach_path + data.msg );
					}else{
						artDialog(data.msg,'error','close();');
					}
				}
			});
			
			
		});
		
		jQuery(".J-next").on('click',function(){
			jQuery('input[name="option"]').val('step1submit');	
		});
	});
</script>
<script type="text/javascript">
/*-------------------------------------------*/
var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数
var code = ""; //验证码
var codeLength = 6;//验证码长度
function sendMessage() {
	curCount = count;
	var phone=jQuery("input[name='operate_mobile']").val();//手机号码
	var check = true;
	if(phone != ""){
		jQuery.ajax({
			type: "POST", //用POST方式传输
			dataType: "json", //数据格式:JSON
			url: '/public/common/', //目标地址,
			async : false,
			data: "option=sendsms&mobile=" + phone,
			error: function (XMLHttpRequest, textStatus, errorThrown) { },
			success: function (data){
				if(data.success){
					//return false
				}else{
					check = false;
					alert(data.msg);
					return false;
				}
			}
		});
		if(check){
			jQuery("#getcode").attr("disabled", "true");
			jQuery("#getcode").val(curCount + "秒后重新获取");
			InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
		}
		
	}else{
		alert("手机号码不能为空！");
	}
}
//timer处理函数
function SetRemainTime() {
	if (curCount == 0) {                
		window.clearInterval(InterValObj);//停止计时器
		jQuery("#getcode").removeAttr("disabled");//启用按钮
		jQuery("#getcode").val("重新发送验证码");
		code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效    
	}
	else {
		curCount--;
		jQuery("#getcode").val(curCount + "秒后重新获取");
	}
}
</script>
<?php include $this->Render('footer.php'); ?>
