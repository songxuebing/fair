<?php

$this->LoadHelper('keyword/KeywordHelper');
$KeywordHelper = new KeywordHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    
    $data = $KeywordHelper->keywordPageList($where,$limit,$page,$this->Param); 
	
    $this->Assign('data', $data);
    
    $this->Assign('param', $this->Param);
    echo $this->GetView('keyword_index.php');
} else {
    switch ($this->Param['option']){
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);
            $data = $KeywordHelper->keywordRow($id);
            $this->Assign('data',$data);
            echo $this->GetView('keyword_edit.php');
            break;

        case 'hot_index':
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();

            $data = $KeywordHelper->hot_PageList($where,$limit,$page,$this->Param);

            $this->Assign('data', $data);

            $this->Assign('param', $this->Param);
            echo $this->GetView('hot_index.php');
            break;

        case 'hot_edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);
            $data = $KeywordHelper->hot_Row($id);
            //var_dump($data);exit();
            $this->Assign('data',$data);

            echo $this->GetView('hot_edit.php');
            break;

        case 'hot_submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入热门') : $this->Param['title'];
            $data['url'] = empty($this->Param['url']) ? ErrorMsg::Debug('请输入链接url') : $this->Param['url'];
            $data['type'] = $this->Param['type'];
            $data['sort'] = $this->Param['sort'];
            $data['update_time'] = NOW_TIME;
            if($id > 0){
                $KeywordHelper->hot_Save($data,$id);
            }else{
                $KeywordHelper->hot_Save($data);
            }
            ErrorMsg::Debug('保存成功',TRUE);
            break;

        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['keyword'] = empty($this->Param['keyword']) ? ErrorMsg::Debug('请输入关键词') : $this->Param['keyword'];
			$data['sort'] = $this->Param['sort'];
			
            if($id > 0){
                $KeywordHelper->keywordSave($data,$id);
            }else{
                $KeywordHelper->keywordSave($data);
            }
            ErrorMsg::Debug('保存成功',TRUE);
            break;

        case 'remove_hot':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $KeywordHelper->hot_Remove($id);
            ErrorMsg::Debug('删除成功',TRUE);
            break;

        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $KeywordHelper->keywordRemove($id);
            ErrorMsg::Debug('删除成功',TRUE);
            break;

        //首页行程大图指定
        case 'route_index':
            $limit = 10;
            $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
            $where = array();

            $data = $KeywordHelper->route_PageList($where,$limit,$page,$this->Param);

            $this->Assign('data', $data);

            $this->Assign('param', $this->Param);
            echo $this->GetView('route_index.php');
            break;

        case 'route_edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $this->Assign('id',$id);
            $data = $KeywordHelper->route_Row($id);
            //var_dump($data);exit();
            $this->Assign('data',$data);

            echo $this->GetView('route_edit.php');
            break;

        case 'route_submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            //echo $id;exit();
            $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入热门') : $this->Param['title'];
            $data['url'] = empty($this->Param['url']) ? ErrorMsg::Debug('请输入链接url') : $this->Param['url'];

            if($id > 0){
                echo "1";exit();
                $KeywordHelper->route_Save($data,$id);
            }else{
                echo "0";exit();
                $KeywordHelper->route_Save($data);
            }
            ErrorMsg::Debug('保存成功',TRUE);
            break;

    }
}