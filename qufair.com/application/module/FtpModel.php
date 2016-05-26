<?php
class FtpModel extends Module{
	public function __construct(){
		parent::__construct();
		$this->_table='ftp';
	}
	public function GetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table,$where,'COUNT(1)',$output);
	}
	public function GetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table,array('id','type','enabled','url','host','username','password','port','dir','ssl'),$where,$group,$order,$output);
	}
	public function GetAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table,array('id','type','enabled','url','host','username','password','port','dir','ssl'),$where,$limit,$group,$order,$output);
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