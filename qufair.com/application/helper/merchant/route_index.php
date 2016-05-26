<?php

$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('region/RegionHelper');
$RegionHelper = new RegionHelper();

if (empty($this->Param['option'])) {

    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);
	
	if(!empty($this->Param['regional'])){
		$where['LOCATE("'.$this->Param['regional'].'",`regional`) > ?'] = 0;

		$key['regional'] = $this->Param['regional'];
	}

	if(!empty($this->Param['countries'])){
		$where['LOCATE("'.$this->Param['countries'].'",`countries`) > ?'] = 0;

		$key['countries'] = $this->Param['countries'];
	}

    $data = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);
	$this->Assign('regional',$this->Param['regional']);
	$this->Assign('countries',$this->Param['countries']);
	
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);

    echo $this->GetView('route_index.php');
} else {
    switch($this->Param['option']){
        case 'uploadimg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'],'route');
            break;
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $con_id = empty($this->Param['con_id']) ? ErrorMsg::Debug('参数错误') : $this->Param['con_id'];
            $this->Assign('id',$id);
            $this->Assign('con_id',$con_id);
            
            $where = array(
                '`id` = ?' => $id,
                '`member_id` = ?' => $this->UserConfig['Id']
            );

			
            $route_row = $RouteHelper->routeRow($where);
            $route_row['image'] = unserialize($route_row['image']);
            $this->Assign('route',$route_row);
            
            $conven_row = $ConventionHelper->getRow(array(
                '`id` = ?' => $con_id
            ));
            $conven_row['imgurl'] = unserialize($conven_row['imgurl']);
            $this->Assign('conven',$conven_row);
            //类型
        	$data['visa'] = $RouteHelper->GetVisaSort('all');
			$this->Assign('data',$data);
            echo $this->GetView('route_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $con_id = empty($this->Param['con_id']) ? ErrorMsg::Debug('参数错误') : $this->Param['con_id'];
            
            $data['cover'] = empty($this->Param['cover']) ? ErrorMsg::Debug('请上传封面图片') : $this->Param['cover'];

            $data['image'] = serialize($this->Param['image']);
            $data['name'] = empty($this->Param['name']) ? ErrorMsg::Debug('请输入行程名称') : $this->Param['name'];
            $data['leave_time'] = empty($this->Param['leave_time']) ? ErrorMsg::Debug('请选择出发时间') : strtotime($this->Param['leave_time']);

            $starttime = empty($this->Param['leave_time']) ? ErrorMsg::Debug('请选择出发时间') : $this->Param['leave_time'] ;
            $startimeArr = explode("-",$starttime);
            $data['txt_year'] = $startimeArr[0];//特装开始的时间
            $data['txt_month'] = $startimeArr[1];

            $data['leave_year'] = date('Y',$data['leave_time']);
            $data['end_time'] = empty($this->Param['end_time']) ? ErrorMsg::Debug('请选择结束时间') : strtotime($this->Param['end_time']);
            $data['leave_area'] = empty($this->Param['leave_area']) ? ErrorMsg::Debug('请输入出发地点') : $this->Param['leave_area'];
            $data['pavilion'] = empty($this->Param['pavilion']) ? ErrorMsg::Debug('请输入赶往场馆') : $this->Param['pavilion'];
            $data['appid'] = $this->Param['appid'];
            $data['qq'] = $this->Param['qq'];
            $data['class_name'] = $this->Param['class_name'];
            $data['price'] = empty($this->Param['price']) ? ErrorMsg::Debug('请输入服务价格') : $this->Param['price'];
            if(!is_numeric($data['price'])){
                ErrorMsg::Debug('价格错误');
            }
            $data['hotel_star'] = empty($this->Param['hotel_star']) ? ErrorMsg::Debug('请选择酒店星级') : $this->Param['hotel_star'];
            $data['description'] = $this->Param['description'];

            $data['route_city'] = empty($this->Param['route_city']) ? ErrorMsg::Debug('请填写服务城市') : $this->Param['route_city'];
            $data['regional'] = empty($this->Param['regional']) ? ErrorMsg::Debug('请选择所属洲') : $this->Param['regional'];
            $data['countries'] = empty($this->Param['countries']) ? ErrorMsg::Debug('请选择所属国家') : $this->Param['countries'];
            $data['city'] = $this->Param['city'];
            
            if($id > 0){
                $data['up_time'] = NOW_TIME;
                $RouteHelper->routeSave($data,array(
                    '`id` = ?' => $id,
                    '`member_id` = ?' => $this->UserConfig['Id']
                ));
                ErrorMsg::Debug('保存成功',TRUE);
            }else{
                $data['con_id'] = $con_id;
                $data['member_id'] = $this->UserConfig['Id'];
                $data['dateline'] = NOW_TIME;
                $route_id = $RouteHelper->routeSave($data);
                if($route_id){
                    ErrorMsg::Debug('保存成功',TRUE);
                }
            }
            ErrorMsg::Debug('保存失败');
            break;
        default :
    }
}