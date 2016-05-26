<?php

class LogisticsModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'logistics';
        $this->_field = array('log_id', 'member_id', 'log_cover', 'log_imgurl', 'log_title','log_location', 'log_countries', 'log_year', 'log_unit', 'log_freight', 'log_price', 'log_remarks', 'log_app_id', 'log_qq', 'log_msg', 'log_time', 'focus_number', 'rating_number', 'is_delete','is_online','is_index','txt_year','txt_month','log_city','class_name','start_time','end_titme');
        $this->_orderField = array('id','order_sn','log_id','member_id','saler_id','mode','price','freight','money','num','log_detail','receiving','address_id','remarks','datetime','is_delete');
		$this->_typeField = array('visa_id','parent_id','visa_name','is_open','datetime','is_delete','sort_order');
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
    public function orderLogisticsOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_order', $where, 'COUNT(1)', $output);
    }

    public function orderLogisticsRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_order', $this->_orderField, $where, $group, $order, $output);
    }

    public function orderLogisticsAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_order', $this->_orderField, $where, $limit, $group, $order, $output);
    }

    public function orderLogisticsSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_order', $data, $returnid, $output);
    }

    public function orderLogisticsUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_order', $data, $where, $output);
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