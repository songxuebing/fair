<?php
class CaptchaHelper extends Helper{
	public function Export($code,$length,$lefttime,$options){
		Captcha::GetImg($code,$length,$lefttime,$options);
	}
	public function Verification($captcha,$captchano){
		if(empty($captcha)){
			ErrorMsg::Debug('图形验证码不能为空');
		}
		if(Captcha::GetCode($captcha,$captchano)==false){
			ErrorMsg::Debug('图形验证码不正确');
		}
	}
}