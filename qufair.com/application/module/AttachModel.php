<?php
class AttachModel extends Module{
	public function __construct(){
		parent::__construct();
		$this->_table='attach';
	}
	public function ImageSave($data){
		return $this->Db->insert($this->_table.'_image',$data);
	}
	public function ImageUpdate($data,$where){
		return $this->Db->update($this->_table.'_image',$data,$where);
	}
	public function FileSave($data){
		return $this->Db->insert($this->_table.'_file',$data);
	}
	public function FileUpdate($data,$where){
		return $this->Db->update($this->_table.'_file',$data,$where);
	}
        public function GetAll($where,$limit){
            return $this->Db->FetchAll($this->_table.'_image',array(
                'id',
                'class',
                'no',
                'title',
                'member',
                'path',
                'size',
                'ftpurl',
                'dateline'
            ),$where,$limit,NULL,array('dateline DESC','id DESC'));       
        }
}