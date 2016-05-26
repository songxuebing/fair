<?php

class LLpay {

    var $llpay_config;

    /**
     * 连连支付网关地址
     */
    var $llpay_gateway_new = 'https://yintong.com.cn/payment/bankgateway.htm';

    function __construct($llpay_config) {
        $this->llpay_config = $llpay_config;
    }

    function LLpaySubmit($llpay_config) {
        $this->__construct($llpay_config);
    }

    /**
     * 生成签名结果
     * @param $para_sort 已排序要签名的数组
     * return 签名结果字符串
     */
    function buildRequestMysign($para_sort) {
        //把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
        $prestr = createLinkstring($para_sort);
        $mysign = "";
        switch (strtoupper(trim($this->llpay_config['sign_type']))) {
            case "MD5" :
                $mysign = md5Sign($prestr, $this->llpay_config['key']);
                break;
            case "RSA" :
                $mysign = RsaSign($prestr);
                break;
            default :
                $mysign = "";
        }
        //file_put_contents("paylog.txt", "签名:" . $mysign . "\r\n", FILE_APPEND);
        return $mysign;
    }

    /**
     * 生成要请求给连连支付的参数数组
     * @param $para_temp 请求前的参数数组
     * @return 要请求的参数数组
     */
    function buildRequestPara($para_temp) {
        //除去待签名参数数组中的空值和签名参数
        $para_filter = paraFilter($para_temp);
        //对待签名参数数组排序
        $para_sort = argSort($para_filter);
        //生成签名结果
        $mysign = $this->buildRequestMysign($para_sort);
        //签名结果与签名方式加入请求提交参数组中
        $para_sort['sign'] = $mysign;
        $para_sort['sign_type'] = strtoupper(trim($this->llpay_config['sign_type']));
        foreach ($para_sort as $key => $value) {
            $para_sort[$key] = $value;
        }
        return $para_sort;
        //return urldecode(json_encode($para_sort));
    }

    /**
     * 生成要请求给连连支付的参数数组
     * @param $para_temp 请求前的参数数组
     * @return 要请求的参数数组字符串
     */
    function buildRequestParaToString($para_temp) {
        //待请求参数数组
        $para = $this->buildRequestPara($para_temp);

        //把参数组中所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串，并对字符串做urlencode编码
        $request_data = createLinkstringUrlencode($para);

        return $request_data;
    }

    /**
     * 建立请求，以表单HTML形式构造（默认）
     * @param $para_temp 请求参数数组
     * @param $method 提交方式。两个值可选：post、get
     * @param $button_name 确认按钮显示文字
     * @return 提交表单HTML文本
     */
    function buildRequestForm($para_temp, $method, $button_name) {
        //待请求参数数组
        $para = $this->buildRequestPara($para_temp);
        //风控值去斜杠
        $para['risk_item'] = stripslashes($para['risk_item']);
        $sHtml = "<form id='llpaysubmit' name='llpaysubmit' action='" . $this->llpay_gateway_new . "' method='" . $method . "'>";
        $sHtml .= "<input type='hidden' name='version' value='" . $para['version'] . "'/>";
        $sHtml .= "<input type='hidden' name='oid_partner' value='" . $para['oid_partner'] . "'/>";
        $sHtml .= "<input type='hidden' name='user_id' value='" . $para['user_id'] . "'/>";
        $sHtml .= "<input type='hidden' name='timestamp' value='" . $para['timestamp'] . "'/>";
        $sHtml .= "<input type='hidden' name='sign_type' value='" . $para['sign_type'] . "'/>";
        $sHtml .= "<input type='hidden' name='sign' value='" . $para['sign'] . "'/>";
        $sHtml .= "<input type='hidden' name='busi_partner' value='" . $para['busi_partner'] . "'/>";
        $sHtml .= "<input type='hidden' name='no_order' value='" . $para['no_order'] . "'/>";
        $sHtml .= "<input type='hidden' name='dt_order' value='" . $para['dt_order'] . "'/>";
        $sHtml .= "<input type='hidden' name='name_goods' value='" . $para['name_goods'] . "'/>";
        $sHtml .= "<input type='hidden' name='info_order' value='" . $para['info_order'] . "'/>";
        $sHtml .= "<input type='hidden' name='money_order' value='" . $para['money_order'] . "'/>";
        $sHtml .= "<input type='hidden' name='notify_url' value='" . $para['notify_url'] . "'/>";
        $sHtml .= "<input type='hidden' name='url_return' value='" . $para['url_return'] . "'/>";
        $sHtml .= "<input type='hidden' name='userreq_ip' value='" . $para['userreq_ip'] . "'/>";
        $sHtml .= "<input type='hidden' name='url_order' value='" . $para['url_order'] . "'/>";
        $sHtml .= "<input type='hidden' name='valid_order' value='" . $para['valid_order'] . "'/>";
        $sHtml .= "<input type='hidden' name='bank_code' value='" . $para['bank_code'] . "'/>";
        $sHtml .= "<input type='hidden' name='pay_type' value='" . $para['pay_type'] . "'/>";
        $sHtml .= "<input type='hidden' name='no_agree' value='" . $para['no_agree'] . "'/>";
        $sHtml .= "<input type='hidden' name='shareing_data' value='" . $para['shareing_data'] . "'/>";
        $sHtml .= "<input type='hidden' name='risk_item' value='" . $para['risk_item'] . "'/>";
        $sHtml .= "<input type='hidden' name='id_type' value='" . $para['id_type'] . "'/>";
        $sHtml .= "<input type='hidden' name='id_no' value='" . $para['id_no'] . "'/>";
        $sHtml .= "<input type='hidden' name='acct_name' value='" . $para['acct_name'] . "'/>";
        $sHtml .= "<input type='hidden' name='flag_modify' value='" . $para['flag_modify'] . "'/>";
        $sHtml .= "<input type='hidden' name='card_no' value='" . $para['card_no'] . "'/>";
        $sHtml .= "<input type='hidden' name='back_url' value='" . $para['back_url'] . "'/>";
        //submit按钮控件请不要含有name属性
        $sHtml = $sHtml . "<input type='submit' value='" . $button_name . "' style='display:none'></form>";
        $sHtml = $sHtml . "<script>document.forms['llpaysubmit'].submit();</script>";
        return $sHtml;
    }

