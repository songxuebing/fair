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
    
}