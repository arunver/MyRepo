<?
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();

$loginObj->checkSession();
$pageName = getPageName();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
  // site head js include here 
 include('includes/head.php'); ?>             
</head>
<body>
<? 
include('includes/header.php'); 

?>
<div id="nav-under-bg"><!-- --></div>
<div class="welcome-text">Welcome to Administrative Panel of <?=SITENAME?></div>
<div style="margin-top:20px;"><?php /*?><? echo $_SESSION['SESS_MSG']; unset($_SESSION['SESS_MSG']); ?><?php */?></div>
<form name="ecartFrm" method="post" action="pass.php?action=Welcommit&type=generatexml">
					
	<?php
		//echo $commitObj->valDetail(0);
	?>
</form>
<hr width="600" size="20" color="#999999"/>

<form name="ecartFrm" method="post" action="">
		
	<?php
		//echo $commitObj->valDetail(1);
	?>
</table>	 
</form>
</body>
</html>