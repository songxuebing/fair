<?php
class MemberModel extends Module{
	public function __construct(){
		parent::__construct();
		$this->_table='member';
        $this->_fields=array('id','username','password','app_password','email','group','mobile','gender','integral','money','salt','enabled','delete','province','city','area','datetime','rating_number','industry_id','forum_id','signature');
        $this->_tagfields = array('tag_id','member_id','mytag_id','tag_name');
	}
	public function GetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table,$where,'COUNT(1)',$output);
	}
	public function GetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table,$this->_fields,$where,$group,$order,$output);
	}
	public function GetAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table,$this->_fields,$where,$limit,$group,$order,$output);
	}
	public function Save($data,$returnid=false,$output=false){
		//$this->Db->replace($this->_table,$data,$returnid,$output);
		return $this->Db->insert($this->_table,$data,$returnid,$output);
	}
	public function Update($data,$where,$output=false){
		return $this->Db->update($this->_table,$data,$where,$output);
	}
	public function Delete($where,$output=false){
		return $this->Db->delete($this->_table,$where,$output);
	}
	
	public function DetailGetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table.'_detail',$where,'COUNT(1)',$output);
	}
	public function DetailGetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table.'_detail',array('id','avatar','truename','mobile','birthday','entryday','constellation','telephone','fax','idcardtype','idcard','address','zipcode','nationality','birthcity','residecity','school','company','desc','entryday','cardaddress','position','sex','company_service','company_note'),$where,$group,$order,$output);
	}
	public function DetailGetAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table.'_detail',array('id','avatar','truename','mobile','birthday','entryday','constellation','telephone','fax','idcardtype','idcard','address','zipcode','nationality','birthcity','residecity','school','company','entryday','cardaddress','position','sex','company_service','company_note'),$where,$limit,$group,$order,$output);
	}
	public function DetailSave($data,$returnid=false,$output=false){
		//$this->Db->replace($this->_table.'_detail',$data,$returnid,$output);
		return $this->Db->insert($this->_table.'_detail',$data,$returnid,$output);
	}
	public function DetailUpdate($data,$where,$output=false){
		return $this->Db->update($this->_table.'_detail',$data,$where,$output);
	}
	public function DetailDelete($where,$output=false){
		return $this->Db->delete($this->_table.'_detail',$where,$output);
	}
	
	public function LogGetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table.'_log',$where,'COUNT(1)',$output);
	}
	public function LogGetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table.'_log',array('id','member','username','ip','dateline','desc','order_id','action'),$where,$group,$order,$output);
	}
	public function LogGetAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table.'_log',array('id','member','username','ip','dateline','desc','order_id','action'),$where,$limit,$group,$order,$output);
	}
	public function LogSave($data,$returnid=false,$output=false){
		//$this->Db->replace($this->_table.'_detail',$data,$returnid,$output);
		return $this->Db->insert($this->_table.'_log',$data,$returnid,$output);
	}
	public function LogUpdate($data,$where,$output=false){
		return $this->Db->update($this->_table.'_log',$data,$where,$output);
	}
	public function LogDelete($where,$output=false){
		return $this->Db->delete($this->_table.'_log',$where,$output);
	}
	
	public function SessionGetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table.'_session',$where,'COUNT(1)',$output);
	}
	public function SessionGetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table.'_session',array('id','username','lastip','lasttm','regip','login','online','uptime','servicesip','clientip','address','system','browser'),$where,$group,$order,$output);
	}
	public function SessionGetAll($where,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table.'_session',array('id','username','lastip','lasttm','regip','login','online','uptime','servicesip','clientip','address','system','browser'),$where,$limit,$group,$order,$output);
	}
	public function SessionSave($data,$returnid=false,$output=false){
		//$this->Db->replace($this->_table.'_detail',$data,$returnid,$output);
		return $this->Db->insert($this->_table.'_session',$data,$returnid,$output);
	}
	public function SessionUpdate($data,$where,$output=false){
		return $this->Db->update($this->_table.'_session',$data,$where,$output);
	}
	public function SessionDelete($where,$output=false){
		return $this->Db->delete($this->_table.'_session',$where,$output);
	}


    //用户标签
    public function tagOne($where,$output=false){
        return $this->Db->FetchOne($this->_table.'_tag',$where,'COUNT(1)',$output);
    }
    public function tagRow($where,$group=null,$order=null,$output=false){
        return $this->Db->FetchRow($this->_table.'_tag',$this->_tagfields,$where,$group,$order,$output);
    }
    public function tagAll($where,$limit=null,$group=null,$order=null,$output=false){
        return $this->Db->FetchAll($this->_table.'_tag',$this->_tagfields,$where,$limit,$group,$order,$output);
    }
    public function tagSave($data,$returnid=false,$output=false){
        return $this->Db->insert($this->_table.'_tag',$data,$returnid,$output);
    }
    public function tagUpdate($data,$where,$output=false){
        return $this->Db->update($this->_table.'_tag',$data,$where,$output);
    }
    public function tagDelete($where,$output=false){
        return $this->Db->delete($this->_table.'_tag',$where,$output);
    }
             
}