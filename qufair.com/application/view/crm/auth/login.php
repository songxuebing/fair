<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="nofollow" />
<meta  name="robots"  content="NOODP">
<title>后台管理系统</title>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/common/common.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/css/register.css"/>
</head>
<body>
<form action="/auth/login" method="post" name="login" class="AjaxForm" autocomplete="off">
<div class='signup_container'>
    <h1 class='signup_title'>后台管理系统</h1>
    <img src='<?php echo STYLE_URL;?>/style/quzhan/images/mm_logo.png' />
    <div id="signup_forms" class="signup_forms clearfix">
		<div class="form_row first_row">
			<label for="signup_email">请输入用户名</label>
			<input type="text" name="username" id="signup_name" data-required="required">
		</div>
		<div class="form_row">
			<label for="signup_password">请输入密码</label>
			<input type="password" name="password" id="signup_password" data-required="required">
		</div>
		<input type="hidden" name="option" value="submit">
        <input type="hidden" name="is_admin" value="8">
		<input type="hidden" name="ajax" value="1">
		<input type="hidden" name="yesfn" value="window.location.href='/'">
		<input type="hidden" name="nofn" value="nofunction()">
		<input type="hidden" name="beforefn" value="beforefunction()">
    </div>

    <div class="login-btn-set"><input type="submit" name="Submit" value="" class='login-btn'></div>
    <p class='copyright'>技术支持</p>
</div>
</form>
<script type="text/javascript">
jQuery(document).ready(function(){
	CommonJs.AjaxLive();
});
function beforefunction(){
}
function nofunction(){
}
</script>
</body>
</html>