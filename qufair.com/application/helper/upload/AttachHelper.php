<?php
class AttachHelper extends Helper{
	var $AttachModel;
	var $AttachUpload;
	var $FtpUpload;
	var $UploadRow = array();
        var $FtpPath;
	public function __construct($member,$table,$path=''){
		$this->AttachModel=$this->LoadModel('Attach');
		$this->UploadRow=array(
			'id'=>NOW_TIME.StringCode::RandomCode(8,'num'),
			'class'=>$table,
			'member'=>$member,
			'dateline'=>NOW_TIME,
			'ftp'=>'0',
			'ftpurl'=>'/attach'
		);
		$this->AttachUpload = new AttachUpload($path);
                $this->FtpPath = $path;
	}
	/** 上传图片处理
	 *
	 * @param unknown $LoginFailed
	 * @param unknown $param
	 * @return multitype:number string unknown Ambigous <> */
	public function Submit($file){
                //
                if($file['type'] != 'image/gif' && $file['type'] != 'image/png' && $file['type'] != 'image/x-png' && $file['type'] != 'image/jpeg' && $file['type'] != 'image/pjpeg' && $file['type'] != 'image/jpg' && $file['type'] != 'image/bmp'){
                    ErrorMsg::Debug('文件格式错误');
                }
		$FileFilter=$this->AttachUpload->UploadFile($file);
		$this->UploadRow['title']=$file['name'];
		$this->UploadRow['path']=$FileFilter['url'];
		$this->UploadRow['size']=$FileFilter['size'];
		if(function_exists('exif_read_data')){
			$exif = exif_read_data($file['tmp_name']);
			$this->UploadRow['filetime'] = empty($exif['FileDateTime']) ? NOW_TIME : $exif['FileDateTime'];
		}
		
		$this->LoadHelper('ftp/FtpUploadHelper');
		$FtpUploadHelper = new FtpUploadHelper($this->FtpPath);
		$FtpUploadHelper->Set(1,'image');
		if(false != ($UploadRow = $FtpUploadHelper->Submit($FileFilter))){
			$this->UploadRow['path']=$UploadRow['path'];
			$this->UploadRow['ftp']=$UploadRow['ftp'];
			$this->UploadRow['ftpurl']=$UploadRow['ftpurl'];
		}
		$this->AttachModel->ImageSave($this->UploadRow);
		return $this->UploadRow;
	}
        public function imageSave($data){
                return $this->AttachModel->ImageSave($data);
        }
        public function fileSave($data){
                return $this->AttachModel->FileSave($data);
        }
	public function Update($no,$table){
		$this->AttachModel->ImageUpdate(array('class'=>$table,'no'=>$no),array('`id` = ?'=>$this->UploadRow['id']));
	}
	public function Remove($where){
		$ImageAll = $this->AttachModel->ImageAll($where,null,null,null,false);
		foreach($ImageAll AS $value){
			if(empty($value['ftp'])){
				@unlink(WEB_PATH.$value['path']);
			}else{
				$FtpUploadHelper = new FtpUploadHelper();
				$FtpUploadHelper->Set($value['ftp']);
				$FtpUploadHelper->FtpUpload->FtpChdir($FtpUploadHelper->FtpUpload->_Config['dir'].dirname($value['path']));
				$FtpUploadHelper->FtpUpload->FtpDelete(basename($value['path']));
				$FtpUploadHelper->FtpUpload->FtpClose();
			}
			$this->AttachModel->ImageDelete($where);
		}
		
	}
	/** 上传文件处理
	 *
	 * @param unknown $LoginFailed
	 * @param unknown $param
	 * @return multitype:number string unknown Ambigous <> */
	public function FileSubmit($file,$ftp = TRUE){
		$FileFilter=$this->AttachUpload->UploadFile($file);
		$this->UploadRow['title']=$file['name'];
		$this->UploadRow['path']=$FileFilter['url'];
		$this->UploadRow['size']=$FileFilter['size'];
		if($ftp){
                    $this->LoadHelper('ftp/FtpUploadHelper');
                    $FtpUploadHelper = new FtpUploadHelper('');
                    $FtpUploadHelper->Set(0,'file');
                    if(false != ($UploadRow = $FtpUploadHelper->Submit($FileFilter))){
                            $this->UploadRow['path']=$UploadRow['ftpurl'].$UploadRow['path'];
                            $this->UploadRow['ftp']=$UploadRow['ftp'];
                            $this->UploadRow['ftpurl']=$UploadRow['ftpurl'];
                    }
                }
		$this->AttachModel->FileSave($this->UploadRow);
		return $this->UploadRow;
	}
	public function FileUpdate($no,$table){
		$this->AttachModel->FileUpdate(array('class'=>$table,'no'=>$no),array('`id` = ?'=>$this->UploadRow['id']));
	}
	public function FileRemove($where){
		$ImageAll = $this->AttachModel->FileAll($where,null,null,null,false);
		foreach($ImageAll AS $value){
			if(empty($value['ftp'])){
				@unlink(WEB_PATH.$value['path']);
			}else{
				$FtpUploadHelper = new FtpUploadHelper();
				$FtpUploadHelper->Set($value['ftp']);
				$FtpUploadHelper->FtpUpload->FtpChdir($FtpUploadHelper->FtpUpload->_Config['dir'].dirname($value['path']));
				$FtpUploadHelper->FtpUpload->FtpDelete(basename($value['path']));
				$FtpUploadHelper->FtpUpload->FtpClose();
			}
			$this->AttachModel->FileDelete($where);
		}
	}
        
}