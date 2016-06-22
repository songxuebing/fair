<?php

class RegionModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'region';
        $this->_field = array('id', 'name', 'name_en', 'parent_id', 'delta');
        $this->_field_visa = array('id', 'name', 'name_en', 'url', 'file', 'parent_id', 'delta');
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

    public function visaOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table.'_visa' , $where, 'COUNT(1)', $output);
    }

    public function visaRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table.'_visa' , $this->_field_visa, $where, $group, $order, $output);
    }

    public function visaAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table.'_visa' , $this->_field_visa, $where, $limit, $group, $order, $output);
    }
    public function visaSave($data,$returnid=false,$output=false){
    //$this->Db->replace($this->_table,$data,$returnid,$output);
    return $this->Db->insert($this->_table.'_visa',$data,$returnid,$output);
}
    public function visaUpdate($data,$where,$output=false){
        return $this->Db->update($this->_table.'_visa',$data,$where,$output);
    }
    public function visaDelete($where,$output=false){
        return $this->Db->delete($this->_table.'_visa',$where,$output);
    }


}