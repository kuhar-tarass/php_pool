#!/usr/bin/php
<?php
	if ($argv < 1)
		exit;
		function ft_split($str){
		$arr1 =  preg_split("/[\s,]+/", $str);
		// $arr1 = explode(' ', $str);
		foreach($arr1 as $key => $value){
			if (strlen($value) == 0){
				unset($arr1[$key]);
			}
		}
		return ($arr1);
	}
	$i = 1;
	$arr = ft_split($argv[$i]);
	while(++$i < $argc)
		$arr = array_merge($arr,ft_split($argv[$i]));
	natsort($arr);
	foreach($arr as &$word)
		echo "$word\n";
?>
