<?php
$this->LoadHelper('message/MessageHelper');
$MessageHelper = new MessageHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper=new MemberListHelper();

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

if(empty($this->Param['option'])){
    /**
    * 个人中心 系统消息
     * @param limit 默认值：5 每页显示的条数
     * @param page 当前页数
     * @param member_id 当前用户id
     **/
    $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array(
        '`to` = ?' => $this->Param['member_id'],
		'`laiyuan` = ?' =>1
    );
    $data = $MessageHelper->messagePageList($where, $limit, $page, $this->Param);
	if(!empty($data['All'])) foreach($data['All'] as $key => $var){
		if(!empty($var['forum_id'])){
			$data['All'][$key]['article'] = $ForumHelper->forumRow($var['forum_id']);//文章
		}else{
			$data['All'][$key]['article'] = '';
		}
		
		$fromDetail = $MemberDetailHelper->GetId($var['from']);
		$toDetail = $MemberDetailHelper->GetId($var['to']);

		$data['All'][$key]['from_info'] = $MemberListHelper->GetMemberRow(array('`id` =?'=>$var['from']));//发布者的id
		$data['All'][$key]['from_info']['avatar'] = $fromDetail['avatar'];
		$data['All'][$key]['to_info'] = $MemberListHelper->GetMemberRow(array('`id` =?'=>$var['to']));//被回复的对象id
		$data['All'][$key]['to_info']['avatar'] = $toDetail['avatar'];
	}

    $row = array(
        'code' => 0,
        'data' => $data
    );

    echo $this->Param['callback']."(".json_encode($row).")";

    die();

}else{
    switch($this->Param['option']){
        case 'remove':
            /**
             * 个人中心 删除消息
             * @param id 消息id
             * @param member_id 用户id
             **/
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $where = array(
                '`to` = ?' => $this->Param['member_id'],
                '`id` = ?' => $id
            );
            $MessageHelper->messageRemove($where);
            $row = array(
                'code' => 0,
                'msg' => '删除成功'
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
        case 'detail':
            /**
            * 个人中心 查看系统消息
             * @param id 系统消息id
             **/
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $messageRow = $MessageHelper->messageRow(array(
                '`id` = ?' => $id
            ));

            $row = array(
                'code' => 0,
                'data' => $messageRow
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();


            break;
        default:
    }
}