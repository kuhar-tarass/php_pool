#!/usr/bin/php
<?php
	if ($argc == 1)
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
	
	$arr = ft_split($argv[1]);
	$i = 0;
	$length = count($arr);
	while (++$i < $length)
		echo "$arr[$i] ";
	echo "$arr[0]\n";
	//uiiiiiiiiiiiiiiiiiiii replace ??????
?>
