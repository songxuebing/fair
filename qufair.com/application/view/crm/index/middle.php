<?php include $this->Render('header.php'); ?>

<body style="padding:0; margin:0; background:#b2e6ff;">
<script language="javascript">
function isShowNav(){
	if(parent.document.getElementById("main").cols == "200,7,*"){
		parent.document.getElementById("main").cols = "0,7,*";
	}else{
		parent.document.getElementById("main").cols = "200,7,*";
	}
}
</script>

<img src="<?php echo STYLE_URL;?>/style/dingdong/images/line_m.jpg" onClick="isShowNav()" style="cursor:pointer;border:0; padding:0; margin:0;" />

<?php include $this->Render('footer.php'); ?>



