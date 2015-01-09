<?php
ob_start();
session_start();
$action = $_GET['action'];
//$mode = $_GET['mode'];
$type = $_GET['type'];

/**************************** autoload the classes ****************/
require_once('config/configure.php');
require_once('includes/function/autoload.php');

if ($action == 'admin') {
 	$admObj = new AdminDetail;
	if($type == 'changestatus'){
		$admObj->changStatus($_GET);
	}
	if($type == 'delete'){
		$admObj->deleteRecord($_GET);
	}
}	


if ($action == 'getCity') {
 	$eventObj = new Event();   
 	$countryId = $_GET['countryId']; 
	if(!empty($countryId)){
		$eventObj->getCity($countryId);
	}
}

if ($action == 'getSubCategory') {
 	$eventObj = new Event();   
 	$categoryId = $_GET['categoryId']; 
	if(!empty($categoryId)){		
		$eventObj->getSubCategory($categoryId);  
	}
}

/// for Manage User
if ($action == 'manageUser') {
 	$userObj = new User();    
	if($type == 'changestatus'){
        $userObj->changeStatus($_GET);
                }
	if($type == 'delete'){
	
		$userObj->deleteValue($_GET);
	}
	if($type == 'deleteall'){
		if($_POST['Input']){
			$userObj->deleteAllValues($_POST);
		}else{
		header("Location:userlist.php?searchtxt=".$_POST['searchtext']);
                exit;
		}
	}

		if($type == 'screenshot_del'){ 
		
			$deleteId = $_GET['imgid'];		
			$table = $_GET['table'];		
			
			$qry = "SELECT image FROM ".$table." WHERE id = '".$deleteId."'";
			$res = mysql_query($qry);	
			$num = mysql_num_rows($res);		
			$row = mysql_fetch_assoc($res);						
			
			if($num > 0)
				{		
					if (file_exists(PATH . $row['image'])) {
						@chmod(PATH.$row['image'], 0755);					
						@unlink(PATH.$row['image']);

						@chmod(PATH.$row['imageSmall'], 0755);					
						@unlink(PATH.$row['imageSmall']);
						
						$fgtquery = "update ".$table." set image = '',imageSmall = '' where id =".$deleteId;
						mysql_query($fgtquery);
						$msg =  "Record has been deleted successfully";				
					}	
				}
			else{
				$msg =  "record not found.";				
			}
			echo $msg;
		}	

}


/// for Manage Evemt
if ($action == 'manageEvent') {
 	$eventObj = new Event();    
	if($type == 'changestatus'){
        $eventObj->changeStatus($_GET);
                }
	if($type == 'delete'){
	
		$eventObj->deleteValue($_GET);
	}
	if($type == 'deleteall'){
		if($_POST['Input']){
			$eventObj->deleteAllValues($_POST);
		}else{
		header("Location:manageEvent.php?searchtxt=".$_POST['searchtext']);
          	exit;
		}
	}

		if($type == 'screenshot_del'){ 
		
			$deleteId = $_GET['imgid'];		
			$table = $_GET['table'];		
			
			$qry = "SELECT image FROM ".$table." WHERE id = '".$deleteId."'";
			$res = mysql_query($qry);	
			$num = mysql_num_rows($res);		
			$row = mysql_fetch_assoc($res);						
			
			if($num > 0)
				{		
					if (file_exists(PATH . $row['image'])) {
						@chmod(PATH.$row['image'], 0755);					
						@unlink(PATH.$row['image']);

						@chmod(PATH.$row['imageSmall'], 0755);					
						@unlink(PATH.$row['imageSmall']);
						
						$fgtquery = "update ".$table." set image = '',imageSmall = '' where id =".$deleteId;
						mysql_query($fgtquery);
						$msg =  "Record has been deleted successfully";				
					}	
				}
			else{
				$msg =  "record not found.";				
			}
			echo $msg;
		}	

}


?>