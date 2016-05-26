<?php

class ArticleModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'article';
        $this->_field = array('article_id', 'cat_id', 'title', 'content', 'author', 'author_email', 'keywords', 'is_open', 'add_time', 'clicks');

        $this->_catfields = array('cat_id', 'cat_name', 'cat_type', 'keywords', 'cat_desc', 'sort_order', 'parent_id', 'is_open');
    }

    //文章
    public function GetOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table, $where, 'COUNT(1)', $output);
    }

    public function GetRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table, $this->_field, $where, $group, $order, $output);
    }

    public function GetAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $this->_field, $where, $limit, $group, $order, $output);
    }

    public function delOne($where) {
        return $this->Db->delete($this->_table, $where);
    }

    //分类
    public function GetCatRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table . '_cat', $this->_catfields, $where, $group, $order, $output);
    }

    public function GetCatOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table . '_cat', $where, 'COUNT(1)', $output);
    }

    public function GetCatAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table . '_cat', $this->_catfields, $where, $limit, $group, $order, $output);
    }

    public function CatSave($data, $returnid = TRUE, $output = false) {
        return $this->Db->insert($this->_table . '_cat', $data, $returnid, $output);
    }

    public function CatUpdate($data, $where, $output = false) {
        return $this->Db->update($this->_table . '_cat', $data, $where, $output);
    }

    public function CatDelete($where, $output = false) {
        return $this->Db->delete($this->_table . '_cat', $where, $output);
    }

}