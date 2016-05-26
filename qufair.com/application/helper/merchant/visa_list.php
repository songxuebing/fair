<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('visa/VisaHelper');
    $VisaHelper = new VisaHelper();

    //获取用户信息
    if(empty($this->Param['option'])){
        $limit = 10;

        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where = array();

        if(!empty($this->Param['online'])){
            $where = array('`member_id` = ? ' => $this->UserConfig['Id'],'`is_delete` = ?' => 0,'`is_online` = ?' => 1);
            $online = 1;
        }else{
            $where = array('`member_id` = ? ' => $this->UserConfig['Id'],'`is_delete` = ?' => 0,'`is_online` = ?' => 0);
            $online = 0;
        }

        $data = $VisaHelper->GetAllWhere($where, $limit, $page, $this->Param);
        if(!empty($data['All'])) foreach($data['All'] as $key => $val){
            //产品类型
            $proType = $VisaHelper->getProRow(array('`pro_id` = ?' => $val['pro_type']));
            $data['All'][$key]['pro_type'] = $proType['type_name'];
            //签证类型
            $visaType = $VisaHelper->getVisaRow(array('`visa_id` = ?' => $val['visa_type']));
            $data['All'][$key]['visa_type'] = $visaType['visa_name'];
        }

        $this->Assign('online', $online);
        $this->Assign('data', $data);
        $this->Assign('param', $this->Param);
        echo $this->GetView('visa_list.php');

    }else{
        switch($this->Param['option']){
            case 'submit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'] ;
                if($UserInfo['Id'] == 0){
                    ErrorMsg::Debug('登陆失效，请重新登陆');
                }
                empty($this->Param['visa_title']) ? ErrorMsg::Debug('请填写签证名称') : $this->Param['visa_title'];
                empty($this->Param['visa_type']) ? ErrorMsg::Debug('请填写签证类型') : $this->Param['visa_type'];
                empty($this->Param['pro_type']) ? ErrorMsg::Debug('请填写产品类型') : $this->Param['pro_type'];
                empty($this->Param['visa_price']) ? ErrorMsg::Debug('请填写签证价格') : $this->Param['visa_price'];
                empty($this->Param['visa_area']) ? ErrorMsg::Debug('请填写签证领区') : $this->Param['visa_area'];


                $data['member_id'] =  $this->UserConfig['Id'];
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
                $data['visa_time'] = NOW_TIME;
                $titleArr = explode($this->Param['visa_title'],'-');
                $data['visa_countries'] = $titleArr[0];
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
            case 'remove':
                $detailId = empty($this->Param['detailId']) ? 0 : $this->Param['detailId'];
                $visaRow = $VisaHelper->Update(array('is_delete' => 1),array('`visa_id` = ?' => $detailId));
                if($visaRow){
                    ErrorMsg::Debug('删除成功',TRUE);
                }

                ErrorMsg::Debug('删除失败');
                break;
            case 'shelves':
                $detailId = empty($this->Param['detailId']) ? 0 : $this->Param['detailId'];
                $getRow = $VisaHelper->getRow(array('`visa_id` = ?' => $detailId));
                $data['is_online'] = $getRow['is_online'] == 1 ? 0 : 1;
                $detailR = $VisaHelper->Update($data,array('`visa_id` = ?' => $detailId));
                if($detailR){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
                break;
            default :
        }
    }