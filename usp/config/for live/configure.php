<?php
// Server Path
//error_reporting(0);
$docRoot = $_SERVER['DOCUMENT_ROOT'];
//$docRoot = "/home/sparxsof/public_html/";
$docRoot .= "/";
$host = $_SERVER['HTTP_HOST'];
$sitepath = "http://www.bestkomodo.com/";
$imageMagickPath  = "/usr/local/bin/convert";


$config['server'] = 'bestkomodo.db.6237397.hostedresource.com'; 
$config['database'] ='bestkomodo';
$config['user'] ='bestkomodo';
$config['pass'] ='Best00komdosp1';



//----For amfphp------------------
define('CONFIGSERVER', $config['server']);
define('CONFIGDATABASE', $config['database']);
define('CONFIGUSER', $config['user']);
define('CONFIGPASS', $config['pass']);
define('CONFIGIMAGEMAGICPATH', $imageMagickPath);
define("ABSOLUTEPATH" , $docRoot);


// for pdf generate
define('DESORIGPNG',$desOrigPng);

define('IMAGEMAGICPATH', $imageMagickPath);
//define('SITE_URL', $sitepath);
//define('SITENAME', "Ecart");
define('SEARCHTEXT', "Search");
define('DEFAULTDATEFORMAT', "d-m-Y");


//		Images Uploaded By User
$userUpdOriginalImage  	= "files/userimage/orignal";
$userUpdLargeImage 		= "files/userimage/large";
$userUpdThumbImage 		= "files/userimage/thumb";
$pathFontTTF = "files/font/ttf";

//		Site Design Path Assign	
$desOriginalImage  = "files/design/original";
$desThumbImage 	   = "files/design/thumb";
$desSwfImage 	   = "files/design/swf";
$desOrigPng 	   = "files/design/originaldesign";	//EPS
$desLargeThumb 	   = "files/design/largethumb";






/////// FILES///
define('__BASE_DIR_FRONT__', $docRoot); 
define('__BASE_DIR_ADMIN__', $docRoot.'admin/'); 


define('BASEUPLOADFILE',$docRoot."files/");
define('BASEUPLOADFILEPATH',"../files/");
//---------Flag------------
define('FLAGORIGINAL',BASEUPLOADFILE."flag/flagoriginal/");
define('FLAGTHUMB',BASEUPLOADFILE."flag/flagthumb/");
define('FLAGPATH',BASEUPLOADFILEPATH."flag/flagthumb/");

//-----------Newsletter Attachment ---------------
define('__NEWSLETTERORIGINAL__',BASEUPLOADFILE."newsletter/original/");
define('__NEWSLETTERPATH__',BASEUPLOADFILEPATH."newsletter/original/");


//--------Category---------
define('__CATEGORYORIGINAL__',BASEUPLOADFILE."category/original/");
define('__CATEGORYTHUMB__',BASEUPLOADFILE."category/thumb/");
define('__CATEGORYPATH__',BASEUPLOADFILEPATH."category/thumb/");

//--------Site Logo---------
define('__SITELOGOORIGINAL__',BASEUPLOADFILE."logo/original/");
define('__SITELOGOPATH__',BASEUPLOADFILEPATH."logo/original/");

//--------Background Image---------
define('__BACKGROUNDORIGINAL__',BASEUPLOADFILE."background/original/");
define('__BACKGROUNDPATH__',BASEUPLOADFILEPATH."background/original/");

//---------DB Backup------------
define('__DIR_BACKUPS__', __BASE_DIR_ADMIN__ . 'db_backups/');

//---------Language------------
define('__DIR_LANGUAGES__', __BASE_DIR_FRONT__. 'languages/');

//-----------Banner ---------------
define('__BANNERORIGINAL__',BASEUPLOADFILE."banner/original/");
define('__BANNERPATH__',BASEUPLOADFILEPATH."banner/original/");


//--------Category---------
define('__GIFTORIGINAL__',BASEUPLOADFILE."gift/original/");
define('__GIFTTHUMB__',BASEUPLOADFILE."gift/thumb/");
define('__GIFTTHUMBPATH__',BASEUPLOADFILEPATH."gift/thumb/");



define('__EMAILFILE__',BASEUPLOADFILE."email/xls/");


//-----------Raw Product ---------------
define('__PRODUCTORIGINAL__',BASEUPLOADFILE."product/original/");
define('__PRODUCTLARGE__',BASEUPLOADFILE."product/large/");
define('__PRODUCTTHUMB__',BASEUPLOADFILEPATH."product/thumb/");
define('__PRODUCTPATH__',BASEUPLOADFILEPATH."product/original/");
define('__PRODUCTTHUMBPATH__',$sitepath."files/product/thumb/");
//-----------Testimonial ---------------
define('__TESTIMONIALORIGINAL__',BASEUPLOADFILE."testimonial/original/");
define('__TESTIMONIALLARGE__',BASEUPLOADFILE."testimonial/large/");
define('__TESTIMONIALTHUMB__',BASEUPLOADFILE."testimonial/thumb/");
define('__TESTIMONIALPATH__',BASEUPLOADFILEPATH."testimonial/original/");

//--------Font---------
define('__FONTORIGINAL__',BASEUPLOADFILE."font/original/");
define('__FONTTTF__',BASEUPLOADFILE."font/ttf/");
define('__FONTPATH__',BASEUPLOADFILEPATH."font/original/");


//-----------Main Product ---------------
define('__MAINPRODUCTORIGINAL__',BASEUPLOADFILE."mainProduct/original/");
define('__MAINPRODUCTLARGE__',BASEUPLOADFILE."mainProduct/large/");
define('__MAINPRODUCTLARGE1__',BASEUPLOADFILEPATH."mainProduct/large/");
define('__MAINPRODUCTEXTRALARGE__',BASEUPLOADFILEPATH."mainProduct/extralarge/");
define('__MAINPRODUCTTHUMB__',BASEUPLOADFILEPATH."mainProduct/thumb/");
define('__MAINPRODUCTPATH__',BASEUPLOADFILEPATH."mainProduct/original/");
define('__MAINPRODUCTTHUMBPATH__',BASEUPLOADFILEPATH."mainProduct/thumb/");
define('__MAINPRODUCTTHUMBPATHORIGINAL__',BASEUPLOADFILEPATH."mainProduct/original/");

//--------No Image---------
define('__NOIMAGEPATH__',BASEUPLOADFILEPATH."noimage/noimage.jpeg");


/////hot design Image

define('__HOTDESIGN__',BASEUPLOADFILEPATH."design/thumb/");

define('__PDFUPLOAD__',BASEUPLOADFILE."pdf/");
define('__PDFVIEWPATH__',BASEUPLOADFILEPATH."pdf/");
/////Admin Create Image

define('__ADMINCREATED__',BASEUPLOADFILE."mainProduct/original/");
define('____ADMINCREATEDLARGE__',BASEUPLOADFILE."mainProduct/large/");

define('__ADMINCREATEDTHUMB__',BASEUPLOADFILEPATH."mainProduct/thumb/");
define('__ADMINCREATEDPATH__',BASEUPLOADFILEPATH."mainProduct/original/");
define('__ADMINCREATEDTHUMBPATH__',$sitepath."files/mainProduct/thumb/");
define('__ADMINCREATEDTHUMBPATHORIGINAL__',$sitepath."files/mainProduct/original/");
?>