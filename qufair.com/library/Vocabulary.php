<?php
// amespace Library\VocabularyClass;
class Vocabulary{
	public static function Separate($str){
		$Resultstr=self::ResultString($str);
		$NewStr=array(
			'Ordinary' => array(),
			'High' => array()
		);
		$ci=array();
		if(isset($Resultstr['en'])){
			if(is_array($Resultstr['en'])){ // 英文
				$Resultnum=count($Resultstr['en']);
				for($i=0;$i<$Resultnum;$i++){
					$new=implode("",array_slice($Resultstr['en'],$i,4));
					if(strlen($new)>=2) $NewStr['Ordinary'][]=$new;
					$i++;
					$i++;
				}
			}else{
				$NewStr['Ordinary'][]=$Resultstr['en'];
			}
		}
		if(isset($Resultstr['zh'])){ // 中文
			if(is_array($Resultstr['zh'])){ // 中文
				$Resultnum=count($Resultstr['zh']);
				for($i=0;$i<$Resultnum;$i++){
					$onew=implode("",array_slice($Resultstr['zh'],$i,2));
					if(strlen($onew)>=4) $NewStr['Ordinary'][]=$onew;
					$hnew=implode("",array_slice($Resultstr['zh'],$i,4));
					if(strlen($hnew)>=6&&$onew!=$hnew) $NewStr['High'][]=$hnew;
				}
			}else{
				$NewStr['Ordinary'][]=$Resultstr['zh'];
			}
		}
		if(!empty($NewStr['Ordinary'])){
			$NewStr['Ordinary']=array_flip(array_flip($NewStr['Ordinary']));
		}
		if(!empty($NewStr['High'])){
			$NewStr['High']=array_flip(array_flip($NewStr['High']));
		}
		return $NewStr;
	}
	public static function ResultString($str){
		$str=preg_replace('/\[.+?\]/U','',StringCode::Semiangle(trim(rtrim(ltrim($str)))));
		$steleng=strlen($str);
		$NewStr=array();
		for($i=0;$i<$steleng;$i++){
			if(ord($str[$i])<0x81){ // 英文、数字、符号
				if(preg_match('/[0-9a-z@\.#:\/\&_-]/i',$str[$i])){ // 可用于查询字符
					$NewStr['en'][]=$str[$i];
				}
			}else{
				$c=$str[$i].$str[$i+1].$str[$i+2];
				$n=hexdec(bin2hex($c));
				if($n<0xEA84BF||$n>0xEAA980){
					$NewStr['zh'][]=$c;
				}
				$i+=2;
			}
		}
		return $NewStr;
	}
}