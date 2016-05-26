<?php
/*
 *供应商认证 
 */
class CertController extends Controller {

    public $Module = 'merchant';
    public $Controller = 'cert';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);
        
        $this->LoadHelper('public/suppliercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
    
    public function StepAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);
        
        $this->LoadHelper('public/suppliercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
    
    public function PaynotifyAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
}