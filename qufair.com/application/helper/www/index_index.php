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

    $this->LoadHelper('industry/IndustryHelper');
    $IndustryHelper = new IndustryHelper();

    $this->LoadHelper('route/RouteHelper');
    $RouteHelper = new RouteHelper();

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
                //$script .= "<li style=\"background: url(".$val['file'].")\"><a href=\"".$val['url']."\" title=\"".$val['title']."\" target=\"_blank\"></a></li>'";
                $script .="<li><div class=\"img\"><a href=\"".$val['url']."\" target=\"_blank\"><img src=\"".$val['file']."\" title=\"".$val['title']."\"  alt=\"\" /></a></div></li>";
            }
        }
    }

    $this->Assign('script',$script);

    if(empty($this->Param['option'])){
        //获取热门展位
        $hot_conven = $ConventionHelper->GetAllDetailWhere(array(
            '`is_index` = ?' => 1,
            '`is_delete` = ?' => 0
        ),10,1,$this->Param);
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
            //获取价格2016-06-03
            $area = $ConventionHelper->getAreaRow(array('`detail_id` = ?' =>$v['detail_id']));
            $hot_conven['All'][$k]['area'] = $area;

            $hot_conven['All'][$k]['focus_number'] = $fav_count;
        }
        $this->Assign('hot_con',$hot_conven);
        //var_dump($hot_conven);exit();

        //获取最新展会
        $new_con = $ConventionHelper->getAllRow(array('name','id','update_dateline'),1,10,NULL,NULl);
        //var_dump($new_con);exit();
        $this->Assign('new_con',$new_con);


        $where_route = array(
            '`delete` = ?' => 0,
            '`is_sale` = ?' =>1
        );

        $data_route = $RouteHelper->routeAll($where_route,array(1,5),NULL,array('up_time desc','dateline desc'));

        $this->Assign('hot_route',$data_route);

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

        //首页行程广告
        $route_adv_where = array(
            '`start_time` <= ?' => NOW_TIME,
            '`end_time` >= ?' => NOW_TIME,
            '`pos_id` = ?' => 41
        );
        $route_adv = $AdvHelper->advAll($route_adv_where,array(1,2),NULL,array('id DESC'));
        $this->Assign('route_adv',$route_adv);

        //首页签证广告
        $visa_adv_where = array(
            '`start_time` <= ?' => NOW_TIME,
            '`end_time` >= ?' => NOW_TIME,
            '`pos_id` = ?' => 42
        );
        $visa_adv = $AdvHelper->advAll($visa_adv_where,array(1,2),NULL,array('id DESC'));
        $this->Assign('visa_adv',$visa_adv);

        //首页行业广告
        $industry_adv_where = array(
            '`start_time` <= ?' => NOW_TIME,
            '`end_time` >= ?' => NOW_TIME,
            '`industry_id` > ?' => 0
        );
        $industry_adv = $IndustryHelper->advAll($industry_adv_where,NULL,NULL,array('id DESC'));
        //var_dump($industry_adv);exit();
        $this->Assign('industry_adv',$industry_adv);

        //调取最新资讯
        $new = $ForumHelper->forumPageList(array('`delete` = ?' => 0,'`is_show` = ?' => 1), 8, 1 ,$this->Param);
        //var_dump($new);exit();
        $this->Assign('new',$new);
        //调用知识百科的新闻

        $new_ke = $ForumHelper->queryDetail('SELECT id,title,dateline FROM `dyhl_forum` JOIN dyhl_forum_tagindex WHERE dyhl_forum.id = dyhl_forum_tagindex.forum_id and dyhl_forum_tagindex.ctag_id = 22 and dyhl_forum.is_show = 1 and dyhl_forum.delete = 0 ORDER BY `dyhl_forum`.`id` DESC LIMIT 7 ');
        //var_dump($new_ke);exit();
        $this->Assign('new_ke',$new_ke);

        //调用点击量高的新闻
        $new_hot = $ForumHelper->queryDetail('SELECT id,title,dateline,cover,content FROM `dyhl_forum`  JOIN dyhl_forum_tagindex WHERE dyhl_forum.id = dyhl_forum_tagindex.forum_id and dyhl_forum.is_show = 1 and dyhl_forum.delete = 0 and dyhl_forum.recommend = 0 ORDER BY rand() DESC LIMIT 5');
        //var_dump($new_ke);exit();
        foreach($new_hot as $k => $val_hot)
        {
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
            preg_match_all($pattern,$val_hot['content'],$match);
            $new_hot[$k]['cover'] = empty($match[1][0]) ? '' : $match[1][0];
        }
        $this->Assign('new_hot',$new_hot);

        //调用推荐的新闻
        $new_re = $ForumHelper->queryDetail('SELECT id,title,dateline,cover,content FROM `dyhl_forum`  WHERE dyhl_forum.is_show = 1 and dyhl_forum.delete = 0  and dyhl_forum.recommend = 1 ORDER BY `dyhl_forum`.`clicks` DESC LIMIT 3');
        //var_dump($new_re);exit();
        foreach($new_re as $k_re => $val_re)
        {
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
            preg_match_all($pattern,$val_re['content'],$match);
            $new_re[$k_re]['cover'] = empty($match[1][0]) ? '' : $match[1][0];
        }
        $this->Assign('new_re',$new_re);

        //获取最新需求
		
		$dataCat = $ForumHelper->catAll(array(),null,null,array('parent_id asc'));
        $dataTag = $ForumHelper->cTagAll(array(),array(1,6),null,array('sort asc'));
		$i=0;
		if(!empty($dataCat)){
			foreach($dataCat as $kk=>$vv){
				if($vv['parent_id'] == '40' || $vv['parent_id'] == '148' ){
					$catArr[$i] = $vv['id'];
					$i++;	
				}
			}

			$catWhere['`cat_id` IN(?)'] = $catArr;
			$entrust = $ForumHelper->forumPageList($catWhere, 10, 0, $this->Param);
        	$this->Assign('entrust',$entrust);
		}

        $this->Assign('new_tag',$dataTag);

        echo $this->GetView('index_index_no2.php');
    }else{

        
    }
