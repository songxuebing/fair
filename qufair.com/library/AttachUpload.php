<?php

// amespace Library\CacheClass;
ini_set('memory_limit', '1024M'); // 动态地调整php使用内存的大小，否则处理大图会出错

class AttachUpload {

    var $_Upload;
    var $_FileSize;
    var $_FileType;
    var $_FileName;
    var $_FileExt;
    var $_Error;

    public function __construct($path) {
        $this->_Upload = Config::GetUpload();
        if(empty($path)){
            $this->_Upload['savepath'] = WEB_PATH . '/' . $this->_Upload['savepath'] . '/image/' . date('Ym') . '/' . date('d');
        }else{
            $this->_Upload['savepath'] = WEB_PATH . '/' . $this->_Upload['savepath'] . '/image/' . $path;
        }
    }

    /**
     * uploadfile 判断用什么方式上传相应文件
     *
     * param file $file 上传文件
     */
    public function UploadFile($file) {
        if (empty($file)) {
            ErrorMsg::Debug('请选择上传文件');
        }
        $this->_FileSize = $this->GetSize($file);
        if ($this->_FileSize > $this->_Upload['max']) {
            ErrorMsg::Debug('文件超过指定大小' . $this->_Upload['max'] . '字节');
        }
        $this->_FileType = $this->GetType($file);
        if (!in_array($this->_FileType, $this->_Upload['type'])) {
            ErrorMsg::Debug('文件类型不能上传');
        }

        $this->MakeDir($this->_Upload['savepath']);
        $this->_FileName = NOW_TIME . StringCode::RandomCode(8, 'num');
        $this->_FileExt = $this->GetExt($file);
        // 原图
        $FileFilter = $this->CopyFile($file);
        function_exists('chmod') && chmod(WEB_PATH . '/' . $FileFilter['url'], 0777);
        return $FileFilter;
    }

    /**
     * CopyFile copy方式上传
     *
     * param file $file
     * return unknown
     */
    public function CopyFile($file) {
        $FileName = $this->_FileName . $this->_FileExt;
        if (!move_uploaded_file($file['tmp_name'], $this->_Upload['savepath'] . '/' . $FileName)) {
            if (!copy($file['tmp_name'], $this->_Upload['savepath'] . '/' . $FileName)) {
                ErrorMsg::Debug('创建新文件失败');
            }
        }
        function_exists('chmod') && chmod($this->_Upload['savepath'] . '/' . $FileName, 0777);
        return array(
            'name' => $FileName,
            'url' => str_replace(WEB_PATH, '', $this->_Upload['savepath'] . '/' . $FileName),
            'size' => $this->_FileSize,
            'type' => $this->_FileType
        );
    }

