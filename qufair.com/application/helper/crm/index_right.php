<?php
    $this->UserConfig['category']='crm';
    
    //根据自己的权限显示内容
    $this->LoadHelper('group/GroupListHelper');
    $GroupListHelper=new GroupListHelper();
    $this->LoadHelper('purview/PurviewListHelper');
    $PurviewListHelper=new PurviewListHelper();  
    $group_row=$GroupListHelper->GetRow(array('`id` = ?'=>$this->UserConfig['Group']));
    $group_row=empty($group_row) ? array() : unserialize($group_row['role']);
    
    $menu=$PurviewListHelper->GetMenu($group_row,'crm','','');
    $menu=empty($menu) ? array() : reset($menu);
    $menu=$menu['list'];
    if(!empty($menu)) foreach($menu as $k=>$v){
        foreach($v['list']as $key=>$val){
            $my_menu[]=array(
                'name'=>$val['name'],
                'link'=>'/'.$v['code'].'/'.$val['code']
            );
        }
    }
    
    $this->Assign('my_menu',$my_menu);
    
    echo $this->GetView('right.php');