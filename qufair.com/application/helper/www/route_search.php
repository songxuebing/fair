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

$this->Assign('script',$script);
if (empty($this->Param['option'])) {
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

    //获取行程列表
    //var_dump($where);exit();
    $data = $RouteHelper->routenewPageList($where, $limit, $page, $this->Param);
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

    echo $this->GetView('route_search.php');

}