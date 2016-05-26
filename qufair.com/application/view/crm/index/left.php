<?php include $this->Render('header.php'); ?>
<body  style="overflow-x:hidden;overflow-y:auto;background:#e0f3fe">
<!--left_nav-->
<ul class="J-menu" style="width:200px; height:auto; overflow:hidden;">
	<?php
        if(!empty($this->menu['list'])) foreach($this->menu['list'] as $k=>$v){
            if($v['is_menu']=='N'){
                continue;
            }
            $f_link='/'.$v['code'].'/';
            if(!empty($v['list'])){
                $f_menu=reset($v['list']);
                $f_link=$f_link.$f_menu['code'];
            }
    ?>
    <li class="menu_sort">
        <a href="<?php echo $f_link;?>" target="mainFrame" class="<?php echo 'menu_'.$k;?> J-main-frame"><?php echo $v['name'];?></a>
        
        <ul class="menu_sort_01 menu_show J-menu-sort">
        <?php
            if(!empty($v['list'])) foreach($v['list'] as $key=>$val){
                if($val['is_menu']=='N'){
                    continue;
                }
        ?>
            <li><a href="<?php echo '/'.$v['code'].'/'.$val['code'];?>" target="mainFrame"><?php echo $val['name'];?></a></li>
        <?php
            }
            if($v['code']=='order'){
                echo '<li><a href="/order/billing/option/draftlist" target="mainFrame">订单草稿</a></li>';
            }
        ?>
        </ul>
    </li>
    
    <?php
        }
    ?>
</ul>


<!--/left_nav-->
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".J-menu").find(".J-main-frame").on('click',function(){
			var $this = jQuery(this),
				$menu = $this.closest("li"),
				$menuSort = $menu.find(".J-menu-sort");
				
			if($menuSort.hasClass('menu_sort_01')){
				$menuSort.removeClass('menu_sort_01');
				$menu.siblings().find(".J-menu-sort").addClass('menu_sort_01');
			}else{
				$menuSort.addClass('menu_sort_01');
				$menu.siblings().find(".J-menu-sort").addClass('menu_sort_01');
			}
			
		});
	
	});


</script>
<?php include $this->Render('footer.php'); ?>