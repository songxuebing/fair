<?php include $this->Render('header.php'); ?>
    <script src="<?php echo STYLE_URL;?>/style/js/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
    <body class="font_14px">
    <form action="/other/region/" method="post" name="pos" class="AjaxForm pos" autocomplete="off" enctype="multipart/form-data">
        <table width="600" border="0" cellspacing="0" cellpadding="0" class="table_list">
            <tr>
                <td height="45" align="right">区域名称：</td>
                <td style=" padding-top:5px; padding-bottom:5px;"><input name="name" type="text" style="width:300px;" value="<?php echo($this->data['name']);?>" class="input_01"></td>
            </tr>
            <tr>
                <td height="45" align="right">链接url：</td>
                <td style=" padding-top:5px; padding-bottom:5px;"><input name="url" type="text" style="width:300px;" value="<?php echo($this->data['url']);?>" class="input_01"></td>
            </tr>
            <tr>
                <td width="160" height="45" align="right">上级区域：</td>
                <td width="440">
                    <select name="parent_id" class="J-parent">
                        <option value="0">所属区域</option>
                        <?php
                        if(!empty($this->parent)) foreach($this->parent as $k=>$v){
                            $select = $v['id'] == $this->data['parent_id'] ? ' selected="selected"' : '';
                            echo '<option value="'.$v['id'].'"'.$select.'>'.$v['name'].'</option>';
                        }
                        ?>
                    </select>	</td>
            </tr>
            <tr class="J-tr-delta" style="<?php echo $this->data['parent_id'] > 0 ? 'display:none' : '';?>">
                <td height="45" align="right">所属洲：</td>
                <td><select name="delta">
                        <?php
                        if(!empty($this->delta)) foreach($this->delta as $k=>$v){
                            $select = $v == $this->data['delta'] ? ' selected="selected"' : '';
                            echo '<option value="'.$v.'"'.$select.'>'.$v.'</option>';
                        }
                        ?>
                    </select>
                </td>
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
        <input type="hidden" name="option" value="visa_submit">
        <input type="hidden" name="yesfn" value="alert('保存成功');parent.frames['iframe'].frames['mainFrame'].location.reload();">
        <input type="hidden" name="nofn" value="nofunction()">
        <input type="hidden" name="beforefn" value="beforefunction()">
    </form>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery(".J-parent").on('change',function(){
                var $this = jQuery(this),
                    parent_id = $this.val();
                if(parent_id == 0){
                    jQuery('.J-tr-delta').show();
                }else{
                    jQuery('.J-tr-delta').hide();
                }
            });

        });
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
                        jQuery("input[name=option]").val('visa_submit');
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
                jQuery('input[name="option"]').val('visa_submit');
            });
        });
    </script>
<?php include $this->Render('footer.php'); ?>