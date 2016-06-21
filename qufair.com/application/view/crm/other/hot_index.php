<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<body class="font_14px">
<div class="clear_15px"></div>
<div class="table_div_05"><span class="float_left"><a href="#">其他关联</a>&nbsp;&gt;&nbsp;<a href="#">首页热门设置</a></span><span class="float_right">
	  <input type="button" class="btn_05 AjaxWindow"  value="新增热门" href="/other/keyword/option/hot_edit/" href-id="0" data-title="新增热门" />
	  </span>
</div>
<div class="clear_15px"></div>
<div class="table_div_04" style="padding-left:5px; display:none;">
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
        <li class="li_20">热门词</li>
        <li class="li_20">链接url</li>
        <li class="li_10">所属位置</li>
        <li class="li_10">排序</li>
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
                <li class="li_20"><?php echo $v['title'];?></li>
                <li class="li_20"><?php echo $v['url'];?></li>
                <li class="li_10"><?php if($v['type'] == 0 ) {echo 展会;}elseif($v['type'] == 1 ) {echo "新闻";}elseif($v['type'] == 2 ) {echo "行程/签证";}elseif($v['type'] == 3 ) {echo "特装";}?></li>
                <li class="li_10"><?php echo $v['sort'];?></li>
                <li class="li_10"><a href="/other/keyword/option/route_edit/id/<?php echo $v['id'];?>" class="btn_05 AjaxWindow" href-id="<?php echo $v['id'];?>" data-title="修改关键词">编辑</a><a href="#" class="btn_05 RemoveLink_hot" data-id="<?php echo $v['id'];?>" data-url="/other/keyword/">删除</a></li>
            </ul>
        </div>
        <!--/条-->
    <?php }?>
</div>
<!--/列表-->
<div class="table_div_03">
    <?php echo empty($this->data['Page']) ? '' : $this->data['Page'];?>

</div>

<script type="text/javascript">
    function removelink(_obj){
        _obj.parents('.list_info').fadeOut('fast',function(){jQuery(this).remove();});
    }
</script>
<?php include $this->Render('footer.php'); ?>
