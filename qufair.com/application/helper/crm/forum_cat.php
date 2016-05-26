<?php

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`parent_id` = ?' => 0);
    
    $data = $ForumHelper->catPageList($where,$limit,$page,$this->Param); 
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $next = $ForumHelper->catAll(array(
            '`parent_id` = ?' => $v['id']
        ));
        $data['All'][$k]['next'] = $next;
    }
    $this->Assign('data', $data);
    
    $this->Assign('param', $this->Param);
    echo $this->GetView('forum_cat.php');
} else {
    switch ($this->Param['option']){
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);
            $data = $ForumHelper->catRow($id);
            //所有一级分类
            $one_level = $ForumHelper->catAll(array(
                '`parent_id` = ?' => 0
            ));
            if(!empty($one_level)) foreach($one_level as $k=>$v){
                $one_level[$k]['name'] = StringCode::getfirstchar($v['name']) .'-'. $v['name'];
            }
            $this->Assign('data',$data);
            $this->Assign('parent',$one_level);
            echo $this->GetView('forum_cat_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['name'] = empty($this->Param['name']) ? ErrorMsg::Debug('请输入名称') : $this->Param['name'];
            $data['parent_id'] = !is_numeric($this->Param['parent_id']) ? ErrorMsg::Debug('请选择所属分类') : $this->Param['parent_id'];
            $data['icon'] = $this->Param['file'];
            $data['is_hot'] = empty($this->Param['is_hot']) ? 0 : 1;
            if($id > 0){
                $ForumHelper->catSave($data,$id);
            }else{
                $ForumHelper->catSave($data);
            }
            ErrorMsg::Debug('保存成功',TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $next_row = $ForumHelper->catRow(array(
                '`parent_id` = ?' => $id
            ));
            if(!empty($next_row)){
                ErrorMsg::Debug('当前分类有子分类。');
            }
            $ForumHelper->catRemove($id);
            ErrorMsg::Debug('删除成功',TRUE);
            break;
        case 'uploadimg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'],'forumcat');
            break;
        default :
    }
}