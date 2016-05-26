<?php

class ArticleHelper extends Helper {

    var $ArticleModel;

    public function __construct() {
        $this->ArticleModel = $this->LoadModel('Article');
    }

    public function GetId($Id = '0') {
        $where = array();
        $where['`article_id` = ?'] = $Id;
        $ArticleRow = $this->ArticleModel->GetRow($where);

        return $ArticleRow;
    }

    public function getRow($where, $group = null, $order = null, $output = false) {
        return $this->ArticleModel->GetRow($where, $group, $order, $output);
    }

    public function GetAllWhere($where, $limit, $page, $Param) {
        $data['One'] = $this->ArticleModel->GetOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->ArticleModel->GetAll($where, array($page, $limit), NULL, array('add_time desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function Update($data, $where) {
        return $this->ArticleModel->update($data, $where);
    }

    public function save($data) {
        return $this->ArticleModel->add($data);
    }

    public function Delete($where) {
        return $this->ArticleModel->delete($where);
    }

    //文章分类
    public function GetAllCat($id = 'all') {
        $where = array();
        if ($id == 'all') {
            $where['`cat_id` > ?'] = 0;
        }
        return $this->ArticleModel->GetCatAll($where, NULL, NULL, array('sort_order asc', 'cat_id asc'));
    }

    public function GetCatSort($id) {
        $data = $this->GetAllCat($id);
        return $this->Tree($data);
    }

    public function Tree($list, $pid = 0, $level = 0, $html = '&nbsp;&nbsp;&nbsp;&nbsp;') {
        static $Tree = array();
        foreach ($list as $v) {
            if ($v['parent_id'] == $pid) {
                $v['sort_order'] = $level;
                $v['html'] = str_repeat($html, $level);
                $Tree[] = $v;
                self::Tree($list, $v['cat_id'], $level + 1);
            }
        }
        return $Tree;
    }

    public function GetCatRow($cat_id = 0) {
        $where = array('`cat_id` = ?' => $cat_id);
        return $this->ArticleModel->GetCatRow($where);
    }

    public function GetCatWhere($where) {
        return $this->ArticleModel->GetCatRow($where);
    }

    public function CatSave($data) {
        return $this->ArticleModel->CatSave($data);
    }

    public function CatUpdate($data, $where) {
        return $this->ArticleModel->CatUpdate($data, $where);
    }

    public function CatRemove($where) {
        return $this->ArticleModel->CatDelete($where);
    }

}