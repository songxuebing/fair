<?php include $this->Render('header_no2.php'); ?>

    <!--当前位置start-->
    <div class="project-top">
        <div class="location">
            <ul>
                <li><a href="/" title="首页">首页</a><span>&gt;</span>
                    <a href="/visa" title="签证">签证</a><span>&gt;</span>
                    <i><?php echo $this->data['visa_title']?>签证</i>
                </li>
            </ul>
        </div>
    </div>
    <!--当前位置end-->

    <div class="line10"></div>

    <!--步骤start-->
<form class="J-search-box" method="post" action="/visa/order/option/submit">
    <input type="hidden" value="<?php echo $this->data['visa_id']?>" name="visa_id">
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
                        <option>选择领区</option>
                        <option>北京</option>
                        <option>上海</option>
                        <option>广州</option>
                        <option>沈阳</option>
                        <option>成都</option>
                    </select>
                </div>
            </li>
            <li class="fl select01 select02">
                <div>
                    <select>
                        <option>证件类型</option>
                        <option>护照</option>
                        <option>身份证</option>
                    </select>
                </div>
            </li>
            <li class="fl">
                <div>
                    <input type="text" value="" placeholder="输入姓名" class="wd03" />
                </div>
            </li>
            <li class="fl">
                <div>
                    <input type="text" value="" placeholder="输入证件号码" class="wd04" />
                </div>
            </li>
            <li class="fl"><input type="button" value="添加" id="tj" /></li>
            <li class="fr"><a href="##"><img src="images/25.png" alt="" /></a></li>
        </ul>

        <ul class="case-list-title">
            <p>领区</p>
            <p>证件类型</p>
            <p>姓名</p>
            <p class="wd05">证件号码</p>
        </ul>

        <ul class="case-list-info">

        </ul>
    </div>
    <!--筛选end-->

    <div class="line10"></div>

    <!--参展企业信息start-->
    <div class="add-company-info">
        <ul class="add-info">
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
                        <input type="text" class="xx01" placeholder="请输入企业名称" value="" name="company">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系人：</label>
                        <input type="text" class="xx02" placeholder="请输入联系人" value="" name="name">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系手机：</label>
                        <input type="text" class="xx03" placeholder="请输入联系手机" value="" name="phone">
                    </li>
                    <li class="clearfix">
                        <label class="fl">联系电话：</label>
                        <input type="text" class="xx04" placeholder="请输入联系电话" value="" name="tel">
                    </li>
                    <li class="clearfix">
                        <label class="fl">电子邮箱：</label>
                        <input type="text" class="xx05" placeholder="请输入电子邮箱" value="" name="email">
                    </li>
                </ul>
            </div>
        </ul>
        <ul class="notice">
            <textarea placeholder="输入备注内容" name="content"></textarea>
        </ul>
    </div>
    <!--参展企业信息end-->

    <div class="line10"></div>
    <div class="line20"></div>

    <!--提交start-->
    <div class="submit">
        <input type="submit" value="提交" class="zoomIn dialog" id="submit" />
    </div>
    <!--提交end-->

    <div class="line10"></div>
    <div class="line20"></div>

</div>
    </form>
<!--main end-->

<link type="text/css" href="<?php echo STYLE_URL;?>/style/no2/css/4.css" rel="stylesheet" />
<script src="<?php echo STYLE_URL;?>/style/no2/js/jquery.hDialog.min.js"></script>
<script>
    $(function(){
        var $el = $('.dialog');
        $el.hDialog();
    });
</script>
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
            //var d=$(this).parent().prev().prev().prev().prev().prev().children().children().val();
            var e=$(this).parent().prev().children().children().val();

                var html="<li>"
                    //+"<p class='p1'>"+d+"</p>"
                    +"<input type='' name='p1[]' value='"+c+"' readonly='ture' class='p wd03'>"
                    +"<input type='' name='p2[]' value='"+b+"' readonly='ture' class='p wd03'>"
                    +"<input type='' name='p3[]' value='"+a+"' readonly='ture' class='p wd03'>"
                    +"<input type='' name='p4[]' value='"+e+"' readonly='ture' class='p wd03'>"
                    +"<span class='fr'>"
                    +"<a href='##' onclick='delet(this)'>"
                    +"删除"
                    +"</a>"
                    +"</span>"
                    +"</li>";
                $(".case-list-info").append(html);

        })
    })
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
    $("#submit").click(function(){
        $("#box04").show();
        $("#box02").hide();
        $("#box03").hide();
        $("#box01").hide();
        $("#box05").hide();
    });
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

<?php include $this->Render('footer2.php'); ?>
