<?php
	function checkusr($passwd)
	{
		$oldpasswd = hash("whirlpool" ,$_POST['oldpw']);
		return($passwd == $oldpasswd ? TRUE : FALSE);
	}
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === "OK")
	{
		$arr = unserialize(file_get_contents("../private/passwd"));
		foreach($arr as $key => $value)
			if ($value['login'] == 	$_POST['login'])
			{
				if (checkusr($value['passwd']))
				{
					$arr[$key]['passwd'] = hash("whirlpool" ,$_POST['newpw']);
					// $arr[$key]['passwd'] = $_POST['newpw'];
					file_put_contents("../private/passwd",serialize($arr));
					echo "OK\n";
					return ;
				}
			}
	}
	echo "ERROR\n";

?>