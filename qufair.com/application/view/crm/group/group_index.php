<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">用户组管理</a>&nbsp;&gt;&nbsp;<a href="#">用户组列表</a></span><span class="float_right">
	  <input type="button" class="btn_05 AjaxWindow"  value="新增用户组" href="/group/index/option/edit/" href-id="0" data-title="新增用户组" />
	  </span></div>
	<div class="clear_15px"></div>
	<div class="table_div_01">
	  <ul>
		<li class="li_5">&nbsp;</li>
		<li class="li_20">用户组</li>
		<li class="li_15">简称</li>
		<li class="li_15">编码</li>
		<li class="li_30">权限</li>
		<li class="li_15">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02">
	  <?php if(!empty($this->data)) foreach($this->data as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5">&nbsp;</li>
		  <li class="li_20"><?php echo $v['name'];?></li>
		  <li class="li_15"><?php echo $v['abbreviation'];?></li>
		  <li class="li_15"><?php echo $v['key'];?></li>
		  <li class="li_30"><input type="button" class="btn_05" value="设置权限" onClick="window.location.href='/group/index/option/role/?id=<?php echo $v['id'];?>';">&nbsp;<!--<input type="button" class="btn_05" value="设置手机菜单" onClick="window.location.href='/group/index/option/phonemenu/?id=<?php echo $v['id'];?>';">&nbsp;--><input type="button" class="btn_05" value="CRM顶部菜单" onClick="window.location.href='/group/index/option/crmmenu/?id=<?php echo $v['id'];?>';"></li>
		  <li class="li_15"><?php if(!in_array($v['id'],array(1,3,4))){?><a href="/group/index/option/edit/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改用户组">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/group/index/">删除</a><?php }?></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	
	<script type="text/javascript">
		function removelink(_obj){
			_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		}
	</script>
<?php include $this->Render('footer.php'); ?>
