<?php

class KeywordModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'keyword';
        $this->_field = array('id', 'keyword', 'sort', 'click');
        $this->_table_hot = 'hot_home';
        $this->_field_hot = array('id', 'title', 'url', 'type', 'sort', 'update_time');
        $this->_table_route = 'route_home';
        $this->_field_route = array('id', 'title', 'url', 'price');
    }
    
    public function keywordOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function keywordRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table , $this->_field, $where, $group, $order, $output);
    }

    public function keywordAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table , $this->_field, $where, $limit, $group, $order, $output);
    }
	
	public function Save($data,$returnid=false,$output=false){
		//$this->Db->replace($this->_table,$data,$returnid,$output);
		return $this->Db->insert($this->_table,$data,$returnid,$output);
	}
	public function Update($data,$where,$output=false){
		return $this->Db->update($this->_table,$data,$where,$output);
	}
	public function Delete($where,$output=false){
		return $this->Db->delete($this->_table,$where,$output);
	}

    //首页热门
    public function hot_Row($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table_hot , $this->_field_hot, $where, $group, $order, $output);
    }
    public function hot_One($where, $output = false) {
        return $this->Db->FetchOne($this->_table_hot , $where, 'COUNT(1)', $output);
    }

    public function hot_All($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table_hot , $this->_field_hot, $where, $limit, $group, $order, $output);
    }

    public function hot_Save($data,$returnid=false,$output=false){
        //$this->Db->replace($this->_table,$data,$returnid,$output);
        return $this->Db->insert($this->_table_hot,$data,$returnid,$output);
    }
    public function hot_Update($data,$where,$output=false){
        return $this->Db->update($this->_table_hot,$data,$where,$output);
    }
    public function hot_Delete($where,$output=false){
        return $this->Db->delete($this->_table_hot,$where,$output);
    }

    //首页行程大图指定
    public function route_Row($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table_route , $this->_field_route, $where, $group, $order, $output);
    }
    public function route_One($where, $output = false) {
        return $this->Db->FetchOne($this->_table_route , $where, 'COUNT(1)', $output);
    }

    public function route_All($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table_route , $this->_field_route, $where, $limit, $group, $order, $output);
    }

    public function route_Save($data,$returnid=false,$output=false){
        //$this->Db->replace($this->_table,$data,$returnid,$output);
        return $this->Db->insert($this->_table_route,$data,$returnid,$output);
    }
    public function route_Update($data,$where,$output=false){
        return $this->Db->update($this->_table_route,$data,$where,$output);
    }
    public function route_Delete($where,$output=false){
        return $this->Db->delete($this->_table_route,$where,$output);
    }
}