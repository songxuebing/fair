<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<style type="text/css">
	.fn-hiden{
		display:none;
	}
</style>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">社区资讯</a>&nbsp;&gt;&nbsp;<a href="#">标签管理</a></span><span class="float_right"><a href="/forum/tag/option/edit/" class="AjaxWindow btn_05" href-id="0" data-title="添加默认标签">添加默认标签</a></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_01">
	  <ul>
		<li class="li_5">ID</li>
		<li class="li_15">标签名称</li>
		<li class="li_5">是否显示</li>
          <li class="li_15">英文名称</li>
          <li class="li_15">网站title</li>
          <li class="li_15">网站keywords</li>
          <li class="li_15">网站description</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <div class="J-alllist">
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['ctag_id'];?></li>
          <li class="li_15"><?php echo $v['ctag_name'];?></li>
            <li class="li_5">
                <?php echo $v['is_open'] == 1 ? '显示' : '不显示';?>
            </li>
            <li class="li_15"><?php echo $v['name_en'];?></li>
            <li class="li_15"><?php echo $v['title'];?></li>
            <li class="li_15"><?php echo $v['keywords'];?></li>
            <li class="li_15"><?php echo $v['description'];?></li>

		  <li class="li_10"><a href="/forum/tag/option/edit/id/<?php echo $v['ctag_id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['ctag_id'];?>" data-title="修改">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['ctag_id'];?>" data-url="/forum/tag/">删除</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  </div>
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
</script>