<?php session_start();
ob_start();

require_once('config/configure.php');
require_once('includes/function/autoload.php');
$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();
$userObj = new User();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
  // site head js include here 
 include_once('includes/head.php'); ?>             
</head>
<body>
<?php 
  //site header include here 
 include_once('includes/header.php'); ?>
<div id="nav-under-bg">
  <!-- -->
</div>
<form name="userFrm" method="post" action="pass.php?action=manageUser&type=deleteall">
  <div class="main-body-div-width">
    <div class="main-body-div-header">
      <div class="main-body-header-text-top">Manage User&nbsp;</div>
  
      <span class="main-body-adduser"><b>    
       <!--a href="addUser.php">Add  New User</a-->

      </b></span> </div>
    <div>&nbsp;</div>

    <div id="search-main-div">
      <ul>
        <!-- <li class="selectall">
          <div id="check"> <a href="javascript:void(NULL)" class="buttontext" onclick='javascript:checkAllCheckboxes(document.ecartFrm);'>Select All</a></div>
          <div id="uncheck" style="display:none;"><a href="javascript:void(NULL)" class="buttontext" onclick='javascript:uncheckAllCheckboxes(document.ecartFrm);'>Unselect All</a></div>
        </li> -->
        <li class="action">Action:</li>
        <li>
          <select name="action">
            <option value="">Select Action</option>            
            <option value="deleteselected">Delete Selected</option>          
            <option value="enableall">Enable Selected</option>
            <option value="disableall">Disable Selected</option>
            
          </select>
        <li>
          <input name="Input" type="submit" value="Submit"  class="" />
        </li>
        <li >
          <input name="searchtext" type="text" class="adminsearch" value="<?=$searchtxt= $_GET['searchtxt']?$_GET['searchtxt']:SEARCHTEXT?>" onclick="clickclear(this, '<?=SEARCHTEXT?>')" onblur="clickrecall(this,'<?=SEARCHTEXT?>')"/>
        </li>
        <li>
          <input name="GO" type="submit" value="GO"  class=""/>
        </li>
        <li class="showall"><a href="userlist.php">Reset</a></li>
      </ul>
    </div>
    <div style="margin-top:20px;">
      <? 
        echo $_SESSION['SESS_MSG']; 
        unset($_SESSION['SESS_MSG']); 
      ?>
    </div>

<?php 

  if($_SESSION['ADMIN_TYPE'] == 2 || $_SESSION['ADMIN_TYPE'] == 3){
		header('location:userProfile.php?uid='.base64_encode($_SESSION['ADMIN_ID']));
  }
  else{
?>
    <div class="main-body-content-text-div">
      <ul style="text-align:center;">
        <li style="width:50px;">
          <!-- <input type="checkbox" name="checkall" onclick="javascript:checkAllCheckboxes(document.ecartFrm)" disabled="disabled" class="checkbox"> -->
           <input type="checkbox" name="checkall" id="checkall" class="checkbox">
        </li>
        <li style="width:50px;">SL.No</li>
        <li style="width:100px;">User Name</li>      
        <li style="width:200px;">
          <?=orderBy("userlist.php?searchtxt=$searchtxt","email","Email")?>
        </li>
          <!--li style="width:100px;"> Image</li-->
          <li style="width:110px;">User Type</li>
          <li style="width:50px;">Status</li>
          <li style="width:50px;">View</li>        
          <!--li style="width:50px;">Delete</li-->
      </ul>
    </div>
    <?php echo $userObj->userFullInformation();
 }	
 ?>


  </div>
</form>
</body>
</html>
