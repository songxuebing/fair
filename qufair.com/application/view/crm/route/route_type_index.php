<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">行程管理</a>&nbsp;&gt;&nbsp;<a href="#">行程类型</a></span><span class="float_right">
	  <input type="button" class="btn_05 AjaxWindow"  value="添加行程类型" href="/route/type/option/edit/id/0" href-id="0" data-title="添加行程类型" />
	  </span></div>
	<div class="clear_15px"></div>

	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5">ID</li>
		<li class="li_50">分类名称</li>
		<li class="li_15">排序</li>
        <li class="li_15">状态</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
    <form action="/route/type/" method="post" name="all" class="AjaxForm">
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['visa_id'];?></li>
          <li class="li_50"><?php echo $v['visa_name'];?></li>
          <li class="li_15"><?php echo $v['sort_order'];?></li>
          <li class="li_15"><?php echo $v['is_open']==1 ? '√' : '×';?></li>
          
		  <li class="li_10"><a href="/route/type/option/edit/id/<?php echo $v['visa_id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['visa_id'];?>" data-title="修改签证信息">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['visa_id'];?>" data-url="/route/type/">删除</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
    <input type="hidden" name="ajax" value="1">
    <input type="hidden" name="yesfn" value="removelinkAll();">
    <input type="hidden" name="nofn" value="nofunction()">
    <input type="hidden" name="beforefn" value="beforefunction()">
    </form>
    
	<script type="text/javascript">
		function removelink(_obj){
			_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		}
		
		jQuery(document).ready(function(e) {
           jQuery("#CheckboxGroup").on('click',function(){
			   
				if(jQuery(this).prop('checked')){
					jQuery(".J-table_div_02").find('input[type="checkbox"]').prop({"checked":true});
				}else{
					jQuery(".J-table_div_02").find('input[type="checkbox"]').prop({"checked":false});
				}
		   }); 
        });
	</script>
<?php include $this->Render('footer.php'); ?>
