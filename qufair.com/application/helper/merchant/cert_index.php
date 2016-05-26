<?php
$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();
$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();
if (empty($this->Param['option'])) {
    //读取所有的商户类型
    $where = array(
        '`is_open` = ?' => 1
    );
    
    $supplier_type = $SupplierHelper->typeAll($where);
    $member_cert = $SupplierHelper->checkCertAll($this->UserConfig['Id']);
    
    $this->Assign('member_cert',$member_cert);
    $this->Assign('data',$supplier_type);
    echo $this->GetView('cert_index.php');
    
} else {
    switch($this->Param['option']){
        case 'agreement':
            $id = empty($this->Param['id']) ? 1 : $this->Param['id'];
            $this->Assign('id',$id);
            echo $this->GetView('cert_agreement.php');
            break;
        default:
    }
}