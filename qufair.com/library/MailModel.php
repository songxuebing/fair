<?php
class MailModel extends Module{
	public function __construct(){
		parent::__construct();
	}
	public function MailSend($Param){
		$Mail=Config::GetMail();
		/*
		$headers = 'From:{$Mail['username']} <{$Mail['from']}>\n';
		$headers .= 'MIME-Version: 1.0\n';
		$headers .= 'Content-type: text/html; charset=uft-8\r\n';
		return mail($Param['to'],'=?UTF-8?B?'.base64_encode($Param['title']).'?=',$Param['body'],$headers,null);
		*/
		require RESOURCES_PATH.'/mail/class.phpmailer.php';
		$mail=new PHPMailer();
		$mail->SetLanguage('zh_cn',RESOURCES_PATH.'/mail/language/');
		if(empty($Mail['enabled'])){
			// Set PHPMailer to use the sendmail transport
			$mail->IsSendmail();
		}else{
			$mail->IsSMTP();
			$mail->SMTPDebug=2;
			$mail->Debugoutput='html';
			$mail->Host=$Mail['smtphost'];
			// Set the SMTP port number - likely to be 25,465 or 587
			$mail->Port=$Mail['smtpport'];
			// Whether to use SMTP authentication
			$mail->SMTPAuth=true;
			// $mail->SMTPSecure = 'ssl';
			// Username to use for SMTP authentication
			$mail->Username=$Mail['username'];
			// Password to use for SMTP authentication
			$mail->Password=$Mail['password'];
		}
		// Set who the message is to be sent from
		$mail->SetFrom($Mail['from'],$Mail['username']);
		// Set who the message is to be sent to
		if(is_array($Param['to'])){
			foreach($Param['to'] as $value){
				if(!empty($value['email'])&&$value['username']){
					$mail->AddAddress($value['email'],$value['username']);
				}else{
					$mail->AddAddress($value);
				}
			}
		}else{
			$mail->AddAddress($Param['to']);
		}
		$mail->AddReplyTo($Mail['from'],$Mail['username']);
		// Set the subject line
		$mail->Subject=$Param['title'];
		// Read an HTML message body from an external file,convert referenced images to embedded,convert HTML into a basic plain-text alternative body
		$mail->IsHTML(true);
		$mail->Body=$Param['body'];
		// Replace the plain text body with one created manually
		$mail->AltBody='';
		// Attach an image file
		if(!empty($Param['attach'])){
			$mail->AddAttachment('images/phpmailer_mini.gif');
		}
		// Send the message,check for errors
		if(!$mail->Send()){
			ErrorMsg::Debug($mail->ErrorInfo);
			return $mail->ErrorInfo;
		}
		return true;
	}
}
