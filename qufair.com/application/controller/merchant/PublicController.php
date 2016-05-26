<?php

class PublicController extends Controller {

    public $Module = 'merchant';
    public $Controller = 'pubilc';
    public $Action = 'index';
    public $UserConfig = array();
    
    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);
        if (empty($this->UserConfig['Id'])) {
            ErrorMsg::Debug('尚未登录');
        }
        //$this->SetPurview($this->UserConfig,$this->Module,$this->Controller,$this->Action);
        // 调用模版
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Controller.'/'.$this->Action);
    }
    
    public function CommonAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig); 
        // 调用模版
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Controller.'/'.$this->Action);
    }

    /*
     * 图形验证码
     */
    public function CaptchaAction(){
            $code=empty($this->Param['code'])?'0':intval($this->Param['code']);
            $length=empty($this->Param['length'])?'4':intval($this->Param['length']);
            $lefttime=empty($this->Param['lefttime'])?'900':intval($this->Param['lefttime']);
            $options=array();
            $options['name']=empty($this->Param['name'])?'0':$this->Param['name'];
            $options['width']=empty($this->Param['width'])?'100':intval($this->Param['width']);
            $options['height']=empty($this->Param['height'])?'30':intval($this->Param['height']);
            $options['font']=!empty($this->Param['font'])?intval($this->Param['font']):intval($options['height']*0.6);

            $this->LoadHelper('auth/CaptchaHelper');
            $CaptchaHelper=new CaptchaHelper();
            $CaptchaHelper->Export($code,$length,$lefttime,$options);
    }
    /*
     * 百度编辑器控制类
     */
    public function UeditorAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Merchant');
        $this->Assign('UserConfig', $this->UserConfig);
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper('public/ueditor');
    }
}