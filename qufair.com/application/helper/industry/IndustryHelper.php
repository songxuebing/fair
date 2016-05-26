<?php

class IndustryHelper extends Helper {

    var $IndustryModel;

    public function __construct() {
        $this->IndustryModel = $this->LoadModel('Industry');
    }
    
    public function industryOne($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->IndustryModel->industryOne($where);
    }
    
    public function industryRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->IndustryModel->industryRow($where);
    }

    public function industryAll($where,$limit = null, $group = null, $order = null, $output = false) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->IndustryModel->industryAll($where,$limit, $group, $order, $output);
    }
    
    public function industryPageList($where,$limit,$page,$Param){
        $data['One']=$this->IndustryModel->industryOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->IndustryModel->industryAll($where,array($page,$limit),NULL,array('id asc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }
    
    public function industrySave($data, $where = array()) {
        if (empty($where)) {
            return $this->IndustryModel->add($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->IndustryModel->update($data, $where);
        }
    }
    
    public function industryRemove($where){
        if (is_numeric(($where))) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->IndustryModel->delete($where);
    }
    
    public function groupIndustry(){
        $data = $this->IndustryModel->industryAll(array(
            'parent_id = ?' => 0
        ));
        if(!empty($data)) foreach($data as $k=>$v){
            $next = $this->IndustryModel->industryAll(array(
                '`parent_id` = ?' => $v['id']
            ));
            $data[$k]['next'] = $next;
        }
        return $data;
    }
    
}