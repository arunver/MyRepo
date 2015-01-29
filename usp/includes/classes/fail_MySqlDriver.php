<?php
//@author: Arun Verma
global $config;
@include("config/configure.php");
require_once(PATH."config/tables.php");
require_once(PATH."includes/classes/DB.php");
class MySqlDriver implements DB
{
	var $sql;
	var $rs;
	var $numrows;
	var $limit;
    var $noofpage;
	var $offset;
	var $page;
	var $style;
	var $parameter;
	var $activestyle;
	var $buttonstyle;
	var $field_values;
	var $tablename;
	private $host;
	private $user;
	private $pass;
	private $database;
	public $link;

	public function log_db_errors( $error, $query, $severity )
	    {
	        $headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        $headers .= 'To: Admin <'.SEND_ERRORS_TO.'>' . "\r\n";
	        $headers .= 'From: Yoursite <system@your-site.com>' . "\r\n";
	    
	        $message = '<p>An error has occurred:</p>';

	        $message .= '<p>Error at '. date('Y-m-d H:i:s').': ';
	        $message .= 'Query: '. htmlentities( $query ).'<br />';
	        $message .= '</p>';
	        $message .= '<p>Severity: '. $severity .'</p>';

	        mail( SEND_ERRORS_TO, 'Database Error', $message, $headers);

	        if( DISPLAY_DEBUG )
	        {
	            echo $message;   
	        }
	    }

    public function __construct() {	
	    	$this->dbConnect();	
		
    	//$this->cnx = mysql_connect($this->host,$this->user,$this->pass) or die("Cannot connect to MySQL" . mysql_error());
		//mysql_select_db($this->database) or die(mysql_error());
		
		//echo $this->database; 
	  	//define('SITENAME',$this->fetchValue(TBL_SYSTEMCONFIG,'systemVal',"systemName='SITE_NAME'"));	
    }	
			
	protected function dbConnect() {
		global $config; 		
		$this->host = $config['server'];
		$this->user = $config['user'];
		$this->pass = $config['pass'];
		$this->database = $config['database'];
		mb_internal_encoding( 'UTF-8' );
		mb_regex_encoding( 'UTF-8' );	

		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->database);

