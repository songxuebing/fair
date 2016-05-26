<?php

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper =  new OrderHelper();

if (empty($this->Param['option'])) {

    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

    $where = array(
        '`saler_id` = ?' => $this->UserConfig['Id']
    );

    $data = $DecorationHelper->orderDecorationList($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){

        //获取物流信息
        $data['All'][$k]['detail'] = unserialize($v['detail']);
        $data['All'][$k]['de_style'] = unserialize($v['de_style']);


        $order_row = $OrderHelper->getRow(array(
            '`order_sn` = ?' => $v['order_sn']
        ));
        $data['All'][$k]['order_row'] = $order_row;
        $data['All'][$k]['status'] = $OrderHelper->changeOrderStatus($order_row);
    }

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('decoration_order.php');
} else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $where = array(
                '`id` = ?' => $id,
                '`saler_id` = ?' => $this->UserConfig['Id']
            );
            //签证订单
            $decoration_order = $DecorationHelper->getOrderDecotionRow($where);
            if(empty($decoration_order)){
                ErrorMsg::Debug('未找到相关信息');
            }
            $decoration_order['detail'] = unserialize($decoration_order['detail']);
            $decoration_order['de_style'] = unserialize($decoration_order['de_style']);
            $decoration_order['receiving'] = unserialize($decoration_order['receiving']);
            $this->Assign('decoration_order',$decoration_order);

            //总订单表
            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $decoration_order['order_sn']
            ));
            $order_row['status'] = $OrderHelper->changeOrderStatus($order_row);

            $this->Assign('order_row' , $order_row);
            print_r($decoration_order);
            print_r($order_row);
            echo $this->GetView('decoration_order_detail.php');
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
            $decoration_order = $DecorationHelper->getOrderDecotionRow($where);
            if(empty($decoration_order)){
                ErrorMsg::Debug('未找到相关信息');
            }else{
                $OrderHelper->Update(array('price' => $money), array('`order_sn` = ?' => $decoration_order['order_sn']));
                ErrorMsg::Debug('修改成功',TRUE);
            }
            break;

    }
    
}