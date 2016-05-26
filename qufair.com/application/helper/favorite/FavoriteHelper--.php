<?php

class FavoriteHelper extends Helper {

    var $FavoriteModel;
    var $MemberModel;
    var $ConventionModel;
    var $ForumModel;

    public function __construct() {
        $this->FavoriteModel = $this->LoadModel('Favorite');
        $this->MemberModel = $this->LoadModel('Member');
        $this->ConventionModel = $this->LoadModel('Convention');
        $this->ForumModel = $this->LoadModel('Forum');
    }

    public function favCount($where) {
        return $this->FavoriteModel->getOne($where);
    }

    public function favRow($where) {
        if (is_numeric($where)) {
            $where = array(
                '`id` = ?' => $where
            );
        }
        return $this->FavoriteModel->getRow($where);
    }

    //收藏
    public function getAllfavorite($where, $limit, $page, $Param) {
        $data['One'] = $this->FavoriteModel->getOne($where);
        if (!empty($data['One'])) {
            $data['All'] = $this->FavoriteModel->getAll($where, array($page, $limit), NULL, array('dateline desc'));
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
                }
            Pagination::SetUrl($Param);
            $data['Page'] = Pagination::GetHtml($limit, $page, $data['One']);
        }
        return $data;
    }

    /*
     * 不同收藏转换
     * $params array
     */
    public function transFavorite($params) {
        switch ($params['sort']) {
            case 1:
                $row = $this->ConventionModel->GetRow(array(
                    '`id` = ?' => $params['related_id']
                ));
                $result = array(
                    'image' => $row['cover'],
                    'name' => $row['name'],
                    'pavilion' => $row['pavilion']
                );
                break;
            case 7:
                $row = $this->ForumModel->forumRow(array(
                    '`id` = ?' => $params['related_id']
                ));
                $result = array(
                    'image' => $row['cover'],
                    'name' => $row['title'],
                    'dateline' => $row['dateline']
                );
                break;
        }

        return $result;
    }

    public function favoriteSave($data, $where = array()) {
        if (empty($where)) {
            return $this->FavoriteModel->add($data, true);
        } else {
            return $this->FavoriteModel->update($data, $where);
        }
    }

    public function favoriteAct($params) {
        $check = $this->FavoriteModel->getRow(array(
            '`sort` = ?' => $params['sort'],
            '`member_id` = ?' => $params['member_id'],
            '`related_id` = ?' => $params['related_id']
        ));
        if ($check) {
            //删除收藏
            $this->FavoriteModel->favDelete(array(
                '`id` = ?' => $check['id']
            ));
        } else {
            $this->FavoriteModel->add(array(
                'sort' => $params['sort'],
                'member_id' => $params['member_id'],
                'related_id' => $params['related_id'],
                'dateline' => NOW_TIME
            ));
        }
        $count = $this->FavoriteModel->getOne(array(
            '`sort` = ?' => $params['sort'],
            '`related_id` = ?' => $params['related_id']
        ));
        return $count;
    }
	
	
	public function queryDetail($sql){
        return $this->FavoriteModel->queryAll($sql);
    }

}