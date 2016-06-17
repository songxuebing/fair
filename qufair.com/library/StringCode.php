<?php

// amespace Library\StringCodeClass;
class StringCode {

    public static function GetCsubStr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
        $charset = empty($charset) ? 'utf-8' : $charset;
        $search = array(
            '((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9\-\.\[\]_\"\'\$\x7f-\xff]+\])*)',
            '/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU', // 去掉 javascript
            '/(<[^>]*)on[a-zA-Z] \s*=([^>]*>)/isU',
            '/<[\/\!]*?[^<>]*?>/si', // 去掉 HTML 标记
            '/([\r\n])[\s]+/i', // 去掉空白字符
            '/&(quot|#34);/i', // 替换 HTML 实体
            '/&(amp|#38);/i',
            '/&(lt|#60);/i',
            '/&(gt|#62);/i',
            '/&(nbsp|#160);/i',
            '/&(iexcl|#161);/i',
            '/&(cent|#162);/i',
            '/&(pound|#163);/i',
            '/&(copy|#169);/i',
            '/&#(\d+);/e',
            '/<\?/si',
            '/\?>/si'
        );
        $replace = array(
            '([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)',
            '&lt;\\1\\2\\3&gt;',
            '\\1\\2',
            "",
            "\r\n",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            '&lt;?',
            '?&gt;'
        );
        $str = preg_replace($search, $replace, $str);
        if (function_exists("mb_substr")) {
            if (mb_strlen($str, $charset) <= $length) {
                return $str;
            }
            $slice = mb_substr($str, $start, $length, $charset);
        } else {
            $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            if (!empty($match[0]) && count($match[0]) <= $length) {
                return $str;
            }
            $slice = join("", array_slice($match[0], $start, $length));
        }
        if ($suffix) {
            return $slice . "…";
        }
        return $slice;
    }

    public static function Fescape($string, $esc_type = 'html', $char_set = 'ISO-8859-1') {
        switch ($esc_type) {
            case 'html':
                return htmlspecialchars($string, ENT_QUOTES, $char_set);
            case 'htmlall':
                return htmlentities($string, ENT_QUOTES, $char_set);
            case 'url':
                return rawurlencode($string);
            case 'urlpathinfo':
                return str_replace('%2F', '/', rawurlencode($string));
            case 'quotes':
                // escape unescaped single quotes
                return preg_replace("%(?<!\\\\)'%", "\\'", $string);
            case 'hex':
                // escape every character into hex
                $return = '';
                for ($x = 0; $x < strlen($string); $x++) {
                    $return.='%' . bin2hex($string[$x]);
                }
                return $return;
            case 'hexentity':
                $return = '';
                for ($x = 0; $x < strlen($string); $x++) {
                    $return.='&#x' . bin2hex($string[$x]) . ';';
                }
                return $return;
            case 'decentity':
                $return = '';
                for ($x = 0; $x < strlen($string); $x++) {
                    $return.='&#' . ord($string[$x]) . ';';
                }
                return $return;
            case 'javascript':
                // escape quotes and backslashes, newlines, etc.
                return strtr($string, array(
                    '\\' => '\\\\',
                    "'" => "\\'",
                    '"' => '\\"',
                    "\r" => '\\r',
                    "\n" => '\\n',
                    '</' => '<\/'
                ));
            case 'mail':
                // safe way to display e-mail address on a web page
                return str_replace(array(
                    '@',
                    '.'
                        ), array(
                    '[AT] ',
                    '[DOT] '
                        ), $string);
            case 'nonstd':
                // escape non-standard chars, such as ms document quotes
                $_res = '';
                for ($_i = 0, $_len = strlen($string); $_i < $_len; $_i++) {
                    $_ord = ord(substr($string, $_i, 1));
                    // non-standard char, escape it
                    if ($_ord >= 126) {
                        $_res.='&#' . $_ord . ';';
                    } else {
                        $_res.=substr($string, $_i, 1);
                    }
                }
                return $_res;
            default:
                return $string;
        }
    }

    public static function HightLight($str, $keywords) {
        if (!is_array($keywords)) {
            $keywords = explode(" ", $keywords);
        }
        foreach ($keywords as $key => $value) {
            if (!empty($value)) {
                $p = array(
                    '/\./si',
                    '/\//si',
                    '/\{/si',
                    '/\}/si',
                    '/\?/si',
                    '/\[/si',
                    '/\]/si',
                    '/\|/si',
                    '/\(/si',
                    '/\)/si'
                );
                $r = array(
                    '\.',
                    '\/',
                    '\{',
                    '\}',
                    '\?',
                    '\[',
                    '\]',
                    '\|',
                    '\(',
                    '\)'
                );
                $pattern[] = preg_replace($p, $r, addslashes($value));
            }
        }
        if (is_array($pattern)) {
            $str = preg_replace("/(" . implode("|", $pattern) . ")/si", "<font color=red>\\1</font>", $str);
        }
        return $str;
    }

    public static function RandomCode($leng = 12, $type = "all") {
        $leng = $leng > 0 ? intval($leng) : 12;
        $str = "";
        if ($type == 'num') {
            for ($i = 0; $i < $leng; $i++) {
                mt_srand(doubleval(microtime() * 1000000));
                $str.=chr(mt_rand(48, 57));
            }
        } elseif ($type == 'capital') {
            for ($i = 0; $i < $leng; $i++) {
                mt_srand(doubleval(microtime() * 1000000));
                $str.=chr(mt_rand(65, 90));
            }
        } elseif ($type == 'lower') {
            for ($i = 0; $i < $leng; $i++) {
                mt_srand(doubleval(microtime() * 1000000));
                $str.=chr(mt_rand(97, 122));
            }
        } elseif ($type == 'time') {
            $str = date('YmdHis');
            $str.=self::RandomCode($leng, 'num');
        } else {
            $char = array(
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "0",
                "a",
                "b",
                "c",
                "d",
                "e",
                "f",
                "g",
                "h",
                "i",
                "j",
                "k",
                "l",
                "m",
                "n",
                "o",
                "p",
                "q",
                "r",
                "s",
                "t",
                "u",
                "v",
                "w",
                "x",
                "y",
                "z",
                "A",
                "B",
                "C",
                "D",
                "E",
                "F",
                "G",
                "H",
                "I",
                "J",
                "K",
                "L",
                "M",
                "N",
                "O",
                "P",
                "Q",
                "R",
                "S",
                "T",
                "U",
                "V",
                "W",
                "X",
                "Y",
                "Z"
            );
            shuffle($char);
            $n = count($char) - 1;
            $str = "";
            for ($i = 0; $i < $leng; $i++) {
                mt_srand(doubleval(microtime() * 1000000));
                $m = mt_rand(0, $n);
                $str.=$char[$m];
            }
        }
        return $str;
    }

    /**
     * semiangle 全角转换为半角
     *
     * @param string $str
     * @return string 返回全角转换为半角后的字符串
     */
    public static function Semiangle($str) {
        $arr = array(
            '０' => '0',
            '１' => '1',
            '２' => '2',
            '３' => '3',
            '４' => '4',
            '５' => '5',
            '６' => '6',
            '７' => '7',
            '８' => '8',
            '９' => '9',
            '（' => '(',
            '）' => ')',
            '［' => '[',
            '］' => ']',
            '【' => '[',
            '】' => ']',
            '〖' => '[',
            '〗' => ']',
            '「' => '[',
            '」' => ']',
            '『' => '[',
            '』' => ']',
            '｛' => '{',
            '｝' => '}',
            '《' => '<',
            '》' => '>',
            '％' => '%',
            '＋' => '+',
            '—' => '-',
            '－' => '-',
            '～' => '-',
            '：' => ':',
            '。' => '.',
            '、' => ',',
            '，' => '.',
            '、' => '.',
            '；' => ',',
            '？' => '?',
            '！' => '!',
            '…' => '-',
            '‖' => '|',
            '＂' => '"',
            '＇' => '\'',
            '｀' => '\'',
            '｜' => '|',
            '〃' => '"',
            '　' => ' '
        );
        return strtr($str, $arr);
    }

    /**
     * Gb2Utf8 转换gbk字符到utf8
     *
     * @param string $gbstr
     * @return string 转换后的字符串
     */
    public static function Gb2Utf8($gbstr) {
        $ishigh = preg_match('/[\x80-\xff]/', $gbstr);
        if (!$ishigh)
            return $gbstr;
        $isutf8 = preg_match('/^([\x00-\x7f]|[\xc0-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xf7][\x80-\xbf]{3})+$/', $gbstr);
        if ($isutf8)
            return $gbstr;
        if (preg_match("/^([" . chr(228) . "-" . chr(233) . "]{1}[" . chr(128) . "-" . chr(191) . "]{1}[" . chr(128) . "-" . chr(191) . "]{1}){1}/", $gbstr) == true || preg_match("/([" . chr(228) . "-" . chr(233) . "]{1}[" . chr(128) . "-" . chr(191) . "]{1}[" . chr(128) . "-" . chr(191) . "]{1}){1}$/", $gbstr) == true || preg_match("/([" . chr(228) . "-" . chr(233) . "]{1}[" . chr(128) . "-" . chr(191) . "]{1}[" . chr(128) . "-" . chr(191) . "]{1}){2,}/", $gbstr) == true)
            return $gbstr;
        if (function_exists('mb_convert_encoding'))
            return mb_convert_encoding($gbstr, 'utf-8', 'GBK');
        else if (function_exists('iconv'))
            return iconv("GBK", "utf-8", $gbstr);
        return $gbstr;
    }

    /**
     * Utf82Gb 转换utf8字符到gbk
     *
     * @param string $gbstr
     * @return string 转换后的字符串
     */
    public static function Utf82Gbk($utfstr) {
        if (function_exists('mb_convert_encoding'))
            return mb_convert_encoding($utfstr, 'GBK', 'utf-8');
        else if (function_exists('iconv'))
            return iconv("utf-8", "GBK", $utfstr);
        return $utfstr;
    }

    public static function IsEmail($value) {
        if (!is_string($value)) {
            return false;
        }
        $matches = array();
        $length = true;
        if ((strpos($value, '..') !== false) || (!preg_match('/^(.+)@([\w\.]+)$/i', $value, $matches))) {
            return false;
        }
        $_localPart = $matches[1];
        // $_hostname = $matches[2].$matches[3];
        // if ((strlen($_localPart) > 64) || (strlen($_hostname) > 255)) {
        if ((strlen($_localPart) > 64)) {
            $length = false;
        }
        $local = false;
        // Dot-atom characters are: 1*atext *("." 1*atext)
        // atext: ALPHA / DIGIT / and "!", "#", "$", "%", "&", "'", "*",
        // "+", "-", "/", "=", "?", "^", "_", "`", "{", "|", "}", "~"
        $atext = 'a-zA-Z0-9\x21\x23\x24\x25\x26\x27\x2a\x2b\x2d\x2f\x3d\x3f\x5e\x5f\x60\x7b\x7c\x7d\x7e';
        if (preg_match('/^[' . $atext . ']+(\x2e+[' . $atext . ']+)*$/', $_localPart)) {
            $local = true;
        } else {
            $noWsCtl = '\x01-\x08\x0b\x0c\x0e-\x1f\x7f';
            $qtext = $noWsCtl . '\x21\x23-\x5b\x5d-\x7e';
            $ws = '\x20\x09';
            if (preg_match('/^\x22([' . $ws . $qtext . '])*[$ws]?\x22$/', $_localPart)) {
                $local = true;
            }
        }
        // If both parts valid, return true
        if ($local && $length) {
            return true;
        }
        return false;
    }

    public static function IsMobile($value) {
        $preg = '/^1[0-9]{10}$/';
        if (!preg_match($preg, $value)) {
            return false;
        }
        return true;
    }

    public static function GetSize($number) {
        if ($number < 100) {
            return round($number, 4) . 'b';
        }
        $number = $number / 1024;
        if ($number < 100) {
            return round($number, 2) . 'k';
        }
        $number = $number / 1024;
        if ($number < 100) {
            return round($number, 2) . 'm';
        }
        $number = $number / 1024;
        if ($number < 100) {
            return round($number, 2) . 'g';
        }
    }

    //计算折扣率
    public static function Discount($s_price, $n_price) {
        if ($s_price == 0) {
            return 10;
        } else {
            return @round(10 / ($s_price / $n_price), 1);
        }
    }

    //根据折扣还原原价
    public static function Costprice($discount, $n_price) {
        if ($discount > 10) {
            $discount = 10;
        }
        $s_price = floor($n_price / ($discount / 10) * 100) / 100;
        return $s_price;
    }

    public static function roundPrice($price) {
        return round($price * 100) / 100;
    }

    //获取首字母
    public static function getfirstchar($s0) {
        $firstchar_ord = ord(strtoupper($s0{0}));
        if (($firstchar_ord >= 65 and $firstchar_ord <= 91) or ($firstchar_ord >= 48 and $firstchar_ord <= 57))
            return $s0{0};
        $s = iconv("UTF-8", "gb2312", $s0);
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if ($asc >= -20319 and $asc <= -20284)
            return "A";
        if ($asc >= -20283 and $asc <= -19776)
            return "B";
        if ($asc >= -19775 and $asc <= -19219)
            return "C";
        if ($asc >= -19218 and $asc <= -18711)
            return "D";
        if ($asc >= -18710 and $asc <= -18527)
            return "E";
        if ($asc >= -18526 and $asc <= -18240)
            return "F";
        if ($asc >= -18239 and $asc <= -17923)
            return "G";
        if ($asc >= -17922 and $asc <= -17418)
            return "H";
        if ($asc >= -17417 and $asc <= -16475)
            return "J";
        if ($asc >= -16474 and $asc <= -16213)
            return "K";
        if ($asc >= -16212 and $asc <= -15641)
            return "L";
        if ($asc >= -15640 and $asc <= -15166)
            return "M";
        if ($asc >= -15165 and $asc <= -14923)
            return "N";
        if ($asc >= -14922 and $asc <= -14915)
            return "O";
        if ($asc >= -14914 and $asc <= -14631)
            return "P";
        if ($asc >= -14630 and $asc <= -14150)
            return "Q";
        if ($asc >= -14149 and $asc <= -14091)
            return "R";
        if ($asc >= -14090 and $asc <= -13319)
            return "S";
        if ($asc >= -13318 and $asc <= -12839)
            return "T";
        if ($asc >= -12838 and $asc <= -12557)
            return "W";
        if ($asc >= -12556 and $asc <= -11848)
            return "X";
        if ($asc >= -11847 and $asc <= -11056)
            return "Y";
        if ($asc >= -11055 and $asc <= -10247)
            return "Z";
        return null;
    }
    
    public static function array_sort($arr, $keys, $type = 'desc') {
        $keysvalue = $new_array = array();
        foreach ($arr as $k => $v) {
            $keysvalue[$k] = $v[$keys];
        }
        if ($type == 'asc') {
            asort($keysvalue);
        } else {
            arsort($keysvalue);
        }
        reset($keysvalue);
        foreach ($keysvalue as $k => $v) {
            $new_array[$k] = $arr[$k];
        }
        return $new_array;
    }

    public static function get_age($dob) {
        $y = date('Y', $dob);
        if (($m = (date('m') - date('m', $dob))) < 0) {
            $y++;
        } elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
            $y++;
        }
        return date('Y') - $y;
    }

    public static function get_seniority($time) {
        $diff = NOW_TIME - $time;
        $retval = bcdiv($diff, (60 * 60 * 24 * 30));
        return $retval;
    }

    //根据月份转换季度
    public function month_to_quarter($m) {
        if ($m >= 1 && $m <= 3) {
            $quarter = 1;
        } elseif ($m >= 4 && $m <= 6) {
            $quarter = 2;
        } elseif ($m >= 7 && $m <= 9) {
            $quarter = 3;
        } else {
            $quarter = 4;
        }
        return $quarter;
    }

    public function rmb_format($money = 0, $is_round = true, $int_unit = '元') {
        $chs = array(0, '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖');
        $uni = array('', '拾', '佰', '仟');
        $dec_uni = array('角', '分');
        $exp = array('', '万', '亿');
        $res = '';
        // 以 元为单位分割
        $parts = explode('.', $money, 2);
        $int = isset($parts [0]) ? strval($parts [0]) : 0;
        $dec = isset($parts [1]) ? strval($parts [1]) : '';
        // 处理小数点
        $dec_len = strlen($dec);
        if (isset($parts [1]) && $dec_len > 2) {
            $dec = $is_round ? substr(strrchr(strval(round(floatval("0." . $dec), 2)), '.'), 1) : substr($parts [1], 0, 2);
        }
        // number= 0.00时，直接返回 0
        if (empty($int) && empty($dec)) {
            return '零';
        }

        // 整数部分 从右向左
        for ($i = strlen($int) - 1, $t = 0; $i >= 0; $t++) {
            $str = '';
            // 每4字为一段进行转化
            for ($j = 0; $j < 4 && $i >= 0; $j ++, $i --) {
                $u = $int{$i} > 0 ? $uni [$j] : '';
                $str = $chs [$int {$i}] . $u . $str;
            }
            $str = rtrim($str, '0');
            $str = preg_replace("/0+/", "零", $str);
            $u2 = $str != '' ? $exp [$t] : '';
            $res = $str . $u2 . $res;
        }
        $dec = rtrim($dec, '0');
        // 小数部分 从左向右
        if (!empty($dec)) {
            $res .= $int_unit;
            $cnt = strlen($dec);
            for ($i = 0; $i < $cnt; $i ++) {
                $u = $dec {$i} > 0 ? $dec_uni [$i] : ''; // 非0的数字后面添加单位
                $res .= $chs [$dec {$i}] . $u;
            }
            if ($cnt == 1)
                $res .= '整';
            $res = rtrim($res, '0'); // 去掉末尾的0
            $res = preg_replace("/0+/", "零", $res); // 替换多个连续的0
        } else {
            $res .= $int_unit . '整';
        }
        return $res;
    }
    /**
     * 验证身份证号
     * @param $vStr
     * @return bool
     */
    public function isCreditNo($vStr)
    {
        $vCity = array(
            '11','12','13','14','15','21','22',
            '23','31','32','33','34','35','36',
            '37','41','42','43','44','45','46',
            '50','51','52','53','54','61','62',
            '63','64','65','71','81','82','91'
        );

        if (!preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $vStr)) return false;

        if (!in_array(substr($vStr, 0, 2), $vCity)) return false;

        $vStr = preg_replace('/[xX]$/i', 'a', $vStr);
        $vLength = strlen($vStr);

        if ($vLength == 18)
        {
            $vBirthday = substr($vStr, 6, 4) . '-' . substr($vStr, 10, 2) . '-' . substr($vStr, 12, 2);
        } else {
            $vBirthday = '19' . substr($vStr, 6, 2) . '-' . substr($vStr, 8, 2) . '-' . substr($vStr, 10, 2);
        }

        if (date('Y-m-d', strtotime($vBirthday)) != $vBirthday) return false;
        if ($vLength == 18)
        {
            $vSum = 0;

            for ($i = 17 ; $i >= 0 ; $i--)
            {
                $vSubStr = substr($vStr, 17 - $i, 1);
                $vSum += (pow(2, $i) % 11) * (($vSubStr == 'a') ? 10 : intval($vSubStr , 11));
            }

            if($vSum % 11 != 1) return false;
        }

        return true;
    }
    public function numberToChar($num){
        $arr_n = array("零","一","二","三","四","五","六","七","八","九","十"); 
        return $arr_n[$num];
    }
}