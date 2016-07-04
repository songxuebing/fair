<?php

class DecorationHelper extends Helper {

    var $DecorationModel;

    public function __construct() {
        $this->DecorationModel = $this->LoadModel('Decoration');
    }

    public function GetId($Id = '0') {
        $where = array();
        $where['`id` = ?'] = $Id;
        $VisaRow = $this->DecorationModel->GetRow($where);

        return $VisaRow;
    }

    public function getRow($where) {
        return $this->DecorationModel->GetRow($where);
    }

    public function GetAllWhere($where, $limit, $page, $Param) {
        $data['One'] = $this->DecorationModel->GetOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->DecorationModel->GetAll($where, array($page, $limit), NULL, array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function GroupAllRow($field, $where, $limit, $page, $group) {
        return $this->DecorationModel->GetGroupAll($field, $where, array($page, $limit), $group, array('id desc'));
    }

    public function Update($data, $where) {
        return $this->DecorationModel->update($data, $where);
    }

    public function save($data) {
        return $this->DecorationModel->Save($data);
    }

    public function Delete($where) {
        return $this->DecorationModel->delOne($where);
    }


    //物流订单
    public function orderDecorationList($where, $limit, $page, $Param){
        $data['One'] = $this->DecorationModel->orderDecorationOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->DecorationModel->orderDecorationAll($where, array($page, $limit), NULL, array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function orderDecorationSave($data) {
        return $this->DecorationModel->orderDecorationSave($data);
    }

    public function getOrderDecotionRow($where) {
        return $this->DecorationModel->orderDecorationRow($where);
    }


    //行业
    public function decorationIndustrySave($data) {
        return $this->DecorationModel->decorationIndustrySave($data);
    }

    public function GroupIndustryAllRow($field, $where, $limit, $page, $group) {
        return $this->DecorationModel->GetGroupIndustryAll($field, $where, array($page, $limit), $group, array('id desc'));
    }
	
	 //类型
    public function getVisaRow($where) {
        return $this->DecorationModel->GetVisaRow($where);
    }

    public function GetAllVisa($id='all'){
        $where=array();
        if($id=='all'){
            $where['`visa_id` > ?'] = 0;
        }
        return $this->DecorationModel->GetVisaAll($where,NULL,NULL,array('sort_order asc','visa_id asc'));
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
        return $this->DecorationModel->VisaUpdate($data, $where);
    }

    public function VisaSave($data) {
        return $this->DecorationModel->VisaSave($data);
    }

    public function VisaDelete($where) {
        return $this->DecorationModel->VisaDelete($where);
    }

    public function GetGroupTypeAll($field, $where, $limit, $page, $group) {
        return $this->DecorationModel->GetGroupTypeAll($field, $where, array($page, $limit), $group, array('visa_id desc'));
    }

    //新的特装
    public function getnewRow($where) {
        return $this->DecorationModel->GetnewRow($where);
    }

    public function GetnewAllWhere($where, $limit, $page, $Param) {
        $data['One'] = $this->DecorationModel->GetnewOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->DecorationModel->GetnewAll($where, array($page, $limit), NULL, array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }
}