jQuery.noConflict();
(function(){
	var CommonJs ={
		AjaxLoadTime:'',
		document:window.document,
		BeforeResponse:function(formData,form,options){
			form.find("input[name='Submit']").attr('disabled',true);
			var ation = form.find("input[name='beforefn']").val();
			eval(ation);
		},
		SuccessResponse:function(jsontxt,statusText,xhr,form){
			if(typeof(jsontxt) == 'object'){
				if(jsontxt.success == true){
					var ation = form.find("input[name='yesfn']").val();
					if(typeof(ation) == 'function'){
						ation.call(window);
					}else if(typeof(ation) != 'undefined'){
						eval(ation);
					}
				}else if(jsontxt.success == false){
					form.find("input[name='Submit']").removeAttr('disabled');
					var ation = form.find("input[name='nofn']").val();
					alert(jsontxt.msg);
					if(typeof(ation) == 'function'){
						ation.call(window);
					}else if(typeof(ation) != 'undefined'){
						eval(ation);
					}
				}else{
					form.find("input[name='Submit']").removeAttr('disabled');
					var ation = form.find("input[name='nofn']").val();
					if(typeof(ation) == 'function'){
						ation.call(window);
					}else if(typeof(ation) != 'undefined'){
						eval(ation);
					};
				}
			}else if(typeof(jsontxt) != 'undefined'){
				form.find("input[name='Submit']").removeAttr('disabled');
				var ation = form.find("input[name='nofn']").val();
				if(typeof(ation) == 'function'){
					ation.call(window);
				}else if(typeof(ation) != 'undefined'){
					eval(ation);
				}
			}
		},		
		AjaxLive:function(){
			jQuery(".AjaxForm").off("submit").on("submit",function(){
				jQuery(this).ajaxSubmit({dataType:'json',beforeSubmit:CommonJs.BeforeResponse,success:CommonJs.SuccessResponse});
				return false;
			});
			jQuery("img").error(function () {
				jQuery(this).attr("src","http://dyhlcdn.duapp.com/style/image/common/nopic.gif");
			});
			jQuery(".RemoveLink").on('click',function(e){
				var obj	= jQuery(this);
				var url = obj.attr('data-url');
				var id = obj.attr('data-id');
				var alt = obj.attr('data-alt');
				if(alt==null){alt='确定要删除吗';}
				if(!window.confirm(alt)){return false;}
				url = url + 'option/remove/id/'+id;
				jQuery.ajax({
					type:"POST",
					url:url,
					dataType:"json",
					success:function(data){
						if(typeof(data) == 'object'){
							if(data.success == true){
								removelink(obj);
							}else{
								alert(data.msg);
							}
						}else if(typeof(jsontxt) != 'undefined'){
							alert('系统返回错误，请联系管理员');
						}
					}
				});				
			});

            jQuery(".RemoveLink_adv").on('click',function(e){
                var obj	= jQuery(this);
                var url = obj.attr('data-url');
                var id = obj.attr('data-id');
                var alt = obj.attr('data-alt');
                if(alt==null){alt='确定要删除吗';}
                if(!window.confirm(alt)){return false;}
                url = url + 'option/remove_adv/id/'+id;
                jQuery.ajax({
                    type:"POST",
                    url:url,
                    dataType:"json",
                    success:function(data){
                        if(typeof(data) == 'object'){
                            if(data.success == true){
                                removelink(obj);
                            }else{
                                alert(data.msg);
                            }
                        }else if(typeof(jsontxt) != 'undefined'){
                            alert('系统返回错误，请联系管理员');
                        }
                    }
                });
            });

            jQuery(".RemoveLink_hot").on('click',function(e){
                var obj	= jQuery(this);
                var url = obj.attr('data-url');
                var id = obj.attr('data-id');
                var alt = obj.attr('data-alt');
                if(alt==null){alt='确定要删除吗';}
                if(!window.confirm(alt)){return false;}
                url = url + 'option/remove_hot/id/'+id;
                jQuery.ajax({
                    type:"POST",
                    url:url,
                    dataType:"json",
                    success:function(data){
                        if(typeof(data) == 'object'){
                            if(data.success == true){
                                removelink(obj);
                            }else{
                                alert(data.msg);
                            }
                        }else if(typeof(jsontxt) != 'undefined'){
                            alert('系统返回错误，请联系管理员');
                        }
                    }
                });
            });

            jQuery(".RemoveLink_visa").on('click',function(e){
                var obj	= jQuery(this);
                var url = obj.attr('data-url');
                var id = obj.attr('data-id');
                var alt = obj.attr('data-alt');
                if(alt==null){alt='确定要删除吗';}
                if(!window.confirm(alt)){return false;}
                url = url + 'option/remove_visa/id/'+id;
                jQuery.ajax({
                    type:"POST",
                    url:url,
                    dataType:"json",
                    success:function(data){
                        if(typeof(data) == 'object'){
                            if(data.success == true){
                                removelink(obj);
                            }else{
                                alert(data.msg);
                            }
                        }else if(typeof(jsontxt) != 'undefined'){
                            alert('系统返回错误，请联系管理员');
                        }
                    }
                });
            });

			jQuery(".AjaxWindow").on('click',function(e){
				var url,href_id,href_title;
				url=jQuery(this).attr('href');
				href_id=jQuery(this).attr('href-id');
				href_title=jQuery(this).attr('data-title');
				art.dialog.open(url,{title:href_title,id:href_id,width:'600px',height:'auto'});
				return false;
			});
			jQuery(".PrintWindow").on('click',function(e){
				var url,href_id,href_title;
				url=jQuery(this).attr('href');
				href_id=jQuery(this).attr('href-id');
				href_title=jQuery(this).attr('data-title');
				art.dialog.open(url,{title:href_title,id:href_id,width:'1000px',height:'500px'});
				return false;
			});
			
		},
		getCookie:function(sKey){
			if(!sKey) return "";
			if(document.cookie.length > 0){
				var startIndex = document.cookie.indexOf(sKey + "=");
				if(startIndex != -1){
					startIndex = startIndex + sKey.length + 1;
					var endIndex = document.cookie.indexOf(";",startIndex);
					if(endIndex == -1){
						endIndex = document.cookie.length;
					}
					return decodeURIComponent(document.cookie.substring(startIndex,endIndex));
				}
			}
			return "";
		},
		setCookie:function(sKey,sValue,iExpireSeconds){
			if(!sKey) return;
			var expireDate = new Date();
			expireDate.setTime(expireDate.getTime() + iExpireSeconds * 1000);
			this.document.cookie = sKey + "=" + encodeURIComponent(sValue) + ";expires=" + expireDate.toGMTString() + ";";
		},
		deleteCookie:function(sKey){
			if(!sKey) return;
			this.document.cookie = sKey + '=; expires=Thu,01 Jan 1970 00:00:01 GMT;';
		}
	};
	if(!window.CommonJs){
		window.CommonJs = CommonJs;
	}
})();
