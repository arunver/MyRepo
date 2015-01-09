<?php
ob_start();
session_start();
require_once('../config/configure.php');
require_once('includes/function/autoload.php');
$loginObj = new Login();
//$loginObj->checkSession();
$pageName = getPageName();
$userObj = new User();
$generalObj = new GeneralFunctions();
require_once('validation_class.php');
$obj = new validationclass();
if(isset($_POST['submit'])) {
  //echo"<pre>"; print_r($_POST);exit;

	$_POST = postwithoutspace($_POST);
   
  $obj->fnAdd('userName',$_POST['userName'], 'req', 'Please Enter UserName.');     
  $obj->fnAdd('firstName',$_POST['firstName'], 'req', 'Please Enter first Name.');     
  $obj->fnAdd('lastName',$_POST['lastName'], 'req', 'Please Enter Last Name.');       
	$obj->fnAdd('email',$_POST['email'], 'req', 'Please Enter Email.');
	$obj->fnAdd("email", $_POST["email"], "email", "Please enter valid Email.");
  $obj->fnAdd('password',$_POST['password'], 'req', 'Please Enter Password.');  
  $obj->fnAdd('phoneNo',$_POST['phoneNo'], 'req', 'Please Enter a Phone No.');  
  $obj->fnAdd('phoneNo',$_POST['phoneNo'], 'mobile', 'Please Enter a Valid Phone No.'); 

	$arr_error = $obj->fnValidate();
  
  if(!$obj->matchPasswords($_POST['password'],$_POST['conPassword']))
  {
     $arr_error['conPassword'] = 'Confirm Password should be match';
  }

	$str_validate = (count($arr_error)) ? 0 : 1;	

	$arr_error[userName]     =   $obj->fnGetErr($arr_error[userName]);
  $arr_error[firstName]    =   $obj->fnGetErr($arr_error[firstName]);
  $arr_error[lastName]     =   $obj->fnGetErr($arr_error[lastName]);   
	$arr_error[email]        =   $obj->fnGetErr($arr_error[email]);
  $arr_error[password]     =   $obj->fnGetErr($arr_error[password]);
  $arr_error[phoneNo]     =   $obj->fnGetErr($arr_error[phoneNo]);
	
//	echo"<pre>"; print_r($arr_error);exit;
	if($str_validate){ // if error array is empty		
		$userObj->addAdvertiserUser($_POST);
	}	
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

  <form name="frmUser" id="frmUser" method="post" onsubmit="javascript: return validateFrm(this);" enctype="multipart/form-data">
		<div class="main-body-div-new">
          <div class="main-body-div-header">Sign Up</div>
		  <!-- left position -->
        
            <div class="main-body-div4" id="mainDiv">
              <div class="add-main-body-left-new">
                <ul>
				  
                  <li class="add-main-body-left-new-text" style="clear:both; width:500px;" ><span class="small_error_message">
                    <?php echo $_SESSION['SESS_MSG']?>
                  </span></li><br />
				  
		   <li class="label">User Name <span class="spancolor">*</span></li>
                  <li>
                    <input type="text" name="userName" id="m__userName" class="wel" value="<?=stripslashes($_POST[userName])?>" />
                    <p style="padding-left:150px;"><?php echo $arr_error[userName]?></p>
                  </li>

        <li class="label">First Name <span class="spancolor">*</span></li>
                  <li>
                    <input type="text" name="firstName" id="m__firstName" class="wel" value="<?=stripslashes($_POST[firstName])?>" />
                    <p style="padding-left:150px;"><?php echo $arr_error[firstName]?></p>
                  </li>  
                  
       <li class="label">Last Name <span class="spancolor">*</span></li>
                  <li>
                    <input type="text" name="lastName" id="m__lastName" class="wel" value="<?=stripslashes($_POST[lastName])?>" />
                    <p style="padding-left:150px;"><?php echo $arr_error[lastName]?></p>
                  </li> 

			 <li class="label">Email <span class="spancolor">*</span></li>
                  <li>
                    <input type="text" name="email" id="m__email" class="wel" value="<?=stripslashes($_POST[email])?>" />
                    <p style="padding-left:150px;"><?php echo $arr_error[email]?></p>
                  </li>

      <li class="label">Password <span class="spancolor">*</span></li>
                  <li>
                    <input type="text" name="password" id="m__password" class="wel" value="<?=stripslashes($_POST[password])?>" />
                    <p style="padding-left:150px;"><?php echo $arr_error[password]?></p>
                  </li>  
                  
       <li class="label">Confirm Password <span class="spancolor">*</span></li>
                  <li>
                    <input type="text" name="conPassword" id="m__conPassword" class="wel" value="<?=stripslashes($_POST[conPassword])?>" />
                    <p style="padding-left:150px;"><?=$arr_error[conPassword]?></p>
                  </li>                      
				 
      <li class="label">Company Name</li>
                  <li>
                    <input type="text" name="companyName" id="companyName" class="wel" value="<?=stripslashes($_POST[companyName])?>" />
                  </li> 
  
       <li class="label">Phone No <span class="spancolor">*</span></li>
                  <li>
                    <input type="text" name="phoneNo" id="m__phoneNo" class="wel" value="<?=stripslashes($_POST[phoneNo])?>" />
                    <p style="padding-left:150px;"><?php echo $arr_error[phoneNo]?></p>
                  </li> 

      <li class="label">Advertiser Image <span class="spancolor"></span></li>
                  <li>
                    <input type="file" name="advertiserImage" id="advertiserImage" class="wel"/>
                  </li>			
                    		  
                </ul>
              </div>
              <div class="main-body-sub">
                <input type="submit" name="submit" class="main-body-sub-submit" style="cursor:pointer;" value="Submit" />
                &nbsp;
                <input type="button" name="back" id="back" value="Back" class="main-body-sub-submit" style="cursor:pointer;"  onclick="javascript:;goBack('index.php');"/>
              </div>
            </div>
</div>
</form>
    <div id="divTemp" style="display:none;"></div> 
<? unset($_SESSION['SESS_MSG']); ?>