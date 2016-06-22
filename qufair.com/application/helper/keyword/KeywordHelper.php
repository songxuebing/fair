<?php

class KeywordHelper extends Helper {

    var $KeywordModel;

    public function __construct() {
        $this->KeywordModel = $this->LoadModel('Keyword');
    }

    public function keywordRow($where) {
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->KeywordModel->keywordRow($where);
    }

    public function keywordAll($where){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->KeywordModel->keywordAll($where,NULL,NULL,array('sort desc'));
    }
    public function keywordPageList($where,$limit,$page,$Param){
        //$join = $this->joinWhere($Param);
        //$where = array_merge($where,$join);
        $data['One']=$this->KeywordModel->keywordOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->KeywordModel->keywordAll($where,array($page,$limit),NULL,array('sort desc'));
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
    public function keywordSave($data,$where=array()){
        if(empty($where)){
            return $this->KeywordModel->Save($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
                return $this->KeywordModel->Update($data,$where);
            }
        }
    }
    public function keywordRemove($id){
        return $this->KeywordModel->Delete(array(
            '`id` = ?' => $id
        ));
    }

    public function hot_Row($where) {
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->KeywordModel->hot_Row($where);
    }


    public function hot_PageList($where,$limit,$page,$Param){
        //$join = $this->joinWhere($Param);
        //$where = array_merge($where,$join);
        $data['One']=$this->KeywordModel->hot_One($where);
        if(!empty($data['One'])){
            $data['All']=$this->KeywordModel->hot_All($where,array($page,$limit),NULL,array('sort desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function hot_Save($data,$where=array()){
        if(empty($where)){
            return $this->KeywordModel->hot_Save($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
                return $this->KeywordModel->hot_Update($data,$where);
            }
        }
    }
    public function hot_Remove($id){
        return $this->KeywordModel->hot_Delete(array(
            '`id` = ?' => $id
        ));
    }


    public function route_PageList($where,$limit,$page,$Param){
        //$join = $this->joinWhere($Param);
        //$where = array_merge($where,$join);
        $data['One']=$this->KeywordModel->route_One($where);
        if(!empty($data['One'])){
            $data['All']=$this->KeywordModel->route_All($where,array($page,$limit),NULL,array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function route_Row($where) {
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->KeywordModel->route_Row($where);
    }

    public function route_Save($data,$where=array()){
        if(empty($where)){
            return $this->KeywordModel->route_Save($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`id` = ?' => $where
                );
                return $this->KeywordModel->route_Update($data,$where);
            }
        }
    }
}