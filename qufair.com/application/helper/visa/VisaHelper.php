<?php

class VisaHelper extends Helper {

    var $VisaModel;

    public function __construct() {
        $this->VisaModel = $this->LoadModel('Visa');
    }

    public function GetId($Id = '0') {
        $where = array();
        $where['`visa_id` = ?'] = $Id;
        $VisaRow = $this->VisaModel->GetRow($where);

        return $VisaRow;
    }

    public function getRow($where) {
        return $this->VisaModel->GetRow($where);
    }

    public function GetAllWhere($where, $limit, $page, $Param, $order=array('visa_cover desc','visa_id desc')) {
        $data['One'] = $this->VisaModel->GetOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->VisaModel->GetAll($where, array($page, $limit), NULL, $order);
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function GroupAllRow($field, $where, $limit, $page, $group) {
        return $this->VisaModel->GetGroupAll($field, $where, array($page, $limit), $group, array('visa_id desc'));
    }

    public function Update($data, $where) {
        return $this->VisaModel->update($data, $where);
    }

    public function save($data) {
        return $this->VisaModel->Save($data);
    }

    public function Delete($where) {
        return $this->VisaModel->delOne($where);
    }

    //签证产品类型
    public function getProRow($where) {

        return $this->VisaModel->GetProRow($where);
    }

    public function GetAllPro($id='all'){
        $where=array();
        if($id=='all'){
            $where['`pro_id` > ?'] = 0;
        }
        return $this->VisaModel->GetProAll($where,NULL,NULL,array('sort_order asc','pro_id asc'));
    }
    public function GetProSort($id){
        $data=$this->GetAllPro($id);
        return $this->Tree($data);
    }

    public function Tree($list,$pid=0,$level=0,$html='&nbsp;&nbsp;&nbsp;&nbsp;'){
        static $Tree = array();
        foreach($list as $v){
            if($v['parent_id'] == $pid){
                $v['sort_order'] = $level;
                $v['html'] = str_repeat($html,$level);
                $Tree[] = $v;
                self::Tree($list,$v['pro_id'],$level+1);
            }
        }
        return $Tree;
    }

    public function ProUpdate($data, $where) {
        return $this->VisaModel->ProUpdate($data, $where);
    }

    public function ProSave($data) {
        return $this->VisaModel->ProSave($data);
    }

    public function ProDelete($where) {
        return $this->VisaModel->ProDelete($where);
    }



    //签证类型
    public function getVisaRow($where) {
        return $this->VisaModel->GetVisaRow($where);
    }

    public function GetAllVisa($id='all'){
        $where=array();
        if($id=='all'){
            $where['`visa_id` > ?'] = 0;
        }
        return $this->VisaModel->GetVisaAll($where,NULL,NULL,array('sort_order asc','visa_id asc'));
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
        return $this->VisaModel->VisaUpdate($data, $where);
    }

    public function VisaSave($data) {
        return $this->VisaModel->VisaSave($data);
    }

    public function VisaDelete($where) {
        return $this->VisaModel->VisaDelete($where);
    }

    public function GetGroupTypeAll($field, $where, $limit, $page, $group) {
        return $this->VisaModel->GetGroupTypeAll($field, $where, array($page, $limit), $group, array('visa_id desc'));
    }


    //签证订单
    public function orderVisaList($where, $limit, $page, $Param){
        $data['One'] = $this->VisaModel->orderVisaOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->VisaModel->orderVisaAll($where, array($page, $limit), NULL, array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function orderVisaSave($data) {
        return $this->VisaModel->orderVisaSave($data);
    }

    public function getOrderVisaRow($where) {
        return $this->VisaModel->orderVisaRow($where);
    }


    //签证人信息
    public function VisaMemberSave($data) {
        return $this->VisaModel->visaMemberSave($data);
    }

    public function getVisaMemberList($where, $limit, $page, $Param){
        return $this->VisaModel->visaMemberAll($where, array(0, 200), NULL, array('id desc'));
    }

    public function getVisaMemberRow($where) {
        return $this->VisaModel->visaMemberRow($where);
    }

    //签证新的2016-06-22

    public function GetAllnewWhere($where, $limit, $page, $Param, $order=array('visa_cover desc','visa_id desc')) {
        $data['One'] = $this->VisaModel->GetnewOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->VisaModel->GetnewAll($where, array($page, $limit), NULL, $order);
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }
    public function GetnewId($Id = '0') {
        $where = array();
        $where['`visa_id` = ?'] = $Id;
        $VisaRow = $this->VisaModel->GetnewRow($where);

        return $VisaRow;
    }
    public function newUpdate($data, $where) {
        return $this->VisaModel->newupdate($data, $where);
    }
    public function VisanewSave($data) {
        return $this->VisaModel->VisanewSave($data);
    }
}