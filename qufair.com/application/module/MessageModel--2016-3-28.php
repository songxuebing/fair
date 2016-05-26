<?php

class MessageModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'message';
        $this->_field = array('id', 'title', 'content', 'from', 'to', 'dateline', 'is_read');
    }
    
    public function messageOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function messageRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table , $this->_field, $where, $group, $order, $output);
    }

    public function messageAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
    

}