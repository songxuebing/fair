<?php

class UserController extends Controller {

    public $Module = 'api';
    public $Controller = 'user';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {//列表
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }

    public function DetailAction(){
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }

    public function OrderAction() {//订单
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }

    public function CommentAction() {//订单
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }

    public function ForumAction() {//订单
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }

    public function MessageAction() {//订单
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }

    public function AllAction() {//全部会员
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
        $this->Assign('UserConfig',$this->UserConfig);
        $this->SetView($this->Module.'/common');
        $this->AddView($this->Module.'/'.$this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Controller.'_'.$this->Action);
    }
	
	public function MemberinfoAction() {//获取用户登录信息
        // 赋值
        $this->Config=Config::GetConfig();
        $this->Assign('Config',$this->Config);
        $this->UserConfig=Cookie::GetMember('User');
		
		$data['code'] = 0;
		$data['member_info'] = $this->UserConfig;
		
		echo $this->Param['callback']."(".json_encode($data).")";
    }

}