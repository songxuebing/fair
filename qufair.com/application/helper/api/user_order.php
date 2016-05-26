<?php
$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('user/UserAddressHelper');
$UserAddressHelper = new UserAddressHelper();

$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('pay/PayHelper');
$PayHelper = new PayHelper();

if(empty($this->Param['option'])){
    /**
     * 个人中心 订单列表
     * @param member_id 当前用户id
     * @param page 页码
     * @param is_sale 订单状态 值：all 全部订单 默认值，1：进行的订单，2：取消的订单
     * @param limit 每页显示的多少 默认：5
     **/

    $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $is_sale = empty($this->Param['is_sale']) ? 'all' : $this->Param['is_sale'];

    $where['`member_id` = ?'] = $this->Param['member_id'];
    $where['`delete` = ?'] = 1;
    if(!empty($this->Param['order_sn'])){
        $where['locate(?,`order_sn`)>0'] = trim($this->Param['order_sn']);
    }

    switch($this->Param['is_sale']){
        case '1'://进行的订单
            $where['`order_state` <> ?'] = 2;
            break;
        case '2'://取消的订单
            $where['`order_state` = ?'] = 2;
            break;
    }

    $data = $OrderHelper->GetAllWhere($where, $limit, $page, $this->Param);

    if(!empty($data['All'])){
        foreach($data['All'] as $k => $v){
            $chans = $OrderHelper->shuntOrder($v);
            $data['All'][$k] = array_merge($v,$chans);
        }
    }

    $row = array(
        'code'=>0,
        'is_sale'=>$is_sale,
        'data'=>$data,
        'param' => $this->Param
    );

    echo $this->Param['callback']."(".json_encode($row).")";
    die();

}else{
    switch($this->Param['option']){
        case 'cancel'://取消订单
            /**
             * 个人中心 取消订单
             * @param member_id 当前用户id
             * @param order_id 订单id
             **/
            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
            $where = array('`order_id` = ?'=>$order_id,'`member_id` = ?' => $this->Param['member_id']);

            if(!empty($this->Param['area_id'])){
                $ConventionHelper->areaUpdate(array(
                    'is_rent' => 0
                ),array(
                    '`area_id` = ?' => $this->Param['area_id']
                ));
            }

            $data['order_state'] = 2;
            $row = $OrderHelper->Update($data,$where);
            if($row){

                echo $this->Param['callback']."(".json_encode(array(
                        'code' => 0,
                        'msg' => '成功'
                    )).")";


                die();
            }else{

                $d = array(
                    'code' => 0,
                    'msg' => '失败'
                );
                echo $this->Param['callback']."(".json_encode($d).")";

                die();
            }

            break;
        case 'remove'://删除订单
            /**
             * 个人中心 删除订单
             * @param order_id 订单id
             * @param member_id 当前用户id
             **/
            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
            $where = array('`order_id` = ?'=>$order_id,'`member_id` = ?' => $this->Param['member_id']);
            $data['delete'] = 0;
            $row = $OrderHelper->Update($data,$where);
            if($row){

                $d = array(
                    'code' => 0,
                    'msg' => '成功'
                );
                echo $this->Param['callback']."(".json_encode($d).")";
                die();
            }else{

                $d = array(
                    'code' => 1,
                    'msg' => '失败'
                );
                echo $this->Param['callback']."(".json_encode($d).")";
                die();
            }

            echo $this->Param['callback']."(".json_encode($msg).")";
            break;
        case 'gathering':
			/**
			* 个人中心 订单收货
			* @param order_id 订单id
			* @param member_id 用户id
			* @param 
			**/
            $order_id = empty($this->Param['order_id']) ? 0 : $this->Param['order_id'];
			$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];
            $where = array('`order_id` = ?'=>$order_id);
            $data['order_state'] = 3;
			
            $row = $OrderHelper->Update($data,$where);

            //支付记录
            $payRow = $PayHelper->logRow(array(
				'`order_id` = ?'=>$order_id
			));

            //添加记录到支付日志表
            $dataPay['pay_sn'] = $payRow['pay_sn'];
            $dataPay['payment'] = $payRow['payment'];
            $dataPay['category'] = 'gathering';
            $dataPay['member'] = $payRow['member'];
            $dataPay['order_sn'] = $payRow['order_sn'];
            $dataPay['order_id'] = $payRow['order_id'];
            $dataPay['amount'] = $payRow['amount'];
            $dataPay['is_paid'] = $payRow['is_paid'];
            $dataPay['remarks'] = $payRow['remarks'];
            $dataPay['delete'] = $payRow['delete'];
            $dataPay['dateline'] = time();
			
            $PayHelper->logSave($dataPay);

            //获取用户余额等信息
            $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $member_id));
            $amount = floor(($memberRow['money'] + $payRow['amount']) * 100);
            $moneryTotal = ($amount / 100);
            $MemberListHelper->memberUpdate(array('money' => $moneryTotal),array('`id` = ?' => $member_id));

            if($row){

                $d = array(
                    'code' => 0,
                    'msg' => '成功'
                );
                echo $this->Param['callback']."(".json_encode($d).")";
                die();
            }else{

                $d = array(
                    'code' => 1,
                    'msg' => '失败'
                );
                echo $this->Param['callback']."(".json_encode($d).")";
                die();
            }
            break;
        case 'detail':
            /**
             * 个人中心 订单详情
             * @param sn 订单编号
             * @param member_id 当前用户id
             **/
            if(empty($this->Param['sn'])){

                $d = array(
                    'code' => 1,
                    'msg' => '参数错误'
                );
                echo $this->Param['callback']."(".json_encode($d).")";
                die();
            }
            $sn = $this->Param['sn'];
            $memberId = $this->Param['member_id'];

            $order_row = $OrderHelper->getRow(array(
                '`order_sn` = ?' => $sn
            ));

            switch($order_row['is_type']){
                case 'convention'://展会订单信息
                    $data = $ConventionHelper->orderRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['detail'] = unserialize($data['detail']);
                    $data['receiving'] = unserialize($data['receiving']);
                    break;
                case'route':
                    $data = $RouteHelper->orderRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['goods_detail'] = unserialize($data['goods_detail']);
                    $data['receiving'] = unserialize($data['receiving']);

                    break;
                case'visa':

                    $data = $VisaHelper->getOrderVisaRow(array(
                        '`order_sn` = ?' => $sn
                    ));
                    $data['receiving'] = unserialize($data['receiving']);

                    //签证人信息
                    $data['visa_member'] = $VisaHelper->getVisaMemberList(array( '`order_id` = ?' => $data['id']),200,0,'');

                    break;
                case'logistics':
                    $data = $LogisticsHelper->getOrderLogisticsRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['log_detail'] = unserialize($data['log_detail']);
                    $data['receiving'] = unserialize($data['receiving']);
                    $data['log_detail']['log_freight'] = unserialize($data['log_detail']['log_freight']);

                    break;
                case'decoration':
                    $data = $DecorationHelper->getOrderDecotionRow(array(
                        '`order_sn` = ?' => $sn
                    ));

                    $data['detail'] = unserialize($data['detail']);
                    $data['receiving'] = unserialize($data['receiving']);
                    $data['de_style'] = unserialize($data['de_style']);

                    break;
                default:
            }

            $row = array(
                'code' => 0,
                'data' => $data,
                'order' => $order_row,
                'type' => $order_row['is_type']
            );
            echo $this->Param['callback']."(".json_encode($row).")";

            die();
            break;
        default:
    }

}





