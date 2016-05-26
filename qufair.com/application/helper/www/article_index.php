<?php
    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();

    $this->LoadHelper('favorite/FavoriteHelper');
    $FavoriteHelper = new FavoriteHelper();

    $this->LoadHelper('order/OrderHelper');
    $OrderHelper = new OrderHelper();

    $this->LoadHelper('decoration/DecorationHelper');
    $DecorationHelper =  new DecorationHelper();

    $this->LoadHelper('member/MemberDetailHelper');
    $MemberDetailHelper =  new MemberDetailHelper();

    $this->LoadHelper('comment/CommentHelper');
    $CommentHelper = new CommentHelper();


    $this->LoadHelper('adv/AdvHelper');
    $AdvHelper = new AdvHelper();

    $id = 9;
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
                $script .= "<li style=\"background: url(".$val['file'].")\"><a href=\"".$val['url']."\" title=\"".$val['title']."\" target=\"_blank\"></a></li>'";
            }
        }
    }

    $this->Assign('script',$script);

    if(empty($this->Param['option'])){
        $id = empty($this->Param['id']) ? 1 : $this->Param['id'] ;
        $this->Assign('id',$id);
        echo $this->GetView('article_index.php');
    }else{

        
    }
