<?php

class OrderModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'order';
        $this->_field = array('order_id', 'order_sn', 'member_id', 'seller_id', 'price', 'is_type', 'is_pay', 'addtime', 'order_state', 'show_price','advance','is_quzhan');
        $this->_reField = array('id','member_id','order_sn','order_id','cover','user_com','user_bank','bank_name','money','remarks','datetime');
    }

    public function GetOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table, $where, 'COUNT(1)', $output);
    }
    
    public function sumOne($where,$fields){
        return $this->Db->FetchOne($this->_table, $where, $fields, $output);
    }

    public function GetRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table, $this->_field, $where, $group, $order, $output);
    }

    public function Save($data, $returnid = false, $output = false) {
        return $this->Db->insert($this->_table, $data, $returnid, $output);
    }

    public function GetAll($where, $limit = null, $group = null, $order = null, $output = false,$fields = '') {
        if(empty($fields)){
            $fields = $this->_field;
        }
        return $this->Db->FetchAll($this->_table, $fields, $where, $limit, $group, $order, $output);
    }

    public function GetGroupAll($field, $where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $field, $where, $limit, $group, $order, $output);
    }

    public function delOne($where) {
        return $this->Db->delete($this->_table, $where);
    }

    //回执单

    public function GetReRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table.'_receipts', $this->_reField, $where, $group, $order, $output);
    }

    public function reSave($data, $returnid = false, $output = false) {
        return $this->Db->insert($this->_table.'_receipts', $data, $returnid, $output);
    }

    public function reUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table.'_receipts', $data, $where, $output);
    }

}