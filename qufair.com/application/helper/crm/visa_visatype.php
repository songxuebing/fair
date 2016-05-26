<?php
    $this->LoadHelper('visa/VisaHelper');
    $visaHelper=new VisaHelper();

    if(empty($this->Param['option'])){
        //获取全部分类
        $data['All']=$visaHelper->GetVisaSort('all');
        $this->Assign('data',$data);
        echo $this->GetView('visa_visatype_index.php');
    }else{
        switch($this->Param['option']){
            case 'edit':

                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $data=$visaHelper->getVisaRow(array('`visa_id` = ?' =>$id));
                $category=$visaHelper->GetVisaSort('all');
                $this->Assign('id',$id);
                $this->Assign('category',$category);
                $this->Assign('data',$data);
                echo $this->GetView('visa_visatype_edit.php');
                break;
            case 'submit':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $data['visa_name'] = $this->Param['visa_name'];
                $data['parent_id'] = $this->Param['parent_id'];
                $data['sort_order'] = $this->Param['sort_order'];
                $data['is_open'] = $this->Param['is_open'];

                $where['`visa_id` = ?'] = $id;
                if($id>0){
                    $visaHelper->VisaUpdate($data,$where);
                    ErrorMsg::Debug('保存成功',TRUE);
                }else{
                    if($visaHelper->VisaSave($data)){
                        ErrorMsg::Debug('保存成功',TRUE);
                    }
                }
                ErrorMsg::Debug('保存失败');
                break;
            case 'remove':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $visaHelper -> VisaDelete(array('`visa_id` = ?'=>$id));

                ErrorMsg::Debug('删除成功',TRUE);
                break;
            default :
        }
    }