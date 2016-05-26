<?php
class FtpUploadHelper extends Helper{
	var $FtpModel;
	var $FtpUpload;
        var $FtpPath;
	public function __construct($path){
		$this->FtpModel=$this->LoadModel('Ftp');
                $this->FtpPath = $path;
	}
	public function Set($FtpId='0',$Type='image'){
		$this->_Conn=null;
		if(empty($FtpId)){
			$FtpRow=$this->GetRand($Type);
		}else{
			$FtpRow=$this->GetId($FtpId);
		}
		if(!empty($FtpRow)){
			$this->FtpUpload = new FtpUpload();
			$this->FtpUpload->_Id=$FtpRow['id'];
			$this->FtpUpload->_Enabled=$FtpRow['enabled'];
			$this->FtpUpload->_Url=$FtpRow['url'];
			$this->FtpUpload->_Config=array(
				'host' => $FtpRow['host'],
				'username' => $FtpRow['username'],
				'password' => Cookie::FauthCode($FtpRow['password'],'DECODE'),
				'port' => $FtpRow['port'],
				'dir' => $FtpRow['dir'],
				'ssl' => empty($FtpRow['ssl']) ? '0' : '1'
			);
			$this->FtpUpload->_Dir=empty($this->FtpPath) ? date('Ym').'/'.date('d') : $this->FtpPath;
			$this->FtpUpload->FtpInit();
		}
	}
	public function Submit($File){
		$UploadRow = array();
		if(!empty($this->FtpUpload->_Enabled)){
			$UploadRow['path']=$this->FtpUpload->FtpFile($File['url'],$File['name']);
			$UploadRow['ftp']=$this->FtpUpload->_Id;
			$UploadRow['ftpurl']=$this->FtpUpload->_Url;
			$this->FtpUpload->FtpClose();
		}
		return $UploadRow;
	}
	public function GetRand($Type='image'){
		Cache::Set('ftp','list',NOW_TIME,0);
		if(!$FtpAllCache=Cache::Get('all_'.$Type)){
			$where=array();
			$where['`type` = ?']=$Type;
			$where['`enabled` = ?']='1';
			$FtpAll=$this->FtpModel->GetAll($where,$limit=null,$group=null,$order=null,false);
			Cache::Save('all_'.$Type,$FtpAll);
		}else{
			$FtpAll=$FtpAllCache;
		}
		if(empty($FtpAll)){return false;}
		mt_srand(doubleval(microtime()*1000000));
		return $FtpAll[array_rand($FtpAll,1)];
	}
	public function GetId($Id){
		Cache::Set('ftp','detail',NOW_TIME,0);
		if(!$FtpRowCache=Cache::Get('id_'.$Id)){
			$where=array();
			$where['`id` = ?']=$Id;
			$FtpRow=$this->FtpModel->GetRow($where);
			Cache::Save('id_'.$Id,$FtpRow);
		}else{
			$FtpRow=$FtpRowCache;
		}
		return $FtpRow;
	}
}