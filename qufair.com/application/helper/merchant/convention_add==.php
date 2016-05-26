<?php
    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();
    //获取用户信息
    $UserInfo = $this->UserConfig;

    //所有行业
    $this->LoadHelper('industry/IndustryHelper');
    $IndustryHelper =  new IndustryHelper();
    $one_level = $IndustryHelper->industryAll(array(
        '`parent_id` = ?' => 0
    ),array(0,100));
    if(!empty($one_level)) foreach($one_level as $k=>$v){
        $next_all = $IndustryHelper->industryAll(array(
            '`parent_id` = ?' => $v['id']
        ),array(0,50));
        $one_level[$k]['next'] = $next_all;
    }

    $this->Assign('nav',$one_level);

    //区域
    $delta = array("欧洲","亚洲","中东","东欧","北美","南美","中北美","非洲","大洋洲","中国");
    $this->Assign('delta',$delta);


    if(empty($this->Param['option'])){
        $limit = 10;

        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where = array();
        $where = array('`id` > ?' => 0);

        if(!empty($this->Param['regional'])){
            $where['LOCATE("'.$this->Param['regional'].'",`regional`) > ?'] = 0;

            $key['regional'] = $this->Param['regional'];
        }

        if(!empty($this->Param['industry'])){
            $where['LOCATE("'.$this->Param['industry'].'",`industry`) > ?'] = 0;

            $key['industry'] = $this->Param['industry'];
        }

        if (!empty($this->Param['nametitle'])) {
            $key = explode(' ', $this->Param['nametitle']);
            if(!empty($key)) foreach($key as $k=>$v){
                //$union = $k==0 ? 'LOCATE("'.$v.'",`name`) > ?' : ' OR LOCATE("'.$v.'",`name`) > ?';
                //$str .= $union;
                $where['LOCATE("'.$v.'",`name`) > ?'] = 0;
            }
            //$where[$str] = $this->Param['nametitle'];
        }
        $data = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);


        $this->Assign('key',$key);
        $this->Assign('data', $data);
        $this->Assign('param', $this->Param);
        echo $this->GetView('convention_add.php');
    }else{
        switch($this->Param['option']){
            case 'info':
                $conid = $this->Param['con_id'];
                if(empty($conid)){
                    ErrorMsg::Debug('请选择展会');
                }

                $data = $ConventionHelper->getRow(array('`id` = ?' => $conid));
                $data['imglist'] = unserialize($data['imgurl']);
                $this->Assign('data', $data);
                echo $this->GetView('convention_info.php');
                break;
            case 'submit':

                $conId = empty($this->Param['con_id']) ? 0 : $this->Param['con_id'];
                //展会信息
                $data['con_id'] = $conId;
                $data['start_time'] = strtotime($this->Param['start_time']);
                $starttime = empty($this->Param['start_time']) ? ErrorMsg::Debug('请选择时间') : $this->Param['start_time'] ;
                $startimeArr = explode("-",$starttime);
                $data['txt_year'] = $startimeArr[0];//特装开始的时间
                $data['txt_month'] = $startimeArr[1];

                $data['member_id'] = $UserInfo['Id'];
                $data['end_titme'] = strtotime($this->Param['end_titme']);

                empty($this->Param['qq']) ? ErrorMsg::Debug('请填写联系人QQ') : $this->Param['qq'] ;
                $data['qq'] = $this->Param['qq'];
                $data['app_id'] = $this->Param['app_id'];
                $data['description'] = $this->Param['description'];
                $data['add_time'] = time();

                $detail_id = $ConventionHelper->detailSave($data);

                //展会区域
                $areaNameArr = $this->Param['area_name'];
                $boothNoArr = $this->Param['booth_no'];
                $boothTypeArr = $this->Param['booth_type'];
                $openingArr = $this->Param['opening'];
                $boothPriceArr = $this->Param['booth_price'];
                $groupPriceArr = $this->Param['group_price'];
                $advancePaymentArr = $this->Param['advance_payment'];
                $con_area = $this->Param['con_area'];
                $con_standard = $this->Param['con_standard'];

                if(empty($areaNameArr)){
                    ErrorMsg::Debug('请填写区域名称');
                }
                foreach($areaNameArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写区域名称');
                    }

                    if(strlen($v) > 12){
                        ErrorMsg::Debug('区域名称不能大于4个汉字');
                    }
                }
                if(empty($boothNoArr)){
                    ErrorMsg::Debug('请填写展位号');
                }
                foreach($boothNoArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写展位号');
                    }
                }
                if(empty($boothTypeArr)){
                    ErrorMsg::Debug('请选择摊位类型');
                }
                foreach($boothTypeArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请选择摊位类型');
                    }
                }
                if(empty($openingArr)){
                    ErrorMsg::Debug('请选择开口概况');
                }
                foreach($openingArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请选择开口概况');
                    }
                }
                if(empty($boothPriceArr)){
                    ErrorMsg::Debug('请填写摊位价格');
                }
                foreach($boothPriceArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写摊位价格');
                    }
                }
                if(empty($groupPriceArr)){
                    ErrorMsg::Debug('请填写跟团展会价格');
                }
                foreach($groupPriceArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写跟团展会价格');
                    }
                }

                if(empty($advancePaymentArr)){
                    ErrorMsg::Debug('请填写预付款');
                }
                foreach($advancePaymentArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写预付款');
                    }
                }
                if(empty($con_area)){
                    ErrorMsg::Debug('请填写展会面积');
                }
                foreach($con_area as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写展会面积');
                    }
                }
                if(empty($con_standard)){
                    ErrorMsg::Debug('请填写展会规格');
                }
                foreach($con_standard as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写展会规格');
                    }
                }

                foreach($areaNameArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写区域名称');
                    }

                    $dataArea['detail_id'] = $detail_id;
                    $dataArea['area_name'] = $v;
                    $dataArea['booth_no'] = $boothNoArr[$k];
                    $dataArea['booth_type'] = $boothTypeArr[$k];
                    $dataArea['opening'] = $openingArr[$k];
                    $dataArea['booth_price'] = $boothPriceArr[$k];
                    $dataArea['group_price'] = $groupPriceArr[$k];
                    $dataArea['advance_payment'] = $advancePaymentArr[$k];
                    $dataArea['con_area'] = $con_area[$k];
                    $dataArea['con_standard'] = $con_standard[$k];
                    $dataArea['add_time'] = time();

                    $ConventionHelper->areaSave($dataArea);

                }
                ErrorMsg::Debug('发布成功',TRUE);
                break;
            case 'totalnumber':
                $number = $ConventionHelper->getCount(array('`saler_id` = ?' => $UserInfo['Id']));
                $data['convention'] = $number;
                echo json_encode($data);
                break;
            default :
        }
    }