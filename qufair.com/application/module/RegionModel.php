<?php

class RegionModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'region';
        $this->_field = array('id', 'name', 'name_en', 'parent_id', 'delta');
    }
    
    public function regionOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function regionRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table , $this->_field, $where, $group, $order, $output);
    }

    public function regionAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
    

    
}