<?php
//session_start();
class Form3 extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
      
	function updateForm3($post)
		{
			/*  
				echo "<pre>";
				print_r($_POST);
				exit; 
			*/ 
			$this->field_values['form3_id'] = $_SESSION['form1_id'];
			
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM3;		

			$ussfileName 	= $_FILES["uss_file"]["name"]; 
			$ussSource 		= $_FILES["uss_file"]["tmp_name"];
			$ussType 		= $_FILES["uss_file"]["type"];
			$ussSize 		= $_FILES["uss_file"]["size"]/1024;    // In KB 
						
			
			if(!empty($_FILES['uss_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['uss_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($ussfileName, ".");
					$begin = substr($ussfileName, 0, $pos);
					
					$end = substr($ussfileName, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$uss_file = 'customer/form3/USS/'.$doc_name.'.'.$ext;
						
						$main_path = $basepath.$uss_file;

						list($width, $height, $ussType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($ussSize  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['uss_file'] = $uss_file;  
									$this->field_values['uss_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
				
			$sitePrepFile = $_FILES["site_prep_file"]["name"]; 
			$sitePrepSource = $_FILES["site_prep_file"]["tmp_name"];
			$sitePrepType = $_FILES["site_prep_file"]["type"];
			$sitePrepSize = $_FILES["site_prep_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['site_prep_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['site_prep_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($sitePrepFile, ".");
					$begin = substr($sitePrepFile, 0, $pos);
					$end = substr($sitePrepFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$site_prep_file = 'customer/form3/SitePreparation/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$site_prep_file;

						list($width, $height, $sitePrepType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($sitePrepSize  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['site_prep_file'] = $site_prep_file;  
									$this->field_values['site_prep_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			$ntapInstallFile = $_FILES["ntap_install_file"]["name"]; 
			$ntapInstallSource = $_FILES["ntap_install_file"]["tmp_name"];
			$ntapInstallType = $_FILES["ntap_install_file"]["type"];
			$ntapInstallSize = $_FILES["ntap_install_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['ntap_install_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['ntap_install_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($ntapInstallFile, ".");
					$begin = substr($ntapInstallFile, 0, $pos);
					$end = substr($ntapInstallFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$ntap_install_file = 'customer/form3/NetAppInstallGuide/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$ntap_install_file;

						list($width, $height, $ntapInstallType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($ntapInstallSize  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['ntap_install_file'] = $ntap_install_file;  
									$this->field_values['ntap_install_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			$siteConfFile = $_FILES["site_conf_file"]["name"]; 
			$siteConfSource = $_FILES["site_conf_file"]["tmp_name"];
			$siteConfType = $_FILES["site_conf_file"]["type"];
			$siteConfSize = $_FILES["site_conf_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['site_conf_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['site_conf_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($siteConfFile, ".");
					$begin = substr($siteConfFile, 0, $pos);
					$end = substr($siteConfFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$site_conf_file = 'customer/form3/SiteConfigGuide/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$site_conf_file;

						list($width, $height, $siteConfType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($siteConfSize  < 4000000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['site_conf_file'] = $site_conf_file;  
									$this->field_values['site_conf_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			$bomFile = $_FILES["bom_file"]["name"]; 
			$bomSource = $_FILES["bom_file"]["tmp_name"];
			$bomType = $_FILES["bom_file"]["type"];
			$bomSize = $_FILES["bom_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['bom_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['bom_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($bomFile, ".");
					$begin = substr($bomFile, 0, $pos);
					$end = substr($bomFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$bom_file = 'customer/form3/BOM/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$bom_file;

						list($width, $height, $bomType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($bomSize  < 4000000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['bom_file'] = $bom_file;  
									$this->field_values['bom_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			
			

			$this->field_values['form3_id'] = $_SESSION['form1_id'];

			if(isset($post['acn_siteprep_flag']))
				{
					$this->field_values['acn_site_prep_flag'] = $post['acn_siteprep_flag']; 
					$this->field_values['acn_site_prep_date'] = $now; 
				}
			else
			{
				$this->field_values['acn_site_prep_flag'] = 'off'; 
				$this->field_values['acn_site_prep_date'] = '1970-01-01 12:00:00'; 
			}
			
			if(isset($post['acn_approve_doc']))
				{
					$this->field_values['acn_approve_doc'] = $post['acn_approve_doc']; 
					$this->field_values['acn_approve_date'] = $now; 
				}
			else
			{
				$this->field_values['acn_approve_doc'] = 'off'; 
				$this->field_values['acn_approve_date'] = '1970-01-01 12:00:00'; 
			}
				
			if(isset($post['ntap_approve_doc']))
				{
					$this->field_values['ntap_approve_doc'] = $post['ntap_approve_doc']; 
					$this->field_values['ntap_approve_date'] = $now; 
				}
			else
			{
				$this->field_values['ntap_approve_doc'] = 'off';
					$this->field_values['ntap_approve_date'] = '1970-01-01 12:00:00'; 
			}
			
			/* 
				echo "<pre>";
				print_r($this->field_values);
				exit; 
			*/   
			$res = $this->updateQry();
	               if($res){
	               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form3 data has been updated successfully!!!");	
	                   echo"<script>window.location.href='form4.php'</script>";
	                   exit;
	               }
		}

	  
    function addForm3($post)
		{
			/*  echo "<pre>";
			 print_r($_POST);
			 exit; */ 

	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM3;		
			$this->field_values['form3_id'] = $_SESSION['form1_id'];

			$ussfileName = $_FILES["uss_file"]["name"]; 
			$ussSource = $_FILES["uss_file"]["tmp_name"];
			$ussType = $_FILES["uss_file"]["type"];
			$ussSize = $_FILES["uss_file"]["size"]/1024;    // In KB 
			
			
			
				if(!empty($_FILES['uss_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['uss_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($ussfileName, ".");
					$begin = substr($ussfileName, 0, $pos);
					
					$end = substr($ussfileName, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$uss_file = 'customer/form3/USS/'.$doc_name.'.'.$ext;
						
						$main_path = $basepath.$uss_file;

						list($width, $height, $ussType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($ussSize  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['uss_file'] = $uss_file;  
									$this->field_values['uss_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
				
			$sitePrepFile = $_FILES["site_prep_file"]["name"]; 
			$sitePrepSource = $_FILES["site_prep_file"]["tmp_name"];
			$sitePrepType = $_FILES["site_prep_file"]["type"];
			$sitePrepSize = $_FILES["site_prep_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['site_prep_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['site_prep_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($sitePrepFile, ".");
					$begin = substr($sitePrepFile, 0, $pos);
					$end = substr($sitePrepFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$site_prep_file = 'customer/form3/SitePreparation/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$site_prep_file;

						list($width, $height, $sitePrepType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($sitePrepSize  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['site_prep_file'] = $site_prep_file;  
									$this->field_values['site_prep_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			$ntapInstallFile = $_FILES["ntap_install_file"]["name"]; 
			$ntapInstallSource = $_FILES["ntap_install_file"]["tmp_name"];
			$ntapInstallType = $_FILES["ntap_install_file"]["type"];
			$ntapInstallSize = $_FILES["ntap_install_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['ntap_install_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['ntap_install_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($ntapInstallFile, ".");
					$begin = substr($ntapInstallFile, 0, $pos);
					$end = substr($ntapInstallFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$ntap_install_file = 'customer/form3/NetAppInstallGuide/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$ntap_install_file;

						list($width, $height, $ntapInstallType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($ntapInstallSize  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['ntap_install_file'] = $ntap_install_file;  
									$this->field_values['ntap_install_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			$siteConfFile = $_FILES["site_conf_file"]["name"]; 
			$siteConfSource = $_FILES["site_conf_file"]["tmp_name"];
			$siteConfType = $_FILES["site_conf_file"]["type"];
			$siteConfSize = $_FILES["site_conf_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['site_conf_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['site_conf_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($siteConfFile, ".");
					$begin = substr($siteConfFile, 0, $pos);
					$end = substr($siteConfFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$site_conf_file = 'customer/form3/SiteConfigGuide/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$site_conf_file;

						list($width, $height, $siteConfType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($siteConfSize  < 4000000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['site_conf_file'] = $site_conf_file;  
									$this->field_values['site_conf_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			$bomFile = $_FILES["bom_file"]["name"]; 
			$bomSource = $_FILES["bom_file"]["tmp_name"];
			$bomType = $_FILES["bom_file"]["type"];
			$bomSize = $_FILES["bom_file"]["size"]/1024;    // In KB 
			
				if(!empty($_FILES['bom_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['bom_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($bomFile, ".");
					$begin = substr($bomFile, 0, $pos);
					$end = substr($bomFile, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();
						
						//image details for database
						$bom_file = 'customer/form3/BOM/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$bom_file;

						list($width, $height, $bomType, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($bomSize  < 4000000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['bom_file'] = $bom_file;  
									$this->field_values['bom_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form3.php'</script>";
								exit;
							}
					} 
				}
				
			

			$this->field_values['form3_id'] = $_SESSION['form1_id'];

			if(isset($post['acn_siteprep_flag']))
				{
					$this->field_values['acn_site_prep_flag'] = $post['acn_siteprep_flag']; 
					$this->field_values['acn_site_prep_date'] = $now; 
				}
			else
			{
				$this->field_values['acn_site_prep_flag'] = 'off'; 
				$this->field_values['acn_site_prep_date'] = '1970-01-01 12:00:00'; 
			}
			
			if(isset($post['acn_approve_doc']))
				{
					$this->field_values['acn_approve_doc'] = $post['acn_approve_doc']; 
					$this->field_values['acn_approve_date'] = $now; 
				}
			else
			{
				$this->field_values['acn_approve_doc'] = 'off'; 
				$this->field_values['acn_approve_date'] = '1970-01-01 12:00:00'; 
			}
				
			if(isset($post['ntap_approve_doc']))
				{
					$this->field_values['ntap_approve_doc'] = $post['ntap_approve_doc']; 
					$this->field_values['ntap_approve_date'] = $now; 
				}
			else
			{
				$this->field_values['ntap_approve_doc'] = 'off';
					$this->field_values['ntap_approve_date'] = '1970-01-01 12:00:00'; 
			}
			
			  /* echo "<pre>";
				print_r($this->field_values);
				exit; */   
			 $res = $this->insertQry();
	               if($res){
	               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form3 data has been added successfully!!!");	
	                   echo"<script>window.location.href='form4.php'</script>";
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
        
    function eventFullInformation() {
		//$menuObj =  new Menu;
		$cond = " 1=1 "; 
		if($_SESSION['ADMIN_TYPE'] == 2)
		{
			//$cond .= " AND id = '".$_SESSION['ADMIN_ID']."'"; 
		}

		if($_REQUEST['searchtxt'] && $_REQUEST['searchtxt'] != SEARCHTEXT){
			$searchtxt = $_REQUEST['searchtxt'];
			$cond .= " AND (eventName LIKE '%$searchtxt%') ";			
		}
		$query = " SELECT * FROM ".TBL_EVENTS." WHERE $cond";
	
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
			
			$orderby = $_GET[orderby]? $_GET[orderby]:"eventStartDate";
		    $order = $_GET[order]? $_GET[order]:"DESC";   
            $query .=  " ORDER BY $orderby $order LIMIT ".$offset.", ". $recordsPerPage;

         //   echo $query;exit;
				$sql = $this->executeQry($query);			
			if($num > 0) {			
				$i = $offset+1;			
				while($line = $this->getResultObject($sql)) {
					$highlight = $i%2==0?"main-body-bynic":"main-body-bynic2";
					$div_id = "status".$line->eventId;
					if ($line->status==0)
						$status = "InActive";
					elseif($line->status==1)
						$status = "Active";
					elseif($line->status==2)
						$status = "Deleted";
					else
						$status = "Banned";						
				
					
					$genTable .= '<div class="'.$highlight.'">
								   <ul>
								 	<li style="width:50px;">&nbsp;&nbsp;<input name="chk[]" value="'.$line->eventId.'" type="checkbox" 
									class="checkbox"></li>
									<li style="width:30px;">'.$i.'</li>			
									<li style="width:100px;">'.stripslashes($line->eventName).'</li>	
									<li style="width:100px;">'.stripslashes($line->eventType).'</li>
									<li style="width:100px;height:100px;"><a href="../'.(!empty($line->eventImage) ? $line->eventImage : 'images/noimage.jpg').'" title="'.ucwords($line->eventName).'"><img width="60px" height="60px" src="../'.(!empty($line->eventImage) ? $line->eventImage : 'images/noimage.jpg').'" border="0"></a></li>';
										
					$genTable .= '<li id='.$div_id.' style="width:70px; cursor:pointer;" onClick="javascript:changeStatus(\''.$div_id.'\',\''.$line->eventId.'\',\'manageUser\')">'.$status.'</li>';			
					
					$genTable .= '<li style="width:80px;">';
					$genTable .= '<a rel="shadowbox;width=705;height=490" title="'.stripslashes($line->eventName).'" href="viewEvent.php?eventId='.base64_encode($line->eventId).'"><img src="images/view.png" alt="View" width="16" height="16" border="0" /></a>';	

					$genTable .= '<li style="width:80px;">';
									
					$genTable .= '<a href="editEvent.php?eventId='.base64_encode($line->eventId).'&page='.$page.'" title="Edit"><img 
						src="images/edit.png" alt="Edit" width="16" height="16" border="0" /></a>';
				
					$genTable .= '</li><li style="width:80px;">';
								
					$genTable .= "<a href='javascript:void(NULL);'  onClick=\"if(confirm('Are you sure to delete this Record  ?')){window.location.href='pass.php?action=manageEvent&type=delete&eventId=".$line->eventId."&page=$page'}else{}\" ><img src='images/drop.png' height='16' width='16' border='0' title='Delete' /></a>";

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
			$this->field_values['cityId'] 		= $post['cityList'];
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