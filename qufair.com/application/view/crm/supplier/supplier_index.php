<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">供应商管理</a>&nbsp;&gt;&nbsp;<a href="#">供应商类型</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
    
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5">ID</li>
		<li class="li_20">名称</li>
		<li class="li_10">编码</li>
		<li class="li_30">描述</li>
		<li class="li_15">图标</li>
        <li class="li_10">是否开启</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data)) foreach($this->data as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['type_id'];?></li>
          <li class="li_20"><?php echo $v['type_name'];?></li>
		  <li class="li_10"><?php echo $v['code'];?></li>
          <li class="li_30"><?php echo $v['type_msg'];?></li>
          <li class="li_15"><img src="<?php echo STYLE_URL.'/style/quzhan'.$v['type_icon'];?>" width="30" height="30" style="position:relative; top:7px;" ></li>
          <li class="li_10"><?php echo $v['is_open']=='1' ? '√' : '×';?></li>
		  <li class="li_10"><a href="/supplier/index/option/edit/id/<?php echo $v['type_id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['type_id'];?>" data-title="修改供应商类型">编辑</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
<?php include $this->Render('footer.php'); ?>
