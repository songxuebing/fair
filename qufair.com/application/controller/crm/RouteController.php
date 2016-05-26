<?php

class RouteController extends Controller {

    public $Module = 'crm';
    public $Controller = 'route';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Admin');
        $this->Assign('UserConfig', $this->UserConfig);
        $this->SetPurview($this->UserConfig, $this->Module, $this->Controller, $this->Action);
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }

    public function OrderAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Admin');
        $this->Assign('UserConfig', $this->UserConfig);
        $this->SetPurview($this->UserConfig, $this->Module, $this->Controller, $this->Action);
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
    
}