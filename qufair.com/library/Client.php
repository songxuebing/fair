<?php
// amespace Library\ClientClass;
class Client{
	public static function GetBrowser(){
		if(empty($_SERVER['HTTP_USER_AGENT'])){return '';}
		$agent=$_SERVER['HTTP_USER_AGENT'];
		$browser='';
		$browser_ver='';
		if(preg_match('/MSIE\s([^\s|;]+)/i',$agent,$regs)){
			if(preg_match('/Maxthon/i',$agent,$regs)){
				$browser='Maxthon (IE '.$browser_ver.')';
			}elseif(preg_match('/360SE/i',$agent,$regs)){
				$browser='360 (IE '.$browser_ver.')';
			}elseif(preg_match('/NetCaptor\s([^\s|;]+)/i',$agent,$regs)){
				$browser='NetCaptor (IE '.$browser_ver.')';
			}else{
				$browser='Internet Explorer';
			}
			$browser_ver=empty($regs[1]) ? '' : $regs[1];
		}elseif(preg_match('/FireFox\/([^\s]+)/i',$agent,$regs)){
			$browser='FireFox';
			$browser_ver=$regs[1];
		}elseif(preg_match('/Opera[\s|\/]([^\s]+)/i',$agent,$regs)){
			$browser='Opera';
			$browser_ver=$regs[1];
		}elseif(preg_match('/OmniWeb\/(v*)([^\s|;]+)/i',$agent,$regs)){
			$browser='OmniWeb';
			$browser_ver=$regs[2];
		}elseif(preg_match('/Netscape([\d]*)\/([^\s]+)/i',$agent,$regs)){
			$browser='Netscape';
			$browser_ver=$regs[2];
		}elseif(preg_match('/Chrome\/([^\s]+)/i',$agent,$regs)){
			$browser='Chrome ('.$regs[1].')';
			$browser_ver=$regs[1];
		}elseif(preg_match('/safari\/([^\s]+)/i',$agent,$regs)){
			$browser='Safari';
			$browser_ver=$regs[1];
		}elseif(preg_match('/Lynx\/([^\s]+)/i',$agent,$regs)){
			$browser='Lynx';
			$browser_ver=$regs[1];
		}elseif(preg_match('/iPhone\/([^\s]+)/i',$agent,$regs)){
			$browser='iPhone ('.$regs[1].')';
			$browser_ver=$regs[1];
		}elseif(preg_match('/Android\/([^\s]+)/i',$agent,$regs)){
			$browser='Android ('.$regs[1].')';
			$browser_ver=$regs[1];
		}
		if(!empty($browser)){
			return addslashes($browser.' '.$browser_ver);
		}else{
			return 'Unknow browser';
		}
	}
	/** isSpider 判断是否为搜索引擎蜘蛛
	 *
	 * @access public
	 * @return string */
	public static function isSpider(){
		static $spider=NULL;
		if($spider!==NULL){return $spider;}
		if(empty($_SERVER['HTTP_USER_AGENT'])){return '';}
		$searchengine_bot=array(
			'googlebot',
			'mediapartners-google',
			'baiduspider+',
			'msnbot',
			'yodaobot',
			'yahoo! slurp;',
			'yahoo! slurp china;',
			'iaskspider',
			'sogou web spider',
			'sogou push spider'
		);
		$searchengine_name=array(
			'GOOGLE',
			'GOOGLE ADSENSE',
			'BAIDU',
			'MSN',
			'YODAO',
			'YAHOO',
			'Yahoo China',
			'IASK',
			'SOGOU',
			'SOGOU'
		);
		$spider=strtolower($_SERVER['HTTP_USER_AGENT']);
		foreach($searchengine_bot as $key=>$value){
			if(strpos($spider,$value)!==false){
				$spider=$searchengine_name[$key];
				return $spider;
			}
		}
		return $spider;
	}
	/** GetOs 获得客户端的操作系统
	 *
	 * @access private
	 * @return void */
	public static function GetOs(){
		if(empty($_SERVER['HTTP_USER_AGENT'])){return 'Unknown';}
		$agent=strtolower($_SERVER['HTTP_USER_AGENT']);
		$os='';
		if(strpos($agent,'win')!==false){
			if(strpos($agent,'nt 5.1')!==false){
				$os='Windows XP';
			}elseif(strpos($agent,'nt 5.2')!==false){
				$os='Windows 2003';
			}elseif(strpos($agent,'nt 5.0')!==false){
				$os='Windows 2000';
			}elseif(strpos($agent,'nt 6.0')!==false){
				$os='Windows Vista';
			}elseif(strpos($agent,'nt 6.1')!==false){
				$os='Windows 7';
			}elseif(strpos($agent,'nt')!==false){
				$os='Windows NT';
			}elseif(strpos($agent,'win 9x')!==false&&strpos($agent,'4.90')!==false){
				$os='Windows ME';
			}elseif(strpos($agent,'98')!==false){
				$os='Windows 98';
			}elseif(strpos($agent,'95')!==false){
				$os='Windows 95';
			}elseif(strpos($agent,'32')!==false){
				$os='Windows 32';
			}elseif(strpos($agent,'ce')!==false){
				$os='Windows CE';
			}
		}elseif(strpos($agent,'linux')!==false){
			$os='Linux';
		}elseif(strpos($agent,'unix')!==false){
			$os='Unix';
		}elseif(strpos($agent,'sun')!==false&&strpos($agent,'os')!==false){
			$os='SunOS';
		}elseif(strpos($agent,'ibm')!==false&&strpos($agent,'os')!==false){
			$os='IBM OS/2';
		}elseif(strpos($agent,'mac')!==false&&strpos($agent,'pc')!==false){
			$os='Macintosh';
		}elseif(strpos($agent,'powerpc')!==false){
			$os='PowerPC';
		}elseif(strpos($agent,'aix')!==false){
			$os='AIX';
		}elseif(strpos($agent,'hpux')!==false){
			$os='HPUX';
		}elseif(strpos($agent,'netbsd')!==false){
			$os='NetBSD';
		}elseif(strpos($agent,'bsd')!==false){
			$os='BSD';
		}elseif(strpos($agent,'osf1')!==false){
			$os='OSF1';
		}elseif(strpos($agent,'irix')!==false){
			$os='IRIX';
		}elseif(strpos($agent,'freebsd')!==false){
			$os='FreeBSD';
		}elseif(strpos($agent,'teleport')!==false){
			$os='teleport';
		}elseif(strpos($agent,'flashget')!==false){
			$os='flashget';
		}elseif(strpos($agent,'webzip')!==false){
			$os='webzip';
		}elseif(strpos($agent,'offline')!==false){
			$os='offline';
		}elseif(strpos($agent,'iPhone')!==false){
			$os='iPhone';
		}elseif(strpos($agent,'Android')!==false){
			$os='Android';
		}else{
			$os='Unknown';
		}
		return $os;
	}
	/** GetLocation 返回ip所在地
	 *
	 * @param unknown_type $ip
	 * @return unknown */
	public static function GetLocation($ip){
		static $fp=NULL,$offset=array(),$index=NULL;
		$ip=gethostbyname($ip);
		$ipdot=explode('.',$ip);
		$ip=pack('N',ip2long($ip));
		$ipdot[0]=(int)$ipdot[0];
		$ipdot[1]=(int)$ipdot[1];
		if($ipdot[0]==10||$ipdot[0]==127||($ipdot[0]==192&&$ipdot[1]==168)||($ipdot[0]==172&&($ipdot[1]>=16&&$ipdot[1]<=31))){return 'LAN';}
		if($fp===NULL){
			$fp=fopen(RESOURCES_PATH."/ipdata.dat","r");
			if($fp===false) return 'Invalid IP data file';
			$offset=unpack('Nlen',fread($fp,4));
			if($offset['len']<4) return 'Invalid IP data file';
			$index=fread($fp,$offset['len']-4);
		}
		$length=$offset['len']-1028;
		$start=unpack('Vlen',$index[$ipdot[0]*4].$index[$ipdot[0]*4+1].$index[$ipdot[0]*4+2].$index[$ipdot[0]*4+3]);
		for($start=$start['len']*8+1024;$start<$length;$start+=8){
			if($index{$start}.$index{$start+1}.$index{$start+2}.$index{$start+3}>=$ip){
				$index_offset=unpack('Vlen',$index{$start+4}.$index{$start+5}.$index{$start+6}."\x0");
				$index_length=unpack('Clen',$index{$start+7});
				break;
			}
		}
		fseek($fp,$offset['len']+$index_offset['len']-1024);
		$area=fread($fp,$index_length['len']);
		fclose($fp);
		$fp=NULL;
		return $area;
	}
	/** GetIp 获得用户的真实IP地址
	 *
	 * @access public
	 * @return string */
	public static function GetIp(){
		static $realip=NULL;
		if($realip!==NULL){return $realip;}
		if(isset($_SERVER)){
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
				$arr=explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
				/* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
				foreach($arr as $ip){
					$ip=trim($ip);
					if($ip!='unknown'){
						$realip=$ip;
						break;
					}
				}
			}elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
				$realip=$_SERVER['HTTP_CLIENT_IP'];
			}else{
				if(isset($_SERVER['REMOTE_ADDR'])){
					$realip=$_SERVER['REMOTE_ADDR'];
				}else{
					$realip='0.0.0.0';
				}
			}
		}else{
			if(getenv('HTTP_X_FORWARDED_FOR')){
				$realip=getenv('HTTP_X_FORWARDED_FOR');
			}elseif(getenv('HTTP_CLIENT_IP')){
				$realip=getenv('HTTP_CLIENT_IP');
			}else{
				$realip=getenv('REMOTE_ADDR');
			}
		}
		preg_match('/[\d\.]{7,15}/',$realip,$onlineip);
		$realip=!empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
		return $realip;
	}
}