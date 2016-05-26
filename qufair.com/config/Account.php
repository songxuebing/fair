<?php
$SearchCensor=Array(
	'account' => "/网管|管(.*?)理(.*?)员|超(.*?)管|中(.*?)工(.*?)科(.*?)技/i",
	'filter' => array(
		'find' => Array(
			0 => "/垃(.*?)圾(.*?)过(.*?)滤/i",
			1 => "/人(.*?)才|培(.*?)训/i"
		),
		'replace' => Array(
			0 => "**",
			1 => "**"
		)
	),
	'banword' => "/法轮功|黑暗社会/i"
);
function CheckAccount($string,$SearchCensor){
	if(!empty($SearchCensor['account'])&&preg_match($SearchCensor['account'],$string)){return false;}
	return $string;
}
function CheckIllegal($string,$SearchCensor){
	if(!empty($SearchCensor['banword'])&&preg_match($SearchCensor['banword'],$string)){return false;}
	if(!empty($SearchCensor['filter'])){return empty($SearchCensor['filter']) ? $string : preg_replace($SearchCensor['filter']['find'],$SearchCensor['filter']['replace'],$string);}
	return $string;
}
