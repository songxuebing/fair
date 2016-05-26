<?php

class CommentHelper extends Helper {

    var $CommentModel;
    var $MemberModel;
    var $ConventionModel;
    var $RouteModel;
    var $VisaModel;
	var $ForumModel;

    public function __construct() {
        $this->CommentModel = $this->LoadModel('Comment');
        $this->MemberModel = $this->LoadModel('Member');
        $this->ConventionModel = $this->LoadModel('Convention');
        $this->RouteModel = $this->LoadModel('Route');
        $this->VisaModel = $this->LoadModel('Visa');
		$this->ForumModel = $this->LoadModel('Forum');
    }
    
    public function commentQuery($sql){
        return $this->CommentModel->commentQuery($sql);
    }
    public function commentCount($where){
        return $this->CommentModel->getOne($where);
    }
    public function commentRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`eva_id` = ?' => $where
            );
        }
        return $this->CommentModel->getRow($where);
    }
    //评价
    public function getAllComment($where, $limit, $page, $Param, $UserConfig = array()) {
        $join = $this->joinWhere($Param);
        $where = array_merge($where,$join);
        $data['One'] = $this->CommentModel->getOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->CommentModel->getAll($where, array($page, $limit), NULL, array('eva_id desc'));
            if (!empty($data['All']))
                foreach ($data['All'] as $k => $v) {
                    $member_where = array(
                        '`id` = ?' => $v['member_id']
                    );
                    $member = $this->MemberModel->GetRow($member_where);
                    $memberDetail = $this->MemberModel->DetailGetRow($member_where);
                    if (!empty($memberDetail))
                        foreach ($memberDetail as $key => $val) {
                            $member[$key] = $val;
                        }
                    $data['All'][$k]['memberInfo'] = $member;
                    //查找赞
                    $check_praise = $this->CommentModel->praiseOne(array('`eva_id` = ?' => $v['eva_id'], '`member_id` = ?' => $UserConfig['Id']));
                    $data['All'][$k]['is_praise'] = $check_praise > 0 ? 1 : 0;
                    $data['All'][$k]['score'] = $this->detailScore($v);
                }
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    //获取文章的标签
    public function getRelevant_tag($where) {
        $data = $this->ForumModel->forumAll_tagindex($where, NULL, NULL, array('index_id desc'));
        return $data;
    }
    //相关阅读
    public function getRelevant($where) {
        $data = $this->ForumModel->forumAll_re($where, array(0, 4), NULL, array('dateline desc'));
        return $data;
    }
    //上一篇
    public function getUp($where) {
        $data = $this->ForumModel->forumAll_re($where, NULL, NULL, array('dateline asc'));
        return $data;
    }

    //下一篇
    public function getDown($where) {
        $data = $this->ForumModel->forumAll_re($where, NULl, NULL, array('dateline desc'));
        return $data;
    }
    public function joinWhere($Param){
        $condition = array();
        if(!empty($Param['key'])){
            $condition['LOCATE(?,`message`) > 0'] = $Param['key'];
        }
        if(!empty($Param['st'])){
            $condition['`dateline` >= ?'] = strtotime($Param['st']);
        }
        if(!empty($Param['et'])){
            $condition['`dateline` < ?'] = strtotime($Param['et']);
        }
        return $condition;
    }
    public function commentSave($data, $where = array()) {
        $data['average'] = $this->detailScore($data);
        if (empty($where)) {
            return $this->CommentModel->add($data, true);
        } else {
            return $this->CommentModel->update($data, $where);
        }
    }
    /*
     * 不同的评论类型转换
     * $params array
     */
    public function transComment($params){
		/**
        switch($is_type){
            case 1:
                $row = $this->ConventionModel->GetRow(array(
                    '`id` = ?' => $params['con_id']
                ));
                $row['text'] = '展会评论';
                break;
            case 2:
                $detail_row = $this->ConventionModel->GetDetailRow(array(
                    '`detail_id` = ?' => $params['con_id']
                ));
                $row = $this->ConventionModel->GetRow(array(
                    '`id` = ?' => $detail_row['con_id']
                ));
                $row['text'] = '供应商展区评论';
                break;
            case 3:
                $row = $this->RouteModel->routeRow(array(
                    '`id` = ?' => $params['con_id']
                ));
                $row['text'] = '行程评论';
                break;
            case 4:
                $row = $this->VisaModel->GetRow(array(
                    '`visa_id` = ?' => $params['con_id']
                ));
                $row['image'] = $row['visa_cover'];
                $row['name'] = $row['visa_title'];
                $row['text'] = '签证评论';
                break;
			case 7:
				$row = $this->ForumModel->forumRow(array(
					'`id` = ?' => $params['con_id']
				));
				$row['name'] = $row['title'];
				$row['text'] = $row['title'];
				break;
        }
		**/
		$row = $this->ForumModel->forumRow(array(
			'`id` = ?' => $params['con_id']
		));
		$row['name'] = $row['title'];
		$row['text'] = $row['title'];
        $result = array(
            'image' => $row['cover'],
            'name' => $row['name'],
			'content' => empty($row['content']) ? '' :$row['content'],
            'text' => $row['text']
        );
        return $result;
    }
    /*
     *计算综合分数 
     */
    public function detailScore($params){
        $eva_score = empty($params['eva_number']) ? 0 : $params['eva_number'];
        $service_scoure = empty($params['service_number']) ? 0 : $params['service_number'];
        $sentiment_scoure = empty($params['sentiment_number']) ? 0 : $params['sentiment_number'];
        return floor(($eva_score+$service_scoure+$sentiment_scoure)/3);
    }
    /*
     * 点赞 $params array('comment_id'=>'评论ID','member_id' =>'用户ID')
     */
    public function praiseAct($params) {
        $comment_row = $this->CommentModel->getRow(array(
            '`eva_id` = ?' => $params['comment_id']
        ));
        $check = $this->CommentModel->praiseRow(array(
            '`eva_id` = ?' => $params['comment_id'],
            '`member_id` = ?' => $params['member_id']
        ));
        if ($check) {
            //取消赞
            $this->CommentModel->praiseDelete(array(
                '`eva_id` = ?' => $params['comment_id'],
                '`member_id` = ?' => $params['member_id']
            ));
            $this->CommentModel->update(array('praise' => $comment_row['praise'] - 1), array('`eva_id` = ?' => $params['comment_id']));
        } else {
            $this->CommentModel->praiseSave(array(
                'eva_id' => $params['comment_id'],
                'member_id' => $params['member_id'],
                'dateline' => NOW_TIME
            ));
            $this->CommentModel->update(array('praise' => $comment_row['praise'] + 1), array('`eva_id` = ?' => $params['comment_id']));
        }
        $count = $this->CommentModel->praiseOne(array(
            '`eva_id` = ?' => $params['comment_id']
        ));
        return $count;
    }
    /*
     * 获取某条件下所有评论的平均分值
     */
    public function detailConAverage($where){
        $count = $this->CommentModel->getOne($where);
        $sum = $this->CommentModel->sumOne($where,'SUM(average) AS num');
        if($count == 0 || $sum == 0){
            return 1;
        }else{
            return floor($sum/$count);
        }
    }
}