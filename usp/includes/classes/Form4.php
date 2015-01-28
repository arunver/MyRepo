<?php
//session_start();
include 'class.phpmailer.php';
class Form4 extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
       
	function updateForm4($post,$form_id,$adminType)
		{
			/*  
				echo "<pre>";
				print_r($_POST);
				exit; 
			*/ 
			
		//	$this->field_values['form4_id'] = $_SESSION['form1_id'];
			
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM4;
			$this->condition = TBL_FORM4."_id='".base64_decode($form_id)."'";			

			$this->field_values['form4_id'] = base64_decode($form_id);  
			$_SESSION['form1_id'] = base64_decode($form_id); 
			
			if($adminType == 2 || $adminType == 1)
			{
					if(isset($post['ntap_sub_flag']))
					{
						$this->field_values['ntap_sub_flag'] = $post['ntap_sub_flag']; 
						$this->field_values['ntap_sub_date'] = $now; 
					}
					else
					{
						$this->field_values['ntap_sub_flag'] = 'off'; 
						$this->field_values['ntap_sub_date'] = '1970-01-01 12:00:00'; 
					}
					
					if(isset($post['ntap_sch_flag']))
					{
						$this->field_values['ntap_sch_flag'] = $post['ntap_sch_flag']; 
						$this->field_values['ntap_sch_date'] = $now; 
					}
					else
					{
						$this->field_values['ntap_sch_flag'] = 'off'; 
						$this->field_values['ntap_sch_date'] = '1970-01-01 12:00:00'; 
					}	

				$this->field_values['po_number'] = $post['po_number']; 
				$this->field_values['so_number'] = $post['so_number']; 
					
			}			
			
			
			/* echo "<pre>";
			print_r($this->field_values);
			exit;  */
			
			$res = $this->updateQry();
	               if($res){
	               		$body='Form4 has been updated successfully';
					    $subject ='USP Form4 updated';
					    $this->sendMail($body , $subject);
	               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form4 data has been updated successfully!!!");	
	                   echo"<script>window.location.href='form5.php?data=".$form_id."'</script>";
	                   exit;
	               }
		}
	   
    function addForm4($post)
		{
			/*  
				echo "<pre>";
				print_r($_POST);
				exit; 
			*/
			 
	      	$now = date('Y-m-d H:i:s');
			$this->tablename = TBL_FORM4;		

			if(!empty($_GET['data']))
			{
				$form_id = $_GET['data'];
				$this->field_values['form4_id'] = base64_decode($form_id);  
				$_SESSION['form1_id'] = base64_decode($form_id);
			}
			else{				
				$this->field_values['form4_id'] = $_SESSION['form1_id'];
			}				
					
			if(isset($post['ntap_sub_flag']))
			{
				$this->field_values['ntap_sub_flag'] = $post['ntap_sub_flag']; 
				$this->field_values['ntap_sub_date'] = $now; 
			}
			else
			{
				$this->field_values['ntap_sub_flag'] = 'off'; 
				$this->field_values['ntap_sub_date'] = '1970-01-01 12:00:00'; 
			}
			
			if(isset($post['ntap_sch_flag']))
			{
				$this->field_values['ntap_sch_flag'] = $post['ntap_sch_flag']; 
				$this->field_values['ntap_sch_date'] = $now; 
			}
			else
			{
				$this->field_values['ntap_sch_flag'] = 'off'; 
				$this->field_values['ntap_sch_date'] = '1970-01-01 12:00:00'; 
			}
			
			$this->field_values['po_number'] = $post['po_number']; 
			$this->field_values['so_number'] = $post['so_number']; 
			
			/* echo "<pre>";
			print_r($this->field_values);
			exit;  */
			
			 $res = $this->insertQry();
	               if($res){

	               		$body='Form4 has been inserted successfully';
					    $subject ='USP Form4 inserted';
					    $this->sendMail($body , $subject);

	               	   $_SESSION['SESS_MSG'] = msgSuccessFail("success","Form4 data has been added successfully!!!");	
					   
					    if(!empty($_GET['data']))
						{
							echo "<script>window.location.href='form5.php?data=".$_GET['data']."'</script>";
						}
					  else
						{
							echo"<script>window.location.href='form5.php'</script>";
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