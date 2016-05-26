<?php
$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('pay/PayHelper');
$PayHelper = new PayHelper();

$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

if(empty($this->Param['option'])){
    /**
    * 支付页面
     * @param pay_type 支付类型
     * @param area_id 当为展会类型支付时，尺寸为展会区域ID ，其他类型可以不用传参
     * @param sn  订单号
     * @param member_id  当前用户id
     * @param advance 当为展会类型支付时，判断是为预付款还是全款支付， 可选值：yu | quan
     * @param bankcode 支付宝银联编号 当值为 quzhan 时，为去展担保支付。直接跳转到成功页面，此类型只在展会类型支付时才会有
     **/
    $pay_type = empty($this->Param['pay_type']) ? 'lianlian' : $this->Param['pay_type'];
    $area_id = empty($this->Param['area_id']) ? 0 : $this->Param['area_id'];

    if(empty($this->Param['sn'])){
        $row['code'] = 1;
        $row['msg'] = '参数错误';
        echo $this->Param['callback']."(".json_encode($row).")";
        die();
    }
    $sn = $this->Param['sn'];
    //读取订单详情
    $order_row = $OrderHelper->getRow(array(
        '`order_sn` = ?' => $sn
    ));
    //判断是否预付款
    if($this->Param['advance'] == 'quan' ){
        $advance_price = 0.00;
        $order_price = $order_row['price'];
    }
    if($this->Param['advance'] == 'yu' ){
        $areaRow = $ConventionHelper->getAreaRow(array(
            '`area_id` = ?' => $area_id
        ));
        $advance_price = $areaRow['advance_payment'];
        $order_price = $advance_price;
    }

    //订单分表
    $order_trans = $OrderHelper->shuntOrder($order_row);
    if(empty($order_row)){
        $row['code'] = 1;
        $row['msg'] = '未找到相关订单';
        echo $this->Param['callback']."(".json_encode($row).")";
        die();

    }elseif($order_row['is_pay'] == 1){
        if(!$order_row['order_state'] == 4){
            $row['code'] = 1;
            $row['msg'] = '订单已支付，无须重复支付';
            echo $this->Param['callback']."(".json_encode($row).")";
            die();
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
        'member' => $this->Param['member_id'],
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

        $row = array(
            'code' => 0,
            'msg' => '去展担保支付成功'
        );
        echo $this->Param['callback']."(".json_encode($row).")";
        die();

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

                if(empty($this->Param['bankcode'])){
                    $row = array(
                        'code' => 1,
                        'msg' => '请选择支付银行'
                    );
                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();
                }
                $bank_code = $this->Param['bankcode'];
                $this->LoadResurces('pay/alipay/class.alipay');
                $pay_config = include CONFIG_PATH . '/Pay.php';
                $pay_config = $pay_config['alipay'];
                $alipay = new AlipaySubmit($pay_config);
                $params = array(
                    "service" => "create_direct_pay_by_user",
                    "partner" => trim($pay_config['partner']),
                    "seller_email" => trim($pay_config['seller_email']),
                    "payment_type" => 1,
                    "notify_url" => 'http://' . HTTP_HOST . '/public/payback/option/back/pay_type/alipay/',
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
                    $row = array(
                        'code' => 0,
                        'data' => $html_text
                    );
                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();

                }
                break;
            default :
        }
    }

}else{
    switch($this->Param['option']){
        case 'back':

            $pay_type = empty($this->Param['pay_type']) ? 'lianlian' : $this->Param['pay_type'];
            switch ($pay_type) {
                case 'lianlian':
                    $this->LoadResurces('pay/lianlian/class.pay');
                    $pay_config = include CONFIG_PATH . '/Pay.php';
                    $llpay = new LLpay($pay_config);
                    $verify_result = $llpay->verifyNotify();
                    if ($verify_result && $verify_result['result_pay'] == 'SUCCESS') {

                    } else {
                        $result = array('ret_code' => '999', 'ret_msg' => '订单添加失败');
                    }

                    echo $this->Param['callback']."(".json_encode($result).")";
                    break;
                case 'alipay':
                    $this->LoadResurces('pay/alipay/class.alipay');
                    $pay_config = include CONFIG_PATH . '/Pay.php';
                    $pay_config = $pay_config['alipay'];
                    $alipayNotify = new AlipayNotify($pay_config);
                    $verify_result = $alipayNotify->verifyNotify();
                    if ($verify_result && ($_POST['trade_status'] == 'TRADE_SUCCESS' || $_POST['trade_status'] == 'TRADE_FINISHED')) {
                        $order_sn = $_POST['out_trade_no'];
                        //支付记录表详情
                        $pay_row = $PayHelper->logRow(array(
                            '`pay_sn` = ?' => $order_sn,
                            '`category` = ?' => 'order'
                        ));
                        if (empty($pay_row)) {
                            echo 'fail';
                            die();
                        }
                        //总订单详情
                        $order_row = $OrderHelper->getRow(array(
                            '`order_sn` = ?' => $pay_row['order_sn']
                        ));
                        if (empty($order_row) || $order_row['is_pay'] == 1) {
                            echo 'fail';
                            die();
                        } else {
                            //更新支付日志为已支付
                            $do_paylog = $up_paylog = $PayHelper->logSave(array('is_paid' => 1), $pay_row['id']);

                            if ($do_paylog) {

                                if($order_row['is_type'] == 'convention' && $order_row['advance'] > 0){

                                    $do = $OrderHelper->Update(array(
                                        'is_pay' => 1,
                                        'order_state' => 4
                                    ), array('`order_id` = ?' => $order_row['order_id']));
                                }else{

                                    $do = $OrderHelper->Update(array(
                                        'is_pay' => 1,
                                        'order_state' => 1
                                    ), array('`order_id` = ?' => $order_row['order_id']));
                                }

                                switch ($order_row['is_type']) {
                                    case 'route':
                                        break;
                                    default :
                                }

                                echo 'success';
                            }
                        }
                    }

                    break;
            }

            break;
        default :
    }
}