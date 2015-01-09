<?php 
//session_start();
class Login extends MySqlDriver{
	function __construct() {
	  $this->obj = new MySqlDriver;       
    }

	function adminLogin($post) {
	
		$userName = mysql_real_escape_string($post['userName']);
		$password = mysql_real_escape_string($post['userPassword']); 
		$sql = $this->executeQry("select * from ".TBL_ADMINUSER." where 1 and userName = '$userName'");

		$num = $this->getTotalRow($sql);
		if($num > 0) {
			$line = $this->getResultObject($sql);		
			if($this->validate_password($password,$line->password)) {

		//		$defaultLangCode = $this->fetchValue(TBL_LANGUAGE,"id","1 and isDefault='1'");
				$_SESSION['ADMIN_ID'] = $line->id;
				$_SESSION['ADMIN_TYPE'] = $line->userType;
				$_SESSION['ADMIN_USERNAME'] = $line->userName;

				$_SESSION['PHPSESSIONID'] = session_id();
				$_SESSION['ADMIN_LAST_LOGIN'] = date("d M Y h:i a",strtotime($line->lastLogin));
				$this->executeQry("update ".TBL_ADMINUSER." set lastLogin = '".date('Y-m-d H:i:s')."' where id = '".$line->id."'");
				$this->executeQry("insert into ".TBL_SESSIONDETAIL." set sessionId = '".$_SESSION['PHPSESSIONID']."', adminId = '".$_SESSION['ADMIN_ID']."', ipAddress = '".$_SERVER['REMOTE_ADDR']."', signInDateTime = '".date('Y-m-d H:i:s')."', signDate = '".date('Y-m-d')."'");
				
				$_SESSION['SESSIONID'] = mysql_insert_id();
				$_SESSION['SESS_MSG'] = "Login Successfully";

					 //check to see if remember, ie if cookie
				if(isset($post['rememberUser'])) {
					//set the cookies for 1 day, ie, 1*24*60*60 secs
					//change it to something like 30*24*60*60 to remember user for 30 days
					setcookie('ADMIN_ID', $line->id, time() + 1*24*60*60);
					setcookie('ADMIN_USERNAME', $line->userName, time() + 1*24*60*60);
					setcookie('PASSWORD', $line->password, time() + 1*24*60*60);
					setcookie('ADMIN_LAST_LOGIN', date("d M Y h:i a",strtotime($line->lastLogin)), time() + 1*24*60*60);
				} else {
					//destroy any previously set cookie
					setcookie('ADMIN_ID', $line->id, time() - 1*24*60*60);
					setcookie('ADMIN_USERNAME', '', time() - 1*24*60*60);
					setcookie('PASSWORD', '', time() - 1*24*60*60);
					setcookie('ADMIN_LAST_LOGIN', date("d M Y h:i a",strtotime($line->lastLogin)), time() + 1*24*60*60);
				}

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
	
	function check_db($userName, $password) {
		$qry = "SELECT * FROM ".TBL_ADMINUSER." WHERE userName = '" . mysql_real_escape_string(stripslashes($userName))."'";
	    $sql = $this->executeQry($qry); 
	 	$user_row = $this->getResultObject($sql);

	    //general return
	    if(is_object($user_row) && $user_row->password == $password)
	        return true;
	    else
	        return false;
	}


	function checkSession() {
			//first check whether session is set or not
	    if(!$_SESSION['ADMIN_ID']) {
	    		 //check the cookie
		        if(isset($_COOKIE['ADMIN_USERNAME']) && isset($_COOKIE['PASSWORD']) && isset($_COOKIE['ADMIN_ID'])) {
		            //cookie found, is it really someone from the
		            if($this->check_db($_COOKIE['ADMIN_USERNAME'], $_COOKIE['PASSWORD'])) {	
		            	$_SESSION['ADMIN_ID'] 			= $_COOKIE['ADMIN_ID'];
		            	$_SESSION['ADMIN_USERNAME'] 	= $_COOKIE['ADMIN_USERNAME'];	            
		                $_SESSION['PASSWORD'] 			= $_COOKIE['PASSWORD'];
		                $_SESSION['ADMIN_LAST_LOGIN'] 	= $_COOKIE['ADMIN_LAST_LOGIN'];

		                redirect('adminArea.php'); 
		                die();
		            }
		        }

	            $_SESSION['SESS_MSG'] = msgSuccessFail("fail","OOPS! your session has been expired!");	
	            redirect('index.php');
	            die();
		}
	}

	
	
	function adminResendPassword($post){		
		$sql = $this->executeQry("select * from ".TBL_ADMINUSER." where 1 and email = '$post[email]'");
		$num = $this->getTotalRow($sql);
		if($num > 0) {
			$line = $this->getResultObject($sql);
	        $uid = $line->id;
			$possible = '012dfds3456789bcdfghjkmnpq454rstvwx54yzABCDEFG5HIJ5L45MNOP352QRSTU5VW5Y5Z';
     		$newPassword = substr($possible, mt_rand(0, strlen($possible)-10), 6);
			//$newPassword = "123456";
			$password = md5_file($newPassword); 
			$updateqry = "UPDATE ".TBL_ADMINUSER." SET `password` = '$password' WHERE `id` ='$uid'";
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
		    echo "<script language=javascript>window.location.href='lostPassword.php';< /script>";
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
		setcookie('ADMIN_USERNAME', '', time() - 1*24*60*60);
		setcookie('PASSWORD', '', time() - 1*24*60*60);	
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
}// End Class
?>	