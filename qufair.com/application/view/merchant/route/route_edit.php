<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="description"]',{
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
	<form action="/route/index/" method="post" name="rote" enctype="multipart/form-data" class="AjaxForm rote" autocomplete="off">
    <div class="ms_right fr">
        <div class="ms_right_title">
            <h3>行程发布</h3>
        </div>
        <div class="mm_zhanhui_ping_title mm_mar20 clearfix">
            <h6>行程信息</h6>
        </div>
        <div class="ms_xc_xinxi mm_mar20">
            <ul class="clearfix">
                <li>
                    <div class="clearfix">
                        <label>关联展会</label>
                        <input type="text" placeholder="上海国际尚品家居及室内装饰展览会" value="<?php echo $this->conven['name'];?>" disabled="disabled">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>行业分类</label>
                        <input type="text" placeholder="纺织行业" value="<?php echo $this->conven['industry'];?>" disabled="disabled">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>地域</label>
                        <input type="text" placeholder="亚洲、乌克兰、基辅" value="<?php echo $this->conven['regional'].'、'.$this->conven['countries'].'、'.$this->conven['city'];?>" disabled="disabled">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>关联标签</label>
                        <input type="text" placeholder="金融、理财、投资" value="<?php echo $this->conven['label'];?>" disabled="disabled">
                    </div>
                </li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>行程编辑</h6>
        </div>
        <div class="ms_xc_shangchuan clearfix">
            <div class="ms_xc_sct">
                <div id="preview" class="ms_xc_sct1">
                    
                    <div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="cover_file" style="position:absolute; z-index:9; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo empty($this->route['cover']) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->route['cover']);?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo empty($this->route['cover']) ? '' : $this->route['cover'];?>" name="cover" >
                    </div>
                </div>
                <div class="mm_xc_dianji">上传封面</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview1" class="ms_xc_sct1">
                	<div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="image_file1" style="position:absolute; z-index:9; font-size:35px; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo empty($this->route['image'][0]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->route['image'][0]);?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo empty($this->route['image'][0]) ? '' : $this->route['image'][0];?>" name="image[]" >
                    </div>
                    
                </div>
                <div class="mm_xc_dianji">上传行程图</div>
                
            </div>
            <div class="ms_xc_sct">
                <div id="preview2" class="ms_xc_sct1">
                    
                    <div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="image_file2" style="position:absolute; z-index:9; font-size:35px; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo empty($this->route['image'][1]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->route['image'][1]);?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo empty($this->route['image'][1]) ? '' : $this->route['image'][1];?>" name="image[]" >
                    </div>
                    
                </div>
                <div class="mm_xc_dianji">上传行程图</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview3" class="ms_xc_sct1">
                   
                    <div style="position:relative; height:185px; width:185px; overflow:hidden;">
                        <input type="file" class="J-imgfile" name="image_file3" style="position:absolute; z-index:9; font-size:35px; opacity:0; font-size:130px; width:185px;" >
                        <img src="<?php echo empty($this->route['image'][2]) ? STYLE_URL.'/style/quzhan/merchants/images/ms_moren.jpg' : Common::AttachUrl($this->route['image'][2]);?>" width="185" height="185" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo empty($this->route['image'][2]) ? '' : $this->route['image'][2];?>" name="image[]" >
                    </div>
                </div>
                <div class="mm_xc_dianji">上传行程图</div>
            </div>
        </div>
        <hr>
         <div class="ms_xc_xinxi mm_mar20">
            <ul class="clearfix">
                <li>
                    <div class="clearfix">
                        <label>行程名称</label>
                        <input type="text" name="name" value="<?php echo $this->route['name'];?>">
                    </div>
                </li>
            </ul>
        </div>
        <div class="ms_xc_xinxi">
            <ul class="clearfix">
                <li>
                    <div class="clearfix">
                        <label>出发时间</label>
                        <input type="text" placeholder="2015-07-30" class="laydate-icon" id="start" name="leave_time" readonly  value="<?php echo empty($this->route['leave_time']) ? '' : date('Y-m-d',$this->route['leave_time']);?>">
                    </div>   
                    <p>年、月、日、以“-”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>结束时间</label>
                        <input name="end_time" type="text" class="laydate-icon" id="end" placeholder="2015-07-30" readonly value="<?php echo empty($this->route['end_time']) ? '' : date('Y-m-d',$this->route['end_time']);?>">
                    </div>
                    <p>年、月、日、以“-”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>出发地点</label>
                        <input name="leave_area" type="text" id="leave_area" placeholder="中国-上海-虹桥机场" value="<?php echo $this->route['leave_area'];?>"><font color="#FF0000">*</font>
                    </div>
                    <p>国家、城市、目的地、以“-”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>服务城市</label>
                        <input type="text" name="route_city" value="<?php echo $this->route['route_city'];?>" placeholder="上海、北京">
                    </div>
                    <p>城市用“、”隔开</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>赶往展馆</label>
                        <input name="pavilion" type="text" id="pavilion" placeholder="虹桥展馆" value="<?php echo $this->route['pavilion'];?>">
                    </div>
                    <p>&nbsp;</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>APP客户ID</label>
                        <input name="appid" type="text" id="appid" placeholder="3100234000" value="<?php echo $this->route['appid'];?>">
                    </div>
                    <p>输入APPID，买家可以通过APP在线联系你(立即下载APP)</p>
                </li>
                <li>
                	<label>所属分类</label>
					 <select name="regional" id="regional" onChange="get_country();" style="width:100px;">
                        <option value="">请选择</option>
                        <?php
							if(!empty($this->delta)) foreach($this->delta as $k=>$v){
								$select = $v == $this->route['regional'] ? ' selected="selected"' : '';
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
                        <label>服务包含</label>
                        <select name="hotel_star" id="hotel_star">
                        	<option value="0">请选择</option>
                        	<?php
								foreach($this->data['visa'] as $key=>$value){
									$select=$value['visa_id']==$this->route['hotel_star'] ? ' selected' : '';
									echo('<option value="'.$value['visa_id'].'"'.$select.'>'.$value['html'].$value['visa_name'].'</option>');
								}
							?>
                        	
                      </select><font color="#FF0000">*</font>
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>客服QQ</label>
                        <input name="qq" type="text" id="qq" placeholder="请输入客服QQ" value="<?php echo $this->route['qq'];?>">
                    </div>
                    <p>输入客服QQ以方便买家通过网页在线联系到你</p>
                </li>
                <li>
                    <div class="clearfix">
                        <label>服务价格</label>
                        <input name="price" type="text" id="price" style="width:264px; margin-right:10px;" placeholder="5000" value="<?php echo $this->route['price'];?>">
                        元/人
                    </div>
                </li>
                
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>行程描述</h6>
        </div>
        <div class="ms_xc_miaoshu mm_mar20 clearfix">
            <h6>&nbsp;&nbsp;</h6>
            <div class="fr">
				<textarea name="description" style="width:737px; height:300px;display:none"><?php echo($this->route['description']);?></textarea>
            </div>
        </div>
        <div class="ms_xc_fabu">
			<input type="hidden" name="ajax" value="1">
			<input type="hidden" name="id" value="<?php echo $this->id;?>">
			<input type="hidden" name="con_id" value="<?php echo $this->con_id;?>">
			<input type="hidden" name="filebox" value="">
			<input type="hidden" name="option" value="submit">
			<input type="hidden" name="yesfn" value="yesfn();">
			<input type="hidden" name="nofn" value="nofunction()">
			<input type="hidden" name="beforefn" value="beforefunction()">
			<input type="submit" name="Submit" value="确认发布" class="J-next" />
        </div>
    </div>
	</form>
</div>
</form>
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
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('确认发布');
	}
	function yesfn(){
		artDialog('发布成功','succeed','window.location.href="/route/list/"');
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
			jQuery(".rote").ajaxSubmit({
				dataType: "json",
				beforeSubmit:function(){},
				success:function(data){
					jQuery("input[name=option]").val('submit');
					art.dialog({id:'upinfo'}).close();
					if(data.success==true){
						$this.siblings('input[type="hidden"]').val(data.msg);
						$this.siblings("img").attr("src",$attach_path + data.msg + '!a200');
					}else{
						artDialog(data.msg,'error','');
					}
				}
			});
			
			
		});
		
		jQuery(".J-next").on('click',function(){
			jQuery('input[name="option"]').val('submit');	
		});
	
		get_country('<?php echo($this->route['countries']);?>',function(){
			get_city('<?php echo($this->route['city']);?>');		
		});
	});
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