<?php
$this->LoadHelper('member/MemberListHelper');
$MemberListHelper=new MemberListHelper();
$this->LoadHelper('email/SendEmailHelper');
$SendEmailHelper=new SendEmailHelper();

if(!empty($this->Param['option'])){
    switch($this->Param['option']){
        /**
         * APP 重置密码接口文档
         * @param mobile 手机号码
         ***/
        case 'sendcode':

            if(empty($this->Param['mobile'])){
                $data = array(
                    'code' =>1,
                    'msg' => '手机号码不能为空'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $emialmobile = $this->Param['mobile'];

            $this->LoadResurces('sms/class.sms');
            $SMS=include CONFIG_PATH.'/Sms.php';
            $rest = new REST($SMS['serverip'],$SMS['port'],$SMS['ver']);
            $rest->setAccount($SMS['accountsid'],$SMS['accounttoken']);
            $rest->setAppId($SMS['appid']);
            $rnd = StringCode::RandomCode(6,'num');


            $MemberRow = $MemberListHelper->GetMemberRow(array('`mobile` = ?' => trim($emialmobile)));
            if(empty($MemberRow['id'])){
                $data = array(
                    'code' =>1,
                    'msg' => '电话号码不存在'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $preg = '/^1[0-9]{10}$/'; //简单的方法
            if (!preg_match($preg, $emialmobile)) {
                $data = array(
                    'code' =>1,
                    'msg' => '手机号码格式不正确'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $_SESSION['mobile'] = $emialmobile;
            $_SESSION['authCode'] = $rnd;

            $result = $rest->sendTemplateSMS($emialmobile,array($rnd),32782);

            if($result == NULL ) {
                $data = array(
                    'code' =>1,
                    'msg' => '短信发送失败'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }
            if($result->statusCode!=0) {

                $data = array(
                    'code' =>1,
                    'msg' => $result->statusMsg
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();

            }else{
                $data = array(
                    'code' =>0,
                    'data' => $rnd,
                    'msg' => '发送成功'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            break;
        case 'submit':
            /**
             * APP 重置密码接口文档
             * @param mobile 手机号码
             * @param code   短信验证码
             * @param password01   密码一
             * @param password02   密码二
             ***/

            if(empty($this->Param['mobile'])){
                $data = array(
                    'code' =>1,
                    'msg' => '请输入手机账号'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            if(empty($this->Param['code'])){
                $data = array(
                    'code' =>1,
                    'msg' => '请输入验证码'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            if(empty($this->Param['password01'])){
                $data = array(
                    'code' =>1,
                    'msg' => '请输入密码'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            if(trim($this->Param['password01']) != trim($this->Param['password02'])){
                $data = array(
                    'code' =>1,
                    'msg' => '两次密码不一致'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $email_mobile = trim($this->Param['mobile']);
            $code = trim($this->Param['code']);
            $password01 = trim($this->Param['password01']);
            $password02 = trim($this->Param['password02']);

            $password = md5($password01);
            $salt = rand(1000,9999);
            $data['salt'] = $salt;
            $data['password'] = md5($password.$salt);

            $MemberRow = $MemberListHelper->GetMemberRow(array('`mobile` = ?' => trim($email_mobile)));
            if(empty($MemberRow['id'])){
                $data = array(
                    'code' =>1,
                    'msg' => '电话号码不存在'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $where['`mobile` = ?'] = $email_mobile;

            $res = $MemberListHelper->memberUpdate($data,$where);
            if($res){
                $data = array(
                    'code' =>0,
                    'msg' => '设置密码成功'
                );

                echo $this->Param['callback']."(".json_encode($data).")";
                die();
            }

            $data = array(
                'code' =>1,
                'msg' => '设置密码失败'
            );

            echo $this->Param['callback']."(".json_encode($data).")";
            die();

            break;
        default:
    }
}