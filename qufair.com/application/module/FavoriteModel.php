<?php

class FavoriteModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'favorite';
        $this->_field = array('id', 'member_id', 'sort', 'related_id', 'dateline');
    }

    //评价
    public function getOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    public function getAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
    public function getRow($where, $group = null, $order = null, $output = false){
        return $this->Db->FetchRow($this->_table, $this->_field, $where, $group, $order, $output);
    }
    public function favDelete($where,$output=false){
        return $this->Db->delete($this->_table, $where, $output);
    }
	
	public function queryAll($sql){
        return $this->Db->FetchQuery($sql);
    }

}