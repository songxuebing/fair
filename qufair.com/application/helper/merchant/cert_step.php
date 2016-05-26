<?php
$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

$this->LoadHelper('pay/PayHelper');
$PayHelper = new PayHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if (empty($this->Param['option'])) {
    
} else {
    switch ($this->Param['option']) {
        case 'uploadimg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'], 'cert');
            break;
        case 'step1':
            //读取已经提交的信息
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $type_row = $SupplierHelper->typeRow($tpid);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
            }
            $this->Assign('tpid', $tpid);
            $this->Assign('type_row', $type_row);
            $supplier_cert = $SupplierHelper->certRow(array('`type_code` = ?' => $type_row['code'], '`member_id` = ?' => $this->UserConfig['Id']));

            if ($supplier_cert['cert_state'] == 1 || $supplier_cert['cert_state'] == 2) {
                header('Location:/cert/index/');
                die();
            }
            if (empty($supplier_cert)) {
                $cert_row = $SupplierHelper->certRow(array('`member_id` = ?' => $this->UserConfig['Id']));
            } else {
                $cert_row = $supplier_cert;
            }
            $cert_row['operater_cert'] = unserialize($cert_row['operater_cert']);

            $this->Assign('data', $cert_row);
            echo $this->GetView('cert_step1.php');
            break;
        case 'step1submit':
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $type_row = $SupplierHelper->typeRow($tpid);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
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
            $data['company_service'] = empty($this->Param['company_service']) ? ErrorMsg::Debug('企业服务信息不能为空') : $this->Param['company_service'];
             */
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
            $data['operate_mobile'] = empty($this->Param['operate_mobile']) ? ErrorMsg::Debug('运营者手机号不能为空') : $this->Param['operate_mobile'];
            if (!StringCode::IsMobile($data['operate_mobile'])) {
                ErrorMsg::Debug('运营者手机号不能为空');
            }
            $operate_code = empty($this->Param['operate_code']) ? ErrorMsg::Debug('请输入短信验证码') : $this->Param['operate_code'];
            if ($operate_code != $_SESSION['rnd_code']) {
                ErrorMsg::Debug('手机验证码错误');
            }
            if ($data['operate_mobile'] != $_SESSION['mobile']) {
                ErrorMsg::Debug('运营者手机和接收短信手机不一致');
            }
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

            $operater_cert = empty($this->Param['operater_cert']) ? ErrorMsg::Debug('请上传运营者身份证扫描件') : $this->Param['operater_cert'];
            foreach ($operater_cert as $k => $v) {
                if (empty($v)) {
                    ErrorMsg::Debug('请上传运营者身份证扫描件');
                }
            }
            */
            //$owner_auth = empty($this->Param['owner_auth']) ? ErrorMsg::Debug('请上传法人授权书') : $this->Param['owner_auth'];

            $company_license = empty($this->Param['company_license']) ? ErrorMsg::Debug('请上传企业营业执照') : $this->Param['company_license'];
            $company_orgcert = empty($this->Param['company_orgcert']) ? ErrorMsg::Debug('请上传组织机构代码证') : $this->Param['company_orgcert'];
            $company_tax = empty($this->Param['company_tax']) ? ErrorMsg::Debug('请上传税务登记证') : $this->Param['company_tax'];
            /**
            $owner_cert = empty($this->Param['owner_cert']) ? ErrorMsg::Debug('请上传法人身份证') : $this->Param['owner_cert'];
            foreach ($owner_cert as $k => $v) {
                if (empty($v)) {
                    ErrorMsg::Debug('请上传法人身份证');
                }
            }
             * */
            $data['operater_cert'] = serialize(array(
                'operater_cert' => $operater_cert,
               // 'owner_auth' => $owner_auth,
                'company_license' => $company_license,
                'company_orgcert' => $company_orgcert,
                'company_tax' => $company_tax,
                //'owner_cert' => $owner_cert
            ));
            //更新至MEMBERDETAIL
            $member_detail = array(
                'company' => $data['company_name'],
                'company_service' => $data['company_service'],
                'telephone' => $data['company_tel'],
                'address' => $data['company_address']
            );
            $MemberDetailHelper->DetailUpdate($member_detail, $this->UserConfig['Id']);
            Cache::Delete('id_'.$this->UserConfig['Id']);
            //检测是否已经有原信息
            $data['dateline'] = NOW_TIME;
            $supplier_cert = $SupplierHelper->certRow(array('`type_code` = ?' => $type_row['code'], '`member_id` = ?' => $this->UserConfig['Id']));
            if (empty($supplier_cert)) {
                $data['type_id'] = $tpid;
                $data['type_code'] = $type_row['code'];
                $data['member_id'] = $this->UserConfig['Id'];
                $id = $SupplierHelper->certSave($data);
                if ($id) {
                    $_SESSION['mobile'] = '';
                    $_SESSION['rnd_code'] = '';
                    ErrorMsg::Debug('保存成功', TRUE);
                }
            } elseif ($supplier_cert['cert_state'] == 1 || $supplier_cert['cert_state'] == 2) {
                ErrorMsg::Debug('当前正处于认证中或已认证状态，不能修改');
            } elseif ($supplier_cert['cert_state'] == 0) {
                //修改保存
                $data['company_name'] = $supplier_cert['company_name'];
                //如果已经支付，直接改变状态为已认证
                if ($supplier_cert['pay_status'] == 1) {
                    $data['cert_state'] = 1;
                }
                $SupplierHelper->certSave($data, $supplier_cert['cert_id']);
                $_SESSION['mobile'] = '';
                $_SESSION['rnd_code'] = '';
                ErrorMsg::Debug('保存成功', TRUE);
            }
            ErrorMsg::Debug('保存失败');
            break;
        case 'pay':
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $type_row = $SupplierHelper->typeRow($tpid);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
            }
            $this->Assign('type_row', $type_row);
            $supplier_cert = $SupplierHelper->certRow(array('`type_code` = ?' => $type_row['code'], '`member_id` = ?' => $this->UserConfig['Id']));
            if (empty($supplier_cert)) {
                ErrorMsg::Debug('未找到相关认证资料，无须支付');
            }
            if($type_row['cost'] == 0){//设置零费用则跳过支付
                //更新认证情况
                $supplier_update = array(
                    'cert_state' => 1,
                    'pay_status' => 1
                );
                $SupplierHelper->certSave($supplier_update, $supplier_cert['cert_id']);
                header('Location:/cert/step/option/audit/tpid/'.$tpid);
                die();
            }
            $this->Assign('supplier_cert', $supplier_cert);
            echo $this->GetView('cert_pay.php');
            break;
        case 'paysubmit':
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $pay_type = empty($this->Param['pay_type']) ? ErrorMsg::Debug('请选择支付方式') : $this->Param['pay_type'];
            $type_row = $SupplierHelper->typeRow($tpid);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
            }
            $supplier_cert = $SupplierHelper->certRow(array('`type_code` = ?' => $type_row['code'], '`member_id` = ?' => $this->UserConfig['Id']));
            if ($supplier_cert['pay_status'] == 1) {
                ErrorMsg::Debug('您的订单已支付，无需重复支付');
            }
            //生成支付订单号
            $pay_sn = NOW_TIME . StringCode::RandomCode(3, 'num');
            switch ($pay_type) {
                case 'lianlian':
                    //保存支付日志
                    $log_data = array(
                        'pay_sn' => $pay_sn,
                        'payment' => 'lianlian',
                        'category' => 'auth',
                        'member' => $this->UserConfig['Id'],
                        'order_sn' => $supplier_cert['cert_id'],
                        'order_id' => $supplier_cert['cert_id'],
                        'amount' => $type_row['cost'],
                        'dateline' => NOW_TIME
                    );
                    $id = $PayHelper->logSave($log_data);
                    $this->LoadResurces('pay/lianlian/class.pay');
                    $pay_config = include CONFIG_PATH . '/Pay.php';
                    $llpay = new LLpay($pay_config);
                    $params = array(
                        'version' => $pay_config['version'],
                        'oid_partner' => $pay_config['oid_partner'],
                        'sign_type' => $pay_config['sign_type'],
                        'user_id' => $this->UserConfig['Id'],
                        'timestamp' => date('YmdHis'),
                        'busi_partner' => '101001',
                        'no_order' => $pay_sn,
                        'dt_order' => date('YmdHis'),
                        'name_goods' => $type_row['type_name'] . '认证费用',
                        'money_order' => $type_row['cost'],
                        'notify_url' => 'http://' . HTTP_HOST . '/cert/paynotify/pay_type/lianlian/',
                        'url_return' => 'http://' . HTTP_HOST . '/cert/step/option/pay/tpid/' . $tpid,
                        'risk_item' => '{"user_info_bind_phone":"13958069593","user_info_dt_register":"20131030122130","risk_state":"1","frms_ware_category":"1009"}'
                    );
                    $html_text = $llpay->buildRequestForm($params, "post", "确认");
                    if ($id) {
                        echo $html_text;
                    }
                    break;
                case 'alipay':
                    $bank_code = empty($this->Param['bankcode']) ? ErrorMsg::Debug('请选择支付银行') : $this->Param['bankcode'];
                    //保存支付日志
                    $log_data = array(
                        'pay_sn' => $pay_sn,
                        'payment' => 'alipay',
                        'category' => 'auth',
                        'member' => $this->UserConfig['Id'],
                        'order_sn' => $supplier_cert['cert_id'],
                        'order_id' => $supplier_cert['cert_id'],
                        'amount' => $type_row['cost'],
                        'dateline' => NOW_TIME,
                        'remarks' => $bank_code
                    );
                    $id = $PayHelper->logSave($log_data);
                    $this->LoadResurces('pay/alipay/class.alipay');
                    $pay_config = include CONFIG_PATH . '/Pay.php';
                    $pay_config = $pay_config['alipay'];
                    $alipay = new AlipaySubmit($pay_config);
                    $params = array(
                        "service" => "create_direct_pay_by_user",
                        "partner" => trim($pay_config['partner']),
                        "seller_email" => trim($pay_config['seller_email']),
                        "payment_type" => 1,
                        "notify_url" => 'http://' . HTTP_HOST . '/cert/paynotify/pay_type/alipay/',
                        "return_url" => 'http://' . HTTP_HOST . '/cert/step/option/pay/tpid/' . $tpid,
                        "out_trade_no" => $pay_sn,
                        "subject" => $type_row['type_name'] . '认证费用',
                        "total_fee" => $type_row['cost'],
                        "body" => '',
                        "show_url" => 'http://' . HTTP_HOST,
                        "anti_phishing_key" => '',
                        "exter_invoke_ip" => '',
                        "_input_charset" => trim(strtolower($pay_config['input_charset'])),
                        "paymethod" => 'bankPay',
                        "defaultbank" => $bank_code
                    );
                    $html_text = $alipay->buildRequestForm($params, "get", "确认");
                    if ($id) {
                        echo $html_text;
                    }
                    break;
                default:
            }

            break;
        case 'audit':
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $type_row = $SupplierHelper->typeRow($tpid);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
            }
            $this->Assign('type_row', $type_row);
            //显示审核情况
            $member_cert = $SupplierHelper->certAll(array(
                '`member_id` = ?' => $this->UserConfig['Id'],
                '`cert_state` > ?' => 0
            ));
            if (!empty($member_cert)) {
                foreach ($member_cert as $k => $v) {
                    $type_row = $SupplierHelper->typeRow(array(
                        '`code` = ?' => $v['type_code']
                    ));
                    $member_cert[$k]['typerow'] = $type_row;
                    if ($v['audit_state'] == 2) {
                        //认证失败，查最后记录找失败原因
                        $log_row = $SupplierHelper->logRow($v['cert_id']);
                        $member_cert[$k]['log'] = $log_row;
                    }
                }
            }
            $this->Assign('member_cert', $member_cert);
            echo $this->GetView('cert_audit.php');
            break;
        case 'reauth'://重新认证
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $type_row = $SupplierHelper->typeRow($tpid);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
            }
            $supplier_cert = $SupplierHelper->certRow(array('`type_code` = ?' => $type_row['code'], '`member_id` = ?' => $this->UserConfig['Id']));
            if ($supplier_cert['cert_state'] == 1 && $supplier_cert['audit_state'] == 2) {
                $SupplierHelper->certSave(array(
                    'cert_state' => 0,
                    'audit_state' => 0
                        ), $supplier_cert['cert_id']);
                header('Location:/cert/step/option/step1/tpid/' . $tpid);
            } else {
                ErrorMsg::Debug('不符合重新认证条件');
            }
            break;
        case 'checkmoney':
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $this->Assign('tpid', $tpid);
            $type_row = $SupplierHelper->typeRow($tpid);
            $this->Assign('type_row', $type_row);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
            }
            $supplier_cert = $SupplierHelper->certRow(array('`type_code` = ?' => $type_row['code'], '`member_id` = ?' => $this->UserConfig['Id']));
            if ($supplier_cert['cert_state'] == 1 && $supplier_cert['audit_state'] == 1 && $supplier_cert['money_check'] == 1) {
                echo $this->GetView('cert_checkmoney.php');
            } else {
                ErrorMsg::Debug('不符合核对金额条件');
            }
            break;
        case 'submitmoney':
            $tpid = empty($this->Param['tpid']) ? 1 : $this->Param['tpid'];
            $money = empty($this->Param['money']) ? ErrorMsg::Debug('请输入检验金额') : $this->Param['money'];
            if (!is_numeric($money)) {
                ErrorMsg::Debug('校验金额必须为数字');
            }
            $type_row = $SupplierHelper->typeRow($tpid);
            $this->Assign('type_row', $type_row);
            if (empty($type_row)) {
                ErrorMsg::Debug('未找到相应供应商类型');
            }
            $supplier_cert = $SupplierHelper->certRow(array('`type_code` = ?' => $type_row['code'], '`member_id` = ?' => $this->UserConfig['Id']));
            if ($supplier_cert['cert_state'] == 1 && $supplier_cert['audit_state'] == 1 && $supplier_cert['money_check'] == 1) {
                //查找打款记录
                $remittanceRow = $SupplierHelper->remittanceRow(array(
                    '`cert_id` = ?' => $supplier_cert['cert_id'],
                    '`delete` = ?' => 0
                ));
                if (empty($remittanceRow)) {
                    ErrorMsg::Debug('未找到打款记录，请联系工作人员');
                } else {
                    if ($remittanceRow['money'] == $money) {
                        $SupplierHelper->certSave(array(
                            'cert_state' => 2,
                            'money_check' => 2
                                ), $supplier_cert['cert_id']);
                        ErrorMsg::Debug('校验成功', TRUE);
                    } else {
                        ErrorMsg::Debug('校验金额错误');
                    }
                }
            } else {
                ErrorMsg::Debug('不符合核对金额条件');
            }
            break;
        default:
    }
}