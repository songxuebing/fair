<?php
    $this->LoadHelper('member/MemberListHelper');
    $MemberListHelper=new MemberListHelper();
    
    $this->LoadHelper('member/MemberDetailHelper');
    $MemberDetailHelper=new MemberDetailHelper();    
    if(empty($this->Param['option'])){
        //读取个人资料
        $MemberDetail=$MemberListHelper->GetMemberRow(array('`username` = ?'=>$this->UserConfig['Name'],'`delete` = ?'=>0));
        $this->Assign('data',$MemberDetail);
        echo $this->GetView('account_edit.php');
    }else{
        if(!empty($this->Param['password'])){
            $rnd=StringCode::RandomCode(6);
            $MemberData=array(
                'salt'=>$rnd,
                'password'=>md5(md5($this->Param['password']).$rnd)
            );
        }
        $MemberData['mobile']=$this->Param['mobile'];
        $MemberData['email']=$this->Param['email'];
        $MemberDetailHelper->Update($MemberData,array('`username` = ?'=>$this->UserConfig['Name'],'`delete` = ?'=>0));   
        Cache::Set('member','detail',NOW_TIME,0);
        Cache::Delete('id_'.$this->UserConfig['Id']);
        ErrorMsg::Debug('保存成功',true);
        
    }
    