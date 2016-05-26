<?php

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

if(empty($this->Param['option'])){
    $limit = 5;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array(
        '`delete` = ?' => 0,
        '`member_id` = ?' => $this->UserConfig['Id']
    );
    $data = $CommentHelper->getAllComment($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $data['All'][$k]['base'] = $CommentHelper->transComment($v);
    }
    $this->Assign('data' , $data);
    
    echo $this->GetView('user_comment.php');
}else{
    
}