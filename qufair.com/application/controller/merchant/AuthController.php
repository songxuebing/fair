<?php

class AuthController extends Controller {

    public $Module = 'merchant';
    public $Controller = 'auth';
    public $Action = 'index';
    public $UserConfig = array();
    
    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module.'/' . $this->Controller . '_' . $this->Action);
    }
    
    public function RegisterAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module.'/' . $this->Controller . '_' . $this->Action);
    }

    public function LoginActoin(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module.'/' . $this->Controller . '_' . $this->Action);
    }
    
    public function LogoutAction() {
        Cookie::SetMember(null, 'Merchant');
        header('Location:/auth/login/');
    }

    public function ResetAction() {
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