<?php
class PurviewModel extends Module{
	public function __construct(){
		parent::__construct();
		$this->_table='purview';
	}
	public function GetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table,$where,'COUNT(1)',$output);
	}
	public function GetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table,array('id','module','parent','code','name','is_menu'),$where,$group,$order,$output);
	}
	public function GetAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table,array('id','module','parent','code','name','sort_order','is_menu'),$where,$limit,$group,$order,$output);
	}
	public function Save($data,$returnid=false,$output=false){
		//$this->Db->replace($this->_table,$data,$returnid,$output);
		return $this->Db->insert($this->_table,$data,$returnid,$output);
	}
	public function Update($data,$where,$output=false){
		return $this->Db->update($this->_table,$data,$where,$output);
	}
	public function Delete($where,$output=false){
		return $this->Db->delete($this->_table,$where,$output);
	}
}