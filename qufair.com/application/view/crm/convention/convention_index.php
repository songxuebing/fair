<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05">
    	<span class="float_left"><a href="#">展会管理</a>&nbsp;&gt;&nbsp;<a href="#">展会信息</a></span>
    	<a class="btn_05 AjaxWindow float_right"  value="导入展会信息" href="/convention/index/option/import/" href-id="0" data-title="导入展会信息">导入展会信息</a>
    </div>
	<div class="clear_15px"></div>
    
    <div class="table_div_04">
    <form action="<?php echo $this->search;?>" method="post" name="search">
      展会标题：<input type="text" name="nametitle" class="btn_05"  style="width:150px; text-align:left;"  placeholder="展会标题" value="<?php echo $this->param['nametitle'];?>" />&nbsp;&nbsp;
      <input type="submit" class="btn_08"  value="搜 索" />
    </form>  
    </div>
    <div class="clear_15px">
    </div>
    
    
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5"><input type="checkbox" name="CheckboxGroup" id="CheckboxGroup"></li>
		<li class="li_15">展会标题</li>
        <li class="li_5">供应商数量</li>
		<li class="li_10">地域</li>
		<li class="li_10">举办周期</li>
        <li class="li_10">举办展馆</li>
        <li class="li_5">展会面积</li>
        <li class="li_10">主办机构</li>
        <li class="li_10">展品范围</li>
        <li class="li_10">展会标签</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
    <form action="/convention/index/option/removeall" method="post" name="all" class="AjaxForm">
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><input type="checkbox" name="checkbox[]" value="<?php echo $v['id'];?>" id="checkbox_<?php echo $k;?>"></li>
          <li class="li_15"><?php echo $v['name'];?></li>
          <li class="li_5"><?php echo $v['countNumber'];?></li>
          <li class="li_10"><?php echo $v['regional'];?></li>
          <li class="li_10"><?php echo $v['cycle'];?></li>
          <li class="li_10"><?php echo $v['pavilion'];?></li>
          <li class="li_5"><?php echo $v['address'];?></li>
          <li class="li_10"><?php echo $v['organizer'];?></li>
          <li class="li_10"><?php echo $v['scope'];?></li>
          <li class="li_10"><?php echo $v['label'];?></li>
		  <li class="li_10">
          	<a href="/convention/index/option/edit/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改展会信息">编辑</a>
          	<a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/convention/index/">删除</a>
          </li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    	<div style="width:150px; height:auto; overflow:hidden; float:right;">
        	<input type="submit" name="Submit" class="btn_08" value="批量删除" />
        </div>
    </div>
    <input type="hidden" name="ajax" value="1">
    <input type="hidden" name="yesfn" value="removelinkAll();">
    <input type="hidden" name="nofn" value="nofunction()">
    <input type="hidden" name="beforefn" value="beforefunction()">
    </form>
    
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
		
		function removelinkAll(){

			location.href = location.href;
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
