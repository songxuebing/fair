<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

$this->LoadHelper('adv/AdvHelper');
$AdvHelper =  new AdvHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper =  new MemberDetailHelper();

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

$this->LoadHelper('message/MessageHelper');
$MessageHelper = new MessageHelper();

if(empty($this->Param['option'])){
    /**
    * 帖子详情
     * @param id 帖子id
     * @param member_id 用户id
     * @param limit 每页显示的条数 评论分页用
     * @param page 当前页数
     * @param member_id 当前用户id
     **/
    $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
    $data = $ForumHelper->forumRow(array(
        '`delete` = ?' => 0,
        '`id` = ?' => $id,
        '`is_show` = ?' => 1
    ));
    if(empty($data)){
        $row = array(
            'code' => 1,
            'msg' => '帖子已删除或未通过审核'
        );
        echo $this->Param['callback']."(".json_encode($row).")";
        die();
    }
    //统计关注数
    $fav_count = $FavoriteHelper->favCount(array(
        '`related_id` = ?' => $id,
        '`sort` = ?' => 7
    ));
    $data['favcount'] = $fav_count;
	$praise = $ForumHelper->praiseCount(array(
			'`forum_id` = ?' => $id
	));

    $member = $MemberDetailHelper->GetId($data['member_id']);

    //获取评价
    $limit = empty($this->Param['limit']) ? 10 : $this->Param['limit'];
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 7 ,'`delete` = ?' => 0);
	/**
    $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->Param['member_id']);
	if(!empty($eva['All'])) foreach($eva['All'] as $key=>$val){
		//获取回复个人的消息
		$messageRow = $MessageHelper->messageAll(array('`forum_id` =?' =>$val['con_id'],'`to` =?'=>$val['member_id'],'`laiyuan` =?' =>1));

		if(!empty($messageRow)){
			foreach($messageRow as $k =>$v){
				$messageRow[$k]['to_info'] = $MemberDetailHelper->GetId($v['to']);
				$messageRow[$k]['from_info'] = $MemberDetailHelper->GetId($v['from']);
			}	
			
			$eva['All'][$key]['messageList']['detail'] = $messageRow;
		}
			
	}
	**/
	$listCount=$eva['One'];//总数
	$eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->Param['member_id']);
	if(!empty($eva['All'])) foreach($eva['All'] as $key=>$val){
		//获取回复个人的消息
		$eva['All'][$key]['leixing'] = 'pinglun';		
	}
	
	$messageRow = $MessageHelper->messageAll(array('`forum_id` =?' =>$id,'`laiyuan` =?' =>1));//获取该文章的全部消息
	if(!empty($messageRow)){
		foreach($messageRow as $k =>$v){
			
			$listCount++;
			$eva['All'][$listCount] = array(
				'content'=>$v['content'],
				'dateline'=>$v['dateline'],
				'forum_id'=>$v['forum_id'],
				'from'=>$v['from'],
				'id'=>$v['id'],
				'to'=>$v['to'],
				'laiyuan'=>$v['laiyuan'],
				'parent_id'=>$v['parent_id'],
				'to_info'=>$MemberDetailHelper->GetId($v['to']),
				'from_info'=>$MemberDetailHelper->GetId($v['from']),
				'leixing'=>'xiaoxi'
			);
			
		}
		$eva['One'] = count($eva['All']);
	}
	
	

    //获取是否已经收藏
    $fav_check = $FavoriteHelper->favCount(array(
        '`sort` = ?' => 7,
        '`related_id` = ?' => $id,
        '`member_id` = ?' => $this->UserConfig['Id']
    ));
    $row = array(
        'code' => 0,
        'data' => $data,
        'member' => $member,
		'praise'=>$praise,
        'eva' => $eva,
        'fav' => array('count'=>$fav_count,'check'=>$fav_check)
    );
    echo $this->Param['callback']."(".json_encode($row).")";
    die();

}else{


}
