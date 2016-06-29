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

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

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
    //获取行程下的国家
    $delta_route = array("欧洲","美洲","亚洲","非洲","大洋洲");

    $this->Assign('delta',$delta_route);

    $data_ro = $RegionHelper->routeAll(null);
    //var_dump($data_ro);exit();
    foreach($delta_route as $k => $v) {
        foreach ($data_ro as $key => $val) {
            if ($val['delta'] == $v)
            {
                $da_ro[$k][$key] = $data_ro[$key];
            }
        }
    }
    //var_dump($da_ro);exit();
    //获取最新的10个行程
    $data_all = $RouteHelper->routenewList(array(),10,0);
    $this->Assign('data_all',$data_all);

    //获取每个州的3个行程
    foreach($delta_route as $key => $val) {
        $reg_where['`regional` = ?'] = $val;
        $data_re[$key] = $RouteHelper->routenewList($reg_where,3,0);
    }
    $this->Assign('delta_reg',$data_re);

    $this->Assign('delta_route',$da_ro);
    echo $this->GetView('route.php');

    //2016-06-23新改版

} else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $route_row = $RouteHelper->routenewRow(array(
                '`id` = ?' => $id,
                //'`is_sale` = ?' => 1
            ));
            if(empty($route_row)){
                ErrorMsg::Debug('未找到当前行程或行程已下架');
            }
            $this->Assign('route_row',$route_row);

            //相关推荐
            $new_all = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum`  WHERE is_show = 1 and `delete` = 0 order by dyhl_forum.dateline desc limit 0,4 ');
            foreach($new_all as $k => $val_new)
            {
                $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
                preg_match_all($pattern,$val_new['content'],$match);
                $new_all[$k]['cover'] = empty($match[1][0]) ? '' : $match[1][0];
            }
            $this->Assign('new_all',$new_all);
            //var_dump($new_all);exit();

            //获取套餐
            $route_package = $RouteHelper->routenewdetailAll(array(
                '`route_id` = ?' => $id,
            ),5);

            $this->Assign('route_package',$route_package);

            //相关签证
            $visa_row = $VisaHelper->GetAllnewWhere(array(),5,0,NULL);

            $this->Assign('visa_row',$visa_row);
            //var_dump($visa_row);exit();
            echo $this->GetView('route_detail_new.php');
            break;
        default :
    }
}