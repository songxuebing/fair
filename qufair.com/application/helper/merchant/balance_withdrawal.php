<?php
    $this->LoadHelper('pay/PayHelper');
    $PayHelper = new PayHelper();

    $this->LoadHelper('balance/BalanceHelper');
    $BalanceHelper = new BalanceHelper();

    $this->LoadHelper('member/MemberListHelper');
    $MemberListHelper = new MemberListHelper();

    $this->LoadHelper('supplier/SupplierHelper');
    $SupplierHelper = new SupplierHelper();

    //获取用户信息
    $UserInfo = $this->UserConfig;
    if(empty($this->Param['option'])){

        $id = $UserInfo['Id'];

        $bankSuppRow = $SupplierHelper->certRow(array('`member_id` = ?' => $this->UserConfig['Id']));

        $bankRow = $BalanceHelper->getBankRow(array(
            '`member_id` = ?' => $id
        ));

        if(!empty($bankRow)){
            $bank = array(
                'state' => 1,
                'bank' => $bankRow
            );
        }else{
            $bank = array(
                'state' => 0,
                'bank' => $bankRow
            );
        }

        $data = $MemberListHelper->GetMemberRow(array(
            '`id` = ?' => $this->UserConfig['Id']
        ));
        $this->Assign('money',$data['money']);

        $this->Assign('bank', $bank);
        $this->Assign('bankSupp', $bankSuppRow);
        echo $this->GetView('balance_withdrawal_index.php');
    }else{
        switch($this->Param['option']){
            case 'bank':
                /**
                $id = $UserInfo['Id'];
                $bankRow = $BalanceHelper->getBankRow(array(
                    '`member_id` = ?' => $id
                ));
                **/

                $bankRow = $SupplierHelper->certRow(array('`member_id` = ?' => $this->UserConfig['Id']));

                $this->Assign('bank', $bankRow);

                echo $this->GetView('balance_withdrawal_bank.php');
                break;
            case 'edit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];


                $bank_name = empty($this->Param['bank_name']) ? ErrorMsg::Debug('请输入开户行银行名称') : $this->Param['bank_name'] ;
                $bank_address = empty($this->Param['bank_address']) ? ErrorMsg::Debug('请输入开户行地址') : $this->Param['bank_address'] ;
                $bank_no = empty($this->Param['bank_no']) ? ErrorMsg::Debug('请输入正确的银行卡号') : $this->Param['bank_no'] ;
                $username = empty($this->Param['username']) ? ErrorMsg::Debug('请输入申请人姓名') : $this->Param['username'] ;
                $id_card = empty($this->Param['id_card']) ? ErrorMsg::Debug('请输入申请人身份证号') : $this->Param['id_card'] ;

                if(!StringCode::isCreditNo($id_card)){
                    ErrorMsg::Debug('请输入申请人身份证号');
                }

                $data = array(
                    'member_id' => $UserInfo['Id'],
                    'username' => $username,
                    'id_card' => $id_card,
                    'bank_name' => $bank_name,
                    'bank_no' => $bank_no,
                    'bank_address' => $bank_address
                );
                if($id > 0){
                    $row = $BalanceHelper->bankUpdate($data,array(
                        '`id` = ?' => $id
                    ));

                    if($row){
                        ErrorMsg::Debug('操作成功',true);
                    }
                }else{
                    $row = $BalanceHelper->bankSave($data);
                    if($row){
                        ErrorMsg::Debug('操作成功',true);
                    }
                }

                ErrorMsg::Debug('操作失败');
                break;
            case 'submit':

                $money = empty($this->Param['money']) ? ErrorMsg::Debug('请输入提现金额') : $this->Param['money'] ;
                if($money < 0){
                    ErrorMsg::Debug('提款金额错误！');
                }
                $member_row = $MemberListHelper->GetMemberRow(array(
                    '`id` = ?' => $UserInfo['Id']
                ));

                if(empty($member_row['money'])){
                    ErrorMsg::Debug('您的账号余额为空！');
                }

                if(is_numeric($money)){

                    if($member_row['money'] < $money){
                        ErrorMsg::Debug('账号余额不足！');
                    }

                    $bankRow = $BalanceHelper->getBankRow(array(
                        '`member_id` = ?' => $UserInfo['Id']
                    ));

                    $commission = $money * 0;//平台佣金
                    $actual_amount = $money - $commission;//实际金额
                    $sn = StringCode::RandomCode(3,'time');
                    $data = array(
                        'order_sn' => $n,
                        'member_id' => $UserInfo['Id'],
                        'money' => $money,
                        'actual_amount' =>$actual_amount,
                        'commission' => $commission,
                        'bank_id' => $bankRow['id'],
                        'add_time' => time()
                    );

                    $row = $BalanceHelper->save($data);

                    if($row){
                        //扣除用户账号金额
                        $newMoney = $member_row['money'] - $money;
                        $MemberListHelper->memberUpdate(array(
                            'money' => $newMoney
                        ),array(
                            '`id` = ?' => $UserInfo['Id']
                        ));

                        //添加交易记录
                        $pay_sn = StringCode::RandomCode(3,'time');
                        $PayHelper->logSave(array(
                            'pay_sn' => $pay_sn,
                            'category' => 'balance',
                            'member'=>$UserInfo['Id'],
                            'order_sn' => $sn,
                            'order_id' => $row['id'],
                            'amount' => $money,
                            'dateline' => time()
                        ));

                        ErrorMsg::Debug('提款操作成功，工作人员会尽快审核...',true);
                    }

                }else{
                    ErrorMsg::Debug('请输入正确的提现金额');
                }

                ErrorMsg::Debug('提款失败');
                break;
            default :
        }
    }