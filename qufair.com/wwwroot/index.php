<?php
//301跳转
$the_host = $_SERVER['HTTP_HOST'];//取得当前域名

$the_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';//判断地址后面部分

$the_url = strtolower($the_url);//将英文字母转成小写

if($the_url=="/index.php")//判断是不是首页

{

$the_url="";//如果是首页,赋值为空

}

if($the_host !== 'www.qufair.com' && $the_host !== 'crm.qufair.com' && $the_host !== 'home.qufair.com' && $the_host !== 'b.qufair.com' && $the_host !== 'api.qufair.com')//如果域名不是带www的网址那么进行下面的301跳转

{

header('HTTP/1.1 301 Moved Permanently');//发出301头部

header('Location:http://www.qufair.com'.$the_url);//跳转到带www的网址

}




// The web path directory
defined('WEB_PATH')||define('WEB_PATH',dirname(__FILE__));
// The root path directory
defined('ROOT_PATH')||define('ROOT_PATH',dirname(WEB_PATH));
// Define path to configs path
defined('CONFIG_PATH')||define('CONFIG_PATH',realpath(ROOT_PATH.'/config'));
// Define path to library directory
defined('LIBRARY_PATH')||define('LIBRARY_PATH',realpath(ROOT_PATH.'/library'));
// Define path to application directory
defined('APPLICATION_PATH')||define('APPLICATION_PATH',realpath(ROOT_PATH.'/application'));
// tmp path
defined('DATA_PATH')||define('DATA_PATH',realpath(ROOT_PATH.'/data'));
//Global
include CONFIG_PATH.'/Global.php';
//__autoload
function __autoload($Class){
	if(file_exists(LIBRARY_PATH.'/'.$Class.'.php')){
		include LIBRARY_PATH.'/'.$Class.'.php';
	}
	return false;
}
//zip
if(IS_ZIP!=false&&XML_R==false){
	if(strstr($_SERVER['HTTP_USER_AGENT'],'compatible')&&ob_start('compress')){
		header('Content-Encoding: gzip');
	}else if(strstr($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip')&&ob_start('ob_gzhandler')){
		header('Content-Encoding: gzip');
	}else{
		ob_start();
	}
}else{
	ob_start();
}
//Controller
include CONFIG_PATH.'/Controller.php';
ob_end_flush();