<?php
// amespace Library\ControllerClass;
class Controller{
	public $Htmlzip=array();
	public $Config=array();
	public $Param=array();
	public $Module='default';
	public $Controller='index';
	public $Action='index';
	public $_RouteRegex=array();
	public $_Directory=array();
	public $_View=array();
	public function __get($key){
		return isset($this->$key);
	}
	public function __isset($key){
		return isset($this->$key);
	}
	public function __set($key,$val){
		$this->$key=$val;
		return;
	}
	public function __unset($key){
		unset($this->$key);
	}
	public function Init(){
		if(Purview::EnabledIp()==false){
			ErrorMsg::Debug('您的ip不在允许列表中,禁止访问网站');
		}
		if(Purview::DisabledIp()==false){
			ErrorMsg::Debug('您的ip在禁止列表中,禁止访问网站');
		}
	}
	public function SetPurview($UserConfig,$Module,$Controller,$Action){
		if(!Purview::IsAllow($UserConfig['Group'],$Module,$Controller,$Action)){
			ErrorMsg::Debug('权限不足','login','/index.php/auth/login?referer='.StringCode::Fescape($_SERVER['REQUEST_URI'],'url'));
		}
	}
	public function Run(){
		$ControllerFile=APPLICATION_PATH.'/controller/'.$this->Module.'/'.ucwords($this->Controller).'Controller.php';
		if(!file_exists($ControllerFile)){
			//$ControllerFile=(IS_DEBUG==true ? $ControllerFile : $this->Controller);
			ErrorMsg::Debug('Controller:['.$ControllerFile.']文件不存在');
		}
		include $ControllerFile;
		$ControllerClass=ucwords($this->Controller)."Controller";
		if(!class_exists($ControllerClass)){
			$ControllerClass="IndexController";
		}
		$_Class=new $ControllerClass();
		$ActionFunction=ucwords($this->Action).'Action';
		if(!method_exists($_Class,$ActionFunction)){
			$ActionFunction="IndexAction";
		}
		$_Class->Htmlzip=$this->Htmlzip;
		$_Class->Config=$this->Config;
		$_Class->Param=$this->Param;
		$_Class->Module=$this->Module;
		$_Class->Controller=$this->Controller;
		$_Class->Action=$this->Action;
		$_Class->Init();
		$_Class->$ActionFunction();
	}
	public function Info(){
		echo "\$_SERVER<pre>";
		print_r($_SERVER);
		echo "</pre>";
		echo "\$_REQUEST<pre>";
		print_r($_REQUEST);
		echo "</pre>";
		echo "\$Param<pre>";
		print_r($this->Param);
		echo "</pre>";
	}
	public function BootStrap(){
		$this->Config=Config::GetConfig();
		// $GLOBALS['Db'] = new DataBase();
		$this->Htmlzip=array();
		if(!empty($this->Config['rewrite'])){
			$this->Htmlzip['/\/index\.php\//si']='/';
		}
		if(!empty($this->Config['htmlzip'])){
			$this->Htmlzip['/<>/']=" ";
			$this->Htmlzip['/>[\s\r\n\t]+/']=">";
			$this->Htmlzip['/[\s\r\n\t]+</']="<";
		}
		$this->Htmlzip['/<!----(.*?[^>])---->/si']="";
		if(!empty($_GET)){
			$_GET=$this->SetFilter($_GET);
			foreach($_GET as $key=>$value){
				$this->Param[$key]=$value;
			}
		}
		if(!empty($_POST)){
			$_POST=$this->SetFilter($_POST);
			foreach($_POST as $key=>$value){
				$this->Param[$key]=$value;
			}
		}
		$_SERVER=$this->SetFilter($_SERVER);
	}
	public function SetDirectory($Module=array()){
		if(!empty($Module)){
			foreach($Module as $key=>$value){
				$this->_Directory[$key]=$value;
			}
		}
	}
	public function SetParam(){
		$url=str_replace("/index.php/","/",$_SERVER['REQUEST_URI']);
		if(!empty($this->_RouteRegex)){
            foreach($this->_RouteRegex as $key=>$value){
                //var_dump($value);
				if(preg_match("/{$value[0]}/si",$url,$match)){
					$str="";
					if(!empty($value[1]['module'])){
						$str.="/{$value[1]['module']}";
					}
					if(!empty($value[1]['controller'])){
						$str.="/{$value[1]['controller']}";
					}else{
						$str.="/{controller}";
					}
					if(!empty($value[1]['action'])){
						$str.="/{$value[1]['action']}";
					}else{
						$str.="/{action}";
					}
					foreach($value[2] as $k=>$v){
						if($v=='module'||$v=='controller'||$v=='action'){
							$str=str_replace('{'.$v.'}','\\'.$k,$str);
						}else{
							$str.='/'.$v.'/\\'.$k;
						}
					}
                    $url=preg_replace("/^{$value[0]}([\/|\?].*?)*$/si",$str,$url);
                    //echo $url;exit();
				}
			}
		}

        //新闻模块所有url都写成伪静态
        if($url === "/gift")
        {
            $url = "/forum/index/tagid/1";
        }
        elseif($url === "/home")
        {
            $url = "/forum/index/tagid/23";
        }
        elseif($url === "/textile")
        {
            $url = "/forum/index/tagid/2";
        }
        elseif($url === "/cloth")
        {
            $url = "/forum/index/tagid/24";
        }
        elseif($url === "/hotel")
        {
            $url = "/forum/index/tagid/3";
        }
        elseif($url === "/jewelry")
        {
            $url = "/forum/index/tagid/4";
        }
        elseif($url === "/cosmetology")
        {
            $url = "/forum/index/tagid/25";
        }
        elseif($url === "/safe")
        {
            $url = "/forum/index/tagid/5";
        }
        elseif($url === "/food")
        {
            $url = "/forum/index/tagid/6";
        }elseif($url === "/mechanics")
        {
            $url = "/forum/index/tagid/8";
        }elseif($url === "/hardware")
        {
            $url = "/forum/index/tagid/26";
        }elseif($url === "/print")
        {
            $url = "/forum/index/tagid/9";
        }elseif($url === "/chemical")
        {
            $url = "/forum/index/tagid/10";
        }
        elseif($url === "/computer")
        {
            $url = "/forum/index/tagid/11";
        }
        elseif($url === "/medical")
        {
            $url = "/forum/index/tagid/12";
        }elseif($url === "/sport")
        {
            $url = "/forum/index/tagid/13";
        }elseif($url === "/accessories")
        {
            $url = "/forum/index/tagid/14";
        }
        elseif($url === "/building")
        {
            $url = "/forum/index/tagid/15";
        }
        elseif($url === "/electron")
        {
            $url = "/forum/index/tagid/19";
        }elseif($url === "/power")
        {
            $url = "/forum/index/tagid/27";
        }
        elseif($url === "/vessel")
        {
            $url = "/forum/index/tagid/20";
        }
        elseif($url === "/aerospace")
        {
            $url = "/forum/index/tagid/17";
        }elseif($url === "/agriculture")
        {
            $url = "/forum/index/tagid/18";
        }elseif($url === "/transport")
        {
            $url = "/forum/index/tagid/16";
        }
        elseif($url === "/lighting")
        {
            $url = "/forum/index/tagid/21";
        }
        elseif($url === "/knowledge")
        {
            $url = "/forum/index/tagid/22";
        }
        elseif($url === "/news")
        {
            $url = "/forum";
        }


        $p=explode("?",$url);
		$Module=explode('/',empty($p[0]) ? '' : $p[0]);
		$j=1;
		if(!empty($this->_Directory)&&!empty($Module[$j])&&array_key_exists($Module[$j],$this->_Directory)){
			$this->Param['module']=$Module[$j];
			$this->Module=$this->_Directory[$Module[$j]];
			$j++;
		}elseif(!empty($this->Param['module'])&&!empty($this->_Directory[$this->Param['module']])){
			$this->Module=$this->_Directory[$this->Param['module']];
		}else{
			$this->Param['module']='default';
			$this->Module=$this->_Directory['default'];
		}
		if(empty($this->Param['controller'])){
			$this->Param['controller']=empty($Module[$j]) ? 'index' : $Module[$j];
			$j++;
		}
		if(empty($this->Param['action'])){
			$this->Param['action']=empty($Module[$j]) ? 'index' : $Module[$j];
			$j++;
		}
		$leng=count($Module);
		for($i=$j;$i<=$leng;$i++){
			if(!empty($Module[$i])){
				$this->Param[$Module[$i]]=empty($Module[$i+1]) ? '' : $Module[$i+1];
				$i++;
			}
		}
		$this->Controller=$this->Param['controller'];
		$this->Action=$this->Param['action'];
	}
	public function GetParam($key){
		return $this->$key;
	}
	public function SetFilter($array){
		$AddArray="";
		if(is_array($array)){
			foreach($array as $key=>$value){
				$AddArray[$key]=$this->SetFilter($value);
			}
		}elseif(isset($array)){
			if(!get_magic_quotes_gpc()){
				$array=addslashes($array);
			}
			$AddArray=trim(ltrim(rtrim($array)));
			if($this->Config['filter']==1){
				$search=array(
					'((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9\-\.\[\]_\"\'\$\x7f-\xff]+\])*)',
					'/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU', // 去掉 javascript
					'/(<[^>]*)on[a-zA-Z] \s*=([^>]*>)/isU',
					'/([\r\n])[\s]+/i', // 去掉空白字符
					'/&#(\d+);/e',
					'/<\?/si',
					'/\?>/si'
				); // 作为 PHP 代码运行
				$replace=array(
					'([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)',
					'&lt;\\1\\2\\3&gt;',
					'\\1\\2',
					'\r\n',
					'',
					'&lt;?',
					'?&gt;'
				);
				$AddArray=preg_replace($search,$replace,$array);
			}elseif($this->Config['filter']==2){
				$search=array(
					'((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9\-\.\[\]_\"\'\$\x7f-\xff]+\])*)',
					'/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU', // 去掉 javascript
					'/(<[^>]*)on[a-zA-Z] \s*=([^>]*>)/isU',
					'/<[\/\!]*?[^<>]*?>/si', // 去掉 HTML 标记
					'/([\r\n])[\s]+/i', // 去掉空白字符
					'/&(quot|#34);/i', // 替换 HTML 实体
					'/&(amp|#38);/i',
					'/&(lt|#60);/i',
					'/&(gt|#62);/i',
					'/&(nbsp|#160);/i',
					'/&(iexcl|#161);/i',
					'/&(cent|#162);/i',
					'/&(pound|#163);/i',
					'/&(copy|#169);/i',
					'/&#(\d+);/e',
					'/<\?/si',
					'/\?>/si'
				);
				$replace=array(
					'([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)',
					'&lt;\\1\\2\\3&gt;',
					'\\1\\2',
					"",
					"\r\n",
					"",
					"",
					"",
					"",
					"",
					"",
					"",
					"",
					"",
					"",
					'&lt;?',
					'?&gt;'
				);
				$AddArray=preg_replace($search,$replace,$array);
			}else{
				$AddArray=strtr(htmlspecialchars($array),array(
					'\#' => '&123123',
					'`' => '\`',
					'&nbsp;' => ' ',
					'&amp;' => '&',
					'\'' => '&#39;',
					'\t' => '&nbsp;&nbsp;',
					'\r' => '',
					'$' => '\$',
					'   ' => '&nbsp;'
				));
			}
		}
		return $AddArray;
	}
	public function RouteRegex($SpaceName,$Rule){
		$this->_RouteRegex[$SpaceName]=$Rule;
	}
	public function Assign($spec,$value=null){
		$this->$spec=$value;
	}
	public function SetView($dir=null){
		if(empty($dir)){
			$this->_View=array(
				APPLICATION_PATH.'/view/'.$this->Module.'/'.$this->Controller.'/'
			);
		}else{
			$this->_View=array(
				APPLICATION_PATH.'/view/'.$dir.'/'
			);
		}
	}
	public function AddView($dir){
		$this->_View[]=APPLICATION_PATH.'/view/'.$dir.'/';
	}
	public function GetView($file){
		$ViewFile=$this->Render($file);
		$script="";
		include $ViewFile;
		$script=ob_get_contents();
		ob_end_clean();
		
		if(IS_ZIP!=false&&XML_R==false){
			if(strstr($_SERVER['HTTP_USER_AGENT'],'compatible')&&ob_start('compress')){
				header('Content-Encoding: gzip');
			}else if(strstr($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip')&&ob_start('ob_gzhandler')){
				header('Content-Encoding: gzip');
			}else{
				ob_start();
			}
		}else{
			ob_start();
		}
		
		$script=preg_replace(array_keys($this->Htmlzip),array_values($this->Htmlzip),$script);
		$script=preg_replace_callback('/<script(.*?)>(.*?)<\/script>/si','Callback::JavaScriptPacker',$script);
		return $script;
		/*
		$script = IO::GetFile($ViewFile);
		$script = preg_replace(array_keys($this->Htmlzip),array_values($this->Htmlzip),$script);
		$script = preg_replace_callback('/<script(.*?)>(.*?)<\/script>/si','Callback::JavaScriptPacker',$script);
		$script = preg_replace_callback('/<\?php (.*?)\?>/si','Callback::EvalCode',$script);
		return $script;
		*/
	}
	public function Render($file){
		$ViewFile="";
		foreach($this->_View as $value){
			$ViewFile=$value.$file;
			if(file_exists($ViewFile)){return $ViewFile;}
		}
		$ViewFile=(IS_DEBUG==true ? $ViewFile : $file);
		ErrorMsg::Debug('View:['.$ViewFile.']文件不存在');
	}
	public function LoadModel($model){
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
