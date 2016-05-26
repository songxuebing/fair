<?php

$this->LoadHelper('adv/AdvHelper');
$AdvHelper = new AdvHelper();

/**
* APP 广告接口文档
* @param id 广告位置id
***/

$id = empty($this->Param['adv_id']) ? 0 : $this->Param['adv_id'] ;

$adv_row = $AdvHelper->advAll(array(
    '`pos_id` = ?' => $id
));

if(!empty($adv_row)){
    $data['code'] = 0;
    $data['data'] = $adv_row;
}else{
    $data['code'] = 1;
}
echo $this->Param['callback']."(".json_encode($data).")";
die();