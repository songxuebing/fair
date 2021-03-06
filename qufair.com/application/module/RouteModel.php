<?php

class RouteModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'route';
        $this->_field = array('id', 'con_id', 'cover', 'image', 'name', 'leave_time', 'end_time', 'leave_area', 'pavilion', 'appid', 'qq', 'price', 'hotel_star', 'description', 'member_id', 'dateline', 'is_sale', 'leave_year','route_city');
        $this->_orderField = array('id', 'order_sn', 'goods_name', 'goods_detail', 'route_id', 'member_id', 'address_id', 'receiving', 'nums', 'price', 'money', 'remarks', 'dateline');
		
		$this->_typeField = array('visa_id','parent_id','visa_name','is_open','datetime','is_delete','sort_order');
    }
    
    public function routeOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function routeRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table , $this->_field, $where, $group, $order, $output);
    }

    public function routeAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
    
    public function orderOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_order', $where, 'COUNT(1)', $output);
    }
    
    public function orderRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_order', $this->_orderField, $where, $group, $order, $output);
    }

    public function orderAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_order', $this->_orderField, $where, $limit, $group, $order, $output);
    }

    public function orderSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_order', $data, $returnid, $output);
    }

    public function orderUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_order', $data, $where, $output);
    }

    public function GetGroupAll($field, $where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $field, $where, $limit, $group, $order, $output);
    }
	
	//类型
    public function GetVisaRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table.'_type', $this->_typeField, $where, $group, $order, $output);
    }

    public function GetVisaOne($where,$output=false){
        return $this->Db->FetchOne($this->_table.'_type',$where,'COUNT(1)',$output);
    }

    public function GetVisaAll($where,$limit=null,$group=null,$order=null,$output=false){
        return $this->Db->FetchAll($this->_table.'_type',$this->_typeField,$where,$limit,$group,$order,$output);
    }

    public function VisaSave($data,$returnid=TRUE,$output=false){
        return $this->Db->insert($this->_table.'_type',$data,$returnid,$output);
    }
    public function VisaUpdate($data,$where,$output=false){
        return $this->Db->update($this->_table.'_type',$data,$where,$output);
    }
    public function VisaDelete($where,$output=false){
        return $this->Db->delete($this->_table.'_type',$where,$output);
    }

    public function GetGroupTypeAll($field, $where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table.'_type', $field, $where, $limit, $group, $order, $output);
    }
    
}