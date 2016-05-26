<?php

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`is_open` = ?' => 1,'`is_delete` = ?' => 0);
    
    $data = $ForumHelper->cTagPageList($where,$limit,$page,$this->Param);

    $this->Assign('data', $data);
    
    $this->Assign('param', $this->Param);
    echo $this->GetView('forum_tag.php');
} else {
    switch ($this->Param['option']){
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);

            $data = $ForumHelper->cTagRow(array(
                '`ctag_id` = ?' => $id
            ));

            $this->Assign('data',$data);
            echo $this->GetView('forum_tag_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['ctag_name'] = empty($this->Param['name']) ? ErrorMsg::Debug('请输入名称') : $this->Param['name'];
            $data['sort'] = $this->Param['sort'];
            $data['is_open'] = $this->Param['RadioGroup'];

            if($id > 0){
                $ForumHelper->cTagSave($data,$id);
            }else{
                $ForumHelper->cTagSave($data);
            }
            ErrorMsg::Debug('保存成功',TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data['is_delete'] = 1;
            $ForumHelper->cTagSave($data,$id);

            ErrorMsg::Debug('删除成功',TRUE);
            break;
        default :
    }
}