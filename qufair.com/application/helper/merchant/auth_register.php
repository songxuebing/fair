<?php

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('email/SendEmailHelper');
$SendEmailHelper = new SendEmailHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('industry/IndustryHelper');
$IndustryHelper = new IndustryHelper();

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

if (empty($this->Param['option'])) {
	$industryArr = $IndustryHelper->industryAll(array(
		'`parent_id` = ?' => 0
	));
	
	//查询全部默认标签
    $cTagRow = $ForumHelper->cTagAll(array(
        '`is_open` = ?' => 1,
        '`is_delete` = ?' =>0
    ),null,null,array('sort asc'));
    $this->Assign('cTagRow', $cTagRow);
	
	$this->Assign('industryArr', $industryArr);
	
    echo $this->GetView('auth_register.php');
} else {
    switch ($this->Param['option']) {
        case 'submit':
            if (!trim($this->Param['username'])) {
                ErrorMsg::Debug('用户名不能为空');
            }
            if (!trim($this->Param['password'])) {
                ErrorMsg::Debug('密码不能为空');
            }
			
			if(!trim($this->Param['mytag'])){
                ErrorMsg::Debug('请添加你的标签!');
            }

            //验证码判断
            $authCode = $_SESSION['authCode'];
            $yzm = $this->Param['yzm'];
            if ($authCode != $yzm) {
                ErrorMsg::Debug('验证码错误，请重新验证！');
            }

            $MemberRow = $MemberListHelper->GetMemberRow(array('`username` = ?' => trim($this->Param['username']),'`delete` = ? ' => 0));
            if (!empty($MemberRow['id'])) {
                ErrorMsg::Debug('用户名已存在');
            }

            $data['username'] = $this->Param['username'];
            $salt = rand(1000, 9999);
            $data['salt'] = $salt;
            $password = md5(trim($this->Param['password']));
            $data['password'] = md5($password . $salt);

            if ($this->Param['isemail'] == '0') {//emial
                $data['email'] = $this->Param['email_mobile'];

                $MemberRow = $MemberListHelper->GetMemberRow(array('`email` = ?' => trim($this->Param['email_mobile']),'`delete` = ? ' => 0));
                if (!empty($MemberRow['id'])) {
                    ErrorMsg::Debug('邮箱已存在');
                }
            } else {//电话
                $data['mobile'] = $this->Param['email_mobile'];

                $MemberRow = $MemberListHelper->GetMemberRow(array('`mobile` = ?' => trim($this->Param['email_mobile']),'`delete` = ? ' => 0));
                if (!empty($MemberRow['id'])) {
                    ErrorMsg::Debug('电话号码已存在');
                }
            }

            //入库
            $data['group'] = 4;
			$data['datetime'] = time();
			
            $res = $MemberListHelper->memberSave($data);
            if ($res) {
				
				//标签入库
				$tag = trim($this->Param['mytag']);
				$mytagid = trim($this->Param['mytagid']);

				if(!empty($tag)){
                    $tagArr = explode(' ',$tag);
                    $mytagid = explode(' ',$mytagid);

					if(!empty($tagArr)) foreach($tagArr as $key => $val){
                        $MemberListHelper->tagMemberSave(array(
                            'member_id' =>$res,
                            'mytag_id' => $mytagid[$key],
                            'tag_name' => $val
                        ));
                    }
                }

				
                //插入DETAIL
                $MemberDetailHelper->DetailSave(array(
                    'id' => $res,
                    'avatar' => '/attach/image/avatar/default_avatar.png'
                ),TRUE);
                Cookie::SetCookie('username', $data['username'], NOW_TIME + 86400 * 356);
                ErrorMsg::Debug('注册成功', TRUE);
            }
            ErrorMsg::Debug('保存失败');
            break;
        case 'sendcode':
            $isemail = $this->Param['isemail'];
            $emialmobile = $this->Param['emialmobile'];
            $username = $this->Param['username'];
            $code = empty($this->Param['code']) ? ErrorMsg::Debug('请输入图形验证码') : $this->Param['code'];
            $this->LoadHelper('auth/CaptchaHelper');
            $CaptchaHelper = new CaptchaHelper();
            $CaptchaHelper->Verification($code,'register');
            //验证码
            $randNumber = rand(100000, 999999);
            $_SESSION['authCode'] = $randNumber;
            if ($isemail == '0') {//发送email
                $data['email'] = $emialmobile;
                $data['username'] = $username;
                $state = $SendEmailHelper->SendSmtp($data);
            } else {//发送短信
                $preg = '/^1[0-9]{10}$/'; //简单的方法
                if (!preg_match($preg, $emialmobile)) {
                    ErrorMsg::Debug('手机号码格式不正确');
                }

                if ($_SESSION['sms_mobile']) {
                    if (strtotime(read_file($emialmobile)) > (time() - 60)) {
                        ErrorMsg::Debug('获取验证码太过频繁，一分钟之内只能获取一次。');
                    }
                }
                $data['mobile'] = $emialmobile;
                //$state = $SendSmsHelper->SendSms($data);
                $this->LoadResurces('sms/class.sms');
                $SMS=include CONFIG_PATH.'/Sms.php';
                $rest = new REST($SMS['serverip'],$SMS['port'],$SMS['ver']);
                $rest->setAccount($SMS['accountsid'],$SMS['accounttoken']);
                $rest->setAppId($SMS['appid']);
                $result = $rest->sendTemplateSMS($emialmobile,array($randNumber),32782);
                if($result->statusCode==0) {
                    $state['state'] = 'success';
                }
            }

            if ($state['state'] == 'success') {
                ErrorMsg::Debug('验证码已发送', TRUE);
            } else {
                ErrorMsg::Debug('验证码发送失败，请重新获取');
            }




            break;

        default :
    }
}