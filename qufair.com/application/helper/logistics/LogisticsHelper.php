<?php

class LogisticsHelper extends Helper {

    var $LogisticsModel;

    public function __construct() {
        $this->LogisticsModel = $this->LoadModel('Logistics');
    }

    public function GetId($Id = '0') {
        $where = array();
        $where['`log_id` = ?'] = $Id;
        $VisaRow = $this->LogisticsModel->GetRow($where);

        return $VisaRow;
    }

    public function getRow($where) {
        return $this->LogisticsModel->GetRow($where);
    }

    public function GetAllWhere($where, $limit, $page, $Param) {
        $data['One'] = $this->LogisticsModel->GetOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->LogisticsModel->GetAll($where, array($page, $limit), NULL, array('log_id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function GroupAllRow($field, $where, $limit, $page, $group) {
        return $this->LogisticsModel->GetGroupAll($field, $where, array($page, $limit), $group, array('log_id desc'));
    }

    public function Update($data, $where) {
        return $this->LogisticsModel->update($data, $where);
    }

    public function save($data) {
        return $this->LogisticsModel->Save($data);
    }

    public function Delete($where) {
        return $this->LogisticsModel->delOne($where);
    }


    //物流订单
    public function orderLogisticsList($where, $limit, $page, $Param){
        $data['One'] = $this->LogisticsModel->orderLogisticsOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->LogisticsModel->orderLogisticsAll($where, array($page, $limit), NULL, array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function orderLogisticsSave($data) {
        return $this->LogisticsModel->orderLogisticsSave($data);
    }

    public function getOrderLogisticsRow($where) {
        return $this->LogisticsModel->orderLogisticsRow($where);
    }
	
	 //类型
    public function getVisaRow($where) {
        return $this->LogisticsModel->GetVisaRow($where);
    }

    public function GetAllVisa($id='all'){
        $where=array();
        if($id=='all'){
            $where['`visa_id` > ?'] = 0;
        }
        return $this->LogisticsModel->GetVisaAll($where,NULL,NULL,array('sort_order asc','visa_id asc'));
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
        return $this->LogisticsModel->VisaUpdate($data, $where);
    }

    public function VisaSave($data) {
        return $this->LogisticsModel->VisaSave($data);
    }

    public function VisaDelete($where) {
        return $this->LogisticsModel->VisaDelete($where);
    }

    public function GetGroupTypeAll($field, $where, $limit, $page, $group) {
        return $this->LogisticsModel->GetGroupTypeAll($field, $where, array($page, $limit), $group, array('visa_id desc'));
    }

}