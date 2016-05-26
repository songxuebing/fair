<?php
class FtpDetailHelper extends Helper{
	var $FtpModel;
	public function __construct(){
		$this->FtpModel=$this->LoadModel('Ftp');
	}
	public function GetId($id='0'){
		Cache::Set('ftp','detail',NOW_TIME,0);
		if(!$FtpRowCache=Cache::Get('id_'.$id)){
			$where=array();
			$where['`id` = ?']=$id;
			$FtpRow=$this->FtpModel->GetRow($where);
			Cache::Save('id_'.$id,$FtpRow);
		}else{
			$FtpRow=$FtpRowCache;
		}
		return $FtpRow;
	}
	
	public function Check($Param){
		if(empty($Param['url'])){
			ErrorMsg::Debug('链接地址不能为空');
		}
		if(empty($Param['host'])){
			ErrorMsg::Debug('主机不能为空');
		}
	}
	public function Save($data,$returnid=false,$output=false){
		return $this->FtpModel->Save($data,$returnid,$output);
	}
	public function Update($data,$where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->FtpModel->Update($data,$where,$output);
	}
	public function Delete($where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->FtpModel->Delete($where,$output);
	}
	
	public function CacheRemove($module='image',$id='0'){
		Cache::Set('ftp','detail');
		if(is_array($id)){
			foreach($id AS $value){
				Cache::Delete('id_'.$value);
			}
		}else{
			Cache::Delete('id_'.$id);
		}
		
		Cache::Set('ftp','list');
		Cache::Delete('type_'.$module);
	}
}