<?php

$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if (empty($this->Param['option'])) {
    
    $this->LoadHelper('public/usercheck');
    
    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
    $num = empty($this->Param['log_num']) ? ErrorMsg::Debug('请填写物件大小') : $this->Param['log_num'];
    if(!is_numeric($num)){
        ErrorMsg::Debug('物件大小错误');
    }
    $freight = empty($this->Param['freight-txt']) ? ErrorMsg::Debug('请选择物流方式') : $this->Param['freight-txt'];

    $logistics_row = $LogisticsHelper->getRow(array(
        '`log_id` = ?' => $id,
        '`is_delete` = ?' => 0,
        '`is_online` = ?' => 0
    ));
    if(empty($logistics_row)){
        ErrorMsg::Debug('未找到当前物流或物流已下架');
    }
    $log_freight = unserialize($logistics_row['log_freight']);

    $logistics_row['log_freight'] = $log_freight;
    $logistics_row['num'] = $num;
    $logistics_row['total_price'] = $num * $log_freight[$freight][$freight.'_price'] + $logistics_row['log_price'];
    $logistics_row['yf_total_price'] = $num * $log_freight[$freight][$freight.'_price'];
    $logistics_row['freight_txt'] = $freight;
    $this->Assign('data' , $logistics_row);


    //获取详细信息
    $menberInfo = $MemberDetailHelper->GetMember($this->UserConfig['Id']);

    $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));

    if(empty($menberInfo['mobile'])){
        $menberInfo['mobile'] = $memberRow['mobile'];
    }
    $menberInfo['list'] = $memberRow;
    $this->Assign('menberInfo',$menberInfo);

    echo $this->GetView('logistics_order.php');
} else {
    switch($this->Param['option']){
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $logistics_row = $LogisticsHelper->getRow(array(
                '`log_id` = ?' => $id,
                '`is_delete` = ?' => 0,
                '`is_online` = ?' => 0
            ));
            if(empty($logistics_row)){
                ErrorMsg::Debug('未找到当前物流或物流已下架');
            }

            //信息判断
            $company = empty($this->Param['company']) ? ErrorMsg::Debug('请填写单位名称') : $this->Param['company'];
            $address = empty($this->Param['address']) ? ErrorMsg::Debug('请填写单位地址') : $this->Param['address'];
            $goods = empty($this->Param['goods']) ? ErrorMsg::Debug('请填写物流商品') : $this->Param['goods'];
            $username = empty($this->Param['username']) ? ErrorMsg::Debug('请填写联系人') : $this->Param['username'];
            $mobile = empty($this->Param['mobile']) ? ErrorMsg::Debug('请填写电话') : $this->Param['mobile'];
            $tel = empty($this->Param['tel']) ? ErrorMsg::Debug('请填写手机号码') : $this->Param['tel'];
            $email = empty($this->Param['email']) ? ErrorMsg::Debug('请填写邮件') : $this->Param['email'];
            $fax = empty($this->Param['fax']) ? ErrorMsg::Debug('请填写传真') : $this->Param['fax'];

            if(!StringCode::IsMobile($tel)){
                ErrorMsg::Debug('手机号码错误');
            }

            $num = empty($this->Param['num']) ? ErrorMsg::Debug('物流数量错误') : $this->Param['num'];
            if(!is_numeric($num)){
                ErrorMsg::Debug('物流数量错误');
            }
            $remarks = $this->Param['remarks'];
            $company_website = $this->Param['company_website'];
            $freight_txt = $this->Param['freight_txt'];

            $log_freight = unserialize($logistics_row['log_freight']);
            $total_price = $num * $log_freight[$freight_txt][$freight_txt.'_price'] + $logistics_row['log_price'];

            //存入订单
            $sn = StringCode::RandomCode(3,'time');
            //地址
            $receiving = array(
                'company' => $company,
                'address' => $address,
                'goods' => $goods,
                'username' => $username,
                'mobile' => $mobile,
                'tel' => $tel,
                'email' => $email,
                'fax' => $fax,
                'company_website' => $company_website
            );
            //物流订单信息
            $visa_order = array(
                'order_sn' => $sn,
                'log_id'  => $id,
                'member_id'=> $this->UserConfig['Id'],
                'saler_id' => $logistics_row['member_id'],
                'mode' => $freight_txt,
                'freight' => $log_freight[$freight_txt][$freight_txt.'_price'],
                'price' => $logistics_row['log_price'],
                'money' => $total_price,
                'num' => $num,
                'log_detail' => serialize($logistics_row),
                'receiving' => serialize($receiving),
                'remarks' => $remarks,
                'datetime' => NOW_TIME,
            );
            $logisticsOrderId = $LogisticsHelper->orderLogisticsSave($visa_order);

            //订单总表
            $order_data = array(
                'order_sn' => $sn,
                'member_id' => $this->UserConfig['Id'],
                'seller_id' => $logistics_row['member_id'],
                'price' => $total_price,
                'is_type' => 'logistics',
                'addtime' => NOW_TIME,
                'show_price' => $total_price
            );
            if($id){
                $do = $OrderHelper->save($order_data);
                if($do){
                    ErrorMsg::Debug($sn,TRUE);
                }
            }
            ErrorMsg::Debug('保存失败');
            break;
        case 'pay':
            $sn = empty($this->Param['sn']) ? ErrorMsg::Debug('参数错误') : $this->Param['sn'];
            //读取支付订单信息
            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $sn,
                '`member_id` = ?' => $this->UserConfig['Id']
            ));
            $this->Assign('order_row' , $order_row);

            if(empty($order_row)){
                ErrorMsg::Debug('订单记录不存在');
            }elseif($order_row['is_pay'] == 1){
                ErrorMsg::Debug('订单已支付，无须重复支付');
            }
            //读取附表订单信息
            $logistics_order = $LogisticsHelper->getOrderLogisticsRow(array(
                '`order_sn` = ?' => $sn
            ));
            $logistics_order['receiving'] = unserialize($logistics_order['receiving']);
            $logistics_order['log_detail'] = unserialize($logistics_order['log_detail']);
            $logistics_order['log_detail']['log_freight'] = unserialize($logistics_order['log_detail']['log_freight']);
            $logistics_order['yf_total_price'] = $logistics_order['num'] * $logistics_order['freight'];

            $this->Assign('data',$logistics_order);
            echo $this->GetView('logistics_pay.php');
            break;
        default :
    }
}