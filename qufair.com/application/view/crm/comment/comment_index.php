<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">评论管理</a>&nbsp;&gt;&nbsp;<a href="#">评论管理</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/comment/index/" method="post" name="search" autocomplete="off">
	  内容关键词：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="输入关键词" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;
	  提交时间：
	  <input name="st" type="text" id="st" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['st']) ? '' :$this->param['st'];?>">
	  -&nbsp;
	  <input name="et" type="text" id="et" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['et']) ? '' :$this->param['et'];?>">
	  <input type="submit" class="btn_05"  value="查询" />
	  &nbsp;&nbsp;
	</form> 
	</div>
	<div class="clear_15px"></div>
	<div class="table_div_01">
	  <ul>
      	<li class="li_5"><input type="checkbox" name="CheckboxGroup" id="CheckboxGroup"></li>
		<li class="li_5">ID</li>
		<li class="li_20">评论用户</li>
		<li class="li_10">类型</li>
		<li class="li_40">评论内容</li>
        <li class="li_10">评论时间</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
	<form action="/comment/index/option/removeall" method="post" name="all" class="AjaxForm" autocomplete="off">
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><input type="checkbox" name="checkbox[]" value="<?php echo $v['eva_id'];?>" id="checkbox_<?php echo $k;?>"></li>
		  <li class="li_5"><?php echo $v['eva_id'];?></li>
          <li class="li_15"><?php echo $v['memberInfo']['username'];?></li>
		  <li class="li_10">
		  <?php echo $v['type_text'];?>
		  </li>
          <li class="li_40"><?php echo $v['message'];?></li>
          <li class="li_10"><?php echo date('Y-m-d H:i:s',$v['add_time']);?></li>
		  <li class="li_15"><a href="<?php echo WEB_URL;?>/forum/detail/id/<?php echo $v['con_id'];?>" target="_blank" class="btn_05">查看</a><a href="/comment/index/option/edit/id/<?php echo $v['eva_id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['eva_id'];?>" data-title="修改评论">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['eva_id'];?>" data-url="/comment/index/">删除</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    	<div style="width:150px; height:auto; overflow:hidden; float:right;">
        	<input type="submit" name="Submit" class="btn_05" value="批量删除" />
        </div>
    </div>
    <input type="hidden" name="ajax" value="1">
    <input type="hidden" name="yesfn" value="removelinkAll();">
    <input type="hidden" name="nofn" value="nofunction()">
    <input type="hidden" name="beforefn" value="beforefunction()">
    </form>
<?php include $this->Render('footer.php'); ?>
<script type="text/javascript">
	function removelink(_obj){
		_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
	}
	function beforefunction(){
		jQuery("input[name='Submit']").val('删除中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('批量删除');
	}
	
	function removelinkAll(){

		jQuery(".J-table_div_02").find('input[type="checkbox"]').each(function(index, element) {
			jQuery(element).closest('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		});
		
		location.href = location.href;
	}
	
	jQuery(document).ready(function(e) {
	   jQuery("#CheckboxGroup").on('click',function(){
		   
			if(jQuery(this).prop('checked')){
				jQuery(".J-table_div_02").find('input[type="checkbox"]').prop({"checked":true});
			}else{
				jQuery(".J-table_div_02").find('input[type="checkbox"]').prop({"checked":false});
			}
	   }); 
	});
</script>