    /**
     * WaterMark 为图片增加水印
     *
     * access      public
     */
    public function WaterMark($file) {
        // 是否安装了GD
        $gd = $this->GdVersion();
        // 文件是否存在
        if ((!file_exists($file)) || (!is_file($file))) {
            ErrorMsg::Debug('原文件不存在');
        }
        // 根据文件类型获得原始图片的操作句柄
        $source_info = getimagesize($file);
        $source_handle = $this->ImgResource($file);
        if (!$source_handle) {
            ErrorMsg::Debug('原文件句柄失败');
        }
        if (!empty($this->_Upload['watertext'])) {
            if ($source_info[0] > $source_info[1])
                $fontsize = ceil(ceil(($source_info[1] - ceil($source_info[1] / 10) * 2) * 3 / 4) * 3 / strlen($this->_Upload['watertext']));
            else
                $fontsize = ceil(ceil(($source_info[0] - ceil($source_info[0] / 10) * 2) * 3 / 4) * 3 / strlen($this->_Upload['watertext']));
            // 字体库
            $fontfilename = RESOURCES_PATH . '/fonts/simkai.ttf';
            // 获取字符串区域坐标
            $stringbox = ImageTTFBBox($fontsize, 0, $fontfilename, $this->_Upload['watertext']);
            // 字符串宽度
            $stringwidth = $stringbox[2] - $stringbox[0];
            // 字符串高度
            $stringheight = $stringbox[1] - $stringbox[7];
            // 字体颜色
            $fontcolor = ImageColorAllocateAlpha($source_handle, 255, 255, 255, 0);
            // 阴影颜色
            $shadecolor = ImageColorAllocateAlpha($source_handle, 0, 0, 0, 98);
            if ($this->_Upload['waterplace'] >= '7' && $this->_Upload['waterplace'] <= '9') {
                // 字符串右边坐标
                $stringright = $source_info[0] - 10;
                // 字符串左边坐标
                $stringleft = $stringright - $stringwidth;
                // 顶部字符串底部坐标
                $stringbottom = $source_info[1] - $source_info[1] + 10;
                // 顶部字符串顶部坐标
                $stringtop = $stringbottom + $stringheight;
            } elseif ($this->_Upload['waterplace'] >= '4' && $this->_Upload['waterplace'] <= '6') {
                // 字符串右边坐标
                $stringright = $source_info[0] - 10;
                // 字符串左边坐标
                $stringleft = $stringright - $stringwidth;
                // 中间字符串底部坐标
                $stringbottom = $source_info[1] - $source_info[1] / 2 + 10;
                // 中间字符串顶部坐标
                $stringtop = $stringbottom + $stringheight;
            } else {
                // 字符串底部坐标
                $stringbottom = $source_info[1] - 10;
                // 字符串顶部坐标
                $stringtop = $stringbottom - $stringheight;
            }
            // 绘制字符串
            ImageTTFText($source_handle, $fontsize, 0, $stringleft + 1, $stringtop + 1, $shadecolor, $fontfilename, $this->_Upload['watertext']);
            // 绘制字符串阴影
            ImageTTFText($source_handle, $fontsize, 0, $stringleft, $stringtop, $fontcolor, $fontfilename, $this->_Upload['watertext']);
        }
        if (file_exists($this->_Upload['waterfile'])) {
            // 获得水印文件以及源文件的信息
            $watermark_info = getimagesize($this->_Upload['waterfile']);
            $watermark_handle = imagecreatefrompng($this->_Upload['waterfile']);
            if (!$watermark_handle) {
                ErrorMsg::Debug('水印句柄失败');
            }
            // 根据系统设置获得水印的位置
            if ($source_info[0] - $watermark_info[0] > 10 && $source_info[1] - $watermark_info[1]) {
                switch ($this->_Upload['waterplace']) {
                    case '1':
                        $x = 5;
                        $y = 5;
                        break;
                    case '2':
                        $x = ($source_info[0] - $watermark_info[0]) / 2;
                        $y = 5;
                        break;
                    case '3':
                        $x = ($source_info[0] - $watermark_info[0]) - 5;
                        $y = 5;
                        break;
                    case '4':
                        $x = 5;
                        $y = ($source_info[1] - $watermark_info[1]) / 2;
                        break;
                    case '5':
                        $x = $source_info[0] / 2 - $watermark_info[0] / 2;
                        $y = $source_info[1] / 2 - $watermark_info[1] / 2;
                        break;
                    case '6':
                        $x = $source_info[0] - $watermark_info[0];
                        $y = ($source_info[1] - $watermark_info[1]) / 2;
                        break;
                    case '7':
                        $x = 5;
                        $y = $source_info[1] - $watermark_info[1] - 5;
                        break;
                    case '8':
                        $x = ($source_info[0] - $watermark_info[0]) / 2;
                        $y = $source_info[1] - $watermark_info[1] - 5;
                        break;
                    case '9':
                        $x = $source_info[0] - $watermark_info[0] - 5;
                        $y = $source_info[1] - $watermark_info[1] - 5;
                        break;
                    default:
                        $x = $source_info[0] / 2 - $watermark_info[0] / 2;
                        $y = $source_info[1] / 2 - $watermark_info[1] / 2;
                }
            }
            imageAlphaBlending($watermark_handle, true);
            imageAlphaBlending($source_handle, true);
            if ($gd == 2) {
                imagecopyresampled($source_handle, $watermark_handle, $x, $y, 0, 0, $watermark_info[0], $watermark_info[1], $watermark_info[0], $watermark_info[1]);
            } else {
                imagecopymerge($source_handle, $watermark_handle, $x, $y, 0, 0, $watermark_info[0], $watermark_info[1], $this->_Upload['wateralpha']);
            }
        }
        $this->ImgExport($source_handle, $file);
        imagedestroy($source_handle);
    }

