<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/common/jsAddress.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/kindeditor.js"></script>
<script src="<?php echo STYLE_URL;?>/style/js/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="description"]',{
			uploadJson : '/public/ueditor/',
			allowFileManager : false,
			afterBlur: function () { this.sync(); },
			items : [
				'undo', 'redo', '|', 'preview', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist','clearhtml', 'quickformat', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', 'image', 'table', 'hr','fullscreen'
			],
		});
});
</script>
<!-- 去展商户 -->
<div class="mm_mid clearfix">
    <?php include $this->Render('merchants_left.php'); ?>
    <div class="ms_right fr">
    <form action="/convention/list/" method="post" class="AjaxForm brand">
        <div class="ms_right_title">
            <h3>展会编辑</h3>
        </div>
        <div class="mm_zhanhui_ping_title mm_mar20 clearfix">
            <h6>展会信息</h6>
        </div>
        <div class="ms_xc_xinxi mm_mar20">
            <ul class="clearfix">
                <li style="width:820px; margin-bottom:10px;">
                    <div class="clearfix">
                        <label>展会标题</label>
                        <input type="text" value="<?php echo empty($this->data['con']['name']) ? '' : $this->data['con']['name'];?>" readonly placeholder="" style="width:740px;">
                    </div> 
                </li>
            </ul>
        </div>
        <div class="ms_xc_xinxi">
            <ul class="clearfix">
                <li>
                    <div class="clearfix">
                        <label>地域</label>
                        <input type="text" readonly value="<?php echo empty($this->data['con']['regional']) ? '' : $this->data['con']['regional'];?>" placeholder="" style="width:92px;">
                        <input type="text" readonly value="<?php echo empty($this->data['con']['countries']) ? '' : $this->data['con']['countries'];?>" placeholder="" style="width:92px; margin:0 16px;">
                        <input type="text" readonly value="<?php echo empty($this->data['con']['city']) ? '' : $this->data['con']['city'];?>" placeholder="" style="width:92px;">
                    </div> 
                </li>
                <li>
                    <div class="clearfix">
                        <label>行业分类</label>
                        <input readonly value="<?php echo empty($this->data['con']['industry']) ? '' : $this->data['con']['industry'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>举办周期</label>
                        <input readonly value="<?php echo empty($this->data['con']['cycle']) ? '' : $this->data['con']['cycle'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>首次举办</label>
                        <input readonly value="<?php echo empty($this->data['con']['first_held']) ? '' : $this->data['con']['first_held'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>举办展馆</label>
                        <input readonly value="<?php echo empty($this->data['con']['pavilion']) ? '' : $this->data['con']['pavilion'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>举办地点</label>
                        <input readonly value="<?php echo empty($this->data['con']['address']) ? '' : $this->data['con']['address'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>展会面积</label>
                        <input readonly value="<?php echo empty($this->data['con']['area']) ? '' : $this->data['con']['area'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>展商数量</label>
                        <input readonly value="<?php echo empty($this->data['con']['exhibitors_number']) ? '' : $this->data['con']['exhibitors_number'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>观众量</label>
                        <input readonly value="<?php echo empty($this->data['con']['audience_size']) ? '' : $this->data['con']['audience_size'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>展会标签</label>
                        <input readonly value="<?php echo empty($this->data['con']['label']) ? '' : $this->data['con']['label'];?>" type="text" placeholder="">
                    </div>
                </li>
                <li>
                    <div class="clearfix">
                        <label>主办机构</label>
                        <input readonly value="<?php echo empty($this->data['con']['organizer']) ? '' : $this->data['con']['organizer'];?>" type="text" placeholder="">
                    </div>
                </li>
            </ul>
        </div>
        <div class="mm_zhanhui_ping_title clearfix">
            <h6>行程编辑</h6>
        </div>
        <div class="ms_xc_shangchuan clearfix">
            <div class="ms_xc_sct">
                <div id="preview" class="ms_xc_sct1">
                	<?php
                    	if(Common::AttachUrl($this->data['con']['cover'])){
					?>
                    <img id="imghead" border=0 src="<?php echo Common::AttachUrl($this->data['con']['cover']);?>" width="185" height="185" />
                    <?php
						}else{
					?>
                    <img id="imghead" border=0 src="<?php echo STYLE_URL.'/style/quzhan/merchants/images/ms_touxiang.jpg';?>" width="185" height="185" />
                    <?php
						}
					?>
                </div>
                <div class="mm_xc_dianji"><input type="file" onchange="previewImage(this)" />上传封面</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview1" class="ms_xc_sct1">
                	<?php
                    	if(Common::AttachUrl($this->data['con']['imglist'][0])){
					?>
                    <img id="imghead1" border=0 src="<?php echo Common::AttachUrl($this->data['con']['imglist'][0]);?>" width="185" height="185" />
                    <?php
						}else{
					?>
                    <img id="imghead" border=0 src="<?php echo STYLE_URL.'/style/quzhan/merchants/images/ms_touxiang.jpg';?>" width="185" height="185" />
                    <?php
						}
					?>
                </div>
                <div class="mm_xc_dianji"><input type="file" onchange="previewImage1(this)" />上传展会图</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview2" class="ms_xc_sct1">
                	<?php
                    	if(Common::AttachUrl($this->data['con']['imglist'][1])){
					?>
                    <img id="imghead2" border=0 src="<?php echo Common::AttachUrl($this->data['con']['imglist'][1]);?>" width="185" height="185" />
                    <?php
						}else{
					?>
                    <img id="imghead" border=0 src="<?php echo STYLE_URL.'/style/quzhan/merchants/images/ms_touxiang.jpg';?>" width="185" height="185" />
                    <?php
						}
					?>
                </div>
                <div class="mm_xc_dianji"><input type="file" onchange="previewImage2(this)" />上传展会图</div>
            </div>
            <div class="ms_xc_sct">
                <div id="preview3" class="ms_xc_sct1">
                	<?php
                    	if(Common::AttachUrl($this->data['con']['imglist'][2])){
					?>
                    <img id="imghead3" border=0 src="<?php echo Common::AttachUrl($this->data['con']['imglist'][2]);?>" width="185" height="185" />
                    <?php
						}else{
					?>
                    <img id="imghead" border=0 src="<?php echo STYLE_URL.'/style/quzhan/merchants/images/ms_touxiang.jpg';?>" width="185" height="185" />
                    <?php
						}
					?>
                </div>
                <div class="mm_xc_dianji"><input type="file" onchange="previewImage3(this)" />上传展会图</div>
            </div>
        </div>
        <div class="ms_zh_title">添加展区</div>
        <!--添加区域-->
        <div class="J-tianjia">
        	<?php
            	if(!empty($this->data['area'])) foreach($this->data['area'] as $k => $v){
			?>
            <div class="ms_zh_tianjia">
                <ul class="clearfix">
                    <li>
                        <div class="clearfix" style="float:none; width:535px;">
                            <label>区域名称</label>
                            <input type="text" name="area_name[]" value="<?php echo $v['area_name'];?>" placeholder="如服装区或围巾..." style="width:455px;">
                        </div>
                        <!-- <a href="#" class="ms_zh_a">添加下一个区域</a> -->
                    </li>
                    <li>
                        <div class="clearfix">
                            <label>展位号</label>
                            <input type="text" name="booth_no[]" value="<?php echo $v['booth_no'];?>" placeholder="如A-D-C-003">
                        </div>
                        <div class="clearfix">
                            <label>摊位类型</label>
                            <select name="booth_type[]" style="width:180px; border:1px solid #d9d9d9; padding-left:10px; line-height:36px; height:36px;">
                            	<option value="净地" <?php if($v['booth_type'] == '净地'){ echo('selected');};?>>净地</option>
                                <option value="标摊" <?php if($v['booth_type'] == '标摊'){ echo('selected');};?>>标摊</option>
                            </select>
                        </div>
                        <div class="clearfix">
                            <label>开口概况</label>
                            <select name="opening[]" style="width:180px; border:1px solid #d9d9d9; padding-left:10px; line-height:36px; height:36px;">
                            	<option value="双开" <?php if($v['opening'] == '双开'){ echo('selected');};?>>双开</option>
                                <option value="单开" <?php if($v['opening'] == '单开'){ echo('selected');};?>>单开</option>
                                <option value="三开" <?php if($v['opening'] == '三开'){ echo('selected');};?>>三开</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="clearfix">
                            <label>摊位价格</label>
                            <input type="text" name="booth_price[]" value="<?php echo $v['booth_price'];?>" placeholder="5000">
                        </div>
                        <div class="clearfix">
                            <label>跟团展位价</label>
                            <input type="text" name="group_price[]" value="<?php echo $v['group_price'];?>" placeholder="5000">
                        </div>
                        <div class="clearfix">
                            <label>预付款</label>
                            <input type="text" name="advance_payment[]" value="<?php echo $v['advance_payment'];?>" placeholder="1000">
                        </div>
                    </li>
                    <li>
                        <div class="clearfix">
                            <label>展位面积</label>
                            <input type="text" name="con_area[]" value="<?php echo $v['con_area'];?>" placeholder="5000">
                        </div>
                        <div class="clearfix">
                            <label>展位规格</label>
                            <input type="text" name="con_standard[]" value="<?php echo $v['con_standard'];?>" placeholder="3x3">
                        </div>
                    </li>
                    <li><a class="J-add-html" href="javascript:;">添加下一个区域编号</a></li>
                </ul>
            </div>
            <hr>
            <input type="hidden" value="<?php echo $v['area_id'];?>" name="area_id[]" />
        	<?php
				}
			?>

        </div>
        
        <div class="ms_zh_tianjia">
            <ul class="clearfix">
                <li>
                    <div>
                        <div class="clearfix">
                            <label>出发时间</label>
                            <input type="text" name="start_time" value="<?php echo empty($this->data['detail']['start_time']) ? '' : date('Y-m-d',$this->data['detail']['start_time']);?>" placeholder="2015-07-30" class="laydate-icon" id="demo">
                        </div>   
                        <p>年、月、日、以“-”隔开</p>
                    </div>
                    <div>
                        <div class="clearfix">
                            <label>结束时间</label>
                            <input type="text" name="end_titme" value="<?php echo empty($this->data['detail']['end_titme']) ? '' : date('Y-m-d',$this->data['detail']['end_titme']);?>" placeholder="2015-07-30" class="laydate-icon"  onClick="laydate({istime: true, format: 'YYYY-MM-DD'})">
                        </div>
                        <p>年、月、日、以“-”隔开</p>
                    </div>
                </li>
                <li style="height:60px;">
                    <div class="clearfix" style="float:none; width:535px;">
                        <label>负责人QQ</label>
                        <input type="text" name="qq" value="<?php echo $this->data['detail']['qq'];?>" placeholder="115056888" style="width:455px;">
                    </div>
                    <p>填写展会负责人QQ以方便客户实时联系到你</p>
                </li>
                <li>
                    <div class="clearfix" style="float:none; width:535px;">
                        <label>手机应用ID</label>
                        <input type="text" name="app_id" value="<?php echo $this->data['detail']['app_id'];?>" placeholder="130611298888" style="width:455px;">
                    </div>
                    <p>录入去展提供给你的APPID之后，买家可以通过APP在线联系你。(立即下载APP)</p>
                </li>
            </ul>
        </div>
        <div class="ms_xc_miaoshu mm_mar20 clearfix" style="margin-top:30px;">
			<h6>商家描述</h6>
			<div class="fr">
				<textarea name="description" style="width:737px; height:300px;display:none"><?php echo($this->data['detail']['description']);?></textarea>
			</div>
		</div>
        <hr>
        <div class="ms_zh_tianjia">
            <div class="ms_xc_miaoshu mm_mar20 clearfix">
                <h6>展品范围</h6>
                <div class="fr">
                    <textarea readonly style="width:737px; height:auto; border:1px solid #CCC; padding:10px;"><?php echo $this->data['con']['scope'];?></textarea>
                </div>
            </div>
            <div class="ms_xc_miaoshu mm_mar20 clearfix">
                <h6>展会描述</h6>
                <div class="fr">
                    <textarea readonly style="width:737px; height:auto; border:1px solid #CCC;  padding:10px;"><?php echo $this->data['con']['describe'];?></textarea>
                </div>
            </div>
            <span>提示：这里的编辑框要符合手机预览。</span>
        </div>
        <div class="ms_xc_fabu">
        	<input type="submit" value="确认发布" />
            
            <input type="hidden" name="ajax" value="1">
            <input type="hidden" name="detail_id" value="<?php echo $this->data['detail']['detail_id'];?>">
            <input type="hidden" name="option" value="submit">
            <input type="hidden" name="yesfn" value="sucessCallback();">
            <input type="hidden" name="nofn" value="nofunction()">
            <input type="hidden" name="beforefn" value="beforefunction()">
        </div>
        </form>
    </div>
    
