<?php include $this->Render('header.php'); ?>
    <script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
    <script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
    <script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="introduce"]',{
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


            editor = K.create('textarea[name="price_explain"]',{
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
            editor = K.create('textarea[name="reserve_notice"]',{
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
    <form action="/route/index/" method="post" name="brand" class="AjaxForm brand" autocomplete="off" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
            <tr>
                <td height="45" align="right">&nbsp;&nbsp;行程标题：</td>
                <td><input name="title" type="text" id="" style="width:440px;" value="<?php echo($this->data['title']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;标题描述：</td>
                <td><input name="title_describe" type="text" id="" style="width:440px;" value="<?php echo($this->data['title_describe']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;州：</td>
                <td><input name="regional" type="text" id="" style="width:440px;" value="<?php echo($this->data['regional']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;国家：</td>
                <td><input name="countries" type="text" id="" style="width:440px;" value="<?php echo($this->data['countries']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;城市：</td>
                <td><input name="city" type="text" id="" style="width:440px;" value="<?php echo($this->data['city']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;出发地：</td>
                <td><input name="departure" type="text" id="" style="width:440px;" value="<?php echo($this->data['departure']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td height="45" align="right">&nbsp;&nbsp;价格：</td>
                <td><input name="price" type="text" id="" style="width:440px;" value="<?php echo($this->data['price']);?>" class="input_01"></td>
            </tr>

            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;行程介绍：</td>
                <td>
                    <textarea name="introduce" style="width:99%; height:300px;display:none"><?php echo($this->data['introduce']);?></textarea>      </td>
            </tr>

            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;费用说明：</td>
                <td>
                    <textarea name="price_explain" style="width:99%; height:300px;display:none"><?php echo($this->data['price_explain']);?></textarea>      </td>
            </tr>

            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;签证说明：</td>
                <td>
                    <textarea name="visa_explain" style="width:99%; height:300px;display:none"><?php echo($this->data['visa_explain']);?></textarea>      </td>
            </tr>

            <tr>
                <td width="150" height="45" align="right">&nbsp;&nbsp;预订须知：</td>
                <td>
                    <textarea name="reserve_notice" style="width:99%; height:300px;display:none"><?php echo($this->data['reserve_notice']);?></textarea>      </td>
            </tr>

            <tr>
                <td width="91" height="80">&nbsp;&nbsp;封面图</td>
                <td colspan="3">
                    <div style="position:relative; height:80px; top:10px;">
                        <input type="file" class="J-imgfile" name="imgFile1" style="position:absolute; z-index:9; font-size:35px; opacity:0; width:80px;" >
                        <img src="<?php echo(empty($this->data['cover']) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['cover']));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['cover']);?>" name="cover" >
                    </div>
                </td>
            </tr>
            <tr>
                <td width="91" height="80">&nbsp;&nbsp;行程图1</td>
                <td colspan="3">

                    <div style="position:relative; height:80px; top:10px;">
                        <input type="file" class="J-imgfile" name="imgFile2" style="position:absolute; z-index:9; font-size:35px; opacity:0;width:80px;" >
                        <img src="<?php echo(empty($this->data['imgurl'][0]) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['imgurl'][0]));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['imgurl'][0]);?>" name="imgurl2" >
                    </div>
                </td>
            </tr>
            <tr>
                <td width="91" height="80">&nbsp;&nbsp;行程图2</td>
                <td colspan="3">
                    <div style="position:relative; height:80px; top:10px;">
                        <input type="file" class="J-imgfile" name="imgFile3" style="position:absolute; z-index:9; font-size:35px; opacity:0;width:80px;" >
                        <img src="<?php echo(empty($this->data['imgurl'][1]) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['imgurl'][1]));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['imgurl'][1]);?>" name="imgurl3" >
                    </div>
                </td>
            </tr>
            <tr>
                <td width="91" height="45">&nbsp;&nbsp;行程图3</td>
                <td colspan="3">
                    <div style="position:relative; height:80px; top:10px;">
                        <input type="file" class="J-imgfile" name="imgFile4" style="position:absolute; z-index:9; font-size:35px; opacity:0;width:80px;" >
                        <img src="<?php echo(empty($this->data['imgurl'][2]) ? STYLE_URL.'/style/quzhan/images/upload_img.png' : Common::AttachUrl($this->data['imgurl'][2]));?>" width="60" height="60" style="position:absolute; top:10; left:0; z-index:5" />
                        <input type="hidden" value="<?php echo($this->data['imgurl'][2]);?>" name="imgurl4" >
                    </div>
                </td>
            </tr>

            <tr>
                <td width="91" height="45"></td>
                <td><input type="submit" name="Submit" value="保存" class="btn_03 J-submit"></td>
            </tr>
        </table>

        <input type="hidden" name="ajax" value="1">
        <input type="hidden" name="id" value="<?php echo $this->data['id'];?>">
        <input type="hidden" name="option" value="new_submit">
        <input type="hidden" name="filebox" value="">
        <input type="hidden" name="yesfn" value="alert('保存成功');window.location.reload();">
        <input type="hidden" name="nofn" value="nofunction()">
        <input type="hidden" name="beforefn" value="beforefunction()">
    </form>

    <script type="text/javascript">
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
            jQuery('input[name="option"]').val('uploadImg');
            jQuery('input[name="filebox"]').val($this.attr('name'));

            jQuery(".brand").ajaxSubmit({
                dataType: "json",
                beforeSubmit:function(){},
                success:function(data){
                    jQuery("input[name=option]").val('submit');
                    art.dialog({id:'upinfo'}).close();
                    if(data.success==true){
                        $this.siblings('input[type="hidden"]').val(data.msg);
                        $this.siblings('img').attr("src",$attach_path + data.msg);
                    }else{
                        artDialog(data.msg,'error','');
                    }
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