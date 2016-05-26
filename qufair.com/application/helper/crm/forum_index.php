<?php

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

if (empty($this->Param['option'])) {
    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $list = $this->Param['list'];
    $where = array('`delete` = ?' =>0);
    switch($list){
        case 'yes':            
            $where['`is_show` = ?'] = 1;
            break;
        case 'no':
            $where['`is_show` = ?'] = 0;
            break;
        default :
    }
    
    
    $data = $ForumHelper->forumPageList($where,$limit,$page,$this->Param); 
    $this->Assign('data', $data);
    
    $this->Assign('param', $this->Param);
    echo $this->GetView('forum_index.php');
} else {
    switch ($this->Param['option']) {
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $do = $ForumHelper->forumSave(array(
                'delete' => 1
            ),array(
                '`id` = ?' => $id
            ));
            if($do){
                ErrorMsg::Debug('删除成功',TRUE);
            }
            ErrorMsg::Debug('删除失败');
            break;
        case 'upopt':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $forum_row = $ForumHelper->forumRow(array(
                '`id` = ?' => $id
            ));
            if(empty($forum_row)){
                ErrorMsg::Debug('不存在当前信息');
            }else{
                $data = array(
                    'is_show' => $forum_row['is_show'] == 1 ? 0 : 1
                );
                $do = $ForumHelper->forumSave($data,array(
                    '`id` = ?' => $id
                ));
                if($do){
                    ErrorMsg::Debug('操作成功',TRUE);
                }
                ErrorMsg::Debug('操作失败');
            }
            break;
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $forum_row = $ForumHelper->forumRow(array(
                '`id` = ?' => $id
            ));
            //分类
            $cat_all = $ForumHelper->groupCat();
            $this->Assign('cat_all',$cat_all);
            //标签
            $tagRow = $ForumHelper->cTagAll(array(
                '`is_open` = ?' =>1,
                '`is_delete` = ?' => 0
            ));

            if(!empty($tagRow)) foreach($tagRow as $key => $val){
                //选中标签
                $chkTag = $ForumHelper->indexRow(array(
                    '`forum_id` = ?' => $id,
                    '`ctag_id` = ?' => $val['ctag_id']
                ));

                if(!empty($chkTag)){
                    $tagRow[$key]['chk'] = true;
                }else{
                    $tagRow[$key]['chk'] = false;
                }
            }

            $this->Assign('tag_all',$tagRow);
            $this->Assign('data',$forum_row);
            $this->Assign('id',$id);
            echo $this->GetView('forum_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入资讯标题') : $this->Param['title'];
            //$data['cat_id'] = empty($this->Param['cat_id']) ? ErrorMsg::Debug('请选择所属版块') : $this->Param['cat_id'];
            $data['content'] = empty($this->Param['content']) ? ErrorMsg::Debug('请输入资讯内容') : $this->Param['content'];
            $data['cover'] = $this->Param['file'];
			//$data['dateline'] = time();
			//$data['member_id'] = $this->UserConfig['Id'];
            $data['recommend'] = empty($this->Param['recommend']) ? 0 : 1;
            $tag = $this->Param['tag'];

            if($id > 0){//编辑文章
                $ForumHelper->forumSave($data,$id);

                $ForumHelper->indexRemove(array(
                    '`forum_id` = ?' =>$id
                ));

                if(!empty($tag)) foreach($tag as $key => $val){
                    $ForumHelper->indexSave(array(
                        'forum_id' => $id,
                        'ctag_id' => $val
                    ));
                }

            }else{//保存文章
				$forumid = $ForumHelper->forumSave($data);

                if(!empty($tag)) foreach($tag as $key => $val){
                    $ForumHelper->indexSave(array(
                        'forum_id' => $forumid,
                        'ctag_id' => $val
                    ));
                }

			}
            ErrorMsg::Debug('保存成功',TRUE);
            break;
        case 'uploadimg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'],'forum');
            break;
        default :
    }
}
