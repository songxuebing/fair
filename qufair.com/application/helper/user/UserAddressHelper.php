<?php
class UserAddressHelper extends Helper{
	var $UserAddressModel;
	public function __construct(){
		$this->UserAddressModel=$this->LoadModel('UserAddress');
	}

    public function GetId($Id='0'){
        $where=array();
        $where['`address_id` = ?']=$Id;
        $UserAddressRow=$this->UserAddressModel->GetRow($where);

        return $UserAddressRow;
    }

    public function getRow($where){
        return $this->UserAddressModel->GetRow($where);
    }

    public function GetAllWhere($where,$limit,$page,$Param){
        $data['One']=$this->UserAddressModel->GetOne($where);

        if(!empty($data['One'])){
            $data['All']=$this->UserAddressModel->GetAll($where,array($page,$limit),NULL,array('address_id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit,$page,$data['One']);
        }
        return $data;
    }

    public function Update($data,$where){
        return $this->UserAddressModel->update($data,$where);
    }
    public function save($data){
        return $this->UserAddressModel->add($data);
    }
    public function Delete($where){
        return $this->UserAddressModel->delete($where);
    }
}