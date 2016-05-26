<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

//
$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();



if(empty($this->Param['delta'])){
	$delta = array("欧洲","亚洲","中东","东欧","北美","南美","中北美","非洲","大洋洲","中国");
	foreach($delta as $k=>$v){
		$country = $RegionHelper->regionAll(array(
			'`delta` = ?' => $v,
			'`parent_id` = ?' => 0
		));
		if(!empty($country)){
			foreach($country as $key=>$val){
				$country[$key]['letter'] = StringCode::getfirstchar($val['name']);
			}
		}
		$country = StringCode::array_sort($country,'letter','asc');
		$delta[$k] = array(
			'name' => $v,
			'next' => $country
		);
	}
}else{
	$deltatxt = urldecode($this->Param['delta']);
	$country = $RegionHelper->regionAll(array(
		'`delta` = ?' => $deltatxt,
		'`parent_id` = ?' => 0
	));
	if(!empty($country)){
		foreach($country as $key=>$val){
			$country[$key]['letter'] = StringCode::getfirstchar($val['name']);
		}
	}
	$country = StringCode::array_sort($country,'letter','asc');
	$delta = array(
		'name' => $deltatxt,
		'next' => $country
	);
}

/**
* APP 列表接口文档
* @param type 要获取的列表类型 [convention|decoration|logistics|route|visa]
* @param page 页数
* @param limit 个数
* @param is_index 是否推荐
***/

$type = empty($this->Param['type']) ? 'convention' : $this->Param['type'] ;
$isIndex = empty($this->Param['is_index']) ? 'all' : $this->Param['is_index'] ;
$limit = empty($this->Param['limit']) ? 10 : $this->Param['limit'];
$page = empty($this->Param['page']) ? 0 : $this->Param['page'];

