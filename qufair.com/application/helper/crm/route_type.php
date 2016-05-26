<?php
    $this->LoadHelper('route/RouteHelper');
	$RouteHelper = new RouteHelper();

    if(empty($this->Param['option'])){
        //获取全部分类
        $data['All']=$RouteHelper->GetVisaSort('all');
        $this->Assign('data',$data);
        echo $this->GetView('route_type_index.php');
    }else{
        switch($this->Param['option']){
            case 'edit':

                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $data=$RouteHelper->getVisaRow(array('`visa_id` = ?' =>$id));
                $category=$RouteHelper->GetVisaSort('all');
                $this->Assign('id',$id);
                $this->Assign('category',$category);
                $this->Assign('data',$data);
                echo $this->GetView('route_type_edit.php');
                break;
            case 'submit':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $data['visa_name'] = $this->Param['visa_name'];
                $data['parent_id'] = $this->Param['parent_id'];
                $data['sort_order'] = $this->Param['sort_order'];
                $data['is_open'] = $this->Param['is_open'];

                $where['`visa_id` = ?'] = $id;
                if($id>0){
                    $RouteHelper->VisaUpdate($data,$where);
                    ErrorMsg::Debug('保存成功',TRUE);
                }else{
					
                    if($RouteHelper->VisaSave($data)){
                        ErrorMsg::Debug('保存成功',TRUE);
                    }
                }
                ErrorMsg::Debug('保存失败');
                break;
            case 'remove':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $RouteHelper -> VisaDelete(array('`visa_id` = ?'=>$id));

                ErrorMsg::Debug('删除成功',TRUE);
                break;
            default :
        }
    }