<?php
	session_start();
	if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] == "OK")
	{
		$_SESSION["passwd"] = $_GET["passwd"];
		$_SESSION["login"] = $_GET["login"];
	}
?>
<html>
<body>
<form method="get">
	Username: <input type="text" name="login" value="<?php echo $_SESSION["login"]; ?>">
	<br>
	Password: <input type="password" name="passwd" value ="<?php echo $_SESSION["passwd"]; ?>">
	<input type="submit" name="submit" value="OK">
</form>
</body>
</html>
