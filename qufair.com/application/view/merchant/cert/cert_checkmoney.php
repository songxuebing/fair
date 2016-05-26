<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3><?php echo $this->type_row['type_name'];?>认证</h3>
        </div>
        <div class="ms_right_liucheng">
            <ul class="clearfix" style="background: url(<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_liucheng05.png)">
                <li>1&nbsp;同意协议</li>
                <li>2&nbsp;填写资料</li>
                <li><span style="color:#F00;">3&nbsp;免费入驻</span></li>
                <li>4&nbsp;等待审核</li>
                <li class="mm_right_liucheng_hover">5&nbsp;核对金额</li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>核对金额</h6>
        </div>
        <div class="mm_hdje">
            <dl>
                <dd>
                    <h4>恭喜你！审核通过</h4>
					<p>去展·已向您提交的对公帐号转账了1元以下的金额，请核对金额。核对成功后即可发布服务。</p>
                </dd>
            </dl>
			<form action="/cert/step/option/submitmoney/" method="post" name="checkmoney" class="checkmoney">
            <div class="ms_hdje_shuru">
                <span>输入金额：</span>
                <input class="J-money" type="text" name="money">
				<input type="hidden" name="tpid" value="<?php echo empty($this->tpid) ? 1 : $this->tpid;?>" />
                <span>(以元为单位)</span>
            </div>
            <div class="ms_hdje_hedui" id="ms_liji">
                <a href="javascript:;" onclick="do_submit(this);">立即核对</a>
            </div>
			</form>
        </div>
        <!-- 弹出 -->
        <div class="mm_hdje_tanchu">
            <dl>
                <dd>
                    <h4>恭喜你！验证通过</h4>
                    <p>赶快发布服务，让订单飞起来</p>
                </dd>
            </dl>
            <div class="ms_hdje_hedui" id="ms_fabu">
                <a href="/convention/add/">立即发布</a>
            </div>
        </div>
    </div>
</div>
<!--底部-->
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".checkmoney").keypress(function(e) {
		  if (e.which == 13) {
			return false;
		  }
		});
	});
	function do_submit(_obj){
			jQuery(".checkmoney").ajaxSubmit({
				dataType: "json",
				beforeSubmit:function(){					
					jQuery(_obj).attr({'onclick':''});
				},
				success:function(data){					
					if(data.success==true){
						var h=jQuery(document).height();
						var w=jQuery(document).width();
						jQuery(".mm_mid").after("<div id='mask'></div>");
						jQuery("#mask").css({
							"width":w,
							"height":h,
							"background":"rgba(0,0,0,0.2)",
							"position":"absolute",
							"left":0,
							"top":0,
							"z-index":200,
						});
						jQuery(".mm_hdje_tanchu").show();
					}else{
						jQuery(_obj).attr({'onclick':'do_submit(this)'});
						artDialog(data.msg,'error','window.location.reload();');
					}
				}
			});
	}
	//登陆弹出遮罩层（弹出框）
    jQuery("#ms_liji a").click(function(){

    });
    
      //点击关闭
    jQuery("#ms_fabu").click(function(){
        jQuery(".mm_hdje_tanchu").hide();
        jQuery("#mask").remove();
    })
</script>

<?php include $this->Render('footer.php'); ?>