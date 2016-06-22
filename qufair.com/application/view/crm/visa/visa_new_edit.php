<?php include $this->Render('header.php'); ?>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
    <script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
    <script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="visa_introduce"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });


            editor = K.create('textarea[name="price_introduce"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });

            editor = K.create('textarea[name="visa_explain"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });
            editor = K.create('textarea[name="visa_notice"]',{
                uploadJson : '/public/ueditor/',
                allowFileManager : false,
                afterBlur: function () { this.sync(); },
                items : [
                    'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                    'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                    'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                    'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                    'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                    'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                    'anchor', 'link', 'unlink', '|', 'about'
                ],
            });
        });
    </script>

    <body class="font_14px">
    <form action="/visa/index/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
            <tr>
                <td height="45" align="right">&nbsp;&nbsp;签证名称：</td>
                <td><input name="title" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_title']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;州：</td>
                <td><input name="visa_state" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_state']);?>" class="input_01"></td>
            </tr>


            <tr>
                <td height="45" align="right">&nbsp;&nbsp;国家：</td>
                <td><input name="visa_countries" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_countries']);?>" class="input_01"></td>
            </tr>


            <tr>
                <td height="45" align="right">&nbsp;&nbsp;价格：</td>
                <td><input name="visa_price" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_price']);?>" class="input_01"></td>
            </tr>


            <tr>
                <td height="45" align="right">&nbsp;&nbsp;有效期：</td>
                <td><input name="visa_lasts" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_lasts']);?>" class="input_01"></td>
            </tr>


            <tr>
                <td height="45" align="right">&nbsp;&nbsp;提前预订天数：</td>
                <td><input name="visa_book" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_book']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;最长停留：</td>
                <td><input name="visa_stay" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_stay']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;办理地点：</td>
                <td><input name="visa_place" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_place']);?>" class="input_01"></td>
            </tr>
            <tr>
                <td height="45" align="right">&nbsp;&nbsp;办理时长：</td>
                <td><input name="visa_handle" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_handle']);?>" class="input_01"></td>
            </tr>
            <tr>
                <td height="45" align="right">&nbsp;&nbsp;签证类型：</td>
                <td><input name="visa_type" type="text" id="" style="width:440px;" value="<?php echo($this->data['visa_type']);?>" class="input_01"></td>
            </tr>
            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;签证介绍：</td>
                <td>
                    <textarea name="visa_introduce" style="width:99%; height:300px;display:none"><?php echo($this->data['visa_introduce']);?></textarea>      </td>
            </tr>

            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;费用说明：</td>
                <td>
                    <textarea name="price_introduce" style="width:99%; height:300px;display:none"><?php echo($this->data['price_introduce']);?></textarea>      </td>
            </tr>

            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;签证说明：</td>
                <td>
                    <textarea name="visa_explain" style="width:99%; height:300px;display:none"><?php echo($this->data['visa_explain']);?></textarea>      </td>
            </tr>

            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;签证须知：</td>
                <td>
                    <textarea name="visa_notice" style="width:99%; height:300px;display:none"><?php echo($this->data['visa_notice']);?></textarea>      </td>
            </tr>


            <tr>
                <td height="45" align="right">封面上传：</td>
                <td>
                    <input type="file" class="J-imgfile" name="image_file" />    </td>
            </tr>
            <tr>
                <td height="45" align="right">封面地址：</td>
                <td>
                    <input name="file" type="text" style="width:300px;" value="<?php echo($this->data['cover']);?>" class="input_01">    </td>
            </tr>

            <tr>
                <td width="91" height="45"></td>
                <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
            </tr>
        </table>

        <input type="hidden" name="ajax" value="1">
        <input type="hidden" name="id" value="<?php echo $this->id;?>">
        <input type="hidden" name="option" value="new_submit">
        <input type="hidden" name="filebox" value="">
        <input type="hidden" name="yesfn" value="alert('保存成功');window.location.reload();">
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
                jQuery(".brand").ajaxSubmit({
                    dataType: "json",
                    beforeSubmit:function(){},
                    success:function(data){
                        jQuery("input[name=option]").val('new_submit');
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
                jQuery('input[name="option"]').val('new_submit');
            });
        });
    </script>
<?php include $this->Render('footer.php'); ?>