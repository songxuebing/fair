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
		/**
		* 提现
		* @param member_id 用户id
		**/
        $id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];

        $bankSuppRow = $SupplierHelper->certRow(array('`member_id` = ?' => $id));

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
		
		$row = array(
			'code' => 0,
			'bank' => $bank,
			'money' => $data['money'],
			'bankSupp' => $bankSuppRow
		);
		echo $this->Param['callback']."(".json_encode($row).")";
    }else{
        switch($this->Param['option']){
            case 'bank':
				/**
				* 绑定银行卡
				* @param member_id  用户id
				**/

                $bankRow = $SupplierHelper->certRow(array('`member_id` = ?' => $this->Param['member_id']));

                $this->Assign('bank', $bankRow);
				
				$row = array(
					'code' => 0,
					'bank' => $bankRow
				);
				echo $this->Param['callback']."(".json_encode($row).")";
                break;
            case 'edit':
				/**
				* 添加编辑银行卡
				* @param id 绑定的银行卡号id 编辑时填写 默认为0
				* @param member_id  用户id
				* @param bank_name 开户行银行名称
				* @param bank_address 开户行地址
				* @param bank_no 正确的银行卡号
				* @param username 申请人姓名
				* @param id_card 申请人身份证号
				***/
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
				$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];


                $bank_name = empty($this->Param['bank_name']) ? ErrorMsg::Debug('请输入开户行银行名称') : $this->Param['bank_name'] ;
                $bank_address = empty($this->Param['bank_address']) ? ErrorMsg::Debug('请输入开户行地址') : $this->Param['bank_address'] ;
                $bank_no = empty($this->Param['bank_no']) ? ErrorMsg::Debug('请输入正确的银行卡号') : $this->Param['bank_no'] ;
                $username = empty($this->Param['username']) ? ErrorMsg::Debug('请输入申请人姓名') : $this->Param['username'] ;
                $id_card = empty($this->Param['id_card']) ? ErrorMsg::Debug('请输入申请人身份证号') : $this->Param['id_card'] ;

                if(!StringCode::isCreditNo($id_card)){
					$row = array(
						'code' => 1,
						'msg' => '请输入申请人身份证号'
					);
					echo $this->Param['callback']."(".json_encode($row).")";
                }

                $data = array(
                    'member_id' => $member_id,
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
						$d = array(
							'code' => 0,
							'msg' => '操作成功'
						);
						echo $this->Param['callback']."(".json_encode($d).")";

                    }
                }else{
                    $row = $BalanceHelper->bankSave($data);
                    if($row){
						$d = array(
							'code' => 0,
							'msg' => '操作成功'
						);
						echo $this->Param['callback']."(".json_encode($d).")";
                    }
                }
				
				$d = array(
					'code' => 1,
					'msg' => '操作成功'
				);
				echo $this->Param['callback']."(".json_encode($d).")";
                break;
            case 'submit':
				/**
				* 个人中心 提现
				* @param money 提现金额
				* @param member_id 用户id
				**/
				$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'] ;
                $money = empty($this->Param['money']) ? '-1' : $this->Param['money'] ;
                if($money < 0){
					$row = array(
						'code' => 1,
						'msg' => '提款金额错误'
					);
					echo $this->Param['callback']."(".json_encode($row).")";
                }
                $member_row = $MemberListHelper->GetMemberRow(array(
                    '`id` = ?' => $member_id
                ));

                if(empty($member_row['money'])){
					$row = array(
						'code' => 1,
						'msg' => '您的账号余额为空'
					);
					echo $this->Param['callback']."(".json_encode($row).")";
                }

                if(is_numeric($money)){

                    if($member_row['money'] < $money){
						$row = array(
							'code' => 1,
							'msg' => '账号余额不足'
						);
						echo $this->Param['callback']."(".json_encode($row).")";
                    }

                    $bankRow = $BalanceHelper->getBankRow(array(
                        '`member_id` = ?' => $member_id
                    ));

                    $commission = $money * 0;//平台佣金
                    $actual_amount = $money - $commission;//实际金额
                    $sn = StringCode::RandomCode(3,'time');
                    $data = array(
                        'order_sn' => $n,
                        'member_id' => $member_id,
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
                            '`id` = ?' => $member_id
                        ));

                        //添加交易记录
                        $pay_sn = StringCode::RandomCode(3,'time');
                        $PayHelper->logSave(array(
                            'pay_sn' => $pay_sn,
                            'category' => 'balance',
                            'member'=>$member_id,
                            'order_sn' => $sn,
                            'order_id' => $row['id'],
                            'amount' => $money,
                            'dateline' => time()
                        ));
						
						$row = array(
							'code' => 0,
							'msg' => '提款操作成功，工作人员会尽快审核...'
						);
						echo $this->Param['callback']."(".json_encode($row).")";
                    }

                }else{
					$row = array(
						'code' => 1,
						'msg' => '请输入正确的提现金额'
					);
					echo $this->Param['callback']."(".json_encode($row).")";
                }
				
				$row = array(
					'code' => 1,
					'msg' => '提款失败'
				);
				echo $this->Param['callback']."(".json_encode($row).")";
                break;
            default :
        }
    }