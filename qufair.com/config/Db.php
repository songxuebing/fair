<?php
return array(
	//主库 写操作
	'master'=>array(
		'type' => 'pdo_mysql',
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => '123456',//'qufairzjztt##$$',
		'dbname' => 'sql_qufair',
		'charset' => 'utf8',
		'prcode' => 'dyhl_',
		'pconnect' => '',
		'port' => '3306'
	),
	//从库 读操作
	'slave'=>array(
		'type' => 'pdo_mysql',
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => '123456',//'qufairzjztt##$$',
		'dbname' => 'sql_qufair',
		'charset' => 'utf8',
		'prcode' => 'dyhl_',
		'pconnect' => '',
		'port' => '3306'
	)
);
