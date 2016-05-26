<?php
$this->LoadHelper('link/LinkHelper');
$LinkHelper = new LinkHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);
    
    $data = $LinkHelper->linkPageList($where,$limit,$page,$this->Param); 
    $this->Assign('data', $data);
    
    $this->Assign('param', $this->Param);
    echo $this->GetView('link_index.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data = $LinkHelper->linkRow($id);
            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('link_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入链接名称') : $this->Param['title'];
            $data['url'] = empty($this->Param['url']) ? ErrorMsg::Debug('请选择链接地址') : $this->Param['url'];
            $data['remarks'] = $this->Param['remarks'];
	    $data['type'] = $this->Param['type'];
            if($id == 0){
                $data['dateline'] = NOW_TIME;
            }
            $LinkHelper->linkSave($data,$id);
            ErrorMsg::Debug('保存成功', TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];         
            $LinkHelper->linkRemove($id);
            ErrorMsg::Debug('删除成功', TRUE);
            break;
        default :
    }
}
