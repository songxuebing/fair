<?php
if(empty($this->Param['option'])){

}else{
    switch($this->Param['option']){

        case 'commentsave':
            /**
             * 评论接口
             * @param eva_number 综合评价	1一星 2 二星 依次类推 默认1
             * @param service_number 展会服务	1一星 2 二星 依次类推 默认1
             * @param sentiment_number 展会人气	1一星 2 二星 依次类推 默认1
             * @param message 评论内容
             * @param is_type 1 展会评价 其他待定 2商家展区评价 3 行程预定 4 签证 5物流 6特装 7 咨询
             * @param member_id 当前用户id
             * @param con_id 当前评论对象的id
             **/

            $this->LoadHelper('comment/CommentHelper');
            $CommentHelper = new CommentHelper();

            $data['eva_number'] = $this->Param['eva_number'];
            $data['service_number'] = $this->Param['service_number'];
            $data['sentiment_number'] = $this->Param['sentiment_number'];
            $data['message'] = $this->Param['message'];
            $data['is_type'] = $this->Param['is_type'];
            $data['member_id'] = $this->Param['member_id'];
            $data['con_id'] = $this->Param['con_id'];
            $data['add_time'] = time();

            if(empty($this->Param['message'])){
                $row['code'] = 1;
                $row['msg'] = '内容不能为空';
                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $res = $CommentHelper->commentSave($data);
            if($res){
                $row['code'] = 0;
                $row['msg'] = '评论成功';
                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $row['code'] = 1;
            $row['msg'] = '评论失败';
            echo $this->Param['callback']."(".json_encode($row).")";
            die();
            break;
        case 'favorite':
            /**
             * 关注接口
             * @param sort 1展会 2商家展区 3行程 4 签证 5 物流 6 特装 7资讯
             * @param member_id 当前用户id
             * @param related_id 相关ID
             **/
            $this->LoadHelper('favorite/FavoriteHelper');
            $FavoriteHelper = new FavoriteHelper();

            if(empty($this->Param['sort'])){
                $row['code'] = 1;
                $row['msg'] = '参数错误';
                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            if(empty($this->Param['related_id'])){
                $row['code'] = 1;
                $row['msg'] = '参数错误';
                echo $this->Param['callback']."(".json_encode($row).")";
                die();
            }

            $sort = $this->Param['sort'];
            $related_id = $this->Param['related_id'];
            $params = array(
                'sort' => $sort,
                'member_id' => $this->Param['member_id'],
                'related_id' => $related_id
            );
            $result = $FavoriteHelper->favoriteAct($params);

            echo $this->Param['callback']."(".json_encode(array(
                    'code' => 0,
                    'data' => $result,
                    'msg' => '关注成功'
                )).")";

            die();
            break;
		case 'praise':
			/**
			* 各个评论点赞
			* @param comment_id 评论的id
			* @param member_id  当前用户id
			**/
            $this->LoadHelper('comment/CommentHelper');
            $CommentHelper = new CommentHelper();
            
            $comment_id = empty($this->Param['comment_id']) ? 0 : $this->Param['comment_id'];
            $params = array(
                'comment_id' => $comment_id,
                'member_id' => $this->Param['member_id']
            );
            $result = $CommentHelper->praiseAct($params);
			echo $this->Param['callback']."(".json_encode(array(
                    'code' => 0,
                	'count' => $result
                )).")";

            die();
            break;
		case 'article_praise':
			/**
			* 文章点赞
			* @param forum_id 文章id
			* @param member_id  当前用户id
			**/
            $this->LoadHelper('forum/ForumHelper');
            $ForumHelper = new ForumHelper();
            
            $member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];
			$forum_id = empty($this->Param['forum_id']) ? 0 : $this->Param['forum_id'];
            $params = array(
                'forum_id' => $forum_id,
                'member_id' => $this->Param['member_id']
            );
            $result = $ForumHelper->praiseAct($params);
			echo $this->Param['callback']."(".json_encode(array(
                    'code' => 0,
                	'count' => $result
                )).")";

            die();
            break;
		case 'uploadImg'://上传图片
			$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id']; 
			$this->LoadHelper('upload/EditorUploadHelper');
			$EditorUploadHelper=new EditorUploadHelper($this->UserConfig);
			$data = $EditorUploadHelper->ImageUploadApp($this->Param['filebox'],'attach',$member_id);
			
			$row['code'] = $data['code'];
			$row['path'] = $data['path'];
			echo $this->Param['callback']."(".json_encode($row).")";
			break;
		case 'search':
			/*
			* 模糊查询
			*
			*/
			$this->LoadHelper('convention/ConventionHelper');
			$ConventionHelper = new ConventionHelper();
			
			$this->LoadHelper('comment/CommentHelper');
			$CommentHelper = new CommentHelper();
			
			$this->LoadHelper('favorite/FavoriteHelper');
			$FavoriteHelper = new FavoriteHelper();
			
			$this->LoadHelper('member/MemberAvatarHelper');
			$MemberAvatarHelper = new MemberAvatarHelper();
			
			$this->LoadHelper('region/RegionHelper');
			$RegionHelper = new RegionHelper();


			$limit = 10;
			$page = empty($this->Param['page']) ? 0 : $this->Param['page'];
			$where = array();
			$where = array('`id` > ?' => 0);
		
			if(!empty($this->Param['industry'])){
				$where['locate(?,`industry`)>0'] = urldecode($this->Param['industry']);
			}
			if(!empty($this->Param['delta'])){
				$where['locate(?,`regional`)>0'] = urldecode($this->Param['delta']);
			}
			if(!empty($this->Param['countries'])){
				$where['locate(?,`countries`)>0'] = urldecode($this->Param['countries']);
			}
			if(!empty($this->Param['city'])){
				$where['locate(?,`city`)>0'] = urldecode($this->Param['city']);
			}
			//获取展会列表
			$this->Param['key'] = urldecode($this->Param['key']);
			$data = $ConventionHelper->GetAllWhere($where, $limit, $page, $this->Param);
			$row['code'] = 0;
			$row['data'] = $data;

			$country_where = array('`parent_id` = ?' =>0);
			if(!empty($this->Param['delta'])){
				$country_where['`delta` = ?'] = $this->Param['delta'];
			}
			$country_all = $RegionHelper->regionAll($country_where);
			$country_all = Common::arrayExplode($country_all, 8);
			
			$row['country_all'] = $country_all;
		
			if(!empty($this->Param['countries'])){
				$country_row = $RegionHelper->regionRow(array('`name` = ?' => urldecode($this->Param['countries'])));
				$city_where['`parent_id` = ?'] = $country_row['id'];
		
				$city_all = $RegionHelper->regionAll($city_where,array(0,100));
				$city_all = Common::arrayExplode($city_all, 8);
				
				$row['city_all'] = $city_all;
			}
		
			$data['attr'] = array('industry' =>$this->Param['industry'],'delta' => $this->Param['delta'],'countries'=>$this->Param['countries'],'city'=>$this->Param['city']);
			
			$row['menberInfo'] = $memberRow;
			$row['param'] = $this->Param;
			echo $this->Param['callback']."(".json_encode($row).")";
			die();
			
			break;
		case 'chk_tel'://验证手机号码是否存在
			$this->LoadHelper('member/MemberListHelper');
			$MemberListHelper=new MemberListHelper();
			
			$mobile = trim($this->Param['mobile']);
			
			$memberRow = $MemberListHelper->GetMemberRow(array(
				'`mobile` = ?' => $mobile
			));
			
			if(!empty($memberRow)){
				$code = 0;
				$msg = '用户已存在!';
				$member_name = $memberRow['username'];
			}else{
				$code = 1;
				$msg = '用户不存在!';	
				$member_name = '';
			}
			
			echo $this->Param['callback'].json_encode(array(
                    'code' => $code,
					'msg' =>$msg,
					'member_name' => $member_name
                ));

            die();
			break;
		case 'message':
			$this->LoadHelper('message/MessageHelper');
			$MessageHelper = new MessageHelper();
			/*
			* parent_id 上一条消息的id
			* forum_id  文章id
			* title 标题
			* content  回复内容
			* member_id 发布回复的人
			* to 回复的对象
			*
			*/
			$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id'];
			if($member_id == 0){
				$row['code'] = 1;
				$row['msg'] = '未登陆';
				echo $this->Param['callback']."(".json_encode($row).")";
				die();	
			}
			
			$to_id = empty($this->Param['to']) ? 0 : $this->Param['to'];
			if($to_id == 0){
				$row['code'] = 1;
				$row['msg'] = '回复的对象参数错误';
				echo $this->Param['callback']."(".json_encode($row).")";
				die();	
			}
			
			$parent_id = empty($this->Param['parent_id']) ? 0 : $this->Param['parent_id'];
			$forum_id = empty($this->Param['forum_id']) ? 0 : $this->Param['forum_id'];
			$title = empty($this->Param['title']) ? 'APP回复消息' : $this->Param['title'];
			$content = empty($this->Param['content']) ? '' : urldecode($this->Param['content']);
			
			if(trim($content) == ''){
				$row['code'] = 1;
				$row['msg'] = '回复内容不能为空';
				echo $this->Param['callback']."(".json_encode($row).")";
				die();	
			}
			
			$row_id = $MessageHelper->messageSave(array(
				'parent_id' =>$parent_id,
				'forum_id' => $forum_id,
				'title' => $title,
				'content' => $content,
				'from' => $member_id,
				'to' => $to_id,
				'dateline' => time(),
				'laiyuan'=>1
			));
			
			if($row_id){
				$row['code'] = 0;
				$row['msg'] = '回复成功';
				$row['data'] =  $MessageHelper->messageRow($row_id);
				echo $this->Param['callback']."(".json_encode($row).")";
				die();	
			}
			
			$row['code'] = 1;
			$row['msg'] = '回复失败';
			echo $this->Param['callback']."(".json_encode($row).")";
			die();
			
			
			
			
	
			break;
    }
}