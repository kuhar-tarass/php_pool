#!/usr/bin/php
<?php
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
	function prioritet($c){
		if (preg_match("/[a-z]/",$c))
				$pr = 1;
			else if (preg_match("/[0-9]/",$c))
				$pr = 2;
			else 
				$pr = 3;
		return ($pr);
	}
	function mycomp($a, $b){
		$alen = strlen($a);
		$blen = strlen($b);
		$a = mb_strtolower($a);
		$b = mb_strtolower($b);
		for($i = 0; $i < $alen && $i < $blen; $i++)
		{
			if ($a[$i] == $b[$i])
				continue;
			if (($pra = prioritet($a[$i])) == ($prb = prioritet($b[$i])))
				return $a[$i] > $b[$i] ? 1 : -1;
			else 
				return $pra > $prb ? 1 : -1;
		}
		if ($alen != $blen)
			return $alen > $blen ? 1 : -1;
		return 0;
	}
	$i = 1;
	$arr = ft_split($argv[$i]);
	while(++$i < $argc)
		$arr = array_merge($arr,ft_split($argv[$i]));
	usort($arr, "mycomp");
	foreach($arr as &$word)
		echo "$word\n";
?>
