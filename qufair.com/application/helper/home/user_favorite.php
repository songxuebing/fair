<?php

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

if(empty($this->Param['option'])){
    $limit = 5;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $sort = empty($this->Param['sort']) ? 1 : $this->Param['sort'];

    switch($sort){
        case '1':
            $where = array(
                '`sort` = ?' => 1,
                '`member_id` = ?' => $this->UserConfig['Id']
            );
            break;
        case '7':
            $where = array(
                '`sort` = ?' => 7,
                '`member_id` = ?' => $this->UserConfig['Id']
            );
            break;
        default:
    }

    $data = $FavoriteHelper->getAllfavorite($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $data['All'][$k]['base'] = $FavoriteHelper->transFavorite($v);
    }
    $this->Assign('data' , $data);
    $this->Assign('param' , $this->Param);
    $this->Assign('sort' , $sort);

    echo $this->GetView('user_favorite.php');
}else{
    
}