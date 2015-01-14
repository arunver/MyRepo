<?php
function __autoload($class_name) {
	
   $file =  PATH.'includes/classes/'.$class_name . '.php';		
			
			if(file_exists($file)) 
				{
				//	echo "exist :".$file;
					require_once($file);
				}
			else
				{
				//	echo "not exist : ".$file; 
					die('File Not Found');
				}
				
	$admin_readonly = (($_SESSION['ADMIN_TYPE'] == 1) ? '' : 'disabled="disabled"');
	$ntap_readonly = (($_SESSION['ADMIN_TYPE'] == 2) ? 'disabled="disabled"' : '');
	$acn_readonly = (($_SESSION['ADMIN_TYPE'] == 3) ? 'disabled="disabled"' : '');					
}


function redirect($page)
{	
	if(!headers_sent())
		header("location:$page");
	else
		echo "<script>window.location.href='$page'</script>";
}


function unsets($post,$unset_value){
	if(!is_array($unset_value)){$temp=$unset_value;$unset_value=array($temp);}
	if(!empty($post) && !empty($unset_value)){
		foreach($unset_value as $val){
			if(isset($post[$val])){
				unset($post[$val]);
			}
		}
	}
	return $post;
}



function postwithoutspace($post)
{
   foreach($post as $key=>$value)
	{
	  if(is_array($value)){
	    //print_r($value);
	  	foreach($value as $key1 => $value1){
			$value1= htmlspecialchars(mysql_real_escape_string(trim($value1)));
	  		$post[$key1]= $value1;	
		}	  
	  }else{
	  	$value= htmlspecialchars(mysql_real_escape_string(trim($value)));
	  	$post[$key]= $value;
	  }
	}
	return  $post;
}
	
	
function displayWithStripslashes($post)
{
   foreach($post as $key=>$value)
	{
	  $value=stripslashes(trim($value));
	  $post[$key]= $value;
	}
	return  $post;
}
		
	
function datediff($date1,$date2,$format='d'){
    $difference = abs(strtotime($date2) - strtotime($date1));
		switch (strtolower($format)){
			case 'd':
			$days = round((($difference/60)/60)/24,0);
			break;
			case 'm':
			$days = round(((($difference/60)/60)/24)/30,0);
			break;
			case 'y':
			$days = round(((($difference/60)/60)/24)/365,0);
			break;
		}
	return $days;
}

 
function msgSuccessFail($type,$msg){
	if($type == 'fail'){
		$preTable = "<table class='Error-Msg' align='center' cellpadding='0' cellspacing='0'><tr><td width='410px' align='center' valign='middle' height='15'><img src='images/error.png' width='16' border='0' height='16'>&nbsp;&nbsp;&nbsp;$msg</td></tr></table>";
	} elseif($type == 'success') {
		$preTable = "<table class='Success-Msg' align='center' cellpadding='0' cellspacing='0'><tr><td width='410px' align='center' height='15'><img src='images/done.gif' width='16' border='0' height='16'>&nbsp;&nbsp;&nbsp;$msg</td></tr></table>";
	}
	return $preTable;
}


function orderBy($pageurl,$orderby,$displayTitle){
	if($_GET[order] == 'ASC') { 
	$order = "DESC";}
	else{ $order = "ASC";}
	if(($_GET[orderby] == $orderby)&&($_GET[order] == 'ASC')){
	$img = "<img src='images/orderup.png' border='0' />";
	}
	elseif(($_GET[orderby] == $orderby)&&($_GET[order] == 'DESC')){
	$img = "<img src='images/orderdown.png'  border='0' />";
	}else{
	$img = "";
	}
	$explodedlink = explode("?",$pageurl);
	if($explodedlink[1]){
	$display = "<a href='$pageurl&orderby=$orderby&order=$order&page=$_GET[page]&limit=$_GET[limit]' class='order'>$displayTitle </a> $img";
	}else{
	$display = "<a href='$pageurl?orderby=$orderby&order=$order&page=$_GET[page]&limit=$_GET[limit]' class='order'>$displayTitle</a> $img";
	}
	echo $display; 
}

function findexts($filename) {
  $filename = strtolower($filename) ;
  $exts = @split("[/\\.]", $filename) ;
  $n = count($exts)-1;
  $exts = $exts[$n];
  return $exts;
}

