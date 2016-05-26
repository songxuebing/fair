<?php
    //公共部分
    $this->LoadHelper('member/MemberListHelper');
    $MemberListHelper = new MemberListHelper();
    $this->LoadHelper('member/MemberDetailHelper');
    $MemberDetailHelper = new MemberDetailHelper();
    $this->LoadHelper('user/UserAddressHelper');
    $UserAddressHelper = new UserAddressHelper();

    //获取详细信息
    $menberInfo = $MemberDetailHelper->GetMember($this->UserConfig['Id']);

    $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));
    $number = 0;
    if(!empty($menberInfo['mobile'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['address'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['company'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['avatar'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['sex'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['province'])){
        $number= $number+12.5;
    }
    if(!empty($menberInfo['city'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['area'])){
        $number= $number+12.5;
    }

    $menberInfo['number'] = $number;
    if(empty($menberInfo['mobile'])){
        $menberInfo['mobile'] = $memberRow['mobile'];
    }

    $this->Assign('menberInfo',$menberInfo);

    if(empty($this->Param['option'])){
        $id = empty($this->UserConfig['Id']) ? 0 : $this->UserConfig['Id'];

        $this->Assign('id',$id);
        echo $this->GetView('user_index.php');
    }else{
        switch($this->Param['option']){
            case 'submit'://修改企业资料

                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $data['avatar'] = $this->Param['cover'];
                $data['company'] = $this->Param['company'];
                $data['sex'] = $this->Param['sex'];
                $data['mobile'] = $this->Param['mobile'];
                $data['address'] = $this->Param['address'];

                $menberData['province'] = $this->Param['ship_province'];
                $menberData['city'] = $this->Param['ship_city'];
                $menberData['area'] = $this->Param['ship_area'];

                $MemberListHelper->memberUpdate($menberData, array('`id` =?' =>$id));

                if($id > 0){
                    $res = $MemberDetailHelper->DetailGetId(array('`id` = ?'=>$id));

                    if($res > 0){
                        $MemberDetailHelper->DetailUpdate($data,$id);
                    }else{
                        $data['id'] = $id;
                        $MemberDetailHelper->DetailSave($data);
                    }
                    //删除缓存
                    Cache::Delete('id_'.$id);
                    ErrorMsg::Debug('保存成功', TRUE);
                }

                ErrorMsg::Debug('编辑失败');
                break;
            case 'uploadImg'://上传企业头像
                $this->LoadHelper('upload/EditorUploadHelper');
                $EditorUploadHelper=new EditorUploadHelper($this->UserConfig);
                $EditorUploadHelper->ImageUpload($this->Param['filebox'],'avatar');

                break;
            case 'password'://修改密码
                $id = empty($this->UserConfig['Id']) ? 0 : $this->UserConfig['Id'];

                $this->Assign('id',$id);
                echo $this->GetView('user_index_password.php');
                break;
            case 'updataPassword'://处理密码修改
                $id = empty($this->UserConfig['Id']) ? 0 : $this->UserConfig['Id'];

                if($id > 0){
                    $password = $this->Param['password'];
                    $password01 = $this->Param['password01'];
                    $passwordold = $this->Param['passwordold'];

                    if($password != $password01){
                        ErrorMsg::Debug('两次密码不一致!');
                    }

                    $result = $MemberListHelper->GetMemberRow(array('`id` = ?' => $id));
                    if($result['password'] !=(md5(md5($passwordold).$result['salt']))){
                        ErrorMsg::Debug('原始密码错误!');
                    }

                    $password = md5($password);
                    $salt = rand(1000,9999);
                    $data['salt'] = $salt;
                    $data['password'] = md5($password.$salt);

                    $res = $MemberListHelper->memberUpdate($data,array('`id` = ?' => $id));
                    if($res){
                        ErrorMsg::Debug('修改密码成功',TRUE);
                    }
                }

                ErrorMsg::Debug('修改失败');
                break;
            case 'address'://地址管理

                $id = empty($this->UserConfig['Id']) ? 0 : $this->UserConfig['Id'];
                $limit=10;
                $page=empty($this->Param['page']) ? 0 : $this->Param['page'];
                $where=array();
                $where=array('`member_id` = ?'=>$id);
                $data=$UserAddressHelper->GetAllWhere($where,$limit,$page,$this->Param);
                $this->Assign('data',$data);
                $this->Assign('param',$this->Param);

                echo $this->GetView('user_index_address.php');
                break;
            case 'default_address':
                $addressId = empty($this->Param['address_id']) ? 0 : $this->Param['address_id'];

                $isDefault = empty($this->Param['is_default']) ? 0 : $this->Param['is_default'];
                $data['is_default'] = $isDefault;
                $where['`address_id` = ?'] = $addressId;

                $result = $UserAddressHelper->Update($data, $where);

                if($result > 0){
                    $msg['state'] = 'success';
                }else{
                    $msg['state'] = 'faild';
                }

                echo json_encode($msg);
                break;
            default :
        }
    }