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
                $this->LoadHelper('member/MemberDetailHelper');
                $MemberDetailHelper = new MemberDetailHelper();

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
                $data['eva'] = $eva;

                break;
            default:
                $where = array(
                    '`is_delete` = ?' => 0,
                    '`is_online` = ?' => 0
                );

                if($$isIndex != 'all'){
                    $where['`is_index` = ?'] = $isIndex;
                }

                $data = $ConventionHelper->GetAllDetailWhere($where, $limit, $page, $this->Param);
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
        }
        break;
    case 'decoration':
        $where = array(
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        );

        if($$isIndex != 'all'){
            $where['`is_index` = ?'] = $isIndex;
        }

        $data = $DecorationHelper->GetAllWhere($where, $limit, $page, $this->Param);
        if(!empty($data['All'])){
            foreach($data['All'] as $key => $val){
                $data['All'][$key]['image'] = unserialize($val['imgurl']);
                $data['All'][$key]['style_type'] = unserialize($val['style_type']);
            }
        }

        break;
    case 'logistics':
        $where = array(
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        );

        if($$isIndex != 'all'){
            $where['`is_index` = ?'] = $isIndex;
        }

        $data = $LogisticsHelper->GetAllWhere($where, $limit, $page, $this->Param);
        if(!empty($data['All'])){
            foreach($data['All'] as $key => $val){
                $data['All'][$key]['image'] = unserialize($val['log_imgurl']);
                $data['All'][$key]['log_freight'] = unserialize($val['log_freight']);
            }
        }
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

        break;
    case 'visa':
        $where = array(
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        );

        if($$isIndex != 'all'){
            $where['`is_index` = ?'] = $isIndex;
        }

        $data = $VisaHelper->GetAllWhere($where, $limit, $page, $this->Param);
        if(!empty($data['All'])){
            foreach($data['All'] as $key => $val){
                $data['All'][$key]['image'] = unserialize($val['visa_imgurl']);
            }
        }
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
