<?php
    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();
    //获取用户信息
    $UserInfo = $this->UserConfig;

    if(empty($this->Param['option'])){
        $limit = 10;

        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

        $show = empty($this->Param['show']) ? 0 : 1;

        $where = array('`detail_id` > ?' => 0,'`is_online` = ?' => $show ,'`member_id` = ?' => $UserInfo['Id']);

        $data = $ConventionHelper->GetAllDetailWhere($where, $limit, $page, $this->Param);
        if(!empty($data['All'])){
            foreach($data['All'] as $k => $v){

                $list = $ConventionHelper->getRow(array('`id` = ? ' => $v['con_id']));
                $data['All'][$k]['name'] = $list['name'];
                $data['All'][$k]['industry'] = $list['industry'];
                $data['All'][$k]['cover'] = $list['cover'];
                //统计展区数量
                $data['All'][$k]['count'] = $ConventionHelper->getCountArea(array('`detail_id` = ?' => $v['detail_id']));
                //获取展区信息
                $areaData = $ConventionHelper->getAreaRow(array('`detail_id` = ?' => $v['detail_id']));
                $data['All'][$k]['booth_price'] = $areaData['booth_price'];

            }
        }

        $this->Assign('data', $data);
        $this->Assign('is_online', $is_online);
        $this->Assign('param', $this->Param);
        echo $this->GetView('convention_list.php');
    }else{
        switch($this->Param['option']){
            case 'edit':
                $id = $this->Param['id'];
                if(empty($id)){
                    ErrorMsg::Debug('请选择展会');
                }
                //展会信息
                $data['detail'] = $ConventionHelper->getDetailRow(array('`detail_id` = ?' => $id));
                //展会
                if(!empty($data['detail'])){
                    $data['con'] = $ConventionHelper->getRow(array('`id` = ?' => $data['detail']['con_id']));
                    $data['con']['imglist'] = unserialize($data['con']['imgurl']);
                }
                //展会区域
                $data['area'] = $ConventionHelper->GetAllAreaWhere(array('`detail_id` = ?' => $id),100,0);

                $this->Assign('data', $data);
                echo $this->GetView('convention_list_edit.php');
                break;
            case 'submit':
                $detailId = empty($this->Param['detail_id']) ? 0 : $this->Param['detail_id'];
                //展会信息
                $data['start_time'] = strtotime($this->Param['start_time']);

                $starttime = empty($this->Param['start_time']) ? ErrorMsg::Debug('请选择时间') : $this->Param['start_time'] ;
                $startimeArr = explode("-",$starttime);
                $data['txt_year'] = $startimeArr[0];//特装开始的时间
                $data['txt_month'] = $startimeArr[1];

                $data['end_titme'] = strtotime($this->Param['end_titme']);
                $data['qq'] = $this->Param['qq'];
                $data['app_id'] = $this->Param['app_id'];
                $data['description'] = $this->Param['description'];
                $data['add_time'] = time();

                //展会区域
                $areaIdArr = $this->Param['area_id'];
                $areaNameArr = $this->Param['area_name'];
                $boothNoArr = $this->Param['booth_no'];
                $boothTypeArr = $this->Param['booth_type'];
                $openingArr = $this->Param['opening'];
                $boothPriceArr = $this->Param['booth_price'];
                $groupPriceArr = $this->Param['group_price'];
                $advancePaymentArr = $this->Param['advance_payment'];
                $con_areaArr = $this->Param['con_area'];
                $con_standardArr = $this->Param['con_standard'];

                foreach($areaNameArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写区域名称');
                    }

                    if(strlen($v) > 12){
                        ErrorMsg::Debug('区域名称不能大于4个汉字');
                    }
                }
                foreach($boothNoArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写展位号');
                    }
                }

                foreach($boothTypeArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请选择摊位类型');
                    }
                }

                foreach($openingArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请选择开口概况');
                    }
                }

                foreach($boothPriceArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写摊位价格');
                    }
                }

                foreach($groupPriceArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写跟团展会价格');
                    }
                }

                foreach($advancePaymentArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写预付款');
                    }
                }

                foreach($con_areaArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写展会面积');
                    }
                }

                foreach($con_standardArr as $k => $v){
                    if(empty($v)){
                        ErrorMsg::Debug('请填写展会规格');
                    }
                }

                $detail_id = $ConventionHelper->detailUpdate($data,array('`detail_id` = ?' => $detailId));

                foreach($areaIdArr as $k => $v){
                    if(empty($areaNameArr[$k])){
                        ErrorMsg::Debug('请填写区域名称');
                    }

                    if(strlen($areaNameArr[$k]) > 12){
                        ErrorMsg::Debug('区域名称不能大于4个汉字');
                    }


                    $dataArea['area_name'] = $areaNameArr[$k];
                    $dataArea['booth_no'] = $boothNoArr[$k];
                    $dataArea['booth_type'] = $boothTypeArr[$k];
                    $dataArea['opening'] = $openingArr[$k];
                    $dataArea['booth_price'] = $boothPriceArr[$k];
                    $dataArea['group_price'] = $groupPriceArr[$k];
                    $dataArea['advance_payment'] = $advancePaymentArr[$k];
                    $dataArea['con_area'] = $con_areaArr[$k];
                    $dataArea['con_standard'] = $con_standardArr[$k];
                    $data['add_time'] = time();

                    if($v > 0){
                        $ConventionHelper->areaUpdate($dataArea,array('`area_id` = ?' => $v));

                    }else{
                        $dataArea['detail_id'] = $detailId;
                        $ConventionHelper->areaSave($dataArea);
                    }

                }


                ErrorMsg::Debug('编辑成功',TRUE);
                break;
            case 'remove':
                $detailId = empty($this->Param['detailId']) ? 0 : $this->Param['detailId'];
                $detailRow = $ConventionHelper->detailDelete(array('`detail_id` = ?' => $detailId));

                if($detailRow){
                    $ConventionHelper->areaDelete(array('`detail_id` = ?' => $detailId));
                    ErrorMsg::Debug('删除成功',TRUE);
                }
                ErrorMsg::Debug('删除失败');
                break;
            case 'shelves':
                $id = empty($this->Param['detailId']) ? 0 : $this->Param['detailId'];
                $detail_row = $ConventionHelper->getDetailRow(array(
                    '`detail_id` = ?' => $id,
                    '`member_id` = ?' => $this->UserConfig['Id']
                ));
                if(empty($detail_row)){
                    ErrorMsg::Debug('不存在当前信息');
                }else{
                    $data = array(
                        'is_online' => $detail_row['is_online'] == 1 ? 0 : 1
                    );
                    $do = $ConventionHelper->detailUpdate($data,array(
                        '`detail_id` = ?' => $id,
                        '`member_id` = ?' => $this->UserConfig['Id']
                    ));
                    if($do){
                        ErrorMsg::Debug('操作成功',TRUE);
                    }
                    ErrorMsg::Debug('操作失败');
                }

                break;
            default :
        }
    }