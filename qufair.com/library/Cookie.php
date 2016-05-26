<?php
// amespace Library\CookieClass;
class Cookie{
	public static function SetCookie($Var,$Value,$Time='F'){
		$Cookie=Config::GetCookie();
		if(empty($Cookie["session"])){
			$Time=$Time=='F' ? NOW_TIME+$Cookie["time"] : ($Value==''&&$Time==0 ? NOW_TIME-$Cookie["time"] : $Time);
			$S=$_SERVER["SERVER_PORT"]=='443' ? 1 : 0;
			!$Cookie["path"]&&$Cookie["path"]='/';
                        setcookie($Cookie['prefix'].$Var,$Value,$Time,$Cookie["path"],$Cookie["domain"],$S);
                        /*
                        if(in_array(HTTP_HOST, array('home.'.WEB_DOMAIN , WEB_DOMAIN, 'www.'.WEB_DOMAIN))){
                            setcookie($Cookie['prefix'].$Var,$Value,$Time,$Cookie["path"],$Cookie["domain"],$S);
                        }else{
                            setcookie($Cookie['prefix'].$Var,$Value,$Time,$Cookie["path"]);
                        }*/
		}else{
			if(empty($Value)){
				unset($_SESSION[$Cookie['prefix'].$Var]);
				session_destroy();
			}else{
				$_SESSION[$Cookie['prefix'].$Var]=$Value;
			}
		}
	}
	public static function GetCookie($Var){
		$Cookie=Config::GetCookie();
		if(empty($Cookie["session"])){
			if(isset($_COOKIE[$Cookie['prefix'].$Var])){return $_COOKIE[$Cookie['prefix'].$Var];}
			return false;
		}else{
			if(isset($_SESSION[$Cookie['prefix'].$Var])){return $_SESSION[$Cookie['prefix'].$Var];}
			return false;
		}
	}
	public static function DefaultConfig(){
		return array(
			'Id' => '0',
			'Name' => '游客',
			'Group' => '4'
		);
	}
	public static function GetMember($Auth='User'){
		$Cookie=Config::GetCookie();
		$UserConfig=self::DefaultConfig();
		$codes=self::GetCookie($Auth);
		$code=explode("|",$codes);
		if(empty($code[0])||empty($code[1])){
			self::SetCookie($Auth,"");
			return $UserConfig;
		}
		if(md5($code[0].$Cookie['security'])!=$code[1]){
			self::SetCookie($Auth,"");
			return $UserConfig;
		}
		$Auth=$code[0];
		// list($UserConfig['Id'],$UserConfig['Name'],$UserConfig['Group']) = explode("\t",fauthcode($Auth,"DECODE"));
		$ListConfig=explode("\t",self::FauthCode($Auth,"DECODE"));
		$UserConfig['Id']=empty($ListConfig[0]) ? $UserConfig['Id'] : $ListConfig[0];
		$UserConfig['Name']=empty($ListConfig[1]) ? $UserConfig['Name'] : $ListConfig[1];
		$UserConfig['Group']=empty($ListConfig[2]) ? $UserConfig['Group'] : $ListConfig[2];
		if($UserConfig['Id']>0){
			self::SetCookie($Auth,$Auth."|".md5($Auth.$Cookie['security']));
			return $UserConfig;
		}
		self::SetCookie($Auth,"");
		return self::DefaultConfig();
	}
	public static function SetMember($UserConfig,$Auth='User'){
		$Cookie=Config::GetCookie();
		if(is_array($UserConfig)){
			$code=self::FauthCode("{$UserConfig['Id']}\t{$UserConfig['Name']}\t{$UserConfig['Group']}",'ENCODE');
		}else{
			$code='';
		}
		self::SetCookie($Auth,$code."|".md5($code.$Cookie['security']));
	}
	public static function FauthCode($string,$operation='ENCODE',$key=SECRETKEY){
		$Cookie=Config::GetCookie();
		$ckey_length=4; // 随机密钥长度 取值 0-32;
		                  // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
		                  // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
		                  // 当此值为 0 时，则不产生随机密钥
		$string=isset($string) ? $string : '';
		$key=md5($key ? $key : $Cookie['security']);
		$keya=md5(substr($key,0,16));
		$keyb=md5(substr($key,16,16));
		$keyc=$ckey_length ? ($operation=='DECODE' ? substr($string,0,$ckey_length) : substr(md5(microtime()),-$ckey_length)) : '';
		$cryptkey=$keya.md5($keya.$keyc);
		$key_length=strlen($cryptkey);
		$string=$operation=='DECODE' ? base64_decode(substr($string,$ckey_length)) : sprintf('%010d',0).substr(md5($string.$keyb),0,16).$string;
		$string_length=strlen($string);
		$result='';
		$box=range(0,255);
		$rndkey=array();
		for($i=0;$i<=255;$i++){
			$rndkey[$i]=ord($cryptkey[$i%$key_length]);
		}
		for($j=$i=0;$i<256;$i++){
			$j=($j+$box[$i]+$rndkey[$i])%256;
			$tmp=$box[$i];
			$box[$i]=$box[$j];
			$box[$j]=$tmp;
		}
		for($a=$j=$i=0;$i<$string_length;$i++){
			$a=($a+1)%256;
			$j=($j+$box[$a])%256;
			$tmp=$box[$a];
			$box[$a]=$box[$j];
			$box[$j]=$tmp;
			$result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
		}
		if($operation=='DECODE'){
			if((substr($result,0,10)==0||substr($result,0,10)>0)&&substr($result,10,16)==substr(md5(substr($result,26).$keyb),0,16)){
				return substr($result,26);
			}else{
				return '';
			}
		}else{
			return $keyc.str_replace('=','',base64_encode($result));
		}
	}
}