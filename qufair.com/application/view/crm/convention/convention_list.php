<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">展会管理</a>&nbsp;&gt;&nbsp;<a href="#">展会信息</a></span><span class="float_right">
	  <input type="button" class="btn_05 AjaxWindow"  value="导入展会信息" href="/convention/index/option/import/" href-id="0" data-title="导入展会信息" />
	  </span></div>
	<div class="clear_15px"></div>
	<div class="table_div_01">
	  <ul>
		<li class="li_5">ID</li>
		<li class="li_15">展会标题</li>
		<li class="li_10">地域</li>
		<li class="li_10">举办周期</li>
        <li class="li_10">举办展馆</li>
        <li class="li_10">举办地址</li>
        <li class="li_10">主办机构</li>
        <li class="li_10">展品范围</li>
        <li class="li_10">展会标签</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['id'];?></li>
          <li class="li_15"><?php echo $v['name'];?></li>
          <li class="li_10"><?php echo $v['regional'];?></li>
          <li class="li_10"><?php echo $v['cycle'];?></li>
          <li class="li_10"><?php echo $v['pavilion'];?></li>
          <li class="li_10"><?php echo $v['address'];?></li>
          <li class="li_10"><?php echo $v['organizer'];?></li>
          <li class="li_10"><?php echo $v['scope'];?></li>
          <li class="li_10"><?php echo $v['label'];?></li>
		  <li class="li_10"><?php if($v['id']!=1 && $v['id']!=6 && $v['id']!=4){?><a href="/convention/index/option/edit/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改展会信息">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/convention/index/">删除</a><?php }?></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03"><?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?></div>
    
	<script type="text/javascript">
		function removelink(_obj){
			_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		}
	</script>
<?php include $this->Render('footer.php'); ?>
