<?php

$this->LoadHelper('article/ArticleHelper');
$ArticleHelper = new ArticleHelper();
if (empty($this->Param['option'])) {
    $limit = 10;

    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`article_id` > ?' => 0);
    if (!empty($this->Param['title'])) {
        $where['locate(?,`title`)>0'] = $this->Param['title'];
    }
    $data = $ArticleHelper->GetAllWhere($where, $limit, $page, $this->Param);
    if(!empty($data['All'])) foreach ($data['All'] as $k => $v) {
        $data['All'][$k]['cat_title'] = $ArticleHelper->GetCatRow($v['cat_id']);
    }

    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    echo $this->GetView('article_index.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            //获取一篇文章
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data = $ArticleHelper->GetId($id);

            //获取全部分类
            $dataCat = $ArticleHelper->GetCatSort('all');
            $this->Assign('dataCat', $dataCat);
            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('article_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data['title'] = $this->Param['title'];
            $data['cat_id'] = $this->Param['cat_id'];
            $data['author'] = $this->Param['author'];
            $data['author_email'] = $this->Param['author_email'];
            $data['clicks'] = $this->Param['clicks'];
            $data['is_open'] = $this->Param['RadioGroup'];
            $data['content'] = $this->Param['content'];
            $data['keywords'] = $this->Param['keywords'];
            $data['add_time'] = time();

            if ($id > 0) {
                $res = $ArticleHelper->Update($data, array('`article_id` = ?' => $id));
                if ($res) {
                    ErrorMsg::Debug('更新成功', TRUE);
                }
                ErrorMsg::Debug('更新失败');
            } else {
                $res = $ArticleHelper->save($data);
                if ($res) {
                    ErrorMsg::Debug('添加成功', TRUE);
                }
                ErrorMsg::Debug('添加失败');
            }
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $ArticleHelper->Delete(array('`article_id` = ?' => $id));

            ErrorMsg::Debug('删除成功', TRUE);
            break;
        case 'removeall':
            $allid = empty($this->Param['checkbox']) ? 0 : $this->Param['checkbox'];
            foreach ($allid as $v) {
                $ArticleHelper->Delete(array('`article_id` = ?' => $v));
            }
            ErrorMsg::Debug('删除成功', TRUE);
            break;
        default :
    }
}