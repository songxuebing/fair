<?php
// Define path to resources directory
defined('RESOURCES_PATH') || define('RESOURCES_PATH',realpath(ROOT_PATH . '/resources'));
//当前时间
defined('NOW_TIME') || define('NOW_TIME', $_SERVER ['REQUEST_TIME'] ? $_SERVER ['REQUEST_TIME'] : time ());
//是否Ajax传递
defined('XML_R') || define('XML_R',!empty($_SERVER['HTTP_X_REQUESTED_WITH']) || !empty($_REQUEST['ajax']));
//host
defined('HTTP_HOST') || define('HTTP_HOST',$_SERVER['HTTP_HOST']);
//域
defined('WEB_DOMAIN') || define('WEB_DOMAIN',preg_replace('/^(www|admin|attach|crm|home|b)\./si','',$_SERVER['SERVER_NAME']));
//网站路径
defined('WEB_URL') || define('WEB_URL', 'http://'.WEB_DOMAIN);
//网站样式路径
defined('STYLE_URL') || define('STYLE_URL', 'http://cdn.qufair.com');
//附件路径
defined('ATTACH_IMAGE') || define('ATTACH_IMAGE', 'http://qzweb.b0.upaiyun.com');
//用户中心域名
defined('MEMBER_URL') || define('MEMBER_URL', 'http://home.'.WEB_DOMAIN);
//商家中心域名
defined('MERCHANT_URL') || define('MERCHANT_URL', 'http://b.'.WEB_DOMAIN);
//用户IP
defined('C_IP') || define('C_IP',Client::GetIp());
defined('IS_ZIP') || define('IS_ZIP',true);
//加密字符串
define('SECRETKEY','quzhanwiFeold4xfefdv');