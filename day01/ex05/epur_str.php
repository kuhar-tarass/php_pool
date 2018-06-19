#!/usr/bin/php
<?php
	if ($argc != 2)
		exit ;
	$i = strlen($argv[1]);
	$j = -1;
	$alpha = 0;
	$space = 0;
	while(++$j < $i)
	{
		if ($argv[1][$j] == ' ')
		{
			$space = 1;
			continue;
		}
		else
		{
			if ($space == 1 && $alpha)
				echo ' ';
			$space = 0;
			echo $argv[1][$j];
			$alpha = 1;
		}
	}
	echo "\n";
?>