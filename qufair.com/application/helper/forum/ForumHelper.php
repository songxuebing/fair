<?php

class ForumHelper extends Helper {

    var $ForumModel;
    var $MemberModel;
    var $FavoriteModel;
    var $CommentModel;

    public function __construct() {
        $this->ForumModel = $this->LoadModel('Forum');
        $this->MemberModel = $this->LoadModel('Member');
        $this->FavoriteModel = $this->LoadModel('Favorite');
        $this->CommentModel = $this->LoadModel('Comment');
    }
    public function forumCount($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->ForumModel->forumOne($where);
    }
    public function forumRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->ForumModel->forumRow($where);
    }
    
    public function forumPageList($where,$limit,$page,$Param,$order = array('dateline desc')){
        $join = $this->joinWhere($Param);
        $where = array_merge($where, $join);
        $data['One']=$this->ForumModel->forumOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->ForumModel->forumAll($where,array($page,$limit),NULL,$order);
            if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
                $member = $this->MemberModel->GetRow(array('`id` = ?' => $v['member_id']));
                $data['All'][$k]['member'] = $member;
                $cat_row = $this->catRow($v['cat_id']);
                $data['All'][$k]['cat_name'] = $cat_row['name'];
                $favcount = $this->FavoriteModel->getOne(array(
                    '`related_id` = ?' => $v['id'],
                    '`sort` = ?' => 7
                ));
                $data['All'][$k]['favcount'] = $favcount;
                //评论统计
                $count_where = array('`con_id` = ?' => $v['id'],'`is_type` = ?' => 7 ,'`delete` = ?' => 0);
                $commentcount = $this->CommentModel->getOne($count_where);
                $data['All'][$k]['comment'] = $commentcount;
            }
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }
    
    public function joinWhere($Param) {
        
        $condition = array();
        if(!empty($Param['key'])){
            $key = explode(' ', $Param['key']);
            if(!empty($key)) foreach($key as $k=>$v){
                $condition['LOCATE("'.$v.'",`title`) > ?'] = 0;
            }
        }
        if (!empty($Param['st'])) {
            $condition['`dateline` >= ?'] = strtotime($Param['st']);
        }
        if (!empty($Param['et'])) {
            $condition['`dateline` <= ?'] = strtotime($Param['et']);
        }
        return $condition;
    }
    
    public function forumSave($data, $where = array()) {
        if (empty($where)) {
            return $this->ForumModel->add($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->ForumModel->update($data, $where);
        }
    }
    
    public function catRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->ForumModel->catRow($where);
    }

    public function catAll($where,$limit = null, $group = null, $order = null, $output = false) {
        if (is_numeric($where)) {
            $where = array(
                '`parent_id` = ?' => $where
            );
        }
        return $this->ForumModel->catAll($where,$limit, $group, $order, $output);
    }
    
    public function catPageList($where,$limit,$page,$Param){
        $data['One']=$this->ForumModel->catOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->ForumModel->catAll($where,array($page,$limit),NULL,array('id asc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data;
    }
    
    public function catSave($data, $where = array()) {
        if (empty($where)) {
            return $this->ForumModel->catSave($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->ForumModel->catUpdate($data, $where);
        }
    }
    
    public function catRemove($where){
        if (is_numeric(($where))) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->ForumModel->catRemove($where);
    }
    
    public function groupCat(){
        $data = $this->ForumModel->catAll(array(
            'parent_id = ?' => 0
        ));
        if(!empty($data)) foreach($data as $k=>$v){
            $next = $this->ForumModel->catAll(array(
                '`parent_id` = ?' => $v['id']
            ));
            $data[$k]['next'] = $next;
        }
        return $data;
    }


    //标签
    public function tagRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`tag_id` = ?' => $where
            );
        }
        return $this->ForumModel->tagRow($where);
    }

    public function tagAll($where,$limit = null, $group = null, $order = null, $output = false) {
        return $this->ForumModel->tagAll($where,$limit, $group, $order, $output);
    }

    public function tagPageList($where,$limit,$page,$Param){
        $data['One']=$this->ForumModel->tagOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->ForumModel->tagAll($where,array($page,$limit),NULL,array('tag_id asc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function tagSave($data, $where = array()) {
        if (empty($where)) {
            return $this->ForumModel->tagSave($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`tag_id` = ?' => $where
                );
            }
            return $this->ForumModel->tagUpdate($data, $where);
        }
    }

    public function tagRemove($where){
        if (is_numeric(($where))) {
            $where = array(
                '`tag_id` = ?' => $where
            );
        }
        return $this->ForumModel->tagRemove($where);
    }


    //获取全部默认标签
    public function cTagRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`ctag_id` = ?' => $where
            );
        }
        return $this->ForumModel->cTagRow($where);
    }

    public function cTagAll($where,$limit = null, $group = null, $order = null, $output = false) {
        return $this->ForumModel->cTagAll($where,$limit, $group, $order, $output);
    }

    public function cTagPageList($where,$limit,$page,$Param){
        $data['One']=$this->ForumModel->cTagOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->ForumModel->cTagAll($where,array($page,$limit),NULL,array('ctag_id asc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function cTagSave($data, $where = array()) {
        if (empty($where)) {
            return $this->ForumModel->cTagSave($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`ctag_id` = ?' => $where
                );
            }
            return $this->ForumModel->cTagUpdate($data, $where);
        }
    }

    public function cTagRemove($where){
        if (is_numeric(($where))) {
            $where = array(
                '`ctag_id` = ?' => $where
            );
        }
        return $this->ForumModel->cTagRemove($where);
    }

    //标签索引
    public function indexRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`index_id` = ?' => $where
            );
        }
        return $this->ForumModel->indexRow($where);
    }

    public function indexAll($where,$limit = null, $group = null, $order = null, $output = false) {
        return $this->ForumModel->indexAll($where,$limit, $group, $order, $output);
    }

    public function indexPageList($where,$limit,$page,$Param){
        $data['One']=$this->ForumModel->cTagOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->ForumModel->indexAll($where,array($page,$limit),NULL,array('index_id asc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function indexSave($data, $where = array()) {
        if (empty($where)) {
            return $this->ForumModel->indexSave($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`index_id` = ?' => $where
                );
            }
            return $this->ForumModel->indexUpdate($data, $where);
        }
    }

    public function indexRemove($where){
        if (is_numeric(($where))) {
            $where = array(
                '`index_id` = ?' => $where
            );
        }
        return $this->ForumModel->indexRemove($where);
    }
	
	//点赞
	public function praiseRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->ForumModel->praiseRow($where);
    }

    public function praiseCount($where) {
        return $this->ForumModel->praiseOne($where);
    }
    
    public function praiseSave($data, $where = array()) {
        if (empty($where)) {
            return $this->ForumModel->praiseSave($data);
        } else {
            if (is_numeric(($where))) {
                $where = array(
                    '`id` = ?' => $where
                );
            }
            return $this->ForumModel->praiseUpdate($data, $where);
        }
    }
	
	public function praiseAct($params) {
        $check = $this->ForumModel->praiseRow(array(
            '`forum_id` = ?' => $params['forum_id'],
            '`member_id` = ?' => $params['member_id']
        ));
        if ($check) {
            //取消赞
            $this->ForumModel->praiseRemove(array(
                '`forum_id` = ?' => $params['forum_id'],
                '`member_id` = ?' => $params['member_id']
            ));
        } else {
            $this->ForumModel->praiseSave(array(
                'forum_id' => $params['forum_id'],
                'member_id' => $params['member_id'],
                'dateline' => NOW_TIME
            ));
        }
        $count = $this->ForumModel->praiseOne(array(
            '`forum_id` = ?' => $params['forum_id']
        ));
        return $count;
    }
    //点击量
    public function clickUpdate($data, $id) {
                $where = array(
                    '`id` = ?' => $id
                );
            return $this->ForumModel->clickUpdate($data, $where);
    }

    public function queryDetail($sql){
        return $this->ForumModel->queryAll($sql);
    }
    
}