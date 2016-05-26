<?php

class EditorUploadHelper extends Helper {

    var $TempPath;
    var $UserConfig = array();

    public function __construct($member, $table = '') {
        if(empty($member)){
            $this->UserConfig = Cookie::GetMember('Admin');
            if (empty($this->UserConfig)) {
                $this->UserConfig = Cookie::GetMember('User');
            }
        }else{
            $this->UserConfig = $member;
        }
    }

    /** 上传图片 */
    public function ImageUpload($file_name = 'imgFile',$table='attach') {
        $Row = array('id' => NOW_TIME . StringCode::RandomCode(8, 'num'), 'member' => $this->UserConfig['Id'], 'dateline' => NOW_TIME, 'ftp' => '0', 'ftpurl' => '/attach');
        $this->TempPath = '';
        if (!empty($_FILES[$file_name]['tmp_name'])) {
            $this->LoadHelper('upload/AttachHelper');
            switch($table){
                case 'attach':
                    $path = '';
                    break;
                case 'avatar':
                    $path = 'avatar/'.$this->UserConfig['Id'];
                    if($_FILES[$file_name]['size'] > 2097152){
                        ErrorMsg::Debug('文件大小不能超过2M');
                    }
                    break;
                default :
                    $path = '';
                    break;
            }
            $AttachHelper = new AttachHelper($this->UserConfig['Id'], $table ,$path);
            $ImageRow = $AttachHelper->Submit($_FILES[$file_name]);
            //$msg=array('url'=>$ImageRow['path'],'localname'=>$ImageRow['title'],'id'=>$ImageRow['id'],'type'=>'image');
            //echo json_encode(array('error' => 0, 'url' => $ImageRow['path']));die();
            ErrorMsg::Debug($ImageRow['path'], TRUE);
        }
        ErrorMsg::Debug('上传失败');
        //$this->ErrorAction(1,'上传失败');
    }
	
	
	/** 上传图片 */
    public function ImageUploadApp($file_name = 'imgFile',$table='attach',$member_id = 0) {
        $Row = array('id' => NOW_TIME . StringCode::RandomCode(8, 'num'), 'member' => $member_id, 'dateline' => NOW_TIME, 'ftp' => '0', 'ftpurl' => '/attach');
        $this->TempPath = '';
        if (!empty($_FILES[$file_name]['tmp_name'])) {
            $this->LoadHelper('upload/AttachHelper');
            switch($table){
                case 'attach':
                    $path = '';
                    break;
                case 'avatar':
                    $path = 'avatar/'.$member_id;
                    if($_FILES[$file_name]['size'] > 2097152){
                        ErrorMsg::Debug('文件大小不能超过2M');
                    }
                    break;
                default :
                    $path = '';
                    break;
            }
            $AttachHelper = new AttachHelper($member_id, $table ,$path);
            $ImageRow = $AttachHelper->Submit($_FILES[$file_name]);
            //$msg=array('url'=>$ImageRow['path'],'localname'=>$ImageRow['title'],'id'=>$ImageRow['id'],'type'=>'image');
            //echo json_encode(array('error' => 0, 'url' => $ImageRow['path']));die();
			return array('code' => 0,'path'=>$ImageRow['path']);
        }
		return array('code' => 1,'path'=>'');
    }

    /** 错误处理
     *
     * @param string $err
     * @param string $msg */
    public function ErrorAction($err = '', $msg = '') {
        if (!empty($this->TempPath)) {
            unlink($this->TempPath);
        }
        //$msg=preg_replace(array_keys($this->Htmlzip),array_values($this->Htmlzip),$msg);
        die(json_encode(array('error' => $err, 'message' => $msg)));
    }

}