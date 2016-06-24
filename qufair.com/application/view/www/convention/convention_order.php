<?php include $this->Render('header_no2.php'); ?>
    <!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li>
                    <a href="/" title="">首页</a>
                    <span>&gt;</span>
                    <a href="/convention" title="">展会</a>
                    <span>&gt;</span>
                    <i><?php echo $this->data['con_name']?></i>
                </li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>

    <form action="/convention/order/" method="post" name="order" class="AjaxForm order" id="postAddform" autocomplete="off">

    <!--步骤start-->
    <div class="step">
        <ul>
            <li class="current">
                <em></em>
                <div>
                    <i>1</i>
                    <p>提交需求</p>
                </div>
            </li>
            <li>
                <em></em>
                <div>
                    <i>2</i>
                    <p>客服联系</p>
                </div>
            </li>
            <li>
                <em></em>
                <div>
                    <i>3</i>
                    <p>完成预订</p>
                </div>
            </li>
        </ul>
    </div>
    <!--步骤end-->

    <!--筛选start-->
    <div class="case-list">
        <ul class="title-case">
            <li class="fl select01">
                <div>
                    <select>
                        <option>选择展位类型</option>
                        <option>标摊</option>
                        <option>特装</option>
                    </select>
                </div>
            </li>
            <li class="fl select01 select02">
                <div>
                    <select>
                        <option>开口类型</option>
                        <option>两口</option>
                        <option>三口</option>
                    </select>
                </div>
            </li>
            <li class="fl select01 select02">
                <div>
                    <select>
                        <option>面积大小</option>
                        <option>3*3</option>
                        <option>2*2</option>
                    </select>
                </div>
            </li>
            <li class="fl select01 select02">
                <div>
                    <select>
                        <option>是否跟团</option>
                        <option>是</option>
                        <option>否</option>
                    </select>
                </div>
            </li>
            <li class="fl">
                <div>
                    <input type="text" value="" placeholder="输入展品内容" />
                </div>
            </li>
            <li class="fl"><input id="tj" type="button" value="添加" /></li>
            <li class="fr">
                <a href="http://wpa.qq.com/msgrd?v=3&uin=3238396027&site=qq&menu=yes" target="_blank">
                    <img src="<?php echo STYLE_URL;?>/style/no2/images/25.png" alt="" />
                </a></li>
        </ul>

        <ul class="case-list-title">
            <p>已选展位类型</p>
            <p>开口类型</p>
            <p>面积(㎡)</p>
            <p>是否跟团</p>
            <p>展品</p>
        </ul>

        <ul class="case-list-info">
<!--            <li>-->
<!--                <p class="booth_type p1">特装</p>-->
<!--                <p class="p2">三口</p>-->
<!--                <p class="p3">3×3</p>-->
<!--                <p class="p4">是</p>-->
<!--                <p class="p5">太阳能</p>-->
<!--                <span class="fr"><a href="##" target="_blank">删除</a></span>-->
<!--            </li>-->
        </ul>
    </div>
    <!--筛选end-->
        <script>
            function delet(obj){
                $(obj).parent().parent().remove()
            };
            $(function(){
                $("#tj").click(function(){
                    var num=$(".case-list-info").children().length;
                    var a=$(this).parent().prev().prev().children().children().val();
                    var b=$(this).parent().prev().prev().prev().children().children().val();
                    var c=$(this).parent().prev().prev().prev().prev().children().children().val();
                    var d=$(this).parent().prev().prev().prev().prev().prev().children().children().val();
                    var e=$(this).parent().prev().children().children().val();
                    if(num==1){
                        $(".p1").html(d);
                        $(".p2").html(c);
                        $(".p3").html(b);
                        $(".p4").html(a);
                        $(".p5").html(e);
                    }
                    else {
                        var html="<li>"
                            +"<p class='p1'>"+d+"</p>"
                            +"<p class='p2'>"+c+"</p>"
                            +"<p class='p3'>"+b+"</p>"
                            +"<p class='p4'>"+a+"</p>"
                            +"<p class='p5'>"+e+"</p>"
                            +"<span class='fr'>"
                            +"<a href='##' onclick='delet(this)'>"
                            +"删除"
                            +"</a>"
                            +"</span>"
                            +"</li>";
                        $(".case-list-info").append(html);
                    }
                })
            })
                </script>
    <div class="line10"></div>

    <!--参展企业信息start-->
    <div class="add-company-info">
        <ul class="add-info">
