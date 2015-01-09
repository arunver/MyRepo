<?php
//session_start();
class User extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
        
    function addAdvertiserUser($post)
		{
			/*echo "<pre>";
			print_r($_POST);
			exit;*/
	         
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_ADMINUSER;	
			$this->field_values['userType'] = 2;
			$this->field_values['userName'] = $post['userName'];
			$this->field_values['firstName'] = $post['firstName'];
			$this->field_values['lastName'] = $post['lastName'];
			$this->field_values['email'] = $post['email'];
			$this->field_values['password'] = md5($post['password']);
			$this->field_values['companyName'] = $post['companyName'];
			$this->field_values['phoneNo'] = $post['phoneNo'];
			$this->field_values['registerDate'] = $now;
			$this->field_values['lastLogin'] = $now;

			if(!empty($_FILES['advertiserImage']))
			{
					$created = time();
					
					$image_name = $_FILES['advertiserImage']['name'];
					$filename =strtolower(basename($image_name));
					$tmp_name = $_FILES['advertiserImage']['tmp_name'];

					$basepath = PATH;		
					$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));	
					if(!empty($tmp_name))
						{	
								$time_constant	= time();
								$image_name = str_replace(" ", "_",$image_name); 
								//image details for database
								$image 		= 'images/user/main/'.$time_constant.'.'.$ext;
								$imageThumb = 'images/user/thumb/'.$time_constant.'.'.$ext;
					
								$main_path 		= $basepath.$image;
								$thumb_path 	= $basepath.$imageThumb;
								
								list($width, $height, $type, $attr) = @getimagesize($main_path);							
								
								$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
								
								 if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) && ($_FILES["advertiserImage"]["size"] < 400000))
									{										
										if(@move_uploaded_file($tmp_name, $main_path)) 
										{
											create_thumb_imagemagic($main_path,320,460,$thumb_path);											
											$this->field_values['image'] = $image;
											$this->field_values['imageSmall'] = $thumb_path;
										}
									}
								 else 
									{									   
										$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: Only .jpg or .png files is allowed");	
										echo"<script>window.location.href='signup.php'</script>";
										exit;
									}
						}

				
			}
			
			
			 $res = $this->insertQry();
	               if($res){
	               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Advertiser has been added successfully!!!");	
	                   echo"<script>window.location.href='signup.php'</script>";
	                   exit;
	               }
		}
        
	function encrypt_password($plain)
        {
		$password = '';
		for ($i=0; $i<10; $i++) {
			$password .= $this->tep_rand();
		}
		$salt = substr(md5($password), 0, 2);
		$password = md5($salt . $plain) . ':' . $salt;
		return $password;
	}
	
    function tep_rand($min = null, $max = null) {
	    static $seeded;
    	if (!$seeded) {
	      mt_srand((double)microtime()*1000000);
    	  $seeded = true;
    	}
	}
        
    function userFullInformation() {   
		//$menuObj =  new Menu;
		$cond = " 1=1 "; 
		if($_SESSION['ADMIN_TYPE'] == 1)
		{
			$cond .= " AND id != '".$_SESSION['ADMIN_ID']."'"; 
		}
		if($_REQUEST['searchtxt'] && $_REQUEST['searchtxt'] != SEARCHTEXT){
			$searchtxt = $_REQUEST['searchtxt'];
			$cond .= " AND (userName LIKE '%$searchtxt%' OR emailId LIKE '%$searchtxt%')  ";			
		}
		$query = " SELECT * FROM ".TBL_ADMINUSER." WHERE $cond";
				
		$sql = $this->executeQry($query);
		$num = $this->getTotalRow($sql);
		
		$page =  $_REQUEST['page']?$_REQUEST['page']:1;
		if($num > 0) {			
			//-------------------------Paging------------------------------------------------			
			$paging = $this->paging($query); 
			$this->setLimit($_GET[limit]); 
			$recordsPerPage = $this->getLimit(); 
			$offset = $this->getOffset($_GET["page"]); 
			$this->setStyle("redheading"); 
			$this->setActiveStyle("smallheading"); 
			$this->setButtonStyle("boldcolor");
			$currQueryString = $this->getQueryString();
   			$this->setParameter($currQueryString);
			$totalrecords = $this->numrows;
			$currpage = $this->getPage();
			$totalpage = $this->getNoOfPages();
			$pagenumbers = $this->getPageNo();			
			//-------------------------Paging------------------------------------------------
			
			$orderby = $_GET[orderby]? $_GET[orderby]:"registerDate";
		    $order = $_GET[order]? $_GET[order]:"DESC";   
            $query .=  " ORDER BY $orderby $order LIMIT ".$offset.", ". $recordsPerPage;

          //  echo $query;exit;
				$sql = $this->executeQry($query);			
			if($num > 0) {			
				$i = $offset+1;			
				while($line = $this->getResultObject($sql)) {
					$highlight = $i%2==0?"main-body-bynic":"main-body-bynic2";
					$div_id = "status".$line->id;
					if ($line->status==0)
						$status = "InActive";
					elseif($line->status==1)
						$status = "Active";
					elseif($line->status==2)
						$status = "Deleted";
					else
						$status = "Banned";
						
					switch ($line->userType)
						{
							case 1:
				  				$type = "admin";
				 				break;
							case 2:
				  				$type = "netapp";
				 				break;	
							case 3:
							$type = "accenture";
							break;								
						}
					
					$genTable .= '<div class="'.$highlight.'">
								   <ul>
								 	<li style="width:50px;">&nbsp;&nbsp;&nbsp;<input name="chk[]" value="'.$line->id.'" type="checkbox" 
									class="checkbox"></li>
									<li style="width:30px;">'.$i.'</li>			
									<li style="width:100px;">'.stripslashes($line->userName).'</li>								
									<li style="width:160px;">'.stripslashes($line->emailId).'</li>
									<li style="width:80px;height:80px;"><a href="'.(!empty($line->image) ? $line->image : 'images/noimage.jpg').'" title="'.ucwords($line->username).'"><img width="60px" height="60px" src="'.(!empty($line->image) ? $line->image : 'images/noimage.jpg').'" border="0"></a></li>
									
									<li style="width:80px;">'.$type.'</li>';
										
						$genTable .= '<li id='.$div_id.' style="width:50px; cursor:pointer;" onClick="javascript:changeStatus(\''.$div_id.'\',\''.$line->id.'\',\'manageUser\')">'.$status.'</li>';
			
					
					$genTable .= '<li style="width:50px;">';
					$genTable .= '<a rel="shadowbox;width=705;height=490" title="'.stripslashes($line->fullName).'" href="viewUser.php?uid='.base64_encode($line->id).'"><img src="images/view.png" alt="View" width="16" height="16" border="0" /></a>';		

				
					$genTable .= '</li><li style="width:50px;">';
								
					$genTable .= "<a href='javascript:void(NULL);'  onClick=\"if(confirm('Are you sure to delete this Record  ?')){window.location.href='pass.php?action=manageUser&type=delete&id=".$line->id."&page=$page'}else{}\" ><img src='images/drop.png' height='16' width='16' border='0' title='Delete' /></a>";

					$genTable .= '</li></ul></div>';
					$i++;	
				}
				switch($recordsPerPage)
				{
					 case 10:
					  $sel1 = "selected='selected'";
					  break;
					 case 20:
					  $sel2 = "selected='selected'";
					  break;
					 case 30:
					  $sel3 = "selected='selected'";
					  break;
					 case $this->numrows:
					  $sel4 = "selected='selected'";
					  break;
				}
				$currQueryString = $this->getQueryString();
				$limit = basename($_SERVER['PHP_SELF'])."?".$currQueryString;
				$genTable.="<div style='overflow:hidden; margin:0px 0px 0px 50px;'><table border='0' width='88%' height='50'>
					 <tr><td align='left' width='300' class='page_info' 'style=margin-left=20px;'>
					 Display <select name='limit' id='limit' onchange='pagelimit(\"$limit\");' class='page_info'>
					 <option value='10' $sel1>10</option>
					 <option value='20' $sel2>20</option>
					 <option value='30' $sel3>30</option> 
					 <option value='".$totalrecords."' $sel4>All</option>  
					   </select> Records Per Page
					</td><td align='center' class='page_info'><inputtype='hidden' name='page' value='".$currpage."'></td><td 
					class='page_info' align='center' width='200'>Total ".$totalrecords." records found</td><td width='0' 
					align='right'>".$pagenumbers."</td></tr></table></div>";
			}					
		} else {
			$genTable = '<div>&nbsp;</div><div class="Error-Msg">Sorry no records found</div>';
		}	
		return $genTable;
	}


