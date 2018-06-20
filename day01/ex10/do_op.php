#!/usr/bin/php
<?php
	function incparam()
	{
		echo "Incorrect Parameters\n";
		exit;
	}
	if ($argc != 4 || !is_numeric(trim($argv[1])) || !is_numeric(trim($argv[3])))
		incparam();
	$argv[2]= trim($argv[2]);
	switch ($argv[2])
	{
		case "+":
			echo $argv[1]+$argv[3];
			break;
		case "-":
			echo $argv[1]-$argv[3];
			break;
		case "*":
			echo $argv[1]*$argv[3];
			break;
		case "/":
			if ($argv[3] == 0)
				incparam();
			echo $argv[1]/$argv[3];
			break;
		case "%":
			if (($argv[3] < 1 && $argv[3] > -1) || $argv[3] == 0)
				incparam();
			echo $argv[1]%$argv[3];
			break;
		default:
			incparam();
	}
	echo "\n";
?>
