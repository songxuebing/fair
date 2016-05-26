<?php
$this->LoadHelper('member/MemberListHelper');
$this->LoadHelper('member/MemberAvatarHelper');

$MemberListHelper=new MemberListHelper();
$MemberAvatarHelper=new MemberAvatarHelper();

/**
* APP 登陆接口文档
* @param username 用户名
* @param password 密码
***/
if(empty($this->Param['username'])){
    $data['code'] = 1;
    $data['msg'] = '用户名不能为空';
    echo $this->Param['callback']."(".json_encode($data).")";
    die();
}

if(empty($this->Param['password'])){
    $data['code'] = 1;
    $data['msg'] = '密码不能为空';
    echo $this->Param['callback']."(".json_encode($data).")";
    die();
}

$username = $this->Param['username'];
$password = $this->Param['password'];

$memberRow = $MemberListHelper->GetMemberRow(array(
    '`username` =? OR `mobile` = ?' => $username
));


$member_deatil = $MemberAvatarHelper->GetId($memberRow['id']);
$memberRow['avatar'] = $member_deatil['avatar'];

if(md5(md5($password).$memberRow['salt']) != $memberRow['password'] ){
    $data['code'] = 1;
    $data['msg'] = '密码不正确';

    echo $this->Param['callback']."(".json_encode($data).")";
    die();
}

$data['code'] = 0;
$data['member_info'] = $memberRow;
$data['msg'] = "登陆成功";

echo $this->Param['callback']."(".json_encode($data).")";
