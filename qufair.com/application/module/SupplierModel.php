<?php

class SupplierModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'supplier';
        $this->_typeField = array('type_id', 'code', 'type_name', 'type_msg', 'type_icon', 'is_open', 'cost');
        $this->_certField = array('cert_id', 'type_id', 'type_code', 'member_id', 'company_name', 'company_owner', 'owner_cardno', 'owner_mobile', 'company_service' ,'company_tel', 'company_license', 'company_orgcode', 'company_regcert', 'company_address', 'operate_name', 'operate_position', 'operate_mobile', 'operate_tel', 'operate_email', 'operate_cardno', 'operater_cert', 'pay_status', 'audit_state', 'money_check', 'cert_state', 'is_open', 'dateline' ,'bank_comname' ,'bank_account' ,'bank_name' ,'bank_branch');
        $this->_logField = array('cert_id', 'member', 'audit_state', 'remarks', 'dateline');
        $this->_remittanceField = array('cert_id', 'member', 'money', 'remarks', 'dateline');
    }

    public function typeRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_type', $this->_typeField, $where, $group, $order, $output);
    }

    public function typeAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_type', $this->_typeField, $where, $limit, $group, $order, $output);
    }
    
    public function typeSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_type', $data, $returnid, $output);
    }

    public function typeUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_type', $data, $where, $output);
    }
    
    public function certOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_cert', $where, 'COUNT(1)', $output);
    }
    
    public function certRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_cert', $this->_certField, $where, $group, $order, $output);
    }

    public function certAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_cert', $this->_certField, $where, $limit, $group, $order, $output);
    }

    public function certSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_cert', $data, $returnid, $output);
    }

    public function certUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_cert', $data, $where, $output);
    }

    public function certDelete($where, $output = false) {
        return $this->Db->delete($this->_table . '_cert', $where, $output);
    }

    public function logRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_log', $this->_logField, $where, $group, $order, $output);
    }

    public function logAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_log', $this->_logField, $where, $limit, $group, $order, $output);
    }

    public function logSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_log', $data, $returnid, $output);
    }
    
    public function remittanceRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_remittance', $this->_remittanceField, $where, $group, $order, $output);
    }

    public function remittanceAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_remittance', $this->_remittanceField, $where, $limit, $group, $order, $output);
    }

    public function remittanceSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_remittance', $data, $returnid, $output);
    }
}