<!--            <a href="javascript:void(0)" id="add" class="zoomIn dialog">+ 新增资料</a>-->
<!--            <h3>参展企业信息</h3>-->
<!--            <b>杭州去展网络科技有限公司<img src="--><?php //echo STYLE_URL;?><!--/style/no2/images/50.jpg" alt="" /><a href="#" title="">编辑</a></b>-->
<!--            <p>联系人：张山峰</p>-->
<!--            <p>电<em></em>话：18600587700</p>-->
<!--            <p>地<em></em>址：1564564564@qq.com</p>-->
            <div class="add-con"><ul class="titles">
                    <li class="fl">
                        <img alt="" src="http://cdn.qufair.com/style/no2/images/11.png">
                    </li>
                    <li class="fl">
                        <b>参展企业资料</b></li>
                </ul>
                <ul class="add-pinfo">
                    <li class="clearfix">
                        <label class="fl">企业名称：</label>
                        <input type="text" class="wd01" placeholder="请输入企业名称" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系人：</label>
                        <input type="text" class="wd02" placeholder="请输入联系人" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系手机：</label>
                        <input type="text" class="wd03" placeholder="请输入联系手机" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系电话：</label>
                        <input type="text" class="wd04" placeholder="请输入联系电话" value="">
                    </li>
                    <li class="clearfix">
                        <label class="fl">电子邮箱：</label>
                        <input type="text" class="wd05" placeholder="请输入电子邮箱" value="">
                    </li>
                </ul>
            </div>
        </ul>
        <ul class="notice">
            <textarea placeholder="输入备注内容" class="wd06"></textarea>
        </ul>

        <input type="hidden" class="wd07" value="<?php echo $this->data['user_id']?>">
    </div>
    <!--参展企业信息end-->

    <div class="line10"></div>
    <div class="line20"></div>

    <!--提交start-->
    <div class="submit">

        <input type="hidden" name="option" value="submit">
        <input type="hidden" name="yesfn" value="alert('添加成功'); window.location.href='/user/order/';">
        <input type="button" value="提交" class="zoomIn dialog" id="submit" />

    </div>
    <!--提交end-->

    <div class="line10"></div>
    <div class="line20"></div>
        </form>

</div>
<!--main end-->


<!--登录注册弹窗start-->
<div id="HBox">

    <!--登录start-->
    <div class="boxbg" style="display:none;" id="box01">
        <div class="login-box">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>密码登录</b></li>
            </ul>
            <ul class="text-input">
                <li class="if01"><input type="text" value="" placeholder="手机 或 邮箱号" class="tp" /></li>
                <li class="if01"><input type="text" value="" placeholder="密码" class="tp" /></li>
                <li class="if02"><p><a href="javascript:void(0)" title="" class="select01">短信登录？</a></p></li>
                <li><input type="submit" value="确定"/></li>
            </ul>
        </div>
    </div>
    <!--登录end-->

    <!--快捷登录start-->
    <div class="boxbg" style="display:none;" id="box02">
        <div class="login-box">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>快捷安全登录</b></li>
            </ul>
            <ul class="text-input">
                <li class="if01"><input type="text" value="" placeholder="手机 或 邮箱号" class="tp" /></li>
                <li class="if01 if03"><input type="text" value="" placeholder="验证码" class="tp" /><a href="javascript:void(0)">获取</a></li>
                <li class="if02"><p><a href="javascript:void(0)" title="" class="select02">密码登录？</a></p></li>
                <li><input type="button" value="确定"/></li>
            </ul>
        </div>
    </div>
    <!--快捷登录end-->

    <!--注册start-->
    <div class="boxbg" style="display:none;" id="box03">
        <div class="resiger">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>企业基本信息</b></li>
            </ul>
            <ul class="text-input">
                <li class="if01"><input type="text" value="" placeholder="输入企业名称" class="tp" /></li>
                <li class="if01 if04"><input type="text" value="" placeholder="选择行业" class="tp" id="project-type" readonly /></li>
                <li class="if05"><input type="button" value="完成"/></li>
            </ul>
            <ul class="project" style="display:none;">
                <div class="search-box"><input type="text" value="" placeholder="行业关键词"/></div>
                <div class="search-list">
                    <ul class="clearfix">
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)" class="current">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                    </ul>
                    <ul class="clearfix">
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                    </ul>
                    <ul class="clearfix">
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">纺织服饰鞋革</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">安放劳保公共</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                        <li><a href="javascript:void(0)">电子电力通讯噢</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
    <!--注册end-->

    <!--提交成功start-->
    <div class="boxbg" style="display:none;" id="box04">
        <div class="success">
            <b>恭喜！提交成功</b>
            <p>请等待客服联系 或 主动联系客服</p>
            <ul><input type="button" value="确定" onclick="javascript:window.location.href='/'" /></ul>
        </div>
    </div>
    <!--提交成功end-->

    <!--添加信息start-->
    <div class="boxbg01" style="display:none;" id="box05">
        <div class="add-con">
            <ul class="titles">
                <li class="fl"><img src="<?php echo STYLE_URL;?>/style/no2/images/11.png" alt="" /></li>
                <li class="fl"><b>参展企业资料</b></li>
            </ul>
        </div>
    </div>
    <!--添加信息end-->

