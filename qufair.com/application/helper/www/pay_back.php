<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('pay/PayHelper');
    $PayHelper = new PayHelper();

    $pay_type = empty($this->Param['pay_type']) ? 'lianlian' : $this->Param['pay_type'];
    $sn = empty($this->Param['sn']) ? ErrorMsg::Debug('参数错误') : $this->Param['sn'];
    //读取订单详情
    
    switch ($pay_type) {
        case 'lianlian':
            $this->LoadResurces('pay/lianlian/class.pay');
            $pay_config = include CONFIG_PATH . '/Pay.php';
            $llpay = new LLpay($pay_config);
            $verify_result = $llpay->verifyNotify();
            if ($verify_result && $verify_result['result_pay'] == 'SUCCESS') {
                //查找相关支付订单号
                $no_order = $verify_result['no_order'];
                $pay_log = $PayHelper->logRow(array(
                    'pay_sn' => $no_order
                ));
                if (empty($pay_log)) {
                    $result = array('ret_code' => '999', 'ret_msg' => '未找到相关订单');
                } elseif ($pay_log['is_paid'] == 1) {
                    $result = array('ret_code' => '999', 'ret_msg' => '当前订单已处理过，无须重复处理');
                } elseif ($pay_log['is_paid'] == 0) {
                    //更新订单状态
                    $log_update = array(
                        'is_paid' => 1
                    );
                    $do = $PayHelper->logSave($log_update, $pay_log['id']);
                    if ($do) {
                        //更新订单支付状态
                        $OrderHelper->Update(array('`is_pay` = ?' => 1,'`order_state` = ?' => 1),array('`order_sn` = ?' => $no_order,'`category` = ? ' => 'order'));
                        $result = array('ret_code' => '000', 'ret_msg' => '交易成功');
                    }
                }
            } else {
                $result = array('ret_code' => '999', 'ret_msg' => '订单添加失败');
            }
            echo json_encode($result);
            break;
        case 'alipay':
            
            break;
    }
