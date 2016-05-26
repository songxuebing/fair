<?php

$this->LoadHelper('comment/CommentHelper');
$CommentHelper = new CommentHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`delete` = ?' => 0);
    $data = $CommentHelper->getAllComment($where,$limit,$page,$this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $trans = $CommentHelper->transComment($v);
       $data['All'][$k]['type_text'] = $trans['text'];
    }
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('comment_index.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data = $CommentHelper->commentRow($id);
            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('comment_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data['message'] = empty($this->Param['message']) ? ErrorMsg::Debug('请输入评论内容') : $this->Param['message'];            
            $CommentHelper->commentSave($data, array('`eva_id` = ?' => $id));
            ErrorMsg::Debug('保存成功', TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data['delete'] = 1;            
            $CommentHelper->commentSave($data, array('`eva_id` = ?' => $id));
            ErrorMsg::Debug('删除成功', TRUE);
            break;
        case 'removeall':
            $allid = empty($this->Param['checkbox']) ? ErrorMsg::Debug('请选择要删除的选项') : $this->Param['checkbox'];
            foreach ($allid as $v) {
                $CommentHelper->commentSave(array('delete' => 1), array('`eva_id` = ?' => $v));
            }
            ErrorMsg::Debug('删除成功', TRUE);
            break;
        default :
    }
}