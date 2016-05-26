<?php

class AdvHelper extends Helper {

    var $AdvModel;

    public function __construct() {
        $this->AdvModel = $this->LoadModel('Adv');
    }

    public function advRow($where) {
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->AdvModel->advRow($where);
    }

    public function advAll($where, $limit = null, $group = null, $order = null, $output = false){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->AdvModel->advAll($where, $limit, $group, $order, $output);
    }
    public function advPageList($where,$limit,$page,$Param){
        $join = $this->joinWhere($Param);
        $where = array_merge($where,$join);
        $data['One']=$this->AdvModel->advOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->AdvModel->advAll($where,array($page,$limit),NULL,array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }
    public function joinWhere($Param){
        $condition = array();
        if(!empty($Param['pos_id'])){
            $condition['`pos_id` = ?'] = $Param['pos_id'];
        }
        if(!empty($Param['st'])){
            $condition['`start_time` >= ?'] = strtotime($Param['st']);
        }
        if(!empty($Param['et'])){
            $condition['`end_time` <= ?'] = strtotime($Param['et']);
        }
        return $condition;
    }
    public function advSave($data,$where=array()){
        if(empty($where)){
            return $this->AdvModel->add($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
                return $this->AdvModel->update($data,$where);
            }
        }
    }
    public function advRemove($id){
        return $this->AdvModel->delete(array(
            '`id` = ?' => $id
        ));
    }
    /*
     * 广告位
     */
    public function posRow($where){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->AdvModel->posRow($where);
    }
    public function posAll(){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->AdvModel->posAll($where);
    }
    public function posPageList($where,$limit,$page,$Param){
        $data['One']=$this->AdvModel->posOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->AdvModel->posAll($where,array($page,$limit),NULL,array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }

    public function posSave($data,$where = array()){
        if(empty($where)){
            return $this->AdvModel->posSave($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
                return $this->AdvModel->posUpdate($data,$where);
            }
        }
    }
    
    public function posRemove($id){
        return $this->AdvModel->posDelete(array(
            '`id` = ?' => $id
        ));
    }
    
}