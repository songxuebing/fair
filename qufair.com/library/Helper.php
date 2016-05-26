<?php
// amespace Library\HelperClass;
class Helper{
	public function LoadModel($model){
		$Config=Config::GetConfig();
		$ModelFile=APPLICATION_PATH.'/module/'.$model.'Model.php';
		if(file_exists($ModelFile)){
			include_once ($ModelFile);
			$class = $model.'Model';
			return new $class();
		}else{
			$ModelFile=(IS_DEBUG==true ? $ModelFile : $model);
			ErrorMsg::Debug('Model:['.$ModelFile.']文件不存在');
		}
	}
	public function LoadHelper($helper){
		$Config=Config::GetConfig();
		$HelperFile=APPLICATION_PATH.'/helper/'.$helper.'.php';
		if(file_exists($HelperFile)){
			include_once ($HelperFile);
		}else{
			$HelperFile=(IS_DEBUG==true ? $HelperFile : $helper);
			ErrorMsg::Debug('Helper:['.$HelperFile.']文件不存在');
		}
	}
	public function LoadResurces($resources){
		$ResourcesFile=RESOURCES_PATH.'/'.$resources.'.php';
		if(file_exists($ResourcesFile)){
			include_once ($ResourcesFile);
		}else{
			$ResourcesFile=(IS_DEBUG==true ? $ResourcesFile : $resources);
			ErrorMsg::Debug('Resources:['.$ResourcesFile.']文件不存在');
		}
	}
}