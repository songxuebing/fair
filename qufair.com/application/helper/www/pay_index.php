<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('pay/PayHelper');
    $PayHelper = new PayHelper();

    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();

    $pay_type = empty($this->Param['pay_type']) ? 'lianlian' : $this->Param['pay_type'];
    $area_id = empty($this->Param['area_id']) ? 0 : $this->Param['area_id'];
    $sn = empty($this->Param['sn']) ? ErrorMsg::Debug('参数错误') : $this->Param['sn'];
    //读取订单详情
    $order_row = $OrderHelper->getRow(array(
        '`order_sn` = ?' => $sn
    ));
    //判断是否预付款
    if($this->Param['advance'] == 'quan' || empty($this->Param['advance'])){
        $advance_price = 0.00;
        $order_price = $order_row['price'];
    }elseif($this->Param['advance'] == 'yu' ){
        $areaRow = $ConventionHelper->getAreaRow(array(
            '`area_id` = ?' => $area_id
        ));
        $advance_price = $areaRow['advance_payment'];
        $order_price = $advance_price;
    }

    //订单分表
    $order_trans = $OrderHelper->shuntOrder($order_row);
    if(empty($order_row)){
        ErrorMsg::Debug('未找到相关订单');
    }elseif($order_row['is_pay'] == 1){
        if(!$order_row['order_state'] == 4){
            ErrorMsg::Debug('订单已支付，无须重复支付');
        }else{
            $order_price = $order_row['price'] - $order_row['advance'];
        }
    }

    $OrderHelper->Update(array(
        'advance' => $advance_price
    ),array(
        '`order_sn` = ?' => $sn
    ));

    $pay_sn = NOW_TIME . StringCode::RandomCode(3, 'num');
    //保存支付日志
    $log_data = array(
        'pay_sn' => $pay_sn,
        'payment' => $pay_type,
        'category' => 'order',
        'member' => $this->UserConfig['Id'],
        'order_sn' => $sn,
        'order_id' => $order_row['order_id'],
        'amount' => $order_price,
        'dateline' => NOW_TIME
    );
    $id = $PayHelper->logSave($log_data);

    /**
    * 后来新增逻辑，如果是去展担保的，直接生成订单，不用跳转到网银支付，
    *后台可以直接修改状态。其他的需要跳转到银行支付
    ****/
    if($this->Param['bankcode'] == 'quzhan'){
        $OrderHelper->Update(array(
            'is_quzhan' => 1
        ),array(
            '`order_sn` = ?' => $sn
        ));

        header("Location:".$order_trans['pay_return']);
        exit();
    }else{
        $OrderHelper->Update(array(
            'is_quzhan' => 0
        ),array(
            '`order_sn` = ?' => $sn
        ));

        switch ($pay_type) {
            case 'lianlian':

                break;
            case 'alipay':
                $bank_code = empty($this->Param['bankcode']) ? ErrorMsg::Debug('请选择支付银行') : $this->Param['bankcode'];
                $this->LoadResurces('pay/alipay/class.alipay');
                $pay_config = include CONFIG_PATH . '/Pay.php';
                $pay_config = $pay_config['alipay'];
                $alipay = new AlipaySubmit($pay_config);
                $params = array(
                    "service" => "create_direct_pay_by_user",
                    "partner" => trim($pay_config['partner']),
                    "seller_email" => trim($pay_config['seller_email']),
                    "payment_type" => 1,
                    "notify_url" => 'http://' . HTTP_HOST . '/pay/notify/pay_type/alipay/',
                    "return_url" => $order_trans['pay_return'],
                    "out_trade_no" => $pay_sn,
                    "subject" => $order_trans['goods_name'],
                    "total_fee" => $order_price,
                    "body" => '',
                    "show_url" => 'http://' . HTTP_HOST,
                    "anti_phishing_key" => '',
                    "exter_invoke_ip" => '',
                    "_input_charset" => trim(strtolower($pay_config['input_charset'])),
                    "paymethod" => 'bankPay',
                    "defaultbank" => $bank_code
                );
                $html_text = $alipay->buildRequestForm($params, "get", "确认");
                if ($id) {
                    echo $html_text;
                }
                break;
            default :
        }

    }

