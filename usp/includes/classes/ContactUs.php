<?php 
session_start();
class ContactUs extends MySqlDriver{
	function __construct() {
	  $this->obj = new MySqlDriver;       
    }
	

	function valDetail() {
		$menuObj =  new Menu;
		$cond = " 1=1 ";
		if($_REQUEST['searchtxt'] && $_REQUEST['searchtxt'] != SEARCHTEXT){
			$searchtxt = $_REQUEST['searchtxt'];
			$cond .= " AND (".TBL_CONTACTUSTYPE.".`contactUsType` LIKE '%$searchtxt%' OR ".TBL_CONTACTUS.".`emailId` LIKE '%$searchtxt%')  ";
		}
		$query = " SELECT ".TBL_CONTACTUSTYPE.".`contactUsType`, ".TBL_CONTACTUS.".`emailId`,".TBL_CONTACTUS.".`id`, ".TBL_CONTACTUS.".`addDate`,".TBL_CONTACTUS.".`replyBy`  FROM ".TBL_CONTACTUSTYPE." INNER JOIN ".TBL_CONTACTUS." ON (".TBL_CONTACTUSTYPE.".id = ".TBL_CONTACTUS.".contactUsTypeId) WHERE $cond ";
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
			$orderby = $_GET[orderby]? $_GET[orderby]:"addDate";
		    $order = $_GET[order]? $_GET[order]:"DESC";   
            $query .=  " ORDER BY $orderby $order LIMIT ".$offset.", ". $recordsPerPage;
			$rst = $this->executeQry($query); 
			$row = $this->getTotalRow($rst);
			if($row > 0) {			
				$i = 1;			
				while($line = $this->getResultObject($rst)) {
					$highlight = $i%2==0?"main-body-bynic":"main-body-bynic2";
					$div_id = "status".$line->id;
					if ($line->replyBy==0)
						$status = "No";
					else
						$status = "Yes";
					
					
					
					$genTable .= '<div class="'.$highlight.'">
								   <ul>
								 	<li style="width:50px;">&nbsp;&nbsp;<input name="chk[]" value="'.$line->id.'" type="checkbox" class="checkbox"></li>
									<li style="width:50px;">'.$i.'</li>
									<li style="width:80px;">'.stripslashes($line->contactUsType).'</li>
									<li style="width:150px;">'.stripslashes($line->emailId).'</li>
									<li style="width:200px;">'.wrapText(date(DEFAULTDATEFORMAT,strtotime($line->addDate)),20).'</li>
									<li style="width:90px;">'.$status.'</li>';
					$genTable .= '<li style="width:60px;">';
					$genTable .= '<a href="viewContactUs.php?id='.base64_encode($line->id).'&pageId='.base64_encode($id).'" title="View"><img src="images/view.png" alt="View" width="16" height="16" border="0" /></a>';
					$genTable .= '</li>';
					$genTable .= '<li style="width:60px;">';
					if($menuObj->checkEditPermission()) {					
						$genTable .= '<a href="viewContactUs.php?id='.base64_encode($line->id).'&pageId='.base64_encode($id).'" title="Reply" ><img src="images/sendMail.png" alt="Reply" width="16" height="16" border="0" /></a>';
					}	
					$genTable .= '</li><li style="width:60px;">';
					if($menuObj->checkDeletePermission()) {					
						$genTable .= "<a href='javascript:void(0);'  onClick=\"if(confirm('Are you sure to delete this Query?')){window.location.href='pass.php?action=contactUs&type=delete&id=".$line->id."&page=$page'}else{}\" ><img src='images/drop.png' height='16' width='16' border='0' title='Delete' /></a>";
					}
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
					</td><td align='center' class='page_info'><inputtype='hidden' name='page' value='".$currpage."'></td><td class='page_info' align='center' width='200'>Total ".$totalrecords." records found</td><td width='0' align='right'>".$pagenumbers."</td></tr></table></div>";
			}					
		} else {
			$genTable = '<div>&nbsp;</div><div class="Error-Msg">Sorry no records found</div>';
		}	
		return $genTable;
	}




	function checkIsPageExists($id){
		$rst = $this->selectQry(TBL_CONTACTUS,"id='$id'","","");	
		$row = $this->getTotalRow($rst);
		if(!$row){
			header("Location:manageContactUs.php");exit;
		}else{
		return $this->getResultRow($rst);
		}
	}


	///////////////// Reply ///////////////
	
	function addContactUsReply($post){
	
		$_SESSION['SESS_MSG'] = "";	
		$this->tablename = TBL_CONTACTUS;	
		$this->field_values['replyText'] = $post['replyText'] ;
		$this->field_values['replyBy'] = $_SESSION['ADMIN_ID'];
		$this->field_values['replyDate'] = date("Y-m-d h:i:s");
		$this->condition  = "id = '$post[id]' ";
		$res = $this->updateQry();
		if($res){
		$mailfunctionObj = new MailFunction();
			$mailfunctionObj->mailValue("4",$post[langId],$post[id]);	
			$_SESSION['SESS_MSG'] =  msgSuccessFail("success","Message Has been sent out successfully.");
		}else{
			$_SESSION['SESS_MSG'] =  msgSuccessFail("fail","There is some problem to send Message.");
		}	
		header("Location:manageContactUs.php");exit;
	}


	function deleteValue($get){
		$sql = " DELETE FROM  ".TBL_CONTACTUS." WHERE id = '$get[id]' ";
		$rst = $this->executeQry($sql);
		if($rst){
			$this->logSuccessFail('1',$query);		
		}else{ 	
			$this->logSuccessFail('0',$query);
		}
		$_SESSION['SESS_MSG'] = msgSuccessFail("success","Your Information has been deleted successfully!!!");
        echo "<script language=javascript>window.location.href='manageContactUs.php?id=$get[pageId]&page=$get[page]&limit=$get[limit]';</script>";
	}
	

function deleteAllValues($post){
				
		if($post[action] == 'deleteselected'){
			$delres = $post[chk];
			$numrec = count($delres);
			if($numrec>0){
				foreach($delres as $key => $val){
					$sql = "DELETE FROM ".TBL_CONTACTUS." where id = '$val'";
					$rst = $this->executeQry($sql);
					if($rst){
						$this->logSuccessFail("1",$sql);
						}else{
						$this->logSuccessFail("0",$sql);
						}
					}
				$_SESSION['SESS_MSG'] =msgSuccessFail("success","Your all selected information has been deleted successfully!!!");
			}else{
			    $_SESSION['SESS_MSG'] =msgSuccessFail("fail","First select the record!!!");
			}
		}
	echo "<script language=javascript>window.location.href='manageContactUs.php?page=$post[page]&limit=$post[limit]';</script>";
	}	




	
	
}// end Class

?>	