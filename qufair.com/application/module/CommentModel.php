<?php

class CommentModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'comment';
        $this->_field = array('eva_id', 'member_id', 'con_id', 'add_time', 'eva_number', 'service_number', 'sentiment_number', 'message', 'is_type', 'praise', 'average');
        $this->_praiseField = array('id', 'eva_id', 'member_id', 'dateline');
    }

    //评价
    public function commentQuery($sql){
        return $this->Db->FetchQuery($sql);
    }
    public function getOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    public function sumOne($where, $fields ,$output = false){
        return $this->Db->FetchOne($this->_table , $where, $fields, $output);
    }
    public function getAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
    public function getRow($where, $group = null, $order = null, $output = false){
        return $this->Db->FetchRow($this->_table, $this->_field, $where, $group, $order, $output);
    }

    //点赞
    public function praiseRow($where, $group = null, $order = null, $output = false){
        return $this->Db->FetchRow($this->_table . '_praise', $this->_praiseField, $where, $group, $order, $output);
    }
    public function praiseSave($data, $returnid = TRUE, $output = false){
        return $this->Db->insert($this->_table . '_praise', $data, $returnid, $output);
    }
    public function praiseDelete($where,$output=false){
        return $this->Db->delete($this->_table . '_praise',$where,$output);
    }
    public function praiseOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_praise' , $where, 'COUNT(1)', $output);
    }
    
    
}