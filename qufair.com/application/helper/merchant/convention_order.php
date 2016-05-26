<?php
    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();

    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    //获取用户信息
    $UserInfo = $this->UserConfig;

    if(empty($this->Param['option'])){

        $limit = 10;
        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

        $where = array(
            '`saler_id` = ?' => $UserInfo['Id'],
        );

        if(!empty($this->Param['order_sn'])){
            $where['`order_sn` = ?'] = $this->Param['order_sn'];
        }

        $data = $ConventionHelper->GetAllOrderWhere($where, $limit, $page, $this->Param);
        if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
            $data['All'][$k]['detail'] = unserialize($v['detail']);
            $data['All'][$k]['receiving'] = unserialize($v['receiving']);
            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $v['order_sn']
            ));
            $data['All'][$k]['order_row'] = $order_row;
            $data['All'][$k]['status'] = $OrderHelper->changeOrderStatus($order_row);
        }

        $this->Assign('data', $data);
        $this->Assign('param', $this->Param);

        echo $this->GetView('convention_order.php');
    }else{
        switch($this->Param['option']){
            case 'detail':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $where = array(
                    '`id` = ?' => $id,
                    '`saler_id` = ?' => $this->UserConfig['Id']
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
                $convention_order = $ConventionHelper->orderRow($where);

                //判断修改的金额是否小于预付款
                if($convention_order['advance'] >=  $money){
                    ErrorMsg::Debug('金额不能小于预付款');
                }

                if(empty($convention_order)){
                    ErrorMsg::Debug('未找到相关信息');
                }else{
                    $OrderHelper->Update(array('price' => $money), array('`order_sn` = ?' => $convention_order['order_sn']));
                    ErrorMsg::Debug('修改成功',TRUE);
                }
                break;
            case 'pdf':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $where = array(
                    '`id` = ?' => $id,
                    '`saler_id` = ?' => $this->UserConfig['Id']
                );
                $convention_order = $ConventionHelper->orderRow($where);
                if(empty($convention_order)){
                    ErrorMsg::Debug('未找到相关信息');
                }
                $convention_order['goods_detail'] = unserialize($convention_order['detail']);
                $convention_order['receiving'] = unserialize($convention_order['receiving']);
                $this->Assign('route_order',$convention_order);

                //
                $order_row = $OrderHelper->getRow(array(
                    '`order_sn` = ?' => $convention_order['order_sn']
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
            default :
        }
    }