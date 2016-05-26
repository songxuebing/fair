<?php

class LoginHelper extends Helper {

    var $MemberModel;

    public function __construct() {
        $this->MemberModel = $this->LoadModel('Member');
    }

    public function Submit($username, $password) {
        if (empty($username)) {
            ErrorMsg::Debug('帐号不能为空');
        }
        if (empty($password) || $password == md5('')) {
            ErrorMsg::Debug('密码不能为空');
        }
        $where = array();
        if (StringCode::IsMobile($username)) {
            $where['`mobile` = ?'] = $username;
        } elseif (StringCode::IsEmail($username)) {
            $where['`email` = ?'] = $username;
        } else {
            $where['`username` = ?'] = $username;
        }

        $where['`delete` = ?'] = 0;
        $MemberRow = $this->MemberModel->GetRow($where);

        if (empty($MemberRow['id'])) {
            ErrorMsg::Debug('登录账户不存在。');
        }
        if ($MemberRow['delete'] != 0) {
            ErrorMsg::Debug('登录账户已经被删除。');
        }
        if ($MemberRow['enabled'] == 0) {
            ErrorMsg::Debug('账户已经被冻结。');
        }
        $password = md5($password);
        if ($MemberRow['password'] != md5($password . $MemberRow['salt'])) {
            ErrorMsg::Debug('密码不正确。');
        }
        Cookie::SetCookie('username', $username, NOW_TIME + 86400 * 356);
        return $MemberRow;
    }

    public function Front($username, $password,$group = 0) {
        $MemberRow = $this->Submit($username, $password);
        /*
        if($group>0 && $MemberRow['group'] != $group){
            ErrorMsg::Debug('用户与登陆口不符');
        }*/
        //清除用户中心COOKIE
        
        $UserConfig = array();
        $UserConfig['Id'] = $MemberRow['id'];
        $UserConfig['Name'] = $MemberRow['username'];
        $UserConfig['Group'] = $MemberRow['group'];
        if($group == 3){
            $auth = 'User';
        }elseif($group == 4){
            $auth = 'Merchant';
        }
        Cookie::SetMember($UserConfig,$auth);
	/**
        $this->LoadHelper('member/MemberDetailHelper');
        $MemberDetailHelper = new MemberDetailHelper();
        $MemberDetailHelper->LoginSession($MemberRow, true);
        $MemberDetailHelper->SetLogs($UserConfig, '登录网站', $_REQUEST);
	**/
        return $MemberRow;
        //ErrorMsg::Debug('登录成功',true);
    }
	
	
	public function adminSubmit($username, $password) {
        if (empty($username)) {
            ErrorMsg::Debug('帐号不能为空');
        }
        if (empty($password) || $password == md5('')) {
            ErrorMsg::Debug('密码不能为空');
        }
        $where = array();
        if (StringCode::IsMobile($username)) {
            $where['`mobile` = ?'] = $username;
        } elseif (StringCode::IsEmail($username)) {
            $where['`email` = ?'] = $username;
        } else {
            $where['`username` = ?'] = $username;
        }

        $where['`delete` = ?'] = 0;
        $MemberRow = $this->MemberModel->GetRow($where);

        if (empty($MemberRow['id'])) {
            ErrorMsg::Debug('登录账户不存在。');
        }
        if ($MemberRow['delete'] != 0) {
            ErrorMsg::Debug('登录账户已经被删除。');
        }
        if ($MemberRow['enabled'] == 0) {
            ErrorMsg::Debug('账户已经被冻结。');
        }
        $password = $password;
        if ($MemberRow['password'] != $password) {
            ErrorMsg::Debug('密码不正确。');
        }
        Cookie::SetCookie('username', $username, NOW_TIME + 86400 * 356);
        return $MemberRow;
    }

    public function adminFront($username, $password,$group = 0) {
        $MemberRow = $this->adminSubmit($username, $password);
        
        $UserConfig = array();
        $UserConfig['Id'] = $MemberRow['id'];
        $UserConfig['Name'] = $MemberRow['username'];
        $UserConfig['Group'] = $MemberRow['group'];
        if($group == 3){
            $auth = 'User';
        }elseif($group == 4){
            $auth = 'Merchant';
        }
        Cookie::SetMember($UserConfig,$auth);
        return $MemberRow;
    }

    public function Logout() {
        Cookie::SetMember(null, 'User');
        ErrorMsg::Debug('退出成功', true, '/index.php/');
    }

}