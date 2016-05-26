<?php
if (!empty($this->Param['option'])) {
    $this->LoadHelper('login/LoginHelper');
    $LoginHelper = new LoginHelper();
    $res = $LoginHelper->Front($this->Param['email_mobile'], $this->Param['password'],4);
    if($res){
        ErrorMsg::Debug('登录成功',true);
    }else{
        ErrorMsg::Debug('登录失败');
    }


}else{
    echo $this->GetView('auth_login.php');
}