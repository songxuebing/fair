<?php

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('group/GroupListHelper');
$GroupListHelper=new GroupListHelper();

$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('industry/IndustryHelper');
$IndustryHelper = new IndustryHelper();

$this->LoadHelper('forum/ForumHelper');
$ForumHelper = new ForumHelper();

if (empty($this->Param['option'])) {
    $page = empty($this->Param['page']) ? 1 : $this->Param['page'];
    $limit = 10;
    $where = array(
        '`delete` = ?' => 0
    );
	
	if(!empty($this->Param['t'])){
		switch($this->Param['t']){
			case 'pt':
				$where['`group` = ?'] = 3;
				break;
			case 'sj':
				$where['`group` = ?'] = 4;
				break;	
		}	
	}
	
	
    $user_list = $MemberListHelper->MemberPageWhere($where, $limit, $page, $this->Param);
    if(!empty($user_list['All'])) foreach($user_list['All'] as $k=>$v){
        $group = $GroupListHelper->GetRow(array(
            '`id` = ?' => $v['group']
        ));
        $user_list['All'][$k]['groupname'] = $group['name'];
		/**
		$industry = $IndustryHelper->industryRow(array(
			'`id` = ?' => $v['industry_id']
		));
		
		$user_list['All'][$k]['industry_name'] = $industry['name'];
         * **/

        $tag = $MemberListHelper->tagMemberWhere(array(
            '`member_id` = ?' => $v['id'],
            '`mytag_id` <> ?' => 0,
            '`tag_name` <> ?' => ''
        ));
        $user_list['All'][$k]['tag'] = $tag;

    }
	
	//获取总数
	$user_list['number']['count'] = $MemberListHelper->GetOne(array(
		'`delete` = ?' => 0
	));
	
	$user_list['number']['pt'] = $MemberListHelper->GetOne(array(
		'`delete` = ?' => 0,
		'`group` = ?' => 3
	));
	
	$user_list['number']['sj'] = $MemberListHelper->GetOne(array(
		'`delete` = ?' => 0,
		'`group` = ?' => 4
	));
	
	
    $this->Assign('data', $user_list);
    echo $this->GetView('user_index.php');
} else {
    switch ($this->Param['option']) {
        case 'edit':
            $id=empty($this->Param['id']) ? 0 : $this->Param['id'];
            $where['`id` =?']=$id;
            $data=$MemberListHelper->GetMemberRow($where);
            $this->Assign('id',$id);
            $this->Assign('data',$data);
            
            //所有用户组
            $group=$GroupListHelper->GetAllWhere(array('`id` NOT IN(?)'=>array(0)));
            $this->Assign('group',$group);

            //标签
            $tagRow = $ForumHelper->cTagAll(array(
                '`is_open` = ?' =>1,
                '`is_delete` = ?' => 0
            ));

            if(!empty($tagRow)) foreach($tagRow as $key => $val){
                //选中标签
                $chkTag = $MemberListHelper->tagMemberRow(array(
                    '`member_id` = ?' => $id,
                    '`mytag_id` = ?' => $val['ctag_id']
                ));
                if(!empty($chkTag)){
                    $tagRow[$key]['chk'] = true;
                }else{
                    $tagRow[$key]['chk'] = false;
                }
            }



            $this->Assign('tag_all',$tagRow);
            
            echo $this->GetView('user_edit.php');            
            break;
        case 'submit':
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'];
            $username = empty($this->Param['username']) ? ErrorMsg::Debug('请输入用户名') : $this->Param['username'];
            $mobile = empty($this->Param['mobile']) ? ErrorMsg::Debug('请输入用户手机号') : $this->Param['mobile'];
            //$email = empty($this->Param['email']) ? ErrorMsg::Debug('请输入邮箱地址') : $this->Param['email'];
            $password = $id == 0 && empty($this->Param['password']) ? ErrorMsg::Debug('请输入用户密码') : $this->Param['password'];
           // $money = $this->Param['money'];
            $group = $this->Param['group'];
            if(!StringCode::IsMobile($mobile)){
                ErrorMsg::Debug('手机号错误');
            }
            $where = array(
                '`delete` = ?' => 0,
                '`mobile` = ?' => $mobile
            );
            if($id > 0){
                $where['`id` != ?'] = $id;
            }
            $check_member = $MemberDetailHelper->CheckMember($where);
            if ($check_member > 0) {
                ErrorMsg::Debug('该手机号已存在');
            }

            if($id == 0){
                $where['`id` != ?'] = $id;
                $where = array(
                    '`delete` = ?' => 0,
                    '`username` = ?' => $username
                );
                $check_member = $MemberDetailHelper->CheckMember($where);
                if ($check_member > 0) {
                    ErrorMsg::Debug('用户名已存在');
                }
            }
            
            $rnd_code = StringCode::RandomCode(6);
            $data = array(
                'group' => $group,
                'mobile' => $mobile,
            );
            if(!empty($password)){
                $data['password'] = md5(md5($password) . $rnd_code);
                $data['salt'] = $rnd_code;
            }
			
			$data['rating_number'] = $this->Param['rating_number'];

            $tagAll = $this->Param['tag'];

            if($id > 0){
                $row = $MemberDetailHelper->Update($data,$id);

                if(!empty($tagAll)){
                    $r = $MemberListHelper->tagRemove(array(
                        '`member_id` = ?' => $id
                    ));
                    foreach($tagAll as $k => $v){
                        $fTagRow = $ForumHelper->cTagRow(array(
                            '`ctag_id` = ?' => $v
                        ));
                        if(!empty($fTagRow)){
                            $MemberListHelper->tagMemberSave(array(
                                'member_id' => $id,
                                'mytag_id' => $v,
                                'tag_name' => $fTagRow['ctag_name']
                            ));
                        }

                    }
                }

                ErrorMsg::Debug('保存成功', TRUE);
            }else{
                $data['username'] = $username;
				$data['datetime'] = time();
				
                $id = $MemberDetailHelper->Save($data, TRUE);
                if ($id) {
                    $MemberDetailHelper->DetailSave(array(
                        'id' => $id,
                        'avatar' => '/attach/image/avatar/default_avatar.png'
                    ),TRUE);

                    if(!empty($tagAll)){
                        $r = $MemberListHelper->tagRemove(array(
                            '`member_id` = ?' => $id
                        ));
                        foreach($tagAll as $k => $v){
                            $fTagRow = $ForumHelper->cTagRow(array(
                                '`ctag_id` = ?' => $v
                            ));
                            if(!empty($fTagRow)){
                                $MemberListHelper->tagMemberSave(array(
                                    'member_id' => $id,
                                    'mytag_id' => $v,
                                    'tag_name' => $fTagRow['ctag_name']
                                ));
                            }

                        }
                    }

                    ErrorMsg::Debug('保存成功', TRUE);
                }
            }
            ErrorMsg::Debug('保存失败');

            break;
        case 'remove':
            $id = empty($this->Param['id']) ? ErrorMsg::Debug('参数错误') : $this->Param['id'];
            $MemberDetailHelper->Update(array('delete' => 1),$id);
            ErrorMsg::Debug('删除成功', TRUE);
            break;
        default :
    }
}