<?php

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if (empty($this->Param['option'])) {
    
    $this->LoadHelper('public/usercheck');
    
    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
    $style = $this->Param['style_img'];
    if(!is_numeric($style)){
        ErrorMsg::Debug('请选择装修风格');
    }

    $decoration_row = $DecorationHelper->getRow(array(
        '`id` = ?' => $id,
        '`is_delete` = ?' => 0,
        '`is_online` = ?' => 0
    ));
    if(empty($decoration_row)){
        ErrorMsg::Debug('未找到当前特装或特装已下架');
    }

    $decoration_row['style_number'] = $style;
    $decoration_row['style_img'] = unserialize($decoration_row['style_type']);

    //获取详细信息
    $menberInfo = $MemberDetailHelper->GetMember($this->UserConfig['Id']);

    $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));

    if(empty($menberInfo['mobile'])){
        $menberInfo['mobile'] = $memberRow['mobile'];
    }
    $menberInfo['list'] = $memberRow;
    $this->Assign('menberInfo',$menberInfo);

    $this->Assign('data' , $decoration_row);

    echo $this->GetView('decoration_order.php');
} else {
    switch($this->Param['option']){
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $decoration_row = $DecorationHelper->getRow(array(
                '`id` = ?' => $id,
                '`is_delete` = ?' => 0,
                '`is_online` = ?' => 0
            ));
            if(empty($decoration_row)){
                ErrorMsg::Debug('未找到当前特装或特装已下架');
            }

            //信息判断
            $company = empty($this->Param['company']) ? ErrorMsg::Debug('请填写单位名称') : $this->Param['company'];
            $address = empty($this->Param['address']) ? ErrorMsg::Debug('请填写单位地址') : $this->Param['address'];
            $convention_name = empty($this->Param['convention_name']) ? ErrorMsg::Debug('请填写展会名称') : $this->Param['convention_name'];
            $pavilion_name = empty($this->Param['pavilion_name']) ? ErrorMsg::Debug('请填写展馆名称') : $this->Param['pavilion_name'];
            $convention_time = empty($this->Param['convention_time']) ? ErrorMsg::Debug('请填写展会时间') : $this->Param['convention_time'];
            $area_name = empty($this->Param['area_name']) ? ErrorMsg::Debug('请填写展位号') : $this->Param['area_name'];
            $username = empty($this->Param['username']) ? ErrorMsg::Debug('请填写联系人') : $this->Param['username'];
            $mobile = empty($this->Param['mobile']) ? ErrorMsg::Debug('请填写电话') : $this->Param['mobile'];
            $tel = empty($this->Param['tel']) ? ErrorMsg::Debug('请填写手机号码') : $this->Param['tel'];
            $email = empty($this->Param['email']) ? ErrorMsg::Debug('请填写邮件') : $this->Param['email'];
            $fax = empty($this->Param['fax']) ? ErrorMsg::Debug('请填写传真') : $this->Param['fax'];

            if(!StringCode::IsMobile($tel)){
                ErrorMsg::Debug('手机号码错误');
            }

            $style_number = $this->Param['style_number'];
            if(!is_numeric($style_number)){
                ErrorMsg::Debug('特装风格错误');
            }

            //选择的特装风格
            $style_type = unserialize($decoration_row['style_type']);
            if(!empty($style_type)){
                foreach($style_type as $key => $val){
                    if($key == $style_number){
                        $style_img = $val;
                    }
                }
            }

            $remarks = $this->Param['remarks'];
            $company_website = $this->Param['company_website'];

            //存入订单
            $sn = StringCode::RandomCode(3,'time');
            //地址
            $receiving = array(
                'company' => $company,
                'address' => $address,
                'convention_name' => $convention_name,
                'pavilion_name' => $pavilion_name,
                'convention_time' => $convention_time,
                'area_name' => $area_name,
                'username' => $username,
                'mobile' => $mobile,
                'tel' => $tel,
                'email' => $email,
                'fax' => $fax,
                'company_website' => $company_website
            );

            //特装选择的风格
            $style_arr = array(
                'key' => $style_number,
                'style_img' => $style_img
            );
            //物流订单信息
            $decoration_order = array(
                'order_sn' => $sn,
                'de_id'  => $id,
                'member_id'=> $this->UserConfig['Id'],
                'saler_id' => $decoration_row['member_id'],
                'de_title' => $decoration_row['title'],
                'de_style' => serialize($style_arr),
                'price' => $decoration_row['de_price'],
                'money' => $decoration_row['de_price'],
                'detail' => serialize($decoration_row),
                'receiving' => serialize($receiving),
                'remarks' => $remarks,
                'datetime' => NOW_TIME,
            );

            $decorationOrderId = $DecorationHelper->orderDecorationSave($decoration_order);

            //订单总表
            $order_data = array(
                'order_sn' => $sn,
                'member_id' => $this->UserConfig['Id'],
                'seller_id' => $decoration_row['member_id'],
                'price' => $decoration_row['de_price'],
                'is_type' => 'decoration',
                'addtime' => NOW_TIME,
                'show_price' => $decoration_row['de_price']
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
            $decoration_order = $DecorationHelper->getOrderDecotionRow(array(
                '`order_sn` = ?' => $sn
            ));
            $decoration_order['receiving'] = unserialize($decoration_order['receiving']);
            $decoration_order['detail'] = unserialize($decoration_order['detail']);
            $decoration_order['de_style'] = unserialize($decoration_order['de_style']);
            $this->Assign('data',$decoration_order);
            echo $this->GetView('decoration_pay.php');
            break;
        default :
    }
}