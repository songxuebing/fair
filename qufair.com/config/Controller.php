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
                'merchant' => 'merchant',
				'api' =>'api'
	));
        
	if(HTTP_HOST=='crm.'.WEB_DOMAIN){
		$Controller->Param['module']='crm';
        }elseif(HTTP_HOST=='home.'.WEB_DOMAIN){
		$Controller->Param['module']='home';
        }elseif(HTTP_HOST=='api.'.WEB_DOMAIN){
		$Controller->Param['module']='api';
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
        $Controller->RouteRegex("ForumIndex",array(
                '\/news\/(\d+)\/(\d+)\/(\d+)\/(\d+)\.shtml',
                    array(
                        'controller' => 'forum',
                        'action'     => 'detail',
                       ),
                    array(
                        4 => 'id',
                        //1 => 'action',
                        //2 => 'id'
                     )
                   ));
        //url伪静态
        $Controller->RouteRegex2(
            array(
            array("convention",array(
            '\/convention\/(\d+)\/(\d+)\/(\d+)\/(\d+)\.shtml',
            array(
                'controller' => 'convention',
                'action'     => 'index',
                'option'     => 'detail',
            ),
            array(
                4 => 'id',
                //1 => 'action',
                //2 => 'id'
            )
        )),
            array("route",array(
                '\/route\/(\d+)\/(\d+)\/(\d+)\/(\d+)\.shtml',
                array(
                    'controller' => 'route',
                    'action'     => 'index',
                    'option'     => 'detail',
                ),
                array(
                    4 => 'id',
                )
            ))
            ,
            array("visa",array(
                '\/visa\/(\d+)\/(\d+)\/(\d+)\/(\d+)\.shtml',
                array(
                    'controller' => 'visa',
                    'action'     => 'index',
                    'option'     => 'detail',
                ),
                array(
                    4 => 'id',
                )
            )),
                array("logistics",array(
                    '\/logistics\/(\d+)\/(\d+)\/(\d+)\/(\d+)\.shtml',
                    array(
                        'controller' => 'logistics',
                        'action'     => 'index',
                        'option'     => 'detail',
                    ),
                    array(
                        4 => 'id',
                    )
                )),
                array("decoration",array(
                    '\/decoration\/(\d+)\/(\d+)\/(\d+)\/(\d+)\.shtml',
                    array(
                        'controller' => 'decoration',
                        'action'     => 'index',
                        'option'     => 'detail',
                    ),
                    array(
                        4 => 'id',
                    )
                ))
            )
        );
    }
	$Controller->SetParam();
	$Controller->run();
	// $Controller->Info();
}catch(Exception $e){
	die($e->getMessage());
}
