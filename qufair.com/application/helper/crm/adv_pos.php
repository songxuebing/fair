<?php

$this->LoadHelper('adv/AdvHelper');
$AdvHelper = new AdvHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);
    $data = $AdvHelper->posPageList($where,$limit,$page,$this->Param);
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('adv_pos.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data = $AdvHelper->posRow($id);
            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('adv_pos_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['name'] = empty($this->Param['name']) ? ErrorMsg::Debug('请输入广告位名称') : $this->Param['name'];
            $data['width'] = empty($this->Param['width']) ? ErrorMsg::Debug('请输入广告位宽度') : $this->Param['width'];
            if(!is_numeric($data['width'])){
                ErrorMsg::Debug('广告位宽度只能为数值型');
            }
            $data['height'] = empty($this->Param['height']) ? ErrorMsg::Debug('请输入广告位高度') : $this->Param['height'];
            if(!is_numeric($data['height'])){
                ErrorMsg::Debug('广告位高度只能为数值型');
            }
            $data['desc'] = $this->Param['desc'];            
            $AdvHelper->posSave($data,$id);
            ErrorMsg::Debug('保存成功', TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
         
            $AdvHelper->posRemove($id);
            ErrorMsg::Debug('删除成功', TRUE);
            break;
        default :
    }
}