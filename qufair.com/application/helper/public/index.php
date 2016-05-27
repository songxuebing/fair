<?php
if(empty($this->Param['option'])){
    
}else{
    switch($this->Param['option']){
        case 'trading'://交易数据
            $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
            $type = empty($this->Param['type']) ? '' : $this->Param['type'];
            $output = empty($this->Param['output']) ? 'js' : $this->Param['output'];
            //
            $this->LoadHelper('order/OrderHelper');
            $OrderHelper =  new OrderHelper();
            
            $this->LoadHelper('member/MemberDetailHelper');
            $MemberDetailHelper =  new MemberDetailHelper();
            
            $where = array();
            if(!empty($type)){
                $where['`is_type` = ?'] = $type;
            }
            $data = $OrderHelper->GetAllWhere($where, $limit, 0, $this->Param);
			
			

            if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
                $shunt_row = $OrderHelper->shuntOrder($v);
                $data['All'][$k]['goods_name'] = $shunt_row['goods_name'];                
                $data['All'][$k]['url'] = $shunt_row['url'];
                $member = $MemberDetailHelper->GetId($v['member_id']);
                $data['All'][$k]['avatar'] = Common::AttachUrl($member['avatar']);
                $data['All'][$k]['username'] = empty($member['company']) ? '' : StringCode::GetCsubStr($member['company'],0,2,'utf-8',false).'****'.StringCode::GetCsubStr($member['company'],4,8,'utf-8',false);



            }else{
                $data['All'] = array();
            }
			
            if($output == 'js'){
            }elseif($output == 'json'){
                echo json_encode($data);
            }
            break;
        case 'data': //各产品相关数据
            $this->LoadHelper('route/RouteHelper');
            $RouteHelper =  new RouteHelper();
            
            $this->LoadHelper('visa/VisaHelper');
            $VisaHelper = new VisaHelper();
            
            $this->LoadHelper('logistics/LogisticsHelper');
            $LogisticsHelper = new LogisticsHelper();
            
            $this->LoadHelper('decoration/DecorationHelper');
            $DecorationHelper = new DecorationHelper();
            
            $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
            $type = empty($this->Param['type']) ? 'convention' : $this->Param['type'];
            $key = empty($this->Param['key']) ? '' : $this->Param['key'];
            switch($this->Param['type']){
                case 'convention'://展会推荐
                    $result = array();
                    $this->LoadHelper('convention/ConventionHelper');
                    $ConventionHelper = new ConventionHelper();
                    $convention = $ConventionHelper->GetAllDetailWhere(array('`is_delete` = ?' => 0,'`is_index` = ?' => 1,'`is_online` = ?' => 0), $limit, 1, $this->Param);
                    if(!empty($convention['All'])) foreach($convention['All'] as $k=>$v){
                        $con_row = $ConventionHelper->getRow(array('`id` = ?' => $v['con_id']));
                        $result[] = array(
                            'name' => StringCode::GetCsubStr($con_row['name'],0,12),
                            'image' => Common::AttachUrl($con_row['cover']).'!a200',
                            'link' => '/convention/index/option/order/detailid/' . $v['detail_id'],
                            'desc' => StringCode::GetCsubStr($v['description'],0,10)
                        );
                    }
                    break;
                case 'route'://行程预定                    
                    $result = array();
                    $where = array(
                        '`delete` = ?' => 0,
                        '`is_sale` = ?' =>1
                    );
                   
                    if(!empty($key)){
                        if(is_numeric($key)){
                            $where['`con_id` = ?'] = $key;
                        }else{
                            $key_split = explode(',',$key);
                            $str = '';
                            foreach($key_split as $k=>$v){
                                $union = $k==0 ? 'LOCATE("'.$v.'",`name`) > ?' : ' OR LOCATE("'.$v.'",`name`) > ?';
                                $str .= $union;
                            }
                            $where[$str] = 0;
                        }
                    }
                    $data = $RouteHelper->routeAll($where,array(1,$limit),NULL,array('up_time desc','dateline desc'));
                    $not_in = array(0);
                    if(!empty($data)) foreach($data as $k=>$v){
                        $not_in[] = $v['id'];
                    }
                    if($k < $limit-1){
                        $where = array(
                            '`delete` = ?' => 0,
                            '`is_sale` = ?' =>1,
                            '`id` NOT IN(?)' => $not_in
                        );
                        $supplement_data = $RouteHelper->routeAll($where,array(1,$limit-1-$k),NULL,array('up_time desc','dateline desc'));
                        if(!empty($supplement_data)){
                            $data = array_merge($data, $supplement_data);
                        }
                    }
                    //输出
                    if(!empty($data)) foreach($data as $k=>$v){
                        $result[] = array(
                            'name' => StringCode::GetCsubStr($v['name'],0,12),
                            'image' => Common::AttachUrl($v['cover']),
                            'link' => '/route/index/option/detail/id/' . $v['id'],
                            'desc' => StringCode::GetCsubStr($v['description'],0,10)
                        );
                    }
                    break;
                case 'visa': //国际签证
                    $result = array();
                    $where = array(
                        '`is_delete` = ?' => 0,
                        '`is_online` = ?' =>0
                    );
                   
                    if(!empty($key)){                        
                        $key_split = explode(',',$key);
                        $str = '';
                        foreach($key_split as $k=>$v){
                            $union = $k==0 ? 'LOCATE("'.$v.'",`visa_title`) > ?' : ' OR LOCATE("'.$v.'",`visa_title`) > ?';
                            $str .= $union;
                        }
                        $where[$str] = 0;
                    }
                    $data = $VisaHelper->GroupAllRow('*',$where,$limit,1,NULL);
                    $not_in = array(0);
                    if(!empty($data)) foreach($data as $k=>$v){
                        $not_in[] = $v['visa_id'];
                    }
                    if($k<$limit-1){
                        $where = array(
                            '`is_delete` = ?' => 0,
                            '`is_online` = ?' =>0,
                            '`visa_id` NOT IN(?)' => $not_in
                        );
                        $supplement_data = $VisaHelper->GroupAllRow('*',$where,$limit-1-$k,1,NULL);
                        if(!empty($supplement_data)){
                            $data = array_merge($data, $supplement_data);
                        }
                    }
                    //输出
                    if(!empty($data)) foreach($data as $k=>$v){
                        $result[] = array(
                            'name' => StringCode::GetCsubStr($v['visa_title'],0,12),
                            'image' => Common::AttachUrl($v['visa_cover']),
                            'link' => '/visa/index/option/detail/id/' . $v['visa_id'],
                            'desc' => StringCode::GetCsubStr($v['visa_msg'],0,10)
                        );
                    }
                    break;
                case 'logistics': //国际物流
                    $result = array();
                    $where = array(
                        '`is_delete` = ?' => 0,
                        '`is_online` = ?' =>0
                    );
                   
                    if(!empty($key)){                        
                        $key_split = explode(',',$key);
                        $str = '';
                        foreach($key_split as $k=>$v){
                            $union = $k==0 ? 'LOCATE("'.$v.'",`log_title`) > ?' : ' OR LOCATE("'.$v.'",`log_title`) > ?';
                            $str .= $union;
                        }
                        $where[$str] = 0;
                    }
                    $data = $LogisticsHelper->GroupAllRow('*',$where,$limit,1,NULL);
                    $not_in = array(0);
                    if(!empty($data)) foreach($data as $k=>$v){
                        $not_in[] = $v['visa_id'];
                    }
                    if($k<$limit-1){
                        $where = array(
                            '`is_delete` = ?' => 0,
                            '`is_online` = ?' =>0,
                            '`log_id` NOT IN(?)' => $not_in
                        );
                        $supplement_data = $LogisticsHelper->GroupAllRow('*',$where,$limit-1-$k,1,NULL);
                        if(!empty($supplement_data)){
                            $data = array_merge($data, $supplement_data);
                        }
                    }
                    //输出
                    if(!empty($data)) foreach($data as $k=>$v){
                        $result[] = array(
                            'name' => StringCode::GetCsubStr($v['log_title'],0,12),
                            'image' => Common::AttachUrl($v['log_cover']),
                            'link' => '/logistics/index/option/detail/' . $v['log_id'],
                            'desc' => StringCode::GetCsubStr($v['log_remarks'],0,10)
                        );
                    }
                    break;
                case 'decoration': //特装服务
                    $result = array();
                    $where = array(
                        '`is_delete` = ?' => 0,
                        '`is_online` = ?' =>0
                    );
                   
                    if(!empty($key)){                        
                        $key_split = explode(',',$key);
                        $str = '';
                        foreach($key_split as $k=>$v){
                            $union = $k==0 ? 'LOCATE("'.$v.'",`title`) > ?' : ' OR LOCATE("'.$v.'",`title`) > ?';
                            $str .= $union;
                        }
                        $where[$str] = 0;
                    }
                    $data = $DecorationHelper->GroupAllRow('*',$where,$limit,1,NULL);
                    $not_in = array(0);
                    if(!empty($data)) foreach($data as $k=>$v){
                        $not_in[] = $v['id'];
                    }
                    if($k<$limit-1){
                        $where = array(
                            '`is_delete` = ?' => 0,
                            '`is_online` = ?' =>0,
                            '`id` NOT IN(?)' => $not_in
                        );
                        $supplement_data = $DecorationHelper->GroupAllRow('*',$where,$limit-1-$k,1,NULL);
                        if(!empty($supplement_data)){
                            $data = array_merge($data, $supplement_data);
                        }
                    }
                    //输出
                    if(!empty($data)) foreach($data as $k=>$v){
                        $result[] = array(
                            'name' => StringCode::GetCsubStr($v['title'],0,12),
                            'image' => Common::AttachUrl($v['cover']),
                            'link' => '/decoration/index/option/detail/id/' . $v['id'],
                            'desc' => StringCode::GetCsubStr($v['msg'],0,10)
                        );
                    }
                    break;
                default :
            }
            
            
            echo json_encode(array('All'=>$result));
            break;
        case 'news': //热门资讯
            $result = array();
            $this->LoadHelper('forum/ForumHelper');
            $ForumHelper = new ForumHelper();
            $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
            $recommend = $ForumHelper->forumPageList(array('`recommend` = ?' => 1,'`is_show` = ?' => 1,'`delete` = ?' =>0), $limit, 1, $this->Param);
            if(!empty($recommend['All'])) foreach($recommend['All'] as $k=>$v){
                $result[] = array(
                    'name' => StringCode::GetCsubStr($v['title'],0,12),
                    'image' => empty($v['cover']) ? Common::AttachUrl('') : $v['cover'].'!a200',
                    //'link' => '/forum/detail/id/' . $v['id'],
                    'link' => '/news/'.date('Y/m/d', $v['dateline']).'/'.$v['id'].'.shtml',
                    'desc' => StringCode::GetCsubStr($v['content'],0,10)
                );
            }
            echo json_encode(array('All'=>$result));
            break;
        case 'hotnews': //热门资讯
            $result = array();
            $this->LoadHelper('forum/ForumHelper');
            $ForumHelper = new ForumHelper();
			
			$this->LoadHelper('member/MemberDetailHelper');
            $MemberDetailHelper =  new MemberDetailHelper();
			
            $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];

            $recommend['All'] = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum` WHERE `recommend` = 1 AND `is_show` = 1 AND `delete` = 0 ORDER BY RAND() LIMIT '.$limit);

            //$recommend = $ForumHelper->forumPageList(array('`recommend` = ?' => 1,'`is_show` = ?' => 1,'`delete` = ?' =>0), $limit, 1, $this->Param);
            if(!empty($recommend['All'])) foreach($recommend['All'] as $k=>$v){
				
				$member_row = $MemberDetailHelper->GetMember($v['member_id']);
				$username = empty($member_row['username']) ? $member_row['mobile'] : StringCode::GetCsubStr($member_row['username'],0,8);
				$username = empty($username) ? '匿名用户' : $username;
				
                $result[] = array(
					'id' => $v['id'],
                    'name' => StringCode::GetCsubStr($v['title'],0,20),
                    'image' => empty($v['cover']) ? Common::AttachUrl('') : $v['cover'].'!a200',
                    //'link' => '/forum/detail/id/' . $v['id'],
                    'link' => '/news/'.date('Y/m/d', $v['dateline']).'/'.$v['id'].'.shtml',
                    'desc' => StringCode::GetCsubStr($v['content'],0,10),
					'comment'=>$v['comment'],
					'username' => $username
                );
            }
            echo json_encode(array('All'=>$result));
            break;
        case 'newsuser': //活跃用户
            $this->LoadHelper('comment/CommentHelper');
            $CommentHelper = new CommentHelper();
            
            $this->LoadHelper('member/MemberDetailHelper');
            $MemberDetailHelper =  new MemberDetailHelper();
            //根据回复最多的调去
            $result = array();
            $limit = empty($this->Param['limit']) ? 5 : $this->Param['limit'];
            $comment = $CommentHelper->commentQuery('SELECT *,count(con_id) as num FROM `dyhl_comment` WHERE `is_type` = 7 AND `delete` = 0 GROUP BY `member_id` ORDER BY num DESC LIMIT 0,'.$limit);
            if(!empty($comment)) foreach($comment as $k=>$v){
                $member = $MemberDetailHelper->GetId($v['member_id']);
                $result[] = array(
                    'name' => StringCode::GetCsubStr($member['username'],0,12),
                    'image' => Common::AttachUrl($member['avatar']),
                    'link' => '#',
                    'desc' => ''
                );
            }
            echo json_encode(array('All'=>$result));
            break;
        case 'get_region':
            $this->LoadHelper('region/RegionHelper');
            $RegionHelper =  new RegionHelper();
            
            $name = empty($this->Param['name']) ? 0 : $this->Param['name'];
            $level = empty($this->Param['level']) ? 0 : $this->Param['level'];
            if($level == 0){
                $data = $RegionHelper->regionAll(array('`delta` = ?' => $name));
            }else{
                $row = $RegionHelper->regionRow(array(
                    '`name` = ?' => $name
                ));
                if(!empty($row)){
                    $data = $RegionHelper->regionAll(array('`parent_id` = ?' => $row['id']));
                }else{
                    $data = array();
                }
            }
            echo json_encode($data);
            break;
    }
}