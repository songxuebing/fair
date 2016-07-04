<?php

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();


if (empty($this->Param['option'])) {
    //var_dump($this->Param);
    $delta = array("欧洲","美洲","亚洲","非洲","大洋洲");
    $this->Assign('delta', $delta);

    $limit = 8;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);

    if(!empty($this->Param['delta'])){
        $where['locate(?,`regional`)>0'] = urldecode($this->Param['delta']);
    }
    if(!empty($this->Param['countries'])){
        $where['locate(?,`countries`)>0'] = urldecode($this->Param['countries']);
    }

    //获取行特装列表

    $data = $DecorationHelper->GetnewAllWhere($where, $limit, $page, $this->Param);
    //var_dump($data);exit();

    $country_where = array('`parent_id` = ?' =>0);
    if(!empty($this->Param['delta'])){
        $country_where['`delta` = ?'] = $this->Param['delta'];
    }
    $country_all = $RegionHelper->routeAll($country_where);
    $country_all = Common::arrayExplode($country_all, 8);
    $this->Assign('country_all',$country_all);

    $data['attr'] = array('delta' => $this->Param['delta'],'countries'=>$this->Param['countries']);

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);

    echo $this->GetView('decoration.php');

}
else {
    switch($this->Param['option']){
        case 'detail':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $decoration_row = $DecorationHelper->getnewRow(array(
                '`id` = ?' => $id,
                //'`is_sale` = ?' => 1
            ));
            if(empty($decoration_row)){
                ErrorMsg::Debug('未找到当前行程或行程已下架');
            }
            $this->Assign('decoration_row',$decoration_row);

            //var_dump($decoration_row);exit();

            //其他特装4个
            $limit = 4;
            $page = 0;
            $where = array();
            $where = array('`id` <> ?' => $id);

            //获取行特装列表
            $data = $DecorationHelper->GetnewAllWhere($where, $limit, $page, array());
            $this->Assign('data',$data);

            //相关推荐
            $new_all = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum`  WHERE is_show = 1 and `delete` = 0 order by dyhl_forum.dateline desc limit 0,4 ');
            foreach($new_all as $k => $val_new)
            {
                $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
                preg_match_all($pattern,$val_new['content'],$match);
                $new_all[$k]['cover'] = empty($match[1][0]) ? '' : $match[1][0];
            }
            $this->Assign('new_all',$new_all);

            echo $this->GetView('decoration_detail_new.php');
            break;
        default :
    }
}