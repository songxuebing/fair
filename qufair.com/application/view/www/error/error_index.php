<?php
    $webtitle = "系统提示";
?>
<?php include $this->Render('header.php'); ?>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/js/artdialog/artDialog.js?skin=default"></script>
<script src="<?php echo STYLE_URL;?>/style/js/artdialog/iframeTools.js"></script>
<script type="text/javascript" src="<?php echo STYLE_URL;?>/style/quzhan/js/baiduTemplate.js"></script>
<style type="text/css">
	.mm_tezhuang a img{
		margin-right:5px;
    }
    *{
        margin: 0;
        padding: 0;
    }
    .button_group{
        width: 346px;
        height: 120px;
        margin: 0 auto;
    }
    .button_p{
        color: #ff4a01;
        font-size: 18px;
        margin-top: 50px;
    }
    .a_left{
        display: block;
        width: 149px;
        height: 50px;
        background: #ff4a01;
        color: white;
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        border-radius: 20px;
        margin-top: 33px;
        float: left;
    }
    .a_right{
        display: block;
        width: 149px;
        height: 50px;
        background: #f2f1ed;
        color: #ff4a01;
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        border-radius: 20px;
        float: left;
        margin-top: 33px;
        margin-left:30px;
    }
    .pp{
        color: #fd8a6d;
        width: 346px;
        margin: 0 auto;
        text-align: center;
        margin-top: 30px;
    }
</style>
<?php include $this->Render('nav.php'); ?>
<!-- banner -->
<div>
<img src="<?php echo STYLE_URL;?>/style/quzhan/images/error_404.jpg" width="100%" >
<div style="width: 100%; margin-top: 30px; margin-bottom: 30px;">
    <div class="button_group">
        <p class="button_p">
            您还可以：
        </p>
        <a class="a_left" href="/">
            访问首页
        </a>
        <a class="a_right" href=javascript:history.go(-1)>
            返回上一步
        </a>
    </div>
    <div class="pp">
        免费热线：40006-2345-1
    </div>


</div>
</div>

<?php include $this->Render('footer.php');die();?>
