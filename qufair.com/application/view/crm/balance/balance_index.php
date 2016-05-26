<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">提款管理</a>&nbsp;&gt;&nbsp;<a href="#">提款列表</a></span>
	</div>
    <div class="clear_15px"></div>
	<div class="tab_title">
		<a href="/balance/index/?list=all" class="<?php echo $this->list_class == 'all' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/balance/index/?list=1" class="<?php echo $this->list_class=='1' ? 'tab_01_ac' : '';?>">待审</a>
        <a href="/balance/index/?list=2" class="<?php echo $this->list_class=='2' ? 'tab_01_ac' : '';?>">已审核</a>
		<a href="/balance/index/?list=3" class="<?php echo $this->list_class=='3' ? 'tab_01_ac' : '';?>">未打款</a>
        <a href="/balance/index/?list=4" class="<?php echo $this->list_class=='4' ? 'tab_01_ac' : '';?>">已打款</a>
        
	</div>
	<div class="table_div_01">
	  <ul>
		<li class="li_5">ID</li>
		<li class="li_10">用户名</li>
		<li class="li_8">用户手机</li>
		<li class="li_5">提款金额</li>
        <li class="li_5">实际金额</li>
        <li class="li_5">平台佣金</li>
		<li class="li_10">银行卡号</li>
		<li class="li_10">银行名</li>
        <li class="li_10">银行开地址</li>
        <li class="li_10">提款时间</li>
		<li class="li_8">状态</li>
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
		  <li class="li_10"><?php echo $v['bank']['bank_comname'];?></li>
          <li class="li_8"><?php echo $v['mobile'];?></li>
          <li class="li_5"><?php echo $v['money'];?></li>
          <li class="li_5"><?php echo $v['actual_amount'];?></li>
          <li class="li_5"><?php echo $v['commission'];?></li>
          <li class="li_10"><?php echo $v['bank']['bank_no'];?></li>
          <li class="li_10"><?php echo $v['bank']['bank_name'];?></li>
          <li class="li_10"><?php echo $v['bank']['bank_address'];?></li>
          <li class="li_10"><?php echo date('Y-m-d H:i',$v['add_time']);?></li>
          <li class="li_8"><span style="color:<?php echo $v['state']['class'];?>;"><?php echo $v['state']['text'];?></span></li>
		  <li class="li_10"><a href="/balance/index/option/edit/id/<?php echo $v['id'];?>" class="btn_05 AjaxWindow" href-id="<?php echo $v['id'];?>" data-title="操作">操作</a><a href="#" class="btn_05 RemoveLink" data-id="<?php echo $v['id'];?>" data-url="/balance/index/">删除</a></li>
		</ul>
	  </div>
	  <!--/条-->
	  <?php }?>
	</div>
	<!--/列表-->
	<div class="table_div_03"><?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?></div>
	
	<script type="text/javascript">
		function removelink(_obj){
			_obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
		}
	</script>
<?php include $this->Render('footer.php'); ?>
