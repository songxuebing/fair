<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();

    $this->LoadHelper('decoration/DecorationHelper');
    $DecorationHelper = new DecorationHelper();

    $this->LoadHelper('logistics/LogisticsHelper');
    $LogisticsHelper = new LogisticsHelper();

    $this->LoadHelper('route/RouteHelper');
    $RouteHelper = new RouteHelper();

    $this->LoadHelper('visa/VisaHelper');
    $VisaHelper = new VisaHelper();

    $this->LoadHelper('pay/PayHelper');
    $PayHelper = new PayHelper();

    $this->LoadHelper('balance/BalanceHelper');
    $BalanceHelper = new BalanceHelper();

    $this->LoadHelper('member/MemberListHelper');
    $MemberListHelper = new MemberListHelper();

    //获取用户信息
    $UserInfo = $this->UserConfig;
    if(empty($this->Param['option'])){

        $data = $MemberListHelper->GetMemberRow(array(
            '`id` = ?' => $this->UserConfig['Id']
        ));
        $this->Assign('merchant',$data);

        $limit = 10;

        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $type = empty($this->Param['type']) ? 'ye' : $this->Param['type'];

        $where = array();

        switch($type){
            case 'ye':
                $where = array('`delete` = ?' => 1,'`seller_id` = ?' => $UserInfo['Id'],'`order_state` = ?' => 3);
                $data = $OrderHelper->GetAllWhere($where, $limit, $page, $this->Param);
                if(!empty($data['All'])){
                    foreach($data['All'] as $k => $v){
                        switch($v['is_type']){
                            case 'convention':
                                $convention_row = $ConventionHelper->orderRow(array(
                                    '`order_sn` = ?' => $v['order_sn']
                                ));
                                $data['All'][$k]['title'] = $convention_row['con_name'];
                                break;
                            case 'decoration':
                                $decoration_row = $DecorationHelper->getOrderDecotionRow(array(
                                    '`order_sn` = ?' => $v['order_sn']
                                ));
                                $data['All'][$k]['title'] = $decoration_row['de_title'];
                                break;
                            case 'logistics':
                                $logistics_row = $LogisticsHelper->getOrderLogisticsRow(array(
                                    '`order_sn` = ?' => $v['order_sn']
                                ));
                                $log_detail = unserialize($logistics_row['log_detail']);
                                $data['All'][$k]['title'] = $log_detail['log_title'];
                                break;
                            case 'route':
                                $route_row = $RouteHelper->orderRow(array(
                                    '`order_sn` = ?' => $v['order_sn']
                                ));
                                $data['All'][$k]['title'] = $route_row['goods_name'];
                                break;
                            case 'visa':
                                $visa_row = $VisaHelper->getOrderVisaRow(array(
                                    '`order_sn` = ?' => $v['order_sn']
                                ));
                                $data['All'][$k]['title'] = $visa_row['visa_name'];
                                break;
                            default:
                        }
                    }
                }
                break;
            case 'tx':
                $where = array('`delete` = ?' => 1,'`member_id` = ?' => $UserInfo['Id']);
                $data = $BalanceHelper->GetAllWhere($where, $limit, $page, $this->Param);
                if(!empty($data['All'])){
                    foreach($data['All'] as $k => $v){
                        $data['All'][$k]['win_state'] = $BalanceHelper->changeStatus($v);
                    }
                }
                break;
        }

        $this->Assign('type', $type);
        $this->Assign('data', $data);
        echo $this->GetView('balance_index.php');
    }else{
        switch($this->Param['option']){
            case 'submit':
                break;
            default :
        }
    }