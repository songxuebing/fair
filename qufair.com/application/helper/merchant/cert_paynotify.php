<?php

$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

$this->LoadHelper('pay/PayHelper');
$PayHelper = new PayHelper();


$pay_type = empty($this->Param['pay_type']) ? 'lianlian' : $this->Param['pay_type'];
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
                '`pay_sn` = ?' => $no_order
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
                    //更新认证情况
                    $supplier_update = array(
                        'cert_state' => 1,
                        'pay_status' => 1
                    );
                    $SupplierHelper->certSave($supplier_update, $pay_log['order_id']);
                    $result = array('ret_code' => '000', 'ret_msg' => '交易成功');
                }
            }
        } else {
            $result = array('ret_code' => '999', 'ret_msg' => '验签失败');
        }
        echo json_encode($result);
        break;
    case 'alipay':
        $this->LoadResurces('pay/alipay/class.alipay');
        $pay_config = include CONFIG_PATH . '/Pay.php';
        $pay_config = $pay_config['alipay'];
        $alipayNotify = new AlipayNotify($pay_config);
        $verify_result = $alipayNotify->verifyNotify();
        if($verify_result && ($_POST['trade_status'] == 'TRADE_SUCCESS' || $_POST['trade_status'] == 'TRADE_FINISHED')) {
            //查找相关支付订单号
            $no_order = $_POST['out_trade_no'];
            $pay_log = $PayHelper->logRow(array(
                '`pay_sn` = ?' => $no_order
            ));
            if (empty($pay_log)) {
                echo "fail";
            } elseif ($pay_log['is_paid'] == 1) {
                echo "fail";
            } elseif ($pay_log['is_paid'] == 0) {
                //更新订单状态
                $log_update = array(
                    'is_paid' => 1
                );
                $do = $PayHelper->logSave($log_update, $pay_log['id']);
                if ($do) {
                    //更新认证情况
                    $supplier_update = array(
                        'cert_state' => 1,
                        'pay_status' => 1
                    );
                    $SupplierHelper->certSave($supplier_update, $pay_log['order_id']);
                    echo "success";
                }
            }
        }else{
            echo "fail";
        }
        break;
}
