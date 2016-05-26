<?php
class GroupListHelper extends Helper{
	var $GroupModel;
	public function __construct(){
		$this->GroupModel=$this->LoadModel('Group');
	}
	public function GetId($Id='0'){
		Cache::Set('group','detail',NOW_TIME,0);
		if(!$GroupRowCache=Cache::Get('id_'.$Id)){
			$where=array();
			$where['`id` = ?']=$Id;
			$GroupRow=$this->GroupModel->GetRow($where);
			if(!empty($GroupRow['role'])){
				$GroupRow['role']=unserialize($GroupRow['role']);
			}
			Cache::Save('id_'.$Id,$GroupRow);
		}else{
			$GroupRow=$GroupRowCache;
		}
		return $GroupRow;
	}
        public function GetRow($where){
                return $this->GroupModel->GetRow($where);
        }
        public function GetAllWhere($where){
                $GroupAll=$this->GroupModel->GetAll($where);
                return $GroupAll;
        }
	public function GetAll($Param){
		Cache::Set('group','detail',NOW_TIME,0);
		if(!$GroupAllCache=Cache::Get('all')){
			$where=array();
			$GroupAll=$this->GroupModel->GetAll($where);
			Cache::Save('all',$GroupAll);
		}else{
			$GroupAll=$GroupAllCache;
		}
		return $GroupAll;
	}
        public function Update($data,$where){
                return $this->GroupModel->update($data,$where);
        }
        public function Save($data){
                return $this->GroupModel->add($data);
        }
        public function Delete($where){
                return $this->GroupModel->delete($where);
        }        
}