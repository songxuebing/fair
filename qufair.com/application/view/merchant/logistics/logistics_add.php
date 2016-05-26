<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="log_msg"]',{
			uploadJson : '/public/ueditor/',
			allowFileManager : false,
			afterBlur: function () { this.sync(); },
			items : [
				'undo', 'redo', '|', 'preview', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist','clearhtml', 'quickformat', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', 'image', 'table', 'hr','fullscreen'
			],
		});
});
</script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3><?php echo empty($this->id) ? '物流发布' : '编辑物流' ;?></h3>
        </div>
        <div class="mm_zhanhui_ping_title mm_mar20 clearfix">
            <h6>物流信息</h6>
        </div>
        <form action="/logistics/add/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
        <div class="ms_xc_shangchuan clearfix">
            <div class="ms_xc_sct">
                <div id="preview" class="ms_xc_sct1">
                
                	<div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="imgFile1" style="position:absolute; z-index:9; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo(empty($this->data['list']['log_cover']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['log_cover']));?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['list']['log_cover']);?>" name="cover" >
                    </div>
                    
                </div>
                <div class="mm_xc_dianji">上传封面</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview1" class="ms_xc_sct1">
                
                	<div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="imgFile2" style="position:absolute; z-index:9; font-size:35px; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo(empty($this->data['list']['imgurl'][0]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['imgurl'][0]));?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['list']['imgurl'][0]);?>" name="imgurl2" >
                    </div>
                </div>
                <div class="mm_xc_dianji">上传展会图</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview2" class="ms_xc_sct1">
                	
                    <div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="imgFile3" style="position:absolute; z-index:9; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo(empty($this->data['list']['imgurl'][1]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['imgurl'][1]));?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['list']['imgurl'][1]);?>" name="imgurl3" >
                    </div>
                    
                </div>
                <div class="mm_xc_dianji"><input type="file" onchange="previewImage2(this)" />上传展会图</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview3" class="ms_xc_sct1">
                	<div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="imgFile4" style="position:absolute; z-index:9; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo(empty($this->data['list']['imgurl'][2]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['imgurl'][2]));?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['list']['imgurl'][2]);?>" name="imgurl4" >
                    </div>

                </div>
                <div class="mm_xc_dianji">上传展会图</div>
            </div>
        </div>
        <div class="ms_xc_xinxi mm_mar20">
            <ul class="clearfix">
                <li>
                    <div class="clearfix">
                        <label>物流名称</label>
                        <input type="text" name="log_title" value="<?php echo $this->data['list']['log_title'];?>" placeholder="如专业展品欧洲海运...">
                    </div>   
                    <p>区域、国家、城市、以“-”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>物流集散地</label>
                        <input type="text" name="log_location" value="<?php echo $this->data['list']['log_location'];?>" placeholder="详细地址">
                    </div>
                    <p>&nbsp;</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>物流大小</label>
                        <select name="log_unit" class="J-log-unit">
                            <option <?php echo $this->data['list']['log_unit'] == '立方' ? 'selected' : '' ;?> value="立方">立方</option>
                            <option <?php echo $this->data['list']['log_unit'] == '千克' ? 'selected' : '' ;?> value="千克">千克</option>
                            <option <?php echo $this->data['list']['log_unit'] == '吨' ? 'selected' : '' ;?> value="吨">吨</option>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="clearfix" style="position:relative;">
                        <label>运费设置</label>
                        <input type="text" id="J-unit-all" value="<?php echo $this->data['list']['log_freight']['ky']['ky_txt'].':'.$this->data['list']['log_freight']['ky']['ky_price'].' / '.$this->data['list']['log_freight']['hy']['hy_txt'].':'.$this->data['list']['log_freight']['hy']['hy_price'].' / '.$this->data['list']['log_freight']['ly']['ly_txt'].':'.$this->data['list']['log_freight']['ly']['ly_price'];?>" placeholder="请选择">
                        <i class="ms_wuliu_xiala"><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/ms_xiala.png" style="vertical-align:top;"></i>
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>物流价格</label>
                        <input type="text" name="log_price" placeholder="5000" value="<?php echo $this->data['list']['log_price'];?>" style="width:264px; margin-right:10px;">/<span class="J-log-unit-text"><?php echo $this->data['list']['log_unit'];?></span>
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>物流注释</label>
                        <select name="log_remarks">
                        	<option value="0">请选择</option>
                            <?php
								foreach($this->data['visa'] as $key=>$value){
									$select=$value['visa_id']==$this->data['list']['log_remarks'] ? ' selected' : '';
									echo('<option value="'.$value['visa_id'].'"'.$select.'>'.$value['html'].$value['visa_name'].'</option>');
								}
							?>
                        </select>
                        
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>APP客户ID</label>
                        <input type="text" name="log_app_id" value="<?php echo $this->data['list']['log_app_id'];?>" placeholder="3100234000">
                    </div>
                    <p>输入APPID，买家可以通过APP在线联系你(立即下载APP)</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>客服QQ</label>
                        <input type="text" name="log_qq" value="<?php echo $this->data['list']['log_qq'];?>" placeholder="请输入客服QQ">
                    </div>
                    <p>输入客服QQ以方便买家通过网页在线联系到你</p>
                </li>
                <li style="width:815px; height:auto; overflow:hidden; float:none;">
                    <div style="float:left;">
                        <div class="clearfix">
                            <label>有效期</label>
                            <input type="text" name="start_time" placeholder="2015-07-30" readonly class="laydate-icon" id="start">
                        </div>   
                        <p>年、月、日、以“-”隔开</p>
                    </div>
                    <div style="float:right;">
                        <div class="clearfix">
                            <label>结束时间</label>
                            <input type="text" name="end_titme" placeholder="2015-07-30" readonly class="laydate-icon" id="end">
                        </div>
                        <p>年、月、日、以“-”隔开</p>
                    </div>
                </li>

                <li>
                    <div class="clearfix">
                        <label>服务城市</label>
                        <input type="text" name="log_city" value="<?php echo $this->data['list']['log_city'];?>" placeholder="上海、北京">
                    </div>
                    <p>城市用“、”隔开</p>
                </li>
                <li>
                	<label>所属分类</label>
                    <select name="regional" id="regional" onChange="get_country();" style="width:100px;">
                        <option value="">请选择</option>
                        <?php
							if(!empty($this->delta)) foreach($this->delta as $k=>$v){
								$select = $v == $this->data['list']['regional'] ? ' selected="selected"' : '';
						?>
                        <option value="<?php echo $v;?>"<?php echo $select;?>><?php echo $v;?></option>
						<?php
							}
						?>
                    </select>
					<select name="countries" id="countries" onChange="get_city();" style="width:100px;">
						<option value="">请选择国家</option>
					</select>
					<select name="city" id="city" style="width:100px;">
						<option value="">请选择城市</option>		
					</select>
                </li>
            </ul>
            <!-- 弹出运费设置 -->
            <div class="ms_wuliu_tanchu">
                <div class="ms_wuliu_tanchu_title">
                    <h3>物流运费设置</h3>
                </div>
                <div class="ms_wuliu_tanchu_jiage clearfix">
                    <span>空运价格</span>
                    <input name="hk_freight" class="J-hk-freight" value="<?php echo $this->data['list']['log_freight']['ky']['ky_price'];?>" type="text">/<em class="J-log-unit-text"><?php echo empty($this->data['list']['log_unit']) ? '立方' : $this->data['log_unit'];?></em>
                </div>
                <div class="ms_wuliu_tanchu_jiage clearfix">
                    <span>海运价格</span>
                    <input name="hy_freight" class="J-hy-freight" value="<?php echo $this->data['list']['log_freight']['hy']['hy_price'];?>" type="text">/<em class="J-log-unit-text"><?php echo empty($this->data['list']['log_unit']) ? '立方' : $this->data['list']['log_unit'];?></em>
                </div>
                <div class="ms_wuliu_tanchu_jiage clearfix">
                    <span>陆运价格</span>
                    <input name="ly_freight" class="J-ly-freight" value="<?php echo $this->data['list']['log_freight']['ly']['ly_price'];?>" type="text">/<em class="J-log-unit-text"><?php echo empty($this->data['list']['log_unit']) ? '立方' : $this->data['list']['log_unit'];?></em>
                </div>
                <p>注：输入0为包邮</p>
                <div class="ms_wuliu_yunfei">
                    <span>是否包括国内段运费</span>
                    <div class="fl">
                    	<input type="radio" <?php echo $this->data['list']['log_freight']['guonei'] == 1 ? 'checked="checked"' : '' ;?> name="is_guonei" value="1" id="radioGroup_01" >
                        <i><label for="radioGroup_01">&nbsp;是</label></i>
                    </div>
                    <div class="fl">
                    	<input type="radio" <?php echo $this->data['list']['log_freight']['guonei'] == 0 ? 'checked="checked"' : '' ;?> name="is_guonei" value="0" id="radioGroup_00" >
                        <i><label for="radioGroup_00">&nbsp;否</label></i>
                    </div>
                </div>
                <div class="ms_wuliu_baocun">
                    <a href="javascript:void(0);" class="J-baocun">保存设置</a>
                </div>
            </div>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>物流描述</h6>
        </div>
        <div class="ms_xc_miaoshu mm_mar20 clearfix">
            <h6>&nbsp;&nbsp;</h6>
            <div class="fr">
				<textarea name="log_msg" style="width:737px; height:300px;display:none"><?php echo($this->data['list']['log_msg']);?></textarea>
            </div>
        </div>
        <div class="ms_xc_fabu">
        	<input type="submit" name="Submit" value="确认发布" style=" width:400px; height:46px; background:#44b549; color:#FFF; text-align:center; font-size:14px;" />
        </div>
        <input type="hidden" name="ajax" value="1">
        <input type="hidden" name="id" value="<?php echo $this->id;?>">
        <input type="hidden" name="filebox" value="">
        <input type="hidden" name="option" value="submit">
        <input type="hidden" name="yesfn" value="alert('保存成功');window.location.reload();">
        <input type="hidden" name="nofn" value="nofunction()">
        <input type="hidden" name="beforefn" value="beforefunction()">
        </form>
    </div>
