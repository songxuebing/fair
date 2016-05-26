<?php
class EntrustController extends Controller{
	public $Module='www';
	public $Controller='entrust';
	public $Action='index';
	public $UserConfig=array();
	public function IndexAction(){
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('User');
		$this->Assign('UserConfig',$this->UserConfig);
                
        $this->LoadHelper($this->Module . '/front_base');
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
		$this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
	}

           
}