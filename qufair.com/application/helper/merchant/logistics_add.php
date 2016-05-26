<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('logistics/LogisticsHelper');
    $LogisticsHelper = new LogisticsHelper();

    $this->LoadHelper('region/RegionHelper');
    $RegionHelper = new RegionHelper();

    //获取用户信息
    $UserInfo = $this->UserConfig['Id'];
    if(empty($this->Param['option'])){
        $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
        if($id > 0){
            $data['list'] = $LogisticsHelper->getRow(array('`log_id` = ?' => $id,'`is_delete` = ? ' => 0));
            $data['list']['imgurl'] = unserialize($data['list']['log_imgurl']);
            $data['list']['log_freight'] = unserialize($data['list']['log_freight']);

        }
		//类型
        $data['visa'] = $LogisticsHelper->GetVisaSort('all');
        $this->Assign('id',$id);
        $this->Assign('data', $data);
        echo $this->GetView('logistics_add.php');
    }else{
        switch($this->Param['option']){
            case 'submit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'] ;
                if($UserInfo == 0){
                    ErrorMsg::Debug('登陆失效，请重新登陆');
                }
                empty($this->Param['log_title']) ? ErrorMsg::Debug('请填写物流名称') : $this->Param['log_title'];
                empty($this->Param['log_location']) ? ErrorMsg::Debug('请填写物流集散地') : $this->Param['log_location'];
                empty($this->Param['log_unit']) ? ErrorMsg::Debug('请选择物件大小') : $this->Param['log_unit'];
                empty($this->Param['log_city']) ? ErrorMsg::Debug('请填写服务城市') : $this->Param['log_city'];
                $data['start_time'] = empty($this->Param['start_time']) ? ErrorMsg::Debug('请填写开始时间') : $this->Param['start_time'];
                $data['end_titme'] = empty($this->Param['end_titme']) ? ErrorMsg::Debug('请填写结束时间') : $this->Param['end_titme'];

                $data['member_id'] =  $UserInfo;
                $data['log_cover'] = $this->Param['cover'];
                $data['log_price'] = $this->Param['log_price'];

                $imgurl2 = $this->Param['imgurl2'];
                $imgurl3 = $this->Param['imgurl3'];
                $imgurl4 = $this->Param['imgurl4'];
                $data['log_imgurl'] = serialize(array($imgurl2, $imgurl3, $imgurl4));

                $data['log_title'] = $this->Param['log_title'];
                $data['log_location'] = $this->Param['log_location'];
                $data['log_unit'] = $this->Param['log_unit'];

                $hk = $this->Param['hk_freight'];
                $hy = $this->Param['hy_freight'];
                $ly = $this->Param['ly_freight'];
                $guonei = $this->Param['is_guonei'];

                $data['log_freight'] = serialize(array(
                    'ky' => array(
                        'ky_txt' => '空运',
                        'ky_price' => $hk
                    ),
                    'hy' => array(
                        'hy_txt' => '海运',
                        'hy_price' => $hy
                    ),
                    'ly' => array(
                        'ly_txt' => '陆运',
                        'ly_price' => $ly
                    ),
                    'guonei' => $guonei,
                ));

                $data['log_app_id'] = $this->Param['log_app_id'];
                $data['log_qq'] = $this->Param['log_qq'];
                $data['log_remarks'] = $this->Param['log_remarks'];
                $data['log_msg'] = $this->Param['log_msg'];
                $data['log_time'] = NOW_TIME;

                $titleArr = explode('-',$this->Param['log_title']);
                $data['log_countries'] = $titleArr[1];
                $data['log_year'] = date('Y',NOW_TIME);//添加时间年份


                $data['log_city'] = $this->Param['log_city'];//服务城市
                $startArr = explode("-",$this->Param['start_time']);
                $data['txt_year'] = $startArr[0];//特装开始的时间
                $data['txt_month'] = $startArr[1];

                $data['class_name'] = $this->Param['class_name'];

                if($id > 0){
                    $row = $LogisticsHelper->Update($data,array('`log_id` = ?' => $id));

                    if($row){
                        ErrorMsg::Debug('修改成功',TRUE);
                    }
                }else{
                    $row = $LogisticsHelper->save($data);
                    if($row){
                        ErrorMsg::Debug('修改成功',TRUE);
                    }
                }
                ErrorMsg::Debug('修改失败');
                break;
            case 'uploadImg':
                $this->LoadHelper('upload/EditorUploadHelper');
                $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
                $EditorUploadHelper->ImageUpload($this->Param['filebox'],'logistics');

                break;
            default :
        }
    }