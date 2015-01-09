<?php 
session_start();
class MailSetting extends MySqlDriver{
	function __construct() {
	  $this->obj = new MySqlDriver;       
    }

	function allMailTypeInformation() {
		if($_REQUEST['searchtxt'] && $_REQUEST['searchtxt'] != SEARCHTEXT){
		$searchtxt = $_REQUEST['searchtxt'];
		$con = " AND mailType LIKE '%$searchtxt%' ";
		}
		$query = "select * from ".TBL_MAILTYPE." where 1=1 $con ";
		$sql = $this->executeQry($query);
		$num = $this->getTotalRow($sql);
		$menuObj = new Menu();
		$page =  $_REQUEST['page']?$_REQUEST['page']:1;
		if($num > 0) {
			$genTable = '';
			//-------------------------Paging------------------------------------------------			
			$paging = $this->paging($query); 
			$this->setLimit($_GET['limit']); 
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
			
			$orderby = $_GET[orderby]? $_GET[orderby]:"mailType";
			$order = $_GET[order]? $_GET[order]:"ASC";
			
			$query .=  " ORDER BY $orderby $order LIMIT ".$offset.", ". $recordsPerPage;
			$rst = $this->executeQry($query); 
			$row = $this->getTotalRow($rst);
		
			if($row > 0) {			
				$i = 1;			
				while($line = $this->getResultObject($rst)) {
					$highlight = $i%2==0?"main-body-bynic":"main-body-bynic2";
					
					$genTable .= '<div class="'.$highlight.'">
								 <ul>
								 	<li style="width:50px;">&nbsp;&nbsp;</li>
									<li style="width:80px;">'.$i.'</li>
									<li style="width:500px;">'.$line->mailType.'</li>
									<li style="width:90px;">';
						$genTable .= '<a href="manageMailDescription.php?id='.$line->id.'"><img src="images/view.png" alt="View" width="16" height="16" border="0" /></a>';
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
	
	
	
	
///////// All Mail Details ///////////////////

	function allMailTypeDetailsInformation($id) {
		$mailTypeId = base64_encode($id);
		if($_REQUEST['searchtxt'] && $_REQUEST['searchtxt'] != SEARCHTEXT){
		$searchtxt = $_REQUEST['searchtxt'];
			$con = " AND ".TBL_MAILSETTING.".mailSubject LIKE '%$searchtxt%' OR ".TBL_LANGUAGE.".languageName LIKE '%$searchtxt%' ";
		}
	 $query = "select ".TBL_LANGUAGE.".languageName,".TBL_MAILSETTING.".id,".TBL_MAILSETTING.".mailSubject,".TBL_MAILSETTING.".emailid from ".TBL_LANGUAGE." INNER JOIN ".TBL_MAILSETTING." ON (".TBL_LANGUAGE.".id = ".TBL_MAILSETTING.".langId)  where 1=1 AND ".TBL_MAILSETTING.".mailTypeId = '$id' $con ";
		$sql = $this->executeQry($query);
		$num = $this->getTotalRow($sql);
		$menuObj = new Menu();
		$page =  $_REQUEST['page']?$_REQUEST['page']:1;
		if($num > 0) {
			$genTable = '';
			//-------------------------Paging------------------------------------------------			
			$paging = $this->paging($query); 
			$this->setLimit($_GET['limit']); 
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
			
			$orderby = $_GET[orderby]? $_GET[orderby]:"mailSubject";
			$order = $_GET[order]? $_GET[order]:"ASC";
			
			$query .=  " ORDER BY $orderby $order LIMIT ".$offset.", ". $recordsPerPage;
			$rst = $this->executeQry($query); 
			$row = $this->getTotalRow($rst);
		
			if($row > 0) {			
				$i = 1;			
				while($line = $this->getResultObject($rst)) {
					$highlight = $i%2==0?"main-body-bynic":"main-body-bynic2";
					
					$genTable .= '<div class="'.$highlight.'">
								 <ul>
								 	<li style="width:50px;">&nbsp;&nbsp;</li>
									<li style="width:80px;">'.$i.'</li>
									<li style="width:100px;">'.$line->languageName.'</li>
									<li style="width:500px;">'.$line->mailSubject.'</li>
									<li style="width:90px;">';
						$genTable .= '<a href="editMailTemplate.php?id='.$line->id.'&mailId='.$mailTypeId.'&page='.$page.'"><img src="images/edit.png" alt="Edit" width="16" height="16" border="0" /></a>';
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
	
	
	//////// Function Get Remaining Language ////////
	
	function getRemainingLanguage($mailTypeId,$langId=''){
		$rstlang = $this->selectQry(TBL_MAILSETTING,"mailTypeId='$mailTypeId'","","");
		$numlang = $this->getTotalRow($rstlang);
			if($numlang){
				while($rowlang = $this->getResultObject($rstlang)){
					$lang[] = '"'.$rowlang->langId.'"';
				}
				$langarr = implode(",",$lang);
			}else{
				$langarr = '0';
			}
		$preTable = "<option value=''>Please Select Language</option>";
		$rst = $this->selectQry(TBL_LANGUAGE,"status='1' AND isDeleted='0' AND id NOT IN ($langarr) order by languageName asc","","");
		$num = $this->getTotalRow($rst);
		if($num){
			while($row = $this->getResultObject($rst)){
			if($langId == $row->id){ $sel = "selected='selected'";}else{$sel = "";}
			$preTable.= "<option value='$row->id' $sel>".ucwords($row->languageName)."</option>"; 
			}
		}
		return $preTable;
	}
	
	
	////// Add New Mail Template //////
	
	function addNewMailTemplate($post){
		$date = date("Y-m-d");
		$sql = "INSERT INTO ".TBL_MAILSETTING." SET `mailTypeId`='".$post[mailTypeId]."', `langId`='".$post[languageName]."', `mailSubject`='".addslashes($post[mailsubject])."', `mailContent`='".addslashes($post[message])."', `emailid`='$post[email]', `addDate`='".date('Y-m-d H:i:s')."', addedBy = '".$_SESSION['ADMIN_ID']."'";
		
		$rst = $this->executeQry($sql);
		if($rst){
			$this->logSuccessFail("1",$sql);
		}else{
			$this->logSuccessFail("0",$sql);
		}
		$mailtypeId = base64_encode($post[mailTypeId]);	
		$_SESSION['SESS_MSG'] = msgSuccessFail("success","Your Information has been added successfully!!!");
		echo "<script language=javascript>window.location.href='manageMailDescription.php?id=$post[mailTypeId]';</script>";
		header("Location:manageMailDescription.php?id=".$post[mailTypeId]);
		exit;
	}
	
////// Edit Mail Template //////
	
	function editMailTemplate($post){
		$date = date("Y-m-d");
		$sql = "UPDATE ".TBL_MAILSETTING." SET `mailSubject`='".addslashes($post[mailsubject])."', `mailContent`='".addslashes($post[message])."', `emailid`='$post[email]', modDate = '".date('Y-m-d H:i:s')."', modBy = '".$_SESSION['ADMIN_ID']."' WHERE `mailTypeId`='$post[mailTypeId]' AND `id`='$post[id]'";
		$rst = $this->executeQry($sql);
		if($rst){
			$this->logSuccessFail("1",$sql);
		}else{
			$this->logSuccessFail("0",$sql);
		}
		$_SESSION['SESS_MSG'] = msgSuccessFail("success","Your Information has been updated successfully!!!");
		echo "<script language=javascript>window.location.href='manageMailDescription.php?id=$post[mailTypeId]';</script>";
		header("Location:manageMailDescription.php?id=".$post[mailTypeId]);
		exit;
	}	
///////// Select Record To Update //////////

	function recordToUpdate($id,$mailTypeId){
		$rst = $this->selectQry(TBL_MAILSETTING,"id='$id' AND mailTypeId='$mailTypeId'","0","0");
		$row = $this->getResultObject($rst);
		return $row;
	}	
	

	
	
}// End Class
?>	