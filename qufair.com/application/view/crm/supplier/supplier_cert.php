<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
	<div class="clear_15px"></div>
	<div class="table_div_05"><span class="float_left"><a href="#">供应商管理</a>&nbsp;&gt;&nbsp;<a href="#">供应商认证</a></span><span class="float_right"></span></div>
	<div class="clear_15px"></div>
	<div class="table_div_04" style="padding-left:5px;">
	<form action="/supplier/cert/" method="post" name="search" autocomplete="off">
	  企业名称：<input type="text" name="key" id="key" class="btn_05"  style="width:150px; text-align:left;"  placeholder="输入名称" value="<?php echo $this->param['key'];?>" />&nbsp;&nbsp;
	  提交时间：
	  <input name="st" type="text" id="st" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['st']) ? '' :$this->param['st'];?>">
	  -&nbsp;
	  <input name="et" type="text" id="et" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['et']) ? '' :$this->param['et'];?>">
	  <input type="submit" class="btn_05"  value="查询" onClick="change_opt('');" />
	  &nbsp;&nbsp;
	  <input type="submit" class="btn_05"  value="按当前查询条件导出" onClick="change_opt('export');" />
	  <input type="hidden" name="list" value="<?php echo $this->param['list'];?>">
	  <input type="hidden" name="option" id="option" value="">
	</form> 
	<script type="text/javascript">
		function change_opt(_v){
			jQuery("#option").val(_v);
		}
	</script>
	</div>
	<div class="clear_15px"></div>
	<div class="tab_title">
		<a href="/supplier/cert/" class="<?php echo $this->param['list']=='' ? 'tab_01_ac' : '';?>">全部</a>
		<a href="/supplier/cert/?list=waitpay" class="<?php echo $this->param['list']=='waitpay' ? 'tab_01_ac' : '';?>">待支付</a>
		<a href="/supplier/cert/?list=waitaudit" class="<?php echo $this->param['list']=='waitaudit' ? 'tab_01_ac' : '';?>">待审核</a>
		<a href="/supplier/cert/?list=waitmoney" class="<?php echo $this->param['list']=='waitmoney' ? 'tab_01_ac' : '';?>">待打款</a>
		<a href="/supplier/cert/?list=finish" class="<?php echo $this->param['list']=='finish' ? 'tab_01_ac' : '';?>">已认证</a>
	</div>
	<div class="table_div_01">
	  <ul>
      	
		<li class="li_5">编号</li>
		<li class="li_20">企业名称</li>
		<li class="li_10">认证类型</li>
        <li class="li_10">认证用户</li>
		<li class="li_5">支付状态</li>
		<li class="li_5">审核状态</li>
		<li class="li_5">打款状态</li>
        <li class="li_10">提交时间</li>
		<li class="li_10">认证状态</li>
		<li class="li_15">操作</li>
	  </ul>
	</div>
	<!--列表-->
	<div class="table_div_02 J-table_div_02">
	  <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
	  <!--条-->
	  <div class="list_info">
		<ul class="row">
		  <li class="li_5"><?php echo $v['cert_id'];?></li>
          <li class="li_20"><?php echo $v['company_name'];?></li>
          <li class="li_10"><?php echo $v['type_name'];?></li>
		  <li class="li_10"><?php echo $v['mobile'];?></li>
          <li class="li_5"><?php echo $v['pay_status'] == 1 ? '已支付' : '未支付';?></li>
		  <li class="li_5">
		  <?php
		  	switch($v['audit_state']){
				case 0:
					echo '未审核';
					break;
				case 1:
					echo '已审核';
					break;
				case 2:
					echo '审核失败';
					break;
			}
		  ?>
		  </li>
          <li class="li_5">
		  <?php
		  	switch($v['money_check']){
				case 0:
					echo '未打款';
					break;
				case 1:
					echo '已打款';
					break;
				case 2:
					echo '已校验';
					break;
			}
		  ?>
		  </li>
          <li class="li_10"><?php echo date('Y-m-d H:i',$v['dateline']);?></li>
		  <li class="li_10">
		  <?php
		  	switch($v['cert_state']){
				case 0:
					echo '<font color="#cc000">未认证</font>';
					break;
				case 1:
					echo '认证中';
					break;
				case 2:
					echo '已认证';
					break;
			}
		  ?>
		  </li>
		  <li class="li_15">
		  <?php
		  	if($v['cert_state'] == 1 && $v['pay_status'] == 1 && $v['audit_state'] == 0){
				echo '<a href="/supplier/cert/option/audit/id/'.$v['cert_id'].'" class="PrintWindow btn_05" href-id="'.$v['cert_id'].'" data-title="审核认证信息">审核</a>';
			}elseif($v['cert_state'] == 1 && $v['pay_status'] == 1 && $v['audit_state'] == 1 && $v['money_check'] == 0){
				echo '<a href="/supplier/cert/option/money/id/'.$v['cert_id'].'" class="AjaxWindow btn_05" href-id="'.$v['cert_id'].'" data-title="打款">打款</a>';
			}
		  ?>
		  <a href="/supplier/cert/option/view/id/<?php echo $v['cert_id'];?>" href-id="<?php echo $v['cert_id'];?>" data-title="查看认证信息" class="PrintWindow btn_05">查看</a>
		  <a href="/supplier/cert/option/edit/id/<?php echo $v['cert_id'];?>" href-id="<?php echo $v['cert_id'];?>" data-title="编辑认证信息" class="PrintWindow btn_05">编辑</a>
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
<?php include $this->Render('footer.php'); ?>
