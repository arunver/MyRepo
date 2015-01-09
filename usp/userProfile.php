<?php
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');
$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();

/*---Basic for Each Page Ends----*/
$userObj = new User();
$uid  = $_GET['uid']?$_GET['uid']:0;
$uid = base64_decode($uid);
$result = $userObj->getUserById($uid);
$result = displayWithStripslashes($result);
/*echo "<pre>";
print_r($result);
exit;*/
switch($result[userType])
  {
    case 1:
        $type = "admin";
      break;
    case 2:
        $type = "advertiser";
      break;                        
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <? include('includes/head.php'); ?>
</head>
<body>
  <? include('includes/header.php'); ?>
  <div id="nav-under-bg"><!-- --></div>

<table cellspacing="0" cellpadding="0" border="0" align="center">
<tbody><tr><td> 

<div class="main-body-div-new">
         <div class="main-body-div-header">User Profile</div>
<!-- left position -->
<div class="main-body-div4" id="mainDiv"> 
   

  <div class="add-main-body-left-new" style="position:relative;">
   <?php
 // echo $editLink = '<a href="editUser.php?uid='.base64_encode($_SESSION['ADMIN_ID']).'&page='.$page.'" title="Edit Advertiser"> Edit Advertiser</a> || ';
    
 ?>
    <ul>
      <li class="label">User Name <span class="spancolor"> </span></li>
      <li class="sap"><?php echo $result[userName] ? $result[userName] : "--";  ?></li>
      <li class="label">User Type <span class="spancolor"> </span></li>
      <li class="sap"><?php echo $type ? $type : "--";  ?></li>      
	  <li class="label">Email Id<span class="spancolor"> </span></li>
      <li class="sap"><?php echo $result[emailId] ? $result[emailId] : "--";	?></li>	
	  <li class="label">User Type<span class="spancolor"> </span></li>
      <li class="sap"><?php echo $type ? $type : "--";	?></li>	
	  
      <li class="label">User Image<span class="spancolor"> </span></li>
      <?php 
      echo '<li class="sap"><a href="'.(!empty($result[image]) ? $result[image] : 'images/noimage.jpg').'" title="'.ucwords($result[userName]).'"><img width="60px" height="60px" src="'.(!empty($result[image]) ? $result[image] : 'images/noimage.jpg').'" border="0"></a></li>';  
      ?>
       
    <li class="label">Company Name<span class="spancolor"> </span></li>
      <li class="sap"><?php echo $result[companyName] ? $result[companyName] : "--";  ?></li>   
	  <li class="label">Phone No <span class="spancolor"> </span></li>
      <li class="sap"><?php echo $result[phoneNo] ? $result[phoneNo] : "--";	?></li>
	  <li class="label">Register Date<span class="spancolor"> </span></li>
      <li class="sap"><?php echo date(DEFAULTDATEFORMAT,strtotime($result[registerDate]));	?></li>

    </ul>
  </div>
  <div class="main-body-sub">&nbsp;</div>
</div>
</div>
		
<!-- End SmartWizard Content -->  		
 		
</td></tr>
</tbody></table>


</body>
</html>
