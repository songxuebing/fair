<?php
    //根据自己的权限显示内容
    $this->LoadHelper('group/GroupListHelper');
    $GroupListHelper=new GroupListHelper();
    $this->LoadHelper('purview/PurviewListHelper');
    $PurviewListHelper=new PurviewListHelper();  
    $group_row=$GroupListHelper->GetRow(array('`id` = ?'=>$this->UserConfig['Group']));
    $group_row=empty($group_row) ? array() : unserialize($group_row['role']);
    
    $menu=$PurviewListHelper->GetMenu($group_row,'crm','','');
    $menu=empty($menu) ? array() : reset($menu);
    $this->Assign('menu',$menu);
    echo $this->GetView('left.php');