    /**
     * 针对notify_url验证消息是否是连连支付发出的合法消息
     * @return 验证结果
     */
    function verifyNotify() {
        //生成签名结果
        $is_notify = true;
        $str = file_get_contents("php://input");        
        logResult($str);
        $val = json_decode($str);
        $oid_partner = trim($val->{
                'oid_partner' });
        $sign_type = trim($val->{
                'sign_type' });
        $sign = trim($val->{
                'sign' });
        $dt_order = trim($val->{
                'dt_order' });
        $no_order = trim($val->{
                'no_order' });
        $oid_paybill = trim($val->{
                'oid_paybill' });
        $money_order = trim($val->{
                'money_order' });
        $result_pay = trim($val->{
                'result_pay' });
        $settle_date = trim($val->{
                'settle_date' });
        $info_order = trim($val->{
                'info_order' });
        $pay_type = trim($val->{
                'pay_type' });
        $bank_code = trim($val->{
                'bank_code' });
        $no_agree = trim($val->{
                'no_agree' });
        $id_type = trim($val->{
                'id_type' });
        $id_no = trim($val->{
                'id_no' });
        $acct_name = trim($val->{
                'acct_name' });

        //首先对获得的商户号进行比对
        if ($oid_partner != $this->llpay_config['oid_partner']) {
            //商户号错误
            return false;
        }
        $parameter = array(
            'oid_partner' => $oid_partner,
            'sign_type' => $sign_type,
            'dt_order' => $dt_order,
            'no_order' => $no_order,
            'oid_paybill' => $oid_paybill,
            'money_order' => $money_order,
            'result_pay' => $result_pay,
            'settle_date' => $settle_date,
            'info_order' => $info_order,
            'pay_type' => $pay_type,
            'bank_code' => $bank_code,
            'no_agree' => $no_agree,
            'id_type' => $id_type,
            'id_no' => $id_no,
            'acct_name' => $acct_name
        );
        if (!$this->getSignVeryfy($parameter, $sign)) {
            return false;
        }
        return $parameter;
    }

    /**
     * 获取返回时的签名验证结果
     * @param $para_temp 通知返回来的参数数组
     * @param $sign 返回的签名结果
     * @return 签名验证结果
     */
    function getSignVeryfy($para_temp, $sign) {
        //除去待签名参数数组中的空值和签名参数
        $para_filter = paraFilter($para_temp);

        //对待签名参数数组排序
        $para_sort = argSort($para_filter);

        //把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
        $prestr = createLinkstring($para_sort);

        //file_put_contents("log.txt", "原串:" . $prestr . "\n", FILE_APPEND);
        //file_put_contents("log.txt", "sign:" . $sign . "\n", FILE_APPEND);
        $isSgin = false;
        switch (strtoupper(trim($this->llpay_config['sign_type']))) {
            case "MD5" :
                $isSgin = md5Verify($prestr, $sign, $this->llpay_config['key']);
                break;
            default :
                $isSgin = false;
        }

        return $isSgin;
    }

