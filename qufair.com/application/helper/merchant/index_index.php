<?php

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if (empty($this->Param['option'])) {
    echo $this->GetView('merchant_index.php');
} else {
    switch ($this->Param['option']) {
        case 'upavatar':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'], 'avatar');
            break;
        case 'submit':
            $avatar = empty($this->Param['avatar']) ? ErrorMsg::Debug('头像地址错误') : $this->Param['avatar'];
            $MemberDetailHelper->DetailUpdate(array('avatar' => $avatar), $this->UserConfig['Id']);
            Cache::Delete('id_'.$this->UserConfig['Id']);
            ErrorMsg::Debug('更新成功',TRUE);
            break;
        case 'ajaxedit':
            $col = empty($this->Param['col']) ? ErrorMsg::Debug('参数错误') : $this->Param['col'];
            $val = empty($this->Param['val']) ? ErrorMsg::Debug('参数值错误') : $this->Param['val'];
            switch($col){
                case 'company_note':
                    $data = array(
                        'company_note' => $val
                    );
                    $MemberDetailHelper->DetailUpdate($data, $this->UserConfig['Id']);
                    break;
                case 'email':
                    if(!StringCode::IsEmail($val)){
                        ErrorMsg::Debug('邮箱格式错误');
                    }
                    $data = array(
                        'email' => $val
                    );
                    //校验邮箱是否被占用
                    $check = $MemberListHelper->GetMemberRow(array(
                        '`email` = ?' => $val,
                        '`id` != ?' => $this->UserConfig['Id']
                    ));
                    if(!empty($check)){
                        ErrorMsg::Debug('该邮箱账号已被使用');
                    }
                    $MemberDetailHelper->Update($data, $this->UserConfig['Id']);
                    break;
                case 'mobile':
                    if(!StringCode::IsMobile($val)){
                        ErrorMsg::Debug('邮箱格式错误');
                    }
                    $data = array(
                        'mobile' => $val
                    );
                    //校验手机是否被占用
                    $check = $MemberListHelper->GetMemberRow(array(
                        '`mobile` = ?' => $val,
                        '`id` != ?' => $this->UserConfig['Id']
                    ));
                    if(!empty($check)){
                        ErrorMsg::Debug('改手机号已被使用');
                    }
                    $MemberDetailHelper->Update($data, $this->UserConfig['Id']);
                    $MemberDetailHelper->DetailUpdate($data, $this->UserConfig['Id']);
                    break;
                case 'password':
                    $rnd = StringCode::RandomCode(6);
                    $data = array(
                        'salt' => $rnd,
                        'password' => md5(md5($val).$rnd)
                    );
                    $MemberDetailHelper->Update($data, $this->UserConfig['Id']);
                    break;
                default:
            }
            Cache::Delete('id_'.$this->UserConfig['Id']);
            ErrorMsg::Debug('修改成功',TRUE);
            break;
        default :
    }
}