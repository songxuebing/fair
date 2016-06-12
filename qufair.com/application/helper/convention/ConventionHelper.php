<?php

class ConventionHelper extends Helper {

    var $ConventionModel;

    public function __construct() {
        $this->ConventionModel = $this->LoadModel('Convention');
        $this->IndustryModel = $this->LoadModel('Industry');
    }

    public function GetId($Id = '0') {
        $where = array();
        $where['`id` = ?'] = $Id;
        $ConventionRow = $this->ConventionModel->GetRow($where);

        return $ConventionRow;
    }

    public function getRow($where) {
        return $this->ConventionModel->GetRow($where);
    }

    public function GetInWhere($where) {
        return $this->IndustryModel->industryRow($where);
    }

    public function GetAllWhere($where, $limit, $page, $Param) {
        if(!empty($Param['key'])){
            $key = explode(' ', $Param['key']);
            if(!empty($key)) foreach($key as $k=>$v){
                $where['LOCATE("'.$v.'",`name`) > ?'] = 0;
            }
        }
        $data['One'] = $this->ConventionModel->GetOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->ConventionModel->GetAll($where, array($page, $limit), NULL, array('cover desc','id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }
	
	public function GetAllHouWhere($where, $limit, $page, $Param) {
        if(!empty($Param['key'])){
            $key = explode(' ', $Param['key']);
            if(!empty($key)) foreach($key as $k=>$v){
                $where['LOCATE("'.$v.'",`name`) > ?'] = 0;
            }
        }
        $data['One'] = $this->ConventionModel->GetOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->ConventionModel->GetAll($where, array($page, $limit), NULL, array('regional desc','id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }
    
    public function conventionAll($where,$limit = null, $group = null, $order = null, $output = true) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->ConventionModel->GetAll($where,$limit, $group, $order, $output);
    }
    
    public function getAllRow($field, $where, $limit, $page, $group) {
        return $this->ConventionModel->GetGroupAll($field, $where, array($page, $limit), $group, array('id desc'));
    }

    public function Update($data, $where) {
        return $this->ConventionModel->update($data, $where);
    }

    public function save($data) {
        return $this->ConventionModel->add($data);
    }

    public function Delete($where) {
        return $this->ConventionModel->delete($where);
    }

    //展会信息

    public function detailSave($data) {
        return $this->ConventionModel->addDetail($data, true);
    }

    public function GetAllDetailWhere($where, $limit, $page, $Param,$group = NULL) {
        $data['One'] = $this->ConventionModel->GetDetailOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->ConventionModel->GetDetailAll($where, array($page, $limit), $group, array('detail_id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }
    public function queryDetail($sql){
        return $this->ConventionModel->queryAll($sql);
    }
    public function getDetailRow($where) {
        return $this->ConventionModel->GetDetailRow($where);
    }

    public function detailUpdate($data, $where) {
        return $this->ConventionModel->updateDetail($data, $where);
    }

    public function detailDelete($where) {
        return $this->ConventionModel->delDetailOne($where);
    }
	
	public function detailCount($sql){
		return $this->ConventionModel->detailCount($sql);
	}

    //展会区域
    public function areaSave($data) {
        return $this->ConventionModel->addArea($data, true);
    }

    public function getCountArea($where) {
        return $this->ConventionModel->getAreaOne($where);
    }

    public function getAreaRow($where) {
        return $this->ConventionModel->GetAreaRow($where);
    }

    public function GetAllAreaWhere($where, $limit, $page) {

        return $this->ConventionModel->GetAreaAll($where, array($page, $limit), NULL, array('area_id desc'));
    }

    public function areaUpdate($data, $where) {
        return $this->ConventionModel->updateArea($data, $where);
    }

    public function areaDelete($where) {
        return $this->ConventionModel->delAreaOne($where);
    }

    public function getAllAreaRow($field, $where, $limit, $page, $group) {
        return $this->ConventionModel->GetGroupAllArea($field, $where, array($page, $limit), $group, array('area_id desc'));
    }

    //展会订单表
    public function getCount($where) {
        return $this->ConventionModel->GetOrderOne($where);
    }

    public function orderSave($data) {
        return $this->ConventionModel->addOrder($data);
    }
    public function orderRow($where) {
        return $this->ConventionModel->getOrderRow($where);
    }

    public function GetAllOrderWhere($where, $limit, $page, $Param,$group = NULL) {
        $data['One'] = $this->ConventionModel->GetOrderOne($where);

        if (!empty($data['One'])) {
            $data['All'] = $this->ConventionModel->GetOrderAll($where, array($page, $limit), $group, array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    //展会订单产品表
    public function orderDetailSave($data) {
        return $this->ConventionModel->addOrderDetail($data, true);
    }

    public function orderDetailRow($where) {
        return $this->ConventionModel->GetOrderDetailRow($where);
    }


}