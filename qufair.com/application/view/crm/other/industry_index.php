<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<style type="text/css">
	.fn-hiden{
		display:none;
	}
</style>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">其他管理</a>&nbsp;&gt;&nbsp;<a href="#">行业管理</a></span>
        <span class="float_right"><a href="/other/industry/option/edit/" class="AjaxWindow btn_05" href-id="0" data-title="添加行业">添加行业</a></span>
        <span class="float_right"><a href="/other/industry/option/add_adv/" class="AjaxWindow btn_05" href-id="0" data-title="添加行业">添加行业广告</a></span>
        <span class="float_right"><a href="/other/industry/option/adv/" class="btn_05" href-id="0" data-title="添加行业">行业广告</a></span>

    </div>
	<div class="clear_15px"></div>
	<div class="table_div_01">
	  <ul>
		<li class="li_5">ID</li>
		<li class="li_15">行业名称</li>
          <li class="li_10">行业英文名称</li>
          <li class="li_15">网站title</li>
          <li class="li_15">网站keywords</li>
          <li class="li_15">网站description</li>
		<li class="li_5">子行业</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <div class="J-alllist">
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['id'];?></li>
          <li class="li_15"><?php echo $v['name'];?></li>
            <li class="li_10"><?php echo $v['name_en'];?></li>
            <li class="li_15"><?php echo $v['title'];?></li>
            <li class="li_15"><?php echo $v['keywords'];?></li>
            <li class="li_15"><?php echo $v['description'];?></li>
		  <li class="li_5">
		  <a href="javascript:;" class="J-nextclick on"><?php echo count($v['next']);?></a>
		  </li>
		  <li class="li_15"><a href="/other/industry/option/edit/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $v['id'];?>" data-url="/other/industry/">删除</a></li>
		</ul>
	  </div>
	  <?php
	  	if(!empty($v['next'])) foreach($v['next'] as $key=>$val){
 	  ?>
            <?php //var_dump($val['next2']);exit();?>
            <div class="ttt">
	  <div class="list_info J-next fn-hiden">
		<ul class="row">
		  <li class="li_5"></li>
          <li class="li_15">&nbsp;|-<?php echo $val['name'];?></li>
            <li class="li_10"><?php echo $val['name_en'];?></li>
            <li class="li_15"><?php echo $val['title'];?></li>
            <li class="li_15"><?php echo $val['keywords'];?></li>
            <li class="li_15"><?php echo $val['description'];?></li>
		  <li class="li_5"><a href="javascript:;" class="J-nextclick2 on2"><?php echo count($val['next2']);?></a></li>
		  <li class="li_15"><a href="/other/industry/option/edit/id/<?php echo $val['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $val['id'];?>" data-title="修改">编辑</a><a href="#" class="RemoveLink btn_05" data-id="<?php echo $val['id'];?>" data-url="/other/industry/">删除</a></li>
		</ul>
	  </div><?php
                if(!empty($val['next2'])) foreach($val['next2'] as $key=>$va){
                ?>
                <div class="list_info2 J-next2 fn-hiden">
                    <ul class="row">
                        <li class="li_5"></li>
                        <li class="li_15">&nbsp;&nbsp;&nbsp;|-|-<?php echo $va['name'];?></li>
                        <li class="li_10"><?php echo $va['name_en'];?></li>
                        <li class="li_15"><?php echo $va['title'];?></li>
                        <li class="li_15"><?php echo $va['keywords'];?></li>
                        <li class="li_15"><?php echo $va['description'];?></li>
                        <li class="li_5"></li>
                        <li class="li_15"><a href="/other/industry/option/edit/id/<?php echo $va['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $va['id'];?>" data-title="修改">编辑</a>
                            <a href="#" class="RemoveLink btn_05" data-id="<?php echo $va['id'];?>" data-url="/other/industry/">删除</a></li>
                    </ul>
                </div>
                <?php }?>
                </div>

	  <?php
	  	}
	  ?>
	  <!--/条-->
	  </div>
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    </div>
<?php include $this->Render('footer.php'); ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".J-nextclick").on('click',function(){
			var $this = jQuery(this);
			
			if($this.hasClass("on")){
				$this.closest(".J-alllist").find(".J-next").removeClass('fn-hiden');
				$this.closest(".J-alllist").siblings().find(".J-next").addClass('fn-hiden');
				$this.removeClass("on");
				
			}else{
				$this.closest(".J-alllist").find(".J-next").addClass('fn-hiden');
				$this.closest(".J-alllist").siblings().find(".J-next").addClass('fn-hiden');
				$this.addClass("on");
			}
		
		});
	
	});


    jQuery(document).ready(function(){
        jQuery(".J-nextclick2").on('click',function(){
            var $this = jQuery(this);

            if($this.hasClass("on2")){
                $this.closest(".ttt").find(".J-next2").removeClass('fn-hiden');
                $this.closest(".ttt").siblings().find(".J-next2").addClass('fn-hiden');
                $this.removeClass("on2");

            }else{
                $this.closest(".ttt").find(".J-next2").addClass('fn-hiden');
                $this.closest(".ttt").siblings().find(".J-next2").addClass('fn-hiden');
                $this.addClass("on2");
            }

        });

    });

	function removelink(_obj){
		_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
	}
</script>