function getUserById($userId){
		$rst = $this->selectQry(TBL_ADMINUSER,"id='$userId'","","");
		if($this->getTotalRow($rst)){
			return $this->getResultRow($rst);	
		}else{
			header("Location:manageUser.php");
                        exit;
		}
	}
        
       function editRecord($post){
		/*echo"<pre>"; print_r($_POST);exit;	*/	
		  $this->tablename = TBL_ADMINUSER;
		  $uid=base64_encode($post['userId']);		 
		  $this->field_values['userName'] = $post['userName'];
		  $this->field_values['firstName'] = $post['firstName'];
		  $this->field_values['lastName'] = $post['lastName'];
		  $this->field_values['email'] = $post['email'];
		  $this->field_values['companyName'] = $post['companyName'];
		  $this->field_values['phoneNo'] = $post['phoneNo'];
		 	
		  if(!empty($_FILES['advertiserImage']))
			{
					$created = time();
										
					$image_name = $_FILES['advertiserImage']['name'];
					$filename =strtolower(basename($image_name));
					$tmp_name = $_FILES['advertiserImage']['tmp_name'];

					$basepath = PATH;		
					$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));	
					if(!empty($tmp_name))
						{	
								$time_constant	= time();
								$image_name = str_replace(" ", "_",$image_name); 
								//image details for database
								$image 		= 'images/user/main/'.$time_constant.'.'.$ext;
								$imageThumb = 'images/user/thumb/'.$time_constant.'.'.$ext;
					
								$main_path 		= $basepath.$image;
								$thumb_path 	= $basepath.$imageThumb;
								
								list($width, $height, $type, $attr) = @getimagesize($main_path);							
								
								$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
								
								 if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) && ($_FILES["advertiserImage"]["size"] < 400000))
									{										
										if(@move_uploaded_file($tmp_name, $main_path)) 
										{
											create_thumb_imagemagic($main_path,320,460,$thumb_path);											
											$this->field_values['image'] = $image;
											$this->field_values['imageSmall'] = $thumb_path;
										}
									}
								 else 
									{									   
										$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: Only .jpg or .png files is allowed");	
										echo"<script>window.location.href='addUser.php'</script>";
										exit;
									}
						}

				
			}


	//	  $this->field_values['modby'] = $_SESSION['ADMIN_ID'];
		  $this->condition = "id='".$post['userId']."'";
		  $res = $this->updateQry();
		  if($res)
		  {
		  	$_SESSION['SESS_MSG'] = msgSuccessFail("success","User has been updated successfully!!!");	
		  }
		  redirect('userlist.php');
		  exit;		  
	 }
      
	function deleteValue($get){	
		$sql = " DELETE FROM ".TBL_ADMINUSER." WHERE id = '$get[id]' ";
		$rst = $this->executeQry($sql);
		/*if($rst){
				$this->logSuccessFail('1',$query);		
			}else{ 	
				$this->logSuccessFail('0',$query);
			}*/
		$_SESSION['SESS_MSG'] = msgSuccessFail("success","Your Information has been deleted successfully!!!");
		echo "<script language=javascript>window.location.href='userlist.php';</script>";
	}
        
 function changeStatus($get) 
{
  
    // print_r($get);
     $status= $this->fetchValue(TBL_ADMINUSER,"status"," 1 and id = '$get[id]'");

  		if($status==1) {

			$stat= 0;

			$status="Inactive";

		} else 	{

			$stat= 1;

			$status="Active";

		}

 		$query = "update ".TBL_ADMINUSER." set status = '$stat' where id = '$get[id]'";

        $this->executeQry($query); 
		echo $status;		
       }
        
   function deleteAllValues($post)
		{  
		if(($post[action] == ''))
		{
		    $_SESSION['SESS_MSG'] = msgSuccessFail("fail","First select the action or records, And then submit!!!");

			echo "<script language=javascript>window.location.href='userlist.php?keyword=$post[keyword]&limit=$post[limit]';</script>";
			exit;

		}				

		if($post[action] == 'deleteselected'){

			$delres = $post[chk];

			$numrec = count($delres);

			if($numrec>0){

				foreach($delres as $key => $val){				
                            $this->executeQry ("delete from ".TBL_ADMINUSER." where id = '$val'");
				}

				$_SESSION['SESS_MSG'] =msgSuccessFail("success","Your all selected information has been deleted successfully!!!");

			}else{

			    $_SESSION['SESS_MSG'] =msgSuccessFail("fail","First select the record!!!");

			}

		}

		if($post[action] == 'enableall'){

			$delres = $post[chk];

			$numrec = count($delres);

			if($numrec>0){

				foreach($delres as $key => $val){

					$sql="UPDATE ".TBL_ADMINUSER." set status ='1' where id='$val'";

					$rst = $this->executeQry($sql);

				}

				$_SESSION['SESS_MSG'] =msgSuccessFail("success","Enable selected successfully!!!");

			}else{

			    $_SESSION['SESS_MSG'] =msgSuccessFail("fail","First select the record!!!");

			}

		}

		if($post[action] == 'disableall'){
		       
            $delres = $post[chk];            
			$numrec = count($delres);

			if($numrec>0){

				foreach($delres as $key => $val){

		 	 $sql="UPDATE ".TBL_ADMINUSER." set status ='0' where id='$val'";

					$rst = $this->executeQry($sql);

				}

				$_SESSION['SESS_MSG'] =msgSuccessFail("success","Disable selected successfully!!!");

			}else{

				$_SESSION['SESS_MSG'] =msgSuccessFail("fail","First select the record!!!");

			}

		}
	
                echo "<script language=javascript>window.location.href='userlist.php?vendorName=$post[keyword]&limit=$post[limit]';</script>";

	}	
   
}


?>