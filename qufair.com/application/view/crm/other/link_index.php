<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">其他管理</a>&nbsp;&gt;&nbsp;<a href="#">链接管理</a></span><span class="float_right"><a href="/other/link/option/edit/" class="AjaxWindow btn_05" href-id="0" data-title="添加链接">添加链接</a></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/other/link/" method="post" name="search" autocomplete="off">
	  链接名称：
	  <input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="输入关键词" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;
	  时间：
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
		<li class="li_5">ID</li>
		<li class="li_15">链接名称</li>
		<li class="li_15">链接地址</li>
		<li class="li_35">链接描述</li>
        <li class="li_15">添加时间</li>		
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
          <li class="li_15"><?php echo $v['title'];?></li>
		  <li class="li_15"><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['url'];?></a></li>
		  <li class="li_35"><?php echo $v['remarks'];?></li>
          <li class="li_15"><?php echo date('Y-m-d',$v['dateline']);?></li>
		  <li class="li_10"><a href="/other/link/option/edit/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改链接">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/other/link/">删除</a></li>
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