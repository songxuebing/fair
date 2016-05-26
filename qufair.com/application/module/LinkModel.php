<?php

class LinkModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'link';
        $this->_field = array('id', 'title', 'category', 'url', 'remarks', 'type', 'dateline');
    }
    
    public function linkOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function linkRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table , $this->_field, $where, $group, $order, $output);
    }

    public function linkAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
    

}
