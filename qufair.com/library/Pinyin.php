<?php
// amespace Library\PinyinClass;
class Pinyin{
	/**
	 * 拼音
	 * @copyright [trexwb] (C)2009-2010 Cioip Inc.
	 * @param string $str 中文字符
	 * @param string $space 间隔
	 * @param integer $ishead 只取首字母
	 * @param array $isclose 外部词库
	 * @return string
	 * @example SpGetPinyin("中文")
	 */
	public static function SpGetPinyin($str,$space=" ",$ishead=0,$isclose=1){
		global $pinyins;
		$restr="";
		$str=trim($str);
		$slen=strlen($str);
		if($slen<2) return $str;
		if(count($pinyins)==0){
			$fp=fopen(RESOURCES_PATH."/pinyin.db","r");
			while(!feof($fp)){
				$line=trim(fgets($fp));
				$pinyins[$line[0].$line[1]]=substr($line,3,strlen($line)-3);
			}
			fclose($fp);
		}
		for($i=0;$i<$slen;$i++){
			if(ord($str[$i])>0x80){
				$c=$str[$i].$str[$i+1];
				$i++;
				if(isset($pinyins[$c])){
					if($ishead==0) $restr.=ucwords($pinyins[$c]).$space;
					else $restr.=ucwords($pinyins[$c][0]);
				}else
					$restr.=$space;
			}else if(preg_match("/[a-z0-9]/i",$str[$i])){
				$restr.=$str[$i];
			}else{
				$restr.=$space;
			}
		}
		if($isclose==0) unset($pinyins);
		return $restr;
	}
	public static function get($str){
		$str=StringCode::Utf82Gbk($str);
		$Pinyin=self::SpGetPinyin($str);
		return $Pinyin;
	}
}