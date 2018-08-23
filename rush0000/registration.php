<?php
		include_once("db/customer.php");
		session_start();
		if ($_SESSION['login'] != "") {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: index.php");
            exit();
		}
		if ($_POST['passwd'] == "" || $_POST['login'] == "" || $_POST['email'] == "") {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: regform.php");
            exit();
		}
		if ($_POST['passwd'] != $_POST['passwd1'])
		{
			$_SESSION['error_msg'] = "difpasswd";
			print_r ($_SESSION);
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: regform.php");
			exit();
		}
		$arr = getUsers();
		foreach($arr as $item) {
			if ($item['login'] == $_POST['login']){
				$_SESSION['error_msg'] = "login";
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: regform.php");
				exit();
			}
		}
		addUser($_POST['login'], $_POST['email'], $_POST['passwd']);
		$_SESSION['login'] = $_POST['login'];
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: index.php");
?>
