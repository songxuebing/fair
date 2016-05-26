<?php
if (empty($this->UserConfig['Id'])) {
    header('Location:/auth/login/');
    die();
}else{
    
    $this->LoadHelper('supplier/SupplierHelper');
    $SupplierHelper = new SupplierHelper();
    
    $this->LoadHelper('member/MemberAvatarHelper');
    $MemberAvatarHelper = new MemberAvatarHelper();
    $memberRow = $MemberAvatarHelper->GetId($this->UserConfig['Id']);
    $this->Assign('menberInfo',$memberRow);
    //获取认证统计
    $cert_count = $SupplierHelper->certCount(array(
        '`member_id` = ?' => $this->UserConfig['Id'],
        '`cert_state` = ?' => 2
    ));
    $this->Assign('cert_count',$cert_count);
    //获取认证权限(后期在memcache)
    $type_check = $SupplierHelper->checkCertAll($this->UserConfig['Id']);
    $this->Assign('supplier_purview',$type_check);
    $money_check = 0;
    if(!empty($type_check)) foreach($type_check as $k=>$v){
        if($v['cert']['money_check'] == 1){
            $money_check = 1;
            break;
        }
    }
    $this->Assign('money_check',$money_check);
    
    switch($this->Controller){
        case 'convention':
            $code = 'S001';
            break;
        case 'route':
            $code = 'S002';
            break;
        case 'visa':
            $code = 'S003';
            break;
        case 'logistics':
            $code = 'S004';
            break;
        case 'decoration':
            $code = 'S005';
            break;
        default :
            $code = '';
    }
    if(!empty($code) && $type_check[$code]['cert']['cert_state'] != 2){
        header('Location:/cert/index/');
    }
}
$delta = array("欧洲","亚洲","中东","东欧","北美","南美","中北美","非洲","大洋洲","中国");
$this->Assign('delta',$delta);