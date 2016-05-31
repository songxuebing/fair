<?php

class IndustryModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'industry';
        $this->_field = array('id', 'name', 'parent_id', 'name_en', 'title', 'keywords', 'description');
    }
    
    public function industryOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function industryRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table , $this->_field, $where, $group, $order, $output);
    }

    public function industryAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
    

    
}