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

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

if(empty($this->Param['option'])){
	
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();

    $memberId = empty($this->Param['member_id']) ? 0 :$this->Param['member_id'];
    $tagid = empty($this->Param['tag_id']) ? '0' :$this->Param['tag_id'];
    $fWhere['`delete` = ?'] = 0;

    if($tagid == '0'){
		$forum_row = $ForumHelper->forumPageList(array('`recommend` = ?' => 1,'`delete` = ?'=>0), $limit, $page, $this->Param);
		
    }else{
		
		if(!empty($memberId)){
			
			$memberTag = $MemberListHelper->tagMemberList(array(
				'`member_id` = ?' => $memberId,
				'`mytag_id` =? '=>$tagid
			));
			
			if(!empty($memberTag)) {
				$n = 0;
				$forum_id = array();
				foreach($memberTag as $key =>$val){
					$formidRow = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum_tagindex` WHERE ctag_id = '.$val['mytag_id'].' GROUP BY forum_id');
					
					if(!empty($formidRow)){
						foreach($formidRow as $kkk =>$vvv){
							$forum_id[$n] = $vvv['forum_id'];
							$n++;
						}	
					}	
				}

				$fWhere['`id` in (?)'] = $forum_id;
				$forum_row = $ForumHelper->forumPageList($fWhere, $limit, $page, $this->Param);	
			}else{
				$forum_row['One'] = 0;	
			}

			
		}else{
			$tag_all = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum_tagindex` WHERE ctag_id = '.$tagid.' GROUP BY forum_id');
		
			if(!empty($tag_all)){
				$forum_id = array();
				foreach($tag_all as $k => $v){
					$forum_id[$k] = $v['forum_id'];
				}
	
				if(!empty($forum_id)){
					$fWhere['`id` in (?)'] = $forum_id;
					$forum_row = $ForumHelper->forumPageList($fWhere, $limit, $page, $this->Param);
				}else{
					$forum_row['One'] = 0;	
					
				}
			}else{
				$forum_row['One'] = 0;	
			}	
		}

    }
    if(!empty($forum_row['All'])){
		foreach($forum_row['All'] as $key => $val){
			$forum_row['All'][$key]['praise'] = $ForumHelper->praiseCount(array(
				'`forum_id` = ?' => $val['id']
			));
			if($memberId == 0){
				$forum_row['All'][$key]['is_praise'] = 1;
				$forum_row['All'][$key]['is_favorite'] = 1;
			}else{
				//判断是否点赞
				$num = $ForumHelper->queryDetail('SELECT id FROM `dyhl_forum_praise` WHERE member_id='.$memberId.' AND forum_id = '.$val['id']);
				if(!empty($num)){
					$forum_row['All'][$key]['is_praise'] = 0;	
				}else{
					$forum_row['All'][$key]['is_praise'] = 1;
				}
				
				//判断是否收藏
				$favNum = $FavoriteHelper->queryDetail('SELECT id FROM `dyhl_favorite` WHERE member_id='.$memberId.' AND related_id = '.$val['id']);
				if(!empty($favNum)){
					$forum_row['All'][$key]['is_favorite'] = 0;	
				}else{
					$forum_row['All'][$key]['is_favorite'] = 1;
				}
			}
			
		}
	}
	

    $row = array(
        'code' => 0,
        'data' => $forum_row,
        'tagid'=> $tagid
    );
    echo $this->Param['callback']."(".json_encode($row).")";
    die();


}else{
    switch ($this->Param['option']){
        case 'detail':
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
                echo $this->Param['callback'].json_encode($row);
                die();
            }
            //统计关注数
            $fav_count = $FavoriteHelper->favCount(array(
                '`related_id` = ?' => $id,
                '`sort` = ?' => 7
            ));
            $data['favcount'] = $fav_count;
			
			$count = $ForumHelper->praiseCount(array(
				'`forum_id` = ?' => $id
			));

            $member = $MemberDetailHelper->GetId($data['member_id']);

            //获取评价
            $limit = empty($this->Param['limit']) ? 10 : $this->Param['limit'];
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();
            $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 7 ,'`delete` = ?' => 0);
            $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->Param['member_id']);

            //获取是否已经收藏
            $fav_check = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 7,
                '`related_id` = ?' => $id,
                '`member_id` = ?' => $this->UserConfig['Id']
            ));
            $row = array(
                'code' => 0,
                'data' => $data,
				'praise'=>$count,
                'member' => $member,
                'eva' => $eva,
                'fav' => array('count'=>$fav_count,'check'=>$fav_check)
            );
             echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
        case 'comment':
            //获取评价
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $limit = empty($this->Param['limit']) ? 10 : $this->Param['limit'];
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();
            $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 7 ,'`delete` = ?' => 0);
            $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->Param['member_id']);

            $row = array(
                'code' => 0,
                'data' => $eva
            );

             echo $this->Param['callback']."(".json_encode($row).")";
            die();

            break;
		case 'favorite':
			//获取全部关注
			$limit = 10;
			$page = empty($this->Param['page']) ? 0 : $this->Param['page'];
			$where = array();
		
			$memberId = empty($this->Param['member_id']) ? 0 :$this->Param['member_id'];
		
			$fWhere['`is_show` = ?'] = 1;
			$fWhere['`delete` = ?'] = 0;
		
			$favorite_all = $FavoriteHelper->queryDetail('SELECT * FROM `dyhl_favorite` WHERE member_id = '.$memberId.' AND sort=7 ORDER BY id desc');
			if(!empty($favorite_all)){
				$favorite_id = array();
				foreach($favorite_all as $k => $v){
					$favorite_id[$key] = $v['related_id'];
				}
	
				if(!empty($favorite_id)){
					$fWhere['`id` in (?)'] = $favorite_id;
				}
			}
		
			$forum_row = $ForumHelper->forumPageList($fWhere, $limit, $page, $this->Param);
			$row = array(
				'code' => 0,
				'data' => $forum_row
			);
			echo $this->Param['callback']."(".json_encode($row).")";
			die();
			break;
		case 'seach':
			$limit = 10;
			$page = empty($this->Param['page']) ? 0 : $this->Param['page'];
			$where = array();
			
			$keyword = trim(urldecode($this->Param['keyword']));
			
			if(!empty($keyword)){
				$where['locate(?,`title`)>0'] = $keyword;
				
				$data = $ForumHelper->forumPageList($where, $limit, $page, $this->Param);
				
				$row = array(
					'code' => 0,
					'data' => $data
				);
				echo $this->Param['callback']."(".json_encode($row).")";
				die();
			}
			
			$row = array(
				'code' => 1
			);
			echo $this->Param['callback']."(".json_encode($row).")";
			die();
			break;
		case 'hot_seach':
			$data = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum` WHERE `delete` = 0  ORDER BY clicks asc limit 5');
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
