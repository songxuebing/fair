<?php

class VisaModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'visa';
        $this->_field = array('visa_id', 'member_id', 'visa_cover', 'visa_imgurl', 'visa_title', 'visa_countries', 'visa_year', 'visa_probability', 'pro_type', 'visa_type', 'visa_app_id', 'visa_qq', 'visa_price', 'visa_area', 'visa_msg', 'visa_time', 'focus_number', 'rating_number', 'is_delete','is_online','is_index','txt_year','txt_month','visa_city','regional','countries','city');
        $this->_proField = array('pro_id','parent_id','type_name','is_open','datetime','is_delete','sort_order');
        $this->_typeField = array('visa_id','parent_id','visa_name','is_open','datetime','is_delete','sort_order');
        $this->_orderField = array('id','order_sn','visa_id','member_id','saler_id','visa_cover','visa_name','pro_type','visa_type','visa_price','money','num','visa_area','receiving','address_id','remarks','datetime','is_delete');
        $this->_memberField = array('id','order_id','username','tel','cert_type','cert_msg','datetime','is_delete');

        $this->_field_new = array('visa_id', 'visa_cover', 'visa_title', 'visa_state', 'visa_countries', 'visa_price', 'visa_lasts', 'visa_book', 'visa_stay', 'visa_place', 'visa_handle','visa_type','visa_introduce','price_introduce','visa_explain','visa_notice','update_time','is_delete','is_online','is_index');

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


    //签证产品类型
    public function GetProRow($where,$group=null,$order=null,$output=false){
        return $this->Db->FetchRow($this->_table.'_pro_type',$this->_proField,$where,$group,$order,$output);
    }

    public function GetProOne($where,$output=false){
        return $this->Db->FetchOne($this->_table.'_pro_type',$where,'COUNT(1)',$output);
    }

    public function GetProAll($where,$limit=null,$group=null,$order=null,$output=false){
        return $this->Db->FetchAll($this->_table.'_pro_type',$this->_proField,$where,$limit,$group,$order,$output);
    }

    public function ProSave($data,$returnid=TRUE,$output=false){
        return $this->Db->insert($this->_table.'_pro_type',$data,$returnid,$output);
    }
    public function ProUpdate($data,$where,$output=false){
        return $this->Db->update($this->_table.'_pro_type',$data,$where,$output);
    }
    public function ProDelete($where,$output=false){
        return $this->Db->delete($this->_table.'_pro_type',$where,$output);
    }



    //签证类型
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


    //订单
    public function orderVisaOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_order', $where, 'COUNT(1)', $output);
    }

    public function orderVisaRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_order', $this->_orderField, $where, $group, $order, $output);
    }

    public function orderVisaAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_order', $this->_orderField, $where, $limit, $group, $order, $output);
    }

    public function orderVisaSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_order', $data, $returnid, $output);
    }

    public function orderVisaUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_order', $data, $where, $output);
    }

    //签证人信息
    public function visaMemberSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_order_member', $data, $returnid, $output);
    }

    public function visaMemberRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_order_member', $this->_memberField, $where, $group, $order, $output);
    }

    public function visaMemberAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_order_member', $this->_memberField, $where, $limit, $group, $order, $output);
    }




    //签证新的2016-06-22
    public function GetnewOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table.'_new', $where, 'COUNT(1)', $output);
    }

    public function GetnewRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table.'_new', $this->_field_new, $where, $group, $order, $output);
    }


    public function GetnewAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table.'_new', $this->_field_new, $where, $limit, $group, $order, $output);
    }
    public function newUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table.'_new', $data, $where, $output);
    }

    public function VisanewSave($data,$returnid=TRUE,$output=false){
        return $this->Db->insert($this->_table.'_new',$data,$returnid,$output);
    }

    //新的
    public function ordernewVisaSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_order_new', $data, $returnid, $output);
    }
}