		if( mysqli_connect_errno() )
        {        	
            $this->log_db_errors( "Connect failed: %s\n", mysqli_connect_error(), 'Fatal' );
            exit();
        }        
		return $this->link;
	}

	public function __destruct()
	{
		$this->disconnect();
	}
	

	 public function disconnect()
    {
		mysqli_close( $this->link );
	}


	// Select Query
	function selectQry($table,$condition,$limitS,$limitE) 
	{	    
		if(!$condition){
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table;
			else
				$sql="select * from ".$table." limit ".$limitS.", ".$limitE;
		}
		else {
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table." where ".$condition;
			else
				$sql="select * from ".$table." where ".$condition." limit ".$limitS.", ".$limitE;
		}
		//echo $sql;exit;
		//die();
		$dataSet=$this->executeQry($sql);
		return $dataSet;
	}
	
	// Select With Order By Condition//////////////////////////////////////////////////
	
	function selectOrderQry($table,$condition,$orderby,$limitS,$limitE) 
	{
		if(!$condition)
		{
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table." order by ".$orderby;
			else
				$sql="select * from ".$table." order by ".$orderby." limit ".$limitS.", ".$limitE;
		}
		else 
		{
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table." where ".$condition." order by ".$orderby;
			else
				$sql="select * from ".$table." where ".$condition." order by ".$orderby." limit ".$limitS.", ".$limitE;
		}
		$dataSet=$this->executeQry($sql);
		return $dataSet;
	}
	
	///////////////////////////////////////////////////////////////////////
	
	
	
	function editRec($table,$frmval,$condition)
	{
		$sql="update ".$table." set ".$frmval." where ".$condition;
		$dataSet=$this->executeQry($sql);
		return $dataSet;
	}

	function executeQry($sql) 
	{		
		$link = $this->dbConnect();

		if (!is_string($sql)) {
            //throw new Exception("Illegal parameter. Must be string.");
			die("Illegal parameter. Must be string.");
        }
		else {				
			$rsSet = mysqli_query($link,$sql);	
		}
		if (!$rsSet) 
			{
				//$this->throwMysqlException();
				die(@mysqli_errno($link));			
				
			}
		else
			{
				mysqli_close( $link );
				return $rsSet;		
			}
	}
	
	function insert_id()
	{
		$link = $this->dbConnect();
		return mysqli_insert_id($link);
	}
	
	function deleteval($tbl,$con){
		$sql="delete from ".$tbl." where ".$con;
		$result=mysql_query($sql) or die(mysql_error());
	}	
	function getResultRow($DataSet) 
	{
		return mysql_fetch_array($DataSet);
	}
	function getResultObject($DataSet) 
	{
		return mysql_fetch_object($DataSet);
	}
	function getTotalRow($DataSet) {
		return mysqli_num_rows($DataSet);
	}
	function addParameter($param)
	{
		$allParam=$allParam;
	}
	
	function throwMysqlException($addToMessage = "") {
        if (is_string($addToMessage)) {
            $message = $addToMessage ." \n". @mysql_error($this->dbConnect());
        }
        else {
            $message = @mysql_error($this->dbConnect());
        }
        //throw new Exception($message, @mysql_errno($this->dbConnect()));
		die(@mysql_errno($this->dbConnect()));
    }

    public function query( $query )
    {    	
    	$link = $this->dbConnect();
        $query = $link->query( $query );
        if( mysqli_error( $link ) )
        {        	
            $this->log_db_errors( mysqli_error( $link ), $query, 'Fatal' );
            return false; 
        }
        else
        {        	
            return true;
        }
        mysqli_free_result( $query );
    }

    public function fetchValue($tbl, $field, $con)
		{	
			$link = $this->dbConnect();

			$query = "select ".$field." from ".$tbl." where ".$con;			
		    $query = $link->query($query);
		   
		    if( mysqli_error( $link ) )
		    {		
		        $this->log_db_errors( mysqli_error( $link ), $query, 'Fatal' );
		        return false;
		    }
		    else
		    {
		        $r = mysqli_fetch_row( $query );
		        mysqli_free_result( $query );
		        mysqli_close( $link );
		        return $r[0];   
		    }
		}

/*    public function fetchValue($tbl, $field, $con){
		$sql="select ".$field." from ".$tbl." where ".$con;			
        $result= $this->link->query($sql) or die(mysqli_error($this->link));
		$rows=mysqli_num_rows($result);
		$rec=mysqli_fetch_object($result);
		$val=$rec->$field;
		echo $val;exit;
		mysqli_free_result( $result );
	    return $val;	
    }*/

    function updateValue($tbl,$con,$val){
    	$link = $this->dbConnect();
		$sql="update ".$tbl." set ".$val." where ".$con;
		$result=mysqli_query($link,$sql) or die(mysqli_error($link));
		mysqli_close( $link );
    }	

    function singleValue($tbl,$con){
    	$link = $this->dbConnect();
		$sql="select * from ".$tbl." where ".$con;
	//	echo $sql; exit;
        $result=mysqli_query($link,$sql) or die(mysqli_error($link));
		$rec=mysqli_fetch_object($result);
		mysqli_close( $link );
	    return $rec;	
    }

    function deleteRec($table,$condition)
    {    	
		if(!$condition){
			$sql="delete from ".$table;
		}
		else{
			$sql="delete from ".$table." where ".$condition;
		}
		$dataSet=$this->executeQry($sql);
		return $dataSet;
    }
	


		
	function insertQry()
	{
		$str_f		=		"("	;
		$str_v		=		"("	; 
		$i			=		0	; 				
		foreach($this->field_values as $key => $val)
		{
			if($i==0){
				$key="`".$key."`";
				if($val == "now()")
				$val=$val;
				else
				$val="'".$val."'";
			}else{
				$key=", `".$key."`";
				if($val == "now()")
				$val=", ".$val;
				else
				$val=", '".$val."'";
			}
			$str_f.= $key;
			$str_v.= $val;
			$i++;
		}  
		$str_f		=		$str_f.")";
		$str_v		=		$str_v.")";					 
		$str		=		"INSERT INTO ".$this->tablename." ".$str_f." VALUES ".$str_v;
	//echo "<br>".$str."<br>";
		$q[0]		= 		$this->executeQry($str);
		$q[1]		=		$this->insert_id();

		return $q;
	}


	function updateQry()
	{
		$str="";
		$i=0; 				
		foreach($this->field_values as $key => $val)
		{
			if($i==0){
				if($val == "now()")
					$val=$val;
				else
					$val="'".$val."'";
			$key="`".$key."`";
			}else{
				if($val == "now()")
					$val	=	$val;
				else
					$val	=	"'".$val."'";
				$key=", `".$key."`";
			}
			$str.=$key." = ".$val;
			$i++;
		}  
		if($this->condition=='')
			$str		=	"UPDATE ".$this->tablename." "." SET ".$str;
		else
			$str		=	"UPDATE ".$this->tablename." "." SET ".$str." WHERE ".$this->condition;
	// echo "<br>".$str."<br>";exit;
		$result_up	=	$this->executeQry($str);
		$q			=	mysqli_affected_rows($this->dbConnect());

		//return  $q; 
		return $result_up;
	}
	
	