    public function MakeDir($folder) {
        $reval = false;
        if (!file_exists($folder)) {
            /* 如果目录不存在则尝试创建该目录 */
            @umask(0);
            /* 将目录路径拆分成数组 */
            preg_match_all('/([^\/]*)\/?/i', $folder, $atmp);
            /* 如果第一个字符为/则当作物理路径处理 */
            $base = ($atmp[0][0] == '/') ? '/' : '';
            /* 遍历包含路径信息的数组 */
            foreach ($atmp[1] as $val) {
                if ('' != $val) {
                    $base.=$val;
                    if ('..' == $val || '.' == $val) {
                        /* 如果目录为.或者..则直接补/继续下一个循环 */
                        $base.='/';
                        continue;
                    }
                } else {
                    continue;
                }
                $base.='/';
                if (!@file_exists($base)) {
                    /* 尝试创建目录，如果创建失败则继续循环 */
                    if (function_exists('mkdir') && mkdir($base, 0777)) {
                        function_exists('chmod') && chmod($base, 0777);
                        $reval = true;
                    }
                }
            }
        } else {
            /* 路径已经存在。返回该路径是不是一个目录 */
            $reval = is_dir($folder);
        }
        clearstatcache();
        return $reval;
    }

    /**
     * GetSize 获得文件大小
     *
     * @param file $file
     * @return unknown
     */
    public function GetSize($file) {
        return $file['size'];
    }

    /**
     * GetType 获得文件类型
     *
     * @param file $file
     * @return unknown
     */
    public function GetType($file) {
        return $file['type'];
    }

    /**
     * GdVersion 获得服务器上的 GD 版本
     *
     * access      public
     * return      int         可能的值为0，1，2
     */
    public function GdVersion() {
        static $version = -1;
        if ($version >= 0) {
            return $version;
        }
        if (!extension_loaded('gd')) {
            $version = 0;
        } else {
            // 尝试使用gd_info函数
            if (PHP_VERSION >= '4.3' && function_exists('gd_info')) {
                $ver_info = gd_info();
                preg_match('/\d/', $ver_info['GD Version'], $match);
                $version = $match[0];
            } else {
                if (function_exists('imagecreatetruecolor')) {
                    $version = 2;
                } elseif (function_exists('imagecreate')) {
                    $version = 1;
                }
            }
        }
        return $version;
    }

    /**
     * ImgResource 根据来源文件的文件类型创建一个图像操作的标识符
     *
     * access  public
     * param   string      $img_file   图片文件的路径
     * param   string      $mime_type  图片文件的文件类型
     * return  resource    如果成功则返回图像操作标志符，反之则返回错误代码
     */
    public function ImgResource($file) {
        switch ($this->_FileType) {
            case 1:
            case 'image/gif':
                $res = imagecreatefromgif($file);
                break;
            case 2:
            case 'image/pjpeg':
            case 'image/jpeg':
                $res = imagecreatefromjpeg($file);
                break;
            case 3:
            case 'image/x-png':
            case 'image/png':
                $res = imagecreatefrompng($file);
                break;
            case 'image/bmp':
                $res = imagecreatefromwbmp($file);
                break;
            default:
                return false;
        }
        return $res;
    }

    /**
     * ImgExport 根据来源文件的文件类型创建一个图像操作的标识符
     *
     * access  public
     * param   string      $img_file   图片文件的路径
     * param   string      $mime_type  图片文件的文件类型
     * return  resource    如果成功则返回图像操作标志符，反之则返回错误代码
     */
    public function ImgExport($img, $name) {
        switch ($this->_FileType) {
            case 1:
            case 'image/gif':
                imagegif($img, $name, 100);
                break;
            case 2:
            case 'image/pjpeg':
            case 'image/jpeg':
                imagejpeg($img, $name, 100);
                break;
            case 3:
            case 'image/x-png':
            case 'image/png':
                imagepng($img, $name);
                break;
            case 'image/bmp':
                image2wbmp($img, $name);
                break;
            default:
                return false;
        }
    }

    /**
     * GetExt 获得新文件后缀
     *
     * @param file $img_file
     * @return unknown
     */
    public function GetExt($file) {
        if (in_array($this->_FileType, $this->_Upload['type'])) {
            switch ($this->_FileType) {
                case 'image/jpeg':
                case 'image/pjpeg':
                    $FileExt = '.jpg';
                    break;
                case 'image/png':
                case 'image/x-png':
                    $FileExt = '.png';
                    break;
                case 'image/gif':
                    $FileExt = '.gif';
                    break;
                case 'image/bmp':
                    $FileExt = '.bmp';
                    break;
                default:
                    $pathinfo = pathinfo($file['name']);
                    $FileExt = empty($pathinfo['extension']) ? substr($file['name'], strrpos($file['name'], '.')) : '.' . $pathinfo['extension'];
            }
        } else {
            $pathinfo = pathinfo($file['name']);
            $FileExt = empty($pathinfo['extension']) ? substr($file['name'], strrpos($file['name'], '.')) : '.' . $pathinfo['extension'];
        }
        return $FileExt;
    }

}