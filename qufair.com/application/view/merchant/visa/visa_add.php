<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="visa_msg"]',{
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
            <h3><?php echo empty($this->id) ? '签证发布' : '编辑签证' ;?></h3>
        </div>
        <div class="mm_zhanhui_ping_title mm_mar20 clearfix">
            <h6>签证信息</h6>
        </div>
        <form action="/visa/add/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
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
                        <label>签证名称</label>
                        <input name="visa_title" value="<?php echo $this->data['list']['visa_title'];?>" type="text" placeholder="例如：专业美国签证...">
                    </div>   
                    <p>&nbsp;</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>签证成功率</label>
                        <input name="visa_probability" value="<?php echo $this->data['list']['visa_probability'];?>" type="text" placeholder="99.9%">
                    </div>
                    <p>数字后面加“%”</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>产品类型</label>
                        <select name="pro_type">
                        	<option value="0">请选择</option>
                            <?php
								foreach($this->data['pro'] as $key=>$value){
									$select=$value['pro_id']==$this->data['list']['pro_type'] ? ' selected' : '';
									echo('<option value="'.$value['pro_id'].'"'.$select.'>'.$value['html'].$value['type_name'].'</option>');
								}
							?>
                        	
                        </select>
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>签证类型</label>
                        <select name="visa_type">
                        	<option value="0">请选择</option>
                            <?php
								foreach($this->data['visa'] as $key=>$value){
									$select=$value['visa_id']==$this->data['list']['visa_type'] ? ' selected' : '';
									echo('<option value="'.$value['visa_id'].'"'.$select.'>'.$value['html'].$value['visa_name'].'</option>');
								}
							?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>APP客户ID</label>
                        <input name="visa_app_id" value="<?php echo $this->data['list']['visa_app_id'];?>" type="text" placeholder="3100234000">
                    </div>
                    <p>输入APPID，买家可以通过APP在线联系你(立即下载APP)</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>客服QQ</label>
                        <input name="visa_qq" value="<?php echo $this->data['list']['visa_qq'];?>" type="text" placeholder="请输入客服QQ">
                    </div>
                    <p>输入客服QQ以方便买家通过网页在线联系到你</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>签证价格</label>
                        <input name="visa_price" value="<?php echo $this->data['list']['visa_price'];?>" type="text" placeholder="5000" style="width:264px; margin-right:10px;">元/人
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>签证领区</label>
                        <input name="visa_area" value="<?php echo $this->data['list']['visa_area'];?>" type="text" placeholder="如：上海、北京、杭州">
                    </div>
                    <p>如多城市以“、”隔开</p>
                </li>
                
                <li>
                    <div class="clearfix">
                        <label>服务城市</label>
                        <input type="text" name="visa_city" value="<?php echo $this->data['list']['visa_city'];?>" placeholder="上海、北京">
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
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>签证描述</h6>
        </div>
        <div class="ms_xc_miaoshu mm_mar20 clearfix">
            <h6>&nbsp;&nbsp;</h6>
            <div class="fr">
				<textarea name="visa_msg" style="width:737px; height:300px;display:none"><?php echo($this->data['list']['visa_msg']);?></textarea>
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
<?php include $this->Render('footer.php');die(); ?>