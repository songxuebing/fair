<?php
// amespace Library\ConfigClass;
class Config{
	public static $_Config=array();
	public static $_Cookie=array();
	public static $_Mail=array();
	public static $_Db=array();
	public static $_Cache=array();
	public static $_Upload=array();
	public static function GetConfig(){
		$Config=include CONFIG_PATH.'/Base.php';
		self::$_Config['charset']=$Config['charset'];
		self::$_Config['datemac']=$Config['datemac'];
		self::$_Config['filter']=$Config['filter'];
		self::$_Config['htmlzip']=$Config['htmlzip'];
		self::$_Config['gzip']=$Config['gzip'];
		self::$_Config['rewrite']=$Config['rewrite'];
		self::$_Config['version']=$Config['version'];
		self::$_Config['secret']=$Config['secret'];
		return self::$_Config;
	}
	public static function GetCookie(){
		$Cookie=include CONFIG_PATH.'/Cookie.php';
		self::$_Cookie['session']=$Cookie['session'];
		self::$_Cookie['prefix']=$Cookie['prefix'];
		self::$_Cookie['domain']=$Cookie['domain'];
		self::$_Cookie['path']=$Cookie['path'];
		self::$_Cookie['time']=$Cookie['time'];
		self::$_Cookie['security']=$Cookie['security'];
		return self::$_Cookie;
	}
	public static function GetMail(){
		$Mail=include CONFIG_PATH.'/Mail.php';
		self::$_Mail['enabled']=$Mail['enabled'];
		self::$_Mail['host']=$Mail['host'];
		self::$_Mail['username']=$Mail['username'];
		self::$_Mail['password']=$Mail['password'];
		self::$_Mail['pophost']=$Mail['pophost'];
		self::$_Mail['popport']=$Mail['popport'];
		self::$_Mail['smtphost']=$Mail['smtphost'];
		self::$_Mail['smtpport']=$Mail['smtpport'];
		return self::$_Mail;
	}
	public static function GetDb(){
		$Db=include CONFIG_PATH.'/Db.php';
		self::$_Db=array(
			'master'=>array(
				'type'=>$Db['master']['type'],
				'host'=>$Db['master']['host'],
				'user'=>$Db['master']['user'],
				'password'=>$Db['master']['password'],
				'dbname'=>$Db['master']['dbname'],
				'charset'=>$Db['master']['charset'],
				'prcode'=>$Db['master']['prcode'],
				'pconnect'=>$Db['master']['pconnect'],
				'port'=>$Db['master']['port']
			),
			'slave'=>array(
				'type'=>$Db['slave']['type'],
				'host'=>$Db['slave']['host'],
				'user'=>$Db['slave']['user'],
				'password'=>$Db['slave']['password'],
				'dbname'=>$Db['slave']['dbname'],
				'charset'=>$Db['slave']['charset'],
				'prcode'=>$Db['slave']['prcode'],
				'pconnect'=>$Db['slave']['pconnect'],
				'port'=>$Db['slave']['port']
			)
		);
		return self::$_Db;
	}
	public static function GetCache(){
		$Cache=include CONFIG_PATH.'/Cache.php';
		self::$_Cache['enabled']=$Cache['enabled'];
		self::$_Cache['host']=$Cache['host'];
		self::$_Cache['port']=$Cache['port'];
		self::$_Cache['pconnect']=$Cache['pconnect'];
		return self::$_Cache;
	}
	public static function GetUpload(){
		$Upload=include CONFIG_PATH.'/Upload.php';
		self::$_Upload['savepath']=$Upload['savepath'];
		self::$_Upload['wateron']=$Upload['wateron'];
		self::$_Upload['waterfile']=$Upload['waterfile'];
		self::$_Upload['watertext']=$Upload['watertext'];
		self::$_Upload['waterplace']=$Upload['waterplace'];
		self::$_Upload['wateralpha']=$Upload['wateralpha'];
		self::$_Upload['bgcolor']=$Upload['bgcolor'];
		self::$_Upload['max']=$Upload['max'];
		self::$_Upload['type']=$Upload['type'];
		return self::$_Upload;
	}
}