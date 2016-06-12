<?php
$this->LoadHelper('adv/AdvHelper');
$AdvHelper = new AdvHelper();

if (empty($this->Param['option'])) {

    $limit = 10;
    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`id` > ?' => 0);

    $data = $AdvHelper->advPageList($where,$limit,$page,$this->Param);
    if(!empty($data['All'])) foreach($data['All'] as $k=>$v){
        $pos_row = $AdvHelper->posRow($v['pos_id']);
        $data['All'][$k]['posname'] = $pos_row['name'];
    }
    $this->Assign('data', $data);
    //输出所有广告位置
    $pos = $AdvHelper->posAll(array(
        '`id` > ?' => 0
    ));
    $this->Assign('pos',$pos);
    $this->Assign('param', $this->Param);
    echo $this->GetView('adv_index.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data = $AdvHelper->advRow($id);
            $this->Assign('id', $id);
            $this->Assign('data', $data);
            //输出所有广告位置
            $pos = $AdvHelper->posAll(array(
                '`id` > ?' => 0
            ));
            $this->Assign('pos',$pos);
            echo $this->GetView('adv_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入广告名称') : $this->Param['title'];
            $data['pos_id'] = empty($this->Param['pos_id']) ? ErrorMsg::Debug('请选择广告位置') : $this->Param['pos_id'];
            $data['media_type'] = 'image';
            $data['start_time'] = empty($this->Param['start_time']) ? ErrorMsg::Debug('请输入广告开始时间') : strtotime($this->Param['start_time']);
            $data['end_time'] = empty($this->Param['end_time']) ? ErrorMsg::Debug('请输入广告结束时间') : strtotime($this->Param['end_time']);
            $data['url'] = $this->Param['url'];       
            $data['file'] = empty($this->Param['file']) ? ErrorMsg::Debug('请输入广告地址') : $this->Param['file'];
            if($id == 0){
                $data['dateline'] = NOW_TIME;
            }
            $AdvHelper->advSave($data,$id);
            ErrorMsg::Debug('保存成功', TRUE);
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
         
            $AdvHelper->advRemove($id);
            ErrorMsg::Debug('删除成功', TRUE);
            break;
        case 'uploadimg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox'],'adv');
            break;
        default :
    }
}