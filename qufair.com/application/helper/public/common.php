<?php
if(empty($this->Param['option'])){
    
}else{
    switch($this->Param['option']){
        case 'sendsms':
            $mobile = empty($this->Param['mobile']) ? ErrorMsg::Debug('请输入手机号') : $this->Param['mobile']; 
            if(!StringCode::IsMobile($mobile)){
                ErrorMsg::Debug('手机号错误');
            }
            $this->LoadResurces('sms/class.sms');
            $SMS=include CONFIG_PATH.'/Sms.php';
            $rest = new REST($SMS['serverip'],$SMS['port'],$SMS['ver']);
            $rest->setAccount($SMS['accountsid'],$SMS['accounttoken']);
            $rest->setAppId($SMS['appid']);
            $rnd = StringCode::RandomCode(6,'num');
            $_SESSION['mobile'] = $mobile;
            $_SESSION['rnd_code'] = $rnd;
            $result = $rest->sendTemplateSMS($mobile,array($rnd),32782);
            if($result == NULL ) {
                ErrorMsg::Debug("result error!");
                break;
            }
            if($result->statusCode!=0) {
                ErrorMsg::Debug($result->statusMsg);
            }else{
                ErrorMsg::Debug('发送成功',TRUE);
            }
            break;
        case 'commentsave':
            $this->LoadHelper('comment/CommentHelper');
            $CommentHelper = new CommentHelper();
            
            $userInfo = $this->UserConfig;
            if(empty($userInfo['Id'])){
                ErrorMsg::Debug('请登陆后评价');
            }
            $data['eva_number'] = $this->Param['eva_number'];
            $data['service_number'] = $this->Param['service_number'];
            $data['sentiment_number'] = $this->Param['sentiment_number'];
            $data['message'] = $this->Param['message'];
            $data['is_type'] = $this->Param['is_type'];
            $data['member_id'] = $userInfo['Id'];
            $data['con_id'] = $this->Param['con_id'];
            $data['add_time'] = time();

            if(empty($this->Param['message'])){
                ErrorMsg::Debug('内容不能为空');
            }

            $res = $CommentHelper->commentSave($data);
            if($res){
                ErrorMsg::Debug('评论成功',true);
            }

            ErrorMsg::Debug('评论失败');
            break;
        case 'praise':
            $this->LoadHelper('comment/CommentHelper');
            $CommentHelper = new CommentHelper();
            
            $comment_id = empty($this->Param['comment_id']) ? 0 : $this->Param['comment_id'];
            if(empty($this->UserConfig['Id'])){
                ErrorMsg::Debug('请登陆后点赞');
            }
            $params = array(
                'comment_id' => $comment_id,
                'member_id' => $this->UserConfig['Id']
            );
            $result = $CommentHelper->praiseAct($params);
            echo json_encode(array(
                'success' => true,
                'count' => $result
            ));
            break;
        case 'favorite':
            $this->LoadHelper('favorite/FavoriteHelper');
            $FavoriteHelper = new FavoriteHelper();
            
            $sort = empty($this->Param['sort']) ? ErrorMsg::Debug('参数错误') : $this->Param['sort'];
            $related_id = empty($this->Param['related_id']) ? ErrorMsg::Debug('参数错误') : $this->Param['related_id'];
            if(empty($this->UserConfig['Id'])){
                ErrorMsg::Debug('请登陆后关注');
            }
            $params = array(
                'sort' => $sort,
                'member_id' => $this->UserConfig['Id'],
                'related_id' => $related_id
            );
            $result = $FavoriteHelper->favoriteAct($params);
            echo json_encode(array(
                'success' => true,
                'count' => $result
            ));
            break;
        case 'contract':
            /*if(empty($this->UserConfig['Id'])){
                ErrorMsg::Debug('请登陆后操作');
            }*/
            $sn = empty($this->Param['sn']) ? 0 : $this->Param['sn'];
            $where = array(
                '`order_sn` = ?' => $sn
                //'`seller_id` = ? OR `member_id` = ?' => $this->UserConfig['Id']
            );
            $this->LoadHelper('order/OrderHelper');
            $OrderHelper =  new OrderHelper();
            
            $this->LoadHelper('member/MemberDetailHelper');
            $MemberDetailHelper = new MemberDetailHelper();

            $this->LoadHelper('member/MemberListHelper');
            $MemberListHelper = new MemberListHelper();
            
            $order_row = $OrderHelper->getRow($where);
            if(empty($order_row)){
                ErrorMsg::Debug('未找到订单或您无权操作');
            }
            
            $data = array();
            $salerList = $MemberListHelper->GetMemberRow(array(
                '`id` = ?' => $order_row['seller_id']
            ));
            $saler = $MemberDetailHelper->GetId($order_row['seller_id']);
            if(!empty($salerList['mobile'])){
                $data['saler_name'] = $salerList['username'];
                $data['saler_tel'] = $salerList['mobile'];
            }else{
                $data['saler_name'] = empty($saler['company']) ? $saler['username'] : $saler['company'];
                $data['saler_tel'] = $saler['mobile'];
            }
            $data['saler_fax'] = $saler['fax'];
            $data['saler_add'] = $saler['address'];

            $buyerList = $MemberListHelper->GetMemberRow(array(
                '`id` = ?' => $order_row['member_id']
            ));
            $buyer = $MemberDetailHelper->GetId($order_row['member_id']);
            if(!empty($buyerList['mobile'])){
                $data['buyer_name'] = $buyerList['username'];
                $data['buyer_tel'] = $buyerList['mobile'];
            }else{
                $data['buyer_name'] = empty($buyer['company']) ? $buyer['username'] : $buyer['company'];
                $data['buyer_tel'] = $buyer['telephone'];
            }
            $data['buyer_fax'] = $buyer['fax'];
            $data['buyer_add'] = $saler['address'];
            
            $template = file_get_contents(DATA_PATH."/tmp/".$order_row['is_type'].".html");
            $info = $OrderHelper->shuntOrder($order_row);
			
            switch($order_row['is_type']){
                case 'convention':
                    //替换相关参数
                    $data['start_year'] = date('Y',$info['detail']['detail']['con_detail']['start_time']);
                    $data['title'] = $info['detail']['con_name'];
                    $data['start_time'] = date('Y年m月d日',$info['detail']['detail']['con_detail']['start_time']);
                    $data['end_time'] = date('m月d日',$info['detail']['detail']['con_detail']['end_titme']);
                    $data['money'] = $order_row['price'];
                    $data['city'] = $info['detail']['detail']['con_detail']['con_detail']['country'] . $info['detail']['detail']['con_detail']['con_detail']['city'];
                    $data['industry'] = $info['detail']['detail']['con_detail']['con_detail']['industry'];
                    $data['advance'] = empty($order_row['advance']) ? '0' : $order_row['advance'];
					$balance = $order_row['price'] - $order_row['advance'];
                    $data['balance'] = empty($balance) ? '0' : $balance;
                    break;
                case 'route':
                    $this->LoadHelper('route/RouteHelper');
                    $RouteHelper =  new RouteHelper();
                    $this->LoadHelper('convention/ConventionHelper');
                    $ConventionHelper =  new ConventionHelper();
                    $route_row = $RouteHelper->routeRow($info['route_order']['route_id']);
                    $conven_row = $ConventionHelper->GetId($route_row['con_id']);
                    $data['start_time'] = date('Y年m月d日',$order_row['leave_time']);
                    $data['end_time'] = date('Y年m月d日',$order_row['end_time']);
                    $data['city'] = $conven_row['country'] . $conven_row['city'];
                    $data['title'] = $conven_row['name'];
                    break;
                case 'visa':
                    $this->LoadHelper('visa/VisaHelper');
                    $VisaHelper = new VisaHelper();
                    $data['num'] = $info['visa_order']['num'];
                    $person = $VisaHelper->getVisaMemberList(array('`id` = ?' => $info['visa_order']['id']), 100, 1, $this->Param);
                    $srt = '';
                    if(!empty($person)){
                        foreach($person as $k=>$v){
                            $str .= $v['username'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$v['cert_type'].'：'.$v['cert_msg'];
                        }
                    }
                    $data['person'] = $str;
                    $data['price'] = $info['visa_order']['visa_price'];
                    $data['money'] = $info['visa_order']['money'];
                    break;
                case 'logistics':
                    $data['money'] = $order_row['price'];
                    break;
                case 'decoration':
                    break;
            }
            foreach($data as $k=>$v){
                $template = str_replace('{'.$k.'}', $v, $template);
            }
			
            $this->LoadResurces('pdf/tcpdf');
            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false); 
            // 设置文档信息 
            $pdf->SetCreator('qufair'); 
            $pdf->SetAuthor('qufair'); 
            $pdf->SetTitle('qufair.com'); 
            // 设置默认等宽字体 
            $pdf->SetDefaultMonospacedFont('courier'); 

            // 设置间距 
            $pdf->SetMargins(15, 27, 15); 
            $pdf->SetHeaderMargin(5); 
            $pdf->SetFooterMargin(10); 

            // 设置分页 
            $pdf->SetAutoPageBreak(TRUE, 25); 

            // set image scale factor 
            $pdf->setImageScale(1.25); 

            // set default font subsetting mode 
            $pdf->setFontSubsetting(true); 

            //设置字体 
            $pdf->SetFont('stsongstdlight', '', 14); 

            $pdf->AddPage(); 

            $pdf->writeHTML($template, true, 0, true, true); 

            //输出PDF 
            $pdf->Output('ht.pdf', 'I');
            break;
        default :
    }
}