    /**
     * 建立请求，以模拟远程HTTP的POST请求方式构造并获取连连支付的处理结果
     * @param $para_temp 请求参数数组
     * @return 连连支付处理结果
     */
    function buildRequestHttp($para_temp) {
        $sResult = '';

        //待请求参数数组字符串
        $request_data = $this->buildRequestPara($para_temp);

        //远程获取数据
        $sResult = getHttpResponsePOST($this->llpay_gateway_new, $this->llpay_config['cacert'], $request_data, trim(strtolower($this->llpay_config['input_charset'])));

        return $sResult;
    }

    /**
     * 建立请求，以模拟远程HTTP的POST请求方式构造并获取连连支付的处理结果，带文件上传功能
     * @param $para_temp 请求参数数组
     * @param $file_para_name 文件类型的参数名
     * @param $file_name 文件完整绝对路径
     * @return 连连支付返回处理结果
     */
    function buildRequestHttpInFile($para_temp, $file_para_name, $file_name) {

        //待请求参数数组
        $para = $this->buildRequestPara($para_temp);
        $para[$file_para_name] = "@" . $file_name;

        //远程获取数据
        $sResult = getHttpResponsePOST($this->llpay_gateway_new, $this->llpay_config['cacert'], $para, trim(strtolower($this->llpay_config['input_charset'])));

        return $sResult;
    }

    /**
     * 用于防钓鱼，调用接口query_timestamp来获取时间戳的处理函数
     * 注意：该功能PHP5环境及以上支持，因此必须服务器、本地电脑中装有支持DOMDocument、SSL的PHP配置环境。建议本地调试时使用PHP开发软件
     * return 时间戳字符串
     */
    function query_timestamp() {
        $url = $this->llpay_gateway_new . "service=query_timestamp&partner=" . trim(strtolower($this->llpay_config['partner'])) . "&_input_charset=" . trim(strtolower($this->llpay_config['input_charset']));
        $encrypt_key = "";

        $doc = new DOMDocument();
        $doc->load($url);
        $itemEncrypt_key = $doc->getElementsByTagName("encrypt_key");
        $encrypt_key = $itemEncrypt_key->item(0)->nodeValue;

        return $encrypt_key;
    }

}

/* *
 * 连连支付接口公用函数
 * 详细：该类是请求、通知返回两个文件所调用的公用函数核心处理文件
 * 版本：1.1
 * 日期：2014-04-16
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 */

/**
 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
 * @param $para 需要拼接的数组
 * return 拼接完成以后的字符串
 */
function createLinkstring($para) {
    $arg = "";
    while (list ($key, $val) = each($para)) {
        $arg.=$key . "=" . $val . "&";
    }
    //去掉最后一个&字符
    $arg = substr($arg, 0, count($arg) - 2);
    //file_put_contents("paylog.txt","转义前:".$arg."\r\n", FILE_APPEND);
    //如果存在转义字符，那么去掉转义
    if (get_magic_quotes_gpc()) {
        $arg = stripslashes($arg);
    }
    //file_put_contents("paylog.txt","转义后:".$arg."\r\n", FILE_APPEND);
    return $arg;
}

/**
 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串，并对字符串做urlencode编码
 * @param $para 需要拼接的数组
 * return 拼接完成以后的字符串
 */
function createLinkstringUrlencode($para) {
    $arg = "";
    while (list ($key, $val) = each($para)) {
        $arg.=$key . "=" . urlencode($val) . "&";
    }
    //去掉最后一个&字符
    $arg = substr($arg, 0, count($arg) - 2);

    //如果存在转义字符，那么去掉转义
    if (get_magic_quotes_gpc()) {
        $arg = stripslashes($arg);
    }

    return $arg;
}

/**
 * 除去数组中的空值和签名参数
 * @param $para 签名参数组
 * return 去掉空值与签名参数后的新签名参数组
 */
function paraFilter($para) {
    $para_filter = array();
    while (list ($key, $val) = each($para)) {
        if ($key == "sign" || $val == "")
            continue;
        else
            $para_filter[$key] = $para[$key];
    }
    return $para_filter;
}

/**
 * 对数组排序
 * @param $para 排序前的数组
 * return 排序后的数组
 */
function argSort($para) {
    ksort($para);
    reset($para);
    return $para;
}

/**
 * 写日志，方便测试（看网站需求，也可以改成把记录存入数据库）
 * 注意：服务器需要开通fopen配置
 * @param $word 要写入日志里的文本内容 默认值：空值
 */
