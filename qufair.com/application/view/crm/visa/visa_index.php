<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">签证管理</a>&nbsp;&gt;&nbsp;<a href="#">签证列表</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
    <form action="/visa/index/" method="post" name="search" autocomplete="off">
	  签证名称：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="输入名称" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;
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
		<a href="/visa/index/" class="<?php echo $this->param['list']=='' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/visa/index/?list=onsale" class="<?php echo $this->param['list']=='onsale' ? 'tab_01_ac' : '';?>">已上架</a>
		<a href="/visa/index/?list=nosale" class="<?php echo $this->param['list']=='nosale' ? 'tab_01_ac' : '';?>">已下架</a>
	</div>
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5">编号</li>
		<li class="li_20">签证名称</li>
		<li class="li_10">产品类型</li>
		<li class="li_10">签证类型</li>
		<li class="li_10">客服QQ</li>
		<li class="li_10">签证价格</li>
		<li class="li_10">签证领区</li>
		<li class="li_25">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['visa_id'];?></li>
          <li class="li_20"><?php echo $v['visa_title'];?></li>
          <li class="li_10"><?php echo $v['pro_type'];?></li>
		  <li class="li_10"><?php echo $v['visa_type'];?></li>
          <li class="li_10"><?php echo $v['visa_qq'];?></li>
		  <li class="li_10"><?php echo $v['visa_price'];?></li>
		  <li class="li_10"><?php echo $v['visa_area'];?></li>
		  <li class="li_25">
          <?php
          	if($v['is_index'] == 0){
		  ?>
          <a href="javascript:;" class="btn_05 J-tuijian" data-id="<?php echo $v['visa_id'];?>" >推荐</a>
          <?php
			}else{
		  ?>
          <a href="javascript:;" class="btn_05 J-tuijian" data-id="<?php echo $v['visa_id'];?>" >取消推荐</a>
          <?php
			}
		  ?>
		  <a href="<?php echo WEB_URL.'/visa/index/option/detail/id/'.$v['visa_id'];?>" target="_blank" class="btn_05">查看</a>
		  <?php if($v['is_online'] == 0){?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['visa_id'];?>" onClick="">下架</a>
		  <?php }else{?>
		  <a href="javascript:;" class="btn_05 mm_xiajia" data-id="<?php echo $v['visa_id'];?>">上架</a>
		  <?php }?>
          <a href="/public/Autologin/type/visa/member_id/<?php echo $v['member_id'];?>/id/<?php echo $v['visa_id'];?>" target="_blank" class="btn_05">编辑</a>
		  <a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['visa_id'];?>" data-url="/visa/index/">删除</a>
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
		jQuery(document).ready(function(e) {
            jQuery(".mm_xiajia").on('click',function(){			
				var detailId = jQuery(this).data('id');
				jQuery.post('/visa/index/option/saleopt/',{'id':detailId},function(data){
					if(data.success){
						window.location.reload();
					}else{
						alert(data.msg);
					}
				
				},'json');
				
					
			});
			jQuery(".J-tuijian").on('click',function(){			
				var detailId = jQuery(this).data('id');
				jQuery.post('/visa/index/option/recommend/',{'id':detailId},function(data){
					if(data.success){
						alert(data.msg);
						window.location.reload();
					}else{
						alert(data.msg);
					}
				
				},'json');
					
			});
        });
		function removelink(_obj){
			_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		}
	</script>
<?php include $this->Render('footer.php'); ?>
