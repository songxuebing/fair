<?php
$this->LoadHelper('adv/AdvHelper');
$AdvHelper = new AdvHelper();

if(empty($this->Param['option'])){
    
}else{
    switch ($this->Param['option']){
        case 'image':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $pos_row = $AdvHelper->posRow($id);
            if(empty($pos_row)){
                $script .= '';
            }else{
                //查找当前时间存在的广告位置
                $adv_row = $AdvHelper->advRow(array(
                    '`start_time` <= ?' => NOW_TIME,
                    '`end_time` >= ?' => NOW_TIME,
                    '`pos_id` = ?' => $id
                ));
                if(!empty($adv_row)){
                    $script .= "document.write('<a href=\"".$adv_row['url']."\" title=\"".$adv_row['title']."\" target=\"_blank\"><img src=\"".$adv_row['file']."\" alt=\"".$adv_row['title']."\" width=\"".$pos_row['width']."\" height=\"".$pos_row['height']."\"></a>');";
                }
            }
            echo $script;
            break;
        case 'banner':

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $pos_row = $AdvHelper->posRow($id);
            if(empty($pos_row)){
                $script .= '';
            }else{
                //查找当前时间存在的广告位置
                $adv_row = $AdvHelper->advAll(array(
                    '`start_time` <= ?' => NOW_TIME,
                    '`end_time` >= ?' => NOW_TIME,
                    '`pos_id` = ?' => $id
                ));
                if(!empty($adv_row)){
                    $script.='';
                    foreach($adv_row as $key => $val){
                        $script .= "document.write('<li style=\"background: url(".$val['file'].")\"><a href=\"".$val['url']."\" title=\"".$val['title']."\" target=\"_blank\"></a></li>');";
                    }
                }
            }
            echo $script;
            break;
    }
}
