<?php

class IndustryModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'industry';
        $this->_field = array('id', 'name', 'parent_id', 'name_en', 'title', 'keywords', 'description');
        $this->_table_adv = 'industry_adv';
        $this->_field_adv = array('id', 'title', 'industry_id', 'media_type', 'start_time', 'end_time', 'url', 'file', 'code');;

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

    public function add_adv($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_adv', $data, $returnid, $output);
    }

    public function advOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_adv', $where, 'COUNT(1)', $output);
    }

    public function advAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_adv', $this->_field_adv, $where, $limit, $group, $order, $output);
    }

    public function advRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_adv' , $this->_field_adv, $where, $group, $order, $output);
    }

    public function advDelete($where, $output = false) {
        return $this->Db->delete($this->_table . '_adv', $where, $output);
    }
}