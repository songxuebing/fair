<?php

class PayHelper extends Helper {

    var $PayModel;

    public function __construct() {
        $this->PayModel = $this->LoadModel('Pay');
    }

    public function logRow($where) {
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->PayModel->logRow($where);
    }

    public function logAll($where){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->PayModel->logAll($where);
    }

    public function logSave($data,$where = array()){
        if(empty($where)){
            return $this->PayModel->logSave($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->PayModel->logUpdate($data,$where);
        }
    }
    
}