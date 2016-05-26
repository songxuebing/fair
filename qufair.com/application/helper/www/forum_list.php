<?php
    $this->LoadHelper('convention/ConventionHelper');
    $ConventionHelper = new ConventionHelper();
    
    $this->LoadHelper('forum/ForumHelper');
    $ForumHelper = new ForumHelper();
    
    $this->LoadHelper('adv/AdvHelper');
    $AdvHelper =  new AdvHelper();
    
    if(empty($this->Param['option'])){
        $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
        $key = $this->Param['key'];
        $limit = 10;
        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        //智能推荐展会商
        $intelligent = $ConventionHelper->queryDetail('SELECT * FROM `dyhl_convention_detail` WHERE `is_delete` = 0 GROUP BY con_id ORDER BY RAND() LIMIT 15');
        if(!empty($intelligent)) foreach($intelligent as $k=>$v){
            $conven = $ConventionHelper->getRow(array(
                '`id` = ?' => $v['con_id']
            ));
            $intelligent[$k]['cover'] = $conven['cover'];
            $intelligent[$k]['name'] = StringCode::GetCsubStr($conven['name'],0,7);
            $intelligent[$k]['pavilion'] = empty($conven['pavilion']) ? '&nbsp;' : StringCode::GetCsubStr($conven['pavilion'],0,10);
        }
        $rand_num = ceil(count($intelligent)/5);
        $this->Assign('rand_num',$rand_num);
        $this->Assign('intelligent',$intelligent);
        //
        $cat_row = $ForumHelper->catRow($id);
        $this->Assign('cat_row',$cat_row);
        //
        if(!empty($key)){
            $where = array(
                '`delete` = ?' => 0
            );
        }else{
            $where = array(
                '`cat_id` = ?' => $id,
                '`delete` = ?' => 0
            );
        }
        $data = $ForumHelper->forumPageList($where, $limit, $page, $this->Param);
        $this->Assign('data',$data);
        //调取大家都在看
        $clicks_where = array('`delete` = ?' => 0,'`cover` <> ?' => '');
        if(empty($key)){
            $clicks_where['`cat_id` = ?'] = $id;
        }
        $clicks_list = $ForumHelper->forumPageList($clicks_where, 3, 1 ,array(),array('clicks desc'));
        $this->Assign('clicks_list',$clicks_list);
        
        $this->Assign('key',$key);
        echo $this->GetView('fourm_list.php');
    }else{

        
    }
