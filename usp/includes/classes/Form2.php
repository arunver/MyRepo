<?php
//session_start();
include 'class.phpmailer.php';
class Form2 extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
        
	function updateForm2($post,$form_id,$adminType)
		{
			/*
				 echo "<pre>";
				 print_r($_POST);
				 exit; 
			*/			
			
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM2;	
			$this->condition = TBL_FORM2."_id='".base64_decode($form_id)."'";

			$filename 	= $_FILES["profile_doc_file"]["name"]; 
			$source 	= $_FILES["profile_doc_file"]["tmp_name"];
			$type 		= $_FILES["profile_doc_file"]["type"];
			$size 		= $_FILES["profile_doc_file"]["size"]/1024;    // In KB 

			if(!empty($_FILES['profile_doc_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['profile_doc_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($filename, ".");
					$begin = substr($filename, 0, $pos);
					$end = substr($filename, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;

					if(!empty($tmp_name))
					{ 
						$time_constant = time();

						//image details for database
						$profile_doc_file = 'customer/form2/document/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$profile_doc_file;

						list($width, $height, $type, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($size  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['profile_doc_file'] = $profile_doc_file;  
									$this->field_values['profile_doc_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form1.php?data=".$form_id."'</script>";
								exit;
							}
					} 
				}

			$filename = $_FILES["config_spec_file"]["name"]; 
			$source = $_FILES["config_spec_file"]["tmp_name"];
			$type = $_FILES["config_spec_file"]["type"];
			$size = $_FILES["config_spec_file"]["size"]/1024;    // In KB 

			
			if(!empty($_FILES['config_spec_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['config_spec_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($filename, ".");
					$begin = substr($filename, 0, $pos);
					$end = substr($filename, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();

						//image details for database
						$config_spec_file = 'customer/form2/ConfigurationSpecification/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$config_spec_file;

						list($width, $height, $type, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($size  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['config_spec_file'] = $config_spec_file;  
									$this->field_values['config_spec_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form2.php?data=".$form_id."'</script>";
								exit;
							}
					} 
				}

				$this->field_values['form2_id'] = base64_decode($form_id);  
				$_SESSION['form1_id'] = base64_decode($form_id); 

				if($adminType==3)
					{
						if(isset($post['acn_agr_flag']))
						{
							$this->field_values['acn_agr_flag'] = $post['acn_agr_flag']; 
							$this->field_values['acn_agr_date'] = $now; 
						}
						else
						{
							$this->field_values['acn_agr_flag'] = 'off'; 
							$this->field_values['acn_agr_date'] ='1970-01-01 12:00:00'; 
						}
					}
					else if($adminType==2)
					{
						if(isset($post['ntap_agr_flag']))
							{
								$this->field_values['ntap_agr_flag'] = $post['ntap_agr_flag']; 
								$this->field_values['ntap_agr_date'] = $now; 
							}
							else
							{
								$this->field_values['ntap_agr_flag'] ='off'; 
								$this->field_values['ntap_agr_date'] = '1970-01-01 12:00:00'; 
							}
					}
					else
					{					
						if(isset($post['acn_agr_flag']))
						{
							$this->field_values['acn_agr_flag'] = $post['acn_agr_flag']; 
							$this->field_values['acn_agr_date'] = $now; 
						}
						else
						{
							$this->field_values['acn_agr_flag'] = 'off'; 
							$this->field_values['acn_agr_date'] ='1970-01-01 12:00:00'; 
						}					
					
						if(isset($post['ntap_agr_flag']))
							{
								$this->field_values['ntap_agr_flag'] = $post['ntap_agr_flag']; 
								$this->field_values['ntap_agr_date'] = $now; 
							}
							else
							{
								$this->field_values['ntap_agr_flag'] ='off'; 
								$this->field_values['ntap_agr_date'] = '1970-01-01 12:00:00'; 
							}
					
						$this->field_values['admin_action_flag'] = $post['admin_action_flag']; 
						$this->field_values['admin_action_date'] = $now; 	
					}	

			   $res = $this->updateQry();
			   
			   if($res){

					$body='Form2 has been updated successfully';
				    $subject ='USP Form2 updated';
				    $this->sendMail($body , $subject);	

				   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form2 has been updated successfully!!!");	

				   echo "<script>window.location.href='form3.php?data=".$form_id."'</script>";
				   exit;
			   }
		}	
		
    function addForm2($post)
		{
		/*	  echo "<pre>";
			 print_r($_POST);
			 exit; */
 
			
 
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM2;		
			
			if(!empty($_GET['data']))
			{
				$form_id = $_GET['data'];
				$this->field_values['form2_id'] = base64_decode($form_id);  
				$_SESSION['form1_id'] = base64_decode($form_id);
			}
			else{				
				$this->field_values['form2_id'] = $_SESSION['form1_id'];
			}			
			
			$filename = $_FILES["profile_doc_file"]["name"]; 
			$source = $_FILES["profile_doc_file"]["tmp_name"];
			$type = $_FILES["profile_doc_file"]["type"];
			$size = $_FILES["profile_doc_file"]["size"]/1024;    // In KB 


			if(!empty($_FILES['profile_doc_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['profile_doc_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($filename, ".");
					$begin = substr($filename, 0, $pos);
					$end = substr($filename, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();

						//image details for database
						$profile_doc_file = 'customer/form2/document/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$profile_doc_file;

						list($width, $height, $type, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($size  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['profile_doc_file'] = $profile_doc_file;  
									$this->field_values['profile_doc_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo"<script>window.location.href='form1.php'</script>";
								exit;
							}
					} 
				}
			

			$filename = $_FILES["config_spec_file"]["name"]; 
			$source = $_FILES["config_spec_file"]["tmp_name"];
			$type = $_FILES["config_spec_file"]["type"];
			$size = $_FILES["config_spec_file"]["size"]/1024;    // In KB 

			
			if(!empty($_FILES['config_spec_file']))
				{
					$created = date('Y-m-d H:i:s');
					$tmp_name = $_FILES['config_spec_file']['tmp_name'];

					$basepath = PATH; 

					$pos = strrpos($filename, ".");
					$begin = substr($filename, 0, $pos);
					$end = substr($filename, $pos+1);

					$name[0] = $begin;
					$name[1] = $end;

					$doc_name = isset($name[0]) ? $name[0] : null;
					$ext = isset($name[1]) ? $name[1] : null;


					if(!empty($tmp_name))
					{ 
						$time_constant = time();

						//image details for database
						$config_spec_file = 'customer/form2/ConfigurationSpecification/'.$doc_name.'.'.$ext;

						$main_path = $basepath.$config_spec_file;

						list($width, $height, $type, $attr) = @getimagesize($main_path); 

						//(($ext == "jpg") || ($ext == "png") || ($ext == "gif") || ($ext == "jpeg")) &&
						if (($size  < 4000))
						{ 
							if(@move_uploaded_file($tmp_name, $main_path)) 
								{ 
									$this->field_values['config_spec_file'] = $config_spec_file;  
									$this->field_values['config_spec_date'] = $created;
								}
						}
						else 
							{   
								$_SESSION['SESS_MSG'] = msgSuccessFail("fail","Error: There is some error in upload"); 
								echo "<script>window.location.href='form2.php'</script>";
								exit;
							}
					} 
				}
				
				
				if(isset($post['acn_agr_flag']))
				{
					$this->field_values['acn_agr_flag'] = $post['acn_agr_flag']; 
					$this->field_values['acn_agr_date'] = $now; 
				}
				else
				{
					$this->field_values['acn_agr_flag'] = 'off'; 
					$this->field_values['acn_agr_date'] ='1970-01-01 12:00:00'; 
				}
				
				if(isset($post['ntap_agr_flag']))
				{
					$this->field_values['ntap_agr_flag'] = $post['ntap_agr_flag']; 
					$this->field_values['ntap_agr_date'] = $now; 
				}
				else
				{
					$this->field_values['ntap_agr_flag'] ='off'; 
					$this->field_values['ntap_agr_date'] = '1970-01-01 12:00:00'; 
				}
				
				
				
				$this->field_values['admin_action_flag'] = $post['admin_action_flag']; 
				$this->field_values['admin_action_date'] = $now; 
				/*  echo "<pre>";
				print_r($this->field_values);
				exit;   */

			   $res = $this->insertQry();
			   if($res){

				$body='Form2 has been inserted successfully';
			    $subject ='USP Form2 inserted';
			    $this->sendMail($body , $subject);	
				$_SESSION['SESS_MSG'] = msgSuccessFail("success","Form2 has been added successfully!!!");	
				  if(!empty($_GET['data']))
				  {
					echo "<script>window.location.href='form3.php?data=".$_GET['data']."'</script>";
				   }
				  else{
					echo "<script>window.location.href='form3.php'</script>";
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
			//$mail->AddAddress('ng-acn-utility-services-request@netapp.com', 'NetApp Group platform');
			
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