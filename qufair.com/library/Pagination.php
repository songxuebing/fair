<?php
// amespace Library\PaginationClass;
class Pagination{
	public static $_Url='';
	public static $_Total='';
	public static $_HtmlText='';
	public static function SetUrl($Param){
		self::$_Url='/index.php/';
		$Param=array_filter($Param);
		unset($Param['page']);
		if(isset($Param['controller'])){
			self::$_Url.=$Param['controller'].'/';
			unset($Param['controller']);
		}else{
			self::$_Url.='index/';
		}
		if(isset($Param['action'])){
			if(!empty($Param['id'])&&is_numeric($Param['id'])){
				//self::$_Url.=$Param['action'].'_'.$Param['id'].'_{page}.html';
                                self::$_Url.=$Param['action'].'/id/'.$Param['id'].'/page/{page}/';
				unset($Param['id']);
			}else{
				self::$_Url.=$Param['action'].'/';
			}
			unset($Param['action']);
		}
		if(!empty($Param)){
			self::$_Url.='?'.self::AssemblyUrl($Param);
		}
		if(!preg_match('/\{page\}/',self::$_Url)){
			if(preg_match('/\/page\//',self::$_Url)){
				self::$_Url=preg_replace('/\/page\/(.*?)\//','/page/{page}/',self::$_Url);
			}elseif(preg_match('/\?/',self::$_Url)){
				self::$_Url=preg_replace('/\?(.*?)$/','page/{page}/?\\1',self::$_Url);
			}elseif(preg_match('/\/$/',self::$_Url)){
				self::$_Url=preg_replace('/\/$/','/page/{page}/',self::$_Url);
			}else{
				self::$_Url=self::$_Url.'/page/{page}/';
			}
		}
	}
	public static function AssemblyUrl($Param,$Kname=''){
		$UrlStr='';
		foreach($Param as $key=>$value){
			if(is_array($value)){
				if(empty($Kname)){
					$UrlStr.=self::AssemblyUrl($value,$key);
				}else{
					$UrlStr.=self::AssemblyUrl($value,"{$Kname}[{$key}]");
				}
			}elseif($value!=''){
				$name=empty($Kname) ? $key : "{$Kname}[{$key}]";
				$UrlStr.="{$name}={$value}&";
				unset($Param[$name]);
			}
		}
		return $UrlStr;
	}
	public static function GetMobiHtml($Limit,$Page,$Total){
		$Page=$Page<1 ? 1 : intval($Page);
		if($Total<$Limit){
			self::$_Total=1;
		}elseif($Total>0){
			if($Total%$Limit){
				self::$_Total=intval(ceil($Total/$Limit));
			}else{
				self::$_Total=intval($Total/$Limit);
			}
		}
		self::$_HtmlText='<div class="page_a">';
                //上一页
                if($Page!=1 && $Page<=self::$_Total){
                        self::$_HtmlText.="<a  href='".str_replace("{page}",$Page-1,self::$_Url)."' class='ll'>上一页</a>";
                }
		// 下一页
		if($Page!=self::$_Total){
			self::$_HtmlText.="<a href='".str_replace("{page}",$Page==0 ? 2 : $Page+1,self::$_Url)."' class='rr'>下一页</a>";
		}
                
		self::$_HtmlText.="</div>";
		return self::$_HtmlText;
	}        
	public static function GetHtml($Limit,$Page,$Total){
		$Page=$Page<1 ? 1 : intval($Page);
		if($Total<$Limit){
			self::$_Total=1;
		}elseif($Total>0){
			if($Total%$Limit){
				self::$_Total=intval(ceil($Total/$Limit));
			}else{
				self::$_Total=intval($Total/$Limit);
			}
		}
		self::$_HtmlText="<div class='pagination pagination-right' style='margin:auto'>";
		self::$_HtmlText.="<ul>";
		self::FirstPage($Page);
		$m=0;
		for($i=0;$i<5;$i++){
			$PageText=intval($Page-(5-$i));
			if($PageText<$Page&&$PageText>1){
				self::$_HtmlText.="<li><a href='".str_replace("{page}",$PageText,self::$_Url)."'>{$PageText}</a></li>";
				$m++;
			}
		}
		if($Page>1&&$Page<self::$_Total){
			//self::$_HtmlText.="<li class='disabled'><a href='".str_replace("{page}",$PageText,self::$_Url)."'>{$Page}</a></li>";
                        self::$_HtmlText.="<li class='disabled'><a href='javascript:;' style='cursor:default;'>{$Page}</a></li>";
		}
		$k=9-$m;
		for($i=1;$i<=$k;$i++){
			$PageText=$Page+$i;
			if($PageText<self::$_Total&&$PageText>1){
				self::$_HtmlText.="<li><a href='".str_replace("{page}",$PageText,self::$_Url)."'>{$PageText}</a></li>";
			}
		}
		self::LastPage($Page);
		// 下一页
		if($Page==self::$_Total){
                        self::$_HtmlText.="<li class='disabled'><a href='javascript:;' style='cursor:default;'>下一页</a></li>";
			//self::$_HtmlText.="<li class='disabled'><a href='".str_replace("{page}",$Page==0 ? 2 : $Page+1,self::$_Url)."'>下一页</a></li>";
		}else{
			self::$_HtmlText.="<li><a href='".str_replace("{page}",$Page==0 ? 2 : $Page+1,self::$_Url)."'>下一页</a></li>";
		}
		self::$_HtmlText.="</ul>";
		self::$_HtmlText.="</div>";
		return self::$_HtmlText;
	}
	public static function FirstPage($Page){
		if($Page==0||$Page==1){
			self::$_HtmlText.="<li class='disabled'><a href='".str_replace("{page}","1",self::$_Url)."'>1</a></li>";
		}else{
			self::$_HtmlText.="<li><a href='".str_replace("{page}","1",self::$_Url)."'>1</a></li>";
		}
		if($Page>7){
			self::$_HtmlText.="<li class='disabled'><a>...</a></li>";
		}
	}
	public static function LastPage($Page){
		if(self::$_Total>1){
			if(self::$_Total-$Page>=7){
				self::$_HtmlText.="<li class='disabled'><a>...</a></li>";
			}
			if($Page==self::$_Total){
				self::$_HtmlText.="<li class='disabled'><a href='".str_replace("{page}",self::$_Total,self::$_Url)."'>".self::$_Total."</a></li>";
			}else{
				self::$_HtmlText.="<li><a href='".str_replace("{page}",self::$_Total,self::$_Url)."'>".self::$_Total."</a></li>";
			}
		}
	}
}