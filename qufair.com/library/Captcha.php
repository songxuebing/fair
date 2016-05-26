<?php
#namespace Library\CaptchaClass;
class Captcha{
	public static function GetImg($type = 0, $length = 4, $lefttime = 900,$options=null){
		$authnum = array();
		switch ($type) {
			case 1:
				$seed = array('0','1','2','3','4','5','6','7','8','9');
				$foregroundTtf = array(
					RESOURCES_PATH."/fonts/simkai.ttf",
					RESOURCES_PATH."/fonts/simfang.ttf",
					RESOURCES_PATH."/fonts/simhei.ttf",
					RESOURCES_PATH."/fonts/times.ttf",
					RESOURCES_PATH."/fonts/stkaiti.ttf",
					RESOURCES_PATH."/fonts/heiti.ttf",
					RESOURCES_PATH."/fonts/anklepants.ttf",
					RESOURCES_PATH."/fonts/katana.ttf",
				);
				break;
			case 2:
				$seed = array(
					'A','B','C','D','E','F','G','H','I',
					'J','K','L','M','N','O','P','Q','R',
					'S','T','U','V','W','X','Y','Z',
					'a','b','c','d','e','f','g','h','i',
					'j','k','l','m','n','o','p','q','r',
					's','t','u','v','w','x','y','z'
				);
				$foregroundTtf = array(
					RESOURCES_PATH."/fonts/simkai.ttf",
					RESOURCES_PATH."/fonts/simfang.ttf",
					RESOURCES_PATH."/fonts/simhei.ttf",
					RESOURCES_PATH."/fonts/times.ttf",
					RESOURCES_PATH."/fonts/stkaiti.ttf",
					RESOURCES_PATH."/fonts/heiti.ttf",
					RESOURCES_PATH."/fonts/anklepants.ttf",
					RESOURCES_PATH."/fonts/katana.ttf",
				);
				break;
			case 3:
				$seed = array(
					"零","一","二","三","四","五","六","七","八","九","十",
					"鼠","牛","虎","兔","龙","蛇","马","羊","猴","鸡","狗","猪",
					"甲","乙","丙","丁","戊","己","庚","辛","壬","癸",
					"子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥",
					"金","木","水","火","土",
					"男","女","老","幼","公","母","阴","阳",
					"东","西","南","北","中","上","下","左","右",
					"厂","卜","人","入","几","儿","了","力","乃","刀","又",
					"于","干","亏","士","工","才","寸","大","丈","与","万","小","口","巾","山",
					"千","乞","川","亿","个","勺","久","凡","及","夕","丸","么","广","亡","门","义","之","尸","弓",
					"已","卫","也","飞","刃","习","叉","乡","丰","王","井","开","夫","天","无",
					"元","专","云","扎","艺","支","厅","不","太","犬","区","历","尤","友","匹","车","巨",
					"牙","屯","比","互","切","瓦","止","少","日","冈","贝","内","见","手","毛",
					"气","升","长","仁","什","片","仆","化","仇","币","仍","仅","斤","爪","反","介","父","从","今",
					"凶","分","乏","仓","月","氏","勿","欠","风","丹","匀","乌","凤","勾","文","方",
					"为","斗","忆","订","计","户","认","心","尺","引","巴","孔","队","办","以","允","予","劝",
					"双","书","幻","玉","刊","示","末","击","打","巧","正","扑","扒","功","扔","去","甘","世",
					"古","节","本","术","可","厉","石","布","平","灭","轧","卡","占",
				);
				$foregroundTtf = array(
					RESOURCES_PATH."/fonts/simkai.ttf",
					RESOURCES_PATH."/fonts/simfang.ttf",
					RESOURCES_PATH."/fonts/simhei.ttf",
					RESOURCES_PATH."/fonts/stkaiti.ttf",
					RESOURCES_PATH."/fonts/heiti.ttf",
				);
				break;
			default:
				$seed = array(
				'3','4','6','7','8','9',
				'A','B','C','D','E','F','G','H',
				'J','K','L','M','N','P','Q','R',
				'T','U','V','W','X','Y',
				);
				$foregroundTtf = array(
					RESOURCES_PATH."/fonts/simkai.ttf",
					RESOURCES_PATH."/fonts/simfang.ttf",
					RESOURCES_PATH."/fonts/simhei.ttf",
					RESOURCES_PATH."/fonts/times.ttf",
					RESOURCES_PATH."/fonts/stkaiti.ttf",
					RESOURCES_PATH."/fonts/heiti.ttf",
					RESOURCES_PATH."/fonts/anklepants.ttf",
					RESOURCES_PATH."/fonts/katana.ttf",
				);
		}
	
		mt_srand(doubleval(microtime()*1000000000));
		for ($i=0;$i<$length;$i++){
			mt_srand(doubleval(microtime()*1000000000));
			$authnum[] = $seed[mt_rand(0,count($seed)-1)];
		}
	
		$numstart = uniqid();
		$numend = uniqid();
		$name = empty($options['name']) ? '0' : $options['name'];
		
		Cookie::SetCookie("Code_{$name}",Cookie::FauthCode("{$numstart}\t".implode("",$authnum)."\t{$numend}", 'ENCODE'),NOW_TIME+600);
		
		//生成验证码图片
		//Header("Content-type: image/png");
		Header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
		Header("Pragma: no-cache");
                
		// 设置选项
		$width = isset($options['width']) ? $options['width'] : 100;
		$height = isset($options['height']) ? $options['height'] : 30;
		$font = isset($options['font']) ? $options['font'] : intval($height*0.6);
	
		$im = imagecreatetruecolor($width,$height);
		$black = ImageColorAllocate($im, 255,255,255);
		$border = ImageColorAllocate($im, 0,0,0);
		mt_srand(doubleval(microtime()*1000000000));
		$gray = array(
			ImageColorAllocate($im, mt_rand(1, 254), mt_rand(1, 254), mt_rand(1, 254)),
			ImageColorAllocate($im, mt_rand(1, 254), mt_rand(1, 254), mt_rand(1, 254)),
			ImageColorAllocate($im, mt_rand(1, 254), mt_rand(1, 254), mt_rand(1, 254)),
			ImageColorAllocate($im, mt_rand(1, 254), mt_rand(1, 254), mt_rand(1, 254)),
		);
		imagefill($im,0,0,$black);
	
		//imagestring($im, 14, 7, 2, $authnum, $gray);
		//加入干扰象素
		for($i=0;$i<$width/$length;$i++){
			mt_srand(doubleval(microtime()*1000000000));
			$gan = ImageColorAllocate($im, mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			mt_srand(doubleval(microtime()*1000000000));
			imagesetpixel($im, mt_rand(5,$width-5) , rand(5,$height-5) , $gan);
		}
		for($i=0;$i<6;$i++){
			mt_srand(doubleval(microtime()*1000000000));
			$gan = ImageColorAllocate($im, mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			mt_srand(doubleval(microtime()*1000000000));
			imageline($im, mt_rand(0, $width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $gan);
			imagesetpixel($im, mt_rand()%70 , mt_rand()%15 ,$gan);
		}
	
		//绘制文字
		for ($i=0;$i<$length;$i++){
			mt_srand(doubleval(microtime()*1000000000));
			ImageTTFText($im,$font*1.5,mt_rand(0-$height/2,$height/2),round($i*($width-$length*2)/$length+mt_rand(2*round($width/50),3*round($width/50))),mt_rand(round($height*0.7),round($height*0.9)),imagecolorallocate($im,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255)),$foregroundTtf[mt_rand(0,count($foregroundTtf)-1)],$seed[mt_rand(0,count($seed)-1)]);
			if($i == 0){
				ImageTTFText($im,$font,mt_rand(0-$height/2,$height/2),round($i*($width-$length*2)/$length+mt_rand(2*round($width/50),3*round($width/50))), mt_rand(round($height*0.7),round($height*0.9)),ImageColorAllocate($im,mt_rand(0,200),mt_rand(0,200),mt_rand(0,150)),$foregroundTtf[mt_rand(0,count($foregroundTtf)-1)],$authnum[$i]);
			}else{
				ImageTTFText($im,$font,mt_rand(0-$height/2,$height/2),round($i*($width-$length*2)/$length+mt_rand(2*round($width/50),3*round($width/50))), mt_rand(round($height*0.7),round($height*0.9)),ImageColorAllocate($im,mt_rand(0,200),mt_rand(0,200),mt_rand(0,150)),$foregroundTtf[mt_rand(0,count($foregroundTtf)-1)],$authnum[$i]);
			}
		}
	
		//边框
		imagerectangle($im, 0, 0, $width - 1, $height - 1, $border);
		imagepng($im);
		ImageDestroy($im);
	}
	
	/**
	 * GetCode解析验证码
	 *
	 * @param string $imgcode 输入的验证码
	 * @return boolean
	 * @example if(CaptchaImg::GetCode("输入验证码")){echo "正确";}else{echo "错误";}
	 */
	public static function GetCode($imgcode,$name = 0){
		$imgcode = StringCode::Semiangle($imgcode);
		$Code = Cookie::FauthCode(Cookie::GetCookie("Code_{$name}"),"DECODE");
		if(empty($Code)){
			return false;
		}
		//list($numstart,$authnum,$numend) = explode("\t",Cookie::FauthCode($Code,"DECODE"));
		$num = explode("\t",$Code);
		$imgcode = strtolower($imgcode);
		$authnum = empty($num[1]) ? '' : strtolower($num[1]);
		Cookie::SetCookie("Code_{$name}",'');
		if($imgcode == $authnum){return true;}
		return false;
	}
}