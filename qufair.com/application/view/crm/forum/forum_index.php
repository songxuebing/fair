<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
	<div class="clear_15px"></div>
	
    <div class="table_div_05"><span class="float_left"><a href="#">资讯管理</a>&nbsp;&gt;&nbsp;<a href="#">资讯列表</a></span><span class="float_right"></span><span class="float_right"><a href="/forum/index/option/edit/" class="PrintWindow btn_05" href-id="0" data-title="添加文章">添加文章</a></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/forum/index/" method="post" name="search" autocomplete="off">
	  标题关键词：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="输入标题关键词" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;
	  提交时间：
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
		<a href="/forum/index/" class="<?php echo $this->param['list']=='' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/forum/index/?list=no" class="<?php echo $this->param['list']=='no' ? 'tab_01_ac' : '';?>">待审核</a>
		<a href="/forum/index/?list=yes" class="<?php echo $this->param['list']=='yes' ? 'tab_01_ac' : '';?>">已审核</a>
	</div>
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5">ID</li>
		<li class="li_30">标题</li>
		<li class="li_10">发布人</li>
		<li class="li_10">时间</li>
        <li class="li_10">状态</li>
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
          <li class="li_30"><?php echo $v['title'];?><?php echo $v['recommend'] == 1 ? ' <font color="#cc0000">[热]</font>' : '';?></li>
		  <li class="li_10"><?php echo $v['member']['username'];?></li>
          <li class="li_10"><?php echo date('Y-m-d',$v['dateline']);?></li>
          <li class="li_10"><?php echo $v['is_show']=='1' ? '√' : '×';?></li>
		  <li class="li_15">
		  <a href="/forum/index/option/edit/id/<?php echo $v['id'];?>" class="PrintWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改">编辑</a>
		  <a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/forum/index/">删除</a>
		  <?php if($v['is_show'] == 1){?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['id'];?>" onClick="">取消审核</a>
		  <?php }else{?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['id'];?>">通过审核</a>
		  <?php }?>
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
			jQuery.post('/forum/index/option/upopt/',{'id':detailId},function(data){
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
