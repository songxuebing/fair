<?php

class VisaController extends Controller {

    public $Module = 'merchant';
    public $Controller = 'visa';
    public $Action = 'index';
    public $UserConfig = array();

    public function AddAction() {//展会发布
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

    public function ListAction() {
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

    public function OrderAction() {
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

}