<?php
ob_start();
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
<style>
	table#myTable {
		overflow:hidden;
		border:1px solid #d3d3d3;
		background:#fefefe;
		width:80%;		
		margin-top:30px;
		border-spacing: 0;
		-moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
		-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
		
	}
	
/* #### New Changes in table of entities end#### */
	
	#myTable th {padding:10px;text-align:left;text-shadow: 1px 1px 1px #fff; background:#e8eaeb;border-right:1px solid #ccc;}
	
	#myTable td {
		font-size:1em;
		padding-left:10px;
		padding-top:5px;
		padding-bottom:5px;
		border-top:1px solid #e0e0e0; 
		border-right:1px solid #e0e0e0;
		zoom:1;
	}
	
	#myTable tr.odd-row td {background:#f6f6f6;}
	
	#myTable td.first, th.first {text-align:left}
	
	#myTable td.last {border-right:none;}
	
	/*
	Background gradients are completely unnecessary but a neat effect.
	*/
	
	#myTable td {
		background: -moz-linear-gradient(100% 25% 90deg, #fefefe, #f9f9f9);
		background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f9f9f9), to(#fefefe));
		zoom:1;
	}
	
	#myTable tr.odd-row td {
		background: -moz-linear-gradient(100% 25% 90deg, #f6f6f6, #f1f1f1);
		background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f1f1f1), to(#f6f6f6));
	}
	
	#myTable th {
		background: -moz-linear-gradient(100% 20% 90deg, #e8eaeb, #ededed);
		background: -webkit-gradient(linear, 0% 0%, 0% 20%, from(#ededed), to(#e8eaeb));
	}
	
	
	
	#myTable tr:first-child th.first {
		-moz-border-radius-topleft:5px;
		-webkit-border-top-left-radius:5px; /* Saf3-4 */
	}
	
	#myTable tr:first-child th.last {
		-moz-border-radius-topright:5px;
		-webkit-border-top-right-radius:5px; /* Saf3-4 */
	}
	
	#myTable tr:last-child td.first {
		-moz-border-radius-bottomleft:5px;
		-webkit-border-bottom-left-radius:5px; /* Saf3-4 */
	}
	
	#myTable tr:last-child td.last {
		-moz-border-radius-bottomright:5px;
		-webkit-border-bottom-right-radius:5px; /* Saf3-4 */
	}
	
	#myTable a:hover
	{
		text-decoration: none;
	}
	
	#myTable a:hover
	{
		font-size:12px;
		font-weight:normal;
		text-decoration: none;
	}


</style> 
</head>
<body>
<? 
include('includes/header.php'); 
$getList = new GetList();


?>
<div id="nav-under-bg"><!-- --></div>
<div class="welcome-text">List of Forms </div>
<div style="margin-top:20px;"><?php /*?><? echo $_SESSION['SESS_MSG']; unset($_SESSION['SESS_MSG']); ?><?php */?></div>
<form name="ecartFrm" method="post" action="">
					
	
</form>
<hr width="600" size="20" color="#999999"/>
<div id="outerDiv1" style="margin-left:250px;width: 80%;">
<?php		
		echo $getList->formFullInformation();
	?>	
	
</body>
</html>