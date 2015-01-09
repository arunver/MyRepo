<?php
/*---Basic for Each Page Starts----*/
session_id();
ob_start();
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();

if(isset($_SESSION['ADMIN_ID']))
{	
	header('location:adminArea.php');
}

if(isset($_POST['submitLogin'])) {	
	$loginObj->adminLogin($_POST);
}

if(isset($_POST['submitSignup'])) {	
	header('location:signup.php');
}

/*---Basic for Each Page Ends----*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" src="js/validation.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login to enter into <?=SITENAME?> administrative panel</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body onload="displayCursor()">
<div id="header">
	<div id="header-left"><?=SITENAME?>&nbsp;<!-- (<a href="../" target="_blank">View site &raquo;</a>) --></div>
<div id="header-right"><a href="index.php">Login</a></div>
</div>
<form name="frmLogin" method="post" action="" onsubmit="return validationLogin()">
	<div id="login-box">
	
		<label for="username" class="error_message"><?php /*?><?=$_SESSION['SESS_MSG']?><?php */?></label><br />
	
	<label for="username">Username</label>
		<br /><input type="text"  name="userName" id="userName" class="input-box" value="<?php /*?><?=$_POST['userName']?><?php */?>"/><br />
		<br /><label for="password">Password</label><br />
		<input type="password"  name="userPassword" id="userPassword" class="input-box"  value=""/><br />
		<br />
		<div>			
			<span class="add-top-padd">
				<input type="checkbox" class="checkbox" id="rememberUser" name="rememberUser">
				<label for="remember-me">Remember User</label>				
			</span>
				<a href="signup.php" class="input-button" name="signup" style="text-decoration:none;">SignUp</a>
				<input type="submit" value="Log In" class="input-button" name="submitLogin" />
		</div>
	</div>
</form>
<div id="lost-password"><a href="lostPassword.php">Lost your password?</a></div>
</body>
</html>
<? unset($_SESSION['SESS_MSG']); ?>