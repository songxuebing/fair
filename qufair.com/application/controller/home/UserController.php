<?php

class UserController extends Controller {

    public $Module = 'home';
    public $Controller = 'user';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->LoadHelper('public/usercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
    
    public function CommentAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->LoadHelper('public/usercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
    
    public function FavoriteAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->LoadHelper('public/usercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }

    public function OrderAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->LoadHelper('public/usercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
    
    public function MessageAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->LoadHelper('public/usercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
    
    public function ForumAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->LoadHelper('public/usercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }

    public function ReceiptsAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);

        $this->LoadHelper('public/usercheck');

        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module . '/' . $this->Controller . '_' . $this->Action);
    }
}