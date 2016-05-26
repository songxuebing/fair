<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">展会管理</a>&nbsp;&gt;&nbsp;<a href="#">展会商品</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/convention/conindex/" method="post" name="search" autocomplete="off">
	  发布者手机：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="输入发布者手机号" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;
	  发布时间：
	  <input name="st" type="text" id="st" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['st']) ? '' :$this->param['st'];?>">
	  -&nbsp;
	  <input name="et" type="text" id="et" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['et']) ? '' :$this->param['et'];?>">
	  <input type="submit" class="btn_05"  value="查询"  />
	  &nbsp;&nbsp;
	  <input type="hidden" name="list" value="<?php echo $this->param['list'];?>">
	</form> 
	</div>
	<div class="clear_15px"></div>
	<div class="tab_title">
		<a href="/convention/conindex/" class="<?php echo $this->param['list']=='' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/convention/conindex/?list=onsale" class="<?php echo $this->param['list']=='onsale' ? 'tab_01_ac' : '';?>">已上架</a>
		<a href="/convention/conindex/?list=nosale" class="<?php echo $this->param['list']=='nosale' ? 'tab_01_ac' : '';?>">已下架</a>
	</div>
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5">编号</li>
		<li class="li_20">展会名称</li>
		<li class="li_10">举办展馆</li>
		<li class="li_10">展区/展位号</li>
		<li class="li_10">发布这手机号</li>
		<li class="li_5">展位价格</li>
		<li class="li_5">跟团价格</li>
        <li class="li_10">添加时间</li>
		<li class="li_25">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['detail_id'];?></li>
          <li class="li_20"><?php echo $v['convention']['name'];?></li>
          <li class="li_10"><?php echo $v['convention']['pavilion'];?></li>
		  <li class="li_10"><?php echo $v['area']['area_name'];?>/<?php echo $v['area']['booth_no'];?></li>
          <li class="li_10"><?php echo $v['tel'];?></li>
		  <li class="li_5"><?php echo $v['area']['booth_price'];?></li>
		  <li class="li_5"><?php echo $v['area']['group_price'];?></li>
          <li class="li_10"><?php echo date('Y-m-d',$v['add_time']);?></li>
		  <li class="li_25">
          <?php
          	if($v['is_index'] == 0){
		  ?>
          <a href="javascript:;" class="btn_05 J-tuijian" data-id="<?php echo $v['detail_id'];?>" >推荐</a>
          <?php
			}else{
		  ?>
          <a href="javascript:;" class="btn_05 J-tuijian" data-id="<?php echo $v['detail_id'];?>" >已推荐</a>
          <?php
			}
		  ?>
		  <a href="<?php echo WEB_URL.'/convention/index/option/detail/id/'.$v['con_id'];?>" target="_blank" class="btn_05">查看</a>
		  <?php if($v['is_online'] == 0){?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['detail_id'];?>">下架</a>
		  <?php }else{?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['detail_id'];?>">上架</a>
		  <?php }?>
		  <a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['detail_id'];?>" data-url="/convention/conindex/">删除</a>
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
			jQuery.post('/convention/conindex/option/saleopt/',{'id':detailId},function(data){
				if(data.success){
					window.location.href = window.location.href;
				}else{
					alert(data.msg);
				}
			
			},'json');
			
				
		});
		
		jQuery(".J-tuijian").on('click',function(){			
			var detailId = jQuery(this).data('id');
			jQuery.post('/convention/conindex/option/recommend/',{'id':detailId},function(data){
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
