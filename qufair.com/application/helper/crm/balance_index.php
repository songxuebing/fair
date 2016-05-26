<?php

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('balance/BalanceHelper');
$BalanceHelper = new BalanceHelper();

$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

if (empty($this->Param['option'])) {
    $page = empty($this->Param['page']) ? 1 : $this->Param['page'];
    $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];

    $limit = 10;
    $where = array(
        '`delete` = ?' => 1
    );

    switch($list){
        case 'all':
            break;
        case '1':
            $where['`win_state` = ?'] = 1;
            break;
        case '2':
            $where['`win_state` = ?'] = 2;
            break;
        case '3':
            $where['`win_state` = ?'] = 3;
            break;
        case '4':
            $where['`win_state` = ?'] = 4;
            break;

    }

    $data = $BalanceHelper->GetAllWhere($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k => $v){
        //获取用户信息
        $member_row = $MemberListHelper->GetMemberRow(array(
            '`id` = ?' => $v['member_id']
        ));

        $data['All'][$k]['webname'] = $member_row['username'];
        $data['All'][$k]['mobile'] = $member_row['mobile'];

        //获取银行卡信息
        $bank_row = $BalanceHelper->getBankRow(array(
            '`member_id` = ?' => $v['member_id']
        ));

        $data['All'][$k]['bank'] = $bank_row;
		
		$bankSuppRow = $SupplierHelper->certRow(array('`member_id` = ?' => $v['member_id']));
		$data['All'][$k]['bank']['bank_no'] = $bankSuppRow['bank_account'];
		$data['All'][$k]['bank']['bank_name'] = $bankSuppRow['bank_name'];
		$data['All'][$k]['bank']['bank_comname'] = $bankSuppRow['bank_comname'];
		$data['All'][$k]['bank']['bank_address'] = $bankSuppRow['bank_branch'];
		

        $data['All'][$k]['state'] = $BalanceHelper->changeStatus($v);
    }
    $this->Assign('list_class', $list);
    $this->Assign('data', $data);
    echo $this->GetView('balance_index.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

            //获取提款记录
            $data = $BalanceHelper->getRow(array(
                '`id` = ?' => $id
            ));
            $data['state'] = $BalanceHelper->changeStatus($data);

            //获取提款卡号信息
            $data['bankSupp'] = $SupplierHelper->certRow(array('`member_id` = ?' => $data['member_id']));

            $data['bank'] = $BalanceHelper->getBankRow(array(
                '`id` = ?' => $data['bank_id'],
                '`member_id` = ?' => $data['member_id']
            ));

            //获取用户信息
            $data['member']=$MemberListHelper->GetMemberRow(array(
                '`id` = ?' => $data['member_id']
            ));


            $this->Assign('id',$id);
            $this->Assign('data',$data);
            echo $this->GetView('balance_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $id_card = empty($this->Param['id_card']) ? ErrorMsg::Debug('身份证号不能为空') : $this->Param['id_card'];
            $bank_name = empty($this->Param['bank_name']) ? ErrorMsg::Debug('银行名称不能为空') : $this->Param['bank_name'];
            $bank_address = empty($this->Param['bank_address']) ? ErrorMsg::Debug('开户行地址不能为空') : $this->Param['bank_address'];
            $bank_no = empty($this->Param['bank_no']) ? ErrorMsg::Debug('银行卡号不能为空') : $this->Param['bank_no'];
            $money = empty($this->Param['money']) ? ErrorMsg::Debug('提款金额不能为空') : $this->Param['money'];
            $actual_amount = empty($this->Param['actual_amount']) ? ErrorMsg::Debug('实际金额不能为空') : $this->Param['actual_amount'];
            $commission = $this->Param['commission'];
            $win_state = $this->Param['win_state'];

            $bank_id = $BalanceHelper->Update(array(
                'win_state' => $win_state
            ),array(
                '`id` = ?' => $id
            ));

            if($bank_id){
                ErrorMsg::Debug('修改成功',true);
            }
            ErrorMsg::Debug('修改失败');
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $do = $BalanceHelper->Update(array(
                'delete' => 0
            ),array(
                '`id` = ?' => $id
            ));
            if($do){
                ErrorMsg::Debug('删除成功',TRUE);
            }
            ErrorMsg::Debug('删除失败');
            break;
        default :
    }
}