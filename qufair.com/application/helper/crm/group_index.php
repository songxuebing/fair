<?php
    $this->LoadHelper('group/GroupListHelper');
    $GroupListHelper=new GroupListHelper();
    $this->LoadHelper('group/GroupMenuHelper');
    $GroupMenuHelper=new GroupMenuHelper();
    if(empty($this->Param['option'])){
        $limit=10;
        $page=empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where=array();
        $where=array('`id` > ?'=>0);
        $data=$GroupListHelper->GetAllWhere($where,$page,$limit,$this->Param);
        $this->Assign('data',$data);
        echo $this->GetView('group_index.php');
    }else{
        switch($this->Param['option']){
            case 'edit':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $data=$GroupListHelper->GetId($id);
                $this->Assign('id',$id);
                $this->Assign('data',$data);
                
                echo $this->GetView('group_edit.php');
                break;
            case 'submit':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $data['name']=empty($this->Param['name']) ? ErrorMsg::Debug('请输入用户组名称') : $this->Param['name'];
                $data['abbreviation']=empty($this->Param['abbreviation']) ? ErrorMsg::Debug('请输入用户组简称') : $this->Param['abbreviation'];
                $data['key']=empty($this->Param['key']) ? ErrorMsg::Debug('请输入用户组唯一识别编码') : $this->Param['key'];
                if($id>0){
                    $GroupListHelper->Update($data,array('`id` = ?'=>$id));
                    //Cache::deldir();
                    ErrorMsg::Debug('保存成功',TRUE);
                }else{
                    if($GroupListHelper->Save($data)){
                        ErrorMsg::Debug('保存成功',TRUE);
                    }
                }
                ErrorMsg::Debug('保存失败');
                break;
            case 'remove':
                ErrorMsg::Debug('禁止删除');
                break;
            case 'role':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $group_row=$GroupListHelper->GetRow(array('`id` = ?'=>$id));
                $group_row['role']=unserialize($group_row['role']);
                $this->Assign('role',$group_row['role']);
                //读取所有权限
                $this->LoadHelper('purview/PurviewListHelper');
                $PurviewListHelper=new PurviewListHelper();
                $data=$PurviewListHelper->GetAll();
                $this->Assign('data',$data);
                $this->Assign('id',$id);
                echo $this->GetView('group_role.php');
                break;
            case 'role_submit':
                $role=$this->Param['role'];
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $GroupListHelper->Update(array('role'=>empty($role) ? '' : serialize($role)),array('`id` = ?'=>$id));
                //删除缓存
                Cache::deldir();
                ErrorMsg::Debug('保存成功',TRUE);
                break;
            case 'phonemenu':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                //读取当前组的MENU
                $group_row=$GroupListHelper->GetRow(array('`id` = ?'=>$id));
                $group_row_menu=$group_row['phone_menu'];
                if(!empty($group_row_menu)){
                    $group_row_menu=unserialize($group_row_menu);
                }else{
                    $group_row_menu=array();
                }
                $menu_select=array();
                foreach($group_row_menu as $k=>$v){
                    $menu_row=$GroupMenuHelper->GetMenuRow(array('`id` = ?'=>$v));
                    $menu_select[]=array(
                        'id'=>$v,
                        'name'=>$menu_row['name']
                    );
                }
                $this->Assign('menu_select',$menu_select);
                $where=array('`category` = ?'=>'PHONE','`id` NOT IN(?)'=>$group_row_menu);
                $group_menu=$GroupMenuHelper->GetMenuAll($where);
                $this->Assign('group_menu',$group_menu);
                $this->Assign('id',$id);
                echo $this->GetView('group_phonemenu.php');                
                break;
            case 'phonemenu_submit':
                $phone_menu=$this->Param['menu_select'];
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $GroupListHelper->Update(array('phone_menu'=>empty($phone_menu) ? '' : serialize($phone_menu)),array('`id` = ?'=>$id));
                //删除缓存
                Cache::deldir();
                ErrorMsg::Debug('保存成功',TRUE);                
                break;
            case 'crmmenu':
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                //读取当前组的MENU
                $group_row=$GroupListHelper->GetRow(array('`id` = ?'=>$id));
                $group_row_menu=$group_row['crm_menu'];
                if(!empty($group_row_menu)){
                    $group_row_menu=unserialize($group_row_menu);
                }else{
                    $group_row_menu=array();
                }
                $menu_select=array();
                foreach($group_row_menu as $k=>$v){
                    $menu_row=$GroupMenuHelper->GetMenuRow(array('`id` = ?'=>$v));
                    $menu_select[]=array(
                        'id'=>$v,
                        'name'=>$menu_row['name']
                    );
                }
                $this->Assign('menu_select',$menu_select);
                $where=array('`category` = ?'=>'crm','`id` NOT IN(?)'=>$group_row_menu);
                $group_menu=$GroupMenuHelper->GetMenuAll($where);
                $this->Assign('group_menu',$group_menu);
                $this->Assign('id',$id);
                echo $this->GetView('group_crmmenu.php');     
                break;
            case 'crmmenu_submit':
                $phone_menu=$this->Param['menu_select'];
                $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
                $GroupListHelper->Update(array('crm_menu'=>empty($phone_menu) ? '' : serialize($phone_menu)),array('`id` = ?'=>$id));
                //删除缓存
                Cache::deldir();
                ErrorMsg::Debug('保存成功',TRUE);                
                break;
            default :
        }
    }