<?php  
$urls = array(
    'http://www.qufair.com/forum/index',
'http://www.qufair.com/forum/detail/id/3003',
'http://www.qufair.com/forum/detail/id/3002',
'http://www.qufair.com/forum/detail/id/3001',
'http://www.qufair.com/forum/detail/id/3000',
'http://www.qufair.com/forum/detail/id/2991',
'http://www.qufair.com/forum/detail/id/2999',
'http://www.qufair.com/forum/detail/id/2998',
'http://www.qufair.com/forum/detail/id/2997',
'http://www.qufair.com/forum/detail/id/2996',
'http://www.qufair.com/forum/detail/id/2995',
'http://www.qufair.com/forum/detail/id/2994',
'http://www.qufair.com/forum/detail/id/2993',
'http://www.qufair.com/forum/detail/id/2992',
'http://www.qufair.com/forum/detail/id/2990',
'http://www.qufair.com/forum/detail/id/2989',
'http://www.qufair.com/forum/detail/id/2988',
);
$api = 'http://data.zz.baidu.com/urls?site=www.qufair.com&token=7PizC9BIruRR7UlJ';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;
?>
