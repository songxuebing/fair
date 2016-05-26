<?php
/**
 * @copyright [trexwb] (C)2009-2010 Cioip Inc.
 * $RCSfile: FtpUpload.php
 * $Revision: 1.0.0.0 $
 * $Date: 2009/04/01 09:00:00 $
 */
class FtpUpload{
	var $_Conn;
	var $_Id;
	var $_Enabled;
	var $_Url;
	var $_Dir;
	var $_Config;
	public function FtpInit(){
		if(!$this->_Conn){
			$this->_Conn=$this->FtpConnect($this->_Config);
			if(!$this->_Conn){return ErrorMsg::Debug('不能连接服务器');}
		}
		if(!$this->FtpLgin($this->_Config)){return ErrorMsg::Debug('登录服务器失败');}
		if(!$this->FtpChdir($this->_Config['dir'])){return ErrorMsg::Debug($this->_Config['dir'].'目录不存在');}
	}
	public function FtpFile($file,$name){
		if($this->_Enabled=='1'){
			$this->FtpMkdir($this->_Dir);
			if($this->FtpPut(WEB_PATH.$file,$name)){
				$this->FtpChmod(0777,$name);
				@unlink(WEB_PATH.$file);
				return $file;
				// return $this->_Url.$name;
			}
		}
		return $file;
	}
	/**
	 * 为要上传到 FTP 服务器的文件分配空间
	 * Enter description here ...
	 */
	public function FtpAlloc(){
		return ftp_alloc();
	}
	/**
	 * 把当前目录改变为 FTP 服务器上的父目录
	 * Enter description here ...
	 */
	public function FtpCdup(){
		return ftp_cdup($this->_Conn);
	}
	/**
	 * 改变 FTP 服务器上的当前目录
	 * Enter description here ...
	 * param unknown_type $dir
	 */
	public function FtpChdir($dir){
		return @ftp_chdir($this->_Conn,$dir);
	}
	/**
	 * 通过 FTP 设置文件上的权限
	 * Enter description here ...
	 * param unknown_type $file
	 * param unknown_type $chomd
	 */
	public function FtpChmod($file,$chomd){
		return @ftp_chmod($this->_Conn,$chomd,$file);
	}
	/**
	 * 关闭 FTP 连接
	 * Enter description here ...
	 */
	public function FtpClose(){
		return ftp_close($this->_Conn);
		return ftp_quit($this->_Conn);
	}
	/**
	 * 打开 FTP 连接
	 * Enter description here ...
	 * param unknown_type $option
	 */
	public function FtpConnect($option){
		if(function_exists('ftp_ssl_connect')&&!empty($option['ssl'])) return ftp_ssl_connect($option['host']);
		return ftp_connect($option['host']);
	}
	/**
	 * 删除 FTP 服务器上的文件
	 * Enter description here ...
	 * param unknown_type $file
	 */
	public function FtpDelete($file){
		return ftp_delete($this->_Conn,$file);
	}
	/**
	 * 在 FTP 上执行一个程序/命令
	 * Enter description here ...
	 */
	public function FtpExec(){
		return ftp_exec();
	}
	/**
	 * 从 FTP 服务器上下载一个文件并保存到本地一个已经打开的文件中
	 * Enter description here ...
	 */
	public function FtpGet(){
		return ftp_get();
		return ftp_nb_get();
	}
	/**
	 * 
	 * Enter description here ...
	 */
	public function ftpFget(){
		return ftp_fget();
		return ftp_nb_fget();
	}
	/**
	 * 上传一个已打开的文件，并在 FTP 服务器上把它保存为一个文件
	 * Enter description here ...
	 * param unknown_type $source
	 * param unknown_type $target
	 */
	public function FtpPut($source,$target){
		ftp_pasv($this->_Conn,true);
		return ftp_put($this->_Conn,$target,$source,FTP_BINARY);
		return ftp_nb_put($this->_Conn,$target,$source,FTP_BINARY);
	}
	/**
	 * 
	 * Enter description here ...
	 * param unknown_type $source
	 * param unknown_type $target
	 */
	public function FtpFput($source,$target){
		return ftp_fput($this->_Conn,$target,$source,FTP_BINARY);
		return ftp_nb_fput($this->_Conn,$target,$source,FTP_BINARY);
	}
	/**
	 * 返回当前 FTP 连接的各种不同的选项设置
	 * Enter description here ...
	 */
	public function FtpGetoption(){
		return ftp_get_option();
	}
	/**
	 * 登录 FTP 服务器
	 * Enter description here ...
	 * param unknown_type $option
	 */
	public function FtpLgin($option){
		return ftp_login($this->_Conn,$option['username'],$option['password']);
	}
	/**
	 * 返回指定文件的最后修改时间
	 * Enter description here ...
	 */
	public function FtpMdtm(){
		return ftp_mdtm();
	}
	/**
	 * 在 FTP 服务器创建一个新目录
	 * Enter description here ...
	 * param unknown_type $path
	 */
	public function FtpMkdir($path){
		$path_arr=explode('/',$path); // 取目录数组
		$path_div=count($path_arr); // 取层数
		foreach($path_arr as $val){
			if($this->FtpChdir($val)==FALSE&&!empty($val)){
				if(ftp_mkdir($this->_Conn,$val)){
					$this->FtpChdir($val);
					$this->FtpChmod(0777,$val);
				}else{
					return ErrorMsg::Debug('目录'.$val.'不能建立');
				}
			}
		}
		// 回退到根
		// for($i=1;$i<=$path_div;$i++){
		// $this->FtpCdup();
		// }
		return true;
	}
	/**
	 * 连续获取／发送文件
	 * Enter description here ...
	 */
	public function FtpNbcontinue(){
		return ftp_nb_continue($this->_Conn);
	}
	/**
	 * 返回指定目录的文件列表
	 * Enter description here ...
	 */
	public function FtpNlist(){
		return ftp_nlist($this->_Conn);
		return ftp_rawlist($this->_Conn);
	}
	/**
	 * 返回当前 FTP 被动模式是否打开
	 * Enter description here ...
	 */
	public function FtpPasv(){
		return ftp_pasv($this->_Conn);
	}
	/**
	 * 返回当前目录名称
	 * Enter description here ...
	 */
	public function FtpPwd(){
		return ftp_pwd($this->_Conn);
	}
	/**
	 * 向 FTP 服务器发送一个 raw 命令
	 * Enter description here ...
	 */
	public function FtpRaw($command){
		return ftp_raw($this->_Conn,$command);
	}
	/**
	 * 重命名 FTP 服务器上的文件或目录
	 * Enter description here ...
	 */
	public function FtpRename($from,$to){
		return ftp_rename($this->_Conn,$from,$to);
	}
	/**
	 * 删除 FTP 服务器上的目录
	 * Enter description here ...
	 */
	public function FtpRmdir($dir){
		return ftp_rmdir($this->_Conn,$dir);
	}
	/**
	 * 设置各种 FTP 运行时选项
	 * Enter description here ...
	 */
	public function FtpSetoption(){
		return ftp_set_option();
	}
	/**
	 * 向服务器发送 SITE 命令
	 * Enter description here ...
	 */
	public function FtpSite(){
		return ftp_site();
	}
	/**
	 * 返回指定文件的大小
	 * Enter description here ...
	 */
	public function FtpSize(){
		return ftp_size();
	}
	/**
	 * 返回远程 FTP 服务器的系统类型标识符
	 * Enter description here ...
	 */
	public function FtpSystype(){
		return ftp_systype();
	}
}
?>