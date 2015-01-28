<?php

include 'class.phpmailer.php';
//session_start();
class Form1 extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
      
	function updateForm1($post,$form_id,$adminType)
		{
			/* echo "<pre>";
			 print_r($_POST);
			 exit;
*/
			$name ="form1_id";
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM1;	

			$this->condition = TBL_FORM1."_id='".base64_decode($form_id)."'";
			
		//	$this->condition="form1_id=".base64_decode($form1_id);
			if($adminType==3)
			{
				$this->field_values['acn_lead'] 			= $post['acn_lead'];			
				$this->field_values['acn_email'] 			= $post['acn_email'];
				$this->field_values['acn_role'] 			= $post['acn_role'];
				$this->field_values['acn_phone'] 			= $post['acn_phone'];
			}
			else if($adminType==2)
			{
				$this->field_values['ntap_lead'] 			= $post['ntap_lead'];
				$this->field_values['ntap_email'] 			= $post['ntap_email'];
				$this->field_values['ntap_role'] 			= $post['ntap_role'];
				$this->field_values['ntap_phone'] 			= $post['ntap_phone'];
			}
			else
			{
				$this->field_values['acn_lead'] 			= $post['acn_lead'];			
				$this->field_values['acn_email'] 			= $post['acn_email'];
				$this->field_values['acn_role'] 			= $post['acn_role'];
				$this->field_values['acn_phone'] 			= $post['acn_phone'];
				$this->field_values['ntap_lead'] 			= $post['ntap_lead'];
				$this->field_values['ntap_email'] 			= $post['ntap_email'];
				$this->field_values['ntap_role'] 			= $post['ntap_role'];
				$this->field_values['ntap_phone'] 			= $post['ntap_phone'];
			}
			
			
			
			$this->field_values['pcsn_num'] 			= $post['pcsn_num'];
			$this->field_values['gov_end_user'] 		= $post['gov_end_user'];
			$this->field_values['rest_ph_home'] 		= $post['rest_ph_home'];
			$this->field_values['site_loc'] 			= $post['site_loc'];
			$this->field_values['req_detail'] 			= htmlentities($post['req_detail']);
		//	$this->field_values['req_detail'] 			= $post['req_detail'];
			
			/*echo "<pre>";
			print_r($this->field_values);
			exit;*/
		//	mysql_query("set names 'utf8'");
			$res = $this->updateQry();

			   if($res){					
				//   $_SESSION['form1_id'] =  $post['form1_id'];
				  
				   $body='Form1 has been updated successfully';
				   $subject ='USP Form1 Updated';
				   $this->sendMail($body , $subject);

					$_SESSION['SESS_MSG'] = msgSuccessFail("success","Form1 data has been updated successfully!!!");	
				   echo"<script>window.location.href='form2.php?data=".$form_id."'</script>";
				   exit;
			   }
		}

    function addForm1($post)
		{
			/* echo "<pre>";
			 print_r($_POST);
			 exit;   */

	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM1;		

			$this->field_values['acn_lead'] 			= $post['acn_lead'];			
			$this->field_values['acn_email'] 			= $post['acn_email'];
			$this->field_values['acn_role'] 			= $post['acn_role'];
			$this->field_values['acn_phone'] 			= $post['acn_phone'];
			
			$this->field_values['ntap_lead'] 			= $post['ntap_lead'];
			$this->field_values['ntap_email'] 			= $post['ntap_email'];
			$this->field_values['ntap_role'] 			= $post['ntap_role'];
			$this->field_values['ntap_phone'] 			= $post['ntap_phone'];
			
			$this->field_values['gov_end_user'] 		= $post['gov_end_user'];
			$this->field_values['rest_ph_home'] 		= $post['rest_ph_home'];
			
			$this->field_values['pcsn_num'] 			= $post['pcsn_num'];
			
			$this->field_values['site_loc'] 			= $post['site_loc'];
			$this->field_values['req_detail'] 			= htmlentities($post['req_detail']);
			
			
			
			$this->field_values['created_date'] = $now;
			/* 	
		 	 echo "<pre>";
			print_r($this->field_values);
			exit;  
			 */		
					   $res = $this->insertQry();
		               if($res){
						   $_SESSION['form1_id'] = $res[1];

						   $body='Form1 has been inserted successfully';
						   $subject ='USP Form1 inserted';
						   $this->sendMail($body , $subject);
		               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form1 data has been added successfully!!!");	
	               	  
						if(!empty($_GET['data']))
						{
							echo "<script>window.location.href='form2.php?data=".$_GET['data']."'</script>";
						}
					  else
						{
							echo"<script>window.location.href='form2.php'</script>";
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
		
		$mail->AddAddress('arun.verma@netapp.com', 'Ashish Joshi'); 	
		//$mail->AddAddress('Amit.Kumar@netapp.com', 'Amit Kumar');

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