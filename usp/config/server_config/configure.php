<?php
// Server Path
//error_reporting(0);
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$docRoot .= "/clients/test9/";
$host = $_SERVER['HTTP_HOST'];

$sitepath = "http://www.sparxitsolutions.com/clients/test9/";
$imageMagickPath  = "/usr/bin/convert";

// Local Database Settings 
$config['server'] = 'localhost'; 
$config['database'] ='prashant_test9';
$config['user'] ='prashant_test9';
$config['pass'] ='!wpMol6wHE9]';



//----For amfphp------------------
define('CONFIGSERVER', $config['server']);
define('CONFIGDATABASE', $config['database']);
define('CONFIGUSER', $config['user']);
define('CONFIGPASS', $config['pass']);
define('CONFIGIMAGEMAGICPATH', $imageMagickPath);
define("ABSOLUTEPATH" , "/var/www/dummyAdmin/");


//		Site Design Path Assign	
$desOriginalImage  = "files/design/original";
$desThumbImage 	   = "files/design/thumb";
$desSwfImage 	   = "files/design/swf";
$desOrigPng 	   = "files/design/originaldesign";	//EPS
$desLargeThumb 	   = "files/design/largethumb";


//----For amfphp------------------


define('IMAGEMAGICPATH', $imageMagickPath);
define('SITE_URL', $sitepath);
define('SEARCHTEXT', "Search");
define('DEFAULTDATEFORMAT', "d-m-Y");


//==============================================
define('__BASE_DIR_FRONT__', $docRoot); 
define('__BASE_DIR_ADMIN__', $docRoot.'admin/'); 

define('BASEUPLOADFILE',$docRoot."files/");
define('BASEUPLOADFILEPATH',$sitepath."files/");
define('__BASEURL__',$sitepath);
//SITE LOGO===============================
define('__SITELOGOORIGINAL__',BASEUPLOADFILE."logo/original/");
define('__SITELOGOORIGINALPATH__',BASEUPLOADFILEPATH."logo/original/");


/// USER=================================

define('__USERORIGINAL__',BASEUPLOADFILE."user/original/");
define('__USERTINYTHUMB__',BASEUPLOADFILE."user/tinythumb/");
define('__USERTHUMB__',BASEUPLOADFILE."user/thumb/");
define('__USERLARGE__',BASEUPLOADFILE."user/large/");
define('__USERORIGINALPATH__',BASEUPLOADFILEPATH."user/original/");
define('__USERTINYTHUMBPATH__',BASEUPLOADFILEPATH."user/tinythumb/");
define('__USERTHUMBPATH__',BASEUPLOADFILEPATH."user/thumb/");
define('__USERLARGEPATH__',BASEUPLOADFILEPATH."user/large/");

/// VIDEO ==============================================

define('__VIDEOORIGINAL__',BASEUPLOADFILE."videos/original/");
define('__VIDEOORIGINALPATH__',BASEUPLOADFILEPATH."videos/original/");
define('__VIDEOFLASH__',BASEUPLOADFILE."videos/flash/");
define('__VIDEOFLASHPATH__',BASEUPLOADFILEPATH."videos/flash/");
define('__VIDEOTHUMB__',BASEUPLOADFILE."videos/thumb/");
define('__VIDEOTHUMBPATH__',BASEUPLOADFILEPATH."videos/thumb/");
//-----------Banner ---------------
define('__BANNERORIGINAL__',BASEUPLOADFILE."banner/original/");
define('__BANNERPATH__',BASEUPLOADFILEPATH."banner/original/");
//-----------Home Video ---------------
define('__HOMEVIDEOORIGINAL__',BASEUPLOADFILE."homevideo/original/");
define('__HOMEVIDEOPATH__',BASEUPLOADFILEPATH."homevideo/original/");
//--------Font---------
define('__FONTORIGINAL__',BASEUPLOADFILE."font/original/");
define('__FONTTTF__',BASEUPLOADFILE."font/ttf/");
define('__FONTPATH__',BASEUPLOADFILEPATH."font/original/");

// No Image Path ========================================
define('__NOIMAGEORIGINALPATH__',BASEUPLOADFILEPATH."noimage/");
// Model Profile Image =========================
define('__MODELPROFILEIMAGE__',BASEUPLOADFILE."model/images/");
define('__MODELPROFILEIMAGEORIGINALPATH__',__BASEUPLOADFILEPATH__."model/images/");
// Member Profile Image =========================
define('__MEMBERPROFILEIMAGE__',BASEUPLOADFILE."member/images/");
define('__MEMBERPROFILEIMAGEORIGINALPATH__',__BASEUPLOADFILEPATH__."member/images/");
// XML path ===============================
define('__XMLPATH__',__BASEUPLOADFILE__."xml/");
// Model Product =========================
define('__MODELPRODUCT__',BASEUPLOADFILE."model/product/");
define('__MODELPRODUCTORIGINALPATH__',BASEUPLOADFILEPATH."model/product/");




?>
