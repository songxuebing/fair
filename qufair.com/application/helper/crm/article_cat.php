<?php
    $this->LoadHelper('article/ArticleHelper');
    $ArticleHelper=new ArticleHelper();
    if(empty($this->Param['option'])){
        //获取全部分类
        $data['All']=$ArticleHelper->GetCatSort('all');
        $this->Assign('data',$data);
        echo $this->GetView('article_cat_index.php');
    }else{
        switch($this->Param['option']){
            case 'edit':

                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $data=$ArticleHelper->GetCatRow($id);
                $category=$ArticleHelper->GetCatSort('all');
                $this->Assign('id',$id);
                $this->Assign('category',$category);
                $this->Assign('data',$data);
                echo $this->GetView('article_cat_edit.php');
                break;
            case 'submit':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $data['cat_name'] = $this->Param['cat_name'];
                $data['parent_id'] = $this->Param['parent_id'];
                $data['sort_order'] = $this->Param['sort_order'];
                $data['is_open'] = $this->Param['is_open'];

                $where['`cat_id` = ?'] = $id;
                if($id>0){
                    $ArticleHelper->CatUpdate($data,$where);
                    ErrorMsg::Debug('保存成功',TRUE);
                }else{
                    if($ArticleHelper->CatSave($data)){
                        ErrorMsg::Debug('保存成功',TRUE);
                    }
                }
                ErrorMsg::Debug('保存失败');
                break;
            case 'remove':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];

                $ArticleHelper -> CatRemove(array('`cat_id` = ?'=>$id));

                ErrorMsg::Debug('删除成功',TRUE);
                break;
            default :
        }
    }