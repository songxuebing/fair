<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name="robots" content="nofollow" />
<title>去展商户端</title>
<link type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/merchants/css/reset.css" rel="stylesheet" />
<link type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/merchants/css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo STYLE_URL;?>/style/quzhan/merchants/css/bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/jquery/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/common/common.js"></script>
<script type="text/javascript">

</script>
</head>

<body>
<!-- top -->
<div class="ms_top">
    <div class="mm_mid clearfix">
        <div class="ms_logo fl"><a href="<?php echo WEB_URL;?>"><img src="<?php echo STYLE_URL;?>/style/quzhan/merchants/images/mm_logo.png"></a></div>
		<?php
			if(empty($this->UserConfig['Id']) || $this->Controller == 'auth'){
		?>
			<div class="ms_top_right fr">
				<p>第一次使用客户端?<a href="/auth/register/">立即注册</a><i>|</i><a href="#" target="_blank">使用帮助</a></p>
			</div>
		<?php
			}else{
		?>
		<div class="ms_top_right1 fr">
            <dl style="width:230px;">
                <dt><img src="<?php echo Common::AttachUrl($this->menberInfo['avatar']);?>!a200" width="56" height="56" onClick="window.location.href='/index/index/'" style="cursor:pointer"></dt>
                <dd>
                    <h6><?php echo $this->menberInfo['username'];?></h6>
                    <p>
                        <span style="background:<?php echo $this->cert_count>0 ? '#ff4a00' : '';?>"><?php echo $this->cert_count>0 ? '已认证' : '未认证';?></span>
                        <a style="float:left;" href="/auth/logout/">退出</a>
                    </p>
                </dd>
            </dl>
        </div>
		<?php
			}
		?>
    </div>
</div>