<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
    <script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
    <script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="scope"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });


            editor = K.create('textarea[name="describe"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });

            editor = K.create('textarea[name="review"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });
            editor = K.create('textarea[name="visa_notice"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });
        });
    </script>

<body class="font_14px">
<form action="/convention/index/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td width="91" height="45">&nbsp;&nbsp;展会标题</td>
    <td colspan="3"><input name="name" type="text" id="name" style="width:440px;" value="<?php echo($this->data['name']);?>" class="input_01"></td>
    </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;地域</td>
    <td width="218">
	<select name="regional" id="regional" onChange="get_country();">
		<option value="">请选择地域</option>
		<?php
			if(!empty($this->delta)) foreach($this->delta as $k=>$v){
				$select = $v == $this->data['regional'] ? ' selected="selected"' : '';
				echo '<option value="'.$v.'"'.$select.'>'.$v.'</option>';
			}
		?>
	</select>
	</td>
    <td width="74">行业分类</td>
    <td>
	<select name="industry" id="industry">
		<option value="">请选择行业</option>		
		<?php
			if(!empty($this->industry)) foreach($this->industry as $k=>$v){
				echo '<optgroup label="'.$v['name'].'">';
				if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
					$select = $val['name'] == $this->data['industry'] ? ' selected="selected"' : '';
					echo '<option value="'.$val['name'].'"'.$select.'>'.$val['name'].'</option>';
				}
				echo '</optgroup>';
			}
		?>
	</select>
	</td>
  </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;国家</td>
    <td width="218">
	<select name="countries" id="countries" onChange="get_city();">
		<option value="">请选择国家</option>
        
	</select>
	</td>
    <td width="74">城市</td>
    <td>
	<select name="city" id="city">
		<option value="">请选择城市</option>		
	</select>
	</td>
  </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;举办周期</td>
    <td><input name="cycle" type="text" id="cycle" value="<?php echo($this->data['cycle']);?>" class="input_01"></td>
    <td>首次举办</td>
    <td><input name="first_held" type="text" id="first_held" value="<?php echo($this->data['first_held']);?>" class="input_01"></td>
  </tr>
  
  <tr>
    <td height="45">&nbsp;&nbsp;展会面积</td>
    <td><input name="area" type="text" id="area" value="<?php echo($this->data['area']);?>" class="input_01"></td>
    <td>展商数量</td>
    <td><input name="exhibitors_number" type="text" id="exhibitors_number" value="<?php echo($this->data['exhibitors_number']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;观众量</td>
    <td><input name="audience_size" type="text" id="audience_size" value="<?php echo($this->data['audience_size']);?>" class="input_01"></td>
    <td>展会标签</td>
    <td><input name="label" type="text" id="label" value="<?php echo($this->data['label']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;举办展馆</td>
    <td><input name="pavilion" type="text" id="pavilion" value="<?php echo($this->data['pavilion']);?>" class="input_01"></td>
    <td>主办机构</td>
    <td><input name="organizer" type="text" id="organizer" value="<?php echo($this->data['organizer']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td width="91" height="45">&nbsp;&nbsp;展品范围</td>
    <td colspan="3">
    	<textarea class="input_02" name="scope" id="scope" style="width:440px;"><?php echo($this->data['scope']);?></textarea>
    
    </td>
  </tr>
  <tr>
    <td width="91" height="45">&nbsp;&nbsp;展会描述</td>
    <td colspan="3">
    	<textarea class="input_02" name="describe" id="describe" style="width:440px;"><?php echo($this->data['describe']);?></textarea>
    
    </td>
  </tr>
  <tr>
    <td width="91" height="45">&nbsp;&nbsp;往期回顾</td>
    <td colspan="3">
    	<textarea class="input_02" name="review" id="review" style="width:440px;"><?php echo($this->data['review']);?></textarea>
    
    </td>
  </tr>
  <tr>
    <td width="91" height="80">&nbsp;&nbsp;封面图</td>
    <td colspan="3">
        <div style="position:relative; height:80px; top:10px;">
        	<input type="file" class="J-imgfile" name="imgFile1" style="position:absolute; z-index:9; font-size:35px; opacity:0; width:80px;" >
            <img src="<?php echo(empty($this->data['cover']) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['cover']));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
            <input type="hidden" value="<?php echo($this->data['cover']);?>" name="cover" >
        </div>
    </td>
  </tr>
  <tr>
    <td width="91" height="80">&nbsp;&nbsp;展会图</td>
    <td colspan="3">
        
        <div style="position:relative; height:80px; top:10px;">
        	<input type="file" class="J-imgfile" name="imgFile2" style="position:absolute; z-index:9; font-size:35px; opacity:0;width:80px;" >
            <img src="<?php echo(empty($this->data['imgurl'][0]) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['imgurl'][0]));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
            <input type="hidden" value="<?php echo($this->data['imgurl'][0]);?>" name="imgurl2" >
        </div>
    </td>
  </tr>
  <tr>
    <td width="91" height="80">&nbsp;&nbsp;展会图</td>
    <td colspan="3">
        <div style="position:relative; height:80px; top:10px;">
        	<input type="file" class="J-imgfile" name="imgFile3" style="position:absolute; z-index:9; font-size:35px; opacity:0;width:80px;" >
            <img src="<?php echo(empty($this->data['imgurl'][1]) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['imgurl'][1]));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
            <input type="hidden" value="<?php echo($this->data['imgurl'][1]);?>" name="imgurl3" >
        </div>
    </td>
  </tr>
  <tr>
    <td width="91" height="45">&nbsp;&nbsp;展会图</td>
    <td colspan="3">
        <div style="position:relative; height:80px; top:10px;">
        	<input type="file" class="J-imgfile" name="imgFile4" style="position:absolute; z-index:9; font-size:35px; opacity:0;width:80px;" >
            <img src="<?php echo(empty($this->data['imgurl'][2]) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['imgurl'][2]));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
            <input type="hidden" value="<?php echo($this->data['imgurl'][2]);?>" name="imgurl4" >
        </div>
    </td>
  </tr>
  <tr>
    <td width="91" height="45"></td>
    <td colspan="3"><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
  </tr>
</table>

<input type="hidden" name="ajax" value="1">
<input type="hidden" name="id" value="<?php echo $this->id;?>">
<input type="hidden" name="filebox" value="">
<input type="hidden" name="option" value="submit">
<input type="hidden" name="yesfn" value="alert('保存成功');parent.frames['iframe'].frames['mainFrame'].location.reload();">
<input type="hidden" name="nofn" value="nofunction()">
<input type="hidden" name="beforefn" value="beforefunction()">
</form>
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
		
		get_country('<?php echo($this->data['countries']);?>',function(){
			get_city('<?php echo($this->data['city']);?>');		
		});
	});
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('保存');
	}


	function get_country(_v,callback){
		var regional = jQuery("#regional").val();
		jQuery.post('/convention/index/',{'option':'get_region','name':regional,'level':0},function(data){
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
		jQuery.post('/convention/index/',{'option':'get_region','name':regional,'level':1},function(data){
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