<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $list = empty($this->Param['list']) ? 'all' : $this->Param['list'];
    
    $where = array(
        '`is_delete` = ?' => 0
    );

    if(!empty($this->Param['key'])){
        $member_row = $MemberListHelper->GetMemberRow(array(
            '`mobile` = ?' => $this->Param['key']
        ));

        if(!empty($member_row)){
            $where['`member_id` = ?'] = $member_row['id'];
        }
    }

    switch($list){
        case 'all':
            break;
        case 'onsale':            
            $where['`is_online`'] = 0;
            break;
        case 'nosale':
            $where['`is_online`'] = 1;
            break;
    }

    if(!empty($this->Param['st'])){
        $st = strtotime($this->Param['st']);
    }

    if(!empty($this->Param['et'])){
        $et = strtotime($this->Param['et']);
    }

    if($st > $et){
        ErrorMsg::Debug('查询时间错误');
    }

    if($st || $et){
        $where['`start_time`'] = $st;
        $where['`end_titme`'] = $et;
    }

    $data = $ConventionHelper->GetAllDetailWhere($where, $limit, $page, $this->Param);
    if(!empty($data['All'])){
        foreach($data['All'] as $k => $v){

            $data['All'][$k]['area'] = $ConventionHelper->getAreaRow(array(
                '`detail_id` = ?' => $v['detail_id']
            ));

            $data['All'][$k]['convention'] = $ConventionHelper->getRow(array(
                '`id` = ?' => $v['con_id']
            ));

            $memberRow  = $MemberListHelper->GetMemberRow(array(
                '`id` = ?' => $v['member_id']
            ));

            $data['All'][$k]['tel'] = $memberRow['mobile'];

        }
    }

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('con_index.php');
    
} else {
    switch ($this->Param['option']) {
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
			$data['is_delete'] = 1;
			
            $do = $ConventionHelper->detailUpdate($data,array('`detail_id` = ?' => $id));
			
            if($do){
                ErrorMsg::Debug('删除成功',TRUE);
            }
            ErrorMsg::Debug('删除失败');
            break;
        case 'saleopt':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $con_row = $ConventionHelper->getDetailRow(array(
                '`detail_id` = ?' => $id
            ));

            if(empty($con_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_online' => $con_row['is_online'] == 0 ? 1 : 0
                );
                $do = $ConventionHelper->detailUpdate($data,array(
                    '`detail_id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        case 'recommend':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $con_row = $ConventionHelper->getDetailRow(array(
                '`detail_id` = ?' => $id
            ));
            if(empty($con_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_index' => $con_row['is_index'] == 1 ? 0 : 1
                );
                $do = $ConventionHelper->detailUpdate($data,array(
                    '`detail_id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        default :
    }
}