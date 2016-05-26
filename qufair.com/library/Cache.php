<?php
// amespace Library\CacheClass;
class Cache{
	public static $_Cache=array();
	public static $Memcache=array();
	public static function Set($controller,$action,$time=0,$memcache=0){
		self::$_Cache=Config::GetCache();
		self::$_Cache['time']=$time;
		self::$_Cache['memcache']=$memcache;
		self::$_Cache['controller']=$controller;
		self::$_Cache['action']=$action;
		if(!empty(self::$_Cache['enabled'])&&!empty(self::$_Cache['memcache'])){
			self::$Memcache=new Memcache();
			if(empty(self::$_Cache['pconnect'])){
				self::$Memcache->connect(self::$_Cache['host'],self::$_Cache['port']);
			}else{
				self::$Memcache->pconnect(self::$_Cache['host'],self::$_Cache['port']);
			}
		}else{
			self::MakeDir(DATA_PATH.'/caches/'.self::$_Cache['controller'].'/'.self::$_Cache['action']);
		}
	}
	public static function Save($key,$value){
		if(!empty(self::$_Cache['enabled'])&&!empty(self::$_Cache['memcache'])){
			self::$Memcache->set($key,$value,MEMCACHE_COMPRESSED,self::$_Cache['time']);
		}else{
			$data="<?php\n";
			$data.="return array(\n";
			$data.="	'time'=>'".(NOW_TIME+self::$_Cache['time'])."',\n";
			$data.="	'data'=>\"".addslashes(serialize($value))."\",\n";
			$data.=");\n";
			$data.="?>";
			IO::PutFile(DATA_PATH.'/caches/'.self::$_Cache['controller'].'/'.self::$_Cache['action'].'/'.$key.'.php',$data);
		}
	}
	public static function Get($key){
		if(!empty(self::$_Cache['enabled'])&&!empty(self::$_Cache['memcache'])){
			return self::$Memcache->get($key);
		}else{
			if(file_exists(DATA_PATH.'/caches/'.self::$_Cache['controller'].'/'.self::$_Cache['action'].'/'.$key.'.php')){
				$cachedata=include DATA_PATH.'/caches/'.self::$_Cache['controller'].'/'.self::$_Cache['action'].'/'.$key.'.php';
				if($cachedata['time']>NOW_TIME){return unserialize(stripcslashes($cachedata['data']));}
			}
		}
		return false;
	}
	public static function Delete($key){
		if(!empty(self::$_Cache['enabled'])&&!empty(self::$_Cache['memcache'])){
			self::$Memcache->delete($key,10);
		}else{
			if(file_exists(DATA_PATH.'/caches/'.self::$_Cache['controller'].'/'.self::$_Cache['action'].'/'.$key.'.php')){
				unlink(DATA_PATH.'/caches/'.self::$_Cache['controller'].'/'.self::$_Cache['action'].'/'.$key.'.php');
			}
		}
	}
	public static function Clear(){
		$dir=DATA_PATH.'/caches/'.self::$_Cache['controller'].'/'.self::$_Cache['action'];
		if(is_dir($dir)){
			$hand=opendir($dir);
			while(false!==($file=readdir($hand))){
				if($file!="."&&$file!='..'&&$file!=''){
					unlink($dir."/".$file);
				}
			}
			closedir($hand);
			rmdir($dir);
		}
	}
        public static function deldir($dir=''){
            if(empty($dir)){
                $dir=DATA_PATH.'/caches/';
            }
            $dh=opendir($dir);
            while ($file=readdir($dh)) {
                if($file!="." && $file!="..") {
                    $fullpath=$dir."/".$file;
                    if(!is_dir($fullpath)) {
                        unlink($fullpath);
                    } else {
                        self::deldir($fullpath);
                    }
                }
            }
            closedir($dh);
            if(rmdir($dir)) {
                return true;
            } else {
                return false;
            }
        }
	public static function MakeDir($folder){
		$reval=false;
		if(!file_exists($folder)){
			/* 如果目录不存在则尝试创建该目录 */
			@umask(0);
			/* 将目录路径拆分成数组 */
			preg_match_all('/([^\/]*)\/?/i',str_replace(DATA_PATH.'/','',$folder),$atmp);
			/* 如果第一个字符为/则当作物理路径处理 */
			$base=DATA_PATH.'/';
			/* 遍历包含路径信息的数组 */
			foreach($atmp[1] as $val){
				if(''!=$val){
					$base.=$val;
					if('..'==$val||'.'==$val){
						/* 如果目录为.或者..则直接补/继续下一个循环 */
						$base.='/';
						continue;
					}
				}else{
					continue;
				}
				$base.='/';
				if(!file_exists($base)){
					/* 尝试创建目录，如果创建失败则继续循环 */
					if(function_exists('mkdir')&&mkdir($base,0777)){
						function_exists('chmod')&&chmod($base,0777);
						$reval=true;
					}
				}
			}
		}else{
			/* 路径已经存在。返回该路径是不是一个目录 */
			$reval=is_dir($folder);
		}
		clearstatcache();
		return $reval;
	}
}