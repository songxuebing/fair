<?php

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('email/SendEmailHelper');
$SendEmailHelper = new SendEmailHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if (!empty($this->Param['option'])) {

    switch ($this->Param['option']) {
        case 'submit':
            /**
             * APP 注册接口接口文档
             * @param mobile 手机号码
             * @param username 用户名
             * @param password 密码
             * @param yzm 短信验证码
             ***/

            if (!trim($this->Param['username'])) {
                $data = array(
                    'code' =>1,
                    'msg' => '用户名不能为空'
                );
                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }
            if (!trim($this->Param['password'])) {
                $data = array(
                    'code' =>1,
                    'msg' => '密码不能为空'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            if(!trim($this->Param['yzm'])){
                $data = array(
                    'code' =>1,
                    'msg' => '验证码错误，请重新验证！'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }


            $MemberRow = $MemberListHelper->GetMemberRow(array('`username` = ?' => trim($this->Param['username']),'`delete` = ? ' => 0));
            if (!empty($MemberRow['id'])) {
                $data = array(
                    'code' =>1,
                    'msg' => '用户名已存在'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $data['username'] = trim($this->Param['username']);
			$data['app_password'] = trim($this->Param['password']);//app 聊天密码
            $salt = StringCode::RandomCode(4,'num');
            $data['salt'] = $salt;
            $password = md5(trim($this->Param['password']));
            $data['password'] = md5($password . $salt);
			
			$data['mobile'] = trim($this->Param['mobile']);
			$data['datetime'] = time();

			$MemberRow = $MemberListHelper->GetMemberRow(array('`mobile` = ?' => trim($this->Param['mobile']),'`delete` = ? ' => 0));
			if (!empty($MemberRow['id'])) {
                $data = array(
                    'code' =>1,
                    'msg' => '电话号码已存在'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
			}

            //验证码判断
            $authCode = $_SESSION['authCode'];
            $yzm = trim($this->Param['yzm']);

            //入库            
            $data['group'] = 3;
            $res = $MemberListHelper->memberSave($data);
            if ($res) {
                //插入DETAIL
                $MemberDetailHelper->DetailSave(array(
                    'id' => $res,
                    'avatar' => '/attach/image/avatar/default_avatar.png'
                ),TRUE);
                Cookie::SetCookie('username', $data['username'], NOW_TIME + 86400 * 356);

                $data = array(
                    'code' =>0,
                    'msg' => '注册成功'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();

            }

            $data = array(
                'code' =>1,
                'msg' => '注册失败'
            );

            echo $this->Param['callback']."(".json_encode($data).")";
            die();

            break;
		case 'updata_apppwd':
			
			if (!trim($this->Param['member_id'])) {
                $data = array(
                    'code' =>1,
                    'msg' => '参数错误'
                );
                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }
			
			
			$MemberListHelper->memberUpdate(array(
				'app_password' =>$this->Param['app_password'] 
			),array(
				'`id` = ?' => $this->Param['member_id']
			));
			
			$data = array(
                'code' =>0,
                'msg' => '修改成功'
            );

            echo $this->Param['callback']."(".json_encode($data).")";
            die();
		
			break;
        case 'sendcode':
            /**
             * APP 注册短信接口接口文档
             * @param mobile 手机号码
             * @param username 用户名
             ***/

            if(empty($this->Param['mobile'])){
                $data = array(
                    'code' =>1,
                    'msg' => '请输入手机账号'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            if(empty($this->Param['username'])){
                $data = array(
                    'code' =>1,
                    'msg' => '请输入用户名'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $emialmobile = trim($this->Param['mobile']);
            $username = trim($this->Param['username']);

            //验证码
            $randNumber = StringCode::RandomCode(6,'num');
            $_SESSION['authCode'] = $randNumber;

            $preg = '/^1[0-9]{10}$/'; //简单的方法
            if (!preg_match($preg, $emialmobile)) {
                $data = array(
                    'code' =>1,
                    'msg' => '手机号码格式不正确'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }


            $data['mobile'] = $emialmobile;
            $this->LoadResurces('sms/class.sms');
            $SMS=include CONFIG_PATH.'/Sms.php';
            $rest = new REST($SMS['serverip'],$SMS['port'],$SMS['ver']);
            $rest->setAccount($SMS['accountsid'],$SMS['accounttoken']);
            $rest->setAppId($SMS['appid']);
            $result = $rest->sendTemplateSMS($emialmobile,array($randNumber),32782);
            if($result->statusCode==0) {
                $state['state'] = 'success';
            }

            if ($state['state'] == 'success') {
                $data = array(
                    'code' =>0,
                    'data'=>$randNumber,
                    'msg' => '验证码已发送'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            } else {
                $data = array(
                    'code' =>1,
                    'msg' => '验证码发送失败，请重新获取'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }
            break;

        default :
    }
}