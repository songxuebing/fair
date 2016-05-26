<?php
class ArticleCatModel extends Module{
	public function __construct(){
		parent::__construct();
		$this->_table='article_cat';
        $this->_field = array('cat_id','cat_name','cat_type','keywords','cat_desc','sort_order','parent_id');
	}
    //分类
    public function GetCatRow($where,$group=null,$order=null,$output=false){
        return $this->Db->FetchRow($this->_table,$this->_catfields,$where,$group,$order,$output);
    }
    public function GetCatOne($where,$output=false){
        return $this->Db->FetchOne($this->_table,$where,'COUNT(1)',$output);
    }
    public function GetCatAll($where,$limit=null,$group=null,$order=null,$output=false){
        return $this->Db->FetchAll($this->_table,$this->_catfields,$where,$limit,$group,$order,$output);
    }
    public function CatSave($data,$returnid=TRUE,$output=false){
        return $this->Db->insert($this->_table,$data,$returnid,$output);
    }
    public function CatUpdate($data,$where,$output=false){
        return $this->Db->update($this->_table,$data,$where,$output);
    }
    public function CatDelete($where,$output=false){
        return $this->Db->delete($this->_table,$where,$output);
    }

}