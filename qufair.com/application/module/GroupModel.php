<?php
class GroupModel extends Module{
	public function __construct(){
		parent::__construct();
		$this->_table='group';
                $this->_menutable='group_menu';
	}
	public function GetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table,$where,'COUNT(1)',$output);
	}
	public function GetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table,array('id','name','key','role','crm_menu','phone_menu','system','abbreviation'),$where,$group,$order,$output);
	}
	public function GetAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table,array('id','name','key','role','crm_menu','phone_menu','system','abbreviation'),$where,$group,$order,$output);
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

	public function GetMenuAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_menutable,array('id','code','name','url','function','category'),$where,$group,$order,$output);
	}        
	public function GetMenuRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_menutable,array('id','code','name','url','function','category'),$where,$group,$order,$output);
	}
 	public function MenuSave($data,$returnid=false,$output=false){
		return $this->Db->insert($this->_menutable,$data,$returnid,$output);
	}
	public function MenuUpdate($data,$where,$output=false){
		return $this->Db->update($this->_menutable,$data,$where,$output);
	}       
}