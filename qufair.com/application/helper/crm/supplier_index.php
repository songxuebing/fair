<?php

$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

if (empty($this->Param['option'])) {
    $limit = 10;

    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`type_id` > ?' => 0);
    $data = $SupplierHelper->typeAll($where);
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('supplier_index.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data = $SupplierHelper->typeRow($id);
            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('supplier_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data['type_name'] = empty($this->Param['type_name']) ? ErrorMsg::Debug('请输入类型名称') : $this->Param['type_name'];
            $data['is_open'] = !is_numeric($this->Param['is_open']) ? ErrorMsg::Debug('请选择是否开启') : $this->Param['is_open'];
            $data['type_msg'] = $this->Param['type_msg'];
            $data['cost'] = !is_numeric($this->Param['cost']) ? ErrorMsg::Debug('认证费错误') : $this->Param['cost'];
            
            $SupplierHelper->typeSave($data, $id);
            ErrorMsg::Debug('保存成功', TRUE);
            break;
        default :
    }
}