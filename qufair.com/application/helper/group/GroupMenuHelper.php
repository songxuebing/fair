<?php
class GroupMenuHelper extends Helper{
	var $GroupModel;
	public function __construct(){
		$this->GroupModel=$this->LoadModel('Group');
	}
	
        public function GetMenuAll($where){
                return $this->GroupModel->GetMenuAll($where);
        }
        public function GetMenuRow($where){
                return $this->GroupModel->GetMenuRow($where);
        }
        public function MenuUpdate($data,$where){
                return $this->GroupModel->MenuUpdate($data,$where);
        }
        public function MenuSave($data){
                return $this->GroupModel->MenuSave($data);
        }      
}