</div>
<script src="<?php echo STYLE_URL;?>/style/no2/js/jquery.hDialog.min.js"></script>
<script>
    $(function(){
        var $el = $('.dialog');
        $el.hDialog();
    });

    $(function(){
        //alert("111");
        $(document).on('click','#submit',function(){

            var p1 = $(".p1").text();
            var p2 = $(".p2").text();
            var p3 = $(".p3").text();
            var p4 = $(".p4").text();
            var p5 = $(".p5").text();
            var wd01 = $(".wd01").val();
            var wd02 = $(".wd02").val();
            var wd03 = $(".wd03").val();
            var wd04 = $(".wd04").val();
            var wd05 = $(".wd05").val();
            var wd06 = $(".wd06").val();
            var wd07 = $(".wd07").val();
            $("#box01").hide();
            if(p1 = null || p1 == '')
            {
                alert("企业名称不能为空");
                $("#HOverlay").hide();
                return false;
            }
            $.ajax({
                type:"POST",
                dataType:"json",
                url:"/convention/order/option/submit",
                data:"p1="+p1+"&p2="+p2+"&p3="+p3+"&p4="+p4+"&p5="+p5+"&wd01="+wd01+"&wd02="+wd02+"&wd03="+wd03+"&wd04="+wd04+"&wd05="+wd05+"&wd06="+wd06+"&wd07="+wd07,
                success:function(data){
                    if(data.status=='y'){
                        $("#box04").show();
                        $("#box01").hide();
                    }else{
                        alert(data.info);
                    }
                }

            });

        });
    });

</script>
<script>

    $("#login").click(function(){
        $("#box01").show();
        $("#box02").hide();
        $("#box03").hide();
        $("#box04").hide();
        $("#box05").hide();
    });
    $("#resiger").click(function(){
        $("#box03").show();
        $("#box02").hide();
        $("#box01").hide();
        $("#box04").hide();
        $("#box05").hide();
    });
//    $("#submit").click(function(){
//        $("#box04").show();
//        $("#box02").hide();
//        $("#box03").hide();
//        $("#box01").hide();
//        $("#box05").hide();
//    });

    $("#add").click(function(){
        $("#box05").show();
        $("#box02").hide();
        $("#box03").hide();
        $("#box01").hide();
        $("#box04").hide();
        $("#HBox").css("background","none");
        $("#HBox").css("padding","0");
    });


    $("#project-type").click(function(){
        $(".project").show();
        $(".if05").hide();
    });
    $(".select01").click(function(){
        $("#box02").show();
        $("#box01").hide();
    });
    $(".select02").click(function(){
        $("#box01").show();
        $("#box02").hide();
    });
</script>
<!--登录注册弹窗start-->





<script>
    $(".hot-product").hover(function(){
        $(this).addClass("on");
    },function(){
        $(this).removeClass("on");
    });
</script>

<script>
    $("body").css("background","#fff");
</script>

<!--友情链接start-->
<div class="friendly-link">
    <ul class="wrap">
        <h2><i>友情链接</i></h2>
        <div>
            <ul class="clearfix">
                <li><a href="##" target="_blank">杭州写字楼网 </a></li>
                <li><a href="##" target="_blank">杭州本地宝</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州租房网</a></li>
                <li><a href="##" target="_blank">杭州分类信息</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州装修公司</a></li>
                <li><a href="##" target="_blank">杭州租房</a></li>
                <li><a href="##" target="_blank">杭州厂房网</a></li>
                <li><a href="##" target="_blank">杭州信息网</a></li>
                <li><a href="##" target="_blank">杭州装修网</a></li>
                <li><a href="##" target="_blank">杭州拓展公司</a></li>
                <li><a href="##" target="_blank">杭州邮编网</a></li>
                <li><a href="##" target="_blank">杭州写字楼网 </a></li>
                <li><a href="##" target="_blank">杭州本地宝</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州租房网</a></li>
                <li><a href="##" target="_blank">杭州分类信息</a></li>
                <li><a href="##" target="_blank">杭州房产网</a></li>
                <li><a href="##" target="_blank">杭州装修公司</a></li>
                <li><a href="##" target="_blank">杭州租房</a></li>
                <li><a href="##" target="_blank">杭州厂房网</a></li>
                <li><a href="##" target="_blank">杭州信息网</a></li>
                <li><a href="##" target="_blank">杭州装修网</a></li>
                <li><a href="##" target="_blank">杭州拓展公司</a></li>
                <li><a href="##" target="_blank">杭州邮编网</a></li>
            </ul>
        </div>
    </ul>
</div>
<!--友情链接end-->


<!--底部start-->
<div class="footer">
    <ul class="wrap">
        <p>
            <a href="##" target="_blank">关于我们</a><span>|</span>
            <a href="##" target="_blank">联系我们</a><span>|</span>
            <a href="##" target="_blank">友情链接</a><span>|</span>
            <a href="##" target="_blank">帮助中心</a><span>|</span>
            <a href="##" target="_blank">意见反馈</a><span>|</span>
            <a href="##" target="_blank">高薪聘请</a><span>|</span>
            <a href="##" target="_blank">法律声明</a><span>|</span>
        </p>
        <p>© 2015 quzhan.com 去展互联网展会领导者 保留所有权利</p>
        <p>去展互联网展会领导者 浙ICP备08125558号</p>
        <p><img src="<?php echo STYLE_URL;?>/style/no2/images/27.jpg" alt="" /></p>
        <div>
            <img src="<?php echo STYLE_URL;?>/style/no2/images/code.jpg" alt="" />
            <p>下载去展APP</p>
        </div>
    </ul>
</div>
<!--底部start-->