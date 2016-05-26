jQuery(document).ready(function(e) {
	var index = 0,
		adTime = null,
		len = jQuery(".J-mune_thumb").find('li').length;
	
	setAm();
	
	jQuery(".J-mune_thumb").on('mouseenter','li',function(){
		var i = jQuery(this).index();
		index = i;
		clearInterval(adTime);
		showPic(index);	
	
	}).on('mouseleave',function(){
		setAm();
	});
	
	function showPic(index){
		jQuery(".J-mune_thumb").find('li').eq(index).addClass('active').siblings().removeClass('active');
		var href = jQuery(".J-mune_thumb").find('li').eq(index).find("a").data("href");
		
		jQuery(".J-examples_image").find("img").attr({"src":href});
		
	}
	
	function setAm(){
		adTime = setInterval(function(){
			index++;
			if(index > len - 1){
				index = 0;
			}
			
			showPic(index);
				
		},4500);	
	}
	
});