<?php include $this->Render('header.php'); ?>
<body>
<!--Top-->
<div class="top_01_box">
    <div class="top_01" style="background:none;">

            <div class="top_01_info" style="padding-left:40px; font-size:24px;">去展 后台管理系统</div>
            <div class="top_01_btn"> <a href="/user/account" target="mainFrame"><?php echo $this->UserConfig['Name'];?></a>&nbsp;|&nbsp;<a href="javascript:void(0);" onClick="javascript:if(window.confirm('确定要退出系统吗？')){window.location.href='/auth/logout/option/refer';}">退出</a>&nbsp;&nbsp;&nbsp;&nbsp;</div>
    </div>
</div>
<!--/Top-->
<!--nav-->

<div class="nav">
        <a href="/index/right" target="mainFrame"><img src="<?php echo STYLE_URL;?>/style/dingdong/images/nav_01.png" alt="" align="absmiddle" />&nbsp;导航面板</a>
		<?php
			$x=3;
			if(!empty($this->menu)) foreach($this->menu as $k=>$v){
		?>
        <a href="<?php echo $v['url'];?>" class="nav_1" target="mainFrame" data-fun="<?php echo $v['function'];?>"><img src="<?php echo STYLE_URL;?>/style/dingdong/images/nav_0<?php echo $x;?>.png" alt="" align="absmiddle" />&nbsp;<?php echo $v['name'];?><span class="nav_count">0</span></a>
		<?php
				if($x>7){break;}
				$x++;
			}
			
		?>
</div>
<!--/nav-->
<?php include $this->Render('footer.php'); ?>