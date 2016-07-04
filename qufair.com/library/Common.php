<?php
// amespace Library\StringCodeClass;
class Common{
        public static function AttachUrl($file,$type='image'){
                switch($type){
                    case 'image':
                        if(empty($file)){
                            $file = '/attach/201508/16/143965918421061349.jpg';
                        }
                        $url = ATTACH_IMAGE . $file;
                        break;

                    case 'cdn':
                        if(empty($file)){
                            $file = '/attach/201508/16/143965918421061349.jpg';
                        }
                        $url = $file;
                        break;
                }
                return $url;
        }
        /*
         * 数组拆分
         */
        public static function arrayExplode($array,$num){
            $result = array();
            for($i=0;$i < ceil(count($array) / $num);$i++){
                $result[$i] = array_slice($array,$i*$num,$num,true);
            }
            return $result;
        }
}