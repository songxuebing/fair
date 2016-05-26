<?php
    $this->LoadHelper('supplier/SupplierHelper');
    $SupplierHelper=new SupplierHelper();
    
    $this->LoadHelper('member/MemberListHelper');
    $MemberListHelper=new MemberListHelper();
    
    $this->LoadHelper('member/MemberDetailHelper');
    $MemberDetailHelper=new MemberDetailHelper();

    if(empty($this->Param['option'])){
        $limit=10;
        $page=empty($this->Param['page']) ? 0 : $this->Param['page'];
        $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
        
        $where=array();
        $where=array('`cert_id` > ?' => 0);
        
        switch($list){
            case 'waitpay':
                $where['`pay_status` = ?'] = 0;
                $where['`cert_state` = ?'] = 0;
                break;
            case 'waitaudit':
                $where['`pay_status` = ?'] = 1;
                $where['`cert_state` = ?'] = 1;
                $where['`audit_state` = ?'] = 0;
                break;
            case 'waitmoney':
                $where['`pay_status` = ?'] = 1;
                $where['`cert_state` = ?'] = 1;
                $where['`audit_state` = ?'] = 1;
                $where['`money_check` = ?'] = 0;
                break;
            case 'finish':
                $where['`cert_state` = ?'] = 2;
                break;
        }
        
        $data=$SupplierHelper->certPageList($where,$limit,$page,$this->Param);
        if(!empty($data['All'])) {
            foreach($data['All'] as $k => $v){
                $member_row = $MemberListHelper->GetMemberRow(array(
                    '`id` = ?' => $v['member_id']
                ));

                $data['All'][$k]['mobile'] = $member_row['mobile'];
            }
        }

        $this->Assign('data',$data);
	$this->Assign('param',$this->Param);
        echo $this->GetView('supplier_cert.php');

    }else{
        switch($this->Param['option']){
            case 'edit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $this->Assign('id',$id);
                $cert_row = $SupplierHelper->certRow($id);
                if(empty($cert_row)){
                    ErrorMsg::Debug('未找到相关认证信息');
                }else{
                    $cert_row['operater_cert'] = unserialize($cert_row['operater_cert']);
                    $this->Assign('data',$cert_row);
                }
                echo $this->GetView('supplier_cert_edit.php');
                break;
            case 'submit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $cert_row = $SupplierHelper->certRow($id);
                if(empty($cert_row)){
                    ErrorMsg::Debug('未找到相关认证信息');
                }
                $data['company_name'] = empty($this->Param['company_name']) ? ErrorMsg::Debug('企业全称不能为空') : $this->Param['company_name'];
                $data['company_owner'] = empty($this->Param['company_owner']) ? ErrorMsg::Debug('企业法人代表不能为空') : $this->Param['company_owner'];
                /**
                $data['owner_cardno'] = empty($this->Param['owner_cardno']) ? ErrorMsg::Debug('法人身份证号不能为空') : $this->Param['owner_cardno'];
                if (!StringCode::isCreditNo($data['owner_cardno'])) {
                    ErrorMsg::Debug('法人身份证号错误');
                }
                $data['owner_mobile'] = empty($this->Param['owner_mobile']) ? ErrorMsg::Debug('法人手机号不能为空') : $this->Param['owner_mobile'];
                if (!StringCode::IsMobile($data['owner_mobile'])) {
                    ErrorMsg::Debug('法人手机号错误');
                }
                */
                //$data['company_service'] = empty($this->Param['company_service']) ? ErrorMsg::Debug('企业服务信息不能为空') : $this->Param['company_service'];
                $data['company_tel'] = empty($this->Param['company_tel']) ? ErrorMsg::Debug('企业电话不能为空') : $this->Param['company_tel'];
                $data['company_license'] = empty($this->Param['company_lice']) ? ErrorMsg::Debug('营业执照号不能为空') : $this->Param['company_lice'];
                $data['company_orgcode'] = empty($this->Param['company_orgcode']) ? ErrorMsg::Debug('组织机构代码不能为空') : $this->Param['company_orgcode'];
                $data['company_regcert'] = empty($this->Param['company_regcert']) ? ErrorMsg::Debug('税务登记证不能为空') : $this->Param['company_regcert'];
                $data['company_address'] = empty($this->Param['company_address']) ? ErrorMsg::Debug('企业详细地址不能为空') : $this->Param['company_address'];
                $data['bank_comname'] = empty($this->Param['bank_comname']) ? ErrorMsg::Debug('企业开户名称不能为空') : $this->Param['bank_comname'];
                $data['bank_account'] = empty($this->Param['bank_account']) ? ErrorMsg::Debug('企业银行账号不能为空') : $this->Param['bank_account'];
                if(!preg_match('/^\d*$/',$data['bank_account'])){
                    ErrorMsg::Debug('企业银行账号只能为数字');
                }
                $data['bank_name'] = empty($this->Param['bank_name']) ? ErrorMsg::Debug('企业开户银行不能为空') : $this->Param['bank_name'];
                $data['bank_branch'] = empty($this->Param['bank_branch']) ? ErrorMsg::Debug('开户行地址不能为空') : $this->Param['bank_branch'];
                $data['operate_name'] = empty($this->Param['operate_name']) ? ErrorMsg::Debug('运营者姓名不能为空') : $this->Param['operate_name'];
                $data['operate_position'] = empty($this->Param['operate_position']) ? ErrorMsg::Debug('运营者部门职位不能为空') : $this->Param['operate_position'];
                /**
                $data['operate_mobile'] = empty($this->Param['operate_mobile']) ? ErrorMsg::Debug('运营者手机号不能为空') : $this->Param['operate_mobile'];
                if (!StringCode::IsMobile($data['operate_mobile'])) {
                    ErrorMsg::Debug('运营者手机号不能为空');
                }
                 * */
                /**
                $data['operate_tel'] = empty($this->Param['operate_tel']) ? ErrorMsg::Debug('运营者电话不能为空') : $this->Param['operate_tel'];
                $data['operate_email'] = empty($this->Param['operate_email']) ? ErrorMsg::Debug('运营者电子邮件不能为空') : $this->Param['operate_email'];
                if (!StringCode::IsEmail($data['operate_email'])) {
                    ErrorMsg::Debug('运营者电子邮件错误');
                }
                $data['operate_cardno'] = empty($this->Param['operate_cardno']) ? ErrorMsg::Debug('运营者身份证号不能为空') : $this->Param['operate_cardno'];
                if (!StringCode::isCreditNo($data['operate_cardno'])) {
                    ErrorMsg::Debug('运营者身份证号错误');
                }
                **/
                if($id > 0){//编辑用户认证资质图片
                    $cert_row = $SupplierHelper->certRow($id);
                    if(empty($cert_row)){
                        ErrorMsg::Debug('未找到相关认证信息');
                    }else{
                        $operater_cert = unserialize($cert_row['operater_cert']);
                        $cert = array(
                            'operater_cert'=> $operater_cert['operater_cert'],
                            'owner_auth'=>$operater_cert['owner_auth'],
                            'company_license'=>$this->Param['company_license'],
                            'company_orgcert'=>$this->Param['company_orgcert'],
                            'company_tax'=>$this->Param['company_tax'],
                            'owner_cert'=>$operater_cert['owner_cert']
                        );


                        $data['operater_cert'] = serialize($cert);
                    }
                }

                $member_detail = array(
                    'company' => $data['company_name'],
                    //'company_service' => $data['company_service'],
                    'telephone' => $data['company_tel'],
                    'address' => $data['company_address']
                );
                $MemberDetailHelper->DetailUpdate($member_detail, $cert_row['member_id']);
                Cache::Delete('id_'.$cert_row['member_id']);

                $do = $SupplierHelper->certSave($data, $cert_row['cert_id']);

                if($do){
                    ErrorMsg::Debug('保存成功',TRUE);
                }
                ErrorMsg::Debug('保存失败');
                break;
            case 'view':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $cert_row = $SupplierHelper->certRow($id);
                if(empty($cert_row)){
                    ErrorMsg::Debug('未找到相关认证信息');
                }else{
                    $cert_row['operater_cert'] = unserialize($cert_row['operater_cert']);
                    $this->Assign('data',$cert_row);
                }
                echo $this->GetView('supplier_view.php');
                break;
            case 'audit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $cert_row = $SupplierHelper->certRow($id);
                if($cert_row['cert_state'] == 1 && $cert_row['pay_status'] == 1 && $cert_row['audit_state'] == 0){
                    
                }else{
                    ErrorMsg::Debug('当前状态不允许审核');
                }
                if(empty($cert_row)){
                    ErrorMsg::Debug('未找到相关认证信息');
                }else{
                    $cert_row['operater_cert'] = unserialize($cert_row['operater_cert']);
                    $this->Assign('data',$cert_row);
                }
                $this->Assign('audit','audit');
                $this->Assign('id',$id);
                echo $this->GetView('supplier_view.php');
                break;
            case 'auditsubmit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $state = empty($this->Param['state']) ? 1 : $this->Param['state'];
                $remarks = $this->Param['remarks'];
                $cert_row = $SupplierHelper->certRow($id);
                if($cert_row['cert_state'] == 1 && $cert_row['pay_status'] == 1 && $cert_row['audit_state'] == 0){
                    
                }else{
                    ErrorMsg::Debug('当前状态不允许审核');
                }
                if(empty($cert_row)){
                    ErrorMsg::Debug('未找到相关认证信息');
                }else{
                    $SupplierHelper->certSave(array(
                        'audit_state' => $state
                    ),$id);
                    //插入审核日志
                    $SupplierHelper->logSave(array(
                        'cert_id' => $id,
                        'member' => $this->UserConfig['Id'],
                        'audit_state' => $state,
                        'remarks' => $remarks,
                        'dateline' => NOW_TIME
                    ));
                    //插入系统日志
                    $MemberDetailHelper->SetLogs($this->UserConfig,'审核供应商认证信息,编号:'.$id,$_REQUEST);
                    //判断是否已经有过认证，认证过的跳过打款直接完成
                    $check_cert = $SupplierHelper->certRow(array(
                        '`member_id` = ?' => $cert_row['member_id'],
                        '`cert_state` = ?' => 2
                    ));
                    if(!empty($check_cert) && $state == 1){
                        $SupplierHelper->certSave(array(
                            'money_check' => 2,
                            'cert_state' => 2
                        ),$id);
                    }

                    //发送短信
                    $memberRow = $MemberListHelper->GetMemberRow(array(
                        '`member_id` = ?' => $cert_row['member_id']
                    ));
                    $this->LoadResurces('sms/class.sms');
                    $SMS=include CONFIG_PATH.'/Sms.php';
                    $rest = new REST($SMS['serverip'],$SMS['port'],$SMS['ver']);
                    $rest->setAccount($SMS['accountsid'],$SMS['accounttoken']);
                    $rest->setAppId($SMS['appid']);
                    $rest->sendTemplateSMS($memberRow['mobile'],array(),37940);
                    

                    ErrorMsg::Debug('操作成功',TRUE);
                }
                break;
            case 'money':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $cert_row = $SupplierHelper->certRow($id);
                if($cert_row['cert_state'] == 1 && $cert_row['pay_status'] == 1 && $cert_row['audit_state'] == 1 && $cert_row['money_check'] == 0){
                    
                }else{
                    ErrorMsg::Debug('当前状态不允许打款');
                }
                if(empty($cert_row)){
                    ErrorMsg::Debug('未找到相关认证信息');
                }else{
                    $cert_row['operater_cert'] = unserialize($cert_row['operater_cert']);
                    $this->Assign('data',$cert_row);
                }
                $this->Assign('id',$id);
                echo $this->GetView('supplier_money.php');
                break;
            case 'moneysubmit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $money = empty($this->Param['money']) ? 0 : $this->Param['money'];
                if(!is_numeric($money) || $money<=0){
                    ErrorMsg::Debug('打款金额错误');
                }
                $cert_row = $SupplierHelper->certRow($id);
                if($cert_row['cert_state'] == 1 && $cert_row['pay_status'] == 1 && $cert_row['audit_state'] == 1 && $cert_row['money_check'] == 0){                    
                }else{
                    ErrorMsg::Debug('当前状态不允许打款');
                }
                if(empty($cert_row)){
                    ErrorMsg::Debug('未找到相关认证信息');
                }else{
                    $SupplierHelper->certSave(array(
                        'money_check' => 1
                    ),$id);
                    //插入审核日志
                    $SupplierHelper->remittanceSave(array(
                        'cert_id' => $id,
                        'member' => $this->UserConfig['Id'],
                        'money' => $money,
                        'remarks' => $remarks,
                        'dateline' => NOW_TIME
                    ));
                    //插入系统日志
                    $MemberDetailHelper->SetLogs($this->UserConfig,'供应商认证打款,编号:'.$id,$_REQUEST);
                    ErrorMsg::Debug('操作成功',TRUE);
                    
                    
                }
                break;
            case 'export':
                
                $where=array();
                $where=array('`cert_id` > ?' => 0);

                switch($list){
                    case 'waitpay':
                        $where['`pay_status` = ?'] = 0;
                        $where['`cert_state` = ?'] = 0;
                        break;
                    case 'waitaudit':
                        $where['`pay_status` = ?'] = 1;
                        $where['`cert_state` = ?'] = 1;
                        $where['`audit_state` = ?'] = 0;
                        break;
                    case 'waitmoney':
                        $where['`pay_status` = ?'] = 1;
                        $where['`cert_state` = ?'] = 1;
                        $where['`audit_state` = ?'] = 1;
                        $where['`money_check` = ?'] = 0;
                        break;
                    case 'finish':
                        $where['`cert_state` = ?'] = 2;
                        break;
                }
                
                $data = $SupplierHelper->certAll($where,$this->Param);
                /*
                 * 执行导出
                 */
                $excel=array(
                   array( '企业全称','企业法人代表','法人身份证号','法人手机号码','企业服务','企业电话','营业执照号','组织机构代码','税务登记证号','企业详细地址','企业开户名称','企业银行账号','企业开户银行','开户银行地址','运营者姓名','运营者部门职位','运营者手机号码','运营者电话','运营者电子邮箱','运营者身份证号','认证类型','提交时间','认证状态')
                );
                
                if(!empty($data)) foreach($data as $k=>$v){
                    $status = $SupplierHelper->certStatus($v);
                    $type_row = $SupplierHelper->typeRow($v['type_id']);
                    $excel[] = array(
                        $v['company_name'],
                        $v['company_owner'],
                        $v['owner_cardno'],
                        $v['owner_mobile'],
                        $v['company_service'],
                        $v['company_tel'],
                        $v['company_license'],
                        $v['company_orgcode'],
                        $v['company_regcert'],
                        $v['company_address'],
                        $v['bank_comname'],
                        $v['bank_account'],
                        $v['bank_name'],
                        $v['bank_branch'],
                        $v['operate_name'],
                        $v['operate_position'],
                        $v['operate_mobile'],
                        $v['operate_tel'],
                        $v['operate_email'],
                        $v['operate_cardno'],
                        $type_row['type_name'],
                        date('Y-m-d H:i:s',$v['dateline']),
                        $status['cert_text']
                    );
                }
                $this->LoadResurces('excel/php-excel.class');
                $xls = new Excel_XML('UTF-8', false, '认证管理');
                $xls->addArray($excel);
                $xls->generateXML(NOW_TIME);
                break;
            case 'uploadImg':
                $this->LoadHelper('upload/EditorUploadHelper');
                $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
                $EditorUploadHelper->ImageUpload($this->Param['filebox']);
                break;
        }
    }