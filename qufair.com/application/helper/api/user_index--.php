<?php
$this->LoadHelper('member/MemberListHelper');
$MemberListHelper = new MemberListHelper();

$this->LoadHelper('member/MemberDetailHelper');
$MemberDetailHelper = new MemberDetailHelper();

$this->LoadHelper('user/UserAddressHelper');
$UserAddressHelper = new UserAddressHelper();

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

$this->LoadHelper('pay/PayHelper');
$PayHelper = new PayHelper();

$this->LoadHelper('favorite/FavoriteHelper');
$FavoriteHelper = new FavoriteHelper();

if(empty($this->Param['option'])){
    /**
     * APP 个人资料接口文档
     * @param member_id 当前用户id
	*  @param sort 1展会 2商家展区 3行程 4 签证 5 物流 6 特装 7资讯
     ***/

    //获取详细信息
    $menberInfo = $MemberDetailHelper->GetMember($this->Param['member_id']);
	
	$sort = empty($this->Param['sort']) ? 1 : $this->Param['sort'] ;

    $memberRow = $MemberListHelper->GetMemberRow(array('`id` = ?' => $this->Param['member_id']));
    $number = 0;
    if(!empty($menberInfo['mobile'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['address'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['company'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['avatar'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['sex'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['province'])){
        $number= $number+12.5;
    }
    if(!empty($menberInfo['city'])){
        $number= $number+12.5;
    }

    if(!empty($menberInfo['area'])){
        $number= $number+12.5;
    }

    $menberInfo['number'] = $number;
    if(empty($menberInfo['mobile'])){
        $menberInfo['mobile'] = $memberRow['mobile'];
    }
	
	//统计收藏
	$count = $FavoriteHelper->favCount(array(
		'`member_id` = ?' => $this->Param['member_id'],
		'`sort` = ?' => $sort
	));
	
	$menberInfo['fav'] = $count;

    if(!empty($menberInfo)){
        $row['code'] = 0;
        $row['data'] = $menberInfo;
    }else{
        $row['code'] = 1;
    }

    echo $this->Param['callback']."(".json_encode($row).")";
    die();
}else{
    switch($this->Param['option']){
		case 'submit'://修改企业资料
			/**
			* @param member_id 用户id
			* @param cover  用户头像
			* @param company 公司
			* @param sex 性别
			* @param mobile 手机号码
			* @param address 详细地
			* @param ship_province 省
			* @param ship_city 市
			* @param ship_area 区
			**/
			$id=empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];

			$data['avatar'] = $this->Param['cover'];
			$data['company'] = $this->Param['company'];
			$data['sex'] = $this->Param['sex'];
			$data['mobile'] = $this->Param['mobile'];
			$data['address'] = $this->Param['address'];

			$menberData['province'] = $this->Param['ship_province'];
			$menberData['city'] = $this->Param['ship_city'];
			$menberData['area'] = $this->Param['ship_area'];

			$MemberListHelper->memberUpdate($menberData, array('`id` =?' =>$id));

			if($id > 0){
				$res = $MemberDetailHelper->DetailGetId(array('`id` = ?'=>$id));

				if($res > 0){
					$MemberDetailHelper->DetailUpdate($data,$id);
				}else{
					$data['id'] = $id;
					$MemberDetailHelper->DetailSave($data);
				}
				//删除缓存
				Cache::Delete('id_'.$id);
				$row['code'] = 0;
				echo $this->Param['callback']."(".json_encode($row).")";
    			die();
			}

			$row['code'] = 1;
			echo $this->Param['callback']."(".json_encode($row).")";
			die();
			break;
		case 'uploadImg'://上传企业头像
			$this->LoadHelper('upload/EditorUploadHelper');
			$EditorUploadHelper=new EditorUploadHelper($this->UserConfig);
			$EditorUploadHelper->ImageUpload($this->Param['filebox'],'avatar');

			break;
        case 'updataPassword'://修改密码
            /**
             * 个人中心 修改密码接口
             * @param member_id 当前用户id
             * @param passwordold 当前密码
             * @param password 新密码
             * @param password01 新密码确认
             **/
            $id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];

            if($id > 0){
                $password = trim($this->Param['password']);
                $password01 = trim($this->Param['password01']);
                $passwordold = trim($this->Param['passwordold']);

                if($password != $password01){
                    $row['code'] = 1;
                    $row['msg'] = "两次密码不一致";

                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();
                }

                $result = $MemberListHelper->GetMemberRow(array('`id` = ?' => $id));
                if($result['password'] !=(md5(md5($passwordold).$result['salt']))){
                    $row['code'] = 1;
                    $row['msg'] = "原始密码错误";
                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();
                }

                $password = md5($password);
                $salt = rand(1000,9999);
                $data['salt'] = $salt;
                $data['password'] = md5($password.$salt);

                $res = $MemberListHelper->memberUpdate($data,array('`id` = ?' => $id));
                if($res){
                    $row['code'] = 0;
                    $row['msg'] = "修改密码成功";
                    echo $this->Param['callback']."(".json_encode($row).")";
                    die();
                }
            }

            break;
		case 'article':
			/**
			* 获取关于我们数据
			* @param id 文章id 默认：1 关于我们 【1：关于我们，2：联系我们，3：友情链接，4：帮助中心，5：意见反馈，6：高薪诚聘,7:法律声明】
			*/
			$id = empty($this->Param['id']) ? 1 : $this->Param['id'];
			/**
			$cat_row = $ArticleHelper->GetCatRow($id);
			$this->Assign('cat_row', $cat_row);
			
			$cat_array = array(1,2,3,4,5,6,7);
			$cat_all = $ArticleHelper->GetAllCat(array('`cat_id` IN (?)' => $cat_array));
			$this->Assign('cat_all',$cat_all);
			**/
			//获取文章信息
			$article_data = $ArticleHelper->getRow(array(
				'`cat_id` = ?' => $id
			), NULL, array('add_time DESC'));
			
			$row['code'] = 0;
			$row['data'] = $article_data;
			echo $this->Param['callback']."(".json_encode($row).")";
			die();
			break;
        default:
    }

}





