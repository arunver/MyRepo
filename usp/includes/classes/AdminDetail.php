<?php 
session_start();
class AdminDetail extends MySqlDriver{
	function __construct() {
	  $this->obj = new MySqlDriver;       
    }

	function valDetail() {
		$sql = $this->executeQry("select * from ".TBL_ADMINLOGIN." where 1");
		$num = $this->getTotalRow($sql);
		$menuObj = new Menu();
		if($num > 0) {
			$genTable = '<div class="main-body-content-text-div">
							<ul style="text-align:center;">
								<li style="width:50px;">SL.No</li>
								<li style="width:100px;">User Name</li>
								<li style="width:400px;">Email Id</li>
								<li style="width:70px;">Status</li>
								<li style="width:80px;">Edit</li>
								<li style="width:50px;">Delete</li>
							</ul>
						</div>';
			$i = 1;			
			while($line = $this->getResultObject($sql)) {
				$highlight = $i%2==0?"main-body-bynic":"main-body-bynic2";
				$div_id = "status".$line->id;
				if ($line->status==0)
					$status = "InActive";
				else
					$status = "Active";
					
				$genTable .= '<div class="'.$highlight.'">
								 <ul>
									<li style="width:50px;">'.$i.'</li>
									<li style="width:180px;">'.$line->username.'</li>																		
									<li style="width:300px">'.$line->emailId.'</li>';
				if($menuObj->checkEditPermission()) {							
					$genTable .= '<li style="width:80px;"><div id="'.$div_id.'" style="cursor:pointer;" onClick="javascript:changeStatus(\''.$div_id.'\',\''.$line->id.'\',\'admin\')">'.$status.'</div></li>';
				}			
				
				$genTable .= '<li style="width:45px;">';
									
				if($menuObj->checkEditPermission()) {					
					$genTable .= '<a href="editAdmin.php?id='.base64_encode($line->id).'"><img src="images/edit.png" alt="Edit" width="16" height="16" border="0" /></a>';
				}	
				$genTable .= '</li><li>';
				
				if($menuObj->checkDeletePermission()) {					
					$genTable .= "<a href='javascript:void(NULL);'  onClick=\"if(confirm('Are you sure to delete this Record  ?')){window.location.href='pass.php?action=admin&type=delete&id=".$line->id."&page=$page'}else{}\" ><img src='images/drop.png' height='16' width='16' border='0' title='Delete' /></a>";
				}
							
				$genTable .= '</li></ul></div>';
				
		
				$i++;	
			}			
			return $genTable;
		}	
	}
	
	function changStatus($get) {
		$status=$this->fetchValue(TBL_ADMINLOGIN,"status","1 and id = '$get[id]'");
		
		if($status==1) {
			$stat= 0;
			$status="Inactive";
		} else 	{
			$stat= 1;
			$status="Active";
		}
	
		$query = "update ".TBL_ADMINLOGIN." set status = '$stat', modDate = '".date('Y-m-d H:i:s')."', modBy = '".$_SESSION['ADMIN_ID']."' where id = '$get[id]'";
		if($this->executeQry($query)) 
			$this->logSuccessFail('1',$query);		
		else 	
			$this->logSuccessFail('0',$query);
		echo $status;		
	}
	
	function deleteRecord($get) {
		$adminLevelId = $this->fetchValue(TBL_ADMINLOGIN,"adminLevelId"," id = '$get[id]'");
		$this->deleteval(TBL_ADMINLOGIN," id = '$get[id]'");
		$this->deleteval(TBL_ADMINLEVEL," id = '$adminLevelId'");
		$this->deleteval(TBL_ADMINPERMISSION," adminLevelId = '$adminLevelId'");		
		$_SESSION['SESS_MSG'] = msgSuccessFail("success","Your Information has been deleted successfully!!!");
        echo "<script language=javascript>window.location.href='administrator.php';</script>";
	}
	
