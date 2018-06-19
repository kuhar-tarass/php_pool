#!/usr/bin/php
<?php
	function ft_split($str){
		$arr1 =  preg_split("/[\s,]+/", $str);
		$arr1 = explode(' ', $str);
		foreach($arr1 as $key => $value){
			if (strlen($value) == 0){
				unset($arr1[$key]);
			}
		}
		sort($arr1);
		return ($arr1);
	}
?>