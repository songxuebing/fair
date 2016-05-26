<?php
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('decoration/DecorationHelper');
    $DecorationHelper = new DecorationHelper();

    if(empty($this->Param['option'])){
        $limit = 10;

        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where = array();
        if(!empty($this->Param['online'])){
            $where = array('`member_id` = ? ' => $this->UserConfig['Id'],'`is_delete` = ?' => 0,'`is_online` = ?' => 1);
            $online = 1;
        }else{
            $where = array('`member_id` = ? ' => $this->UserConfig['Id'],'`is_delete` = ?' => 0,'`is_online` = ?' => 0);
            $online = 0;
        }

        $data = $DecorationHelper->GetAllWhere($where, $limit, $page, $this->Param);

        $this->Assign('online', $online);
        $this->Assign('data', $data);
        $this->Assign('param', $this->Param);
        echo $this->GetView('decoration_list.php');

    }else{
        switch($this->Param['option']){
            case 'remove':
                $detailId = empty($this->Param['detailId']) ? 0 : $this->Param['detailId'];
                $visaRow = $DecorationHelper->Update(array('`is_delete` = ?' => 1),array('`id` = ?' => $detailId));
                if($visaRow){
                    ErrorMsg::Debug('删除成功',TRUE);
                }

                ErrorMsg::Debug('删除失败');
                break;
            case 'shelves':
                $detailId = empty($this->Param['detailId']) ? 0 : $this->Param['detailId'];
                $getRow = $DecorationHelper->getRow(array('`id` = ?' => $detailId));
                $data['is_online'] = $getRow['is_online'] == 1 ? 0 : 1;
                $detailR = $DecorationHelper->Update($data,array('`id` = ?' => $detailId));
                if($detailR){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
                break;
            default :
        }
    }