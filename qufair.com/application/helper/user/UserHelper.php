<?php
class UserHelper extends Helper{
	var $ArticleModel;
	public function __construct(){
		$this->ArticleModel=$this->LoadModel('article');
	}

    public function GetId($Id='0'){
        $where=array();
        $where['`article_id` = ?']=$Id;
        $ArticleRow=$this->ArticleModel->GetRow($where);

        return $ArticleRow;
    }

    public function getRow($where){
            return $this->ArticleModel->GetRow($where);
    }

    public function GetAllWhere($where,$limit,$page,$Param){
        $data['One']=$this->ArticleModel->GetOne($where);
		
        if(!empty($data['One'])){
            $data['All']=$this->ArticleModel->GetAll($where,array($page,$limit),NULL,array('article_id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function Update($data,$where){
            return $this->ArticleModel->update($data,$where);
    }
    public function save($data){
            return $this->ArticleModel->add($data);
    }
    public function Delete($where){
            return $this->ArticleModel->delete($where);
    }
}