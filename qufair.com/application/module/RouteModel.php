<?php

class RouteModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'route';
        $this->_field = array('id', 'con_id', 'cover', 'image', 'name', 'leave_time', 'end_time', 'leave_area', 'pavilion', 'appid', 'qq', 'price', 'hotel_star', 'description', 'member_id', 'dateline', 'is_sale', 'leave_year','route_city');
        $this->_orderField = array('id', 'order_sn', 'goods_name', 'goods_detail', 'route_id', 'member_id', 'address_id', 'receiving', 'nums', 'price', 'money', 'remarks', 'dateline');
		
		$this->_typeField = array('visa_id','parent_id','visa_name','is_open','datetime','is_delete','sort_order');
        $this->_field_new = array('id','title','title_describe','cover','introduce','image','regional','countries','city','price','departure','price_explain','visa_explain','reserve_notice','update_time');
        $this->_field_new_detail = array('id','route_id','package','title','introduce','update_time');
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

    //新的

    public function routenewOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table.'_new' , $where, 'COUNT(1)', $output);
    }
    public function routenewAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table.'_new' , $this->_field_new, $where, $limit, $group, $order, $output);
    }

    public function routenewRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table.'_new' , $this->_field_new, $where, $group, $order, $output);
    }

    public function routenewdetailAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table.'_new_detail' , $this->_field_new_detail, $where, $limit, $group, $order, $output);
    }

    public function routeUpdate($data,$where,$output=false){
        return $this->Db->update($this->_table.'_new',$data,$where,$output);
    }
}