<?php

$this->LoadHelper('industry/IndustryHelper');
$IndustryHelper = new IndustryHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`parent_id` = ?' => 0);
    
    $data = $IndustryHelper->industryPageList($where,$limit,$page,$this->Param); 
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $next = $IndustryHelper->industryAll(array(
            '`parent_id` = ?' => $v['id']
        ));
        $data['All'][$k]['next'] = $next;
        if(!empty($data['All'][$k]['next'])) foreach($data['All'][$k]['next'] as $kk=>$v2) {
            $next2 = $IndustryHelper->industryAll(array(
                '`parent_id` = ?' => $v2['id']
            ));
            $data['All'][$k]['next'][$kk]['next2'] = $next2;
        }
    }
    //var_dump($data);exit();
    $this->Assign('data', $data);

    $this->Assign('param', $this->Param);
    echo $this->GetView('industry_index.php');
} else {
    switch ($this->Param['option']){
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);
            $data = $IndustryHelper->industryRow($id);
            //所有一级分类
            $one_level = $IndustryHelper->industryAll(array(
                '`parent_id` = ?' => 0
            ));
            //所有一级跟二级分类

            if(!empty($one_level)) foreach($one_level as $k=>$v){
                $one_level[$k]['name'] = StringCode::getfirstchar($v['name']) .'-'. $v['name'];
                $one_level[$k]['next'] = $IndustryHelper->industryAll(array(
                    '`parent_id` = ?' => $v['id']
                ));
            }

            $this->Assign('data',$data);
            $this->Assign('parent',$one_level);
            echo $this->GetView('industry_edit.php');
            break;
        case 'adv':
            //var_dump($this->Param);
            $one_level = $IndustryHelper->industryAll(array(
                '`parent_id` = ?' => 0
            ));
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();
            $where = array('`id` > ?' => 0);
            $data = $IndustryHelper->advPageList($where,$limit,$page,$this->Param);

            //var_dump($data);exit();
            if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
                $pos_row = $IndustryHelper->industryRow($v['industry_id']);
                $data['All'][$k]['industry_name'] = $pos_row['name'];
            }

            $this->Assign('data', $data);
            //输出所有广告位置
            $pos = $IndustryHelper->industryAll(array(
                '`id` > ?' => 0
            ));

            $this->Assign('industry',$one_level);
            $this->Assign('pos',$pos);
            $this->Assign('param', $this->Param);
            echo $this->GetView('adv_index.php');
            break;

        case 'add_adv':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);

            $data = $IndustryHelper->advRow($id);
            //var_dump($data);
            //所有一级分类
            $one_level = $IndustryHelper->industryAll(array(
                '`parent_id` = ?' => 0
            ));

            $this->Assign('data',$data);
            $this->Assign('industry',$one_level);
            echo $this->GetView('adv_add.php');
            break;
        case 'submit_adv':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入广告名称') : $this->Param['title'];
            $data['industry_id'] = empty($this->Param['pos_id']) ? ErrorMsg::Debug('请选择广告位置') : $this->Param['pos_id'];
            $data['media_type'] = 'image';
            $data['start_time'] = empty($this->Param['start_time']) ? ErrorMsg::Debug('请输入广告开始时间') : strtotime($this->Param['start_time']);
            $data['end_time'] = empty($this->Param['end_time']) ? ErrorMsg::Debug('请输入广告结束时间') : strtotime($this->Param['end_time']);
            $data['url'] = $this->Param['url'];
            $data['file'] = empty($this->Param['file']) ? ErrorMsg::Debug('请输入广告地址') : $this->Param['file'];
            if($id == 0){
                $data['dateline'] = NOW_TIME;
            }
            //var_dump($data);exit();
            $IndustryHelper->advSave($data,$id);
            ErrorMsg::Debug('保存成功', TRUE);
            break;
        case 'remove_adv':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $IndustryHelper->advRemove($id);
            ErrorMsg::Debug('删除成功', TRUE);
            break;

        case 'uploadimg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'],'adv');
            break;

        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['name'] = empty($this->Param['name']) ? ErrorMsg::Debug('请输入名称') : $this->Param['name'];
            $data['name_en'] = empty($this->Param['name_en']) ? ErrorMsg::Debug('请输入英文名称') : $this->Param['name_en'];
            $data['title'] = $this->Param['title'];
            $data['keywords'] = $this->Param['keywords'];
            $data['description'] = $this->Param['description'];
            $data['parent_id'] = !is_numeric($this->Param['parent_id']) ? ErrorMsg::Debug('请选择所属分类') : $this->Param['parent_id'];
            if($id > 0){
                $IndustryHelper->industrySave($data,$id);
            }else{
                $IndustryHelper->industrySave($data);
            }
            ErrorMsg::Debug('保存成功',TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $next_count = $IndustryHelper->industryOne(array(
                '`parent_id` = ?' => $id
            ));
            if($next_count > 0){
                ErrorMsg::Debug('当前分类有子分类。');
            }
            $IndustryHelper->industryRemove($id);
            ErrorMsg::Debug('删除成功',TRUE);
            break;
    }
}