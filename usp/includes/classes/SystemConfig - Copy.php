<?php 
session_start();
class SystemConfig extends MySqlDriver{
	function __construct() {
	  $this->obj = new MySqlDriver;       
    }

	function addConfiguration($post,$file)
	{
	//print_r($post); exit;
		$_SESSION['SESS_MSG'] = "";
		$sql = $this->executeQry("select * from ".TBL_SYSTEMCONFIG." where 1");
		$num = $this->getTotalRow($sql);
		if($num > 0) {
			
			while($line = $this->getResultObject($sql)) {
				/*echo "<pre>";
				print_r($_POST);
				echo "</pre>";*/
				if($line->systemName != 'SITE_LOGO' && $line->systemName != 'SITE_FAVICON' && $line->systemName != 'BACKGROUND_IMAGE' && $line->systemName != 'TESTIMONIAL' && $line->systemName != 'FORUM' && $line->systemName != 'SWF_TTF' && in_array($line->systemName,array_keys($post))) {
					 $query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".addslashes($post[$line->systemName])."' where systemName = '".$line->systemName."'"; 
					//echo "<br/>";
					if($this->executeQry($query)) 
				 		$this->logSuccessFail('1',$query);		
					else 	
						$this->logSuccessFail('0',$query);
						
				} else if($line->systemName == 'SITE_LOGO') {
					if($file['SITE_LOGO']['name']){
						$filename = stripslashes($file['SITE_LOGO']['name']);
						$extension = findexts($filename);
						$extension = strtolower($extension);
						$image_name = date("Ymdhis").time().rand().'.'.$extension;
						$target    = __SITELOGOORIGINAL__.$image_name;
						if($this->checkExtensions($extension)) {	
							$prevLogo = $this->fetchValue(TBL_SYSTEMCONFIG,"systemVal","1 and systemName = 'SITE_LOGO'");
							@unlink(__SITELOGOORIGINAL__.$prevLogo);
							$filestatus = 	move_uploaded_file($file['SITE_LOGO']['tmp_name'], $target);
							chmod($target, 0777);									
							$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".$image_name."' where systemName = 'SITE_LOGO'"; 
							if($this->executeQry($query)) 
						 		$this->logSuccessFail('1',$query);		
							else 	
								$this->logSuccessFail('0',$query);
						} else {
							$_SESSION['SESS_MSG'] .= msgSuccessFail('fail',"This files are not allowed for images.!!!");
						} 	
					}
				} else if($line->systemName == 'SITE_FAVICON') {
					if($file['SITE_FAVICON']['name']){
						$filename = stripslashes($file['SITE_FAVICON']['name']);
						$extension = "ico";
						$extension = strtolower($extension);
				
						//$image_name = date("Ymdhis").time().rand().'.'.$extension;
						$image_name='favicon.'.$extension;
						$target    = __SITELOGOORIGINAL__.$image_name;
						//echo $target;exit;
						if($this->checkExtensions($extension)) {	
							$prevLogo = $this->fetchValue(TBL_SYSTEMCONFIG,"systemVal","1 and systemName = 'SITE_FAVICON'");
							@unlink(__SITELOGOORIGINAL__.$prevLogo);
							$filestatus = 	move_uploaded_file($file['SITE_FAVICON']['tmp_name'], $target);
							chmod($target, 0777);									
							$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".$image_name."' where systemName = 'SITE_FAVICON'"; 
							if($this->executeQry($query)) 
						 		$this->logSuccessFail('1',$query);		
							else 	
								$this->logSuccessFail('0',$query);
						} else {
							$_SESSION['SESS_MSG'] .= msgSuccessFail('fail',"This files are not allowed for images.!!!");
						} 	
					}	
				} else if($line->systemName == 'SWF_TTF'){
					$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".$post[ALLOW_SWF]."' where systemName = 'SWF_TTF'"; 
							if($this->executeQry($query)) 
						 		$this->logSuccessFail('1',$query);		
							else 	
								$this->logSuccessFail('0',$query);
				}else if($line->systemName == 'ALLOW_WEIGHT'){
					$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".$post[ALLOW_WEIGHT]."' where systemName ='ALLOW_WEIGHT'"; 
							if($this->executeQry($query)) 
						 		$this->logSuccessFail('1',$query);		
							else 	
								$this->logSuccessFail('0',$query);
				}else if($line->systemName == 'BACKGROUND_IMAGE') {
					if($file['BACKGROUND_IMAGE']['name']){
						$filename = stripslashes($file['BACKGROUND_IMAGE']['name']);
						$extension = findexts($filename);
						$extension = strtolower($extension);
				
						$image_name = date("Ymdhis").time().rand().'.'.$extension;
						$target    = __BACKGROUNDORIGINAL__.$image_name;
						if($this->checkExtensions($extension)) {	
							$prevBImage = $this->fetchValue(TBL_SYSTEMCONFIG,"systemVal","1 and systemName = 'BACKGROUND_IMAGE'");
							@unlink(__BACKGROUNDORIGINAL__.$prevBImage);
							$filestatus = 	move_uploaded_file($file['BACKGROUND_IMAGE']['tmp_name'], $target);
							chmod($target, 0777);									
							$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".$image_name."' where systemName = 'BACKGROUND_IMAGE'"; 
							if($this->executeQry($query)) 
						 		$this->logSuccessFail('1',$query);		
							else 	
								$this->logSuccessFail('0',$query);
						} else {
							$_SESSION['SESS_MSG'] .= msgSuccessFail('fail',"This files are not allowed for images.!!!");
						} 	
					}
				} else if($line->systemName == 'TESTIMONIAL') {
					if(count($post[TESTIMONIAL]))
						$testStr = implode(',',$post[TESTIMONIAL]);
					$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".addslashes($testStr)."' where systemName = '".$line->systemName."'"; 
					if($this->executeQry($query)) 
				 		$this->logSuccessFail('1',$query);		
					else 	
						$this->logSuccessFail('0',$query);						
				}else if(trim($line->systemName) == 'FORUM'){
				
				    /*//$testStr = implode(',',$post[FORUM]);
					//$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".addslashes($testStr)."' where systemName = '".$line->systemName."'"; 
					//if($this->executeQry($query)) 
				 		//$this->logSuccessFail('1',$query);		
					//else 	
						//$this->logSuccessFail('0',$query);*/	
				}else if (trim($line->systemName) == 'Hot Designs'){
				    if($post[categoryId] != ''){
		   				foreach($post[categoryId] as $key => $catId){
							if($key == 0)
								$categoryId ="-";	
							$categoryId .= $catId."-"; 
		   				}
					}
					$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".$categoryId."' where systemName = '".$line->systemName."'"; 
					if($this->executeQry($query)) 
				 		$this->logSuccessFail('1',$query);		
					else 	
						$this->logSuccessFail('0',$query);	
				
				}else if(trim($line->systemName) == 'Feature Designs'){
					if($post[featureId] != ''){
		   				foreach($post[featureId] as $key => $catId){
							if($key == 0)
								$categoryId ="-";	
							$categoryId .= $catId."-"; 
		   				}
					}
					$query = "update ".TBL_SYSTEMCONFIG." set systemVal = '".$categoryId."' where systemName = '".$line->systemName."'"; 
					if($this->executeQry($query)) 
				 		$this->logSuccessFail('1',$query);		
					else 	
						$this->logSuccessFail('0',$query);	
				
				}
				 	
			}   
		}
	}	
}// End Class
?>	