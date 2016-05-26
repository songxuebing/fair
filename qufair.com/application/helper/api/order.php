<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('user/UserAddressHelper');
$UseraddressHelper = new UserAddressHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$type = empty($this->Param['type']) ? 'convention' : $this->Param['type'];
/**
* 订单步骤
* @param option 订单的步骤 为空为立即购买 order_step 订单步骤一提交 pay 第二步提交
* @param type 订单的类型模块  convention|decoration|logistics|route|visa
**/
if(empty($this->Param['option'])){

    switch($type){
        case 'convention':
            /**
             * 立即购买
             * @param id 当前购买的相关ID
             * @param areaid 展位区域号
             * @param is_group 是否跟团
             * @param member_id 用户id
             **/
            $detailid = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $areaid = empty($this->Param['areaid']) ? 0 :$this->Param['areaid'];
            $is_group = empty($this->Param['is_group']) ? '0' : $this->Param['is_group'];

            $data['area'] = $ConventionHelper->getAreaRow(array('`area_id` = ?' =>$areaid,'`detail_id` = ?' =>$detailid));
            $data['detail'] = $ConventionHelper->getDetailRow(array('`detail_id` = ?'=> $detailid));
            $data['con'] = $ConventionHelper->getRow(array('`id` = ?' => $data['detail']['con_id']));

            //获取之前的收货地址
            $address_row = $ConventionHelper->orderRow(array(
                '`member_id` = ?' => $this->Param['member_id']
            ));

            $receiving = unserialize($address_row['receiving']);

            $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->Param['member_id']));

            if(empty($menberInfo['mobile'])){
                $menberInfo['mobile'] = $memberRow['mobile'];
            }
            $menberInfo['list'] = $memberRow;

            $row = array(
                'code' => 0,
                'receiving' => $receiving,
                'menberInfo' => $menberInfo,
                'isGroup' => $is_group,
                'data' => $data
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();
            break;
        case 'decoration':

            /**
             * 立即购买
             * @param id 当前购买的相关ID
             * @param style_img 装修风格
             * @param member_id 用户id
             **/

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $style = $this->Param['style_img'];
            if(!is_numeric($style)){

                $row =array(
                    'code' => 1,
                    'msg' =>'请选择装修风格'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $decoration_row = $DecorationHelper->getRow(array(
                '`id` = ?' => $id,
                '`is_delete` = ?' => 0,
                '`is_online` = ?' => 0
            ));
            if(empty($decoration_row)){
                $row =array(
                    'code' => 1,
                    'msg' =>'未找到当前特装或特装已下架'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $decoration_row['style_number'] = $style;
            $decoration_row['style_img'] = unserialize($decoration_row['style_type']);

            //获取详细信息
            $menberInfo = $MemberDetailHelper->GetMember($this->Param['member_id']);

            $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['member_id']));

            if(empty($menberInfo['mobile'])){
                $menberInfo['mobile'] = $memberRow['mobile'];
            }
            $menberInfo['list'] = $memberRow;

            $row = array(
                'code' => 0,
                'menberInfo' => $menberInfo,
                'data' => $decoration_row
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();
            break;
        case 'logistics':
            /**
             * 立即购买
             * @param id 当前购买的相关ID
             * @param number 物件大小
             * @param member_id 用户id
             * @param freight 物流方式
             **/

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            if(empty($this->Param['number'])){
                $row = array(
                    'code' => 1,
                    'msg' => '请填写物件大小'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $num = $this->Param['number'];
            if(!is_numeric($num)){
                $row = array(
                    'code' => 1,
                    'msg' => '物件大小错误'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            if(empty($this->Param['freight'])){
                $row = array(
                    'code' => 1,
                    'msg' => '请选择物流方式'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }
            $freight = $this->Param['freight'];

            $logistics_row = $LogisticsHelper->getRow(array(
                '`log_id` = ?' => $id,
                '`is_delete` = ?' => 0,
                '`is_online` = ?' => 0
            ));
            if(empty($logistics_row)){
                $row = array(
                    'code' => 1,
                    'msg' => '未找到当前物流或物流已下架'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $log_freight = unserialize($logistics_row['log_freight']);

            $logistics_row['log_freight'] = $log_freight;
            $logistics_row['num'] = $num;
            $logistics_row['total_price'] = $num * $log_freight[$freight][$freight.'_price'] + $logistics_row['log_price'];
            $logistics_row['yf_total_price'] = $num * $log_freight[$freight][$freight.'_price'];
            $logistics_row['freight_txt'] = $freight;

            //获取详细信息
            $menberInfo = $MemberDetailHelper->GetMember($this->UserConfig['Id']);

            $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));

            if(empty($menberInfo['mobile'])){
                $menberInfo['mobile'] = $memberRow['mobile'];
            }
            $menberInfo['list'] = $memberRow;

            $row = array(
                'code' => 0,
                'data' => $logistics_row,
                'menberInfo' => $menberInfo
            );

            echo $this->Param['callback']."(".json_encode($row).")";

            break;
        case 'route':

            /**
             * 立即购买
             * @param id 当前购买的相关ID
             * @param member_id 用户id
             **/

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $route_row = $RouteHelper->routeRow(array(
                '`id` = ?' => $id,
                '`is_sale` = ?' => 1
            ));

            if(empty($route_row)){
                $row = array(
                    'code' => 1,
                    'msg' => '未找到当前行程或行程已下架'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            //获取详细信息
            $menberInfo = $MemberDetailHelper->GetMember($this->UserConfig['Id']);

            $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->UserConfig['Id']));

            if(empty($menberInfo['mobile'])){
                $menberInfo['mobile'] = $memberRow['mobile'];
            }
            $menberInfo['list'] = $memberRow;

            $row = array(
                'code' => 0,
                'menberInfo' => $menberInfo,
                'data' => $route_row
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
        case 'visa':

            /**
             * 立即购买
             * @param id 当前购买的相关ID
             * @param member_id 用户id
             **/

            $this->LoadHelper('public/usercheck');

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $visa_row = $VisaHelper->getRow(array(
                '`visa_id` = ?' => $id,
                '`is_delete` = ?' => 0,
                '`is_online` = ?' => 0
            ));
            if(empty($visa_row)){
                $row = array(
                    'code' => 1,
                    'msg' => '未找到当前签证或签证已下架'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            //产品类型
            $pro_row = $VisaHelper->getProRow(array('`pro_id` = ?' => $visa_row['pro_type']));
            $visa_row['type_name'] = $pro_row['type_name'];
            //签证类型
            $visa_type = $VisaHelper->getVisaRow(array('`visa_id` = ?' => $visa_row['visa_type']));
            $visa_row['visa_name'] = $visa_type['visa_name'];

            $row = array(
                'code' => 1,
                'data' => $visa_row
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();


            break;
        default:
    }
}else{
    switch($this->Param['option']){
        case 'order_step':
            switch($type){
                case 'convention':
                    /**
                     * 展会下单第一步
                     * @param id 展会ID
                     * @param area_id 展区号ID
                     * @param is_group 是否跟团
                     * @param company_name 单位名称
                     * @param company_address 单位地址
                     * @param address_user_name 联系人
                     * @param address_mobile 联系电话
                     * @param address_tel 联系手机
                     * @param address_email 电子邮件
                     * @param fax 传真
                     * @param website 公司网址
                     * @param remarks 备注
                     **/

                    //定制信息
                    if(empty($this->Param['company_address'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写单位地址'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    if(empty($this->Param['address_tel'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写手机'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    $company_name = $this->Param['company_name'];
                    $company_address = $this->Param['company_address'];
                    $address_user_name = $this->Param['address_user_name'];
                    $address_mobile = $this->Param['address_mobile'];
                    $address_tel = $this->Param['address_tel'];
                    $address_email = $this->Param['address_email'];
                    $fax = $this->Param['fax'];
                    $website = $this->Param['website'];
                    $area_id = empty($this->Param['area_id']) ? 0 : $this->Param['area_id'];

                    //下单前判断展位是否已经出售
                    $area_row = $ConventionHelper->getAreaRow(array(
                        '`area_id` = ?' => $area_id
                    ));

                    if($area_row['is_rent'] == 1){
                        if(empty($this->Param['address_tel'])){
                            $row = array(
                                'code' => 1,
                                'msg' => '展位已经被其他用户预定了'
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }
                    }

                    $receiving = array(
                        'company_name' => $company_name,
                        'company_address' => $company_address,
                        'address_user_name' => $address_user_name,
                        'address_mobile' => $address_mobile,
                        'address_tel' => $address_tel,
                        'address_email' => $address_email,
                        'fax' => $fax,
                        'website' => $website
                    );
                    //
                    $member_id = $UserInfo['Id'];
                    $remarks = $this->Param['remarks'];

                    $is_group = $this->Param['is_group'];
                    $sn = NOW_TIME . StringCode::RandomCode(3, 'num');

                    $detail_id = empty($this->Param['id']) ? 0 : $this->Param['id'];

                    //获取商家发布的展会信息
                    $detail_row = $ConventionHelper->getDetailRow(array( '`detail_id` = ?' => $detail_id));

                    unset($detail_row['description']);
                    unset($detail_row[7]);

                    //获取展会
                    $con_row = $ConventionHelper->getRow(array(
                        '`id` = ?' => $detail_row['con_id']
                    ));

                    $detailArr['con_detail'] =  $detail_row;

                    $detailArr['con_detail']['con_detail'] = $con_row;

                    $detailArr['con_detail']['detail_area'] = $area_row;

                    if($is_group == '1'){//是否采用跟团价格
                        $price = $area_row['group_price'];
                    }else{
                        $price = $area_row['booth_price'];
                    }

                    //展会订单入库
                    $id = $ConventionHelper->orderSave(array(
                        'order_sn' =>$sn,
                        'con_id' => $detail_row['con_id'],
                        'member_id' => $UserInfo['Id'],
                        'saler_id' => $detail_row['member_id'],
                        'con_cover' => $con_row['cover'],
                        'con_name' => $con_row['name'],
                        'detail' => serialize($detailArr),
                        'price' => $price,
                        'money' => $price,
                        'is_group' => $is_group,
                        'receiving' => serialize($receiving),
                        'remarks' => $remarks,
                        'datetime' => NOW_TIME
                    ));

                    $order_data = array(
                        'order_sn' => $sn,
                        'member_id' => $UserInfo['Id'],
                        'seller_id' => $detail_row['member_id'],
                        'price' => $price,
                        'is_type' => 'convention',
                        'addtime' => NOW_TIME,
                        'show_price' => $price
                    );
                    if($id){
                        $do = $OrderHelper->save($order_data);
                        $ConventionHelper->areaUpdate(array(
                            'is_rent' => 1
                        ),array(
                            '`area_id` = ?' => $area_id
                        ));

                        if($do){

                            $row = array(
                                'code' => 0,
                                'data' => array(
                                    'order_sn'=> $sn
                                )
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }
                    }

                    $row = array(
                        'code' => 1,
                        'msg' => '保存失败'
                    );

                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();

                    break;
                case 'decoration':
                    /**
                     * 特装接口
                     * @param id 特装id
                     * @param member_id 用户id
                     * @param company 单位名称
                     * @param address 单位地址
                     * @param convention_name 展会名称
                     * @param convention_time 展会时间
                     * @param area_name 展位号
                     * @param username 联系人
                     * @param mobile 电话
                     * @param tel 手机号码
                     * @param email 邮件
                     * @param fax 传真
                     * @param company_website 公司网址
                     * @param remarks 备注
                     **/
                    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                    $decoration_row = $DecorationHelper->getRow(array(
                        '`id` = ?' => $id,
                        '`is_delete` = ?' => 0,
                        '`is_online` = ?' => 0
                    ));

                    if(empty($this->Param['member_id'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '未获取当前用户id'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    if(empty($decoration_row)){
                        $row = array(
                            'code' => 1,
                            'msg' => '未找到当前特装或特装已下架'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    //信息判断
                    if(empty($this->Param['company'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写单位名称'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    if(empty($this->Param['address'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写单位地址'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    if(empty($this->Param['convention_name'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写展会名称'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    if(empty($this->Param['pavilion_name'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写展馆名称'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    if(empty($this->Param['convention_time'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写展会时间'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }


                    $company = $this->Param['company'];
                    $address = $this->Param['address'];
                    $convention_name = $this->Param['convention_name'];
                    $pavilion_name = $this->Param['pavilion_name'];
                    $convention_time = $this->Param['convention_time'];
                    $area_name = $this->Param['area_name'];
                    $username = $this->Param['username'];
                    $mobile = $this->Param['mobile'];
                    $tel = $this->Param['tel'];
                    $email = $this->Param['email'];
                    $fax = $this->Param['fax'];

                    if(!StringCode::IsMobile($tel)){
                        $row = array(
                            'code' => 1,
                            'msg' => '手机号码错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    $style_number = $this->Param['style_number'];
                    if(!is_numeric($style_number)){
                        $row = array(
                            'code' => 1,
                            'msg' => '特装风格错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    //选择的特装风格
                    $style_type = unserialize($decoration_row['style_type']);
                    if(!empty($style_type)){
                        foreach($style_type as $key => $val){
                            if($key == $style_number){
                                $style_img = $val;
                            }
                        }
                    }

                    $remarks = $this->Param['remarks'];
                    $company_website = $this->Param['company_website'];

                    //存入订单
                    $sn = StringCode::RandomCode(3,'time');
                    //地址
                    $receiving = array(
                        'company' => $company,
                        'address' => $address,
                        'convention_name' => $convention_name,
                        'pavilion_name' => $pavilion_name,
                        'convention_time' => $convention_time,
                        'area_name' => $area_name,
                        'username' => $username,
                        'mobile' => $mobile,
                        'tel' => $tel,
                        'email' => $email,
                        'fax' => $fax,
                        'company_website' => $company_website
                    );

                    //特装选择的风格
                    $style_arr = array(
                        'key' => $style_number,
                        'style_img' => $style_img
                    );
                    //物流订单信息
                    $decoration_order = array(
                        'order_sn' => $sn,
                        'de_id'  => $id,
                        'member_id'=> $this->Param['member_id'],
                        'saler_id' => $decoration_row['member_id'],
                        'de_title' => $decoration_row['title'],
                        'de_style' => serialize($style_arr),
                        'price' => $decoration_row['de_price'],
                        'money' => $decoration_row['de_price'],
                        'detail' => serialize($decoration_row),
                        'receiving' => serialize($receiving),
                        'remarks' => $remarks,
                        'datetime' => NOW_TIME,
                    );

                    $decorationOrderId = $DecorationHelper->orderDecorationSave($decoration_order);

                    //订单总表
                    $order_data = array(
                        'order_sn' => $sn,
                        'member_id' => $this->Param['member_id'],
                        'seller_id' => $decoration_row['member_id'],
                        'price' => $decoration_row['de_price'],
                        'is_type' => 'decoration',
                        'addtime' => NOW_TIME,
                        'show_price' => $decoration_row['de_price']
                    );
                    if($id){
                        $do = $OrderHelper->save($order_data);
                        if($do){
                            $row = array(
                                'code' => 0,
                                'msg' => '保存成功',
                                'data'=> $sn
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();

                        }
                    }

                    $row = array(
                        'code' => 1,
                        'msg' => '保存失败'
                    );

                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();

                    break;
                case 'logistics':
                    /**
                     * 物流接口
                     * @param id 物流id
                     * @param member_id 当前用户id
                     * @param company 单位名称
                     * @param address 单位地址
                     * @param goods 物流商品
                     * @param username 联系人
                     * @param mobile 电话
                     * @param tel 手机号码
                     * @param email 邮件
                     * @param fax 传真
                     * @param company_website 公司网站
                     * @param remarks 备注
                     * @param num 物流数量
                     * @param freight_txt 物流方式
                     **/
                    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                    $logistics_row = $LogisticsHelper->getRow(array(
                        '`log_id` = ?' => $id,
                        '`is_delete` = ?' => 0,
                        '`is_online` = ?' => 0
                    ));
                    if(empty($logistics_row)){
                        $row = array(
                            'code' => 1,
                            'msg' => '未找到当前物流或物流已下架'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    //信息判断
                    if(empty($this->Param['company'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请填写单位名称'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $company = $this->Param['company'];
                    $address = $this->Param['address'];
                    $goods = $this->Param['goods'];
                    $username = $this->Param['username'];
                    $mobile = $this->Param['mobile'];
                    $tel = $this->Param['tel'];
                    $email = $this->Param['email'];
                    $fax = $this->Param['fax'];

                    if(!StringCode::IsMobile($tel)){
                        $row = array(
                            'code' => 1,
                            'msg' => '手机号码错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    if(empty($this->Param['num'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '物流数量错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $num = $this->Param['num'];

                    if(!is_numeric($num)){
                        $row = array(
                            'code' => 1,
                            'msg' => '物流数量错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $remarks = $this->Param['remarks'];
                    $company_website = $this->Param['company_website'];
                    $freight_txt = $this->Param['freight_txt'];

                    $log_freight = unserialize($logistics_row['log_freight']);
                    $total_price = $num * $log_freight[$freight_txt][$freight_txt.'_price'] + $logistics_row['log_price'];

                    //存入订单
                    $sn = StringCode::RandomCode(3,'time');
                    //地址
                    $receiving = array(
                        'company' => $company,
                        'address' => $address,
                        'goods' => $goods,
                        'username' => $username,
                        'mobile' => $mobile,
                        'tel' => $tel,
                        'email' => $email,
                        'fax' => $fax,
                        'company_website' => $company_website
                    );
                    //物流订单信息
                    $visa_order = array(
                        'order_sn' => $sn,
                        'log_id'  => $id,
                        'member_id'=> $this->UserConfig['Id'],
                        'saler_id' => $logistics_row['member_id'],
                        'mode' => $freight_txt,
                        'freight' => $log_freight[$freight_txt][$freight_txt.'_price'],
                        'price' => $logistics_row['log_price'],
                        'money' => $total_price,
                        'num' => $num,
                        'log_detail' => serialize($logistics_row),
                        'receiving' => serialize($receiving),
                        'remarks' => $remarks,
                        'datetime' => NOW_TIME,
                    );
                    $logisticsOrderId = $LogisticsHelper->orderLogisticsSave($visa_order);

                    //订单总表
                    $order_data = array(
                        'order_sn' => $sn,
                        'member_id' => $this->UserConfig['Id'],
                        'seller_id' => $logistics_row['member_id'],
                        'price' => $total_price,
                        'is_type' => 'logistics',
                        'addtime' => NOW_TIME,
                        'show_price' => $total_price
                    );
                    if($id){
                        $do = $OrderHelper->save($order_data);
                        if($do){
                            $row = array(
                                'code' => 0,
                                'msg' => '保存成功',
                                'data' => $sn
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();

                        }
                    }

                    $row = array(
                        'code' => 0,
                        'msg' => '保存失败',
                        'data' => $sn
                    );

                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();

                    break;
                case 'route':
                    /**
                     * 行程接口
                     * @param id 行程id
                     * @param member_id 当前用户id
                     * @param company_name 单位名称
                     * @param contacter 联系人
                     * @param tel 联系电话
                     * @param mobile 手机号码
                     * @param email 电子邮件
                     * @param fax 传真
                     * @param url 公司网站
                     * @param num 行程人数
                     * @param remarks 备注
                     **/
                    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                    $route_row = $RouteHelper->routeRow(array(
                        '`id` = ?' => $id,
                        '`is_sale` = ?' => 1
                    ));
                    if(empty($route_row)){
                        $row = array(
                            'code' => 1,
                            'msg' => '未找到当前行程或行程已下架'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $company_name = $this->Param['company_name'];
                    $company_address = $this->Param['company_address'];
                    $contacter = $this->Param['contacter'];
                    $tel = $this->Param['tel'];
                    $mobile = $this->Param['mobile'];
                    if(!StringCode::IsMobile($mobile)){
                        $row = array(
                            'code' => 1,
                            'msg' => '手机号码错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $email = $this->Param['email'];
                    if(!StringCode::IsEmail($email)){
                        $row = array(
                            'code' => 1,
                            'msg' => 'Email错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $fax = $this->Param['fax'];
                    $url = $this->Param['url'];

                    if(empty($this->Param['num'])){
                        $row = array(
                            'code' => 1,
                            'msg' => '请输入行程人数'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $num = $this->Param['num'];
                    if(!is_numeric($num)){
                        $row = array(
                            'code' => 1,
                            'msg' => '人数错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $remarks = $this->Param['remarks'];
                    //存入订单
                    $sn = StringCode::RandomCode(3,'time');
                    unset($route_row['image']);
                    unset($route_row['description']);
                    $receiving = array(
                        'company_name' => $company_name,
                        'company_address' => $company_address,
                        'contacter' => $contacter,
                        'tel' => $tel,
                        'mobile' => $mobile,
                        'email' => $email,
                        'fax' => $fax,
                        'url' => $url
                    );
                    $route_order = array(
                        'order_sn' => $sn,
                        'goods_name' => $route_row['name'],
                        'goods_detail' => serialize($route_row),
                        'route_id' => $route_row['id'],
                        'saler_id' => $route_row['member_id'],
                        'member_id' => $this->Param['member_id'],
                        'receiving' => serialize($receiving),
                        'nums' => $num,
                        'price' => $route_row['price'],
                        'money' => $num*$route_row['price'],
                        'remarks' => $remarks,
                        'dateline' => NOW_TIME
                    );
                    $id = $RouteHelper->orderSave($route_order);
                    $order_data = array(
                        'order_sn' => $sn,
                        'member_id' => $this->UserConfig['Id'],
                        'seller_id' => $route_row['member_id'],
                        'price' => $num*$route_row['price'],
                        'is_type' => 'route',
                        'addtime' => NOW_TIME,
                        'show_price' => $num*$route_row['price']
                    );
                    if($id){
                        $do = $OrderHelper->save($order_data);
                        if($do){
                            $row = array(
                                'code' => 0,
                                'data' => $sn
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }
                    }

                    $row = array(
                        'code' => 1,
                        'msg' => '保存失败'
                    );

                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();

                    break;
                case 'visa':
                    /**
                     * 签证接口
                     * @param id 签证id
                     * @param member_id 用户id
                     * @param add_username 收货人姓名
                     * @param ship_province 区域
                     * @param add_address 详细地址
                     * @param add_area 地区
                     * @param add_tel 手机号码
                     * @param add_remarks 备注
                     * @param num 签证人数
                     * @param username 签证真实姓名
                     * @param cert_type 签证证件类型
                     * @param cert_msg 签证证件信息
                     * @param tel 签证手机号码
                     **/

                    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                    $visa_row = $VisaHelper->getRow(array(
                        '`visa_id` = ?' => $id,
                        '`is_delete` = ?' => 0,
                        '`is_online` = ?' => 0
                    ));
                    if(empty($visa_row)){
                        $row = array(
                            'code' => 1,
                            'msg' => '未找到当前签证或签证已下架'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    $orderVisa = $VisaHelper->getOrderVisaRow(array(
                        '`visa_id` = ?' => $id
                    ));

                    $visa_pro_row = $VisaHelper->getProRow(array('`pro_id` = ?' => $orderVisa['pro_type']));
                    $visa_visa_row = $VisaHelper->getVisaRow(array('`visa_id` = ?' => $orderVisa['visa_type']));
                    //
                    $add_username = $this->Param['add_username'];
                    $ship_province = $this->Param['ship_province'];
                    $add_address = $this->Param['add_address'];
                    $add_area = $this->Param['add_area'];
                    $add_tel = $this->Param['add_tel'];
                    if(!StringCode::IsMobile($add_tel)){
                        $row = array(
                            'code' => 1,
                            'msg' => '手机号码错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }

                    $num = $this->Param['num'];
                    if(!is_numeric($num)){
                        $row = array(
                            'code' => 1,
                            'msg' => '人数错误'
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();
                    }
                    $remarks = $this->Param['add_remarks'];
                    //存入订单
                    $sn = StringCode::RandomCode(3,'time');
                    //地址
                    $receiving = array(
                        'add_username' => $add_username,
                        'add_address' => $add_address,
                        'add_area' => $add_area,
                        'add_tel' => $add_tel,
                        'ship_province' => $this->Param['ship_province'],
                        'ship_city' => $this->Param['ship_city'],
                        'ship_area' => $this->Param['ship_area'],
                        'add_mobile' => $this->Param['add_mobile_01'].'-'.$this->Param['add_mobile_02'].'-'.$this->Param['add_mobile_03']
                    );
                    //签证订单信息
                    $visa_order = array(
                        'order_sn' => $sn,
                        'visa_id'  => $id,
                        'member_id'=> $this->Param['member_id'],
                        'saler_id' => $visa_row['member_id'],
                        'visa_cover' => $visa_row['visa_cover'],
                        'visa_name' => $visa_row['visa_title'],
                        'pro_type' => $visa_pro_row['type_name'],
                        'visa_type' => $visa_visa_row['visa_name'],
                        'visa_price' => $visa_row['visa_price'],
                        'money' => $visa_row['visa_price'] * $num,
                        'num' => $num,
                        'visa_area' => $visa_row['visa_area'],
                        'receiving' => serialize($receiving),
                        'remarks' => $remarks,
                        'datetime' => NOW_TIME,
                    );
                    $visaOrderId = $VisaHelper->orderVisaSave($visa_order);

                    //签证人信息

                    $username = $this->Param['username'];
                    $cert_type = $this->Param['cert_type'];
                    $cert_msg = $this->Param['cert_msg'];
                    $tel = $this->Param['tel'];

                    foreach($username as $key => $val){
                        if(empty($val)){
                            $row = array(
                                'code' => 1,
                                'msg' => '请填写签证真实姓名'
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                            break;
                        }
                        //存入签证人信息
                        $visaMember = array(
                            'username' => $val,
                            'order_id' => $visaOrderId,
                            'tel'      => $tel[$key],
                            'cert_type'=> $cert_type[$key],
                            'cert_msg' => $cert_msg[$key],
                            'datetime' => NOW_TIME
                        );
                        $VisaHelper->VisaMemberSave($visaMember);
                    }

                    //订单总表
                    $order_data = array(
                        'order_sn' => $sn,
                        'member_id' => $this->Param['member_id'],
                        'seller_id' => $visa_row['member_id'],
                        'price' => $num*$visa_row['visa_price'],
                        'is_type' => 'visa',
                        'addtime' => NOW_TIME,
                        'show_price' => $num*$visa_row['visa_price']
                    );
                    if($id){
                        $do = $OrderHelper->save($order_data);
                        if($do){
                            $row = array(
                                'code' => 0,
                                'data' => $sn
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }
                    }

                    $row = array(
                        'code' => 1,
                        'msg' => '保存失败'
                    );

                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();

                    break;
                default:
            }

            break;
        case 'pay':
                switch($type){
                    case 'convention':
                        /**
                         * 展会支付
                         * @param sn 订单号
                         * @param member_id 购买用户id
                         **/

                        if(empty($this->Param['sn'])){
                            $row = array(
                                'code' => 1,
                                'msg' => '参数错误'
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }

                        $sn = $this->Param['sn'];
                        //读取支付订单信息
                        $order_row = $OrderHelper->getRow(array(
                            '`order_sn` = ?' => $sn,
                            '`member_id` = ?' => $this->UserConfig['Id']
                        ));

                        if(empty($order_row)){
                            $row = array(
                                'code' => 1,
                                'msg' => '订单记录不存在'
                            );

                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }elseif($order_row['is_pay'] == 1){
                            if(!$order_row['order_state'] == 4){
                                $row = array(
                                    'code' => 1,
                                    'msg' => '订单已支付，无须重复支付'
                                );

                                echo $this->Param['callback']."(".json_encode($row).")";
                                die();
                            }else{
                                $advance = $order_row['price'] - $order_row['advance'];
                                $order_row['advance'] = $advance;
                            }
                        }

                        //读取附表订单信息
                        $convention_order = $ConventionHelper->orderRow(array(
                            '`order_sn` = ?' => $sn
                        ));
                        $convention_order['detail'] = unserialize($convention_order['detail']);
                        $convention_order['receiving'] = unserialize($convention_order['receiving']);

                        $row = array(
                            'code' => 0,
                            'data' => $convention_order,
                            'order_row' => $order_row
                        );

                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();

                        break;
                    case 'decoration':
                        /**
                         * 特装支付接口
                         * @param sn 订单号
                         * @param member_id 用户id
                         **/

                        if(empty($this->Param['sn'])){
                            $row = array(
                                'code' => 1,
                                'msg' => '参数错误'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }

                        $sn = $this->Param['sn'];
                        //读取支付订单信息
                        $order_row = $OrderHelper->getRow(array(
                            '`order_sn` = ?' => $sn,
                            '`member_id` = ?' => $this->Param['member_id']
                        ));

                        if(empty($order_row)){
                            if(empty($this->Param['sn'])){
                                $row = array(
                                    'code' => 1,
                                    'msg' => '订单记录不存在'
                                );
                                echo json_encode($row);
                                die();
                            }
                        }elseif($order_row['is_pay'] == 1){
                            if(empty($this->Param['sn'])){
                                $row = array(
                                    'code' => 1,
                                    'msg' => '订单已支付，无须重复支付'
                                );
                                echo $this->Param['callback']."(".json_encode($row).")";
                                die();
                            }
                        }
                        //读取附表订单信息
                        $decoration_order = $DecorationHelper->getOrderDecotionRow(array(
                            '`order_sn` = ?' => $sn
                        ));
                        $decoration_order['receiving'] = unserialize($decoration_order['receiving']);
                        $decoration_order['detail'] = unserialize($decoration_order['detail']);
                        $decoration_order['de_style'] = unserialize($decoration_order['de_style']);

                        $row = array(
                            'code' => 0,
                            'data' => $decoration_order
                        );
                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();

                        break;
                    case 'logistics':
                        /**
                         * 物流支付接口
                         * @param sn 订单号
                         * @param member_id 用户id
                         **/
                        $sn = empty($this->Param['sn']) ? ErrorMsg::Debug('参数错误') : $this->Param['sn'];
                        //读取支付订单信息
                        $order_row = $OrderHelper->getRow(array(
                            '`order_sn` = ?' => $sn,
                            '`member_id` = ?' => $this->Param['member_id']
                        ));

                        if(empty($order_row)){
                            $row = array(
                                'code' => 1,
                                'msg' => '订单记录不存在'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }elseif($order_row['is_pay'] == 1){
                            $row = array(
                                'code' => 1,
                                'msg' => '订单已支付，无须重复支付'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }
                        //读取附表订单信息
                        $logistics_order = $LogisticsHelper->getOrderLogisticsRow(array(
                            '`order_sn` = ?' => $sn
                        ));
                        $logistics_order['receiving'] = unserialize($logistics_order['receiving']);
                        $logistics_order['log_detail'] = unserialize($logistics_order['log_detail']);
                        $logistics_order['log_detail']['log_freight'] = unserialize($logistics_order['log_detail']['log_freight']);
                        $logistics_order['yf_total_price'] = $logistics_order['num'] * $logistics_order['freight'];

                        $row = array(
                            'code' => 0,
                            'data' => $logistics_order
                        );
                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();

                        break;
                    case 'route':
                        /**
                         * 行程支付接口
                         * @param sn 订单号
                         * @param member_id 用户id
                         **/

                        if(empty($this->Param['sn'])){
                            $row = array(
                                'code' => 1,
                                'msg' => '参数错误'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }

                        $sn = $this->Param['sn'];
                        //读取支付订单信息
                        $order_row = $OrderHelper->getRow(array(
                            '`order_sn` = ?' => $sn,
                            '`member_id` = ?' => $this->Param['member_id']
                        ));
                        $this->Assign('order_row' , $order_row);
                        if(empty($order_row)){
                            $row = array(
                                'code' => 1,
                                'msg' => '订单记录不存在'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }elseif($order_row['is_pay'] == 1){
                            $row = array(
                                'code' => 1,
                                'msg' => '订单已支付，无须重复支付'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }
                        //读取附表订单信息
                        $route_order = $RouteHelper->orderRow(array(
                            '`order_sn` = ?' => $sn
                        ));
                        $route_order['receiving'] = unserialize($route_order['receiving']);
                        //
                        $route_row = $RouteHelper->routeRow($route_order['route_id']);

                        $row = array(
                            'code' => 0,
                            'data' => $route_order,
                            'route' =>$route_row
                        );
                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();

                        break;
                    case 'visa':
                        /**
                         * 签证支付
                         * @param sn 订单号
                         * @param member_id 当前用户id
                         **/

                        if(empty($this->Param['sn'])){
                            $row = array(
                                'code' => 1,
                                'msg' => '参数错误'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();
                        }
                        $sn = $this->Param['sn'];
                        //读取支付订单信息
                        $order_row = $OrderHelper->getRow(array(
                            '`order_sn` = ?' => $sn,
                            '`member_id` = ?' => $this->Param['member_id']
                        ));
                        $this->Assign('order_row' , $order_row);

                        if(empty($order_row)){
                            $row = array(
                                'code' => 1,
                                'msg' => '订单记录不存在'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();

                        }elseif($order_row['is_pay'] == 1){
                            $row = array(
                                'code' => 1,
                                'msg' => '订单已支付，无须重复支付'
                            );
                            echo $this->Param['callback']."(".json_encode($row).")";
                            die();

                        }
                        //读取附表订单信息
                        $visa_order = $VisaHelper->getOrderVisaRow(array(
                            '`order_sn` = ?' => $sn
                        ));
                        $visa_order['receiving'] = unserialize($visa_order['receiving']);

                        //签证人信息
                        $visa_member_row = $VisaHelper->getVisaMemberList(array( '`order_id` = ?' => $visa_order['id']),200,0,'');

                        $row = array(
                            'code' => 1,
                            'data' => $visa_order,
                            'visa_member' => $visa_member_row
                        );
                        echo $this->Param['callback']."(".json_encode($row).")";
                        die();

                        break;
                    default:
                }
            break;
        default :
    }
}