// Paging Test	
	
	function paging($query) {
			$this->offset=0;
			$this->page=1;
			$this->sql=$query;
			$this->rs=mysql_query($this->sql);
			$this->numrows=mysql_num_rows($this->rs);
	}
	function getNumRows() {
			return $this->numrows;
	}
	function setLimit($no) {
	        if($no)  
			$this->limit=$no;
			else
			$this->limit=10;
	}
	function getLimit() {
			return $this->limit;
	}
	function getNoOfPages() {
			return ceil($this->noofpage=($this->getNumRows()/$this->getLimit()));
	} 
	function getPageNo() {
			
			if($this->getNumRows() > $this->getLimit()){
			
			$str="";
			$str=$str."<table width='100%' border='0' ><tr>";
			$str=$str."<td width='100%'  valign='top' height='25'>";
			//	$str=$str."<span class='blacktext'>View All&nbsp;|&nbsp;</span>";
			if($this->getPage()>1) {
				$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".($this->getPage()-1).$this->getParameter()."' class='".$this->getStyle()."'>Prev</a>&nbsp;";
			}
			
			if($this->getPage() > 6)
			{   
			    $l = 1;
				for($i=$this->getPage()-1;$i>0;$i--) {
					$arr[] = "<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					if($l == 5)
					break;
					$l++;
				}
				if($this->getNoOfPages()-$this->getPage() < 5)
				{
				   $start = $i -1;
				   $diff = $this->getNoOfPages()-$this->getPage();
				   $loop = 5-$diff;
				   for($m = 1; $m<=$loop; $m++) {
				     if($start>0)
				     $arr[] = "<a href='".$_SERVER['PHP_SELF']."?page=".$start.$this->getParameter()."' class='".$this->getStyle()."'>".$start."</a>&nbsp;"; 
				     $start--;
					} 
				}
				$arrrev = array_reverse($arr);
				foreach($arrrev as $val)
				  $str = $str.$val;
			}
			
			$current = $this->getPage();
			if($current > 6)
			{   
			    $k = 1;
				for($i=$current;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
						$str=$str."<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
					if($k == 6)
					break;
					$k++;
				}
			}
			else
			{
				$j = 1;
				for($i=1;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
					if($i != "1"){
					$str=$str."|&nbsp";
					}
						$str=$str."&nbsp;<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."|&nbsp;<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
				   if($j == 11)
				   break;
				   $j++;
				}
			  if($this->getNoOfPages() > $i+1)
			  {
			    $str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".($i+1).$this->getParameter()."' class='".$this->getStyle()."'>.. </a>";
			  }
				
			
			}
			
			if($this->getPage()<$this->getNoOfPages()) {
				$str=$str."|<a href='".$_SERVER['PHP_SELF']."?page=".($this->getPage()+1).$this->getParameter()."' class='".$this->getStyle()."'> Next</a>";
			}
			$str=$str."</td>";
			$str=$str."</tr></table>";
			}
			return @$str;
	}
	function getPageNo1() {
			$str="";
			$str=$str."<table   border='0' cellspacing='0' cellpadding='0'><tr>";
			$str=$str."<td width='100%'  valign='top' >";
			if($this->numrows==$_GET[limit])
			{
			$str=$str."<span class='blacktext2'><a href='".$_SERVER['PHP_SELF']."?page=1".$this->getParameter()."' class='blacktext2'> View in Paging</a>&nbsp;|&nbsp;</span>";
			}
			else 
			{
		$str=$str."<span class='blacktext2'><a href='".$_SERVER['PHP_SELF']."?limit=". $this->numrows."&".$this->getParameter()."' class='blacktext2'> View All</a>&nbsp;|&nbsp;</span>";
			}
			
			
			if($this->getPage()>1) {
				$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".($this->getPage()-1).$this->getParameter()."' class='".$this->getStyle()."'>Prev</a>|&nbsp;";
			}
			
			if($this->getPage() > 6)
			{   
			    $l = 1;
				for($i=$this->getPage()-1;$i>0;$i--) {
					$arr[] = "<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					if($l == 5)
					break;
					$l++;
				}
				if($this->getNoOfPages()-$this->getPage() < 5)
				{
				   $start = $i -1;
				   $diff = $this->getNoOfPages()-$this->getPage();
				   $loop = 5-$diff;
				   for($m = 1; $m<=$loop; $m++) {
				     if($start>0)
				     $arr[] = "<a href='".$_SERVER['PHP_SELF']."?page=".$start.$this->getParameter()."' class='".$this->getStyle()."'>".$start."</a>&nbsp;"; 
				     $start--;
					} 
				}
				$arrrev = array_reverse($arr);
				foreach($arrrev as $val)
				  $str = $str.$val;
			}
			
			$current = $this->getPage();
			if($current > 6)
			{   
			    $k = 1;
				for($i=$current;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
						$str=$str."<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
					if($k == 6)
					break;
					$k++;
				}
			}
			else
			{
				$j = 1;
				for($i=1;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
						$str=$str."<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
				   if($j == 11)
				   break;
				   $j++;
				}
			  if($this->getNoOfPages() > $i+1)
			  {
			    $str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".($i+1).$this->getParameter()."' class='".$this->getStyle()."'>.. </a>";
			  }

			
			}
			
			if($this->getPage()<$this->getNoOfPages()) {
				$str=$str."|<a href='".$_SERVER['PHP_SELF']."?page=".($this->getPage()+1).$this->getParameter()."' class='".$this->getStyle()."'> Next</a>";
			}
			$str=$str."</td>";
			$str=$str."</tr></table>";
			return $str;
	}
	function getPageNoUrlrewriting() {
	$_SERVER['PHP_SELF']=$_SERVER['REQUEST_URI'];
	
	   $page=explode("/",strrchr($_SERVER['PHP_SELF'], '/'));
	   if(!intval($page[1]))
	   {
	   $this->page=1;
	   }
	   else
	   {	   
	$this->page=$page[1];
	}
	
   	$_SERVER['PHP_SELF'] =substr($_SERVER['REQUEST_URI'],0,strripos($_SERVER['PHP_SELF'], '/'));
			$str="";
			$str=$str."<table   border='0' cellspacing='0' cellpadding='0'><tr>";
			$str=$str."<td width='100%'  valign='top' >";
			
			
			
			if($this->getPage()>1) {
				$str=$str."<a href='".$_SERVER['PHP_SELF'].$this->getParameter().($this->getPage()-1)."' class='".$this->getStyle()."'>Prev</a>|&nbsp;";
			}
			
			if($this->getPage() > 6)
			{   
			    $l = 1;
				for($i=$this->getPage()-1;$i>0;$i--) {
					$arr[] = "<a href='".$_SERVER['PHP_SELF'].$this->getParameter().$i."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					if($l == 5)
					break;
					$l++;
				}
				if($this->getNoOfPages()-$this->getPage() < 5)
				{
				   $start = $i -1;
				   $diff = $this->getNoOfPages()-$this->getPage();
				   $loop = 5-$diff;
				   for($m = 1; $m<=$loop; $m++) {
				     if($start>0)
				     $arr[] = "<a href='".$_SERVER['PHP_SELF'].$this->getParameter().$start."' class='".$this->getStyle()."'>".$start."</a>&nbsp;"; 
				     $start--;
					} 
				}
				$arrrev = array_reverse($arr);
				foreach($arrrev as $val)
				  $str = $str.$val;
			}
			
			$current = $this->getPage();
			if($current > 6)
			{   
			    $k = 1;
				for($i=$current;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
						$str=$str."<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."<a href='".$_SERVER['PHP_SELF'].$this->getParameter().$i."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
					if($k == 6)
					break;
					$k++;
				}
			}
			else
			{
				$j = 1;
				for($i=1;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
						$str=$str."<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."<a href='".$_SERVER['PHP_SELF'].$this->getParameter().$i."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
				   if($j == 11)
				   break;
				   $j++;
				}
			  if($this->getNoOfPages() > $i+1)
			  {
			    $str=$str."<a href='".$_SERVER['PHP_SELF'].$this->getParameter().($i+1)."' class='".$this->getStyle()."'>.. </a>";
			  }

			
			}
			
			if($this->getPage()<$this->getNoOfPages()) {
				$str=$str."|<a href='".$_SERVER['PHP_SELF'].$this->getParameter().($this->getPage()+1)."' class='".$this->getStyle()."'>Next</a>";
			}
			$str=$str."</td>";
			$str=$str."</tr></table>";
			return $str;
	}
	
	function getOffset($page) {
			if($page>$this->getNoOfPages()) {
				$page=$this->getNoOfPages();
			}
			if($page=="") {
				$this->page=1;
				$page=1;
			}
			else {
				$this->page=$page;
			}
			if($page=="1") {
				$this->offset=0;
				return $this->offset;
			}
			else {
				for($i=2;$i<=$page;$i++) {
					$this->offset=$this->offset+$this->getLimit();
				}
				return $this->offset;
			}
	}
	function getQueryString()
	{
		$queryString_arr = explode('&',$_SERVER['QUERY_STRING']);
		$queryStringNew = "";		
		if(count($queryString_arr) > 0)
		{ 
			$srchString = "age=";
			$srchStringLimit = "limit=";
			foreach($queryString_arr as $queryString_arr2)
			{
				$posString = strpos($queryString_arr2,$srchString);
				$posStringLim = strpos($queryString_arr2,$srchStringLimit);				
				if($posString != 1 && $queryString_arr2 != '')
				$queryStringNew .= "&".$queryString_arr2;
			}
			//echo 	$queryStringNew; exit;
		} 
		/*if($_GET['limit'] != '') {
				$queryStringNew .= "&limit=".$_GET['limit'];			
		}*/
		return $queryStringNew;
	}
	
	function getPage() {
			return $this->page;
	}
	function setStyle($style) {
			$this->style=$style;
	}
	function getStyle() {
			return $this->style;
	}
	function setActiveStyle($style) {
			$this->activestyle=$style;
	}
	function getActiveStyle() {
			return $this->activestyle;
	}
	function setButtonStyle($style) {
			$this->buttonstyle=$style;
	}
	function getButtonStyle() {
			return $this->buttonstyle;
	}
	function setParameter($parameter) {
			$this->parameter=$parameter;
	}
	function getParameter() {
			return $this->parameter;
	}
	
	public function errno() 
	{ 
		return mysql_errno($this->link); 
	} 
	public function error() 
	{ 
		return mysql_error($this->link); 
	} 
	public static function escape_string($string) 
	{ 
		return mysql_real_escape_string($string); 
	} 
	
	/*function query($query) 
	{ 
		return mysql_query($query); 
	} */
	public function fetch_array($result, $array_type = MYSQL_BOTH) 
	{ 
		return mysqli_fetch_array($result, $array_type); 
	} 
	public function fetch_row($result) 
	{ 
	   return mysqli_fetch_row($result); 
	} 
	function fetch_assoc($result) 
	{ 
	   return mysqli_fetch_assoc($result); 
	} 
	public function fetch_object($result) 
	{ 
	   return mysqli_fetch_object($result); 
	} 
	public function num_rows($result) 
	{ 
	   return mysqli_num_rows($result); 
	} 
	public function curPageInfo() {
    return substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
	//Get Current PHP page name
	 public	function curPageName() {
	 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}

	
	
	/*------------------Update Log file--------------------------*/
	function logSuccessFail($status,$query) {
		$str = "insert into ".TBL_LOGDETAIL." set sesDetId = '".$_SESSION['SESSIONID']."', moduleId = '".$_SESSION['CURRENTMENUID']."', pageQuery = '".addslashes($query)."', pageEvent = '".strtoupper(substr($query,0,6))."', logDescription = '".$status."', moduleUrl = '".addslashes($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])."', dateTime = '".date('Y-m-d H:i:s')."'"; 
		$this->executeQry($str);
	
	}

	function checkExtensions($ext) {
		$IMAGE_EXTENSION = $this->fetchValue(TBL_SYSTEMCONFIG,"systemVal","systemName='IMAGE_EXTENSION'");
		if($IMAGE_EXTENSION != "") {
			$allExtnArr = explode(',',$IMAGE_EXTENSION);
			if(in_array($ext,$allExtnArr)) 
				return true;
			else 
				return false;			
		} else {
			return false;
		}
	}
	
	function findSize($width,$height,$defaultWidth,$defaultHeight) {
		$THUMB_WIDTH = $this->fetchValue(TBL_SYSTEMCONFIG,"systemVal","systemName='$width'");
		$newWidth = $THUMB_WIDTH?$THUMB_WIDTH:$defaultWidth;
		$THUMB_HEIGHT = $this->fetchValue(TBL_SYSTEMCONFIG,"systemVal","systemName='$height'");				
		$newHeigth = $THUMB_HEIGHT?$THUMB_HEIGHT:$defaultHeight;		
		
		return $newWidth."x".$newHeigth;
	}
	
	
	
