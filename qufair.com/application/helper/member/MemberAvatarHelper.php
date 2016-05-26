<?php
class MemberAvatarHelper extends Helper{
	var $MemberModel;
        var $SupplierModel;
	public function __construct(){
		$this->MemberModel=$this->LoadModel('Member');
                $this->SupplierModel = $this->LoadModel('Supplier');
	}
	public function GetId($Id='0'){
		Cache::Set('member','detail',NOW_TIME,0);
		if(!$MemberRowCache=Cache::Get('id_'.$Id)){
			$where=array();
			$where['`id` = ?']=$Id;
			$MemberRow=$this->MemberModel->GetRow($where);

			if(!empty($MemberRow['id'])){
				$where=array();
				$where['`id` = ?']=$MemberRow['id'];
				$MemberDetailRow=$this->MemberModel->DetailGetRow($where);
                                unset($MemberDetailRow['mobile']);
				foreach($MemberDetailRow as $key=>$value){
					$MemberRow[$key]=$value;
				}
			}
			Cache::Save('id_'.$Id,$MemberRow);
		}else{
			$MemberRow=$MemberRowCache;
		}
		return $MemberRow;
	}
	public function GetAvatar($Id='0',$width,$height){
		$MemberRow = $this->GetId($Id);
		Header('Cache-Control:private, post-check=3600,pre-check=3600,max-age=3600');
		Header('Pragma:public');
		if(empty($MemberRow['avatar']) || empty($MemberRow['id'])){
			$File = STYLE_URL.'/style/image/common/noavatar.gif';
		}else{
			$File = $MemberRow['avatar'];
		}
		
		if(class_exists('Imagick')){
			$Imagick=new Imagick($File);
			$type=strtolower($Imagick->getImageFormat());
		
			$org_info[0] = $Imagick->getImageWidth();
			$org_info[1] = $Imagick->getImageHeight();
			$scale_org=$org_info[0]/$org_info[1];
			if(empty($width) && empty($height)){
				$width=$org_info[0];
				$height=$org_info[1];
			}elseif(empty($width)){
				$width=$height*$scale_org;
			}elseif(empty($height)){
				$height=$width/$scale_org;
			}
		
			if($scale_org>1){
				// 原始图片比较宽，这时以宽度为准
				if($org_info[0] <= $width){
					$width=$org_info[0];
				}
				$height=$width*(1/$scale_org);
			}else{
				// 原始图片比较高，则以高度为准
				if($org_info[1] <= $height){
					$height=$org_info[1];
				}
				$width=$height*$scale_org;
			}
		
			Header('Content-type: '.$type);
			if($type=='gif'){
				$image=$Imagick;
				$images=$image->coalesceImages();
				$canvas=new Imagick();
				foreach($images as $frame){
					$imgs=new Imagick();
					$imgs->readImageBlob($frame);
					$imgs->thumbnailImage($width,$height,true);
					$canvas->addImage($imgs);
					$canvas->setImageDelay($imgs->getImageDelay());
				}
				$image->destroy();
				$Imagick=$canvas;
			}else{
				$Imagick->thumbnailImage($width,$height,false);
			}
			if(!empty($_GET['gray'])){
				$Imagick->levelImage(0);
			}
			echo $Imagick->getImagesBlob();
		}else{
			$org_info=getimagesize($File);
			Header('Content-type: '.$org_info['mime']);
			if(!extension_loaded('gd')){
				$gd=0;
			}else{
				// 尝试使用gd_info函数
				if(PHP_VERSION>='4.3' && function_exists('gd_info')){
					$ver_info=gd_info();
					preg_match('/\d/',$ver_info['GD Version'],$match);
					$gd=$match[0];
				}else{
					if(function_exists('imagecreatedtruecolor')){
						$gd=2;
					}elseif(function_exists('imagecreated')){
						$gd=1;
					}
				}
			}
			switch($org_info['mime']){
				case 'image/gif':
					$img_org=imagecreatefromgif($File);
					break;
				case 'image/pjpeg':
				case 'image/jpeg':
					$img_org=imagecreatefromjpeg($File);
					break;
				case 'image/x-png':
				case 'image/png':
					$img_org=imagecreatefrompng($File);
					break;
				case 'image/bmp':
					$img_org=imagecreatefromwbmp($File);
					break;
				default:
					die('类型错误');
			}
			
			$scale_org=$org_info[0]/$org_info[1];
			if(empty($width)){
				$width=$height*$scale_org;
			}
			if(empty($height)){
				$height=$width/$scale_org;
			}
			if($scale_org>1){
				// 原始图片比较宽，这时以宽度为准
				if($org_info[0] <= $width){
					$width=$org_info[0];
				}
				$height=$width*(1/$scale_org);
			}else{
				// 原始图片比较高，则以高度为准
				if($org_info[1] <= $height){
					$height=$org_info[1];
				}
				$width=$height*$scale_org;
			}

			if($gd==2){
				$img=imagecreatetruecolor($width,$height);
			}else{
				$img=imagecreate($width,$height);
			}
			
			$dst_x=($org_info[0]-$width)/2;
			$width=($org_info[0]+$width)/2;
			$dst_y=($org_info[1]-$height)/2;
			$height=($org_info[1]+$height)/2;
			if($gd==2){
				imagecopyresampled($img,$img_org,0,0,$dst_x,$dst_y,$width,$height,$org_info[0],$org_info[1]);
			}else{
				imagecopyresized($img,$img_org,0,0,$dst_x,$dst_y,$width,$height,$org_info[0],$org_info[1]);
			}
		
			if(!empty($_GET['gray'])){
				for ($y = 0; $y <$height; $y++) {
					for ($x = 0; $x <$width; $x++) {
						$gray = (ImageColorAt($img, $x, $y) >> 8) & 0xFF;
						imagesetpixel ($img, $x, $y, ImageColorAllocate ($img,$gray,$gray,$gray));
					}
				}
			}
		
			imagepng($img);
			ImageDestroy($img);
		}
	}
}