<?php
class SendEmailHelper extends Helper{
	public function __construct(){
	}

    //发生邮件
    public function SendSmtp($data){
        $this->LoadResurces('email/PHPMailerAutoload');
        $MailConfig=include CONFIG_PATH.'/Mail.php';

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->SMTPDebug = 2;// Set mailer to use SMTP
        $mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
        $mail->Port = 994;                                    // TCP port to connect to
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $MailConfig['username'];                 // SMTP username
        $mail->Password = $MailConfig['password'];                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted

        $mail->setFrom($MailConfig['username'], '去展');
        $mail->addAddress($data['email'], $data['username']);     // Add a recipient
        $mail->addReplyTo($data['email'], $data['username']);

        $mail->Subject = '去展注册验证';
        $mail->Body    = '验证码：'.$_SESSION['authCode'];

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

}