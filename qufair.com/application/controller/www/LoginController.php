<?php

class LoginController extends Controller {

    public $Module = 'www';
    public $Controller = 'login';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }

    public function LogoutAction() {
        Cookie::SetMember(null, 'User');
        if (empty($this->Param['option'])) {
            header('Location:/index/index/');
        } else {
            echo('<script>parent.location.href="/index/index";</script>');
        }
    }

    public function ResetAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }

}