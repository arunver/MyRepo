<?php
// Server Path
//error_reporting('E_ALL ~E_NOTICE');
error_reporting('E_ALL');
ini_set('display_errors', '1');

date_default_timezone_set('UTC');


$docRoot = $_SERVER['DOCUMENT_ROOT']; 
$docRoot .= "/usp/";
$host = $_SERVER['HTTP_HOST'];


$sitepath = "http://".$host."/usp/";
$imageMagickPath  = "/usr/bin/convert";

// Local Database Settings 
$config['server'] = 'localhost'; 
$config['database'] ='uspdb';
$config['user'] ='root';
$config['pass'] ='usptool';

define('SITENAME','Utility Service Process');  
define('SITEPATH',$sitepath);
define('PATH',$docRoot);
define('PATH_CK_PEM',$docRoot."/includes/");

//----For amfphp------------------
define('CONFIGSERVER', $config['server']);
define('CONFIGDATABASE', $config['database']);
define('CONFIGUSER', $config['user']);
define('CONFIGPASS', $config['pass']);
define('CONFIGIMAGEMAGICPATH', $imageMagickPath);
define("ABSOLUTEPATH" , "/var/www/admin/");

//----FOR USER IMAGE
define('BASEUPLOADFILEPATH',"../images/");
define('USERTHUMB',BASEUPLOADFILEPATH."user/thumb/");
define('USERMAIN',BASEUPLOADFILEPATH."user/main/");

define('DEFAULTDATEFORMAT', "d-m-Y h:m:i G:ia");
?>
