<?php
header('Access-Control-Allow-Origin: *'); //设置http://www.baidu.com允许跨域访问
header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With'); //设置允许的跨域header
$CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(ROOT_PATH."/wwwroot/config.json")), true);
$action = $this->Param['act'];
$dir = $this->Param['dir'];//针对KINDEDITOR
switch($dir){
    case 'image';
        $action = 'uploadimage';
        break;
    case 'media':
        $action = 'uploadvideo';
        break;
    default :
        $action = 'uploadfile';
        break;
}
$this->LoadResurces('upload/Uploader.class');

$this->LoadHelper('ftp/FtpUploadHelper');
$FtpUploadHelper = new FtpUploadHelper($this->FtpPath);

$this->LoadHelper('upload/AttachHelper');
$AttachHelper = new AttachHelper($this->UserConfig['Id'], 'editor');

switch ($action) {
    case 'config':
        $result = json_encode($CONFIG);
        break;
    /* 上传图片 */
    case 'uploadimage':
        $config = array(
            "pathFormat" => $CONFIG['imagePathFormat'],
            "maxSize" => $CONFIG['imageMaxSize'],
            "allowFiles" => $CONFIG['imageAllowFiles']
        );
        //$fieldName = $CONFIG['imageFieldName'];
        $fieldName = 'imgFile';
        $up = new Uploader($fieldName, $config, $base64);
        $result = $up->getFileInfo();

        if($result['state'] == 'SUCCESS'){
            $FtpUploadHelper->Set(1,'image');
            $FileFilter = array(
                'url' => $result['url'],
                'name' => $result['title']
            );
            $upload_row = array(
                'id' => NOW_TIME.StringCode::RandomCode(8,'num'),
                'class' => 'editor',
                'member' => $this->UserConfig['Id'],
                'dateline' => NOW_TIME
            );
            $upload_row['title'] = $result['original'];
            $upload_row['path'] = $result['title'];
            $upload_row['size'] = $result['size'];
            if(false != ($UploadRow = $FtpUploadHelper->Submit($FileFilter))){
                $upload_row['path']=$UploadRow['path'];
                $upload_row['ftp']=$UploadRow['ftp'];
                $upload_row['ftpurl']=$UploadRow['ftpurl'];
            }
            $AttachHelper->imageSave($upload_row);
            $result['url'] = ATTACH_IMAGE . $upload_row['path'];
            //针对KINDEDITOR
            $result['error'] = 0;
        }else{
            $result['error'] = 1;
            $result['message'] = $result['state'];
        }
        $result = json_encode($result);
        break;
    /* 上传涂鸦 */
    case 'uploadscrawl':
        $config = array(
            "pathFormat" => $CONFIG['scrawlPathFormat'],
            "maxSize" => $CONFIG['scrawlMaxSize'],
            "allowFiles" => $CONFIG['scrawlAllowFiles'],
            "oriName" => "scrawl.png"
        );
        $fieldName = $CONFIG['scrawlFieldName'];
        $base64 = "base64";
        $up = new Uploader($fieldName, $config, $base64);
        $result = $up->getFileInfo();

        if($result['state'] == 'SUCCESS'){
            $FtpUploadHelper->Set(1,'image');
            $FileFilter = array(
                'url' => $result['url'],
                'name' => $result['title']
            );
            $upload_row = array(
                'id' => NOW_TIME.StringCode::RandomCode(8,'num'),
                'class' => 'editor',
                'member' => $this->UserConfig['Id'],
                'dateline' => NOW_TIME
            );
            $upload_row['title'] = $result['original'];
            $upload_row['path'] = $result['title'];
            $upload_row['size'] = $result['size'];
            if(false != ($UploadRow = $FtpUploadHelper->Submit($FileFilter))){
                $upload_row['path']=$UploadRow['path'];
                $upload_row['ftp']=$UploadRow['ftp'];
                $upload_row['ftpurl']=$UploadRow['ftpurl'];
            }
            $AttachHelper->imageSave($upload_row);
            $result['url'] = ATTACH_IMAGE . $upload_row['path'];
            //针对KINDEDITOR
            $result['error'] = 0;
        }else{
            $result['error'] = 1;
            $result['message'] = $result['state'];
        }
        $result = json_encode($result);
        break;
    /* 上传视频 */
    case 'uploadvideo':
        $config = array(
            "pathFormat" => $CONFIG['videoPathFormat'],
            "maxSize" => $CONFIG['videoMaxSize'],
            "allowFiles" => $CONFIG['videoAllowFiles']
        );
        //$fieldName = $CONFIG['videoFieldName'];
        $fieldName = 'imgFile';
        $up = new Uploader($fieldName, $config, $base64);
        $result = $up->getFileInfo();

        if($result['state'] == 'SUCCESS'){
            $FtpUploadHelper->Set(2,'file');
            $FileFilter = array(
                'url' => $result['url'],
                'name' => $result['title']
            );
            $upload_row = array(
                'id' => NOW_TIME.StringCode::RandomCode(8,'num'),
                'class' => 'editor',
                'member' => $this->UserConfig['Id'],
                'dateline' => NOW_TIME
            );
            $upload_row['title'] = $result['original'];
            $upload_row['path'] = $result['title'];
            $upload_row['size'] = $result['size'];
            if(false != ($UploadRow = $FtpUploadHelper->Submit($FileFilter))){
                $upload_row['path']=$UploadRow['path'];
                $upload_row['ftp']=$UploadRow['ftp'];
                $upload_row['ftpurl']=$UploadRow['ftpurl'];
            }
            $AttachHelper->fileSave($upload_row);
            $result['url'] = ATTACH_IMAGE . $upload_row['path'];
            $result['error'] = 0;
        }else{
            $result['error'] = 1;
            $result['message'] = $result['state'];
        }
        $result = json_encode($result);
        break;
    /* 上传文件 */
    case 'uploadfile':
        $config = array(
            "pathFormat" => $CONFIG['filePathFormat'],
            "maxSize" => $CONFIG['fileMaxSize'],
            "allowFiles" => $CONFIG['fileAllowFiles']
        );
        //$fieldName = $CONFIG['fileFieldName'];
        $fieldName = 'imgFile';
        $up = new Uploader($fieldName, $config, $base64);
        $result = $up->getFileInfo();

        if($result['state'] == 'SUCCESS'){
            $FtpUploadHelper->Set(2,'file');
            $FileFilter = array(
                'url' => $result['url'],
                'name' => $result['title']
            );
            $upload_row = array(
                'id' => NOW_TIME.StringCode::RandomCode(8,'num'),
                'class' => 'editor',
                'member' => $this->UserConfig['Id'],
                'dateline' => NOW_TIME
            );
            $upload_row['title'] = $result['original'];
            $upload_row['path'] = $result['title'];
            $upload_row['size'] = $result['size'];
            if(false != ($UploadRow = $FtpUploadHelper->Submit($FileFilter))){
                $upload_row['path']=$UploadRow['path'];
                $upload_row['ftp']=$UploadRow['ftp'];
                $upload_row['ftpurl']=$UploadRow['ftpurl'];
            }
            $AttachHelper->fileSave($upload_row);
            $result['url'] = ATTACH_IMAGE . $upload_row['path'];
            $result['error'] = 0;
        }else{
            $result['error'] = 1;
            $result['message'] = $result['state'];
        }
        $result = json_encode($result);
        break;

    /* 列出图片 */
    case 'listimage':
        $allowFiles = $CONFIG['fileManagerAllowFiles'];
        $listSize = $CONFIG['fileManagerListSize'];
        $path = $CONFIG['fileManagerListPath'];
        
        $allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);
        /* 获取参数 */
        $size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
        $start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
        $end = $start + $size;

        /* 获取文件列表 */
        $path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == "/" ? "":"/") . $path;
        $files = getfiles($path, $allowFiles);
        if (!count($files)) {
            return json_encode(array(
                "state" => "no match file",
                "list" => array(),
                "start" => $start,
                "total" => count($files)
            ));
        }

        /* 获取指定范围的列表 */
        $len = count($files);
        for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
            $list[] = $files[$i];
        }
        /* 返回数据 */
        $result = json_encode(array(
            "state" => "SUCCESS",
            "list" => $list,
            "start" => $start,
            "total" => count($files)
        ));
        break;
    /* 列出文件 */
    case 'listfile':
        $allowFiles = $CONFIG['imageManagerAllowFiles'];
        $listSize = $CONFIG['imageManagerListSize'];
        $path = $CONFIG['imageManagerListPath'];
        $allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);
        /* 获取参数 */
        $size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
        $start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
        $end = $start + $size;

        /* 获取文件列表 */
        $path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == "/" ? "":"/") . $path;
        $files = getfiles($path, $allowFiles);
        if (!count($files)) {
            return json_encode(array(
                "state" => "no match file",
                "list" => array(),
                "start" => $start,
                "total" => count($files)
            ));
        }

        /* 获取指定范围的列表 */
        $len = count($files);
        for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
            $list[] = $files[$i];
        }
        /* 返回数据 */
        $result = json_encode(array(
            "state" => "SUCCESS",
            "list" => $list,
            "start" => $start,
            "total" => count($files)
        ));
        break;

    /* 抓取远程文件 */
    case 'catchimage':
        break;

    default:
        $result = json_encode(array(
            'state' => '请求地址出错'
        ));
        break;
}

/* 输出结果 */
if (isset($_GET["callback"])) {
    if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
        echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
    } else {
        echo json_encode(array(
            'state' => 'callback参数不合法'
        ));
    }
} else {
    echo $result;
}

/**
 * 遍历获取目录下的指定类型的文件
 * @param $path
 * @param array $files
 * @return array
 */
function getfiles($path, $allowFiles, &$files = array())
{
    if (!is_dir($path)) return null;
    if(substr($path, strlen($path) - 1) != '/') $path .= '/';
    $handle = opendir($path);
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            $path2 = $path . $file;
            if (is_dir($path2)) {
                getfiles($path2, $allowFiles, $files);
            } else {
                if (preg_match("/\.(".$allowFiles.")$/i", $file)) {
                    $files[] = array(
                        'url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])),
                        'mtime'=> filemtime($path2)
                    );
                }
            }
        }
    }
    return $files;
}