<?php

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper =  new MemberDetailHelper();

$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();

//banner
$this->LoadHelper('adv/AdvHelper');
$AdvHelper = new AdvHelper();

$id = 12;
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

    //筛选城市 年份 月份
    $country = empty($this->Param['country']) ? '' : urldecode($this->Param['country']);
    $city = urldecode($this->Param['city']);
    $visa_type = urldecode($this->Param['visa_type']);
    $year = urldecode($this->Param['year']);
    $month = urldecode($this->Param['month']);
    $this->Assign('country',$country);
    $this->Assign('city',$city);
    $this->Assign('year',$year);
    $this->Assign('visa_type',$visa_type);
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

    //筛选所有签证类型
    $visa_type_all = $VisaHelper->GetGroupTypeAll(array('visa_name','visa_id'), array('`is_delete` = ?' => 0), 500, 0, array('visa_name'));
    $visa_type_all = Common::arrayExplode($visa_type_all, 8);
    $this->Assign('visa_type_all',$visa_type_all);
    //筛选所有年份
    $year_all = $VisaHelper->GroupAllRow(array('txt_year'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_year'));
    $year_all = Common::arrayExplode($year_all, 8);
    $this->Assign('year_all',$year_all);

    //筛选 月份
    $month_all = $VisaHelper->GroupAllRow(array('txt_month'), array('`is_delete` = ?' => 0,'`is_online` = ?' => 0), 500, 0, array('txt_month'));
    $month_all = Common::arrayExplode($month_all, 8);
    $this->Assign('month_all',$month_all);

    $where = array(
        '`is_delete` = ?' => 0,
        '`is_online` = ?' => 0
    );

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
    $data = $VisaHelper->GetAllWhere($where, $limit, $page, $this->Param);

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
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('visa_index.php');
} else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $visa_row = $VisaHelper->getRow(array(
                '`visa_id` = ?' => $id,
                '`is_delete` = ?' => 0,
                '`is_online` = ?' => 0
            ));

            if(empty($visa_row)){
                ErrorMsg::Debug('未找到当前签证或签证已下架');
            }
            //产品类型
            $pro_row = $VisaHelper->getProRow(array('`pro_id` = ?' => $visa_row['pro_type']));
            $visa_row['type_name'] = $pro_row['type_name'];
            //签证类型
            $visa_type = $VisaHelper->getVisaRow(array('`visa_id` = ?' => $visa_row['visa_type']));
            $visa_row['visa_name'] = $visa_type['visa_name'];

            $visa_row['image'] = unserialize($visa_row['visa_imgurl']);
            //统计打分值
            $average = $CommentHelper->detailConAverage(array(
                '`is_type` = ?' => 4,
                '`con_id` = ?' => $id,
                '`delete` = ?' => 0
            ));
            $visa_row['average'] = $average;
            //统计关注数
            $fav_count = $FavoriteHelper->favCount(array(
                '`related_id` = ?' => $id,
                '`sort` = ?' => 4
            ));
            $visa_row['favcount'] = $fav_count;
            $this->Assign('data' , $visa_row);
            //
            //获取评价
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();
            $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 4 ,'`delete` = ?' => 0);
            $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->UserConfig);

            //获取是否已经收藏
            $fav_count = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 4,
                '`related_id` = ?' => $id
            ));
            $fav_check = $FavoriteHelper->favCount(array(
                '`sort` = ?' => 4,
                '`related_id` = ?' => $id,
                '`member_id` = ?' => $this->UserConfig['Id']
            ));
            $this->Assign('fav',array('count'=>$fav_count,'check'=>$fav_check));
            $this->Assign('eva', $eva);
            //读取公司认证信息
            $supplier = $SupplierHelper->certRow(array(
                '`type_code` = ?' => 'S003',
                '`member_id` = ?' => $visa_row['member_id']
            ));
            $supplier['operater_cert'] = unserialize($supplier['operater_cert']);
            $member_row = $MemberDetailHelper->GetId($visa_row['member_id']);
            foreach($member_row as $k=>$v){
                $supplier[$k] = $v;
            }
            $this->Assign('supplier',$supplier);

            echo $this->GetView('visa_detail.php');
            break;
        default :
    }
}