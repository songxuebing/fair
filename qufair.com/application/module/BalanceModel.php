<?php

class BalanceModel extends Module {

    public function __construct() {
        parent::__construct();
        $this->_table = 'withdrawal';
        $this->_field = array('id','order_sn', 'member_id', 'withdrawal_name', 'money', 'actual_amount', 'commission', 'bank_id', 'add_time', 'arrive_time', 'win_state');
        $this->_bankField = array('id','member_id','username','id_card','bank_name','bank_no','bank_address','tel','is_default');
    }

    public function GetOne($where, $output = false) {
        return $this->Db->FetchOne($this->_table, $where, 'COUNT(1)', $output);
    }

    public function GetRow($where, $group = null, $order = null, $output = false) {
        return $this->Db->FetchRow($this->_table, $this->_field, $where, $group, $order, $output);
    }

    public function Save($data, $returnid = false, $output = false) {
        return $this->Db->insert($this->_table, $data, $returnid, $output);
    }

    public function GetAll($where, $limit = null, $group = null, $order = null, $output = false) {
        return $this->Db->FetchAll($this->_table, $this->_field, $where, $limit, $group, $order, $output);
    }

    public function delOne($where) {
        return $this->Db->delete($this->_table, $where);
    }

    public function Update($data, $where, $output = false) {
        return $this->Db->update($this->_table, $data, $where, $output);
    }


    //绑定的银行卡号信息
    public function GetBankRow($where,$group=null,$order=null,$output=false){
        return $this->Db->FetchRow($this->_table.'_bank',$this->_bankField,$where,$group,$order,$output);
    }

    public function GetBankOne($where,$output=false){
        return $this->Db->FetchOne($this->_table.'_bank',$where,'COUNT(1)',$output);
    }

    public function GetBankAll($where,$limit=null,$group=null,$order=null,$output=false){
        return $this->Db->FetchAll($this->_table.'_bank',$this->_bankField,$where,$limit,$group,$order,$output);
    }

    public function bankSave($data,$returnid=TRUE,$output=false){
        return $this->Db->insert($this->_table.'_bank',$data,$returnid,$output);
    }
    public function bankUpdate($data,$where,$output=false){
        return $this->Db->update($this->_table.'_bank',$data,$where,$output);
    }
    public function bankDelete($where,$output=false){
        return $this->Db->delete($this->_table.'_bank',$where,$output);
    }


}