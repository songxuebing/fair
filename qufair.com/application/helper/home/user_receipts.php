<?php
$this->LoadHelper('convention/ConventionHelper');
$ConventionHelper = new ConventionHelper();

$this->LoadHelper('route/RouteHelper');
$RouteHelper = new RouteHelper();

$this->LoadHelper('visa/VisaHelper');
$VisaHelper = new VisaHelper();

$this->LoadHelper('logistics/LogisticsHelper');
$LogisticsHelper = new LogisticsHelper();

$this->LoadHelper('decoration/DecorationHelper');
$DecorationHelper = new DecorationHelper();

$this->LoadHelper('order/OrderHelper');
$OrderHelper = new OrderHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('user/UserAddressHelper');
$UserAddressHelper = new UserAddressHelper();

$this->LoadHelper('pay/PayHelper');
$PayHelper = new PayHelper();

//获取用户信息
$UserInfo = $this->UserConfig;

if(empty($this->Param['option'])){
    echo $this->GetView('user_receipts.php');
}else{
    switch($this->Param['option']){
        case 'edit'://取消订单
            $id = empty($this->Param['id']) ? 0 : $this->Param['id'] ;
            $data = $OrderHelper->getReRow(array(
                '`order_id` = ?' => $id
            ));

            $this->Assign('data',$data);
            $this->Assign('id',$id);
            echo $this->GetView('user_receipts.php');
            break;
        case 'uploadImg':
            $this->LoadHelper('upload/EditorUploadHelper');
            $EditorUploadHelper = new EditorUploadHelper($this->UserConfig['Id']);
            $EditorUploadHelper->ImageUpload($this->Param['filebox']);
            break;
        case 'submit':

            $id = empty($this->Param['id']) ? 0 : $this->Param['id'] ;
            $re_id = empty($this->Param['re_id']) ? 0 : $this->Param['re_id'] ;
            $order_row = $OrderHelper->getRow(array(
                '`order_id` = ?' => $id
            ));

            if(empty($order_row)){
                ErrorMsg::Debug('订单已经被删除');
            }

            $data['cover'] = empty($this->Param['cover']) ? ErrorMsg::Debug('请上传付款明细图') : $this->Param['cover'];
            $data['user_com'] = empty($this->Param['user_com']) ? ErrorMsg::Debug('请填写付款单位') : $this->Param['user_com'];
            $data['user_bank'] = empty($this->Param['user_bank']) ? ErrorMsg::Debug('请填写付款账号') : $this->Param['user_bank'];
            $data['bank_name'] = empty($this->Param['bank_name']) ? ErrorMsg::Debug('请选择付款银行') : $this->Param['bank_name'];
            $data['money'] = empty($this->Param['money']) ? ErrorMsg::Debug('请填写付款金额') : $this->Param['money'];
            $data['remarks'] = $this->Param['remarks'];
            $data['member_id'] = $this->UserConfig['Id'];
            $data['order_sn'] = $order_row['order_sn'];
            $data['order_id'] = $id;
            $data['datetime'] = time();

            if($re_id > 0){
                $row = $OrderHelper->reUpdate($data,array(
                    '`id` = ?' => $re_id
                ));

                if($row){
                    ErrorMsg::Debug('编辑成功',true);
                }
                ErrorMsg::Debug('编辑失败');
            }else{
                $row = $OrderHelper->reSave($data);
                if($row){
                    ErrorMsg::Debug('提交成功！我们将尽快审核。',true);
                }
                ErrorMsg::Debug('提交失败');
            }


            break;

        default :
    }
}