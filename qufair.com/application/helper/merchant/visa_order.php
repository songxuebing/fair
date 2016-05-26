<?php

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper =  new OrderHelper();

if (empty($this->Param['option'])) {

    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

    $where = array(
        '`saler_id` = ?' => $this->UserConfig['Id']
    );

    $data = $VisaHelper->orderVisaList($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $order_row = $OrderHelper->getRow(array(
            '`order_sn` = ?' => $v['order_sn']
        ));
        $data['All'][$k]['order_row'] = $order_row;
        $data['All'][$k]['status'] = $OrderHelper->changeOrderStatus($order_row);
    }
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('visa_order.php');
} else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $where = array(
                '`id` = ?' => $id,
                '`saler_id` = ?' => $this->UserConfig['Id']
            );
            //签证订单
            $visa_order = $VisaHelper->getOrderVisaRow($where);
            if(empty($visa_order)){
                ErrorMsg::Debug('未找到相关信息');
            }
            $visa_order['receiving'] = unserialize($visa_order['receiving']);
            $this->Assign('visa_order',$visa_order);

            //签证人信息
            $visa_member_row = $VisaHelper->getVisaMemberList(array( '`order_id` = ?' => $visa_order['id']),200,0,'');
            $this->Assign('visa_member',$visa_member_row);

            //总订单表
            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $visa_order['order_sn']
            ));
            $order_row['status'] = $OrderHelper->changeOrderStatus($order_row);

            $this->Assign('order_row' , $order_row);

            echo $this->GetView('visa_order_detail.php');
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
            $visa_order = $VisaHelper->getOrderVisaRow($where);
            if(empty($visa_order)){
                ErrorMsg::Debug('未找到相关信息');
            }else{
                $OrderHelper->Update(array('price' => $money), array('`order_sn` = ?' => $visa_order['order_sn']));
                ErrorMsg::Debug('修改成功',TRUE);
            }
            break;
        case 'pdf':
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


            $this->LoadResurces('pdf/tcpdf');
            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
            // 设置文档信息
            $pdf->SetCreator('qufair');
            $pdf->SetAuthor('qufair');
            $pdf->SetTitle('qufair.com');
            // 设置默认等宽字体
            $pdf->SetDefaultMonospacedFont('courier');

            // 设置间距
            $pdf->SetMargins(15, 27, 15);
            $pdf->SetHeaderMargin(5);
            $pdf->SetFooterMargin(10);

            // 设置分页
            $pdf->SetAutoPageBreak(TRUE, 25);

            // set image scale factor
            $pdf->setImageScale(1.25);

            // set default font subsetting mode
            $pdf->setFontSubsetting(true);

            //设置字体
            $pdf->SetFont('stsongstdlight', '', 14);

            $pdf->AddPage();

            $str1 = '合同说明';

            $pdf->Write(0,$str1,'', 0, 'L', true, 0, false, false, 0);

            //输出PDF
            $pdf->Output('ht.pdf', 'I');
            break;
    }
    
}