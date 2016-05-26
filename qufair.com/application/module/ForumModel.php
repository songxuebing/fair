<?php

class ForumModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'forum';
        $this->_table_tagindex = 'forum_tagindex';
        $this->_fields = array('id', 'title', 'member_id', 'cat_id', 'content', 'dateline', 'delete', 'is_show', 'cover', 'clicks', 'comment', 'recommend');
        $this->_fields_re = array('id', 'title', 'member_id', 'cat_id',  'dateline', 'delete', 'is_show', 'cover', 'clicks', 'comment', 'recommend');
        $this->_fields_tagindex = array('index_id', 'forum_id', 'ctag_id');

        $this->_catfield = array('id', 'name', 'parent_id', 'icon', 'is_hot');
        $this->_tagfield = array('tag_id', 'forum_id','mytag_id', 'tag_name');//帖子tag
        $this->_indexfield = array('index_id', 'forum_id', 'ctag_id');//标签索引表
        $this->_ctagfield = array('ctag_id', 'ctag_name', 'is_open','is_delete','sort','name_en');//默认tag
		 $this->_praisefield = array('id', 'member_id', 'forum_id','dateline');//点赞
    }
    
    public function forumOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table , $where, 'COUNT(1)', $output);
    }
    
    public function forumRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table, $this->_fields, $where, $group, $order, $output);
    }

    public function forumAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $this->_fields, $where, $limit, $group, $order, $output);
    }

    public function forumAll_re($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $this->_fields_re, $where, $limit, $group, $order, $output);
    }

    //获取当前文章的tag
    public function forumAll_tagindex($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table_tagindex, $this->_fields_tagindex, $where, $limit, $group, $order, $output);
    }

    public function catOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_cat' , $where, 'COUNT(1)', $output);
    }
    
    public function catRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_cat', $this->_catfield, $where, $group, $order, $output);
    }

    public function catAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_cat', $this->_catfield, $where, $limit, $group, $order, $output);
    }
    
    public function catSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_cat', $data, $returnid, $output);
    }

    public function catUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_cat', $data, $where, $output);
    }

    public function catRemove($where) {
        return $this->Db->delete($this->_table . '_cat', $where);
    }

    public function tagOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_tag' , $where, 'COUNT(1)', $output);
    }

    public function tagRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_tag', $this->_tagfield, $where, $group, $order, $output);
    }

    public function tagAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_tag', $this->_tagfield, $where, $limit, $group, $order, $output);
    }

    public function tagSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_tag', $data, $returnid, $output);
    }

    public function tagUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_tag', $data, $where, $output);
    }

    public function tagRemove($where) {
        return $this->Db->delete($this->_table . '_tag', $where);
    }

    public function cTagOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_cattag' , $where, 'COUNT(1)', $output);
    }

    public function cTagRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_cattag', $this->_ctagfield, $where, $group, $order, $output);
    }

    public function cTagAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_cattag', $this->_ctagfield, $where, $limit, $group, $order, $output);
    }

    public function cTagSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_cattag', $data, $returnid, $output);
    }

    public function cTagUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_cattag', $data, $where, $output);
    }

    public function cTagRemove($where) {
        return $this->Db->delete($this->_table . '_cattag', $where);
    }

    //标签索引
    public function indexOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_tagindex' , $where, 'COUNT(1)', $output);
    }

    public function indexRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_tagindex', $this->_indexfield, $where, $group, $order, $output);
    }

    public function indexAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_tagindex', $this->_indexfield, $where, $limit, $group, $order, $output);
    }

    public function indexSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_tagindex', $data, $returnid, $output);
    }

    public function indexUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_tagindex', $data, $where, $output);
    }

    public function indexRemove($where) {
        return $this->Db->delete($this->_table . '_tagindex', $where);
    }
	
	//点赞
	public function praiseOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_praise' , $where, 'COUNT(1)', $output);
    }
    
    public function praiseRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_praise', $this->_praisefield, $where, $group, $order, $output);
    }
    
    public function praiseSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_praise', $data, $returnid, $output);
    }

    public function praiseUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_praise', $data, $where, $output);
    }
	
	public function praiseRemove($where) {
        return $this->Db->delete($this->_table . '_praise', $where);
    }
    //点击量
    public function clickUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table, $data, $where, $output);
    }

    public function queryAll($sql){
        return $this->Db->FetchQuery($sql);
    }
}
