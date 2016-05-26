<?php
$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if(empty($this->Param['option'])){
    /**
    * 个人中心 全部会员列表
     * @param limit 每页显示的条数 默认：5
     * @param page 当前页数 默认：0
     **/
    $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

    $data = $MemberListHelper->MemberPage($limit,$page,$this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $key => $val){
        $data['All'][$key]['detail'] = $MemberDetailHelper->GetMember($val['id']);
    }

    $row = array(
        'code' => 0,
        'data' => $data
    );

    echo $this->Param['callback']."(".json_encode($row).")";
    die();
}else{

}