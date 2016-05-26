<?php

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if (empty($this->Param['option'])) {
    
    $this->LoadHelper('public/usercheck');
    
    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
    $route_row = $RouteHelper->routeRow(array(
        '`id` = ?' => $id,
        '`is_sale` = ?' => 1
    ));
    if(empty($route_row)){
        ErrorMsg::Debug('未找到当前行程或行程已下架');
    }

    //获取详细信息
    $menberInfo = $MemberDetailHelper->GetMember($this->UserConfig['Id']);

    $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));

    if(empty($menberInfo['mobile'])){
        $menberInfo['mobile'] = $memberRow['mobile'];
    }
    $menberInfo['list'] = $memberRow;
    $this->Assign('menberInfo',$menberInfo);

    $this->Assign('data' , $route_row);
    echo $this->GetView('route_order.php');
} else {
    switch($this->Param['option']){
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $route_row = $RouteHelper->routeRow(array(
                '`id` = ?' => $id,
                '`is_sale` = ?' => 1
            ));
            if(empty($route_row)){
                ErrorMsg::Debug('未找到当前行程或行程已下架');
            }
            $company_name = empty($this->Param['company_name']) ? ErrorMsg::Debug('请输入公司名称') : $this->Param['company_name'];
            $company_address = empty($this->Param['company_address']) ? ErrorMsg::Debug('请输入公司联系') : $this->Param['company_address'];
            $contacter = empty($this->Param['contacter']) ? ErrorMsg::Debug('请输入联系人') : $this->Param['contacter'];
            $tel = empty($this->Param['tel']) ? ErrorMsg::Debug('请输入联系电话') : $this->Param['tel'];
            $mobile = empty($this->Param['mobile']) ? ErrorMsg::Debug('请输入手机号码') : $this->Param['mobile'];
            if(!StringCode::IsMobile($mobile)){
                ErrorMsg::Debug('手机号码错误');
            }
            $email = empty($this->Param['email']) ? ErrorMsg::Debug('请输入电子邮件') : $this->Param['email'];
            if(!StringCode::IsEmail($email)){
                ErrorMsg::Debug('Email错误');
            }
            $fax = empty($this->Param['fax']) ? ErrorMsg::Debug('请输入公司传真') : $this->Param['fax'];
            $url = $this->Param['url'];
            $num = empty($this->Param['num']) ? ErrorMsg::Debug('请输入行程人数') : $this->Param['num'];
            if(!is_numeric($num)){
                ErrorMsg::Debug('人数错误');
            }
            $remarks = $this->Param['remarks'];
            //存入订单
            $sn = StringCode::RandomCode(3,'time');
            unset($route_row['image']);
            unset($route_row['description']);
            $receiving = array(
                'company_name' => $company_name,
                'company_address' => $company_address,
                'contacter' => $contacter,
                'tel' => $tel,
                'mobile' => $mobile,
                'email' => $email,
                'fax' => $fax,
                'url' => $url
            );
            $route_order = array(
                'order_sn' => $sn,
                'goods_name' => $route_row['name'],
                'goods_detail' => serialize($route_row),
                'route_id' => $route_row['id'],
                'saler_id' => $route_row['member_id'],
                'member_id' => $this->UserConfig['Id'],
                'receiving' => serialize($receiving),
                'nums' => $num,
                'price' => $route_row['price'],
                'money' => $num*$route_row['price'],
                'remarks' => $remarks,
                'dateline' => NOW_TIME
            );
            $id = $RouteHelper->orderSave($route_order);
            $order_data = array(
                'order_sn' => $sn,
                'member_id' => $this->UserConfig['Id'],
                'seller_id' => $route_row['member_id'],
                'price' => $num*$route_row['price'],
                'is_type' => 'route',
                'addtime' => NOW_TIME,
                'show_price' => $num*$route_row['price']
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
            $route_order = $RouteHelper->orderRow(array(
                '`order_sn` = ?' => $sn
            ));
            $route_order['receiving'] = unserialize($route_order['receiving']);
            $this->Assign('data',$route_order);
            //
            $route_row = $RouteHelper->routeRow($route_order['route_id']);
            $this->Assign('route',$route_row);
            
            echo $this->GetView('route_pay.php');
            break;
        case 'payreturn':
            echo $this->GetView('route_paysucc.php');
            break;
        default :
    }
}