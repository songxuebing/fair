<?php
// amespace Library\IOClass;
class IO{
	public static function GetFile($file){
		if(!function_exists('file_get_contents')){
			$mode='rb';
			if(($fp=@fopen($file,$mode))===false){
				return false;
			}else{
				$text="";
				while(!feof($fp)){
					$text.=fgets($fp);
				}
				fclose($fp);
				return $text;
			}
		}else{
			return file_get_contents($file);
		}
	}
	public static function PutFile($file,$data){
		if(!function_exists('file_put_contents')){
			$mode='wb';
			if(($fp=@fopen($file,$mode))===false){
				return false;
			}else{
				$bytes=fwrite($fp,$data);
				fclose($fp);
				return $bytes;
			}
		}else{
			return file_put_contents($file,$data);
		}
	}
	public static function GetHttp($url){
		$curl=curl_init();
		// 设置你需要抓取的URL
		curl_setopt($curl,CURLOPT_URL,$url);
		// 设置header
		curl_setopt($curl,CURLOPT_HEADER,false);
		// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		// 运行cURL，请求网页
		$data=curl_exec($curl);
		// 关闭URL请求
		curl_close($curl);
		// return "/*--------{$url} start--------*/\n".$data."\n/*--------{$url} end--------*/\n";
		return $data;
	}
	public static function GetImagePut($file,$url){
		$ch=curl_init($url);
		$fp=fopen($file,"w");
		curl_setopt($ch,CURLOPT_FILE,$fp);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
	}
}