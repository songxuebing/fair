<?php
$this->LoadHelper('member/MemberListHelper');
$MemberListHelper=new MemberListHelper();
$this->LoadHelper('email/SendEmailHelper');
$SendEmailHelper=new SendEmailHelper();
//$this->LoadHelper('sms/SendSmsHelper');
//$SendSmsHelper=new SendSmsHelper();
if(empty($this->Param['option'])){
    echo $this->GetView('auth_reset.php');
}else{
    switch($this->Param['option']){
        case 'sendcode':

            $isemail = $this->Param['isemail'];
            $emialmobile = $this->Param['emialmobile'];

            if($isemail == '0'){//发送email
                //验证码
                $randNumber = rand(100000,999999);
                $_SESSION['authCode'] = $randNumber;

                $MemberRow = $MemberListHelper->GetMemberRow(array('`email` = ?' => trim($emialmobile)));

                if(empty($MemberRow['id'])){
                    ErrorMsg::Debug('邮箱不存在');
                }

                $data['email'] =  $emialmobile;
                $data['username'] = $MemberRow['username'];
                $state = $SendEmailHelper->SendSmtp($data);

            }else{//发送短信

                $this->LoadResurces('sms/class.sms');
                $SMS=include CONFIG_PATH.'/Sms.php';
                $rest = new REST($SMS['serverip'],$SMS['port'],$SMS['ver']);
                $rest->setAccount($SMS['accountsid'],$SMS['accounttoken']);
                $rest->setAppId($SMS['appid']);
                $rnd = StringCode::RandomCode(6,'num');


                $MemberRow = $MemberListHelper->GetMemberRow(array('`mobile` = ?' => trim($emialmobile)));
                if(empty($MemberRow['id'])){
                    ErrorMsg::Debug('电话号码不存在');
                }

                $preg = '/^1[0-9]{10}$/'; //简单的方法
                if (!preg_match($preg, $emialmobile)) {
                    ErrorMsg::Debug('手机号码格式不正确');
                }

                if ($_SESSION['sms_mobile']) {
                    if (strtotime(read_file($emialmobile)) > (time() - 60)) {
                        ErrorMsg::Debug('获取验证码太过频繁，一分钟之内只能获取一次。');
                    }
                }

                $_SESSION['mobile'] = $emialmobile;
                $_SESSION['authCode'] = $rnd;

                $result = $rest->sendTemplateSMS($emialmobile,array($rnd),32782);

                if($result == NULL ) {
                    ErrorMsg::Debug("result error!");
                    break;
                }
                if($result->statusCode!=0) {
                    $state['state'] =  'failed';
                    $state['message'] = $result->statusMsg;
                }else{
                    $state['state'] = 'success';
                    $state['message'] = '发送成功';
                }

            }

            if($state['state'] == 'success'){
                ErrorMsg::Debug('验证码已发送',TRUE);
            }else{
                ErrorMsg::Debug('验证码发送失败，请重新获取');
            }

            break;
        case 'submit':

            $email_mobile = empty($this->Param['email_mobile']) ? ErrorMsg::Debug('请输入邮箱或手机账号') : $this->Param['email_mobile'];
            $code = empty($this->Param['code']) ? ErrorMsg::Debug('请输入验证码') : $this->Param['code'];
            $password01 = $this->Param['password01'];
            $password02 = $this->Param['password02'];
            $isemail = $this->Param['isemail'];

            //验证码判断
            $authCode = $_SESSION['authCode'];
            if($authCode != $code){
                ErrorMsg::Debug('验证码错误，请重新验证！');
            }

            if($password01 != $password02){
                ErrorMsg::Debug('两次密码不一致!');
            }

            $password = md5($password01);
            $salt = rand(1000,9999);
            $data['salt'] = $salt;
            $data['password'] = md5($password.$salt);

            if($isemail == '0'){
                $MemberRow = $MemberListHelper->GetMemberRow(array('`email` = ?' => trim($email_mobile)));

                if(empty($MemberRow['id'])){
                    ErrorMsg::Debug('邮箱不存在');
                }

                $where['`email` = ?'] = $email_mobile;
            }else{

                $MemberRow = $MemberListHelper->GetMemberRow(array('`mobile` = ?' => trim($email_mobile)));
                if(empty($MemberRow['id'])){
                    ErrorMsg::Debug('电话号码不存在');
                }

                $where['`mobile` = ?'] = $email_mobile;
            }

            $res = $MemberListHelper->memberUpdate($data,$where);
            if($res){
                ErrorMsg::Debug('设置密码成功',TRUE);
            }

            ErrorMsg::Debug('设置密码失败');

            break;
        default:
    }
}
