<?php
$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

if(empty($this->Param['option'])){
    /**
    * 个人中心 帖子管理
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
	
    $data = $ForumHelper->forumPageList($where, $limit, $page, $this->Param,array('dateline desc'));

    $row = array(
        'code' => 0,
        'data' => $data
    );

    echo $this->Param['callback']."(".json_encode($row).")";
    die();
}else{
    switch ($this->Param['option']){
        /**
        * 个人中心 帖子删除
         * @param id 帖子id
         * @param 用户id
         **/
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $do = $ForumHelper->forumSave(array('delete' => 1),array('`id` = ?' => $id,'`member_id` = ?' => $this->Param['member_id']));
            if($do){
                $row = array(
                    'code' => 0,
                    'msg' => '删除成功'
                );

                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $row = array(
                'code' => 1,
                'msg' => '删除失败'
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();
            break;
		case 'count':
			/**
			* 个人中心，统计帖子数量
			* @param member_id 用户id
			**/
			
			$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];
			$count = $ForumHelper->forumCount(array(
				'`member_id` = ?' => $member_id
			));
			
			$row = array(
                'code' => 0,
                'data' => $count
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();
			
			break;
		case 'favorite':
		
			$limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];;
			$page = empty($this->Param['page']) ? 0 : $this->Param['page'];
			$sort = empty($this->Param['sort']) ? 1 : $this->Param['sort'];
			$member_id = $this->Param['member_id'];
		
			switch($sort){
				case '1':
					$where = array(
						'`sort` = ?' => 1,
						'`member_id` = ?' => $member_id
					);
					break;
				case '7':
					$where = array(
						'`sort` = ?' => 7,
						'`member_id` = ?' => $member_id
					);
					break;
				default:
			}
		
			$data = $FavoriteHelper->getAllfavorite($where, $limit, $page, $this->Param);
			if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
				$data['All'][$k]['base'] = $FavoriteHelper->transFavorite($v);
			}
			
			
			$row = array(
                'code' => 0,
                'data' => $data,
				'sort' => $sort,
				'param' => $this->Param
            );

            echo $this->Param['callback']."(".json_encode($row).")";
            die();
			
			break;
    }

}