switch($type){
    case 'convention':

        switch($this->Param['option']){
            case 'list':
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
                $data['info']['imgurl'] = unserialize($data['info']['imgurl']);

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

                $data['eva'] = $eva;
				$data['fav'] = array('count'=>$fav_count,'check'=>$fav_check);

                break;
            default:
                /**
                 * 展会列表
                 * @param industry 行业
                 * @param delta 州
                 * @param countries 国家
                 * @param city  城市
                 **/
                $limit = empty($this->Param['limit']) ? 10 : $this->Param['limit'];
                $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
                $where = array('`id` > ?' => 0);

                if($isIndex != 'all'){
                    $where['`is_index` = ?'] = $isIndex;
                }

                if(!empty($this->Param['industry'])){
                    $where['locate(?,`industry`)>0'] = urldecode($this->Param['industry']);
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
                $data = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);
                if(!empty($data['All'])){
                    foreach($data['All'] as $key => $val){
                        $data['All'][$key]['convention'] = $ConventionHelper->getRow(array(
                            '`id` = ? ' => $val['con_id']
                        ));

                        $data['All'][$key]['convention']['image'] = unserialize($data['All'][$key]['convention']['imgurl']);

                        $data['All'][$key]['convention_area'] = $ConventionHelper->getAreaRow(array(
                            '`detail_id` = ?' => $val['detail_id']
                        ));

                    }
                }

                $data['delta'] = $delta;

                $country_where = array('`parent_id` = ?' =>0);
                if(!empty($this->Param['delta'])){
                    $country_where['`delta` = ?'] = $this->Param['delta'];
                }
                $country_all = $RegionHelper->regionAll($country_where);
                $country_all = Common::arrayExplode($country_all, 8);
                $data['country_all'] = $country_all;

                if(!empty($this->Param['countries'])){
                    $country_row = $RegionHelper->regionRow(array('`name` = ?' => urldecode($this->Param['countries'])));
                    $city_where['`parent_id` = ?'] = $country_row['id'];

                    $city_all = $RegionHelper->regionAll($city_where,array(0,100));
                    $city_all = Common::arrayExplode($city_all, 8);

                    $data['city_all'] = $city_all;
                }
				
				$data['nav'] = $ConventionHelper->getAllRow(array('industry'),array('`id` > ?' => 0,'`industry` != ?' => ''),100,0,array('industry'));

                $data['attr'] = array('industry' =>$this->Param['industry'],'delta' => $this->Param['delta'],'countries'=>$this->Param['countries'],'city'=>$this->Param['city']);

                $data['menberInfo'] = $memberRow;
				
				



        }
        break;
    case 'decoration':
        /**
         * 特装列表
         * @param proportion 面积
         * @param delta 州
         * @param countries 国家
         * @param city  城市
         **/

        //筛选城市 面积 年份 月份
        $country = empty($this->Param['country']) ? '' : urldecode($this->Param['country']);
        $city = urldecode($this->Param['city']);
        $proportion = urldecode($this->Param['proportion']);
        $year = urldecode($this->Param['year']);
        $month = urldecode($this->Param['month']);

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

        //筛选 面积
        $proportion_all = $DecorationHelper->GroupAllRow(array('proportion'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('proportion'));
        $proportion_all = Common::arrayExplode($proportion_all, 8);

        //筛选所有年份
        $year_all = $DecorationHelper->GroupAllRow(array('txt_year'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_year'));
        $year_all = Common::arrayExplode($year_all, 8);

        //筛选 月份
        $month_all = $DecorationHelper->GroupAllRow(array('txt_month'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_month'));
        $month_all = Common::arrayExplode($month_all, 8);


        $where = array(
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        );

        if($isIndex != 'all'){
            $where['`is_index` = ?'] = $isIndex;
        }

        if(!empty($this->Param['key'])){
            $where['locate(?,`title`)>0'] = $this->Param['key'];
        }

        if(!empty($country)){
            $where['locate(?,`countries`)>0'] = $country;

            if(!empty($this->Param['city'])){
                $where['locate(?,`title`)>0'] = urldecode($city);//因为目前没有市，所以搜索标题中的省、市
            }
        }

        if(!empty($this->Param['proportion'])){
            $where['locate(?,`proportion`)>0'] = urldecode($this->Param['proportion']);
        }
        if(!empty($this->Param['year'])){
            $where['locate(?,`txt_year`)>0'] = urldecode($this->Param['year']);
        }
        if(!empty($this->Param['month'])){
            $where['locate(?,`txt_month`)>0'] = urldecode($this->Param['month']);
        }


        //获取物流
        $data = $DecorationHelper->GetAllWhere($where, $limit, $page, $this->Param);

        if(!empty($data['All'])) foreach($data['All']  as $k => $v){

            //企业信息
            $memberRow = $MemberDetailHelper->GetMember($v['member_id']);
            $data['All'][$k]['company'] = $memberRow['company'];

            //关注
            $fav_count = $FavoriteHelper->favCount(array(
                '`related_id` = ?' => $v['id'],
                '`sort` = ?' => 5
            ));
            $data['All'][$k]['favcount'] = $fav_count;

            //统计打分平均分值
            $average = $CommentHelper->detailConAverage(array(
                '`is_type` = ?' => 5,
                '`con_id` = ?' => $v['id'],
                '`delete` = ?' => 0
            ));
            $data['All'][$k]['average'] = $average;

        }
        //行业
        $data['de_industry'] = $DecorationHelper->GroupIndustryAllRow(array('title'),array('`id` > ?'=> 0),200,0,array('title'));
        if(!empty($data['de_industry'])){
            for($i=0;$i < ceil(count($data['de_industry']) / 8);$i++){
                $data['industry_arr'][$i] = array_slice($data['de_industry'],$i*8,8,true);
            }
        }

        //国家
        $data['countries'] = $DecorationHelper->GroupAllRow(array('countries'),array('`is_delete` = ?'=> 0,'`is_online` = ?' => 0),200,0,array('countries'));
        if(!empty($data['countries'])){
            for($i=0;$i < ceil(count($data['countries']) / 8);$i++){
                $data['countries_arr'][$i] = array_slice($data['countries'],$i*8,8,true);
            }
        }
        //时间
        $data['year'] = $DecorationHelper->GroupAllRow(array('year'),array('`is_delete` = ?'=> 0,'`is_online` = ?' => 0),200,0,array('year'));
        if(!empty($data['year'])){
            for($i=0;$i < ceil(count($data['year']) / 8);$i++){
                $data['year_arr'][$i] = array_slice($data['year'],$i*8,8,true);
            }
        }

        //筛选条件
        $data['attr'] = array('country' => $country,'city' =>$city,'proportion'=>$proportion,'year'=>$year,'month'=>$month);


        $data['city_all'] = $city_all;
        $data['proportion_all'] = $proportion_all;
        $data['year_all'] = $year_all;
        $data['month_all'] = $month_all;

        break;
    case 'logistics':
        /**
         * 物流列表
         * @param country 国家
         * @param city 城市
         * @param year 年
         * @param month 月
         **/

        //筛选城市 年份 月份
        $country = empty($this->Param['country']) ? '' : urldecode($this->Param['country']);
        $city = urldecode($this->Param['city']);
        $year = urldecode($this->Param['year']);
        $month = urldecode($this->Param['month']);

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

        //筛选所有年份
        $year_all = $LogisticsHelper->GroupAllRow(array('txt_year'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_year'));
        $year_all = Common::arrayExplode($year_all, 8);


        //筛选 月份
        $month_all = $LogisticsHelper->GroupAllRow(array('txt_month'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_month'));
        $month_all = Common::arrayExplode($month_all, 8);

        $where = array(
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        );

        if($isIndex != 'all'){
            $where['`is_index` = ?'] = $isIndex;
        }

        if(!empty($this->Param['key'])){
            $where['locate(?,`log_title`)>0'] = $this->Param['key'];
        }

        if(!empty($country)){
            $where['locate(?,`log_countries`)>0'] = $country;

            if(!empty($this->Param['city'])){
                $where['locate(?,`log_title`)>0'] = urldecode($city);//因为目前没有市，所以搜索标题中的省、市
            }
        }

        if(!empty($this->Param['year'])){
            $where['locate(?,`txt_year`)>0'] = urldecode($this->Param['year']);
        }
        if(!empty($this->Param['month'])){
            $where['locate(?,`txt_month`)>0'] = urldecode($this->Param['month']);
        }


        //获取物流
        $data = $LogisticsHelper->GetAllWhere($where, $limit, $page, $this->Param);

        if(!empty($data['All'])) foreach($data['All']  as $k => $v){

            $data['All'][$k]['log_freight'] = unserialize($v['log_freight']);

            //企业信息
            $memberRow = $MemberDetailHelper->GetMember($v['member_id']);
            $data['All'][$k]['company'] = $memberRow['company'];

            //关注
            $fav_count = $FavoriteHelper->favCount(array(
                '`related_id` = ?' => $v['id'],
                '`sort` = ?' => 5
            ));
            $data['All'][$k]['favcount'] = $fav_count;

            //统计打分平均分值
            $average = $CommentHelper->detailConAverage(array(
                '`is_type` = ?' => 5,
                '`con_id` = ?' => $v['id'],
                '`delete` = ?' => 0
            ));
            $data['All'][$k]['average'] = $average;

        }

        $data['log_countries'] = $LogisticsHelper->GroupAllRow(array('log_countries'),array('`is_delete` = ?'=> 0,'`is_online` = ?' => 0),200,0,array('log_countries'));

        if(!empty($data['log_countries'])){
            for($i=0;$i < ceil(count($data['log_countries']) / 8);$i++){
                $data['countries_arr'][$i] = array_slice($data['log_countries'],$i*8,8,true);
            }
        }
        $data['log_year'] = $LogisticsHelper->GroupAllRow(array('log_year'),array('`is_delete` = ?'=> 0,'`is_online` = ?' => 0),200,0,array('log_year'));
        if(!empty($data['log_year'])){
            for($i=0;$i < ceil(count($data['log_year']) / 8);$i++){
                $data['year_arr'][$i] = array_slice($data['log_year'],$i*8,8,true);
            }
        }
        //筛选条件
        $data['attr'] = array('country' => $country,'city' =>$city,'year'=>$year,'month'=>$month);

        $data['city_all'] = $city_all;
        $data['year_all'] = $year_all;
        $data['month_all'] = $month_all;


        break;
    case 'route':
        $where = array(
            '`delete` = ?' => 1,
            '`is_sale` = ?' => 1
        );

        $data = $RouteHelper->routePageList($where, $limit, $page, $this->Param);
        if(!empty($data['All'])){
            foreach($data['All'] as $key => $val){
                $data['All'][$key]['image'] = unserialize($val['image']);
            }
        }

        /**
        * 行程列表
         * @param country 国家
         * @param city 城市
         * @param year 年
         * @param month 月
         **/

        //筛选城市 年份 月份
        $country = empty($this->Param['country']) ? '' : urldecode($this->Param['country']);
        $city = urldecode($this->Param['city']);
        $year = urldecode($this->Param['year']);
        $month = urldecode($this->Param['month']);

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

        //筛选所有年份
        $year_all = $RouteHelper->GetGroupAll(array('txt_year'), array('`delete` = ?' => 0,'`is_sale` = ?' => 1), 500, 0, array('txt_year'));
        $year_all = Common::arrayExplode($year_all, 8);

        //筛选 月份
        $month_all = $RouteHelper->GetGroupAll(array('txt_month'), array('`delete` = ?' => 0,'`is_sale` = ?' => 1), 500, 0, array('txt_month'));
        $month_all = Common::arrayExplode($month_all, 8);


        $where = array(
            '`delete` = ?' => 0,
            '`is_sale` = ?' => 1
        );

        if($isIndex != 'all'){
            $where['`is_index` = ?'] = $isIndex;
        }

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

        $data['city_all'] = $city_all;
        $data['year_all'] = $year_all;
        $data['month_all'] = $month_all;
        $data['param'] = $this->Param;


        break;
    case 'visa':
        //筛选城市 年份 月份
        $country = empty($this->Param['country']) ? '' : urldecode($this->Param['country']);
        $city = urldecode($this->Param['city']);
        $visa_type = urldecode($this->Param['visa_type']);
        $year = urldecode($this->Param['year']);
        $month = urldecode($this->Param['month']);


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

        //筛选所有签证类型
        $visa_type_all = $VisaHelper->GetGroupTypeAll(array('visa_name','visa_id'), array('`is_delete` = ?' => 0), 500, 0, array('visa_name'));
        $visa_type_all = Common::arrayExplode($visa_type_all, 8);
        $this->Assign('visa_type_all',$visa_type_all);
        //筛选所有年份
        $year_all = $VisaHelper->GroupAllRow(array('txt_year'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_year'));
        $year_all = Common::arrayExplode($year_all, 8);

        //筛选 月份
        $month_all = $VisaHelper->GroupAllRow(array('txt_month'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_month'));
        $month_all = Common::arrayExplode($month_all, 8);

        $where = array(
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        );

        if($isIndex != 'all'){
            $where['`is_index` = ?'] = $isIndex;
        }

        if(!empty($this->Param['key'])){
            $where['locate(?,`visa_title`)>0'] = $this->Param['key'];
        }

        if(!empty($country)){
            $where['locate(?,`countries`)>0'] = $country;

            if(!empty($this->Param['city'])){
                $where['locate(?,`visa_title`)>0'] = urldecode($city);//因为目前没有市，所以搜索标题中的省、市
            }
        }

        if(!empty($visa_type)){
            $visaT = $VisaHelper->getVisaRow(array(
                '`visa_name` = ?' => $visa_type
            ));
            $where['locate(?,`visa_type`)>0'] = urldecode($visaT['visa_id']);
        }
        if(!empty($this->Param['year'])){
            $where['locate(?,`txt_year`)>0'] = urldecode($this->Param['year']);
        }
        if(!empty($this->Param['month'])){
            $where['locate(?,`txt_month`)>0'] = urldecode($this->Param['month']);
        }

        //获取签证
        $data = $VisaHelper->GetAllWhere($where, $limit, $page, $this->Param, array('visa_id asc'));

        if(!empty($data['All'])) foreach($data['All']  as $k => $v){
            //企业信息
            $memberRow = $MemberDetailHelper->GetMember($v['member_id']);
            $data['All'][$k]['company'] = $memberRow['company'];

            //关注
            $fav_count = $FavoriteHelper->favCount(array(
                '`related_id` = ?' => $v['id'],
                '`sort` = ?' => 4
            ));
            $data['All'][$k]['favcount'] = $fav_count;

            //统计打分平均分值
            $average = $CommentHelper->detailConAverage(array(
                '`is_type` = ?' => 4,
                '`con_id` = ?' => $v['id'],
                '`delete` = ?' => 0
            ));
            $data['All'][$k]['average'] = $average;

        }

        $data['visa_countries'] = $VisaHelper->GroupAllRow(array('visa_countries'),array('`is_delete` = ?'=> 0,'`is_online` = ?' => 0),200,0,array('visa_countries'));
        if(!empty($data['visa_countries'])){
            for($i=0;$i < ceil(count($data['visa_countries']) / 8);$i++){
                $data['countries_arr'][$i] = array_slice($data['visa_countries'],$i*8,8,true);
            }
        }
        $data['visa_year'] = $VisaHelper->GroupAllRow(array('visa_year'),array('`is_delete` = ?'=> 0,'`is_online` = ?' => 0),200,0,array('visa_year'));
        if(!empty($data['visa_year'])){
            for($i=0;$i < ceil(count($data['visa_year']) / 8);$i++){
                $data['year_arr'][$i] = array_slice($data['visa_year'],$i*8,8,true);
            }
        }
        //筛选条件
        $data['attr'] = array('country' => $country,'city' =>$city,'visa_type'=>$visa_type,'year'=>$year,'month'=>$month);


        $data['city_all'] = $city_all;
        $data['year_all'] = $year_all;
        $data['month_all'] = $month_all;
        $data['visa_type'] = $visa_type;
        $data['param'] = $this->Param;

        break;
    default:

}

if(!empty($data['All'])){
    $row = array(
        'code' => 0,
        'data' => $data
    );

    echo $this->Param['callback']."(".json_encode($row).")";
    die();
}else{
    $row = array(
        'code' => 1,
        'data' => $data
    );

    echo $this->Param['callback']."(".json_encode($row).")";
    die();
}
