<?php

class PublicController extends Controller {

    public $Module = 'crm';
    public $Controller = 'pubilc';
    public $Action = 'index';
    public $UserConfig = array();

    public function IndexAction() {
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Admin');
        $this->Assign('UserConfig', $this->UserConfig);
        if (empty($this->UserConfig['Id'])) {
            ErrorMsg::Debug('尚未登录');
        }
        //$this->SetPurview($this->UserConfig,$this->Module,$this->Controller,$this->Action);
        // 调用模版
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper('public/index');
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

    //验证码
    public function AuthCode() {
        $randNumber = rand(10000, 99999);

        $_SESSION['authCode'] = $randNumber;

        echo $randNumber;
    }

    //发生邮件
    public function SendSmtp($data) {
        $this->LoadResurces('email/PHPMailerAutoload.php');
        $MailConfig = include CONFIG_PATH . '/Mail.php';

        $mail = new PHPMailer;

        $mail->isSendmail();
        $mail->CharSet = 'UTF-8';
        $mail->Host = $MailConfig['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $MailConfig['username'];
        $mail->Password = $MailConfig['password'];
        $mail->SMTPSecure = 'tls';

        $mail->setFrom($data['email'], $data['username']);

        $mail->addReplyTo($MailConfig['username'], '去展');

        $mail->addAddress($MailConfig['username'], '去展');

        $mail->Subject = '去展注册验证';

        $mail->AltBody = '验证码：' . $_SESSION['authCode'];

        $msg = array();
        if (!$mail->send()) {
            $msg['state'] = 'failed';
            $msg['message'] = $mail->ErrorInfo;
        } else {
            $msg['state'] = 'success';
            $msg['message'] = '发送成功';
        }

        echo json_encode($msg);
    }
    
    //百度编辑器控制类
    public function UeditorAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Admin');
        $this->Assign('UserConfig', $this->UserConfig);
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper('public/ueditor');
    }
	
	//管理员管理供应商发布的内容
	/*
	* 统一模拟登陆
	*/
	public function AutologinAction(){
        // 赋值
        $this->Config = Config::GetConfig();
        $this->Assign('Config', $this->Config);
        $this->UserConfig = Cookie::GetMember('Admin');
        $this->Assign('UserConfig', $this->UserConfig);
        $this->SetView($this->Module . '/common');
        $this->AddView($this->Module . '/' . $this->Controller);
        $this->LoadHelper('public/autologin');
    }
}