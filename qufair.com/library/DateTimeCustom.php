<?php
// amespace Library\DateTimeCustomClass;
class DateTimeCustom{
	public static function GetFormat($timestamp,$dateformat=false,$datemac=0){
		$Config=Config::GetConfig();
		$datemac=$datemac==0 ? $Config['datemac'] : $datemac;
		if(empty($timestamp)){
			$timestamp=NOW_TIME;
		}
		if($dateformat==false){
			$y=date("Y");
			$m=date("m");
			$d=date("d");
			$dateformat="Y-m-d H:i:s";
			if(NOW_TIME>=$timestamp){
				$time=abs(NOW_TIME-$timestamp);
				if($time<10){
					return "刚刚";
				}elseif($time<60){
					return "{$time}秒前";
				}elseif($time<30*60){
					$i=intval($time/60)>0 ? intval($time/60) : 1;
					$s=ceil(abs($time-$i*60));
					if($s>0){
						return "{$i}分{$s}秒前";
					}else{
						return "{$i}分钟前";
					}
				}elseif($timestamp>mktime(0,0,0,$m,$d,$y)&&$timestamp<mktime(0,0,0,$m,$d+1,$y)){
					$dateformat="H:i";
				}elseif($timestamp>mktime(0,0,0,$m,$d-1,$y)&&$timestamp<mktime(0,0,0,$m,$d,$y)){
					$dateformat="昨天H:i";
				}elseif($timestamp>mktime(0,0,0,$m,$d-2,$y)&&$timestamp<mktime(0,0,0,$m,$d-1,$y)){
					$dateformat="前天H:i";
				}elseif($timestamp>mktime(0,0,0,$m,1,$y)&&$timestamp<mktime(0,0,0,$m+1,1,$y)){
					$dateformat="当月d日 H:i:s";
				}elseif($timestamp>mktime(0,0,0,1,1,$y)&&$timestamp<mktime(0,0,0,1,1,$y+1)){
					$dateformat="m月d日 H:i:s";
				}elseif($timestamp>mktime(0,0,0,1,1,$y-1)&&$timestamp<mktime(0,0,0,1,1,$y)){
					$dateformat="去年m月d日 H:i:s";
				}elseif($timestamp>mktime(0,0,0,1,1,$y-2)&&$timestamp<mktime(0,0,0,1,1,$y-1)){
					$dateformat="前年m月d日 H:i:s";
				}
			}else{
				$time=abs($timestamp-NOW_TIME);
				if($time<10){
					return "马上";
				}elseif($time<60){
					return "{$time}秒后";
				}elseif($time<30*60){
					$i=intval($time/60)>0 ? intval($time/60) : 1;
					$s=ceil(abs($time-$i*60));
					if($s>0){
						return "{$i}分{$s}秒后";
					}else{
						return "{$i}分钟后";
					}
				}elseif($timestamp<mktime(0,0,0,$m,$d+1,$y)){
					$dateformat="H:i";
				}elseif($timestamp<mktime(0,0,0,$m,$d,$y)){
					$dateformat="昨天H:i";
				}elseif($timestamp<mktime(0,0,0,$m,$d-1,$y)){
					$dateformat="前天H:i";
				}elseif($timestamp<mktime(0,0,0,$m+1,1,$y)){
					$dateformat="当月d日 H:i:s";
				}elseif($timestamp<mktime(0,0,0,1,1,$y+1)){
					$dateformat="m月d日 H:i:s";
				}elseif($timestamp<mktime(0,0,0,1,1,$y+2)){
					$dateformat="明年m月d日 H:i:s";
				}elseif($timestamp<mktime(0,0,0,1,1,$y+3)){
					$dateformat="后年m月d日 H:i:s";
				}
			}
		}
		if(function_exists("gmdate")){
			return gmdate($dateformat,$timestamp+$datemac);
		}else{
			return date($dateformat,$timestamp+$datemac);
		}
	}
	public static function GetTimestamp($timestamp,$dateformat="Y-m-d H:i:s"){
		if($dateformat=="Y-m-d H:i:s"){
			$ymdhis=explode(" ",$timestamp);
			$ymd=explode("-",$ymdhis[0]);
			$his=explode(":",$ymdhis[1]);
			return mktime($his[0],$his[1],$his[2],$ymd[1],$ymd[2],$ymd[0]);
		}elseif($dateformat=="Y-m-d"){
			$ymd=explode("-",$timestamp);
			return mktime(0,0,0,$ymd[1],$ymd[2],$ymd[0]);
		}elseif($dateformat=="H:i:s"){
			$y=date("Y");
			$m=date("m");
			$d=date("d");
			$his=explode(":",$timestamp);
			return mktime($his[0],$his[1],$his[2],$m,$d,$y);
		}else{
			$y=date("Y");
			$m=date("m");
			$d=date("d");
			$h=date("h");
			$i=date("i");
			$s=date("s");
			return mktime($h,$i,$s,$m,$d,$y);
		}
	}
}