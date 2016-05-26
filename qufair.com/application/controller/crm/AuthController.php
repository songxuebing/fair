<?php
class AuthController extends Controller{
	public $Module='crm';
	public $Controller='auth';
	public $Action='index';
	public $UserConfig=array();
	public function IndexAction(){
                
	}
        public function LoginAction(){
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('Admin');
		$this->Assign('UserConfig',$this->UserConfig);
                //$this->SetPurview($this->UserConfig,$this->Module,$this->Controller,$this->Action);
		// 调用模版
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
		$this->LoadHelper('crm/'.$this->Controller.'_'.$this->Action);       
        }
        public function LogoutAction(){
                Cookie::SetMember(null, 'Admin');

                if(empty($this->Param['option'])){
                    header('Location:/auth/login/');
                }else{
                    echo('<script>parent.location.href="/auth/login";</script>');
                }
        }
}