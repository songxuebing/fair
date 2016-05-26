<?php

$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper =  new OrderHelper();

if (empty($this->Param['option'])) {

    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

    $where = array(
        '`saler_id` = ?' => $this->UserConfig['Id']
    );

    $data = $LogisticsHelper->orderLogisticsList($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){

        //获取物流信息
        $data['All'][$k]['log_detail'] = unserialize($v['log_detail']);
        $data['All'][$k]['log_detail']['log_freight'] = unserialize($data['All'][$k]['log_detail']['log_freight']);

        $order_row = $OrderHelper->getRow(array(
            '`order_sn` = ?' => $v['order_sn']
        ));
        $data['All'][$k]['order_row'] = $order_row;
        $data['All'][$k]['status'] = $OrderHelper->changeOrderStatus($order_row);
    }
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);

    echo $this->GetView('logistics_order.php');
} else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $where = array(
                '`id` = ?' => $id,
                '`saler_id` = ?' => $this->UserConfig['Id']
            );
            //签证订单
            $logistics_order = $LogisticsHelper->getOrderLogisticsRow($where);
            if(empty($logistics_order)){
                ErrorMsg::Debug('未找到相关信息');
            }
            $logistics_order['log_detail'] = unserialize($logistics_order['log_detail']);
            $logistics_order['log_detail']['log_freight'] = unserialize($logistics_order['log_detail']['log_freight']);
            $logistics_order['receiving'] = unserialize($logistics_order['receiving']);
            $this->Assign('logistics_order',$logistics_order);

            //总订单表
            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $logistics_order['order_sn']
            ));
            $order_row['status'] = $OrderHelper->changeOrderStatus($order_row);

            $this->Assign('order_row' , $order_row);

            echo $this->GetView('logistics_order_detail.php');
            break;
        case 'changeprice':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $money = empty($this->Param['money']) ? ErrorMsg::Debug('请输入修改后金额') : $this->Param['money'];
            if(!is_numeric($money) || $money<=0){
                ErrorMsg::Debug('金额错误');
            }
            $where = array(
                '`id` = ?' => $id,
                '`saler_id` = ?' => $this->UserConfig['Id']
            );
            $logistics_order = $LogisticsHelper->getOrderLogisticsRow($where);
            if(empty($logistics_order)){
                ErrorMsg::Debug('未找到相关信息');
            }else{
                $OrderHelper->Update(array('price' => $money), array('`order_sn` = ?' => $logistics_order['order_sn']));
                ErrorMsg::Debug('修改成功',TRUE);
            }
            break;

    }
    
}