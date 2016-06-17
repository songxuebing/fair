<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

$this->LoadHelper('member/MemberAvatarHelper');
$MemberAvatarHelper = new MemberAvatarHelper();

$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

$this->LoadHelper('industry/IndustryHelper');
$IndustryHelper = new IndustryHelper();
//获取用户信息
$UserInfo = $this->UserConfig;

$dataNav = array();
$dataNav['nav'] = $ConventionHelper->getAllRow(array('industry'),array('`id` > ?' => 0,'`industry` != ?' => ''),100,0,array('industry'));
$this->Assign('dataNav', $dataNav);

//banner
$this->LoadHelper('adv/AdvHelper');
$AdvHelper = new AdvHelper();
$id = 10;
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
            $script .= "<li style=\"background: url(".$val['file'].") center no-repeat;\"><a href=\"".$val['url']."\" title=\"".$val['title']."\" target=\"_blank\"></a></li>'";
        }
    }
}

$this->Assign('script',$script);

if(empty($this->Param['option'])){

//    $one_level = $IndustryHelper->industryAll(array(
//        '`parent_id` = ?' => 0
//    ),array(0,100));
//    if(!empty($one_level)) foreach($one_level as $k=>$v){
//        $next_all = $IndustryHelper->industryAll(array(
//            '`parent_id` = ?' => $v['id']
//        ),array(0,50));
//        $one_level[$k]['next'] = $next_all;
//        $limit = 20;
//        $page  = 0;
//        $where[$k] = array('`id` > ?' => 0);
//        $where[$k]['locate(?,`main`)>0'] = urldecode($v['name']);
//        $data[$k] = $ConventionHelper->GetAll_new_Where($where[$k], $limit, $page, $this->Param);
//                    $data[$k]['name'] = $v['name'];
//            $data[$k]['name_en'] = $v['name_en'];
//        //var_dump($data);exit();
////        foreach($one_level[$k]['next'] as $kk => $val_in) {
////            //var_dump($val_in);echo "<br />".$kk."<br />";
////            $limit = 20;
////            $page  = 0;
////            $where = array();
////            $where[$k] = array('`id` > ?' => 0);
////            $where[$k]['locate(?,`main`)>0'] = urldecode($val_in['name']);
////            $data[$k] = $ConventionHelper->GetAll_new_Where($where[$k], $limit, $page, $this->Param);
////            $data[$k]['name'] = $v['name'];
////            $data[$k]['name_en'] = $v['name_en'];
////            //var_dump($data);echo "<br />";
////            break;
////            //$data[$kk] = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);
////            //var_dump($data);exit();
////        }
//        }
//    //var_dump($one_level);exit();
//    $this->Assign('industry', $one_level);
//    $this->Assign('data', $data);
//    //var_dump($_GET);exit();
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);

    if(!empty($this->Param['industry'])){
        $where['locate(?,`industry`)>0'] = urldecode($this->Param['industry']);
        $where_in['locate(?,`name`)>0'] = urldecode($this->Param['industry']);
        $data_industry = $ConventionHelper->GetInWhere($where_in);
    }
    if(!empty($this->Param['delta'])){
        $where['locate(?,`regional`)>0'] = urldecode($this->Param['delta']);
    }
    if(!empty($this->Param['countries'])){
        $where['locate(?,`countries`)>0'] = urldecode($this->Param['countries']);
    }
    if(!empty($this->Param['city'])){
        $where['locate(?,`city`)>0'] = urldecode($this->Param['city']);
    }
    //获取展会列表
    var_dump($where);//exit();
    $data = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);
    $country_where = array('`parent_id` = ?' =>0);
    if(!empty($this->Param['delta'])){
        $country_where['`delta` = ?'] = $this->Param['delta'];
    }
    $country_all = $RegionHelper->regionAll($country_where);
    $country_all = Common::arrayExplode($country_all, 8);
    $this->Assign('country_all',$country_all);

    if(!empty($this->Param['countries'])){
        $country_row = $RegionHelper->regionRow(array('`name` = ?' => urldecode($this->Param['countries'])));
        $city_where['`parent_id` = ?'] = $country_row['id'];

        $city_all = $RegionHelper->regionAll($city_where,array(0,100));
        $city_all = Common::arrayExplode($city_all, 8);
        $this->Assign('city_all',$city_all);
    }

    $data['attr'] = array('industry' =>$this->Param['industry'],'delta' => $this->Param['delta'],'countries'=>$this->Param['countries'],'city'=>$this->Param['city']);

    $this->Assign('menberInfo',$memberRow);
    $this->Assign('web_information',$data_industry);
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('convention_index.php');

    //echo $this->GetView('convention.php');
}else{
    switch($this->Param['option']){
        case 'detail':
            $this->LoadHelper('member/MemberDetailHelper');
            $MemberDetailHelper = new MemberDetailHelper();

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            //获取提供该展位的供应商
            $data = $ConventionHelper->GetAllDetailWhere(array('`con_id` = ?' => $id,'`is_delete` = ?' => 0,'`is_online` = ?' =>0),4,0,$this->Param,array('member_id'));


            //获取企业头像
            if(!empty($data['All'])){
                foreach($data['All'] as $k => $v){
                    $data['All'][$k]['memberInfo'] = $MemberDetailHelper->GetMember($v['member_id']);

                    $area_row = $ConventionHelper->getAreaRow(array('`detail_id` =?' => $v['detail_id']));
                    if($area_row['is_rent'] == 1){
                        unset($data['All'][$k]);
                    }else{
                        $data['All'][$k]['area'] = $ConventionHelper->getAreaRow(array('`detail_id` =?' => $v['detail_id']));
                        $data['All'][$k]['area_name'] = $ConventionHelper->getAllAreaRow(array('area_name'),array('`detail_id` = ?'=>$v['detail_id']),20,0,array('area_name'));
                    }
                }
            }

            //获取单个展会信息
            $data['info'] = $ConventionHelper->getRow(array('`id` = ?' => $id));
            $data['info']['imgarr'] = unserialize($data['info']['imgurl']);

            //获取评价
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();
            $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 1 ,'`delete` = ?' => 0);
            $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->UserConfig);

            //获取是否已经收藏
            $fav_count = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 1,
                '`related_id` = ?' => $id
            ));
            $fav_check = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 1,
                '`related_id` = ?' => $id,
                '`member_id` = ?' => $this->UserConfig['Id']
            ));
            $this->Assign('fav',array('count'=>$fav_count,'check'=>$fav_check));

            //相关展会
            $where_con['locate(?,`industry`)>0'] = urldecode($data['info']['industry']);
            $where_con['`id` != ?'] = $id;
            $data_con = $ConventionHelper->GetAllWhere($where_con, 3, 1, array());
            if(empty($data_con['All'])) {
                $data_con = $ConventionHelper->GetAllWhere(array(), 3, 1, array());
            }
            foreach($data_con['All'] as $k => $val_con)
            {
                $data_con['All'][$k]['imgarr_1'] = unserialize($val_con['imgurl'])['0'];
                //echo $data_con['All'][$k]['imgarr_1'];exit();
            }
            //var_dump($data_con);//exit();
            $this->Assign('data_con', $data_con);

            //相关资讯
            $where_ctag['locate(?,`ctag_name`)>0'] = urldecode($data['info']['industry']);
            //var_dump($where_ctag);
            $ctag_row = $ForumHelper->cTagRow($where_ctag);
            $ctag_id = empty($ctag_row['ctag_id']) ? 22 : $ctag_row['ctag_id'];
            $new_all = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum` join `dyhl_forum_tagindex` on dyhl_forum.id = dyhl_forum_tagindex.forum_id WHERE is_show = 1 and `delete` = 0 and dyhl_forum_tagindex.ctag_id= '.$ctag_id.' and dyhl_forum.id != '.$id.'  GROUP BY dyhl_forum_tagindex.forum_id order by dyhl_forum.dateline desc limit 0,4 ');
            //var_dump($tag_all);exit();
            $this->Assign('new_all', $new_all);

            $this->Assign('eva', $eva);
            $this->Assign('data', $data);
            echo $this->GetView('convention_index_detail-2016-06-14.php');
            break;
        case 'order':
            $this->LoadHelper('member/MemberDetailHelper');
            $MemberDetailHelper = new MemberDetailHelper();

            $this->LoadHelper('supplier/SupplierHelper');
            $SupplierHelper = new SupplierHelper();


            $detailId = empty($this->Param['detailid']) ? 0 : $this->Param['detailid'];

            //获取提供该展位的供应商
            $data = $ConventionHelper->getDetailRow(array('`detail_id` = ?' => $detailId,'`is_delete` = ?' => 0));
			if(empty($data)){
				//展位已经全部出租
				header("Location:".WEB_URL."/convention/index");
				die();		
			}

            //获取单个展会信息
            $data['info'] = $ConventionHelper->getRow(array('`id` = ?' => $data['con_id']));
            $data['info']['imgarr'] = unserialize($data['info']['imgurl']);

            //获取提供的展区
            $data['group'] = $ConventionHelper->getAllAreaRow(array('area_name'),array('`detail_id` = ?'=>$detailId,'`is_rent` = ?' => 0),20,0,array('area_name'));
            if(!empty($data['group'])){
                foreach($data['group'] as $k => $v){
                    $data['group'][$k]['booth_no_list'] = $ConventionHelper->GetAllAreaWhere(array('`area_name` = ?' =>$v['area_name'],'`detail_id` = ?' => $detailId),100,0);
                }
            }else{
				//展位已经全部出租
				header("Location:".WEB_URL."/convention/index/option/detail/id/".$data['con_id']."'");
				die();	
			}

            //获取企业信息
            $data['memberInfo'] = $MemberDetailHelper->GetMember($data['member_id']);

            //获取认证资质
            $data['cert'] = $SupplierHelper->certRow(array('`member_id` = ?' => $data['member_id']));
            $data['cert']['operater_cert_arr'] = unserialize($data['cert']['operater_cert']);

            //获取评价
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();
            $where = array('`con_id` = ?' => $detailId,'`is_type` = ?' => 2,'`delete` = ?'=>0);
            $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->UserConfig);
            $this->Assign('eva', $eva);

            //获取是否已经收藏
            $fav_count = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 2,
                '`related_id` = ?' => $detailId
            ));
            $fav_check = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 2,
                '`related_id` = ?' => $detailId,
                '`member_id` = ?' => $this->UserConfig['Id']
            ));
            $this->Assign('fav',array('count'=>$fav_count,'check'=>$fav_check));
            $this->Assign('data', $data);
;
            echo $this->GetView('convention_index_order.php');
            break;

        default :
    }
}