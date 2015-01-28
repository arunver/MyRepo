<?php
//session_start();
include 'class.phpmailer.php';
class Form3 extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
      
	function updateForm3($post, $form_id, $adminType)
		{
			/*  
				echo "<pre>";
				print_r($_POST);
				exit; 
			*/ 
						
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM3;
			$this->condition = TBL_FORM3."_id='".base64_decode($form_id)."'";		

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
								echo"<script>window.location.href='form3.php?data=".$form_id."'</script>";
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
								echo"<script>window.location.href='form3.php?data=".$form_id."'</script>";
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
								echo"<script>window.location.href='form3.php?data=".$form_id."'</script>";
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
								echo"<script>window.location.href='form3.php?data=".$form_id."'</script>";
								exit;
							}
					} 
				}
				
				
			$this->field_values['form3_id'] = base64_decode($form_id);    
			$_SESSION['form1_id'] = base64_decode($form_id); 

			
			if($adminType==3)
			{
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
				
			}else if($adminType==2)
			{
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
			}
			else{
			//acn user
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
					
			//ntap user		
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
					
			}
			
			/* 
				echo "<pre>";
				print_r($this->field_values);
				exit; 
			*/   
			$res = $this->updateQry();
	               if($res){
	               		$body='Form3 has been inserted successfully';
					    $subject ='USP Form3 inserted';
					    $this->sendMail($body , $subject);	
					   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form3 data has been updated successfully!!!");	
					   echo"<script>window.location.href='form4.php?data=".$form_id."'</script>";
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
			
			if(!empty($_GET['data']))
			{
				$form_id = $_GET['data'];
				$this->field_values['form3_id'] = base64_decode($form_id);  
				$_SESSION['form1_id'] = base64_decode($form_id);
			}
			else{				
				$this->field_values['form3_id'] = $_SESSION['form1_id'];
			}			

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

	                $body='Form3 has been inserted successfully';
				    $subject ='USP Form3 inserted';
				    $this->sendMail($body , $subject);	
	               	$_SESSION['SESS_MSG'] = msgSuccessFail("success","Form3 data has been added successfully!!!");	
					 if(!empty($_GET['data']))
						{
							echo "<script>window.location.href='form4.php?data=".$_GET['data']."'</script>";
						}
					  else{
							echo"<script>window.location.href='form4.php'</script>";
					  }
	                   
	                   exit;
	               }
		}

	function sendMail($body,$subject)
		{
			$mail = new PHPMailer(); 


			$mail->SMTPAuth   = true;
			$mail->Host       = "smtp.netapp.com";
			$mail->Port       = 25; 

			$mail->SetFrom('no-reply@netapp.com', 'No Reply');
			//	$mail->AddAddress('ng-acn-utility-services-request@netapp.com', 'NetApp Group platform');
			$mail->AddAddress('arun.verma@netapp.com', 'ArunVerma'); 

			$message = '<html><body>';				
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';				
			$message .= "<tr><td><strong>Hello,</strong> </td></tr>";
			$message .= "<tr style='background: #eee;'><td>" . $subject. "</td></tr>";
			$message .= "<tr style='background: #eee;'><td>A new Utility Service has been requested and requires your attention. Please follow the link to view the pending request.</td></tr>";			
			$message .= "<tr style='background: #eee;'><td><a href='http://10.250.240.61/usp' alt='Link to website' />Link to website</a></td></tr>";
			$message .= "</table>";
			$message .= '<br>Thank you <br></br>
						*** This is an automatically generated email, please do not reply ***';
			$message .= "</body></html>";

			$mail->Subject = "new service request";

			$mail->MsgHTML($message);
			
			if(!$mail->Send())
			{
			   echo "Message could not be sent. <p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   
			}
		}
        
	
   
}


?>