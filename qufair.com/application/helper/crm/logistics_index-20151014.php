<?php
$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
    
    $where = array(
        '`is_delete` = ?' => 0
    );
    switch($list){
        case 'all':
            break;
        case 'onsale':            
            $where['`is_online` = ?'] = 0;
            break;
        case 'nosale':
            $where['`is_online` = ?'] = 1;
            break;
    }
    $data = $LogisticsHelper->GetAllWhere($where, $limit, $page, $this->Param);

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('logistics_index.php');
    
} else {
    switch ($this->Param['option']) {
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $do = $LogisticsHelper->Update(array(
                'is_delete' => 1
            ),array(
                '`log_id` = ?' => $id
            ));

            if($do){
                ErrorMsg::Debug('删除成功',TRUE);
            }
            ErrorMsg::Debug('删除失败');
            break;
        case 'saleopt':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $logistics_row = $LogisticsHelper->getRow(array(
                '`log_id` = ?' => $id
            ));

            if(empty($logistics_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_online' => $logistics_row['is_online'] == 0 ? 1 : 0
                );
                $do = $LogisticsHelper->Update($data,array(
                    '`log_id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        case 'recommend':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $logistics_row = $LogisticsHelper->getRow(array(
                '`log_id` = ?' => $id
            ));
            if(empty($logistics_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_index' => $logistics_row['is_index'] == 1 ? 0 : 1
                );
                $do = $logistics_row->Update($data,array(
                    '`log_id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        default :
    }
}