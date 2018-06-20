#!/usr/bin/php
<?php
	function incparam()
	{
		echo "Incorrect Parameters\n";
		exit;
	}
	function sytaxE()
	{
		echo "Syntax Error\n";
		exit;
	}
	if ($argc != 2)
		incparam();
	preg_match_all("/[\-\+]?[0-9]+(?:\.[0-9])?+/", $argv[1], $num);
	$num1 = $num[0][0];
	$num2 = $num[0][1];
	$argv[1] = str_replace( "&","",$argv[1], $count);
	$argv[1] = preg_replace( "/[\-\+]?[0-9]+(?:\.[0-9])?+/","&",$argv[1]);
	$argv[1] = preg_replace("/[\s]/", "", $argv[1]);
	if (strlen($argv[1]) > 3 || $count != 0)
		sytaxE();
	$symb = strlen($argv[1]) == 2 ? "+" : $argv[1][1];
	switch ($symb)
	{
		case "+":
			echo $num1+$num2; 
			break;
		case "-":
			echo $num1-$num2; 
			break;
		case "*":
			echo $num1*$num2; 
			break;
		case "/":
			if ($num2 == 0)
				incparam();
			echo $num1/$num2; 
			break;
		case "%":
			if (($num2 < 1 && $num2 > -1) || $num2 == 0)
				incparam();
			echo $num1%$num2; 
			break;
		default:
			sytaxE();
	}
	echo "\n";
?>
