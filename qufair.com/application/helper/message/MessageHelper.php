<?php

class MessageHelper extends Helper {

    var $MessageModel;

    public function __construct() {
        $this->MessageModel = $this->LoadModel('Message');
    }

    public function messageRow($where) {
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->MessageModel->messageRow($where);
    }

    public function messageAll($where){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->MessageModel->messageAll($where);
    }
    public function messagePageList($where,$limit,$page,$Param){
        $join = $this->joinWhere($Param);
        $where = array_merge($where,$join);
        $data['One']=$this->MessageModel->messageOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->MessageModel->messageAll($where,array($page,$limit),NULL,array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }
    public function joinWhere($Param){
        $condition = array();
        if(!empty($Param['st'])){
            $condition['`dateline` >= ?'] = strtotime($Param['st']);
        }
        if(!empty($Param['et'])){
            $condition['`dateline` < ?'] = strtotime($Param['et']);
        }
        return $condition;
    }
    public function messageSave($data,$where=array()){
        if(empty($where)){
            return $this->MessageModel->add($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->MessageModel->update($data,$where);
        }
    }
    public function messageRemove($where){
        if(is_numeric(($where))){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->MessageModel->delete($where);
    }
    
    
}