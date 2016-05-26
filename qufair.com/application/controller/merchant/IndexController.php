<?php

class IndexController extends Controller {

    public $Module = 'merchant';
    public $Controller = 'index';
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
    
}