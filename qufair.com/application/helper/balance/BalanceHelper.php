<?php

class BalanceHelper extends Helper {

    var $BalanceModel;

    public function __construct() {
        $this->BalanceModel = $this->LoadModel('Balance');
    }

    public function GetId($Id = '0') {
        $where = array();
        $where['`id` = ?'] = $Id;
        $OrderRow = $this->BalanceModel->GetRow($where);

        return $OrderRow;
    }

    public function getRow($where) {
        return $this->BalanceModel->GetRow($where);
    }

    public function getCount($where) {
        return $this->BalanceModel->GetOne($where);
    }

    public function GetAllWhere($where, $limit, $page, $Param) {

        $data['One'] = $this->BalanceModel->GetOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->BalanceModel->GetAll($where, array($page, $limit), NULL, array('id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function getAllRow($field, $where, $limit, $page, $group) {
        return $this->BalanceModel->GetGroupAll($field, $where, array($page, $limit), $group, array('order_id desc'));
    }

    public function Update($data, $where) {
        return $this->BalanceModel->update($data, $where);
    }

    public function save($data) {
        return $this->BalanceModel->add($data, true);
    }

    public function Delete($where) {
        return $this->BalanceModel->delete($where);
    }

    //获取银行卡

    public function getBankRow($where) {
        return $this->BalanceModel->GetBankRow($where);
    }

    public function bankUpdate($data, $where) {
        return $this->BalanceModel->bankUpdate($data, $where);
    }

    public function bankSave($data) {
        return $this->BalanceModel->bankSave($data);
    }













    public function changeStatus($params) {
        switch ($params['win_state']) {
            case 1:
                $arr = array(
                    'text' => '审核中',
                    'class'=>'#d60913',
                    'val' => 1
                );
                break;
            case 2:
                $arr = array(
                    'text' => '已审核',
                    'class'=>'#d60913',
                    'val' => 2
                );
                break;
            case 3:
                $arr = array(
                    'text' => '待打款',
                    'class'=>'#d60913',
                    'val' => 3
                );
                break;
            case 4:
                $arr = array(
                    'text' => '已打款',
                    'class'=>'#4fae0a',
                    'val' => 4
                );
                break;
            case 5:
                $arr = array(
                    'text' => '取消',
                    'val' => 5
                );
                break;
            default :
        }
        return $arr;
    }


}