function logResult($word = '') {
    $fp = fopen("paylog.txt", "a");
    flock($fp, LOCK_EX);
    fwrite($fp, "执行日期：" . strftime("%Y%m%d%H%M%S", time()) . "\r\n" . $word . "\r\n");
    flock($fp, LOCK_UN);
    fclose($fp);
}

/**
 * 远程获取数据，POST模式
 * 注意：
 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
 * @param $url 指定URL完整路径地址
 * @param $cacert_url 指定当前工作目录绝对路径
 * @param $para 请求的数据
 * @param $input_charset 编码格式。默认值：空值
 * return 远程输出的数据
 */
function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '') {

    if (trim($input_charset) != '') {
        $url = $url . "_input_charset=" . $input_charset;
    }
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); //SSL证书认证
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); //严格认证
    curl_setopt($curl, CURLOPT_CAINFO, $cacert_url); //证书地址
    curl_setopt($curl, CURLOPT_HEADER, 0); // 过滤HTTP头
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 显示输出结果
    curl_setopt($curl, CURLOPT_POST, true); // post传输数据
    curl_setopt($curl, CURLOPT_POSTFIELDS, $para); // post传输数据
    $responseText = curl_exec($curl);
    //var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
    curl_close($curl);

    return $responseText;
}

/**
 * 远程获取数据，GET模式
 * 注意：
 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
 * @param $url 指定URL完整路径地址
 * @param $cacert_url 指定当前工作目录绝对路径
 * return 远程输出的数据
 */
function getHttpResponseGET($url, $cacert_url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, 0); // 过滤HTTP头
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 显示输出结果
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); //SSL证书认证
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); //严格认证
    curl_setopt($curl, CURLOPT_CAINFO, $cacert_url); //证书地址
    $responseText = curl_exec($curl);
    //var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
    curl_close($curl);

    return $responseText;
}

/**
 * 实现多种字符编码方式
 * @param $input 需要编码的字符串
 * @param $_output_charset 输出的编码格式
 * @param $_input_charset 输入的编码格式
 * return 编码后的字符串
 */
function charsetEncode($input, $_output_charset, $_input_charset) {
    $output = "";
    if (!isset($_output_charset))
        $_output_charset = $_input_charset;
    if ($_input_charset == $_output_charset || $input == null) {
        $output = $input;
    } elseif (function_exists("mb_convert_encoding")) {
        $output = mb_convert_encoding($input, $_output_charset, $_input_charset);
    } elseif (function_exists("iconv")) {
        $output = iconv($_input_charset, $_output_charset, $input);
    } else
        die("sorry, you have no libs support for charset change.");
    return $output;
}

/**
 * 实现多种字符解码方式
 * @param $input 需要解码的字符串
 * @param $_output_charset 输出的解码格式
 * @param $_input_charset 输入的解码格式
 * return 解码后的字符串
 */
function charsetDecode($input, $_input_charset, $_output_charset) {
    $output = "";
    if (!isset($_input_charset))
        $_input_charset = $_input_charset;
    if ($_input_charset == $_output_charset || $input == null) {
        $output = $input;
    } elseif (function_exists("mb_convert_encoding")) {
        $output = mb_convert_encoding($input, $_output_charset, $_input_charset);
    } elseif (function_exists("iconv")) {
        $output = iconv($_input_charset, $_output_charset, $input);
    } else
        die("sorry, you have no libs support for charset changes.");
    return $output;
}

//格式化时间戳
function local_date($format, $time = NULL) {
    if ($time === NULL) {
        $time = gmtime();
    } elseif ($time <= 0) {
        return '';
    }
    return date($format, $time);
}

/**
 * 签名字符串
 * @param $prestr 需要签名的字符串
 * @param $key 私钥
 * return 签名结果
 */
function md5Sign($prestr, $key) {
    $prestr = $prestr . "&key=" . $key;
    //file_put_contents("paylog.txt", "签名原串:" . $prestr . "\r\n", FILE_APPEND);
    return md5($prestr);
}

/**
 * 验证签名
 * @param $prestr 需要签名的字符串
 * @param $sign 签名结果
 * @param $key 私钥
 * return 签名结果
 */
function md5Verify($prestr, $sign, $key) {
    $prestr = $prestr . "&key=" . $key;
    //file_put_contents("paylog.txt", "prestr:" . $prestr . "\r\n", FILE_APPEND);
    $mysgin = md5($prestr);
    //file_put_contents("paylog.txt", "mysgin:" . $mysgin . "\r\n", FILE_APPEND);
    if ($mysgin == $sign) {
        return true;
    } else {
        return false;
    }
}