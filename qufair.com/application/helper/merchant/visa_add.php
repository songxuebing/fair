<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('visa/VisaHelper');
    $VisaHelper = new VisaHelper();

    $this->LoadHelper('region/RegionHelper');
    $RegionHelper = new RegionHelper();

    //获取用户信息
    $UserInfo = $this->UserConfig['Id'];
    if(empty($this->Param['option'])){
        $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

        //产品类型
        $data['pro']=$VisaHelper->GetProSort('all');
        //签证类型
        $data['visa'] = $VisaHelper->GetVisaSort('all');

        if($id > 0){
            $data['list'] = $VisaHelper->getRow(array('`visa_id` = ?' => $id,'`is_delete` = ? ' => 0));
            $data['list']['imgurl'] = unserialize($data['list']['visa_imgurl']);
        }

        $this->Assign('id',$id);
        $this->Assign('data', $data);
        echo $this->GetView('visa_add.php');
    }else{
        switch($this->Param['option']){
            case 'submit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'] ;
                if($UserInfo == 0){
                    ErrorMsg::Debug('登陆失效，请重新登陆');
                }
                empty($this->Param['visa_title']) ? ErrorMsg::Debug('请填写签证名称') : $this->Param['visa_title'];
                empty($this->Param['visa_type']) ? ErrorMsg::Debug('请填写签证类型') : $this->Param['visa_type'];
                empty($this->Param['pro_type']) ? ErrorMsg::Debug('请填写产品类型') : $this->Param['pro_type'];
                empty($this->Param['visa_price']) ? ErrorMsg::Debug('请填写签证价格') : $this->Param['visa_price'];
                empty($this->Param['visa_area']) ? ErrorMsg::Debug('请填写签证领区') : $this->Param['visa_area'];
                empty($this->Param['visa_city']) ? ErrorMsg::Debug('请填写服务城市') : $this->Param['visa_city'];
                $data['regional'] = empty($this->Param['regional']) ? ErrorMsg::Debug('请选择所属洲') : $this->Param['regional'];
                $data['countries'] = empty($this->Param['countries']) ? ErrorMsg::Debug('请选择所属国家') : $this->Param['countries'];
                $data['city'] = $this->Param['city'];

                $data['member_id'] =  $UserInfo;
                $data['visa_cover'] = $this->Param['cover'];

                $imgurl2 = $this->Param['imgurl2'];
                $imgurl3 = $this->Param['imgurl3'];
                $imgurl4 = $this->Param['imgurl4'];
                $data['visa_imgurl'] = serialize(array($imgurl2, $imgurl3, $imgurl4));

                $data['visa_title'] = $this->Param['visa_title'];
                $data['visa_probability'] = $this->Param['visa_probability'];
                $data['pro_type'] = $this->Param['pro_type'];
                $data['visa_type'] = $this->Param['visa_type'];
                $data['visa_app_id'] = $this->Param['visa_app_id'];
                $data['visa_qq'] = $this->Param['visa_qq'];
                $data['visa_price'] = $this->Param['visa_price'];
                $data['visa_area'] = $this->Param['visa_area'];
                $data['visa_msg'] = $this->Param['visa_msg'];
                $data['visa_city'] = $this->Param['visa_city'];
                $data['class_name'] = $this->Param['class_name'];
                $data['visa_time'] = NOW_TIME;
                $titleArr = explode('-',$this->Param['visa_title']);
                $data['visa_countries'] = $titleArr[1];
                $data['visa_year'] = date('Y',NOW_TIME);

                if($id > 0){
                    $row = $VisaHelper->Update($data,array('`visa_id` = ?' => $id));

                    if($row){
                        ErrorMsg::Debug('修改成功',TRUE);
                    }
                }else{
                    $row = $VisaHelper->save($data);
                    if($row){
                        ErrorMsg::Debug('修改成功',TRUE);
                    }
                }
                ErrorMsg::Debug('修改失败');
                break;
            case 'uploadImg':
                $this->LoadHelper('upload/EditorUploadHelper');
                $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
                $EditorUploadHelper->ImageUpload($this->Param['filebox'],'visa');

                break;
            default :
        }
    }