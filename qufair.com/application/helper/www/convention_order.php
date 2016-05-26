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

    if(empty($this->Param['option'])){
        
        $this->LoadHelper('public/usercheck');
        
        $detailid = empty($this->Param['detailid']) ? 0 : $this->Param['detailid'];
        $areaid = empty($this->Param['areaid']) ? 0 :$this->Param['areaid'];
        $is_group = $this->Param['is_group'];
        $is_advance_payment = $this->Param['is_advance_payment'];//是否预付款

        $data['area'] = $ConventionHelper->getAreaRow(array('`area_id` = ?' =>$areaid,'`detail_id` = ?' =>$detailid));
        $data['detail'] = $ConventionHelper->getDetailRow(array('`detail_id` = ?'=> $detailid));
        $data['con'] = $ConventionHelper->getRow(array('`id` = ?' => $data['detail']['con_id']));

        //获取之前的收货地址
        $address_row = $ConventionHelper->orderRow(array(
            '`member_id` = ?' => $UserInfo['Id']
        ));

        $receiving = unserialize($address_row['receiving']);

        $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));

        if(empty($menberInfo['mobile'])){
            $menberInfo['mobile'] = $memberRow['mobile'];
        }
        $menberInfo['list'] = $memberRow;
        $this->Assign('receiving',$receiving);
        $this->Assign('menberInfo',$menberInfo);
        $this->Assign('data', $data);
        $this->Assign('isGroup', $is_group);
        echo $this->GetView('convention_order.php');
    }else{
        switch($this->Param['option']){
            case 'submit':

                //定制信息
                $company_name = empty($this->Param['company_name']) ? ErrorMsg::Debug('请填写单位名称') : $this->Param['company_name'];
                $company_address = empty($this->Param['company_address']) ? ErrorMsg::Debug('请填写单位地址') : $this->Param['company_address'];
                $address_user_name = empty($this->Param['address_user_name']) ? ErrorMsg::Debug('请填写联系人') : $this->Param['address_user_name'];
                $address_mobile = empty($this->Param['address_mobile']) ? ErrorMsg::Debug('请填写电话') : $this->Param['address_mobile'];
                $address_tel = empty($this->Param['address_tel']) ? ErrorMsg::Debug('请填写手机') : $this->Param['address_tel'];
                $address_email = empty($this->Param['address_email']) ? ErrorMsg::Debug('请填写电子邮件') : $this->Param['address_email'];
                $fax = empty($this->Param['fax']) ? ErrorMsg::Debug('请填写传真') : $this->Param['fax'];
                $website = $this->Param['website'];
                $area_id = empty($this->Param['area_id']) ? 0 : $this->Param['area_id'];

                //下单前判断展位是否已经出售
                $area_row = $ConventionHelper->getAreaRow(array(
                    '`area_id` = ?' => $area_id
                ));

                if($area_row['is_rent'] == 1){
                    ErrorMsg::Debug('展位已经被其他用户预定了！');
                }

                $receiving = array(
                    'company_name' => $company_name,
                    'company_address' => $company_address,
                    'address_user_name' => $address_user_name,
                    'address_mobile' => $address_mobile,
                    'address_tel' => $address_tel,
                    'address_email' => $address_email,
                    'fax' => $fax,
                    'website' => $website
                );
                //
                $member_id = $UserInfo['Id'];
                $remarks = $this->Param['remarks'];


                $is_group = $this->Param['is_group'];
                $sn = NOW_TIME . StringCode::RandomCode(3, 'num');

                $detail_id = empty($this->Param['id']) ? 0 : $this->Param['id'];

                //获取商家发布的展会信息
                $detail_row = $ConventionHelper->getDetailRow(array( '`detail_id` = ?' => $detail_id));
		
				unset($detail_row['description']);
				unset($detail_row[7]);

                //获取展会
                $con_row = $ConventionHelper->getRow(array(
                    '`id` = ?' => $detail_row['con_id']
                ));

                $detailArr['con_detail'] =  $detail_row;

                $detailArr['con_detail']['con_detail'] = $con_row;
				
                $detailArr['con_detail']['detail_area'] = $area_row;

                if($is_group == '1'){//是否采用跟团价格
                    $price = $area_row['group_price'];
                }else{
                    $price = $area_row['booth_price'];
                }
				
			

                //展会订单入库
                $id = $ConventionHelper->orderSave(array(
                    'order_sn' =>$sn,
                    'con_id' => $detail_row['con_id'],
                    'member_id' => $UserInfo['Id'],
                    'saler_id' => $detail_row['member_id'],
                    'con_cover' => $con_row['cover'],
                    'con_name' => $con_row['name'],
                    'detail' => serialize($detailArr),
                    'price' => $price,
                    'money' => $price,
                    'is_group' => $is_group,
                    'receiving' => serialize($receiving),
                    'remarks' => $remarks,
                    'datetime' => NOW_TIME
                ));


                $order_data = array(
                    'order_sn' => $sn,
                    'member_id' => $UserInfo['Id'],
                    'seller_id' => $detail_row['member_id'],
                    'price' => $price,
                    'is_type' => 'convention',
                    'addtime' => NOW_TIME,
                    'show_price' => $price
                );
                if($id){
                    $do = $OrderHelper->save($order_data);

                    $ConventionHelper->areaUpdate(array(
                        'is_rent' => 1
                    ),array(
                        '`area_id` = ?' => $area_id
                    ));

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