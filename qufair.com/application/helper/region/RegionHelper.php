<?php

class RegionHelper extends Helper {

    var $RegionModel;

    public function __construct() {
        $this->RegionModel = $this->LoadModel('Region');
    }
    
    public function regionOne($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->regionOne($where);
    }
    
    public function regionRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->regionRow($where);
    }

    public function regionAll($where,$limit = null, $group = null, $order = null, $output = false) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->regionAll($where,$limit, $group, $order, $output);
    }
    
    public function regionPageList($where,$limit,$page,$Param){
        if(!empty($Param['delta'])){
            $where['`delta` = ?'] = urldecode($Param['delta']);
        }
        $data['One']=$this->RegionModel->regionOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->RegionModel->regionAll($where,array($page,$limit),NULL,array('id asc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }
    
    public function regionSave($data, $where = array()) {
        if (empty($where)) {
            return $this->RegionModel->add($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->RegionModel->update($data, $where);
        }
    }
    
    public function regionRemove($where){
        if (is_numeric(($where))) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->delete($where);
    }


    public function visaPageList($where,$limit,$page,$Param){
        if(!empty($Param['delta'])){
            $where['`delta` = ?'] = urldecode($Param['delta']);
        }
        $data['One']=$this->RegionModel->visaOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->RegionModel->visaAll($where,array($page,$limit),NULL,array('id asc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function visaSave($data, $where = array()) {
        if (empty($where)) {
            return $this->RegionModel->visaSave($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->RegionModel->visaUpdate($data, $where);
        }
    }

    public function visaRemove($where){
        if (is_numeric(($where))) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->visaDelete($where);
    }
    public function visaOne($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->visaOne($where);
    }

    public function visaRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->visaRow($where);
    }

    public function visaAll($where,$limit = null, $group = null, $order = null, $output = false) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->RegionModel->visaAll($where,$limit, $group, $order, $output);
    }


}