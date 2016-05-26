<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('decoration/DecorationHelper');
    $DecorationHelper = new DecorationHelper();

    $this->LoadHelper('region/RegionHelper');
    $RegionHelper = new RegionHelper();

    //获取用户信息
    $UserInfo = $this->UserConfig['Id'];
    if(empty($this->Param['option'])){
        $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
        
        if($id > 0){
            $data['list'] = $DecorationHelper->getRow(array('`id` = ?' => $id,'`is_delete` = ? ' => 0));
            $data['list']['imgurl'] = unserialize($data['list']['log_imgurl']);
            $data['list']['style_img'] = unserialize($data['list']['style_type']);
        }
		
		//类型
        $data['visa'] = $DecorationHelper->GetVisaSort('all');
		
        $this->Assign('id',$id);
        $this->Assign('data', $data);
        echo $this->GetView('decoration_add.php');
    }else{
        switch($this->Param['option']){
            case 'submit':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'] ;
                if($UserInfo == 0){
                    ErrorMsg::Debug('登陆失效，请重新登陆');
                }
                $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请填写特装名称') : $this->Param['title'];
                $data['proportion'] = empty($this->Param['proportion']) ? ErrorMsg::Debug('请填写面积大小') : $this->Param['proportion'];
                $data['de_city'] = empty($this->Param['de_city']) ? ErrorMsg::Debug('请填写服务城市') : $this->Param['de_city'];
                $data['de_industry'] = empty($this->Param['de_industry']) ? ErrorMsg::Debug('请填写擅长行业') : $this->Param['de_industry'];
                $data['de_price'] = empty($this->Param['de_price']) ? ErrorMsg::Debug('请填写特装价格') : $this->Param['de_price'];
                $data['start_time'] = empty($this->Param['start_time']) ? ErrorMsg::Debug('请填写开始时间') : $this->Param['start_time'];
                $data['end_titme'] = empty($this->Param['end_titme']) ? ErrorMsg::Debug('请填写结束时间') : $this->Param['end_titme'];
                $data['dec_area'] = empty($this->Param['dec_area']) ? ErrorMsg::Debug('请填写展会规格') : $this->Param['dec_area'];
                $data['regional'] = empty($this->Param['regional']) ? ErrorMsg::Debug('请选择所属洲') : $this->Param['regional'];
                $data['countries'] = empty($this->Param['countries']) ? ErrorMsg::Debug('请选择所属国家') : $this->Param['countries'];
                $data['city'] = $this->Param['city'];

                $data['member_id'] =  $UserInfo;
                $data['cover'] = $this->Param['cover'];
                //图
                $imgurl2 = $this->Param['imgurl2'];
                $imgurl3 = $this->Param['imgurl3'];
                $imgurl4 = $this->Param['imgurl4'];
                $data['imgurl'] = serialize(array($imgurl2, $imgurl3, $imgurl4));
                //装修风格
                $styleFile1 = $this->Param['styleFile1'];
                $styleFile2 = $this->Param['styleFile2'];
                $styleFile3 = $this->Param['styleFile3'];
                $styleFile4 = $this->Param['styleFile4'];
                $styleFile5 = $this->Param['styleFile5'];
                $styleFile6 = $this->Param['styleFile6'];
                $data['style_type'] = serialize(array($styleFile1, $styleFile2, $styleFile3,$styleFile4,$styleFile5,$styleFile6));

                $data['app_id'] = $this->Param['app_id'];
                $data['qq'] = $this->Param['qq'];
                $data['msg'] = $this->Param['msg'];
                $data['class_name'] = $this->Param['class_name'];
                $data['de_time'] = NOW_TIME;
                if(!empty($this->Param['title'])){
                    $titleArr = explode('-',$this->Param['title']);
                    $data['countries'] = $titleArr[1];
                }

                $data['year'] = date('Y',NOW_TIME);//添加时间年份

                $startArr = explode("-",$this->Param['start_time']);
                $data['txt_year'] = $startArr[0];//特装开始的时间
                $data['txt_month'] = $startArr[1];

                //行业分割入库特装行业表
                $industryarr = explode('、',$this->Param['de_industry']);

                if(!empty($industryarr)){
                    if(count($industryarr) >= 2){
                        foreach($industryarr as $k => $v){
                            $dlist['title'] = $v;
                            $DecorationHelper->decorationIndustrySave($dlist);
                        }
                    }else{
                        $d['title'] = $this->Param['de_industry'];
                        $DecorationHelper->decorationIndustrySave($d);
                    }

                }

                if($id > 0){
                    $row = $DecorationHelper->Update($data,array('`id` = ?' => $id));

                    if($row){
                        ErrorMsg::Debug('修改成功',TRUE);
                    }
                }else{
                    $row = $DecorationHelper->save($data);
                    if($row){
                        ErrorMsg::Debug('修改成功',TRUE);
                    }
                }
                ErrorMsg::Debug('修改失败');
                break;
            case 'uploadImg':
                $this->LoadHelper('upload/EditorUploadHelper');
                $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
                $EditorUploadHelper->ImageUpload($this->Param['filebox'],'decoration');

                break;
            default :
        }
    }