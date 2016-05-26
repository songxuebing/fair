<?php
// se Library\ControllerClass\Controller as EC_Controller;
try{
	$Controller=new Controller();
	$Controller->BootStrap();
	$Controller->SetDirectory(array(
		//'default' => HTTP_HOST,
                'default'   =>  'www',
                'crm'       =>  'crm',
                'home'    =>  'home',
                'merchant' => 'merchant'
	));
        
	if(HTTP_HOST=='crm.'.WEB_DOMAIN){
		$Controller->Param['module']='crm';
        }elseif(HTTP_HOST=='home.'.WEB_DOMAIN){
		$Controller->Param['module']='home';
        }elseif(HTTP_HOST=='b.'.WEB_DOMAIN){
		$Controller->Param['module']='merchant';
        }elseif(HTTP_HOST=='attach.'.WEB_DOMAIN){
		$Controller->RouteRegex("AttachIndex",array(
			'\/([photo|file])\/(\d+)',
			array(
				'controller' => 'index'
			),
			array(
				1 => 'action',
				2 => 'id'
			)
		));
	}else{
		// 按需添加URL重构路由
		
	}
	$Controller->SetParam();
	$Controller->run();
	// $Controller->Info();
}catch(Exception $e){
	die($e->getMessage());
}