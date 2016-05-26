<?php
class IndexController extends Controller{
	public $Module='crm';
	public $Controller='index';
	public $Action='index';
	public $UserConfig=array();
	public function IndexAction(){
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('Admin');
		$this->Assign('UserConfig',$this->UserConfig);
                if(empty($this->UserConfig['Id'])){
                    header('Location:/auth/login');
                    die();
                }
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
		$this->LoadHelper('crm/'.$this->Controller.'_'.$this->Action);                  
	}
        public function MainAction(){
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('Admin');
		$this->Assign('UserConfig',$this->UserConfig);
                if(empty($this->UserConfig['Id'])){
                    header('Location:/auth/login');
                    die();
                }
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
		echo $this->GetView('main.php');         
	}
        
        public function TopAction(){
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('Admin');
		$this->Assign('UserConfig',$this->UserConfig);
                if(empty($this->UserConfig['Id'])){
                    header('Location:/auth/login');
                    die();
                }
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
		$this->LoadHelper('crm/'.$this->Controller.'_'.$this->Action);                   
        }
        
        public function LeftAction(){
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('Admin');
		$this->Assign('UserConfig',$this->UserConfig);
                if(empty($this->UserConfig['Id'])){
                    header('Location:/auth/login');
                    die();
                }
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
		$this->LoadHelper('crm/'.$this->Controller.'_'.$this->Action);                   
        }
	public function RightAction(){
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('Admin');
		$this->Assign('UserConfig',$this->UserConfig);
                if(empty($this->UserConfig['Id'])){
                    header('Location:/auth/login');
                    die();
                }
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
		$this->LoadHelper('crm/'.$this->Controller.'_'.$this->Action);                   
        }
        public function MiddleAction(){
		// 赋值
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);            
		echo $this->GetView('middle.php');               
        }
}