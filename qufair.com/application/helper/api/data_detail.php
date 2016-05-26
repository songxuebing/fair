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

$this->LoadHelper('supplier/SupplierHelper');
$SupplierHelper = new SupplierHelper();

$this->LoadHelper('www/front_base');

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();


/**
* APP 展会详情、行程详情、签证详情、物流详情、特装详情 接口文档
* @param type 要获取的详情类型 [convention|decoration|logistics|route|visa]
* @param id 查看的id
***/

$type = empty($this->Param['type']) ? 'convention' : $this->Param['type'] ;
$id = empty($this->Param['id']) ? 0 : $this->Param['id'];
$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];

switch($type){
    case 'convention':

        $detailId = $id;

        //获取提供该展位的供应商
        $data = $ConventionHelper->getDetailRow(array('`detail_id` = ?' => $detailId));

        //获取单个展会信息
        $data['info'] = $ConventionHelper->getRow(array('`id` = ?' => $data['con_id']));
        $data['info']['imgarr'] = unserialize($data['info']['imgurl']);

        //获取提供的展区
        $data['group'] = $ConventionHelper->getAllAreaRow(array('area_name'),array('`detail_id` = ?'=>$detailId,'`is_rent` = ?' => 0),20,0,array('area_name'));
        if(!empty($data['group'])){
            foreach($data['group'] as $k => $v){
                $data['group'][$k]['booth_no_list'] = $ConventionHelper->GetAllAreaWhere(array('`area_name` = ?' =>$v['area_name'],'`detail_id` = ?' => $detailId),7,0);
            }
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

        //获取是否已经收藏
        $fav_count = $FavoriteHelper->favCount(array(
            '`sort` = ?' => 2,
            '`related_id` = ?' => $detailId
        ));
        $fav_check = $FavoriteHelper->favCount(array(
            '`sort` = ?' => 2,
            '`related_id` = ?' => $detailId,
            '`member_id` = ?' => $member_id
        ));

        $data['eva'] = $eva;
        $data['fav'] = array('count'=>$fav_count,'check'=>$fav_check);

        break;
    case 'decoration':
        $decoration_row = $DecorationHelper->getRow(array(
            '`id` = ?' => $id,
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        ));

        if(empty($decoration_row)){
            echo $this->Param['callback']."(".json_encode(array(
                    'code' => 1,
                    'msg' => '未找到当前特装或特装已下架'
                )).")";

            die();
        }
        $decoration_row['image'] = unserialize($decoration_row['imgurl']);
        $decoration_row['style_img'] = unserialize($decoration_row['style_type']);
        //统计打分值
        $average = $CommentHelper->detailConAverage(array(
            '`is_type` = ?' => 6,
            '`con_id` = ?' => $id,
            '`delete` = ?' => 0
        ));
        $decoration_row['average'] = $average;
        //统计关注数
        $fav_count = $FavoriteHelper->favCount(array(
            '`related_id` = ?' => $id,
            '`sort` = ?' => 6
        ));
        $decoration_row['favcount'] = $fav_count;

        //
        //获取评价
        $limit = 10;
        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where = array();
        $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 6 ,'`delete` = ?' => 0);
        $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->UserConfig);

        //获取是否已经收藏
        $fav_count = $FavoriteHelper->favCount(array(
            '`sort` = ?' => 6,
            '`related_id` = ?' => $id
        ));
        $fav_check = $FavoriteHelper->favCount(array(
            '`sort` = ?' => 6,
            '`related_id` = ?' => $id,
            '`member_id` = ?' => $member_id
        ));

        //读取公司认证信息
        $supplier = $SupplierHelper->certRow(array(
            '`type_code` = ?' => 'S005',
            '`member_id` = ?' => $decoration_row['member_id']
        ));
        $supplier['operater_cert'] = unserialize($supplier['operater_cert']);
        $member_row = $MemberDetailHelper->GetId($decoration_row['member_id']);
        foreach($member_row as $k=>$v){
            $supplier[$k] = $v;
        }

        $data = $decoration_row;
        $data['supplier'] = $supplier;
        $data['fav'] = array('count'=>$fav_count,'check'=>$fav_check);
        $data['eva'] = $eva;

        break;
    case 'logistics':
        $logistics_row = $LogisticsHelper->getRow(array(
            '`log_id` = ?' => $id,
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        ));

        if(empty($logistics_row)){
            $row = array(
                'code' => 1,
                'msg' => '未找到当前物流或物流已下架'
            );
            echo $this->Param['callback']."(".json_encode($row).")";

            die();
        }
        $logistics_row['log_freight'] = unserialize($logistics_row['log_freight']);
        $logistics_row['image'] = unserialize($logistics_row['log_imgurl']);
        //统计打分值
        $average = $CommentHelper->detailConAverage(array(
            '`is_type` = ?' => 5,
            '`con_id` = ?' => $id,
            '`delete` = ?' => 0
        ));
        $logistics_row['average'] = $average;
        //统计关注数
        $fav_count = $FavoriteHelper->favCount(array(
            '`related_id` = ?' => $id,
            '`sort` = ?' => 5
        ));
        $logistics_row['favcount'] = $fav_count;

        //
        //获取评价
        $limit = 10;
        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where = array();
        $where = array('`con_id` = ?' => $id,'`is_type` = ?' => 5 ,'`delete` = ?' => 0);
        $eva = $CommentHelper->getAllComment($where, $limit, $page, $this->Param,$this->UserConfig);

        //获取是否已经收藏
        $fav_count = $FavoriteHelper->favCount(array(
            '`sort` = ?' => 5,
            '`related_id` = ?' => $id
        ));
        $fav_check = $FavoriteHelper->favCount(array(
            '`sort` = ?' => 5,
            '`related_id` = ?' => $id,
            '`member_id` = ?' => $member_id
        ));

        //读取公司认证信息
        $supplier = $SupplierHelper->certRow(array(
            '`type_code` = ?' => 'S004',
            '`member_id` = ?' => $visa_row['member_id']
        ));
        $supplier['operater_cert'] = unserialize($supplier['operater_cert']);
        $member_row = $MemberDetailHelper->GetId($logistics_row['member_id']);
        foreach($member_row as $k=>$v){
            $supplier[$k] = $v;
        }

        $data = $logistics_row;
        $data['supplier'] = $supplier;
        $data['fav'] = array('count'=>$fav_count,'check'=>$fav_check);
        $data['eva'] = $eva;

        break;
    case 'route':

        $route_row = $RouteHelper->routeRow(array(
            '`id` = ?' => $id,
            '`is_sale` = ?' => 1
        ));
        if(empty($route_row)){
            $row = array(
                'code' => 1,
                'msg' => '未找到当前行程或行程已下架'
            );
            echo $this->Param['callback']."(".json_encode($row).")";
            die();
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
            '`member_id` = ?' => $member_id
        ));

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

        $data = $route_row;
        $data['fav'] = array('count'=>$fav_count,'check'=>$fav_check);
        $data['eva'] = $eva;
        $data['supplier'] = $supplier;

        break;
    case 'visa':

        $visa_row = $VisaHelper->getRow(array(
            '`visa_id` = ?' => $id,
            '`is_delete` = ?' => 0,
            '`is_online` = ?' => 0
        ));

        if(empty($visa_row)){
            $row = array(
                'code' => 1,
                'msg' => '未找到当前签证或签证已下架'
            );
            echo $this->Param['callback']."(".json_encode($row).")";

            die();
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
            '`member_id` = ?' => $member_id
        ));

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

        $data = $visa_row;
        $data['fav'] = array('count'=>$fav_count,'check'=>$fav_check);
        $data['eva'] = $eva;
        $data['supplier'] = $supplier;


        break;
    default:

}

if(!empty($data)){
    $row = array(
        'code' => 0,
        'data' => $data
    );
}else{
    $row = array(
        'code' => 1
    );
}
echo $this->Param['callback']."(".json_encode($row).")";
die();