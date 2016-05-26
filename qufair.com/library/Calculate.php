<?php
// amespace Library\CalculateClass;
class Calculate{
	public static function Str2Cont($str,$len=0){
		$str=preg_replace('/\s/','',$str);
		if(preg_match('/sqrt\(([0-9]+[\.0-9]*)\)/',$str,$match)){
			$str=str_replace($match[0],function_exists("bcsqrt") ? bcsqrt($match[1],$len) : sqrt($match[1]),$str);
			$str=self::Str2Cont($str,$len);
		}elseif(preg_match('/\((.*?)\)/',$str,$match)){
			if(preg_match('/\((.*?)$/',$match[1],$m)){
				$str=str_replace('({$m[1]})',self::Str2Cont($m[1]),$str);
			}elseif(preg_match('/(.*?)\)$/',$match[1],$m)){
				$str=str_replace('({$m[1]})',self::Str2Cont($m[1]),$str);
			}else{
				$str=str_replace($match[0],self::Str2Cont($match[1]),$str);
			}
			$str=self::Str2Cont($str,$len);
		}elseif(preg_match('/([0-9]+[\.0-9]*)([\*\/\%\^]+)([0-9]+[\.0-9]*)/',$str,$match)){
			switch(trim(ltrim($match[2]))){
				case "/":
				$str=str_replace($match[0],self::GetBcdiv($match[1],$match[3],$len),$str);
				break;
				case "%":
				$str=str_replace($match[0],self::GetBcmod($match[1],$match[3],$len),$str);
				break;
				case "^":
				$str=str_replace($match[0],self::GetBcpow($match[1],$match[3],$len),$str);
				break;
				default:
				$str=str_replace($match[0],self::GetBcmul($match[1],$match[3],$len),$str);
				break;
			}
			$str=self::Str2Cont($str,$len);
		}elseif(preg_match('/([0-9]+[\.0-9]*)([\+\-]+)([0-9]+[\.0-9]*)/',$str,$match)){
			switch(trim(ltrim($match[2]))){
				case "-":
				$str=str_replace($match[0],self::GetBcsub($match[1],$match[3],$len),$str);
				break;
				default:
				$str=str_replace($match[0],self::GetBcadd($match[1],$match[3],$len),$str);
				break;
			}
			$str=self::Str2Cont($str,$len);
		}
		return $str;
	}
	public static function GetBcdiv($num1,$num2,$len=2){
		$str=function_exists("bcdiv") ? bcdiv($num1,$num2,$len*10) : ($num1/$num2);
		return number_format($str,$len,".","");
	}
	public static function GetBcmod($num1,$num2,$len=2){
		$str=function_exists("bcmod") ? bcmod($num1,$num2,$len*10) : ($num1%$num2);
		return number_format($str,$len,".","");
	}
	public static function GetBcpow($num1,$num2,$len=2){
		$str=function_exists("bcpow") ? bcpow($num1,$num2,$len*10) : pow($num1,$num2);
		return number_format($str,$len,".","");
	}
	public static function GetBcmul($num1,$num2,$len=2){
		$str=function_exists("bcmul") ? bcmul($num1,$num2,$len*10) : ($num1*$num2);
		return number_format($str,$len,".","");
	}
	public static function GetBcsub($num1,$num2,$len=2){
		$str=function_exists("bcsub") ? bcsub($num1,$num2,$len*10) : ($num1-$num2);
		return number_format($str,$len,".","");
	}
	public static function GetBcadd($num1,$num2,$len=2){
		$str=function_exists("bcadd") ? bcadd($num1,$num2,$len*10) : ($num1+$num2);
		return number_format($str,$len,".","");
	}
	public static function GetRad($d){
		return $d*3.1415926535898/180.0;
	}
	public static function GetDistance($lat1,$lng1,$lat2,$lng2){
		$EARTH_RADIUS=6378.137;
		$radLat1=self::GetRad($lat1);
		$radLat2=self::GetRad($lat2);
		$a=$radLat1-$radLat2;
		$b=self::GetRad($lng1)-self::GetRad($lng2);
		$s=2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)));
		$s=$s*$EARTH_RADIUS;
		$s=round($s*10000)/10000;
		return $s;
	}
}