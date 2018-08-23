#!/usr/bin/php
<?php 
		// $timeSecond = strtotime('12 November 2013');
		// // $time = strtotime('12 November 2013 12:02:21');
		// $timeFirst = strtotime('January 1, 1970');
		// $differenceInSeconds = $timeSecond - $timeFirst;
		// echo "$differenceInSeconds\n";
		// echo "1384254141\n";
		print_r(strptime("1384254142", '%d/%m/%Y %H:%M:%S'));
		$format = '%d/%m/%Y %H:%M:%S';
		$strf = strftime($format);
		
		echo "$strf\n";
		
		print_r(strptime($strf, $format));
?>