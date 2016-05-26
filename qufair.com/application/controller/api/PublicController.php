<?php

class PublicController extends Controller {

    public $Module = 'api';
    public $Controller = 'pubilc';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);
        // 调用模版
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Action);
    }
    public function CommonAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig); 
        // 调用模版
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Action);
    }

    public function OrderAction() {//订单
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);
        // 调用模版
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Action);
    }

    public function PaybackAction() {//订单
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('User');
        $this->Assign('UserConfig', $this->UserConfig);
        // 调用模版
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper($this->Module.'/'.$this->Action);
    }
    
    /** 编辑器上传图片 */
    public function ImageAction() {
        $this->LoadHelper('upload/EditorUploadHelper');
        $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id'], 'goods_image');
        $EditorUploadHelper->ImageUpload($this->Param['filebox']);
    }

    public function FileAction() {
        $this->LoadHelper('upload/AttachHelper');
        $AttachHelper = new AttachHelper($this->UserConfig['Id'], 'excel_import');
        $excelRow = $AttachHelper->FileSubmit($_FILES['file']);

        if (!empty($excelRow['path'])) {
            $result = array('error' => 0, 'url' => $excelRow['path']);
        } else {
            $result = array('error' => 1, 'url' => '');
        }
        echo json_encode($result);
    }
}