</div>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/merchants/js/laydate.js"></script>
<script type="text/javascript">
!function(){
    laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
    laydate({elem: '#demo'});//绑定元素
}();
</script>
<script type="text/javascript">
jQuery(document).ready(function(e) {
   jQuery(".J-tianjia").on('click','.J-add-html',function(){
		var html="";
			html+='<hr>';
			html+='<div class="ms_zh_tianjia">';
			html+='	<ul class="clearfix">';
			html+='		<li>';
			html+='			<div class="clearfix" style="float:none; width:535px;">';
			html+='				<label>展位展区</label>';
			html+='				<input type="text" name="area_name[]" placeholder="如服装区或围巾..." style="width:455px;">';
			html+='			</div>';
			html+='		</li>';
			html+='		<li>';
			html+='			<div class="clearfix">';
			html+='				<label>展位号</label>';
			html+='				<input type="text" name="booth_no[]" placeholder="如无展位号，可填待定。">';
			html+='			</div>';
			html+='			<div class="clearfix">';
			html+='				<label>摊位类型</label>';
			html+='				<select name="booth_type[]" style="width:180px; border:1px solid #d9d9d9; padding-left:10px; line-height:36px; height:36px;">';
			html+='					<option value="净地">净地</option>';
			html+='					<option value="标摊">标摊</option>';
			html+='				</select>';
			html+='			</div>';
			html+='			<div class="clearfix">';
			html+='				<label>开口概况</label>';
			html+='				<select name="opening[]" style="width:180px; border:1px solid #d9d9d9; padding-left:10px; line-height:36px; height:36px;">';
			html+='					<option value="双开">双开</option>';
			html+='					<option value="单开">单开</option>';
			html+='					<option value="三开">三开</option>';
			html+='				</select>';
			html+='			</div>';
			html+='		</li>';
			html+='		<li>';
			html+='			<div class="clearfix">';
			html+='				<label>摊位价格</label>';
			html+='				<input type="text" name="booth_price[]" placeholder="5000">';
			html+='			</div>';
			html+='			<div class="clearfix">';
			html+='				<label>跟团展位价</label>';
			html+='				<input type="text" name="group_price[]" placeholder="5000">';
			html+='			</div>';
			html+='			<div class="clearfix">';
			html+='				<label>预付款</label>';
			html+='				<input type="text" name="advance_payment[]" placeholder="1000">';
			html+='			</div>';
			html+='		</li>';

			html+='		<li>';
			html+='			<div class="clearfix">';
			html+='				<label>展会面积</label>';
			html+='				<input type="text" name="con_area[]" placeholder="5000">';
			html+='			</div>';
			html+='			<div class="clearfix">';
			html+='				<label>展位规格</label>';
			html+='				<input type="text" name="con_standard[]" placeholder="3x3">';
			html+='			</div>';
            html+='     </li>';
			html+='		<li><a class="J-add-html" href="javascript:;">添加下一个区域编号</a></li>';
			html+='	</ul>';
			html+='</div>';
			html+='<input type="hidden" value="0" name="area_id[]" />';
			
			
		jQuery(this).closest('.ms_zh_tianjia').after(html);
	}); 
});

function beforefunction(){
	jQuery("input[name='Submit']").val('发布中…');
}
function nofunction(){
	jQuery('input[name="isemail"]').val('');
	jQuery("input[name='Submit']").val('确认发布');
}

function sucessCallback(){
	artDialog('展会编辑成功','success','');	
	window.location.href = window.location.href;
}
</script>
<?php include $this->Render('footer.php'); ?>