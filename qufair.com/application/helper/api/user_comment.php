<?php
$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

if(empty($this->Param['option'])){
    /**
    * 个人中心 点评接口
     * @param limit 每页显示数量
     * @param page 当前页面
     * @param member_id 当前用户id
    **/
    $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array(
        '`delete` = ?' => 0,
        '`member_id` = ?' => $this->Param['member_id'],
		'`is_type` = ?' => 7
    );
    $data = $CommentHelper->getAllComment($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $data['All'][$k]['base'] = $CommentHelper->transComment($v);
    }


    $row = array(
        'code' => 0,
        'data' => $data
    );

    echo $this->Param['callback']."(".json_encode($row).")";

    die();
}else{

}