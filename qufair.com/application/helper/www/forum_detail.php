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
    
    if(empty($this->Param['option'])){
        $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
        $data = $ForumHelper->forumRow(array(
            '`delete` = ?' => 0,
            '`id` = ?' => $id,
            '`is_show` = ?' => 1
        ));
        if(empty($data)){
            ErrorMsg::Debug('帖子已删除或未通过审核');
        }
        //统计关注数
        $fav_count = $FavoriteHelper->favCount(array(
            '`related_id` = ?' => $id,
            '`sort` = ?' => 7
        ));
        $data['favcount'] = $fav_count; 
        
        $this->Assign('data',$data);
        
        $member = $MemberDetailHelper->GetId($data['member_id']);
        $this->Assign('member',$member);
        
        //获取评价
        $limit = 10;
        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where = array();
        $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 7 ,'`delete` = ?' => 0);
        $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->UserConfig);

        //获取是否已经收藏
        $fav_check = $FavoriteHelper->favCount(array(
            '`sort` = ?' => 7,
            '`related_id` = ?' => $id,
            '`member_id` = ?' => $this->UserConfig['Id']
        ));

        //获取当前文章的tag
        $tag_where = array(
            '`forum_id` = ?' => $id,
        );
        $tag_eva = $CommentHelper->getRelevant_tag($tag_where);
        $tag_num = count($tag_eva);
        //var_dump($tag_eva);exit();
        //获取相关阅读（4篇）

        //当tag就一个
        if($tag_num == '1') {
            $ctag_id = $tag_eva[0]["ctag_id"];
            $tag_all = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum` join `dyhl_forum_tagindex` on dyhl_forum.id = dyhl_forum_tagindex.forum_id WHERE is_show = 1 and `delete` = 0 and dyhl_forum_tagindex.ctag_id= '.$ctag_id.' and dyhl_forum.id != '.$id.'  GROUP BY dyhl_forum_tagindex.forum_id order by dyhl_forum.dateline desc limit 0,4 ');
        }

        //当tag为2个
        elseif($tag_num == '2') {
            $tag_all = array();
            foreach ($tag_eva as $key=>$value_tag) {
                //echo $value_tag['ctag_id'];
                $ctag_id = $value_tag['ctag_id'];
                $tag_all = array_merge($tag_all, $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum` join `dyhl_forum_tagindex` on dyhl_forum.id = dyhl_forum_tagindex.forum_id WHERE is_show = 1 and `delete` = 0 and dyhl_forum_tagindex.ctag_id= ' . $ctag_id . ' and dyhl_forum.id != '.$id.'  GROUP BY dyhl_forum_tagindex.forum_id order by dyhl_forum.dateline desc limit 2 '));
            }
            //exit();
        }

        //当tag为0时
        else{
            $relevant_where = array(
                '`delete` = ?' => 0,
                '`is_show` = ?' => 1,
                '`id` != ?' => $id,
            );
            $tag_all = $CommentHelper->getRelevant($relevant_where);

        }

        $this->Assign('relevant_eva', $tag_all);

        //上一篇、下一篇
        $last_where = array(
            '`delete` = ?' => 0,
            '`id` > ?' => $id,
            '`is_show` = ?' => 1
        );
        $next_where = array(
            '`delete` = ?' => 0,
            '`id` < ?' => $id,
            '`is_show` = ?' => 1
        );

        $up_down['last'] = $CommentHelper->getUp($last_where);
        $up_down['down'] = $CommentHelper->getDown($next_where);

        //var_dump($up_down);exit();
        $this->Assign('up_down', $up_down);

        $this->Assign('fav',array('count'=>$fav_count,'check'=>$fav_check));
        $this->Assign('eva', $eva);
        
        echo $this->GetView('fourm_detail.php');
    }else{

        
    }
