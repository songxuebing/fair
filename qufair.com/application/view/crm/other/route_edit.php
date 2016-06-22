<?php include $this->Render('header.php'); ?>
    <script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
    <body class="font_14px">
    <form action="/other/keyword/" method="post" name="brand" class="AjaxForm">
        <table width="582" border="0" cellspacing="0" cellpadding="0" class="table_list">
            <tr>
                <td height="45" align="right">标题：</td>
                <td align="left"><input name="title" type="text" id="title" value="<?php echo $this->data['title'];?>" class="input_01"></td>
            </tr>
            <tr>
                <td height="45" align="right">链接url：</td>
                <td align="left"><input name="url" type="text" id="url" value="<?php echo $this->data['url'];?>" class="input_02"></td>
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
                <td width="31%" height="45" align="right">&nbsp;</td>
                <td width="69%" align="left"><input type="submit" name="Submit" value="保存" class="btn_03"></td>
            </tr>
        </table>
        <input type="hidden" name="ajax" value="1">
        <input type="hidden" name="id" value="<?php echo $this->id;?>">
        <input type="hidden" name="option" value="route_submit">
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
                jQuery('input[name="option"]').val('route_submit');
            });
        });
    </script>
<?php include $this->Render('footer.php'); ?>