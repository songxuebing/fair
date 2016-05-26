<?php

class OrderHelper extends Helper {

    var $OrderModel;
    var $ConventionModel;
    var $MemberModel;
    var $RouteModel;
    var $VisaModel;
    var $LogisticsModel;
    var $DecorationModel;

    public function __construct() {
        $this->OrderModell = $this->LoadModel('Order');
        $this->ConventionModel = $this->LoadModel('Convention');
        $this->MemberModel = $this->LoadModel('Member');
        $this->RouteModel = $this->LoadModel('Route');
        $this->VisaModel = $this->LoadModel('Visa');
        $this->LogisticsModel = $this->LoadModel('Logistics');
        $this->DecorationModel = $this->LoadModel('Decoration');
    }

    public function GetId($Id = '0') {
        $where = array();
        $where['`order_id` = ?'] = $Id;
        $OrderRow = $this->OrderModell->GetRow($where);

        return $OrderRow;
    }

    public function getRow($where) {
        return $this->OrderModell->GetRow($where);
    }

    public function getCount($where) {
        return $this->OrderModell->GetOne($where);
    }

    public function GetAllWhere($where, $limit, $page, $Param) {
        if (!empty($Param['st'])) {
            $where['`addtime` >= ?'] = strtotime($Param['st']);
        }
        if (!empty($Param['et'])) {
            $where['`addtime` <= ?'] = strtotime($Param['et']);
        }
        $data['One'] = $this->OrderModell->GetOne($where);
        $data['Summoney'] = $this->OrderModell->sumOne($where, 'SUM(price) AS totalmoney');
        if (!empty($data['One'])) {
            $data['All'] = $this->OrderModell->GetAll($where, array($page, $limit), NULL, array('order_id desc'));
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    public function getAllRow($field, $where, $limit, $page, $group) {
        return $this->OrderModell->GetGroupAll($field, $where, array($page, $limit), $group, array('order_id desc'));
    }

    public function Update($data, $where) {
        return $this->OrderModell->update($data, $where);
    }

    public function save($data) {
        return $this->OrderModell->add($data, true);
    }

    public function Delete($where) {
        return $this->OrderModell->delete($where);
    }

    public function changeOrderStatus($params) {
        switch ($params['order_state']) {
            case 0:
                $arr = array(
                    'text' => '等待支付',
                    'class' => 'mm_zh_dingdan_zhifu'
                );
                break;
            case 1:
                $arr = array(
                    'text' => '等待收货',
                    'class' => 'mm_zh_dingdan_zhifu'
                );
                break;
            case 2:
                $arr = array(
                    'text' => '订单取消',
                    'class' => 'mm_zh_dingdan_guanbi'
                );
                break;
            case 3:
                $arr = array(
                    'text' => '交易成功',
                    'class' => 'mm_zh_dingdan_chenggong'
                );
                break;
            case 4:
                $arr = array(
                    'text' => '支付尾款',
                    'class' => 'mm_zh_dingdan_zhifu'
                );
                break;
            default :
        }
        return $arr;
    }


    //回执单

    public function reUpdate($data, $where) {
        return $this->OrderModell->reUpdate($data, $where);
    }

    public function reSave($data) {
        return $this->OrderModell->reSave($data, true);
    }

    public function getReRow($where) {
        return $this->OrderModell->GetReRow($where);
    }

    /*
     * 订单类型分类型输出
     * $params数组 订单总表的一条数据
     */

    public function shuntOrder($params) {
        switch ($params['is_type']) {
            case 'convention':
                $list = $this->ConventionModel->getOrderRow(array('`order_sn` = ? ' => $params['order_sn']));
                $params['detail'] = $list;
                $params['detail']['detail'] = unserialize($list['detail']);
                $params['goods_name'] = $params['detail']['con_name'];
                $params['pay_url'] = WEB_URL . '/convention/order/option/pay/sn/' . $params['order_sn'];
                $params['url'] = '/convention/index/option/detail/id/' . $params['detail']['con_id'];
                $params['pay_return'] = WEB_URL.'/convention/order/option/payreturn/sn/' . $params['order_sn'];
                break;
            case 'route':
                $detail = $this->RouteModel->orderRow(array(
                    '`order_sn` = ?' => $params['order_sn']
                ));
                $detail['goods_detail'] = unserialize($detail['goods_detail']);
                $detail['receiving'] = unserialize($detail['receiving']);
                $params['route_order'] = $detail;
                $params['pay_url'] = WEB_URL . '/route/order/option/pay/sn/' . $params['order_sn'];
                $params['goods_name'] = $detail['goods_name'];
                $params['url'] = '/route/index/option/detail/id/' . $detail['route_id'];
                $params['pay_return'] = WEB_URL . '/route/order/option/payreturn/sn/' . $params['order_sn'];
                break;
            case 'visa':
                $detail = $this->VisaModel->orderVisaRow(array(
                    '`order_sn` = ?' => $params['order_sn']
                ));
                $detail['receiving'] = unserialize($detail['receiving']);
                $params['visa_order'] = $detail;
                $params['pay_url'] = WEB_URL . '/visa/order/option/pay/sn/' . $params['order_sn'];
                $params['goods_name'] = $detail['visa_name'];
                $params['url'] = '/visa/index/option/detail/id/' . $detail['visa_id'];
                $params['pay_return'] = WEB_URL.'/visa/order/option/payreturn/sn/' . $params['order_sn'];
                break;
            case 'logistics':
                $detail = $this->LogisticsModel->orderLogisticsRow(array(
                    '`order_sn` = ?' => $params['order_sn']
                ));
                $detail['receiving'] = unserialize($detail['receiving']);
                $detail['log_detail'] = unserialize($detail['log_detail']);

                $detail['log_detail']['log_freight'] = unserialize($detail['log_detail']['log_freight']);
                $detail['yf_total_price'] = $detail['num'] * $detail['freight'];

                $params['log_order'] = $detail;
                $params['pay_url'] = WEB_URL . '/logistics/order/option/pay/sn/' . $params['order_sn'];
                $params['goods_name'] = $detail['log_detail']['log_title'];

                $params['url'] = '/logistics/index/option/detail/id/' . $detail['log_id'];
                $params['pay_return'] = WEB_URL.'/logistics/order/option/payreturn/sn/' . $params['order_sn'];
                break;
            case 'decoration':
                $detail = $this->DecorationModel->orderDecorationRow(array(
                    '`order_sn` = ?' => $params['order_sn']
                ));
                $detail['receiving'] = unserialize($detail['receiving']);
                $detail['detail'] = unserialize($detail['detail']);
                $detail['de_style'] = unserialize($detail['de_style']);

                $params['decoration_order'] = $detail;
                $params['pay_url'] = WEB_URL . '/decoration/order/option/pay/sn/' . $params['order_sn'];
                $params['goods_name'] = $detail['de_title'];

                $params['url'] = '/decoration/index/option/detail/id/' . $detail['de_id'];
                $params['pay_return'] = WEB_URL.'/decoration/order/option/payreturn/sn/' . $params['order_sn'];
                break;
            default :
        }
        return $params;
    }

    /*
     * 热销商户
     * $params array()
     */

    public function getHostMer($params) {
        $where = array(
            '`is_type` = ?' => $params['type'],
            '`delete` = ?' => 0
                //'`order_state` = ?' => 3
        );
        $data = $this->OrderModell->GetAll($where, array(1, $params['limit']), array('seller_id'), array('total_order DESC'), false, 'seller_id,order_sn,is_type,count(order_id) as total_order');
        if (!empty($data))
            foreach ($data as $k => $v) {
                $seller = $this->MemberModel->GetRow(array('`id` = ?' => $v['seller_id']));
                $seller_detail = $this->MemberModel->DetailGetRow(array('`id` = ?' => $v['seller_id']));
                $data[$k]['seller'] = array_merge($seller, $seller_detail);
                $trans = $this->shuntOrder($v);
                $data[$k]['link'] = $trans['url'];
            }
        return $data;
    }

}