<title> Headphone's shop </title>
<link rel="stylesheet" href="style.css">
<?php
	session_start();
    if ($_SESSION['login'] != "") {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: index.php");
        exit();
    }
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header><a href="index.php">Headphone's shop</a></header>
	<div class="login-box">
		<form name="login" method="POST" action="login.php"> 
			<h1> Sign in </h1>
            <?php if ($_SESSION['error_msg'] != NULL ) { ?>
                <div id="errorbox">
                    <?php if ($_SESSION['error_msg'] == 'incpasswd') { ?>
                        <p>Try again</p>
                    <?php } ?>
                </div>
                <?php $_SESSION['error_msg'] = NULL; } ?>
			<div class="login">
				<p> Login </p>
				<input type="text" name="login" required="required">
			</div>
			<div class="password">
				<p> Password </p>
				<input type="password" name="passwd" required="required">
			</div>
			<button id="login_button" type="submit" name="submit" value="LogIN">
			LogIN
			</button>
		</form>
        <div id="create_acc">
            or<br>
            <a href="regform.php"> Create your account</a>
        </div>
	</div>
</body>
</html>