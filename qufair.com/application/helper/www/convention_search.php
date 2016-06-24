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
    $delta = array("欧洲","美洲","亚洲","非洲","大洋洲");
    $this->Assign('delta', $delta);
    //var_dump($this->Param);exit();
    $one_level = $IndustryHelper->industryAll(array(
        '`parent_id` = ?' => 0
    ),array(0,100));
    if(!empty($one_level)) foreach($one_level as $k=>$v){
        $next_all = $IndustryHelper->industryAll(array(
            '`parent_id` = ?' => $v['id']
        ),array(0,50));
        $one_level[$k]['next'] = $next_all;
    }
    //var_dump($data);exit();
    $this->Assign('industry', $one_level);

    $limit = 8;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);

    if(!empty($this->Param['industry'])){
        $where['locate(?,`main`)>0'] = urldecode($this->Param['industry']);
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
    //var_dump($where);//exit();
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
    echo $this->GetView('convention_search.php');

    //echo $this->GetView('convention.php');
}