<?php
$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper =  new MemberDetailHelper();

$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

//banner
$this->LoadHelper('adv/AdvHelper');
$AdvHelper = new AdvHelper();

$id = 11;
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
if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    /***
    //筛选国家 地区 时间
    $country = $this->Param['country'];
    $city = $this->Param['city'];
    $year = $this->Param['year'];
    $this->Assign('country',$country);
    $this->Assign('city',$city);
    $this->Assign('year',$year);
    //筛选所有国家
    $country_all = $RegionHelper->regionAll(array('`parent_id` = ?' => 0), array(0,100));
    $country_all = Common::arrayExplode($country_all, 8);
    $this->Assign('country_all',$country_all);
    //筛选所有地区
    $city_where = array('`parent_id` > ?' => 0);
    if(!empty($country)){
        $country_row = $RegionHelper->regionRow(array('`name` = ?' => urldecode($country)));
        $city_where['`parent_id` = ?'] = $country_row['id'];
    }
    $city_all = $RegionHelper->regionAll($city_where,array(0,100));
    $city_all = Common::arrayExplode($city_all, 8);
    $this->Assign('city_all',$city_all);
    //筛选所有年份
    $year_all = $RouteHelper->routeAll(array('`delete` = ?' => 0),NULL,array('leave_year'),array('leave_year DESC'));
    $year_all = Common::arrayExplode($year_all, 8);
    $this->Assign('year_all',$year_all);


**/

    //筛选城市 年份 月份
    $country = empty($this->Param['country']) ? '' : urldecode($this->Param['country']);
    $city = urldecode($this->Param['city']);
    $year = urldecode($this->Param['year']);
    $month = urldecode($this->Param['month']);
    $this->Assign('country',$country);
    $this->Assign('city',$city);
    $this->Assign('year',$year);
    $this->Assign('month',$month);

    //筛选 城市 面积 年份 月份
    //筛选所有城市
    $city_where = array('`parent_id` > ?' => 0);
    if(!empty($country)){
        $country_row = $RegionHelper->regionRow(array('`name` = ?' => urldecode($country)));
        $city_where['`parent_id` = ?'] = $country_row['id'];

    }else{
        $country_row = $RegionHelper->regionRow(array('`name` = ?' => '中国'));
        $city_where['`parent_id` = ?'] = $country_row['id'];
    }
    $city_all = $RegionHelper->regionAll($city_where,array(0,100));
    $city_all = Common::arrayExplode($city_all, 8);
    $this->Assign('city_all',$city_all);

    //筛选所有年份
    $year_all = $RouteHelper->GetGroupAll(array('txt_year'), array('`delete` = ?' => 0,'`is_sale` = ?' => 1), 500, 0, array('txt_year'));
    $year_all = Common::arrayExplode($year_all, 8);
    $this->Assign('year_all',$year_all);

    //筛选 月份
    $month_all = $RouteHelper->GetGroupAll(array('txt_month'), array('`delete` = ?' => 0,'`is_sale` = ?' => 1), 500, 0, array('txt_month'));
    $month_all = Common::arrayExplode($month_all, 8);
    $this->Assign('month_all',$month_all);

    
    $where = array(
        '`delete` = ?' => 0,
        '`is_sale` = ?' => 1
    );
    
    $con_where = array();
    if(!empty($country)){
        $con_where['`countries` = ?'] = $country;
    }
    if(!empty($city)){
        $con_where['`city` = ?'] = $city;
    }
    if(!empty($con_where)){
        $conven_all = $ConventionHelper->conventionAll($con_where);
        $in_id = array(0);
        if(!empty($conven_all)) foreach($conven_all as $k=>$v){
            $in_id[] = $v['id'];
        }
        $where['`con_id` IN (?)'] = $in_id;
    }
    if(!empty($year)){
        //$where['`leave_year` = ?'] = $year;
        $where['locate(?,`txt_year`)>0'] = $year;
    }
    if(!empty($this->Param['month'])){
        $where['locate(?,`txt_month`)>0'] = urldecode($this->Param['month']);
    }
    $data = $RouteHelper->routePageList($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
		//获取类型
		$typeArr = $RouteHelper->getVisaRow(array(
			'`visa_id` = ?' => $v['hotel_star']
		));
		
		$data['All'][$k]['hotel_star'] = $typeArr['visa_name'];
		
        $fav_count = $FavoriteHelper->favCount(array(
            '`related_id` = ?' => $v['id'],
            '`sort` = ?' => 3
        ));
        $data['All'][$k]['favcount'] = $fav_count;
        //统计打分平均分值
        $average = $CommentHelper->detailConAverage(array(
            '`is_type` = ?' => 3,
            '`con_id` = ?' => $v['id'],
            '`delete` = ?' => 0
        ));
        $data['All'][$k]['average'] = $average;
    }

    $data['attr'] = array('country' => $country,'city' =>$city,'year'=>$year,'month'=>$month);

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    
    echo $this->GetView('route_index.php');
} else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $route_row = $RouteHelper->routeRow(array(
                '`id` = ?' => $id,
                '`is_sale` = ?' => 1
            ));
            if(empty($route_row)){
                ErrorMsg::Debug('未找到当前行程或行程已下架');
            }
            $route_row['image'] = unserialize($route_row['image']);
            //统计打分值
            $average = $CommentHelper->detailConAverage(array(
                '`is_type` = ?' => 3,
                '`con_id` = ?' => $id,
                '`delete` = ?' => 0
            ));
            $route_row['average'] = $average;
            //统计关注数
            $fav_count = $FavoriteHelper->favCount(array(
                '`related_id` = ?' => $id,
                '`sort` = ?' => 3
            ));
            $route_row['favcount'] = $fav_count;   
            $this->Assign('data' , $route_row);
            //
            //获取评价
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();
            $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 3 ,'`delete` = ?' => 0);
            $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->UserConfig);

            //获取是否已经收藏
            $fav_count = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 3,
                '`related_id` = ?' => $id
            ));
            $fav_check = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 3,
                '`related_id` = ?' => $id,
                '`member_id` = ?' => $this->UserConfig['Id']
            ));
            $this->Assign('fav',array('count'=>$fav_count,'check'=>$fav_check));
            $this->Assign('eva', $eva);
            //读取公司认证信息
            $supplier = $SupplierHelper->certRow(array(
                '`type_code` = ?' => 'S002',
                '`member_id` = ?' => $route_row['member_id']
            ));
            $supplier['operater_cert'] = unserialize($supplier['operater_cert']);
            $member_row = $MemberDetailHelper->GetId($route_row['member_id']);
            foreach($member_row as $k=>$v){
                $supplier[$k] = $v;
            }
            $this->Assign('supplier',$supplier);
            
            echo $this->GetView('route_detail.php');
            break;
        default :
    }
}