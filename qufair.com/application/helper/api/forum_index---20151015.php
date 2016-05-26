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

if(empty($this->Param['option'])){
    $adv_where = array(
        '`start_time` <= ?' => NOW_TIME,
        '`end_time` >= ?' => NOW_TIME,
        '`pos_id` = ?' => 7
    );
    $loop_adv = $AdvHelper->advAll($adv_where,array(1,4),NULL,array('id DESC'));
	
	$recommend = $ForumHelper->forumPageList(array('`delete` = ?' => 0,'`recommend` = ?' => 1), 1, 1 ,$this->Param);
	
    //最新资讯3条
    $new = $ForumHelper->forumPageList(array('`delete` = ?' => 0,'`is_show` = ?' => 1), 3, 1 ,$this->Param);

    //图片资讯
    $pic = $ForumHelper->forumPageList(array('`delete` = ?' => 0,'`cover` <> ?' => '','`is_show` = ?' => 1), 3, 1 ,$this->Param);

    $row = array(
        'code' => 0,
        'loop_adv' => $loop_adv,
		'recommend' => $recommend,
        'new' => $new,
        'pic' => $pic
    );
    echo $this->Param['callback']."(".json_encode($row).")";
    die();


}else{
    switch ($this->Param['option']){
        case 'cat':
            /**
             * 社区分类
             **/
            $cat = $ForumHelper->groupCat();

            $row = array(
                'code' => 0,
                'data' => $cat
            );
            echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
        case 'edit':
            /**
             * 社区 添加、编辑社区发布的帖子
             * @param member_id 用户id
             * @param id 当编辑时，值为帖子的id，默认为：0
             **/
            $this->LoadHelper('public/usercheck');
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            if($id > 0){
                $forum_row = $ForumHelper->forumRow(array(
                    '`member_id` = ?' => $this->Param['member_id'],
                    '`id` = ?' => $id
                ));

                $data = $forum_row;
            }

            //调取所有分类
            $cat = $ForumHelper->groupCat();
            $this->Assign('cat',$cat);
            $this->Assign('id',$id);

            $row = array(
                'code' => 0,
                'data'=>$data,
                'cat' => $cat,
                'id' => $id
            );
            echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
        case 'submit':
            /**
             * 提交帖子
             * @param title 标题
             * @param cat_id 分类id
             * @param content 内容
             * @param cover 内容
             * @param member_id  用户id
             * @param id 帖子id 添加为0
             **/
            if(empty($this->Param['title'])){
                $row = array(
                    'code' => 1,
                    'msg'=>'请填写标题'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }
            if(empty($this->Param['member_id'])){

                $row = array(
                    'code' => 1,
                    'msg'=>'参数错误'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }
			
			if(empty($this->Param['cover'])){
				$row = array(
                    'code' => 1,
                    'msg'=>'请上传封面图片'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
			}
			
			if(empty($this->Param['content'])){
				$row = array(
                    'code' => 1,
                    'msg'=>'内容不能为空'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
			}
			
            $data['title'] = $this->Param['title'];
            $data['cat_id'] = $this->Param['cat_id'];
            $data['content'] = $this->Param['content'];
            $data['cover'] = $this->Param['cover'];
            $data['member_id'] = $this->Param['member_id'];
            $data['dateline'] = NOW_TIME;

            if($this->Param['id'] > 0){
                $row = $ForumHelper->forumSave($data,$this->Param['id']);

                if($row){

                    $row = array(
                        'code'=>0,
                        'msg'=>'编辑成功，等待管理员审核'
                    );

                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();
                }
                $row = array(
                    'code'=>1,
                    'msg'=>'编辑失败'
                );
                echo $this->Param['callback']."(".json_encode($row).")";

                die();
            }else{
                $row = $ForumHelper->forumSave($data);

                if($row){

                    $row = array(
                        'code'=>0,
                        'msg'=>'发表成功，等待管理员审核'
                    );
                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();
                }

                $row = array(
                    'code'=>1,
                    'msg'=>'发表失败'
                );
                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }
            break;
        case 'all':
            /**
             * 帖子列表
             * @param limit 每页显示的条数 默认 5
             * @param page 当前页数
             * @param id 编辑时的帖子id
             * @param member_id  用户id
             **/
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

            $where = array(
                '`member_id` = ?' => $this->Param['member_id'],
                '`delete` = ?' => 0
            );
            $data = $ForumHelper->forumPageList($where, $limit, $page, $this->Param);


            $row = array(
                'code' => 0,
                'data' => $data
            );
            echo $this->Param['callback']."(".json_encode($row).")";
            die();
            break;
        default:
    }

}
