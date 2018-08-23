<html>
	<head>
		<title> Headphone's shop</title>
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
<header><a href="index.php">Headphone's shop</a></header>
<div class="reg-box">
<?php
	session_start();
    if ($_SESSION['login'] != "") {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: index.php");
        exit();
    }
	if ($_SESSION['error_msg'] != NULL )
	{
		?>
		<div id="errorbox">
			<?php if ($_SESSION['error_msg'] == 'difpasswd')
			{
					?>
				<p>Passwords do not match!</p>
				<?php
				}
				?>
			<?php if ($_SESSION['error_msg'] == 'login')
			{
					?>
				<p>Such a login exists, try the other one!</p>
				<?php
				}
				?>
		</div>
		
	<?php
		$_SESSION['error_msg'] = NULL;
	}
?>

		<h1>Create account</h1>
		<form name="registration" method="POST" action="registration.php"> 
		<div class="login">
			<p> Login </p>
			<input type="text" name="login" required="required">
		</div>
        <div class="login">
            <p> Email </p>
            <input type="email" name="email" required="required">
        </div>
		<div class="password">
			<p> Password </p>
			<input type="password" name="passwd" required="required">
		</div>
		<div id="2" class="password">
			<p> Re-enter password</p>
			<input type="password" name="passwd1" required="required">
		</div>
		<button id='reg_button' type="submit" name="submit" value="Confirm"> 
				Create your account 
		</button>
		</form>
	</div>
</body>
</html>