<?php include $this->Render('header.php'); ?>
    <script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
    <body class="font_14px">
    <form action="/other/industry/" method="post" name="pos" class="AjaxForm pos" autocomplete="off" enctype="multipart/form-data">
        <table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
            <tr>
                <td height="45" align="right">广告名称：</td>
                <td style=" padding-top:5px; padding-bottom:5px;"><input name="title" type="text" style="width:300px;" value="<?php echo($this->data['title']);?>" class="input_01"></td>
            </tr>
            <tr>
                <td height="45" align="right">所属行业：</td>
                <td style=" padding-top:5px; padding-bottom:5px;">
                    <select name="pos_id" id="pos_id">
                        <?php
                        if(!empty($this->industry)) foreach($this->industry as $k=>$v){
                            $select = $v['id'] == $this->data['industry_id'] ? ' selected="selected"' : '';
                            echo '<option value="'.$v['id'].'"'.$select.'>'.$v['name'].'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="45" align="right">开始时间：</td>
                <td style=" padding-top:5px; padding-bottom:5px;"><input name="start_time" type="text" style="width:150px;" value="<?php echo empty($this->data['start_time']) ? date('Y-m-d') : date('Y-m-d',$this->data['start_time']);?>" class="input_01" readonly="readonly" onClick="WdatePicker();">
                    &nbsp;</td>
            </tr>
            <tr>
                <td height="45" align="right">结束时间：</td>
                <td style=" padding-top:5px; padding-bottom:5px;"><input name="end_time" type="text" style="width:150px;" value="<?php echo empty($this->data['end_time']) ? date('Y-m-d',time()+2592000) : date('Y-m-d',$this->data['end_time']);?>" class="input_01" readonly="readonly" onClick="WdatePicker();">
                    &nbsp;</td>
            </tr>
            <tr>
                <td width="160" height="45" align="right">&nbsp;&nbsp;链接地址：</td>
                <td width="440"><input name="url" type="text" style="width:300px;" value="<?php echo($this->data['url']);?>" class="input_01"></td>
            </tr>
            <tr>
                <td height="45" align="right">图片上传：</td>
                <td>
                    <input type="file" class="J-imgfile" name="image_file" />
                </td>
            </tr>
            <tr>
                <td height="45" align="right">文件地址：</td>
                <td>
                    <input name="file" type="text" style="width:300px;" value="<?php echo($this->data['file']);?>" class="input_01">
                </td>
            </tr>
            <tr>
                <td width="160" height="45"></td>
                <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
            </tr>
        </table>

        <input type="hidden" name="ajax" value="1">
        <input type="hidden" name="id" value="<?php echo empty($this->id) ? 0 : $this->id;?>">
        <input type="hidden" name="filebox" value="">
        <input type="hidden" name="option" value="submit">
        <input type="hidden" name="yesfn" value="alert('保存成功');parent.frames['iframe'].frames['mainFrame'].location.reload();">
        <input type="hidden" name="nofn" value="nofunction()">
        <input type="hidden" name="beforefn" value="beforefunction()">
    </form>
    <script type="text/javascript">
        function beforefunction(){
            jQuery("input[name='Submit']").val('保存中…');
        }
        function nofunction(){
            jQuery("input[name='Submit']").val('保存');
        }
        jQuery(document).ready(function(){
            jQuery(".J-imgfile").on('change',function(){
                var $this = jQuery(this);
                var $attach_path = '<?php echo ATTACH_IMAGE;?>';
                var dialog = art.dialog({
                    title: '提示',
                    content: '上传中，请稍候',
                    fixed:true,
                    lock:true,
                    cancel:false,
                    id:'upinfo'
                });
                //
                jQuery('input[name="option"]').val('uploadimg');
                jQuery('input[name="filebox"]').val($this.attr('name'));
                jQuery(".pos").ajaxSubmit({
                    dataType: "json",
                    beforeSubmit:function(){},
                    success:function(data){
                        jQuery("input[name=option]").val('submit_adv');
                        art.dialog({id:'upinfo'}).close();
                        if(data.success==true){
                            jQuery("input[name='file']").val($attach_path + data.msg);
                        }else{
                            artDialog(data.msg,'error','');
                        }
                    }
                });


            });

            jQuery(".J-submit").on('click',function(){
                jQuery('input[name="option"]').val('submit_adv');
            });
        });
    </script>
<?php include $this->Render('footer.php'); ?>