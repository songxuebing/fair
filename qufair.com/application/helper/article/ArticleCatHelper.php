<?php
class ArticleCatHelper extends Helper{
    var $ArticleCatModel;
    public function __construct(){
        $this->ArticleCatModel=$this->LoadModel('ArticleCat');
    }

    //文章分类
    public function GetAllCat($id='all'){
        $where=array();
        if($id=='all'){
            $where['`cat_id` > ?'] = 0;
        }
        return $this->ArticleCatModel->GetCatAll($where,NULL,NULL,array('sort_order asc','cat_id asc'));
    }
    public function getCatRow($where){
        if(is_numeric($where)){
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->ArticleCatModel->GetCatRow($where);
    }
    public function GetCatSort($id){
        $data=$this->GetAllCat($id);
        return $this->Tree($data);
    }

    public function Tree($list,$pid=0,$level=0,$html='&nbsp;&nbsp;&nbsp;&nbsp;'){
        static $Tree = array();
        foreach($list as $v){
            if($v['parent_id'] == $pid){
                $v['sort_order'] = $level;
                $v['html'] = str_repeat($html,$level);
                $Tree[] = $v;
                self::Tree($list,$v['cat_id'],$level+1);
            }
        }
        return $Tree;
    }
}