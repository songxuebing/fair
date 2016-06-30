<?php

class RouteHelper extends Helper {

    var $RouteModel;

    public function __construct() {
        $this->RouteModel = $this->LoadModel('Route');
    }

    public function routeRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RouteModel->routeRow($where);
    }

    public function routeAll($where,$limit = null, $group = null, $order = null, $output = false) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RouteModel->routeAll($where,$limit, $group, $order, $output);
    }

    public function routePageList($where, $limit, $page, $Param) {
        $join = $this->joinWhere($Param);
        $where = array_merge($where, $join);
        $data['One'] = $this->RouteModel->routeOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->RouteModel->routeAll($where, array($page, $limit), NULL, array('cover desc','id desc'));
            
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function joinWhere($Param) {
        
        $condition = array();
        if(!empty($Param['key'])){
            $key = explode(' ', $Param['key']);
            if(!empty($key)) foreach($key as $k=>$v){
                $condition['LOCATE("'.$v.'",`name`) > ? OR LOCATE("'.$v.'",`pavilion`) > ?'] = 0;
            }
        }
        if (!empty($Param['st'])) {
            $condition['`dateline` >= ?'] = strtotime($Param['st']);
        }
        if (!empty($Param['et'])) {
            $condition['`dateline` <= ?'] = strtotime($Param['et']);
        }
        return $condition;
    }

    public function routeSave($data, $where = array()) {
        if (empty($where)) {
            return $this->RouteModel->add($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->RouteModel->update($data, $where);
        }
    }

    public function GetGroupAll($field, $where, $limit, $page, $group) {
        return $this->RouteModel->GetGroupAll($field, $where, array($page, $limit), $group, array('id desc'));
    }

    /*
     * 订单处理
     */
    public function orderList($where, $limit, $page, $Param){
        if(!empty($Param['key'])){
            $where['`order_sn` = ?'] = $Param['key'];
        }
        $data['One'] = $this->RouteModel->orderOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->RouteModel->orderAll($where, array($page, $limit), NULL, array('id desc'));
            if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
                $data['All'][$k]['goods_detail'] = unserialize($v['goods_detail']);
            }
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }
    public function orderSave($data, $where = array()) {
        if (empty($where)) {
            return $this->RouteModel->orderSave($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->RouteModel->orderUpdate($data, $where);
        }
    }
    public function orderRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RouteModel->orderRow($where);
    } 
	
	
	 //类型
    public function getVisaRow($where) {
        return $this->RouteModel->GetVisaRow($where);
    }

    public function GetAllVisa($id='all'){
        $where=array();
        if($id=='all'){
            $where['`visa_id` > ?'] = 0;
        }
        return $this->RouteModel->GetVisaAll($where,NULL,NULL,array('sort_order asc','visa_id asc'));
    }
    public function GetVisaSort($id){
        $data=$this->GetAllVisa($id);
        return $this->VisaTree($data);
    }

    public function VisaTree($list,$pid=0,$level=0,$html='&nbsp;&nbsp;&nbsp;&nbsp;'){
        static $Tree = array();
        foreach($list as $v){
            if($v['parent_id'] == $pid){
                $v['sort_order'] = $level;
                $v['html'] = str_repeat($html,$level);
                $Tree[] = $v;
                self::VisaTree($list,$v['visa_id'],$level+1);
            }
        }
        return $Tree;
    }

    public function VisaUpdate($data, $where) {
        return $this->RouteModel->VisaUpdate($data, $where);
    }

    public function VisaSave($data) {
        return $this->RouteModel->VisaSave($data);
    }

    public function VisaDelete($where) {
        return $this->RouteModel->VisaDelete($where);
    }

    public function GetGroupTypeAll($field, $where, $limit, $page, $group) {
        return $this->RouteModel->GetGroupTypeAll($field, $where, array($page, $limit), $group, array('visa_id desc'));
    }

    public function routenewList($where, $limit, $page) {

        $data= $this->RouteModel->routenewAll($where, array($page, $limit), NULL, array('id desc'));
        return $data;
    }

    public function routenewRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RouteModel->routenewRow($where);
    }

    public function routenewAll($where,$limit = null, $group = null, $order = null, $output = FALSE) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RouteModel->routenewAll($where,array(0,$limit), $group, $order, $output);
    }



    public function routenewPageList($where, $limit, $page, $Param) {
        $join = $this->joinrouteWhere($Param);
        $where = array_merge($where, $join);
        $data['One'] = $this->RouteModel->routenewOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->RouteModel->routenewAll($where, array($page, $limit), NULL, array('id desc'));

            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }


    public function routenewdetailAll($where,$limit = null, $group = null, $order = null, $output = FALSE) {
        if (is_numeric($where)) {
            $where = array(
                '`route_id` = ?' => $where
            );
        }
        return $this->RouteModel->routenewdetailAll($where,array(0,$limit), $group, $order, $output);
    }


    public function routeUpdate($data, $where) {
        return $this->RouteModel->routeUpdate($data, $where);
    }


    public function joinrouteWhere($Param) {

        $condition = array();
        if(!empty($Param['key'])){
            $key = explode(' ', $Param['key']);
            if(!empty($key)) foreach($key as $k=>$v){
                $condition['LOCATE("'.$v.'",`title`) > ?'] = 0;
            }
        }
        if (!empty($Param['st'])) {
            $condition['`dateline` >= ?'] = strtotime($Param['st']);
        }
        if (!empty($Param['et'])) {
            $condition['`dateline` <= ?'] = strtotime($Param['et']);
        }
        return $condition;
    }
}