<?php
$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

$this->LoadHelper('adv/AdvHelper');
$AdvHelper =  new AdvHelper();

$this->LoadHelper('comment/CommentHelper');
$CommentHelper =  new CommentHelper();

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper =  new MemberDetailHelper();

if(empty($this->Param['option'])){

    $tagAll = $ForumHelper->cTagAll(array(
        '`is_open` = ?' =>1,
        '`is_delete` = ?' =>0
    ),null,null,array('sort asc'));

    $row = array(
        'code' => 0,
        'data' => $tagAll
    );
     echo $this->Param['callback']."(".json_encode($row).")";
    die();


}else{
    switch ($this->Param['option']){
        case 'mytag':
            $memberid = empty($this->Param['member_id']) ? 0 :$this->Param['member_id'];

            $myTag = $MemberListHelper->tagMemberList(array(
                '`member_id` = ?' =>$memberid,
				'`mytag_id` <> ?' => 0,
				'`tag_name` <> ?' => ''
            ));

            $row = array(
                'code' => 0,
                'data' => $myTag
            );
            echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
        case 'addTag':
            $memberid = empty($this->Param['member_id']) ? 0 :$this->Param['member_id'];
            $tag_id = empty($this->Param['tag_id']) ? 0 :$this->Param['tag_id'];
			
			$mytag = $MemberListHelper->tagMemberRow(array(
				'`member_id` = ?' =>$memberid,
				'`mytag_id` = ?' => $tag_id
			));
			if(!empty($mytag)){
				$row = array(
					'code' => 1,
					'msg' =>'该标签已经添加过了！'
				);
				echo $this->Param['callback']."(".json_encode($row).")";
				die();
			}
			
            $row = $ForumHelper->cTagRow(array(
                '`ctag_id` = ?' => $tag_id
            ));

            $id = $MemberListHelper->tagMemberSave(array(
                'member_id' => $memberid,
                'mytag_id' => $row['ctag_id'],
                'tag_name' => $row['ctag_name']
            ));

            if($id > 0){
                $row = array(
                    'code' => 0,
                    'msg'=>'添加成功'
                );
            }else{
                $row = array(
                    'code' => 1
                );
            }

             echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
        case 'removeTag':
            $memberid = empty($this->Param['member_id']) ? 0 :$this->Param['member_id'];
            $tag_id = empty($this->Param['tag_id']) ? 0 :$this->Param['tag_id'];

            $row = $MemberListHelper->tagRemove(array(
                '`member_id` = ?' => $memberid,
                '`mytag_id` = ?' => $tag_id
            ));
			
			if($row){
				$row = array(
					'code' => 0
				);
			}else{
				$row = array(
					'code' => 1
				);
			}

            echo $this->Param['callback']."(".json_encode($row).")";
            die();
            break;

        default:
    }

}
