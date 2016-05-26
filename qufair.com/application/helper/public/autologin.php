<?php
$this->LoadHelper('login/LoginHelper');
$LoginHelper = new LoginHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];
$id = empty($this->Param['id']) ? ErrorMsg::Debug('参数错误') : $this->Param['id'];
$con_id = $this->Param['con_id'];

$member_row = $MemberListHelper->GetMemberRow(array('`id` = ?' => $member_id));

$LoginHelper->adminFront($member_row['mobile'], $member_row['password'],4);

if(empty($this->Param['option'])){

    switch($this->Param['type']){
		case 'convention':
			$url = MERCHANT_URL.'/convention/list/option/edit/id/'.$id;
			header('Location:'.$url);
			die();
			break;	
		case 'route':
			$url = MERCHANT_URL.'/route/index/option/edit/id/'.$id.'/con_id/'.$con_id;
			header('Location:'.$url);
			die();
			break;
		case 'logistics':
			$url = MERCHANT_URL.'/logistics/add/id/'.$id;
			header('Location:'.$url);
			die();
			break;
		case 'decoration':
			$url = MERCHANT_URL.'/decoration/add/id/'.$id;
			header('Location:'.$url);
			die();
			break;
		case 'visa':
			$url = MERCHANT_URL.'/visa/add/id/'.$id;
			header('Location:'.$url);
			die();
			break;
	}
}else{
    
}