/*********************************/
//some custom db function
function db_fetch_assoc_array($query){
	$link = $this->dbConnect();
	$result = $link->query($query);

	$dataArray = array();
	while($data = $this->fetch_array($result)){
		$dataArray[] = $data;
	}
	mysqli_close( $link );
	return $dataArray;
}

function db_fetch_assoc_array_my($query){
	$link = $this->dbConnect();
	$result = $link->query($query);
	$dataArray = array();
	while($data = $this->fetch_assoc($result)){
		$dataArray[] = $data;
	}
	mysqli_close( $link );
	return $dataArray;
}

//For customising date
function db_fetch_assoc_array_custom_date($query){
	$link 	= $this->dbConnect();
	$result = $link->query($query);
	$dataArray = array();
	$i = 0;
	while($data = $this->fetch_array($result)){
		$dataArray[] = $data;
		$dataArray[$i]['created'] = date('Y-m-d, H:i:s', $data['created']);
		$i++;
	}
	mysqli_close( $link );
	return $dataArray;
}


function db_fetch_number_array($query){
	$link 	= $this->dbConnect();
	$result = $link->query($query);

	$dataArray = array();
	while($data = $this->fetch_row($result)){
		$dataArray[] = $data;
	}
	mysqli_close( $link );
	return $dataArray;
}

function db_fetch_single_number_row($query){
	$link 	= $this->dbConnect();
	$result = $link->query($query);
	$dataArray = $this->fetch_row($result);
	mysqli_close( $link );
	return $dataArray;
}

function db_fetch_single_assoc_row($query){
	$link 	= $this->dbConnect();
	$result = $link->query($query);
	$dataArray = $this->fetch_array($result);
	mysqli_close( $link );
	return $dataArray;
}

function db_fetch_single_cell($query){
	$link 	= $this->dbConnect();
	$result = $link->query($query);

	$dataArray = $this->fetch_row($result);
	mysqli_close( $link );
	return $dataArray[0];
}

//some custom db function end here  

	
}
?>