</div>
<!--底部-->
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/merchants/js/laydate.js"></script>
<script type="text/javascript">
!function(){
    laydate.skin('molv');//切换皮肤，请查看skins下面皮肤
	var start = {
		elem: '#start',
		format: 'YYYY-MM-DD',
		min: laydate.now(), //设定最小日期为当前日期
		max: '2099-06-16 23:59:59', //最大日期
		istime: true,
		istoday: false,
		choose: function(datas){
			 end.min = datas; //开始日选好后，重置结束日的最小日期
			 end.start = datas //将结束日的初始值设定为开始日
		}
	};
	var end = {
		elem: '#end',
		format: 'YYYY-MM-DD',
		min: laydate.now(),
		max: '2099-06-16 23:59:59',
		istime: true,
		istoday: false,
		choose: function(datas){
			start.max = datas; //结束日选好后，重置开始日的最大日期
		}
	};
	laydate(start);
	laydate(end);
}();
</script>
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
	
	
	//登陆弹出遮罩层（弹出框）
	jQuery(".ms_wuliu_xiala").click(function(){
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
			"z-index":9999,
		});
		jQuery(".ms_wuliu_tanchu").show();
	});
	
	  //点击关闭
	jQuery(".ms_wuliu_baocun a").click(function(){
		jQuery(".ms_wuliu_tanchu").hide();
		jQuery("#mask").remove();
	});
	
	//选择物件大小
	jQuery(".J-log-unit").on('change',function(){
		var $this = jQuery(this),
			val = $this.val();
		
		jQuery('.J-log-unit-text').html(val);
	});
	
	jQuery('.J-baocun').on('click',function(){
		var hk = jQuery(".J-hk-freight").val(),
			hy = jQuery(".J-hy-freight").val(),
			ly = jQuery(".J-ly-freight").val(),
			guonei = jQuery('input[name="is_guonei"]').val(),
			unitTxt = jQuery(".J-log-unit-text").eq(0).text();
			
		
		jQuery("#J-unit-all").val('空运价格:'+hk+' / '+unitTxt+'  海运价格:'+hy+' / '+unitTxt+'  陆运价格:'+ly+' / '+unitTxt);	
		
	});
	get_country('<?php echo($this->data['list']['countries']);?>',function(){
		get_city('<?php echo($this->data['list']['city']);?>');		
	});
});
function beforefunction(){
	jQuery("input[name='Submit']").val('保存中…');
}
function nofunction(){
	jQuery("input[name='Submit']").val('确认发布');
}
function get_country(_v,callback){
	var regional = jQuery("#regional").val();
	jQuery.post('/public/index/',{'option':'get_region','name':regional,'level':0},function(data){
		var html = '<option value="">请选择国家</option>';
		jQuery.each(data,function(i,v){
			var $select = v.name == _v ? ' selected="selected"' : '';
			html += '<option value="'+v.name+'"'+$select+'>'+v.name+'</option>';
		});
		jQuery("#countries").html(html);
		jQuery("#city").html('<option value="">请选择城市</option>');
		
		callback && callback();
	},'json');
}
function get_city(_v){
	var regional = jQuery("#countries").val();
	jQuery.post('/public/index/',{'option':'get_region','name':regional,'level':1},function(data){
		var html = '<option value="">请选择城市</option>';
		jQuery.each(data,function(i,v){
			var $select = v.name == _v ? ' selected="selected"' : '';
			html += '<option value="'+v.name+'"'+$select+'>'+v.name+'</option>';
		});
		jQuery("#city").html(html);
	},'json');
}
</script>
<?php include $this->Render('footer.php'); ?>