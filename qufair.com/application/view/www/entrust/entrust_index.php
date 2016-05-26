<?php include $this->Render('header.php'); ?>
<?php include $this->Render('nav.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]',{
			uploadJson : '/public/ueditor/',
			allowFileManager : false,
			afterBlur: function () { this.sync(); },
			items : [
				'undo', 'redo', '|', 'preview', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist','clearhtml', 'quickformat', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', 'image', 'table', 'hr','fullscreen'
			],
		});
});
</script>
<style type="text/css">
/*2015-12-28*/
.xx_xuqiu{
	width: 1100px;
	padding: 10px 20px 40px;
	background: #f5f5f5;
	margin: 0 auto;
	border: 1px solid #d9d9d9;
}
.xx_xuqiu_title h5{
	font-size: 16px;
	color: #666;
	height: 30px;
	line-height: 30px;
}
.xx_xuqiu textarea{
	width: 100%;
	background: #fff;
	border: 1px solid #d9d9d9;
	padding: 10px;
	font-size: 16px;
	line-height: 20px;
	height: 300px;
	outline: none;
}
.xx_xuqiu input[type="submit"]{
	display: block;
	width: 100px;
	height: 40px;
	line-height: 40px;
	border: none;
	border-radius: 5px;
	background: #ff4a00;
	margin: 30px auto 0 auto;
	color: #fff;
	outline: none;
}
.xx_xuqiu select{
	width: 150px;
	height: 36px;
}
.xuqiu_biaoti{
	width: 100%;
	height: 36px;
	line-height: 36px;
	margin-bottom: 20px;
}
.xuqiu_biaoti span{
	display: inline-block;
	width: 36px;
}
.xuqiu_biaoti input{
	width: 300px;
	height: 36px;
	line-height: 36px;
	padding-left: 10px;
	border: 1px solid #d9d9d9;
	outline: none;
}
</style>
<form action="/entrust/index/" method="post" name="rote" enctype="multipart/form-data" class="AjaxForm mm_mid" autocomplete="off">
    <!-- 我要搜索 -->
    
    <div class="xx_xuqiu" style="margin-top:20px; margin-bottom:20px;">
        <!-- <img src="images/1.png"> -->
        <div class="xx_xuqiu_title">
            <h5>您的委托采购需求</h5>
        </div>
        <div class="xuqiu_biaoti">
            <span>标题</span>
            <input name="title" type="text">
        </div>
        <div class="xuqiu_biaoti" style="display:none;">
            <span>分类</span>
            <select name="cat_id">
            	<?php
                	if(!empty($this->dataCat)) foreach($this->dataCat as $key => $val){
					
						if($val['parent_id'] == '40' || $val['parent_id'] == '148'){
				?>
                <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                <?php
						}
					}
				?>
            </select>
        </div>
        <textarea name="content" style="width:100%; height:350px;display:none"></textarea>
        <input type="hidden" name="ajax" value="1">
        <input type="hidden" name="id" value="0">
        <input type="hidden" name="option" value="submit">
        <input type="hidden" name="yesfn" value="yesfn();">
        <input type="hidden" name="nofn" value="nofunction()">
        <input type="hidden" name="beforefn" value="beforefunction()">
        <input type="submit" name="Submit" value="确认发布">
    </div>
</form>
<script type="text/javascript">
	function beforefunction(){
		jQuery("input[name='Submit']").val('保存中…');
	}
	function nofunction(){
		jQuery("input[name='Submit']").val('确认发布');
	}
	function yesfn(){
		artDialog('发布成功','succeed','window.location.href="/entrust/index/"');
	}
</script>
<?php include $this->Render('links.php'); ?>
<?php include $this->Render('footer.php'); ?>
<?php die();?>