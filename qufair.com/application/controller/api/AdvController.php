<?php

class AdvController extends Controller {

    public $Module = 'api';
    public $Controller = 'adv';
    public $Action = 'index';
    public $UserConfig = array();

    public function PosAction() {
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }

}