function getPageName() {	
	$pageName   = basename($_SERVER['PHP_SELF']);

	if ($pageName=='')
		$pageName = "index.php";
	return $pageName;	
}

function getImagePath($mainImage,$mainWidth,$mainHeight,$noImage,$noImageWidth,$noImageHeight) {
    
	$imageDetail = array();
	if(file_exists($mainImage)) {
		array_push($imageDetail,$mainImage);
		array_push($imageDetail,$mainWidth);
		array_push($imageDetail,$mainHeight);						
	} elseif(!file_exists($mainImage)) {
		array_push($imageDetail,$noImage);
		array_push($imageDetail,$noImageWidth);
		array_push($imageDetail,$noImageHeight);							
	}	
	return $imageDetail;
}

//************************
//** Changes by ashish
//************************

function getpagelink($lastpage,$page,$adjacents){
	
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
			else
				$pagination.= "<span class=\"disabled\">« previous</span>";	
			
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
			else
				$pagination.= "<span class=\"disabled\">next »</span>";
			$pagination.= "</div>\n";		
		}
		return $pagination;
	}


	function create_thumb_imagemagic($file,
                              $width              = 0, 
                              $height             = 0, 
							  $output             = 'file',
                              $proportional       = true, 
                              $delete_original    = false, 
                              $use_linux_commands = false ) {


/*echo $file;echo '<br>';
echo $width;echo '<br>';
echo $height;echo '<br>';
echo $output;echo '<br>';
die;*/
    if ( $height <= 0 && $width <= 0 ) return false;

    # Setting defaults and meta
    $info                         = getimagesize($file);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;

    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );

      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    }

    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   $image = imagecreatefromgif($file);   break;
      case IMAGETYPE_JPEG:  $image = imagecreatefromjpeg($file);  break;
      case IMAGETYPE_PNG:   $image = imagecreatefrompng($file);   break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);

      if ($transparency >= 0) {
        $transparent_color  = imagecolorsforindex($image, $trnprt_indx);
        $transparency       = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
    
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output);   break;
      case IMAGETYPE_PNG:   imagepng($image_resized, $output);    break;
      default: return false;
    }

    return true;
  }
  
  
    function curPageInfo() { 
    	return substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
	//Get Current PHP page name
	function curPageName() {
	 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
	function wrapText($txt,$len)
		{
			(strlen($txt) > $len) ? $suffix = '...' : $suffix = '';
			$text = substr($txt,0,$len).$suffix;	
			return $text;
		}


	function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

	function selfURL(){ 
			if(!isset($_SERVER['REQUEST_URI']))
			{
				$serverrequri = $_SERVER['PHP_SELF']; 
			}
			else{
				$serverrequri = $_SERVER['REQUEST_URI']; 
			} 
			$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
			$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
			$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
			return $protocol."://".$_SERVER['SERVER_NAME'].$port.$serverrequri; 
	}

	
function createDateRangeArray($strDateFrom,$strDateTo) {
  // takes two dates formatted as YYYY-MM-DD and creates an
  // inclusive array of the dates between the from and to dates.
  
  $aryRange=array(); 

  $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),substr($strDateFrom,8,2),substr($strDateFrom,0,4));
  $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),substr($strDateTo,8,2),substr($strDateTo,0,4));

  if ($iDateTo>=$iDateFrom) {
    array_push($aryRange,date('d-m-Y',$iDateFrom)); // first entry

    while ($iDateFrom<$iDateTo) {
      $iDateFrom+=86400; // add 24 hours
      array_push($aryRange,date('d-m-Y',$iDateFrom));
    }
  }
  return $aryRange;
}


