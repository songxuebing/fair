<?php
$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

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

    $data = $DecorationHelper->GetAllWhere($where, $limit, $page, $this->Param);
    if(!empty($data['All'])){
        foreach($data['All'] as $k => $v){
            $data['All'][$k]['style_type'] = unserialize($v['style_type']);
        }
    }
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('decoration_index.php');
    
} else {
    switch ($this->Param['option']) {
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $do = $DecorationHelper->Update(array(
                'is_delete' => 1
            ),array(
                '`id` = ?' => $id
            ));
            if($do){
                ErrorMsg::Debug('删除成功',TRUE);
            }
            ErrorMsg::Debug('删除失败');
            break;
        case 'saleopt':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $decoration_row = $DecorationHelper->getRow(array(
                '`id` = ?' => $id
            ));
            if(empty($decoration_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_online' => $decoration_row['is_online'] == 1 ? 0 : 1
                );
                $do = $DecorationHelper->Update($data,array(
                    '`id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        case 'recommend':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $decoration_row = $DecorationHelper->getRow(array(
                '`id` = ?' => $id
            ));
            if(empty($decoration_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_index' => $decoration_row['is_index'] == 1 ? 0 : 1
                );
                $do = $DecorationHelper->Update($data,array(
                    '`id` = ?' => $id
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