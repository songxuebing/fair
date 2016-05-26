<?php
    $this->LoadHelper('visa/VisaHelper');
    $visaHelper=new VisaHelper();

    if(empty($this->Param['option'])){
        //获取全部分类
        $data['All']=$visaHelper->GetProSort('all');
        $this->Assign('data',$data);
        echo $this->GetView('visa_protype_index.php');
    }else{
        switch($this->Param['option']){
            case 'edit':

                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $data=$visaHelper->getProRow(array('`pro_id` = ?' =>$id));
                $category=$visaHelper->GetProSort('all');
                $this->Assign('id',$id);
                $this->Assign('category',$category);
                $this->Assign('data',$data);
                echo $this->GetView('visa_protype_edit.php');
                break;
            case 'submit':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $data['type_name'] = $this->Param['type_name'];
                $data['parent_id'] = $this->Param['parent_id'];
                $data['sort_order'] = $this->Param['sort_order'];
                $data['is_open'] = $this->Param['is_open'];

                $where['`pro_id` = ?'] = $id;
                if($id>0){
                    $visaHelper->ProUpdate($data,$where);
                    ErrorMsg::Debug('保存成功',TRUE);
                }else{
                    if($visaHelper->ProSave($data)){
                        ErrorMsg::Debug('保存成功',TRUE);
                    }
                }
                ErrorMsg::Debug('保存失败');
                break;
            case 'remove':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $visaHelper -> ProDelete(array('`pro_id` = ?'=>$id));

                ErrorMsg::Debug('删除成功',TRUE);
                break;
            default :
        }
    }