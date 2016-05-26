<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper =  new OrderHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper =  new MemberListHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
    if(!empty($this->Param['key'])){
        $where['`order_sn` = ?'] = $this->Param['key'];
    }
    $where = array('`is_type` = ?' => 'convention');
    switch($list){
        case 'all':
            break;
        case 'waitpay':            
            $where['`order_state` = ?'] = 0;
            break;
        case 'waitreceive':
            $where['`order_state` = ?'] = 1;
            break;
        case 'finish':
            $where['`order_state` = ?'] = 3;
            break;
        case 'cancel':
            $where['`order_state` = ?'] = 2;
            break;
        default :
    }

    if(!empty($this->Param['key'])){
        $where['`order_sn` = ?'] = $this->Param['key'];
    }

    if(!empty($this->Param['tel'])){
        $where['`order_sn` = ?'] = $this->Param['tel'];
    }

    $data = $OrderHelper->GetAllWhere($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $detail_row = $ConventionHelper->orderRow(array(
            '`order_sn` = ?' => $v['order_sn']
        ));
        $data['All'][$k]['order_row'] = $detail_row;
        $data['All'][$k]['status'] = $OrderHelper->changeOrderStatus($v);
        $data['All'][$k]['receiving'] = unserialize($detail_row['receiving']);
        $data['All'][$k]['detail'] = unserialize($detail_row['detail']);

        $saler = $MemberListHelper->GetMemberRow(array(
            '`id` = ?' => $v['seller_id']
        ));
        $data['All'][$k]['saler'] = $saler;
    }

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('con_order.php');
    
} else {
    switch($this->Param['option']){
        case 'cancel'://取消订单
            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
            $where = array('`order_id` = ?'=>$order_id);
            $data['order_state'] = 2;
            $row = $OrderHelper->Update($data,$where);
            if($row){
                ErrorMsg::Debug('取消成功',TRUE);
            }
            ErrorMsg::Debug('取消失败');
            break;
        case 'paid':
            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
            $where = array('`order_id` = ?'=>$order_id);

            $order_row = $OrderHelper->getRow($where);
            if($order_row['is_pay'] == 0 && $order_row['advance'] > 0){
                $money = $order_row['advance'];
                $data['order_state'] = 4;
            }else{
                $money = $order_row['price'];
                $data['order_state'] = 1;
            }

            //判断是预付款还是全款,并添加到卖家账户中
            $member_row = $MemberListHelper->GetMemberRow(array(
                '`id` = ?' => $order_row['seller_id']
            ));

            $money = $member_row['money'] + $money;
            $MemberListHelper->memberUpdate(array(
                'money' =>$money
            ),array(
                '`id` = ?' => $order_row['seller_id']
            ));

            $data['is_pay'] = 1;
            $row = $OrderHelper->Update($data,$where);

            if($row){
                ErrorMsg::Debug('代付成功',TRUE);
            }
            ErrorMsg::Debug('代付失败');
            break;
        case 'receipts':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data = $OrderHelper->getReRow(array(
                '`order_id` = ?' => $id
            ));

            $this->Assign('data', $data);
            echo $this->GetView('convention_receipts.php');
            break;
        case 'detail':
            $sn = empty($this->Param['sn']) ? 0 : $this->Param['sn'] ;
            $where = array(
                '`order_sn` = ?' => $sn
            );
            //展会订单
            $convention_order = $ConventionHelper->orderRow($where);

            if(empty($convention_order)){
                ErrorMsg::Debug('未找到相关信息');
            }
            $convention_order['receiving'] = unserialize($convention_order['receiving']);
            $convention_order['detail'] = unserialize($convention_order['detail']);
            $this->Assign('data',$convention_order);

            //总订单表
            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $convention_order['order_sn']
            ));
            $order_row['status'] = $OrderHelper->changeOrderStatus($order_row);

            $this->Assign('order_row' , $order_row);

            echo $this->GetView('convention_order_detail.php');
            break;

        default :
    }
}