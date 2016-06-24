<?php
    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();

    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('user/UserAddressHelper');
    $UseraddressHelper = new UserAddressHelper();

    $this->LoadHelper('member/MemberListHelper');
    $MemberListHelper = new MemberListHelper();

    $this->LoadHelper('member/MemberDetailHelper');
    $MemberDetailHelper = new MemberDetailHelper();

    //获取用户信息
    $UserInfo = $this->UserConfig;
    //var_dump($this->Param);
    if(empty($this->Param['option'])){
        
        $this->LoadHelper('public/usercheck');
        
        $con_id = empty($this->Param['id']) ? 0 : $this->Param['id'];
        $con_data = $ConventionHelper->GetId($con_id);
        $data['con_name'] =  $con_data['name'];
        $data['user_id']  = $this->UserConfig['Id'];
        //var_dump($data);exit();
        $this->Assign('data', $data);

        echo $this->GetView('convention_order.php');

//        $areaid = empty($this->Param['areaid']) ? 0 :$this->Param['areaid'];
//        $is_group = $this->Param['is_group'];
//        $is_advance_payment = $this->Param['is_advance_payment'];//是否预付款
//
//        $data['area'] = $ConventionHelper->getAreaRow(array('`area_id` = ?' =>$areaid,'`detail_id` = ?' =>$detailid));
//        $data['detail'] = $ConventionHelper->getDetailRow(array('`detail_id` = ?'=> $detailid));
//        $data['con'] = $ConventionHelper->getRow(array('`id` = ?' => $data['detail']['con_id']));
//
//        //获取之前的收货地址
//        $address_row = $ConventionHelper->orderRow(array(
//            '`member_id` = ?' => $UserInfo['Id']
//        ));
//
//        $receiving = unserialize($address_row['receiving']);
//
//        $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));
//
//        if(empty($menberInfo['mobile'])){
//            $menberInfo['mobile'] = $memberRow['mobile'];
//        }
//        $menberInfo['list'] = $memberRow;
//        $this->Assign('receiving',$receiving);
//        $this->Assign('menberInfo',$menberInfo);
//        $this->Assign('data', $data);
//        $this->Assign('isGroup', $is_group);
//        echo $this->GetView('convention_order.php');
    }else{
        switch($this->Param['option']){
            case 'submit':
                $id = $ConventionHelper->new_orderSave(
                    array(
                        'booth_type' => $this->Param['p1'],
                        'opening' => $this->Param['p2'],
                        'area' => $this->Param['p3'],
                        'is_group' => ($this->Param['p4'] == "是") ? 1 : 0,
                        'con_name' => $this->Param['p5'],
                        'company' => $this->Param['wd01'],
                        'contacts' => $this->Param['wd02'],
                        'phone' => $this->Param['wd03'],
                        'email' => $this->Param['wd05'],
                        'content' => $this->Param['wd06'],
                        'member_id' => $this->Param['wd07'],
                        'update_time' => NOW_TIME,
                    )
                );
                if($id)
                $info['status']='y';
                $info['info']='数据不存在';
                $data=json_encode($info);
                echo $data;
                //$this->Assign('data', $data);
                break;
            case 'pay':
                $sn = empty($this->Param['sn']) ? ErrorMsg::Debug('参数错误') : $this->Param['sn'];
                //读取支付订单信息
                $order_row = $OrderHelper->getRow(array(
                    '`order_sn` = ?' => $sn,
                    '`member_id` = ?' => $this->UserConfig['Id']
                ));

                if(empty($order_row)){
                    ErrorMsg::Debug('订单记录不存在');
                }elseif($order_row['is_pay'] == 1){
                    if(!$order_row['order_state'] == 4){
                        ErrorMsg::Debug('订单已支付，无须重复支付');
                    }else{
                        $advance = $order_row['price'] - $order_row['advance'];
                        $order_row['advance'] = $advance;
                    }
                }
                $this->Assign('order_row' , $order_row);
                //读取附表订单信息
                $convention_order = $ConventionHelper->orderRow(array(
                    '`order_sn` = ?' => $sn
                ));
                $convention_order['detail'] = unserialize($convention_order['detail']);
                $convention_order['receiving'] = unserialize($convention_order['receiving']);

                $this->Assign('orderState',$order_row['order_state']);
                $this->Assign('data',$convention_order);

                echo $this->GetView('convention_pay.php');
                break;
            case 'payreturn':
                echo $this->GetView('convention_paysucc.php');
                break;

            default :
        }
    }