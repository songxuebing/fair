<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>

<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">文章管理</a>&nbsp;&gt;&nbsp;<a href="#">文章列表</a></span><span class="float_right">
	  <input type="button" class="btn_05 PrintWindow"  value="添加文章" href="/article/index/option/edit/id/0" href-id="0" data-title="添加文章" />
	  </span></div>
	<div class="clear_15px"></div>
    
    <div class="table_div_04">
    <form action="/article/index/" method="post" name="search">
      文章标题：<input type="text" name="title" class="btn_05"  style="width:150px; text-align:left;"  placeholder="文章标题" value="<?php echo $this->param['title'];?>" />&nbsp;&nbsp;
      <input type="submit" class="btn_05"  value="搜 索" />
    </form>  
    </div>
    <div class="clear_15px">
    </div>
    
    
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5"><input type="checkbox" name="CheckboxGroup" id="CheckboxGroup"></li>
		<li class="li_15">文章标题</li>
		<li class="li_15">文章分类</li>
		<li class="li_15">作者</li>
        <li class="li_15">E-mail</li>
        <li class="li_10">添加时间</li>
        <li class="li_10">状态</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
    <form action="/article/index/option/removeall" method="post" name="all" class="AjaxForm">
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><input type="checkbox" name="checkbox[]" value="<?php echo $v['article_id'];?>" id="checkbox_<?php echo $k;?>"></li>
          <li class="li_15"><?php echo $v['title'];?></li>
          <li class="li_15"><?php echo $v['cat_title']['cat_name'];?></li>
          <li class="li_15"><?php echo $v['author'];?></li>
          <li class="li_15"><?php echo $v['author_email'];?></li>
          <li class="li_10"><?php echo date('Y-m-d H:i',$v['add_time']);;?></li>
          <li class="li_10"><?php echo $v['is_open']=='1' ? '√' : '×';?></li>
          
		  <li class="li_10"><a href="/article/index/option/edit/id/<?php echo $v['article_id'];?>" class="PrintWindow btn_05" href-id="<?php echo $v['article_id'];?>" data-title="修改文章">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['article_id'];?>" data-url="/article/index/">删除</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
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

			jQuery(".J-table_div_02").find('input[type="checkbox"]').each(function(index, element) {
                jQuery(element).closest('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
            });
			
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
