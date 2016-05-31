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
    }
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
            if(!empty($one_level)) foreach($one_level as $k=>$v){
                $one_level[$k]['name'] = StringCode::getfirstchar($v['name']) .'-'. $v['name'];
            }
            $this->Assign('data',$data);
            $this->Assign('parent',$one_level);
            echo $this->GetView('industry_edit.php');
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