<?php
class MemberDetailHelper extends Helper{
	var $MemberModel;
	public function __construct(){
		$this->MemberModel=$this->LoadModel('Member');
                $this->_table='member';
	}
	public function GetId($id='0'){
		Cache::Set('member','detail',NOW_TIME,0);
		if(!$MemberRowCache=Cache::Get('id_'.$id)){
			$where=array();
			$where['`id` = ?']=$id;
			$MemberRow=$this->MemberModel->GetRow($where);
			if(!empty($MemberRow['id'])){
				$where=array();
				$where['`id` = ?']=$MemberRow['id'];
				$MemberDetailRow=$this->MemberModel->DetailGetRow($where);
				foreach($MemberDetailRow as $key=>$value){
					$MemberRow[$key]=$value;
				}
			}
			Cache::Save('id_'.$id,$MemberRow);
		}else{
			$MemberRow=$MemberRowCache;
		}
		return $MemberRow;
	}
        public function GetMember($id=0){
                $where=array();
                $where['`id` = ?']=$id;
                $MemberRow=$this->MemberModel->GetRow($where);
                if(!empty($MemberRow['id'])){
                        $where=array();
                        $where['`id` = ?']=$MemberRow['id'];
                        $MemberDetailRow=$this->MemberModel->DetailGetRow($where);
                        foreach($MemberDetailRow as $key=>$value){
                                $MemberRow[$key]=$value;
                        }
                }
                return $MemberRow;
        }
        public function DoMember($param){//客户组检测
                $where=array();
                $where['`username` = ?']=$param['username'];
                $where['`mobile` = ?']=$param['mobile'];
                if(!$this->CheckMember($where)){
                    $salt=StringCode::RandomCode(6);
                    $data=array(
                        'username'=>$param['username'],
                        'password'=>md5(md5($param['mobile']).$salt),
                        'mobile'=>$param['mobile'],
                        'group'=>USER_GROUP,
                        'company'=>$param['company'],
                        'salt'=>$salt,
                        'rank'=>$param['rank'],
                        'province'=>$param['province'],
                        'city'=>$param['city'],
                        'area'=>$param['area']
                    );
                    return $this->Save($data,TRUE);
                }
                return false;
        }
        public function CheckMember($where){
                return $this->MemberModel->GetOne($where);
        }
        public function CheckMemberDetail($where){
                return $this->MemberModel->DetailGetOne($where);
        }
	public function GetSession($id='0'){
		$where=array();
		$where['`member` = ?']=$id;
		return $this->MemberModel->SessionGetRow($where);
	}
	public function GetLast(){
		$Last=explode('\t',Cookie::FauthCode(Cookie::GetCookie('Last'),'DECODE'));
		return array('ip'=>empty($Last[0])?'':$Last[0],'time'=>empty($Last[1])?'':$Last[1]);
	}
	public function SetLogs($UserConfig,$desc){
		$Row=array('id'=>NOW_TIME.StringCode::RandomCode(8,'num'),'member'=>$UserConfig['Id'],'username'=>$UserConfig['Name'],'ip'=>C_IP,'dateline'=>NOW_TIME,'desc'=>$desc);
		return $this->MemberModel->LogSave($Row);
	}
        public function LogGetAll($where){
                return $this->MemberModel->LogGetAll($where);
        }
	public function LoginSession($MemberRow,$Set=false){
		$SessionRow=$this->GetSession($MemberRow['id']);
		$Row=array('member'=>$MemberRow['id'],'username'=>$MemberRow['username'],'uptime'=>NOW_TIME,'servicesip'=>trim(ltrim(rtrim($_SERVER['REMOTE_ADDR']))),'clientip'=>C_IP);
                if(empty($SessionRow['id'])){
			$Row['lastip']=C_IP;
			$Row['lasttm']=NOW_TIME;
			$Row['regip']=C_IP;
			$Row['regtm']=NOW_TIME;
			$Row['login']='1';
			$Row['online']='0';
			$Row['address']=Client::GetLocation(C_IP);
			$Row['system']=Client::GetOs();
			$Row['browser']=Client::GetBrowser();
			return $this->MemberModel->SessionSave($Row);
		}else{
			$uptime=NOW_TIME-$SessionRow['uptime'];
			$Cookie=Config::GetCookie();
			$Row['lastip']=C_IP;
			$Row['lasttm']=NOW_TIME;
			$Row['login']=empty($SessionRow['login'])?'1':$SessionRow['login']+1;
			$Row['online']=$SessionRow['online']+($uptime>$Cookie['time']?60:$uptime);
			$Row['address']=Client::GetLocation(C_IP);
			$Row['system']=Client::GetOs();
			$Row['browser']=Client::GetBrowser();
				
			$where=array();
			$where['`member` = ?']=$MemberRow['id'];
			return $this->MemberModel->SessionUpdate($Row,$where);
		}
	}
        public function SetSession($MemberRow,$Set=false){
		$Where=array();
		$Where['`member` = ?']=$MemberRow['id'];
		$SessionRow=$this->MemberModel->Db->FetchOneRow($this->_table.'_session',$Where);
		$Row=array('member'=>$MemberRow['id'],'username'=>$MemberRow['username'],'uptime'=>NOW_TIME,'servicesip'=>trim(ltrim(rtrim($_SERVER['REMOTE_ADDR']))),'clientip'=>C_IP);
		if($Set==true){
			$Row['lastip']=C_IP;
			$Row['lasttm']=NOW_TIME;
		}
		if(empty($SessionRow['member'])){
			$Row['online']='0';
			$Row['address']=Client::GetLocation(C_IP);
			$Row['system']=Client::GetOs();
			$Row['browser']=Client::GetBrowser();
			return $this->MemberModel->Db->insert($this->_table.'_session',$Row,$Where);
		}else{
			$uptime=NOW_TIME-$SessionRow['uptime'];
			$Row['online']=$SessionRow['online']+$uptime;
			$Cookie=Config::GetCookie();
			if($uptime>$Cookie['time']&&$Set==true){return '登陆超时';}
			if($Row['clientip']!=$SessionRow['clientip']&&$Set==true){return '有另一个ip使用您的帐号登陆';}
			$Row['address']=Client::GetLocation(C_IP);
			if($Row['address']!=$SessionRow['address']&&$Set=false){return '有另一个地址使用您的帐号登陆';}
			$Row['system']=Client::GetOs();
			if($Row['system']!=$SessionRow['system']&&$Set=false){return '有另一个系统使用您的帐号登陆';}
			$Row['browser']=Client::GetBrowser();
			if($Row['browser']!=$SessionRow['browser']&&$Set=false){return '有另一个浏览器使用您的帐号登陆';}
			if($uptime<60*5){return true;}
			return $this->MemberModel->Db->replace($this->_table.'_session',$Row,$Where);
		}
	}
	
