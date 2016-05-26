<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">广告管理</a>&nbsp;&gt;&nbsp;<a href="#">广告位列表</a></span><span class="float_right"><a href="/adv/pos/option/edit/" class="AjaxWindow btn_05" href-id="0" data-title="添加广告位">添加广告位</a></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_01">
	  <ul>
		<li class="li_5">ID</li>
		<li class="li_20">广告位名称</li>
		<li class="li_10">宽度</li>
		<li class="li_10">高度</li>
        <li class="li_40">描述</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['id'];?></li>
          <li class="li_20"><?php echo $v['name'];?></li>
		  <li class="li_10"><?php echo $v['width'];?></li>
		  <li class="li_10"><?php echo $v['height'];?></li>
          <li class="li_40"><?php echo $v['desc'];?></li>
		  <li class="li_10"><a href="/adv/pos/option/edit/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改广告位">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/adv/pos/">删除</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    </div>
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
	
</script>