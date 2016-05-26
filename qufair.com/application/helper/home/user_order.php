<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('user/UserAddressHelper');
$UserAddressHelper = new UserAddressHelper();

$this->LoadHelper('pay/PayHelper');
$PayHelper = new PayHelper();

//获取用户信息
$UserInfo = $this->UserConfig;

if(empty($this->Param['option'])){
    $limit = 5;

    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $is_sale = empty($this->Param['is_sale']) ? 'all' : $this->Param['is_sale'];

    $where['`member_id` = ?'] = $UserInfo['Id'];
    $where['`delete` = ?'] = 1;
    if(!empty($this->Param['order_sn'])){
        $where['locate(?,`order_sn`)>0'] = trim($this->Param['order_sn']);
    }

    switch($this->Param['is_sale']){
        case '1'://进行的订单
            $where['`order_state` <> ?'] = 2;
            break;
        case '2'://取消的订单
            $where['`order_state` = ?'] = 2;
            break;
    }

    $data = $OrderHelper->GetAllWhere($where, $limit, $page, $this->Param);

    if(!empty($data['All'])){
        foreach($data['All'] as $k => $v){
            $chans = $OrderHelper->shuntOrder($v);
            $data['All'][$k] = array_merge($v,$chans);
        }
    }

    $this->Assign('is_sale', $is_sale);
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('user_order.php');
}else{
    switch($this->Param['option']){
        case 'cancel'://取消订单

            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
            $where = array('`order_id` = ?'=>$order_id,'`member_id` = ?' => $UserInfo['Id']);

            if(!empty($this->Param['area_id'])){
                $ConventionHelper->areaUpdate(array(
                    'is_rent' => 0
                ),array(
                    '`area_id` = ?' => $this->Param['area_id']
                ));
            }

            $data['order_state'] = 2;
            $row = $OrderHelper->Update($data,$where);
            if($row){

                $msg['success'] = true;
            }else{
                $msg['success'] = false;
            }

            echo json_encode($msg);
            break;
        case 'remove'://删除订单

            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
            $where = array('`order_id` = ?'=>$order_id,'`member_id` = ?' => $UserInfo['Id']);
            $data['delete'] = 0;
            $row = $OrderHelper->Update($data,$where);
            if($row){
                $msg['success'] = true;
            }else{
                $msg['success'] = false;
            }

            echo json_encode($msg);
            break;
        case 'gathering':
            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
            $where = array('`order_id` = ?'=>$order_id,'`member_id` = ?' => $UserInfo['Id']);
            $data['order_state'] = 3;
            $row = $OrderHelper->Update($data,$where);

            //支付记录
            $payRow = $PayHelper->logRow($where);

            //添加记录到支付日志表
            $dataPay['pay_sn'] = $payRow['pay_sn'];
            $dataPay['payment'] = $payRow['payment'];
            $dataPay['category'] = 'gathering';
            $dataPay['member'] = $payRow['member'];
            $dataPay['order_sn'] = $payRow['order_sn'];
            $dataPay['order_id'] = $payRow['order_id'];
            $dataPay['amount'] = $payRow['amount'];
            $dataPay['is_paid'] = $payRow['is_paid'];
            $dataPay['remarks'] = $payRow['remarks'];
            $dataPay['delete'] = $payRow['delete'];
            $dataPay['order_state'] = 3;
            $dataPay['dateline'] = time();
            $PayHelper->logSave($data);

            //获取用户余额等信息
            $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $UserInfo['Id']));
            $amount = floor(($memberRow['money'] + $payRow['amount']) * 100);
            $moneryTotal = ($amount / 100);
            $MemberListHelper->memberUpdate(array('money' => $moneryTotal),array('`id` = ?' => $UserInfo['Id']));

            if($row){
                $msg['success'] = true;
            }else{
                $msg['success'] = false;
            }

            echo json_encode($msg);
            break;
        case 'detail':
            $sn = empty($this->Param['sn']) ? ErrorMsg::Debug('操作错误') : $this->Param['sn'];
            $memberId = $UserInfo['Id'];

            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $sn
            ));

            switch($order_row['is_type']){
                case 'convention'://展会订单信息
                    $data = $ConventionHelper->orderRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['detail'] = unserialize($data['detail']);
                    $data['receiving'] = unserialize($data['receiving']);
                    break;
                case'route':
                    $data = $RouteHelper->orderRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['goods_detail'] = unserialize($data['goods_detail']);
                    $data['receiving'] = unserialize($data['receiving']);

                    break;
                case'visa':

                    $data = $VisaHelper->getOrderVisaRow(array(
                        '`order_sn` = ?' => $sn
                    ));
                    $data['receiving'] = unserialize($data['receiving']);

                    //签证人信息
                    $data['visa_member'] = $VisaHelper->getVisaMemberList(array( '`order_id` = ?' => $data['id']),200,0,'');

                    break;
                case'logistics':
                    $data = $LogisticsHelper->getOrderLogisticsRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['log_detail'] = unserialize($data['log_detail']);
                    $data['receiving'] = unserialize($data['receiving']);
                    $data['log_detail']['log_freight'] = unserialize($data['log_detail']['log_freight']);

                    break;
                case'decoration':
                    $data = $DecorationHelper->getOrderDecotionRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['detail'] = unserialize($data['detail']);
                    $data['receiving'] = unserialize($data['receiving']);
                    $data['de_style'] = unserialize($data['de_style']);

                    break;
                default:
            }
            $this->Assign('type', $order_row['is_type']);
            $this->Assign('data', $data);
            echo $this->GetView('user_order_detail.php');
            break;
        default :
    }
}