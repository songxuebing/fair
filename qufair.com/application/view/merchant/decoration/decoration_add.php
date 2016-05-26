<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="msg"]',{
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
            <h3><?php echo empty($this->id) ? '特装发布' : '编辑特装' ;?></h3>
        </div>
        <div class="mm_zhanhui_ping_title mm_mar20 clearfix">
            <h6>特装信息</h6>
        </div>
        <form action="/decoration/add/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
        <div class="ms_xc_shangchuan clearfix">
            <div class="ms_xc_sct">
                <div id="preview" class="ms_xc_sct1">
                
                	<div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="imgFile1" style="position:absolute; z-index:9; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo(empty($this->data['list']['cover']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['cover']));?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['list']['cover']);?>" name="cover" >
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
                <div class="mm_xc_dianji">上传展会图</div>
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
                        <label>特装名称</label>
                        <input type="text" name="title" value="<?php echo $this->data['list']['title'];?>" placeholder="如专业展览搭建...">
                    </div>   
                    <p>区域、国家、城市、以“-”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>面积大小</label>
                        <select name="proportion" style="width:264px; margin-right:10px;">
                        	<option <?php echo $this->data['list']['proportion'] == '18' ? 'selected' : '' ;?> value="18">18</option>
                            <option <?php echo $this->data['list']['proportion'] == '36' ? 'selected' : '' ;?> value="36">36</option>
                            <option <?php echo $this->data['list']['proportion'] == '54' ? 'selected' : '' ;?> value="54">54</option>
                            <option <?php echo $this->data['list']['proportion'] == '72' ? 'selected' : '' ;?> value="72">72</option>
                            <option <?php echo $this->data['list']['proportion'] == '108' ? 'selected' : '' ;?> value="108">108</option>
                        </select>
                         <span class="J-log-unit-text">平方</span>
                    </div>
                    <p>&nbsp;</p>
                </li>

                <li style="width:815px; height:100px; overflow:hidden; float:none;">
                    <div class="clearfix">
                        <label>装修风格</label>
                        <ul style="width: 730px; height: 120px; overflow: hidden; float: left;">
                        	<li style="width:80px; height:auto; overflow:hidden; text-align:center; float:left; margin-right:10px;">
                            	<div id="preview2" class="ms_xc_sct1" style="height:80px;">
                                    <div style="position:relative; height:80px; width:80px; overflow:hidden;">
                                        <input type="file" class="J-imgfile" name="styleFile1" style="position:absolute; z-index:9; opacity:0; font-size:60px; width:80px;" >
                                        <img src="<?php echo(empty($this->data['list']['style_img'][0]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['style_img'][0]));?>" width="80" height="80" style="position:absolute; top:0; left:0; z-index:5" />
                                        <input type="hidden" value="<?php echo($this->data['list']['style_img'][1]);?>" name="styleFile1" >
                                    </div>
                                </div>
                                <span style="width:80px; position:relative; top:-5px;">风格一</span>
                            </li>
                            <li style="width:80px; height:auto; overflow:hidden; text-align:center; float:left; margin-right:10px;">
                            	<div id="preview2" class="ms_xc_sct1" style="height:80px;">
                                    <div style="position:relative; height:80px; width:80px; overflow:hidden;">
                                        <input type="file" class="J-imgfile" name="styleFile2" style="position:absolute; z-index:9; opacity:0; font-size:60px; width:80px;" >
                                        <img src="<?php echo(empty($this->data['list']['style_img'][1]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['style_img'][1]));?>" width="80" height="80" style="position:absolute; top:0; left:0; z-index:5" />
                                        <input type="hidden" value="<?php echo($this->data['list']['style_img'][1]);?>" name="styleFile2" >
                                    </div>
                                </div>
                                <span style="width:80px; position:relative; top:-5px;">风格二</span>
                            </li>
                            <li style="width:80px; height:auto; overflow:hidden; text-align:center; float:left; margin-right:10px;">
                            	<div id="preview2" class="ms_xc_sct1" style="height:80px;">
                                    <div style="position:relative; height:80px; width:80px; overflow:hidden;">
                                        <input type="file" class="J-imgfile" name="styleFile3" style="position:absolute; z-index:9; opacity:0; font-size:60px; width:80px;" >
                                        <img src="<?php echo(empty($this->data['list']['style_img'][2]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['style_img'][2]));?>" width="80" height="80" style="position:absolute; top:0; left:0; z-index:5" />
                                        <input type="hidden" value="<?php echo($this->data['list']['style_img'][2]);?>" name="styleFile3" >
                                    </div>
                                </div>
                                <span style="width:80px; position:relative; top:-5px;">风格三</span>
                            </li>
                            <li style="width:80px; height:auto; overflow:hidden; text-align:center; float:left; margin-right:10px;">
                            	<div id="preview2" class="ms_xc_sct1" style="height:80px;">
                                    <div style="position:relative; height:80px; width:80px; overflow:hidden;">
                                        <input type="file" class="J-imgfile" name="styleFile4" style="position:absolute; z-index:9; opacity:0; font-size:60px; width:80px;" >
                                        <img src="<?php echo(empty($this->data['list']['style_img'][3]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['style_img'][3]));?>" width="80" height="80" style="position:absolute; top:0; left:0; z-index:5" />
                                        <input type="hidden" value="<?php echo($this->data['list']['style_img'][3]);?>" name="styleFile4" >
                                    </div>
                                </div>
                                <span style="width:80px; position:relative; top:-5px;">风格四</span>
                            </li>
                            <li style="width:80px; height:auto; overflow:hidden; text-align:center; float:left; margin-right:10px;">
                            	<div id="preview2" class="ms_xc_sct1" style="height:80px;">
                                    <div style="position:relative; height:80px; width:80px; overflow:hidden;">
                                        <input type="file" class="J-imgfile" name="styleFile5" style="position:absolute; z-index:9; opacity:0; font-size:60px; width:80px;" >
                                        <img src="<?php echo(empty($this->data['list']['style_img'][4]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['style_img'][4]));?>" width="80" height="80" style="position:absolute; top:0; left:0; z-index:5" />
                                        <input type="hidden" value="<?php echo($this->data['list']['style_img'][4]);?>" name="styleFile5" >
                                    </div>
                                </div>
                                <span style="width:80px; position:relative; top:-5px;">风格五</span>
                            </li>
                            <li style="width:80px; height:auto; overflow:hidden; text-align:center; float:left; margin-right:10px;">
                            	<div id="preview2" class="ms_xc_sct1" style="height:80px;">
                                    <div style="position:relative; height:80px; width:80px; overflow:hidden;">
                                        <input type="file" class="J-imgfile" name="styleFile6" style="position:absolute; z-index:9; opacity:0; font-size:60px; width:80px;" >
                                        <img src="<?php echo(empty($this->data['list']['style_img'][5]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->data['list']['style_img'][5]));?>" width="80" height="80" style="position:absolute; top:0; left:0; z-index:5" />
                                        <input type="hidden" value="<?php echo($this->data['list']['style_img'][5]);?>" name="styleFile6" >
                                    </div>
                                </div>
                                <span style="width:80px; position:relative; top:-5px;">风格六</span>
                            </li>
                            

                        </ul>
                        
                    </div>
                    <p>&nbsp;</p>
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
                        <label>服务包含</label>
                        <select name="de_industry">
                        	<option value="0">请选择</option>
                            <?php
								foreach($this->data['visa'] as $key=>$value){
									$select=$value['visa_id']==$this->data['list']['de_industry'] ? ' selected' : '';
									echo('<option value="'.$value['visa_id'].'"'.$select.'>'.$value['html'].$value['visa_name'].'</option>');
								}
							?>
                        </select>
                        
                    </div>   
                    <p>行业用“、”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>服务城市</label>
                        <input type="text" name="de_city" value="<?php echo $this->data['list']['de_city'];?>" placeholder="上海、北京">
                    </div>   
                    <p>城市用“、”隔开</p>
                </li>
                
                <li>
                    <div class="clearfix">
                        <label>客服QQ</label>
                        <input type="text" name="qq" value="<?php echo $this->data['list']['qq'];?>" placeholder="请输入客服QQ">
                    </div>
                    <p>输入客服QQ以方便买家通过网页在线联系到你</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>APP客户ID</label>
                        <input type="text" name="app_id" value="<?php echo $this->data['list']['app_id'];?>" placeholder="3100234000">
                    </div>
                    <p>输入APPID，买家可以通过APP在线联系你(立即下载APP)</p>
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
                <li>
                    <div class="clearfix">
                        <label>展位规格</label> 
                        <input type="text" value="<?php echo $this->data['list']['dec_area'];?>" placeholder="3x6" name="dec_area" style="width:264px; margin-right:10px;" />/<span class="J-log-unit-text">m</span>
                    </div>
                    <p>&nbsp;</p>
                </li>

                <li>
                    <div class="clearfix">
                        <label>特装价格</label>
                        <input type="text" name="de_price" placeholder="5000" value="<?php echo $this->data['list']['de_price'];?>" style="width:264px; margin-right:10px;">/<span class="J-log-unit-text">套</span>
                    </div>
                </li>
                
                
                
                
            </ul>
            
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>特装描述</h6>
        </div>
        <div class="ms_xc_miaoshu mm_mar20 clearfix">
            <h6>&nbsp;&nbsp;</h6>
            <div class="fr">
				<textarea name="msg" style="width:737px; height:300px;display:none"><?php echo($this->data['list']['msg']);?></textarea>
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
			content: '上传中，请稍候...',
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