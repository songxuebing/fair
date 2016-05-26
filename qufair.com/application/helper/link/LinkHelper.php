<?php

class LinkHelper extends Helper {

    var $LinkModel;

    public function __construct() {
        $this->LinkModel = $this->LoadModel('Link');
    }

    public function linkRow($where) {
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->LinkModel->linkRow($where);
    }

    public function linkAll($where){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->LinkModel->linkAll($where);
    }
    public function linkPageList($where,$limit,$page,$Param){
        $join = $this->joinWhere($Param);
        $where = array_merge($where,$join);
        $data['One']=$this->LinkModel->linkOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->LinkModel->linkAll($where,array($page,$limit),NULL,array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }
    public function joinWhere($Param){
        $condition = array();
        if(!empty($Param['key'])){
            $condition['LOCATE(?,`title`) > 0'] = $Param['key'];
        }
        if(!empty($Param['st'])){
            $condition['`dateline` >= ?'] = strtotime($Param['st']);
        }
        if(!empty($Param['et'])){
            $condition['`dateline` < ?'] = strtotime($Param['et']);
        }
        return $condition;
    }
    public function linkSave($data,$where=array()){
        if(empty($where)){
            return $this->LinkModel->add($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
                return $this->LinkModel->update($data,$where);
            }
        }
    }
    public function linkRemove($id){
        return $this->LinkModel->delete(array(
            '`id` = ?' => $id
        ));
    }
    
}