<?php 
//session_start();
class Login extends MySqlDriver{
	function __construct() {
	  $this->obj = new MySqlDriver;       
    }

	function adminLogin($post) {	  
		$userName = mysql_real_escape_string($post['userName']);
		$password = mysql_real_escape_string($post['userPassword']); 
		
	//	echo "select * from ".TBL_ADMINUSER." where 1 and userName = '$userName'";exit;
		$sql = $this->executeQry("select * from ".TBL_ADMINUSER." where 1 and userName = '$userName'");

		$num = $this->getTotalRow($sql);
		
		if($num > 0) {
			$line = $this->getResultObject($sql);				
				
			if($this->validate_password($password,$line->password)) {

		//		$defaultLangCode = $this->fetchValue(TBL_LANGUAGE,"id","1 and isDefault='1'");
				$_SESSION['ADMIN_ID'] = $line->id;
				$_SESSION['ADMIN_TYPE'] = $line->userType;
				$_SESSION['ADMIN_USERNAME'] = $line->userName;
		//		$_SESSION['ADMINTBL_USERHASH'] = $line->hash;
				$_SESSION['USERLEVELID'] = $line->adminLevelId;
		//		$_SESSION['DEFAULTLANGUAGE'] = $defaultLangCode;
				$_SESSION['PHPSESSIONID'] = session_id();
				$_SESSION['ADMIN_LAST_LOGIN'] = date("d M Y h:i a",strtotime($line->lastLogin));
				
				$this->executeQry("update ".TBL_ADMINUSER." set lastLogin = '".date('Y-m-d H:i:s')."' where id = '".$line->id."'");
				$this->executeQry("insert into ".TBL_SESSIONDETAIL." set sessionId = '".$_SESSION['PHPSESSIONID']."', adminId = '".$_SESSION['ADMIN_ID']."', ipAddress = '".$_SERVER['REMOTE_ADDR']."', signInDateTime = '".date('Y-m-d H:i:s')."', signDate = '".date('Y-m-d')."'");
				
				$_SESSION['SESSIONID'] = mysql_insert_id();
				$_SESSION['SESS_MSG'] = "Login Successfully";
				echo "<script>window.location.href='adminArea.php'</script>";			
			} else {						
				$_SESSION['SESS_MSG'] = "Login Authentication Failed";
			}	
		} else {
			$_SESSION['SESS_MSG'] = "Login Authentication Failed";
		}
	}
	
	
	
	function validate_password($plain, $encrypted) {		
		if (!is_null($plain) && !is_null($encrypted)) {
		
			if (md5($plain) == $encrypted) {
				return true;
			}
		}
		return false;
	}
	
