<?php
/*
 *账号余额
 */
class BalanceController extends Controller {

    public $Module = 'api';
    public $Controller = 'balance';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }

    public function WithdrawalAction() {
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }

}