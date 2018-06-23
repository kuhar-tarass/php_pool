<?php
	if ($_POST['login'] == NULL || $_POST['passwd'] == NULL || $_POST['submit'] !== "OK")
		werror();
	if (!file_exists("../private/"))
		mkdir("../private/");
	if (file_exists("../private/passwd"))
	{
		$arr = unserialize(file_get_contents("../private/passwd"));
		foreach($arr as $key => $value)
			if ($value['login'] == 	$_POST['login'])
				{
					echo "ERROR\n";
					return ;
				}
	}
	else
		$key = -1;
	$arr[$key+1]['login'] = $_POST['login'];
	$arr[$key+1]['passwd'] = hash("whirlpool" ,$_POST['passwd']);
	// $arr[$key+1]['passwd'] = $_POST['passwd'];
	file_put_contents("../private/passwd",serialize($arr));
	echo "OK\n";
?>