function getExtension($str) {
		//This function reads the extension of the file. It is used to determine if the
		// file  is an image by checking the extension.
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}


  function fileUpload($file,$filename,$path = '../images/')
	  {	   
			/*$img_url = $_SERVER['DOCUMENT_ROOT'].'fansCheer/images/team/main/';
			$msg = fileUpload($_FILES,'team_image',$img_url);		*/	
			
			define ("MAX_SIZE","100"); 
					 $errors=0;		
					 
						//reads the name of the file the user submitted for uploading
						$image=$file[$filename]['name'];
					
						if ($image) 
							{
				
								$filename = stripslashes($file[$filename]['name']);
						
								$extension = getExtension($filename);
								$extension = strtolower($extension);
						 if (($extension != "jpg") && ($extension != "jpeg") && ($extension !=
						 "png") && ($extension != "gif")) 
								{							
									return 'Unknown extension!';
								//	$errors=1;
								}
							else
								{
									$size=filesize($file[$filename]['tmp_name']);					
								
									if ($size > MAX_SIZE*1024)
									{
										echo 'You have exceeded the size limit!';
										$errors=1;
									}	
									
									$image_name=time().'.'.$extension;
									
									$newname = $path.$image_name;
								//	echo $newname;exit;
									$copied = copy($file[$filename]['tmp_name'], $newname);
									if (!$copied) 
									{
									return 'Copy unsuccessfull!';
									//$errors=1;
									}
						
								}
							}
					
						//If no errors registred, print the success message
						 if(!$errors) 
						 {
							return "File Uploaded Successfully! Try again!";
						 }
	
	  }


	   function count_words($str) 
		 {
			 $words = 0;
			$str = preg_replace("/ +/", " ", $str);
			$array = explode(" ", $str);
			for($i=0;$i < count($array);$i++)
			{
			if (preg_match("/[0-9A-Za-zÀ-ÖØ-öø-ÿ]/i", $array[$i])) 
			$words++;
			}
			return $words;
		 } 


	function createTrigger($trigger_name,$db_name){
	 
	$sql = "DELIMITER $$
			USE ".$db_name."$$			
			DROP TRIGGER IF EXISTS ".$trigger_name."$$
			
			CREATE TRIGGER ".$trigger_name." AFTER INSERT ON `userpointhistory`
			FOR EACH ROW BEGIN
			DECLARE existUserID INTEGER;
			
			SELECT userID INTO existUserID FROM userpoints where userID = NEW.userID;
			
			IF (existUserID > 0 AND NEW.pointStatus = ‘RECEIVE’) THEN
			UPDATE userpoints SET totalPoint = totalPoint + NEW.point WHERE userID = NEW.userID;
			
			ELSE IF (NEW.pointStatus = ‘SPEND’) THEN
			UPDATE userpoints SET totalPoint = totalPoint – NEW.point WHERE userID = NEW.userID;
			ELSE
			Insert INTO userpoints(userID,totalPoint) values (NEW.userID, NEW.point);
			END IF;
			END IF;
			
			END;
			$$
			
			DELIMITER ;";
			return $sql;
 }
 
 
	 function objectToArray($d) {
			if (is_object($d)) {
				// Gets the properties of the given object
				// with get_object_vars function
				$d = get_object_vars($d);
			}
	 
			if (is_array($d)) {
				/*
				* Return array converted to object
				* Using __FUNCTION__ (Magic constant)
				* for recursive call
				*/
				return array_map(__FUNCTION__, $d);
			}
			else {
				// Return array
				return $d;
			}
		}
 
 
		function arrayToObject($d) {
			if (is_array($d)) {
				/*
				* Return array converted to object
				* Using __FUNCTION__ (Magic constant)
				* for recursive call
				*/
				return (object) array_map(__FUNCTION__, $d);
			}
			else {
				// Return object
				return $d;
			}
		}


	function getLatLng($address){
		 $latlngdata = array();
		 $address = str_replace(' ', '+', $address);
		 $geocode = @file_get_contents('http://maps.google.com/maps/api/geocode/json?address="'.$address.'"&sensor=false');
		 $output = json_decode($geocode);
		 
		 $latlngdata['latitude']	= $output->results[0]->geometry->location->lat;
		 $latlngdata['longitude'] 	= $output->results[0]->geometry->location->lng;
		 return $latlngdata;
	}

	function date_my_format($timestamp,$format)
	{
		$date = date_create();
		date_timestamp_set($date, $timestamp);
		return date_format($date, "$format");
	}
	
	function genPassword($len = 8) {  
		$chars = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#');  	
		$pwd = '';  
		  
		for($i=0; $i < $len; $i++)  
		$pwd .= $chars[rand(1, sizeof($chars)) -1];  
		return $pwd;  
    }  
	
//*********************** done by ashish *************

/*if($_SESSION['DEFAULTCURRENCYID'] == ''){
	$_SESSION['DEFAULTCURRENCYID']=1;
}*/


?>