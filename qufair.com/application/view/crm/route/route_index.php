<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">行程管理</a>&nbsp;&gt;&nbsp;<a href="#">行程商品</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/route/index/" method="post" name="search" autocomplete="off">
	  行程名称：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="输入名称" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;
	  发布时间：
	  <input name="st" type="text" id="st" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['st']) ? '' :$this->param['st'];?>">
	  -&nbsp;
	  <input name="et" type="text" id="et" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['et']) ? '' :$this->param['et'];?>">
	  <input type="submit" class="btn_05"  value="查询" onClick="change_opt('');" />
	  &nbsp;&nbsp;
	  <input type="hidden" name="list" value="<?php echo $this->param['list'];?>">
	</form> 
	</div>
	<div class="clear_15px"></div>
	<div class="tab_title">
		<a href="/route/index/" class="<?php echo $this->param['list']=='' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/route/index/?list=onsale" class="<?php echo $this->param['list']=='onsale' ? 'tab_01_ac' : '';?>">已上架</a>
		<a href="/route/index/?list=nosale" class="<?php echo $this->param['list']=='nosale' ? 'tab_01_ac' : '';?>">已下架</a>
	</div>
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5">编号</li>
		<li class="li_20">行程名称</li>
		<li class="li_10">出发时间</li>
        <li class="li_10">结束时间</li>
		<li class="li_10">赶往展馆</li>
		<li class="li_10">客服QQ</li>
		<li class="li_10">服务价格</li>
		<li class="li_15">操作</li>
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
          <li class="li_10"><?php echo date('Y-m-d',$v['leave_time']);?></li>
		  <li class="li_10"><?php echo date('Y-m-d',$v['end_time']);?></li>
          <li class="li_10"><?php echo $v['pavilion'];?></li>
		  <li class="li_10"><?php echo $v['qq'];?></li>
          <li class="li_10"><?php echo $v['price'];?></li>
		  <li class="li_15">
		  <a href="<?php echo WEB_URL.'/route/index/option/detail/id/'.$v['id'];?>" target="_blank" class="btn_05">查看</a>
		  <?php if($v['is_sale'] == 1){?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['id'];?>" onClick="">下架</a>
		  <?php }else{?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['id'];?>">上架</a>
		  <?php }?>
          <a href="/public/Autologin/type/route/member_id/<?php echo $v['member_id'];?>/id/<?php echo $v['id'];?>/con_id/<?php echo $v['con_id'];?>" target="_blank" class="btn_05">编辑</a>
		  <a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/route/index/">删除</a>
		  </li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
    <div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    </div>
	<script type="text/javascript">
		jQuery(".mm_xiajia").on('click',function(){			
			var detailId = jQuery(this).data('id');
			jQuery.post('/route/index/option/saleopt/',{'id':detailId},function(data){
				if(data.success){
					window.location.href = window.location.href;
				}else{
					alert(data.msg);
				}
			
			},'json');
			
				
		});
		function removelink(_obj){
			_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		}
	</script>
<?php include $this->Render('footer.php'); ?>
