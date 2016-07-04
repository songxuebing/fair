<?php

class DecorationModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'decoration';
        $this->_field = array('id', 'member_id', 'cover', 'imgurl', 'title','countries', 'year', 'proportion', 'style_type', 'de_city', 'de_industry', 'app_id', 'qq', 'de_price', 'msg', 'de_time', 'focus_number', 'rating_number', 'is_delete','is_online','is_index','txt_year','txt_month','start_time','end_titme','dec_area');
        $this->_orderField = array('id','order_sn','de_id','member_id','saler_id','de_title','de_style','price','money','num','detail','receiving','address_id','remarks','datetime','is_delete');
		
		$this->_typeField = array('visa_id','parent_id','visa_name','is_open','datetime','is_delete','sort_order');

        $this->_table_new = 'de';
        $this->_field_new = array('id', 'title', 'class', 'structure','area','open','style','tone','images');

    }

    public function GetOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table, $where, 'COUNT(1)', $output);
    }

    public function GetRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table, $this->_field, $where, $group, $order, $output);
    }

    public function Save($data, $returnid = false, $output = false) {
        return $this->Db->insert($this->_table, $data, $returnid, $output);
    }

    public function GetAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $this->_field, $where, $limit, $group, $order, $output);
    }

    public function GetGroupAll($field, $where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $field, $where, $limit, $group, $order, $output);
    }

    public function delOne($where) {
        return $this->Db->delete($this->_table, $where);
    }

    public function Update($data, $where, $output = false) {
        return $this->Db->update($this->_table, $data, $where, $output);
    }


    //订单
    public function orderDecorationOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_order', $where, 'COUNT(1)', $output);
    }

    public function orderDecorationRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_order', $this->_orderField, $where, $group, $order, $output);
    }

    public function orderDecorationAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_order', $this->_orderField, $where, $limit, $group, $order, $output);
    }

    public function orderDecorationSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_order', $data, $returnid, $output);
    }

    public function orderDecorationUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_order', $data, $where, $output);
    }

    //行业
    public function decorationIndustrySave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_industry', $data, $returnid, $output);
    }

    public function GetGroupIndustryAll($field, $where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table.'_industry', $field, $where, $limit, $group, $order, $output);
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


    //新的特装
    public function GetnewOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table_new, $where, 'COUNT(1)', $output);
    }

    public function GetnewRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table_new, $this->_field_new, $where, $group, $order, $output);
    }

    public function GetnewAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table_new, $this->_field_new, $where, $limit, $group, $order, $output);
    }

}