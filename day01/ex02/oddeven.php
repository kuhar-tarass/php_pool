#!/usr/bin/php
<?php
	
	while(1)
	{
		echo "Enter a number: ";
		if (($s = fgets(STDIN)) == NULL)
		{
			echo "\n";
			break;
		}
		$s = trim ($s, "\n");
		if(is_numeric($s))
		{
			if ($s%2 == 0)
				echo "The number $s is even\n";
			else
				echo "The number $s is odd\n";
		}
		else
		{
			echo "'$s'is not a number\n";
		}
	}
?>