<?php

$this->LoadHelper('message/MessageHelper');
$MessageHelper = new MessageHelper();

/*$MessageHelper->messageSave(array(
    'title' => '2016第十届中国（广州）国际食用油及橄榄油产业博览会',
    'content' => '中国油脂油料生产，加工及发展趋势（王瑞元） 2.橄榄油评比大赛及颁奖 3.优质产品评选及颁奖典礼 4.土耳其橄榄及橄榄油土耳其橄榄油推广协会） 5.国际橄榄',
    'to' => $this->UserConfig['Id'],
    'dateline' => NOW_TIME
));
die();
 * 
 */
if(empty($this->Param['option'])){
    $limit = 5;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array(
        '`to` = ?' => $this->UserConfig['Id']
    );
    $data = $MessageHelper->messagePageList($where, $limit, $page, $this->Param);
    $this->Assign('data' , $data);
    
    echo $this->GetView('user_message.php');
}else{
    switch($this->Param['option']){
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $where = array(
                '`to` = ?' => $this->UserConfig['Id'],
                '`id` = ?' => $id
            );
            $MessageHelper->messageRemove($where);
            ErrorMsg::Debug('删除成功',TRUE);
            break;
    }
}