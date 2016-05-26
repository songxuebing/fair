<?php
class PurviewListHelper extends Helper{
	var $PurviewModel;
	var $PurviewAll;
	public function __construct(){
		$this->PurviewModel=$this->LoadModel('Purview');
	}
        public function GetAll($where=''){
                if(empty($where)){
                    $PurviewAll=$this->PurviewModel->GetAll(array('`id` > ?'=>0),NULL,NULL,array('sort_order asc','id asc'));
                }else{
                    $PurviewAll=$this->PurviewModel->GetAll($where,NULL,NULL,array('sort_order asc','id asc'));
                }
                return self::doTree($PurviewAll);
        }
	public function GetModule($Module='index'){
		Cache::Set('purview','list',NOW_TIME,0);
		if(!$PurviewAllCache=Cache::Get('all_'.$Module)){
			$where=array();
			$where['`module` = ?']=$Module;
			$PurviewAll=$this->PurviewModel->GetAll($where,null,null,array('sort_order asc','id asc'));
			Cache::Save('all_'.$Module,$PurviewAll);
		}else{
			$PurviewAll=$PurviewAllCache;
		}
		return $PurviewAll;
	}
	public function GetArray($Module='index'){
		Cache::Set('purview','list',NOW_TIME,0);
		if(!$PurviewArrayCache=Cache::Get('array_'.$Module)){
			$where=array();
                        if($Module=='all'){
                            $where['`id` > ?']=0;
                        }else{
                            $where['`module` = ?']=$Module;
                        }
			$PurviewAll=$this->PurviewModel->GetAll($where);
			$PurviewArray=array();
			foreach($PurviewAll as $key=>$value){
				$PurviewArray[$value['parent']][]=$value;
			}
			Cache::Save('array_'.$Module,$PurviewArray);
		}else{
			$PurviewArray=$PurviewArrayCache;
		}
		return $PurviewArray;
	}
	public function SetJson($PurviewArray=array(),$key=0){
		$JsonArray=array();
		if(!empty($PurviewArray[$key])){
			foreach($PurviewArray[$key] as $value){
				if(!empty($PurviewArray[$value['id']])){
					$JsonArray[]=array('t'=>$value['name'],'v'=>$value['id'],'s'=>$this->SetJson($PurviewArray,$value['id']));
				}else{
					$JsonArray[]=array('t'=>$value['name'],'v'=>$value['id']);
				}
			}
		}
		return $JsonArray;
	}        
	public function MenuArray($PurviewArray,$MyRole,$Current=array(),$key=0){
		if(!empty($PurviewArray[$key])) foreach($PurviewArray[$key] as $value){
			if(in_array($value['id'],$MyRole)){
				$list=array();
				if(!empty($PurviewArray[$value['id']])){
					$list=$this->MenuArray($PurviewArray,$MyRole,$Current,$value['id']);
				}
				$MenuArray[]=array('name'=>$value['name'],'code'=>$value['code'],'is_menu'=>$value['is_menu'],'current'=>in_array($value['code'],$Current),'list'=>$list);
			}
		}
		return $MenuArray;
	}
	public function MenuArrayAll($PurviewArray,$Current=array(),$key=0){
		foreach($PurviewArray[$key] as $value){
                    $list=array();
                    if(!empty($PurviewArray[$value['id']])){
                            $list=$this->MenuArray($PurviewArray,$Current,$value['id']);
                    }
                    $MenuArray[]=array('name'=>$value['name'],'code'=>$value['code'],'current'=>in_array($value['code'],$Current),'list'=>$list);
		}
		return $MenuArray;
	}        
	public function GetMenu($MyRole,$Module,$Controller,$Action){;
		$this->PurviewAll=$this->GetModule($Module);
		$PurviewArray=$PurviewRow=array();
		foreach($this->PurviewAll as $key=>$value){
			$PurviewArray[$value['parent']][]=$value;
			$PurviewRow[$value['id']]=$value['name'];
		}
		$MenuArray=$this->MenuArray($PurviewArray,$MyRole,array($Controller,$Action),0);
		return $MenuArray;
	}
        public function doTree($list,$pid=0,$level=0,$html='&nbsp;&nbsp;&nbsp;&nbsp;'){
            static $doTree = array();
            foreach($list as $v){
                if($v['parent'] == $pid){
                    $v['sort'] = $level;
                    $v['html'] = str_repeat($html,$level);
                    $doTree[] = $v;
                    self::doTree($list,$v['id'],$level+1);
                } 
            }
            return $doTree;
        }        
}