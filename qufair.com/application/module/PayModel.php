<?php

class PayModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'pay';
        $this->_logField = array('id', 'payment', 'category', 'order_sn', 'order_id', 'amount', 'is_paid', 'remarks', 'dateline');
    }

    public function logOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_log', $where, 'COUNT(1)', $output);
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

    public function logUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_log', $data, $where, $output);
    }

}