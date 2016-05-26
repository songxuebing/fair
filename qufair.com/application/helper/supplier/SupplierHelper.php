<?php

class SupplierHelper extends Helper {

    var $SupplierModel;

    public function __construct() {
        $this->SupplierModel = $this->LoadModel('Supplier');
    }

    public function typeRow($where) {
        if(is_numeric($where)){
            $where = array(
                '`type_id` = ?' => $where
            );
        }
        return $this->SupplierModel->typeRow($where);
    }

    public function typeAll($where){
        if(is_numeric($where)){
            $where = array(
                '`type_id` = ?' => $where
            );
        }
        return $this->SupplierModel->typeAll($where);
    }
    public function typeSave($data,$where=array()){
        if(empty($where)){
            return $this->SupplierModel->typeSave($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`type_id` = ?' => $where
                );
            }
            return $this->SupplierModel->typeUpdate($data,$where);
        }
    }
    public function certCount($where){
        return $this->SupplierModel->certOne($where); 
    }
    public function certRow($where){
        if(is_numeric($where)){
            $where = array(
                '`cert_id` = ?' => $where
            );
        }
        return $this->SupplierModel->certRow($where);
    }
    public function certPageList($where,$limit,$page,$Param){
        $join = $this->joinWhere($Param);
        $where = array_merge($where,$join);
        $data['One']=$this->SupplierModel->certOne($where);
        if(!empty($data['One'])){
            $data['All']=$this->SupplierModel->certAll($where,array($page,$limit),NULL,array('dateline desc'));
            if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
                $type_row = $this->typeRow(array('`code` = ?' => $v['type_code']));
                $data['All'][$k]['type_name'] = $type_row['type_name'];
            }
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);                    
        }
        return $data; 
    }
    public function joinWhere($Param){
        $condition = array();
        if(!empty($Param['key'])){
            $condition['LOCATE(?,`company_name`) > 0'] = $Param['key'];
        }
        if(!empty($Param['st'])){
            $condition['`dateline` >= ?'] = strtotime($Param['st']);
        }
        if(!empty($Param['et'])){
            $condition['`dateline` < ?'] = strtotime($Param['et']);
        }
        return $condition;
    }
    public function certAll($where,$Param=''){
        if(!empty($Param)){
            $join = $this->joinWhere($Param);
            $where = array_merge($where,$join);
        }
        if(is_numeric(($where))){
            $where = array(
                '`member_id` = ?' => $where
            );
        }
        return $this->SupplierModel->certAll($where);
    }
    public function certSave($data,$where = array()){
        if(empty($where)){
            return $this->SupplierModel->certSave($data);
        }else{
            if(is_numeric(($where))){
                $where = array(
                    '`cert_id` = ?' => $where
                );
            }
            return $this->SupplierModel->certUpdate($data,$where);
        }
    }
    /*
     * 校验会员各认证情况
     */
    public function checkCertAll($member_id = 0){
        $supplier_type = $this->typeAll(array(
            '`type_id` > ?' => 0
        ));
        $data = array();
        if(!empty($supplier_type)) foreach($supplier_type as $k=>$v){
            
            $cert = $this->certRow(array(
                '`type_code` = ?' => $v['code'],
                '`member_id` = ?' => $member_id
            ));
            
            $supplier_type[$k]['status'] = $this->certStatus($cert);
            $supplier_type[$k]['cert'] = $cert;
            $data[$v['code']] = $supplier_type[$k];
        }
        return $data;
    }
    
    /*
     * 返回各状态信息
     * $params array();
     */
    public function certStatus($params){
        $status = array(
            'cert_text' => '未认证',
            'audit_text' => '未提交',
            'money_text' => '未提交',
        );
        switch($params['cert_state']){
            case 0:
                $status['cert_text'] =  '未认证';
                break;
            case 1:
                $status['cert_text'] =  '认证中';
                break;
            case 2:
                $status['cert_text'] =  '已认证';
                break;
            default :
        }
        if($params['cert_state'] > 0){
            $status['audit_text'] = $params['audit_state'] == 0 ? '未审核' : '已审核';
        }
        switch($params['money_check']){
            case 0:
                $status['money_text'] = '未打款';
                break;
            case 1:
                $status['money_text'] = '已打款';
                break;
            case 2:
                $status['money_text'] = '校验成功';
                break;
            case 3:
                $status['money_text'] = '校验失败';
                break;
        }
        return $status;
        
    }
    /*
     * 供应商操作日志
     */
    public function logRow($where){
        if(is_numeric($where)){
            $where = array(
                '`cert_id` = ?' => $where
            );
        }
        return $this->SupplierModel->logRow($where,NULL,array('dateline DESC'));
    }
    public function logAll($where){
        if(is_numeric(($where))){
            $where = array(
                '`cert_id` = ?' => $where
            );
        }
        return $this->SupplierModel->logAll($where);
    }
    public function logSave($data){
        return $this->SupplierModel->logSave($data);
    }
    /*
     * 供应商打款日志
     */
    public function remittanceRow($where){
        if(is_numeric($where)){
            $where = array(
                '`cert_id` = ?' => $where
            );
        }
        return $this->SupplierModel->remittanceRow($where,NULL,array('dateline DESC'));
    }
    public function remittanceAll($where){
        if(is_numeric(($where))){
            $where = array(
                '`cert_id` = ?' => $where
            );
        }
        return $this->SupplierModel->remittanceAll($where);
    }
    public function remittanceSave($data){
        return $this->SupplierModel->remittanceSave($data);
    }
}