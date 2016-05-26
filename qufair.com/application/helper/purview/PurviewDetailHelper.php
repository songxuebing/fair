<?php
class PurviewDetailHelper extends Helper{
	var $PurviewModel;
	public function __construct(){
		$this->PurviewModel=$this->LoadModel('Purview');
	}
	public function Check($Param){
		if(empty($Param['name'])){
			ErrorMsg::Debug('权限名称不能为空');
		}
		if(empty($Param['code'])){
			ErrorMsg::Debug('权限编码不能为空');
		}
	}
	public function GetId($id='0'){
		Cache::Set('purview','detail',NOW_TIME,0);
		if(!$PurviewRowCache=Cache::Get('id_'.$id)){
			$where=array();
			$where['`id` = ?']=$id;
			$PurviewRow=$this->PurviewModel->GetRow($where);
			Cache::Save('id_'.$id,$PurviewRow);
		}else{
			$PurviewRow=$PurviewRowCache;
		}
		return $PurviewRow;
	}
	public function Save($data,$returnid=false,$output=false){
		return $this->PurviewModel->Save($data,$returnid,$output);
	}
	public function Update($data,$where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->PurviewModel->Update($data,$where,$output);
	}
	public function Delete($where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->PurviewModel->Delete($where,$output);
	}
	public function CacheRemove($module='index',$id='0'){
		Cache::Set('purview','detail');
		if(is_array($id)){
			foreach($id AS $value){
				Cache::Delete('id_'.$value);
			}
		}else{
			Cache::Delete('id_'.$id);
		}
		Cache::Set('purview','list');
		Cache::Delete('array_'.$module);
	}
}