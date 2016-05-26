<?php

$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();
if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);
    $where = array('`update_dateline` > ?' => 0);
    if (!empty($this->Param['nametitle'])) {
        $where['locate(?,`name`)>0'] = $this->Param['nametitle'];
    }
    $data = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);
	//统计供应商数量
	if(!empty($data['All'])) foreach($data['All'] as $key => $val){
        $sql="SELECT COUNT(con_id) as countNumber FROM `dyhl_convention_detail` where con_id = ".$val['id']." AND is_delete = 0";
		
		$number = $ConventionHelper->detailCount($sql);
		
		$data['All'][$key]['countNumber'] = $number[0]['countNumber'];

	}

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    $this->Assign('search', '/convention/list/');
    echo $this->GetView('convention_index.php');
}