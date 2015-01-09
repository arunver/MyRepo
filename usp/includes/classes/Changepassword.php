<?php
session_start();
class Changepassword extends MySqlDriver {

	function __construct() 
	{
		$obj = new MySqlDriver;  
	}
	
	function isOldPasswordCorrectJquery($get){
	   $pass = md5($get['oldPass']); 
	   $sql="select id  from ".TBL_ADMINUSER." where password ='$pass' and id='".$_SESSION['ADMIN_ID']."'";
	   $rst=$this->executeQry($sql);
	   echo $this->getTotalRow($rst);	
	}
	
	function checkOldPassword($oldPass){
	   $oldPass = md5($oldPass); 	   
	   $sql="select id  from ".TBL_ADMINUSER." where password ='$oldPass' and id='".$_SESSION['ADMIN_ID']."'";
	   $rst=$this->executeQry($sql);
	   return $this->getTotalRow($rst);	
	}
	
	function changePassword($post) {
		$pass = md5($post['newPassword']); 
		$updateQry = "update ".TBL_ADMINUSER." set password = '".$pass."' where id = '".$_SESSION['ADMIN_ID']."'";
		$this->executeQry($updateQry);
		
		$subject = LANG_PASSWORD_CHANGE_SUCCESS_MSG;
		$from = "fervender@appstudioz.com";
		$to = $this->fetchValue(TBL_ADMINUSER,"email","id= '".$_SESSION['ADMIN_ID']."'");	
		$to = 'ashishmca007@gmail.com';

		$msg = '<html>';
		$msg .= '<head><title>Beebook</title></head>';
		$msg .= '<body>';
		$msg .= '<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Courier New, Arial, sans-serif, Gotham, Helvetica Neue, Helvetica; font-size:15px; line-height:18px">
				<tr>
				<td><p> Hi ,</p>
				<p>'.LANG_PASSWORD_CHANGE_SUCCESS_MSG.'</p> 
				</td>
				</tr>
			</table>';
		$msg .= '</body>';
		$msg .= '</html>'; 

		@mail($to, $subject, "$msg\r\n", "From: $from\n" . "MIME-Version: 1.0\n" . "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion ());

		$_SESSION['SESS_MSG'] = msgSuccessFail('success',LANG_PASSWORD_CHANGE_SUCCESS_MSG);
		header("Location:changePassword.php");
		exit;
	}
}// End Class


?>