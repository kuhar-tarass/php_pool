<?php
		if ($_GET["action"] == "set")
		{
			$name = $_GET["name"];
			setcookie("$name", $_GET["value"]);
		}
		if ($_GET["action"] == "get")
		{
			$name = $_GET["name"];
			if ($_COOKIE[$name] !== NULL)
				echo "$_COOKIE[$name]"."\n";
		}
		if ($_GET["action"] == "del")
		{
			$name = $_GET["name"];
			setcookie("$name", "", time() - 3600);
		}
?>