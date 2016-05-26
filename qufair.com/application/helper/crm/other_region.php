<?php
$delta = array("欧洲","亚洲","中东","东欧","北美","南美","中北美","非洲","大洋洲","中国");
$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`parent_id` = ?' => 0);
    
    $data = $RegionHelper->regionPageList($where,$limit,$page,$this->Param); 
    if(!empty($data['All'])){
        foreach($data['All'] as $k=>$v){
            $next = $RegionHelper->regionAll(array(
                '`parent_id` = ?' => $v['id']
            ));
            $data['All'][$k]['next'] = $next;
        }
    }
    $this->Assign('data', $data);
    $this->Assign('delta',$delta);
    
    $this->Assign('param', $this->Param);
    echo $this->GetView('region_index.php');
} else {
    switch ($this->Param['option']){
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);
            $data = $RegionHelper->regionRow($id);
            //所有一级分类
            $one_level = $RegionHelper->regionAll(array(
                '`parent_id` = ?' => 0
            ));
            if(!empty($one_level)) foreach($one_level as $k=>$v){
                $one_level[$k]['name'] = StringCode::getfirstchar($v['name']) .'-'. $v['name'];
            }
            $this->Assign('data',$data);
            $this->Assign('delta',$delta);
            $this->Assign('parent',$one_level);
            echo $this->GetView('region_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['name'] = empty($this->Param['name']) ? ErrorMsg::Debug('请输入名称') : $this->Param['name'];
            $data['parent_id'] = !is_numeric($this->Param['parent_id']) ? ErrorMsg::Debug('请选择所属区域') : $this->Param['parent_id'];
            $data['delta'] = $this->Param['parent_id'] > 0 ? '' : $this->Param['delta'];
            if($id > 0){
                $RegionHelper->regionSave($data,$id);
            }else{
                $RegionHelper->regionSave($data);
            }
            ErrorMsg::Debug('保存成功',TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $next_count = $RegionHelper->regionOne(array(
                '`parent_id` = ?' => $id
            ));
            if($next_count > 0){
                ErrorMsg::Debug('当前分类有子分类。');
            }
            $RegionHelper->regionRemove($id);
            ErrorMsg::Debug('删除成功',TRUE);
            break;
    }
}