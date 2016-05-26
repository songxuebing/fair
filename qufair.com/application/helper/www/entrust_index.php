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
		$catWhere['`parent_id` IN(?)'] = array(40,148);
		$dataCat = $ForumHelper->catAll($catWhere,null,null,array('parent_id asc'));
		
		$this->Assign('dataCat',$dataCat);
		
        echo $this->GetView('entrust_index.php');
    }else{
        switch ($this->Param['option']){
           
            case 'submit':
                $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入资讯标题') : $this->Param['title'];
                $data['cat_id'] = empty($this->Param['cat_id']) ? 0 : $this->Param['cat_id'];
                $data['content'] = empty($this->Param['content']) ? ErrorMsg::Debug('请输入资讯内容') : $this->Param['content'];
                $data['member_id'] = empty($this->UserConfig['Id']) ? ErrorMsg::Debug('请登陆后发布') : $this->UserConfig['Id'];
                $data['dateline'] = NOW_TIME;
				$data['is_show'] = 1;

                if($this->Param['id'] > 0){
                    $row = $ForumHelper->forumSave($data,$this->Param['id']);

                    if($row){
                        ErrorMsg::Debug('编辑成功，等待管理员审核',TRUE);
                    }
                    ErrorMsg::Debug('编辑失败');
                }else{
                    $row = $ForumHelper->forumSave($data);

                    if($row){
                        ErrorMsg::Debug('发表成功，等待管理员审核',TRUE);
                    }
                    ErrorMsg::Debug('发表失败');
                }
                break;
        }
        
    }
