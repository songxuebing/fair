<?php
$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper =  new OrderHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper =  new MemberListHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
    
    $where = array('`is_type` = ?' => 'logistics');
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
    $data = $OrderHelper->GetAllWhere($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        //物流详情
        $detail_row = $LogisticsHelper->getOrderLogisticsRow(array(
            '`order_sn` = ?' => $v['order_sn']
        ));

        $data['All'][$k]['order_row'] = $detail_row;
        $data['All'][$k]['status'] = $OrderHelper->changeOrderStatus($v);
        $data['All'][$k]['order_row']['log_detail'] = unserialize($detail_row['log_detail']);
        $data['All'][$k]['order_row']['log_detail']['log_freight'] = unserialize($data['All'][$k]['order_row']['log_detail']['log_freight']);
        $data['All'][$k]['receiving'] = unserialize($detail_row['receiving']);

        $saler = $MemberListHelper->GetMemberRow(array(
            '`id` = ?' => $v['seller_id']
        ));
        $data['All'][$k]['saler'] = $saler;
    }

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    
    echo $this->GetView('logistics_order.php');
    
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
            $data['is_pay'] = 1;
            $row = $OrderHelper->Update($data,$where);
            if($row){
                ErrorMsg::Debug('代付成功',TRUE);
            }
            ErrorMsg::Debug('代付失败');
            break;
        default :
    }
}