<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">用户管理</a>&nbsp;&gt;&nbsp;<a href="#">用户管理</a></span><span class="float_right">
	  <input type="button" class="btn_05 AjaxWindow"  value="新增用户" href="/user/index/option/edit/" href-id="0" data-title="新增用户" />
	  </span>
	</div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/user/index/" method="post" name="search">
	  用户姓名/手机：<input type="text" name="key" class="btn_05"  style="width:150px; text-align:left;" value="<?php echo $this->param['key'];?>" placeholder="输入姓名或手机查询" />
	  &nbsp;
	  <input type="submit" class="btn_05"  value="查询" />
	</form>  
	</div>
	<div class="clear_15px"></div>
	<div class="table_div_01">
	  <ul>
		<li class="li_5">ID</li>
		<li class="li_20">用户名</li>
		<li class="li_10">用户手机</li>
		<li class="li_10">账户余额</li>
		<li class="li_10">电子邮箱</li>
        <li class="li_10">标签</li>
		<li class="li_5">用户组</li>
        <li class="li_8">注册时间</li>
		<li class="li_10">用户状态</li>
		<li class="li_10">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['id'];?></li>
		  <li class="li_20"><?php echo $v['username'];?></li>
		  <li class="li_10"><?php echo $v['mobile'];?></li>
		  <li class="li_10"><?php echo $v['money'];?></li>
		  <li class="li_10"><?php echo $v['email'];?></li>
          <li class="li_10">
		  	<?php
            	if(!empty($v['tag'])) foreach($v['tag'] as $key => $val){
			?>
            <?php echo $val['tag_name'];?>,
            <?php
				}
			?>
          </li>
		  <li class="li_5"><?php echo empty($v['groupname']) ? '未分组' : $v['groupname'];?></li>
          <li class="li_8"><?php echo date('Y-m-d H:i',$v['datetime']);?></li>
		  <li class="li_10"><?php echo $v['enabled'] == 0 ? '<font color="#cc0000">冻结</font>' : '正常';?></li>
		  <li class="li_10"><a href="/user/index/option/edit/id/<?php echo $v['id'];?>" class="btn_05 AjaxWindow" href-id="<?php echo $v['id'];?>" data-title="修改用户">编辑</a><a href="#" class="btn_05 RemoveLink" data-id="<?php echo $v['id'];?>" data-url="/user/index/">删除</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03">
		<?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>
    	<div style="float:right;">
        	<a href="/user/index">全部：<?php echo $this->data['number']['count'];?> 人</a>&nbsp;&nbsp;
        	<a href="/user/index/t/pt">普通用户：<?php echo $this->data['number']['pt'];?> 人</a>&nbsp;&nbsp;
            <a href="/user/index/t/sj">商家用户：<?php echo $this->data['number']['sj'];?> 人</a>
        </div>
    </div>
	
	<script type="text/javascript">
		function removelink(_obj){
			_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		}
	</script>
<?php include $this->Render('footer.php'); ?>
