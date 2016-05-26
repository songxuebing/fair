<?php   
    $this->LoadHelper('forum/ForumHelper');
    $ForumHelper = new ForumHelper();
      
    if(empty($this->Param['option'])){
        $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
        $limit = 5;
        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];

        $where = array(
            '`member_id` = ?' => $this->UserConfig['Id'],
            '`delete` = ?' => 0
        );
        $data = $ForumHelper->forumPageList($where, $limit, $page, $this->Param);
        $this->Assign('data',$data);
        
        echo $this->GetView('user_fourm.php');
    }else{
        switch ($this->Param['option']){
            case 'remove':
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
                $do = $ForumHelper->forumSave(array('delete' => 1),array('`id` = ?' => $id,'`member_id` = ?' => $this->UserConfig['Id']));
                if($do){
                    ErrorMsg::Debug('删除成功',TRUE);
                }
                ErrorMsg::Debug('删除失败');
                break;
        }
        
    }
