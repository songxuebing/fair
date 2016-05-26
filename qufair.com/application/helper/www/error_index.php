<?php
    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();
    
    $this->LoadHelper('favorite/FavoriteHelper');
    $FavoriteHelper = new FavoriteHelper();
    
    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();
    
    $this->LoadHelper('decoration/DecorationHelper');
    $DecorationHelper =  new DecorationHelper();
    
    $this->LoadHelper('member/MemberDetailHelper');
    $MemberDetailHelper =  new MemberDetailHelper();
    
    $this->LoadHelper('comment/CommentHelper');
    $CommentHelper = new CommentHelper();
    
    $this->LoadHelper('forum/ForumHelper');
    $ForumHelper =  new ForumHelper();

    $this->LoadHelper('adv/AdvHelper');
    $AdvHelper = new AdvHelper();

    $id = 9;
    $pos_row = $AdvHelper->posRow($id);
    if(empty($pos_row)){
        $script .= '';
    }else{
        //查找当前时间存在的广告位置
        $adv_row = $AdvHelper->advAll(array(
            '`start_time` <= ?' => NOW_TIME,
            '`end_time` >= ?' => NOW_TIME,
            '`pos_id` = ?' => $id
        ));
        if(!empty($adv_row)){
            $script.='';
            foreach($adv_row as $key => $val){
                $script .= "<li style=\"background: url(".$val['file'].")\"><a href=\"".$val['url']."\" title=\"".$val['title']."\" target=\"_blank\"></a></li>'";
            }
        }
    }

    $this->Assign('script',$script);

    if(empty($this->Param['option'])){
        //获取热门展位
        $hot_conven = $ConventionHelper->GetAllDetailWhere(array(
            '`is_index` = ?' => 1,
            '`is_delete` = ?' => 0
        ),3,1,$this->Param);
        if(!empty($hot_conven['All'])) foreach($hot_conven['All'] as $k=>$v){
            $conven = $ConventionHelper->getRow(array(
                '`id` = ?' => $v['con_id']
            ));
            $hot_conven['All'][$k]['cover'] = $conven['cover'];
            $hot_conven['All'][$k]['name'] = $conven['name'];
            //获取关注数量
            $fav_count = $FavoriteHelper->favCount(array(
                '`related_id` = ?' => $v['detail_id'],
                '`sort` = ?' => 2
            ));
            $hot_conven['All'][$k]['focus_number'] = $fav_count;
        }
        $this->Assign('hot_con',$hot_conven);
        //获取热销商户
        $hot_con_men = $OrderHelper->getHostMer(array(
            'type' => 'convention',
            'limit' => 4
        ));
        $this->Assign('hot_con_men',$hot_con_men);
        
        $hot_con_route = $OrderHelper->getHostMer(array(
            'type' => 'route',
            'limit' => 4
        ));
        $this->Assign('hot_con_route',$hot_con_route);
        
        $hot_con_visa = $OrderHelper->getHostMer(array(
            'type' => 'visa',
            'limit' => 4
        ));
        $this->Assign('hot_con_visa',$hot_con_visa);
        
        $hot_con_logistics = $OrderHelper->getHostMer(array(
            'type' => 'logistics',
            'limit' => 4
        ));
        $this->Assign('hot_con_logistics',$hot_con_logistics);
        
        $hot_con_decoration = $OrderHelper->getHostMer(array(
            'type' => 'decoration',
            'limit' => 4
        ));
        $this->Assign('hot_con_decoration',$hot_con_decoration);
        //智能推荐展会商
        $intelligent = $ConventionHelper->queryDetail('SELECT * FROM `dyhl_convention_detail` WHERE `is_delete` = 0 GROUP BY con_id ORDER BY RAND() LIMIT 5');
        if(!empty($intelligent)) foreach($intelligent as $k=>$v){
            $conven = $ConventionHelper->getRow(array(
                '`id` = ?' => $v['con_id']
            ));
            $intelligent[$k]['cover'] = $conven['cover'];
            $intelligent[$k]['name'] = StringCode::GetCsubStr($conven['name'],0,7);
            $intelligent[$k]['pavilion'] = empty($conven['pavilion']) ? '&nbsp;' : StringCode::GetCsubStr($conven['pavilion'],0,10);
        }
        $this->Assign('intelligent',$intelligent);
        //特装推荐
        $recommend = $DecorationHelper->GroupAllRow('*', array('`is_online` = ?' => 0,'`is_delete` = ?' => 0,'`is_index` = ?' => 1), 3, 1,NULL);
        if(!empty($recommend)) foreach($recommend as $k=>$v){
            $recommend[$k]['style_type'] = unserialize($v['style_type']);
            $member = $MemberDetailHelper->GetId($v['member_id']);
            $recommend[$k]['member'] = $member;
            //评论统计
            $comment_count = $CommentHelper->commentCount(array('`is_type` = ?' => 6,'`con_id` = ?' => $v['id'],'`delete` = ?' => 0));
            $recommend[$k]['comment'] = $comment_count;
        }
        $this->Assign('recommend',$recommend);
        //资讯轮播广告
        $adv_where = array(
            '`start_time` <= ?' => NOW_TIME,
            '`end_time` >= ?' => NOW_TIME,
            '`pos_id` = ?' => 7
        );
        $loop_adv = $AdvHelper->advAll($adv_where,array(1,4),NULL,array('id DESC'));
        $this->Assign('loop_adv',$loop_adv);
        //调取最新资讯
        $new = $ForumHelper->forumPageList(array('`delete` = ?' => 0,'`is_show` = ?' => 1), 4, 1 ,$this->Param);
        $this->Assign('new',$new);
		
		//获取最新需求
		
		$dataCat = $ForumHelper->catAll(array(),null,null,array('parent_id asc'));
		$i=0;
		if(!empty($dataCat)){
			foreach($dataCat as $kk=>$vv){
				if($vv['parent_id'] == '40' || $vv['parent_id'] == '148' ){
					$catArr[$i] = $vv['id'];
					$i++;	
				}
			}

			$catWhere['`cat_id` IN(?)'] = $catArr;
			$entrust = $ForumHelper->forumPageList($catWhere, 100, 0, $this->Param);
        	$this->Assign('entrust',$entrust);
		}
		
        echo $this->GetView('error_index.php');
    }else{

        
    }
