<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
<body class="font_14px">
<div class="clear_15px"></div>
<div class="table_div_05"><span class="float_left"><a href="#">行业广告管理</a>&nbsp;&gt;&nbsp;
        <a href="#">行业广告列表</a></span>
    <span class="float_right">
        <a href="/other/industry/option/add_adv/" class="AjaxWindow btn_05" href-id="0" data-title="添加行业广告">添加行业广告</a>
    </span>
</div>
<div class="clear_15px"></div>
<div class="table_div_04" style="padding-left:5px;">
    <form action="/other/industry/option/adv/" method="post" name="search" autocomplete="off">
        所属行业：
        <select name="industry_id" id="industry_id">
            <option value="">请选择行业</option>
            <?php
            if(!empty($this->industry)) foreach($this->industry as $k=>$v){
                $select = $v['id'] == $this->param['industry_id'] ? ' selected="selected"' : '';
                echo '<option value="'.$v['id'].'"'.$select.'>'.$v['name'].'</option>';
            }
            ?>
        </select>
        &nbsp;&nbsp;
        时间：
        <input name="st" type="text" id="st" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['st']) ? '' :$this->param['st'];?>">
        -&nbsp;
        <input name="et" type="text" id="et" class="btn_05" size="10" onClick="WdatePicker();" value="<?php echo empty($this->param['et']) ? '' :$this->param['et'];?>">
        <input type="submit" class="btn_05"  value="查询" />
        &nbsp;&nbsp;
    </form>
</div>
<div class="clear_15px"></div>
<div class="table_div_01">
    <ul>
        <li class="li_5">ID</li>
        <li class="li_35">广告名称</li>
        <li class="li_15">所属行业</li>
        <li class="li_15">开始时间</li>
        <li class="li_15">结束时间</li>
        <li class="li_10">操作</li>
    </ul>
</div>
<!--列表-->
<div class="table_div_02 J-table_div_02">
    <?php if(!empty($this->data['All'])) foreach($this->data['All'] as $k=>$v){?>
        <!--条-->
        <div class="list_info">
            <ul class="row">
                <li class="li_5"><?php echo $v['id'];?></li>
                <li class="li_35"><?php echo $v['title'];?></li>
                <li class="li_15"><?php echo $v['industry_name'];?></li>
                <li class="li_15"><?php echo date('Y-m-d',$v['start_time']);?></li>
                <li class="li_15"><?php echo date('Y-m-d',$v['end_time']);?></li>
                <li class="li_10"><a href="/other/industry/option/add_adv/id/<?php echo $v['id'];?>" class="AjaxWindow btn_05" href-id="<?php echo $v['id'];?>" data-title="修改广告">编辑</a>
                    <a href="#" class="RemoveLink_adv btn_05" data-id="<?php echo $v['id'];?>" data-url="/other/industry/option/adv/">删除</a></li>
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

</script>