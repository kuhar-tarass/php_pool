<?php
function auth($login, $passwd)
{
	$arr = unserialize(file_get_contents("../private/passwd"));
	foreach($arr as $key => $value)
		if ($value['login'] == 	$login)
			if ($arr[$key]['passwd'] ==  hash("whirlpool" ,$passwd))
				return TRUE;
	return FALSE;
}
?>