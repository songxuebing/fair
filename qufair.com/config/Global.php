<?php
defined('IS_DEBUG')||define('IS_DEBUG',true);
error_reporting(IS_DEBUG==true ? E_ALL & ~E_NOTICE : 0);
date_default_timezone_set("Asia/Shanghai");
$_SERVER=$_SERVER ? $_SERVER : getenv();
if(PHP_VERSION<"4.1.0"){
	$_GET=&$HTTP_GET_VARS;
	$_POST=&$HTTP_POST_VARS;
	$_COOKIE=&$HTTP_COOKIE_VARS;
	$_SESSION=&$HTTP_SESSION_VARS;
	$_SERVER=&$HTTP_SERVER_VARS;
	$_ENV=&$HTTP_ENV_VARS;
	$_FILES=&$HTTP_POST_FILES;
}
$temp=urldecode($_SERVER['REQUEST_URI']);
if(strpos($temp,'<')!==false||strpos($temp,'"')!==false||strpos($temp,'>')!==false){
	die("Request Bad url");
}
include CONFIG_PATH."/Defined.php";

$IsZip=false;
if(0!==strpos($_SERVER['HTTP_USER_AGENT'],'Mozilla/4.0 (compatible; MSIE ')||false!==strpos($_SERVER['HTTP_USER_AGENT'],'Opera')){
	$IsZip=false;
}else{
	$version=(float)substr($_SERVER['HTTP_USER_AGENT'],30);
	$IsZip=($version<6||($version==6&&false===strpos($_SERVER['HTTP_USER_AGENT'],'SV1')));
}
defined('IS_ZIP')||define('IS_ZIP',$IsZip);

header("Cache-control:no-cache,must-revalidate");
header("Content-type:text/html;charset=utf-8");
session_cache_limiter('private,must-revalidate');
session_save_path(DATA_PATH."/session");
session_start();