	public function Save($data,$returnid=false,$output=false){
		return $this->MemberModel->Save($data,$returnid,$output);
	}
	public function Update($data,$where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->MemberModel->Update($data,$where,$output);
	}
	public function Delete($where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->MemberModel->Delete($where,$output);
	}
	
	public function DetailSave($data,$returnid=false,$output=false){
		return $this->MemberModel->DetailSave($data,$returnid,$output);
	}
	public function DetailUpdate($data,$where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->MemberModel->DetailUpdate($data,$where,$output);
	}
	public function DetailDelete($where,$output=false){
		if(is_numeric($where)){
			$where = array(
				'`id`=?'=>$where,
			);
		}
		return $this->MemberModel->DetailDelete($where,$output);
	}

    public function DetailGetId($where,$output=false){
        return $this->MemberModel->DetailGetOne($where, $output);
    }
	
	public function CacheRemove($id){
		Cache::Set('member','detail');
		if(is_array($id)){
			foreach($id AS $value){
				Cache::Delete('id_'.$value);
			}
		}else{
			Cache::Delete('id_'.$id);
		}
	}
        //判断用户是否超出了额度和时间限制
        public function checkMemberCredit($id){
                $where=array();
		$where['`id` = ?']=$id;
		$member_row=$this->MemberModel->GetRow($where);
                if($member_row['debt']>$member_row['credit_money']){
                    //超限的下个月1号时间
                    $exceed_next_month=strtotime(date('Y-m',strtotime('next month',$member_row['credit_exceed_time'])));
                    $all_scope_day=$exceed_next_month+(86400*$member_row['credit_days']);
                    if(NOW_TIME>$all_scope_day){
                        return true;
                    }
                }
                return false;
        }
}