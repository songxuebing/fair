<?php
class FtpListHelper extends Helper{
	var $FtpModel;
	public function __construct(){
		$this->FtpModel=$this->LoadModel('Ftp');
	}
	public function GetList($where,$limit,$page,$Param){
		$FtpRow['One']=$this->FtpModel->GetOne($where);
		if($FtpRow['One']>0){
			$FtpRow['All']=$this->FtpModel->GetAll($where,array($page,$limit),null,array("id DESC"));
			Pagination::SetUrl($Param);
			$FtpRow['Page']=Pagination::GetHtml($limit,$page,$FtpRow['One']);
		}
		return $FtpRow;
	}
}