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

        //新的行程2016-06-29
        case 'route_new':
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];

            $where = array(
                //'`delete` = ?' => 0
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

            $data = $RouteHelper->routenewPageList($where, $limit, $page, $this->Param);

            //var_dump($data);exit();
            $this->Assign('data', $data);
            $this->Assign('param', $this->Param);

            echo $this->GetView('route_new.php');
            break;

        case 'new_submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['title'] = $this->Param['title'];
            $data['title_describe'] = $this->Param['title_describe'];
            $data['regional'] = $this->Param['regional'];
            $data['countries'] = $this->Param['countries'];
            $data['city'] = $this->Param['city'];
            $data['departure'] = $this->Param['departure'];
            $data['price'] = $this->Param['price'];
            $data['introduce'] = $this->Param['introduce'];
            $data['price_explain'] = $this->Param['price_explain'];
            $data['visa_explain'] = $this->Param['visa_explain'];
            $data['reserve_notice'] = $this->Param['reserve_notice'];
            $data['update_time'] = time();
            $data['cover'] = $this->Param['cover'];

            $imgurl2 = $this->Param['imgurl2'];
            $imgurl3 = $this->Param['imgurl3'];
            $imgurl4 = $this->Param['imgurl4'];

            $data['image'] = serialize(array($imgurl2, $imgurl3, $imgurl4));

            if ($id > 0) {
                $RouteHelper->routeUpdate($data, array('`id` = ?' => $id));
                ErrorMsg::Debug('保存成功', TRUE);
            }

            ErrorMsg::Debug('保存失败');
            break;

        case "route_new_edit":
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data = $RouteHelper->routenewRow(array(
                '`id` = ?' => $id,
                //'`is_sale` = ?' => 1
            ));

            if (!empty($data['image'])) {
                $data['imgurl'] = unserialize($data['image']);
            }

            $this->Assign('data', $data);
            echo $this->GetView('route_new_edit.php');
            break;
        case 'uploadImg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox']);

            break;
        default :
    }
}