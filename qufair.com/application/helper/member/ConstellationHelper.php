<?php
class ConstellationHelper extends Helper{
	public function GetBirthday($birthday){
		$Ymd = explode('-',$birthday);
		$md = $Ymd[1].$Ymd[2];
		if($md >= '0120' && $md <= '0218'){
			$constellation = '水瓶座';
		}elseif($md >= '0219' && $md <= '0320'){
			$constellation = '双鱼座';
		}elseif($md >= '0321' && $md <= '0420'){
			$constellation = '白羊座';
		}elseif($md >= '0421' && $md <= '0520'){
			$constellation = '金牛座';
		}elseif($md >= '0521' && $md <= '0621'){
			$constellation = '双子座';
		}elseif($md >= '0622' && $md <= '0722'){
			$constellation = '巨蟹座';
		}elseif($md >= '0723' && $md <= '0822'){
			$constellation = '狮子座';
		}elseif($md >= '0823' && $md <= '0922'){
			$constellation = '处女座';
		}elseif($md >= '0923' && $md <= '1022'){
			$constellation = '天秤座';
		}elseif($md >= '1023' && $md <= '1121'){
			$constellation = '天蝎座';
		}elseif($md >= '1122' && $md <= '1221'){
			$constellation = '射手座';
		}
		/*
		 * 白羊座03月21日─04月20日
		* 金牛座04月21日─05月20日
		* 双子座05月21日─06月21日
		* 巨蟹座06月22日─07月22日
		* 狮子座07月23日─08月22日
		* 处女座08月23日─09月22日
		* 天秤座09月23日─10月22日
		* 天蝎座10月23日─11月21日
		* 射手座11月22日─12月21日
		* 摩羯座12月22日─01月19日
		* 水瓶座01月20日─02月18日
		* 双鱼座02月19日─03月20日
		*/
		return $constellation;
	}
}