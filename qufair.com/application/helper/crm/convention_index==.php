<?php

$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('region/RegionHelper');
$RegionHelper =  new RegionHelper();
$delta = array("欧洲","亚洲","中东","东欧","北美","南美","中北美","非洲","大洋洲","中国");

$this->LoadHelper('industry/IndustryHelper');
$IndustryHelper = new IndustryHelper();

if (empty($this->Param['option'])) {
    $limit = 10;

    $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
    $where = array();
    $where = array('`update_dateline` = ?' => 0);
    if (!empty($this->Param['nametitle'])) {
        $where['locate(?,`name`)>0'] = $this->Param['nametitle'];
    }
    $data = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);
    $this->Assign('data', $data);
    $this->Assign('param', $this->Param);
    $this->Assign('search', '/convention/index/');
    echo $this->GetView('convention_index.php');
} else {
    switch ($this->Param['option']) {
        case 'import':
            echo $this->GetView('convention_import.php');
            break;
        case 'exceldetail':
            set_time_limit(0);
            /*
              if($_FILES['file']['type'] != 'application/vnd.ms-excel'){
              ErrorMsg::Debug('请选择EXCEL文件上传');
              }
             */
            $this->LoadHelper('upload/AttachHelper');
            $AttachHelper = new AttachHelper($this->UserConfig['Id'], 'excel_import');
            $excelRow = $AttachHelper->FileSubmit($_FILES['file'],FALSE);
            if (empty($excelRow['path'])) {
                ErrorMsg::Debug('上传失败');
            } else {
                //导入
                $this->LoadResurces('excelreader/reader');
                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('utf-8');
                $data->read(WEB_PATH . $excelRow['path']);
                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                    for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                        //echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                        $row[$i][$j] = $data->sheets[0]['cells'][$i][$j];
                    }
                    //echo "\n";
                }

                foreach ($row as $k => $v) {
                    if ($k == 1) {
                        continue;
                    }

                    if ($v[1] == '') {
                        continue;
                    }

                    $data = array(
                        'name' => trim($v[1]),
                        'regional' => $v[2],
                        'countries' => $v[3],
                        'city' => $v[4],
                        'industry' => $v[5],
                        'cycle' => $v[6],
                        'first_held' => $v[7],
                        'pavilion' => $v[8],
                        'area' => $v[9],
                        'exhibitors_number' => $v[10],
                        'audience_size' => $v[11],
                        'scope' => str_replace("'", '', $v[12]),
                        'label' => $v[13],
                        'organizer' => $v[14],
                        'describe' => $v[15],
                        'review' => $v[16],
                        'update_dateline' => 0
                    );

                    $ConventionHelper->save($data);
                }
            }
            ErrorMsg::Debug('导入成功', TRUE);
            break;
        case 'edit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $data = $ConventionHelper->GetId($id);

            if (!empty($data['imgurl'])) {
                $data['imgurl'] = unserialize($data['imgurl']);
            }
            //
            $this->Assign('delta',$delta);
            $industry = $IndustryHelper->groupIndustry();
            $this->Assign('industry',$industry);
            
            $this->Assign('id', $id);
            $this->Assign('data', $data);
            echo $this->GetView('convention_edit.php');
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $data['name'] = $this->Param['name'];
            $data['regional'] = $this->Param['regional'];
            $data['industry'] = $this->Param['industry'];
            $data['countries'] = $this->Param['countries'];
            $data['city'] = $this->Param['city'];
            $data['cycle'] = $this->Param['cycle'];
            $data['first_held'] = $this->Param['first_held'];
            $data['pavilion'] = $this->Param['pavilion'];
            $data['area'] = $this->Param['area'];
            $data['exhibitors_number'] = $this->Param['exhibitors_number'];
            $data['audience_size'] = $this->Param['audience_size'];
            $data['label'] = $this->Param['label'];
            $data['organizer'] = $this->Param['organizer'];
            $data['undertake'] = $this->Param['undertake'];
            $data['scope'] = $this->Param['scope'];
            $data['review'] = $this->Param['review'];
            $data['describe'] = $this->Param['describe'];

            $data['update_dateline'] = time();
            $data['cover'] = $this->Param['cover'];

            $imgurl2 = $this->Param['imgurl2'];
            $imgurl3 = $this->Param['imgurl3'];
            $imgurl4 = $this->Param['imgurl4'];

            $data['imgurl'] = serialize(array($imgurl2, $imgurl3, $imgurl4));

            if ($id > 0) {
                $ConventionHelper->Update($data, array('`id` = ?' => $id));
                //Cache::deldir();
                ErrorMsg::Debug('保存成功', TRUE);
            }

            ErrorMsg::Debug('保存失败');
            break;
        case 'remove':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

            $ConventionHelper->Delete(array('`id` = ?' => $id));

            ErrorMsg::Debug('删除成功', TRUE);
            break;
        case 'uploadImg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox']);

            break;
        case 'removeall':
            $allid = empty($this->Param['checkbox']) ? 0 : $this->Param['checkbox'];
            if(empty($allid)){
                ErrorMsg::Debug('请选择要删除的选项');
            }
            foreach ($allid as $v) {
                $ConventionHelper->Delete(array('`id` = ?' => $v));
            }

            ErrorMsg::Debug('删除成功', TRUE);
            break;
        case 'get_region':
            $name = empty($this->Param['name']) ? 0 : $this->Param['name'];
            $level = empty($this->Param['level']) ? 0 : $this->Param['level'];
            if($level == 0){
                $data = $RegionHelper->regionAll(array('`delta` = ?' => $name));
            }else{
                $row = $RegionHelper->regionRow(array(
                    '`name` = ?' => $name
                ));
                if(!empty($row)){
                    $data = $RegionHelper->regionAll(array('`parent_id` = ?' => $row['id']));
                }else{
                    $data = array();
                }
            }
            echo json_encode($data);
            break;
        default :
    }
}