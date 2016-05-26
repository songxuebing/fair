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
		case 'uploadImg'://上传图片
			$member_id = empty($this->Param['member_id']) ? 0 : $this->Param['member_id']; 
			$this->LoadHelper('upload/EditorUploadHelper');
			$EditorUploadHelper=new EditorUploadHelper($this->UserConfig);
			$data = $EditorUploadHelper->ImageUploadApp($this->Param['filebox'],'attach',$member_id);
			
			$row['code'] = $data['code'];
			$row['path'] = $data['path'];
			echo $this->Param['callback']."(".json_encode($row).")";
			break;
        default :
    }
}