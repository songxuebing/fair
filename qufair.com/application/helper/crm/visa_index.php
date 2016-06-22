<?php

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();
if (empty($this->Param['option'])) {
    $limit = 10;

    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
    $where = array();
    $where = array('`is_delete` = ?' => 0);
    switch($list){
        case 'all':
            break;
        case 'onsale':
            $where['`is_online` = ?'] = 0;
            break;
        case 'nosale':
            $where['`is_online` = ?'] = 1;
            break;
    }

    if (!empty($this->Param['key'])) {
        $where['locate(?,`visa_title`)>0'] = $this->Param['key'];
    }
	
	if(!empty($this->Param['st'])){
		$where['`visa_time` >= ?'] = strtotime($this->Param['st']); 	
	}
	
	if(!empty($this->Param['et'])){
		$where['`visa_time` < ?'] = strtotime($this->Param['et']); 	
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

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('visa_index.php');

} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data = $VisaHelper->GetId($id);

            if (!empty($data['imgurl'])) {
                $data['imgurl'] = unserialize($data['imgurl']);
            }

            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('convention_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data['name'] = $this->Param['name'];
            $data['regional'] = $this->Param['regional'];
            $data['industry'] = $this->Param['industry'];
            $data['countries'] = $this->Param['countries'];
            $data['city'] = $this->Param['city'];
            $data['cycle'] = $this->Param['cycle'];
            $data['first_held'] = $this->Param['first_held'];
            $data['pavilion'] = $this->Param['pavilion'];
            $data['area'] = $this->Param['area'];
            $data['exhibitors_number'] = $this->Param['exhibitors_number'];
            $data['audience_size'] = $this->Param['audience_size'];
            $data['label'] = $this->Param['label'];
            $data['organizer'] = $this->Param['organizer'];
            $data['undertake'] = $this->Param['undertake'];
            $data['scope'] = $this->Param['scope'];
            $data['review'] = $this->Param['review'];
            $data['describe'] = $this->Param['describe'];

            $data['update_dateline'] = time();
            $data['cover'] = $this->Param['cover'];

            $imgurl2 = $this->Param['imgurl2'];
            $imgurl3 = $this->Param['imgurl3'];
            $imgurl4 = $this->Param['imgurl4'];

            $data['imgurl'] = serialize(array($imgurl2, $imgurl3, $imgurl4));

            if ($id > 0) {
                $VisaHelper->Update($data, array('`id` = ?' => $id));
                //Cache::deldir();
                ErrorMsg::Debug('保存成功', TRUE);
            }

            ErrorMsg::Debug('保存失败');
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $VisaHelper->Delete(array('`id` = ?' => $id));

            ErrorMsg::Debug('删除成功', TRUE);
            break;
        case 'uploadImg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox']);

            break;
        case 'removeall':
            $allid = empty($this->Param['checkbox']) ? 0 : $this->Param['checkbox'];
            if(empty($allid)){
                ErrorMsg::Debug('请选择要删除的选项');
            }
            foreach ($allid as $v) {
                $VisaHelper->Delete(array('`id` = ?' => $v));
            }

            ErrorMsg::Debug('删除成功', TRUE);
            break;
        case 'saleopt':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $visa_row = $VisaHelper->getRow(array(
                '`visa_id` = ?' => $id
            ));

            if(empty($visa_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_online' => $visa_row['is_online'] == 0 ? 1 : 0
                );

                $do = $VisaHelper->Update($data,array(
                    '`visa_id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        case 'recommend':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $visa_row = $VisaHelper->getRow(array(
                '`visa_id` = ?' => $id
            ));

            if(empty($visa_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_index' => $visa_row['is_index'] == 1 ? 0 : 1
                );

                $do = $VisaHelper->Update($data,array(
                    '`visa_id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        case 'new_visa':
            //echo "12";exit();
            $limit = 10;

            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
            $where = array();
            $where = array('`is_delete` = ?' => 0);
            switch($list){
                case 'all':
                    break;
                case 'onsale':
                    $where['`is_online` = ?'] = 0;
                    break;
                case 'nosale':
                    $where['`is_online` = ?'] = 1;
                    break;
            }

            if (!empty($this->Param['key'])) {
                $where['locate(?,`visa_title`)>0'] = $this->Param['key'];
            }

            if(!empty($this->Param['st'])){
                $where['`visa_time` >= ?'] = strtotime($this->Param['st']);
            }

            if(!empty($this->Param['et'])){
                $where['`visa_time` < ?'] = strtotime($this->Param['et']);
            }

            $data = $VisaHelper->GetAllnewWhere($where, $limit, $page, $this->Param);
            //var_dump($data);exit();

            $this->Assign('data', $data);
            $this->Assign('param', $this->Param);
            echo $this->GetView('visa_new_index.php');
            break;
        case 'new_edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data = $VisaHelper->GetnewId($id);
            //var_dump($data);exit();


            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('visa_new_edit.php');
            break;

        case 'new_submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            //var_dump($this->Param);exit();
            $data['visa_title'] = $this->Param['title'];
            $data['visa_state'] = $this->Param['visa_state'];
            $data['visa_countries'] = $this->Param['visa_countries'];
            $data['visa_price'] = $this->Param['visa_price'];
            $data['visa_lasts'] = $this->Param['visa_lasts'];
            $data['visa_book'] = $this->Param['visa_book'];
            $data['visa_stay'] = $this->Param['visa_stay'];
            $data['visa_place'] = $this->Param['visa_place'];
            $data['visa_handle'] = $this->Param['visa_handle'];
            $data['visa_type'] = $this->Param['visa_type'];
            $data['visa_introduce'] = $this->Param['visa_introduce'];
            $data['price_introduce'] = $this->Param['price_introduce'];
            $data['visa_explain'] = $this->Param['visa_explain'];
            $data['visa_notice'] = $this->Param['visa_notice'];
            $data['visa_cover'] = $this->Param['file'];
            //var_dump($data);exit();

            if ($id > 0) {
                $VisaHelper->newUpdate($data, array('`visa_id` = ?' => $id));
                //Cache::deldir();
                ErrorMsg::Debug('保存成功', TRUE);
            }
            else{
                $VisaHelper->VisanewSave($data);
                //Cache::deldir();
                ErrorMsg::Debug('保存成功', TRUE);
            }

            ErrorMsg::Debug('保存失败');
            break;
        case 'uploadimg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'],'forum');
            break;
        default :
    }
}