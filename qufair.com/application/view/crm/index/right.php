<?php include $this->Render('header.php'); ?>

<body>
<div class="line_01" style="display:none">
  <strong><span class="font_blue">梁帅(总经办)</span></strong><span class="font_blue"></span>&nbsp;&nbsp;<span class="font_777">早上好，今天是2014年04月12日 星期六 :-)   </span>&nbsp;&nbsp;&nbsp;&nbsp;你有 <strong><a href="#" class="link_red font_14px"><u>2条销售待审核</u></a></strong>，<strong><a href="#" class="link_red font_14px"><u>3条采购待审批</u></a></strong>，<a href="#"  class="link_red font_14px"><strong><u>1条促销待审批</u></strong></a> 请及时处理!
</div>

<!--人物提示-->
<div class="main_01">
			<?php if(!empty($this->control_panel)) foreach($this->control_panel as $key=>$val){?>
            <!--1-->
                <div class="title_info">
                <div class="title_info_01"><a href="javascript:;" class="link_fff" style="cursor:default;"><?php echo $val['name'];?></a></div>
                
                <img src="<?php echo STYLE_URL;?>/style/dingdong/images/head_01.jpg" alt="" width="70" height="70" style="float:left; margin-right:10px; margin-left:5px" />
                
                <table width="145" border="0" cellpadding="0" cellspacing="0" class="title_info_table">
				  <?php foreach($val['data'] as $k=>$v){?>
                  <tr>
                    <td align="left" ><?php echo $k;?></td>
                    <td align="right" ><a href="<?php echo $v[1];?>" class="link_red"><?php echo $v[0];?></a></td>
                  </tr>
				  <?php }?>
                </table>
                </div>
            <!--1-->
             <?php }?>   
                
<div class="clear"></div>
</div>

<!--/人物提示-->


<div class="tab_title"> <a href="#" class="tab_title_ac">我的工作台</a> <a href="#" style="display:none">查询信息</a> </div>
<div class="tab_title_info">
		<?php
			if(!empty($this->my_menu)) foreach($this->my_menu as $key=>$val){
		?>
        <a href="<?php echo $val['link'];?>" class="ico_01"><img src="<?php echo STYLE_URL;?>/style/dingdong/images/ico_0<?php echo $key+1;?>.png" alt="" width="32" height="32" /><br /><?php echo $val['name'];?></a>
		<?php
				if($key>7){
					break;
				}
			}
		?>
        
<div class="clear"></div>
</div>

<div style="height:15px; clear:both"></div>

<?php include $this->Render('footer.php'); ?>