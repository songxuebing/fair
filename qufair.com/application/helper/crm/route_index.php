<?php
$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
    
    $where = array(
        '`delete` = ?' => 0
    );
    switch($list){
        case 'all':
            break;
        case 'onsale':            
            $where['`is_sale` = ?'] = 1;
            break;
        case 'nosale':
            $where['`is_sale` = ?'] = 0;
            break;
    }
    
    $data = $RouteHelper->routePageList($where, $limit, $page, $this->Param);
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    
    echo $this->GetView('route_index.php');
    
} else {
    switch ($this->Param['option']) {
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $do = $RouteHelper->routeSave(array(
                'delete' => 1
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
            $route_row = $RouteHelper->routeRow(array(
                '`id` = ?' => $id
            ));
            if(empty($route_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_sale' => $route_row['is_sale'] == 1 ? 0 : 1
                );
                $do = $RouteHelper->routeSave($data,array(
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