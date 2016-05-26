<?php

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper =  new OrderHelper();

if (empty($this->Param['option'])) {

    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

    $where = array(
        '`saler_id` = ?' => $this->UserConfig['Id']
    );
    
    $data = $RouteHelper->orderList($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $order_row = $OrderHelper->getRow(array(
            '`order_sn` = ?' => $v['order_sn']
        ));
        $data['All'][$k]['order_row'] = $order_row;
        $data['All'][$k]['status'] = $OrderHelper->changeOrderStatus($order_row);
    }
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    
    echo $this->GetView('route_order.php');
} else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $where = array(
                '`id` = ?' => $id,
                '`saler_id` = ?' => $this->UserConfig['Id']
            );
            $route_order = $RouteHelper->orderRow($where);
            if(empty($route_order)){
                ErrorMsg::Debug('未找到相关信息');
            }
            $route_order['goods_detail'] = unserialize($route_order['goods_detail']);
            $route_order['receiving'] = unserialize($route_order['receiving']);
            $this->Assign('route_order',$route_order);
            
            //
            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $route_order['order_sn']
            ));
            $this->Assign('order_row' , $order_row);
            
            echo $this->GetView('route_order_detail.php');
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
            $route_order = $RouteHelper->orderRow($where);
            if(empty($route_order)){
                ErrorMsg::Debug('未找到相关信息');
            }else{
                $OrderHelper->Update(array('price' => $money), array('`order_sn` = ?' => $route_order['order_sn']));
                ErrorMsg::Debug('修改成功',TRUE);
            }
            break;
    }
    
}