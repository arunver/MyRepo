<?php
//session_start();
include 'class.phpmailer.php';
class Form5 extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
      
	 function updateForm5($post,$form_id,$adminType)
		{
			/*  
				echo "<pre>";
				print_r($_POST);
				exit; 
			*/ 
		//	$this->field_values['form5_id'] = $_SESSION['form1_id'];
			
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM5;		
			$this->condition = TBL_FORM5."_id='".base64_decode($form_id)."'";		

			$this->field_values['form5_id'] = base64_decode($form_id);  
			$_SESSION['form1_id'] = base64_decode($form_id); 
			
			if($adminType==3)
			{				
				if(isset($post['acn_conf_flag']))
				{
					$this->field_values['acn_conf_flag'] = $post['acn_conf_flag']; 
					$this->field_values['acn_conf_date'] = $now; 
				}
				else
				{
					$this->field_values['acn_conf_flag'] = 'off'; 
					$this->field_values['acn_conf_date'] = '1970-01-01 12:00:00'; 
				}
			}
			else if($adminType==2)
			{
				if(isset($post['ntap_conf_flag']))
				{
					$this->field_values['ntap_conf_flag'] = $post['ntap_conf_flag']; 
					$this->field_values['ntap_conf_date'] = $now; 
				}
				else
				{
					$this->field_values['ntap_conf_flag'] = 'off'; 
					$this->field_values['ntap_conf_date'] = '1970-01-01 12:00:00'; 
				}
			}
			else{
			// acn user
			
					if(isset($post['acn_conf_flag']))
					{
						$this->field_values['acn_conf_flag'] = $post['acn_conf_flag']; 
						$this->field_values['acn_conf_date'] = $now; 
					}
					else
					{
						$this->field_values['acn_conf_flag'] = 'off'; 
						$this->field_values['acn_conf_date'] = '1970-01-01 12:00:00'; 
					}
					
			// ntap user		
			
				if(isset($post['ntap_conf_flag']))
					{
						$this->field_values['ntap_conf_flag'] = $post['ntap_conf_flag']; 
						$this->field_values['ntap_conf_date'] = $now; 
					}
					else
					{
						$this->field_values['ntap_conf_flag'] = 'off'; 
						$this->field_values['ntap_conf_date'] = '1970-01-01 12:00:00'; 
					}
					
			}
			
			 /* echo "<pre>";
			print_r($this->field_values);
			exit; */
			
			$res = $this->updateQry();
	               if($res){

	               		$body='Form5 has been updated successfully';
					    $subject ='USP Form5 updated';
					    $this->sendMail($body , $subject);
	               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form5 data has been updated successfully!!!");	
	                   echo"<script>window.location.href='form1.php?data=".$form_id."'</script>";
	                   exit;
	               }
		}
	  
    function addForm5($post)
		{
			/*  
				echo "<pre>";
				print_r($_POST);
				exit; 
			*/ 
			
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM5;		

			if(!empty($_GET['data']))
			{
				$form_id = $_GET['data'];
				$this->field_values['form5_id'] = base64_decode($form_id);  
				$_SESSION['form1_id'] = base64_decode($form_id);
			}
			else{				
				$this->field_values['form5_id'] = $_SESSION['form1_id'];
			}			
			
			if(isset($post['acn_conf_flag']))
			{
				$this->field_values['acn_conf_flag'] = $post['acn_conf_flag']; 
				$this->field_values['acn_conf_date'] = $now; 
			}
			else
			{
				$this->field_values['acn_conf_flag'] = 'off'; 
				$this->field_values['acn_conf_date'] = '1970-01-01 12:00:00'; 
			}
			
			if(isset($post['ntap_conf_flag']))
			{
				$this->field_values['ntap_conf_flag'] = $post['ntap_conf_flag']; 
				$this->field_values['ntap_conf_date'] = $now; 
			}
			else
			{
				$this->field_values['ntap_conf_flag'] = 'off'; 
				$this->field_values['ntap_conf_date'] = '1970-01-01 12:00:00'; 
			}
			
			 /* echo "<pre>";
			print_r($this->field_values);
			exit; */
			
			 $res = $this->insertQry();
	               if($res){

	               		$body='Form5 has been inserted successfully';
					    $subject ='USP Form5 inserted';
					    $this->sendMail($body , $subject);
	               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form5 data has been added successfully!!!");
					   
					    if(!empty($_GET['data']))
						{
							echo "<script>window.location.href='form1.php?data=".$_GET['data']."'</script>";
						}
					  else
						{
							echo"<script>window.location.href='form1.php'</script>";
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

			$mail->AddAddress('arun.verma@netapp.com', 'Arun Verma'); 	
			
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

		//	$mail->Subject    = $subject;
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