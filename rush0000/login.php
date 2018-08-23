<?php
        include_once("db/customer.php");
        include_once("db/db.php");
		session_start();
        if ($_SESSION['login'] != "") {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: index.php");
            exit();
        }
		if ($_POST['submit'] !== "LogIN")
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: loginform.php");
			exit ;
		}
        $arr = getUsers();

        foreach($arr as $item) {
            if ($item['login'] == $_POST['login']){
                echo $item['passwd'] . "</br>";
                echo shop_hash($_POST['passwd']) . "</br>";
                if ($item['passwd'] == shop_hash($_POST['passwd'])) {
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['role'] = $item['role'];
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: index.php");
                    exit ;
                }
            }
        }
		$_SESSION['error_msg'] = "incpasswd";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: loginform.php");
?>