<?php

$this->LoadHelper('member/MemberAvatarHelper');
$MemberAvatarHelper = new MemberAvatarHelper();

$this->LoadHelper('keyword/KeywordHelper');
$KeywordHelper = new KeywordHelper();

$memberRow = $MemberAvatarHelper->GetId($this->UserConfig['Id']);
$this->Assign('menberInfo',$memberRow);

//友情链接
$this->LoadHelper('link/LinkHelper');
$LinkHelper = new LinkHelper();

$links = $LinkHelper->linkAll(array(
    '`id` > ?' => 0
));
$this->Assign('link',$links);

//选择所有行业
$this->LoadHelper('industry/IndustryHelper');
$IndustryHelper =  new IndustryHelper();
$one_level = $IndustryHelper->industryAll(array(
    '`parent_id` = ?' => 0
),array(0,100));
if(!empty($one_level)) foreach($one_level as $k=>$v){
    $next_all = $IndustryHelper->industryAll(array(
        '`parent_id` = ?' => $v['id']
    ),array(0,50));
    $one_level[$k]['next'] = $next_all;
}
$this->Assign('nav',$one_level);
//
$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();

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
$this->Assign('delta',$delta);

//查询关键词
$keyword = $KeywordHelper->keywordAll(array());
$this->Assign('keyword',$keyword);