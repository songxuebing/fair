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
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $KeywordHelper->keywordRemove($id);
            ErrorMsg::Debug('删除成功',TRUE);
            break;
    }
}