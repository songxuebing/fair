<?php

class AdvModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'adv';
        $this->_advField = array('id', 'title', 'pos_id', 'media_type', 'start_time', 'end_time', 'url', 'file', 'code');
        $this->_posField = array('id', 'name', 'width', 'height', 'desc');
    }
    
    public function advOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function advRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table , $this->_advField, $where, $group, $order, $output);
    }

    public function advAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_advField, $where, $limit, $group, $order, $output);
    }
    
    
    public function posOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_pos', $where, 'COUNT(1)', $output);
    }
    
    public function posRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_pos', $this->_posField, $where, $group, $order, $output);
    }

    public function posAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_pos', $this->_posField, $where, $limit, $group, $order, $output);
    }

    public function posSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_pos', $data, $returnid, $output);
    }

    public function posUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_pos', $data, $where, $output);
    }

    public function posDelete($where, $output = false) {
        return $this->Db->delete($this->_table . '_pos', $where, $output);
    }

}