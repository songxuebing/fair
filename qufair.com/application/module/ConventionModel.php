<?php

class ConventionModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'convention';
        $this->_field = array('id', 'name', 'regional', 'countries', 'city', 'industry', 'cycle', 'first_held', 'pavilion', 'address', 'area', 'exhibitors_number', 'audience_size', 'scope', 'label', 'organizer', 'undertake', 'describe', 'review', 'cover', 'imgurl', 'update_dateline', 'focus_number', 'rating_number');
        $this->_detailField = array('detail_id', 'con_id', 'member_id', 'start_time', 'end_titme', 'qq', 'app_id', 'description', 'add_time', 'is_online', 'rating_number', 'focus_number','is_delete','is_index');
        $this->_orderField = array('id','order_sn','con_id','member_id','saler_id','con_cover','con_name','detail','price','money','is_group','receiving','address_id','remarks','datetime','is_delete');
        $this->_areaField = array('area_id', 'detail_id', 'area_name', 'booth_no', 'booth_type', 'opening', 'booth_price', 'group_price', 'advance_payment', 'add_time', 'is_rent','con_area','con_standard');
        $this->_orderDetailField = array('id','order_id','order_sn','detail_id','area_id','con_name','pavilion','start_time','end_titme','booth_no','booth_type','opening','is_group','order_price');
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

    //展会信息
    public function addDetail($data, $returnid = false, $output = false) {
        return $this->Db->insert($this->_table . '_detail', $data, $returnid, $output);
    }

    public function GetDetailOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_detail', $where, 'COUNT(1)', $output);
    }

    public function GetDetailAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_detail', $this->_detailField, $where, $limit, $group, $order, $output);
    }

    public function GetDetailRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_detail', $this->_detailField, $where, $group, $order, $output);
    }

    public function updateDetail($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_detail', $data, $where, $output);
    }

    public function delDetailOne($where) {
        return $this->Db->delete($this->_table . '_detail', $where);
    }
    public function queryAll($sql){
        return $this->Db->FetchQuery($sql);
    }
	
	public function detailCount($sql){
        return $this->Db->FetchQuery($sql);
	}
	
    //展会区域
    public function addArea($data, $returnid = false, $output = false) {
        return $this->Db->insert($this->_table . '_area', $data, $returnid, $output);
    }

    public function getAreaOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_area', $where, 'COUNT(1)', $output);
    }

    public function GetAreaRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_area', $this->_areaField, $where, $group, $order, $output);
    }

    public function GetAreaAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_area', $this->_areaField, $where, $limit, $group, $order, $output);
    }

    public function updateArea($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_area', $data, $where, $output);
    }

    public function delAreaOne($where) {
        return $this->Db->delete($this->_table . '_area', $where);
    }

    public function GetGroupAllArea($field, $where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_area', $field, $where, $limit, $group, $order, $output);
    }

    //展会订单表

    public function addOrder($data, $returnid = true, $output = false) {
        return $this->Db->insert($this->_table . '_order', $data, $returnid, $output);
    }

    public function getOrderRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_order', $this->_orderField, $where, $group, $order, $output);
    }

    public function GetOrderOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_order', $where, 'COUNT(1)', $output);
    }


    public function GetOrderAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_order', $this->_orderField, $where, $limit, $group, $order, $output);
    }

    //展会订单产品表

    public function addOrderDetail($data, $returnid = false, $output = false) {
        return $this->Db->insert($this->_table . '_order_detail', $data, $returnid, $output);
    }

    public function GetOrderDetailRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_order_detail', $this->_orderDetailField, $where, $group, $order, $output);
    }



}