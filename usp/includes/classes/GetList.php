<?php
//session_start();
class GetList extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
    
     
    function formFullInformation() {
		//$menuObj =  new Menu;
		$cond = " 1=1 "; 
		$query = " SELECT * FROM ".TBL_FORM1." ";
	
		$sql = $this->executeQry($query);
		$num = $this->getTotalRow($sql);
		
		$count=1;
		if($num > 0) {
		
		$genTable ='<table id="myTable">
								<tr>
									<th>S.No</th>
									<th>PCSN</th>
									<th>ACN Lead Name</th>
									<th>NTAP Lead Name</th>
									<th>DateTime</th>
									<th>Status</th>
									<th>View</th>									
								</tr>';
		//-------------------------Paging------------------------------------------------			
			$paging = $this->paging($query); 
			if(isset($_GET[limit]))
			{
				$this->setLimit($_GET[limit]); 			
				$recordsPerPage = $this->getLimit(); 
			}
			else{
				$this->setLimit(10);
				$recordsPerPage = 10;
			}
			$offset = $this->getOffset($_GET["page"]); 
			$this->setStyle("redheading"); 
			$this->setActiveStyle("smallheading"); 
			$this->setButtonStyle("boldcolor");
			$currQueryString = $this->getQueryString();
   			$this->setParameter($currQueryString);
			$totalrecords = $this->numrows;
			
			$totalpage = $this->getNoOfPages();
			$pagenumbers = $this->getPageNo();		

			//-------------------------Paging------------------------------------------------
		//	$recordsPerPage  = 10;
			$orderby = $_GET[orderby]? $_GET[orderby]:"packDate";
		    $order = $_GET[order]? $_GET[order]:"DESC";   
            $query .=  "LIMIT ".$offset.", ". $recordsPerPage;

				$sql = $this->executeQry($query);			
			if($num > 0) {	
	                     
				$i = $offset+1;	
				
					
				while($line = $this->getResultObject($sql)) {
				
					$status='';
					if($line->status == '0')
					{
						$status = 'Incomplete';
					}
					else
					{
						$status = 'Complete';
					}
					
					$id=base64_encode($line->form1_id);
					$genTable .= '
									<tr>
										<td>'.$count.'</td>
										<td>'.$line->pcsn_num.'</td>
										<td>'.$line->acn_lead.'</td>
										<td>'.$line->ntap_lead.'</td>
										<td>'.$line->created_date.'</td>
										<td>'.$status.'</td>
										<td><a href="form1.php?data='.$id.'">View Form</a></td>
									</tr>';
					
					$i++;	
				}
				
			$genTable.='</table>';
				
				
				switch($recordsPerPage)
				{
					 case 10:
					  $sel1 = "selected='selected'";
					  break;
					 case 50:
					  $sel2 = "selected='selected'";
					  break;
					 case 100:
					  $sel3 = "selected='selected'";
					  break;
					 case $this->numrows:
					  $sel4 = "selected='selected'";                                    
					  break;
				}
				$currQueryString = $this->getQueryString();
				$limit = basename($_SERVER['PHP_SELF'])."?".$currQueryString;
						
               			 $startLimit = $_GET["page"] * $recordsPerPage;
              			 $endLimit   = $recordsPerPage;

			if($totalrecords > 10)	
					{
						
				$genTable.="<div style='overflow:hidden; margin:0px 0px 0px 0px;width: 80%;'><table border='0' width='60%' height='50'>
						 <tr><td align='left' width='300' class='page_info' >
						 Display <select name='limit' id='limit' onchange='pagelimit(\"$limit\");' class='page_info' style='width:65px;'>
						 <option value='10' $sel1>10</option>
						 <option value='50' $sel2>50</option>
						 <option value='100' $sel3>100</option> 
						 <option value='".$totalrecords."' $sel4>All</option>  
						   </select> Records Per Page
						</td><td align='center' class='page_info'><inputtype='hidden' name='page' value='".$currpage."'></td><td 
						class='page_info' align='center' width='100'>".$totalrecords." records found</td><td width='0' 
						align='right'>".$pagenumbers."</td></tr></table>";				
                    
					}			
			}	
				
		} else {
			$genTable = '<div>&nbsp;</div><div class="Error-Msg">Sorry no records found</div>';
		}	
		$genTable.='</div>';
		return $genTable;
	}

		function getCategory(){     // for getting all country			
			$query = "SELECT * FROM ".TBL_EVENTCATEGORY." WHERE status=1";			
			$result = $this->executeQry($query);	
			$data = $this->db_fetch_assoc_array($result);			
			return $data;
		}	

		function getSubCategory($categoryId,$subCategoryId){     // for getting all country			
			$query = "SELECT * FROM ".TBL_EVENTSUBCATEGORY." WHERE categoryId = '".$categoryId."' and status=1";				
			$result = $this->executeQry($query);	
			$subCategory = $this->db_fetch_assoc_array($result); 
		
			$jsonStr= "<option value='' title='Select SubCategory' alt='Select SubCategory'>--Select SubCategory--</option>";

			foreach ($subCategory as $key => $value) 
			{	
				if ($subCategoryId ==  $value['subCategoryId']) 
					{
						$cond = 'selected=`selected`';					
					}  
				else 
					{							
						$cond = '';						
					}				 

				 $jsonStr .= "<option value='".$value['subCategoryId']."' ".$cond." title='".$value['subCategoryName']."' alt='".$value['subCategoryName']."'>".$value['subCategoryName']."</option>";	
			}
		
			echo $jsonStr;
		}	


		function getCountry(){     // for getting all country			
			$query = "SELECT * FROM ".TBL_COUNTRY." WHERE status=1";			
			$result = $this->executeQry($query);	
			$data = $this->db_fetch_assoc_array($result);			
			return $data;
		}	

		function getCity($countryId,$cityId){     // for getting all country			
			$query = "SELECT * FROM ".TBL_CITY." WHERE countryId = '".$countryId."' and status=1";	
		
			$result = $this->executeQry($query);	
			$city = $this->db_fetch_assoc_array($result); 		

			$jsonStr= "<option value='' title='Select City' alt='Select City'>--Select City--</option>";

			foreach ($city as $key => $value) 
			{	
				if ($cityId ==  $value['cityId']) 
					{
						$cond = 'selected=`selected`';					
					}  
				else 
					{							
						$cond = '';						
					}
				 

				 $jsonStr .= "<option value='".$value['cityId']."' ".$cond." title='".$value['cityName']."' alt='".$value['cityName']."'>".$value['cityName']."</option>";		 	
					
			}
		
			echo $jsonStr;
		}	


	function getEventById($eventId){
			$rst = $this->selectQry(TBL_EVENTS,"eventId='$eventId'","","");
			if($this->getTotalRow($rst)){
				return $this->getResultRow($rst);	
			}else{
				header("Location:manageEvent.php");
	            exit;
			}
		}
        
   function editRecord($post){
		/*echo"<pre>"; print_r($_POST);exit;	*/	
		  $this->tablename = TBL_EVENTS;
		  $eventId = base64_encode($post['eventId']);	
		  	
		  	$this->field_values['createdBy'] 		= $_SESSION['ADMIN_ID'];
			$this->field_values['eventName'] 		= $post['eventName'];
			$this->field_values['eventType'] 		= $post['eventType'];
			$this->field_values['categoryId'] 		= $post['category'];
			$this->field_values['subCategoryId'] 	= $post['subCategory'];
			$this->field_values['countryId'] 		= $post['countryList'];
			$this->field_values['cityId'] 			= $post['cityList'];
			$this->field_values['message'] 			= $post['message'];
			$this->field_values['latitude'] 		= $post['latitude'];
			$this->field_values['longitude'] 		= $post['longitude'];
			$this->field_values['eventLocation'] 	= $post['eventLocation'];
			$this->field_values['eventStartDate'] 	= $post['eventStartDate'];
			$this->field_values['eventEndDate'] 	= $post['eventEndDate'];
			$this->field_values['eventStartTime'] 	= $post['eventStartTime'];
			$this->field_values['eventEndTime'] 	= $post['eventEndTime'];
		 	
		  if(!empty($_FILES['eventImage']))
			{
					$created = time();
					
					$image_name = $_FILES['eventImage']['name'];
					$filename =strtolower(basename($image_name));
					$tmp_name = $_FILES['eventImage']['tmp_name'];

					$basepath = PATH;		
					$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));	
					if(!empty($tmp_name))
						{	
								$time_constant	= time();
								$image_name = str_replace(" ", "_",$image_name); 
								//image details for database
								$eventImage = 'images/event/main/'.$time_constant.'.'.$ext;

								$main_path 		= $basepath.$eventImage;
							
								list($width, $height, $type, $attr) = @getimagesize($main_path);							
								
								$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
								
								 if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) && ($_FILES["eventImage"]["size"] < 400000))
									{	
										if(@move_uploaded_file($tmp_name, $main_path)) 
										{									
											$this->field_values['eventImage'] = $eventImage;  
										}
									}
								 else 
									{									   
										$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: Only .jpg or .png files is allowed");	
										echo"<script>window.location.href='editEvent.php'</script>";
										exit;
									}
						}				
			}


			if(!empty($_FILES['eventVideo']))
				{
						$created = time();
						
						$videoName 		= 	$_FILES['eventVideo']['name'];
						$filename 		=	strtolower(basename($videoName));
						$tmp_name 		= 	$_FILES['eventVideo']['tmp_name'];
						$fileType 		=	strtolower($_FILES['eventVideo']['type']);
				
						$basepath = PATH;		
						$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));	
						if(!empty($tmp_name))
							{	
									$time_constant	= time();
									$image_name = str_replace(" ", "_",$image_name); 

									//image details for database
									$video 		= 'images/event/video/'.$time_constant.'.'.$ext;					
									$main_path 		= $basepath.$video;								
									
									 if ((($ext == "mp3") || ($ext == "mp4") || ($ext == "avi")) && ($_FILES["eventVideo"]["size"] < 400000))
										{										
											if(@move_uploaded_file($tmp_name, $main_path)) 
											{											
												$this->field_values['eventVideo'] = $video;
											}
										}
									 else 
										{									   
											$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: Only .mp3 .mp4 or .avi files is allowed");
											echo"<script>window.location.href='editEvent.php'</script>";
											exit;
										}
							}				
				}


	//	  $this->field_values['modby'] = $_SESSION['ADMIN_ID'];
		  $this->condition = "eventId='".$post['eventId']."'";
		  $res = $this->updateQry();
		  if($res)
		  {
		  	$_SESSION['SESS_MSG'] = msgSuccessFail("success","Event has been updated successfully!!!");	
		  }
		  redirect('manageEvent.php');
		  exit;		  
	 }
      
	function deleteValue($get){	
		$sql = " DELETE FROM ".TBL_EVENTS." WHERE eventId = '$get[eventId]' ";
		$rst = $this->executeQry($sql);
		/*if($rst){
				$this->logSuccessFail('1',$query);		
			}else{ 	
				$this->logSuccessFail('0',$query);
			}*/
		$_SESSION['SESS_MSG'] = msgSuccessFail("success","Your Information has been deleted successfully!!!");
		echo "<script language=javascript>window.location.href='manageEvent.php';</script>";
	}
        
 function changeStatus($get) 
{
  
    // print_r($get);
     $status= $this->fetchValue(TBL_EVENTS,"status"," 1 and eventId = '$get[eventId]'");

  		if($status==1) {

			$stat= 0;

			$status="Inactive";

		} else 	{

			$stat= 1;

			$status="Active";

		}

 		$query = "update ".TBL_EVENTS." set status = '$stat' where eventId = '$get[eventId]'";
                $this->executeQry($query); 
		echo $status;		
       }
        
   function deleteAllValues($post)
		{  
		if(($post[action] == ''))
		{
		    $_SESSION['SESS_MSG'] = msgSuccessFail("fail","First select the action or records, And then submit!!!");

			echo "<script language=javascript>window.location.href='manageEvent.php?keyword=$post[keyword]&limit=$post[limit]';</script>";
			exit;

		}				

		if($post[action] == 'deleteselected'){

			$delres = $post[chk];

			$numrec = count($delres);

			if($numrec>0){

				foreach($delres as $key => $val){				
                            $this->executeQry ("delete from ".TBL_EVENTS." where eventId = '$val'");
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

					$sql="UPDATE ".TBL_EVENTS." set status ='1' where eventId= '$val'";

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

		 	 $sql="UPDATE ".TBL_EVENTS." set status ='0' where eventId = '$val'";

					$rst = $this->executeQry($sql);

				}

				$_SESSION['SESS_MSG'] =msgSuccessFail("success","Disable selected successfully!!!");

			}else{

				$_SESSION['SESS_MSG'] =msgSuccessFail("fail","First select the record!!!");

			}

		}
	
          	echo "<script language=javascript>window.location.href='manageEvent.php?vendorName=$post[keyword]&limit=$post[limit]';</script>";

	}	
   
}


?>