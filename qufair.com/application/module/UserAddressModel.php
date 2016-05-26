<?php
class UserAddressModel extends Module{
	public function __construct(){
		parent::__construct();
		$this->_table='user_address';
        $this->_field = array('address_id','member_id','address_user_name','address_txt','address_mobile','address_tel','address_email','address_zipcode','is_default','company_name','company_address','website','fax');
	}
    //个人地址
	public function GetOne($where,$output=false){
		return $this->Db->FetchOne($this->_table,$where,'COUNT(1)',$output);
	}
	public function GetRow($where,$group=null,$order=null,$output=false){
		return $this->Db->FetchRow($this->_table,$this->_field,$where,$group,$order,$output);
	}

    public function GetAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $this->_field, $where, $limit, $group, $order, $output);
    }

    public function update($data,$where,$output=false){
        return $this->Db->update($this->_table,$data,$where,$output);
    }

    public  function  delOne($where){
        return $this->Db->delete($this->_table,$where);
    }

}