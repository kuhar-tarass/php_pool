#!/usr/bin/php
<?php
	if ($argc < 3)
		exit();
	for($i = 2; $i < $argc; $i++)
	{
		$tmp = explode(":",$argv[$i]);
		$arr[$tmp[0]] = $tmp[1];
	}
	foreach($arr as $key => $value)
		if ($key == $argv[1])
			echo "$value\n";
?>
