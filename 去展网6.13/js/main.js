// JavaScript Document
$(document).ready(function(){
//首页tab
(function(jq){
jq.fn.dropdown = function(settings){
var defaults = {
dropdownEl: '.dropdown-menu',
openedClass: 'dropdown-open',
delayTime: 100
}
var opts = jq.extend(defaults, settings);
return this.each(function(){
var curObj = null;
var preObj = null;
var openedTimer = null;
var closedTimer = null;
jq(this).hover(function(){
if(openedTimer) clearTimeout(openedTimer);
curObj = jq(this);
openedTimer = setTimeout(function(){
curObj.addClass(opts.openedClass).find(opts.dropdownEl).show();
},opts.delayTime);
preObj = curObj;
},function(){
if(openedTimer) clearTimeout(openedTimer);
openedTimer = setTimeout(function(){
preObj.removeClass(opts.openedClass).find(opts.dropdownEl).hide();
},opts.delayTime);
});

});
};

})(jQuery);
//下拉菜单
(function(jq) {
jq('#nav .nav-item').dropdown({dropdownEl:'.nav-dropdown',openedClass:'nav-item-open'});
})(jQuery);
	
})


$(document).ready(function(){   
   var doc=document,
    inputs=doc.getElementsByTagName('input'),
    supportPlaceholder='placeholder'in doc.createElement('input'),
    
    placeholder=function(input){
     var text=input.getAttribute('placeholder'),
     defaultValue=input.defaultValue;
     if(defaultValue==''){
        input.value=text
     }
     input.onfocus=function(){
        if(input.value===text)
        {
            this.value=''
        }
      };
     input.onblur=function(){
        if(input.value===''){
            this.value=text
        }
      }
  };
  
  if(!supportPlaceholder){
     for(var i=0,len=inputs.length;i<len;i++){
          var input=inputs[i],
          text=input.getAttribute('placeholder');
          if(input.type==='text'&&text){
             placeholder(input)
          }
      }
  }
 });

$(document).ready(function(){ 
  var MyMar = null;
  var SleepTime = 2000;
  $(function () {
  $(".sroll-img").jCarouselLite({
  btnNext: ".next",
  btnPrev: ".prev",
  visible:3,
  speed:1000,
  scroll:1
  });
  $(".sroll-img").bind('mouseover', function (event) {
  clearInterval(MyMar);
  })
  .bind('mouseout', function (event) {
  MyMar = setInterval(next, SleepTime);

  });
  });
  function next() {
  $(".next").click();
  }
  MyMar = setInterval(next, SleepTime);

 });
 
 
 
 
$(document).ready(function(){ 
 $(".more-up").click(function(){
   $(this).hide(); 
   $(".more-down").show(); 
   $("#box").show();
   $(".more").css("background","#f5f5f5");
 });
 
$(".more-down").click(function(){
   $(this).hide(); 
   $(".more-up").show(); 
   $("#box").hide();
   $(".more").css("background","none");
 });
 
  /*幻灯片*/    
  $('#demo01').flexslider({
	  animation: "slide",
	  direction:"horizontal",
	  easing:"swing"
  });
  
   /*幻灯片*/    
  $('#demo02').flexslider({
	  animation: "slide",
	  direction:"horizontal",
	  easing:"swing"
  }); 
 
});

$(document).ready(function(){ 
  $(".travel-img .list li:nth-child(5n+1)").css("width","490px");
  $(".travel-img .list li:nth-child(5n+2)").css("margin-right","0");
  $(".travel-img .list li:nth-child(5n+5)").css("margin-right","0");
  $(".travel-img .list li:nth-child(5n+5) p a").css("background","#4697f6");
  $(".supper .list li:last").css("padding-right","0");
  $(".supper .list li:nth-child(2) p a").css("background","#4697f6");
  $(".supper .list li:nth-child(3) p a").css("background","#24cf1c");
  $(".supper .list li:nth-child(4) p a").css("background","#e57206");
});


$(document).ready(function() {
  $('.tab p a').mouseover(function(){
	$(this).addClass("current").siblings().removeClass();
	$(".reviews > div").eq($(".tab p a").index(this)).show().siblings().hide();
  });
  
  $('#tab01 a').mouseover(function(){
	$(this).addClass("current").siblings().removeClass();
	$("#detial-review01 > div").eq($("#tab01 a").index(this)).show().siblings().hide();
  });
  
  $('#tab02 a').mouseover(function(){
	$(this).addClass("current").siblings().removeClass();
	$("#detial-review02 > div").eq($("#tab02 a").index(this)).show().siblings().hide();
  });
  
}); 