	function checkSession() {
	    if ( !$_SESSION['ADMIN_ID'] ) {
			$_SESSION['SESS_MSG'] = 'OOPS! your session has been expired!';
			redirect('index.php');
			exit;
		} 
		/*else {
			$adminUserHash = $this->fetchValue(TBL_ADMINUSER,"hash","1 and id = '".$_SESSION['ADMIN_ID']."'");
			if($adminUserHash != $_SESSION['ADMINTBL_USERHASH']) {
				$_SESSION['SESS_MSG'] = 'OOPS! your session has been expired!';
				redirect('index.php');
				exit;
			}
 		}*/
	}
		
	
	function checkHeader() {
	   	$headerArray = array();
		$headerArray = getallheaders();
              
		foreach ($headerArray as $name => $value) {
			if(strtolower($value) == 'oblixanonymous' && strtolower($name) == 'uid')
				{
					unset($_SESSION[$name]);
					session_destroy();	
					$_SESSION['SESS_MSG'] = 'OOPS! your session has been expired!';
					//redirect('pack-list');
					//exit;				
				}
				else{
					$_SESSION[$name] = strtolower($value);
					$_SESSION['PHPSESSIONID'] = session_id();					
					//$_SESSION['ADMIN_LAST_LOGIN'] = date("d M Y h:i a",strtotime($line->lastLogin));
				}
		}
           /*
		echo "<pre>";
              print_r($headerArray);
              exit;
           */
	}
	

	
	function adminResendPassword($post){
		$mailFunctionObj = new MailFunction;
		$generalDataObj = new GeneralFunctions();
		
		$sql = $this->executeQry("select * from ".TBL_ADMINUSER." where 1 and email = '$post[email]'");
		$num = $this->getTotalRow($sql);
		if($num > 0) {
			$line = $this->getResultObject($sql);
	        $uid = $line->id;
			$possible = '012dfds3456789bcdfghjkmnpq454rstvwx54yzABCDEFG5HIJ5L45MNOP352QRSTU5VW5Y5Z';
     		$newPassword = substr($possible, mt_rand(0, strlen($possible)-10), 6);
			//$newPassword = "123456";
			$Password = $this->encrypt_password($newPassword); 
			$updateqry = "UPDATE ".TBL_ADMINUSER." SET `password` = '$Password' WHERE `id` ='$uid'";
		    $this->executeQry($updateqry);
			$_SESSION['SESS_MSG'] = "Your Password has been send successfully to your email Id.";
			//$mailFunctionObj->mailValue("5","1",$uid,$newPassword);
			$to = $line->emailId;
			$subject = "Forget Password";
			$from = $line->emailId;
			$message = '<table cellspacing="0" cellpadding="0" align="center" width="100%">
    <tbody>
        <tr>
            <td valign="top" height="81" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td height="10">&nbsp;</td>
        </tr>
        <tr>
            <td height="30" style="font-family: tahoma; text-decoration: none; font-weight: bold; font-size: 11px; color: rgb(55, 64, 73);" colspan="3">&nbsp;Hello '.$line->username.',</td>
        </tr>
        <tr>
            <td height="30" width="76%" style="font-family: Tahoma; font-size: 12px; font-weight: bold; text-decoration: none; color: rgb(83, 91, 97);" colspan="3">&nbsp;Your Password is given bellow.</td>
        </tr>
        <tr>
            <td height="30" style="font-family: Tahoma; font-size: 12px; font-weight: normal; text-decoration: none; color: rgb(83, 91, 97);" colspan="4">&nbsp;'.$newPassword.'</td>
        </tr>

        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <td height="30" colspan="4">&nbsp;</td>
        </tr>
    </tbody>
</table>';

			@mail($to, $subject, "$message\r\n", "From: $from\n" . "MIME-Version: 1.0\n" . "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion ());
			//header("Location:lost-password.php");
		    echo "<script language=javascript>window.location.href='lost-password.php';< /script>";
		}	
	}	
	
	
	function isExistsAdminEmailId($emailId){
		$sql = $this->executeQry("select * from ".TBL_ADMINUSER." where 1 and email = '$emailId'");
		$num = $this->getTotalRow($sql);
        if($num > 0)
		 return true;
		else
		 return false; 	
	}	
	
	function Logout() {
		$this->executeQry("update ".TBL_SESSIONDETAIL." set signOutDateTime = '".date('Y-m-d H:i:s')."' where sessionId = '".$_SESSION['PHPSESSIONID']."' and adminId = '".$_SESSION['ADMIN_ID']."'");
		unset($_SESSION['ADMIN_ID']);
		unset($_SESSION['ADMINNNAME']);
	//	unset($_SESSION['ADMINTBL_USERHASH']);
		unset($_SESSION['USERLEVELID']);
		unset($_SESSION['DEFAULTLANGUAGE']);
		unset($_SESSION['PHPSESSIONID']);
		unset($_SESSION['SESSIONID']);
		session_destroy();		
	}
	
	function encrypt_password($plain) {
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
	
	function fetchUserType() {	
		$_SESSION['ADMIN_ID'] =1;
	     $rst = $this->fetchValue(TBL_ADMINUSER,"userType"," id = ".$_SESSION['ADMIN_ID']);		
	     return $rst;			
	} 
	
	
}// End Class
?>	