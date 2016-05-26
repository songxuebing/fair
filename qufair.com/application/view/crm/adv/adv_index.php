<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">广告管理</a>&nbsp;&gt;&nbsp;<a href="#">广告列表</a></span><span class="float_right"><a href="/adv/index/option/edit/" class="AjaxWindow btn_05" href-id="0" data-title="添加广告">添加广告</a></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/adv/index/" method="post" name="search" autocomplete="off">
	  广告位置：
		<select name="pos_id" id="pos_id">
		<option value="">请选择广告位置</option>
		<?php
			if(!empty($this->pos)) foreach($this->pos as $k=>$v){
				$select = $v['id'] == $this->param['pos_id'] ? ' selected="selected"' : '';
				echo '<option value="'.$v['id'].'"'.$select.'>'.$v['name'].'</option>';
			}
		?>
		</select>
	  &nbsp;&nbsp;
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
		<li class="li_35">广告名称</li>
		<li class="li_15">所属广告位</li>
		<li class="li_15">开始时间</li>
        <li class="li_15">结束时间</li>		
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
          <li class="li_35"><?php echo $v['title'];?></li>
		  <li class="li_15"><?php echo $v['posname'];?></li>
		  <li class="li_15"><?php echo date('Y-m-d',$v['start_time']);?></li>
          <li class="li_15"><?php echo date('Y-m-d',$v['end_time']);?></li>
		  <li class="li_10"><a href="/adv/index/option/edit/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改广告">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/adv/index/">删除</a></li>
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