	function getResult($id) {
		$sql_user = $this->executeQry("select * from ".TBL_ADMINLOGIN." where id = '$id'");
		$num_user = $this->getTotalRow($sql_user);
		if($num_user > 0) {
			return $line_user = $this->getResultObject($sql_user);	
		} else {
			redirect("administrator.php");
		}	
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
	
	function addNewAdmin($post) {
		$_SESSION['SESS_MSG'] = "";
		if($post[userName] == "") {
			$_SESSION['SESS_MSG'] .= "Enter username. <br> ";
		}
		if($post[userEmail] == "") {
			$_SESSION['SESS_MSG'] .= "Enter Email ID. <br> ";
		} else {
			if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $post[userEmail])){
				$_SESSION['SESS_MSG'] .= "Enter Valid Email ID. <br> ";
			}
		} 
		if($post[password] == "") {
			$_SESSION['SESS_MSG'] .= "Enter Password. <br> ";
		} else {
			if (strlen($post[password]) < 6){
				$_SESSION['SESS_MSG'] .= "Enter password of alteast 6 charactors. <br> ";
			}
		}
		
		if($_SESSION['SESS_MSG'] == "") {
			$sql1 = $this->executeQry("insert into ".TBL_ADMINLEVEL." set name = '$post[userName]', status = '1'");
			$inserted_id = mysql_insert_id();
			$password = $this->encrypt_password($post[password]);
			$hash = md5($post[userName].":".$password);
			$query = $this->executeQry("insert into ".TBL_ADMINLOGIN." set username = '$post[userName]', password = '$password', emailId = '$post[userEmail]', hash = '$hash', adminLevelId = '$inserted_id', addDate = '".date('Y-m-d H:i:s')."', addedBy = '".$_SESSION['ADMIN_ID']."', status = '1'");
			
			if(count($post[menuCheck]) > 0) {
				foreach($post[menuCheck] as $key=>$value) {	
					$add = "menuCheck_".$value."_add";
					$edit = "menuCheck_".$value."_edit";
					$del = "menuCheck_".$value."_del";						
					$query = $this->executeQry("insert into ".TBL_ADMINPERMISSION." set adminLevelId = '$inserted_id', menuid = '$value', add_record = '$post[$add]', edit_record = '$post[$edit]', delete_record = '$post[$del]'");		
				}
			}
			$_SESSION['SESS_MSG'] =msgSuccessFail("success","Information has been added successfully.");	
		}
		header("Location:addAdmin.php");exit;
	}

	function editAdminDetail($post) {	
		$_SESSION['SESS_MSG'] = "";
		if($post[userName] == "") {
			$_SESSION['SESS_MSG'] .= "Enter username. <br> ";
		}
		if($post[userEmail] == "") {
			$_SESSION['SESS_MSG'] .= "Enter Email ID. <br> ";
		} else {
			if (!@eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $post[userEmail])){
				$_SESSION['SESS_MSG'] .= "Enter Valid Email ID. <br> ";
			}
		} 
		
		if ($post[password] != "" && strlen($post[password]) < 6){
			$_SESSION['SESS_MSG'] .= "Enter password of alteast 6 charactors. <br> ";		
		}
		
		if($_SESSION['SESS_MSG'] == "") {
		
			$adminLevelId = $post[adminLevelId];
			
			$query = $this->executeQry("update ".TBL_ADMINLOGIN." set username = '$post[userName]', emailId = '$post[userEmail]', modDate = '".date('Y-m-d H:i:s')."', modBy = '".$_SESSION['ADMIN_ID']."' where id = '$post[admin_id]'");
			if($post[password] != "") {
				$password = $this->encrypt_password($post[password]);
				$query = $this->executeQry("update ".TBL_ADMINLOGIN." set password = '$password' where id = '$post[admin_id]'");
			}	
			
			$this->deleteval(TBL_ADMINPERMISSION,"1 and adminLevelId = '$adminLevelId'");
			if(count($post[menuCheck]) > 0) {
				foreach($post[menuCheck] as $key=>$value) {	
					$add = "menuCheck_".$value."_add";
					$edit = "menuCheck_".$value."_edit";
					$del = "menuCheck_".$value."_del";						
					$query = $this->executeQry("insert into ".TBL_ADMINPERMISSION." set adminLevelId = '$adminLevelId', menuid = '$value', add_record = '$post[$add]', edit_record = '$post[$edit]', delete_record = '$post[$del]'");		
				}
			}
			echo "<script>window.location.href='administrator.php';</script>";
		}
	}	
}// End Class
?>	