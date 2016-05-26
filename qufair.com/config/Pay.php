<?php
return array(
    'oid_partner' => '201408071000001543', //商户编号是商户在连连钱包支付平台上开设的商户号码
    'key' => '201408071000001543test_20140812', //安全检验码，以数字和字母组成的字符
    'version' => '1.0', //版本号
    'userreq_ip' => '',
    'id_type' => 0,
    'sign_type' => strtoupper('MD5'),
    'valid_order' => '10080',
    'input_charset' => strtolower('utf-8'),
    'transport' => 'http', //访问模式
    'alipay' => array(
        'partner' => '2088021596396263', //合作身份者id，以2088开头的16位纯数
        'seller_email' => 'qupay@qufair.com', //收款支付宝账号
        'key' => 'zmk47lv294zqq3yw2agjvzgtrtqd1149', //安全检验码，以数字和字母组成的32位字符
        'sign_type' => 'MD5',
        'input_charset' => 'utf-8',
        'cacert' => '', //CA证书
        'transport' => 'http'
    )
);