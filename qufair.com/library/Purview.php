<?php
// amespace Library\PurviewClass;
class Purview{
	public function LoadModel($model){
		$ModelFile=APPLICATION_PATH.'/module/'.$model.'Model.php';
		if(file_exists($ModelFile)){
			include_once ($ModelFile);
			$class=$model.'Model';
			return new $class();
		}else{
			$ModelFile=(IS_DEBUG==true ? $ModelFile : $model);
			ErrorMsg::Debug('Model:['.$ModelFile.']文件不存在');
		}
	}
	public function LoadHelper($helper){
		$HelperFile=APPLICATION_PATH.'/helper/'.$helper.'.php';
		if(file_exists($HelperFile)){
			include_once ($HelperFile);
		}else{
			$HelperFile=(IS_DEBUG==true ? $HelperFile : $helper);
			ErrorMsg::Debug('Helper:['.$HelperFile.']文件不存在');
		}
	}
	public static function IsAllow($GroupId='0',$Module='index',$Controller='index',$Action='index'){
		self::LoadHelper('group/GroupListHelper');
		$GroupListHelper=new GroupListHelper();
		$GroupRow=$GroupListHelper->GetId($GroupId);
                
		if(empty($GroupRow['id'])){return false;}
		$SiteRole=empty($GroupRow['role']) ? array() : $GroupRow['role'];
		if(empty($SiteRole)){return false;}
		
                return self::DefaultAllow($SiteRole,$Controller,$Action,$Module);
		return false;
	}
        public static function DefaultAllow($GroupRole,$Controller='index',$Action='index',$Module='index'){
		self::LoadHelper('purview/PurviewListHelper');
		$PurviewListHelper=new PurviewListHelper();
		$PurviewArray=$PurviewListHelper->GetArray($Module);
		$ControllerId=$ActionId='';
		if(!empty($PurviewArray[0])){
			foreach($PurviewArray[0] as $key=>$value){
				if($PurviewArray[$value['id']]){
					foreach($PurviewArray[$value['id']] as $k=>$v){
						if($Controller==$v['code']){
							$ControllerId=$v['id'];
						}
					}
				}
			}
			if(in_array($ControllerId,$GroupRole)){
				if(!empty($PurviewArray[$ControllerId])){
					foreach($PurviewArray[$ControllerId] as $key=>$value){
						if($Action==$value['code']){
							if(in_array($value['id'],$GroupRole)){return true;}
						}
					}
				}
			}
		}
		return false;            
            
        }

        public static function EnabledIp(){
		$ip=ip2long(defined('C_IP') ? C_IP : Client::GetIp());
		$CleanIP=include CONFIG_PATH.'/IP.php';
		/* *
		 * xxx.xxx.xxx.xxx 比如 127.0.0.2
		* xxx.xxx.xxx.* 比如 1270.0.0.*
		* xxx.xxx.xxx.yyy-zzz 比如 127.0.0.2-23
		* */
		$Check=true;
		if(empty($CleanIP['enabled'])){return $Check;}
		foreach($CleanIP['enabled'] as $value){
			$value=str_replace('*','0-255',$value);
			$ips1=$ips2=array();
			$ips=explode('.',trim($value));
			for($i=0;$i<4;$i++){
				if(preg_match('/-/',$ips[$i])){
					$i=explode('-',trim($ips[$i]));
					$ips1[]=$i[0];
					$ips2[]=$i[1];
				}else{
					$ips1[]=$ips[$i];
					$ips2[]=$ips[$i];
				}
			}
			$Check=false;
			$ip1=ip2long(implode('.',$ips1));
			$ip2=ip2long(implode('.',$ips2));
			if($ip1<=$ip&&$ip<=$ip2){return true;}
		}
		return $Check;
	}
	public static function DisabledIp(){
		$ip=ip2long(defined('C_IP') ? C_IP : Client::GetIp());
		$CleanIP=include CONFIG_PATH.'/IP.php';
		/* *
		 * xxx.xxx.xxx.xxx 比如 127.0.0.2
		* xxx.xxx.xxx.* 比如 1270.0.0.*
		* xxx.xxx.xxx.yyy-zzz 比如 127.0.0.2-23
		* */
		$Check=true;
		if(empty($CleanIP['disabled'])){return $Check;}
		foreach($CleanIP['disabled'] as $value){
			$value=str_replace('*','0-255',$value);
			$ips1=$ips2=array();
			$ips=explode('.',trim($value));
			for($i=0;$i<4;$i++){
				if(preg_match('/-/',$ips[$i])){
					$i=explode('-',trim($ips[$i]));
					$ips1[]=$i[0];
					$ips2[]=$i[1];
				}else{
					$ips1[]=$ips[$i];
					$ips2[]=$ips[$i];
				}
			}
			$Check=true;
			$ip1=ip2long(implode('.',$ips1));
			$ip2=ip2long(implode('.',$ips2));
			if($ip1<=$ip&&$ip<=$ip2){return false;}
		}
		return $Check;
	}
}