<?php include $this->Render('header.php'); ?>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<body class="font_14px">
<form action="/convention/index/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
<table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
  <tr>
    <td height="45">&nbsp;&nbsp;付款单位</td>
    <td width="292"><input name="name2" type="text" id="name4" style="width:440px;" readonly value="<?php echo($this->data['user_com']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;付款帐号</td>
    <td><input name="name2" type="text" id="name5" style="width:440px;" readonly value="<?php echo($this->data['user_bank']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;付款银行</td>
    <td><input name="name2" type="text" id="name6" style="width:440px;" readonly value="<?php echo($this->data['bank_name']);?>" class="input_01"></td>
  </tr>
  <tr>
    <td height="45">&nbsp;&nbsp;付款金额</td>
    <td><input name="name2" type="text" id="name7" style="width:440px;" readonly value="<?php echo($this->data['money']);?>" class="input_01">元</td>
  </tr>
  <tr>
    <td width="91" height="45">&nbsp;&nbsp;备注说明</td>
    <td>
      <textarea class="input_02" name="review" id="review" readonly style="width:440px;"><?php echo($this->data['remarks']);?></textarea>
      
      </td>
  </tr>
  <tr>
    <td width="91" height="80">&nbsp;&nbsp;付款明细</td>
    <td>
        <a href="<?php echo Common::AttachUrl($this->data['cover']);?>" target="_blank"><img src="<?php echo empty($this->data['cover']) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['cover']);?>" width="300" height="90" /></a>
    </td>
  </tr>
  <tr>
    <td width="91" height="45"></td>
    <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
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