<?php
    $this->LoadHelper('group/GroupListHelper');
    $GroupListHelper=new GroupListHelper();
    $this->LoadHelper('group/GroupMenuHelper');
    $GroupMenuHelper=new GroupMenuHelper();    
    $GroupRow=$GroupListHelper->GetId($this->UserConfig['Group']); 
    
    $MyRole=empty($GroupRow['crm_menu'])? array(): unserialize($GroupRow['crm_menu']);
    $b_menu=array();
    foreach($MyRole as $k=>$v){
        $menu_row=$GroupMenuHelper->GetMenuRow(array('`id` = ?'=>$v));
        $b_menu[]=$menu_row;
    }
    
    $this->Assign('menu',$b_menu);
    echo $this->GetView('top.php');