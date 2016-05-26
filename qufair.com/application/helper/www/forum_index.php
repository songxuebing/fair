<?php
    $this->LoadHelper('forum/ForumHelper');
    $ForumHelper = new ForumHelper();
    
    $this->LoadHelper('adv/AdvHelper');
    $AdvHelper =  new AdvHelper();
    
    $this->LoadHelper('comment/CommentHelper');
    $CommentHelper =  new CommentHelper();
    
    $this->LoadHelper('forum/ForumHelper');
    $ForumHelper = new ForumHelper();
    
    $this->LoadHelper('member/MemberListHelper');
    $MemberListHelper = new MemberListHelper();
    
    if(empty($this->Param['option'])){

        $limit = 10;
        $page = empty($this->Param['page']) ? 0 : $this->Param['page'];
        $where = array();

        $memberId = empty($this->UserConfig['Id']) ? 0 :$this->UserConfig['Id'];
        $tagid = empty($this->Param['tagid']) ? 'hot' :$this->Param['tagid'];
		//热门标签
        $hot_cat = $ForumHelper->catAll(array(
            '`is_hot` = ?' => 1
        ));
        $this->Assign('hot_cat',$hot_cat);
        $this->Assign('tag_id',$tagid);

        if($tagid == 'hot'){
            $forum_row = $ForumHelper->forumPageList(array('`recommend` = ?' => 1,'`delete`= ?'=>0, '`is_show` = ?'=>1), $limit, $page, $this->Param);
            $this->Assign('forum_row',$forum_row);
        }

        if(!empty($tagid) && $tagid !='hot'){
            $tag_all = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum_tagindex` WHERE ctag_id = '.$tagid.' GROUP BY forum_id');
            $fWhere['`is_show` = ?'] = 1;
            $fWhere['`delete` = ?'] = 0;
            if(!empty($tag_all)){
                $forum_id = array();
                foreach($tag_all as $k => $v){
                   $forum_id[$k] = $v['forum_id'];
                }

                if(!empty($forum_id)){
                    $fWhere['`id` in (?)'] = $forum_id;
                }
            }else{
				
                $crow = $ForumHelper->cTagRow(array(
                    '`ctag_id` = ?' =>$tagid,
                    '`is_delete` = ?' => 0
                ));
                $fWhere['locate(?,`title`)>0'] = urldecode($crow['ctag_name']);
            }
            $forum_row = $ForumHelper->forumPageList($fWhere, $limit, $page, $this->Param);
            $this->Assign('forum_row',$forum_row);


            /**
            $where['locate(?,`tag_name`)>0'] = urldecode($tagname);
            $tag_row = $ForumHelper->tagAll($where);
            $forum_id = array();
            if(!empty($tag_row)) foreach($tag_row as $key => $val){
                $forum_id[$key] = $val['forum_id'];
            }

            $fWhere['`is_show` = ?'] = 1;
            $fWhere['`delete` = ?'] = 0;
			if(!empty($forum_id)){
				$fWhere['`id` in (?)'] = $forum_id;
			}else{
				$fWhere['locate(?,`title`)>0'] = urldecode($tagname);	
			}
            $forum_row = $ForumHelper->forumPageList($fWhere, $limit, $page, $this->Param);
            $this->Assign('forum_row',$forum_row);
             * */

        }

        if(empty($forum_row['All']) && empty($tagid)){
            $forum_row['All'] = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum` WHERE is_show = 1 AND `delete` = 0 ORDER BY RAND() LIMIT '.$page.','.$limit);
            $this->Assign('forum_row',$forum_row);
        }

        //查询全部默认标签
        $cTagRow = $ForumHelper->cTagAll(array(
            '`is_open` = ?' => 1,
            '`is_delete` = ?' =>0
        ),null,null,array('sort asc'));

        if($memberId > 0){
            //用户自己的标签
            $tagRow = $MemberListHelper->tagMemberWhere(array(
                '`member_id` = ?' => $memberId
            ));
            $tagenRow = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum_cattag`');
            //var_dump($tagenRow);exit();
            $tag = "";
            $tag_en = "";
            $tagIdArr = '';
            $tagArr = array();
            //var_dump($tagRow);exit();
            if(!empty($tagRow)) foreach($tagRow as $key => $val){
                $tag .= $val['tag_name'].' ';
                //echo $val['tag_name'];exit();

                if($val['mytag_id']) {
                    $name_en = $ForumHelper->queryDetail('SELECT * FROM `dyhl_forum_cattag` where ctag_id = '.$val['mytag_id']);
                }
                elseif($val['tag_name']){
                    $name_en = $ForumHelper->queryDetail("SELECT * FROM `dyhl_forum_cattag` where ctag_name like '".$val['tag_name']."'");
                }
                $tag_en .= $name_en['0']['name_en'].' ';
                $tagIdArr .= $val['mytag_id'].' ';
                $tagArr[$key]['ctag_name'] = $val['tag_name'];
				$tagArr[$key]['ctag_id'] = $val['mytag_id'];
                $tagArr[$key]['name_en'] = $val['name_en'];
            }
            //echo $tag;
            Cookie::SetCookie('mytag',$tag,NOW_TIME+3600);
            Cookie::SetCookie('mytag_en',$tag_en,NOW_TIME+3600);
            Cookie::SetCookie('mytagid',$tagIdArr,NOW_TIME+3600);

            //读取其他标签
            if(!empty($cTagRow)) foreach($cTagRow as $key => $val){
                if(!in_array($val['ctag_name'],$tagArr)){
                    $cTagArr[$key]['ctag_name'] = $val['ctag_name'];
                    $cTagArr[$key]['ctag_id'] = $val['ctag_id'];
                    $cTagArr[$key]['name_en'] = $val['name_en'];
                }
            }

        }else{

            $tag = Cookie::GetCookie('mytag');
            $tag_en = Cookie::GetCookie('mytag_en');
            $tagIdArr = Cookie::GetCookie('mytagid');
            if(empty($tag_en))
            {
                unset($_COOKIE);
                $tag ="";
            }
            if(!empty($tag)){
                $tagArr = explode(' ',$tag);
                //var_dump($cTagRow);exit();
                if(!empty($cTagRow)) foreach($cTagRow as $key => $val){
                    if(!in_array($val['ctag_name'],$tagArr)){
                        $cTagArr[$key]['ctag_name'] = $val['ctag_name'];
                        $cTagArr[$key]['ctag_id'] = $val['ctag_id'];
                        $cTagArr[$key]['name_en'] = $val['name_en'];
                    }
                }
            }else{
                //本地没有标签，查询库中
                //echo "11";exit();
                $tag = "";
                $tagIdArr = '';
                $tag_en = "";
                if(!empty($cTagRow)) foreach($cTagRow as $key => $val){
                    if($key < 5){
                        $tag .= $val['ctag_name'].' ';
                        $tag_en .= $val['name_en'].' ';
                        $tagIdArr .= $val['ctag_id'].' ';
                    }else{
                        $cTagArr[$key]['ctag_name'] = $val['ctag_name'];
                        $cTagArr[$key]['ctag_id'] = $val['ctag_id'];
                        $cTagArr[$key]['name_en'] = $val['name_en'];
                    }
                }
                Cookie::SetCookie('mytag',$tag,NOW_TIME+3600);
                Cookie::SetCookie('mytag_en',$tag_en,NOW_TIME+3600);
                Cookie::SetCookie('mytagid',$tagIdArr,NOW_TIME+3600);
            }
        }

        $this->Assign('tag',$tag);
        $this->Assign('tag_en',$tag_en);
        $this->Assign('tagid',$tagIdArr);
        $this->Assign('cTagRow',$cTagArr);

        //最新资讯5条
        $new = $ForumHelper->forumPageList(array('`delete` = ?' => 0,'`is_show` = ?' => 1), 4, 1 ,$this->Param);
        $this->Assign('new',$new);

        //查询最前的12个标签

        $forum_cat = $ForumHelper->groupCat();
        $this->Assign('forum_cat', $forum_cat);

        $this->Assign('param', $this->Param);
        echo $this->GetView('fourm_index.php');
    }else{
        switch ($this->Param['option']){
            case 'edit':
                $this->LoadHelper('public/usercheck');
                $id = empty($this->Param['id']) ? 0 : $this->Param['id'];

                if($id > 0){
                    $forum_row = $ForumHelper->forumRow(array(
                        '`member_id` = ?' => $this->UserConfig['Id'],
                        '`id` = ?' => $id
                    ));

                    $tag_row = $ForumHelper->tagAll(array('`forum_id` = ?' => $id));
                    $tagtxt = '';
                    if(!empty($tag_row)) foreach($tag_row as $key => $val){
                        $tagtxt.=$val['tag_name'].' ';
                    }
                    $forum_row['tag'] = $tagtxt;
                    $this->Assign('data',$forum_row);
                }

                //调取所有分类
                $cat = $ForumHelper->groupCat();
                $this->Assign('cat',$cat);
                $this->Assign('id',$id);
                echo $this->GetView('fourm_edit.php');
                break;
            case 'submit':
                $data['title'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入资讯标题') : $this->Param['title'];
                $data['cat_id'] = empty($this->Param['cat_id']) ? ErrorMsg::Debug('请选择所属版块') : $this->Param['cat_id'];
                $data['content'] = empty($this->Param['title']) ? ErrorMsg::Debug('请输入资讯内容') : $this->Param['content'];
                $data['member_id'] = empty($this->UserConfig['Id']) ? ErrorMsg::Debug('请登陆后发布') : $this->UserConfig['Id'];
                $data['dateline'] = NOW_TIME;

                $tag = $this->Param['tag'];
                if(!empty($tag)){
                    $tagArr = explode(' ',$tag);
                }

                if($this->Param['id'] > 0){
                    $row = $ForumHelper->forumSave($data,$this->Param['id']);

                    if($row){

                        $ForumHelper->tagRemove(array('`forum_id` = ?' => $this->Param['id']));

                        if(!empty($tagArr)) foreach($tagArr as $key=>$val){
                            $ForumHelper->tagSave(array(
                                'forum_id' => $this->Param['id'],
                                'tag_name' =>$val
                            ));
                        }

                        ErrorMsg::Debug('编辑成功，等待管理员审核',TRUE);
                    }
                    ErrorMsg::Debug('编辑失败');
                }else{
                    $row = $ForumHelper->forumSave($data);

                    if($row){

                        if(!empty($tagArr)) foreach($tagArr as $key=>$val){
                            $ForumHelper->tagSave(array(
                                    'forum_id' => $row,
                                    'tag_name' =>$val
                            ));
                        }

                        ErrorMsg::Debug('发表成功，等待管理员审核',TRUE);
                    }
                    ErrorMsg::Debug('发表失败');
                }
                break;
            case 'tag':
				
				if(empty($this->UserConfig['Id'])){//未登陆，读取cookie
                    $mytag = Cookie::GetCookie('mytag');
                    $mytag_en = Cookie::GetCookie('mytag_en');
					$data['tag_name'] = $mytag;
                    $data['tag_en'] = $mytag_en;
					
					$this->Assign('data',$data);
					
				}else{
					$member_id = empty($this->UserConfig['Id']) ? 0 : $this->UserConfig['Id'];
					$id = empty($this->Param['id']) ? 0 : $this->Param['id'];
	
					if($member_id > 0){
						$forum_row = $ForumHelper->forumRow(array(
							'`member_id` = ?' => $this->UserConfig['Id'],
							'`id` = ?' => $id
						));
	
						$tag_row = $ForumHelper->tagAll(array('`forum_id` = ?' => $id));
						$tagtxt = '';
						if(!empty($tag_row)) foreach($tag_row as $key => $val){
							$tagtxt.=$val['tag_name'].' ';
						}
						$forum_row['tag'] = $tagtxt;
						$this->Assign('data',$forum_row);
					}
	
					$this->Assign('id',$id);
				}

                echo $this->GetView('fourm_tag.php');
                break;
            case 'tagSubmit':
				
				if(empty($this->UserConfig['Id'])){//保存未登陆的用户标签
					$tag = empty($this->Param['tag']) ? '' :$this->Param['tag'];

                    Cookie::SetCookie('mytag',$tag,NOW_TIME+3600);
					ErrorMsg::Debug('设置成功',TRUE);
				}else{
					$tag = empty($this->Param['tag']) ? '' :$this->Param['tag'];
					$id = empty($this->Param['id']) ? 0 :$this->Param['id'];
					$member_id = empty($this->UserConfig['Id']) ? 0 :$this->UserConfig['Id'];
	
					if(!empty($tag)){
						$tagArr = explode(' ',$tag);
					}
	
					if($id > 0){
						$MemberListHelper->tagRemove(array('`member_id` = ?' => $member_id));
	
						if(!empty($tagArr)) foreach($tagArr as $key => $val){
							$MemberListHelper->tagMemberSave(array(
								'member_id' =>$member_id,
								'tag_name' => $val
							));
						}
						ErrorMsg::Debug('设置成功',TRUE);
	
					}else{
	
						if(!empty($tagArr)) foreach($tagArr as $key => $val){
							$MemberListHelper->tagMemberSave(array(
								'member_id' =>$member_id,
								'tag_name' => $val
							));
						}
						ErrorMsg::Debug('设置成功',TRUE);
					}
				}
				
                
                break;
			case 'removeTag':
                /**
				$tagid = empty($this->Param['tagid']) ? 0 :(int) $this->Param['tagid'];
				if(empty($this->UserConfig['Id'])){//未登陆，删除cookie中的标签

                    $mytag = Cookie::GetCookie('mytag');
					$tagArr = explode(' ',$mytag);
					array_splice($tagArr,$tagid,1);
					$html="";
					if(!empty($tagArr)){
						
						foreach($tagArr as $key => $val){
							$html.=$val.' ';
						}
					}

                    Cookie::SetCookie('mytag',$html,NOW_TIME+3600);
				}else{
					$member_id = empty($this->UserConfig['Id']) ? 0 :$this->UserConfig['Id'];
					$MemberListHelper->tagRemove(array('`member_id` = ?' => $member_id,'`tag_id` = ?'=>$tagid));	
				}
				**/
                $tagname = empty($this->Param['tagname']) ? '' :$this->Param['tagname'];
                $tagid = empty($this->Param['tagid']) ? '' :$this->Param['tagid'];
                $tagen = empty($this->Param['tagen']) ? '' :$this->Param['tagen'];

                $member_id = empty($this->UserConfig['Id']) ? 0 : $this->UserConfig['Id'];
                if(!empty($this->Param['tagname'])){
                    $mytag = Cookie::GetCookie('mytag');
                    $mytagid = Cookie::GetCookie('mytagid');
                    $mytagen = Cookie::GetCookie('mytag_en');

                    if(!empty($mytag)){
                        $tagArr = explode(' ',$mytag);
                        $tagidArr = explode(' ',$mytagid);
                        $tagenArr = explode(' ',$mytagen);
                        $html="";
                        $htmlid="";
                        $htmlen="";
                        foreach($tagArr as $key => $val){
                            if(trim($tagname) != trim($val)){
                                $html.=$val.' ';
                                $htmlid.=$tagidArr[$key].' ';
                                $htmlen.=$tagenArr[$key].' ';
                            }
                        }

                        Cookie::SetCookie('mytag',$html,NOW_TIME+3600);
                        Cookie::SetCookie('mytagid',$htmlid,NOW_TIME+3600);
                        Cookie::SetCookie('mytag_en',$htmlen,NOW_TIME+3600);

                        //登陆用户删除自己的标签
                        if($member_id > 0){
                            $MemberListHelper->tagRemove(array('`member_id` = ?' => $member_id));
                            $myTagArr = explode(' ',$html);
                            $htmlIdArr = explode(' ',$htmlId);
                            foreach($myTagArr as $key => $val){
                                $MemberListHelper->tagMemberSave(array(
                                    'member_id' =>$member_id,
                                    'mytag_id' => trim($htmlIdArr[$key]),
                                    'tag_name' => trim($val)
                                ));
                            }

                        }
                    }
                }

				break;
			case 'cookietag':
				echo $this->GetView('fourm_cookietag.php');
				break;
            case 'addTag':
                $tag = empty($this->Param['tagTxt']) ? '' :$this->Param['tagTxt'];
                $tagid = empty($this->Param['tagid']) ? '' :$this->Param['tagid'];
                $tagen = empty($this->Param['tagen']) ? '' :$this->Param['tagen'];
                $member_id = empty($this->UserConfig['Id']) ? 0 : $this->UserConfig['Id'];

                if(!empty($this->Param['tagTxt'])){
                    $mytag = Cookie::GetCookie('mytag');
                    $mytagid = Cookie::GetCookie('mytagid');
                    $mytagen = Cookie::GetCookie('mytag_en');

                    $html='';
                    $htmlId = '';
                    $htmlen = '';
                    if(!empty($mytag)){
                        $html = $mytag.$tag.' ';
                        $htmlId = $mytagid.$tagid.' ';
                        $htmlen = $mytagen.$tagen.' ';
                    }else{
                        $html = $tag.' ';
                        $htmlId = $tagid.' ';
                        $htmlen = $tagen.' ';
                    }
                    Cookie::SetCookie('mytag',$html,NOW_TIME+3600);
                    Cookie::SetCookie('mytagid',$htmlId,NOW_TIME+3600);
                    Cookie::SetCookie('mytag_en',$htmlen,NOW_TIME+3600);

                    //登陆用户添加自己的标签
                    if($member_id > 0){
                        $MemberListHelper->tagRemove(array('`member_id` = ?' => $member_id));

                        $myTagArr = explode(' ',$html);
                        $htmlIdArr = explode(' ',$htmlId);
                        foreach($myTagArr as $key => $val){
                            $MemberListHelper->tagMemberSave(array(
                                'member_id' =>$member_id,
                                'mytag_id' => trim($htmlIdArr[$key]),
                                'tag_name' => trim($val)
                            ));
                        }
                    }
                }

                break;
			
        }
        
    }
