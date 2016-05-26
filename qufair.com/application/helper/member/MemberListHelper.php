<?php
class MemberListHelper extends Helper{
	var $MemberModel;
	public function __construct(){
		$this->MemberModel=$this->LoadModel('Member');
	}
        public function MemberWhere($where){
                return $this->MemberModel->GetAll($where);
        }
        public function GetMemberRow($where){
                return $this->MemberModel->GetRow($where);
        }
        public function MemberList($where){
            $where['`delete` =?']=0;
            return $this->MemberModel->GetAll($where);
        }

        public function memberUpdate($data, $where){
            return $this->MemberModel->Update($data, $where);
        }

        public function memberSave($data){
            return $this->MemberModel->Save($data,TRUE);
        }
		
		public function GetOne($Where){
			return $this->MemberModel->GetOne($Where);	
		}

        public function MemberPage($limit,$page,$Param){
                $Where=array(
                    '`delete`=?'=>0
                );

                if(!empty($Param['q'])){
                    $Where['`username`=?']=$Param['q'];
                }
                $MemberRow['One']=$this->MemberModel->GetOne($Where);
                if(!empty($MemberRow['One'])){
                    $MemberRow['All']=$this->MemberModel->GetAll($Where,array($page,$limit),null,array('id desc'));
                    foreach ($MemberRow['All'] as $k=>$v){
                        $MemberRow['All'][$k]['detail']=$this->MemberModel->DetailGetRow(array('`id`=?'=>$v['id']));
                    }
                    Pagination::SetUrl($Param);
                    $MemberRow['Page'] = Pagination::GetHtml($limit,$page,$MemberRow['One']);                    
                }
                return $MemberRow;                 
        }
	public function LogsMember($id,$limit,$page,$Param){
		$where=array();
		$where['`member` = ?'] = $id;
		$LogsRow['One']=$this->MemberModel->LogGetOne($where);
		if(!empty($LogsRow['One'])){
			$LogsRow['All']=$this->MemberModel->LogGetAll($where,array($page,$limit),null,array('dateline DESC'));
			Pagination::SetUrl($Param);
			$LogsRow['Page']=Pagination::GetHtml($limit,$page,$LogsRow['One']);
		}
		return $LogsRow;
	}
	public function LogsRemove($id){
		$where=array();
		$where['`member` = ?'] = $id;
		$where['`dateline` < ?'] = NOW_TIME - 7776000;
		return $this->MemberModel->LogDelete($where);
	}

        public function MemberPageWhere($Where,$limit,$page,$Param){
                if(!empty($Param['key'])){
                    $Where['locate(?,`username`)>0 OR `mobile` = ? OR `email` = ?']=$Param['key'];
                }
                if(!empty($Param['province'])){
                    $Where['`province` = ?']=$Param['province'];
                }
                if(!empty($Param['city'])){
                    $Where['`city` = ?']=$Param['city'];
                }
                if(!empty($Param['area'])){
                    $Where['`area` = ?']=$Param['area'];
                }

                $MemberRow['One']=$this->MemberModel->GetOne($Where);
                if(!empty($MemberRow['One'])){
                    $MemberRow['All']=$this->MemberModel->GetAll($Where,array($page,$limit),null,array('id desc'));
                    foreach ($MemberRow['All'] as $k=>$v){
                        $MemberRow['All'][$k]['detail']=$this->MemberModel->DetailGetRow(array('`id`=?'=>$v['id']));
                        if(!empty($MemberRow['All'][$k]['detail']['birthday'])){
                            $MemberRow['All'][$k]['detail']['age']=  StringCode::get_age($MemberRow['All'][$k]['detail']['birthday']);                            
                        }                        
                    }
                    Pagination::SetUrl($Param);
                    $MemberRow['Page'] = Pagination::GetHtml($limit,$page,$MemberRow['One']);                    
                }
                return $MemberRow;                 
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


    //用户标签
    public function tagMemberWhere($where){
        return $this->MemberModel->tagAll($where);
    }
    public function tagMemberRow($where){
        return $this->MemberModel->tagRow($where);
    }
    public function tagMemberList($where){
        return $this->MemberModel->tagAll($where);
    }

    public function tagMemberUpdate($data, $where){
        return $this->MemberModel->tagUpdate($data, $where);
    }

    public function tagMemberSave($data){
        return $this->MemberModel->tagSave($data,TRUE);
    }

    public function tagRemove($where){
        return $this->MemberModel->tagDelete($where);
    }

}