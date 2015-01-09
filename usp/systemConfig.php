<?
/*---Basic for Each Page Starts----*/
session_start();
require_once('../config/configure.php');
require_once('includes/function/autoload.php');
$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();
$menuObj = new Menu();
$menuObj->checkPermission();
/*---Basic for Each Page Starts----*/

$sysObj = new SystemConfig();

if(isset($_POST['submit'])) {

  	$sysObj->addConfiguration($_POST,$_FILES);
}
//echo $_SESSION['CURRENTMENUID'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome To <?=SITENAME?> administrative panel</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script language="javascript" src="js/requiredValidation.js"></script>
<script type="text/javascript">
  function show_value(){
	var sum1 = document.configUser.Allow_user_to_show_identification.length;
	     for (var i=0; i < sum1; i++) {
               if (document.configUser.Allow_user_to_show_identification[0].checked)
			          document.getElementById("ident").style.display='';
			   if (document.configUser.Allow_user_to_show_identification[1].checked)
			          document.getElementById("ident").style.display='none';
			   
         }
  }
</script>
</head>
<body onload="show_value();">
<? include('includes/header.php'); ?>
<div id="nav-under-bg"><!-- --></div>
	<div class="main-body-div-less-width">
	<form name="configUser" id="configUser" method="post" onsubmit="javascript: return validateFrm(this);" enctype="multipart/form-data">
	<div>
		<div class="main-body-div-header">Config Setting</div>
		<div class="main-body-div4" id="mainDiv"><br />
	
	
<div align="center" style="padding-top:20px;">

	<div style="width:400px" align="left">
	<? if($_SESSION['SESS_MSG'] != "") { ?>	
    	<div class="add-main-body-left-new-text" style="clear:both; width:500px;" ><span class="small_error_message">
		    <? echo $_SESSION['SESS_MSG']; unset($_SESSION['SESS_MSG']); ?>
	    </span></div>				  
	<? } ?>
	<fieldset style="width:350px;border:1px solid #6F0229; margin-bottom:10px;"><legend style="color:#000000;"><b>&nbsp;General Configuration&nbsp;</b></legend>
	<div>Site Name :&nbsp;
		<input name="SITE_NAME" id="SITE_NAME" type="text" value="<?=stripslashes($sysObj->fetchValue(TBL_SYSTEMCONFIG,"systemVal","1 and systemName = 'SITE_NAME'"))?>" class="wel" />
	</div>
		<div>Admin Email :&nbsp;
		<input name="ADMIN_EMAIL" id="ADMIN_EMAIL" type="text" value="<?=stripslashes($sysObj->fetchValue(TBL_SYSTEMCONFIG,"systemVal","1 and systemName = 'ADMIN_EMAIL'"))?>" class="wel" />
	</div>
	
	<div>Phone No. :&nbsp;
		<input name="PHONE_NO" id="PHONE_NO" type="text" value="<?=stripslashes($sysObj->fetchValue(TBL_SYSTEMCONFIG,"systemVal","1 and systemName = 'PHONE_NO'"))?>" class="wel" />
	</div>
	
	</fieldset>
	
	
	
	
	
	
 </div>
</div>	
	
	
	<div class="main-body-sub" style="text-align:center; margin-left:0px">			
			<input type="submit" class="main-body-sub-submit" style="cursor:pointer;" name="submit" value="Submit" />&nbsp;
			<input type="button" name="back" id="back" value="Back" class="main-body-sub-submit" style="cursor:pointer;" onClick="hrefBack()"/>
		</div>
	</div>
</div>
</form>
	</div>
<div id="divTemp" style="display:none;"></div>
</body>
</html>
