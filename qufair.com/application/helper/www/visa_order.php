<?php

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

if (empty($this->Param['option'])) {

    $this->LoadHelper('public/usercheck');
    
    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
    $visa_row = $VisaHelper->getnewRow(array(
        '`visa_id` = ?' => $id,
        '`is_delete` = ?' => 0,
        '`is_online` = ?' => 0
    ));


    if(empty($visa_row)){
        ErrorMsg::Debug('未找到当前签证或签证已下架');
    }
    $this->Assign('data' , $visa_row);
    echo $this->GetView('visa_order_new.php');
//    var_dump($visa_row);exit();
//
//    //产品类型
//    $pro_row = $VisaHelper->getProRow(array('`pro_id` = ?' => $visa_row['pro_type']));
//    $visa_row['type_name'] = $pro_row['type_name'];
//    //签证类型
//    $visa_type = $VisaHelper->getVisaRow(array('`visa_id` = ?' => $visa_row['visa_type']));
//    $visa_row['visa_name'] = $visa_type['visa_name'];
//
//    //print_r($visa_row);
//
//    $this->Assign('data' , $visa_row);
//    echo $this->GetView('visa_order.php');
} else {
    switch($this->Param['option']){
        case 'submit':
            $data['member_id'] = $this->UserConfig['Id'];
            $data['visa_id'] = $this->Param['visa_id'];
            $data['lq'] = serialize($this->Param['p1']);
            $data['type'] = serialize($this->Param['p2']);
            $data['name'] = serialize($this->Param['p3']);
            $data['cid'] = serialize($this->Param['p4']);
            $data['company'] = $this->Param['company'];
            $data['contacts'] = $this->Param['name'];
            $data['phone'] = $this->Param['phone'];
            $data['email'] = $this->Param['email'];
            $data['tel'] = $this->Param['tel'];
            $data['content'] = $this->Param['content'];
            $data['update_time'] = time();
            $visaOrderId = $VisaHelper->ordernewVisaSave($data);
            echo '<script>location.href="Http://www.qufair.com/";</script>';
            exit();

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $visa_row = $VisaHelper->getRow(array(
                '`visa_id` = ?' => $id,
                '`is_delete` = ?' => 0,
                '`is_online` = ?' => 0
            ));
            if(empty($visa_row)){
                ErrorMsg::Debug('未找到当前签证或签证已下架');
            }

            $orderVisa = $VisaHelper->getOrderVisaRow(array(
                '`visa_id` = ?' => $id
            ));

            $visa_pro_row = $VisaHelper->getProRow(array('`pro_id` = ?' => $orderVisa['pro_type']));
            $visa_visa_row = $VisaHelper->getVisaRow(array('`visa_id` = ?' => $orderVisa['visa_type']));
            //
            $add_username = empty($this->Param['add_username']) ? ErrorMsg::Debug('请填写收货人姓名') : $this->Param['add_username'];
            $ship_province = empty($this->Param['ship_province']) ? ErrorMsg::Debug('请填写区域') : $this->Param['ship_province'];
            $add_address = empty($this->Param['add_address']) ? ErrorMsg::Debug('请填写详细地址') : $this->Param['add_address'];
            $add_area = empty($this->Param['add_area']) ? ErrorMsg::Debug('请填写区域') : $this->Param['add_area'];
            $add_tel = empty($this->Param['add_tel']) ? ErrorMsg::Debug('请输入手机号码') : $this->Param['add_tel'];
            if(!StringCode::IsMobile($add_tel)){
                ErrorMsg::Debug('手机号码错误');
            }

            $num = empty($this->Param['num']) ? ErrorMsg::Debug('请输入签证人数') : $this->Param['num'];
            if(!is_numeric($num)){
                ErrorMsg::Debug('人数错误');
            }
            $remarks = $this->Param['add_remarks'];
            //存入订单
            $sn = StringCode::RandomCode(3,'time');
            //地址
            $receiving = array(
                'add_username' => $add_username,
                'add_address' => $add_address,
                'add_area' => $add_area,
                'add_tel' => $add_tel,
                'ship_province' => $this->Param['ship_province'],
                'ship_city' => $this->Param['ship_city'],
                'ship_area' => $this->Param['ship_area'],
                'add_mobile' => $this->Param['add_mobile_01'].'-'.$this->Param['add_mobile_02'].'-'.$this->Param['add_mobile_03']
            );
            //签证订单信息
            $visa_order = array(
                'order_sn' => $sn,
                'visa_id'  => $id,
                'member_id'=> $this->UserConfig['Id'],
                'saler_id' => $visa_row['member_id'],
                'visa_cover' => $visa_row['visa_cover'],
                'visa_name' => $visa_row['visa_title'],
                'pro_type' => $visa_pro_row['type_name'],
                'visa_type' => $visa_visa_row['visa_name'],
                'visa_price' => $visa_row['visa_price'],
                'money' => $visa_row['visa_price'] * $num,
                'num' => $num,
                'visa_area' => $visa_row['visa_area'],
                'receiving' => serialize($receiving),
                'remarks' => $remarks,
                'datetime' => NOW_TIME,
            );
            $visaOrderId = $VisaHelper->orderVisaSave($visa_order);

            //签证人信息

            $username = empty($this->Param['username']) ? ErrorMsg::Debug('请填写签证真实姓名') : $this->Param['username'];
            $cert_type = empty($this->Param['cert_type']) ? ErrorMsg::Debug('请填写签证证件类型') : $this->Param['cert_type'];
            $cert_msg = empty($this->Param['cert_msg']) ? ErrorMsg::Debug('请填写签证证件信息') : $this->Param['cert_msg'];
            $tel = empty($this->Param['tel']) ? ErrorMsg::Debug('请填写签证手机号码') : $this->Param['tel'];

            foreach($username as $key => $val){
                if(empty($val)){
                    ErrorMsg::Debug('请填写签证真实姓名');
                    break;
                }
                //存入签证人信息
                $visaMember = array(
                    'username' => $val,
                    'order_id' => $visaOrderId,
                    'tel'      => $tel[$key],
                    'cert_type'=> $cert_type[$key],
                    'cert_msg' => $cert_msg[$key],
                    'datetime' => NOW_TIME
                );
                $VisaHelper->VisaMemberSave($visaMember);
            }

            //订单总表
            $order_data = array(
                'order_sn' => $sn,
                'member_id' => $this->UserConfig['Id'],
                'seller_id' => $visa_row['member_id'],
                'price' => $num*$visa_row['visa_price'],
                'is_type' => 'visa',
                'addtime' => NOW_TIME,
                'show_price' => $num*$visa_row['visa_price']
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
            $visa_order = $VisaHelper->getOrderVisaRow(array(
                '`order_sn` = ?' => $sn
            ));
            $visa_order['receiving'] = unserialize($visa_order['receiving']);
            $this->Assign('data',$visa_order);

            //签证人信息
            $visa_member_row = $VisaHelper->getVisaMemberList(array( '`order_id` = ?' => $visa_order['id']),200,0,'');
            $this->Assign('visa_member',$visa_member_row);
            echo $this->GetView('visa_pay.php');
            break;
        default :
    }
}